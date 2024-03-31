<?php

$firstname = $lastname = $email = $password = $confirmPassword = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        echo "First name is required";
    } else {
    
    
        if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
            echo "Only letters and white space allowed";
        }
    }
    
  
    if (empty($_POST["lastname"])) {
        echo "Last name is required";
    } else {
        
     
        if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
            echo "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        echo "Email is required";
    }

    
    if (empty($_POST["password"])) {
        echo "Password is required";
    } else {
        $password = $_POST["password"]; 
        if (strlen($password) < 8) {
            echo "Password must be at least 8 characters long";
        }
    }
    
 
    if (empty($_POST["confirmPassword"])) {
        echo "Please confirm your password";
    } else {
       
    $confirmPassword=$_POST['confirmPassword'];
        if ($confirmPassword !== $password) {
            echo "Passwords do not match";
        }
    }

    
    if (!(empty($firstname) && empty($lastname) && empty($email) && empty($password)) && ($confirmPassword == $password)) {
       
        echo "Registration successful!";
        
    }
}
?>
