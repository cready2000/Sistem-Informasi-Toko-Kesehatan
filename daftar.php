<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>DAFTAR</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php'; ?>

<br><br>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading"> 
					<center><h3 class="panel-title"> DAFTAR PELANGGAN </h3></center>
				</div><br>
				<div class="panel-body">
					<form method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-md-2"> NAMA </label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="nama" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2"> EMAIL </label>
							<div class="col-md-9">
								<input type="email" class="form-control" name="email" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2"> ALAMAT </label>
							<div class="col-md-9">
								<textarea class="form-control" name="alamat" required=""></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2"> TELP/HP </label>
							<div class="col-md-9">
								<input type="number" class="form-control" name="telepon" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2"> PASSWORD </label>
							<div class="col-md-9">
								<input type="password" class="form-control" name="password" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2"> ULANGI PASSWORD </label>
							<div class="col-md-9">
								<input type="password" class="form-control" name="password" required="">
							</div>
						</div>
						</div>
						<div class="form-group">
								<center><button class="btn btn-primary" name="daftar">DAFTAR</button></center>
						</div>
					</form>
					<?php 
					// jika tombol daftar di tekan 
					if (isset($_POST["daftar"])) 
					{
						$nama = $_POST["nama"];
						$email = $_POST["email"];
						$password = $_POST["password"];
						$alamat = $_POST["alamat"];
						$telepon = $_POST["telepon"];
					
						// cek apakah email sudah digunakan 

						$ambil = $koneksi->query("SELECT* FROM pelanggan WHERE email_pelanggan='$email'");
						$yangcocok = $ambil->num_rows;
						if ($yangcocok==1) 
						{
							echo "<script>alert('Pendaftaran Gagal, Email Sudah Digunakan');</script>";
							echo "<script>location='daftar.php';</script>";
						}
						else
						{
							//querry insert ke tabel pelanggan	
							$koneksi->query("INSERT INTO pelanggan(email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan) VALUES('$email','$password','$nama','$telepon','$alamat')");

							echo "<script>alert('Pendaftaran Sukses, Silahkan Login');</script>";
							echo "<script>location='login.php';</script>";

						}

					}



					 ?>

				</div>
			</div>
		</div>
	</div>
</div>


</body>
</html>