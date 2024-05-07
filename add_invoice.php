<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST["customer_id"];
    $product_id = $_POST["product_id"];
    $quantity = $_POST["quantity"];
    $total_amount = $_POST["total_amount"];
    
    // Insert data
    $sql = "INSERT INTO invoices (customer_id, product_id, quantity, total_amount) VALUES ('$customer_id', '$product_id', '$quantity', '$total_amount')";
    
    if ($conn->query($sql) === TRUE) {
        header("location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
