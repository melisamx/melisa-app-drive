<?php namespace App\Drive\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class DataSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->call(Data\MimesTypesSeeder::class);
        $this->call(Data\UnitsSeeder::class);
        
    }
    
}
