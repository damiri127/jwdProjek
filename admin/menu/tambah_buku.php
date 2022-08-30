<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <div class="row">
    <h3>Tambah Buku</h3>
     <div class="col-md-6">

     <form method="post">
     	<div class="form-group">
     		<label for="Input Data"> Judul</label>
     		<input name="judul" type="text" class="form-control" placeholder="Judul Buku" required="required">
     	</div>

     	<div class="form-group">
        <label for="Input Data"> NoIsbn</label>
        <input name="noisbn" type="number" class="form-control" placeholder="NoIsbn" required="required">
      </div>


     	<div class="form-group">
     		<label for="Input Data"> Penulis</label>
     		<input name="penulis" type="text" class="form-control" placeholder="Penulis" required="required">
     	</div>

     	<div class="form-group">
        <label for="Input Data"> Penerbit</label>
        <input name="penerbit" type="text" class="form-control" placeholder="Penerbit" required="required">
      </div>


     	<div class="form-group">
        <label for="Input Data"> Tahun</label>
        <input name="tahun" type="number" min="1900" max="2099" class="form-control" placeholder="Tahun" required="required">
      </div>

     </div>
     <div class="col-md-6">
      <div class="form-group">
        <label for="Input Data"> Stok</label>
        <input name="stok" type="number" class="form-control" placeholder="Stok Buku" required="required">
      </div>

      <div class="form-group">
        <label for="Input Data"> Harga Pokok</label>
        <input name="hargapokok" type="number" class="form-control" placeholder="Harga pokok dihitung otomatis" required="required" readonly>
      </div>


      <div class="form-group">
        <label for="Input Data"> Harga Jual</label>
        <input name="hargajual" type="number" class="form-control" placeholder="Harga Jual" required="required">
      </div>

      <div class="form-group">
        <label for="Input Data"> PPN</label>
        <input name="ppn" type="number" class="form-control" placeholder="PPN dihitung otomatis" required="required" readonly>
      </div>


      <div class="form-group">
        <label for="Input Data"> Diskon</label>
        <input name="diskon" type="number" class="form-control" placeholder="Diskon" required="required">
      </div>

      <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan">
        <a class="btn btn-sm btn-danger" href="?menu=data_buku">Kembali</a>

     </form>

     <?php
     if (isset($_POST['fsimpan'])) {
           $judul = $_POST ['judul'];
           $noisbn = $_POST ['noisbn'];
           $penulis = $_POST ['penulis'];
           $penerbit = $_POST ['penerbit'];
           $tahun = $_POST ['tahun']; 
           $stok = $_POST ['stok'];
           
           $hargajual = $_POST ['hargajual'];
           $jmlppn = 0.1;
           $ppn = $hargajual * $jmlppn;

           $diskon = $_POST ['diskon'];
           $hargapokok = $hargajual + $ppn - $diskon;

           $q = "INSERT INTO buku (judul, no_isbn, penulis, penerbit, tahun, stok, harga_pokok, harga_jual, ppn, diskon) VALUES ('$judul', '$noisbn', '$penulis', '$penerbit', '$tahun', '$stok', '$hargapokok', '$hargajual', '$ppn', '$diskon')";

           mysqli_query($koneksi,$q);
      ?>
      
        <script type="text/javascript">
          alert('Berhasil menambahkan buku !!');
          document.location.href="?menu=data_buku";
        </script>

      <?php
        }
      ?>
      
     </div>
  	
  </div>
</body>
</html>