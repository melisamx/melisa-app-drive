<?php

namespace App\Drive\Http\Controllers\Api\v1;

use Melisa\Laravel\Http\Controllers\Controller;
use Melisa\Laravel\Logics\PagingLogics;
use App\Drive\Http\Requests\Folders\PagingRequest;
use App\Drive\Http\Requests\Folders\CreateRequest;
use App\Drive\Repositories\FilesRepository;
use App\Drive\Criteria\Folders\WithFiltersCriteria;
use App\Drive\Logics\Folders\CreateLogic;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class FoldersController extends Controller
{
    
    public function paging(
        PagingRequest $request,
        FilesRepository $repository, 
        WithFiltersCriteria $criteria
    )
    {
        $logic = new PagingLogics($repository, $criteria);        
        return $logic->init($request->allValid());        
    }
    
    public function create(
        CreateRequest $request,
        CreateLogic $logic
    )
    {        
        return response()->data($logic->init($request->allValid()));        
    }
    
}
