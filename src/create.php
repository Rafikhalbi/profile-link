<?php
require 'functions.php';

if (isset($_POST['create'])) {
    $link = createData($_POST);
    header('Location: ../views/users.php?username=' . $link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Team Termux ID">
    <meta name="description" content="This is a web that collects links to all social media profiles">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="wrapper">
        <div class="brand">
            <h3 class="brand-name">
                link profile ID
            </h3>
        </div>
        <form action="" method="post" enctype="multipart/form-data" accept="image/*">
        <div class="form-container">
            <ul class="doubel-input">
                <li class="form-input">
                    <input class="form-input-text" type="text" name="name" placeholder="your name.." autofocus="" autocomplete="off" required="">
                </li>
                <li class="form-input">
                    <input class="form-input-text" type="email" name="email" placeholder="your email.." autocomplete="off" required="">
                </li>
                <li class="form-input">
                    <input class="form-input-text" type="text" name="facebook" placeholder="your facebook link (optional)" autocomplete="off">
                </li>
                <li class="form-input">
                    <input class="form-input-text" type="text" name="instagram" placeholder="your instagram link (optional)" autocomplete="off">
                </li>
            </ul>
            <ul class="form-list">
                <li class="form-input">
                    <input class="form-input-text" type="text" name="twitter" placeholder="your twitter link (optional)" autocomplete="off">
                </li>
                <li class="form-input">
                    <input class="form-input-text" type="text" name="github" placeholder="your github link (optional)" autocomplete="off">
                </li>
                <li class="form-input">
                    <input  class="form-input-text" type="text" name="bio" placeholder="your bio.." autocomplete="off" required="">
                </li>
                <li class="form-input">
                    <label for="profile" class="hint">your profile picture: </label>
                    <input type="file" name="profile" id="profile" required="">
                </li>
            </ul>
            <ul class="form-list">
                <li class="form-input">
                    <label for="cover" class="hint">your cover picture: </label>
                    <input type="file" name="cover" id="cover" required="">
                </li>
                <li class="form-input">
                    <button type="submit" name="create" class="form-btn-submit">create</button>
                </li>
            </ul>
        </div>
        </form>
        </div>
    </div>
</body>
</html>