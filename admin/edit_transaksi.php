<?php

    //koneksi databse
    require '../koneksi.php';

?>
<body class="hold-transition skin-blue sidebar-mini">
	<section class="content">
    <div class="row mt-4">
    <div class="col-md-7">
  	<div class="box">
    	<div class="box-header">
        <h3 class="box-title">Edit Transaksi</h3>
    </div>
		<div class="box-body">
            <?php 
				// menangkap id yang dikirim melalui url
				$id = $_GET['id'];

				// megambil data pelanggan yang ber id di atas dari tabel pelanggan
				$transaksi = mysqli_query($koneksi,"SELECT * FROM tbl_transaksi where id_transaksi='$id'");
				while($t=mysqli_fetch_array($transaksi)):
			?>
        <form action="update_transaksi.php" method="POST">

                    <!-- menyimpan id transaksi yang di edit dalam form hidden berikut -->
                    <input type="hidden" name="id" value="<?= $t['id_transaksi']; ?>">
                    
                    <div class="form-group">
                        <label for="">Nama Pelanggan: </label>
                        <select class="form-control" name="nama_pelanggan" required="required">
                          <option value="">-- Pilih Pelanggan</option>
                          <?php

                            $data = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan");

                            while($d=mysqli_fetch_assoc($data)):
                          ?>
                              <option <?php if($d['id_pelanggan']==$t['id_pelanggan']){echo "selected='selected'";} ?> value="<?= $d['id_pelanggan']; ?>"><?= $d['nama_pelanggan']; ?></option>	              
                            
                            <?php 
                            endwhile;
                            ?>    

                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Layanan: </label>
                        <select class="form-control" name="jenis_layanan" required="required">
                          <option value="">-- Pilih Jenis Layanan</option>
                          <?php

                            $data = mysqli_query($koneksi, "SELECT * FROM tbl_layanan");

                            while($d=mysqli_fetch_assoc($data)):
                          ?>
                               <option <?php if($d['id_layanan']==$t['id_layanan']){echo "selected='selected'";} ?> value="<?= $d['id_layanan']; ?>"><?= $d['jenis_layanan']; ?></option>	                 
                            
                            <?php 
                            endwhile;
                            ?>    

                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Pewangi: </label>
                        <select class="form-control" name="nama_lpewangi" required="required">
                          <option value="">-- Pilih Jenis Pewangi</option>
                          <?php

                            $data = mysqli_query($koneksi, "SELECT * FROM tbl_pewangi");

                            while($d=mysqli_fetch_assoc($data)):
                          ?>
                               <option <?php if($d['id_pewangi']==$t['id_pewangi']){echo "selected='selected'";} ?> value="<?= $d['id_pewangi']; ?>"><?= $d['nama_pewangi']; ?></option>                  
                            
                            <?php 
                            endwhile;
                            ?>    

                          ?>
                        </select>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3">
                        <label>Berat Pakaian</label>
                        <input type="number" class="form-control" name="berat" placeholder="Masukkan berat cucian .." required="required" value="<?= $t['berat']; ?>">
                      </div>
                      <div class="col-sm-6 mb-3">
                        <label>Tgl. Selesai</label>
                        <input type="date" class="form-control" name="tgl_selesai_transaksi" required="required" value="<?= $t['tgl_selesai_transaksi']; ?>">
                      </div>
                    </div>  
                    <table class="table table-bordered table-striped">
                      <tr>
                        <th>Jenis Barang</th>
                        <th width="20%">Jumlah</th>
                      </tr>
                            
							<?php 
							// menyimpan id transaksi ke variabel id_transaksi
							$id_transaksi = $t['id_transaksi'];

							// menampilkan pakaian-pakaian dari transaksi yang ber id di atas
							$barang = mysqli_query($koneksi, "SELECT * FROM tbl_jenis_barang where id_transaksi='$id_transaksi'");

							while($b=mysqli_fetch_array($barang)):
							?>	
                      <tr>
                        <td><input type="text" class="form-control" name="jenis_barang[]" value="<?= $b['jenis_barang']; ?>"></td>
                        <td><input type="number" class="form-control" name="jumlah_barang[]" value="<?= $b['jumlah_barang']; ?>"></td>
                      </tr>
                        <?php endwhile; ?>
                      <tr>
                        <td><input type="text" class="form-control" name="jenis_barang[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_barang[]"></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" name="jenis_barang[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_barang[]"></td>
                      </tr>
                    </table>
                    <div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status_transaksi" required="required">										
									<option <?php if($t['status_transaksi']=="0"){echo "selected='selected'";} ?> value="0">PROSES</option>																		
									<option <?php if($t['status_transaksi']=="1"){echo "selected='selected'";} ?> value="1">DI CUCI</option>																		
									<option <?php if($t['status_transaksi']=="2"){echo "selected='selected'";} ?> value="2">SELESAI</option>																		
								</select>				
					</div>	
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
                <?php 
					      endwhile;
				        ?>
                </form>
            
        </div>
        
    </div>
    </div>
    </section>