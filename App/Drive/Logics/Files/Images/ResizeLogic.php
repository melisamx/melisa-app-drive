<?php namespace App\Drive\Logics\Files\Images;

use Melisa\core\LogicBusiness;
use App\Drive\Logics\Files\ViewLogic;
use App\Tools\Logics\Image\ResizeLogic as ToolResizeLogic;

/**
 * View image resize
 *
 * @author Luis Josafat Heredia Contreras
 */
class ResizeLogic
{
    use LogicBusiness;
    
    protected $viewLogic;
    protected $imageResize;

    public function __construct(ViewLogic $viewLogic, ToolResizeLogic $imageResize) {
        $this->viewLogic = $viewLogic;
        $this->imageResize = $imageResize;
    }
    
    public function init($id, $width, $height)
    {
        
        $file = $this->viewLogic->init($id);
        
        if( !$file) {
            return false;
        }
        
        return $this->resizeFile($file, $width, $height);
        
    }
    
    public function resizeFile($file, $width, $height)
    {
        
        $result = $this->imageResize
                ->init([
                    'pathFile'=>$file['path'], 
                    'width'=>$width, 
                    'height'=>$height
                ]);
        
        if( !$result) {
            return false;
        }
        
        $file ['path']= $result;
        return $file;
        
    }
    
    
}
