<?php
include 'navbar.php';
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Query untuk mengambil daftar customer
$sql = "SELECT * FROM customers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Customer</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container-body">
        <h2>Data Customer</h2>
        <table>
            <tr>
                <th>ID Customer</th>
                <th>Nama Customer</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["customer_id"] . "</td>";
                    echo "<td>" . $row["nama_customer"] . "</td>";
                    echo "<td>" . $row["alamat_customer"] . "</td>";
                    echo "<td>" . $row["telepon_customer"] . "</td>";
                    echo "<td>" . $row["email_customer"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data customer</td></tr>";
            }
            ?>
        </table>
        <br>
        <a href="tambah_customer.php" class="add-invoice-btn">Tambah Customer Baru</a>
    </div>
    <script src="script.js"></script>
</body>
</html>
