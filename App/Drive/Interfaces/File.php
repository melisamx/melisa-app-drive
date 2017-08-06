<?php

namespace App\Drive\Interfaces;

/**
 * File abstract
 *
 * @author Luis Josafat Heredia Contreras
 */
class File implements FileInterface
{
    
    protected $name;
    protected $mimeType;
    protected $originalName;
    protected $extension;
    
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
        return $this;
    }
    
    public function getMimeType()
    {
        return $this->mimeType;
    }
    
    public function getOrignalName()
    {
        return $this->originalName;
    }
    
    public function setOriginalName($originalName)
    {
        $this->originalName = $originalName;
        return $this;
    }
    
    public function getExtension()
    {
        return $this->extension;
    }
    
    public function setExtension($extension)
    {
        $this->extension = $extension;
        return $this;
    }
    
    public function toArray()
    {
        return [
            'name'=>$this->getName(),
            'originalFilename'=>$this->getOrignalName(),
            'fileExtension'=>$this->getExtension(),
            'mimeType'=>$this->getMimeType(),
            'content'=>$this->getContent(),
        ];
    }
    
}
