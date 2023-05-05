<?php
session_start();

require '../src/functions.php';

if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST["bluebadge"])) {
    $username = $_POST["username"];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    $result = mysqli_fetch_assoc($query);

    if (!$result) {
        header("Location: index.php");
        exit;
    }

    $id = $result["id"];

    $update = mysqli_query($conn, "UPDATE `users` SET `bluebadge` = '1' WHERE `users`.`id` = $id");

    if (mysqli_affected_rows($conn) > 0) {
        $succ = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
        <form action="" method="post">
            <div class="logo">
                <h3>Blue Badge</h3>
            </div>
            <?php
                if (isset($succ)) {
                    echo '<div class="succ">success add blue badge</div>';
                }
            ?>
            <ul>
                <li>
                    <input type="text" name="username" placeholder="username.." autocomplete="off" required autofocus>
                </li>
                <li>
                    <button type="submit" name="bluebadge">submit</button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>