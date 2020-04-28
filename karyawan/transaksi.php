<section class="content">
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Transaksi</h3>
    </div>
		<div class="box-body">
		
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default"><i class="fa fa-send-o">
                Add New Transaksi
             </button></i>
        
		    <br>
            <br>
			
            <table id="dataTables-example" class="table table-bordered table-striped">
			  <thead>
			    <tr>
                <th>No</th>
                <th>Invoice</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Jenis Layanan</th>
                <th>Jenis Pewangi</th>
                <th>Berat (Kg)</th>
                <th>Total Harga</th>
                <th>Tgl. Selesai</th>
                <th>Status</th>				
                <th>OPSI</th>
        </tr>
			 </thead>            
					<?php                     

						require '../koneksi.php';

						$no = 1;
						
						$data = mysqli_query($koneksi,"SELECT tbl_transaksi.*, tbl_transaksi.id_transaksi, tbl_pelanggan.nama_pelanggan, tbl_layanan.jenis_layanan, tbl_pewangi.nama_pewangi FROM tbl_transaksi INNER JOIN tbl_pelanggan ON tbl_transaksi.id_pelanggan=tbl_pelanggan.id_pelanggan INNER JOIN tbl_layanan ON tbl_transaksi.id_layanan=tbl_layanan.id_layanan INNER JOIN tbl_pewangi ON tbl_transaksi.id_pewangi=tbl_pewangi.id_pewangi ORDER BY id_transaksi ASC");
						
						while($row=mysqli_fetch_assoc($data)):
          ?>
			<tbody>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>INVOICE-<?= $row['id_transaksi']; ?></td>
                    <td><?= $row['tgl_transaksi']; ?></td>
                    <td><?= $row['nama_pelanggan']; ?></td>
                    <td><?= $row['jenis_layanan']; ?></td>                
                    <td><?= $row['nama_pewangi']; ?></td>                
                    <td><?= $row['berat']; ?> Kg</td>                
                    <td><?= "Rp. ".number_format($row['total_harga']) ." ,-"; ?></td>                
                    <td><?= $row['tgl_selesai_transaksi']; ?></td>                
                    <td>
                    <?php 
							if($row['status_transaksi']=="0"){
								echo "<div class='label label-warning'>PROSES</div>";
							}else if($row['status_transaksi']=="1"){
								echo "<div class='label label-info'>DICUCI</div>";
							}else if($row['status_transaksi']=="2"){
								echo "<div class='label label-success'>SELESAI</div>";
							}
							?>	
                    
                    </td>   
                    <td>
                            <a href="index.php?halaman=invoice_transaksi&id=<?= $row['id_transaksi']; ?>" target="_blank" class="btn btn-warning btn-sm">Invoice</a>
                            <a href="index.php?halaman=edit_transaksi&id=<?= $row['id_transaksi']; ?>" class="btn btn-info btn-sm"><i class="fa fa-pencil">Edit</a></i>
                            <a href="index.php?halaman=delete_transaksi&id=<?= $row['id_transaksi']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o">Hapus</a></i>
                    </td>                     
                </tr>
					<?php endwhile; ?>
				</tbody>
            </table>
    </div>
</div>
</section>

<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
          
              <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Transaksi</h4>
              </div>
              <div class="modal-body">
                <form action="aksi_transaksi.php" method="POST">
                    <div class="form-group">
                        <label for="">Nama Pelanggan: </label>
                        <select class="form-control" name="nama_pelanggan" required="required">
                          <option value="">-- Pilih Pelanggan</option>
                          <?php

                            $data = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan");

                            while($d=mysqli_fetch_assoc($data)):
                          ?>
                              <option value="<?= $d['id_pelanggan']; ?>"><?= $d['nama_pelanggan']; ?></option>                
                            
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
                              <option value="<?= $d['id_layanan']; ?>"><?= $d['jenis_layanan']; ?><?= $d['harga_layanan']; ?></option>                
                            
                            <?php 
                            endwhile;
                            ?>    

                          ?>
                        </select>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3">
                        <label>Berat Pakaian</label>
                        <input type="number" class="form-control" name="berat" placeholder="Masukkan berat cucian .." required="required">
                      </div>
                      <div class="col-sm-6 mb-3">
                        <label>Tgl. Selesai</label>
                        <input type="date" class="form-control" name="tgl_selesai_transaksi" required="required">
                      </div>
                    </div>  
                    <table class="table table-bordered table-striped">
                      <tr>
                        <th>Jenis Barang</th>
                        <th width="20%">Jumlah</th>
                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" name="jenis_barang[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_barang[]"></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" name="jenis_barang[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_barang[]"></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" name="jenis_barang[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_barang[]"></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" name="jenis_barang[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_barang[]"></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" name="jenis_barang[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_barang[]"></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" name="jenis_barang[]"></td>
                        <td><input type="number" class="form-control" name="jumlah_barang[]"></td>
                      </tr>
                    </table>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>