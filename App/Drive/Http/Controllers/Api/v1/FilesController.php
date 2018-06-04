<?php

namespace App\Drive\Http\Controllers\Api\v1;

use Melisa\Laravel\Http\Controllers\Controller;
use Melisa\Laravel\Logics\PagingLogic;
use App\Drive\Http\Requests\Files\PagingRequest;
use App\Drive\Http\Requests\Files\UploadRequest;
use App\Drive\Repositories\FilesRepository;
use App\Drive\Criteria\Files\WithFiltersCriteria;
use App\Drive\Logics\Files\UploadLogic;
use App\Drive\Logics\Files\ViewLogic;
use App\Drive\Logics\Files\GetBreadcumbsLogic;
use App\Drive\Logics\Files\BreadcumbsSenchaTransformer;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class FilesController extends Controller
{
    
    public function breadcumbs(
        $id,
        GetBreadcumbsLogic $logic,
        BreadcumbsSenchaTransformer $transfomer
    )
    {
        return response()->data(
            $transfomer->run(
                $logic->run([
                    'id'=>$id
                ])
            )
        );
    }
    
    public function paging(
        PagingRequest $request,
        FilesRepository $repository, 
        WithFiltersCriteria $criteria
    )
    {
        $logic = new PagingLogic($repository, $criteria);        
        $result = $logic->init($request->allValid());
        return response()->paging($result);
    }
    
    public function upload(
        UploadRequest $request,
        UploadLogic $logic
    )
    {
        return $this->create($request, $logic);  
    }
    
    public function create(
        UploadRequest $request,
        UploadLogic $logic
    )
    {        
        $files = $request->allValid();
        return response()->data($logic->init($files)); 
    }
    
    public function view(
        $id, 
        ViewLogic $logic
    )
    {        
        $fileConfig = $logic->init($id);
        
        if( !$fileConfig) {
            return response()->data(false);
        }
        
        return response()->file($fileConfig['path'], $fileConfig['headers']);        
    }
    
}
