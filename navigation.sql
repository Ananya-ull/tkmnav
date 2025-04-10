-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2025 at 07:17 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `navigation`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loc_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_date` date NOT NULL,
  `description` text NOT NULL,
  `image` tinytext NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `loc_id`, `event_name`, `event_date`, `description`, `image`, `user_id`, `type`, `status`) VALUES
(1, 6, 'Annual Cultural Fest', '2024-10-15', 'A grand cultural event featuring music, dance, and drama performances.', 'cultural_fest.jpg', 0, 'admin', 'active'),
(2, 10, 'Intercollege Sports Meet', '2024-11-05', 'A multi-sport event bringing together athletes from various colleges.', 'sports_meet.jpg', 0, 'admin', 'active'),
(3, 5, 'Food Carnival', '2024-09-28', 'A fun-filled food festival showcasing different cuisines.', 'food_carnival.jpg', 1, 'user', 'active'),
(4, 3, 'Book Exhibition', '2024-10-22', 'An exhibition featuring a wide range of books from various genres.', 'book_exhibition.jpg', 0, 'admin', 'deactive'),
(5, 4, 'Tech Hackathon', '2024-12-10', 'A 24-hour coding challenge for tech enthusiasts.', 'hackathon.jpg', 1, 'user', 'active'),
(6, 7, 'Science Fair', '2024-10-30', 'An exhibition of innovative science projects by students.', 'science_fair.jpg', 0, 'admin', 'deactive'),
(7, 9, 'Auto Expo', '2024-11-12', 'A display of the latest vehicles and automotive technology.', 'auto_expo.jpg', 1, 'user', 'deactive'),
(8, 8, 'Open Mic Night', '2024-09-25', 'A platform for students to showcase their singing, poetry, and stand-up comedy skills.', 'open_mic.jpg', 1, 'user', 'active'),
(9, 2, 'Career Guidance Seminar', '2024-10-05', 'A seminar on career opportunities and skill development.', 'career_seminar.jpg', 0, 'admin', 'deactive'),
(10, 1, 'Alumni Meet', '2024-12-20', 'A networking event for alumni and current students.', 'alumni_meet.jpg', 0, 'admin', 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `feedback` text NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `date`, `feedback`, `rating`) VALUES
(1, 1, '2024-03-10', 'The event was well-organized, and I had a great experience.', 0),
(2, 1, '2024-04-15', 'The location was excellent, but the event could have been better managed.', 0),
(3, 1, '2024-05-20', 'Had an amazing time at the cultural fest! Looking forward to more events.', 0),
(4, 1, '2024-06-01', 'The food carnival was fantastic! Great variety of dishes.', 0),
(5, 1, '2024-06-10', 'The tech hackathon was very engaging and well-structured.', 0),
(11, 1, '2025-04-02', 'Average sessions', 3),
(12, 1, '2025-04-02', 'Qq', 4),
(13, 1, '2025-04-02', 'Qq', 0),
(14, 1, '2025-04-02', 'Very useful pp', 4),
(15, 1, '2025-04-02', 'Very useful pp', 0),
(16, 1, '2025-04-02', 'Yhu', 5),
(17, 1, '2025-04-02', 'Yhu', 0),
(18, 1, '2025-04-02', 'Good app', 4),
(19, 1, '2025-04-03', 'Hi', 5);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) NOT NULL,
  `location_type` varchar(50) NOT NULL,
  `status_remark` text NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location`, `location_type`, `status_remark`, `status`) VALUES
(1, 'Main Gate', 'common', 'Closed due to holidays', 'closed'),
(2, 'Administrative Block', 'facility', 'Available for administrative meetings', 'open'),
(3, 'Library', 'facility', 'Suitable for book exhibitions & seminars', 'open'),
(4, 'Computer Lab', 'facility', 'Under maintenance, not available for events', 'closed'),
(5, 'Canteen', 'facility', 'Can be used for food stalls & informal gatherings', 'open'),
(6, 'Auditorium', 'event_hall', 'Best for large-scale events & performances', 'open'),
(7, 'Science Block', 'facility', 'Available for academic exhibitions & workshops', 'open'),
(8, 'Hostel', 'facility', 'Restricted to residents, not an event space', 'closed'),
(9, 'Parking Lot', 'common', 'Limited space, can be used for stalls or entry points', 'open'),
(10, 'Sports Ground', 'event_hall', 'Available for sports events & open-air functions', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `navigate`
--

CREATE TABLE IF NOT EXISTS `navigate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_location` int(11) NOT NULL,
  `end_location` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `map` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `navigate`
--

INSERT INTO `navigate` (`id`, `start_location`, `end_location`, `description`, `map`) VALUES
(1, 1, '2', 'Walk straight for 100m, turn left', 'map1.png'),
(2, 2, '3', 'Walk straight for 50m', 'map2.png'),
(3, 3, '4', 'Take right, go up one floor', 'map3.png'),
(4, 4, '5', 'Walk straight, then right', 'map4.png'),
(5, 5, '6', 'Exit right, walk 150m', 'map5.png'),
(6, 6, '7', 'Walk straight for 200m', 'map6.png'),
(7, 7, '8', 'Take the left road, walk 300m', 'map7.png'),
(8, 8, '9', 'Walk straight for 400m', 'map8.png'),
(9, 9, '10', 'Walk 250m towards the field', 'map9.png'),
(10, 10, '1', 'Walk back along the same path', 'map10.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'mike', 'mike@gmail.com', '7355612288', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
