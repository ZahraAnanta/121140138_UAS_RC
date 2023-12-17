<!-- Zahra Areefa Ananta -->
<!-- 121140138 -->
<!-- Pemweb RC -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | Check-box and Radio</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 50px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        legend {
            font-weight: bold;
        }
        mark {
            display: block;
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
		input[type="text"],
        input[type="number"],
        input[type="radio"],
        input[type="checkbox"],
        input[type="submit"],
        a {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form id="userDataForm" action="php/create.php" method="post">
        <fieldset>
            <legend style="text-align: center;">Data User</legend>
            <div class="form-group">
                <mark>
                    <?php if (isset($_GET['ms'])) {
                        echo $_GET['ms'];
                    } ?>
                </mark>
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

			<div class="form-group">
    			<label for="age">Age</label>
    			<input type="number" class="form-control" id="age" name="age" min="0" max="150">
			</div>


            <div class="form-group">
                <label>Gender</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="male" name="gender" value="Male" checked>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="female" name="gender" value="Female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
			<div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="programmer" name="programmer">
                    <label class="form-check-label" for="programmer">Are you a Programmer?</label>
                </div>
            </div>
            
            <input type="submit" class="btn btn-primary" value="Create">
            <a href="read.php" class="btn btn-secondary">View</a>
        </fieldset>
    </form>

    <!-- Tambahkan script Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Javascript -->
    <script>
        document.getElementById('userDataForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman form secara default

            // Validasi input sebelum pengiriman ke server
            const name = document.getElementById('name').value.trim();
            const age = document.getElementById('age').value.trim();
            const gender = document.querySelector('input[name="gender"]:checked');
            const programmer = document.getElementById('programmer').checked;

            if (name === '' || age === '' || gender === null || !programmer) {
                alert('Harap lengkapi semua field.');
                return;
            }

            // Simpan data ke cookie dan localStorage
            document.cookie = `username=${name}; expires=${new Date(Date.now() + 86400e3).toUTCString()}; path=/`;
            localStorage.setItem('userAge', age);

            // Jika validasi berhasil, submit form
            this.submit();
        });

        // Contoh menggunakan nilai dari cookie dan localStorage
        const storedUsername = document.cookie.replace(/(?:(?:^|.*;\s*)username\s*=\s*([^;]*).*$)|^.*$/, '$1');
        if (storedUsername !== '') {
            console.log('Username from cookie:', storedUsername);
        }

        const storedAge = localStorage.getItem('userAge');
        if (storedAge !== null) {
            console.log('Age from localStorage:', storedAge);
        }
    </script>

</body>
</html>
