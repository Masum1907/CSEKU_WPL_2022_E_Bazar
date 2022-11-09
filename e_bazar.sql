-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 05:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_bazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(20) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(43, '127.0.0.1', 1),
(49, '::1', 1),
(52, '::1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Electronic Accessories'),
(2, 'Smart Gadget'),
(3, 'Men\'s Fashion'),
(4, 'Fashion & Beauty'),
(5, 'Babies & Toys'),
(8, 'Jellewary'),
(10, 'Test new');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `pro_id` int(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`pro_id`, `comment`, `customer_name`) VALUES
(43, 'Nice Watch', 'Hamim Sheikh'),
(43, 'Really 👋 ', 'Giash Uddin At Taheri'),
(44, 'Nice Product ...', 'Giash Uddin At Taheri'),
(44, '👋 Nice Earbuds', 'Hamim Sheikh');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(25) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_address` varchar(300) NOT NULL,
  `customer_image` varchar(500) NOT NULL,
  `customer_password` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `customer_image`, `customer_password`, `customer_ip`) VALUES
(19, 'Hamim Sheikh', 'hamim@gmail.com', '09756774325', 'Nirala,Road-14 House-B324,Khulna', 'user1.jpg', '1234', '127.0.0.1'),
(20, 'Golam Rabbani', 'golam@gmail.com', '01847593759', 'Sonadanga,Block-5,House No-46,Khulna', 'u2.jpg', '1234', '127.0.0.1'),
(21, 'Giash Uddin At Taheri', 'taheri@gmail.com', '0178463983934', 'Sonadanga,Block-01,House No-146,Khulna', 'u5.jpg', '1234', '127.0.0.1'),
(22, 'Ziaul Hasan', 'hasan@gmail.com', '018463848367', 'Nirala,Road-13,House-55,Khulna', 'u3.jpg', '1234', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`, `date`) VALUES
(67, 'Giash Uddin At Taheri', 'taheri@gmail.com', '0178463983934', 8150, 'Sonadanga,Block-01,House No-146,Khulna', 'Paid', 'SSLCZ_TEST_634e34853e546', 'BDT', '2022-10-25'),
(68, 'Giash Uddin At Taheri', 'taheri@gmail.com', '0178463983934', 24760, 'Sonadanga,Block-01,House No-146,Khulna', 'Paid', 'SSLCZ_TEST_634e369fc8d00', 'BDT', '2022-10-25'),
(69, 'Giash Uddin At Taheri', 'taheri@gmail.com', '0178463983934', 25850, 'Sonadanga,Block-01,House No-146,Khulna', 'Paid', 'SSLCZ_TEST_634e4bffe6129', 'BDT', '2022-10-25'),
(70, 'Ziaul Hasan', 'hasan@gmail.com', '018463848367', 28330, 'Nirala,Road-13,House-55,Khulna', 'Paid', 'SSLCZ_TEST_634e5d69ed37c', 'BDT', '2022-10-25'),
(71, 'Giash Uddin At Taheri', 'taheri@gmail.com', '0178463983934', 1220, 'Sonadanga,Block-01,House No-146,Khulna', 'Paid', 'SSLCZ_TEST_6356ac767e5f4', 'BDT', '2022-10-25'),
(72, 'Giash Uddin At Taheri', 'taheri@gmail.com', '0178463983934', 1220, 'Sonadanga,Block-01,House No-146,Khulna', 'Paid', 'SSLCZ_TEST_6356ac7af1f73', 'BDT', '2022-10-25'),
(73, 'Giash Uddin At Taheri', 'taheri@gmail.com', '0178463983934', 28030, 'Sonadanga,Block-01,House No-146,Khulna', 'Paid', 'SSLCZ_TEST_6356ad49d26d6', 'BDT', '2022-10-25'),
(74, 'Giash Uddin At Taheri', 'taheri@gmail.com', '0178463983934', 24760, 'Sonadanga,Block-01,House No-146,Khulna', 'Paid', 'SSLCZ_TEST_63574265bc795', 'BDT', '2022-10-25'),
(75, 'Hamim Sheikh', 'hamim@gmail.com', '09756774325', 30950, 'Nirala,Road-14 House-B324,Khulna', 'Paid', 'SSLCZ_TEST_63578a1f24306', 'BDT', '2022-10-25'),
(76, 'Giash Uddin At Taheri', 'taheri@gmail.com', '0178463983934', 6190, 'Sonadanga,Block-01,House No-146,Khulna', 'Paid', 'SSLCZ_TEST_6357969c30c81', 'BDT', '2022-10-25'),
(77, 'Hamim Sheikh', 'hamim@gmail.com', '09756774325', 6190, 'Nirala,Road-14 House-B324,Khulna', 'Paid', 'SSLCZ_TEST_6357a8148bb59', 'BDT', '2022-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `order_new`
--

CREATE TABLE `order_new` (
  `order_id` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `visible` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_new`
--

INSERT INTO `order_new` (`order_id`, `pro_id`, `qty`, `visible`) VALUES
(67, 43, 1, 1),
(67, 45, 1, 1),
(67, 51, 3, 1),
(68, 43, 4, 1),
(69, 43, 4, 1),
(69, 44, 1, 1),
(70, 43, 4, 1),
(70, 44, 3, 1),
(70, 49, 1, 1),
(72, 43, 4, 0),
(72, 44, 3, 0),
(72, 49, 1, 0),
(72, 52, 4, 0),
(73, 43, 4, 1),
(73, 44, 3, 1),
(73, 49, 1, 1),
(73, 52, 4, 1),
(74, 43, 4, 0),
(74, 49, 1, 0),
(74, 52, 4, 0),
(75, 43, 5, 1),
(75, 49, 1, 1),
(75, 52, 4, 1),
(76, 43, 1, 1),
(76, 49, 1, 1),
(76, 52, 4, 1),
(77, 43, 1, 1),
(77, 49, 1, 1),
(77, 52, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_title` varchar(225) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `vendor_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `vendor_id`) VALUES
(43, 2, 'Smart Watch', 6190, 'Realme Smart Watch 2 Pro.\r\nBrand: Realme.\r\nProduct Type: Smart Watch.\r\n1.75 in Touch Display.\r\nWater Resistant, 1.5 m, IP68.\r\nHeart Rate Monitor.\r\nSpO2 (Blood Oxygen) Monitor.\r\nPedometer, Sleep Monitor, Calorie Count, Step Count.\r\n14 days Battery.\r\nColor: Random.\r\nWarranty: 6 months warranty.', 'p1.jpeg', 'new,watch,realme', 1),
(44, 2, 'Bluetooth Earbuds', 1090, 'Realme Buds Q2 TWS Bluetooth Earbuds – Black.\r\nBrand: Realme.\r\nProduct Type: Bluetooth Earbuds.\r\nModel: Realme Buds Q2.\r\nBluetooth Version: 5.0.\r\nWireless Range: 10m.\r\nWater Resistance: IPX4 (earphones only).\r\nNoise-Canceling Technology: Environmental noise cancellation.\r\nCharging Time: Earphones-About 1 hour 40 mins, charging case-About 2.5 hours.\r\nDynamic Driver Size: 10mm.\r\nWarranty: 3 Months.', 'p3.jpeg', 'new,earbuds', 1),
(45, 1, 'Earphone', 1000, 'Realme Buds Classic Half In-Ear Earphone – Black.\r\nBrand: Realme.\r\nProduct Type: In-Ear Earphone.\r\nModel: Realme Buds Classic.\r\nComfortable Half In-Ear Design\r\n14.2 mm large driver.\r\nIn-Line HD Microphone.\r\nBuilt-in Music and Call Control.\r\nTangle-free design.\r\nWarranty: 1 Month.', 'p2.jpeg', ' Earphone,new,latest', 2),
(46, 2, 'Chaina watch', 1350, 'Realme Smart Watch 2 Pro.\r\nBrand: Realme.\r\nProduct Type: Smart Watch.\r\n1.75 in Touch Display.\r\nWater Resistant, 1.5 m, IP68.\r\nHeart Rate Monitor.\r\nSpO2 (Blood Oxygen) Monitor.\r\nPedometer, Sleep Monitor, Calorie Count, Step Count.\r\n14 days Battery.\r\nColor: Random.\r\nWarranty: 6 months warranty.', 'product-9.jpg', 'new,watch', 2),
(47, 1, 'Wired Earphone', 200, 'Realme Buds 2 Wired Earphone.\r\nBrand: Realme.\r\nProduct Type: Earphone.\r\nEnjoy the powerful 11.2mm bass boost driver which consist of multi-layer composite diaphragm, bringing you a deep and powerful, yet accurate bass response.\r\n3-Button Remote with Mic.\r\nThe inline remote features three tactile buttons and a mic, so you can control your music and videos, incoming calls, and even summon your voice assistant directly at the touch of a button.\r\nBuilt-in Magnets.\r\nThe integrated magnets are designed to provide the ultimate solution for neatly storing your earphones.\r\nTangle-Free Design.\r\nA premium, reinforced braided jacket, and two evenly grooved TPU cables make for a design that won’t tangle easily.\r\nCable Organizer.\r\nA built-in adjustable cable strap is also featured to keep your earphones tidy.\r\nPremium Design.\r\nAdd a touch of style to your music experience with the realme Buds 2.\r\nThe matte, streamlined design looks elegant and attractive.\r\nColor: Yellow.\r\nWarranty: 3 Months.', 'p4.jpeg', 'Wired Earphone,earphone', 2),
(48, 4, 'Chicken Cubes', 200, 'Knorr Chicken Cubes 18gm.\r\nBrand: Knorr.\r\nProduct Type: Chicken Cubes.\r\nNet Weight: 18gm.\r\nContains real chicken and 8 natural spices.\r\nEveryday food will be more fun.', '31.jpeg', 'new,cream', 3),
(49, 4, 'Ponds Super Light Gel Oil', 300, 'Super lightweight and non-oily gel formula.\r\nMoisturises skin with 24 hour moisture lock.\r\nIdeal for all year round use.\r\nSpreads easily and instantly absorbs.\r\nLeaves skin soft, with a water-fresh glow.\r\nWeight: 50ml.\r\nHow to use: Gently massage with circular movements, starting from the centre to the contours of your cleansed face. For best results use every morning and evening.\r\nHyaluronic Acid and Vitamin E nriched nourishing care.', '32.jpeg', 'ponds,pond ,new', 3),
(50, 4, 'Ponds Super Light Gel Oil ', 420, 'Super lightweight and non-oily gel formula.\r\nMoisturises skin with 24 hour moisture lock.\r\nIdeal for all year round use.\r\nSpreads easily and instantly absorbs.\r\nLeaves skin soft, with a water-fresh glow.\r\nWeight: 100ml.\r\nHow to use: Gently massage with circular movements, starting from the centre to the contours of your cleansed face. For best results use every morning and evening.\r\nHyaluronic Acid and Vitamin E nriched nourishing care.', '33.jpeg', 'new,ponds', 3),
(51, 4, 'Sunsilk Shampoo', 320, 'Sunsilk Shampoo Hair Fall Solution 170ml.\r\nBrand: Sunsilk.\r\nProduct Type: Shampoo.\r\nWeight: 170ml.\r\nA good quality product.', '34.png', 'Sunsilk Shampoo,new', 3),
(52, 4, 'Sunsilk Shampoo', 235, ' Sunsilk Shampoo Lusciously Thick & Long 170ml\r\nProduct Type: Shampoo.\r\nCapacity: 170ml.\r\nGives you 2x thicker looking hair.\r\nCo-created with Teddy Charles - Hairstyle expert.\r\nEnriched with Keratin Yogurt.\r\nIt provides hair with essential nutrients.\r\nGives hair natural body and bounce.\r\nMakes your hair look fuller.', '36.jpeg', 'new,Sunsilk Shampoo,shampoo', 3),
(53, 4, 'Lifebuoy Hand Wash', 1075, 'Lifebuoy Hand Wash Total Bottlle 5Litter-69583763.\r\nBrand: Lifebuoy.\r\nProduct Type: Hand Wash.\r\nWeight: 5 litter.\r\nA good quality product.', '35.png', 'Lifebuoy Hand Wash,lifeboy', 3),
(54, 1, 'Redmi Monitor 27 Inch', 20900, 'Xiaomi Redmi Monitor 27 Inch 75Hz Full HD IPS Panel - Black.\r\nBrand: Xiaomi.\r\nProduct Type: Monitor.\r\nScreen Size: 27 inches.\r\nResolution: 2560×1440.\r\nBrightness: 400cd/m2 (TYP).\r\nResponse Time: 1 ms (IMBC), 4ms (GTG).\r\nViewing Angle: 178 degrees ultra-wide viewing angles.\r\nContrast Ratio: 1000: 1.\r\nAspect Ratio: 16: 9.\r\nRefresh Rate: Maximum Refresh Rate-75 Hz, Recommended Refresh Rate-60 Hz.\r\nConnectivity: HDMI HDMI 1.4 x1, VGA & Audio Jack.\r\nPower Type: 35W (TYP), 75W Max.\r\nColor: Black.\r\nWarranty: 2 Years Warranty, 12 Months Parts & Service Warranty.', 'n2.jpeg', 'desktop,new', 6),
(55, 1, 'Desktop Monitor', 34000, ' Xiaomi Redmi Desktop Monitor 1A 23.9 Inch Full HD - Black.\r\nBrand: Xiaomi.\r\nProduct Type: Desktop Monitor.\r\nScreen Size: 23.8-Inch.\r\nResolution: Full HD (1920 x 1080).\r\nBrightness: 250cd/m.\r\nResponse Time: 6ms (GTG)..\r\nViewing Angle: Vertical Viewing Angle: 178°.\r\nContrast Ratio: 1000:1.\r\nAspect Ratio: 16:9.\r\nRefresh Rate: 60HZ.\r\nConnectivity: HDMI Interface.\r\nPower Type: 100 - 240 VAC 50/60 Hz.\r\nColor: Black.\r\nWarranty: 2 Years Warranty, 12 Months Parts & Service Warranty.', 'n1.jpeg', 'Desktop Monitor', 6);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `sub_id` int(20) NOT NULL,
  `customer_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`sub_id`, `customer_email`) VALUES
(1, 'taheri@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int(20) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `vendor_email` varchar(255) NOT NULL,
  `vendor_phone` varchar(255) NOT NULL,
  `vendor_address` varchar(255) NOT NULL,
  `vendor_password` varchar(255) NOT NULL,
  `vendor_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `vendor_name`, `shop_name`, `vendor_email`, `vendor_phone`, `vendor_address`, `vendor_password`, `vendor_img`) VALUES
(1, 'Masum Rayhan', 'GetQuick Store', 'masum1907@cseku.ac.bd', '01709115882', 'Khulna, Bangladesh', '1234', 'u2.jpg'),
(2, 'Sayakat Mondal', 'SpeedPack', 'saykat1911@cseku.ac.bd', '01745272595', 'Gollamari,Khulna', 'saykat', 'u3.jpg'),
(3, 'Md. Helal Uddin', 'Anadea', 'helal@gmail.com', '09756774325', 'Fultola,Khulna', '1234', 'u4.jpg'),
(4, 'Md. Habibul Bashar', 'FreshBooks', 'habib@gmail.com', '01646838476', 'Gollamari,Khulna', '12345', 'u5.jpg'),
(5, 'Faysal Jamal', 'Ecstasy ', 'jamal@gmail.com', '01374646483', 'KDA, Khulna', '12345', 'u7.jpg'),
(6, 'Jalil Mridha', 'Laptop City', 'jalil@gmail.com', '01873645208', 'Zero Point,Khulna', '12345', 'u8.jpg'),
(7, 'Molliq Karmakar', 'Step Khulna', 'malliq@hotmail.com', '01987253670', 'Moilapota,Khulna', 'm1234', 'u9.jpg'),
(8, 'Proloy mondal', 'Ruchishil', 'proloy@gmail.com', '01789374002', 'Sonadanga,Khulna', '1234', 'u10.jpg'),
(9, 'Saykat Biswas', 'Electro', 'saykat1936@cseku.ac.bd', '01394858490', 'Sonadanga,Khulna', '1234', 'u11.jpg'),
(10, 'Bimal Chandra', 'Diamond World', 'bimal@gmail.com', '01524984039', 'Nirala,Khulna', '1234', 'u12.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `sub_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
