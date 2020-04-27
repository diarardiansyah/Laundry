<?php

require '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM tbl_layanan WHERE id_layanan='$id'");

echo "<script>alert('data berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=layanan'</script>";