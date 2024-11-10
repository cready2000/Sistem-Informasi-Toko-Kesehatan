<?php
session_start();
include 'koneksi.php'; 

// jika belum login
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
{
	echo "<script>alert('silahkan login terlebih dahulu');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>RIWAYAT</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>
<?php include 'menu.php' ?>

<section class="riwayat">
	<div class="container">
		<h3> Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th><center>NO</center></th>
					<th><center>TANGGAL</center></th>
					<th><center>STATUS</center></th>
					<th><center>TOTAL</center></th>
					<th><center>OPSI</center></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$nomor=1;
				// mendapatkan id pelanggan yang login dari session
				$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];

				$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
				while ($pecah = $ambil->fetch_assoc()) {
				 ?>
				<tr>
					<td><center><?php echo $nomor; ?></center></td>
					<td><center><?php echo $pecah["tanggal_pembelian"] ?></center></td>
					<td><center>
					<?php echo $pecah["status_pembelian"] ?></center>
					<br>
					<?php if (!empty($pecah['resi_pengiriman'])): ?>
					Resi : <?php echo $pecah['resi_pengiriman'];  ?>
					<?php endif ?>
					</td>   
					<td><center><?php echo number_format($pecah["total_pembelian"]) ?></center></td>
					<td><center>
						<a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info">NOTA</a>

						<?php if ($pecah['status_pembelian']=="pending"): ?>
						<a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-success">
							INPUT PEMBAYARAN
						</a> 	
						<?php else:  ?>
						<a href= "lihat_pembayaran.php?id=<?php  echo $pecah["id_pembelian"]; ?>" class= "btn btn-warning">
							LIHAT PEMBAYARAN
						</a></center>
						<?php endif ?>

					</td>
				</tr>
				<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</section>

</body>

</html>