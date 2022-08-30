<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <div class="row">
    <h3>Beli Buku</h3>
     <div class="col-md-8">

     <form method="POST">
     	<div class="form-group">
     		<label for="Input Data"> Nama Pembeli</label>
     		<input name="nama" type="text" class="form-control" placeholder="Nama...">
     	</div>


     	<div class="form-group">
     		<label  for="Input Data"> Judul Buku</label>
     		<select name="judul" class="form-control">
     			<option class="form-control">Koala Kumal</option>
     			<option class="form-control">Cinta Brontosaurus</option>
                <option class="form-control">Laut Biru</option>
     			<option class="form-control">Seni Untuk Bersikap Bodo amat</option>
                <option class="form-control">Filosopi Teras</option>
     			<option class="form-control">Dilan 1990</option>
                <option class="form-control">Dilan 1991</option>
     			<option class="form-control">Manusia setengah salmon</option>
                
     		</select>
     	</div>

        <div class="form-group">
     		<label for="Input Data">Jumlah</label>
     		<input name="jumlah" type="text" class="form-control" placeholder="Jumlah yang dibeli">
     	</div>

        <div class="form-group">
     		<label for="Input Data">Harga</label>
     		<input name="harga" type="text" class="form-control" readonly placeholder="Rp.120000">
     	</div>

     	<input name="fbeli" type="submit" class="btn btn-sm btn-success" value="Beli">
        <a class="btn btn-sm btn-danger" href="?menu=dashboard">Kembali</a>

     </form>
        <?php
            if(isset($_POST['fbeli'])){
                $nama = $_POST['nama'];
                $judul = $_POST['judul'];
                $jumlah = $_POST['jumlah'];
                $harga = "120000";
                
                $query = mysqli_query($koneksi, "INSERT INTO transaksi (nama,judul,jumlah,harga) VALUES ('$nama','$judul','$jumlah', '$harga')");
        ?>
        <script type="text/javascript">
          alert('Transaksi Berhasil !!');
          document.location.href="?menu=dashboard";
        </script>
        <?php
            }
        ?>
     </div>
  </div>
</body>
</html>