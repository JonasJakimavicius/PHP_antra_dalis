<?php

require('functions/file.php');

class FileDB
{
    private $file_name;
    /** @var $data array Duomenu masyvas sugeneruotas is failo */
    private $data;

    /** Funkcija, kuri i klase paduoda failo pavadinima */
    public function __construct($file_name)
    {
        $this->file_name = $file_name;
    }

    /** Funkcija, kuri faila pavercia i masyva*/
    public function load()
    {
        $this->data = file_to_array($this->file_name);
    }

    public function setData($data_array)
    {
        $this->data=$data_array;
    }
}
