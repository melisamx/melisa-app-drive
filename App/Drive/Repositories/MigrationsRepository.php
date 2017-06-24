<?php

namespace App\Drive\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class MigrationsRepository extends Repository
{
    
    public function model()
    {        
        return 'App\Drive\Models\Migrations';        
    }
    
}
