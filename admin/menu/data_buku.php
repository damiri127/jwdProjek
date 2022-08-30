<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="row">
<div class="col-xs-12 col-md-8">
 <h3>Data Buku</h3>
 <?php
 $qjumlah = mysqli_query($koneksi, "SELECT * FROM buku");
 $jumlah = mysqli_num_rows($qjumlah);
 ?>
 <a class="btn btn-sm btn-success" href="?menu=tambah_buku"><span class="glyphicon glyphicon-plus" aria hidden="true"></span> Tambah Data</a>
 <button class="btn btn-sm btn-default">Jumlah Data<span class="badge"><?php echo $jumlah; ?></span></button>
 <a class="btn btn-sm btn-primary" href="?menu=data_buku">Refresh / Tampilkan all data</a>
 <a class="btn btn-sm btn-warning" href="?menu=cetak_buku">Cetak Data</a>
</div>
   
    <div class="col-xs-6 col-md-4">
    <form method="post">
    <div class="input-group">
      <input name="inputan" type="text" class="form-control" placeholder="Cari Buku...">
      <span class="input-group-btn">
        <input name="cari" class="btn btn-info" type="submit" value="Cari">
      </span>
    </div>
    </form>
  </div>
</div>
<br>
 <table class="table table-striped">
 <thead>
   <tr>
 	<th>No.</th>
 	<th>Judul</th>
 	<th>NoIsbn</th>
 	<th>Penulis</th>
 	<th>Penerbit</th>
 	<th>Tahun</th>
 	<th>Stok</th>
 	<th>Harga Pokok</th>
 	<th>Harga Jual</th>
 	<th>Ppn</th>
 	<th>Diskon</th>
 	<th>Opsi</th>
   </tr>
 </thead>

 <tbody>
  <?php
  // page
  $batas = 5;
  $hal = ceil($jumlah / $batas);
  $page = (isset($_GET['hal'])) ? $_GET['hal']:1;
  $posisi = ($page - 1) * $batas;
  // tutup page

    $no = 1+$posisi;
    // function cari
    $inputan = $_POST['inputan'];
    if ($_POST['cari']){
      if ($inputan == ""){
        $q = mysqli_query($koneksi, "SELECT * FROM buku limit $posisi,$batas");
      }else if($inputan != ""){
        $q = mysqli_query($koneksi, "SELECT * FROM buku WHERE judul LIKE '%$inputan%'");
      }
    }else{
      $q = mysqli_query($koneksi, "SELECT * FROM buku limit $posisi,$batas");
    }

    $cek = mysqli_num_rows($q);
    if($cek < 1){
      ?>
          <tr>
            <td colspan = "12">
            <center>
              Data yang anda cari tidak tesedia!
              <a href="" class ="btn btn-sm btn-success"><span class = "glyphicon glyphicon-refresh"></span></a>
            </center>
            </td>
          </tr>
          <?php } 
            while ($data = mysqli_fetch_array($q)){
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo $data['no_isbn'];?></td>
                <td><?php echo $data['penulis']; ?></td>
                <td><?php echo $data['penerbit']; ?></td>
                <td><?php echo $data['tahun']; ?></td>
                <td><?php echo $data['stok']; ?></td>
                <td>Rp.<?php echo $data['harga_pokok']; ?></td>
                <td>Rp.<?php echo $data['harga_jual']; ?></td>
                <td>Rp.<?php echo $data['ppn']; ?></td>
                <td>Rp.<?php echo $data['diskon']; ?></td>
                <td><a title="Pasok" href="?menu=input_pemasukan&id_buku=<?php echo $data['id_buku'];?>" class="btn btn-info"><span class="glyphicon glyphicon-download-alt"></span></a>
                <a title="Edit" href="?menu=edit_buku&id_buku=<?php echo $data ['id_buku']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria hidden="true"></span></a>
                <a onclick="return confirm('Apakah anda ingin menghapusnya')" title="Hapus" href="?menu=hapus_buku&id_buku=<?php echo $data ['id_buku']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria hidden="true"></span></a>
                </td>
              </tr>
              <?php
            }
          ?>
 </tbody>
 </table>
</body>
</html>