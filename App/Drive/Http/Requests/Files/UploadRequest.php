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
        'file'=>'bail|required|file|max:1000000000'
    ];
    
}
