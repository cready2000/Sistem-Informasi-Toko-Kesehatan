<?php
$ambil = $koneksi->query("SELECT * FROM kategori");
?>

<h2>Tambah Kategori</h2><hr>

<form method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label>Kategori</label>
		<input type="text" class="form-control" name="kategori" required />
	</div>
	<button class="btn btn-primary" name="save">SIMPAN</button>
</form>

<?php
if (isset($_POST['save']))
{
$koneksi->query("INSERT INTO kategori (nama_kategori) VALUES ('$_POST[kategori]')");

echo "<div class='alert alert-info'>Data Tersimpan</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategori'>";
}
?>
