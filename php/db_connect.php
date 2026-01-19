<?php
$servername = getenv('MYSQL_HOST') ?: 'mysql';
$username   = getenv('MYSQL_USER');
$password   = getenv('MYSQL_PASSWORD');
$dbname     = getenv('MYSQL_DATABASE');

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
 die("Lidhja dështoi: " . mysqli_connect_error());
}
