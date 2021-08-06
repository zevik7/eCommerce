-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 05:17 PM
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
  `cartQuantity` tinyint(4) NOT NULL,
  `cartDate` datetime NOT NULL COMMENT 'Limit the days of item in cart'
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
  `imageProductType` varchar(20) NOT NULL,
  `imageProductUrl` text NOT NULL,
  `imageProductName` varchar(200) DEFAULT NULL,
  `imageProductDescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_product`
--

INSERT INTO `image_product` (`imageProductId`, `productId`, `imageProductType`, `imageProductUrl`, `imageProductName`, `imageProductDescription`) VALUES
(1, 1, 'thumb', 'public/img/product/giaybitas.jpg', NULL, NULL),
(2, 2, 'thumb', 'public/img/product/aokhoac.jpg', NULL, NULL),
(3, 3, 'thumb', 'public/img/product/chongnang.png', NULL, NULL),
(4, 4, 'thumb', 'public/img/product/bitishunter.jpg', NULL, NULL),
(5, 5, 'thumb', 'public/img/product/giaynika.jpg', NULL, NULL),
(6, 6, 'thumb', 'public/img/product/loabluetooth.jpg', NULL, NULL),
(7, 7, 'thumb', 'public/img/product/son1.png', NULL, NULL),
(8, 8, 'thumb', 'public/img/product/suaruamat.png', NULL, NULL),
(9, 9, 'thumb', 'public/img/product/tinhchat.png', NULL, NULL),
(10, 10, 'thumb', 'public/img/product/quankaki.jpg', NULL, NULL),
(11, 11, 'thumb', 'public/img/product/kem.png', NULL, NULL),
(12, 12, 'thumb', 'public/img/product/balo.jpg', NULL, NULL),
(13, 1, 'collection', 'public/img/product/giaybitas2.jpg', NULL, NULL),
(14, 1, 'collection', 'public/img/product/giaybitas3.jpg', NULL, NULL),
(15, 1, 'collection', 'public/img/product/giaybitas4.jpg', NULL, NULL),
(16, 2, 'collection', 'public/img/product/aokhoac2.jpg', NULL, NULL),
(17, 2, 'collection', 'public/img/product/aokhoac3.jpg', NULL, NULL),
(18, 2, 'collection', 'public/img/product/aokhoac4.jpg', NULL, NULL),
(19, 2, 'collection', 'public/img/product/aokhoac5.jpg', NULL, NULL),
(20, 4, 'collection', 'public/img/product/bitishunter2.jpg', NULL, NULL),
(21, 4, 'collection', 'public/img/product/bitishunter3.jpg', NULL, NULL),
(22, 4, 'collection', 'public/img/product/bitishunter4.jpg', NULL, NULL),
(23, 4, 'collection', 'public/img/product/bitishunter5.jpg', NULL, NULL),
(24, 5, 'collection', 'public/img/product/giaynika2.jpg', NULL, NULL),
(25, 5, 'collection', 'public/img/product/giaynika3.jpg', NULL, NULL),
(26, 5, 'collection', 'public/img/product/giaynika4.jpg', NULL, NULL),
(27, 5, 'collection', 'public/img/product/giaynika5.jpg', NULL, NULL),
(28, 3, 'collection', 'public/img/product/chongnang2.png', NULL, NULL),
(29, 3, 'collection', 'public/img/product/chongnang3.png', NULL, NULL),
(30, 3, 'collection', 'public/img/product/chongnang4.png', NULL, NULL),
(31, 3, 'collection', 'public/img/product/chongnang5.png', NULL, NULL),
(32, 5, 'collection', 'public/img/product/giaynika6.jpg', NULL, NULL),
(33, 5, 'collection', 'public/img/product/giaynika7.jpg', NULL, NULL),
(34, 6, 'collection', 'public/img/product/loabluetooth2.jpg', NULL, NULL),
(35, 6, 'collection', 'public/img/product/loabluetooth3.jpg', NULL, NULL),
(36, 6, 'collection', 'public/img/product/loabluetooth4.jpg', NULL, NULL),
(37, 6, 'collection', 'public/img/product/loabluetooth5.jpg', NULL, NULL),
(38, 6, 'collection', 'public/img/product/loabluetooth6.jpg', NULL, NULL),
(39, 6, 'collection', 'public/img/product/loabluetooth7.jpg', NULL, NULL),
(40, 7, 'collection', 'public/img/product/son1.png', NULL, NULL),
(41, 7, 'collection', 'public/img/product/son2.png', NULL, NULL),
(42, 7, 'collection', 'public/img/product/son3.png', NULL, NULL),
(43, 8, 'collection', 'public/img/product/suaruamat2.png', NULL, NULL),
(44, 8, 'collection', 'public/img/product/suaruamat3.png', NULL, NULL),
(45, 9, 'collection', 'public/img/product/tinhchat2.png', NULL, NULL),
(46, 9, 'collection', 'public/img/product/tinhchat3.png', NULL, NULL),
(47, 9, 'collection', 'public/img/product/tinhchat4.png', NULL, NULL),
(48, 10, 'collection', 'public/img/product/quankaki2.jpg', NULL, NULL),
(49, 10, 'collection', 'public/img/product/quankaki3.jpg', NULL, NULL),
(50, 10, 'collection', 'public/img/product/quankaki4.jpg', NULL, NULL),
(51, 10, 'collection', 'public/img/product/quankaki5.jpg', NULL, NULL),
(52, 10, 'collection', 'public/img/product/quankaki6.jpg', NULL, NULL),
(53, 11, 'thumb', 'public/img/product/kemohui.jpg', NULL, NULL),
(54, 11, 'collection', 'public/img/product/kemohui2.jpg', NULL, NULL),
(55, 11, 'collection', 'public/img/product/kemohui3.jpg', NULL, NULL),
(56, 11, 'collection', 'public/img/product/kemohui4.jpg', NULL, NULL),
(57, 12, 'thumb', 'public/img/product/balo.jpg', NULL, NULL),
(58, 12, 'collection', 'public/img/product/balo2.jpg', NULL, NULL),
(59, 12, 'collection', 'public/img/product/balo3.jpg', NULL, NULL),
(60, 12, 'collection', 'public/img/product/balo4.jpg', NULL, NULL),
(61, 13, 'thumb', 'public/img/product/but.jpg', NULL, NULL),
(62, 13, 'collection', 'public/img/product/but2.jpg', NULL, NULL),
(63, 13, 'collection', 'public/img/product/but3.jpg', NULL, NULL),
(64, 13, 'collection', 'public/img/product/but4.jpg', NULL, NULL),
(65, 13, 'collection', 'public/img/product/but5.jpg', NULL, NULL),
(66, 14, 'thumb', 'public/img/product/balonf.jpg', NULL, NULL),
(67, 14, 'collection', 'public/img/product/balonf2.jpg', NULL, NULL),
(68, 14, 'collection', 'public/img/product/balonf3.jpg', NULL, NULL),
(69, 14, 'collection', 'public/img/product/balonf4.jpg', NULL, NULL),
(70, 15, 'thumb', 'public/img/product/aothun1.jpg', NULL, NULL),
(71, 15, 'collection', 'public/img/product/aothun2.jpg', NULL, NULL),
(72, 15, 'collection', 'public/img/product/aothun3.jpg', NULL, NULL),
(73, 15, 'collection', 'public/img/product/aothun5.jpg', NULL, NULL),
(74, 15, 'collection', 'public/img/product/aothun6.jpg', NULL, NULL),
(75, 15, 'collection', 'public/img/product/aothun4.jpg', NULL, NULL),
(76, 16, 'thumb', 'public/img/product/aothuncool1.jpg', NULL, NULL),
(77, 16, 'collection', 'public/img/product/aothuncool2.jpg', NULL, NULL),
(78, 16, 'collection', 'public/img/product/aothuncool3.jpg', NULL, NULL),
(79, 16, 'collection', 'public/img/product/aothuncool4.jpg', NULL, NULL),
(80, 16, 'collection', 'public/img/product/aothuncool5.jpg', NULL, NULL),
(81, 17, 'thumb', 'public/img/product/quanthethao.jpg', NULL, NULL),
(82, 17, 'collection', 'public/img/product/quanthethao2.jpg', NULL, NULL),
(83, 17, 'collection', 'public/img/product/quanthethao3.jpg', NULL, NULL),
(84, 17, 'collection', 'public/img/product/quanthethao4.jpg', NULL, NULL),
(85, 18, 'thumb', 'public/img/product/mubaohiem.jpg', NULL, NULL),
(86, 18, 'collection', 'public/img/product/mubaohiem2.jpg', NULL, NULL),
(87, 18, 'collection', 'public/img/product/mubaohiem3.jpg', NULL, NULL),
(88, 18, 'collection', 'public/img/product/mubaohiem4.jpg', NULL, NULL),
(89, 18, 'collection', 'public/img/product/mubaohiem5.jpg', NULL, NULL),
(90, 18, 'collection', 'public/img/product/mubaohiem6.jpg', NULL, NULL),
(91, 18, 'collection', 'public/img/product/mubaohiem7.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_user`
--

CREATE TABLE `image_user` (
  `imageUserId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `imageUserType` varchar(20) NOT NULL DEFAULT 'avatar',
  `imageUserName` varchar(200) DEFAULT 'user',
  `imageUserUrl` text NOT NULL,
  `imageUserDescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_user`
--

INSERT INTO `image_user` (`imageUserId`, `userId`, `imageUserType`, `imageUserName`, `imageUserUrl`, `imageUserDescription`) VALUES
(1, 1, 'avatar', NULL, 'public/img/user/avatar.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `orderStatus` varchar(20) NOT NULL,
  `orderRatingStatusl` varchar(20) DEFAULT NULL,
  `orderTotal` decimal(19,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderId`, `userId`, `orderDate`, `orderStatus`, `orderRatingStatusl`, `orderTotal`) VALUES
(1, 1, '0000-00-00 00:00:00', 'done', NULL, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orderDetailId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productTypeId` int(11) NOT NULL,
  `orderDetailQuantity` tinyint(4) NOT NULL,
  `orderDetailPrice` decimal(19,2) NOT NULL,
  `orderDetailTotal` decimal(19,2) NOT NULL
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
  `productCategoryId` int(11) NOT NULL,
  `productName` varchar(400) CHARACTER SET utf8mb4 NOT NULL,
  `productQuantity` int(11) DEFAULT NULL,
  `productDescription` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `productDiscount` decimal(3,2) DEFAULT NULL,
  `productSource` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `productSendFrom` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `productSold` int(11) DEFAULT 0,
  `productBrand` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `productDate` datetime NOT NULL,
  `productRating` float(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `shopId`, `productCategoryId`, `productName`, `productQuantity`, `productDescription`, `productDiscount`, `productSource`, `productSendFrom`, `productSold`, `productBrand`, `productDate`, `productRating`) VALUES
(1, 1, 1, 'Giày thể thao Bitas Hunter X White Collection', 576, 'BỘ ĐẾ LITEFOAM 2.0 CÙNG CÔNG NGHỆ LITEKNIT SIÊU THOÁNG KHÍ 👟 Giày Thể Thao Biti\'s Hunter Core 2k20 với công nghệ LiteFoam độc quyền từ Biti\'s Hunter mang đến những cải tiến vượt bậc \"Nhẹ như bay\", chất liệu quen thuộc cải tiến với thiết kế cổ vớ mang đến vẻ ngoài thời trang, năng động, êm ái và tăng chiều cao đế đến 4.3cm mang đến cảm giác mới mẻ. 👟 Dòng sản phẩm cở bản vẫn tiếp tục giữ những ưu điểm trong tính năng được ưa chuộng: + Mũ quai dệt Liteknit nhẹ, siêu thoáng, co dãn tốt và ôm sát chân trong mỗi chuyển động, đem lại cảm giác vừa vặn với đôi chân. 👟 Đế tiếp LiteFoam 2.0 đảm bảo tính ma sát và trải nghiệm tuyệt vời hơn trên từng chuyển động: + Chất liệu Phylon: Nhẹ như bay. + Chiều cao có thể đạt tới 4.3cm. + Độ đàn hồi >40%. Điều kiện và thời gian bảo hành: Thời gian hỗ trợ bảo hành kể từ ngày mua hàng: 3 tháng kể từ ngày mua hàng. Điều kiện áp dụng: Khách hàng mua sản phẩm Biti’s sẽ được bảo hành miễn phí đối với các trường hợp sau: Hở keo, dứt chỉ, gãy móc khoá, bung hoạ tiết trang trí (nơ, nút, hoa, …) Khi bảo hành khách hàng phải cung cấp hóa đơn (phiếu xuất hàng) và phiếu bảo hành của sản phẩm. Thời gian xử lý bảo hành: Từ 1 đến 20 ngày làm việc kể từ ngày nhà máy nhận được sản phẩm tùy mức độ hư hỏng của giày dép. Không hỗ trợ đối với những sản phẩm có thông báo: không áp dụng đổi trả - bảo hành. Địa điểm tiếp nhận bảo hành: Tại tất cả các cửa hàng tiếp thị của Biti’s trên toàn quốc. Kho online của Biti’s tại địa chỉ: 95/6 Trần Văn Kiểu, P.10, Q.6 Lưu ý: Trường hợp hết thời gian bảo hành, giày dép hư hỏng do hao mòn tự nhiên hoặc bị tác động mạnh từ bên ngoài CHTT tiếp nhận bảo hành tuy nhiên chi phí sửa chữa và vận chuyển khách hàng thanh toán. Hàng chậm, Xu hướng chậm không được bảo hành. BẢNG SIZE CHART Độ dài chân 99-105mm : Size 18 Độ dài chân 106-112mm : Size 19 Độ dài chân 112-118mm : Size 20 Độ dài chân 119-125mm : Size 21 Độ dài chân 125-131mm : Size 22 Độ dài chân 132-138mm : Size 23 Độ dài chân 139-145mm : Size 24 Độ dài chân 145-151mm : Size 25 Độ dài chân 152-158mm : Size 26 Độ dài chân 159-165mm : Size 27 Độ dài chân 165-171mm : Size 28 Độ dài chân 172-178mm : Size 29 Độ dài chân 179-185mm : Size 30 Độ dài chân 185-191mm : Size 31 Độ dài chân 192-198mm : Size 32 Độ dài chân 199-205mm : Size 33 Độ dài chân 205-211mm : Size 34 Độ dài chân 212-218mm : Size 35 Độ dài chân 219-225mm : Size 36 Độ dài chân 225-231mm : Size 37 Độ dài chân 232-238mm : Size 38 Độ dài chân 239-245mm : Size 39 Độ dài chân 245-251mm : Size 40 Độ dài chân 252-258mm : Size 41 Độ dài chân 259-265mm : Size 42 Độ dài chân 266-272mm : Size 43 Độ dài chân 272-278mm : Size 44 Độ dài chân 279-285mm : Size 45', '0.10', 'Trung Quốc', 'TP. Hồ Chí Minh', 1, 'Bitas', '0000-00-00 00:00:00', 4.0),
(2, 1, 1, 'Áo Khoác Bomber Ny Full Da Unisex', NULL, 'Áo, Quần form rộng, mặc cực thoải mái cho cả Nam lẫn Nữ.', '0.10', 'Việt Nam', 'TP. Hồ Chí Minh', 0, 'Laza', '0000-00-00 00:00:00', NULL),
(3, 1, 6, 'Kem Chống Nắng Nâng Tone Innisfree Tone Up No Sebum Sunscreen SPF50/PA+++', NULL, 'Kem chống nắng No Sebum chứa bột xốp giúp kiềm dầu và mồ hôi trên da, ngoài ra còn giúp nâng tone-giúp sáng da.', '0.20', 'Nhật Bản', 'TP. Hồ Chí Minh', 0, 'Orem', '0000-00-00 00:00:00', NULL),
(4, 1, 2, 'Giày Bita\'s Hunter Street Black Line 2k20', NULL, 'Đôi giày không chỉ vật thể hiện cá tính, mà còn là người bạn đồng hành trên mỗi hành trình trải nghiệm.', '0.30', 'Trung Quốc', 'TP. Hồ Chí Minh', 0, 'Bitas', '0000-00-00 00:00:00', NULL),
(5, 1, 2, 'Giày Thể Thao Nike Nam Chạy Bộ CARRY OVER AIR MAX', 0, 'Chất liệu: Polyester, chất liệu tổng hợp, cao su', '0.12', 'Việt Nam', 'Q. Cái Răng, Cần Thơ', 0, 'Nike', '0000-00-00 00:00:00', NULL),
(6, 1, 3, 'Loa Bluetooth Di Động LG Xboomgo PL2 - Hàng Chính Hãng', 976, 'Đơn giản mà thời trang', '0.19', 'Việt Nam', 'Q. Cầu Giấy, Hà Nội', 0, 'Ubl', '0000-00-00 00:00:00', NULL),
(7, 1, 6, 'Son Môi Mini Garden Roses Matte Lipstick Version 2019 6ML PV993', 188, 'Roses Matte Lipstick với sáng chế Đột Phá Mới X3 Resin Technologies - Mỹ tạo lớp màng kháng nước tuyệt vời chống lem, chống trôi giúp tăng khả năng bám màu gấp 3 lần lên đến 24h.', '0.31', 'Hàn Quốc', 'TP. Bắc Ninh', 0, 'Beauful', '0000-00-00 00:00:00', NULL),
(8, 1, 6, 'Sữa rửa mặt ngăn ngừa lão hóa Pond\'s Age Miracle 100g', 278, 'Với phức hợp Intelligent Pro-cell Complex gồm 6 dưỡng chất chuyên biệt giúp thúc đẩy quá trình tái tạo da tại tầng biểu bì, chống lão hóa da.', '0.45', 'Việt Nam', 'TP.Hồ Chí Minh', 0, 'Pond', '0000-00-00 00:00:00', NULL),
(9, 1, 6, 'Bộ đôi tinh chất củng cố cốt lõi ngăn lão hóa OHUI Prime Advancer Ampoule Serum', 145, 'Prime Advancer Ampoule Serum có khả năng củng cố, tăng cường sức mạnh cho phần cốt lõi, đồng thời Prime Advancer Ampoule Serum sẽ đảm nhận nhiệm vụ duy trì làn da của ta ở trạng thái khỏe mạnh, tươi tắn và tràn trề sức sống nhất', '0.40', 'Việt Nam', 'Bắc Từ Liêm, Hà Nội', 0, 'Ohui', '0000-00-00 00:00:00', NULL),
(10, 1, 1, 'Quần kaki dài nam chất vải cotton có giãn siêu đẹp LADOS ', 1499, 'Thiết kế theo form Slimfit , dáng gọn, tôn dám trẻ trung- thông số phù hợp với người việt nam', '0.32', 'Hàn Quốc', 'Q. Ninh Kiều, Cần Thơ', 0, 'Lados', '0000-00-00 00:00:00', NULL),
(11, 1, 6, 'Kem dưỡng chống lão hoá trẻ hoá da Ohui Prime Advancer Ampoul Capture Cream/ Mỹ phẩm công ty chính h', 223, 'Kem dưỡng OHUI Prime Advancer Ampoule Capture Cream là một trong những sản phẩm có nhiều tính năng nhất. Rất được lòng giới chị em xứ sở Kim Chi.', '0.23', 'Nhật Bản', 'Đà Nẵng', 0, 'Ohui', '0000-00-00 00:00:00', NULL),
(12, 1, 1, 'Balo nam Hàn Quốc Cao Cấp HARAS', 500, 'Balo nam HARAS được gia công bằng chất liệu vải đảm bảo độ bền chắc theo thời gian. Loại chất liệu này góp phần hạn chế tối đa tình trạng sờn cũ, phai màu sau một thời gian dài sử dụng.', '0.43', 'Trung Quốc', 'Ninh Bình', 0, 'Haras', '0000-00-00 00:00:00', NULL),
(13, 1, 1, 'BÚT BI KÝ PARKER VECTOR CAO CẤP - NÉT 1.0mm', 400, 'Phong cách và sự ổn định là yếu tố giúp VECTOR trở thành sản phẩm được yêu thích của sinh viên và chuyên gia. Với mục tiêu cung cấp hiệu suất sử dụng cao, bút VECTOR đảm bảo sự ổn định và trải nghiệm viết mượt mà tại mọi thời điểm.', '0.25', 'Việt Nam', 'TP. Hồ Chí Minh', 0, 'Thiên Long', '0000-00-00 00:00:00', NULL),
(14, 1, 1, 'Balo du lịch, balo laptop [ HÀNG XUẤT DƯ ] Balo TNF Refactor Dufflel Pack - Thiết kế thông minh CHỐNG NƯỚC CHỐNG BÁM BỤ', 300, '☑️ Sức chứa lớn với khoang chứa đồ rộng: quần áo, đồ cá nhân,...cho chuyến đi 3-4 ngày', '0.17', 'Indonesia', 'Quận Hai Bà Trưng, Hà Nội', 0, 'TNF Refactor Dufflel Pack ', '0000-00-00 00:00:00', NULL),
(15, 1, 1, 'Áo thun Polo nam GOBO hình Pugdog vải cá sấu Cotton xuất xịn - POLOMAN', NULL, 'Nổi bật - Tinh tế trên từng chi tiết mà POLOMAN mang đến cho các bạn sự trải nghiệm đơn giản mà sang trọng. ', '0.12', 'Việt Nam', 'uận Quận Tân Phú, TP. Hồ Chí Minh', 0, 'GOBO ', '0000-00-00 00:00:00', NULL),
(16, 1, 1, 'Áo thun nam Cotton Compact phiên bản Premium chống nhăn màu xanh lam thương hiệu Coolmate', NULL, 'Áo thun nam Cotton Compact phiên bản Premium chống nhăn màu xanh lam - BlueBeauty Tee', '0.39', 'Việt Nam', 'Quận Hà Đông, Hà Nội', 0, 'Cotton Compact ', '0000-00-00 00:00:00', NULL),
(17, 1, 1, 'Quần thể thao nam hàng vnxk cao cấp, quần short thun thể thao nam cực chất.', 1000, 'Quần thể thao nam hàng vnxk cao cấp, quần short thun thể thao nam cực chất.', '0.26', 'Mỹ', 'Quận Tân Bình, TP. Hồ Chí Minh', 0, 'No brand', '0000-00-00 00:00:00', NULL),
(18, 1, 1, 'Mũ Bảo Hiểm 3/4 Royal M139 kính V5 bảo hành 12 tháng Shop mũ 192', 1000, 'ĐẶC ĐIỂM ROYAL M139: Năng động về ngoại hình không kén người đội. Sự lựa chọn tối ưu cho nhiều nam thanh nữ tú. ⚡ Phiên bản nâng cấp qua nhiều chi tiết 💎 Thiết kế đơn giản và tinh tế, phù hợp với mọi loại xe và màu xe. 💎 - Vỏ bằng nhựa ABS nguyên sinh - là loại nhựa tinh khiết chưa qua sử dụng, được sử dụng cho các sản phẩm tiêu chuẩn an toàn cao vỏ thiết bị y tế, dược phẩm, vỏ máy bay.... có độ bền cao và chịu va đập tốt. - Phần đệm lót bên trong nón còn có lớp vải kháng khuẩn, chống ẩm, rất tốt cho việc bảo vệ chiếc nón khỏi mùi hôi, ẩm mốc - Kính có thể kéo lên kéo xuống tiện lợi 💎 Vòng đầu từ 53-55cm: Chọn size M - Vòng đầu từ 56-57cm: Chọn size L - Vòng đầu từ 58-60cm: Chọn size XL Hướng dẫn xác định cỡ mũ phù hợp: + Vòng 1 sợi dây quanh đầu, ngay phía trên lông mày và tai. Xiết sợi dây sao cho ôm vừa đủ thoải mái lấy đầu và ghi lại số đo đó. Lặp lại như vậy để tìm được số đo mà bạn thấy đầu dễ chịu nhất và sử dụng số đo đó. 💎 Trọng lượng: 950g ± 50g 💎 Viền nón được thay thế bởi chất liệu mới, nổi bật hơn, dễ dàng vệ sinh, lau chùi khi có vết bẩn. 💎 Với ốp tai tháo rời thuận tiện cho việc vệ sinh chống ẩm ướt, mùi hôi khi sử dụng lâu ngày. 💎 Chất lượng đạt chuẩn quốc tế, với giá cực tốt. Royal là thương hiệu số 1 Việt Nam, các sản phẩm được kiểm tra kỹ càng qua công đoạn QC đảm bảo 100%. Khách hàng có thể thấy tem QC màu đỏ được dán đảm bảo 100% sản phẩm ra thị trường đều đạt chuẩn. Đồng thời, Royal M139 đạt chuẩn chất lượng theo tiêu chuẩn Quatest', '0.12', 'Việt Nam', 'Thành Phố Thủ Đức, TP. Hồ Chí Minh', 0, 'Royal', '0000-00-00 00:00:00', NULL);

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
(5, 'Quà tặng'),
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
  `productRatingComment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_rating`
--

INSERT INTO `product_rating` (`productRatingId`, `productId`, `userId`, `productRatingStar`, `productRatingComment`) VALUES
(1, 1, 1, 4, 'Tạm ổn, chất lượng vải khá tốt nhưng may chưa được đẹp'),
(2, 1, 1, 5, 'Áo đẹp nha mụi ngừ !!!'),
(3, 1, 1, 3, 'Buồn nên cho 3 sao');

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
  `productTypeLabelId` int(11) DEFAULT NULL,
  `productTypeName` varchar(200) DEFAULT NULL,
  `productTypeQuantity` int(11) DEFAULT NULL,
  `productTypePrice` decimal(19,2) DEFAULT NULL,
  `productFreightCost` decimal(19,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`productTypeId`, `productId`, `productTypeLabelId`, `productTypeName`, `productTypeQuantity`, `productTypePrice`, `productFreightCost`) VALUES
(1, 1, 1, 'Size 39', 24, '378000.00', NULL),
(2, 1, 1, 'Size 40', 240, '378000.00', NULL),
(3, 1, 1, 'Size 41', 120, '378000.00', NULL),
(4, 1, 1, 'Size 40', 120, '378000.00', NULL),
(5, 1, 1, 'Size 41', 120, '378000.00', NULL),
(6, 1, 1, 'Size 42', 120, '378000.00', NULL),
(7, 2, 1, 'Size M', 50, '823000.00', NULL),
(8, 2, 1, 'Size L', 25, '823000.00', NULL),
(9, 2, 1, 'Size XL', 25, '823000.00', NULL),
(10, 3, 2, '300g', 20, '322000.00', NULL),
(11, 3, 2, '400g', 20, '610000.00', NULL),
(12, 3, 2, '500g', 20, '78100.00', NULL),
(13, 3, 2, '200g', 20, '210000.00', NULL),
(14, 3, 2, '100g', 33, '190000.00', NULL),
(15, 4, 1, 'Size 39', 25, '2020000.00', NULL),
(16, 4, 1, 'Size 40', 25, '2020000.00', NULL),
(17, 4, 1, 'Size 41', 25, '2020000.00', NULL),
(18, 4, 1, 'Size 42', 25, '2020000.00', NULL),
(19, 5, 1, 'Size 38', 32, '1521000.00', NULL),
(20, 5, 1, 'Size 39', 230, '1521000.00', NULL),
(21, 5, 1, 'Size 40', 123, '1521000.00', NULL),
(22, 5, 1, 'Size 41', 322, '1521000.00', NULL),
(62, 5, 1, 'Size 42', 0, '1521000.00', NULL),
(63, 6, 3, 'Nhập khẩu', 124, '760000.00', NULL),
(64, 6, 3, 'Chính hãng', 752, '980000.00', NULL),
(65, 7, 5, 'Màu đỏ', 74, '340000.00', NULL),
(66, 7, 5, 'Màu hồng', 14, '348000.00', NULL),
(67, 8, 2, 'Chai 200ml', 23, '150000.00', NULL),
(68, 8, 2, 'Chai 400ml', 57, '230000.00', NULL),
(69, 8, 2, 'Chai 700ml', 98, '340000.00', NULL),
(70, 9, 1, 'Size M', 45, '670000.00', NULL),
(71, 10, 1, 'Size 29', 54, '341000.00', NULL),
(72, 10, 1, 'Size 30', 34, '341000.00', NULL),
(73, 10, 1, 'Size 31', 965, '341000.00', NULL),
(74, 10, 1, 'Size 32', 346, '341000.00', NULL),
(81, 11, 0, '', 123, '299000.00', NULL),
(91, 12, 5, 'Màu đen', 100, '567000.00', NULL),
(92, 12, 5, 'Màu bạc', 100, '567000.00', NULL),
(93, 12, 5, 'Màu xanh', 100, '567000.00', NULL),
(94, 12, 5, 'Màu đỏ', 100, '567000.00', NULL),
(95, 13, 5, 'Vàng', 100, '890000.00', NULL),
(96, 13, 5, 'Vàng + đen', 100, '810000.00', NULL),
(97, 13, 5, 'Vàng + trắng', 100, '700000.00', NULL),
(98, 13, 5, 'Vàng + bạc', 100, '760000.00', NULL),
(99, 14, 0, NULL, 300, '978000.00', NULL),
(100, 15, 1, 'Size M', 100, '341000.00', NULL),
(101, 15, 1, 'Size L', 100, '341000.00', NULL),
(102, 15, 1, 'Size XL', 100, '341000.00', NULL),
(103, 15, 1, 'Size XXL', 100, '341000.00', NULL),
(104, 16, 1, 'Size M', 100, '341000.00', NULL),
(105, 16, 1, 'Size L', 100, '341000.00', NULL),
(106, 16, 1, 'Sile XL', 100, '341000.00', NULL),
(107, 16, 1, 'Size XXL', 100, '341000.00', NULL),
(108, 16, 5, 'Màu đỏ', 100, '341000.00', NULL),
(109, 16, 5, 'Màu đen', 100, '341000.00', NULL),
(110, 16, 5, 'Màu xanh đậm', 100, '341000.00', NULL),
(111, 16, 5, 'Màu tím than', 100, '341000.00', NULL),
(112, 16, 5, 'Màu xám', 100, '341000.00', NULL),
(113, 16, 5, 'Màu đỏ đô', 100, '341000.00', NULL),
(114, 17, 1, 'Size M', 100, '241000.00', NULL),
(115, 17, 1, 'Size L', 100, '241000.00', NULL),
(116, 17, 1, 'Size XL', 100, '241000.00', NULL),
(117, 17, 1, 'Size XXL', 100, '241000.00', NULL),
(118, 17, 5, 'Màu đỏ', 100, '241000.00', NULL),
(119, 17, 5, 'Màu đen', 100, '241000.00', NULL),
(120, 17, 5, 'Màu xanh đậm', 100, '241000.00', NULL),
(121, 17, 5, 'Màu tím than', 100, '241000.00', NULL),
(122, 17, 5, 'Màu xám', 100, '241000.00', NULL),
(123, 17, 5, 'Màu đỏ đô', 100, '241000.00', NULL),
(124, 18, 1, 'Size M', 100, '669000.00', NULL),
(125, 18, 1, 'Size L', 100, '669000.00', NULL),
(126, 18, 1, 'Size XL', 100, '669000.00', NULL),
(127, 18, 1, 'Size XXL', 100, '669000.00', NULL),
(128, 18, 5, 'Màu đỏ', 100, '669000.00', NULL),
(129, 18, 5, 'Màu đen', 100, '669000.00', NULL),
(130, 18, 5, 'Màu xanh đậm', 100, '669000.00', NULL),
(131, 18, 5, 'Màu tím than', 100, '669000.00', NULL),
(132, 18, 5, 'Màu xám', 100, '669000.00', NULL),
(133, 18, 5, 'Màu đỏ đô', 100, '669000.00', NULL);

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
-- Table structure for table `product_type_label`
--

CREATE TABLE `product_type_label` (
  `productTypeLabelId` int(11) NOT NULL,
  `productTypeLabelName` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type_label`
--

INSERT INTO `product_type_label` (`productTypeLabelId`, `productTypeLabelName`) VALUES
(1, 'Kích cỡ'),
(2, 'Loại'),
(3, 'Nguồn gốc'),
(4, 'Tính năng'),
(5, 'Màu sắc');

-- --------------------------------------------------------

--
-- Table structure for table `product_type_sub`
--

CREATE TABLE `product_type_sub` (
  `productTypeSubId` int(11) NOT NULL,
  `productTypeId` int(11) NOT NULL,
  `productTypeLabelId` int(11) DEFAULT NULL,
  `productTypeSubName` varchar(200) DEFAULT NULL,
  `productTypeSubQuantity` int(11) DEFAULT NULL,
  `productTypeSubPrice` decimal(19,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type_sub`
--

INSERT INTO `product_type_sub` (`productTypeSubId`, `productTypeId`, `productTypeLabelId`, `productTypeSubName`, `productTypeSubQuantity`, `productTypeSubPrice`) VALUES
(1, 100, 5, 'Màu trắng', 100, '346000.00'),
(2, 100, 5, 'Màu đen', 100, '376000.00'),
(4, 101, 5, 'Màu trắng', 100, '346000.00'),
(5, 101, 5, 'Màu đen', 100, '376000.00'),
(6, 102, 5, 'Màu trắng', 100, '346000.00'),
(7, 102, 5, 'Màu đen', 100, '376000.00'),
(8, 103, 5, 'Màu trắng', 100, '346000.00'),
(9, 103, 5, 'Màu đen', 100, '376000.00');

--
-- Triggers `product_type_sub`
--
DELIMITER $$
CREATE TRIGGER `product_type_sub_AFTER_DELETE` AFTER DELETE ON `product_type_sub` FOR EACH ROW BEGIN
	set @productTypeId = OLD.productTypeId;
    set @quantityOld = OLD.productTypeSubQuantity;
	update product_type
		set productTypeQuantity = productTypeQuantity - @quantityOld
		where (productTypeId = @productTypeId);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `product_type_sub_AFTER_INSERT` AFTER INSERT ON `product_type_sub` FOR EACH ROW BEGIN
	set @productTypeId = NEW.productTypeId;
    set @productTypeSubQuantity = NEW.productTypeSubQuantity;
    -- Check null
    set @productTypeQuantity = (select productTypeQuantity from product_type where productTypeId = @productTypeId);
	IF @productTypeQuantity IS NULL THEN
			update product_type
				set productTypeQuantity = @quantityTypeSubQuantity
			where (productTypeId = @productTypeId);
	ELSE
			update product_type
				set productTypeQuantity = productTypeQuantity + @productTypeSubQuantity
			where (productTypeId = @productTypeId);
	END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `product_type_sub_AFTER_UPDATE` AFTER UPDATE ON `product_type_sub` FOR EACH ROW BEGIN
	set @productTypeId = NEW.productTypeId;
    set @quantityNew = NEW.productTypeSubQuantity;
	update product_type
		set productTypeQuantity = productTypeQuantity + @quantityNew
	where (productTypeId = @productTypeId);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `product_type_sub_BEFORE_UPDATE` BEFORE UPDATE ON `product_type_sub` FOR EACH ROW BEGIN
	set @productTypeSubId = NEW.productTypeSubId;
	set @productTypeId = NEW.productTypeId;
    set @quantityOld = (select productTypeSubQuantity from product_type_sub where productTypeSubId = @productTypeSubId);
	update product_type
		set productTypeQuantity = productTypeQuantity - @quantityOld
	where (productTypeId = @productTypeId);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shopId` int(11) NOT NULL,
  `shopEmail` varchar(200) NOT NULL,
  `shopPassword` varchar(64) NOT NULL,
  `shopName` varchar(200) NOT NULL,
  `shopAdress` text NOT NULL,
  `shopPhone` varchar(20) NOT NULL,
  `shopJoinDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shopId`, `shopEmail`, `shopPassword`, `shopName`, `shopAdress`, `shopPhone`, `shopJoinDate`) VALUES
(1, 'shop01@gmail.com', '123456', 'Shop 01', 'Hà Nội', '0912312123', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userEmail` varchar(200) NOT NULL,
  `userPhone` varchar(20) DEFAULT NULL,
  `userPassword` varchar(64) NOT NULL,
  `userName` varchar(200) DEFAULT NULL,
  `userAddress` text DEFAULT NULL,
  `userAvatar` text DEFAULT NULL
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
  `voucherCode` varchar(200) DEFAULT NULL,
  `voucherDate` date NOT NULL,
  `voucherDateValid` date NOT NULL,
  `voucherDiscount` decimal(3,2) DEFAULT NULL,
  `voucherPrice` decimal(19,2) DEFAULT NULL,
  `voucherPriceMinToUse` decimal(19,2) DEFAULT NULL,
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
  ADD KEY `oder_detail_fk1_idx` (`productTypeId`);

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
  ADD KEY `product_type_fk1_idx` (`productId`),
  ADD KEY `product_type_fk2_idx` (`productTypeLabelId`);

--
-- Indexes for table `product_type_label`
--
ALTER TABLE `product_type_label`
  ADD PRIMARY KEY (`productTypeLabelId`);

--
-- Indexes for table `product_type_sub`
--
ALTER TABLE `product_type_sub`
  ADD PRIMARY KEY (`productTypeSubId`);

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
  MODIFY `imageProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

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
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product_rating`
--
ALTER TABLE `product_rating`
  MODIFY `productRatingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `productTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `product_type_label`
--
ALTER TABLE `product_type_label`
  MODIFY `productTypeLabelId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_type_sub`
--
ALTER TABLE `product_type_sub`
  MODIFY `productTypeSubId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  ADD CONSTRAINT `order_detail_fk2` FOREIGN KEY (`productTypeId`) REFERENCES `product_type` (`productTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
