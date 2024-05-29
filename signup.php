<?php

include './php/db_connect.php';
include './php/validation.php';

$validation = new SignupValidation();

if (isset($_POST['submit'])) {
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);
   $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

   // Validate inputs
   $validation->validateName($name);
   $validation->validateEmail($email);
   $validation->validatePassword($password);
   $validation->validateConfirmPassword($cpassword, $password);

   $nameErr = $validation->getNameErr();
   $emailErr = $validation->getEmailErr();
   $passwordErr = $validation->getPasswordErr();
   $confirmPasswordErr = $validation->getConfirmPasswordErr();

   if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
      if ($password != $cpassword) {
         $message[] = 'Confirm password not matched!';
      } else {
         $salt = bin2hex(random_bytes(16));
         $hashed_password = hash('sha256', $password . $salt);

         $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('Query failed');
         if (mysqli_num_rows($select_users) > 0) {
            $message[] = 'User already exists!';
         } else {
            mysqli_query($conn, "INSERT INTO `users`(name, email, hashPassword, salt) VALUES('$name', '$email', '$hashed_password', '$salt')") or die('Query failed');
            $message[] = 'Registered successfully!';
            header('location: login.php');
         }
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php
   if (isset($message)) {
      foreach ($message as $msg) {
         echo '
         <div class="message">
            <span>' . $msg . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
   ?>

   <div class="form-container">

      <form action="" method="post">
         <h3>Register Now</h3>
         <input type="text" name="name" placeholder="Enter your name" required class="box" value="<?= isset($name) ? htmlspecialchars($name) : '' ?>">
         <span class="error"><?= isset($nameErr) ? $nameErr : '' ?></span>
         <input type="email" name="email" placeholder="Enter your email" required class="box" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
         <span class="error"><?= isset($emailErr) ? $emailErr : '' ?></span>
         <input type="password" name="password" placeholder="Enter your password" required class="box">
         <span class="error"><?= isset($passwordErr) ? $passwordErr : '' ?></span>
         <input type="password" name="cpassword" placeholder="Confirm your password" required class="box">
         <span class="error"><?= isset($confirmPasswordErr) ? $confirmPasswordErr : '' ?></span>
         <input type="submit" name="submit" value="Register Now" class="btn">
         <p>Already have an account? <a href="login.php">Login Now</a></p>
      </form>

   </div>

</body>

</html>