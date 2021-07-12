-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 07:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productTypeId` int(11) NOT NULL,
  `cartQuantity` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `cart`
--
DELIMITER $$
CREATE TRIGGER `cart_AFTER_DELETE` AFTER DELETE ON `cart` FOR EACH ROW BEGIN
	set @quantity = OLD.cartQuantity;
    set @productTypeId = OLD.productTypeId;
	update product_type
		set productTypeQuantity = productTypeQuantity + @quantity
	where (productTypeId = @productTypeId);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cart_AFTER_INSERT` AFTER INSERT ON `cart` FOR EACH ROW BEGIN
	set @quantity = NEW.cartQuantity;
    set @productTypeId = NEW.productTypeId;
	update product_type
		set productTypeQuantity = productTypeQuantity - @quantity
	where (productTypeId = @productTypeId);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cart_AFTER_UPDATE` AFTER UPDATE ON `cart` FOR EACH ROW BEGIN
    set @productTypeId = NEW.productTypeId;
    set @quantityNew = NEW.cartQuantity;
	update product_type
		set productTypeQuantity = productTypeQuantity - @quantityNew
	where (productTypeId = @productTypeId);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cart_BEFORE_UPDATE` BEFORE UPDATE ON `cart` FOR EACH ROW BEGIN
	set @productTypeId = NEW.productTypeId;
    set @userId = NEW.userId;
    set @quantityOld = (select cartQuantity from cart where productTypeId = @productTypeId and userId = @userId);
	update product_type
		set productTypeQuantity = productTypeQuantity + @quantityOld
	where (productTypeId = @productTypeId);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `image_product`
--

