<?php
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
        header("location: data_customer.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
