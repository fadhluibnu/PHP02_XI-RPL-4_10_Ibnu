<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Ubah Data</title>
</head>

<body class="bg-light">
    <?php
    include 'koneksi.php';
    $id_siswa = $_GET['id_siswa'];
    $id_jurusan = $_GET['id_jurusan'];

    $sql_buku = mysqli_query($conn, "SELECT * FROM buku WHERE id_siswa=$id_siswa");
    $sql_jurusan = mysqli_query($conn, "SELECT * FROM jurusan WHERE id_jurusan='$id_jurusan'");

    $buku = mysqli_fetch_assoc($sql_buku);
    $jurusan = mysqli_fetch_assoc($sql_jurusan);

    // add checked
    $laki = '';
    $perempuan = '';
    if ($buku['jenis_kelamin'] == "Laki - Laki") {
        $laki = 'checked';
    } else {
        $perempuan = 'checked';
    };

    $rpl = '';
    $tkj = '';
    $tja = '';
    if ($jurusan['nama_jurusan'] == 'RPL') {
        $rpl = 'checked';
    } elseif ($jurusan['nama_jurusan'] == 'TKJ') {
        $tkj = 'checked';
    } else {
        $tja = 'checked';
    }

    // update data

    if (isset($_POST['submit'])) {
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $gender = $_POST['gender'];
        $kejuruan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];

        $up_buku = mysqli_query($conn, "UPDATE buku SET nis=$nis, nama_siswa='$nama', jenis_kelamin='$gender', alamat='$alamat' WHERE id_siswa='$id_siswa'");
        $up_jurusan = mysqli_query($conn, "UPDATE jurusan SET nama_jurusan='$kejuruan' WHERE id_jurusan='$id_jurusan'");

        if ($up_buku == true && $up_jurusan == true) {
            echo "<script>
            alert('Berhasil')
            </script>";
            header('Location: tampil.php');
            exit;
        } else {
            echo "Error:" . $up_buku . "<br>" . $conn->error;
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-6 m-auto">
                <form id="form" method="POST">
                    <input type="hidden" name="id" value="<?= $id_siswa ?>">
                    <div class="mb-3">
                        <a href="tampil.php" class="btn p-0 h4" style="color: var(--bs-blue);"><i class="bi bi-arrow-left"></i> Kembali</a>
                    </div>
                    <h3 class="mb-3">Ubah Data</h3>
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input class="form-control" type="text" name="nis" id="nis" aria-label="default input example" value="<?= $buku['nis'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input class="form-control" type="text" name="nama" id="nama" aria-label="default input example" value="<?= $buku['nama_siswa'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">Jenis Kelamin</label>
                        <br>
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Laki - Laki" <?= $laki ?>>
                        <label class="form-check-label" for="gender">Laki - Laki</label>

                        <input class="form-check-input ms-4" type="radio" name="gender" id="gender" value="Perempuan" <?= $perempuan ?>>
                        <label class="form-check-label" for="gender">Perempuan</label>
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-2">Jurusan</label>
                        <br>
                        <input class="form-check-input" type="radio" name="jurusan" id="jurusan" value="RPL" <?= $rpl ?>>
                        <label class="form-check-label" for="jurusan">RPL</label>

                        <input class="form-check-input ms-4" type="radio" name="jurusan" id="jurusan" value="TKJ" <?= $tkj ?>>
                        <label class="form-check-label" for="jurusan">TKJ</label>

                        <input class="form-check-input ms-4" type="radio" name="jurusan" id="jurusan" value="TJA" <?= $tja ?>>
                        <label class="form-check-label" for="jurusan">TJA</label>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input class="form-control" type="text" name="alamat" id="alamat" aria-label="default input example" value="<?= $buku['alamat'] ?>">
                    </div>
                    <div class="mb-1">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>