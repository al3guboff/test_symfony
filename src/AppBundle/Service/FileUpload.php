<?php
namespace AppBundle\Service;
class FileUpload
{
    protected $_tempPath;
    protected $_filename;
    protected $_type;
    protected $_filesize;
    protected $_path;
    protected $_uploadDir;
    public function __construct($tempPath, $filename, $type, $filesize, $uploadDir)
    {
        if(!file_exists($tempPath)){
            throw new Exception("File '$tempPath' not found");
        };
        if(!is_uploaded_file($tempPath)){
            throw new Exception("File '$tempPath' not is uploaded");
        };
        if(!file_exists($uploadDir)){
            throw new Exception("Upload directory '$uploadDir' not found");
        };
        $this->_tempPath = $tempPath;
        $this->_filename = $filename;
        $this->_type = $type;
        $this->_filesize = $filesize;
        $this->_uploadDir = $uploadDir;
        $this->_path = $uploadDir . '/' . $filename;
    }
    public function move()
    {
        move_uploaded_file($this->_tempPath, $this->_path);
        return $this->_path;
    }
}
