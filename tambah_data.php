<?php
session_start();

if (!isset($_SESSION['session_login'])) {
    header('Location: login.php');
    exit;
}

require 'function.php';

if(isset($_POST['submit'])) {

    if(tambah_data($_POST) > 0) {
        echo "<script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan');
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Film</title>

    <link rel="stylesheet" href="style.css">
</head>

<body class="page-form form-background">
    <div class="container">
        <div class="form-card form-card-tambah">
            <h3>Tambah Wishlist Film</h3>

            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" placeholder="Masukkan judul film">
                </div>

                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" name="nama" placeholder="Masukkan genre film">
                </div>

                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="number" name="tahun" placeholder="Masukkan tahun">
                </div>

                <div class="form-group">
                    <label for="sinopsis">Sinopsis</label>
                    <input type="textarea" name="sinopsis" placeholder="Tulis sinopsis">
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar">
                </div>

                <div class="button-group">
                    <button type="submit" name="submit" class="btn btn-tambah btn-submit">
                        Tambah Data
                    </button>
                    <a href="index.php" class="btn btn-kembali btn-kembali-form">
                        Kembali
                    </a>
                </div>

            </form>
            
        </div>
    </div>

</body>
</html>
