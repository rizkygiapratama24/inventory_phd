<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:../login.php');
    exit;
}
include "../config.php";
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../assets/custom2.css">
    </head>
    <body>
    <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <?php include('../layouts/sidebar.php'); ?>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <?php include('../layouts/navbar.php'); ?>
                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-3 mb-3">Dashboard</h1>
                    <div class="">
                        <div class="alert alert-primary mb-3">
                            <p class="mb-0">
                                Selamat Datang
                                <strong><?php echo $_SESSION['nama_user']; ?> </strong>
                                di Aplikasi Inventory PHD
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-white bg-primary">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="count">
                                                <?php
                                                    $query_barang = mysqli_query($db,"SELECT COUNT(*) as total_barang FROM barang");
                                                    $data_barang = mysqli_fetch_assoc($query_barang);
                                                ?>
                                                <h5 class="card-title"><?php echo $data_barang['total_barang']; ?></h5>
                                                <p class="card-text mb-0">Data Barang</p>
                                            </div>
                                            <div class="icon">
                                                <h1>
                                                    <i class="fa fa-folder"></i>
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="barang/" class="text-white font-see">
                                            <span>Lihat Data</span>
                                            <i class="fa fa-arrow-circle-o-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white bg-info">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="count">
                                                <?php
                                                    $query_masuk = mysqli_query($db,"SELECT COUNT(*) as total_masuk FROM barang_masuk");
                                                    $data_masuk = mysqli_fetch_assoc($query_masuk);
                                                ?>
                                                <h5 class="card-title"><?php echo $data_masuk['total_masuk']; ?></h5>
                                                <p class="card-text mb-0">Data Barang Masuk</p>
                                            </div>
                                            <div class="icon">
                                                <h1>
                                                    <i class="fa fa-sign-in"></i>
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="barang_masuk/" class="text-white font-see">
                                            <span>Lihat Data</span>
                                            <i class="fa fa-arrow-circle-o-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white bg-danger">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="count">
                                                <?php
                                                    $query_keluar = mysqli_query($db,"SELECT COUNT(*) as total_keluar FROM barang_keluar");
                                                    $data_keluar = mysqli_fetch_assoc($query_keluar);
                                                ?>
                                                <h5 class="card-title"><?php echo $data_keluar['total_keluar']; ?></h5>
                                                <p class="card-text mb-0">Data Barang Keluar</p>
                                            </div>
                                            <div class="icon">
                                                <h1>
                                                    <i class="fa fa-sign-out"></i>
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="barang_keluar" class="text-white font-see">
                                            <span>Lihat Data</span>
                                            <i class="fa fa-arrow-circle-o-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/custom.js"></script>
    </body>
</html>