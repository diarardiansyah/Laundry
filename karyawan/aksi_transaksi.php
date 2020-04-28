<?php 

//koneksi database 
require '../koneksi.php';

//menagkap data yang dikirim dari form
$nama_pelanggan = $_POST['nama_pelanggan'];

$jenis_layanan = $_POST['jenis_layanan'];
$berat = $_POST['berat'];
$tgl_selesai_transaksi = $_POST['tgl_selesai_transaksi'];

$tgl_hari_ini = date('Y-m-d');
$status = 0;

//mengambil data harga dari databas

$h = mysqli_query($koneksi,"SELECT * FROM  tbl_layanan WHERE id_layanan = $jenis_layanan");
$harga_layanan = mysqli_fetch_assoc($h);

//menghitung harga laundry
$total_harga = $berat*$harga_layanan['harga_layanan'];

//input data ke database
mysqli_query($koneksi, "INSERT INTO tbl_transaksi VALUES('','$tgl_hari_ini', '$nama_pelanggan', '$jenis_layanan', '$berat', '$total_harga', '$tgl_selesai_transaksi', '$status')");

//menyimpan id dari data yang disimpan
$id_terakhir = mysqli_insert_id($koneksi);

// menangkap data form input array (jenis pakaian dan jumlah pakaian)
$jenis_barang = $_POST['jenis_barang'];
$jumlah_barang = $_POST['jumlah_barang'];

// input data cucian berdasarkan id transaksi (invoice) ke table pakaian
for($x=0;$x<count($jenis_barang);$x++){
	if($jenis_barang[$x] != ""){
		mysqli_query($koneksi,"INSERT INTO tbl_jenis_barang values('','$id_terakhir','$jenis_barang[$x]','$jumlah_barang[$x]')");

	}
}

echo "<script>alert('data berhasil ditambahkan');</script>";
echo "<script>location='index.php?halaman=transaksi'</script>";



