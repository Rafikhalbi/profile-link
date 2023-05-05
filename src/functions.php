<?php
require('./config/config.php');
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

function createData($data) {
    global $conn;
    $name = htmlspecialchars($data['name']);
    $email = htmlspecialchars($data['email']);
    $facebook = htmlspecialchars($data['facebook']);
    $instagram = htmlspecialchars($data['instagram']);
    $twitter = htmlspecialchars($data['twitter']);
    $github = htmlspecialchars($data['github']);
    $bio = htmlspecialchars($data['bio']);
    $username = uniqid();
    $profile = checkimage($_FILES['profile']);
    $cover = checkimage($_FILES['cover']);

    if (!$profile || !$cover) {
        return 0;
    }

    $data = "INSERT INTO users VALUES ('', '$name', '$email', '$profile', '$cover', '$facebook', '$instagram', '$twitter', '$github', '$username', '$bio', 0)";
    

    mysqli_query($conn, $data);

    if (mysqli_affected_rows($conn) > 0) {
        echo 'data berhasil di tambahkan';
        return $username;
    } else {
        echo 'data gagal di tambahkan';
    }

}

function checkimage($img) {
    $name = $img['name'];
    $tmpName = $img['tmp_name'];
    $size = $img['size'];

    $imgVAlid = ['jpg', 'jpeg', 'png', 'webp'];
    $imgName = explode('.', $name);
    $imgName = strtolower(end($imgName));

    if (!in_array($imgName, $imgVAlid)) {
        return false;
    }

    if ($size > 1000000) {
        echo 'change to image small size';
        return false;
    }

    $random = uniqid();
    $random .= ".";
    $random .= $imgName;

    move_uploaded_file($tmpName, 'assets/images/' . $random);

    return $random;

}

?>