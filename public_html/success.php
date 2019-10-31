<?php

require('../core/functions/file.php');
require('../bootloader.php');
require('../core/functions/form/core.php');
require('../core/functions/html/generators.php');


use App\App;


session_start();
$modelUsers = new \App\Users\Model();
$users_array = $modelUsers->getUsers();
//    var_dump($filtered_input);
if (!empty($_SESSION)) {
    foreach ($users_array as $user) {
        if ($user->getName() == $_SESSION['name']) {
            if ($user->getPassword() == $_SESSION['password']) {

                print 'fainiai';
                break;

            }
        }
    }
}

?>
<html>
<head></head>
<meta charset="UTF-8">
<title></title>

<head>
<body>
    <div class="form-container">
        <h1>ZJBS</h1>
        <a href="logout.php">Logout</a>
    </div>


</body>
</html>
