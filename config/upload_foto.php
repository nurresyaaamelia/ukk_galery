<?php
session_start();
include_once("../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah file foto telah dipilih
    if (isset($_FILES["file_foto"]) && $_FILES["file_foto"]["error"] == UPLOAD_ERR_OK) {
        // Mendapatkan informasi file foto yang diunggah
        $file_name = $_FILES["file_foto"]["name"];
        $file_tmp = $_FILES["file_foto"]["tmp_name"];
        $file_type = $_FILES["file_foto"]["type"];
        $file_size = $_FILES["file_foto"]["size"];

        // Memeriksa apakah file adalah file gambar
        $allowed_types = array("image/jpeg", "image/png", "image/gif");
        if (in_array($file_type, $allowed_types)) {
            // Memeriksa apakah file foto sudah ada
            $upload_path = "../assets/img/" . $file_name;
            if (!file_exists($upload_path)) {
                // Memindahkan file foto ke direktori yang ditentukan
                move_uploaded_file($file_tmp, $upload_path);

                // Mendapatkan data albumID dan deskripsi dari form
                $albumID = $_POST['AlbumID'];
                $deskripsifoto = $_POST['deskripsifoto'];
                $userID = $_SESSION['userID'];

                // Menyimpan informasi foto ke dalam database
                $query = mysqli_query($koneksi, "INSERT INTO foto (judulfoto, deskripsifoto, tanggalunggah, lokasifile, AlbumID, userID) VALUES ('$file_name', '$deskripsi_foto', CURDATE(), '$file_name', '$albumID', '$userID')");

                if ($query) {
                    // Jika penyimpanan berhasil, redirect ke halaman detail album
                    header("Location: detail_album.php?AlbumID=$albumID");
                    exit();
                } else {
                    // Jika terjadi kesalahan saat menyimpan informasi foto ke database
                    echo "Gagal menyimpan informasi foto ke database.";
                }
            } else {
                // Jika file foto sudah ada di direktori yang ditentukan
                echo "File foto dengan nama yang sama sudah ada.";
            }
        } else {
            // Jika file bukan merupakan file gambar yang didukung
            echo "Tipe file yang diunggah harus berupa gambar (JPG, PNG, atau GIF).";
        }
    } else {
        // Jika tidak ada file foto yang dipilih atau terjadi kesalahan saat unggah
        echo "Gagal mengunggah file foto.";
    }
}
?>
