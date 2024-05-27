<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
 echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
 exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['wishlist_id'])) {
 $wishlist_id = $_POST['wishlist_id'];

 // Retrieve the wishlist item details
 $query = $conn->prepare("SELECT * FROM wishlist WHERE id = ? AND user_id = ?");
 $query->bind_param('ii', $wishlist_id, $user_id);
 $query->execute();
 $result = $query->get_result();

 if ($result->num_rows > 0) {
  $wishlist_item = $result->fetch_assoc();

  // Remove the item from the wishlist
  $query = $conn->prepare("DELETE FROM wishlist WHERE id = ?");
  $query->bind_param('i', $wishlist_id);
  $query->execute();

  // Add the item to the cart
  $query = $conn->prepare("INSERT INTO cart (user_id, book_id, name, price, image) VALUES (?, ?, ?, ?, ?)");
  $query->bind_param('iisss', $user_id, $wishlist_item['book_id'], $wishlist_item['name'], $wishlist_item['price'], $wishlist_item['image']);
  $query->execute();

  echo json_encode(['status' => 'success', 'message' => 'Item moved to cart']);
 } else {
  echo json_encode(['status' => 'error', 'message' => 'Wishlist item not found']);
 }
} else {
 echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
