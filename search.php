<?php
include './php/db_connect.php';

$query = isset($_GET['query']) ? mysqli_real_escape_string($conn, $_GET['query']) : '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Results</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
  <?php include './php/header.php'; ?>

  <div class="search-results-container">
    <h2>Search Results for "<?php echo htmlspecialchars($query); ?>"</h2>
    <div class="book-cards">
      <?php
      if (!empty($query)) {
        // Search query to fetch books matching the search term in title or author
        $search_query = "SELECT * FROM books WHERE title LIKE '%$query%' OR author LIKE '%$query%'";
        $search_result = mysqli_query($conn, $search_query);

        if (mysqli_num_rows($search_result) > 0) {
          while ($row = mysqli_fetch_assoc($search_result)) {
      ?>
            <div class="book-card">
              <!-- Adjust the path to the image here -->
              <img src="./<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
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
          echo "<p>No books found matching your search criteria.</p>";
        }
      } else {
        echo "<p>Please enter a search term.</p>";
      }
      ?>
    </div>
  </div>

  <?php include './php/footer.php'; ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/script.js"></script>
</body>

</html>