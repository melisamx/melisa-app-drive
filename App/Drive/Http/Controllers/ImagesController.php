<?php namespace App\Drive\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;
use App\Drive\Logics\Files\Images\ResizeLogic;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ImagesController extends Controller
{
    
    public function view($id, $width, $height, ResizeLogic $logic)
    {
        
        $fileConfig = $logic->init($id, $width, $height);
        
        if( !$fileConfig) {
            return response()->data(false);
        }
        
        return response()->file($fileConfig['path'], $fileConfig['headers']);
        
    }
    
}
