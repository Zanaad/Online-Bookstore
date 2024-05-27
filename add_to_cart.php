<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
 header('location: login.php');
 exit();
}

if (isset($_POST['add_to_cart'])) {
 $book_id = $_POST['book_id'];
 $quantity = $_POST['quantity'];

 // Retrieve book details from the database
 $query = "SELECT * FROM books WHERE id = $book_id";
 $result = mysqli_query($conn, $query);

 if ($result && mysqli_num_rows($result) > 0) {
  $book = mysqli_fetch_assoc($result);

  // Add the book to the cart
  $user_id = $_SESSION['user_id'];
  $name = $book['title'];
  $price = $book['price'];
  $image = $book['image'];

  $insert_query = "INSERT INTO cart (user_id, name, price, image, quantity) 
                         VALUES ('$user_id', '$name', '$price', '$image', '$quantity')";

  $insert_result = mysqli_query($conn, $insert_query);

  if ($insert_result) {
   // Redirect to cart page
   header('location: cart.php');
   exit();
  } else {
   // Handle insertion error
   echo "Failed to add item to cart";
  }
 } else {
  // Handle book not found
  echo "Book not found";
 }
}
