<?php 

namespace App\Drive\Models;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class FilesParents extends FilesParentsAbstract
{
    
    public function fileParent()
    {
        return $this->hasOne('App\Drive\Models\Files', 'id', 'idFileParent');
    }
    
}
