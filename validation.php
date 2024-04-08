<?php
class LoginValidation
{
 protected $emailErr;
 private $loggedin;
 protected $passwordErr;

 public function __construct()
 {
  $this->emailErr = "";
  $this->loggedin = "";
  $this->passwordErr = "";
 }
 public function setEmailErr($EmailErr)
 {
  $this->emailErr = $EmailErr;
 }

 public function setPasswordErr($PasswordErr)
 {
  $this->passwordErr = $PasswordErr;
 }
 public function setLoggedin($loggedin)
 {
  $this->loggedin = $loggedin;
 }
 public function getEmailErr()
 {
  return $this->emailErr;
 }
 public function getPasswordErr()
 {
  return $this->passwordErr;
 }
 public function getLoggedin()
 {
  return $this->loggedin;
 }
 public function validateEmail($email)
 {
  if (empty($email)) {
   $this->emailErr = "Please enter your email";
  } elseif (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) {
   $this->emailErr = "Email is not valid";
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
   } else if (preg_match("/[\s]/", $password)) {
    $this->passwordErr = "Password must not have white spaces";
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

 private function login($email, $password)
 {
  // shikohet ne databaze dhe logohet 
  //Ne fazen e dyte
 }
}

class SignupValidation extends LoginValidation
{
 protected $NameErr;
 protected $confirmPasswordErr;
 private $signedup;

 public function __construct()
 {
  parent::__construct();
  $this->NameErr = "";
  $this->confirmPasswordErr = "";
 }
 public function setNameErr($NameErr)
 {
  $this->NameErr = $NameErr;
 }
 public function setConfirmPasswordErr($confirmPasswordErr)
 {
  $this->confirmPasswordErr = $confirmPasswordErr;
 }
 public function setSignedUp($signedup)
 {
  $this->signedup = $signedup;
 }
 public function getNameErr()
 {
  return $this->NameErr;
 }
 public function getConfirmPasswordErr()
 {
  return $this->confirmPasswordErr;
 }
 public function getSignedUp()
 {
  return $this->signedup;
 }
 public function validateName($name)
 {
  if (empty($name)) {
   $this->NameErr = "First name is required";
  } else {
   $name = $this->test_input($name);
   if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
    $this->NameErr = "Only letters and white space allowed";
   }
  }
 }

 public function validateConfirmPassword($confirmPassword, $password)
 {
  if (empty($confirmPassword)) {
   $this->confirmPasswordErr = "Please confirm your password";
  } elseif ($confirmPassword !== $password) {
   $this->confirmPasswordErr = "Passwords do not match";
  }
 }
 private function signup($name, $email, $password)
 {
  //regjistrimi ne databaze
 }
}

class CheckoutValidation extends SignupValidation
{
 private $addressErr;
 private $cityErr;
 private $phoneErr;
 private $postalCodeErr;
 private $Order;

 public function __construct()
 {
  parent::__construct();
  $this->addressErr = "";
  $this->cityErr = "";
  $this->phoneErr = "";
  $this->postalCodeErr = "";
 }
 public function getAddressErr()
 {
  return $this->addressErr;
 }
 public function getCityErr()
 {
  return $this->cityErr;
 }
 public function getPhoneErr()
 {
  return $this->phoneErr;
 }
 public function getPCodeErr()
 {
  return $this->postalCodeErr;
 }
 public function setOrder($order)
 {
  $this->Order = $order;
 }
 public function getOrder()
 {
  return $this->Order;
 }
 public function validateNameSurname($name, $surname)
 {
  if (empty($surname) || empty($name)) {
   $this->NameErr = "Name and surname are required";
  } else {
   $surname = $this->test_input($surname);
   $name = $this->test_input($name);
   if (!preg_match("/^[a-zA-Z ]*$/", $surname)) {
    $this->NameErr = "Only letters and white space allowed";
   }
  }
 }
 public function validateCity($city)
 {
  if (empty($city)) {
   $this->cityErr = "City is required";
  } else {
   $city = $this->test_input($city);
   if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
    $this->cityErr = "Only letters and white space allowed";
   }
  }
 }
 public function validateAddress($address)
 {
  if (empty($address)) {
   $this->addressErr = "Address is required";
  } else {
   $address = $this->test_input($address);
   if (!preg_match("/^[a-zA-Z ]*$/", $address)) {
    $this->addressErr = "Only letters and white space allowed";
   }
  }
 }
 public function validatePhoneNumber($phoneNumber)
 {
  if (empty($phoneNumber)) {
   $this->phoneErr = "Phone number is required";
  } else {
   $phoneNumber = preg_replace('/\D/', '', $phoneNumber);
   if (strlen($phoneNumber) < 10) {
    $this->phoneErr = "Phone Number must be at least 10 digits";
   }
  }
 }


 public function validatePostalCode($postalCode)
 {
  if (empty($postalCode)) {
   $this->postalCodeErr = "Postal code is required";
  } else {
   $postalCode = str_replace(' ', '', $postalCode);
   if (strlen($postalCode) < 3) {
    $this->postalCodeErr = "Postal Code must be at least 3 digits";
   }
  }
 }
}
