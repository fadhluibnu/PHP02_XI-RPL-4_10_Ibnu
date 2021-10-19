<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Data Siswa</title>
</head>
<?php

include 'koneksi.php';
$queryBuku = mysqli_query($conn, 'SELECT * FROM buku ORDER BY nama_siswa ASC');
$keyword = '';
if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
    $queryBuku = mysqli_query($conn, "SELECT * FROM buku WHERE nama_siswa LIKE '%$keyword%'");
};
?>

<body>
    <div class="container mt-5">
        <form action="" method="POST">
            <div class="d-flex  mb-3">
                <input class="form-control " name="keyword" type="text" placeholder="Cari data nama" aria-label="default input example" style="width: 30%;" value="<?= $keyword ?>">
                <button type="submit" name="search" class="btn btn-primary ms-3"><i class="bi bi-search"></i></button>
            </div>
        </form>
        <table class="table table-hover">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Option</th>
            </tr>
            <?php
            $i = 0;
            while ($buku = mysqli_fetch_array($queryBuku)) :
                $i++
            ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $buku['nama_siswa']; ?></td>
                    <td><?= $buku['nis']; ?></td>
                    <td><?= $buku['jenis_kelamin']; ?></td>
                    <td>
                        <?php
                        $cek = $buku['id_jurusan'];
                        $queryJurus = mysqli_query($conn, "SELECT nama_jurusan FROM jurusan WHERE id_jurusan='$cek'");

                        $hasil = mysqli_fetch_array($queryJurus);
                        echo $hasil['nama_jurusan'];
                        ?>
                    </td>
                    <td><?= $buku['alamat']; ?></td>
                    <td>
                        <a href="ubah.php?id_siswa=<?= $buku['id_siswa'] ?>&&id_jurusan=<?= $buku['id_jurusan'] ?>" class="btn btn-primary me-4"><i class="bi bi-pencil-square"></i> Edit</a>

                        <a href="hapus.php?id_siswa=<?= $buku['id_siswa'] ?>&&id_jurusan=<?= $buku['id_jurusan'] ?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Hapus</a>
                    </td>
                <?php
            endwhile;
                ?>
        </table>
        <a href="tambah.php" class="btn btn-success"><i class="bi bi-plus-lg"></i> Tambah Siswa</a>
    </div>

</body>

</html>