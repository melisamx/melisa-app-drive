<?php

namespace App\Drive\Http\Requests\Folders;

use Melisa\Laravel\Http\Requests\Generic;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class CreateRequest extends Generic
{
    
    protected $rules = [
        'name'=>'required|xss|max:150',
        'idFileParent'=>'nullable|xss|size:36',
    ];
    
}
