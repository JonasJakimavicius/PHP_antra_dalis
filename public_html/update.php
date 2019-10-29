<?php

require('../core/functions/file.php');
require('../bootloader.php');
require('../core/functions/form/core.php');
require('../core/functions/html/generators.php');

session_start();

var_dump($_SESSION);


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
            'value' => 'save',
            'name' => 'action'
        ],
        'button1' => [
            'type' => 'submit',
            'value' => 'cancel',
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

$modelDrinks = new \App\Drinks\Model();
$model_drinks_array = $modelDrinks->getDrinks();

foreach ($model_drinks_array as $drink_id => $drink) {

    if ($drink->getId() == $_SESSION['id']) {
        $key_of_updatable_drink = $drink_id;
    } else {
        false;
    }
}
$drink = $model_drinks_array[$key_of_updatable_drink];

if (get_form_action() === 'save') {
    $filtered_input = get_filtered_input($form);
    if (!empty($filtered_input)) {
        validate_form($form, $filtered_input);
    }

} elseif (get_form_action() === 'cancel') {
    header('Location:index.php');
}


function form_success($filtered_input, $form)
{
    $modelDrinks = new \App\Drinks\Model();
    $filtered_input['id'] = $_SESSION['id'];
    $drink = new \App\Drinks\Drink($filtered_input);
    $modelDrinks->updateDrink($drink);
}

function form_fail($filtered_input, &$form)
{
}


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
        <div class="bottle-container">
            <img alt="<?php $drink->getName(); ?>" src="<?php print $drink->getImage(); ?>">
            <div class='name'><?php print "Pavadinimas: {$drink->getName()}"; ?></div>
            <div class="abarot"><?php print"Laipsniai: {$drink->getAbarot()} %"; ?></div>
            <div class="Amount"><?php print "Turis {$drink->getAmount()} ml"; ?></div>
        </div>

    </div>


</body>
</html>

