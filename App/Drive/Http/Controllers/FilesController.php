<?php namespace App\Drive\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;
use Melisa\Laravel\Logics\PagingLogics;
use App\Drive\Http\Requests\Files\PagingRequest;
use App\Drive\Http\Requests\Files\UploadRequest;
use App\Drive\Repositories\FilesRepository;
use App\Drive\Criteria\Files\WithFiltersCriteria;
use App\Drive\Logics\Files\UploadLogic;
use App\Drive\Logics\Files\ViewLogic;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class FilesController extends Controller
{
    
    public function paging(PagingRequest $request, FilesRepository $repository, WithFiltersCriteria $criteria)
    {
        
        $logic = new PagingLogics($repository, $criteria);
        
        return $logic->init($request->allValid());
        
    }
    
    public function create(UploadRequest $request, UploadLogic $logic)
    {
        
        return response()->data($logic->init($request->file));
        
    }
    
    public function view($id, ViewLogic $logic)
    {
        
        $fileConfig = $logic->init($id);
        
        if( !$fileConfig) {
            return response()->data(false);
        }
        
        return response()->file($fileConfig['path'], $fileConfig['headers']);
        
    }
    
}
