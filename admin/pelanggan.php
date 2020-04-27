<!DOCTYPE html>
<html>
<head>
     <!-- TABLE STYLES-->
    <link href="css/dataTables.bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" />
</head>
<body>
<section class="content">
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Pelanggan</h3>
    </div>
		<div class="box-body">
		
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default"><i class="fa fa-send-o">
                Add Data Pelanggan
             </button></i>
        
		    <br>
            <br>
			
            <table id="dataTables-example" class="table table-bordered table-striped">
			  <thead>
			    <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>No. Hp</th>
                    <th>Alamat</th>
                    <th>Opsi</th>
                </tr>
			 </thead>            
					<?php                     

						require '../koneksi.php';

						$no = 1;
						
						$data = mysqli_query($koneksi,"SELECT * FROM tbl_pelanggan");
						
						while($row=mysqli_fetch_assoc($data)):
                    ?>
			<tbody>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_pelanggan']; ?></td>
                    <td><?= $row['no_telp_pelanggan']; ?></td>
                    <td><?= $row['alamat_pelanggan']; ?></td>
                    <td>
							<a href="index.php?halaman=edit_pelanggan&id=<?= $row['id_pelanggan']; ?>" class="btn btn-info"><i class="fa fa-pencil">Edit</a></i>
							<a href="index.php?halaman=delete_pelanggan&id=<?= $row['id_pelanggan']; ?>" class="btn btn-danger"><i class="fa fa-trash">Hapus</a></i>
                    
                    </td>                
                </tr>
					<?php endwhile; ?>
				</tbody>
            </table>
    </div>
</div>
</section>
<script src="js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Data Pelanggan</h4>
              </div>
              <div class="modal-body">
                <form action="aksi_pelanggan.php" method="POST">
                    <div class="form-group">
                        <label for="">Nama Pelanggan: </label>
                        <input type="text" class="form-control" name="nama_pelanggan" placeholder="masukan nama....">
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Hp: </label>
                        <input type="text" class="form-control" name="no_telp_pelanggan" placeholder="masukan no hp....">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Pelanggan: </label>
                        <input type="text" class="form-control" name="alamat_pelanggan" placeholder="masukan alamat....">
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