<?php
session_start();
include "../../config.php";

$id_brg_keluar = $_GET['id_brg_keluar'];
$id_barang = $_GET['id_barang'];
$stok_keluar = $_GET['stok_keluar'];
$query_result = mysqli_query($db, "DELETE FROM barang_keluar WHERE id_brg_keluar=$id_brg_keluar");

if ($query_result) {
    $stok_batal = mysqli_query($db,"UPDATE barang SET stok_barang=(stok_barang+'$stok_keluar') WHERE id_barang='$id_barang'");
    echo "<script>alert('Data Barang Keluar Berhasil Dihapus'); window.location.href='index.php'</script>";
} else {
    echo "Hapus Gagal";
}
?>