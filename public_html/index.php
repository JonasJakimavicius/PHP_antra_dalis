<?php


require('../bootloader.php');


$modelDrinks = new \App\Drinks\Model();

$form = [
    'attr' => [],
    'fields' => [
        'name' => [
            'type' => 'name',
            'label' => 'Name',
            'attr' => [
                'placeholder' => 'Pavadinimas',
            ],
            'validate' => [
                'validate_not_empty',
            ],
        ],
        'amount' => [
            'type' => 'number',
            'label' => 'Amount',
            'attr' => [
                'placeholder' => 'talpa',
            ],
            'validate' => [
                'validate_not_empty',
            ],
        ],
        'abarot' => [
            'type' => 'number',
            'label' => 'Laipsniai',
            'attr' => [
                'placeholder' => 'laipsniai',
            ],
            'validate' => [
                'validate_not_empty',
            ],
        ],
        'url' => [
            'type' => 'url',
            'label' => 'Nuotrauka',
            'attr' => [
                'placeholder' => 'Paveikslelio nuoroda',
            ],
            'validate' => [
                'validate_not_empty',
            ],
        ],
        'select' => [
            'type' => 'select',
            'label' => 'Pasirinkite, ka redaguosite',
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

if (!empty($_SESSION['name'])) {
    $modelUsers = new \App\Users\Model();
    $users_array = $modelUsers->getUsers();
    foreach ($users_array as $user) {
        if ($user->getName() == $_SESSION['name']) {
            if ($user->getPassword() == $_SESSION['password']) {
                $all_gud = true;
                break;

            }
        }
    }
}
if (get_form_action() === 'submit') {
    $filtered_input = get_filtered_input($form);

    if (!empty($filtered_input)) {
        validate_form($form, $filtered_input);
    }

} elseif (get_form_action() === 'delete') {
    $modelDrinks->deleteAll();

} elseif (get_form_action() === 'update') {

    $filtered_input = get_filtered_input($form);
    $_SESSION['id'] = $filtered_input['select'];
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
</head>
<body>

    <?php print  $navbar->render(); ?>
    <?php if (isset($all_gud)): ?>
        <div class="form-container">

            <?php print $form_template->render('/Users/home/Desktop/php projektai/core/templates/form.tpl.php'); ?>
        </div>
    <?php endif; ?>


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



