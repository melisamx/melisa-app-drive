<?php

namespace App\Drive\Interfaces;

/**
 * File interface
 *
 * @author Luis Josafat Heredia Contreras
 */
interface FileInterface
{
    
    public function getName();
    public function setName($name);
    public function getMimeType();
    public function setMimeType($mimeType);
    public function getExtension();
    public function setExtension($extension);
    public function getOrignalName();
    public function setOriginalName($originalName);
    public function toArray();
    
}
