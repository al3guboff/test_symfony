<?php
namespace AppBundle\Service;

class File
{
    protected $_path;
    protected $_documentRoot;
    public function __construct($path, $documentRoot)
    {
        $this->_path = $path;
        $this->_documentRoot = $documentRoot;

    }
    public function move($newPath)
    {
        $directory = dirname($newPath);
        if(!file_exists($directory)){
            throw new Exception("Directory $directory not exists");
        };
        rename($this->_path, $newPath);
        $this->_path = $newPath;
    }
    public function copy($newPath)
    {
        $directory = dirname($newPath);
        if(!file_exists($directory)){
            throw new Exception("Directory $directory not exists");
        };
        copy($this->_path, $newPath);
        $this->_path = $newPath;
    }
    public function getPath()
    {
        return $this->_path;
    }
    public function getUrl()
    {
        return str_replace($this->_documentRoot, '', $this->_path);
    }
}
