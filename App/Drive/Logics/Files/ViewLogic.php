<?php namespace App\Drive\Logics\Files;

use Illuminate\Http\UploadedFile;
use Melisa\core\LogicBusiness;
use App\Drive\Repositories\FilesRepository;
use App\Drive\Repositories\MimesTypesRepository;
use App\Drive\Repositories\UnitsRepository;
use App\Drive\Http\Requests\Files\UploadRequest;

/**
 * View upload file
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
        
        return [
            'path'=>$this->getPathFile($file),
            'headers'=>$this->getHeadersFile($file),
        ];
        
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
