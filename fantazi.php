?>

<?php
if(isset($_COOKIE['color'])) {
    $color = $_COOKIE['color'];
} else {
    $colors = array('#055e1a', '#5e0532','#3c0878','#5e0532');
    $color = $colors[array_rand($colors)];
}
$colors = array('#055e1a', '#5e0532','#3c0878','#5e0532');
$newColor = $colors[array_rand($colors)];
setcookie('color', $newColor, time() + 5); 
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fantazi</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <script>
        
        setTimeout(function(){
            window.location.reload(1);
        }, 5000); 
    </script>

</head>
<style>
        .search-button ,.btn button , footer {
            background-color: <?php echo $color; ?>;
          
        }
    </style>
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
    <div class="book-card">
      <img src="./images/Marsiani.png" alt="" />
      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Marsiani">
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
        <h5>Marsiani</h5>
        <h6>Andy Weir</h6>
        <h5 class="price">16.00€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/hp1.jpg" alt="" />

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Harry-Potter1">
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
        <h5>Harry Potter 1</h5>
        <h6>Joanne Rowling</h6>
        <h5 class="price">12.50€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/hp2.jpg" alt="" />

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Harry-Potter2">
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
        <h5>Harry Potter 2</h5>
        <h6>Joanne Rowling</h6>
        <h5 class="price">13.00€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/hp3.jpg" alt="" />

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Harry-Potter3">
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
        <h5>Harry Potter 3</h5>
        <h6>Joanne Rowling</h6>
        <h5 class="price">13.50€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/hp4.jpg" alt="" />

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Harry-Potter4">
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
        <h5>Harry Potter 4</h5>
        <h6>Joanne Rowling</h6>
        <h5 class="price">13.00€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/hp5.jpg" alt="" />

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Harry-Potter5">
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
        <h5>Harry Potter 5</h5>
        <h6>Joanne Rowling</h6>
        <h5 class="price">13.00€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>
    <div class="book-card">
      <img src="./images/hp6.jpg" alt="" />

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Harry-Potter6">
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
        <h5>Harry Potter 6</h5>
        <h6>Joanne Rowling</h6>
        <h5 class="price">12.50€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/hp7.jpg" alt="" />

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Harry-Potter7">
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
        <h5>Harry Potter 7</h5>
        <h6>Joanne Rowling</h6>
        <h5 class="price">12.00€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>
    <div class="book-card">
      <img src="./images/eragon.png" alt="" />

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Eragon">
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
        <h5>Eragon</h5>
        <h6>Christopher Paulini</h6>
        <h5 class="price">14.00€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/hobbit.png" alt="" />

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Hobbit">
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
        <h5>Hobbit</h5>
        <h6>J. K. R Tolklen</h6>
        <h5 class="price">11.50€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/divergjentja.png" alt="" />

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Divergjentja">
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
        <h5>Divergjentja</h5>
        <h6>Veronica Roth</h6>
        <h5 class="price">10.60€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>
    <div class="book-card">
      <img src="./images/besnikja.png" alt="" />

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Besnikja">
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
        <h5>Besnikja</h5>
        <h6>Veronica Roth</h6>
        <h5 class="price">11.00€</h5>
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