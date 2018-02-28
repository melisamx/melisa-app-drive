<?php

namespace App\Drive\Database\Seeds\Modules;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ModulesUniversalSeeder extends InstallSeeder
{
    
    public function run()
    {        
        $this->call(Universal\FilesPagingSeeder::class);
        $this->call(Universal\Files\ViewSeeder::class);
        $this->call(Universal\Images\ViewSeeder::class);
        $this->call(Universal\Files\PublicSeeder::class);
        $this->folders();
    }
    
    public function folders()
    {
        $this->installModuleJson('Universal/Folders', [
            'create',
        ]);
    }
    
}
