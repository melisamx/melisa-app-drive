<?php

namespace App\Drive\Database\Seeds\Modules;

use Illuminate\Database\Seeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ModulesDesktopSeeder extends Seeder
{
    
    public function run()
    {        
        $this->call(Desktop\BrowserViewSeeder::class);
        $this->call(Desktop\Files\SelectSeeder::class);        
    }
    
}
