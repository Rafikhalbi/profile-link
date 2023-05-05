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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create profile</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data" accept="image/*">
        <div class="formData">
            <ul>
                <li>
                    <input type="text" name="name" placeholder="your name.." autofocus="" autocomplete="off" required="">
                </li>
                <li>
                    <input type="email" name="email" placeholder="your email.." autocomplete="off" required="">
                </li>
                <li>
                    <input type="text" name="facebook" placeholder="your facebook link (optional)" autocomplete="off">
                </li>
                <li>
                    <input type="text" name="instagram" placeholder="your instagram link (optional)" autocomplete="off">
                </li>
                <li>
                    <input type="text" name="twitter" placeholder="your twitter link (optional)" autocomplete="off">
                </li>
                <li>
                    <input type="text" name="github" placeholder="your github link (optional)" autocomplete="off">
                </li>
                <li>
                    <input type="text" name="bio" placeholder="your bio.." autocomplete="off" required="">
                </li>
                <li>
                    <label for="profile">your profile picture: </label>
                    <input type="file" name="profile" id="profile" required="">
                </li>
                <li>
                    <label for="cover">your cover picture: </label>
                    <input type="file" name="cover" id="cover" required="">
                </li>
                <li>
                    <button type="submit" name="create">create</button>
                </li>
            </ul>
        </div>
    </form>
</body>
</html>