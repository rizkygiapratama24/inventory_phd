<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:../login.php');
    exit;
}
include "../../config.php";
include('../../function_format/format-rupiah.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inventory PHD</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../../assets/custom2.css">
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <?php include('../../layouts/sidebar.php'); ?>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <?php include('../../layouts/navbar.php'); ?>
                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Data Barang Masuk</h1>
                    <div class="mt-5">
                        <div class="card">
                            <div class="card-header">
                                <a href="#!" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalTambah">
                                    Tambah
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Transaksi</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Unit Barang</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Stok Masuk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = mysqli_query($db, "SELECT * FROM barang_masuk bm INNER JOIN barang b ON b.id_barang = bm.id_barang");
                                            $no = 0;
                                            while ($row = mysqli_fetch_array($query)) {
                                                $no++;
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row['nomor_transaksi_masuk']; ?></td>
                                            <td><?php echo $row['kode_barang']; ?></td>
                                            <td><?php echo $row['nama_barang']; ?></td>
                                            <td><?php echo $row['unit_barang']; ?></td>
                                            <td><?php echo date('d F Y', strtotime($row['tgl_brg_masuk'])); ?></td>
                                            <td><?php echo $row['stok_brg_masuk']; ?></td>
                                            <td>
                                                <a href="#!" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalHapus<?php echo $row['id_brg_masuk']; ?>">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="exampleModalHapus<?php echo $row['id_brg_masuk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="mb-0 text-center">Apakah anda yakin ingin menghapus data barang ini ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="hapus-barang-masuk.php?id_brg_masuk=<?php echo $row['id_brg_masuk']; ?>&id_barang=<?php echo $row['id_barang']; ?>&stok_masuk=<?php echo $row['stok_brg_masuk']; ?>" class="btn btn-sm btn-primary">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Masuk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="proses-tambah-barang-masuk.php" method="post">
                    <?php
                        $query = mysqli_query($db, "SELECT max(nomor_transaksi_masuk) as nomorTransaksiMasuk FROM barang_masuk");
                        $data = mysqli_fetch_array($query);
                        $nomorTransaksi = $data['nomorTransaksiMasuk'];

                        $urutan = (int) substr($nomorTransaksi, 3, 3);
                        $urutan++;

                        $huruf = "TRKM";
                        $nomorTransaksi = $huruf . sprintf("%03s", $urutan);
                    ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nomor_transaksi" class="form-label">Nomor Transaksi Masuk</label>
                            <input type="text" name="nomor_transaksi_masuk" class="form-control" value="<?php echo $nomorTransaksi; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="id_barang" class="form-label">Nama Barang</label>
                            <select name="id_barang" class="form-select" required>
                                <option value="">-- PILIH BARANG YANG AKAN MASUK --</option>
                                <?php
                                    $query = mysqli_query($db,"SELECT * FROM barang");
                                    while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <option value="<?php echo $data['id_barang']; ?>"><?php echo $data['kode_barang']; ?> - <?php echo $data['nama_barang']; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_brg_masuk" class="form-label">Tanggal Barang Masuk</label>
                            <input type="date" name="tgl_brg_masuk" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="stok_brg_masuk" class="form-label">Stok Barang Masuk</label>
                            <input type="text" name="stok_brg_masuk" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" name="reset" class="btn btn-sm btn-danger">Batal</button>
                        <button type="submit" name="simpan" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
        <script src="../../assets/custom.js"></script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
    </body>
</html>