<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galery Foto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="index.php">Website Galery Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
        
      </div>
      <a href="register.php" class="btn btn-outline-primary m-1">Daftar </a>
      <a href="login.php" class="btn btn-outline-success m-1"> Masuk </a>
    </div>
  </div>
</nav>
<div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
      <div class="card">
          <div class="card-body bg-light">
                <div class="card-body">
                    <h5 class="card-title text-center">Login Aplikasi</h5>
                    <form action="config/aksi_login.php" method="POST">
                        <div class="form-group">
                            <label for="Username">Username</label>
                            <input type="text" id="Username" name="Username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" id="Password" name="Password" class="form-control" required>
                        </div>
                        <div class="d-grid mt-2">
                <button class="btn btn-primary" type="submit" name="Kirim">Masuk</button>
              </div>
                    </form>
                    <hr>
                    <p class="text-center">Belum punya akun? <a href="register.php">Daftar disini!</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; Ujikom RPL | Nurresya Amelia</p>
  </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Menggunakan Bootstrap JS dari CDN untuk memastikan pembaruan dan kinerja yang optimal -->
</body>
</html>
