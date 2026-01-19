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
  include './php/header.php'
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
          <input type="text" id="contact-email" name="email" />
          <label for="subject">Subject:</label>
          <input type="text" id="subject" name="subject" placeholder="Enter subject">
          <label for="message">Message:</label>
          <textarea id="message" name="message" placeholder="Enter your message..."></textarea>
          <button type="submit" class="btn-outline-danger">Submit</button>
        </form>
      </div>
    </div>
  </section>

  <?php
  include './php/footer.php'
  ?>

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