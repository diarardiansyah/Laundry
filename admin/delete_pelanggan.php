<?php

require '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM tbl_pelanggan WHERE id_pelanggan='$id'");

echo "<script>alert('data berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=pelanggan'</script>";