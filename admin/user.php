<section class="content">
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data User</h3>
    </div>
		<div class="box-body">
		
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default"><i class="fa fa-send-o">
                Add Data User
             </button></i>
        
		    <br>
            <br>
			
            <table id="dataTables-example" class="table table-bordered table-striped">
			  <thead>
			    <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Email User</th>
                    <th>Level</th>
                    <th>Opsi</th>
                </tr>
			 </thead>            
					<?php                     

						require '../koneksi.php';

						$no = 1;
						
						$data = mysqli_query($koneksi,"SELECT * FROM tbl_user");
						
						while($row=mysqli_fetch_assoc($data)):
                    ?>
			<tbody>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_user']; ?></td>
                    <td><?= $row['email_user']; ?></td>
                    <td><?= $row['level']; ?></td>
                    <td>
							<a href="index.php?halaman=edit_user&id=<?= $row['id_user']; ?>" class="btn btn-info"><i class="fa fa-pencil">Edit</a></i>
							<a href="index.php?halaman=delete_user&id=<?= $row['id_user']; ?>" class="btn btn-danger"><i class="fa fa-trash">Hapus</a></i>
                    
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
                <h4 class="modal-title">Add Data User</h4>
              </div>
              <div class="modal-body">
                <form action="aksi_user.php" method="POST">
                    <div class="form-group">
                        <label for="">Nama User: </label>
                        <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="masukan nama....">
                    </div>
                    <div class="form-group">
                        <label for="">Email User: </label>
                        <input type="text" class="form-control" name="email_user" id="email_user" placeholder="masukan email....">
                    </div>
                    <div class="form-group">
                        <label for="">Password: </label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Level: </label>
                        <input type="level" class="form-control" name="level" id="level" placeholder="">
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