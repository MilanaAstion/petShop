<?php
namespace App\Helpers;

class Image {
    public $file;
    public $fileName;
    public $maxSize;
    public $validExt;
    public $fileExt;

    public function __construct($file, $max_size, $valid_ext)
    {
        //dd($file);
        $this->file = $file;
        $this->maxSize = $max_size;
        $this->validExt = $valid_ext;
    }

    public function upload($dir)
    {
        $this->checkFile();
        $this->checkSize();
        $this->getExtension();
        $this->checkExtension();
        $this->createNewName();
        $this->moveFile($dir);
    }

    private function checkFile()
    {
        if($this->file['error'] == UPLOAD_ERR_NO_FILE){
            throw new \Exception('file_exit');
        }
    }

    public function checkSize()
    {
        if($this->file["size"] > $this->maxSize)
        {
            throw new \Exception('file_size');
        }
    }

    private function getExtension()
    {
        $ext = pathinfo($this->file['name'],PATHINFO_EXTENSION);
        //dd($this->file);
        $this->fileExt = strtolower($ext);
    }

    public function checkExtension()
    {
        //dd($this->fileExt);
        if(!in_array($this->fileExt, $this->validExt)){
            throw new \Exception('file_type');
        }
    }

    public function createNewName()
    {
        $this->fileName = time() . '.' . $this->fileExt;
    }

    public function moveFile($dir)
    {
        $path = $dir . $this->fileName;
        move_uploaded_file($this->file['tmp_name'], $path);
    }

}