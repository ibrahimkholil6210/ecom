-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2018 at 07:00 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`) VALUES
(3, 'Bookcases & Shelving'),
(4, 'Beds'),
(5, 'Chairs'),
(6, 'Desks'),
(7, 'Wardrobes'),
(8, 'Sofas'),
(9, 'Dressers & Drawers');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_ids` varchar(255) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '1',
  `amount` varchar(255) NOT NULL,
  `shipping_address` text NOT NULL,
  `bkash_number` varchar(255) DEFAULT NULL,
  `bkash_transection_id` varchar(255) DEFAULT NULL,
  `token_no` varchar(25) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `user_id`, `product_ids`, `order_status`, `amount`, `shipping_address`, `bkash_number`, `bkash_transection_id`, `token_no`, `date`) VALUES
(1, 4, '3', 2, '19575', 'Rajshahi-6000, Bangladesh', '01733333333', 'TXNID1234567890', '413', '2018-12-22 11:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_cat_id` int(11) NOT NULL,
  `product_details` text NOT NULL,
  `product_image` text NOT NULL,
  `product_featured` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `product_price`, `product_cat_id`, `product_details`, `product_image`, `product_featured`) VALUES
(1, 'Utas08 Back Adjustable Gaming Mesh Chair - Black', 9499, 5, '\r\nMesh Fabric <br>\r\nGood quality Foam and fiber<br>\r\nAdjustable Armrest<br>\r\nSS Base<br>\r\nBest Quality gaslift and Mechanism<br>', '6fbdf6eeb0ce663b8030e56f84defc39.jpg', 0),
(2, 'SK T1 Gaming Chair D015 - Blue', 30000, 5, 'Material: PVC Leather<br>\r\nArmrest: Stationary soft surface<br>\r\nBase: 350mm black and blue nylon<br>\r\nRacking Range: 90-180 degrees<br>\r\nWeight Bearing: 200KG<br>\r\nPillow: 2 Pillows<br>\r\nFoam: 1 seat cushion; memory foam 2 backrest; virgin cotton<br>\r\nFramework: 1.5 foreign trade steel frame, Steel [late 50*6<br>\r\nGas lift: 2 class shuangbao<br>\r\nAngle adjuster: Toyota 86<br>\r\nCastor: 200 mm quite, pu, black and blue millet castor<br>\r\nMechanism: 19 / butterfly mechanism<br>', 'a33d018ce96818baae7a0e7b65c7f5.jpg', 0),
(3, 'HCTC-111 Computer Table - Wooden', 3915, 6, 'Dimension/size: 3.2*1.3*2.8 ft <br>\r\nNo Installation Charge Needed All Over Bangladesh<br>\r\nGenerous rectangular work surface<br>\r\nIdeal for both home or office<br>\r\nDesigned with storage shelves to save your space<br>\r\nTop - 18 mm thick laminated board with 2 mm ABS edging<br>\r\nProvided with cable Management ports<br>\r\nMajor Material: Laminated Board,<br>\r\nColor: Antique<br>\r\nProduct type : Computer Table<br>', 'a33d018ce96818baae7a0e7b65c7f745.jpg', 0),
(4, 'Medium Density Fiberboard Showcase - Dark Chokolate', 19200, 3, 'Material: Medium Density Fiberboard<br>\r\nHeight: 6 Feet<br>\r\nWidth: 4 Feet<br>\r\nDepth: 16 inch<br>', '83de61eb01fee1bd5c2d3de78580b629.jpg', 0),
(5, 'Malaysian Processing Wood Book Shelve - White', 7500, 3, 'Seller will take 10 days extra to Make the product ready<br>\r\nMaterial: Malaysian Processed Wood<br>\r\nHeight: 3 Feet<br>\r\nWidth: 1 Feet<br>\r\nDepth:12 Inch<br>\r\nExclusive design<br>', '348c5edc36f2714740b4f2970276b0be.jpg', 0),
(6, 'Malaysian Processed Wood Wall Hanging Shelf - Black', 7950, 3, 'Material: Malaysian Processed Wood<br>\r\nHeight:18 inch<br>\r\nWidth:63 inch<br>\r\nDepth: 6 inch<br>', '0c1e90324585af826d7cde21be070c76.jpg', 0),
(7, 'Double Air Sofa Bed Black 5 in 1', 5577, 4, 'Inflatable Sofa come Bed<br>\r\nSofa transforms easily into a bed<br>\r\nCompact Storage <br>\r\nCoil-beam construction provides excellent support for the body<br>\r\nConvenient folding design for different functions<br>', '75507f7f8dc22b1461b455f030bdca5d.jpg', 0),
(8, 'Silver Wardrobe - 4 Drawer - Black and White', 3700, 7, 'Superior Quality Product<br>\r\nImpeccable design<br>\r\nSize: L -43,W -40, H - 95<br>\r\nGleaming finish<br>\r\nSturdy built<br>\r\nSuperior grade plastic<br>\r\nCrack resistance<br>', 'b790bfd81dd4881297a95daaee5c9004.jpg', 0),
(9, 'HCX Wardrobe Closet Storage Organizer Clothes Rack - Gray', 2500, 7, 'High Quality Product<br>\r\nHigh Quality Material<br>\r\nEasy to Use<br>\r\nSize: 130*45*175<br>\r\nSize: Big Size Three Part<br>\r\n\r\n<br>\r\n<p>Essentially you need a wardrobe in your room to keep all of your clothes, scarves and more. It would be amazing to have a multi-functional and useful wardrobe with a pop of color in your room just like the King Size Multi functional Wardrobe. This wardrobe is an innovative idea and concept that will surely keep your home clean and tidy. It is an excellent space saving solution to organize your clothes, lingerie, socks, accessories, and ties. Use it to store old clothes that you rarely wear to create more space for your main wardrobe. </p>', 'f7122765fbb401e5427439038dcde7e4.jpg', 0),
(10, 'SA-389 - Box Design Wooden Sofa Set - Brown and Black', 16000, 8, 'Product Type: Sofa Set<br>\r\nMaterial: Malaysian Wood<br>\r\nOther Material: Solid Foam and Cotton Fabric<br>\r\nLucrative Design<br>\r\nSofa Seat: 2+2+1= 5 seat<br>\r\n<br>\r\n\r\n<p>This Sofa Set is made up with strongest, most durable of Wood and can last for many years if properly cared for. Wood is very common example of hardwood. This Furniture\'s design is unique and exceptional. It will increase the decorative smartness of your room. And yet, its finish makes its beautiful look hard to scratch or stain. Youâ€™ll be pleasantly surprised by the durability and stability of this Sofa Set.</p>', 'dd9ae9df8e823ee41a36684f7b94b24a.jpg', 0),
(11, 'DR 46 - Malaysian Processed Wood Dressing Table - Dark Chocolate', 16500, 9, 'Product Type: Dinning set <br>\r\nMaterial: Best Quality Malaysian Process Wood<br>\r\nEasy to Assemble<br>\r\nLucrative Design<br>\r\n<br>\r\n\r\n<p>This Dressing Table is made up with strongest, most durable of Malaysian Processed Wood and can last for many years if properly cared for. Malaysian Processed Wood is very common example of hardwood. This Furniture\'s design is unique and exceptional. It will increase the decorative smartness of your room. And yet, its finish makes its beautiful look hard to scratch or stain. Youâ€™ll be pleasantly surprised by the durability and stability of this Dressing Table .</p>', 'c6dace862cd203ff41d9b62af3753863.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `image` text NOT NULL,
  `DOB` date NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `fullname`, `password`, `role`, `image`, `DOB`, `address`) VALUES
(4, 'admin@gmail.com', 'Mustafiz Falguni', '12345', 1, '78c2e1dbb6c736e39fa98fbe8723fc77.jpg', '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
