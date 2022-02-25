<?php

namespace App;

require_once "SignUp.php";

class SignUpController extends SignUp
{
    private string $name;
    private string $password;
    private string $email;

    public function __construct(string $name, string $password, string $email)
    {
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
    }

    public function signUpUser()
    {
        if ($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyInput");
            exit;
        }
        if ($this->invalidLogin() == false) {
            header("location: ../index.php?error=invalidLogin");
            exit;
        }
        if ($this->inValidEmail() == false) {
            header("location: ../index.php?error=InvalidEmail");
            exit;
        }
        if ($this->userLoginTaken() == false) {
            header("location: ../index.php?error=alreadyTaken");
            exit;
        }
        $this->setUser($this->name, $this->password, $this->email);
    }

    private function emptyInput(): bool
    {
        if (empty($this->name) || empty($this->password) || empty($this->email)) {
            return false;
        }
        return true;
    }

    private function invalidLogin(): bool
    {

        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->name)) {
            return false;
        }
        return true;
    }

    private function inValidEmail(): bool
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    private function userLoginTaken(): bool
    {
        if (!$this->checkUser($this->name, $this->email)) {
            return false;
        }
        return true;

    }
}