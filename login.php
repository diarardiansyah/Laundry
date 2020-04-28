<!DOCTYPE html>
<html>
<head>
	<title>Login Form Sistem Informasi Laundry</title>
    <style>
    
    .alert{
      background: #e44e4e;
      color: white;
      padding: 10px;
      text-align: center;
      border: 1px solid #b32929;
    }
    </style>
	<link rel="stylesheet" href="style.css" type="text/css">
    <link rel="icon" href="admin/assets/laundry.png">

</head>
<body>

<h2>Login Form </h2>

<?php
    
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="gagal"){
				echo "<div class='alert'>Email dan password tidak sesuai !</div>";
			}
		}

	?>
<form action="cek_login.php" method="POST">
  <div class="imgcontainer">
  <img src="laundry.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Your Email" name="email_user" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit">Login</button>
    <input type="checkbox" checked="checked"><span>Ingat Saya</span>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    

  </div>
</form>



</body>
</html>