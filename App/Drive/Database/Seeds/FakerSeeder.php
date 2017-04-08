<?php namespace App\Drive\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class FakerSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->call(Faker\FilesSeeder::class);
        
    }
    
}
