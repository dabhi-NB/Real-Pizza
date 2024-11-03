-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 07:39 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(3, 'nikuuu', 'dabhi111'),
(5, 'aq', 'aqaqaq'),
(7, 'aw', '1a597b124608150d1cec285bd2c86e4420f70a09'),
(8, 'er', '909f0c9b6de433b23a81fe89fac55fa7510bd83d'),
(10, 'ee', '1f444844b1ca616009c2b0e3564fecc065872b5b'),
(12, 'a1', 'a1');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `item_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `name`, `price`, `quantity`, `image`) VALUES
(6, 3, 8, 'r1', 111, 2, 'american.jpg'),
(29, 1, 8, 'r1', 111, 2, 'american.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`) VALUES
(12, 'real pizza'),
(13, 'premium pizza'),
(14, 'classic pizza'),
(15, 'exotic pizza'),
(16, 'pasta'),
(19, 'ice cream'),
(21, 'soup'),
(22, 'cold drinks'),
(23, 'south indian'),
(24, 'other items');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `feedback` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `feedback`) VALUES
(1, 'nik', 'd@d.com', '', 'hey'),
(5, 'nik', 'nik@nik.com', ' food', 'this is good food!');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `itemname` varchar(20) NOT NULL,
  `cname` varchar(500) NOT NULL,
  `price` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `itemname`, `cname`, `price`, `image`, `desc`) VALUES
