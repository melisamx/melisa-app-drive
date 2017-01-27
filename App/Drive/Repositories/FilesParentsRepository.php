<?php namespace App\Drive\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class FilesParentsRepository extends Repository
{
    
    public function model() {
        
        return 'App\Drive\Models\FilesParents';
        
    }
    
}
