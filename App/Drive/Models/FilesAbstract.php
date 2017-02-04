<?php namespace App\Drive\Models;

use Melisa\Laravel\Models\BaseUuid;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
abstract class FilesAbstract extends BaseUuid
{
    
    protected $connection = 'drive';
    
    protected $table = 'Files';
    
    protected $fillable = [
        'id', 'idMimeType', 'idUnit', 'idIdentityCreated', 'name', 'starred', 'trashed', 'shared', 'editing', 'size', 'md5Checksum', 'fileExtension', 'originalFilename', 'version', 'createdAt', 'idIdentityUpdated', 'updatedAt'
    ];
    
    public $timestamps = true;
    
    /* incrementing */
    
}
