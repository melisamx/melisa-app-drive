<?php namespace App\Drive\Modules\Files\Phone;

use App\Core\Logics\Modules\Outbuildings;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class SelectModule extends Outbuildings
{
    
    public $event = 'drive.files.phone.select.access';
    
    public function dataDictionary() {
        
        return [
            'success'=>true,
            'assets'=>[
                $this->asset('app.drive.phone.browser.view')
            ],
            'data'=>[
                'modules'=>[
                    'files'=>$this->module('task.drive.files.paging'),
                ],
                'wrapper'=>[
                    'title'=>'Seleccionar archivos'
                ]
            ]
        ];
        
    }
    
}
