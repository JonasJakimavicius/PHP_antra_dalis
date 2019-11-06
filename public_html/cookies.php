<?php


require('../bootloader.php');

$cookie=new \Core\Cookie('pacukas');


var_dump($cookie->read());

var_dump($cookie);

$array2=['vardas2'=>'tomas','pavarde2'=>'tomauskas'];

$cookie->save($array2);
var_dump($cookie->read());

$array3=['vardas3'=>'tomas','pavarde3'=>'tomauskas'];
$cookie->save($array3);
var_dump($_COOKIE);

$kukis=new \Core\Cookie('asas');
$array=['vardas'=>'tomas','pavarde'=>'tomauskas'];

$cookie->save($array);

var_dump($kukis->read());

$cookie->read();