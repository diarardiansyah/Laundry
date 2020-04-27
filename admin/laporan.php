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
	<section class="content">
  	<div class="box">
    	<div class="box-header">
        <h3 class="box-title">Report</h3>
    </div>
		<div class="box-body">
		      <form action="laporan.php" method="GET">
				    <table class="table table-bordered table-striped">
					<tr>				
						<th>Dari Tanggal</th>
						<th>Sampai Tanggal</th>							
						<th width="1%"></th>
					</tr>
					<tr>
						<td>
							<br/>
							<input type="date" name="tgl_dari" class="form-control">
						</td>
						<td>
							<br/>
							<input type="date" name="tgl_sampai" class="form-control">
							<br/>
						</td>
						<td>
							<br/>
							<input type="submit" class="btn btn-primary" value="Filter">
						</td>
					</tr>

			</form>
			</table>

        <?php
		    if (isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])) {
			
			$dari = $_GET['tgl_dari'];
			$sampai = $_GET['tgl_sampai'];

	    ?>

<section class="content">
<div class="box">
    <div class="box-header">
        <h4>Data Laporan Laundry dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
    </div>
		<div class="box-body">
                
                <a target="_blank" href="cetak_laporan.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-sm btn-primary"><i class="menu-icon fa fa-print"></i>CETAK</a>
		        <br>
            <br>
			
            <table id="dataTables-example" class="table table-bordered table-striped">
			  <thead>
			    <tr>
                <th>No</th>
                <th>Invoice</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Jenis Layanan</th>
                <th>Berat (Kg)</th>
                <th>Total Harga</th>
                <th>Tgl. Selesai</th>
                <th>Status</th>				    
        </tr>
			 </thead>            
					<?php                     

						require '../koneksi.php';

						$no = 1;
						
						$data = mysqli_query($koneksi,"SELECT tbl_transaksi.*, tbl_transaksi.id_transaksi, tbl_pelanggan.nama_pelanggan, tbl_layanan.jenis_layanan FROM tbl_transaksi INNER JOIN tbl_pelanggan ON tbl_transaksi.id_pelanggan=tbl_pelanggan.id_pelanggan INNER JOIN tbl_layanan ON tbl_transaksi.id_layanan=tbl_layanan.id_layanan AND DATE(tgl_transaksi) > 
                        '$dari' AND DATE(tgl_transaksi) < '$sampai' ORDER BY id_transaksi DESC");
						
						while($row=mysqli_fetch_assoc($data)):
                 ?>
			    <tbody>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td>INVOICE-<?= $row['id_transaksi']; ?></td>
                    <td><?= $row['tgl_transaksi']; ?></td>
                    <td><?= $row['nama_pelanggan']; ?></td>
                    <td><?= $row['jenis_layanan']; ?></td>                
                    <td><?= $row['berat']; ?></td>                
                    <td><?= "Rp. ".number_format($row['total_harga']) ." ,-"; ?></td>                
                    <td><?= $row['tgl_selesai_transaksi']; ?></td>                
                    <td>
                    <?php 
							if($row['status_transaksi']=="0"){
								echo "<div class='label label-warning'>PROSES</div>";
							}else if($row['status_transaksi']=="1"){
								echo "<div class='label label-info'>DICUCI</div>";
							}else if($row['status_transaksi']=="2"){
								echo "<div class='label label-success'>SELESAI</div>";
							}
							?>	
                    
                    </td>  
                </tr>
					<?php endwhile; ?>
			</tbody>
        </table>    
</div>
    <?php } ?>
</div>
</section>

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
