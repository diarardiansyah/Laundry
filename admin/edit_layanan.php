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
        <h3 class="box-title">Edit Layanan</h3>
    </div>
		<div class="box-body">
            <?php 
				// menangkap id yang dikirim melalui url
				$id = $_GET['id'];

				// megambil data pelanggan yang ber id di atas dari tabel pelanggan
				$user = mysqli_query($koneksi,"SELECT * FROM tbl_layanan where id_layanan='$id'");
				while($u=mysqli_fetch_array($user)):
			?>
             <form action="update_layanan.php" method="POST">
                            <div class="form-group">
                                <label>Jenis Layanan </label>

                                <input type="hidden" name="id" value="<?= $u['id']; ?>">

                                <input type="text" class="form-control" name="jenis_layanan"  placeholder="masukan jenis layanan........" value="<?= $u['jenis_layanan']; ?>">        
                            </div>
                            <div class="form-group">
                                <label>Harga Layanan </label>
                                <input type="text" class="form-control" name="jenis_layanan"  placeholder="masukan harga layanan........" value="<?= $u['harga_layanan']; ?>">        
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