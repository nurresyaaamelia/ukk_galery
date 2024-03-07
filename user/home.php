<?php
session_start();
$userID = $_SESSION['userID'];


if (!isset($_SESSION['status']) || $_SESSION['status'] != 'login') {
  echo "<script>
    alert('Anda belum login!');
    location.href='../index.php';
    </script>";
  exit;
}

include_once("../config/koneksi.php");
$username = "Username";


$query_user = mysqli_query($koneksi, "SELECT NamaLengkap FROM user WHERE userID = '$userID'");
$data_user = mysqli_fetch_array($query_user);
if ($data_user) {
  $username = $data_user['NamaLengkap']; 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galery Foto </title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <style>
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            background-color: #f8f9fa;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
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
        <a href="home.php" class="btn btn-outline-primary">Home</a>
        <span style="margin-right: 10px;"></span> 
        <a href="album.php" class="btn btn-outline-primary">Data Album</a>
        <span style="margin-right: 10px;"></span> 
        <a href="foto.php" class="btn btn-outline-primary">Data Foto</a>
      
      </div>

      <div class="navbar-nav ms-auto">
       
    <div class="dropdown">
            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user"></i> <?php echo $username; ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
              <li><a class="dropdown-item" href="../config/aksi_logout.php">Keluar</a></li>
              <li><a class="dropdown-item" href="sampah.php">sampah </a></li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</nav>
    <div class="container mt-3">
        <center><h2>Album</h2></center>
        <div class="row">
            <?php
           
            $query = mysqli_query($koneksi, "SELECT * FROM album");
            while ($row = mysqli_fetch_array($query)) {
              
                $albumID = $row['AlbumID'];
                $query_foto = mysqli_query($koneksi, "SELECT * FROM foto WHERE AlbumID='$albumID' LIMIT 1");
                $foto = mysqli_fetch_assoc($query_foto);
            ?>
                <div class="col-md-3">
                    <div class="card mb-4">
                        <img src="../assets/img/<?php echo $foto['lokasifile']; ?>" class="card-img-top" alt="Foto Album">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['NamaAlbum']; ?></h5>
                            <p class="card-text"><?php echo $row['Deskripsi']; ?></p>
                            <a href="detailalbum.php?AlbumID=<?php echo $row['AlbumID']; ?>" class="btn btn-primary">Lihat Foto</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p>&copy; Ujikom RPL | Nurresya Amelia</p>
    </footer>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
  <script>
   
    function toggleHeartAnimation(element) {
      element.classList.toggle('heart-move');
    }
  </script>
</body>

</html>
