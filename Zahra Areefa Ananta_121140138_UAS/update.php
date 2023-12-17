<!-- Zahra Areefa Ananta -->
<!-- 121140138 -->
<!-- Pemweb RC -->

<?php 
    if (isset($_GET['id'])) {
    	$id = $_GET['id'];

    	$fakeTok = "562random";
        include "php/read-single.php";

        if (mysqli_num_rows($result) > 0) {
        	$user = mysqli_fetch_assoc($result);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD | Check-box and Radio</title>
	<!-- Link Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body {
			background-color: #f3dfe6; /* Warna latar belakang */
			padding: 20px;
		}
		form {
			max-width: 400px;
			margin: 0 auto;
		}
		legend {
			font-weight: bold;
		}
		mark {
			background-color: #f8a5c2; /* Warna latar belakang mark */
			padding: 5px;
			display: inline-block;
			margin-bottom: 20px;
			border-radius: 3px;
		}
		label {
			font-weight: bold;
			margin-bottom: 10px;
		}
		input[type="text"],
		input[type="radio"],
		input[type="checkbox"],
		input[type="submit"],
		a {
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<form action="php/update.php" method="post">
		<fieldset>
			<legend>Edit:</legend>
			<br />
			<mark>
				<?php if (isset($_GET['ms'])) {
					echo $_GET['ms'];
				} ?>
			</mark>
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" name="name" value="<?=$user['name']?>">
			</div><br />

			<div class="form-group">
    			<label for="age">Age</label>
    			<input type="number" class="form-control" id="age" name="age" value="<?=$user['age']?>">
			</div><br />


			<input type="text" name="id" value="<?=$user['id']?>" hidden>

			<div class="form-group">
				<label>Gender</label><br />
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" id="male" name="gender" value="Male" <?php echo ($user['gender'] == "Male")?"checked":"" ?>>
					<label class="form-check-label" for="male">Male</label>
				</div>

				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" id="female" name="gender" value="Female" <?php echo ($user['gender'] == "Female")?"checked":"" ?>>
					<label class="form-check-label" for="female">Female</label>
				</div>
			</div><br />

			<div class="form-group">
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="programmer" name="programmer" <?php echo ($user['programmer'] == "Yes")?"checked":"" ?>>
					<label class="form-check-label" for="programmer">Are you a Programmer?</label>
				</div>
			</div><br />
			<input type="submit" class="btn btn-primary" value="Update">
			<a href="read.php" class="btn btn-secondary">View</a>
		</fieldset>
	</form>

	<!-- Link Bootstrap JS -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php 
	} else {
	    header("Location: read.php");
	    exit;
	} 

} else {
    header("Location: read.php");
    exit;
} 
?>