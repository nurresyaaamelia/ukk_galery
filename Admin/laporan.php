<?php
// Koneksi ke database
$servername = "localhost";
$username_db = "root"; // Ganti dengan username MySQL Anda
$password_db = ""; // Ganti dengan password MySQL Anda
$database = "db_galery"; // Ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username_db, $password_db, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query SQL untuk mengambil data report dan foto
$sql = "SELECT r.fotoid, r.Username, r.reason, r.TanggalLapor, f.lokasifile
        FROM report r
        JOIN foto f ON r.fotoid = f.fotoid";

$result = $conn->query($sql);

$username = "admin"; // Inisialisasi variabel username
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
    <div class="collapse navbar-collapse mt-2"  id="navbarNavAltMarkup">
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
            <h2>Data Report</h2>
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Foto ID</th>
                    <th>Username</th>
                    <th>Reason</th>
                    <th>Tanggal Lapor</th>
                    <th>Foto</th>
                    <th>Aksi</th> <!-- Kolom baru untuk tombol hapus -->
                </tr>
                </thead>
                <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    $count = 1;
                    while ($d = $result->fetch_assoc()) {
                        $username = $d['Username'];
                        echo "<tr>";
                        echo "<td>" . $count . "</td>";
                        echo "<td>" . $d['fotoid'] . "</td>";
                        echo "<td>" . $username . "</td>";
                        echo "<td>" . $d['reason'] . "</td>";
                        echo "<td>" . $d['TanggalLapor'] . "</td>";
                        $foto_path = "../assets/img/" . $d['lokasifile'];
                        if (file_exists($foto_path)) {
                            echo "<td><img src='" . $foto_path . "' style='max-width: 100px;' /></td>";
                        } else {
                            echo "<td>Foto tidak ditemukan</td>";
                        }
                        echo "<td><button class='btn btn-danger' onclick='hapusFoto(\"" . $d['fotoid'] . "\", \"" . $d['lokasifile'] . "\")'>Hapus</button></td>";
                        echo "</tr>";
                        $count++;
                    }
                } else {
                    echo "<tr><td colspan='7'>Tidak ada data report</td></tr>";
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
    // Fungsi untuk menghapus foto dan data dari database
    function hapusFoto(fotoid, lokasifile) {
        if (confirm("Apakah Anda yakin ingin menghapus foto ini?")) {
            // Panggil skrip PHP untuk menghapus foto dan data dari database
            window.location.href = "../config/hapus_foto.php?fotoid=" + fotoid + "&lokasifile=" + lokasifile;
        }
    }
</script>
<?php
// Tutup koneksi
$conn->close();
?>
</body>
</html>
