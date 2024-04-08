<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Librat Frengjisht</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="checkout.css">
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
        <li><a href="#">My account</a><span class="far fa-user" style="font-size: 20px;"></span>
          <ul class="account-content">
            <li><a href="signup.php" id="signup-btn">Sign Up</a></li>
            <li role="presentation">
              <hr>
            </li>
            <li><a href="login.php" id="login-btn">Log in</a></li>
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
                <a href="cart.php"><button>View Bag</button></a>
                <button onclick="openForm()">Checkout</button>
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

  <div id="bigDiv" style=" z-index: 6000;">
    <div class="form-popup" id="myForm" style="border-radius: 15px;">
      <form action="" class="form-container" onsubmit="return validation(); changeBackground();">
        <h4>Contact information</h4>
        <input type="email" id="checkout-email" placeholder="Email" name="email">
        <h4>Shipping address</h4>
        <input type="text" id="checkout-name" placeholder="Name" name="name">
        <input type="text" id="checkout-surname" placeholder="Surname" name="surname">
        <input type="text" id="adress" placeholder="Adress" name="Adress">
        <input type="text" id="pcode" placeholder="Postal Code" name="Postal Code">
        <input type="text" id="_city" placeholder="City" name="city">
        <select id="mySelect" onchange="change_placeholder(this)">
          <option value="">Select your country...</option>
          <option value="Albania">Albania</option>
          <option value="Kosovo">Kosovo</option>
          <option value="Montenegro">Montenegro</option>
          <option value="North Macedonia">North Macedonia</option>
          <option value="Serbia">Serbia</option>
        </select>
        <input type="tel" id="phone" name="phone" placeholder="Phone number" style="margin-top: 10px;">
        <input type="checkbox">
        <p style="color:#201c1c">Save this information for next time</p>
        </br>
        <button type="submit" class="btn" onclick="return validation() ">Submit</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </form>
    </div>
  </div>

  <div class="book-cards">
    <div class="book-card">
      <img src="./images/Etranger.png" alt="">
      <div class="content">
        <div class="star-heart">
          <div class="stars" id="L'Etranger">
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
        <h5>L'Etranger</h5>
        <h6>Albert Camus</h6>
        <h5 class="price">16.00€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/plague.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="La-Peste">
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

        <h5>La Peste</h5>
        <h6>Albert Camus</h6>
        <h5 class="price">11.80€</h5>

        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/PereGoriot.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Pere-Goriot">
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
        <h5>Pere Goriot</h5>
        <h6>Honore De Balzac</h6>
        <h5 class="price">14.50€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/Eugene.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Eugenie-Grandet">
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
        <h5>Eugenie Grandet</h5>
        <h6>Honore De Balzac</h5>
          <h5 class="price">12.00€</h5>
          <div class="btn">
            <button>Shto në shportë</button>
          </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/miserables.jpg" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Les-Miserables">
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
        <h5>Les Miserables</h5>
        <h6>Victor Hugo</h6>
        <h5 class="price">14.60€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/NotreDame.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Notre-Dame-De-Paris">
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
        <h5>Notre-Dame De Paris</h5>
        <h6>Victor Hugo</h6>
        <h5 class="price">16.50€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/fleurs.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Les-Fleurs-Du-Mal">
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
        <h5>Les Fleurs Du Mal</h5>
        <h6>Charles Baudelaire</h6>
        <h5 class="price">12.80€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/Splin.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Le-Spleen-de-Paris">
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
        <h5>Le Spleen de Paris</h5>
        <h6>Charles Baudelaire</h6>
        <h5 class="price">12.80€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/FilleMaudite.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="La-Fille-Maudite">
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
        <h5>La Fille Maudite</h5>
        <h6>Emile Richebourg</h6>
        <h5 class="price">14.00€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/ensemble.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Ensemble,c'est-tout">
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
        <h5>Ensemble, c'est tout</h5>
        <h6>Anna Gavalda</h6>
        <h5 class="price">11.90€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>

    <div class="book-card">
      <img src="./images/bovary.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Madame-Bovary">
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
        <h5>Madame Bovary</h5>
        <h6>Gustave Flaubert</h6>
        <h5 class="price">13.70€</h5>
        <div class="btn">
          <button>Shto në shportë</button>
        </div>
      </div>
    </div>
    <div class="book-card">
      <img src="./images/PetitePrince.png" alt="">

      <div class="content">
        <div class="star-heart">
          <div class="stars" id="Le-Petite-Prince">
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
        <h5>Le Petite Prince</h5>
        <h6>Antoine de Saint</h6>
        <h5 class="price">12.60€</h5>
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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="script.js"></script>
  <script src="checkout.js"></script>

</body>

</html>