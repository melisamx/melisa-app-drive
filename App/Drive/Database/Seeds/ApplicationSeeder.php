<?php namespace App\Drive\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ApplicationSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installApplication('drive', [
            'name'=>'Drive',
            'description'=>'Application Drive',
            'nameSpace'=>'Melisa.drive',
            'typeSecurity'=>'art',
            'version'=>'1.0.4'
        ]);
        
    }
    
}
