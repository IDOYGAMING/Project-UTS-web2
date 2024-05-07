<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="register-body">
    <div class="register-container">
        <h2>Register</h2>
        <form action="register_proses.php" method="post" class="register-form">
            <div class="input-group">
                <input type="text" name="nama" placeholder="Nama" required>
            </div>
            <div class="input-group">
                <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="register-btn">Register</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login disini</a></p>
    </div>
</body>
</html>
