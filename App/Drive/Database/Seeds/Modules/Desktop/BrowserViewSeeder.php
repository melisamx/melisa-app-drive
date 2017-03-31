<?php namespace App\Drive\Database\Seeds\Modules\Desktop;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class BrowserViewSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installModule([
            [
                'name'=>'Ver navegador de archivos',
                'url'=>'/drive.php/modules/browser/view',
                'description'=>'Módulo interfaz para ver navegador de archivos',
                'nameSpace'=>'Melisa.drive.view.desktop.browser.Wrapper',
                'task'=>[
                    'key'=>'task.drive.browser.view.access',
                    'name'=>'Acceso a ver navegador de archivos',
                    'description'=>'Permitir acceso a ver navegdor de archivos',
                    'pattern'=>'access'
                ],
                'option'=>[
                    'key'=>'option.drive.browser.view.access',
                    'name'=>'Opción para ver navegador de archivos',
                    'text'=>'Navegador de archivos',
                    'iconClassSmall'=>'x-fa fa fa-hdd-o',
                    'iconClassMedium'=>'x-fa fa-hdd-o',
                    'iconClassLarge'=>'x-fa fa fa-hdd-o',
                ],
                'event'=>[
                    'key'=>'event.drive.browser.view.access',
                    'description'=>'Acceso al módulo navegador de archivos'
                ]
            ],
        ]);
        
        $this->installAssetCss('app.drive.browser.view', [
            'name'=>'CSS ver navegador de archivos',
            'path'=>'/drive/css/browser-view.css',
        ]);
        
    }
    
}
