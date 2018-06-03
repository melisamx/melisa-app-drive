<?php 

namespace App\Drive\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
abstract class UnitsAbstract extends BaseUuid
{    
    protected $connection = 'drive';
    protected $table = 'units';
    public $timestamps = true;
    /* incrementing */
    protected $fillable = [
        'id',
        'name',
        'idIdentityCreated',
        'active',
        'versionActive',
        'approvalRequired',
        'totalFiles',
        'source',
        'createdAt',
        'idIdentityUpdated',
        'description',
        'updatedAt'
    ];    
}
