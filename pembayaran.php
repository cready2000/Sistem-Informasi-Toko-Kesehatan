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

//mendapatkan id_pembelian dari url
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

// mendapatkan id_pelanggan yang beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
// mendapatkan id_pelanggan yang login 
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_login !==$id_pelanggan_beli) 
{
	echo "<script>alert('DILARANG!!!!');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>pembayaran</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>
<?php include 'menu.php';?>

<div class="container">
	<h2>KONFIRMASI PEMBAYARAN</h2>
	<p>KIRIM BUKTI PEMBAYARAN ANDA DISINI</p>
	<div class="alert alert-info">TOTAL TAGIHAN ANDA <strong>Rp. <?php echo number_format($detpem["total_pembelian"]); ?></strong></div>


	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>NAMA PENYETOR</label>
		<input type="text" class="form-control" name="nama" required>
	</div>
	<div class="form-group">
		<label>BANK</label>
		<input type="text" class="form-control" name="bank" required>
	</div>
	<div class="form-group">
		<label>JUMLAH</label>
		<input type="text" class="form-control" name="jumlah" required>
	</div>
	<div class="form-group">
		<label>FOTO BUKTI</label>
		<input type="file" class="form-control" name="bukti" required>
		<p class="text-danger">FOTO BUKTI HARUS JPEG MAKSIMAL 2MB</p>
	</div>
	<button class="btn btn-primary" name="kirim">KIRIM</button>
	</form>	
</div>
<?php 
// jika tombol kirim di tekan

if (isset($_POST["kirim"])) 
{
	// upload foto bukti
	$namabukti = $_FILES["bukti"]["name"];
	$lokasibukti = $_FILES["bukti"]["tmp_name"];
	$namafiks = date("YmdHis").$namabukti;
	move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

	$nama = $_POST["nama"];
	$bank = $_POST["bank"];
	$jumlah = $_POST["jumlah"];
	$tanggal = date("Y-m-d");

	$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks') "); 

	// update pembelian dari pending menjadi sudah kirim pembayaran
	$koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian='$idpem'");

	echo "<script>alert('TERIMA KASIH SUDAH MENGIRIM BUKTI PEMBAYARAN');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();



}



 ?>


</body>

</html>