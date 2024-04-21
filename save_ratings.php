<?php
session_start();

// Kontrollo nëse është dërguar forma për të ruajtur vlerësimet dhe komentet
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Marrja e të dhënave nga formulari
    $rating = $_POST["rating"];
    $comment = $_POST["comment"];

    // Krijimi i një matrice për të ruajtur vlerësimet dhe komentet në një strukturë të rregullt
    $newRating = array(
        "rating" => $rating,
        "comment" => $comment
    );

    // Shtimi i vlerësimeve dhe komenteve të reja në një skedar të veçantë për të ruajtur të dhënat
    $file = 'ratings.json';
    $ratings = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    $ratings[] = $newRating;
    file_put_contents($file, json_encode($ratings));

    // Përgjigja për përdoruesin
    echo "Vlerësimi dhe komenti u ruajtën me sukses!";
} else {
    // Nëse kërkesa nuk është POST, ridrejto përdoruesin në faqen e duhur
    header("Location: homepage.php");
    exit;
}
?>
