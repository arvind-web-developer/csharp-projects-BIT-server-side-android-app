--
-- Database: `webservice`
--
CREATE DATABASE IF NOT EXISTS `webservice`;
USE `webservice`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `title` varchar(120) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`post_id`, `username`, `title`, `message`) VALUES
(1, 'atul.lal@abb.com', 'Availability', 'after 7pm'),
(2, 'mark.burns@services.com', 'job #1', 'need to get xyz material to complete the task.'),
(3, 'mark.burns@services.com', 'job #2', 'Stage one complete.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`username`)
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'amit', 'abc1234'),
(2, 'android', 'abc1234'),
(3, 'atul.lal@abb.com', '123456'),
(4, 'shruti.hassan@solar.com', '123456'),
(5, 'naga.smith@sr.com', '123456'),
(6, 'ardalan.mousavi@tea.com', '123456'),
(7, 'matteo.renzi@ute.com', '123456'),
(8, 'tony.abott@wl.com', '123456'),
(9, 'frank.bainimarama@fiji.com', '123456'),
(10, 'mark.burns@services.com', '123456'),
(11, 'bill.jones@software.com', '123456'),
(12, 'semi.lek@installer.com', '123456'),
(13, 'miles.davis@server.com', '123456'),
(14, 'suji@gmail.com', '123456'),
(15, 'tanu@tnt.com', '123456');


