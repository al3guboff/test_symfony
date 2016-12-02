<?php
namespace AppBundle\Model;
class ImageFile
{
    private $path;
    private $imageSize;
    public function __construct($path)
    {
        if(!file_exists($path)){
            throw new Exception("File $path not found");
        }
        if()
        $this->path = $path;
        $this->imageSize
    }
    public function getWidth()
    {

    }

}
