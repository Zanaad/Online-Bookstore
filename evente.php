<?php
$a = 1984;
// Krijoni një referencë të variablës $a
$referenceToA = &$a;
// Shtyp vlerën e $a përpara largimit të referencës
echo $a; 
// Largo referencën
unset($referenceToA);
// Shtyp vlerën e $a pas largimit të referencës
echo $a;

function llogarit($numri, $operacion) {
  return $operacion($numri);
}

function dyfisho($x) {
  return $x * 2;
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
</head>

<body>
  <?php
  include './php/header.php'
  ?>

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
        <th><?php echo $a; ?></th>
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
          <h6 id="cmimi" style="display: none"><<?php echo llogarit(5, 'dyfisho'); ?>€</mark></h6>
          <button id="button-3">Shiko cmimin</button>
        </td>
        <td>
          <h6 id="cmimi-1" style="display: none"><mark><<?php echo llogarit(4, 'dyfisho'); ?>€</mark></h6>
          <button id="button-4">Shiko cmimin</button>
        </td>
        <td>
          <h6 id="cmimi-2" style="display: none"><mark><<?php echo llogarit(6, 'dyfisho'); ?>€</mark></h6>
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
    <div class="book" draggable="true" ondragstart="drag(event)"><?php echo $a; ?></div>
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

  <?php
  include './php/footer.php'
  ?>
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