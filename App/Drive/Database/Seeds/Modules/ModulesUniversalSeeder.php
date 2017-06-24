<?php

namespace App\Drive\Database\Seeds\Modules;

use Illuminate\Database\Seeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ModulesUniversalSeeder extends Seeder
{
    
    public function run()
    {        
        $this->call(Universal\FilesPagingSeeder::class);
        $this->call(Universal\Files\ViewSeeder::class);
        $this->call(Universal\Images\ViewSeeder::class);
        $this->call(Universal\Files\PublicSeeder::class);        
    }
    
}
