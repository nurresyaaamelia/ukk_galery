<?php
session_start();
include_once("../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (isset($_FILES["file_foto"]) && $_FILES["file_foto"]["error"] == UPLOAD_ERR_OK) {
       
        $file_name = $_FILES["file_foto"]["name"];
        $file_tmp = $_FILES["file_foto"]["tmp_name"];
        $file_type = $_FILES["file_foto"]["type"];
        $file_size = $_FILES["file_foto"]["size"];

        
        $allowed_types = array("image/jpeg", "image/png", "image/gif");
        if (in_array($file_type, $allowed_types)) {
           
            $upload_path = "../assets/img/" . $file_name;
            if (!file_exists($upload_path)) {
               
                move_uploaded_file($file_tmp, $upload_path);

                
                $albumID = $_POST['AlbumID'];
                $deskripsifoto = $_POST['deskripsifoto'];
                $userID = $_SESSION['userID'];

                
                $query = mysqli_query($koneksi, "INSERT INTO foto (judulfoto, deskripsifoto, tanggalunggah, lokasifile, AlbumID, userID) VALUES ('$file_name', '$deskripsi_foto', CURDATE(), '$file_name', '$albumID', '$userID')");

                if ($query) {
                   
                    header("Location: detail_album.php?AlbumID=$albumID");
                    exit();
                } else {
                  
                    echo "Gagal menyimpan informasi foto ke database.";
                }
            } else {
               
                echo "File foto dengan nama yang sama sudah ada.";
            }
        } else {
    
            echo "Tipe file yang diunggah harus berupa gambar (JPG, PNG, atau GIF).";
        }
    } else {
      
        echo "Gagal mengunggah file foto.";
    }
}
?>
