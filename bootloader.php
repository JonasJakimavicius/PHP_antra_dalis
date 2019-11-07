<?php

declare(strict_types=1);


require 'config.php';

require ROOT . '/vendor/autoload.php';

require ROOT . '/core/functions/html/generators.php';
require ROOT . '/core/functions/form/core.php';
require  ROOT . '/core/functions/file.php';
require  ROOT . '/app/functions/validators.php';



$App = new \App\App();
session_start();