<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 $name = $_POST["name"];
 $email = $_POST["email"];
 $message = $_POST["message"];


 if (empty($name) || empty($email) || empty($message)) {
  echo "Please fill in all fields.";
 } else {

  $to = "zanaademi4@gmail.com";
  $subject = "New Contact Form Submission";
  $body = "Name: $name\nEmail: $email\nMessage:\n$message";

  if (mail($to, $subject, $body)) {
   echo "Thank you! Your message has been sent.";
  } else {
   echo "Sorry, there was an error sending your message. Please try again later.";
  }
 }
}
