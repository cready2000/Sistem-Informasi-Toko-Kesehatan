<?php 
session_start();


include 'koneksi.php';
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script>alert('Keranjang kosong, silahkan belanja dulu');</script>";
	echo "<script>location='index.php';</script>";
}
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>keranjang belanja</title>
 	<link rel="stylesheet"  href="admin/assets/css/bootstrap.css">
 </head>
 <body>

<?php include 'menu.php' ?>

<!-- konten -->
 
<section class="konten">
	<div class="container">
		<h1>KERANJANG BELANJA </h1>
		<hr>
		<table class="table table-bordered">
		<thead>
			<tr>
				<th>NO</th>
				<th>PRODUK</th>
				<th>HARGA</th>
				<th>JUMLAH</th>
				<th>SUBHARGA</th>
				<th>AKSI</th>	
			</tr>
		</thead>
		<tbody>
			<?php $nomor=1; ?>
			<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
			<!-- MENAMPILKAN PRODUK-->
			<?php 
			$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk= '$id_produk'");
			$pecah = $ambil->fetch_assoc();
			$subharga = $pecah["harga_produk"]*$jumlah;
			 ?>

			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah["nama_produk"]; ?></td>
				<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
				<td><?php echo $jumlah; ?></td>
				<td>Rp. <?php echo number_format($subharga); ?></td>
				<td>
					<a href="hapuskeranjang.php?id=<?php echo $id_produk; ?>" class="btn btn-danger btn-xs">HAPUS</a>
				</td>
			</tr>
			<?php $nomor++; ?>
			<?php endforeach ?>	
		</tbody>	
		</table>

		<a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
		<a href="checkout.php" class="btn btn-primary">Checkout</a>
	</div>
</section>


 </body>

 </html>