<?php
include '../inc/koneksi.php';

# mulai session
// session_start();
// if (@$_SESSION['userweb'] != ""){
//     if(@$_SESSION['level'] = "admin"){
//         header("location:../admin/index.php");
//     }else if(@$_SESSION['level'] = "kasir"){
//         header("location:../kasir/index.php");
//     }
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginValidation</title>
    <link rel="stylesheet" href="tampilan.css">
    <!-- Sweet alerts with JS-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
    <div class="container">
        <form name="login" onsubmit="return validasiEmail();" class="form" method="post">
            <div class="error" style="display: none"></div>

            <div class="input-field">
                <label for="email">Email</label>
                <input type="text" id="email" name="email">
            </div>

            <div class="input-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>

            <input type="submit" name="flogin" value="Login" id="login">
            
        </form>
        <?php
        if (isset($_POST['flogin'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $qlogin = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");
            $cek = mysqli_num_rows($qlogin);
            $data = mysqli_fetch_array($qlogin);
    
            if ($cek < 1){
                ?>
                    <script type="text/javascript">
                        swal({title: "Oppsss!",
                            text: "Username dan Password anda salah!",
                            icon: "warning",
                            button: true});
                    </script>
                <?php
            @$_SESSION['userweb']= $data ['id_user'];
            }else if($data['akses'] == "kasir"){
                $_SESSION['level'] = "kasir";
                header("location:../kasir/index.php");
            }else if($data['akses'] == "admin"){
                $_SESSION['level'] = "admin";
                header("location:../admin/index.php");
            }
        }
        ?>
    </div>
    <script src="vallog.js"></script>
</body>
</html>