<?php
// Start the session at the very top, before any HTML or output
session_start();
?>

<header class="container-fluid header-container">
  <div class="logo">
    <img src="./images/StoryShop.png" alt="Logo">
    <a href="index.php">LIBRARIA LIVING</a>
  </div>

  <div class="search-container">
    <form action="search.php" class="search" method="GET">
      <input type="text" class="search-bar" name="query" placeholder="Search...">
      <button class="search-button" type="submit"><i class="fas fa-search search-icon"></i></button>
    </form>
  </div>

  <nav class="menu-container">
    <ul>
      <li><a href="#">Libra shqip</a>
        <ul>
          <li><a href="./fantazi.php">Fantazi</a></li>
          <li><a href="./novela.php">Novela</a></li>
          <li><a href="./romance.php">Romancë</a></li>
        </ul>
      </li>
      <li><a href="#">Libra të huaj</a>
        <ul>
          <li><a href="./english.php">Libra anglisht</a></li>
          <li><a href="./frengjisht.php">Libra frengjisht</a></li>
          <li><a href="./turqisht.php">Libra turqisht</a></li>
        </ul>
      </li>
      <li><a href="evente.php">Evente</a></li>
      <li><a href="./contact.php">Contact Us</a></li>
      <li>
        <a href="#">
          <?php
          // Display user's name if logged in, otherwise show "My Account"
          echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "My account";
          ?>
        </a>
        <span class="far fa-user" style="font-size: 20px; <?php echo isset($_COOKIE['logged_in']) ? 'color: darkblue;' : ''; ?>"></span>

        <ul class="account-content">
          <?php if (isset($_SESSION['user_name'])): ?>
            <li><a href="logout.php">Log Out</a></li>
          <?php else: ?>
            <li><a href="./signup.php" id="signup-btn">Sign Up</a></li>
            <li role="presentation">
              <hr>
            </li>
            <li><a href="login.php" id="login-btn">Log in</a></li>
          <?php endif; ?>
          <li><a href="./cart.php">Cart</a></li>
          <li><a href="./wishlist.php">Wishlist</a></li>
        </ul>
      </li>
    </ul>
  </nav>
</header>

<div class="dropdown-cart">
  <button class="cart-toggle-btn">
    <i class="fas fa-shopping-cart"></i>
    <span class="cart-count">0</span>
  </button>
  <div class="cart-window">
    <div class="cart-items"></div>
    <div class="cart-total">
      <p>Total: <span id="cart-total-price">0€</span></p>
    </div>
    <div class="cart-footer">
      <a href="cart.php"><button>View Bag</button></a>
      <a href="checkout.php"><button>Checkout</button></a>
    </div>
  </div>
</div>

<div class="dropdown-cart-1">
  <button class="cart-toggle-btn-1">
    <i class="fas fa-heart"></i>
    <span class="cart-count-1">0</span>
  </button>
  <div class="cart-window-1">
    <div class="cart-items-1"></div>
    <div class="wishlist-footer">
      <a href="wishlist.php"><button>View</button></a>
    </div>
  </div>
</div>