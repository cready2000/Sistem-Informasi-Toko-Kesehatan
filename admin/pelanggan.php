<h2>Data Pelanggan</h2><hr>

<table class="table table-bordered">
	<thead>
		<tr>
			<th><center>No</center></th>
			<th><center>Nama Pelanggan</center></th>
			<th><center>Email</center></th>
			<th><center>Telepon</center></th>
			<th><center>Pilihan</center></th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pelanggan"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><center><?php echo $nomor; ?></center></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><center><?php echo $pecah['email_pelanggan']; ?></center></td>
			<td><center><?php echo $pecah['telepon_pelanggan']; ?></center></td>
			<td><center>
				<a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn btn-danger btn-sm">HAPUS</a></center>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>