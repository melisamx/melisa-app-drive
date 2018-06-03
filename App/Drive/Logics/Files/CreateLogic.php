<?php

namespace App\Drive\Logics\Files;

use Melisa\core\LogicBusiness;
use App\Drive\Interfaces\FileInterface;
use App\Drive\Repositories\FilesRepository;
use App\Drive\Repositories\MimesTypesRepository;
use App\Drive\Repositories\UnitsRepository;

/**
 * Crete file
 *
 * @author Luis Josafat Heredia Contreras
 */
class CreateLogic
{
    use LogicBusiness;
    
    protected $repoFiles;
    protected $repoMimes;
    protected $repoUnits;
    
    const MIME_TYPE_DEFAULT = 'application/vnd.melisa-apps.unknown';

    public function __construct(
        FilesRepository $repoFiles,
        MimesTypesRepository $repoMimes,
        UnitsRepository $repoUnits
    )
    {
        $this->repoFiles = $repoFiles;    
        $this->repoMimes = $repoMimes;    
        $this->repoUnits = $repoUnits;    
    }
    
    public function init(FileInterface $file)
    {
        $this->repoFiles->beginTransaction();
        
        $fileInfo = $this->getFileInfo($file);
        
        if( !$fileInfo) {
            return false;
        }
                
        $idFile = $this->createFile($fileInfo);
        
        if( !$idFile) {
            return $this->repoFiles->rollBack();
        }
        
        $this->repoFiles->commit();
        return $idFile;
    }
    
    public function createFile(&$fileInfo)
    {
        $id = $this->repoFiles->create($fileInfo);
        
        if( !$id) {
            return $this->error('Imposible register file in database');
        }
        
        return $id;
    }
    
    public function getFileInfo($file)
    {
        $fileInfo = $file->toArray();
        
        $fileInfo ['idIdentityCreated']= $this->getIdentity();
        $unit = $this->getUnitAsign();
        $realpath = $unit->source . $file->getOrignalName();
        $fileInfo ['idUnit'] = $unit->id;
        $fileInfo ['md5Checksum'] = md5_file($realpath);
        $fileInfo ['size'] = filesize($realpath);
        
        if( !$fileInfo['idUnit']) {
            return false;
        }
        
        $fileInfo ['idMimeType']= $this->getMimeType($file->getMimeType());
        
        if( !$fileInfo['idMimeType']) {
            return false;
        }
        
        return $fileInfo;
    }
    
    public function getMimeType($mime)
    {
        $mimeType = $this->repoMimes->findBy('name', $mime);
        
        if( !$mimeType) {
            $mimeType = $this->repoMimes->findBy('name', self::MIME_TYPE_DEFAULT);
        }
        
        return $mimeType->id;
    }
    
    public function getUnitAsign()
    {        
        $unit = $this->repoUnits->getModel()->first();
        
        if( !$unit) {
            return false;
        }
        
        return $unit;        
    }
    
}
