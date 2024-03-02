<?php
session_start();
$userID = $_SESSION['userID'];

// Cek apakah pengguna sudah login
if (!isset($_SESSION['status']) || $_SESSION['status'] != 'login') {
  echo "<script>
    alert('Anda belum login!');
    location.href='../index.php';
    </script>";
  exit;
}
// Termasuk file koneksi
include_once("../config/koneksi.php");
$username = "Username"; // Inisialisasi variabel

// Ambil nama pengguna dari database
$query_user = mysqli_query($koneksi, "SELECT NamaLengkap FROM user WHERE userID = '$userID'");
$data_user = mysqli_fetch_array($query_user);
if ($data_user) {
  $username = $data_user['NamaLengkap']; // Set variabel jika data ditemukan
}


if (isset($_GET['AlbumID'])) {
    $AlbumID = $_GET['AlbumID'];

    $query_album = mysqli_query($koneksi, "SELECT * FROM album WHERE AlbumID='$AlbumID'");
    $data_album = mysqli_fetch_assoc($query_album);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Album</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <style>
        .card-img-top {
            max-width: 100%;
            height: auto;
            border: 3px solid #8e44ad; /* Warna border mytcal glory */
            border-radius: 10px; /* Radius border */
            background: linear-gradient(to right, #8e44ad, #3498db); /* Gradient background */
            transition: transform 0.3s ease; /* Transisi untuk efek scaling */
        }

        /* Efek scaling saat hover */
        .card-img-top:hover {
            transform: scale(1.1);
            border-image-source: linear-gradient(to right, #8e44ad, #3498db); /* Gradient border on hover */
            border-image-slice: 1; /* Slice the border image */
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-body {
            background-color: #f8f9fa;
            border-radius: 0 0 15px 15px;
        }

        .card-title, .card-text {
            font-size: 16px; /* Ukuran font judul dan deskripsi */
            margin-bottom: 5px; /* Margin bawah judul dan deskripsi */
            text-align: center; /* Pusatkan judul dan deskripsi */
        }

        .card-content {
            padding: 10px;
            margin-top: 10px;
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
        <span style="margin-right: 10px;"></span> <!-- Jarak -->
        <a href="album.php" class="btn btn-outline-primary">Data Album</a>
        <span style="margin-right: 10px;"></span> <!-- Jarak -->
        <a href="foto.php" class="btn btn-outline-primary">Data Foto</a>
    
      </div>

      <div class="navbar-nav ms-auto">
        <!-- Tambahkan dropdown untuk nama pengguna -->
    <div class="dropdown">
            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user"></i> <?php echo $username; ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
              <li><a class="dropdown-item" href="../config/aksi_logout.php">Keluar</a></li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</nav>
    <div class="container mt-3">
        <center><h2><?php echo $data_album['NamaAlbum']; ?></h2></center><h2>
       
        <?php
        $query_foto = mysqli_query($koneksi, "SELECT * FROM foto WHERE AlbumID='$AlbumID'");
        $num_rows = mysqli_num_rows($query_foto);

        if ($num_rows > 0) {
        ?>
            <div class="row">
                <?php
                while ($row_foto = mysqli_fetch_assoc($query_foto)) {
                ?>
                    <div class="col-md-3">
                        <div class="card mb-4">
                            <img src="../assets/img/<?php echo $row_foto['lokasifile']; ?>" class="card-img-top" alt="Foto Album">
                            <div class="card-body card-content">
                                <h4 class="card-title"><?php echo $row_foto['judulfoto']; ?></h4> <!-- Judul foto -->
                                <p class="card-text"><?php echo $row_foto['deskripsifoto']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        } else {
            echo "<p>Tidak ada file.</p>";
        }
        ?>
    </div>

    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p>&copy; Ujikom RPL | Nurresya Amelia</p>
    </footer>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
  <script>
    // Menambahkan/ menghapus kelas saat ikon hati disentuh/meninggalkan
    function toggleHeartAnimation(element) {
      element.classList.toggle('heart-move');
    }
  </script>
    <script>
        var images = document.querySelectorAll('.card-img-top');
        images.forEach(function(image) {
            image.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.1)';
            });
            image.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });
    </script>
</body>

</html>

<?php
} else {
    header("Location: album.php");
    exit();
}
?>
