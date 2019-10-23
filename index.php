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
$index->load();
var_dump($index->getData());
?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php $index->load();?>
    <div><?php $index->getRow('table', 1);?></div>
</body>
</html>




