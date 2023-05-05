<?php

session_start();

if (isset($_SESSION["login"])) {
    header('Location: /admin/index.php');
    exit;
}

require '../src/functions.php';

if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM admin");

    $result = mysqli_fetch_assoc($query);

    if ($username === $result["username"]) {
        if ($password === $result["password"]) {
            $_SESSION["login"] = true;
            header('Location: /admin/index.php');
            exit;
        }
    }

    $err = true;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <div class="logo">
                <h3>Login</h3>
            </div>
            <?php
                if (isset($err)) {
                    echo '<div class="err">wrong username/password</div>';
                }
            ?>
            <ul>
                <li>
                    <input type="text" name="username" placeholder="username.." autocomplete="off" required autofocus>
                </li>
                <li>
                    <input type="password" name="password" placeholder="password.." autocomplete="off" required>
                </li>
                <li>
                    <button type="submit" name="login">Login</button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>
