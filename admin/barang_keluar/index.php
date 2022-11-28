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
                    <h1 class="mt-4">Data Barang Keluar</h1>
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
                                            <th>Tanggal Keluar</th>
                                            <th>Stok Keluar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = mysqli_query($db, "SELECT * FROM barang_keluar bk INNER JOIN barang b ON b.id_barang = bk.id_barang");
                                            $no = 0;
                                            while ($row = mysqli_fetch_array($query)) {
                                                $no++;
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row['nomor_transaksi']; ?></td>
                                            <td><?php echo $row['kode_barang']; ?></td>
                                            <td><?php echo $row['nama_barang']; ?></td>
                                            <td><?php echo $row['unit_barang']; ?></td>
                                            <td><?php echo date('d F Y', strtotime($row['tgl_brg_keluar'])); ?></td>
                                            <td><?php echo $row['stok_brg_keluar']; ?></td>
                                            <td>
                                                <a href="#!" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalHapus<?php echo $row['id_brg_keluar']; ?>">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="exampleModalHapus<?php echo $row['id_brg_keluar']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <a href="hapus-barang-keluar.php?id_brg_keluar=<?php echo $row['id_brg_keluar']; ?>&id_barang=<?php echo $row['id_barang']; ?>&stok_keluar=<?php echo $row['stok_brg_keluar']; ?>" class="btn btn-sm btn-primary">Hapus</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="proses-tambah-barang-keluar.php" method="post">
                    <?php
                        $query = mysqli_query($db, "SELECT max(nomor_transaksi) as nomorTransaksi FROM barang_keluar");
                        $data = mysqli_fetch_array($query);
                        $nomorTransaksi = $data['nomorTransaksi'];

                        $urutan = (int) substr($nomorTransaksi, 3, 3);
                        $urutan++;

                        $huruf = "TRK";
                        $nomorTransaksi = $huruf . sprintf("%03s", $urutan);
                    ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nomor_transaksi" class="form-label">Nomor Transaksi</label>
                            <input type="text" name="nomor_transaksi" class="form-control" value="<?php echo $nomorTransaksi; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="id_barang" class="form-label">Nama Barang</label>
                            <select onchange="show_stok()" name="id_barang" id="id_barang" class="form-select" required>
                                <option value="">-- PILIH BARANG YANG AKAN DIKELUARKAN --</option>
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
                            <label for="stok_barang" class="form-label">Stok Barang</label>
                            <input type="text" name="stok_barang" id="stok_barang" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="stok_brg_keluar" class="form-label">Stok Barang Keluar</label>
                            <input type="text" name="stok_brg_keluar" id="stok_brg_keluar" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_brg_keluar" class="form-label">Tanggal Barang Keluar</label>
                            <input type="date" name="tgl_brg_keluar" class="form-control" required>
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

            function show_stok() {
                var id_barang = $('#id_barang').val();
                $.ajax({
                    type: 'GET',
                    url: 'ajax-stok-barang.php',
                    data: "id_barang="+id_barang,
                    success: function(data) {
                        var json = data,
                        obj = JSON.parse(json);
                        $('#stok_barang').val(obj.stok_barang);
                        $('#stok_barang, #stok_brg_keluar').keyup(function() {
                        var stok_barang = $('#stok_barang').val();
                        var stok_keluar = $('#stok_brg_keluar').val();

                        var kurang = parseInt(stok_barang) - parseInt(stok_keluar);
                        if (!isNaN(kurang)) {
                            $('#stok_barang').val(kurang);
                        } else {
                            $('#stok_barang').val(obj.stok_barang);
                        }
                    });
                    }
                });
            }
        </script>
    </body>
</html>