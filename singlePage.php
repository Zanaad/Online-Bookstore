<?php
include('book_data.php');
// Check if the book ID is provided in the URL
if (isset($_GET['book_id'])) {
 // Retrieve the book ID from the URL
 $book_id = $_GET['book_id'];

 // Find the book details in the $books array
 $book_details = array_filter($books, function ($book) use ($book_id) {
  return $book['id'] == $book_id;
 });

 // Check if book details were found
 if (!empty($book_details)) {
  // Since array_filter returns an array, extract the first (and only) element
  $book_details = reset($book_details);
 } else {
  // Book not found, handle error
 }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>

<body>
 <div class="container">
  <div class="book-details">
   <?php if (isset($book_details)) : ?>
    <img src="<?php echo $book_details['image']; ?>" alt="">
    <div class="content">
     <!-- Display book details -->
     <h5><?php echo $book_details['title']; ?></h5>
     <h6><?php echo $book_details['author']; ?></h6>
     <h5 class="price"><?php echo $book_details['price']; ?></h5>
     <div class="btn">
      <button>Shto në shportë</button>
     </div>
    </div>
   <?php endif; ?>
  </div>
 </div>

</body>

</html>