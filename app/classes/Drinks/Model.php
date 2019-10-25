<?php



namespace App\Drinks;



class Model{
    private $db;
    private $table_name='drinks';

  public  function __construct()
  {
      $this->db=new \Core\FileDB(DB_FILE);
      $this->db->createTable($this->table_name);
  }

}
