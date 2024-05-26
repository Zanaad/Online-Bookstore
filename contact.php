<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <title>Contact Us</title>
</head>

<body>
  <?php
  include 'header.php'
  ?>
  <section class="contact-container1">
    <div class="row">
      <div class="col-md-6">
        <div id="map" style="height: 400px;"></div>
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

  <script>
    var map = L.map('map').setView([42.61402187612393, 21.06804805661157], 15);


    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
    }).addTo(map);

    var marker = L.marker([42.61402187612393, 21.06804805661157]).addTo(map);

    marker.bindPopup("<b>Libraria Living</b><br>Rr.Nëna Tereza, Prishtinë, Kosovë").openPopup();
  </script>

</body>

</html>