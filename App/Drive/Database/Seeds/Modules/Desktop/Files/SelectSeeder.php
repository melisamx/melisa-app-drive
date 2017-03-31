<?php namespace App\Drive\Database\Seeds\Modules\Desktop\Files;

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
                'url'=>'/drive.php/modules/files/select/',
                'description'=>'Módulo interfaz para seleccionar archivos',
                'nameSpace'=>'Melisa.drive.view.desktop.files.select.Wrapper',
                'task'=>[
                    'key'=>'task.drive.files.select.access',
                    'name'=>'Acceso a seleccionar archivos',
                    'description'=>'Permitir acceso a seleccionar archivos',
                    'pattern'=>'access'
                ],
                'event'=>[
                    'key'=>'event.drive.files.select.access',
                    'description'=>'Acceso al módulo seleccionar archivos'
                ]
            ],
        ]);
        
    }
    
}
