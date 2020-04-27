<?php

require '../koneksi.php';

//menangkap data yang dikirim lewat form
$nama_user = $_POST['nama_user'];
$email_user = $_POST['email_user'];
$password = $_POST['password'];
$level = $_POST['level'];

//enkripsi password
$password = password_hash($password, PASSWORD_DEFAULT);

//query add data to database 
mysqli_query($koneksi, "INSERT INTO tbl_user VALUES('','$nama_user','$email_user','$password','$level')");

//alert data berhasil ditambahkan
echo "<script>alert('user berhasil ditambahkan');</script>";
echo "<script>location='index.php?halaman=user'</script>";