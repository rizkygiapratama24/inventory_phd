<?php
session_start();
include "../../config.php";
if (isset($_POST['simpan'])) {
    $nama_jenis = $_POST['nama_jenis'];
    $query_result = mysqli_query($db,"INSERT INTO jenis_barang(nama_jenis) VALUES('$nama_jenis')");
    if ($query_result) {
        echo "<script>alert('Jenis Barang Berhasil Disimpan'); window.location.href='index.php'</script>";
    } else {
        echo "Gagal Input";
    }
}
?>