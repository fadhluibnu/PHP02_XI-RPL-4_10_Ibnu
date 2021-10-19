<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Hapus Data</title>
</head>

<body>
    <div class="container mt-4">
        <?php
        include 'koneksi.php';
        $id_siswa = $_GET['id_siswa'];
        $id_jurusan = $_GET['id_jurusan'];

        $del_buku = "DELETE FROM buku WHERE id_siswa=$id_siswa";
        $del_jurusan = mysqli_query($conn, "DELETE FROM jurusan WHERE id_jurusan='$id_jurusan'");

        if ($conn->query($del_buku) === true) : ?>
            <h4>Data berhasil di hapus</h4>
            <a href="tampil.php">Kembali</a>
        <?php
        endif;
        $conn->close();
        ?>
    </div>
</body>

</html>