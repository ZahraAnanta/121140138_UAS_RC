<!-- Zahra Areefa Ananta -->
<!-- 121140138 -->
<!-- Pemweb RC -->

<?php 

if (isset($_POST['name']) &&
	isset($_POST['age']) &&
	isset($_POST['gender'])) {

	include "../db_conn.php";

	$name = $_POST['name'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];

	if (empty($name)) {
		header("Location: ../laman.php?ms=Name is required");
	    exit;
	}else {
		if (isset($_POST['programmer'])) {
			$programmer = "YES";
		}else {
			$programmer = "NO";
		}
        $sql = "INSERT INTO users(name, gender, programmer, age)
                VALUES('$name', '$gender', '$programmer', '$age')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
        	$ms = "Berhasil Dibuat!";
        	header("Location: ../laman.php?ms=$ms");
	        exit;
        }else {
        	$ms = "Terjadi kesalahan yang tidak diketahui";
        	header("Location: ../laman.php?ms=$ms");
	        exit;
        }

	}
}else {
	header("Location: ../laman.php");
	exit;
}