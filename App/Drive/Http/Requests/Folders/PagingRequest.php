<?php

namespace App\Drive\Http\Requests\Folders;

use Melisa\Laravel\Http\Requests\WithFilter;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class PagingRequest extends WithFilter
{
    
    protected $rules = [
        'page'=>'required|xss|numeric',
        'start'=>'required|xss|numeric',
        'limit'=>'required|xss|numeric',
        'filter'=>'sometimes|json|filter:idUnit,idFileParent,name',
        'sort'=>'sometimes|xss|json|sort:name,updatedAt,createdAt'
    ];
    
    public $rulesFilters = [
        'idUnit'=>'nullable|size:36|xss|exists:drive.units,id',
        'idFileParent'=>'nullable|alpha_dash|size:36|xss|exists:drive.files,id',
    ];
    
}
