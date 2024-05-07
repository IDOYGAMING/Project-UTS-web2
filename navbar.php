<nav class="navbar">
    <div class="container">
        <a href="#" class="logo">Manajemen Invoice</a>
        <ul class="nav-links">
            <li><a href="dashboard.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'class="current"' : ''; ?>>Data Invoice</a></li>
            <li><a href="data_customer.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'data_customer.php') ? 'class="current"' : ''; ?>>Data Customer</a></li>
            <li><a href="data_produk.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'data_produk.php') ? 'class="current"' : ''; ?>>Data Produk</a></li>
        </ul>
<script>
function confirmLogout() {
    if (confirm("Apakah Anda yakin ingin keluar?")) {
        window.location.href = "logout.php"; 
    } else {
        return false; 
    }
}
</script>

<a href="#" class="logout-btn" onclick="return confirmLogout();">Logout</a>

    </div>
</nav>

