<?php

namespace App\Drive\Logics\Files;

use Melisa\core\LogicBusiness;
use App\Drive\Repositories\FilesRepository;
use App\Drive\Repositories\MimesTypesRepository;
use App\Drive\Repositories\UnitsRepository;
use App\Drive\Logics\Folders\FileParentTrait;
use App\Drive\Repositories\FilesParentsRepository;

/**
 * Register upload file
 *
 * @author Luis Josafat Heredia Contreras
 */
class UploadLogic
{
    use LogicBusiness;
    use FileParentTrait;
    
    protected $repository;
    protected $mimesRepo;
    protected $unitsRepo;
    protected $repoFilesParents;
    const MIME_TYPE_DEFAULT = 'application/vnd.melisa-apps.unknown';

    public function __construct(
        FilesRepository $repository,
        MimesTypesRepository $mimesRepo,
        UnitsRepository $unitsRepo,
        FilesParentsRepository $repoFilesParents
    )
    {
        $this->repository = $repository;    
        $this->mimesRepo = $mimesRepo;    
        $this->unitsRepo = $unitsRepo;
        $this->repoFilesParents = $repoFilesParents;
    }
    
    public function init(array $input)
    {        
        $this->repository->beginTransaction();
        
        $unit = $this->getUnitAsign();
        $fileInfo = $this->storeFile($input['file'], $unit);
        
        if ( !$fileInfo) {
            return false;
        }
        
        $mime = $this->getMimeTypeAsign($fileInfo['mimeType']);
        $idFile = $this->createFile($fileInfo, $unit->id, $mime->id);
        
        if( !$idFile) {
            return $this->repository->rollBack();
        }
        
        if( !$this->saveFileParent($idFile, $input)) {
            return false;
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
            return $this->repository->rollBack();
        }
        
        $this->repository->commit();
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
        return $this->repository->create([
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
