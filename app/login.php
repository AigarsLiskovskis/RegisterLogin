<?php

use App\LoginController;

require_once "DateBaseHandler.php";
require_once "LoginController.php";
require_once "Login.php";


if (isset($_POST["login"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];

    $login = new LoginController($name, $password);

    $login->loginUser();

    header("location: ../index.php?error=error=none");
}

