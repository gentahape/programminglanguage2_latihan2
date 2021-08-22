<table width="100%" height="100%" border="1">
	<tr height="5%">
		<td align="center">
			<a href="index.php?page=<?= base64_encode(1) ?>">Mahasiswa</a>
			<a href="index.php?page=<?= base64_encode(2) ?>">Dosen</a>
			<a href="index.php?page=<?= base64_encode(3) ?>">Matakuliah</a>
			<a href="index.php?page=<?= base64_encode(4) ?>">Nilai</a>
		</td>
	</tr>
	<tr height="95%">
		<td valign="top" align="center">
			<?php
				if (isset($_GET['page'])) {
					$page = base64_decode($_GET['page']);
					if ($page == 1) {
						
						if (isset($_GET['action'])) {
							if ($_GET['action'] == 'add') {
								include('latihan2.php');
							} else if ($_GET['action'] == 'edit') {
								include('latihan3.php');
							} else if ($_GET['action'] == 'hapus') {
								include('latihan4.php');
							} else {
								include('latihan1.php');
							}
						}else{
							include('latihan1.php');
						}
						

					}else if ($page == 2) {

						if (isset($_GET['action'])) {
							if ($_GET['action'] == 'add') {
								include('latihan6.php');
							} else if ($_GET['action'] == 'edit') {
								include('latihan7.php');
							} else if ($_GET['action'] == 'hapus') {
								include('latihan8.php');
							} else {
								include('latihan5.php');
							}
						}else{
							include('latihan5.php');
						}

					}else if ($page == 3) {

						if (isset($_GET['action'])) {
							if ($_GET['action'] == 'add') {
								include('latihan10.php');
							} else if ($_GET['action'] == 'edit') {
								include('latihan11.php');
							} else if ($_GET['action'] == 'hapus') {
								include('latihan12.php');
							} else {
								include('latihan9.php');
							}
						}else{
							include('latihan9.php');
						}

					}else if ($page == 4) {

						if (isset($_GET['action'])) {
							if ($_GET['action'] == 'add') {
								include('latihan14.php');
							} else if ($_GET['action'] == 'edit') {
								include('latihan15.php');
							} else if ($_GET['action'] == 'hapus') {
								include('latihan16.php');
							} else {
								include('latihan13.php');
							}
						}else{
							include('latihan13.php');
						}

					}else{
						include('latihan1.php');
					}
				}
			?>
		</td>
	</tr>
</table>