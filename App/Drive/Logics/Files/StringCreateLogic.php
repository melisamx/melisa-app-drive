<?php

namespace App\Drive\Logics\Files;

use App\Drive\Interfaces\FileContent;
use App\Drive\Logics\Files\CreateLogic;
use Illuminate\Support\Facades\Storage;

/**
 * Create file source base64
 *
 * @author Luis Josafat Heredia Contreras
 */
class StringCreateLogic
{
    
    protected $logicCreate;

    public function __construct(
        CreateLogic $logicCreate
    )
    {
        $this->logicCreate = $logicCreate;
    }
    
    public function init(FileContent $fileContent)
    {
        if( !$this->storeContent($fileContent)) {
            return false;
        }
        
        return $this->logicCreate->init($fileContent);
    }
    
    public function storeContent(&$fileContent)
    {
        $fileName = app('uuid')->v5() . '.' . $fileContent->getExtension();
        $fileContent->setOriginalName($fileName);
        $result = Storage::disk('files')->put($fileName, $fileContent->getContent());
        
        if( !$result) {
            return $this->error('Imposible save file');
        }
        
        return true;
    }
    
}
