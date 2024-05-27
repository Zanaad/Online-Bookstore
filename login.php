<?php

include 'db_connect.php';
session_start();

if (isset($_POST['submit'])) {

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);

   // Fetch user data based on email
  // $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('Query failed');
$stmt=$conn->prepare("SELECT * FROM 'users' WHERE EMAIL = ?");
$stmt->bind_param('s', $email);
$stmt->execute();
$result=$stmt->get_result();
if($result->num_rows>0){
   $row=$result->fetch_assoc();
}
  // if (mysqli_num_rows($select_users) > 0) {
    //  $row = mysqli_fetch_assoc($select_users);
      // Extract the salt and hashed password from the fetched user data
      $salt = $row['salt'];
      $hashed_password = $row['hashPassword'];

      // Combine the entered password with the retrieved salt, then hash it
      $entered_password_hashed = hash('sha256', $password . $salt);

      // Check if the hashed entered password matches the stored hashed password
      if ($entered_password_hashed === $hashed_password) {
         // Passwords match, proceed with login
         if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_id'] = $row['id'];
            header('location:admin_page.php');
         } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            header('location:home.php');
         }
      } else {
         $message[] = 'Incorrect email or password!';
      }
   } else {
      $message[] = 'User not found!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

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
         <h3>Login Now</h3>
         <input type="email" name="email" placeholder="Enter your email" required class="box">
         <input type="password" name="password" placeholder="Enter your password" required class="box">
         <input type="submit" name="submit" value="Login Now" class="btn">
         <p>Don't have an account? <a href="signup.php">Register Now</a></p>
      </form>

   </div>

</body>

</html>
