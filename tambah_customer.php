<?php
include 'navbar.php';
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form tambah customer
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];

    // Query untuk menyimpan data ke tabel customers
    $sql = "INSERT INTO customers (nama_customer, alamat_customer, telepon_customer, email_customer) VALUES ('$nama', '$alamat', '$telepon', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Customer berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Customer</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container-form">
        <h2>Tambah Customer Baru</h2>
        <form method="post" action="proses_tambah_customer.php">
            <input type="text" name="nama" placeholder="Nama" required><br>
            <input type="text" name="alamat" placeholder="Alamat" required><br>
            <input type="text" name="telepon" placeholder="Telepon" required><br>
            <input type="email" name="email" placeholder="Email" required><br><br>
            <button type="submit">Tambah Customer</button>
        </form>
        <br>
       
    </div>
</body>
</html>
