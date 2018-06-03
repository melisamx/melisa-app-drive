<?php 

namespace App\Drive\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
abstract class MimesTypesAbstract extends Base
{    
    protected $connection = 'drive';
    protected $table = 'mimesTypes';
    public $timestamps = false;
    public $incrementing = true;
    protected $fillable = [
        'id',
        'name',
        'iconCls',
        'order'
    ];    
}
