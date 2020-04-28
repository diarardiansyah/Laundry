<?php
  require '../koneksi.php';

  $tanggal_sekarang = date("d M Y");

?>
<section class="content">
  <div class="alert alert-warning text-center">
		<marquee><h4 style="margin-bottom: 0px"><b>Selamat datang!</b>Di Sistem Informasi Laundry</h4></marquee>	
	</div>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
              <?php
                $data = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan");
                echo mysqli_num_rows($data);
              ?>
              </h3>

              <p>Data <br> Pelanggan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?halaman=pelanggan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
              <?php
                $data = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi WHERE status_transaksi='0'");
                echo mysqli_num_rows($data);
              ?>
              </h3>
              </h3>

              <p>Cucian <br> Diproses</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?halaman=transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
                <?php
                  $data = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi");
                  echo mysqli_num_rows($data);
                ?>
              </h3>

              <p>Jumlah <br> Transaksi</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?halaman=transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
                <?php
                
                  $data = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi WHERE status_transaksi='2'");
                  echo mysqli_num_rows($data);
                
                ?>
              </h3>

              <p>Cucian <br> Selesai </p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="?halaman=transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      </section>

      <section class="col-lg-7">
      <!-- Calendar -->
      <?php

//koneksi
include '../koneksi.php';

//query karyawan
$karyawan = mysqli_query($koneksi,"SELECT * FROM tbl_user");


while($k=mysqli_fetch_assoc($karyawan)) :	

?>

<div class="container mt-3">
    <div class="jumbotron mt-4">
    <h1 class="display-4">Selamat Datang Di Web Sistem Infromasi Laundry</h1>
    <p class="lead"> Hello,</p>
    <hr class="my-4">
    <p>Website Ini Berisi Tentang Data Infromasi Laundry</p>
    <a class="btn btn-primary btn-lg" href="<?= base_url(); ?>mahasiswa" role="button">Lihat Data Mahasiswa</a>
    </div>
    </div>
<?php endwhile; ?>                    
</div>
      </section>
      
