<?php

require('../core/functions/file.php');
require('../bootloader.php');


$vodke1 = [
    'name' => 'svaboda',
    'abarot' => 0.55,
    'amount' => 700,
    'url' => 'https://hips.hearstapps.com/vader-prod.s3.amazonaws.com/1551803518-smirnoff-new-no-21-bottle-final-1551803504.png',
];
$vodke2 = [
    'name' => 'svaboda',
    'abarot' => 0.22,
    'amount' => 990,
    'url' => 'hzopa',
];

$vodkes3 = [
    'name' => 'svaboda',
    'abarot' => 0.44,
    'amount' => 1100,
    'url' => 'ragas',
    'id' => 1,
];


$modelDrinks = new \App\Drinks\Model();


$drink1 = new \App\Drinks\Drink($vodke1);
$drink2 = new \App\Drinks\Drink($vodke2);
$drink3 = new \App\Drinks\Drink($vodkes3);

$modelDrinks->insertDrink($drink1);
$modelDrinks->insertDrink($drink2);
$modelDrinks->insertDrink($drink3);


//var_dump($modelDrinks->getDrinks(['name' => 'svaboda']));
//var_dump($modelDrinks->updateDrink($drink3));
//var_dump($modelDrinks->getDrinks(['name' => 'svaboda']));


//var_dump($unlucky = $modelDrinks->getDrinks(['amount' => 1100]));
//foreach ($unlucky as $drink) {
//    var_dump($modelDrinks->deleteDrink($drink));
//}
var_dump($modelDrinks);

var_dump($modelDrinks->deleteAll());
var_dump($modelDrinks->getDrinks(['name' => 'svaboda']));


