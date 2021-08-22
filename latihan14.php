<h1>Input Nilai</h1>
<?php

	include 'koneksi.php';
	$db = new Database();
	$con = $db->connect();

	if (isset($_POST['proses']) AND isset($_GET['page'])) {
		$query = mysqli_query($con, "INSERT INTO nilai (id_mahasiswa,id_dosen,id_matakuliah,nilai) VALUES(
			'".$_POST['id_mahasiswa']."',
			'".$_POST['id_dosen']."',
			'".$_POST['id_matakuliah']."',
			'".$_POST['nilai']."'
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
	
	<select name="id_mahasiswa" required="">
	<?php
		$mahasiswa = mysqli_query($con, "SELECT * FROM mahasiswa");
		while ($mhs = mysqli_fetch_array($mahasiswa)) {
	?>
		<option value="<?= $mhs['id'] ?>"><?= $mhs['nama'] ?></option>
	<?php } ?>
	</select>

	<select name="id_dosen" required="">
	<?php
		$dosen = mysqli_query($con, "SELECT * FROM dosen");
		while ($ds = mysqli_fetch_array($dosen)) {
	?>
		<option value="<?= $ds['id'] ?>"><?= $ds['nama'] ?></option>
	<?php } ?>
	</select>

	<select name="id_matakuliah" required="">
	<?php
		$matakuliah = mysqli_query($con, "SELECT * FROM matakuliah");
		while ($mk = mysqli_fetch_array($matakuliah)) {
	?>
		<option value="<?= $mk['id'] ?>"><?= $mk['nama'] ?></option>
	<?php } ?>
	</select>

	<input type="number" name="nilai" placeholder="Masukan Nilai" required="">
	<input type="submit" name="proses" value="Simpan">
	<a href="index.php?page=<?= base64_decode(base64_encode($_GET['page'])) ?>">Kembali</a>
</form>