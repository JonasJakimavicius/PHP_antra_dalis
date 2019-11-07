<?php


require('../bootloader.php');


use App\App;


$form = [
    'attr' => [],
    'fields' => [
        'name' => [
            'type' => 'text',
            'label' => 'Name',
            'attr' => [
                'placeholder' => 'Vardas',
                'class' => 'name'
            ],
            'validate' => [
                'validate_not_empty',
            ],
        ],
        'password' => [
            'type' => 'password',
            'label' => 'Password',
            'attr' => [
                'placeholder' => 'password',
                'class' => 'password'
            ],
            'validate' => [
                'validate_not_empty',
                'validate_password'
            ],
        ],
    ],
    'buttons' => [
        'button' => [
            'type' => 'submit',
            'value' => 'register',
            'name' => 'action'
        ],
    ],
    'validators' => [
            'validate_login'

    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail',
    ],
];

if (isset($_SESSION['name'])) {
    header('Location:index.php');
}

$filtered_input = get_filtered_input($form);

if (!empty($filtered_input)) {
    validate_form($form, $filtered_input);
}


function form_success($filtered_input, $form)
{
    $_SESSION = [
        'name' => $filtered_input['name'],
        'password' => $filtered_input['password'],
    ];
    header('Location:index.php');
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
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
    <?php print  $navbar->render(); ?>

        <div class="form-container">
            <?php print $form_template->render('/Users/home/Desktop/php projektai/core/templates/form.tpl.php'); ?>
        </div>


</body>
</html>