<?php

require '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM tbl_user WHERE id_user='$id'");

echo "<script>alert('data berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=user'</script>";