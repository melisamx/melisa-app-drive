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
        'page'=>'bail|required|xss|numeric',
        'start'=>'bail|required|xss|numeric',
        'limit'=>'bail|required|xss|numeric',
        'filter'=>'bail|sometimes|json|filter:idUnit,name',
        'sort'=>'bail|sometimes|xss|json|sort:name,updatedAt,createdAt'
    ];
    
    public $rulesFilters = [
        'idUnit'=>'bail|sometimes|alpha_dash|size:36|xss|exists:drive.units,id',
    ];
    
}
