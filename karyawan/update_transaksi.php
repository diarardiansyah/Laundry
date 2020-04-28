<?php 

//koneksi database 
require '../koneksi.php';

$id = $_POST['id'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$jenis_layanan = $_POST['jenis_layanan'];
$berat = $_POST['berat'];
$tgl_selesai_transaksi = $_POST['tgl_selesai_transaksi'];

$status_transaksi = $_POST['status_transaksi'];

$h = mysqli_query($koneksi,"SELECT * FROM  tbl_layanan WHERE id_layanan = $jenis_layanan");
$harga_layanan = mysqli_fetch_assoc($h);

//menghitung harga laundry
$total_harga = $berat*$harga_layanan['harga_layanan'];

//query update data
mysqli_query($koneksi, "UPDATE tbl_transaksi SET id_pelanggan='$nama_pelanggan', id_layanan='$jenis_layanan', berat='$berat', total_harga='$total_harga', tgl_selesai_transaksi='$tgl_selesai_transaksi', status_transaksi='$status_transaksi' WHERE id_transaksi='$id'");

//menangkap form jumlah barang

$jenis_barang = $_POST['jenis_barang'];
$jumlah_barang = $_POST['jumlah_barang'];

//query hapus data dari tabel pakaian
mysqli_query($koneksi, "DELETE FROM tbl_jenis_barang WHERE id_transaksi='$id'");

// input ulang data cucian berdasarkan id transaksi (invoice) ke table pakaian
for($x=0;$x<count($jenis_barang);$x++){
	if($jenis_barang[$x] != ""){
		mysqli_query($koneksi,"INSERT INTO tbl_jenis_barang values('','$id','$jenis_barang[$x]','$jumlah_barang[$x]')");

	}
}

//mengembalikan ke halaman transaksi
echo "<script>alert('data berhasil diubah');</script>";
echo "<script>location='index.php?halaman=transaksi'</script>";
