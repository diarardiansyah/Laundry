<section class="content">
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Layanan</h3>
    </div>
		<div class="box-body">
		
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default"><i class="fa fa-send-o">
                Add Service
             </button></i>
        
		    <br>
            <br>
			
            <table id="dataTables-example" class="table table-bordered table-striped">
			  <thead>
			    <tr>
                    <th>No</th>
                    <th>Jenis Layanan</th>
                    <th>Harga Layanan</th>
                    <th>Opsi</th>
                </tr>
			 </thead>            
					<?php                     

						require '../koneksi.php';

						$no = 1;
						
						$data = mysqli_query($koneksi,"SELECT * FROM tbl_layanan");
                        
                        while($row=mysqli_fetch_assoc($data)):
                    ?>
			<tbody>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['jenis_layanan']; ?></td>
                    <td><?= "Rp. ".number_format($row['harga_layanan']) ." ,-"; ?></td>
                    <td>
							<a href="index.php?halaman=edit_layanan&id=<?= $row['id_layanan']; ?>" class="btn btn-info"><i class="fa fa-pencil">Edit</a></i>
							<a href="index.php?halaman=delete_layanan&id=<?= $row['id_layanan']; ?>" class="btn btn-danger"><i class="fa fa-trash">Delete</a></i>
                    
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
                <h4 class="modal-title">Add New Service</h4>
              </div>
              <div class="modal-body">
                <form action="aksi_layanan.php" method="POST">
                    <div class="form-group">
                        <label for="">Jenis Layanan: </label>
                        <input type="text" class="form-control" name="jenis_layanan" placeholder="masukan jenis layanan....">
                    </div>
                    <div class="form-group">
                        <label for="">Harga Layanan: </label>
                        <input type="number" class="form-control" name="harga_layanan" placeholder="">
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