<?php
session_start();
include "../../config.php";
if (isset($_POST['simpan'])) {
    $nomor_transaksi_masuk = $_POST['nomor_transaksi_masuk'];
    $id_barang = $_POST['id_barang'];
    $tgl_brg_masuk = $_POST['tgl_brg_masuk'];
    $stok_brg_masuk = $_POST['stok_brg_masuk'];

    $query_barang = mysqli_query($db, "SELECT * FROM barang WHERE id_barang='$id_barang'");
    $data_stok = mysqli_fetch_array($query_barang);
    $stok_brg = $data_stok['stok_barang'];

    $stok_skrng = $stok_brg + $stok_brg_masuk;

    $query = mysqli_query($db,"INSERT INTO barang_masuk(nomor_transaksi_masuk,id_barang,tgl_brg_masuk,stok_brg_masuk) VALUES('$nomor_transaksi_masuk','$id_barang','$tgl_brg_masuk','$stok_brg_masuk')");
    if ($query) {
        $update_stok_brg = mysqli_query($db,"UPDATE barang SET stok_barang='$stok_skrng' WHERE id_barang='$id_barang'");
        echo "<script>alert('Data Barang Masuk Berhasil Disimpan'); window.location.href='index.php'</script>";
    } else {
        echo "Input Gagal";
    }
}
?>