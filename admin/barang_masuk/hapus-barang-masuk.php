<?php
session_start();
include "../../config.php";

$id_brg_masuk = $_GET['id_brg_masuk'];
$id_barang = $_GET['id_barang'];
$stok_masuk = $_GET['stok_masuk'];
$query_result = mysqli_query($db, "DELETE FROM barang_masuk WHERE id_brg_masuk=$id_brg_masuk");

if ($query_result) {
    $stok_batal = mysqli_query($db,"UPDATE barang SET stok_barang=(stok_barang-'$stok_masuk') WHERE id_barang='$id_barang'");
    echo "<script>alert('Data Barang Masuk Berhasil Dihapus'); window.location.href='index.php'</script>";
} else {
    echo "Hapus Gagal";
}

?>