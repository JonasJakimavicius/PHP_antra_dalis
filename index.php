<?php

require('functions/file.php');
require('classes/FileDB.php');
require ('classes/privateDB.php');




$array = [
    'table' => [
        0 => [
            'name' => 'Tomas',
            'surname' => 'Baravykas',
            'age' => '20',
        ],
        1 => [
            'name' => 'Adomas',
            'surname' => 'Baravinskas',
            'age' => '120',
        ],
        2 => [
            'name' => 'Martynas',
            'surname' => 'Baravykas',
            'age' => '28',
        ],
        4 => [
            'name' => 'Lomas',
            'surname' => 'Laravykas',
            'age' => '299',
        ],
        5 => [
            'name' => 'Tomas',
            'surname' => 'Baravykas',
            'age' => '25',
        ],
    ],
    'table2' => [
        [
            'asndjkasnd'
        ],
        [
            'asndkansjkd'
        ],
    ]
];



$index = new FileDB('/Users/home/Desktop/php projektai/text.txt');

$gerimas=new Drink();
$gerimas->set_name('Alus');
$gerimas->set_abarot(0.7);
$gerimas->set_amount(500);
$gerimas->set_image('https://www.barbora.lt/api/Images/GetInventoryImage?id=745450b8-147c-46e9-9870-90af17d7d5e6');


var_dump($gerimas->get_abarot());
var_dump($gerimas->get_amount());
var_dump($gerimas->get_name());
var_dump($gerimas->get_image());




