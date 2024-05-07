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

// Query untuk mengambil data invoice berdasarkan ID
$sql = "SELECT * FROM invoices WHERE invoice_id = $invoice_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Invoice tidak ditemukan";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Invoice</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container-form">
        <h2>Edit Invoice</h2>
        <form method="post" action="proses_edit_invoice.php">
            <input type="hidden" name="invoice_id" value="<?php echo $row['invoice_id']; ?>">
            <label for="customer_id">Pilih Customer:</label><br>
            <input type="text" name="customer_id" value="<?php echo $row['customer_id']; ?>" disabled><br>
            <label for="product_id">Pilih Produk:</label><br>
            <input type="text" name="product_id" value="<?php echo $row['product_id']; ?>" disabled><br><br>
            <input type="number" name="jumlah_produk" value="<?php echo $row['jumlah_produk']; ?>" required><br><br>
            <input type="number" name="total_harga" value="<?php echo $row['total_harga']; ?>" required><br><br>
            <label for="status_pembayaran">Status Pembayaran:</label><br><br>
            <select name="status_pembayaran" id="status_pembayaran">
                <option value="Belum Lunas" <?php if ($row['status_pembayaran'] == 'Belum Lunas') echo 'selected'; ?>>Belum Lunas</option>
                <option value="Lunas" <?php if ($row['status_pembayaran'] == 'Lunas') echo 'selected'; ?>>Lunas</option>
            </select><br><br>
            <button type="submit">Simpan Perubahan</button>
        </form>
        <br>
        
<form action="dashboard.php">
    <button type="submit">Kembali ke Dashboard</button>
</form>

        <br>
    </div>
</body>
</html>
