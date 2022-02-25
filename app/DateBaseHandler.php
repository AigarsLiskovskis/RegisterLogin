<?php

namespace App;

use PDO;
use PDOException;

class DateBaseHandler
{
    protected function connect()
    {
        try {
            $login = "root";
            $password = "";
            $servername = "127.0.0.1";
            return new PDO("mysql:host=$servername;dbname=database", $login, $password);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br/>";
            die;
        }
    }
}

