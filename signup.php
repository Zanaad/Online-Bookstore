<?php
include 'db_connect.php';
include 'validation.php';

define("SALT_LENGTH", 16);

$validator = new SignupValidation();

session_start();

function generateSalt($length = SALT_LENGTH)
{
  return bin2hex(random_bytes($length));
}

function saltedHashPassword($password, $salt)
{
  return hash('sha256', $password . $salt);
}

if (isset($_POST['signup'])) {

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, $_POST['password']);
  $cpass = mysqli_real_escape_string($conn, $_POST['re_pass']);

  // Validate the inputs
  $validator->validateName($name);
  $validator->validateEmail($email);
  $validator->validatePassword($pass);
  $validator->validateConfirmPassword($cpass, $pass);

  // If there are no validation errors, proceed
  if (
    empty($validator->getNameErr()) &&
    empty($validator->getEmailErr()) &&
    empty($validator->getPasswordErr()) &&
    empty($validator->getConfirmPasswordErr())
  ) {
    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

    if (mysqli_num_rows($select_users) > 0) {
      $message = 'User already exists!';
    } else {
      $salt = generateSalt();
      $hashedPassword = saltedHashPassword($pass, $salt);
      mysqli_query($conn, "INSERT INTO `users`(name, email, hashPassword, salt) VALUES('$name', '$email', '$hashedPassword','$salt')") or die('query failed');
      $validator->setSignedUp('Registered successfully!');
      header('location:login.php');
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
                <span style="color: red;"><?php echo $message; ?></span>
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