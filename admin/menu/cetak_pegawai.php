<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data</title>
</head>
<body>';
    $qjumlah = mysqli_query($koneksi, "SELECT * FROM user WHERE akses = 'kasir'");
    $jumlah = mysqli_num_rows($qjumlah);
$html .= '<h3>Data Pegawai</h3>
    <table class="table table-striped">
    <thead>
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Password</th>
        <th>Akses</th>
    </tr>
    </thead>
    <tbody>';
    //page
        $batas = 5;
        $hal = ceil($jumlah / $batas);
        $page = (isset($_GET['hal']))? $_GET['hal']:1;
        $posisi = ($page - 1) * $batas;
    //tutup page
        $no = 1 + $posisi;
        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE akses = 'kasir'");
        while ($data = mysqli_fetch_array($query)){
            $html .='
            <tr>
                <td>'.$no++; .'</td>
                <td>'.$data['nama']; .'</td>
                <td>'.$data['email']; .'</td>
                <td>'.$data['password']; .'</td>
                <td>'.$data['akses']; .'</td>
            </tr>';
        }
$html .='
</table>
</body>
</html>';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$dompdf->stream("playerofcode", array("Attachment" => 0));

?>