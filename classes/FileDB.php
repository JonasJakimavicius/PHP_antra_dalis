<?php

class FileDB
{
    private $file_name;
    /** @var $data array Duomenu masyvas sugeneruotas is failo */
    private $data;

    /**
     * Funkcija, kuri i klase paduoda failo pavadinima
     */
    public function __construct($file_name)
    {
        $this->file_name = $file_name;
    }

    /**
     * Funkcija, kuri faila pavercia i masyva
     */
    public function load()
    {
        $this->data = file_to_array($this->file_name);
    }

    /**
     * Funkcija, kuri atnaujina masyva
     */
    public function setData($data_array)
    {
        $this->data = $data_array;
    }
    /**
     * Funkcija, kuri issaugo masyva i faila
     */
    public function save()
    {
        array_to_file($this->file_name, $this->data);
    }

}
