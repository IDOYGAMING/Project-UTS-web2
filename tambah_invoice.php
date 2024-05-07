<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: user/login.php");
    exit();
}

// Query untuk mengambil daftar customer
$sql_customer = "SELECT * FROM customers";
$result_customer = $conn->query($sql_customer);

// Query untuk mengambil daftar produk
$sql_product = "SELECT * FROM products";
$result_product = $conn->query($sql_product);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Invoice</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container-form">
        <h2>Tambah Invoice Baru</h2>
        <form method="post" action="proses_tambah_invoice.php">
            <label for="customer_id">Pilih Customer:</label>
            <select name="customer_id" id="customer_id">
                <?php
                if ($result_customer->num_rows > 0) {
                    while ($row = $result_customer->fetch_assoc()) {
                        echo "<option value='" . $row["customer_id"] . "'>" . $row["nama_customer"] . "</option>";
                    }
                } else {
                    echo "<option value=''>Tidak ada customer</option>";
                }
                ?>
            </select><br><br>
            <label for="product_id">Pilih Produk:</label>
            <select name="product_id" id="product_id">
                <?php
                if ($result_product->num_rows > 0) {
                    while ($row = $result_product->fetch_assoc()) {
                        echo "<option value='" . $row["product_id"] . "'>" . $row["nama_produk"] . "</option>";
                    }
                } else {
                    echo "<option value=''>Tidak ada produk</option>";
                }
                ?>
            </select><br><br>
            <input type="number" name="jumlah_produk" placeholder="Jumlah Produk" required><br><br>
            <input type="number" name="total_harga" placeholder="Total Harga" required><br><br>
            <label for="status_pembayaran">Status Pembayaran:</label>
            <select name="status_pembayaran" id="status_pembayaran">
                <option value="Belum Lunas">Belum Lunas</option>
                <option value="Lunas">Lunas</option>
            </select><br><br>
            <button type="submit">Tambah Invoice</button>
        </form>
      
    </div>
</body>
</html>
