<?php 
session_start();
include 'koneksi.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Toko Kesehatan</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
    
</head>
<body>	

<?php include 'menu.php'; ?>

 <div class="container">		
	<br>

	<div class="col-md-20 col-md-offset-0">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>		
			</ol>
 
			<!-- deklarasi carousel -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="01.jpg" alt="sitomel.000webhostapp.com">
					<div class="carousel-caption">
						<h3>TOKOKESEHATANSBY.000WEBHOSTAPP.COM</h3>
						<p>SISTEM INFORMASI TOKO KESEHATAN</p>
					</div>
				</div>
				<div class="item">
					<img src="02.jpg" alt="sitomel.000webhostapp.com">
					<div class="carousel-caption">
						<h3>TOKOKESEHATANSBY.000WEBHOSTAPP.COM</h3>
						<p>SISTEM INFORMASI TOKO KESEHATAN</p>
					</div>
				</div>
				<div class="item">
					<img src="03.jpg" alt="sitomel.000webhostapp.com">
					<div class="carousel-caption">
						<h3>TOKOKESEHATANSBY.000WEBHOSTAPP.COM</h3>
						<p>SISTEM INFORMASI TOKO KESEHATAN</p>
					</div>
				</div>				
			</div>
 
			<!-- membuat panah next dan previous -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
   </div>

<br><br>

<!-- konten -->
    <div class="container">
	<h1></h1>
		
		<div class="row">
			<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
			<?php while ($perproduk = $ambil-> fetch_assoc()) {?>
	
			<div class="col-md-3">
				<div class="thumbnail">
					<img class="img-responsive" width="300" src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="">
					<div class="caption">	
						<h3><?php echo $perproduk['nama_produk']; ?></h3>
						<h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
						<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">BELI</a>
						<a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default">DETAIL</a>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
             
    </section>
    <!-- Hero Section End -->


<!-- Js Plugins -->
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</body><br><br><br>
<?php include 'footer.php' ?>
</html>