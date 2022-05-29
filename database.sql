CREATE TABLE `registration`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `salutation` enum('male','female','diverse') NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `haircolor` varchar(50) NOT NULL,
  `birthyear` int NOT NULL,
  `password` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
);