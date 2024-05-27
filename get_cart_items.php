<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
 echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
 exit();
}

$user_id = $_SESSION['user_id'];
$query = $conn->prepare("SELECT books.id, books.author, books.title, books.author, books.price, books.image, cart.quantity FROM cart JOIN books ON cart.book_id = books.id WHERE cart.user_id = ?");
$query->bind_param('i', $user_id);
$query->execute();
$result = $query->get_result();

$cart_items = [];
while ($row = $result->fetch_assoc()) {
 $cart_items[] = $row;
}

echo json_encode(['status' => 'success', 'cart_items' => $cart_items]);
