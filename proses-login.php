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

if ($data_user > 0) {
    $_SESSION['nama_user'] = $data_user['nama_user'];
    $_SESSION['username'] = $data_user['username'];
    header('Location: admin/dashboard.php');
} else {
    echo "<script>alert('Username atau Password Salah'); window.location.href='login.php'</script>";
}

?>