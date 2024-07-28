<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$cart = json_decode($_POST['cart'], true);

$sql = "INSERT INTO orders (name, email, address) VALUES ('$name', '$email', '$address')";
if ($conn->query($sql) === TRUE) {
    $order_id = $conn->insert_id;
    foreach ($cart as $item) {
        $product = $item['product'];
        $price = $item['price'];
        $sql = "INSERT INTO order_items (order_id, product, price) VALUES ('$order_id', '$product', '$price')";
        $conn->query($sql);
    }
    echo "Order placed successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
