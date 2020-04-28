<?php 

$koneksi = mysqli_connect("localhost","root","","db_laundry1");

if (mysqli_connect_errno()) {
    echo "koneksi database gagal : " .mysqli_connect_error(); 
}