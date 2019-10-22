<?php

function file_to_array($file_name)
{
    if (file_exists($file_name)) {
        $json_string = file_get_contents($file_name);
        if ($json_string !== false) {
            return $array = json_decode($json_string, true);
        }
    }
    return false;
}

function array_to_file($file_name, $array)
{
    $data = json_encode($array);
    $file = file_put_contents($file_name, $data);
    if ($file === false) {
        throw new exception ('blogai, negalima irasyt');
    } else {
        true;
    }
}

