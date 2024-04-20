<?php
include 'validation.php';

$validator = new SignupValidation();

session_start(); // Start the session

if (isset($_POST['signup'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $re_pass = $_POST['re_pass'];

  $validator->validateName($name);
  $validator->validateEmail($email);
  $validator->validatePassword($password);
  $validator->validateConfirmPassword($re_pass, $password);

  if (empty($validator->getEmailErr()) && empty($validator->getNameErr()) && empty($validator->getPasswordErr()) && empty($validator->getConfirmPasswordErr())) {
    if (!isset($_SESSION['users'])) {
      $_SESSION['users'] = array();
    }
    $emailExists = false;
    foreach ($_SESSION['users'] as $user) {
      if ($user['email'] === $email) {
        $emailExists = true;
        break;
      }
    }

    if (!$emailExists) {
      $_SESSION['users'][$email] = array(
        'name' => $name,
        'email' => $email,
        'password' => $password
      );

      $validator->setSignedUp("You have signed up successfully");

      echo '<script>
              setTimeout(function(){
                window.location.href = "login.php";
              }, 3000);
            </script>';
    } else {
      $validator->setSignedUp('<span style="color: red;">User already exists</span>');
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up</title>

  <link rel="stylesheet" href="css/material-design-iconic-font.min.css">

  <link rel="stylesheet" href="login.css">
  <meta name="robots" content="noindex, follow">
</head>

<body>
  <div class="main">

    <section class="signup">
      <div class="container">
        <div class="signup-content">
          <div class="signup-form">
            <h2 class="form-title">Sign up</h2>
            <form method="POST" class="register-form" id="register-form">
              <div class="form-group">
                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" name="name" id="name" placeholder="Your Name">
                <span style="color: red;"><?php echo $validator->getNameErr(); ?></span>
              </div>
              <div class="form-group">
                <label for="email"><i class="zmdi zmdi-email"></i></label>
                <input type="email" name="email" id="email" placeholder="Your Email">
                <span style="color: red;"><?php echo $validator->getEmailErr(); ?></span>
              </div>
              <div class="form-group">
                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                <input type="password" name="password" id="pass" placeholder="Password">
                <span style="color:red"><?php echo $validator->getPasswordErr(); ?></span>
              </div>
              <div class="form-group">
                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password">
                <span style="color:red"><?php echo $validator->getConfirmPasswordErr(); ?></span>
              </div>
              <div class="form-group">
                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term">
                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
              </div>
              <div class="form-group form-button">
                <input type="submit" name="signup" id="signup" class="form-submit" value="Register">
                <span style="color: green;"><?php echo $validator->getSignedUp(); ?></span>
              </div>
            </form>
          </div>
          <div class="signup-image">
            <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
            <a href="login.php" class="signup-image-link">I am already member</a>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>

</html>