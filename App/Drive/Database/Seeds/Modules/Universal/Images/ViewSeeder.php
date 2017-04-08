<?php namespace App\Drive\Database\Seeds\Modules\Universal\Images;

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
                'name'=>'Ver imagen',
                'url'=>'/drive.php/images/',
                'description'=>'Módulo para ver archivos de tipo imagen',
                'task'=>[
                    'key'=>'task.drive.images.view',
                    'name'=>'Ver archivos de tipo image',
                    'description'=>'Permitir ver archivos de tipo imagen',
                    'pattern'=>'read'
                ],
            ],
        ]);
        
    }
    
}
