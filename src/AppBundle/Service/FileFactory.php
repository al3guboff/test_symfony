<?php
namespace AppBundle\Service;
use AppBundle\Service\File;
use AppBundle\Service\FileUpload;

class FileFactory
{
    protected $_rootDir;
    public function __construct($rootDir)
    {
        $this->_rootDir = $rootDir;
    }
    public function getFile($path)
    {
        return new File($path, $this->_rootDir);
    }
    public function getFileUpload($data, $uploadDir)
    {
        return new FileUpload($data['tmp_name'], $data['name'], $data['type'], $data['size'], $this->_rootDir . '/' . $uploadDir);
    }
}
