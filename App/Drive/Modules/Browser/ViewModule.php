<?php namespace App\Drive\Modules\Browser;

use App\Core\Logics\Modules\Outbuildings;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ViewModule extends Outbuildings
{
    
    public function dataDictionary() {
        
        return [
            'success'=>true,
            'assets'=>[
                $this->asset('app.drive.browser.view')
            ],
            'data'=>[
                'token'=>csrf_token(),
                'modules'=>[
                    'files'=>$this->module('task.drive.files.paging'),
                ],
                'wrapper'=>[
                    'title'=>'Navegador de archivos'
                ]
            ]
        ];
        
    }
    
}
