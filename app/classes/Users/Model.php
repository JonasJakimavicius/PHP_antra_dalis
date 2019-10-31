<?php


namespace App\Users;


use Core\FileDB;
use App\App;

class Model
{
    private $table_name = 'users';


    /**
     * Model constructor.
     * @param $db FileDB paduodamas FileDB objektas
     * Sukuria FileDB$App = new \App\App(); objekta su failu nurodytu config.php
     * Sukuria lentele FileDB objekte pagal modelyje nurodyta $table_name
     *
     */
    public function __construct()
    {
        App::$db->createTable($this->table_name);

    }

    /**
     * @param User $user
     * @return true or false
     * Konvertuoja User objekta i array ir iraso i lentele FileDB objekte.
     */
    public function insertUser(User $user)
    {
        return App::$db->insertRow($this->table_name, $user->getData());

    }

    /**
     * Suranda User objektus, kurie turi $conditions pateiktas savybes ir jas grazina naujame array su 'id' lygiais 'row_id'.
     * @param array $conditions
     * @return array
     */
    public function getUsers(array $conditions = [])
    {
        $user_array = App::$db->getRowsWhere($this->table_name, $conditions);
        $new_array = [];
        foreach ($user_array as $user_id => $user) {
            $user['id'] = $user['row_id'];
            $new_array[] = new User($user);
        }
        return $new_array;
    }

    /**
     * @param User $user
     * @return bool
     * paduodamas User objektas $user turi tureti 'id'.
     * Pagal ji mes perrasomas anksciau buves objektas su tuo id.
     */
    public function updateUser(User $user)
    {

        $user_array = $user->getData();
        return App::$db->updateRow($this->table_name, $user_array, $user_array['id']);

    }

    /**
     * @param User $user
     * @return bool
     * Panaudojus funkcija getUsers ir sukurus jai variable.
     * Sukamas foreach per sukurta variable ir foreach viduje iskvieciam sia funkcija.
     * Si funkcija istrina objekta User getUsers funkcija gautus objektus.
     */
    public function deleteUser(User $user)
    {
        return App::$db->deleteRow($this->table_name, $user->getId());
    }

    /**
     * @return bool
     * Funkcija istrina visus User objektus esancius lenteleje.
     */
    public function deleteAll()
    {
        return App::$db->truncateTable($this->table_name);

//                $users_array = $this->db->getData();

//        foreach ($users_array[$this->table_name] as $user_id => $user) {
//            $this->db->deleteRow($this->table_name, $user_id);
//        }
//
//        $users_array = $this->db->getData();
//        if (empty($users_array[$this->table_name])) {
//            return true;
//        }
//        return false;
    }


}

