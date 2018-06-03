<?php

namespace App\Drive\Database\Seeds\Modules\Universal\Files;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class PublicSeeder extends InstallSeeder
{
    
    public function run()
    {        
        $this->installModule([
            [
                'name'=>'Ver archivo publicos',
                'url'=>'/drive.php/files/public/',
                'description'=>'Módulo para ver archivos publicos',
                'task'=>[
                    'key'=>'task.drive.files.public.view',
                    'name'=>'Ver archivos publicos',
                    'description'=>'Permitir ver archivos publicos',
                    'pattern'=>'read'
                ],
            ],
        ]);        
    }
    
}
