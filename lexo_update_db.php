<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Lidhja dështoi: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $key = $_POST['key'];
    $value = $_POST['value'];

    $sql = "UPDATE books SET some_column='$value' WHERE key_column='$key'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Përditësimi u krye me sukses"]);
    } else {
        echo json_encode(["error" => "Gabim gjatë përditësimit: " . $conn->error]);
    }
}

$conn->close();
?>
