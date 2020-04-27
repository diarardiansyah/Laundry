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

<a href="cetak_invoice.php?id=<?= $id; ?>" target="_blank" class="btn btn-primary pull-left"><i class="menu-icon fa fa-print"></i>CETAK</a>
</br>

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