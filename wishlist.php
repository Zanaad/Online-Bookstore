<?php
session_start();
if (!isset($_SESSION['users'])) {
  header("Location: login.php?message=Please log in to access wishlist.");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wishlist</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <style>
    .wishlist-container {
      margin-top: 100px;
    }

    .book-card {
      width: 1000px;
      height: 340px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border: 1px solid #ccc;
      padding: 60px;
    }

    .book-card:hover {
      border: 1px solid #ccc;
    }
  </style>
</head>

<body>
  <?php
  include 'header.php'
  ?>

  <div class="wishlist-container">
    <div class="cart-items-1">
      <!-- Cart items will be displayed here -->
    </div>
    <div class="wishlist-footer">
      <button onclick="clearWishlist()">Clear Wishlist</button>
      <button id="move-1">Move to Bag</button>
    </div>
  </div>
  <?php
  include 'footer.php'
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="checkout.js"></script>
  <script>
    function clearWishlist() {
      // Remove all items from the cart stored in local storage
      localStorage.removeItem("wishlist");

      // Clear the cart display
      $(".cart-items-1").empty();

      // Reset the cart count display
      $(".cart-count-1").text("0");
    }
  </script>
  <script src="script.js"></script>
</body>

</html>