CREATE TABLE `image_product` (
  `imageProductId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `imageProductType` varchar(20) DEFAULT NULL,
  `imageProductName` varchar(200) DEFAULT NULL,
  `imageProductUrl` varchar(400) NOT NULL,
  `imageProductDescription` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_product`
--

INSERT INTO `image_product` (`imageProductId`, `productId`, `imageProductType`, `imageProductName`, `imageProductUrl`, `imageProductDescription`) VALUES
(1, 1, 'thumb', 'thumb', 'public/img/product/giaybitas.jpg', NULL),
(2, 2, 'thumb', 'thumb', 'public/img/product/aokhoac.jpg', NULL),
(3, 3, 'thumb', 'thumb', 'public/img/product/chongnang.png', NULL),
(4, 4, 'thumb', 'thumb', 'public/img/product/giaybitas.jpg', NULL),
(5, 5, 'thumb', 'thumb', 'public/img/product/giaynika.jpg', NULL),
(6, 6, 'thumb', 'thumb', 'public/img/product/loabluetooth.jpg', NULL),
(7, 7, 'thumb', 'thumb', 'public/img/product/son.png', NULL),
(8, 8, 'thumb', 'thumb', 'public/img/product/suaruamat.png', NULL),
(9, 9, 'thumb', 'thumb', 'public/img/product/tinhchat.png', NULL),
(10, 10, 'thumb', 'thumb', 'public/img/product/quankaki.jpg', NULL),
(11, 11, 'thumb', 'thumb', 'public/img/product/kem.png', NULL),
(12, 12, 'thumb', 'thumb', 'public/img/product/balo.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_user`
--

CREATE TABLE `image_user` (
  `imageUserId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `imageUserType` varchar(20) DEFAULT NULL,
  `imageUserName` varchar(200) DEFAULT NULL,
  `imageUserUrl` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_user`
--

INSERT INTO `image_user` (`imageUserId`, `userId`, `imageUserType`, `imageUserName`, `imageUserUrl`) VALUES
(1, 1, 'avatar', NULL, 'public/img/user/avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `orderStatus` varchar(20) NOT NULL,
  `orderTotal` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderId`, `userId`, `orderDate`, `orderStatus`, `orderTotal`) VALUES
(1, 1, '0000-00-00 00:00:00', 'done', '0');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orderDetailId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `shopId` int(11) NOT NULL,
  `productTypeId` int(11) NOT NULL,
  `orderDetailQuantity` tinyint(4) NOT NULL,
  `orderDetailTotal` decimal(11,0) NOT NULL,
  `orderDetailPrice` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `order_detail`
--
DELIMITER $$
CREATE TRIGGER `order_detail_AFTER_DELETE` AFTER DELETE ON `order_detail` FOR EACH ROW BEGIN
	set @quantity = OLD.orderDetailQuantity;
    set @productTypeId = OLD.productTypeId;
	update product_type
		set productTypeQuantity = productTypeQuantity + @quantity
	where (productTypeId = @productTypeId);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `order_detail_AFTER_INSERT` AFTER INSERT ON `order_detail` FOR EACH ROW BEGIN
	set @quantity = NEW.orderDetailQuantity;
    set @productTypeId = NEW.productTypeId;
	update product_type
		set productTypeQuantity = productTypeQuantity - @quantity
	where (productTypeId = @productTypeId);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `order_detail_AFTER_UPDATE` AFTER UPDATE ON `order_detail` FOR EACH ROW BEGIN
	set @productTypeId = NEW.productTypeId;
    set @quantityNew = NEW.orderDetailQuantity;
	update product_type
		set productTypeQuantity = productTypeQuantity - @quantityNew
	where (productTypeId = @productTypeId);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `order_detail_BEFORE_UPDATE` BEFORE UPDATE ON `order_detail` FOR EACH ROW BEGIN
	set @orderId = NEW.orderId;
	set @productTypeId = NEW.productTypeId;
    set @quantityOld = (select orderDetailQuantity from order_detail where productTypeId = @productTypeId and orderId = @orderId);
	update product_type
		set productTypeQuantity = productTypeQuantity + @quantityOld
	where (productTypeId = @productTypeId);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `shopId` int(11) NOT NULL,
  `productName` varchar(400) NOT NULL,
  `productCategoryId` int(11) NOT NULL,
  `productQuantity` int(11) DEFAULT NULL,
  `productDescription` varchar(1000) DEFAULT NULL,
  `productDiscount` decimal(3,2) DEFAULT NULL,
  `productSource` varchar(200) DEFAULT NULL,
  `productSold` int(11) DEFAULT 0,
  `productBrand` varchar(200) DEFAULT NULL,
  `productDate` datetime DEFAULT NULL,
  `productRating` float(2,1) DEFAULT NULL,
  `productImageThumbs` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `shopId`, `productName`, `productCategoryId`, `productQuantity`, `productDescription`, `productDiscount`, `productSource`, `productSold`, `productBrand`, `productDate`, `productRating`, `productImageThumbs`) VALUES
(1, 1, 'Giày adadas', 1, NULL, 'Đây là mô tả giày', '0.10', 'Trung Quốc', 0, 'Adadas', NULL, 4.5, 'public/img/product/tinhchat.png'),
(2, 1, 'Áo Khoác Bomber Ny Full Da Unisex', 1, NULL, 'Áo, Quần form rộng, mặc cực thoải mái cho cả Nam lẫn Nữ.', '0.10', 'Việt Nam', 11, 'Laza', NULL, NULL, 'public/img/product/tinhchat.png'),
(3, 1, 'Kem Chống Nắng Nâng Tone Innisfree Tone Up No Sebum Sunscreen SPF50/PA+++', 6, NULL, 'Kem chống nắng No Sebum chứa bột xốp giúp kiềm dầu và mồ hôi trên da, ngoài ra còn giúp nâng tone-giúp sáng da.', '0.20', 'Nhật Bản', 25, 'Orem', NULL, NULL, 'public/img/product/tinhchat.png'),
(4, 1, 'Giày Bita\'s Hunter Street Black Line 2k20', 2, NULL, 'Đôi giày không chỉ vật thể hiện cá tính, mà còn là người bạn đồng hành trên mỗi hành trình trải nghiệm.', '0.30', 'Trung Quốc', 150, 'Bitas', NULL, NULL, 'public/img/product/tinhchat.png'),
(5, 1, 'Giày Thể Thao Nike Nam Chạy Bộ CARRY OVER AIR MAX', 2, 0, 'Chất liệu: Polyester, chất liệu tổng hợp, cao su', '0.12', 'Việt Nam', 113, 'Nike', NULL, NULL, 'public/img/product/tinhchat.png'),
(6, 1, 'Loa Bluetooth Di Động LG Xboomgo PL2 - Hàng Chính Hãng', 3, 976, 'Đơn giản mà thời trang', '0.19', 'Việt Nam', 326, 'Ubl', NULL, NULL, 'public/img/product/tinhchat.png'),
(7, 1, 'Son Môi Mini Garden Roses Matte Lipstick Version 2019 6ML PV993', 6, 188, 'Roses Matte Lipstick với sáng chế Đột Phá Mới X3 Resin Technologies - Mỹ tạo lớp màng kháng nước tuyệt vời chống lem, chống trôi giúp tăng khả năng bám màu gấp 3 lần lên đến 24h.', '0.31', 'Hàn Quốc', 596, 'Beauful', NULL, NULL, 'public/img/product/tinhchat.png'),
(8, 1, 'Sữa rửa mặt ngăn ngừa lão hóa Pond\'s Age Miracle 100g', 6, 278, 'Với phức hợp Intelligent Pro-cell Complex gồm 6 dưỡng chất chuyên biệt giúp thúc đẩy quá trình tái tạo da tại tầng biểu bì, chống lão hóa da.', '0.45', 'Việt Nam', 32, 'Pond', NULL, NULL, 'public/img/product/tinhchat.png'),
(9, 1, 'Bộ đôi tinh chất củng cố cốt lõi ngăn lão hóa OHUI Prime Advancer Ampoule Serum', 6, 145, 'Prime Advancer Ampoule Serum có khả năng củng cố, tăng cường sức mạnh cho phần cốt lõi, đồng thời Prime Advancer Ampoule Serum sẽ đảm nhận nhiệm vụ duy trì làn da của ta ở trạng thái khỏe mạnh, tươi tắn và tràn trề sức sống nhất', '0.40', 'Việt Nam', 18, 'Ohui', NULL, NULL, 'public/img/product/tinhchat.png'),
(10, 1, 'Quần kaki dài nam chất vải cotton có giãn siêu đẹp LADOS ', 1, 1499, 'Thiết kế theo form Slimfit , dáng gọn, tôn dám trẻ trung- thông số phù hợp với người việt nam', '0.32', 'Hàn Quốc', 23, 'Lados', NULL, NULL, 'public/img/product/tinhchat.png'),
(11, 1, 'Kem dưỡng chống lão hoá trẻ hoá da Ohui Prime Advancer Ampoul Capture Cream/ Mỹ phẩm công ty chính h', 6, 164, 'Kem dưỡng OHUI Prime Advancer Ampoule Capture Cream là một trong những sản phẩm có nhiều tính năng nhất. Rất được lòng giới chị em xứ sở Kim Chi.', '0.23', 'Nhật Bản', 59, 'Ohui', NULL, NULL, 'public/img/product/tinhchat.png'),
(12, 1, 'Balo nam Hàn Quốc Cao Cấp HARAS', 1, 556, 'Balo nam HARAS được gia công bằng chất liệu vải đảm bảo độ bền chắc theo thời gian. Loại chất liệu này góp phần hạn chế tối đa tình trạng sờn cũ, phai màu sau một thời gian dài sử dụng.', '0.43', 'Trung Quốc', 29, 'Haras', NULL, NULL, 'public/img/product/tinhchat.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `productCategoryId` int(11) NOT NULL,
  `productCategoryName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`productCategoryId`, `productCategoryName`) VALUES
(1, 'Thời trang'),
(2, 'Giày'),
(3, 'Đồ điện tử'),
(4, 'Sách'),
(5, 'Giày dép'),
(6, 'Mỹ phẩm');

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

CREATE TABLE `product_rating` (
  `productRatingId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productRatingStar` tinyint(4) NOT NULL,
  `productRatingComment` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_rating`
--

INSERT INTO `product_rating` (`productRatingId`, `productId`, `userId`, `productRatingStar`, `productRatingComment`) VALUES
(1, 1, 1, 4, NULL),
(2, 1, 1, 5, NULL);

--
-- Triggers `product_rating`
--
DELIMITER $$
CREATE TRIGGER `product_rating_AFTER_DELETE` AFTER DELETE ON `product_rating` FOR EACH ROW BEGIN
	set @productId = OLD.productId;
	update product
		set productRating = (select AVG(productRatingStar) from product_rating where productId = @productId)
	where (productId = @productId);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `product_rating_AFTER_INSERT` AFTER INSERT ON `product_rating` FOR EACH ROW BEGIN
	set @productId = NEW.productId;
    set @newRatingStar = NEW.productRatingStar;
	set @ratingStar = (select productRating from product where productId = @productId);
	IF @ratingStar IS NULL THEN
			update product
				set productRating = @newRatingStar
			where (productId = @productId);
	ELSE
			update product
				set productRating = (select AVG(productRatingStar) from product_rating where productId = @productId)
			where (productId = @productId);
	END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `product_rating_AFTER_UPDATE` AFTER UPDATE ON `product_rating` FOR EACH ROW BEGIN
	set @productId = NEW.productId;
	update product
		set productRating = (select AVG(productRatingStar) from product_rating where productId = @productId)
	where (productId = @productId);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `productTypeId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productTypeName` varchar(200) NOT NULL,
  `productTypeQuantity` int(11) NOT NULL,
  `productTypePrice` decimal(11,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`productTypeId`, `productId`, `productTypeName`, `productTypeQuantity`, `productTypePrice`) VALUES
(1, 1, 'Size 39', 19, '142000'),
(2, 1, 'Size 40', 30, '142000'),
(3, 1, 'Size 41', 19, '142000'),
(4, 1, 'Size 40', 40, '300000'),
(5, 1, 'Size 41', 30, '300000'),
(6, 1, 'Size 42', 30, '300000'),
(7, 2, 'Size M', 50, '800000'),
(8, 2, 'Size L', 25, '800000'),
(9, 2, 'Size XL', 25, '800000'),
(10, 3, '300g', 20, '300000'),
(11, 3, '400g', 20, '250000'),
(12, 3, '50g', 20, '80000'),
(13, 3, '200g', 20, '180000'),
(14, 3, '100g', 20, '120000'),
(15, 4, 'Size 39', 25, '2000000'),
(16, 4, 'Size 40', 25, '2000000'),
(17, 4, 'Size 41', 25, '2000000'),
(18, 4, 'Size 42', 25, '2000000'),
(19, 5, 'Size 38', 32, '1521000'),
(20, 5, 'Size 39', 230, '1521000'),
(21, 5, 'Size 40', 123, '1521000'),
(22, 5, 'Size 41', 322, '1521000'),
(62, 5, 'Size 42', 0, '1521000'),
(63, 6, 'Nhập khẩu', 124, '760000'),
(64, 6, 'Chính hãng', 752, '980000'),
(65, 7, 'Màu đỏ', 74, '340000'),
(66, 7, 'Màu hồng', 14, '348000'),
(67, 8, 'Chai 200ml', 23, '150000'),
(68, 8, 'Chai 400ml', 57, '230000'),
(69, 8, 'Chai 700ml', 98, '340000'),
(70, 9, '', 45, '670000'),
(71, 10, 'Size 29', 54, '341000'),
(72, 10, 'Size 30', 34, '341000'),
(73, 10, 'Size 31', 965, '341000'),
(74, 10, 'Size 32', 346, '341000'),
(75, 11, '', 64, '983000'),
(76, 12, '', 456, '568000');

--
-- Triggers `product_type`
--
DELIMITER $$
CREATE TRIGGER `product_type_AFTER_DELETE` AFTER DELETE ON `product_type` FOR EACH ROW BEGIN
	set @productId = OLD.productId;
    set @quantityOld = OLD.productTypeQuantity;
	update product
		set productQuantity = productQuantity - @quantityOld
		where (productId = @productId);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `product_type_AFTER_INSERT` AFTER INSERT ON `product_type` FOR EACH ROW BEGIN
	set @productId = NEW.productId;
    set @quantityNew = NEW.productTypeQuantity;
    -- Check null
    set @productQuantity = (select productQuantity from product where productId = @productId);
	IF @productQuantity IS NULL THEN
			update product
				set productQuantity = @quantityNew
			where (productId = @productId);
	ELSE
			update product
				set productQuantity = productQuantity + @quantityNew
			where (productId = @productId);
	END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `product_type_AFTER_UPDATE` AFTER UPDATE ON `product_type` FOR EACH ROW BEGIN
	set @productTypeId = NEW.productTypeId;
	set @productId = NEW.productId;
    set @quantityNew = NEW.productTypeQuantity;
	update product
		set productQuantity = productQuantity + @quantityNew
	where (productId = @productId);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `product_type_BEFORE_UPDATE` BEFORE UPDATE ON `product_type` FOR EACH ROW BEGIN
	set @productTypeId = NEW.productTypeId;
	set @productId = NEW.productId;
    set @quantityOld = (select productTypeQuantity from product_type where productTypeId = @productTypeId);
	update product
		set productQuantity = productQuantity - @quantityOld
	where (productId = @productId);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shopId` int(11) NOT NULL,
  `shopEmail` varchar(320) NOT NULL,
  `shopPassword` varchar(64) NOT NULL,
  `shopName` varchar(200) NOT NULL,
  `shopAdress` varchar(400) NOT NULL,
  `shopPhone` varchar(20) NOT NULL,
  `shopDateJoin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shopId`, `shopEmail`, `shopPassword`, `shopName`, `shopAdress`, `shopPhone`, `shopDateJoin`) VALUES
(1, 'shop01@gmail.com', '123456', 'Shop 01', 'Hà Nội', '0912312123', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userEmail` varchar(320) NOT NULL,
  `userPhone` varchar(20) DEFAULT NULL,
  `userPassword` varchar(64) NOT NULL,
  `userName` varchar(200) DEFAULT NULL,
  `userAddress` varchar(400) DEFAULT NULL,
  `userAvatar` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userEmail`, `userPhone`, `userPassword`, `userName`, `userAddress`, `userAvatar`) VALUES
(1, 'monnatyz@gmail.com', '0898007389', '12345678', 'Monnaty', 'Hậu Giang', 'public/img/user/avatar.png'),
(2, 'phu@mgmail.com', '0898007388', '12312378', 'Phú', 'Cần Thơ', NULL),
(5, 'monnatyz@gmail.commm', '0898007380', '123123123', 'Thien Phu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `voucherId` int(11) NOT NULL,
  `shopId` int(11) NOT NULL,
  `voucherDate` date NOT NULL,
  `voucherDateValid` date NOT NULL,
  `voucherDiscount` decimal(2,1) DEFAULT NULL,
  `voucherPrice` decimal(11,0) DEFAULT NULL,
  `voucherQuantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `cart_fk1_idx` (`userId`),
  ADD KEY `cart_fk2_idx` (`productTypeId`);

--
-- Indexes for table `image_product`
--
ALTER TABLE `image_product`
  ADD PRIMARY KEY (`imageProductId`),
  ADD KEY `image_product_fk1_idx` (`productId`);

--
-- Indexes for table `image_user`
--
ALTER TABLE `image_user`
  ADD PRIMARY KEY (`imageUserId`),
  ADD KEY `image_user_fk1_idx` (`userId`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`),
  ADD UNIQUE KEY `orderId_UNIQUE` (`orderId`),
  ADD KEY `MSKH` (`userId`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orderDetailId`),
  ADD KEY `order_detail_fk1_idx` (`orderId`),
  ADD KEY `oder_detail_fk1_idx` (`productTypeId`),
  ADD KEY `order_detail_fk3_idx` (`shopId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `product_fk1_idx` (`shopId`),
  ADD KEY `product_fk2_idx` (`productCategoryId`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`productCategoryId`);

--
-- Indexes for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD PRIMARY KEY (`productRatingId`),
  ADD KEY `product_rating_fk1_idx` (`userId`),
  ADD KEY `product_rating_fk2_idx` (`productId`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`productTypeId`),
  ADD KEY `product_type_fk1_idx` (`productId`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shopId`),
  ADD UNIQUE KEY `shopId_UNIQUE` (`shopId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userId_UNIQUE` (`userId`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucherId`),
  ADD KEY `voucher_fk1_idx` (`shopId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `image_product`
--
ALTER TABLE `image_product`
  MODIFY `imageProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `image_user`
--
ALTER TABLE `image_user`
  MODIFY `imageUserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orderDetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_rating`
--
ALTER TABLE `product_rating`
  MODIFY `productRatingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `productTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shopId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucherId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_fk1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cart_fk2` FOREIGN KEY (`productTypeId`) REFERENCES `product_type` (`productTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `image_product`
--
ALTER TABLE `image_product`
  ADD CONSTRAINT `image_product_fk1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `image_user`
--
ALTER TABLE `image_user`
  ADD CONSTRAINT `image_user_fk1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_fk1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_fk1` FOREIGN KEY (`orderId`) REFERENCES `order` (`orderId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_detail_fk2` FOREIGN KEY (`productTypeId`) REFERENCES `product_type` (`productTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_detail_fk3` FOREIGN KEY (`shopId`) REFERENCES `shop` (`shopId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_fk1` FOREIGN KEY (`shopId`) REFERENCES `shop` (`shopId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_fk2` FOREIGN KEY (`productCategoryId`) REFERENCES `product_category` (`productCategoryId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD CONSTRAINT `product_rating_fk1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_rating_fk2` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_type`
--
ALTER TABLE `product_type`
  ADD CONSTRAINT `product_type_fk1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `voucher_fk1` FOREIGN KEY (`shopId`) REFERENCES `shop` (`shopId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
