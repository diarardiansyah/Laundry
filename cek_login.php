<?php

session_start();

include 'koneksi.php';

$email = $_POST['email_user'];
$password = $_POST['password'];

$login = mysqli_query($koneksi, "SELECT*FROM tbl_user WHERE email_user='$email'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	$data = mysqli_fetch_assoc($login);

	if($data['level']=="admin"){

		$_SESSION['email'] = $email;
		$_SESSION['level'] = "admin";

		echo "<script>alert('Anda Berhasil Login'); </script> ";
		echo "<script>location='admin/index.php';</script>";
	
	}else if($data['level']=="staff"){

		$_SESSION['email'] = $email;
		$_SESSION['level'] = "staff";

		echo "<script>alert('Anda Berhasil Login'); </script> ";
		echo "<script>location='karyawan/index.php';</script>";
	
	}else{

		header("location:login.php?pesan=gagal");
	}
}else{
	header("location:login.php?pesan=gagal");
}

?>