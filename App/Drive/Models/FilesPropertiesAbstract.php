<?php 

namespace App\Drive\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
abstract class FilesPropertiesAbstract extends BaseUuid
{    
    protected $connection = 'drive';
    protected $table = 'filesProperties';
    public $timestamps = false;
    /* incrementing */
    protected $fillable = [
        'id',
        'idFile',
        'key',
        'isPublic',
        'value'
    ];    
}
