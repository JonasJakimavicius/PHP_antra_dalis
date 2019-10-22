<?php

require ('classes/FileDB.php');

class Car
{

    public $marke;
    public $modelis;
    public $color;
    public $metai;
    private $fuel;

    function __construct($marke, $modelis, $color)
    {
        $this->marke = $marke;
        $this->modelis = $modelis;
        $this->color = $color;
        $this->fuel=0;
    }

    function addFuel($amount){
        $this->fuel+=$amount;
    }

}



$toyota=new Car('Toyota', 'Avensis', "raudonas");
$toyota->metai='2011';
$toyota->addFuel(5);
var_dump($toyota);


$Kia=new Car('Kia', 'Sportage', "raudonas");
$Kia->metai='2018';
$Kia->addFuel(29);
var_dump($Kia);

