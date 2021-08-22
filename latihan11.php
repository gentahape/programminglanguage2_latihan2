<h1>Edit Matakuliah</h1>
<?php

	include 'koneksi.php';
	$db = new Database();
	$con = $db->connect();

	if (isset($_POST['proses']) AND isset($_GET['page'])) {
		$query = mysqli_query($con, "UPDATE matakuliah SET 
			kode = '".$_POST['kode']."',
			nama = '".$_POST['nama']."'
			WHERE id = '".$_GET['id']."'
		");
		if ($query) {
			header("location:index.php?page=".$_GET['page']);
		} else {
			echo $con->error;
			echo '<br> edit data gagal';
		}
		
	}

	$query = mysqli_query($con, "SELECT * FROM matakuliah WHERE id = '".$_GET['id']."'");
	while ($data = mysqli_fetch_array($query)) {

?>

<form action="index.php?page=<?= base64_decode(base64_encode($_GET['page'])) ?>&action=edit&id=<?= $_GET['id'] ?>" method="POST">
	<input type="text" name="kode" value="<?= $data['kode'] ?>" placeholder="Masukan Kode" required="">
	<input type="text" name="nama" value="<?= $data['nama'] ?>" placeholder="Masukan Nama" required="">
	<input type="submit" name="proses" value="Simpan">
	<a href="index.php?page=<?= base64_decode(base64_encode($_GET['page'])) ?>">Kembali</a>
</form>

<?php } ?>