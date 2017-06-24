<?php

namespace App\Drive\Logics\Files;

use Illuminate\Http\UploadedFile;
use Melisa\core\LogicBusiness;
use App\Drive\Repositories\FilesRepository;
use App\Drive\Repositories\MimesTypesRepository;
use App\Drive\Repositories\UnitsRepository;

/**
 * Register upload file
 *
 * @author Luis Josafat Heredia Contreras
 */
class UploadLogic
{
    use LogicBusiness;
    
    protected $filesRepo;
    protected $mimesRepo;
    protected $unitsRepo;
    const MIME_TYPE_DEFAULT = 'application/vnd.melisa-apps.unknown';

    public function __construct(
        FilesRepository $filesRepo,
        MimesTypesRepository $mimesRepo,
        UnitsRepository $unitsRepo
    )
    {
        $this->filesRepo = $filesRepo;    
        $this->mimesRepo = $mimesRepo;    
        $this->unitsRepo = $unitsRepo;    
    }
    
    public function init(UploadedFile $file)
    {        
        $this->filesRepo->beginTransaction();
        
        $unit = $this->getUnitAsign();
        $fileInfo = $this->storeFile($file, $unit);
        
        if ( !$fileInfo) {
            return false;
        }
        
        $mime = $this->getMimeTypeAsign($fileInfo['mimeType']);
        $idFile = $this->createFile($fileInfo, $unit->id, $mime->id);
        
        if( !$idFile) {
            return $this->filesRepo->rollBack();
        }
        
        $event = [
            'idFile'=>$idFile,
            'idUnit'=>$unit->id,
            'idMimeType'=>$mime->id,
            'mimeType'=>$mime->name,
            'fileExtension'=>$fileInfo['extension'],
            'name'=>$fileInfo['originalName'],
            'size'=>$fileInfo['size'],
        ];
        
        if( !$this->emitEvent('app.drive.file.upload.success', $event)) {
            return $this->filesRepo->rollBack();
        }
        
        $this->filesRepo->commit();
        return $event;        
    }
    
    public function storeFile(&$file, &$unit)
    {        
        $extension = $file->getClientOriginalExtension();
        $name = $file->getClientOriginalName();
        $mime = $file->getClientMimeType();
        $nameSave = app('uuid')->v5();
        
        $path = $file->storeAs(null, $nameSave . '.' . $extension, 'files');
        
        if( !$path) {
            return $this->error('Imposible save file upload');
        }
        
        $realpath = $unit->source . $path;
        $md5File = md5_file($realpath);
        $size = filesize($realpath);
        
        return [
            'path'=>$path,
            'extension'=>$extension,
            'mimeType'=>$mime,
            'originalName'=>$name,
            'size'=>$size,
            'md5'=>$md5File,
            'realpath'=>$realpath,
        ];
    }
    
    public function createFile(&$fileInfo, $idUnit, $idMime)
    {                
        return $this->filesRepo->create([
            'idUnit'=>$idUnit,
            'idMimeType'=>$idMime,
            'idIdentityCreated'=>$this->getIdentity(),
            'name'=>$fileInfo['originalName'],
            'originalFilename'=>$fileInfo['path'],
            'fileExtension'=>$fileInfo['extension'],
            'size'=>$fileInfo['size'],
            'md5Checksum'=>$fileInfo['md5'],
        ]);        
    }
    
    public function getUnitAsign()
    {        
        $unit = $this->unitsRepo->getModel()->first();
        
        if( !$unit) {
            return false;
        }
        
        return $unit;        
    }
    
    public function getMimeTypeAsign($mime)
    {        
        $mime = $this->mimesRepo->findBy('name', $mime);
        
        if( !$mime) {
            $mime = $this->mimesRepo->findBy('name', self::MIME_TYPE_DEFAULT);
        }
        
        return $mime;        
    }
    
}
