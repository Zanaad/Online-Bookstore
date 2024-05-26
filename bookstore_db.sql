CREATE TABLE `users` (
  `id` int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hashPassword` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL
)

CREATE TABLE `books` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(100) NOT NULL,
    `author` VARCHAR(100) NOT NULL,
    `price` INT NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `genre` VARCHAR(100) NOT NULL
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
