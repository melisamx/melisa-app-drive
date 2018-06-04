<?php

namespace App\Drive\Database\Seeds\Modules;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ModulesApiSeeder extends InstallSeeder
{
    
    public function run()
    {
        $this->files();
    }
    
    public function files()
    {
        $this->installModuleJson('Api/Files', [
            'upload',
        ]);
    }
    
}
