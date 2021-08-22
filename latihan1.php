<h1>Daftar Mahasiswa</h1>

<?php

	include 'koneksi.php';
	$db = new Database();
	$con = $db->connect();

?>

	<a href="index.php?page=<?= $_GET['page'] ?>&action=add">Tambah</a>
	<table border="1">
		<tr>
			<th>NO</td>
			<th>NPM</td>
			<th>NAMA</td>
			<th>AKSI</td>
		</tr>

		<?php 
			$query = mysqli_query($con, "SELECT * FROM mahasiswa");
			$no = 1;
			while ($data = mysqli_fetch_array($query)) {
		?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $data['npm'] ?></td>
			<td><?= $data['nama'] ?></td>
			<td><a href="index.php?page=<?= $_GET['page'] ?>&action=edit&id=<?= $data['id'] ?>">Edit</a> | <a href="index.php?page=<?= $_GET['page'] ?>&action=hapus&id=<?= $data['id'] ?>">Hapus</a></td>
		</tr>
		<?php $no++; } ?>

	</table>	

