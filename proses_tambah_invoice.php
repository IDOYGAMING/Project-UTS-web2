<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil data dari form tambah invoice
$customer_id = $_POST['customer_id'];
$product_id = $_POST['product_id'];
$jumlah_produk = $_POST['jumlah_produk'];
$total_harga = $_POST['total_harga'];
$status_pembayaran = $_POST['status_pembayaran'];
$tanggal_pembuatan = date("Y-m-d");

// Query untuk menyimpan data ke tabel invoices
$sql = "INSERT INTO invoices (customer_id, product_id, jumlah_produk, total_harga, status_pembayaran, tanggal_pembuatan) VALUES ('$customer_id', '$product_id', '$jumlah_produk', '$total_harga', '$status_pembayaran', '$tanggal_pembuatan')";

if ($conn->query($sql) === TRUE) {
    echo "Invoice berhasil ditambahkan!";
    header("location: dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
