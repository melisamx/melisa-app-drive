<?php namespace App\Drive\Database\Seeds\Modules;

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
        
    }
    
}
