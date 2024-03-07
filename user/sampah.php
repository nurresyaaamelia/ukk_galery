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
$query_deleted_photos = mysqli_query($koneksi, "SELECT * FROM sampah");

// Periksa apakah kueri berhasil dieksekusi
if (!$query_deleted_photos) {
    die("Kueri gagal dieksekusi: " . mysqli_error($koneksi));
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
    <style>
        .card-img-top {
            max-width: 100%;
            height: auto;
            border: 3px solid #8e44ad; 
            border-radius: 10px; 
            background: linear-gradient(to right, #8e44ad, #3498db); 
            transition: transform 0.3s ease; 
        }

        .card-img-top:hover {
            transform: scale(1.1);
            border-image-source: linear-gradient(to right, #8e44ad, #3498db); 
            border-image-slice: 1; 
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
            font-size: 16px;
            margin-bottom: 5px; 
            text-align: center; 
        }

        .card-content {
            padding: 10px;
            margin-top: 10px;
        }
        .card-content {
            margin-top: 23px; 
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
                            
                            <li><a class="dropdown-item" href="sampah.php">Sampah </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-3">
        <h2>Sampah</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Tanggal Hapus</th>
                    <th>Username</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($query_deleted_photos) == 0) {
                    echo "<tr><td colspan='4'>Tidak ada sampah.</td></tr>";
                } else {
                    while ($row = mysqli_fetch_assoc($query_deleted_photos)) :
                ?>
                        <tr>
                            <td>
                                <img src="<?php echo $row['lokasifile']; ?>" alt="<?php echo $row['judulfoto']; ?>" width="100">
                            </td>
                            <td><?php echo $row['tanggalhapus']; ?></td>
                            <td><?php echo $row['Username']; ?></td>
                            <td>
                                <form method="POST" action="aksi_sampah.php">
                                    <input type="hidden" name="foto_id" value="<?php echo $row['fotoid']; ?>">
                                    <button type="submit" name="restore" class="btn btn-primary">Restore</button>
                                    <button type="submit" name="delete_permanent" class="btn btn-danger">Delete Permanent</button>
                                </form>
                            </td>
                        </tr>
                <?php
                    endwhile;
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p>&copy; Ujikom RPL | Nurresya Amelia</p>
    </footer>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
