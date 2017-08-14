<?php

namespace App\Drive\Logics\Files;

use Melisa\core\LogicBusiness;
use App\Drive\Repositories\FilesRepository;

/**
 * Report file
 */
class ReportLogic
{
    use LogicBusiness;
    
    protected $repoFiles;

    public function __construct(
        FilesRepository $repoFiles
    )
    {
        $this->repoFiles = $repoFiles;
    }
    
    public function init($id)
    {
        $record = $this->repoFiles
            ->with([
                'mime',
                'unit',
            ])
            ->findOrFail($id);
        
        if( !$record) {
            return $this->error('Iposible obtener reporte de archivo');
        }
        
        return json_decode(json_encode($record->toArray()));
    }
    
}