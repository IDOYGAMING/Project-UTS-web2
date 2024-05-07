<?php
include 'navbar.php';
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Query untuk mengambil daftar produk
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container-body">
        <h2>Data Produk</h2>
        <table>
       
            <tr>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Harga</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["product_id"] . "</td>";
                    echo "<td>" . $row["nama_produk"] . "</td>";
                    echo "<td>" . $row["harga_produk"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Tidak ada data produk</td></tr>";
            }
            ?>
        </table>
        <a href="tambah_produk.php" class="add-invoice-btn">Tambah Produk Baru</a>
    </div>
    <script src="script.js"></script>
</body>
</html>
