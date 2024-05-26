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