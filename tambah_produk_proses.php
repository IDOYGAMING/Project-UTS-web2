<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form tambah produk
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];

    // Query untuk menyimpan data ke tabel products
    $sql = "INSERT INTO products (nama_produk, harga_produk) VALUES ('$nama_produk', '$harga_produk')";

    if ($conn->query($sql) === TRUE) {
        echo "Produk berhasil ditambahkan!";
        header("location: data_produk.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
