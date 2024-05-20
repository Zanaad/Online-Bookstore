<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

include 'config.php';

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
};

if (isset($_POST['add_to_cart'])) {

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if (mysqli_num_rows($check_cart_numbers) > 0) {
      $message[] = 'already added to cart!';
   } else {
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }
};
?>

<header class="header">

   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <p> new <a href="login.php">login</a> | <a href="register.php">register</a> </p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo">Libraria Living</a>

         <div class="search-container">
            <form action="" class="search" method="post">
               <input type="text" class="search-bar" placeholder="Search..." name="search">
               <button type="submit" class="search-button" name="submit"> <i class="fas fa-search search-icon"></i></button>
            </form>
         </div>

         </section>

         <nav class="navbar">
            <a href="shop.php">Books</a>
            <a href="orders.php">Orders</a>
            <a href="contact.php">Contact Us</a>
            <a href="about.php">About Us</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>

            <div id="user-btn" class="fas fa-user"></div>
            <?php
            $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            $cart_rows_number = mysqli_num_rows($select_cart_number);
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

         <div class="user-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
         </div>
      </div>
   </div>
</header>

<section class="products" style="padding-top: 0;">

   <div class="box-container">
      <?php
      if (isset($_POST['submit'])) {
         $search_item = $_POST['search'];
         $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%{$search_item}%'") or die('query failed');
         if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_product = mysqli_fetch_assoc($select_products)) {
      ?>
               <form action="" method="post" class="box">
                  <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="" class="image">
                  <div class="name"><?php echo $fetch_product['name']; ?></div>
                  <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
                  <input type="number" class="qty" name="product_quantity" min="1" value="1">
                  <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                  <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                  <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                  <input type="submit" class="btn" value="add to cart" name="add_to_cart">
               </form>
      <?php
            }
         } else {
            echo '<p class="empty">no result found!</p>';
         }
      }
      ?>
   </div>

</section>