<?php namespace App\Drive\Database\Seeds\Faker;

use Melisa\Laravel\Database\InstallSeeder;
use App\Drive\Models\Files;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class FilesSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->factory(Files::class)->create();
        
    }
    
}
