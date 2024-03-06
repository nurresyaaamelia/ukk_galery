<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $tanggalunggah = date('Y-m-d');
    $AlbumID = $_POST['AlbumID'];
    $userID = $_POST['userID'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = '../assets/img/';
    $namafoto = rand() . '-' . $foto;

    move_uploaded_file($tmp, $lokasi . $namafoto);

    $sql = mysqli_query($koneksi, "INSERT INTO foto VALUES ('','$judulfoto','$deskripsifoto','$tanggalunggah','$namafoto','$AlbumID','$userID')");

    if ($sql) {
        if ($_SESSION['role'] === 'admin') {
            header('location:../admin/foto.php');
        } elseif ($_SESSION['role'] === 'user') {
            header('location:../user/foto.php');
        } else {
            
            header('location:../admin/foto.php');
        }
    }
}



if (isset($_POST['edit'])) {
$fotoid = $_POST['fotoid'];
$judulfoto = $_POST['judulfoto'];
$deskripsifoto = $_POST['deskripsifoto'];
$tanggalunggah = date('Y-m-d');
$AlbumID = $_POST['AlbumID'];
$UserId = $_SESSION['UserId'];
$foto = $_FILES['lokasifile']['name'];
$tmp = $_FILES['lokasifile']['tmp_name'];
$lokasi = '../assets/img/';
$namafoto = rand() . '-' . $foto;

if ($foto == null || $foto == "") {
$sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', tanggalunggah='$tanggalunggah', AlbumID='$AlbumID' WHERE fotoid='$fotoid'");
} else {
$query = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
$data = mysqli_fetch_array($query);
if (is_file('../assets/img/' . $data['lokasifile'])) {
unlink('../assets/img/' . $data['lokasifile']);
}
move_uploaded_file($tmp, $lokasi . $namafoto);
$sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', tanggalunggah='$tanggalunggah', lokasifile='$namafoto', AlbumID='$AlbumID' WHERE fotoid='$fotoid'");
}

if ($sql) {
    if ($_SESSION['role'] === 'admin') {
        header('location:../admin/foto.php');
    } elseif ($_SESSION['role'] === 'user') {
        header('location:../user/foto.php');
    } else {
       
        header('location:../admin/foto.php');
    }
} else {
echo "<script>
    alert('Gagal memperbarui data');
    location.href = '../admin/foto.php';
</script>";
}
}

if (isset($_POST['hapus'])) {
$fotoid = $_POST['fotoid'];
$query = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
$data = mysqli_fetch_array($query);
if (is_file('../assets/img/' . $data['lokasifile'])) {
unlink('../assets/img/' . $data['lokasifile']);
}
$sql = mysqli_query($koneksi, "DELETE FROM foto WHERE fotoid='$fotoid'");

if ($sql) {
    if ($_SESSION['role'] === 'admin') {
        header('location:../admin/foto.php');
    } elseif ($_SESSION['role'] === 'user') {
        header('location:../user/foto.php');
    } else {
        
        header('location:../admin/foto.php');
    }
} else {
echo "<script>
    alert('Gagal menghapus data');
    location.href = '../admin/foto.php';
</script>";
}
}
?>