<?php

//koneksi ke database
require '../koneksi.php';

//menangkap data yang dikirm lewat form
$nama_pewangi = $_POST['nama_pewangi'];
$harga_pewangi = $_POST['harga_pewangi'];

//query insert data ke database
mysqli_query($koneksi, "INSERT INTO tbl_pewangi VALUES('','$nama_pewangi','$harga_pewangi')");

echo "<script>alert('data berhasil ditambahkan');</script>";
echo "<script>location='index.php?halaman=pewangi'</script>";