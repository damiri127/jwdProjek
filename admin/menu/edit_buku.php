<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
   $id = $_GET ['id_buku'];
   $qbuku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = '$id'");
   $data = mysqli_fetch_array($qbuku);

 ?>

  <div class="row">
    <h3>Edit Buku</h3>
     <div class="col-md-6">

     <form method="post">
      <div class="form-group">
        <label for="Input Data"> Judul</label>
        <input name="judul" type="text" class="form-control" value="<?php echo $data ['judul']; ?>" required="required" >
      </div>

      <div class="form-group">
        <label for="Input Data"> NoIsbn</label>
        <input name="no_isbn" type="number" class="form-control" value="<?php echo $data ['no_isbn']; ?>" required="required">
      </div>


      <div class="form-group">
        <label for="Input Data"> Penulis</label>
        <input name="penulis" type="text" class="form-control" value="<?php echo $data ['penulis']; ?>" required="required">
      </div>

      <div class="form-group">
        <label for="Input Data"> Penerbit</label>
        <input name="penerbit" type="text" class="form-control" value="<?php echo $data ['penerbit']; ?>" required="required">
      </div>


      <div class="form-group">
        <label for="Input Data"> Tahun</label>
        <input name="tahun" type="number" min="1900" max="2099" class="form-control" value="<?php echo $data ['tahun']; ?>" required="required">
      </div>

     </div>
     <div class="col-md-6">
      <div class="form-group">
        <label for="Input Data"> Stok</label>
        <input name="stok" type="number" class="form-control" value="<?php echo $data ['stok']; ?>" required="required" readonly >
      </div>

      <div class="form-group">
        <label for="Input Data"> Harga Pokok</label>
        <input name="hargapokok" type="number" class="form-control" value="<?php echo $data ['harga_pokok']; ?>" required="required" readonly>
      </div>


      <div class="form-group">
        <label for="Input Data"> Harga Jual</label>
        <input name="hargajual" type="number" class="form-control" value="<?php echo $data ['harga_jual']; ?>" required="required">
      </div>

      <div class="form-group">
        <label for="Input Data"> PPN</label>
        <input name="ppn" type="number" class="form-control" value="<?php echo $data ['ppn']; ?>" required="required" readonly>
      </div>


      <div class="form-group">
        <label for="Input Data"> Diskon</label>
        <input name="diskon" type="number" class="form-control" value="<?php echo $data ['diskon']; ?>" required="required">
      </div>

      <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan">
        <a class="btn btn-sm btn-danger" href="?menu=data_buku">Kembali</a>

     </form>

     <?php
     if (isset($_POST['fsimpan'])) {
           $judul = $_POST ['judul'];
           $noisbn = $_POST ['no_isbn'];
           $penulis = $_POST ['penulis'];
           $penerbit = $_POST ['penerbit'];
           $tahun = $_POST ['tahun']; 
           $stok = $_POST ['stok'];
           
           $hargajual = $_POST ['hargajual'];
           $jmlppn = 0.1;
           $ppn = $hargajual * $jmlppn;

           $diskon = $_POST ['diskon'];
           $hargapokok = $hargajual + $ppn - $diskon;

           $q = "UPDATE buku SET judul='$judul', no_isbn='$noisbn', penulis='$penulis', penerbit='$penerbit', tahun='$tahun', stok='$stok', harga_pokok='$hargapokok', harga_jual='$hargajual', ppn='$ppn', diskon= '$diskon' WHERE id_buku='$id'";

           mysqli_query($koneksi,$q);
           ?>
            <script type="text/javascript">
              alert('Berhasil edit buku !!');
              document.location.href="?menu=data_buku";
            </script>
           <?php
      } 
      ?>
      
     </div>
    
  </div>
</body>
</html>