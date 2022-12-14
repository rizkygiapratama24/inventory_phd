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
                    <h1 class="mt-4">Jenis Barang</h1>
                    <div class="mt-5">
                        <div class="card">
                            <div class="card-header">
                               <h5 class="card-title mb-0">Tambah Jenis Barang</h5>
                            </div>
                            <div class="card-body">
                                <form action="proses-tambah-jenis.php" method="post">
                                    <div class="form-group">
                                        <label for="jenis_barang" class="form-label">Jenis Barang</label>
                                        <input type="text" name="nama_jenis" class="form-control" placeholder="Jenis Barang" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
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