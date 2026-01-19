<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
 echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
 exit();
}

$user_id = $_SESSION['user_id'];
$query = $conn->prepare("SELECT wishlist.id, books.id as book_id, books.title, books.author, books.price, books.image FROM wishlist JOIN books ON wishlist.book_id = books.id WHERE wishlist.user_id = ?");
$query->bind_param('i', $user_id);
$query->execute();
$result = $query->get_result();

$wishlist_items = [];
while ($row = $result->fetch_assoc()) {
 $wishlist_items[] = $row;
}

// Get the wishlist count
$count_query = $conn->prepare("SELECT COUNT(*) as wishlist_count FROM wishlist WHERE user_id = ?");
$count_query->bind_param('i', $user_id);
$count_query->execute();
$count_result = $count_query->get_result();
$count_row = $count_result->fetch_assoc();
$wishlist_count = $count_row['wishlist_count'];

echo json_encode(['status' => 'success', 'wishlist_items' => $wishlist_items, 'wishlist_count' => $wishlist_count]);
