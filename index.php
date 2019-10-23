<?php

require('functions/file.php');
require('classes/FileDB.php');


$index = new FileDB('text.txt');


$array = [
    'table' => [
        0 => ['bla vla',
            'tmaklASD1',
            'SABJDSAJKD2',
        ],
        1 => [
            'asnkjana1',
            'jkasdkjasnd2',
            'bjasdsakjnd3'
        ],
        2 => [
            'nasndkasnd1',
            'audbiusdiu2',
        ],
        4 => ['asdnkasndkj',
            'naksdnjkasdnj'
        ]
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

$index = new FileDB('text.txt');
$index->load();
var_dump($index->createTable('ratai'));
var_dump($index->dropTable('ratai'));

var_dump($index->insertRow('table', ['idejau', 'bsabdjasbhd']));


var_dump($index->getData());






