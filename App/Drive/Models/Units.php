<?php namespace App\Drive\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class Units extends BaseUuid
{
    
    protected $connection = 'drive';
    
    protected $table = 'Units';
    
    protected $fillable = [
        'id', 'name', 'idIdentityCreated', 'active', 'versionActive', 'approvalRequired', 'totalFiles', 'createdAt', 'idIdentityUpdated', 'description', 'updatedAt'
    ];
    
    public $timestamps = true;
    
    /* incrementing */
    
}
