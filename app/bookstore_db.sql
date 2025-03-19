CREATE TABLE `users` (
  `id` int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hashPassword` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL
);

CREATE TABLE `books`(
   `id` int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price`int NOT NULL,
  `image` varchar(255) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `average_rating` FLOAT DEFAULT 0
);
CREATE TABLE `cart` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(100) NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  FOREIGN KEY (`book_id`) REFERENCES `books`(`id`)
);

  CREATE TABLE `wishlist` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int NOT NULL,
   `quantity` int NOT NULL,
  `image` varchar(100) NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  FOREIGN KEY (`book_id`) REFERENCES `books`(`id`)
);

CREATE TABLE book_ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT,
    user_id INT,
    rating FLOAT,
    FOREIGN KEY (book_id) REFERENCES books(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO books (title, author, price, image, genre)
VALUES 
('Orbiting Jupiter', 'Gary Schmidt', 14.00, './images/Orbiting.png', 'English'),
('The Book Thief', 'Markus Zusak', 13.50, './images/book_thief.jpg', 'English'),
('The Diary Of A Young Girl', 'Anne Frank', 12.00, './images/diary.jpg', 'English'),
('The Mountain Is You', 'Brianna Wiest', 11.50, './images/mountain.png', 'English'),
('Metamorphosis', 'Franz Kafka', 9.80, './images/metamorphosis.jpg', 'English'),
('The Trial', 'Franz Kafka', 10.40, './images/trial.png', 'English'),
('The Stranger', 'Albert Camus', 13.50, './images/Stranger.png', 'English'),
('The Old Man And The Sea', 'Ernest Hemingway', 10.00, './images/sea.png', 'English'),
('The Setting sun', 'Osamu Dazai', 12.00, './images/setting_sun.png', 'English'),
('No Longer Human', 'Osamu Dazai', 12.00, './images/human.png', 'English'),
('To Kill A Mockingbird', 'Harper Lee', 11.60, './images/mockingbird.png', 'English'),
('The Bell Jar', 'Sylvia Plath', 11.00, './images/bell_jar.png', 'English');


INSERT INTO books (title, author, image, price, genre) 
VALUES 
('Marsiani', 'Andy Weir', './images/Marsiani.png', 16.00, 'Fantasy'),
('Harry Potter 1', 'Joanne Rowling', './images/hp1.jpg', 12.50, 'Fantasy'),
('Harry Potter 2', 'Joanne Rowling', './images/hp2.jpg', 13.00, 'Fantasy'),
('Harry Potter 3', 'Joanne Rowling', './images/hp3.jpg', 13.50, 'Fantasy'),
('Harry Potter 4', 'Joanne Rowling', './images/hp4.jpg', 13.00, 'Fantasy'),
('Harry Potter 5', 'Joanne Rowling', './images/hp5.jpg', 13.00, 'Fantasy'),
('Harry Potter 6', 'Joanne Rowling', './images/hp6.jpg', 12.50, 'Fantasy'),
('Harry Potter 7', 'Joanne Rowling', './images/hp7.jpg', 12.00, 'Fantasy'),
('Eragon', 'Christopher Paulini', './images/eragon.png', 14.00, 'Fantasy'),
('Hobbit', 'J. K. R Tolklen', './images/hobbit.png', 11.50, 'Fantasy'),
('Divergjentja', 'Veronica Roth', './images/divergjentja.png', 10.60, 'Fantasy'),
('Besnikja', 'Veronica Roth', './images/besnikja.png', 11.00, 'Fantasy');

INSERT INTO books (title, author, image, price, genre) 
VALUES 
('L\'Etranger', 'Albert Camus', './images/Etranger.png', 16.00, 'French'),
('La Peste', 'Albert Camus', './images/plague.png', 11.80, 'French'),
('Pere Goriot', 'Honore De Balzac', './images/PereGoriot.png', 14.50, 'French'),
('Eugenie Grandet', 'Honore De Balzac', './images/Eugene.png', 12.00, 'French'),
('Les Miserables', 'Victor Hugo', './images/miserables.jpg', 14.60, 'French'),
('Notre-Dame De Paris', 'Victor Hugo', './images/NotreDame.png', 16.50, 'French'),
('Les Fleurs Du Mal', 'Charles Baudelaire', './images/fleurs.png', 12.80, 'French'),
('Le Spleen de Paris', 'Charles Baudelaire', './images/Splin.png', 12.80, 'French'),
('La Fille Maudite', 'Emile Richebourg', './images/FilleMaudite.png', 14.00, 'French'),
('Ensemble, c\'est tout', 'Anna Gavalda', './images/ensemble.png', 11.90, 'French'),
('Madame Bovary', 'Gustave Flaubert', './images/bovary.png', 13.70, 'French'),
('Le Petite Prince', 'Antoine de Saint', './images/PetitePrince.png', 12.60, 'French');

INSERT INTO books (title, author, image, price, genre) 
VALUES 
('Juvenilja', 'Ndre Mjeda', './images/juvenilja.jpg', 12.00, 'Novels'),
('Keshtjella', 'Ismail Kadare', './images/kadare.jpg', 11.80, 'Novels'),
('Doktor Gjilpera', 'Faik Konica', './images/doctor.jpg', 13.00, 'Novels'),
('Lulet e Veres', 'Naim Frasheri', './images/luletveres.png', 10.00, 'Novels'),
('Plaku Dhe Deti', 'Ernest Hemingway', './images/deti.jpg', 12.90, 'Novels'),
('Xha Gorio', 'Honore De Balzak', './images/gorioi.jpg', 12.70, 'Novels'),
('I Huaji', 'Albert Camus', './images/i-huaji.jpg', 14.00, 'Novels'),
('Fausti', 'Volfgang Gëte', './images/faustin.jpg', 13.50, 'Novels'),
('Metamorfoza', 'Franz Kafka', './images/metamorfoza.jpg', 10.00, 'Novels'),
('Procesi', 'Franz Kafka', './images/procesi.jpg', 13.60, 'Novels'),
('Lulet E Se Keqes', 'Sharl Bodler', './images/lulet.jpg', 9.50, 'Novels'),
('Bija e Mallkuar', 'Emile Richbourg', './images/bija.png', 10.40, 'Novels');


INSERT INTO books (title, author, image, price, genre) 
VALUES 
('Five Feet Apart', 'Rachael Lippincott', './images/five_feet_apart.jpg', 16.50, 'Romance'),
('All The Bright Places', 'Jennifer Niven', './images/all_the_bright_places.jpg', 15.80, 'Romance'),
('The Fault In Our Stars', 'John Green', './images/fault.jpg', 14.90, 'Romance'),
('The Library Of Lost Things', 'Laura Taylor', './images/library.png', 12.00, 'Romance'),
('The Cruel Prince', 'Holly Black', './images/prince.jpg', 10.50, 'Romance'),
('The Wicked King', 'Holly Black', './images/wikced.png', 12.30, 'Romance'),
('The Queen Of Nothing', 'Holly Black', './images/queen.png', 13.60, 'Romance'),
('Every Other Weekend', 'Abigail Johnson', './images/weekend.png', 12.50, 'Romance'),
('Things We Never Got Over', 'Lucy Score', './images/over.png', 14.00, 'Romance'),
('Things We Hide From The Light', 'Lucy Score', './images/light.png', 14.50, 'Romance'),
('Midnight Sun', 'Trish Cook', './images/sun.jpg', 15.00, 'Romance'),
('Shatter Me Series', 'Tahereh Mafi', './images/shatter.png', 30.00, 'Romance');

INSERT INTO books (title, author, image, price, genre) 
VALUES 
('Biraz Yagmur Kimseyi Incitmez', 'Kemal Sayar', './images/yagmur.png', 12.00, 'Turkish'),
('Ruhun Labirentleri', 'Kemal Sayar', './images/labirent.png', 12.50, 'Turkish'),
('Hayatin anlami var mi?', 'Erol Goka', './images/hayat.png', 11.80, 'Turkish'),
('Gerçek insanin yuzunde yazar mi?', 'Erol Goka&Murat', './images/gercek.png', 12.50, 'Turkish'),
('Mesnevi Terapi', 'Nevzat Tarhan', './images/mesnevi.png', 14.30, 'Turkish'),
('Benim Adim Kirmizi', 'Orhan Pamuk', './images/kirmizi.png', 13.40, 'Turkish'),
('Kara Kitap', 'Orhan Pamuk', './images/KaraKitap.png', 12.80, 'Turkish'),
('Ince Memed', 'Yasar Kemal', './images/ince.png', 12.70, 'Turkish'),
('Kuyucakli Yusuf', 'Sabahattin Ali', './images/yusuf.png', 14.90, 'Turkish'),
('Korkuyu Beklerken', 'Oguz Atay', './images/korku.jpg', 11.30, 'Turkish'),
('Istanbul\'a Son Tren', 'Ayse Kulin', './images/last.png', 13.50, 'Turkish'),
('Aylak Adam', 'Yusuf Atilgan', './images/aylak.png', 9.80, 'Turkish');



