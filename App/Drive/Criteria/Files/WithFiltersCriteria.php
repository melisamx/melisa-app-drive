<?php

namespace App\Drive\Criteria\Files;

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
            ->leftJoin('filesParents as fp', 'fp.idFile', '=', 'files.id')
            ->orderBy('mt.order', 'asc')
            ->with('parent')
            ->select([
                'files.*',
                'mt.iconCls',
                'mt.name as mimeType'
            ]);
        
        if( !$this->existFilter('idFileParent', $input)) {
            $builder = $builder->whereNull('fp.id');
        }
        
        if( empty($input['sort'])) {
            $builder = $builder->orderBy('files.name', 'asc');
        } else {
            $builder = $this->applySort($builder, $input);
        }
        
        return $builder;        
    }
    
    public function overrideFilterIdFileParent($model, $filter)
    {
        return $model->where('fp.idFileParent', $filter->value);
    }
    
}
