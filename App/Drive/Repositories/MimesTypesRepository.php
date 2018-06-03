<?php

namespace App\Drive\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class MimesTypesRepository extends Repository
{
    
    const MIME_FOLDER = 'application/vnd.melisa-apps.folder';
    
    public function model()
    {        
        return 'App\Drive\Models\MimesTypes';        
    }
    
    public function getFolder()
    {
        return $this->getModel()
            ->where('name', self::MIME_FOLDER)
            ->first();
    }
    
}
