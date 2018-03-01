<?php

namespace App\Drive\Http\Requests\Files;

use Melisa\Laravel\Http\Requests\WithFilter;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class UploadRequest extends WithFilter
{
    
    protected $rules = [
        'file'=>'bail|required|file|max:1000000000',
        'idFileParent'=>'nullable|xss|size:36|exists:drive.files,id',
    ];
    
}
