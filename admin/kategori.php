<h2>Data Kategori</h2>

<p><a href="index.php?halaman=tambahkategori" class="btn btn-primary">TAMBAH DATA</a></p>

<table class="table table-bordered">
	<thead>
		<tr>
			<th><center>NO</center></th>
			<td><center>KATEGORI</center></td>
			<td><center>PILIHAN</center></td>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
	<?php $ambil = $koneksi->query("SELECT * FROM kategori"); ?>
	<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><center><?php echo $nomor; ?></center></td>
			<td><center><?php echo $pecah['nama_kategori']; ?></center></td>
			<td><center>
				<a href="index.php?halaman=ubahkategori&id=<?php echo $pecah['id_kategori']; ?>" class="btn btn-warning btn-sm">UBAH</a>
				<a href="index.php?halaman=hapuskategori&id=<?php echo $pecah['id_kategori']; ?>" class="btn btn-danger btn-sm">HAPUS</a></center>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>