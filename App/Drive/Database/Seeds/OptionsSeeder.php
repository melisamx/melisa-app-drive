<?php namespace App\Drive\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class OptionsSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installOption('option.drive.access', [
            'name'=>'Option main de aplicación drive',
            'text'=>'Drive',
            'isSubMenu'=>true
        ]);
        
    }
    
}
