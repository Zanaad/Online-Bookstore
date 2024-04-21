<?php
session_start();

// Kontrollo nëse është dërguar forma për të shtuar librin
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Kontrollo nëse është zgjedhur një file për ngarkim
    if (isset($_FILES["bookfile"]) && !empty($_FILES["bookfile"]["tmp_name"])) {
        // Shto kodin për kontrollin e ekzistencës së direktorisë dhe krijimin e saj nëse nuk ekziston
        $upload_dir = 'uploads/';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true); // Krijoni direktorinë nëse nuk ekziston
        }

        // Ngarkimi i file-it në direktorinë "uploads"
        $target_file = $upload_dir . basename($_FILES["bookfile"]["name"]);
        if (move_uploaded_file($_FILES["bookfile"]["tmp_name"], $target_file)) {
            // Trego mesazhin për ngarkimin e suksesshëm të librit
            echo "The file " . basename($_FILES["bookfile"]["name"]) . " has been uploaded.";

            // Shto kodin për shfaqjen e librit pasi të jetë ngarkuar me sukses
            echo "<br>";
            echo "<a href='$target_file' target='_blank'>View Book</a>";
        } else {
            // Trego mesazhin për gabimin në ngarkim të librit
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // Trego mesazhin nëse nuk është zgjedhur një file për ngarkim
        echo "Please select a file to upload.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="indexi.css">
</head>
<body>

<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <div class="profile-userpic">
                    <form method="POST" enctype="multipart/form-data">
                        <img src="https://static.change.org/profile-img/default-user-profile.svg" class="img-responsive" alt="">
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                        <input type="file" name="bookfile" id="bookFile" class="form-control" style="display: none;">
                        <label for="bookFile" id="fileInputLabel" class="btn btn-info btn-sm">Choose File</label>
                        <div class="profile-userbuttons">
                            <input type="submit" name="submit" class="btn btn-success btn-sm" value="Add Book">
                    </form>
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                    <?php
                    // Shfaq emrin e përdoruesit nëse është i loguar, përndryshe shfaq "Username"
                    if (isset($_SESSION["useruid"])) {
                        echo $_SESSION["username"];
                    } else {
                        echo 'Username';
                    }
                    ?>
                    </div>
                </div>
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="home.php">
                                <i class="glyphicon glyphicon-home"></i>
                                Homepage </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <!-- Forma për vlerësimet dhe komentet -->
            <h2>Vlerësimet dhe komentet</h2>
            <form method="post" action="save_ratings.php">
    <div class="form-group">
        <label for="rating">Vlerësimi:</label>
        <select class="form-control" id="rating" name="rating">
            <option value="5">5 yje</option>
            <option value="4">4 yje</option>
            <option value="3">3 yje</option>
            <option value="2">2 yje</option>
            <option value="1">1 yll</option>
        </select>
    </div>
    <div class="form-group">
        <label for="comment">Komenti:</label>
        <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Dërgo</button>
</form>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#fileInputLabel').click(function() {
            $('#bookFile').click();
        });
    });
</script>

</body>
</html>
