<h1>Input Dosen</h1>
<?php

	include 'koneksi.php';
	$db = new Database();
	$con = $db->connect();

	if (isset($_POST['proses']) AND isset($_GET['page'])) {
		$query = mysqli_query($con, "INSERT INTO dosen (nip,nama) VALUES(
			'".$_POST['nip']."',
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
	<input type="text" name="nip" placeholder="Masukan NIP" required="">
	<input type="text" name="nama" placeholder="Masukan Nama" required="">
	<input type="submit" name="proses" value="Simpan">
	<a href="index.php?page=<?= base64_decode(base64_encode($_GET['page'])) ?>">Kembali</a>
</form>