<?php

include 'koneksi.php';

$result = mysqli_query($conn, "SELECT max(id_siswa) AS maxid FROM buku");
$data = mysqli_fetch_array($result);
$idJurusan = $data['maxid'];

$idJurusan++;
$huruf = 'IDJ';
$idJurusan = $huruf . sprintf("%03s", $idJurusan);
