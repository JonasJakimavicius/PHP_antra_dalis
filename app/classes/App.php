<?php

namespace App;

use Core\FileDB;

Class App
{
    /**
     * @var FileDB
     */
    public static $db;

    public function __construct()
    {
        self::$db = new FileDB(DB_FILE);
    }
}