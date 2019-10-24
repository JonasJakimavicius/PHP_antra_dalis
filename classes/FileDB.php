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
        $this->load();
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
     * @param $table_name string pavadinimas, kuriuo norime sukurti lentele (masyva)
     * @return bool jei lentele tokiu pavadinimu sukurta - grazina false
     */
    public function createTable($table_name)
    {
        if (!$this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
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

    /**
     * @param $table_name string lentles, kuria norime istrinti pavadinimas
     * @return mixed grazina ar istryne lentele ar ne
     */
    public function dropTable($table_name)
    {
        unset($this->data[$table_name]);
    }

    /**
     * Funkcija, kuri istustina lentele, bet jos neistrina
     * @param $table_name - lenteles, kuria norime istustini pavadinimas
     * @return bool rezultatas ar pavyko istustinti ar ne
     */
    public function truncateTable($table_name)
    {
        if ($this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }
        return false;

    }


    /**
     * funkcija, kuri nurodytu indeksu ideda eilute, o jei indeksas nenurodytas, ikisa i gala.
     * Jei eilute uzimta- grazina false
     * @param $table_name
     * @param $row
     * @param null $row_id
     * @return bool|int|null
     */
    public function insertRow($table_name, $row, $row_id = null)
    {
        if ($row_id === null) {
            $this->data[$table_name][] = $row;
            end($this->data[$table_name]);
            return $row_id = key($this->data[$table_name]);
        } else {
            if (isset($this->data[$table_name][$row_id])) {
                return false;
            } else {
                $this->data[$table_name][$row_id] = $row;
                return $row_id;
            }
        }

    }

    /**
     * funkcija, kuri patikrina ar eilute jau egzistuoja
     * @param $table_name
     * @param $row_id
     * @return bool
     */
    public function rowExists($table_name, $row_id)
    {
        if (isset($this->data[$table_name][$row_id])) {
            return true;
        }
        return false;

    }

    /**
     * Funkcija, kuri peraso eiute nurodytu  indeksu nauju masyvu.
     * @param $table_name
     * @param $row
     * @param $row_id
     * @return bool
     */
    public function updateRow($table_name, $row, $row_id)
    {
        if ($this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id] = $row;
            return true;
        }
        return false;

    }

    public function insertRowIfNotExists($table_name, $row, $row_id)
    {
        if (!$this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id] = $row;
            return $row_id;
        }
        return false;
    }

    /**
     * funkcija, kuri istrina eilute is lenteles pagal nurodyta indeksa.
     * @param $table_name
     * @param $row_id
     * @return bool
     */
    public function deleteRow($table_name, $row_id)
    {
        if ($this->rowExists($table_name, $row_id)) {
            unset($this->data[$table_name][$row_id]);
            return true;
        }
        return false;

    }

    /**
     * //     * funkcija, kuri istraukia eilutes informacija is lenteles (masyva is masyvo)
     * //     * @param $table - musu pasirinkta lentele (masyvas)
     * //     * @param $row_id (eilute, kurios mums reik)
     * //     * @return boolean - jei nurodytos lenteles nera - grazina false
     * //     */
    public function getRow($table, $row_id)
    {
        if ($this->rowExists($table, $row_id)) {
            return $this->data[$table][$row_id];
        }
        return false;
    }

    /**
     * Funkcija, kuri iesko lenteleje eiluciu, kuriu stulpeliu informacija sutampa su ta, kurios ieskome (pateikiame $conditions_array) Turi sutapti visi parametrai.
     * @param $table_name - lentele,is kurios norim issitraukti eilutes
     * @param $conditions_array - parametru masyvas, kuriame nurodyta pagal ka filtruojame
     * @return array|bool jei viskas ok, grazina nauja lentele, jei ne- grazina false.
     */
    public function getRowsWhere($table_name, $conditions_array)
    {
        if ($this->tableExists($table_name)) {
            $new_table = [];

            foreach ($this->data[$table_name] as $row_id => $row) {
                $success = true;
                foreach ($conditions_array as $condition_id => $condition) {

                    if ($row[$condition_id] !== $condition) {
                        $success = false;
                        break;
                    }
                }
                if ($success) {
                    $row['row_id'] = $row_id;
                    $new_table[$row_id] = $row;
                }
            }
            return $new_table;
        }
        return false;
    }

    public function __destruct()
    {
        $this->save();
    }

}





