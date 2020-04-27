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
        <h3 class="box-title">Edit Data Pewangi</h3>
    </div>
		<div class="box-body">
            <?php 
				// menangkap id yang dikirim melalui url
				$id = $_GET['id'];

				// megambil data pelanggan yang ber id di atas dari tabel pelanggan
				$data = mysqli_query($koneksi,"SELECT * FROM tbl_pewangi where id_pewangi='$id'");
				while($d=mysqli_fetch_array($data)):
			?>
    <form action="update_pewangi.php" method="POST">
                    <div class="form-group">
                        
                        <input type="hidden" name="id" value="<?= $d['id_pewangi']; ?>">

                        <label>Nama Pewangi</label>
                        <input type="text" class="form-control" name="nama_pewangi" placeholder="Masukan Nama Pewangi...." value="<?= $d['nama_pewangi']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Harga Pewangi</label>
                        <input type="number" class="form-control" name="harga_pewangi" placeholder="Masukan Jumlah Stok...." value="<?= $d['harga_pewangi']; ?>">
                    </div>
                    
                
                    <br>

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