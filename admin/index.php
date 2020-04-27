<?php

session_start();

//konek ke database
include '../koneksi.php';

if($_SESSION['level']==""){
    echo "<script>alert('Silahkan Login Terlebih Dahulu'); </script> ";
    header("location:../login.php?pesan=gagal");
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Laundry</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="icon" href="assets/laundry.png">

  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>LAUNDRY</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>LAUNDRY</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
            </a>
           
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
            </a>
            <ul class="dropdown-menu">
             
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      
                    </a>
                  </li>
                  <li>
                    <a href="#">
                                          </a>
                  </li>
                  <li>
                    <a href="#">
                                          </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                     
                    </a>
                  </li>
                </ul>
              </li>
              
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              
            </a>
            <ul class="dropdown-menu">
              
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  
                  <!-- end task item -->
                </ul>
              </li>
              
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../img/default.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Administrator</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../img/default.jpg" class="img-circle" alt="User Image">

                <p>
                  Diar Ardiansyah - Web Developer
                  <small>Member since Nov. 2019</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../img/default.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrator</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.php"><i class="fa fa-circle-o"></i> Dashboard</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Menu Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?halaman=user"><i class="fa fa-circle-o"></i>Kelola Data User</a></li>
            <li><a href="?halaman=pelanggan"><i class="fa fa-circle-o"></i>Kelola Data Pelanggan</a></li>
          </ul>
        </li>
        <li>
          <a href="?halaman=layanan">
            <i class="fa fa-laptop"></i>
            <span>Jenis Layanan</span>
            </span>
          </a>
        </li>
        <li>
          <a href="?halaman=pewangi">
            <i class="fa fa-laptop"></i>
            <span>Jenis Pewangi</span>
            </span>
          </a>
        </li>
        <li>
          <a href="?halaman=transaksi">
            <i class="fa fa-pie-chart"></i>
            <span>Kelola Transaksi</span>
          </a>
        </li>
        <li>
          <a href="?halaman=laporan">
            <i class="fa fa-calendar"></i>
            <span>Laporan</span>
          </a>
        </li>
        <li>
          <a href="?halaman=logout" onclick="return confirm('yakin anda ingin keluar');">
            <i class="fa fa-envelope"></i> <span>Logout</span>
          </a>
        </li>
            </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="row">
            <?php
                if(isset($_GET['halaman'])) 
                {
                    if($_GET['halaman']=="pelanggan")
                    {
                        include 'pelanggan.php';
                    } 
                    
                    elseif($_GET['halaman']=="edit_pelanggan")
                    
                    {
                        include 'edit_pelanggan.php';
                    }
                    elseif($_GET['halaman']=="delete_pelanggan")
                    
                    {
                        include 'delete_pelanggan.php';
                    }
                    elseif($_GET['halaman']=="layanan")
                    
                    {
                        include 'layanan.php';
                    }
                    elseif($_GET['halaman']=="edit_layanan")
                    
                    {  
                      include 'edit_layanan.php';
                    }
                    elseif($_GET['halaman']=="delete_layanan")
                    
                    {
                        include 'delete_layanan.php';
                    }
                    elseif($_GET['halaman']=="transaksi")
                    
                    {
                        include 'transaksi.php';
                    }
                    elseif($_GET['halaman']=="delete_transaksi")
                    
                    {
                        include 'delete_transaksi.php';
                    }
                    elseif($_GET['halaman']=="edit_transaksi")
                    
                    {
                        include 'edit_transaksi.php';
                    }
                    elseif($_GET['halaman']=="delete_transaksi")
                    
                    {
                        include 'delete_transaksi.php';
                    }
                    elseif($_GET['halaman']=="invoice_transaksi")
                    
                    {
                        include 'invoice_transaksi.php';
                    }
                    elseif($_GET['halaman']=="cetak_invoice")
                    
                    {
                        include 'cetak_invoice.php';
                    }
                    elseif($_GET['halaman']=="laporan")
                    
                    {
                        include 'laporan.php';
                    }
                    elseif($_GET['halaman']=="user")
                    
                    {
                        include 'user.php';
                    }
                    elseif($_GET['halaman']=="edit_user")
                    
                    {
                        include 'edit_user.php';
                    }
                    elseif($_GET['halaman']=="delete_user")
                    
                    {
                        include 'delete_user.php';
                    }
                    elseif($_GET['halaman']=="logout")
                    
                    {
                        include 'logout.php';
                    }
                    elseif($_GET['halaman']=="pewangi")
                    
                    {
                        include 'pewangi.php';
                    }
                    elseif($_GET['halaman']=="tambah_pewangi")
                    
                    {
                        include 'tambah_pewangi.php';
                    }
                    elseif($_GET['halaman']=="edit_pewangi")
                    
                    {
                        include 'edit_pewangi.php';
                    }
                    elseif($_GET['halaman']=="delete_pewangi")
                    
                    {
                        include 'delete_pewangi.php';
                    }
                       
                }
                   else
                {
                    include 'home.php';
                }

            ?>
        </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; 2019 <a href="https://adminlte.io">Diar Ardiansyah</a>.</strong>Diar Ardiansyah
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="bower_com
ponents/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<!-- page script -->
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
  $(document).ready(function () {
    $('#dataTables-example').dataTable();
  });
</script>

</body>
</html>
