<?php

namespace App;

class SignUp extends DateBaseHandler
{
    protected function setUser($name, $password, $email)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (user_name, user_password, user_email) VALUES (?, ?, ?);');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($name, $hashedPassword, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtFailed");
            exit;
        }
        $stmt = null;

    }

    protected function checkUser($name, $email)
    {
        $stmt = $this->connect()->prepare('SELECT user_name FROM users WHERE user_name = ? OR user_email = ?;');

        if (!$stmt->execute(array($name, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtFailed");
            exit;
        }

        if ($stmt->rowCount() > 0) {
            return false;
        }
        return true;
    }
}