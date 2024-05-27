<?php
session_start();
include 'db_connect.php';

// Check if the request is an AJAX request
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest') {
 // If not an AJAX request, deny access
 http_response_code(403);
 exit('Forbidden');
}

if (!isset($_SESSION['user_id'])) {
 echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
 exit();
}

$user_id = $_SESSION['user_id'];

// Retrieve book_id from AJAX request data
$book_id = isset($_POST['book_id']) ? $_POST['book_id'] : null;

if (!$book_id) {
 echo json_encode(['status' => 'error', 'message' => 'Book ID not provided']);
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
 $quantity = 1; // default quantity

 // Insert book details into the cart table
 $insert_query = $conn->prepare("INSERT INTO cart (user_id, book_id, name, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?)");
 $insert_query->bind_param('iisdis', $user_id, $book_id, $title, $price, $quantity, $image);

 if ($insert_query->execute()) {
  echo json_encode(['status' => 'success']);
 } else {
  echo json_encode(['status' => 'error', 'message' => 'Failed to add book to cart']);
 }
} else {
 echo json_encode(['status' => 'error', 'message' => 'Book not found']);
}
