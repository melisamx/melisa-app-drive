<?php

namespace App\Drive\Logics\Folders;

use Melisa\Laravel\Logics\CreateLogic as BaseCreateLogic;
use App\Drive\Repositories\FilesRepository;
use App\Drive\Repositories\MimesTypesRepository;
use App\Drive\Repositories\UnitsRepository;
use App\Drive\Repositories\FilesParentsRepository;

/**
 * Create folder
 *
 * @author Luis Josafat Heredia Contreras
 */
class CreateLogic extends BaseCreateLogic
{
    use FileParentTrait;
    
    protected $repoMimes;
    protected $repoUnits;
    protected $repoFilesParents;

    public function __construct(
        FilesRepository $repository,
        MimesTypesRepository $repoMimes,
        UnitsRepository $repoUnits,
        FilesParentsRepository $repoFilesParents
    )
    {
        $this->repository = $repository;    
        $this->repoMimes = $repoMimes;    
        $this->repoUnits = $repoUnits;
        $this->repoFilesParents = $repoFilesParents;
    }
    
    public function save(&$input)
    {        
        $mimeFolder = $this->getMimeFolder();
        
        if( !$mimeFolder) {
            return false;
        }
        
        $unit = $this->getUnitAsign();
        
        if( !$unit) {
            return false;
        }
        
        $input ['idMimeType']= $mimeFolder->id;
        $input ['originalFilename']= $input['name'];        
        $input ['idUnit']= $unit->id;        
        $idFile = parent::save($input);
        
        if( !$idFile) {
            return false;
        }
        
        if( !$this->saveFileParent($idFile, $input)) {
            return false;
        }
        
        return $idFile;
    }
    
    public function getReturnData(&$event, &$input)
    {
        return $this->repository->withDetail($event['id']);
    }
    
    public function getMimeFolder()
    {
        $mime = $this->repoMimes->getFolder();
        
        if( $mime) {
            return $mime;
        }
        
        return $this->error('drive.1');
    }
    
    public function getUnitAsign()
    {        
        $unit = $this->repoUnits->getUnitDefault();
        
        if( $unit) {
            return $unit;
        }
        
        return $this->error('DRI2');
    }
    
}
