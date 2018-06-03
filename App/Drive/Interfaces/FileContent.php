<?php

namespace App\Drive\Interfaces;

/**
 * File content string
 *
 * @author Luis Josafat Heredia Contreras
 */
class FileContent extends File
{
    
    protected $content;
    
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
    
    public function getContent()
    {
        return $this->content;
    }
    
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'content'=>$this->getContent()
        ]);
    }
    
}
