<?php

namespace App\Drive\Database\Seeds\Modules\Phone\Files;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class SelectSeeder extends InstallSeeder
{
    
    public function run()
    {        
        $this->installModule([
            [
                'name'=>'Seleccionar archivos',
                'url'=>'/drive.php/modules/files/selectPhone/',
                'description'=>'Módulo interfaz para seleccionar archivos (phone)',
                'nameSpace'=>'Melisa.drive.view.phone.files.select.Wrapper',
                'task'=>[
                    'key'=>'task.drive.phone.files.select.access',
                    'name'=>'Acceso a seleccionar archivos (phone)',
                    'description'=>'Permitir acceso a seleccionar archivos',
                    'pattern'=>'access'
                ],
                'event'=>[
                    'key'=>'event.drive.phone.files.select.access',
                    'description'=>'Acceso al módulo seleccionar archivos (phone)'
                ]
            ],
        ]);        
    }
    
}
