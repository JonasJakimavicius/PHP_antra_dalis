<?php

namespace Core;


class View
{

    protected $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function render($templatePath)
    {

        if (!file_exists($templatePath)) {
            throw  new \Exception("Template with filename $templatePath does not exists");
        }

        $data = $this->data;

        ob_start();


        require $templatePath;


        return ob_get_clean();


    }
}