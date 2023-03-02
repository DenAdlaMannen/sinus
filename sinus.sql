-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 02 mars 2023 kl 11:53
-- Serverversion: 10.4.27-MariaDB
-- PHP-version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `sinus`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `admins`
--

CREATE TABLE `admins` (
  `adminID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `admins`
--

INSERT INTO `admins` (`adminID`, `Username`, `Password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Tabellstruktur `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'Hoodies'),
(2, 'T-shirts'),
(3, 'Skateboards'),
(4, 'Wheels'),
(5, 'Caps');

-- --------------------------------------------------------

--
-- Tabellstruktur `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Zipcode` int(11) NOT NULL,
  `Street` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `customers`
--

INSERT INTO `customers` (`CustomerID`, `Firstname`, `Lastname`, `Country`, `City`, `Zipcode`, `Street`, `Phone`, `Email`) VALUES
(1, 'Priam', 'Oscarsson', 'Finland', 'Helsinki', 45678, 'Pekkastreet 48', '070-0000000', 'priam@schoolmail.com');

-- --------------------------------------------------------

--
-- Tabellstruktur `orderline`
--

CREATE TABLE `orderline` (
  `OrderLineID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `orderline`
--

INSERT INTO `orderline` (`OrderLineID`, `ProductID`, `OrderID`, `Quantity`, `TotalPrice`) VALUES
(1, 6, 1, 1, 499),
(2, 12, 1, 1, 1599);

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `OrderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `OrderDate`) VALUES
(1, 1, '2023-03-02');

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Color` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `Image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`ProductID`, `Title`, `CategoryID`, `Color`, `Price`, `Image`) VALUES
(1, 'Hoodie Ash', 1, 'Grey', 899, 'hoodie-ash.png'),
(2, 'Hoodie Fire', 1, 'Red', 899, 'hoodie-fire.png'),
(3, 'Hoodie Green', 1, 'Green', 899, 'hoodie-green.png'),
(4, 'Hoodie Ocean', 1, 'Blue', 899, 'hoodie-ocean.png'),
(5, 'Hoodie Purple', 1, 'Purple', 899, 'hoodie-purple.png'),
(6, 'Sinus Cap Blue', 5, 'Blue', 499, 'sinus-cap-blue.png'),
(7, 'Sinus Cap Green ', 5, 'Green', 499, 'sinus-cap-green.png'),
(8, 'Sinus Cap Purple', 5, 'Purple', 499, 'sinus-cap-purple.png'),
(9, 'Sinus Cap Red', 5, 'Red', 499, 'sinus-cap-red.png'),
(10, 'Sinus Skateboard Eagle', 3, 'Multicolor', 1899, 'sinus-skateboard-eagle.png'),
(11, 'Sinus Skateboard Fire', 3, 'Multicolor', 1399, 'sinus-skateboard-fire.png'),
(12, 'Sinus Skateboard Gretasfury', 3, 'Multicolor', 1599, 'sinus-skateboard-gretasfury.png'),
(13, 'Sinus Skateboard Ink', 3, 'Multicolor', 1399, 'sinus-skateboard-ink.png'),
(14, 'Sinus Skateboard Logo', 3, 'Multicolor', 1499, 'sinus-skateboard-logo.png'),
(15, 'Sinus Skateboard Skateboard Northern Lights', 3, 'Green', 1699, 'sinus-skateboard-northern_lights.png'),
(16, 'Sinus Skateboard Plastic', 3, 'Multicolor', 1699, 'sinus-skateboard-plastic.png'),
(17, 'Sinus Skateboard Polar', 3, 'Black', 1599, 'sinus-skateboard-polar.png'),
(18, 'Sinus Skateboard Purple', 3, 'Purple', 1399, 'sinus-skateboard-purple.png'),
(19, 'Sinus Skateboard Yellow', 3, 'Yellow', 1399, 'sinus-skateboard-yellow.png'),
(20, 'Sinus T-shirt Blue', 2, 'Blue', 399, 'sinus-tshirt-blue.png'),
(21, 'Sinus T-shirt Grey', 2, 'Grey', 399, 'sinus-tshirt-grey.png'),
(22, 'Sinus T-shirt Pink', 2, 'Pink', 399, 'sinus-tshirt-pink.png'),
(23, 'Sinus T-shirt Purple', 2, 'Purple', 399, 'sinus-tshirt-purple.png'),
(24, 'Sinus T-shirt Yellow', 2, 'Yellow', 399, 'sinus-tshirt-yellow.png'),
(25, 'Sinus Wheel Rocket', 4, 'Red', 299, 'sinus-wheel-rocket.png'),
(26, 'Sinus Wheel Spinner', 4, 'White', 299, 'sinus-wheel-spinner.png'),
(27, 'Sinus Wheel Wave', 4, 'Black', 299, 'sinus-wheel-wave.png');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Index för tabell `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Index för tabell `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Index för tabell `orderline`
--
ALTER TABLE `orderline`
  ADD PRIMARY KEY (`OrderLineID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Index för tabell `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Index för tabell `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT för tabell `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `orderline`
--
ALTER TABLE `orderline`
  MODIFY `OrderLineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT för tabell `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `orderline`
--
ALTER TABLE `orderline`
  ADD CONSTRAINT `orderline_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`),
  ADD CONSTRAINT `orderline_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);

--
-- Restriktioner för tabell `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);

--
-- Restriktioner för tabell `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
