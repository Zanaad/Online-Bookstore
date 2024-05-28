<?php
// Përcjellja përmes referencës
$link_name = "Libraria";
$subscribe_text = "Enter your email";
$input_placeholder =& $subscribe_text;

// Kthimi përmes referencës
function changeLinkName(&$link_name_ref) {
    $link_name_ref = "Libraria Living";
}

changeLinkName($link_name);

?>
  <footer>
   <div class="content">
    <div class="top">
     <div class="logo-details">
      <i class="fab fa-slack"></i>
      <span class="logo_name"><?php echo $link_name; ?></span>
     </div>
     <div class="media-icons">
      <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
      <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
      <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>

     </div>
    </div>
    <div class="link-boxes">
     <ul class="box">
      <li class="link_name">LIBRARIA DUKAGJINI</li>
      <li><a href="#">Bulevardi Nene Tereza</a></li>
      <li><a href="mailto:bookstore@gmail.com">bookstore@gmail.com</a></li>
      <li><a href="callto:+383 45 647 763">+383 45 647 763</a></li>

     </ul>
     <ul class="box">
      <li class="link_name">Te duhet ndihme</li>
      <li><a href="about.php">Rreth nesh</a></li>
      <li><a href="contact.php">Na kontakto</a></li>
      <li><a href="#">Politikat e privatesise</a></li>
     </ul>


     <ul class="box input-box">
      <li class="link_name">Subscribe</li>
      <li><input type="text" placeholder="<?php echo $input_placeholder; ?>"></li>
     </ul>
    </div>
   </div>
  </footer>
 