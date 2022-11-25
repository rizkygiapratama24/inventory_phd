<?php
session_start();
include "../../config.php";

$id_barang = $_GET['id_barang'];
$query_result = mysqli_query($db, "DELETE FROM barang WHERE id_barang=$id_barang");

if ($query_result) {
    echo "<script>alert('Data Barang Berhasil Dihapus'); window.location.href='index.php'</script>";
} else {
    echo "Hapus Gagal";
}
?>