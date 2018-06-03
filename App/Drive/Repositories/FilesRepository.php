<?php

namespace App\Drive\Repositories;

use Melisa\Repositories\Eloquent\Repository;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class FilesRepository extends Repository
{
    
    public function model()
    {        
        return 'App\Drive\Models\Files';        
    }
    
    public function withDetail($id)
    {
        return $this->getModel()
            ->with([
                'mime',
                'unit',
                'parent'=>function($query) {
                    $query->with('fileParent');
                },
            ])
            ->find($id);
    }
    
}
