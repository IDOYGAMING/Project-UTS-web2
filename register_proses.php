<?php
include 'koneksi.php';

// Ambil data dari form registrasi
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

// Enkripsi password sebelum disimpan di database
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Buat query untuk menyimpan data ke tabel users
$sql = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Registrasi berhasil!";
    header("Location: login.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
