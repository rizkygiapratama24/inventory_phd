<?php
session_start();
include "../../config.php";

include('../../function_format/format-rupiah.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Barang</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
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
                    <h1 class="mt-4">Data Barang</h1>
                    <div class="mt-5">
                        <div class="card">
                            <div class="card-header">
                                <a href="tambah.php" class="btn btn-sm btn-primary">
                                    Tambah
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Unit Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = mysqli_query($db, "SELECT * FROM barang b INNER JOIN jenis_barang j ON j.id_jenis = b.id_jenis");
                                            $no = 0;
                                            while ($row = mysqli_fetch_array($query)) {
                                                $no++;
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row['kode_barang']; ?></td>
                                            <td><?php echo $row['nama_barang']; ?></td>
                                            <td><?php echo $row['unit_barang']; ?></td>
                                            <td><?php echo $row['nama_jenis']; ?></td>
                                            <td><?php echo $row['stok_barang']; ?></td>
                                            <td><?php echo rupiah($row['harga_barang']); ?></td>
                                            <td>
                                                <a href="#!" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModalEdit<?php echo $row['id_barang']; ?>">
                                                    Edit
                                                </a>
                                                <a href="#!" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalHapus<?php echo $row['id_barang']; ?>">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="exampleModalHapus<?php echo $row['id_barang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <a href="hapus-barang.php?id_barang=<?php echo $row['id_barang']; ?>" class="btn btn-sm btn-primary">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="exampleModalEdit<?php echo $row['id_barang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="proses-edit-barang.php?id_barang=<?php echo $row['id_barang']; ?>" method="post">
                                                            <div class="row">
                                                                <?php
                                                                    $id_barang = $row['id_barang'];
                                                                    $query_result = mysqli_query($db,"SELECT * FROM barang WHERE id_barang='$id_barang'");
                                                                    while ($data = mysqli_fetch_array($query_result)) {
                                                                ?>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
                                                                        <label for="kode_barang" class="form-label">Kode Barang</label>
                                                                        <input type="text" name="kode_barang" value="<?php echo $data['kode_barang'] ?>" class="form-control" autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="form-group">
                                                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                                                        <input type="text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" class="form-control" autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="unit_barang" class="form-label">Unit Barang</label>
                                                                        <input type="text" name="unit_barang" value="<?php echo $data['unit_barang']; ?>" class="form-control" autocomplete="off" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="form-group">
                                                                        <label for="jenis_barang" class="form-label">Jenis Barang</label>
                                                                        <select name="id_jenis" class="form-select">
                                                                            <option value="">-- PILIH JENIS --</option>
                                                                            <?php
                                                                                $query = mysqli_query($db,"SELECT * FROM jenis_barang");
                                                                                while ($jn = mysqli_fetch_array($query)) {
                                                                            ?>
                                                                            <option value="<?php echo $jn['id_jenis']; ?>" <?= ($data['id_jenis'] == "".$jn['id_jenis']."") ? "selected" : ""; ?>><?php echo $jn['nama_jenis']; ?></option>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="stok_barang" class="form-label">Stok Barang</label>
                                                                        <input type="number" name="stok_barang" class="form-control" value="<?php echo $data['stok_barang']; ?>" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="form-group">
                                                                        <label for="harga_barang" class="form-label">Harga Barang</label>
                                                                        <input type="number" name="harga_barang" class="form-control" value="<?php echo $data['harga_barang']; ?>" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="reset" name="reset" class="btn btn-sm btn-danger">Batal</button>
                                                        <button type="submit" name="edit" class="btn btn-sm btn-primary">Simpan</button>
                                                    </div>
                                                    </form>
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