(27, 'veg.pizza', 'real pizza', '150', 'veg pizza-1.jpg', ''),
(28, 'margherita pizza', 'real pizza', '150', 'margrita-1.jpg', ''),
(29, 'italian pizza', 'real pizza', '150', 'italian.jpg', ''),
(30, 'cheese tomato pizza', 'real pizza', '150', 'cheese tomato.jpg', ''),
(31, 'plain cheese pizza', 'real pizza', '150', 'pain cheese.jpg', ''),
(32, 'mexican fashion', 'premium pizza', '129', 'maxican-1.jpg', ''),
(33, 'tikka tandoori panee', 'premium pizza', '129', 'tikka tandori panner.jpg', ''),
(34, 'country exotica', 'premium pizza', '129', 'country exotic-1.jpg', ''),
(35, 'spicey delite', 'premium pizza', '129', 'Spicy.jpg', ''),
(36, 'italian special', 'premium pizza', '129', 'italian special.jpg', ''),
(37, 'china town', 'premium pizza', '129', 'china town.jpg', ''),
(38, 'cheesy macaroni', 'premium pizza', '129', 'cheesy makaroni.jpg', ''),
(39, 'red italian test', 'premium pizza', '129', 'red italian test.jpg', ''),
(40, 'mushroom riot', 'premium pizza', '129', 'mashroom riot.jpg', ''),
(41, 'margherita pizza', 'classic pizza', '99', 'margrita.jpg', ''),
(42, 'double chese blast', 'classic pizza', '99', 'double cheese.jpg', ''),
(43, 'veg.fantastic', 'classic pizza', '99', 'veg pizza.jpg', ''),
(44, 'barbecue special', 'exotic pizza', '199', 'barbecue.jpg', ''),
(45, 'plneabite special', 'exotic pizza', '199', 'plain.jpg', ''),
(46, 'chocolate pizza', 'exotic pizza', '199', 'Chocolate.jpg', ''),
(47, 'real special pizza', 'exotic pizza', '199', 'real special.jpg', ''),
(48, 'indian red pasta', 'pasta', '99', 'red-sauce-pasta-recipe.jpg', ''),
(49, 'italian hot pasta', 'pasta', '99', 'italian pasta.jpg', ''),
(50, 'creaminess pasta', 'pasta', '109', 'creaminess pasta.jpg', ''),
(51, 'american pasta', 'pasta', '109', 'american.jpg', ''),
(54, 'strawberry ice cream', 'ice cream', '50', 'strawberry.jpg', ''),
(55, 'chocolate ice cream', 'ice cream', '50', 'chocolate-icecream.jpg', ''),
(56, 'venilla ice cream', 'ice cream', '45', 'venila.jpg', ''),
(57, 'oreo ice cream', 'ice cream', '120', 'oreo ice cream.jpg', ''),
(58, 'mango ice cream', 'ice cream', '90', 'mango-ice-cream-.jpg', ''),
(59, 'mushroom soup', 'soup', '80', 'Mushroom-Soup-Side.jpg', ''),
(60, 'tomato soup', 'soup', '100', 'soup.jpg', ''),
(61, 'manchow soup', 'soup', '150', 'manchow-soup-recipe.jpg', ''),
(62, 'vegetable soup', 'soup', '99', 'vegetable-soup.jpg', ''),
(63, 'coca cola', 'cold drinks', '60', 'cola.jpg', ''),
(64, 'fanta', 'cold drinks', '70', 'fanta.jpg', ''),
(65, 'sprite', 'cold drinks', '60', 'sprite.jpg', ''),
(66, 'dahi vada', 'south indian', '90', 'Dahi_Vada.jpg', ''),
(67, 'idali', 'south indian', '80', 'idali south indian.jpg', ''),
(68, 'dosa', 'south indian', '120', 'dosa.jpg', ''),
(69, 'upma', 'south indian', '100', 'upma.jpg', ''),
(70, 'samosa chaat', 'other items', '79', 'Samosa-Chaat-with-Chai.jpg', ''),
(71, 'panipuri', 'other items', '30', 'panipuri-1jpg.jpg', ''),
(72, 'salad', 'other items', '60', 'salad.jpg', ''),
(73, 'garlic bread', 'real pizza', '130', 'garlic bread.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone_no` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `user_image`, `name`, `address`, `city`, `pincode`, `state`, `country`, `gender`, `phone_no`, `email`) VALUES
(1, 'niku', 'dabhi1', '', 'nikuuuuu', 'qs, 2s, xs, s, ss, s, s - 2', 'jnd', 362001, 'gujarat', 'gujju', 'female', '1212121212', 'nikuuu@uu.com'),
(9, 'dnb345', 'dnb356', '', 'dabhi bhojabhai lakhmanbhai', 'mander', 'junagadh', 362001, 'gujarat', 'india', 'male', '9727698565', 'dabhibojabhai@gmail.com'),
(11, 'dabhi nik', 'nik283', '', 'nikuuu', 'bilakhaa', 'jnd', 362001, 'gujarat', 'india', 'female', '9727162852', 'dabhinikita@gmail.com'),
(13, 'nik3', 'nik345', 'IMG20220811172847.jpg', 'niku', 'junagadh', 'jnd', 362001, 'guj', 'india', 'female', '9727162852', 'nik@gmai.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 1, 'niku', '9727162852', 'niku@gmail.com', 'cash on delivery', '1, 2, aa, aa, aa, aa, aa - 11', 'main1 (111 x 2) - ', 222, '2024-08-11', 'completed'),
(3, 1, 'dabhi', '333333333', 'niku@gmail.com', 'cash on delivery', 'rf, rff, ffvv, fffffv, fvvv, frrrrrrrrrrf, vffffffffd - 44444', 'r1 (111 x 4) - ', 444, '2024-08-12', 'completed'),
(4, 1, 'dabhi', '333333333', 'niku@gmail.com', 'cash on delivery', 'rf, rff, ffvv, fffffv, fvvv, frrrrrrrrrrf, vffffffffd - 44444', 'r3 (33 x 2) - ', 66, '2024-08-12', 'pending'),
(5, 9, 'dabhi bhojabhai lakh', '9727698565', 'dabhibojabhai@gmail.com', 'cash on delivery', 'mander', 'r1 (111 x 2) - r2 (22 x 3) - r3 (33 x 2) - ', 354, '2024-08-12', 'completed'),
(6, 9, 'dabhi bhojabhai lakh', '9727698565', 'dabhibojabhai@gmail.com', 'cash on delivery', 'mander', 'r1 (111 x 4) - ', 444, '2024-08-12', 'pending'),
(7, 12, 'cr', '0972716285', 'dabhinikita@gmail.com', 'cash on delivery', 'bilakhaa', 'r1 (111 x 3) - r2 (22 x 1) - ', 355, '2024-08-12', 'pending'),
(8, 1, 'dabhi', '333333333', 'niku@gmail.com', 'cash on delivery', 'rf, rff, ffvv, fffffv, fvvv, frrrrrrrrrrf, vffffffffd - 44444', 'r1 (111 x 3) - ', 333, '2024-08-15', 'pending'),
(9, 1, 'nikuuuuu', '1212121212', 'nikuuu@uu.com', 'cash on delivery', 'qs, 2s, xs, s, ss, s, s - 2', 'r1 (111 x 3) - ', 333, '2024-08-21', 'completed'),
(10, 1, 'nikuuuuu', '1212121212', 'nikuuu@uu.com', 'cash on delivery', 'qs, 2s, xs, s, ss, s, s - 2', 'b1 (22 x 2) - r1 (111 x 1) - ', 155, '2024-08-30', 'pending'),
(11, 1, 'nikuuuuu', '1212121212', 'nikuuu@uu.com', 'cash on delivery', 'qs, 2s, xs, s, ss, s, s - 2', 'b1 (22 x 3) - ', 66, '2024-09-02', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
