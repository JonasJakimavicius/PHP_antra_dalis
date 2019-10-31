<?php

require('../core/functions/file.php');
require('../bootloader.php');
require('../core/functions/form/core.php');
require('../core/functions/html/generators.php');

session_start();

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


$drink = $model_drinks_array[$_SESSION['id']];


//jei paspaudziu save- formos template veikia, kaip visada
if (get_form_action() === 'save') {
    $filtered_input = get_filtered_input($form);

    if (!empty($filtered_input)) {
        validate_form($form, $filtered_input);
    }
// Jei paspaudziu cancel - redirectina i index page.
} elseif (get_form_action() === 'cancel') {
    header('Location:index.php');
}


// Jei visi imputai pilni ir paspaude save.
//Tai iskvieciamaa form success funkcija
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


$form['fields']['name']['attr']['value'] = $drink->getName();
$form['fields']['abarot']['attr']['value'] = $drink->getAbarot();
$form['fields']['amount']['attr']['value'] = $drink->getAmount();
$form['fields']['url']['attr']['value'] = $drink->getImage();

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

