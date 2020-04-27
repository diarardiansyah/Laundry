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
				$user = mysqli_query($koneksi,"SELECT * FROM tbl_user where id_user='$id'");
				while($u=mysqli_fetch_array($user)):
			?>
             <form action="update_user.php" method="POST">
                            <div class="form-group">
                                <label>Name </label>

                                <input type="hidden" name="id" value="<?= $u['id']; ?>">

                                <input type="text" class="form-control" name="nama" id="nama" placeholder="masukan nama........" value="<?= $u['nama_user']; ?>">        
                            </div>
                            <div class="form-group">
                                <label>Email </label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="masukan email........" value="<?= $u['email_user']; ?>">        
                            </div>
                            <div class="form-group">
                                <label>Password </label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="masukan password........" value="<?= $u['password']; ?>">        
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