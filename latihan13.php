<h1>Daftar Nilai</h1>

<?php

	include 'koneksi.php';
	$db = new Database();
	$con = $db->connect();

?>

	<a href="index.php?page=<?= $_GET['page'] ?>&action=add">Tambah</a>
	<table border="1">
		<tr>
			<th>NO</td>
			<th>MAHASISWA</td>
			<th>DOSEN</td>
			<th>MATAKULIAH</td>
			<th>NILAI</td>
			<th>AKSI</td>
		</tr>

		<?php 
			$query = mysqli_query($con, "
				SELECT nilai.id,mahasiswa.nama AS nama_mahasiswa,dosen.nama AS nama_dosen,matakuliah.nama AS nama_matakuliah,nilai.nilai
				FROM nilai
				LEFT JOIN mahasiswa ON nilai.id_mahasiswa = mahasiswa.id
				LEFT JOIN dosen ON nilai.id_dosen = dosen.id
				LEFT JOIN matakuliah ON nilai.id_matakuliah = matakuliah.id
			");
			$no = 1;
			while ($data = mysqli_fetch_array($query)) {
		?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $data['nama_mahasiswa'] ?></td>
			<td><?= $data['nama_dosen'] ?></td>
			<td><?= $data['nama_matakuliah'] ?></td>
			<td><?= $data['nilai'] ?></td>
			<td><a href="index.php?page=<?= $_GET['page'] ?>&action=edit&id=<?= $data['id'] ?>">Edit</a> | <a href="index.php?page=<?= $_GET['page'] ?>&action=hapus&id=<?= $data['id'] ?>">Hapus</a></td>
		</tr>
		<?php $no++; } ?>

	</table>	

