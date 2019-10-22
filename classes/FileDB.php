<?php

class FileDB
{

    private $file_name;

    public function __construct($file_name)
    {
        $this->file_name = $file_name;
    }
}

$index = new FileDB('index.php');

var_dump($index);