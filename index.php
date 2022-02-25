<?php


session_start();

require_once "vendor/autoload.php";
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In/Register</title>
    <style>
        .container {
            display: flex;
            justify-content: space-evenly;
            height: 100vh;
            background: darkgray;
        }

        .left, .right {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }

        .box {
            height: 220px;
            width: 420px;
            border: solid 2px black;
            background: blanchedalmond;

        }

        label, input {
            display: inline-flex;
        }

        label {
            margin-bottom: 10px;
        }
    </style>
</head>
<header>
    <div>
        <ul>
            <?php
            if (isset($_SESSION["userid"])) {
                ?>
                <li><?php echo "Hello! " . $_SESSION["userName"] ?></li>
                <li><a href="app/logout.php">LOGOUT</a></li>
                <?php
            } else {
                ?>
                <li>Sign Up</li>
                <li>Login</li>
                <?php
            }
            ?>
        </ul>
    </div>
</header>
<body>
<div class="container">
    <div class='right'>
        <div class="box" style="text-align: center">
            <h1>Sing Up</h1>
            <form method="post" action="app/signUp.php">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="name" required>
                <br>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="password" required>
                <br>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="email" required>
                <br>
                <input type="submit" name="signUp" value="Sign Up">
            </form>
        </div>
    </div>
    <div class='left'>
        <div class="box" style="text-align: center">
            <h1>Login</h1>
            <form method="post" action="app/login.php">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="name or email" required>
                <br>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="password" required>
                <br>
                <input type="submit" name="login" value="Login">
            </form>
        </div>
    </div>
</div>
</body>
</html>
