<?php
session_start();
include "../../config.php";
if (isset($_POST['simpan'])) {
    $nomor_transaksi = $_POST['nomor_transaksi'];
    $id_barang = $_POST['id_barang'];
    $tgl_brg_keluar = $_POST['tgl_brg_keluar'];
    $stok_brg_keluar = $_POST['stok_brg_keluar'];

    $query_barang = mysqli_query($db, "SELECT * FROM barang WHERE id_barang='$id_barang'");
    $data_stok = mysqli_fetch_array($query_barang);
    $stok_brg = $data_stok['stok_barang'];

    // menghitung sisa stok
    $sisa_stok = $stok_brg - $stok_brg_keluar;

    if ($stok_brg < $stok_brg_keluar) {
        echo "<script>alert('Jumlah pengeluaran stok lebih besar dari stok barang'); window.location.href='index.php'</script>";
    } else {
        $query = mysqli_query($db,"INSERT INTO barang_keluar(nomor_transaksi,id_barang,tgl_brg_keluar,stok_brg_keluar) VALUES('$nomor_transaksi','$id_barang','$tgl_brg_keluar','$stok_brg_keluar')");
        if ($query) {
            $update_stok_brg = mysqli_query($db,"UPDATE barang SET stok_barang='$sisa_stok' WHERE id_barang='$id_barang'");
            echo "<script>alert('Data Barang Keluar Berhasil Disimpan'); window.location.href='index.php'</script>";
        } else {
            echo "Hapus Gagal";
        }
    }
}
?>