<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <title>Contact Us</title>
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

      </ul>
    </nav>
  </header>
  <section class="contact-container1">
    <div class="row">
      <div class="col-md-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d93959.44450067711!2d21.06804805661157!3d42.61402187612393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549ee0f97fc09b%3A0x3c4000571c083b34!2sLibraria%20Dukagjini!5e0!3m2!1sen!2s!4v1704639921291!5m2!1sen!2s" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="col-md-6">
        <address>
          <h3>Kontakti</h3>
          <div class="contact-info">
            <span class="address-icon"><i class="fas fa-map-marker-alt"></i></span>
            <div class="info-text">
              <strong>Adresa</strong>
              <br />Rr.Nëna Tereza <br />Prishtinë, Kosovë, 10000
            </div>
          </div>

          <div class="contact-info">
            <span class="address-icon"><i class="fas fa-envelope"></i></span>
            <div class="info-text">
              <strong>Email</strong> <br />
              <a href="mailto:bookstore@gmail.com" id="dergoEmail">bookstore@gmail.com</a>
            </div>
          </div>

          <div class="contact-info">
            <span class="address-icon"><i class="fas fa-phone"></i></span>
            <div class="info-text">
              <strong>Telefoni</strong> <br />
              044 354 560
            </div>
          </div>
        </address>
      </div>
    </div>
    <br />

    <div class="row">
      <div class="contact-container">
        <h2>Contact Us</h2>
        <form method="post" action="contact1.php" id="kontakt-forma">
          <label for="emri">Name:</label>
          <input type="text" id="emri" name="name" required placeholder="Enter your name..." />

          <label for="lastname">Last Name:</label>
          <input type="text" id="lastname" name="lastname" placeholder="Enter your Last name..." />

          <label for="contact-email">Email:</label>
          <input type="text" id="contact-email" name="email" value="@gmail.com" />

          <label for="subject">Subject:</label>
          <input type="text" id="subject" name="subject" placeholder="Enter subject">

          <label for="message">Message:</label>
          <textarea id="message" name="message" placeholder="Enter your message..."></textarea>

          <button type="submit" class="btn-outline-danger">Submit</button>
        </form>
      </div>
    </div>
  </section>

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
  <script src="script.js"></script>
</body>

</html>