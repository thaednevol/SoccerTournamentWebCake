-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2014 at 03:00 PM
-- Server version: 5.5.40-0ubuntu1
-- PHP Version: 5.5.12-2ubuntu4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `SoccerTournament`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
`id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `back` varchar(100) NOT NULL,
  `number` varchar(4) NOT NULL,
  `position` enum('Goalkeeper','Defense','Midfield','Attack') NOT NULL,
  `foot` enum('Right','Left','Both','None') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `users_id`, `back`, `number`, `position`, `foot`) VALUES
(1, 1, 'thaednevol', '69', 'Goalkeeper', 'Right'),
(2, 2, 'Rita', '1', 'Goalkeeper', 'Right'),
(3, 3, 'Luchita', '10', 'Goalkeeper', 'Right'),
(4, 4, 'Messi', '10', 'Attack', 'Right');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
`id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `stadium` varchar(120) NOT NULL,
  `trainer` int(11) NOT NULL,
  `legal_representant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `firstsurname` varchar(50) NOT NULL,
  `lastsurname` varchar(50) DEFAULT NULL,
  `docid` int(11) NOT NULL,
  `docidtype` enum('Cedula de ciudadania','Cedula de extranjeria','Tarjeta de identidad','Pasaporte') NOT NULL,
  `birthdate` date NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `nationality` enum('Colombian','American') NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `firstsurname`, `lastsurname`, `docid`, `docidtype`, `birthdate`, `sex`, `nationality`, `phone`, `mobile`, `email`, `image`) VALUES
(1, 'Edwin Hernan', 'Hurtado', 'Cruz', 80251403, 'Cedula de ciudadania', '1984-11-08', 'Male', 'Colombian', '7580701', '3112515398', 'thaednevol@gmail.com', ''),
(2, 'Andrea', 'Hurtado', 'Cruz', 80251404, 'Cedula de ciudadania', '1990-02-23', 'Male', 'Colombian', '234352', '3003748669', 'aph@correo.com', ''),
(3, 'Luisa', 'Quiroga', 'Saavedra', 1032369782, 'Cedula de ciudadania', '1986-08-30', 'Female', 'Colombian', '7580701', '3104415678', 'luferquisa@gmail.com', ''),
(4, 'Lionel Andres', 'Messi', 'Cuccittini', 1032369780, 'Cedula de extranjeria', '1987-06-24', 'Male', 'American', '32314234', '234335125145', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `players`
--
ALTER TABLE `players`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_teams_users1_idx` (`trainer`), ADD KEY `fk_teams_users2_idx` (`legal_representant`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `docid` (`docid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `players`
--
ALTER TABLE `players`
ADD CONSTRAINT `FK_players_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
ADD CONSTRAINT `fk_teams_users2` FOREIGN KEY (`legal_representant`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_teams_users1` FOREIGN KEY (`trainer`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
