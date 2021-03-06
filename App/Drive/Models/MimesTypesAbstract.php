<?php namespace App\Drive\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class MimesTypesAbstract extends Base
{
    
    protected $connection = 'drive';
    
    protected $table = 'MimesTypes';
    
    protected $fillable = [
        'id', 'name', 'iconCls', 'order'
    ];
    
    public $timestamps = false;
    
    public $incrementing = true;
    
}
