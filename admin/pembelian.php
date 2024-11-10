<h2>Data Pembelian</h2><hr>

<table class="table table-bordered">
	<thead>
		<tr>
			<th><center>No</center></th>
			<th><center>Nama Pelanggan</center></th>
			<th><center>Tanggal Pembelian</center></th>
			<th><center>Status Pembelian</center></th>
			<th><center>Total (Rp)</center></th>
			<th><center>Pilihan</center></th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><center><?php echo $nomor; ?></center></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td></td>
			<td><center><?php echo $pecah['tanggal_pembelian']; ?></center></td>
			<td><center><?php echo $pecah['status_pembelian']; ?></center></td>
			<td><center><?php echo $pecah['total_pembelian']; ?></center></td>
			<td><center>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info btn-sm">DETAIL</a></center><br>

				<?php if ($pecah['status_pembelian']!=="pending"): ?>
				<center><a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-success btn-sm">PEMBAYARAN</a></center>
				<?php endif ?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>