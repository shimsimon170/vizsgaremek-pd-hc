-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2025 at 05:23 PM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yumeneko`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `changePassword` (IN `customerIdIn` INT(11), IN `newPasswordIn` VARCHAR(255), IN `creatorIn` INT(11))   BEGIN

IF creatorIn = userIdIn THEN
	UPDATE `customers`
    SET `customers`.`password` = SHA1(newPasswordIn)
    WHERE `customers`.`customer_id` = customerIdIn;
ELSE
	SELECT "Invalid login information - cannot complete request.";
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllCustomers` ()   SELECT * FROM `customers`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllMenuItems` ()   SELECT * FROM `menu_items`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `emailIn` VARCHAR(100), IN `passwordIn` INT(255))   SELECT * FROM `customers` WHERE `customers`.`email` = emailIn AND `customers`.`password` = SHA1(passwordIn)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registerCustomer` (IN `nameIn` VARCHAR(50), IN `phoneIn` VARCHAR(30), IN `emailIn` VARCHAR(100), IN `passwordIn` VARCHAR(50))   INSERT INTO `customers` (`customers`.`name`, `customers`.`phone`, `customers`.`email`, `customers`.`is_admin`, `customers`.`password`) VALUES (nameIn, phoneIn, emailIn, 0, passwordIn)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `duration` int(11) NOT NULL,
  `status` enum('Reserved','Cancelled','Completed') DEFAULT 'Reserved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `customer_id`, `table_id`, `booking_date`, `booking_time`, `duration`, `status`) VALUES
