<?php

namespace App\Drive\Logics\Files;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class BreadcumbsSenchaTransformer
{
    
    public function run(array $data)
    {
        if( !$data) {
            return  false;
        }
        
        $first = $data[0];
        $end = end($data);
        $result = [];
        foreach($data as $i=>$record) {
            if( isset($data[$i+1])) {
                $record->children = $data[$i+1];
            }
            $result []= $record;
        }
        dd($result);
    }
    
}
