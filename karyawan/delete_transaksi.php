<?php

require '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM tbl_transaksi where id_transaksi='$id'");
mysqli_query($koneksi, "DELETE FROM tbl_jenis_barang where id_transaksi='$id'");

echo "<script>alert('data berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=transaksi'</script>";