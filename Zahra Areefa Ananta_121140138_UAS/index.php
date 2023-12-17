<!-- Zahra Areefa Ananta -->
<!-- 121140138 -->
<!-- Pemweb RC -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Lakukan verifikasi login sesuai kebutuhan (misalnya, cek di database)
    // Contoh sederhana: jika username=admin dan password=admin, maka login berhasil
    if ($username == "admin" && $password == "admin") {
        // Simpan informasi pengguna ke sesi jika login berhasil
        session_start();
        $_SESSION["username"] = $username;

        // Redirect ke halaman setelah login
        header("Location: laman.php");
        exit;
    } else {
        // Jika login gagal, tampilkan pesan error
        $error_message = "Username atau password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #ffcccc; /* Warna pink */
            padding: 50px;
        }

        .card {
            border: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Halaman Login</h5>
                        <?php if (isset($error_message)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>
                        <form action="laman.php" method="post">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" style="background-color: #fb6f92">Login</button>


                            <h5>manajemen state</h5>
                            <p>current state: <span id="currentState">no state</span></p>
                            <input type="checkbox" onclick="saveStateAndDisplay('new state')"> save state cookies</input>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
