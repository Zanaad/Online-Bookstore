<?php
include 'validation.php';

$validator = new LoginValidation();

session_start(); 

$logoutMessage = ""; 
if(isset($_SESSION['login_timer']) && $_SESSION['login_timer'] > time()) {
    $validator->setLoggedin("You cannot log in again so soon. Please wait.");
    
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($_SESSION['users'][$email])) {
        $userData = $_SESSION['users'][$email];
        $storedPassword = $userData['password'];

        if ($password === $storedPassword) {
            $validator->setLoggedin("You have logged in successfully");
            $_SESSION['login_timer'] = time() + 30; 
            header("Location: home.php");
            exit();
        } else {
            $validator->setPasswordErr("Incorrect email or password");
        }
    } else {
        $validator->setPasswordErr("User not found. Register!!");
    }
}



if(isset($_POST['logout'])) {
   
    unset($_SESSION['users']);
   
    
    $logoutMessage = "You have been logged out."; 
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="login.css">
    <meta name="robots" content="noindex, follow">
</head>
<body>
    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="signup.php" class="signup-image-link">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Log in</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="your_email" placeholder="Email">
                                <span style="color: red;"><?php echo $validator->getEmailErr(); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password">
                                <span style="color:red"><?php echo $validator->getPasswordErr(); ?></span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term">
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="signin" class="form-submit" value="Log in" style="margin-top: 30px;">
                                <span style="color: green;"><?php echo $validator->getLoggedin(); ?></span>
                                <input type="submit" name="logout" id="signout" class="form-submit" value="Log out" style="margin-top: -150px; margin-top: -80px; margin-left:140px;">
                                <span style="color: red;"><?php echo $logoutMessage; ?></span>
                            </div>
                           
                        </form>
                       
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

