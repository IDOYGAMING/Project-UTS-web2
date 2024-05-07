<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil data dari form edit invoice
$invoice_id = $_POST['invoice_id'];
$jumlah_produk = $_POST['jumlah_produk'];
$total_harga = $_POST['total_harga'];
$status_pembayaran = $_POST['status_pembayaran'];

// Query untuk update data invoice
$sql = "UPDATE invoices SET jumlah_produk='$jumlah_produk', total_harga='$total_harga', status_pembayaran='$status_pembayaran' WHERE invoice_id='$invoice_id'";

if ($conn->query($sql) === TRUE) {
    echo "Perubahan berhasil disimpan!";
    header("location: dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
