<?php

namespace App\Drive\Providers;

use Melisa\Laravel\Providers\AppServiceProvider as BaseAppServiceProvider;
use Laravel\Passport\Passport;

/**
 * 
 * @author Luis Josafat Heredia Contreras
 */
class AppServiceProvider extends BaseAppServiceProvider
{
        
    public function register()
    {
        Passport::ignoreMigrations();
    }
    
}
