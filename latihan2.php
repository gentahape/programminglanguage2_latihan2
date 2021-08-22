<h1>Input Mahasiswa</h1>
<?php

	include 'koneksi.php';
	$db = new Database();
	$con = $db->connect();

	if (isset($_POST['proses']) AND isset($_GET['page'])) {
		$query = mysqli_query($con, "INSERT INTO mahasiswa (npm,nama) VALUES(
			'".$_POST['npm']."',
			'".$_POST['nama']."'
		)");
		if ($query) {
			header("location:index.php?page=".$_GET['page']);
		} else {
			echo $con->error;
			echo '<br> input data gagal';
		}
		
	}

?>

<form action="index.php?page=<?= base64_decode(base64_encode($_GET['page'])) ?>&action=add" method="POST">
	<input type="text" name="npm" placeholder="Masukan NPM" required="">
	<input type="text" name="nama" placeholder="Masukan Nama" required="">
	<input type="submit" name="proses" value="Simpan">
	<a href="index.php?page=<?= base64_decode(base64_encode($_GET['page'])) ?>">Kembali</a>
</form>