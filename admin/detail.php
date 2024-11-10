<h2>Detail Pembelian</h2><hr>
<?php
$ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail=$ambil->fetch_assoc();
?>
<!--!<pre><?php //print_r($detail); ?></pre>-->

<div class="row">
	<div class="col-md-4">
		<h3> PEMBELIAN </h3>
		<p>
		Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
		Total : Rp <?php echo number_format($detail['total_pembelian']); ?><br>
		Status : <?php echo $detail['status_pembelian']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3> PELANGGAN </h3>
		<strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
		<p>
		Telepon : <?php echo $detail['telepon_pelanggan']; ?> <br>
		Email : <?php echo $detail['email_pelanggan']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3> PENGIRIMAN </h3>
		<strong><?php echo $detail["nama_kota"]; ?></strong><br>
		<p>
		Tarif : Rp <?php echo number_format($detail["tarif"]); ?><br>
		Alamat : <?php echo $detail["alamat_pengiriman"]; ?>
		</p>
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
			<td><center> Rp <?php echo number_format($pecah['harga_produk']); ?></center></td>
			<td><center><?php echo $pecah['jumlah']; ?></center></td>
			<td><center>
				Rp <?php echo number_format($pecah['harga_produk']*$pecah['jumlah']); ?><center>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>