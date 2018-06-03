<?php 

namespace App\Drive\Models;

use Melisa\Laravel\Models\Base;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
abstract class MigrationsAbstract extends Base
{    
    protected $connection = 'drive';
    protected $table = 'migrations';
    public $timestamps = false;
    public $incrementing = true;
    protected $fillable = [
        'id',
        'migration',
        'batch'
    ];    
}
