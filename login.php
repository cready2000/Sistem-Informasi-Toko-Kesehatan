<?php 
session_start();
include 'koneksi.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>login pelanggan</title>
	<link rel="stylesheet"  href="admin/assets/css/bootstrap.css">
</head>
<body>


<?php include 'menu.php' ?>

<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<center><h3 class="panel-title">LOGIN PELANGGAN</h3></center>
				</div><br>
				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>EMAIL</label>
							<input type="email" class="form-control" name="email">
						</div>
						<div class="form-group">
							<label>PASSWORD</label>
							<input type="password" class="form-control" name="password">
						</div><br>
						<center><button class="btn btn-primary" name="login">LOGIN</button></center>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>



<?php 
if (isset($_POST['login'])) 
{
	$email = $_POST["email"];
	$password = $_POST["password"];

	$ambil = $koneksi-> query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
	$akunyangcocok = $ambil->num_rows;

	if ($akunyangcocok==1) 
	{
		$akun = $ambil->fetch_assoc();
		$_SESSION["pelanggan"] = $akun;
		echo "<script>alert('Anda Sukses Login');</script>";

		//jika sudah belanja
		if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) 
		{
			echo "<script>location='checkout.php';</script>";	
		}
		else 
		{
			echo "<script>location='riwayat.php';</script>";
		}


	}
	else 
	{
		echo "<script>alert('Anda Gagal Login, Periksa Akun Anda');</script>";
		echo "<script>location='login.php';</script>";
	}
}

 ?>
</body>

</html>