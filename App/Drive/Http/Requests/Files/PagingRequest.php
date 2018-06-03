<?php

namespace App\Drive\Http\Requests\Files;

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
        'idUnit'=>'sometimes|alpha_dash|size:36|xss|exists:drive.units,id',
        'idFileParent'=>'sometimes|alpha_dash|size:36|xss|exists:drive.files,id',
    ];
    
}
