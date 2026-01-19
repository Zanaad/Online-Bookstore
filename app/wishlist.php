<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

include './php/db_connect.php';

if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM `wishlist` WHERE id = '$delete_id'") or die('query failed');
  header('location:wishlist.php');
}

if (isset($_GET['delete_all'])) {
  mysqli_query($conn, "DELETE FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
  header('location:wishlist.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>wishlist</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php
  include './php/header.php';
  ?>

  <div class="heading">
    <h3>Wishlist items</h3>
    <p> <a href="index.php">Home</a> / wishlist </p>
  </div>

  <section class="shopping-cart">
    <h1 class="title">Books Added</h1>
    <div class="box-container">
      <?php
      $select_wishlist = mysqli_query($conn, "SELECT wishlist.id as wishlist_id, books.* FROM `wishlist` JOIN `books` ON wishlist.book_id = books.id WHERE wishlist.user_id = '$user_id'") or die('query failed');
      if (mysqli_num_rows($select_wishlist) > 0) {
        while ($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)) {
      ?>
          <div class="box">
            <a href="wishlist.php?delete=<?php echo $fetch_wishlist['wishlist_id']; ?>" class="fas fa-times" onclick="return confirm('delete this from wishlist?');"></a>
            <img src="<?php echo $fetch_wishlist['image']; ?>" alt="<?php echo $fetch_wishlist['title']; ?>">
            <div class="name"><?php echo $fetch_wishlist['title']; ?></div>
            <div class="name"><?php echo $fetch_wishlist['author']; ?></div>
            <div class="price"><?php echo $fetch_wishlist['price']; ?>€</div>
            <button class="move-to-bag-btn move-btn" data-id="<?php echo $fetch_wishlist['wishlist_id']; ?>">Move to Bag</button>
          </div>
      <?php
        }
      } else {
        echo '<p class="empty">Your wishlist is empty</p>';
      }
      ?>
    </div>

    <div style="margin-top: 2rem; text-align:center;">
      <a href="wishlist.php?delete_all" class="delete-btn">Delete All</a>
    </div>

  </section>

  <?php include './php/footer.php'; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>

</html>