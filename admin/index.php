<?php
    include '../inc/koneksi.php';
    //mulai session
    // session_start();
    // if($_SESSION['userweb']== ""){
    //   header("location:../LoginValidation/login.php");
    // }if ($_SESSION['level'] == "kasir"){
    //   header("location:../kasir/index.php");
    // }

    // $qprofil = mysql_query("SELECT * FROM user WHERE id_user='$_SESSION[userweb]'");
    // $profil = mysqli_fetch_array($qprofil);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title class="glyphicon glyphicon-book">Toko Buku</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/admin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Admin - Toko Buku </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php"><span class="glyphicon glyphicon-th-list"  aria hidden="true"></span> Dashboard</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-user"  aria hidden="true"></span> Profile</a></li>
            <li><a onclick="return confirm('Apakah Anda Ingin keluar ?')" href="../inc/logout.php"><span class="glyphicon glyphicon-log-out"  aria hidden="true"></span> Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php
            @$menu = $_GET['menu'];
          ?>
          <ul class="nav nav-sidebar">
            <li <?php if($menu == ""){echo "class='active'";} ?>><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
            <li <?php if($menu == "data_pegawai" || $menu == "tambah_pegawai" || $menu == "edit_pegawai" || $menu == "hapus_pegawai" || $menu == "cetak_pegawai"){echo "class='active'";} ?>><a href="?menu=data_pegawai">Pegawai</a></li>
            <li <?php if($menu == "data_buku" || $menu == "tambah_buku" || $menu == "edit_buku" || $menu == "hapus_buku"){echo "class='active'";}?>><a href="?menu=data_buku">Buku</a></li>
            <li> <a href="#">Laporan Penjualan</a></li>
        </div>
        <!--ISI KONTEN DISINI -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php
          error_reporting(0);
          switch ($_GET['menu']) {

              case 'data_pegawai':
                include "menu/data_pegawai.php";
                break;

              case 'tambah_pegawai':
                include "menu/tambah_pegawai.php";
                break;
              
              case 'edit_pegawai':
                include "menu/edit_pegawai.php";
                break;
              
              case 'hapus_pegawai': $id = $_GET['id_user']; mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id'");
                include "menu/data_pegawai.php";
                break;
              
              case 'cetak_pegawai':
                include "menu/cetak_pegawai.php";
                break;

              case 'data_buku':
                include "menu/data_buku.php";
                break;

              case 'tambah_buku':
                include "menu/tambah_buku.php";
                break;
              
              case 'edit_buku':
                include "menu/edit_buku.php";
                break;
              
              case 'hapus_buku': $id = $_GET['id_buku']; mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku='$id'");
                include "menu/data_buku.php";
                break;
              
              case 'cetak_buku':
                include "menu/cetak_buku.php";
                break;

              case 'input_pemasukan':
                include "menu/input_pemasukan.php";
                break;

              case 'Logout':
              include "menu/keluar.php";
              break;

              default:
              include "menu/dashboard.php";
              break;
          }
          ?>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
