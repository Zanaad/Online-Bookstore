<?php
include('book_data.php');

function searchBook($books, $title)
{
  foreach ($books as $book) {
    if ($book['title'] == $title) {
      return $book;
    }
  }
  return null;
}

if (isset($_GET['search'])) {
  $searchTerm = $_GET['search'];
  $foundBook = searchBook($books, $searchTerm);
  if ($foundBook) {
    echo "<div class='book-card'>";
    echo "<div class='content'>";
    echo "<h5>" . $foundBook['title'] . "</h5>";
    echo "<h6>" . $foundBook['author'] . "</h6>";
    echo "<h5 class='price'>" . $foundBook['price'] . "</h5>";
    echo "</div>";
    echo "</div>";
  } else {
    echo "Book not found";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Librat Turqisht</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
  <header class="container-fluid header-container">

    <div class="logo">
      <img src="./images/StoryShop.png" alt="Logo">
      <a href="home.php">LIBRARIA LIVING</a>
    </div>

    <div class="search-container">
      <form action="" class="search">
        <input type="text" class="search-bar" placeholder="Search...">
        <button class="search-button" type="submit"> <i class="fas fa-search search-icon"></i></button>
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
        <li><a href="#">
            <?php
            session_start();
            if (isset($_SESSION['user_name'])) {
              echo $_SESSION['user_name'];
            } else {
              echo "My account";
            }
            ?>
          </a><span class="far fa-user" style="font-size: 20px; <?php echo isset($_COOKIE['logged_in']) ? 'color: darkblue;' : ''; ?>"></span>
          <ul class="account-content">
            <?php if (isset($_SESSION['user_name'])) : ?>
              <li><a href="logout.php">Log Out</a></li>
            <?php else : ?>
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


        <div class="cart-box">
          <div class="dropdown-cart">
            <button class="cart-toggle-btn">
              <i class="fas fa-shopping-cart"></i>
              <span class="cart-count">0</span>
            </button>
            <div class="cart-window">
              <div class="cart-items">
              </div>
              <div class="cart-total">
                <p>Total: <span id="cart-total-price">0€</span></p>
              </div>
              <div class="cart-footer">
                <a href="login.php"><button>View Bag</button></a>
                <a href="./checkout.php"><button>Checkout</button></a>
              </div>
            </div>
          </div>
        </div>
        <div class="cart-box-1">
          <div class="dropdown-cart-1">
            <button class="cart-toggle-btn-1">
              <i class="fas fa-heart"></i>
              <span class="cart-count-1">0</span>
            </button>
            <div class="cart-window-1">
              <div class="cart-items-1">
              </div>
              <div class="wishlist-footer">
                <a href="wishlist.php"><button>View</button></a>
                <button id="move">Move to Bag</button>
              </div>
            </div>
          </div>
        </div>
      </ul>
    </nav>
  </header>


  <div class="book-cards">
    <!-- <a href="singlePage.php?book_id=1" class="single-page"> -->
    <div class="book-card">
      <img src="./images/yagmur.png" alt="">
      <div class="content">
        <div class="star-heart">
          <div class="stars" id="BirazYagmurKimseyiIncitmez">
            <i class="far fa-star" data-value="1"></i>
            <i class="far fa-star" data-value="2"></i>
            <i class="far fa-star" data-value="3"></i>
            <i class="far fa-star" data-value="4"></i>
            <i class="far fa-star" data-value="5"></i>
          </div>
          <button class="btn btn-outline-danger">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <h5>Biraz Yagmur Kimseyi Incitmez</h5>
        <h6>Kemal Sayar</h6>
        <h5 class="price">12.00€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>
    <!-- </a> -->
    <!-- <a href="singlePage.php?book_id=2" class="single-page"> -->
    <div class="book-card">
      <img src="./images/labirent.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Ruhun-Labirentleri">
            <i class="far fa-star" data-value="1"></i>
            <i class="far fa-star" data-value="2"></i>
            <i class="far fa-star" data-value="3"></i>
            <i class="far fa-star" data-value="4"></i>
            <i class="far fa-star" data-value="5"></i>
          </div>
          <button class="btn btn-outline-danger">
            <i class="fas fa-heart"></i>
          </button>
        </div>

        <h5>Ruhun Labirentleri</h5>
        <h6>Kemal Sayar</h6>
        <h5 class="price">12.50€</h5>

        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>
    <!-- </a> -->

    <div class="book-card">
      <img src="./images/hayat.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Hayatin-anlami-var-mi?">
            <i class="far fa-star" data-value="1"></i>
            <i class="far fa-star" data-value="2"></i>
            <i class="far fa-star" data-value="3"></i>
            <i class="far fa-star" data-value="4"></i>
            <i class="far fa-star" data-value="5"></i>
          </div>
          <button class="btn btn-outline-danger">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <h5>Hayatin anlami var mi?</h5>
        <h6>Erol Goka</h6>
        <h5 class="price">11.80€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/gercek.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Gerçek-insanin-yuzunde-yazar-mi?">
            <i class="far fa-star" data-value="1"></i>
            <i class="far fa-star" data-value="2"></i>
            <i class="far fa-star" data-value="3"></i>
            <i class="far fa-star" data-value="4"></i>
            <i class="far fa-star" data-value="5"></i>
          </div>
          <button class="btn btn-outline-danger">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <h5>Gerçek insanin yuzunde yazar mi?</h5>
        <h6>Erol Goka&Murat</h5>
          <h5 class="price">12.50€</h5>
          <div class="btn">
            <button>Shto në shportë</button>
          </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/mesnevi.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Mesnevi-Terapi">
            <i class="far fa-star" data-value="1"></i>
            <i class="far fa-star" data-value="2"></i>
            <i class="far fa-star" data-value="3"></i>
            <i class="far fa-star" data-value="4"></i>
            <i class="far fa-star" data-value="5"></i>
          </div>
          <button class="btn btn-outline-danger">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <h5>Mesnevi Terapi</h5>
        <h6>Nevzat Tarhan</h6>
        <h5 class="price">14.30€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/kirmizi.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Benim-Adim-Kirmizi">
            <i class="far fa-star" data-value="1"></i>
            <i class="far fa-star" data-value="2"></i>
            <i class="far fa-star" data-value="3"></i>
            <i class="far fa-star" data-value="4"></i>
            <i class="far fa-star" data-value="5"></i>
          </div>
          <button class="btn btn-outline-danger">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <h5>Benim Adim Kirmizi</h5>
        <h6>Orhan Pamuk</h6>
        <h5 class="price">13.40€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/KaraKitap.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Kara-Kitap">
            <i class="far fa-star"></i>
            <i class="far fa-star" data-value="1"></i>
            <i class="far fa-star" data-value="2"></i>
            <i class="far fa-star" data-value="3"></i>
            <i class="far fa-star" data-value="4"></i>
            <i class="far fa-star" data-value="5"></i>
          </div>
          <button class="btn btn-outline-danger">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <h5>Kara Kitap</h5>
        <h6>Orhan Pamuk</h6>
        <h5 class="price">12.80€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/ince.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Ince-Memed">
            <i class="far fa-star" data-value="1"></i>
            <i class="far fa-star" data-value="2"></i>
            <i class="far fa-star" data-value="3"></i>
            <i class="far fa-star" data-value="4"></i>
            <i class="far fa-star" data-value="5"></i>
          </div>
          <button class="btn btn-outline-danger">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <h5>Ince Memed</h5>
        <h6>Yasar Kemal</h6>
        <h5 class="price">12.70€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/yusuf.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Kuyucakli-Yusuf">
            <i class="far fa-star" data-value="1"></i>
            <i class="far fa-star" data-value="2"></i>
            <i class="far fa-star" data-value="3"></i>
            <i class="far fa-star" data-value="4"></i>
            <i class="far fa-star" data-value="5"></i>
          </div>
          <button class="btn btn-outline-danger">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <h5>Kuyucakli Yusuf</h5>
        <h6>Sabahattin Ali</h6>
        <h5 class="price">14.90€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/korku.jpg" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Korkuyu-Beklerken">
            <i class="far fa-star" data-value="1"></i>
            <i class="far fa-star" data-value="2"></i>
            <i class="far fa-star" data-value="3"></i>
            <i class="far fa-star" data-value="4"></i>
            <i class="far fa-star" data-value="5"></i>
          </div>
          <button class="btn btn-outline-danger">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <h5>Korkuyu Beklerken</h5>
        <h6>Oguz Atay</h6>
        <h5 class="price">11.30€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/last.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Istanbul'a-Son-Tren">
            <i class="far fa-star" data-value="1"></i>
            <i class="far fa-star" data-value="2"></i>
            <i class="far fa-star" data-value="3"></i>
            <i class="far fa-star" data-value="4"></i>
            <i class="far fa-star" data-value="5"></i>
          </div>
          <button class="btn btn-outline-danger">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <h5>Istanbul'a Son Tren</h5>
        <h6>Ayse Kulin</h6>
        <h5 class="price">13.50€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/aylak.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Aylak-Adam">
            <i class="far fa-star" data-value="1"></i>
            <i class="far fa-star" data-value="2"></i>
            <i class="far fa-star" data-value="3"></i>
            <i class="far fa-star" data-value="4"></i>
            <i class="far fa-star" data-value="5"></i>
          </div>
          <button class="btn btn-outline-danger">
            <i class="fas fa-heart"></i>
          </button>
        </div>
        <h5>Aylak Adam</h5>
        <h6>Yusuf Atilgan</h6>
        <h5 class="price">9.80€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
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
          <li><a href="mailto:bookstore@gmail.com">bookstore@gmail.com</a></li>
          <li><a href="callto:+383 45 647 763">+383 45 647 763</a></li>

        </ul>
        <ul class="box">
          <li class="link_name">Te duhet ndihme</li>
          <li><a href="about.php">Rreth nesh</a></li>
          <li><a href="contact.php">Na kontakto</a></li>
          <li class="link_name">Kontakto <abbr title="Kontakto sherbimin e konsumatorit">SHEK</abbr></li>
        </ul>

        <ul class="box input-box">
          <li class="link_name">Subscribe</li>
          <li><input type="text" placeholder="Enter your email"></li>
        </ul>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>

</html>