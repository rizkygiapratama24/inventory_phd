<?php
session_start();
include "../../config.php";

$id_jenis = $_GET['id_jenis'];
$query_result = mysqli_query($db, "DELETE FROM jenis_barang WHERE id_jenis=$id_jenis");

if ($query_result) {
    echo "<script>alert('Jenis Barang Berhasil Dihapus'); window.location.href='index.php'</script>";
} else {
    echo "Hapus Gagal";
}

?>