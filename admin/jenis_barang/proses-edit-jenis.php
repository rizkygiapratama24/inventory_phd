<?php
session_start();
include "../../config.php";
if (isset($_POST['edit'])) {
    $id_jenis = $_POST['id_jenis'];
    $jenis_barang = $_POST['nama_jenis'];

    $query_result = mysqli_query($db, "UPDATE jenis_barang SET nama_jenis='$jenis_barang' WHERE id_jenis='$id_jenis'");

    if ($query_result) {
        echo "<script>alert('Jenis Barang Berhasil Di edit'); window.location.href='index.php'</script>";
    } else {
        echo "Edit Gagal";
    }
}
?>