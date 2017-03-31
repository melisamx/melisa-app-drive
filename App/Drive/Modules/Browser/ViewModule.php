<?php namespace App\Drive\Modules\Browser;

use App\Core\Logics\Modules\Outbuildings;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ViewModule extends Outbuildings
{
    
    public $event = 'drive.browser.view.access';
    
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
                    'filesView'=>$this->module('task.drive.files.view'),
                ],
                'wrapper'=>[
                    'title'=>'Navegador de archivos'
                ]
            ]
        ];
        
    }
    
}
