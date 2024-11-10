<?php 
session_start();
include 'koneksi.php';

$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran
		LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian  
		WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();


// jika belum ada data pembayaran 
if (empty($detbay)) 
{
	echo "<script>alert('belum ada data pembayaran');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}


// jika data pelanggan yang bayar tidak sesuai dengan login
//
if ($_SESSION["pelanggan"]["id_pelanggan"]!==$detbay["id_pelanggan"]) 
{
	echo "<script>alert('DILARANG!!!!!!!');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>LIHAT PEMBAYARAN</title>
	<link rel="stylesheet"  href="admin/assets/css/bootstrap.css">
</head>
<body>

	<?php include'menu.php';?>


	<div class="container">
		<h3>LIHAT PEMBAYARAN</h3>
		<div class="row">
			<div class="col-md-6">
				<table class="table">
					<tr>
						<th>NAMA</th>
						<td><?php echo $detbay["nama"] ?></td>
					</tr>
					<tr>
						<th>BANK</th>
						<td><?php echo $detbay["bank"] ?></td>
					</tr>
					<tr>
						<th>TANGGAL</th>
						<td><?php echo $detbay["tanggal"] ?></td>
					</tr>
					<tr>
						<th>JUMLAH</th>
						<td>Rp. <?php echo number_format($detbay["jumlah"]) ?></td>
					</tr>
				</table>
			</div>
			<div class="col-md-6">
				<img src="bukti_pembayaran/<?php echo $detbay["bukti"] ?>" alt="" class="img-responsive">
			</div>
		</div>
	</div>

</body>
</html>