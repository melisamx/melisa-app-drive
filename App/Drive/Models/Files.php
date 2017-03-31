<?php namespace App\Drive\Models;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class Files extends FilesAbstract
{
    
    public function mime()
    {
        return $this->hasOne('App\Drive\Models\MimesTypes', 'id', 'idMimeType');
    }
    
    public function unit()
    {
        return $this->hasOne('App\Drive\Models\Units', 'id', 'idUnit');
    }
    
}
