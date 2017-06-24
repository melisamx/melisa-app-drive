<?php 

namespace App\Drive\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
abstract class FilesParentsAbstract extends BaseUuid
{    
    protected $connection = 'drive';
    protected $table = 'filesParents';
    public $timestamps = false;
    /* incrementing */
    protected $fillable = [
        'id',
        'idFile',
        'idFileParent'
    ];    
}
