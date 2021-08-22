<h1>Edit Dosen</h1>
<?php

	include 'koneksi.php';
	$db = new Database();
	$con = $db->connect();

	if (isset($_POST['proses']) AND isset($_GET['page'])) {
		$query = mysqli_query($con, "UPDATE dosen SET 
			nip = '".$_POST['nip']."',
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

	$query = mysqli_query($con, "SELECT * FROM dosen WHERE id = '".$_GET['id']."'");
	while ($data = mysqli_fetch_array($query)) {

?>

<form action="index.php?page=<?= base64_decode(base64_encode($_GET['page'])) ?>&action=edit&id=<?= $_GET['id'] ?>" method="POST">
	<input type="text" name="nip" value="<?= $data['nip'] ?>" placeholder="Masukan NIP" required="">
	<input type="text" name="nama" value="<?= $data['nama'] ?>" placeholder="Masukan Nama" required="">
	<input type="submit" name="proses" value="Simpan">
	<a href="index.php?page=<?= base64_decode(base64_encode($_GET['page'])) ?>">Kembali</a>
</form>

<?php } ?>