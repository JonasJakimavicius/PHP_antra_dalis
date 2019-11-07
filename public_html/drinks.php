<?php


require('../bootloader.php');



$modelDrinks = new \App\Drinks\Model();

$form = [
    'attr' => [],
    'fields' => [
        'select' => [
            'type' => 'select',
            'label' => 'Ka gersi?',
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
            'value' => 'Atsigerti',
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


$filtered_input = get_filtered_input($form);

if (!empty($filtered_input)) {
    validate_form($form, $filtered_input);
}


function form_success($filtered_input, $form)
{
    $modelDrinks = new \App\Drinks\Model();
    $drinks_array = $modelDrinks->getDrinks();
    foreach ($drinks_array as $drink_id => $drink) {

        if ($drink->getId() == $filtered_input['select']) {
            $selected_drink = $drinks_array[$drink_id];
        }
    }
    $selected_drink->drink();
    $selected_drink->getAmount() <= 0 ? $modelDrinks->deleteDrink($selected_drink) && header('Location:drinks.php') : $modelDrinks->updateDrink($selected_drink);

}

function form_fail($filtered_input, &$form)
{
}

$form_template = new \Core\View($form);
$navbar = new \App\Views\NavBar();

?>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="css/index-form.css" rel="stylesheet">
    <link href="css/bottles.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/drinks.css" rel="stylesheet">
</head>
<body>
    <?php print  $navbar->render('../core/templates/navbar.tpl.php'); ?>

    <div class="form-container">
        <?php print $form_template->render('/Users/home/Desktop/php projektai/core/templates/form.tpl.php'); ?>
    </div>

    <div class="container">
        <?php foreach ($modelDrinks->getDrinks() as $drink_id => $drink): ?>
            <div class="bottle-container">
                <img alt="<?php $drink->getName(); ?>" src="<?php print $drink->getImage(); ?>">
                <div class="text-container">
                    <div class=' name'><?php print "Pavadinimas: {$drink->getName()}"; ?></div>
                    <div class="abarot"><?php print"Laipsniai: {$drink->getAbarot()} %"; ?></div>
                    <div class="Amount"><?php print "Turis {$drink->getAmount()} ml"; ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>



