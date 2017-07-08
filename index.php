<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
date_default_timezone_set("Asia/Jakarta");

include "config/koneksi.php";
include "config/fungsi_indotgl.php";
include "config/fungsi_thumb.php";
include "config/fungsiku.php";
include "config/konfigurasi.php";
include "config/paginginfo.php";
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->


<!-- Mirrored from wbpreview.com/previews/WB052C9L0/index.php by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 02 Jan 2013 20:58:01 GMT -->
<head>
    <title>Laporan KKN UIN Jakarta</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=100%; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;" />
    <link rel="icon" href="images/favicon.png" type="image/png">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png" />
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet"/>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
    <link href="css/prettyPhoto.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>

<!-- header -->
<center>
<header id="header">
    <div class="container">
        <div class="row">
            <div class="span12">
            <br>
                <a href="index.php?p=home"><img src="images/SistemRevisi.png" alt="logo"/></a>
            </div>
        </div>
    </div>
</header>
</center>

<!-- container -->
<section id="container">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="row">
          <!-- page content -->
          <section id="page-sidebar" class="alignleft span8">
            <?php 
              include 'tengah.php';
            ?>
          </section>
          <!-- sidebar -->
          <aside id="sidebar" class="alignright span4">
            <!-- USER PANEL -->
            <?php
              if (empty($_SESSION['uId'])||($_SESSION['uLevel']==1)){
            ?>
            <!-- Login -->
            <div class="title-divider">
              <h3>Login</h3>
              <div class="divider-arrow"></div>
            </div>
            <section class="block-grey aligncenter">
              <?php
                if (empty($_SESSION['uId'])&&($_GET['rl']=="0")){
              ?>
              <div class="alert alert-error">
                <button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>
                <strong>Maaf, Login anda gagal</strong><br>
                Username dan password yang anda input tidak sesuai
              </div>
              <?php
                }
              ?>
              <form id="frm-login" action="cek_login.php" class="form-inline aligncenter" method="post">
                <br>
                <div class="controls">
                  <input type="text" placeholder="Username" name="username" required>
                </div><br>
                <div class="controls">
                  <input type="password" placeholder="Password" name="password" required>
                </div><br>
                <div class="controls">
                  <select name="level">
                    <option>Pilih Level</option>
                    <option value="2">Penyunting</option>
                    <option value="3">Kelompok</option>
                  </select>
                </div><br>
                <div class="controls">
                  <input type="submit" class="btn btn-primary btn-large" value="Login">
                </div>
              </form>
                                
              </section>
              <?php
                }else{
                  if ($_SESSION['uLevel']==2){
                    $mfoto = (empty($_SESSION['uFoto']) ? "images/photo.jpg" : "foto_dosen/$_SESSION[uFoto]");    
                  }else{
                    $mfoto = (empty($_SESSION['uFoto']) ? "images/photo.jpg" : "logo_kel/$_SESSION[uFoto]");
                  }                
              ?>
              <!-- Login -->
              <div class="title-divider">
                <h3>Welcome..!!</h3>
                <div class="divider-arrow"></div>
              </div>
              <section class="block-light aligncenter">
                <div class="block-light wrap15">
                  <?php
                    if (isset($_SESSION['uId'])&&($_GET['rl']=="1")){
                  ?>
                  <div class="alert alert-success">
                    <button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>
                    <strong>Login Berhasil..!!</strong><br>
                  </div>
                  <?php
                  }
                  ?>
                  <div class="avatar">
                    <img style="max-width:120px;max-height:120px;" alt="<?php echo $_SESSION['uId']?>" src="<?php echo $mfoto;?>">
                  </div>
                  <br>
                  <div class='clear'></div>
                  <div class="description">
                    <p>
                      <span class="date">
                        <strong><?php echo $_SESSION['uKey']?></strong><br>
                        <strong><?php echo $_SESSION['uNama']?></strong><br>
                      </span>
                    </p>
                    <p>
                      <a class="btn btn-success btn-large" href="media.php?page=home">My Dashboard</a>
                      <a class="btn btn-danger btn-large" href="logout.php">Logout</a>
                    </p>
                  </div>
                </div>
              </section>
              <?php
              }
              ?>
              <!-- USER PANEL -->
          </aside>
          <!-- sidebar -->
        </div>
      </div>
    </div>
  </div>
</section>

<!--footer menu-->
<section id="footer-menu">
    <div class="container">
        <div class="row">
            <p class="span12"><span>&copy; Copyright <?php echo date("Y");?> <span class="color2">Joelz</span> | All Rights Reserved</span></p>
        </div>
    </div>
</section>
</body>
</html>