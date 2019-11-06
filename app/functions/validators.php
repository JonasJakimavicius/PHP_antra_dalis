<?php

Use App\Users\User;

/**
 * @param $field_input
 * @param $field
 * @return bool
 */
function validate_email_unique($field_input, &$field)
{
    $modelUsers = new \App\Users\Model();
    $array = $modelUsers->getUsers();
    if (is_array($array)) {
        foreach ($array as $user) {
            if ($user->getEmail() == $field_input) {
                $field['error'] = 'Toks emailas jau yra';
                return false;
            }
        }

    }
    return true;
}

function validate_login($filtered_input, &$form)
{
    $modelUsers = new \App\Users\Model();
    $users_array = $modelUsers->getUsers(['name'=>$filtered_input['name'], 'password'=>$filtered_input['password']]);
    if($users_array){
        return true;
    }
    $form['error'] = 'Neteisingas slaptažodis arba vartotojas';
    return false;
}