<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jenis Barang</title>
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
                    <h1 class="mt-4">Jenis Barang</h1>
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
                                            <th>Jenis Barang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include "../../config.php";
                                            $query = mysqli_query($db,"Select * from jenis_barang");
                                            $no = 0;
                                            while ($data = mysqli_fetch_array($query)) {
                                                $no++;
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['nama_jenis']; ?></td>
                                            <td>
                                                <a href="#!" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModalEdit<?php echo $data['id_jenis']; ?>">
                                                    Edit
                                                </a>
                                                <a href="#!" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalHapus<?php echo $data['id_jenis']; ?>">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="exampleModalHapus<?php echo $data['id_jenis']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="mb-0 text-center">Apakah anda yakin ingin menghapus jenis barang ini ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="hapus-jenis.php?id_jenis=<?php echo $data['id_jenis']; ?>" class="btn btn-sm btn-primary">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="exampleModalEdit<?php echo $data['id_jenis']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Barang</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="proses-edit-jenis.php?id_jenis=<?php echo $data['id_jenis']; ?>" method="post">
                                                        <?php
                                                            $id_jenis = $data['id_jenis'];
                                                            $query_result = mysqli_query($db,"SELECT * FROM jenis_barang WHERE id_jenis='$id_jenis'");
                                                            while ($row = mysqli_fetch_array($query_result)) {
                                                        ?>
                                                        <div class="form-group">
                                                            <input type="hidden" name="id_jenis" value="<?php echo $row['id_jenis']; ?>">
                                                            <label for="nama_jenis" class="form-label">Jenis Barang</label>
                                                            <input type="text" name="nama_jenis" class="form-control" value="<?php echo $row['nama_jenis']; ?>" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="reset" name="reset" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" name="edit" class="btn btn-sm btn-primary">Simpan</button>
                                                    </div>
                                                    <?php
                                                            }
                                                        ?>
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
                            <div class="card-footer">

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