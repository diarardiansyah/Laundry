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
        <h3 class="box-title">Edit User</h3>
    </div>
		<div class="box-body">
            <?php 
				// menangkap id yang dikirim melalui url
				$id = $_GET['id'];

				// megambil data pelanggan yang ber id di atas dari tabel pelanggan
				$user = mysqli_query($koneksi,"SELECT * FROM tbl_pelanggan where id_pelanggan='$id'");
				while($u=mysqli_fetch_array($user)):
			?>
             <form action="update_pelanggan.php" method="POST">
                            <div class="form-group">
                                <label>Nama Pelanggan </label>

                                <input type="hidden" name="id" value="<?= $u['id']; ?>">

                                <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="masukan nama........" value="<?= $u['nama_pelanggan']; ?>">        
                            </div>
                            <div class="form-group">
                                <label>No Hp </label>
                                <input type="text" class="form-control" name="no_telp_pelanggan" id="no_telp_pelanggan" placeholder="masukan email........" value="<?= $u['no_telp_pelanggan']; ?>">        
                            </div>
                            <div class="form-group">
                                <label>Alamat </label>
                                <input type="text" class="form-control" name="alamat_pelanggan" id="alamat_pelanggan" placeholder="masukan password........" value="<?= $u['alamat_pelanggan']; ?>">        
                            </div>
                           
                            <br/>

                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i>Save
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                                
                        </form>
                        <?php endwhile; ?>
                  
                </div>
            
            </div>
        
        
        </div>
        </section>