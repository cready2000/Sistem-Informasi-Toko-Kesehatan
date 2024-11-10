<!-- navbar -->
<nav class="navbar navbar-yellow" style="background-color: #98FB98;">
	<div class="container" >

	<ul class="nav navbar-nav navbar-right" >
	    
		<li><a href="keranjang.php"><h4>KERANJANG</h4></a></li>
		
		
		<?php if (isset($_SESSION["pelanggan"])): ?>
		<li><a href="riwayat.php"><h4>RIWAYAT BELANJA</h4></a></li>	
		<li><a href="logout.php"><h4>LOGOUT</h4></a></li>

		<?php else: ?>	
		<li><a href="login.php"><h4>LOGIN</h4></a></li>
		<li><a href="daftar.php"><h4>DAFTAR</h4></a></li> 
		<?php endif ?>
	</ul>
	<form action="pencarian.php" class="navbar-form navbar-left"  >
	    <a href="index.php"><img src="first-aid-kit.png" height="50">  </a>
		<input type="text" class="form-control" name="keyword" size="50" margin-left="70" placeholder="cari produk atau kategori">
		<button class="btn btn-primary">CARI</button>
	</form>
	</div>
</nav>