<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
 echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
 exit();
}

$user_id = $_SESSION['user_id'];
$query = $conn->prepare("SELECT cart.id, books.id as book_id, books.title, books.author, books.price, books.image, cart.quantity FROM cart JOIN books ON cart.book_id = books.id WHERE cart.user_id = ?");
$query->bind_param('i', $user_id);
$query->execute();
$result = $query->get_result();

$cart_items = [];
while ($row = $result->fetch_assoc()) {
 $cart_items[] = $row;
}

// Get the cart count
$count_query = $conn->prepare("SELECT COUNT(*) as cart_count FROM cart WHERE user_id = ?");
$count_query->bind_param('i', $user_id);
$count_query->execute();
$count_result = $count_query->get_result();
$count_row = $count_result->fetch_assoc();
$cart_count = $count_row['cart_count'];

echo json_encode(['status' => 'success', 'cart_items' => $cart_items, 'cart_count' => $cart_count]);
