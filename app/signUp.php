<?php

use App\SignUpController;

require_once "DateBaseHandler.php";
require_once "SignUpController.php";
require_once "SignUp.php";



if (isset($_POST["signUp"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $signUp = new SignUpController($name, $password, $email);

    $signUp->signUpUser();

    header("location: ../index.php?error=error=none");
}

