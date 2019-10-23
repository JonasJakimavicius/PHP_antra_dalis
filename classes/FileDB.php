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

    public function getData()
    {
        return $this->data;
    }

    /**
     * Funkcija, kuri issaugo masyva i faila
     */
    public function save()
    {
        return array_to_file($this->data, $this->file_name);
    }

    /**
     * funkcija, kuri istraukia eilutes informacija is lenteles (masyva is masyvo)
     * @param $table - musu pasirinkta lentele (masyvas)
     * @param $row_id (eilute, kurios mums reik)
     * @return boolean - jei nurodytos lenteles nera - grazina false
     */
    public function getRow($table, $row_id)
    {
        if (isset($this->data[$table])) {
            foreach ($this->data[$table][$row_id] as $row) {
                print $row;
            }
        } else {
            return false;
        }
    }

    /**
     * funkcija, kuri ideda eilutes informacija i lentele (masyva i masyva
     * @param $table - musu pasirinkta lentele (masyvas)
     * @param $row -(eilute, kuria itraukiam i lentele (stringas, boolean, masyvas, whateva)
     * @return boolean - jei nurodytos lenteles nera, grazina false
     */
    public function addRow($table, $row)
    {
        if (isset($this->data[$table])) {
            $this->data[$table][] = $row;
        } else {
            return false;
        }
    }

    /**
     * funkcija, kuri pakeicia eilutes informacija lenteleje
     * @param $table - musu pasirinkta lentele (masyvas)
     * @param $row -(eilute, kuria itraukiam i lentele (stringas, boolean, masyvas, whateva)
     * @param $row_id indeksas, kuriuo esancia informacija norime perrasyti
     * @return boolean, jei nurodytu indeksu informacijos nera- grazina false
     */
    public function replaceRow($table, $row, $row_id)
    {
        if (isset($this->data[$table][$row_id])) {
            $this->data[$table][$row_id] = $row;
        } else {
            return false;
        }
    }

    /**
     * @param $table_name pavadinimas, kuriuo norime sukurti lentele (masyva)
     * @return bool jei lentele tokiu pavadinimu sukurta - grazina false
     */
    public function createTable($table_name)
    {
        if (!isset($this->data[$table_name])) {
            $this->data[$table_name] = [];
        } else {
            return false;
        }
    }

    /**
     * Funkcija, kuri pasako ar lentele egzistuoja ar ne
     * @param $table_name - lenteteles pavadinimas
     * @return boolean grazina ar yra tokia lentele ar ne
     */
    public function tableExists($table_name)
    {
        if (isset($this->data[$table_name])) {
            return true;
        }
        return false;
    }
}





