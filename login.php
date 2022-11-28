<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/custom.css">
    <title> Inventory PHD </title>
  </head>
  <body>

    <div class="card w-50 m-auto login">
      <div class="card-body">
        <div class="logo-login text-center">
          <img src="assets/img/logo.png" alt="Logo" class="img-fluid" width="150" height="150">
        </div>
        <form action="proses-login.php" method="post">
          <div class="form-group">
            <label for="exampleInputUsername">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputUsername1" placeholder="Enter Username" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-danger">Submit</button>
        </form>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>