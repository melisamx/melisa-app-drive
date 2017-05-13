<?php namespace App\Drive\Modules\Desktop\Files;

use App\Core\Logics\Modules\Outbuildings;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class SelectModule extends Outbuildings
{
    
    public $event = 'drive.files.select.access';
    
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
                    'imagesView'=>$this->module('task.drive.images.view'),
                ],
                'wrapper'=>[
                    'title'=>'Seleccionar archivos'
                ]
            ]
        ];
        
    }
    
}
