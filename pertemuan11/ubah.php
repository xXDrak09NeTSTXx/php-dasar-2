<?php
	// memanggil file functions.php
	require 'functions.php';

	// ambil data di URL yang berada di file index
	$id = $_GET["id"];

	// query data mahasiswa berdasarkan ID dari $_GET[];
	// [0] adalah array utama
	$mhs = query( "SELECT * FROM mahasiswa WHERE id = $id" ) [0];

	// tombol submit ditekan atau belum
	if ( isset($_POST["submit"]) ) 
	{
		
		// cek apakah data berhasil atau tidak di tambah atau tidak
		// tambah($_POST) dapat dari function yang berada dari file functions.php 
		// document.location.href = 'index.php'; link versi javascript
		if ( ubah($_POST) > 0)
		{
			echo "
			<script>
				alert('data berhasil diubah');
				document.location.href = 'index.php';
			</script>"
			;	
		}
		else
		{
			echo "
			<script>
				alert('data tidak berhasil diubah');
				document.location.href = 'tambah.php';
			</script>"
			;
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah data Mahasiswa</title>
</head>
<body>
	<h1>Ubah data Mahasiswa</h1>

	<form action="" method="post">
		<ul>
			<input type="hidden" name="id" value="<?= $mhs["id"];  ?>">
			<li>
				<!-- required berfungsi untuk melarang input kosong -->
				<label for="nim">NIM :</label>
				<input type="text" name="nim" id="nim" required 
				value="<?= $mhs["nim"]; ?>">
			</li>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama"required
				value="<?= $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="email" name="email" id="email"required
				value="<?= $mhs["email"]; ?>">
			</li>
			<li>
				<label for="jurusan">Jurusan :</label>
				<input type="text" name="jurusan" id="jurusan"required
				value="<?= $mhs["jurusan"]; ?>">
			</li>
			<li>
				<label for="gambar">Gambar :</label>
				<input type="text" name="gambar" id="gambar"required
				value="<?= $mhs["gambar"]; ?>">
			</li>
			<button type="submit" name="submit">Ubah data !</button>
			<a href="index.php">Kembali</a>
		</ul>
	</form>
	
</body>
</html>