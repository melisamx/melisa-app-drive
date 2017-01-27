<?php namespace App\Drive\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class MimesTypesRepository extends Repository
{
    
    public function model() {
        
        return 'App\Drive\Models\MimesTypes';
        
    }
    
}
