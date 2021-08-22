<h1>Edit Nilai</h1>
<?php

	include 'koneksi.php';
	$db = new Database();
	$con = $db->connect();

	if (isset($_POST['proses']) AND isset($_GET['page'])) {
		$query = mysqli_query($con, "UPDATE nilai SET 
			id_mahasiswa = '".$_POST['id_mahasiswa']."',
			id_dosen = '".$_POST['id_dosen']."',
			id_matakuliah = '".$_POST['id_matakuliah']."',
			nilai = '".$_POST['nilai']."'
			WHERE id = '".$_GET['id']."'
		");
		if ($query) {
			header("location:index.php?page=".$_GET['page']);
		} else {
			echo $con->error;
			echo '<br> edit data gagal';
		}
		
	}

	$query = mysqli_query($con, "SELECT * FROM nilai WHERE id = '".$_GET['id']."'");
	while ($data = mysqli_fetch_array($query)) {

?>

<form action="index.php?page=<?= base64_decode(base64_encode($_GET['page'])) ?>&action=edit&id=<?= $_GET['id'] ?>" method="POST">

	<select name="id_mahasiswa" required="">
	<?php
		$mahasiswa = mysqli_query($con, "SELECT * FROM mahasiswa");
		while ($mhs = mysqli_fetch_array($mahasiswa)) {
	?>
		<option value="<?= $mhs['id'] ?>" <?= ($data['id_mahasiswa'] == $mhs['id'] ? 'selected' : '') ?>><?= $mhs['nama'] ?></option>
	<?php } ?>
	</select>

	<select name="id_dosen" required="">
	<?php
		$dosen = mysqli_query($con, "SELECT * FROM dosen");
		while ($ds = mysqli_fetch_array($dosen)) {
	?>
		<option value="<?= $ds['id'] ?>" <?= ($data['id_dosen'] == $ds['id'] ? 'selected' : '') ?>><?= $ds['nama'] ?></option>
	<?php } ?>
	</select>

	<select name="id_matakuliah" required="">
	<?php
		$matakuliah = mysqli_query($con, "SELECT * FROM matakuliah");
		while ($mk = mysqli_fetch_array($matakuliah)) {
	?>
		<option value="<?= $mk['id'] ?>" <?= ($data['id_matakuliah'] == $mk['id'] ? 'selected' : '') ?>><?= $mk['nama'] ?></option>
	<?php } ?>
	</select>

	<input type="number" name="nilai" value="<?= $data['nilai'] ?>" placeholder="Masukan Nilai" required="">
	<input type="submit" name="proses" value="Simpan">
	<a href="index.php?page=<?= base64_decode(base64_encode($_GET['page'])) ?>">Kembali</a>
</form>

<?php } ?>