<?php
include "../../config.php";
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
                    <h1 class="mt-4">Data Jenis Barang</h1>
                    <div class="mt-5">
                        <div class="card">
                            <div class="card-header">
                               <h5 class="card-title mb-0">Tambah Jenis Barang</h5>
                            </div>
                            <div class="card-body">
                                <form action="proses-tambah-barang.php" method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="kode_barang" class="form-label">Kode Barang</label>
                                                <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                                <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="unit_barang" class="form-label">Unit Barang</label>
                                                <input type="text" name="unit_barang" class="form-control" placeholder="Unit Barang" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="unit_barang" class="form-label">Jenis Barang</label>
                                                <select name="id_jenis" class="form-select">
                                                    <option value="">-- PILIH JENIS --</option>
                                                    <?php
                                                        $query = mysqli_query($db,"SELECT * FROM jenis_barang");
                                                        while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <option value="<?php echo $row['id_jenis']; ?>"><?php echo $row['nama_jenis']; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="harga" class="form-label">Harga Barang</label>
                                                <input type="number" name="harga_barang" class="form-control" placeholder="Harga Barang" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="stok_barang" class="form-label">Stok Barang</label>
                                                <input type="number" name="stok_barang" class="form-control" placeholder="Stok Barang">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" name="simpan" class="btn btn-sm btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../../assets/custom.js"></script>
    </body>
</html>