<?php

abstract class PassengerCar{

    protected $manufacturer;
    protected $model;
    protected $year;
    protected $wheel_count;
    protected $door_count;

    public function __construct($manufacturer,$model,$year,$wheel_count,$door_count)
    {
        $this->door_count=$door_count;
        $this->wheel_count=$wheel_count;
        $this->year=$year;
        $this->model=$model;
        $this->manufacturer=$manufacturer;
    }

    abstract public function drive();

    public function getWheels(){
        print "$this->model turi $this->wheel_count ratus";
    }

    public function getDoors(){
        print "$this->model turi $this->door_count duris";
    }

}

abstract class Toyota extends PassengerCar {

    public function __construct( $model, $year, $wheel_count, $door_count)
    {
        parent::__construct('Toyota', $model, $year, $wheel_count, $door_count);
    }

}

class Corolla extends Toyota{


    public function __construct( $year,$door_count)
    {
        parent::__construct('Corolla', $year, 4, $door_count);
    }

    public function drive()
    {
        print 'greitai';
    }
}

$corolla=new Corolla(1999,4);
$corolla->drive();
$corolla->getDoors();
$corolla->getWheels();
var_dump($corolla);