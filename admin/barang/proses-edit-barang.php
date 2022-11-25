<?php
session_start();
include "../../config.php";
if (isset($_POST['edit'])) {
    $id_barang = $_POST['id_barang'];
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $unit_barang = $_POST['unit_barang'];
    $jenis_barang = $_POST['id_jenis'];
    $harga = $_POST['harga_barang'];
    $stok = $_POST['stok_barang'];

    $query_result = mysqli_query($db, "UPDATE barang SET kode_barang='$kode_barang', nama_barang='$nama_barang', unit_barang='$unit_barang', id_jenis='$jenis_barang', harga_barang='$harga', stok_barang='$stok' WHERE id_barang='$id_barang'");

    if ($query_result) {
        echo "<script>alert('Data Barang Berhasil Di edit'); window.location.href='index.php'</script>";
    } else {
        echo "Edit Gagal";
    }
}
?>