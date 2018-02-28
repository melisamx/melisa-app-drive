<?php

namespace App\Drive\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class UnitsRepository extends Repository
{
    
    public function model()
    {        
        return 'App\Drive\Models\Units';        
    }
    
    public function getUnitDefault()
    {
        return $this->getModel()
            ->first();
    }
    
}
