<?php

require('functions/file.php');
require('classes/FileDB.php');


$index = new FileDB('text.txt');


$array = [
    'table' => [
        ['bla vla',
            'tmaklASD1',
            'SABJDSAJKD2'
        ],
        [
            'asnkjana1',
            'jkasdkjasnd2',
            'bjasdsakjnd3'
        ],
        [
            'nasndkasnd1',
            'audbiusdiu2',
        ],
        ['asdnkasndkj',
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
var_dump($index->getData());






