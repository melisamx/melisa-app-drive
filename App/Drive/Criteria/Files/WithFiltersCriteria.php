<?php

namespace App\Drive\Criteria\Files;

use Melisa\Laravel\Criteria\FilterCriteria;
use Melisa\Repositories\Contracts\RepositoryInterface;
use Melisa\Laravel\Criteria\ApplySort;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class WithFiltersCriteria extends FilterCriteria
{
    use ApplySort;
    
    public function apply($model, RepositoryInterface $repository, array $input = [])
    {        
        $builder = parent::apply($model, $repository, $input);
        
        $builder = $builder
            ->join('mimesTypes as mt', 'mt.id', '=', 'files.idMimeType')
            ->orderBy('mt.order', 'asc')
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
    
}
