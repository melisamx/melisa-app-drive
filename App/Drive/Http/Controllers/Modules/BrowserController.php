<?php

namespace App\Drive\Http\Controllers\Modules;

use Melisa\Laravel\Http\Controllers\Controller;
use App\Drive\Modules\Desktop\Browser\ViewModule;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class BrowserController extends Controller
{
    
    public function view(ViewModule $module)
    {        
        return $module->render();        
    }
        
}
