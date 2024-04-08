<?php
class LoginValidation
{
 public $emailErr;
 public $emailErr1;
 public $logedin;
 public $passwordErr;

 public function __construct()
 {
  $this->emailErr = "";
  $this->emailErr1 = "";
  $this->logedin = "";
  $this->passwordErr = "";
 }

 public function validateEmail($email)
 {
  if (empty($email)) {
   $this->emailErr = "Please enter your email";
  } elseif (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) {
   $this->emailErr1 = "Email is not valid";
  }
 }

 public function validatePassword($password)
 {
  if (empty($password)) {
   $this->passwordErr = "Please enter your password";
  } else {
   $password = $this->test_input($password);
   if (strlen($password) < 8) {
    $this->passwordErr = "Password must be at least 8 characters long";
   } elseif (!preg_match("/[0-9]/", $password) || !preg_match("/[a-zA-Z]/", $password)) {
    $this->passwordErr = "Password must contain both letters and numbers";
   }
  }
 }

 public function test_input($data)
 {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }

 public function login($email, $password)
 {
  // Your login logic here
 }
}

class SignupValidation extends LoginValidation
{
 public $NameErr;
 public $NameErr1;
 public $confirmPasswordErr;
 public $confirmPasswordErr1;

 public function __construct()
 {
  parent::__construct();
  $this->NameErr = "";
  $this->NameErr1 = "";
  $this->confirmPasswordErr = "";
  $this->confirmPasswordErr1 = "";
 }

 public function validateName($name)
 {
  if (empty($name)) {
   $this->NameErr = "First name is required";
  } else {
   $name = $this->test_input($name);
   if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
    $this->NameErr1 = "Only letters and white space allowed";
   }
  }
 }

 public function validateConfirmPassword($confirmPassword, $password)
 {
  if (empty($confirmPassword)) {
   $this->confirmPasswordErr = "Please confirm your password";
  } elseif ($confirmPassword !== $password) {
   $this->confirmPasswordErr1 = "Passwords do not match";
  }
 }
}
