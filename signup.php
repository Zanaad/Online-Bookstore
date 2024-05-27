<?php

include 'db_connect.php';

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);
   $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
   $user_type = $_POST['user_type'];

   if ($password != $cpassword) {
      $message[] = 'Confirm password not matched!';
   } else {
      $salt = bin2hex(random_bytes(16));

      $hashed_password = hash('sha256', $password . $salt);

      $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('Query failed');
      if (mysqli_num_rows($select_users) > 0) {
         $message[] = 'User already exists!';
      } else {
         mysqli_query($conn, "INSERT INTO `users`(name, email, hashPassword, salt, user_type) VALUES('$name', '$email', '$hashed_password', '$salt', '$user_type')") or die('Query failed');
         $message[] = 'Registered successfully!';
         header('location: login.php');
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
      foreach ($message as $message) {
         echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
      }
   }
   ?>

   <div class="form-container">

      <form action="" method="post">
         <h3>Register Now</h3>
         <input type="text" name="name" placeholder="Enter your name" required class="box">
         <input type="email" name="email" placeholder="Enter your email" required class="box">
         <input type="password" name="password" placeholder="Enter your password" required class="box">
         <input type="password" name="cpassword" placeholder="Confirm your password" required class="box">
         <select name="user_type" class="box">
            <option value="user">User</option>
            <option value="admin">Admin</option>
         </select>
         <input type="submit" name="submit" value="Register Now" class="btn">
         <p>Already have an account? <a href="login.php">Login Now</a></p>
      </form>

   </div>

</body>

</html>