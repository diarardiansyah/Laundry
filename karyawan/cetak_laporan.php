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

<?php
	//koneksi database
	require "../koneksi.php";

?>


<div class="container">

		<center><h2>LAUNDRY "SYADIAH LAUNDRY"</h2></center>
		<br/>
		<br/>
		<?php 
		if(isset($_GET['dari']) && isset($_GET['sampai'])){

			$dari = $_GET['dari'];
			$sampai = $_GET['sampai'];
			?>
			<h4>Data Laporan Laundry dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
			<table class="table table-bordered table-striped">
				<tr>
					<th width="1%">No</th>
					<th>Invoice</th>
					<th>Tanggal</th>
					<th>Pelanggan</th>
					<th>Jenis Layanan</th>
					<th>Berat (Kg)</th>
					<th>Tgl. Selesai</th>
					<th>Total Harga</th>
					<th>Status</th>				
				</tr>

			<?php

				$data = mysqli_query($koneksi, "SELECT tbl_transaksi.*, tbl_transaksi.id_transaksi, tbl_pelanggan.nama_pelanggan, tbl_layanan.jenis_layanan FROM tbl_transaksi INNER JOIN tbl_pelanggan ON tbl_transaksi.id_pelanggan=tbl_pelanggan.id_pelanggan INNER JOIN tbl_layanan ON tbl_transaksi.id_layanan=tbl_layanan.id_layanan AND DATE(tgl_transaksi) > 
                '$dari' AND DATE(tgl_transaksi) < '$sampai' ORDER BY id_transaksi DESC");

				$no = 1;

				while($d=mysqli_fetch_assoc($data)):
			?>
				<tr>
							<td><?= $no++; ?></td>
							<td>INVOICE-<?= $d['id_transaksi']; ?></td>
							<td><?= $d['tgl_transaksi']; ?></td>
							<td><?= $d['nama_pelanggan']; ?></td>
							<td><?= $d['jenis_layanan']; ?></td>
							<td><?= $d['berat']; ?></td>
							<td><?= $d['tgl_selesai_transaksi']; ?></td>
							<td><?php echo "Rp. ".number_format($d['total_harga']) ." ,-"; ?></td>				
							<td>
									<?php 
									if($d['status_transaksi']=="0"){
										echo "<div class='label label-warning'>PROSES</div>";
									}else if($d['status_transaksi']=="1"){
										echo "<div class='label label-info'>DICUCI</div>";
									}else if($d['status_transaksi']=="2"){
										echo "<div class='label label-success'>SELESAI</div>";
									}
									?>							
							</td>
						</tr>
						<?php endwhile; ?>
					</table>

				<?php } ?>

		</div>

		<script type="text/javascript">
			window.print();
		</script>

</body>
</html>