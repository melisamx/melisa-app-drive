<?php namespace App\Drive\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;
use Melisa\Laravel\Logics\PagingLogics;
use App\Drive\Http\Requests\Files\PagingRequest;
use App\Drive\Repositories\FilesRepository;
use App\Drive\Criteria\Files\WithFiltersCriteria;

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
    
}
