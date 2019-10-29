<?php


namespace App\Drinks;


use Core\FileDB;

class Model
{
    private $db;
    private $table_name = 'drinks';


    /**
     * Model constructor.
     * @param $db FileDB paduodamas FileDB objektas
     * Sukuria FileDB objekta su failu nurodytu config.php
     * Sukuria lentele FileDB objekte pagal modelyje nurodyta $table_name
     *
     */
    public function __construct( $db)
    {
        $this->db = $db;
        $this->db->createTable($this->table_name);

    }

    /**
     * @param Drink $drink
     * @return true or false
     * Konvertuoja Drink objekta i array ir iraso i lentele FileDB objekte.
     */
    public function insertDrink(Drink $drink)
    {
        return $this->db->insertRow($this->table_name, $drink->getData());

    }

    /**
     * Suranda Drink objektus, kurie turi $conditions pateiktas savybes ir jas grazina naujame array su 'id' lygiais 'row_id'.
     * @param array $conditions
     * @return array
     */
    public function getDrinks(array $conditions=[])
    {
        $array = $this->db->getRowsWhere($this->table_name, $conditions);
        $new_array = [];
        foreach ($array as $object_id => $object) {
            $object['id'] = $object['row_id'];
            $new_array[] = new Drink($object);
        }
        return $new_array;
    }

    /**
     * @param Drink $drink
     * @return bool
     * paduodamas Drink objektas $drink turi tureti 'id'.
     * Pagal ji mes perrasomas anksciau buves objektas su tuo id.
     */
    public function updateDrink(Drink $drink)
    {

        $drink_array = $drink->getData();
        return $this->db->updateRow($this->table_name, $drink_array, $drink_array['id']);

    }

    /**
     * @param Drink $drink
     * @return bool
     * Panaudojus funkcija getDrinks ir sukurus jai variable.
     * Sukamas foreach per sukurta variable ir foreach viduje iskvieciam sia funkcija.
     * Si funkcija istrina objekta Drink getDrinks funkcija gautus objektus.
     */
    public function deleteDrink(Drink $drink)
    {

        return $this->db->deleteRow($this->table_name, $drink->getId());
    }

    /**
     * @return bool
     * Funkcija istrina visus Drink objektus esancius lenteleje.
     */
    public function deleteAll()
    {
        return $this->db->truncateTable($this->table_name);

//                $drinks_array = $this->db->getData();

//        foreach ($drinks_array[$this->table_name] as $drink_id => $drink) {
//            $this->db->deleteRow($this->table_name, $drink_id);
//        }
//
//        $drinks_array = $this->db->getData();
//        if (empty($drinks_array[$this->table_name])) {
//            return true;
//        }
//        return false;
    }


}

