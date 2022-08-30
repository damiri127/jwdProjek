<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah pegawai</title>
</head>
<body>
    <div class="row">
        <h3>Tambah pegawai</h3>
            <div class="col-md-8">

                <form method="post">
                    <div class="form-group">
                        <label for="Input Data"> Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Pegawai" required="">
                    </div>

                    <div class="form-group">
                        <label for="Input Data"> User Pegawai</label>
                        <input type="text" name="user" class="form-control" placeholder="User Pegawai" required="">
                    </div>

                    <div class="form-group">
                        <label for="Input Data">Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Password" maxlength="8">
                    </div>

                    <div class="form-group">
                        <label for="Input Data">Akses</label>
                        <select class="form-control" name="akses">
                            <option class="form-control">Admin</option>
                            <option class="form-control">Kasir</option>
                        </select>
                    </div>

                    <input type="submit" name='simpan' class="btn btn-primary" value="Simpan">
                    <a class="btn btn-warning" href="?menu=data_pegawai">Kembali</a>

                    <?php
                        // 2. parsing data
                        if (isset($_POST['simpan'])){
                            $nama = $_POST['nama'];
                            $user = $_POST['user'];
                            $pass = $_POST['pass'];
                            $akses = $_POST['akses'];
                            // 3. create query
                            $query = mysqli_query($koneksi, "INSERT INTO user (nama, email, password, akses) VALUES ('$nama', '$user', '$pass', '$akses')");
                            // 4. Cek
                                ?>
                                    <script type="text/javascript">
                                        window.alert("Data berhasil ditambahkan");
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