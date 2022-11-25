<?php
session_start();
include('config.php');

// ambil data
$username = $_POST["username"];
$password = md5($_POST["password"]);

// periksa username dan password

$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$hasil = mysqli_query($db,$query);
$data_user = mysqli_fetch_assoc($hasil);

// cek
if ($data_user != null) {
    $_SESSION['user'] = $data_user;
    header('Location: admin/dashboard.php');
}

?>