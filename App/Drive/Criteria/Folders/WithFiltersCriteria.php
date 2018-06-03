<?php

namespace App\Drive\Criteria\Folders;

use Melisa\Laravel\Criteria\FilterCriteria;
use Melisa\Laravel\Criteria\ApplySort;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class WithFiltersCriteria extends FilterCriteria
{
    use ApplySort;
    
    public function apply($model, $repository, array $input = [])
    {        
        $builder = parent::apply($model, $repository, $input);
        
        $builder = $builder
            ->join('mimesTypes as mt', 'mt.id', '=', 'files.idMimeType')
            ->orderBy('mt.order', 'asc')
            ->where('mt.name', 'application/vnd.melisa-apps.folder')
            ->select([
                'files.*',
                'mt.iconCls',
                'mt.name as mimeType'
            ]);
        
        if( empty($input['sort'])) {
            $builder = $builder->orderBy('files.name', 'asc');
        } else {
            $builder = $this->applySort($builder, $input);
        }
        
        return $builder;        
    }
    
    public function overrideFilterIdFileParent($model, $filter)
    {
        return $model
            ->join('filesParents as fp', 'fp.idFile', 'files.id')
            ->where('fp.idFileParent', $filter->value);
    }
    
}
