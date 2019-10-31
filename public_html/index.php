<?php

require('../core/functions/file.php');
require('../bootloader.php');
require('../core/functions/form/core.php');
require('../core/functions/html/generators.php');

use App\App;

$modelDrinks = new \App\Drinks\Model();

$vodke1 = [
    'name' => 'pobeda',
    'abarot' => 0.55,
    'amount' => 700,
    'url' => 'https://www.vynoguru.lt/media/catalog/product/cache/2/image/800x600/9df78eab33525d08d6e5fb8d27136e95/l/i/lithuanian_vodka_originali_1_l.jpg',
];
$vodke2 = [
    'name' => 'svaboda',
    'abarot' => 0.22,
    'amount' => 990,
    'url' => 'https://www.vynoguru.lt/media/catalog/product/cache/2/image/800x600/9df78eab33525d08d6e5fb8d27136e95/4/7/4770033221395_degtine_lithuanian_vodka_auksine_0_7l2.jpg',
];
$vodke3 = [
    'name' => 'asdnajksd',
    'abarot' => 0.44,
    'amount' => 1160,
    'url' => 'https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjem9P7977lAhXvwqYKHUW1B5MQjRx6BAgBEAQ&url=https%3A%2F%2Fwww.vynomeka.lt%2Fuzpiltiniu-degtine-07-l&psig=AOvVaw3kWRhV64KRLPdF3YKuRrQs&ust=1572351424135494',
];
$vodke4 = [
    'name' => 'svabodnaja',
    'abarot' => 0.22,
    'amount' => 990,
    'url' => 'https://images.kainos24.lt/6423/75/stumbras-vodka-tyra-0-5-l.jpg',
];

//$drink1 = new \App\Drinks\Drink($vodke1);
//$drink2 = new \App\Drinks\Drink($vodke2);
//$drink3 = new \App\Drinks\Drink($vodke3);
//$drink4 = new \App\Drinks\Drink($vodke4);
//$modelDrinks->insertDrink($drink1);
//$modelDrinks->insertDrink($drink2);
//$modelDrinks->insertDrink($drink3);
//$modelDrinks->insertDrink($drink4);

$form = [
    'attr' => [],
    'fields' => [
        'name' => [
            'type' => 'name',
            'attr' => [
                'placeholder' => 'Pavadinimas',
            ],
            'validate' => [
                'validate_not_empty',
            ],
        ],
        'amount' => [
            'type' => 'number',
            'attr' => [
                'placeholder' => 'talpa',
            ],
            'validate' => [
                'validate_not_empty',
            ],
        ],
        'abarot' => [
            'type' => 'number',
            'attr' => [
                'placeholder' => 'laipsniai',
            ],
            'validate' => [
                'validate_not_empty',
            ],
        ],
        'url' => [
            'type' => 'url',
            'attr' => [
                'placeholder' => 'Paveikslelio nuoroda',
            ],
            'validate' => [
                'validate_not_empty',
            ],
        ],
        'select' => [
            'type' => 'select',
            'options' => [
            ],
            'attr' => [
                'placeholder' => 'Paveikslelio nuoroda',
            ],
            'validate' => [
                'validate_not_empty',
            ],
        ],
    ],
    'buttons' => [
        'button' => [
            'type' => 'submit',
            'value' => 'submit',
            'name' => 'action'
        ],
        'button1' => [
            'type' => 'submit',
            'value' => 'delete',
            'name' => 'action'
        ],
        'button2' => [
            'type' => 'submit',
            'value' => 'update',
            'name' => 'action'
        ],
    ],
    'validators' => [

    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail',
    ],
];

foreach ($modelDrinks->getDrinks() as $drink) {
    $form['fields']['select']['options'][$drink->getId()] = $drink->getName();
}

if (get_form_action() === 'submit') {
    $filtered_input = get_filtered_input($form);

    if (!empty($filtered_input)) {
        validate_form($form, $filtered_input);
    }

} elseif (get_form_action() === 'delete') {
    $modelDrinks->deleteAll();

} elseif (get_form_action() === 'update') {
    session_start();
    $filtered_input = get_filtered_input($form);
    $_SESSION = [
        'id' => $filtered_input['select'],
    ];
    header('Location:update.php');
}

function form_success($filtered_input, $form)
{
    $modelDrinks = new \App\Drinks\Model();
    $drink = new \App\Drinks\Drink($filtered_input);
    $modelDrinks->insertDrink($drink);
}

function form_fail($filtered_input, &$form)
{
}

//$user=[
//        'name'=>'Tadas',
//    'email'=>'tomas@qqq',
//    'password'=>'asnasndia',];
//
//$users=new \App\Users\User($user);
//$modelUsers=new \App\Users\Model();
//$modelUsers->insertUser($users);
//var_dump($modelUsers->getUsers());




?>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        .container {
            width: 90vw;
            height: 300px;
            margin: auto;
        }

        .bottle-container {
            width: 20%;
            height: 300px;
            display: inline-block;
            margin: auto;
        }

        img {

            height: 80%;
            overflow: hidden;

        }

        .name {
            width: 60%;
            display: block;
            margin: auto;
            text-align: center;
        }

        .abarot {
            width: 60%;
            display: block;
            margin: auto;
            text-align: center;
        }

        .Amount {
            width: 60%;
            display: block;
            margin: auto;
            text-align: center;
        }

        .form-container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <?php require('../core/templates/form.tpl.php'); ?>
    </div>
    <div class="container">
        <?php foreach ($modelDrinks->getDrinks() as $drink_id => $drink): ?>
            <div class="bottle-container">
                <img alt="<?php $drink->getName(); ?>" src="<?php print $drink->getImage(); ?>">
                <div class='name'><?php print "Pavadinimas: {$drink->getName()}"; ?></div>
                <div class="abarot"><?php print"Laipsniai: {$drink->getAbarot()} %"; ?></div>
                <div class="Amount"><?php print "Turis {$drink->getAmount()} ml"; ?></div>
            </div>
        <?php endforeach; ?>
    </div>


</body>
</html>



