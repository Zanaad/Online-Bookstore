<?php
$servername = "mysql";
$username = "user";
$password = "password";
$dbname = "bookstore_db";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
 die("Lidhja dështoi: " . $conn->connect_error);
}
