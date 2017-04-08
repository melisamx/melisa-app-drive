<?php namespace App\Drive\Database\Seeds\Modules\Universal;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class FilesPagingSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installModule([
            [
                'name'=>'Paginar lista de archivos',
                'url'=>'/drive.php/files/',
                'description'=>'Módulo para paginar lista de archivos',
                'task'=>[
                    'key'=>'task.drive.files.paging',
                    'name'=>'Paginar lista de archivos',
                    'description'=>'Permitir paginar lista de archivos',
                    'pattern'=>'read'
                ],
            ],
        ]);
        
    }
    
}
