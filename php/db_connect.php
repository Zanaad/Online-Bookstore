<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bookstore_db";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3307);

if ($conn->connect_error) {
 die("Lidhja dështoi: " . $conn->connect_error);
}
