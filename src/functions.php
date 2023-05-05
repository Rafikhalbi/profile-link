<?php
// var_dump(__DIR__."path src");
define("DB_HOST","127.0.0.1");
define("DB_USER","root");
define("DB_PASS","root");
define("DB_NAME","profile");
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS) or die('koneksi gagal');
mysqli_select_db($conn,DB_NAME) or die('database salah');
// var_dump($conn);
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

    $data = "INSERT INTO users (name,email,pp,ps,facebook,instagram,twitter,github,username,bio,bluebadge) VALUES ('$name', '$email', '$profile', '$cover', '$facebook', '$instagram', '$twitter', '$github', '$username', '$bio', 0)";
    

    mysqli_query($conn, $data);

    if (mysqli_affected_rows($conn) > 0) {
        return ['user'=>$username,'status'=>true];
    } else {
       return ['status'=>false];
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