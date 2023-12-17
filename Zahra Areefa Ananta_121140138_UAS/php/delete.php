<!-- Zahra Areefa Ananta -->
<!-- 121140138 -->
<!-- Pemweb RC -->

<?php 

if (isset($_GET['id'])) {
	include "../db_conn.php";
	$id = $_GET['id'];

	$sql = "DELETE FROM users 
	        WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		$ms = "Berhasil dihapus";
		header("Location: ../read.php?ms=$ms");
	    exit;
	}else {
		$ms = "Terjadi kesalahan yang tidak diketahui.";
		header("Location: ../read.php?ms=$ms");
	    exit;
	}
}else {
	header("Location: ../read.php");
	exit;
}