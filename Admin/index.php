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
  <title>Website Galeri Foto</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <style>
   
    .fa-heart {
      
      color: #ed4956;
      
    }

   
    .card-img-top {
      max-width: 100%;
      height: auto;
      transition: transform 0.3s ease;
      border: 3px solid #8e44ad; 
      border-radius: 10px; 
      background: linear-gradient(to right, #8e44ad, #3498db); 
    }

    
    .card-img-top:hover {
      transform: scale(1.1);
      border-image-source: linear-gradient(to right, #8e44ad, #3498db); 
      border-image-slice: 1; 
    }

    
    .heart-move {
      animation: moveHeart 0.3s ease;
    }

    @keyframes moveHeart {
      0% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.2);
      }
      100% {
        transform: scale(1);
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
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
              <li><a class="dropdown-item" href="laporan.php">Laporan</a></li>
              <li><a class="dropdown-item" href="user.php">Data User</a></li> 
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- Akhir Navbar -->


<div class="d-flex justify-content-end">
  <form action="" method="GET" class="mb-3 mr-3 ml-auto" style="margin: 0px 150px 0px 0px;">
    <div class="input-group" >
      <input type="text" name="keyword" class="form-control" placeholder="Cari foto..." size="10">
      <button type="submit" class="btn btn-outline-primary">Cari</button>
    </div>
  </form>
</div>






  <div class="container mt-2">
    <div class="row">
      <?php
      // Proses pencarian
      if(isset($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        $query = mysqli_query($koneksi, "SELECT * FROM foto 
                                         INNER JOIN user ON foto.userID=user.userID 
                                         INNER JOIN album ON foto.AlbumID=album.AlbumID 
                                         WHERE judulfoto LIKE '%$keyword%' OR deskripsifoto LIKE '%$keyword%'");
      } else {
        $query = mysqli_query($koneksi, "SELECT * FROM foto 
                                         INNER JOIN user ON foto.userID=user.userID 
                                         INNER JOIN album ON foto.AlbumID=album.AlbumID");
      }

      $count = 0; 
      while ($data = mysqli_fetch_array($query)) {
      ?>
      <?php if ($count % 8 == 0) : ?>
        </div>
        <div class="row">
      <?php endif; ?>
        <div class="col-md-3 mt-2">
          <div class="card mb-2">
            <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>" style="max-height: 300px;">
            <div class="card-footer text-center">
              <?php
              $fotoid = $data['fotoid'];
              $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userID='$userID'");
              if (mysqli_num_rows($ceksuka) == 1) { ?>
                
                <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="batalsuka" onmouseover="toggleHeartAnimation(this)" onmouseout="toggleHeartAnimation(this)">
                  <i class="fas fa-heart heart-move"></i>
                </a>
              <?php } else { ?>
                
                <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="suka" onmouseover="toggleHeartAnimation(this)" onmouseout="toggleHeartAnimation(this)">
                  <i class="far fa-heart heart-move"></i>
                </a>
              <?php }
              $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
              echo mysqli_num_rows($like) . ' suka';
              ?>
              <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>"><i class="far fa-comment"></i></a>
              <?php
              $fotoid = $data['fotoid'];
              $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentar WHERE fotoid = $fotoid");
              if ($jmlkomen) {
                echo mysqli_num_rows($jmlkomen) . " komentar";
              } else {
                echo '0 komentar';
              }
              ?>
               
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">

                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-8">
                      <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                    </div>
                    <div class="col-md-4">
                      <div class="m-2">
                        <div class="overflow-auto">
                          <div class="sticky-top">
                            <strong> <?php echo $data['judulfoto'] ?> </strong> <br>
                            <span class="badge bg-secondary"><?php echo $data['NamaLengkap'] ?></span>
                            <span class="badge bg-secondary"> <?php echo $data['tanggalunggah'] ?></span>
                            <span class="badge bg-primary"><?php echo $data['NamaAlbum'] ?></span>

                          </div>
                          <hr>
                          <p align="left">
                            <?php echo $data['deskripsifoto'] ?>
                          </p>
                       


                          <hr>
                          <?php
                          $fotoid = $data['fotoid'];
                          $komentar = mysqli_query($koneksi, "SELECT * FROM komentar INNER JOIN user ON komentar.userID=user.userID WHERE komentar.fotoid='$fotoid'");
                          while ($row = mysqli_fetch_array($komentar)) { ?>

    
      
     <div style="display: flex; ">
        <strong><?php echo $row['NamaLengkap'] ?></strong>
        <p style="margin-left: 5px;"><?php echo $row['isikomentar'] ?></p>
        
            <form action="../config/proses_hapus_komentar.php" method="POST" style="margin-left: auto;">
                <input type="hidden" name="id" value="<?php echo $row['komentarid'] ?>">
                <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus komentar ini?')">Hapus</button>
            </form>
        
    </div>
<?php } ?>



                          <hr>
                          <div class="sticky-bottom">
                            <form action="../config/proses_komentar.php" method="POST">
                              <div class="input-group">
                                <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                <input type="text" name="isikomentar" class="form-control" placeholder="tambah komentar">
                                <div class="input-group-prepend">
                                  <button type="submit" name="kirimkomentar" class="btn btn-outline-primary">kirim</button>
                                </div>
                              </div>
                            </form>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      <?php
      $count++; 
      } ?>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>

</html>
