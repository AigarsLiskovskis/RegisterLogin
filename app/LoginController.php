<?php

namespace App;

require_once "Login.php";

class LoginController extends Login
{
    private string $login;
    private string $password;


    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;

    }

    public function loginUser()
    {
        if ($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyInput");
            exit;
        }
        $this->getUser($this->login, $this->password);
    }

    private function emptyInput(): bool
    {
        if (empty($this->login) || empty($this->password)) {
            return false;
        }
        return true;
    }
}
