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
      <div class="box box-solid bg-blue-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>

            <!-- /.box-body -->
        <div class="box-footer text-black">
          <div class="row">
            <div class="col-lg-5">
              <?php  
              echo "Tanggal ", $tanggal_sekarang;
              ?>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>

      </section>
      
