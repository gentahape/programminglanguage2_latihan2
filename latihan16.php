<?php

	include 'koneksi.php';
	$db = new Database();
	$con = $db->connect();

	$query = mysqli_query($con, "DELETE FROM nilai WHERE id = '".$_GET['id']."'");
	header("location:index.php?page=".$_GET['page']);

?>