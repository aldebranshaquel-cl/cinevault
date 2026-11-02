<?php
session_start();

if (!isset($_SESSION['session_login'])) {
    header('Location: login.php');
    exit;
}

require 'function.php';

$id = $_GET["id"];

$film = query_db("SELECT * FROM film WHERE id = $id")[0];

if(isset($_POST['submit'])) {

    if(edit_data($_POST) > 0) {
        echo "<script>
            alert('Data berhasil diubah');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diubah');
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
        <div class="form-card form-card-edit">
            <h3>Edit Data Wishlist Film</h3>

            <form action="" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $film["id"] ?>">

                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" value="<?php echo $film["judul"]; ?>">
                </div>

                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" name="genre" value="<?php echo $film["genre"]; ?>">
                </div>

                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="number" name="tahun" value="<?php echo $film["tahun"]; ?>">
                </div>

                <div class="form-group">
                    <label for="sinopsis">Sinopsis</label>
                    <input type="textarea" name="sinopsis" value="<?php echo $film["sinopsis"]; ?>">
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar">

                    <br>
                    <br>

                    <img src="img/<?php echo $film["gambar"]; ?>" alt="" width="200" height="200">
                </div>

                <div class="button-group">
                    <button type="submit" name="submit" class="btn btn-tambah btn-submit">
                        Edit Data
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
