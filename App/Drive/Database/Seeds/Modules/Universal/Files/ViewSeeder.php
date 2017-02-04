<?php namespace App\Drive\Database\Seeds\Modules\Universal\Files;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ViewSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installModule([
            [
                'name'=>'Ver archivo',
                'url'=>'/drive.php/files/',
                'description'=>'Módulo para ver archivos',
                'task'=>[
                    'key'=>'task.drive.files.view',
                    'name'=>'Ver archivos',
                    'description'=>'Permitir archivos',
                    'pattern'=>'read'
                ],
            ],
        ]);
        
    }
    
}
