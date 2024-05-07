<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil ID invoice dari URL
$invoice_id = $_GET['id'];

// Query untuk menghapus invoice berdasarkan ID
$sql = "DELETE FROM invoices WHERE invoice_id='$invoice_id'";

if ($conn->query($sql) === TRUE) {
    echo "Invoice berhasil dihapus!";
    header("location: dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
