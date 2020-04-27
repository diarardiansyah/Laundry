<?php

require '../koneksi.php';

$nama_pelanggan = $_POST['nama_pelanggan'];
$no_telp_pelanggan = $_POST['no_telp_pelanggan'];
$alamat_pelanggan = $_POST['alamat_pelanggan'];

mysqli_query($koneksi, "INSERT INTO tbl_pelanggan VALUES('','$nama_pelanggan','$no_telp_pelanggan','$alamat_pelanggan')");

echo "<script>alert('data berhasil ditambahkan');</script>";
echo "<script>location='index.php?halaman=pelanggan'</script>";