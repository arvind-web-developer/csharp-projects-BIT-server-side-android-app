--
-- Database: `bitdb`
--
CREATE DATABASE IF NOT EXISTS `bitdb`;
USE `bitdb`;

-- --------------------------------------------------------

--
-- Table structure for table `roster`
--

CREATE TABLE IF NOT EXISTS `roster` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `mphone` varchar(15) DEFAULT NULL,
  `hphone` varchar(15) DEFAULT NULL,
  `jobid` int(11) DEFAULT NULL,
  `sch_start_date` datetime NOT NULL,
  `sch_start_time` datetime NOT NULL,
  `jobduration` varchar(10) DEFAULT NULL,
  `act_start_date` datetime NOT NULL,
  `act_start_time` datetime NOT NULL,
  `act_end_date` datetime NOT NULL,
  `act_end_time` datetime NOT NULL,
  `jobstatus` varchar(15) DEFAULT NULL,
  `comments` text,
  PRIMARY KEY (`rid`)
);

--
-- Dumping data for table `roster`
--

INSERT INTO `roster` (`rid`, `fname`, `lname`, `mphone`, `hphone`, `jobid`, `sch_start_date`, `sch_start_time`, `jobduration`, `act_start_date`, `act_start_time`, `act_end_date`, `act_end_time`, `jobstatus`, `comments`) VALUES
(1, 'Atul', 'Lal', '0433232323', '(07)92223333', 1, '2015-05-14 00:00:00', '0000-00-00 12:30:00', '2', '2015-05-14 00:00:00', '2015-05-14 12:30:00', '2015-05-14 14:00:00', '0000-00-00 14:30:00', 'Completed', NULL),
(2, 'Shruti', 'Hassan', '0443231323', '(02)9211334455', 2, '2015-05-14 00:00:00', '0000-00-00 12:30:00', '2', '2015-05-14 00:00:00', '0000-00-00 15:30:00', '2015-05-14 00:00:00', '0000-00-00 17:30:00', 'Completed', NULL),
(3, 'Naga', 'Smith', '0496444232', '(03)93355655', 3, '2015-05-15 00:00:00', '0000-00-00 09:00:00', '2', '2015-05-15 00:00:00', '2015-05-15 09:00:00', '2015-05-15 00:00:00', '0000-00-00 11:00:00', 'Completed', NULL);


