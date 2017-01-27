<?php namespace App\Drive\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class FilesProperties extends BaseUuid
{
    
    protected $connection = 'drive';
    
    protected $table = 'FilesProperties';
    
    protected $fillable = [
        'id', 'idFile', 'key', 'isPublic', 'value'
    ];
    
    public $timestamps = false;
    
    /* incrementing */
    
}
