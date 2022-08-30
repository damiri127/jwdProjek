<?php
    include 'koneksi.php';

    # mulai session
    session_start();
    if (@$_SESSION['userweb'] != ""){
        if(@$_SESSION['akses'] == "customer"){
            header("location:../user/customer.php");
        }
    }

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
        }else if(@$_SESSION['akses'] == "customer"){
            header("location:../user/customer.php");
        }
    }

?>