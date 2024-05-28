<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
 echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
 exit();
}

$user_id = $_SESSION['user_id'];
$query = $conn->prepare("SELECT books.id, books.author, books.title, books.price, books.image FROM wishlist JOIN books ON wishlist.book_id = books.id WHERE wishlist.user_id = ?");
$query->bind_param('i', $user_id);
$query->execute();
$result = $query->get_result();

$wishlist_items = [];
while ($row = $result->fetch_assoc()) {
 $wishlist_items[] = $row;
}

echo json_encode(['status' => 'success', 'wishlist_items' => $wishlist_items]);
