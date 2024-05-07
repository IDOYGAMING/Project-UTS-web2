<?php
session_start();
include 'koneksi.php';

// Ambil data dari form login
$email = $_POST['email'];
$password = $_POST['password'];

// Buat query untuk mengambil data user berdasarkan email
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verifikasi password
    if (password_verify($password, $row['password'])) {
        // Password cocok, set session dan redirect ke halaman dashboard
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['nama'] = $row['nama'];
        header("Location: dashboard.php");
    } else {
        echo "Password salah";
    }
} else {
    echo "User tidak ditemukan";
}

$conn->close();
?>
