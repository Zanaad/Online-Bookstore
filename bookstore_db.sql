CREATE TABLE `users` (
  `id` int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hashPassword` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL
)