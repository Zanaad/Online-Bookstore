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


<?php
session_start();
if (!isset($_SESSION['users'])) {
  header("Location: login.php?message=Please log in to access events.");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Evente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet " integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="style2.css" />
  <link rel="stylesheet" href="style1.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  <script>
    function showAlert() {
      alert("Mire se vini ne eventin tone!");
    }
  </script>
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
      <img src="./images/StoryShop.png" alt="Logo" />
      <a href="home.php">LIBRARIA LIVING</a>
    </div>

    <div class="search-container">
      <form action="" class="search">
        <input type="text" class="search-bar" placeholder="Search..." />
        <button class="search-button" type="submit">
          <i class="fas fa-search search-icon"></i>
        </button>
      </form>
    </div>

    <nav class="menu-container">
      <ul>
        <li>
          <a href="#">Libra shqip</a>
          <ul>
            <li><a href="./fantazi.php">Fantazi</a></li>
            <li><a href="./novela.php">Novela</a></li>
            <li><a href="./romance.php">Romancë</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Libra të huaj</a>
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

  <div class="evente" style="margin-top: 60px">
    <video autoplay loop muted plays-inline class="background-clip">
      <source src="./audiot/pexels-videos-1584831-2160p_pcWE9MFZ.mp4" />
    </video>
    <h5 class="head-2">evente</h5>
  </div>
  <div class="content">
    <h6 style="
          font-style: italic;
          margin-top: 50px;
          font-weight: bold;
          font-size: 30px;
        ">
      Past Events
    </h6>
    <video autoplay loop muted plays-inline class="background-clip">
      <source src="./audiot/pexels-tima-miroshnichenko-9568942-2160p_pgYtaWxW (1).mp4" />
    </video>
    <h5 class="head">19 october tuesday 12:00 AM</h5>
    <h5 class="head-1" id="header">"takimet living"</h5>
    <button type="button" class="btn btn-light" id="joinbutton">
      <a href="logIn.php">bashkohu me ne</a>
    </button>
  </div>

  <div class="content">
    <video autoplay loop muted plays-inline class="background-clip">
      <source src="./audiot/pexels-maialen-sanchez-8441891-1080p_YUSVzbBt.mp4" />
    </video>
    <h5 class="head">23 december monday 14:00 PM</h5>
    <h5 class="head-1" id="header">"takim me autorin Fatos Kongoli"</h5>
    <button type="button" class="btn btn-light" id="joinbutton">
      <a href="logIn.php"> bashkohu me ne</a>
    </button>
  </div>

  <div class="content">
    <video autoplay loop muted plays-inline class="background-clip">
      <source src="./audiot/production-id-4860897-2160p-1_iI5iWoTl.mp4" />
    </video>
    <h5 class="head">30 December 13:00 PM</h5>
    <h5 class="head-1" id="header">"Eja dhe festo me ne!!"</h5>
    <button type="button" class="btn btn-light" id="joinbutton">
      <a href="logIn.php"> bashkohu me ne</a>
    </button>
  </div>

  <h6 style="
        font-family: cursive;
        font-weight: bold;
        margin-top: 40px;
        font-size: 30px;
        color: rgb(1, 1, 65);
        font-style: italic;
      ">
    Best Selling Books for this Month
  </h6>
  <div class="card">
    <img src="images/psychology.jpg" class="card-img-top" alt="img" />
    <div class="card-body">
      <p class="card-text" id="pp">the psychology of money</p>
      <button id="button">Animacion</button>
      <audio controls src="./audiot/THE PSYCHOLOGY OF MONEY (BY MORGAN HOUSEL).mp3"></audio>
    </div>
  </div>

  <div class="card">
    <img src="images/1984.png" class="card-img-top" alt="img" />
    <div class="card-body">
      <p class="card-text" id="pp1">1984-george orwell</p>
      <button id="button-1">Slide</button>
      <audio controls src="./audiot/1984 George Orwell Full Book Summary (Full Book in JUST 3 Minutes).mp3"></audio>
    </div>
  </div>
  <div class="card">
    <img src="images/thealchemist.png" class="card-img-top" alt="img" />
    <div class="card-body">
      <p class="card-text" id="pp2">the alchemist</p>
      <button id="button-2">Fade out</button>
      <audio controls src="./audiot/The Alchemist Summary (Full Book in JUST 3 Minutes).mp3"></audio>
    </div>
  </div>

  <table cellspacing="10" cellpadding="20">
    <colgroup>
      <col style="background-color: rgb(231, 231, 231)" />
    </colgroup>
    <thead>
      <tr>
        <th>Titulli</th>
        <th>1984</th>
        <th>The Alchemist</th>
        <th>The psychology of money</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Autori</td>
        <td>George Orwell</td>
        <td>Paulo Coelho</td>
        <td>Morgan Housel</td>
      </tr>
      <tr>
        <td>Cmimi</td>
        <td>
          <h6 id="cmimi" style="display: none"><mark>10€</mark></h6>
          <button id="button-3">Shiko cmimin</button>
        </td>
        <td>
          <h6 id="cmimi-1" style="display: none"><mark>8€</mark></h6>
          <button id="button-4">Shiko cmimin</button>
        </td>
        <td>
          <h6 id="cmimi-2" style="display: none"><mark>18€</mark></h6>
          <button id="button-5">Shiko cmimin</button>
        </td>
      </tr>
      <tr>
        <td>Shtepia Botuese</td>
        <td>Botimet Living</td>
        <td>Shtepia Botuese Dukagjini</td>
        <td>Shtepia Botuese Dukagjini</td>
      </tr>
    </tbody>
  </table>
  <style>
    #duration {
      margin-top: 20px;
    }
  </style>

  <h1 style="font-size: 26px; font-family: cursive; margin-top: 70px">
    Leviz ne anen tjeter librat te cilet i deshiron ti rekomandosh
  </h1>
  <hr />
  <div id="bookList">
    <h3>Lista e librave</h3>
    <div class="book" draggable="true" ondragstart="drag(event)">
      The psychology of money
    </div>
    <div class="book" draggable="true" ondragstart="drag(event)">
      The Alchemist
    </div>
    <div class="book" draggable="true" ondragstart="drag(event)">1984</div>
    <div class="book" draggable="true" ondragstart="drag(event)">Mindset</div>
  </div>

  <div id="recommendationBoard" ondrop="drop(event)" ondragover="allowDrop(event)">
    <h3>Rekomando</h3>
  </div>

  <button id="butoniKohes" onclick="document.getElementById('demo').innerHTML=Date()">
    Shiko sa eshte data dhe ora
  </button>
  <p id="demo"></p>
  <p id="duration">
    Ju keni qendruar ketu per: <span id="timeElapsed">0 seconds</span>
  </p>

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
  <script>
    //animacione
    $(document).ready(function() {
      $("#button").click(function() {
        $("#pp").animate({
            opacity: 0.5,
            width: "50%",
          },
          1000
        );
      });
    });
    //Shiko cmiminup
    $(document).ready(function() {
      $("#button-1").click(function() {
        $("#pp1").slideUp();
      });

      //fadeout
      $(document).ready(function() {
        $("#button-2").click(function() {
          $("#pp2").fadeOut(2000);
        });
      });

      //fadein me callback
      $(document).ready(function() {
        $("#button-3").click(function() {
          $("#cmimi").fadeIn(1000, function() {
            alert("Efekti fadeIn është kryer!");
          });
        });
      });

      $(document).ready(function() {
        $("#button-4").click(function() {
          $("#cmimi-1").fadeIn(1000, function() {
            alert("Efekti fadeIn është kryer!");
          });
        });
      });

      $(document).ready(function() {
        $("#button-5").click(function() {
          $("#cmimi-2").fadeIn(1000, function() {
            alert("Efekti fadeIn është kryer!");
          });
        });
      });
    });

    const Titulliorigjinal = "1984-george orwell";

    function formatojeTitullineLibrit(title) {
      return title.replace(/\b\w/g, (match) => match.toUpperCase());
    }
    const Titulliiformatuar = formatojeTitullineLibrit(Titulliorigjinal);
    document.getElementById("pp1").innerText = Titulliiformatuar;
  </script>
</body>

</html>