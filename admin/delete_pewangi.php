<?php

require '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM tbl_pewangi WHERE id_pewangi='$id'");

echo "<script>alert('data berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=pewangi'</script>";