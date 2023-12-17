<!-- Zahra Areefa Ananta -->
<!-- 121140138 -->
<!-- Pemweb RC -->

<?php 
$fakeTok = "562random";
include "php/read.php";

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
        /* Gaya khusus */
        body {
            background-color: #f3dfe6; /* Warna latar belakang */
            padding: 20px;
        }
        table {
            border: 1px solid #dee2e6;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th {
            background-color: #f8a5c2; /* Warna latar belakang header tabel */
            color: #fff; /* Warna teks header tabel */
        }
        mark {
            background-color: #f8a5c2; /* Warna latar belakang mark */
            padding: 5px;
            display: inline-block;
            margin-bottom: 20px;
            border-radius: 3px;
        }
        a {
            color: #f8a5c2; /* Warna teks link */
            margin-right: 10px;
        }
        a:hover {
            text-decoration: none;
            color: #d15676; /* Warna teks link saat dihover */
        }
    </style>
</head>
<body>
    <?php if(mysqli_num_rows($result)){ ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <mark>
                        <?php if (isset($_GET['ms'])) {
                            echo $_GET['ms'];
                        } ?>
                    </mark>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
								<th>Age</th>
                                <th>Gender</th>
                                <th>Programmer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            while ($users = mysqli_fetch_assoc($result)) {
                                $i++;
                            ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$users['name']?></td>
								<td><?=$users['age']?></td>
                                <td><?=$users['gender']?></td>
                                <td><?=$users['programmer']?></td>
                                <td>
                                    <a href="update.php?id=<?=$users['id']?>">Edit</a>
                                    <a href="php/delete.php?id=<?=$users['id']?>">Delete</a>
                                </td>    
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="laman.php">Create</a>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Empty!</h1>
                    <a href="laman.php">Create</a>
                </div>
            </div>
        </div>
    <?php } ?>
    
    <!-- Link Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>