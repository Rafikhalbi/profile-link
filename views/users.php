<?php
var_dump(__DIR__."path views");
require '../src/functions.php';

$username = $_GET['username'];

if (!$username) {
    header('Location: ../index.php');
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '$username'");

$data = mysqli_fetch_assoc($query);

if (!$data) {
    header('Location: ../index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['name'];?> - Profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="cover">
            <img src="../src/assets/images/<?php echo $data['ps']; ?>" alt="">
        </div>
        <div class="profile">
            <img src="../src/assets/images/<?php echo $data['pp']; ?>" alt="">
        </div>
        <div class="name">
                <h1><?php echo $data['name']; ?></h1>
                <?php
                    if ($data["bluebadge"] > 0) {
                        echo '<div class="bluebadge"></div>';
                    }
                ?>
        </div>
        <div class="bio">
            <p><?php echo $data['bio']; ?> </p>
        </div>
        <div class="copy">
            <input type="text" name="text-copy" id="text-copy" value="<?php echo $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] ?>">
            <button id="btn-copy">copy</button>
        </div>
    </div>
    <div class="content">
        <div class="link-fb" onclick="getlink(`<?php echo $data['facebook'] ?>`)">
            <span>facebook</span>
        </div>
        <div class="link-ig" onclick="getlink(`<?php echo $data['instagram'] ?>`)">
            <span>instagram</span>
        </div>
        <div class="link-tw" onclick="getlink(`<?php echo $data['twitter'] ?>`)">
            <span>twitter</span>
        </div>
        <div class="link-gh" onclick="getlink(`<?php echo $data['github'] ?>`)">
            <span>github</span>
        </div>
    </div>

    <footer>
        copyright - 2023
    </footer>

    <script src="js/script.js"></script>
</body>
</html>