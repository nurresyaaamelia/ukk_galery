<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Galeri Foto</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <style>
  
    .fa-heart {
    
      color: #ed4956;
    
    }

    
    .card-img-top {
      max-width: 40%;
      height: auto;
      transition: transform 0.3s ease;
      border: 3px solid #8e44ad; 
      border-radius: 10px;
      background: linear-gradient(to right, #8e44ad, #3498db); 
      margin: 0 auto; 
    }

   
    .card-img-top:hover {
      transform: scale(1.1);
      border-image-source: linear-gradient(to right, #8e44ad, #3498db); 
      border-image-slice: 1; 
    }

    
    #carouselExampleControls {
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary ">
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

  <div class="container mt-2">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
        include_once("config/koneksi.php");
        $query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.userID=user.userID INNER JOIN album ON foto.AlbumID=album.AlbumID");
        $first = true;
        while ($data = mysqli_fetch_array($query)) {
          ?>
          <div class="carousel-item <?php echo ($first ? 'active' : ''); ?>">
            <div class="d-flex justify-content-center">
              <img src="assets/img/<?php echo $data['lokasifile'] ?>" class="d-block card-img-top" alt="<?php echo $data['judulfoto'] ?>"> <!-- Hapus class w-100 dan tambahkan class card-img-top -->
            </div>
            <div class="carousel-caption d-none d-md-block">
              <h5><?php echo $data['judulfoto'] ?></h5>
              <p>
                <?php
                $fotoid = $data['fotoid'];
                $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' ");
                if (mysqli_num_rows($ceksuka) == 1) { ?>
                  
                  <a href="./register.php" type="submit" name="batalsuka">
                    <i class="fas fa-heart "></i>
                  </a>
                <?php } else { ?>
                  
                  <a href="./register.php" type="submit" name="suka">
                    <i class="far fa-heart "></i>
                  </a>
                <?php }
                $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                echo mysqli_num_rows($like) . ' suka';
                ?>
                <a href="./register.php" type="button" data-bs-toggle="modal"><i class="far fa-comment"></i></a>
                <?php
                $fotoid = $data['fotoid'];
                $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentar WHERE fotoid = $fotoid");
                if ($jmlkomen) {
                  echo mysqli_num_rows($jmlkomen) . "komentar";
                } else {
                  echo '0 komentar';
                }
                ?>
              </p>
            </div>
          </div>
          <?php
          $first = false;
        } ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; Ujikom RPL | Nurresya Amelia</p>
  </footer>
 
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script>
   
  </script>
</body>

</html>
