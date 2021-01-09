DROP TABLE IF EXISTS `bookList`;
CREATE TABLE `bookList` (
	`id` tinyint NOT NUL AUTO_INCREMENT,
	`bookTitle` varchar(50) NOT NULL,
	`authorName` varchar(20) NOT NULL,
	`publicationDate` datetime NOT NULL,
	`priceNum` int NOT NULL,
	`summaryText` varchar(500),
	`rentalDate` datetime,
	`dueDate` datetime,

	PRIMARY KEY (`id`)	
)AUTO_INCREMENT=6;
INSERT INTO `bookList` VALUES (1, '', '가니', '2000-11-8', 1000, '가니렐라는 어려서 부모님을 잃고요~', NULL, NULL);
INSERT INTO `bookList` VALUES (2, '가니와 함께하는 여행', '가니여행', '2001-11-8', 2000, '가니와 함께하는 여행은 너무 재밌어!', '2003-11-8 11:08:00', '2003-11-15 11:08:00');
INSERT INTO `bookList` VALUES (3, '가니가니', '가니가니', '2002-11-8', 3000, '가니가니가니가니 너무 좋아 가니 너무 좋아', '2008-11-8 11:08:00', '2008-11-15 11:08:00');
INSERT INTO `bookList` VALUES (4, '가니가니가니', '가니가니가니', '2003-11-8', 4000, '동해물과 백두산이 마르고 닳도록', NULL, NULL);
INSERT INTO `bookList` VALUES (5, '애국가', '애국심많은아이', '2001-11-8', 10000, '하느님이 보우하사 우리나라 만세', '2012-11-8 11:08:00', '2012-11-15 11:08:00');



