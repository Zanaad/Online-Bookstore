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
  <footer>
    <div class="content">
      <div class="top">
        <div class="logo-details">
          <i class="fab fa-slack"></i>
          <span class="logo_name">Libraria Living</span>
        </div>
        <div class="media-icons">
          <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
          <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
          <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <div class="link-boxes">
        <ul class="box">
          <li class="link_name">LIBRARIA LIVING</li>
          <li><a href="#">Bulevardi Nene Tereza</a></li>
          <li>
            <a href="mailto:bookstore@gmail.com">bookstore@gmail.com</a>
          </li>
          <li><a href="callto:+383 45 647 763">+383 45 647 763</a></li>
        </ul>
        <ul class="box">
          <li class="link_name">Te duhet ndihme</li>
          <li><a href="about.php">Rreth nesh</a></li>
          <li><a href="contact.php">Na kontakto</a></li>
          <li class="link_name">
            Kontakto
            <abbr title="Kontakto sherbimin e konsumatorit">SHEK</abbr>
          </li>
        </ul>

        <ul class="box input-box">
          <li class="link_name">Subscribe</li>
          <li><input type="text" placeholder="Enter your email" /></li>
        </ul>
      </div>
    </div>
  </footer>
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