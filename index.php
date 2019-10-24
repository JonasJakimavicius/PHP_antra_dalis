<?php

declare(strict_types=1);
require('functions/file.php');
require('classes/FileDB.php');
require('classes/drinks/Drink.php');
require('classes/sandwich/Sandwich.php');


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


$masyvas = [
    'name' => 'Alus',
    'amount' => 500,
    'abarotas' => 0.4,
    'url' => 'asas',
    'id' => 1

];


$masyvas2 = [
    'name' => 'naminis',
    'spiciness' => true,
    'price' => 0.4,
    'image' => 'asas',
    'vegan' => 1,
];

$gerimas = new Drink($masyvas);
$sumustinis = new Sandwich($masyvas2);

$gerimu_duomenys = new FileDB('/Users/home/Desktop/php projektai/gerimai.txt');

$maistai = $gerimu_duomenys->getData();
var_dump($maistai);

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nesamone</title>
    <style>
        .drinks-container {
            width: 100vw;
            height: 500px;

            display: block;
            margin: auto;
            margin-bottom: 20px;
        }

        .food-container {
            width: 100vw;
            height: 500px;
            display: block;
            margin-top: 100px;
        }

        .container {
            width: 200px;
            height: 300px;
            border: 1px solid black;
            display: inline-block;
            margin: auto;
            position: relative;
        }

        .img {
            width: 180px;
            height: 180px;
            position: absolute;
            top:0px;
        }

        .name {
            margin: auto;
            margin-top: 240px;
            width: 100px;
            text-align: center;

        }
    </style>
</head>
<body>
    <div class="drinks-container">
        <?php foreach ($maistai['gerimai'] as $maistas_id => $maistas): ?>
            <div class="container">
                <?php foreach ($maistas as $key => $value): ?>
                    <?php if ($key !== 'url' && $key !== 'id'): ?>
                        <div class="<?php print $key; ?>"><?php print $value; ?></div>
                    <?php elseif ($key === 'url') : ?>
                        <img class="img" src="  <?php print $value; ?>">
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="food-container">
        <?php foreach ($maistai['sumustiniai'] as $maistas_id => $maistas): ?>
            <div class="container">
                <?php foreach ($maistas as $key => $value): ?>
                    <?php if ($key !== 'image'): ?>
                        <div class=" <?php print $key; ?>"><?php print $value; ?></div>
                    <?php else: ?>
                        <img class= "img"src=" <?php print $value; ?>">
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
