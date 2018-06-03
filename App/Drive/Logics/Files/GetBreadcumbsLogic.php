<?php

namespace App\Drive\Logics\Files;

use App\Drive\Repositories\FilesRepository;
use App\Drive\Repositories\MimesTypesRepository;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class GetBreadcumbsLogic
{
    
    protected $repoFiles;

    public function __construct(
        FilesRepository $repoFiles
    )
    {
        $this->repoFiles = $repoFiles;
    }
        
    public function run(array $input)
    {
        $file = $this->getFile($input['id']);
        
        if( !$file) {
            return false;
        }
        
        if( !$this->isValidFile($file)) {
            return false;
        }
        
        return array_reverse($this->getBreadcumbs($file));
    }
    
    public function getBreadcumbs(&$file)
    {
        $parents = [];
        
        if( !count($file->parent)) {
            return $parents;
        }
        
        $fileParent = $this->getFile($file->parent->idFileParent);
        
        if( !$fileParent) {
            return false;
        }
        
        $parents []= $fileParent;
        return array_merge($parents, $this->getBreadcumbs($fileParent));
    }
    
    public function isValidFile(&$file)
    {
        if( $file->mime->name === MimesTypesRepository::MIME_FOLDER) {
            return true;
        }
        
        return $this->error('drive.5');
    }
    
    public function getFile($id)
    {
        $file = $this->repoFiles->withDetail($id);
        
        if( $file) {
            return $file;
        }
        
        return $this->error('drive.4');
    }
    
}
