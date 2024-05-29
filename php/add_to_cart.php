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

// Check if the book already exists in the cart
$check_query = $conn->prepare("SELECT COUNT(*) AS book_count FROM cart WHERE user_id = ? AND book_id = ?");
$check_query->bind_param('ii', $user_id, $book_id);
$check_query->execute();
$check_result = $check_query->get_result();
$book_count_row = $check_result->fetch_assoc();
$book_count = $book_count_row['book_count'];

if ($book_count > 0) {
 echo json_encode(['status' => 'error', 'message' => 'Book already exists in the cart']);
 exit();
}

// Fetch book details
$query = $conn->prepare("SELECT title, author, price, image FROM books WHERE id = ?");
$query->bind_param('i', $book_id);
$query->execute();
$result = $query->get_result();
$book = $result->fetch_assoc();

if ($book) {
 $title = $book['title'];
 $author = $book['author'];
 $price = $book['price'];
 $image = $book['image'];
 $quantity = 1;

 // Insert book details into the cart table
 $insert_query = $conn->prepare("INSERT INTO cart (user_id, book_id, name, author, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
 $insert_query->bind_param('iissdis', $user_id, $book_id, $title, $author, $price, $quantity, $image);

 if ($insert_query->execute()) {
  // Get the updated cart count
  $cart_count_query = $conn->prepare("SELECT COUNT(*) AS cart_count FROM cart WHERE user_id = ?");
  $cart_count_query->bind_param('i', $user_id);
  $cart_count_query->execute();
  $cart_count_result = $cart_count_query->get_result();
  $cart_count_row = $cart_count_result->fetch_assoc();
  $cart_count = $cart_count_row['cart_count'];

  echo json_encode(['status' => 'success', 'cart_count' => $cart_count]);
 } else {
  echo json_encode(['status' => 'error', 'message' => 'Failed to add book to cart']);
 }
} else {
 echo json_encode(['status' => 'error', 'message' => 'Book not found']);
}
