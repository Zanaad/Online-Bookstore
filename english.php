<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>English</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
  <?php include './php/header.php'; ?>

  <div class="container" style="margin-top: 110px;">
    <select id="sort" class="form-select" onchange="sortBooks()">
      <option value="none">Default</option>
      <option value="title_asc">Title (A-Z)</option>
      <option value="title_desc">Title (Z-A)</option>
      <option value="price_asc">Price (Low to High)</option>
      <option value="price_desc">Price (High to Low)</option>
    </select>
  </div>

  <div class="book-cards">
    <?php
    include './php/db_connect.php';

    $sort_option = isset($_GET['sort']) ? $_GET['sort'] : 'none';
    $order_by = '';

    switch ($sort_option) {
      case 'title_asc':
        $order_by = 'title ASC';
        break;
      case 'title_desc':
        $order_by = 'title DESC';
        break;
      case 'price_asc':
        $order_by = 'price ASC';
        break;
      case 'price_desc':
        $order_by = 'price DESC';
        break;
      default:
        $order_by = '';
    }


    $query = "SELECT * FROM books WHERE genre='English'";
    if ($order_by) {
      $query .= " ORDER BY $order_by";
    }

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="book-card">
          <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
          <div class="content">
            <div class="star-heart">
              <div class="stars" id="<?php echo str_replace(' ', '-', $row['title']); ?>">
                <i class="far fa-star" data-value="1"></i>
                <i class="far fa-star" data-value="2"></i>
                <i class="far fa-star" data-value="3"></i>
                <i class="far fa-star" data-value="4"></i>
                <i class="far fa-star" data-value="5"></i>
              </div>
              <button class="add-to-wishlist btn btn-outline-danger" data-id="<?php echo $row['id']; ?>">
                <i class="fas fa-heart"></i>
              </button>
            </div>
            <h5><?php echo $row['title']; ?></h5>
            <h6><?php echo $row['author']; ?></h6>
            <h5 class="price"><?php echo $row['price']; ?>€</h5>
            <div class="btn">
              <button class="add-to-cart" data-id="<?php echo $row['id']; ?>">Add to Cart</button>
            </div>
          </div>
        </div>
    <?php
      }
    } else {
      echo "No books found";
    }
    ?>
  </div>

  <?php include './php/footer.php'; ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>

  <script>
    function sortBooks() {
      const sort = document.getElementById('sort').value;
      window.location.href = `?sort=${sort}`;
    }

    // Set the selected option based on the current sort parameter
    const urlParams = new URLSearchParams(window.location.search);
    const currentSort = urlParams.get('sort');
    if (currentSort) {
      document.getElementById('sort').value = currentSort;
    }
  </script>

</body>

</html>