<?php

namespace App\Drive\Logics\Files;

use Melisa\core\LogicBusiness;
use App\Drive\Repositories\FilesRepository;

/**
 * View file
 *
 * @author Luis Josafat Heredia Contreras
 */
class ViewLogic
{
    use LogicBusiness;
    
    protected $filesRepo;

    public function __construct(
        FilesRepository $filesRepo
    )
    {
        $this->filesRepo = $filesRepo;
    }
    
    public function init($id)
    {        
        $file = $this->getFile($id);
        
        if( !$file) {
            return false;
        }
        
        $pathFile = $this->getPathFile($file);
        
        if( !$this->existFile($pathFile)) {
            return false;
        }
        
        return [
            'path'=>$pathFile,
            'headers'=>$this->getHeadersFile($file),
        ];        
    }
    
    public function existFile($pathFile)
    {
        if( file_exists($pathFile)) {
            return true;
        }
        
        return $this->error('El archivo fisico no existe o acaba de ser eliminado');
    }
    
    public function getHeadersFile(&$file)
    {
        if( in_array($file->mime->name, [
            'image/jpeg',
            'image/png',
            'application/pdf',
        ])) {
            return [];
        }
        
        if( in_array($file->mime->name, [
            'application/vnd.melisa-apps.unknown'
        ])) {
            return $this->resolveHeadersUnknown($file);
        }
        
        return [
            'Content-type: ' . $file->mime->name
        ];        
    }
    
    public function resolveHeadersUnknown(&$file)
    {        
        $extension = pathinfo($file->name, PATHINFO_EXTENSION);
        $header = [];
        
        switch ($extension) {
            case 'xlsx':
                $header = [
                    'Content-type: ' . $file->mime->name
                ];
                break;

            default:
                break;
        }
        
        return $header;        
    }
    
    public function getPathFile(&$file)
    {
        $path = $file->unit->source;
        $path .= $file->originalFilename;
        return $path;        
    }
    
    public function getFile($id)
    {        
        return $this->filesRepo->find($id);
    }
    
}
