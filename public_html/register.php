<?php

require('../core/functions/file.php');
require('../bootloader.php');
require('../core/functions/form/core.php');
require('../core/functions/html/generators.php');


use App\App;


$form = [
    'attr' => [],
    'fields' => [
        'name' => [
            'type' => 'text',
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
            'attr' => [
                'placeholder' => 'Emailas',
                'class' => 'email'
            ],
            'validate' => [
                'validate_not_empty',
                'validate_email'

            ],
        ],
        'password' => [
            'type' => 'password',
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
        'validate_fields_match'=>[
            'password',
            'password_repeat'
        ]

    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail',
    ],
];


$filtered_input = get_filtered_input($form);

if (!empty($filtered_input)) {
    validate_form($form, $filtered_input);
}


function form_success($filtered_input, $form)
{
    $modelUsers = new \App\Users\Model();
    $user = new \App\Users\User($filtered_input);
    $modelUsers->insertUser($user);
    header('Location:login.php');
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


</body>
</html>
