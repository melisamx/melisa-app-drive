<?php

namespace App\Drive\Logics\Folders;

use App\Drive\Repositories\MimesTypesRepository;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
trait FileParentTrait
{
    
    public function saveFileParent($idFile, &$input)
    {
        if( !isset($input['idFileParent'])) {
            return true;
        }
        
        if( !$this->isValidFileParent($input['idFileParent'])) {
            return false;
        }
        
        $result = $this->repoFilesParents->updateOrCreate([
            'idFile'=>$idFile,
            'idFileParent'=>$input['idFileParent'],
        ]);
        
        if( $result) {
            return true;
        }
        
        return $this->error('drive.2');
    }
    
    public function isValidFileParent($idFileParent)
    {
        $fileParent = $this->repository->withDetail($idFileParent);
        
        if( !$fileParent) {
            return $this->error('drive.3');
        }
        
        if( $fileParent->mime->name === MimesTypesRepository::MIME_FOLDER) {
            return true;
        }
        
        return $this->error('drive.4');
    }
    
}
