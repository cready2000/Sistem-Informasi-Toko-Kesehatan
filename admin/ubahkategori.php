<h2>Ubah Kategori</h2><hr>
<?php
$ambil=$koneksi->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kategori</label>
		<input type="text" name="kategori" class="form-control" value="" required />
	</div>
	
	<button class="btn btn-primary" name="ubah">UBAH</button>
</form>

<?php
if (isset($_POST['ubah']))
{
$koneksi->query("UPDATE kategori set nama_kategori='$_POST[kategori]'
			WHERE id_kategori='$_GET[id]'");

echo "<script>alert('Data Kategori Telah Diubah');</script>";
echo "<script>location='index.php?halaman=kategori';</script>";
}
?>