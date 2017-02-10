<?php namespace App\Drive\Http\Controllers\Modules;

use Melisa\Laravel\Http\Controllers\Controller;
use App\Drive\Modules\Files\SelectModule;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class FilesController extends Controller
{
    
    public function select(SelectModule $module)
    {
        
        return $module->render();
        
    }
        
}