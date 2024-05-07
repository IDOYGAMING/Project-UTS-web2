<?php
 include 'navbar.php'; 

session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Query untuk mengambil daftar invoice
$sql = "SELECT * FROM invoices";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <div class="container-body">
        <h2>Daftar Invoice</h2>
        <table>
            <tr>
                <th>ID Invoice</th>
                <th>ID Customer</th>
                <th>ID Produk</th>
                <th>Jumlah Produk</th>
                <th>Total Harga</th>
                <th>Status Pembayaran</th>
                <th>Tanggal Pembuatan</th>
                <th>Aksi</th> <!-- Kolom untuk aksi -->
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["invoice_id"] . "</td>";
                    echo "<td>" . $row["customer_id"] . "</td>";
                    echo "<td>" . $row["product_id"] . "</td>";
                    echo "<td>" . $row["jumlah_produk"] . "</td>";
                    echo "<td>" . $row["total_harga"] . "</td>";
                    echo "<td>" . $row["status_pembayaran"] . "</td>";
                    echo "<td>" . $row["tanggal_pembuatan"] . "</td>";
                    echo "<td>
                            <a href='edit_invoice.php?id=" . $row["invoice_id"] . "' class='edit-btn'>Edit</a>
                            <a href='hapus_invoice.php?id=" . $row["invoice_id"] . "' class='delete-btn'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Tidak ada data invoice</td></tr>";
            }
            ?>
        </table>
        <br>
        <a href="tambah_invoice.php" class="add-invoice-btn">Tambah Invoice Baru</a>
    </div>
    
</body>
</html>