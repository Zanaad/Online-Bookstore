<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Romancë</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
</head>

<body>
  <?php
  include 'header.php'
  ?>

  <div class="book-cards">
    <?php
    include 'db_connect.php';
    $query = "SELECT * FROM books where genre='Romance'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="book-card">
          <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
          <div class="content">
            <h5><?php echo $row['title']; ?></h5>
            <h6><?php echo $row['author']; ?></h6>
            <h5 class="price"><?php echo $row['price']; ?>€</h5>
            <div class="btn">
              <button>Shto në shportë</button>
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>

</html>