<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
 echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
 exit();
}

$user_id = $_SESSION['user_id'];

$book_id = isset($_POST['book_id']) ? $_POST['book_id'] : null;

if (!$book_id) {
 echo json_encode(['status' => 'error', 'message' => 'Book ID not provided']);
 exit();
}

// Check if the book already exists in the wishlist
$check_query = $conn->prepare("SELECT COUNT(*) AS book_count FROM wishlist WHERE user_id = ? AND book_id = ?");
$check_query->bind_param('ii', $user_id, $book_id);
$check_query->execute();
$check_result = $check_query->get_result();
$book_count_row = $check_result->fetch_assoc();
$book_count = $book_count_row['book_count'];

if ($book_count > 0) {
 echo json_encode(['status' => 'error', 'message' => 'Book already exists in the wishlist']);
 exit();
}

// Fetch book details
$query = $conn->prepare("SELECT title, price, image FROM books WHERE id = ?");
$query->bind_param('i', $book_id);
$query->execute();
$result = $query->get_result();
$book = $result->fetch_assoc();

if ($book) {
 $title = $book['title'];
 $price = $book['price'];
 $image = $book['image'];


 // Insert book details into the wishlist table
 $insert_query = $conn->prepare("INSERT INTO wishlist (user_id, book_id, name, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?)");
 $insert_query->bind_param('iisdis', $user_id, $book_id, $title, $price, $quantity, $image);

 if ($insert_query->execute()) {

  $wishlist_count_query = $conn->prepare("SELECT COUNT(*) AS wishlist_count FROM wishlist WHERE user_id = ?");
  $wishlist_count_query->bind_param('i', $user_id);
  $wishlist_count_query->execute();
  $wishlist_count_result = $wishlist_count_query->get_result();
  $wishlist_count_row = $wishlist_count_result->fetch_assoc();
  $wishlist_count = $wishlist_count_row['wishlist_count'];

  echo json_encode(['status' => 'success', 'wishlist_count' => $wishlist_count]);
 } else {
  echo json_encode(['status' => 'error', 'message' => 'Failed to add book to wishlist']);
 }
} else {
 echo json_encode(['status' => 'error', 'message' => 'Book not found']);
}
