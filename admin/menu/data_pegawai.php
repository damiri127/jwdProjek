<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="row">
<div class="col-xs-12 col-md-8">
 <h3>Data Pegawai</h3>
  <?php
    $qjumlah = mysqli_query($koneksi, "SELECT * FROM user WHERE akses = 'kasir'");
    $jumlah = mysqli_num_rows($qjumlah);
  ?>

 <a class="btn btn-sm btn-info" href="?menu=tambah_pegawai"><span class="glyphicon glyphicon-plus" aria hidden="true"></span> Tambah Data</a>
 <button class="btn btn-sm btn-default">Jumlah Data<span class="badge"><?php echo  $jumlah; ?></span></button>
 <a class="btn btn-sm btn-primary" href="?menu=data_pegawai">Refresh / Tampilkan all data</a>
 <a class="btn btn-sm btn-warning" href="?menu=cetak_pegawai">Cetak Data</a>
</div>
   
    <div class="col-xs-6 col-md-4">
    <form method="post">
    <div class="input-group">
      <input name="inputan" type="text" class="form-control" placeholder="Cari Data Berdasarkan Nama...">
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
 	<th>Nama</th>
 	<th>Username</th>
  <th>Password</th>
  <th>Akses</th>
 	<th>Opsi</th>
   </tr>
 </thead>

 <tbody>
  <?php
  //page
    $batas = 5;
    $hal = ceil($jumlah / $batas);
    $page = (isset($_GET['hal']))? $_GET['hal']:1;
    $posisi = ($page - 1) * $batas;
  //tutup page
    $no = 1 + $posisi;
    $inputan = $_POST['inputan'];
    if ($_POST['cari']){
      if ($inputan == ""){
        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE akses='kasir'  limit $posisi, $batas");
      }else if ($inputan != ""){
        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE nama LIKE '%$inputan%'");
      }
    }else{
      $query = mysqli_query($koneksi, "SELECT * FROM user WHERE akses='kasir'  limit $posisi, $batas");
    }

    $cek = mysqli_num_rows($query);
    if ($cek < 1) {
      ?>
      <tr>
        <td colspan = "7">
        <center>
          Data yang anda cari tidak tesedia!
          <a href="" class ="btn btn-sm btn-primary"><span class = "glyphicon glyphicon-refresh"></span></a>
        </center>
        </td>
      </tr>
      <?php
    }
    while ($data = mysqli_fetch_array($query)){
      ?>
      <tr>
        <td><?php echo $no++;?></td>
 	      <td><?php echo $data['nama'];?></td>
 	      <td><?php echo $data['email'];?></td>
 	      <td><?php echo $data['password'];?></td>
 	      <td><?php echo $data['akses'];?></td>
        <td><a title="Edit" href="?menu=edit_pegawai&id_user=<?php echo $data ['id_user']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria hidden="true"></span></a>
        <a onclick="return confirm('Apakah anda ingin menghapusnya')" title="Hapus" href="?menu=hapus_pegawai&id_user=<?php echo $data ['id_user']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria hidden="true"></span></td>
      </tr>
    <?php
    }
    ?>
 </tbody>
 </table>
</body>
</html>