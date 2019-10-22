<?php

require('functions/file.php');

class FileDB
{
    private $file_name;
    private $data;

    public function __construct($file_name)
    {
        $this->file_name = $file_name;
    }

    public function load()
    {
        $this->data = file_to_array($file_name);
    }
}
