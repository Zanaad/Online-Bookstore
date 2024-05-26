<?php
session_start();
if (!isset($_SESSION['users'])) {
  header("Location: login.php?message=Please log in to access your cart.");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cart</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="checkout.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <style>
    .header {
      margin-bottom: 500px;
    }

    .cart-container {
      margin-top: 100px;
      margin-left: 60px;
      display: flex;
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

    .cart-footer-1 {
      display: block;
      justify-content: center;
      align-items: center;
      margin: 15px;
      padding: 60px;
      border: 1px solid #ccc;
      border-radius: 10px;
      height: 340px;
    }

    .cart-footer-1 button {
      border: 1px solid #b8b4b4;
      box-sizing: border-box;
      background-color: #fff;
      border-radius: 2px;
      font-weight: 700;
      font-size: 16px;
      text-align: center;
      color: #7a7777;
      padding: 10px 60px;
      margin-top: 10px;
    }

    .cart-footer-1 button:hover {
      background-color: #032161;
      color: #fff;
    }
  </style>
</head>

<body>
  <?php
  include 'header.php'
  ?>

  <div class="cart-container">
    <div class="cart-items">
      <!-- Cart items will be displayed here -->
    </div>

    <div class="cart-footer-1">
      <h3>Order Summary</h3>
      <hr style="margin-bottom: 20px" />
      <div class="cart-total">
        <p>Total: <span id="cart-total-price-books">0€</span></p>
      </div>
      <button onclick="clearCart()">Clear Cart</button>
    </div>
  </div>

  <?php
  include 'footer.php'
  ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="script.js"></script>
  <script src="checkout.js"></script>
  <script>
    function openForm() {
      console.log("openForm function called");
      document.getElementById("bigDiv").style.display = "block";
    }

    function closeForm() {
      document.getElementById("bigDiv").style.display = "none";
    }

    function clearCart() {
      // Remove all items from the cart stored in local storage
      localStorage.removeItem("cart");

      // Clear the cart display
      $(".cart-items").empty();

      // Reset the total price display
      $("#cart-total-price").text("0€");

      // Reset the cart count display
      $(".cart-count").text("0");
    }
  </script>
</body>

</html>