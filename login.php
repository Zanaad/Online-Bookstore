<?php
<<<<<<< Updated upstream

include './php/db_connect.php';
session_start();

if (isset($_POST['submit'])) {

   $email = $_POST['email'];
   $password = $_POST['password'];

   // Prepare a statement to fetch user data based on email
   $stmt = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $stmt->bind_param("s", $email);
   $stmt->execute();
   $result = $stmt->get_result();

   if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
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
   $stmt->close();
   $conn->close();
}
=======
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the email address from the POST parameters
    $email = $_POST['email'];

    // Validate the email address
    if (validateEmail($email)) {
        // Redirect to the change password page
        header('Location: changePassword.php?email=' . urlencode($email));
        exit;
    } else {
        // Email is invalid, redirect back to the form with an error message
        $error = 'Invalid email. Please try again.';
        header("Location: verify_email.php?error=" . urlencode($error) . "&email=" . urlencode($email));
        exit;
    }
} else {
    // Invalid request method, redirect back to the form
    header('Location: verify_email.php');
    exit;
}

function validateEmail($email)
{
    // Connect to the database
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "bookstore_db";
>>>>>>> Stashed changes

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the query to validate the email address
    $sql = "SELECT * FROM admin WHERE email_address = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a matching row is found
    if ($result->num_rows > 0) {
        // Email is valid
        $stmt->close();
        $conn->close();
        return true;
    } else {
        // Email is invalid
        $stmt->close();
        $conn->close();
        return false;
    }
}
?>
<<<<<<< Updated upstream

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
         <h3>Login Now</h3>
         <input type="email" name="email" placeholder="Enter your email" required class="box">
         <input type="password" name="password" placeholder="Enter your password" required class="box">
         <input type="submit" name="submit" value="Login Now" class="btn">
         <p>Don't have an account? <a href="signup.php">Register Now</a></p>
      </form>
   </div>

</body>
</html>

=======
>>>>>>> Stashed changes
