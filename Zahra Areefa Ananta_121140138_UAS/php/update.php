<!-- Zahra Areefa Ananta -->
<!-- 121140138 -->
<!-- Pemweb RC -->

<?php 

if (isset($_POST['name']) &&
	isset($_POST['gender'])&&
	isset($_POST['age'])&&
    isset($_POST['id'])) {

	include "../db_conn.php";

	$name = $_POST['name'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$id = $_POST['id'];

	if (empty($name)) {
		header("Location: ../update.php?ms=Name is required&id=$id");
	    exit;
	}else {
		if (isset($_POST['programmer'])) {
			$programmer = "YES";
		}else {
			$programmer = "NO";
		}
        $sql = "UPDATE users 
                SET name='$name', gender='$gender', programmer='$programmer', age='$age'
                WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
        	$ms = "Berhasil Diupdate!";
        	header("Location: ../update.php?ms=$ms&id=$id");
	        exit;
        }else {
        	$ms = "Terjadi kesalahan yang tidak diketahui.";
        	header("Location: ../update.php?ms=$ms&id=$id");
	        exit;
        }

	}
}else {
	header("Location: ../read.php");
	exit;
}