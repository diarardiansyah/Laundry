<section class="content">
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Pewangi</h3>
    </div>
		<div class="box-body">
		
            
        
		    <br>
            <br>
			
            <table id="dataTables-example" class="table table-bordered table-striped">
			  <thead>
			    <tr>
                    <th>No</th>
                    <th>Nama Pewangi</th>
                    <th>Harga Pewangi</th>
                    
                </tr>
			 </thead>            
					<?php                     

						require '../koneksi.php';

						$no = 1;
						
						$data = mysqli_query($koneksi,"SELECT * FROM tbl_pewangi");
						
						while($row=mysqli_fetch_assoc($data)):
          ?>
			<tbody>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_pewangi']; ?></td>
                    <td><?= $row['harga_pewangi']; ?></td>
                               
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
                <h4 class="modal-title">Add Data Pewangi</h4>
              </div>
              <div class="modal-body">
                <form action="aksi_pewangi.php" method="POST">
                    <div class="form-group">
                        <label for="">Nama Pewangi: </label>
                        <input type="text" class="form-control" name="nama_pewangi" placeholder="masukan nama....">
                    </div>
                    <div class="form-group">
                        <label for="">Harga Pewangi: </label>
                        <input type="text" class="form-control" name="harga_pewangi" placeholder="masukan stok....">
                    </div>
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