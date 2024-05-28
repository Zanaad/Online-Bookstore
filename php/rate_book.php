<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $book_id = intval($_POST['book_id']);
 $user_id = intval($_POST['user_id']);
 $rating = floatval($_POST['rating']);

 // Check if the user has already rated this book
 $check_query = "SELECT * FROM book_ratings WHERE book_id = ? AND user_id = ?";
 $stmt = $conn->prepare($check_query);
 $stmt->bind_param("ii", $book_id, $user_id);
 $stmt->execute();
 $result = $stmt->get_result();

 if ($result->num_rows > 0) {
  // Update the existing rating
  $update_query = "UPDATE book_ratings SET rating = ? WHERE book_id = ? AND user_id = ?";
  $stmt = $conn->prepare($update_query);
  $stmt->bind_param("dii", $rating, $book_id, $user_id);
  $stmt->execute();
 } else {
  // Insert the new rating
  $insert_query = "INSERT INTO book_ratings (book_id, user_id, rating) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($insert_query);
  $stmt->bind_param("iid", $book_id, $user_id, $rating);
  $stmt->execute();
 }

 // Calculate the new average rating
 $average_query = "SELECT AVG(rating) as average_rating FROM book_ratings WHERE book_id = ?";
 $stmt = $conn->prepare($average_query);
 $stmt->bind_param("i", $book_id);
 $stmt->execute();
 $result = $stmt->get_result();
 $row = $result->fetch_assoc();
 $average_rating = $row['average_rating'];

 // Update the average rating in the books table
 $update_book_query = "UPDATE books SET average_rating = ? WHERE id = ?";
 $stmt = $conn->prepare($update_book_query);
 $stmt->bind_param("di", $average_rating, $book_id);
 $stmt->execute();

 echo json_encode(['success' => true, 'average_rating' => $average_rating]);
} else {
 echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}

$stmt->close();
$conn->close();
