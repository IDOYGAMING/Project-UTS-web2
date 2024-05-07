// script.js
function confirmLogout() {
    if (confirm("Apakah Anda yakin ingin keluar?")) {
        window.location.href = "logout.php"; // Redirect ke halaman logout jika disetujui
    } else {
        return false; // Kembali ke halaman saat itu jika dibatalkan
    }
}
