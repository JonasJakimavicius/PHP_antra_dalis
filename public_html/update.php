<?php


require('../bootloader.php');


$form = [
    'attr' => [],
    'fields' => [
        'name' => [
            'type' => 'name',
            'label'=>'Name',
            'attr' => [
                'placeholder' => 'Pavadinimas',
            ],
            'validate' => [
                'validate_not_empty',

            ],
        ],
        'amount' => [
            'type' => 'number',
            'label'=>'Amount',
            'attr' => [
                'placeholder' => 'talpa',
            ],
            'validate' => [
                'validate_not_empty',
            ],
        ],
        'abarot' => [
            'type' => 'number',
            'label'=>'Laipsniai',
            'attr' => [
                'placeholder' => 'laipsniai',
            ],
            'validate' => [
                'validate_not_empty',
            ],
        ],
        'url' => [
            'type' => 'url',
            'label'=>'Paveikslelis',
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
            'value' => 'delete',
            'name' => 'action'
        ],
        'button2' => [
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
        $drink = $model_drinks_array[$drink_id];
    } else {
        false;
    }
}

//jei paspaudziu save- formos template veikia, kaip visada
if (get_form_action() === 'save') {
    $filtered_input = get_filtered_input($form);

    if (!empty($filtered_input)) {
        validate_form($form, $filtered_input);
    }
// Jei paspaudziu cancel - redirectina i index page.
} elseif (get_form_action() === 'cancel') {
    header('Location:index.php');
} elseif (get_form_action() === 'delete') {
    $modelDrinks->deleteDrink($drink);
}


// Jei visi imputai pilni ir paspaude save.
//Tai iskvieciamaa form success funkcija
function form_success($filtered_input, $form)
{
    $modelDrinks = new \App\Drinks\Model();
    $filtered_input['id'] = $_SESSION['id'];
    $drink = new \App\Drinks\Drink($filtered_input);
    $modelDrinks->updateDrink($drink);
    header('Location:index.php');
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
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/bottles.css" rel="stylesheet">
    <link href="css/update-form.css" rel="stylesheet">
</head>
<body>
    <?php require('../core/navbar.php'); ?>
    <div class="form-container">
        <?php require('../core/templates/form.tpl.php'); ?>
    </div>
    <h1>Selected drink</h1>
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

