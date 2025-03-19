<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "bookstore_db"; 

$conn = new mysqli($localhost, $root, $, $dbname);


if ($conn->connect_error) {
    die("Lidhja dështoi: " . $conn->connect_error);
}


$sql = "SELECT * FROM books";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
    $books = array();
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
    echo json_encode($books);
} else {
    echo "Nuk u gjetën rezultate";
}


$conn->close();
?>