(1, 1, 1, '2024-12-10', '10:30:00', 60, 'Reserved'),
(2, 2, 3, '2024-12-12', '14:00:00', 120, 'Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `cafe_tables`
--

CREATE TABLE `cafe_tables` (
  `table_id` int(11) NOT NULL,
  `table_number` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `is_available` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cafe_tables`
--

INSERT INTO `cafe_tables` (`table_id`, `table_number`, `capacity`, `is_available`) VALUES
(1, 1, 2, 1),
(2, 2, 4, 1),
(3, 3, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `phone`, `email`, `is_admin`, `is_deleted`, `created_at`, `deleted_at`, `password`) VALUES
(1, 'John Doe', '123-456-7890', 'johndoe@example.com', 0, 0, '2025-03-01 15:06:14', NULL, 'hashed_password_1'),
(2, 'Dora Kazamatsuri', '01-234-567-88', 'yumeneko@gmail.com', 1, 0, '2025-03-01 15:06:14', NULL, 'hashed_password_2'),
(3, 'Alice Johnson', '555-123-4567', 'alicejohnson@example.com', 0, 0, '2025-03-01 15:06:14', NULL, 'hashed_password_3'),
(4, 'Dorothy', '01-254-568-99', 'doroty@example.com', 0, 0, '2025-03-01 15:51:26', NULL, '$2y$10$umFpbG8PyQ5jygiTUHzh/OGepsgLv5.sZzPLRIBGfCvzDb7jJCAiq'),
(5, ' Brittney Bubblegum', '01-254-555-55', 'buble@example.com', 0, 0, '2025-03-01 16:09:53', NULL, '$2y$10$edEWm7C2VsfrvA5ldbcZQuDpT01TUDg2jrmxcYh046UOf42LBeN5i'),
(6, 'kukac', '222-234-5678', 'kukac@gmail.com', 0, 0, '2025-03-03 08:20:31', NULL, '$2y$10$iS6Nxfe4F41ddsQUYHVXFuuuV7BIIpFYudZ/IYf/NiEBzZ2zksWZC'),
(7, 'gerinctelen', '000000000', 'igenize@gmail.com', 0, 0, '2025-03-03 08:29:07', NULL, '$2y$10$mMcBZZXginMkXdUjCoMB4ubWGZfz7kkwvQ1Z0Kxt3UOY3CJOHMK2C'),
(8, 'admin', '123456789', 'admin@yumeneko.com', 1, 0, '2025-04-08 11:02:08', NULL, 'admin123'),
(9, 'user', '01010101010', 'username@example.com', 0, 0, '2025-04-11 07:02:44', NULL, '$2y$10$jAD81qax2mBh5VeYcV/bVe9FkFy2ohv7EF2tO0FGn0U/tH7d0zW8O');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `menu_item_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`menu_item_id`, `name`, `description`, `price`, `category`, `is_available`, `created_at`) VALUES
(1, 'Matcha Latte', 'A smooth and creamy blend of matcha and milk for a delightful treat.', '4.50', 'Drinks', 1, '2025-03-01 15:06:14'),
(2, 'Bubble Tea', 'Refreshing tea with chewy tapioca pearls in every sip.', '4.00', 'Drinks', 1, '2025-03-01 15:06:14'),
(3, 'Craft Beer', 'Local craft beer with a unique flavor profile for beer enthusiasts.', '7.00', 'Drinks', 1, '2025-03-01 15:06:14'),
(4, 'Meowtini', 'A non-alcoholic fruity cocktail, perfect for a fun and refreshing experience.', '6.00', 'Drinks', 1, '2025-03-01 15:06:14'),
(5, 'Espresso', 'A classic, rich, and intense coffee shot for a quick energy boost.', '3.00', 'Drinks', 1, '2025-03-01 15:06:14'),
(6, 'Latte Macchiato', 'A creamy blend of espresso and steamed milk for coffee lovers.', '4.50', 'Drinks', 1, '2025-03-01 15:06:14'),
(7, 'Almond Coffee', 'A perfect balance of espresso, steamed milk, almond and foam.', '5.00', 'Drinks', 1, '2025-03-01 15:06:14'),
(8, 'Catpuccino', 'Our special coffee with a cute twist—purrrfect for any cat lover!', '5.00', 'Drinks', 1, '2025-03-01 15:06:14'),
(9, 'Classic Cheeseburger', 'A timeless favorite with a juicy beef patty, melted cheese, fresh lettuce, tomato, and a soft sesame bun.', '8.00', 'Foods', 1, '2025-03-01 15:06:14'),
(10, 'BBQ Bacon Burger', 'Savory and smoky with crispy bacon, tangy BBQ sauce, cheddar cheese, and caramelized onions.', '9.50', 'Foods', 1, '2025-03-01 15:06:14'),
(11, 'Veggie Delight Burger', 'A hearty, plant-based patty topped with fresh veggies, avocado, and a zesty sauce.', '7.50', 'Foods', 1, '2025-03-01 15:06:14'),
(12, 'Meow-Meat Special Burger', 'A cat café exclusive with double beef patties, secret sauce, and all the fixings for a satisfying bite.', '10.00', 'Foods', 1, '2025-03-01 15:06:14'),
(13, 'Classic Shoyu Ramen', 'A comforting bowl of soy-based broth with tender noodles, sliced pork, bamboo shoots, and a soft-boiled egg.', '12.00', 'Foods', 1, '2025-03-01 15:06:14'),
(14, 'Spicy Miso Ramen', 'Packed with bold flavors, this ramen has a rich miso broth with a spicy kick, paired with pork chashu and fresh greens.', '13.50', 'Foods', 1, '2025-03-01 15:06:14'),
(15, 'Bento Box', 'A delightful combination of sushi, rice, pickled vegetables, and a choice of teriyaki chicken, salmon, or tofu.', '10.50', 'Foods', 1, '2025-03-01 15:06:14'),
(16, 'Purrfect Tonkotsu Ramen', 'Creamy pork bone broth, perfectly cooked noodles, and an assortment of classic toppings.', '12.00', 'Foods', 1, '2025-03-01 15:06:14'),
(17, 'Cat Cookies', 'Adorably shaped buttery cookies with a hint of vanilla—perfect for a sweet snack.', '3.50', 'Desserts', 1, '2025-03-01 15:06:14'),
(18, 'Meow-Macarons', 'Colorful macarons in delightful flavors like vanilla, chocolate, and strawberry.', '4.50', 'Desserts', 1, '2025-03-01 15:06:14'),
(19, 'Paw-some Brownie', 'A rich and fudgy chocolate brownie with a paw-shaped design.', '5.00', 'Desserts', 1, '2025-03-01 15:06:14'),
(20, 'Cat Cupcake', 'A fluffy cupcake with creamy frosting, topped with a cute cat face decoration.', '3.00', 'Desserts', 1, '2025-03-01 15:06:14'),
(21, 'Matcha Mochi', 'Soft and chewy rice cakes infused with the earthy sweetness of matcha.', '6.00', 'Desserts', 1, '2025-03-01 15:06:14'),
(22, 'Strawberry Mochi', 'A sweet and fruity treat with strawberry-flavored filling.', '6.50', 'Desserts', 1, '2025-03-01 15:06:14'),
(23, 'Mango Mochi', 'Tropical and delicious with a creamy mango filling.', '6.50', 'Desserts', 1, '2025-03-01 15:06:14'),
(24, 'Mixed Flavors Cat Mochi', 'An assortment of our best mochi flavors, each shaped like a cute cat face.', '10.00', 'Desserts', 1, '2025-03-01 15:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` enum('Pending','Completed','Cancelled') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`, `total_amount`, `status`) VALUES
(1, 1, '2024-12-05 09:45:00', '9.25', 'Completed'),
(2, 3, '2024-12-05 10:30:00', '7.50', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `menu_item_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `menu_item_id`, `quantity`, `price`) VALUES
(1, 1, 1, 1, '4.50'),
(2, 1, 2, 1, '2.75'),
(3, 2, 4, 2, '6.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `table_id` (`table_id`);

--
-- Indexes for table `cafe_tables`
--
ALTER TABLE `cafe_tables`
  ADD PRIMARY KEY (`table_id`),
  ADD UNIQUE KEY `table_number` (`table_number`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`menu_item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `menu_item_id` (`menu_item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cafe_tables`
--
ALTER TABLE `cafe_tables`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `menu_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`table_id`) REFERENCES `cafe_tables` (`table_id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`menu_item_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
