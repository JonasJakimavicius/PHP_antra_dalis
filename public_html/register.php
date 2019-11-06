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

        'email' => [
            'type' => 'email',
            'label' => 'Email',
            'attr' => [
                'placeholder' => 'Emailas',
                'class' => 'email'
            ],
            'validate' => [
                'validate_not_empty',
                'validate_email',
                'validate_email_unique'

            ],
        ],
        'password' => [
            'type' => 'password',
            'label' => 'Slaptazodis',
            'attr' => [
                'placeholder' => 'password',
                'class' => 'password'
            ],
            'validate' => [
                'validate_not_empty',
                'validate_password'
            ],
        ],
        'password_repeat' => [
            'type' => 'password',
            'label' => 'Pakartokite slaptazodi',
            'attr' => [
                'placeholder' => 'password',
                'class' => 'password'
            ],
            'validate' => [
                'validate_not_empty',

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
        'validate_fields_match' => [
            'password',
            'password_repeat'
        ]

    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail',
    ],
];

if(isset($_SESSION['name'])){
    header('Location:index.php');
}

$filtered_input = get_filtered_input($form);

if (!empty($filtered_input)) {
    validate_form($form, $filtered_input);
}

function form_success($filtered_input, $form)
{
    $modelUsers = new \App\Users\Model();
    $user = new \App\Users\User($filtered_input);
    $modelUsers->insertUser($user);
//    header('Location:login.php');
}

function form_fail($filtered_input, &$form)
{
}


?>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/register-form.css" rel="stylesheet">


</head>
<body>
    <?php require('../core/navbar.php'); ?>
    <div class="form-container-bigger">
        <div class="form-container">
            <?php require('../core/templates/form.tpl.php'); ?>
        </div>
    </div>

</body>
</html>
