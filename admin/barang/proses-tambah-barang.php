<?php
include "../../config.php";
if (isset($_POST['simpan'])) {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $unit_barang = $_POST['unit_barang'];
    $jenis_barang = $_POST['id_jenis'];
    $harga = $_POST['harga_barang'];
    $stok = $_POST['stok_barang'];
    $query_result = mysqli_query($db,"INSERT INTO barang(kode_barang,nama_barang,unit_barang,id_jenis,harga_barang,stok_barang) VALUES('$kode_barang','$nama_barang','$unit_barang','$jenis_barang','$harga','$stok')");
    if ($query_result) {
        echo "<script>alert('Data Barang Berhasil Disimpan'); window.location.href='index.php'</script>";
    } else {
        echo "Gagal Input";
    }
}
?>