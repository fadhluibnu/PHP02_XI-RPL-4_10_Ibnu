<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Siswa</title>
</head>

<body class="bg-light">
    <?php
    include 'koneksi.php';
    include 'ambil.php';

    if (isset($_POST['submit'])) {
        $nis = $_POST['nis'];
        $nama = addslashes($_POST['nama']);
        $gender = $_POST['gender'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];

        $sqlSiswa = "INSERT INTO buku (nis, nama_siswa, jenis_kelamin, alamat, id_jurusan) VALUES ('$nis', '$nama', '$gender', '$alamat', '$idJurusan')";

        $sqlJurusan = "INSERT INTO jurusan (id_jurusan, nama_jurusan) VALUES ('$idJurusan', '$jurusan')";


        if ($conn->query($sqlSiswa) == true && $conn->query($sqlJurusan) == true) {
            echo "<script>
            alert('Berhasil')
            </script>";
            header('Location: tampil.php');
            exit;
        } else {
            echo "Error:" . $sqlSiswa . "<br>" . $conn->error;
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-6 m-auto">
                <form action="" method="POST" id="form">
                    <h3 class="mb-3">Tambah Data</h3>
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" name="nis" id="nis" class="form-control" aria-label="default input example">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" aria-label="default input example">
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">Jenis Kelamin</label>
                        <br>
                        <input class="form-check-input" type="radio" name="gender" id="laki" value="Laki - Laki">
                        <label class="form-check-label" for="laki">Laki - Laki</label>
                        <input class="form-check-input ms-4" type="radio" name="gender" id="perempuan" value="Perempuan">
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">Jurusan</label>
                        <br>
                        <input class="form-check-input" type="radio" name="jurusan" id="RPL" value="RPL">
                        <label class="form-check-label" for="RPL">RPL</label>
                        <input class="form-check-input ms-4" type="radio" name="jurusan" id="TKJ" value="TKJ">
                        <label class="form-check-label" for="TKJ">TKJ</label>
                        <input class="form-check-input ms-4" type="radio" name="jurusan" id="TJA" value="TJA">
                        <label class="form-check-label" for="TJA">TJA</label>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input class="form-control" type="text" name="alamat" id="alamat" aria-label="default input example">
                    </div>
                    <div class="mb-1">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>