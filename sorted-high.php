<?php
$books = array(
 array(
  'id' => 1,
  'title' => 'Orbiting Jupiter',
  'author' => 'Gary Schmidt',
  'price' => '14.00€',
  'image' => './images/Orbiting.png'
 ),
 array(
  'id' => 2,
  'title' => 'The Book Thief',
  'author' => 'Markus Zusak',
  'price' => '13.50€',
  'image' => './images/book_thief.jpg'
 ),
 array(
  'id' => 3,
  'title' => 'The Diary Of A Young Girl',
  'author' => 'Anne Frank',
  'price' => '12.00€',
  'image' => './images/diary.jpg'
 ),
 array(
  'id' => 4,
  'title' => 'The Mountain Is You',
  'author' => 'Brianna Wiest',
  'price' => '11.50€',
  'image' => './images/mountain.png'
 ),
 array(
  'id' => 5,
  'title' => 'Metamorphosis',
  'author' => 'Franz Kafka',
  'price' => '9.80€',
  'image' => './images/metamorphosis.jpg'
 ),
 array(
  'id' => 6,
  'title' => 'The Trial',
  'author' => 'Franz Kafka',
  'price' => '10.40€',
  'image' => './images/trial.png'
 ),
 array(
  'id' => 7,
  'title' => 'The Stranger',
  'author' => 'Albert Camus',
  'price' => '13.50€',
  'image' => './images/Stranger.png'
 ),
 array(
  'id' => 8,
  'title' => 'The Old Man And The Sea',
  'author' => 'Ernest Hemingway',
  'price' => '10.00€',
  'image' => './images/sea.png'
 ),
 array(
  'id' => 9,
  'title' => 'The Setting sun',
  'author' => 'Osamu Dazai',
  'price' => '12.00€',
  'image' => './images/setting_sun.png'
 ),
 array(
  'id' => 10,
  'title' => 'No Longer Human',
  'author' => 'Osamu Dazai',
  'price' => '12.00€',
  'image' => './images/human.png'
 ),
 array(
  'id' => 11,
  'title' => 'To Kill A Mockingbird',
  'author' => 'Harper Lee',
  'price' => '11.60€',
  'image' => './images/mockingbird.png'
 ),
 array(
  'id' => 12,
  'title' => 'The Bell Jar',
  'author' => 'Sylvia Plath',
  'price' => '11.00€',
  'image' => './images/bell_jar.png'
 )
);








?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorted Books</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .book {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 4px;
        }

        .book img {
            max-width: 100px;
            height: auto;
            margin-right: 10px;
            border-radius: 4px;
        }

        .book-details {
            display: flex;
            align-items: center;
        }

        .book-details p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Librat e sortuar nga qmimi me i vogel tek me i madh</h1>
        <?php
        $prices = array_column($books, 'price');

       
        foreach ($prices as &$price) {
            $price = (float) str_replace('€', '', $price);
        }

        
        rsort($prices);

        foreach ($prices as $price) {
            foreach ($books as $key => $book) {
                if ((float) str_replace('€', '', $book['price']) === $price) {
                    echo '<div class="book">';
                    echo '<div class="book-details">';
                    echo '<img src="' . $book['image'] . '" alt="' . $book['title'] . '">';
                    echo '<p><strong>Title:</strong> ' . $book['title'] . '<br>';
                    echo '<strong>Author:</strong> ' . $book['author'] . '<br>';
                    echo '<strong>Price:</strong> ' . $book['price'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    unset($books[$key]);
                    break;
                }
            }
        }
        ?>
    </div>
</body>
</html>
