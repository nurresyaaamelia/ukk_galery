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


// Melakukan query untuk mendapatkan data pengguna
$result = mysqli_query($koneksi, "SELECT * FROM user");

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
        <li><a class="dropdown-item" href="laporan.php">Laporan</a></li>
        <li><a class="dropdown-item" href="user.php">Data User</a></li> <!-- Ini adalah opsi untuk laporan -->
    </ul>
</div>

      </div>
    </div>
  </div>
</nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result && mysqli_num_rows($result) > 0) {
                            $count = 1;
                            while ($d = mysqli_fetch_assoc($result)) :
                        ?>
                                <tr>
                                    <th scope="row"><?= $count ?></th>
                                    <td><?= $d['Username'] ?></td>
                                    <td><?= $d['Email'] ?></td>
                                    <td><?= $d['NamaLengkap'] ?></td>
                                    <td><?= $d['Alamat'] ?></td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#hapus<?= $d['userID']; ?>">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>

                                        <div class="modal fade" id="hapus<?= $d['userID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="../config/aksi_hapus.php" method="POST">
                                                            <input type="hidden" name="userid" value="<?= $d['userID']; ?>">
                                                            Apakah Anda Yakin Akan Menghapus Data <strong><?= $d['NamaLengkap']; ?></strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                        <?php
                                $count++;
                            endwhile;
                        } else {
                            echo "<tr><td colspan='6'>Tidak ada data pengguna</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
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
</body>
</html>
