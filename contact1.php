<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 $name = $_POST["name"];
 $email = $_POST["email"];
 $message = $_POST["message"];


 if (empty($name) || empty($email) || empty($message)) {
  echo "Mbushni te gjitha fushat";
 } else {

  $to = "?";
  $subject = "Form Submission";
  $body = "Emri: $name\nEmail: $email\nMesazhi:\n$message";

  if (mail($to, $subject, $body)) {
   echo "Ju faleminderit!Mesazhi i juaj u dergua.";
  } else {
   echo "Mesazhi i juaj nuk u dergua me sukses";
  }
 }
}

?>
