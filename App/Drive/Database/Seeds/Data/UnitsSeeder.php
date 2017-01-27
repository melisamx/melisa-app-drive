<?php namespace App\Drive\Database\Seeds\Data;

use Melisa\Laravel\Database\InstallSeeder;
use App\Drive\Models\Units;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class UnitsSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $identity = $this->findIdentity();
        
        Units::updateOrCreate([
            'name'=>'default',
        ], [
            'idIdentityCreated'=>$identity->id
        ]);
        
    }
    
}
