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


  $sql = "SELECT * FROM album";
  $result = mysqli_query($koneksi, $sql);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Galery Foto</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
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
            </ul>
          </div>
      </div>
    </div>
  </div>
</nav>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="card mt-2">
          <div class="card-header">Tambah Foto</div>
          <div class="card-body">
            <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
              <label class="form-label">Judul Foto</label>
              <input type="text" name="judulfoto" class="form-control" required>
              <input type="text" name="userID" value="<?php echo $_SESSION['userID'] ?>" style="display:none;">
              <label class="form-label">Deskripsi</label>
              <textarea class="form-control" name="deskripsifoto" required></textarea>
              <label class="form-label">Album</label>
              <select class="form-control" name="AlbumID" required>
                <?php
                $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userID = '$userID'");
                while ($data_album = mysqli_fetch_array($sql_album)) { ?>
                  <option value="<?php echo $data_album['AlbumID'] ?>">
                    <?php echo $data_album['NamaAlbum'] ?></option>
                <?php } ?>
              </select>
              <label class="form-label">File</label>
              <input type="file" class="form-control" name="lokasifile" required>
              <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card mt-2">
          <div class="card-header">Data Galery Foto</div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Foto</th>
                  <th>judul foto</th>
                  <th>Deskripsi</th>
                  <th>TanggalDibuat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $userID = $_SESSION['status'];
                $sql = mysqli_query($koneksi, "SELECT * FROM foto ");
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><img src="../assets/img/<?php echo $data['lokasifile'] ?>" width="100"></td>
                    <td><?php echo $data['judulfoto'] ?></td>
                    <td><?php echo $data['deskripsifoto'] ?></td>
                    <td><?php echo $data['tanggalunggah'] ?></td>
                    <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['fotoid'] ?>">
  <button type="button" class="btn btn-primary">
    Edit
  </button>
</a>

<div class="modal fade" id="edit<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
          <label class="form-label">judul foto</label>
          <input type="text" name="judulfoto" value="<?php echo $data['judulfoto'] ?>" class="form-control" required>
          <label class="form-label">Deskripsi</label>
          <textarea class="form-control" name="deskripsifoto" required><?php echo $data['deskripsifoto'] ?></textarea>
          <label class="form-label">Album</label>
          <select class="form-control" name="AlbumID">
            <?php
            $sql_album = mysqli_query($koneksi, "SELECT * FROM album userID = '$userID'");
            while ($data_album = mysqli_fetch_array($sql_album)) {
            ?>
              <option <?php if ($data_album['AlbumID'] == $data['AlbumID']) { ?> selected="selected" <?php } ?> value="<?php echo $data_album['AlbumID'] ?>">
                <?php echo $data_album['NamaAlbum'] ?>
              </option>
            <?php } ?>
          </select>
          <label class="form-label">Foto</label>
          <div class="row">
            <div class="col-md-4">
              <img src="../assets/img/<?php echo $data['lokasifile'] ?>" width="100">
            </div>
            <div class="col-md-8">
              <label class="form-label">Ganti File</label>
              <input type="file" class="form-control" name="lokasifile">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
        </div>
      </form>
    </div>
  </div>
</div>

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['fotoid'] ?>">
    Hapus
</button>

<div class="modal fade" id="hapus<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../config/aksi_foto.php" method="POST"> 
                    <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                    Apakah Anda Yakin Akan Menghapus Data <strong><?php echo $data['judulfoto'] ?></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
                </form> 
            </div>
        </div>
    </div>
</div>

                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

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