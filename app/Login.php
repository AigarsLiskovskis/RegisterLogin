<?php

namespace App;

use PDO;

class Login extends DateBaseHandler
{
    protected function getUser($name, $password)
    {
        $stmt = $this->connect()->prepare('SELECT user_password FROM users WHERE user_name = ? OR user_email = ?;');

        if (!$stmt->execute(array($name, $password))) {
            $stmt = null;
            header("location: ../index.php?error=stmtFailed");
            exit;
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=userNotFound");
            exit;
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $pwdHashed[0]["user_password"]);

        if ($checkPassword == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongPassword");
            exit;

        }

        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE user_name = ?
                               OR user_email = ? AND user_password = ?;');
        if (!$stmt->execute(array($name, $name, $password))) {
            $stmt = null;
            header("location: ../index.php?error=stmtFailed");
            exit;
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=userNotFound");
            exit;
        }

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        session_start();
        $_SESSION["userid"] = $user[0]["user_id"];
        $_SESSION["userName"] = $user[0]["user_name"];


        $stmt = null;
    }
}