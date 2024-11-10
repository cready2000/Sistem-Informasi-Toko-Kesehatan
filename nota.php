<?php 
session_start();
include('koneksi.php');
require_once("dompdf_0-8-3/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"SELECT tanggal_pembelian, total_pembelian, nama_kota, tarif, alamat_pengiriman FROM pembelian WHERE id_pelanggan= '$id_pelanggan'");
$html = '<center><h3>Pembelian Alat Kesehatan</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>No</th>
 <th>Tanggal Pembelian</th>
 <th>Total Pembelian</th>
 <th>Nama Kota</th>
 <th>Tarif</th>
 <th>Alamat Pengiriman</th>
 </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$no."</td>
 <td>".$row['tanggal_pembelian']."</td>
 <td>".$row['total_pembelian']."</td>
 <td>".$row['nama_kota']."</td>
 <td>".$row['tarif']."</td>
 <td>".$row['alamat_pengiriman']."</td>
 </tr>";
 $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_pembelian.pdf');
?>

<!DOCTYPE html>
<html>
<head>
	<title>nota pembelian</title>
	<link rel="stylesheet"  href="admin/assets/css/bootstrap.css">
</head>
<body>


<?php include 'menu.php' ?>


<section class="konten">
	<div  class="container">
		<h2>Detail Pembelian</h2>
<?php
$ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail=$ambil->fetch_assoc();
?>

<?php 
	$id_pelangganyangbeli = $detail["id_pelanggan"];
	$id_pelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

	if ($id_pelangganyangbeli!==$id_pelangganyanglogin) 
	{
		echo "<script>alert('DILARANG'); </script>";
		echo "<script>location='riwayat.php'; </script>";
		exit();
	}
	
 ?>

<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<strong>No. Pembelian <?php echo $detail['id_pembelian'] ?></strong><br>
		Tanggal: <?php echo $detail['tanggal_pembelian']; ?> <br>
		Total : <?php echo number_format($detail['total_pembelian']) ?>
	</div>
	<div class="col-md-4">
		<h3> Pelanggan </h3>
		<strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
		<p>
			Telepon : <?php echo $detail['telepon_pelanggan']; ?> <br>
			Email : <?php echo $detail['email_pelanggan']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong><?php echo $detail['nama_kota'] ?></strong><br>
		Ongkos kirim: Rp. <?php echo number_format($detail['tarif']); ?><br>
		Alamat: <?php echo $detail['alamat_pengiriman'] ?>
	</div>
</div>

<p>Detail Pembelian :</p>
<table class="table table-bordered">
	<thead>
		<tr>
			<th><center>ID Produk</center></th>
			<th><center>Nama Produk</center></th>
			<th><center>Harga</center></th>
			<th><center>Jumlah</center></th>
			<th><center>Subtotal</center></th>
		</tr>
	</thead>
	<tbody>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><center><?php echo $pecah['id_produk']; ?></center></td>
			<td><center><?php echo $pecah['nama_produk']; ?></center></td>
			<td><center><?php echo $pecah['harga_produk']; ?></center></td>
			<td><center><?php echo $pecah['jumlah']; ?></center></td>
			<td><center>
				<?php echo $pecah['harga_produk']*$pecah['jumlah']; ?><center>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				SILAHKAN MELAKUKAN PEMBAYARAN Rp <?php echo number_format($detail['total_pembelian']); ?> ke <br>
				<strong> BANK BNI  0383741099 AN. CREADY CELGIE GILDBRANDSEN</strong>
			</p>
		</div>
	</div>
</div>

	</div>
</section>

</body>

</html>