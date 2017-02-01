<?php namespace App\Drive\Logics\Files;

use Illuminate\Http\UploadedFile;
use Melisa\core\LogicBusiness;
use App\Drive\Repositories\FilesRepository;
use App\Drive\Repositories\MimesTypesRepository;
use App\Drive\Repositories\UnitsRepository;
use App\Drive\Http\Requests\Files\UploadRequest;

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
        
        $fileInfo = $this->storeFile($file);
        
        if ( !$fileInfo) {
            return false;
        }
        
        $this->filesRepo->beginTransaction();
        
        $mime = $this->getMimeTypeAsign($fileInfo['mimeType']);
        $unit = $this->getUnitAsign();
        
        $idFile = $this->createFile($fileInfo, $unit->id, $mime->id);
        
        if( !$idFile) {
            return $this->filesRepo->rollBack();
        }
        
        $event = [
            'idFile'=>$idFile,
            'idUnit'=>$unit->id,
        ];
        
        if( !$this->emitEvent('app.drive.file.upload.success', $event)) {
            return $this->filesRepo->rollBack();
        }
        
        $this->filesRepo->commit();
        return $event;
        
    }
    
    public function storeFile($file)
    {
        
        $path = $file->store('uploads');
        
        if( !$path) {
            return $this->error('Imposible save file upload');
        }
        
        $realpath = storage_path() . '/app/' . $path;
        $md5File = md5_file($realpath);
        
        return [
            'path'=>$path,
            'extension'=>$file->extension(),
            'mimeType'=>$file->getMimeType(),
            'originalName'=>$file->getClientOriginalName(),
            'size'=>$file->getClientSize(),
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
