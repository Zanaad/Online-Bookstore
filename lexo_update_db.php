
<?php
$key = $_POST['key'];


$response = array(
    'status' => 'success',
    'message' => 'Data successfully processed',
);

 echo json_encode($response);
?>
