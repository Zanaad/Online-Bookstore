<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['update_wishlist'])) {
  $wishlist_id = $_POST['wishlist_id'];
  $wishlist_quantity = $_POST['wishlist_quantity'];
  mysqli_query($conn, "UPDATE `wishlist` SET quantity = '$wishlist_quantity' WHERE id = '$wishlist_id'") or die('query failed');
  $message[] = 'wishlist quantity updated!';
}

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
  <?php include 'header.php'; ?>

  <div class="heading">
    <h3>Wishlist items</h3>
    <p> <a href="home.php">Home</a> / wishlist </p>
  </div>

  <section class="shopping-wishlist">
    <h1 class="title">Books Added</h1>
    <div class="box-container">
      <?php
      $grand_total = 0;
      $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
      if (mysqli_num_rows($select_wishlist) > 0) {
        while ($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)) {
      ?>
          <div class="box">
            <a href="wishlist.php?delete=<?php echo $fetch_wishlist['id']; ?>" class="fas fa-times" onclick="return confirm('delete this from wishlist?');"></a>
            <img src="<?php echo $fetch_wishlist['image']; ?>" alt="<?php echo $fetch_wishlist['name']; ?>">
            <div class="name"><?php echo $fetch_wishlist['name']; ?></div>
            <div class="price"><?php echo $fetch_wishlist['price']; ?>€</div>
            <form action="" method="post">
              <input type="hidden" name="wishlist_id" value="<?php echo $fetch_wishlist['id']; ?>">
            </form>
          </div>
      <?php
          $grand_total += $sub_total;
        }
      } else {
        echo '<p class="empty">Your wishlist is empty</p>';
      }
      ?>
    </div>

    <div style="margin-top: 2rem; text-align:center;">
      <a href="wishlist.php?delete_all" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>" onclick="return confirm('delete all from wishlist?');">Delete All</a>
    </div>

    <div class="wishlist-total">
      <p>Grand total: <span><?php echo $grand_total; ?>€</span></p>
      <div class="flex">
        <a href="home.php" class="option-btn">Continue Shopping</a>
        <button id="move">Move to bag</button>
      </div>
    </div>
  </section>

  <?php include 'footer.php'; ?>

  <script src="js/script.js"></script>
</body>

</html>