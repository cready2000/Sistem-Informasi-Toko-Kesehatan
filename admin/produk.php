<h2>Data Produk</h2>

<p><a href="index.php?halaman=tambahproduk" class="btn btn-primary">TAMBAH DATA</a></p>

<table class="table table-bordered">
	<thead>
		<tr>
			<th><center>No</center></th>
			<th><center>Kategori</center></th>
			<th><center>Nama Produk</center></th>
			<th><center>Harga (Rp)</center></th>
			<th><center>Berat (Kg)</center></th>
			<th><center>Foto Produk</center></th>
			<th><center>Pilihan</center></th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><center><?php echo $nomor; ?></center></td>
			<td><center><?php echo $pecah['nama_kategori']; ?></center></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><center><?php echo $pecah['harga_produk']; ?></center></td>
			<td><center><?php echo $pecah['berat_produk']; ?></center></td>
			<td><center>
				<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100"></center>
			</td>
			<td><center>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning btn-sm">UBAH</a><p>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn btn-sm">HAPUS</a></p></center>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>