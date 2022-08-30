<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit pegawai</title>
</head>
<body>
<?php
    $id = $_GET['id_user'];
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id'");
    $data = mysqli_fetch_array($query);
?>

    <div class="row">
        <h3>Edit data pegawai</h3>
            <div class="col-md-8">

                <form method="post">
                    <div class="form-group">
                        <label for="Input Data"> Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $data['nama'];?>">
                    </div>

                    <div class="form-group">
                        <label for="Input Data"> User Pegawai</label>
                        <input type="text" name="user" class="form-control"  value="<?php echo $data['email']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="Input Data">Akses</label>
                        <select class="form-control" name="akses">
                            <option <?php if($data['akses'] == 'Admin'){echo "selected";} ?> class="form-control">Admin</option>
                            <option <?php if($data['akses'] == 'Kasir'){echo "selected";} ?> class="form-control">Kasir</option>
                        </select>
                    </div>

                    <input type="submit" name='edit' class="btn btn-primary" value="Edit">
                    <a class="btn btn-warning" href="?menu=data_pegawai">Kembali</a>

                    <?php
                        // 2. parsing data
                        if (isset($_POST['edit'])){
                            $nama = $_POST['nama'];
                            $user = $_POST['user'];
                            $akses = $_POST['akses'];
                            // 3. create query
                            $query = mysqli_query($koneksi, "UPDATE user SET nama = '$nama', email = '$user', akses = '$akses' WHERE id_user = '$id'");
                            // 4. Cek
                                ?>
                                    <script type="text/javascript">
                                        window.alert("Data berhasil diedit");
                                        document.location.href="?menu=data_pegawai";
                                    </script>
                                <?php
                        }
                    ?>
                </form>
            </div>
    </div>
</body>
</html>