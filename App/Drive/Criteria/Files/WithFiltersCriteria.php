<?php namespace App\Drive\Criteria\Files;

use Melisa\Laravel\Criteria\FilterCriteria;
use Melisa\Repositories\Contracts\RepositoryInterface;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class WithFiltersCriteria extends FilterCriteria
{
    
    public function apply($model, RepositoryInterface $repository, array $input = [])
    {
        
        $builder = parent::apply($model, $repository, $input);
        
        if( isset($input['query'])) {
            
            $builder = $builder->where('Firmas.nombre', 'like', '%' . $input['query'] . '%');
            
        }
        
        return $builder
            ->join('MimesTypes as mt', 'mt.id', '=', 'Files.idMimeType')
            ->orderBy('Files.name')
            ->select([
                'Files.*',
                'mt.iconCls'
            ]);
        
    }
    
}
