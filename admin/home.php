<h2>Selamat Datang Administrator</h2><hr><br>

<h4>Data Administrator :</h4>

<table class="table table-bordered">
	<thead>
		<tr>
			<th><center>ID Administrator</center></th>
			<th><center>Nama Lengkap</center></th>
			<th><center>Username</center></th>
			<th><center>Password</center></th>
		</tr>
	</thead>
	<tbody>
		<?php $ambil=$koneksi->query("SELECT * FROM admin"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><center><?php echo $pecah['id_admin']; ?></center></td>
			<td><center><?php echo $pecah['nama_lengkap']; ?></center></td>
			<td><center><?php echo $pecah['username']; ?></center></td>
			<td><center><?php echo $pecah['password']; ?></center></td>
		</tr>
		<?php } ?>
	</tbody>
</table>