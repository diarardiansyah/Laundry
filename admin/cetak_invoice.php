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
require '../koneksi.php';

?>

<div class="box">
    <div class="box-header">
        <h3 class="text-center">Syadiah Laundry</h3>
    </div>
	<div class="box-body">

<?php

$id = $_GET['id'];


$ambil=$koneksi->query("SELECT * FROM tbl_transaksi JOIN tbl_pelanggan ON tbl_transaksi.id_pelanggan=tbl_pelanggan.id_pelanggan
	WHERE tbl_transaksi.id_transaksi='$id'");
$detail=$ambil->fetch_assoc();

?>

<section class="content">
    <div class="row">
        <div class="col-md-4">
            <h3>Pembayaran</h3>
            <strong>Invoice - <?= $detail['id_transaksi']; ?></strong><br>
            Tanggal & Waktu <?= $detail['tgl_transaksi']; ?><br>
        </div>

        <div class="col-md-4">
            <h3>Nama Pelanggan</h3>
            <strong><?= $detail['nama_pelanggan']; ?></strong><br>
            <?= $detail['no_telp_pelanggan']; ?><br>
            <?= $detail['alamat_pelanggan']; ?>
        </div>
    </div>


    <br>

<br>
<form method="POST">		
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Tgl Transaksi</th>
			<th>Berat Cucian (Kg)</th>
			<th>Tgl Selesai</th>
			<th>Status</th>
			<th>Harga</th>
		</tr>
	</thead>
	<tbody>

		<?php 
			// menangkap id yang dikirim melalui url
			$id = $_GET['id'];

			// megambil data pelanggan yang ber id di atas dari tabel pelanggan
			$transaksi = mysqli_query($koneksi,"SELECT * FROM tbl_transaksi WHERE id_transaksi='$id'");

			$no = 1;	

			while($t=mysqli_fetch_assoc($transaksi)) :

			
			?>

			<tr>
				<td><?= $no++; ?></td>
				<td><?= $t['tgl_transaksi']; ?></td>
				<td><?= $t['berat']; ?></td>
				<td><?= $t['tgl_selesai_transaksi']; ?></td>
				<td>
							<?php 
							if($t['status_transaksi']=="0"){
								echo "<div class='label label-warning'>PROSES</div>";
							}else if($t['status_transaksi']=="1"){
								echo "<div class='label label-info'>DICUCI</div>";
							}else if($t['status_transaksi']=="2"){
								echo "<div class='label label-success'>SELESAI</div>";
							}
							?>							
				</td>
				<td><?= "Rp. ".number_format($t['total_harga']) ." ,-"; ?></td>
			</tr>
			</tbody>
			</table>

			<br/>

				<h4 class="text-center">Daftar Cucian</h4>
				<table class="table table-bordered" id="dataTables-example">
					<tr>
						<th>Jenis Barang</th>
						<th width="20%">Jumlah</th>
					</tr>		

					<?php 
					// menyimpan id transaksi ke variabel id_transaksi
					$id = $t['id_transaksi'];

					// menampilkan pakaian-pakaian dari transaksi yang ber id di atas
					$pakaian = mysqli_query($koneksi,"SELECT * FROM tbl_jenis_barang where id_transaksi='$id'");

					while($p=mysqli_fetch_array($pakaian)) :
						?>					
						<tr>
							<td><?php echo $p['jenis_barang']; ?></td>
							<td width="5%"><?php echo $p['jumlah_barang']; ?></td>
						</tr>
						<?php endwhile; ?>							
					</table>

					<br/>
					<p><center><i>" Terima kasih telah mempercayakan cucian anda pada kami ".</i></center></p>

					<?php 
				endwhile;
				?>
			</form>
                
</section>

<script type="text/javascript">
	window.print();
</script>

</body>
</html>