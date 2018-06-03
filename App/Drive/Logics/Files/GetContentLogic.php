<?php

namespace App\Drive\Logics\Files;

use App\Drive\Logics\Files\ViewLogic;

class GetContentLogic
{
    
    protected $logicView;


    public function __construct(
        ViewLogic $logicView
    )
    {
        $this->logicView = $logicView;
    }
    
    public function init($idFile)
    {
        $fileInfo = $this->getFileInfo($idFile);
        
        if( !$fileInfo) {
            return $this->error('Imposible get content file {f}', [
                'f'=>$idFile
            ]);
        }
        
        return $this->getContent($fileInfo['path']);
    }
    
    public function getContent($filePath)
    {
        return file_get_contents($filePath);
    }
    
    public function getFileInfo($idFile)
    {
        return $this->logicView->init($idFile);
    }
    
}