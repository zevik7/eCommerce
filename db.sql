-- MySQL dump 10.13  Distrib 8.0.24, for Win64 (x86_64)
--
-- Host: localhost    Database: ecommerce
-- ------------------------------------------------------
-- Server version	5.7.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `productTypeId` int(11) DEFAULT NULL,
  `cartQuantity` tinyint(4) NOT NULL,
  `cartDate` datetime NOT NULL COMMENT 'Limit the days of item in cart',
  PRIMARY KEY (`cartId`),
  KEY `cart_fk1_idx` (`userId`),
  CONSTRAINT `cart_fk1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (1,1,1,12,'2020-03-03 01:01:10'),(2,1,3,1,'2020-03-03 01:01:10'),(3,1,5,10,'2020-03-03 01:01:10');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imageable_id` int(11) NOT NULL,
  `imageable_type` varchar(200) DEFAULT NULL,
  `type` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,1,'product','thumb','public/img/giaybitas.jpg',NULL,NULL),(2,2,'product','thumb','public/img/aokhoac.jpg',NULL,NULL),(3,3,'product','thumb','public/img/chongnang.png',NULL,NULL),(4,4,'product','thumb','public/img/bitishunter.jpg',NULL,NULL),(5,5,'product','thumb','public/img/giaynika.jpg',NULL,NULL),(6,6,'product','thumb','public/img/loabluetooth.jpg',NULL,NULL),(7,7,'product','thumb','public/img/son1.png',NULL,NULL),(8,8,'product','thumb','public/img/suaruamat.png',NULL,NULL),(9,9,'product','thumb','public/img/tinhchat.png',NULL,NULL),(10,10,'product','thumb','public/img/quankaki.jpg',NULL,NULL),(11,11,'product','thumb','public/img/kem.png',NULL,NULL),(12,12,'product','thumb','public/img/balo.jpg',NULL,NULL),(13,1,'product','collection','public/img/giaybitas2.jpg',NULL,NULL),(14,1,'product','collection','public/img/giaybitas3.jpg',NULL,NULL),(15,1,'product','collection','public/img/giaybitas4.jpg',NULL,NULL),(16,2,'product','collection','public/img/aokhoac2.jpg',NULL,NULL),(17,2,'product','collection','public/img/aokhoac3.jpg',NULL,NULL),(18,2,'product','collection','public/img/aokhoac4.jpg',NULL,NULL),(19,2,'product','collection','public/img/aokhoac5.jpg',NULL,NULL),(20,4,'product','collection','public/img/bitishunter2.jpg',NULL,NULL),(21,4,'product','collection','public/img/bitishunter3.jpg',NULL,NULL),(22,4,'product','collection','public/img/bitishunter4.jpg',NULL,NULL),(23,4,'product','collection','public/img/bitishunter5.jpg',NULL,NULL),(24,5,'product','collection','public/img/giaynika2.jpg',NULL,NULL),(25,5,'product','collection','public/img/giaynika3.jpg',NULL,NULL),(26,5,'product','collection','public/img/giaynika4.jpg',NULL,NULL),(27,5,'product','collection','public/img/giaynika5.jpg',NULL,NULL),(28,3,'product','collection','public/img/chongnang2.png',NULL,NULL),(29,3,'product','collection','public/img/chongnang3.png',NULL,NULL),(30,3,'product','collection','public/img/chongnang4.png',NULL,NULL),(31,3,'product','collection','public/img/chongnang5.png',NULL,NULL),(32,5,'product','collection','public/img/giaynika6.jpg',NULL,NULL),(33,5,'product','collection','public/img/giaynika7.jpg',NULL,NULL),(34,6,'product','collection','public/img/loabluetooth2.jpg',NULL,NULL),(35,6,'product','collection','public/img/loabluetooth3.jpg',NULL,NULL),(36,6,'product','collection','public/img/loabluetooth4.jpg',NULL,NULL),(37,6,'product','collection','public/img/loabluetooth5.jpg',NULL,NULL),(38,6,'product','collection','public/img/loabluetooth6.jpg',NULL,NULL),(39,6,'product','collection','public/img/loabluetooth7.jpg',NULL,NULL),(40,7,'product','collection','public/img/son1.png',NULL,NULL),(41,7,'product','collection','public/img/son2.png',NULL,NULL),(42,7,'product','collection','public/img/son3.png',NULL,NULL),(43,8,'product','collection','public/img/suaruamat2.png',NULL,NULL),(44,8,'product','collection','public/img/suaruamat3.png',NULL,NULL),(45,9,'product','collection','public/img/tinhchat2.png',NULL,NULL),(46,9,'product','collection','public/img/tinhchat3.png',NULL,NULL),(47,9,'product','collection','public/img/tinhchat4.png',NULL,NULL),(48,10,'product','collection','public/img/quankaki2.jpg',NULL,NULL),(49,10,'product','collection','public/img/quankaki3.jpg',NULL,NULL),(50,10,'product','collection','public/img/quankaki4.jpg',NULL,NULL),(51,10,'product','collection','public/img/quankaki5.jpg',NULL,NULL),(52,10,'product','collection','public/img/quankaki6.jpg',NULL,NULL),(53,11,'product','thumb','public/img/kemohui.jpg',NULL,NULL),(54,11,'product','collection','public/img/kemohui2.jpg',NULL,NULL),(55,11,'product','collection','public/img/kemohui3.jpg',NULL,NULL),(56,11,'product','collection','public/img/kemohui4.jpg',NULL,NULL),(57,12,'product','thumb','public/img/balo.jpg',NULL,NULL),(58,12,'product','collection','public/img/balo2.jpg',NULL,NULL),(59,12,'product','collection','public/img/balo3.jpg',NULL,NULL),(60,12,'product','collection','public/img/balo4.jpg',NULL,NULL),(61,13,'product','thumb','public/img/but.jpg',NULL,NULL),(62,13,'product','collection','public/img/but2.jpg',NULL,NULL),(63,13,'product','collection','public/img/but3.jpg',NULL,NULL),(64,13,'product','collection','public/img/but4.jpg',NULL,NULL),(65,13,'product','collection','public/img/but5.jpg',NULL,NULL),(66,14,'product','thumb','public/img/balonf.jpg',NULL,NULL),(67,14,'product','collection','public/img/balonf2.jpg',NULL,NULL),(68,14,'product','collection','public/img/balonf3.jpg',NULL,NULL),(69,14,'product','collection','public/img/balonf4.jpg',NULL,NULL),(70,15,'product','thumb','public/img/aothun1.jpg',NULL,NULL),(71,15,'product','collection','public/img/aothun2.jpg',NULL,NULL),(72,15,'product','collection','public/img/aothun3.jpg',NULL,NULL),(73,15,'product','collection','public/img/aothun5.jpg',NULL,NULL),(74,15,'product','collection','public/img/aothun6.jpg',NULL,NULL),(75,15,'product','collection','public/img/aothun4.jpg',NULL,NULL),(76,16,'product','thumb','public/img/aothuncool1.jpg',NULL,NULL),(77,16,'product','collection','public/img/aothuncool2.jpg',NULL,NULL),(78,16,'product','collection','public/img/aothuncool3.jpg',NULL,NULL),(79,16,'product','collection','public/img/aothuncool4.jpg',NULL,NULL),(80,16,'product','collection','public/img/aothuncool5.jpg',NULL,NULL),(81,17,'product','thumb','public/img/quanthethao.jpg',NULL,NULL),(82,17,'product','collection','public/img/quanthethao2.jpg',NULL,NULL),(83,17,'product','collection','public/img/quanthethao3.jpg',NULL,NULL),(84,17,'product','collection','public/img/quanthethao4.jpg',NULL,NULL),(85,18,'product','thumb','public/img/mubaohiem.jpg',NULL,NULL),(86,18,'product','collection','public/img/mubaohiem2.jpg',NULL,NULL),(87,18,'product','collection','public/img/mubaohiem3.jpg',NULL,NULL),(88,18,'product','collection','public/img/mubaohiem4.jpg',NULL,NULL),(89,18,'product','collection','public/img/mubaohiem5.jpg',NULL,NULL),(90,18,'product','collection','public/img/mubaohiem6.jpg',NULL,NULL),(91,18,'product','collection','public/img/mubaohiem7.jpg',NULL,NULL),(92,1,'user','avatar','public/img/avatar.png',NULL,NULL);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `orderStatus` varchar(20) NOT NULL,
  PRIMARY KEY (`orderId`),
  UNIQUE KEY `orderId_UNIQUE` (`orderId`),
  KEY `MSKH` (`userId`),
  CONSTRAINT `order_fk1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,1,'0000-00-00 00:00:00','done');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_detail` (
  `orderDetailId` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` int(11) NOT NULL,
  `productTypeId` int(11) NOT NULL,
  `orderDetailQuantity` tinyint(4) NOT NULL,
  PRIMARY KEY (`orderDetailId`),
  KEY `order_detail_fk1_idx` (`orderId`),
  KEY `oder_detail_fk1_idx` (`productTypeId`),
  CONSTRAINT `order_detail_fk1` FOREIGN KEY (`orderId`) REFERENCES `order` (`orderId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `order_detail_fk2` FOREIGN KEY (`productTypeId`) REFERENCES `product_type` (`productTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `shopId` int(11) NOT NULL,
  `productCategoryId` int(11) NOT NULL,
  `productName` varchar(400) CHARACTER SET utf8mb4 NOT NULL,
  `productQuantity` int(11) DEFAULT NULL,
  `productDescription` text CHARACTER SET utf8mb4,
  `productDiscount` decimal(3,2) DEFAULT NULL,
  `productSource` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `productSendFrom` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `productSold` int(11) DEFAULT '0',
  `productBrand` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `productDate` datetime NOT NULL,
  `productRating` float(2,1) DEFAULT NULL,
  PRIMARY KEY (`productId`),
  KEY `product_fk1_idx` (`shopId`),
  KEY `product_fk2_idx` (`productCategoryId`),
  CONSTRAINT `product_fk1` FOREIGN KEY (`shopId`) REFERENCES `shop` (`shopId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `product_fk2` FOREIGN KEY (`productCategoryId`) REFERENCES `product_category` (`productCategoryId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,1,1,'Giày thể thao Bitas Hunter X White Collection',753,'BỘ ĐẾ LITEFOAM 2.0 CÙNG CÔNG NGHỆ LITEKNIT SIÊU THOÁNG KHÍ ? Giày Thể Thao Biti\'s Hunter Core 2k20 với công nghệ LiteFoam độc quyền từ Biti\'s Hunter mang đến những cải tiến vượt bậc \"Nhẹ như bay\", chất liệu quen thuộc cải tiến với thiết kế cổ vớ mang đến vẻ ngoài thời trang, năng động, êm ái và tăng chiều cao đế đến 4.3cm mang đến cảm giác mới mẻ. ? Dòng sản phẩm cở bản vẫn tiếp tục giữ những ưu điểm trong tính năng được ưa chuộng: + Mũ quai dệt Liteknit nhẹ, siêu thoáng, co dãn tốt và ôm sát chân trong mỗi chuyển động, đem lại cảm giác vừa vặn với đôi chân. ? Đế tiếp LiteFoam 2.0 đảm bảo tính ma sát và trải nghiệm tuyệt vời hơn trên từng chuyển động: + Chất liệu Phylon: Nhẹ như bay. + Chiều cao có thể đạt tới 4.3cm. + Độ đàn hồi >40%. Điều kiện và thời gian bảo hành: Thời gian hỗ trợ bảo hành kể từ ngày mua hàng: 3 tháng kể từ ngày mua hàng. Điều kiện áp dụng: Khách hàng mua sản phẩm Biti’s sẽ được bảo hành miễn phí đối với các trường hợp sau: Hở keo, dứt chỉ, gãy móc khoá, bung hoạ tiết trang trí (nơ, nút, hoa, …) Khi bảo hành khách hàng phải cung cấp hóa đơn (phiếu xuất hàng) và phiếu bảo hành của sản phẩm. Thời gian xử lý bảo hành: Từ 1 đến 20 ngày làm việc kể từ ngày nhà máy nhận được sản phẩm tùy mức độ hư hỏng của giày dép. Không hỗ trợ đối với những sản phẩm có thông báo: không áp dụng đổi trả - bảo hành. Địa điểm tiếp nhận bảo hành: Tại tất cả các cửa hàng tiếp thị của Biti’s trên toàn quốc. Kho online của Biti’s tại địa chỉ: 95/6 Trần Văn Kiểu, P.10, Q.6 Lưu ý: Trường hợp hết thời gian bảo hành, giày dép hư hỏng do hao mòn tự nhiên hoặc bị tác động mạnh từ bên ngoài CHTT tiếp nhận bảo hành tuy nhiên chi phí sửa chữa và vận chuyển khách hàng thanh toán. Hàng chậm, Xu hướng chậm không được bảo hành. BẢNG SIZE CHART Độ dài chân 99-105mm : Size 18 Độ dài chân 106-112mm : Size 19 Độ dài chân 112-118mm : Size 20 Độ dài chân 119-125mm : Size 21 Độ dài chân 125-131mm : Size 22 Độ dài chân 132-138mm : Size 23 Độ dài chân 139-145mm : Size 24 Độ dài chân 145-151mm : Size 25 Độ dài chân 152-158mm : Size 26 Độ dài chân 159-165mm : Size 27 Độ dài chân 165-171mm : Size 28 Độ dài chân 172-178mm : Size 29 Độ dài chân 179-185mm : Size 30 Độ dài chân 185-191mm : Size 31 Độ dài chân 192-198mm : Size 32 Độ dài chân 199-205mm : Size 33 Độ dài chân 205-211mm : Size 34 Độ dài chân 212-218mm : Size 35 Độ dài chân 219-225mm : Size 36 Độ dài chân 225-231mm : Size 37 Độ dài chân 232-238mm : Size 38 Độ dài chân 239-245mm : Size 39 Độ dài chân 245-251mm : Size 40 Độ dài chân 252-258mm : Size 41 Độ dài chân 259-265mm : Size 42 Độ dài chân 266-272mm : Size 43 Độ dài chân 272-278mm : Size 44 Độ dài chân 279-285mm : Size 45',0.10,'Trung Quốc','TP. Hồ Chí Minh',1,'Bitas','2020-03-03 01:01:10',4.0),(2,1,1,'Áo Khoác Bomber Ny Full Da Unisex',NULL,'Áo, Quần form rộng, mặc cực thoải mái cho cả Nam lẫn Nữ.',0.10,'Việt Nam','TP. Hồ Chí Minh',0,'Laza','0000-00-00 00:00:00',NULL),(3,1,6,'Kem Chống Nắng Nâng Tone Innisfree Tone Up No Sebum Sunscreen SPF50/PA+++',NULL,'Kem chống nắng No Sebum chứa bột xốp giúp kiềm dầu và mồ hôi trên da, ngoài ra còn giúp nâng tone-giúp sáng da.',0.20,'Nhật Bản','TP. Hồ Chí Minh',0,'Orem','0000-00-00 00:00:00',NULL),(4,1,2,'Giày Bita\'s Hunter Street Black Line 2k20',NULL,'Đôi giày không chỉ vật thể hiện cá tính, mà còn là người bạn đồng hành trên mỗi hành trình trải nghiệm.',0.30,'Trung Quốc','TP. Hồ Chí Minh',0,'Bitas','0000-00-00 00:00:00',NULL),(5,1,2,'Giày Thể Thao Nike Nam Chạy Bộ CARRY OVER AIR MAX',0,'Chất liệu: Polyester, chất liệu tổng hợp, cao su',0.12,'Việt Nam','Q. Cái Răng, Cần Thơ',0,'Nike','2021-03-03 01:01:10',NULL),(6,1,3,'Loa Bluetooth Di Động LG Xboomgo PL2 - Hàng Chính Hãng',976,'Đơn giản mà thời trang',0.19,'Việt Nam','Q. Cầu Giấy, Hà Nội',0,'Ubl','0000-00-00 00:00:00',NULL),(7,1,6,'Son Môi Mini Garden Roses Matte Lipstick Version 2019 6ML PV993',188,'Roses Matte Lipstick với sáng chế Đột Phá Mới X3 Resin Technologies - Mỹ tạo lớp màng kháng nước tuyệt vời chống lem, chống trôi giúp tăng khả năng bám màu gấp 3 lần lên đến 24h.',0.31,'Hàn Quốc','TP. Bắc Ninh',0,'Beauful','0000-00-00 00:00:00',NULL),(8,1,6,'Sữa rửa mặt ngăn ngừa lão hóa Pond\'s Age Miracle 100g',278,'Với phức hợp Intelligent Pro-cell Complex gồm 6 dưỡng chất chuyên biệt giúp thúc đẩy quá trình tái tạo da tại tầng biểu bì, chống lão hóa da.',0.45,'Việt Nam','TP.Hồ Chí Minh',0,'Pond','0000-00-00 00:00:00',NULL),(9,1,6,'Bộ đôi tinh chất củng cố cốt lõi ngăn lão hóa OHUI Prime Advancer Ampoule Serum',145,'Prime Advancer Ampoule Serum có khả năng củng cố, tăng cường sức mạnh cho phần cốt lõi, đồng thời Prime Advancer Ampoule Serum sẽ đảm nhận nhiệm vụ duy trì làn da của ta ở trạng thái khỏe mạnh, tươi tắn và tràn trề sức sống nhất',0.40,'Việt Nam','Bắc Từ Liêm, Hà Nội',10,'Ohui','0000-00-00 00:00:00',NULL),(10,1,1,'Quần kaki dài nam chất vải cotton có giãn siêu đẹp LADOS ',1499,'Thiết kế theo form Slimfit , dáng gọn, tôn dám trẻ trung- thông số phù hợp với người việt nam',0.32,'Hàn Quốc','Q. Ninh Kiều, Cần Thơ',0,'Lados','0000-00-00 00:00:00',NULL),(11,1,6,'Kem dưỡng chống lão hoá trẻ hoá da Ohui Prime Advancer Ampoul Capture Cream/ Mỹ phẩm công ty chính h',223,'Kem dưỡng OHUI Prime Advancer Ampoule Capture Cream là một trong những sản phẩm có nhiều tính năng nhất. Rất được lòng giới chị em xứ sở Kim Chi.',0.23,'Nhật Bản','Đà Nẵng',0,'Ohui','0000-00-00 00:00:00',NULL),(12,1,1,'Balo nam Hàn Quốc Cao Cấp HARAS',500,'Balo nam HARAS được gia công bằng chất liệu vải đảm bảo độ bền chắc theo thời gian. Loại chất liệu này góp phần hạn chế tối đa tình trạng sờn cũ, phai màu sau một thời gian dài sử dụng.',0.43,'Trung Quốc','Ninh Bình',0,'Haras','0000-00-00 00:00:00',NULL),(13,1,1,'BÚT BI KÝ PARKER VECTOR CAO CẤP - NÉT 1.0mm',400,'Phong cách và sự ổn định là yếu tố giúp VECTOR trở thành sản phẩm được yêu thích của sinh viên và chuyên gia. Với mục tiêu cung cấp hiệu suất sử dụng cao, bút VECTOR đảm bảo sự ổn định và trải nghiệm viết mượt mà tại mọi thời điểm.',0.25,'Việt Nam','TP. Hồ Chí Minh',0,'Thiên Long','0000-00-00 00:00:00',NULL),(14,1,1,'Balo du lịch, balo laptop [ HÀNG XUẤT DƯ ] Balo TNF Refactor Dufflel Pack - Thiết kế thông minh CHỐNG NƯỚC CHỐNG BÁM BỤ',300,'☑️ Sức chứa lớn với khoang chứa đồ rộng: quần áo, đồ cá nhân,...cho chuyến đi 3-4 ngày',0.17,'Indonesia','Quận Hai Bà Trưng, Hà Nội',0,'TNF Refactor Dufflel Pack ','0000-00-00 00:00:00',NULL),(15,1,1,'Áo thun Polo nam GOBO hình Pugdog vải cá sấu Cotton xuất xịn - POLOMAN',NULL,'Nổi bật - Tinh tế trên từng chi tiết mà POLOMAN mang đến cho các bạn sự trải nghiệm đơn giản mà sang trọng. ',0.12,'Việt Nam','uận Quận Tân Phú, TP. Hồ Chí Minh',0,'GOBO ','0000-00-00 00:00:00',NULL),(16,1,1,'Áo thun nam Cotton Compact phiên bản Premium chống nhăn màu xanh lam thương hiệu Coolmate',NULL,'Áo thun nam Cotton Compact phiên bản Premium chống nhăn màu xanh lam - BlueBeauty Tee',0.39,'Việt Nam','Quận Hà Đông, Hà Nội',0,'Cotton Compact ','0000-00-00 00:00:00',NULL),(17,1,1,'Quần thể thao nam hàng vnxk cao cấp, quần short thun thể thao nam cực chất.',1000,'Quần thể thao nam hàng vnxk cao cấp, quần short thun thể thao nam cực chất.',0.26,'Mỹ','Quận Tân Bình, TP. Hồ Chí Minh',0,'No brand','0000-00-00 00:00:00',NULL),(18,1,1,'Mũ Bảo Hiểm 3/4 Royal M139 kính V5 bảo hành 12 tháng Shop mũ 192',1000,'ĐẶC ĐIỂM ROYAL M139: Năng động về ngoại hình không kén người đội. Sự lựa chọn tối ưu cho nhiều nam thanh nữ tú. ⚡ Phiên bản nâng cấp qua nhiều chi tiết ? Thiết kế đơn giản và tinh tế, phù hợp với mọi loại xe và màu xe. ? - Vỏ bằng nhựa ABS nguyên sinh - là loại nhựa tinh khiết chưa qua sử dụng, được sử dụng cho các sản phẩm tiêu chuẩn an toàn cao vỏ thiết bị y tế, dược phẩm, vỏ máy bay.... có độ bền cao và chịu va đập tốt. - Phần đệm lót bên trong nón còn có lớp vải kháng khuẩn, chống ẩm, rất tốt cho việc bảo vệ chiếc nón khỏi mùi hôi, ẩm mốc - Kính có thể kéo lên kéo xuống tiện lợi ? Vòng đầu từ 53-55cm: Chọn size M - Vòng đầu từ 56-57cm: Chọn size L - Vòng đầu từ 58-60cm: Chọn size XL Hướng dẫn xác định cỡ mũ phù hợp: + Vòng 1 sợi dây quanh đầu, ngay phía trên lông mày và tai. Xiết sợi dây sao cho ôm vừa đủ thoải mái lấy đầu và ghi lại số đo đó. Lặp lại như vậy để tìm được số đo mà bạn thấy đầu dễ chịu nhất và sử dụng số đo đó. ? Trọng lượng: 950g ± 50g ? Viền nón được thay thế bởi chất liệu mới, nổi bật hơn, dễ dàng vệ sinh, lau chùi khi có vết bẩn. ? Với ốp tai tháo rời thuận tiện cho việc vệ sinh chống ẩm ướt, mùi hôi khi sử dụng lâu ngày. ? Chất lượng đạt chuẩn quốc tế, với giá cực tốt. Royal là thương hiệu số 1 Việt Nam, các sản phẩm được kiểm tra kỹ càng qua công đoạn QC đảm bảo 100%. Khách hàng có thể thấy tem QC màu đỏ được dán đảm bảo 100% sản phẩm ra thị trường đều đạt chuẩn. Đồng thời, Royal M139 đạt chuẩn chất lượng theo tiêu chuẩn Quatest',0.12,'Việt Nam','Thành Phố Thủ Đức, TP. Hồ Chí Minh',0,'Royal','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_category` (
  `productCategoryId` int(11) NOT NULL,
  `productCategoryName` varchar(200) NOT NULL,
  PRIMARY KEY (`productCategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (1,'Thời trang'),(2,'Giày'),(3,'Đồ điện tử'),(4,'Sách'),(5,'Quà tặng'),(6,'Mỹ phẩm');
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_rating`
--

DROP TABLE IF EXISTS `product_rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_rating` (
  `productRatingId` int(11) NOT NULL AUTO_INCREMENT,
  `productTypeId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productRatingStar` tinyint(4) NOT NULL,
  `productRatingComment` text,
  `productRatingDate` datetime DEFAULT NULL,
  PRIMARY KEY (`productRatingId`),
  KEY `product_rating_fk1_idx` (`userId`),
  KEY `product_rating_fk2_idx` (`productTypeId`),
  CONSTRAINT `product_rating_fk1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_rating`
--

LOCK TABLES `product_rating` WRITE;
/*!40000 ALTER TABLE `product_rating` DISABLE KEYS */;
INSERT INTO `product_rating` VALUES (1,1,1,4,'Tạm ổn, chất lượng vải khá tốt nhưng may chưa được đẹp',NULL),(2,1,1,5,'Áo đẹp nha mụi ngừ !!!',NULL),(3,1,1,3,'Buồn nên cho 3 sao',NULL);
/*!40000 ALTER TABLE `product_rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_type`
--

DROP TABLE IF EXISTS `product_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_type` (
  `productTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `productTypeLabel` varchar(20) DEFAULT NULL,
  `productTypeName` varchar(200) DEFAULT NULL,
  `productTypeQuantity` int(11) DEFAULT NULL,
  `productTypePrice` decimal(19,2) DEFAULT NULL,
  `productFreightCost` decimal(19,2) DEFAULT NULL,
  `productTypeParentId` int(11) DEFAULT NULL,
  PRIMARY KEY (`productTypeId`),
  KEY `product_type_fk1_idx` (`productId`),
  CONSTRAINT `product_type_fk1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_type`
--

LOCK TABLES `product_type` WRITE;
/*!40000 ALTER TABLE `product_type` DISABLE KEYS */;
INSERT INTO `product_type` VALUES (1,1,'Kích cỡ','Size 39',212,378000.00,NULL,NULL),(2,1,'Kích cỡ','Size 40',240,378000.00,NULL,NULL),(3,1,'Kích cỡ','Size 41',119,378000.00,NULL,NULL),(4,1,'Kích cỡ','Size 40',120,378000.00,NULL,NULL),(5,1,'Kích cỡ','Size 41',110,378000.00,NULL,NULL),(6,1,'Kích cỡ','Size 42',120,378000.00,NULL,NULL),(7,2,'Kích cỡ','Size M',50,823000.00,NULL,NULL),(8,2,'Kích cỡ','Size L',25,823000.00,NULL,NULL),(9,2,'Kích cỡ','Size XL',25,823000.00,NULL,NULL),(10,3,'Loại','300g',20,322000.00,NULL,NULL),(11,3,'Loại','400g',20,610000.00,NULL,NULL),(12,3,'Loại','500g',20,78100.00,NULL,NULL),(13,3,'Loại','200g',20,210000.00,NULL,NULL),(14,3,'Loại','100g',33,190000.00,NULL,NULL),(15,4,'Kích cỡ','Size 39',25,2020000.00,NULL,NULL),(16,4,'Kích cỡ','Size 40',25,2020000.00,NULL,NULL),(17,4,'Kích cỡ','Size 41',25,2020000.00,NULL,NULL),(18,4,'Kích cỡ','Size 42',25,2020000.00,NULL,NULL),(19,5,'Kích cỡ','Size 38',32,1521000.00,NULL,NULL),(20,5,'Kích cỡ','Size 39',230,1521000.00,NULL,NULL),(21,5,'Kích cỡ','Size 40',123,1521000.00,NULL,NULL),(22,5,'Kích cỡ','Size 41',322,1521000.00,NULL,NULL),(62,5,'Kích cỡ','Size 42',0,1521000.00,NULL,NULL),(63,6,'Nguồn gốc','Nhập khẩu',124,760000.00,NULL,NULL),(64,6,'Nguồn gốc','Chính hãng',752,980000.00,NULL,NULL),(65,7,'Màu sắc','Màu đỏ',74,340000.00,NULL,NULL),(66,7,'Màu sắc','Màu hồng',14,348000.00,NULL,NULL),(67,8,'Loại','Chai 200ml',23,150000.00,NULL,NULL),(68,8,'Loại','Chai 400ml',57,230000.00,NULL,NULL),(69,8,'Loại','Chai 700ml',98,340000.00,NULL,NULL),(70,9,'Kích cỡ','Size M',45,670000.00,NULL,NULL),(71,10,'Kích cỡ','Size 29',54,341000.00,NULL,NULL),(72,10,'Kích cỡ','Size 30',34,341000.00,NULL,NULL),(73,10,'Kích cỡ','Size 31',965,341000.00,NULL,NULL),(74,10,'Kích cỡ','Size 32',346,341000.00,NULL,NULL),(81,11,NULL,'',123,299000.00,NULL,NULL),(91,12,'Màu sắc','Màu đen',100,567000.00,NULL,NULL),(92,12,'Màu sắc','Màu bạc',100,567000.00,NULL,NULL),(93,12,'Màu sắc','Màu xanh',100,567000.00,NULL,NULL),(94,12,'Màu sắc','Màu đỏ',100,567000.00,NULL,NULL),(95,13,'Màu sắc','Vàng',100,890000.00,NULL,NULL),(96,13,'Màu sắc','Vàng + đen',100,810000.00,NULL,NULL),(97,13,'Màu sắc','Vàng + trắng',100,700000.00,NULL,NULL),(98,13,'Màu sắc','Vàng + bạc',100,760000.00,NULL,NULL),(99,14,NULL,NULL,300,978000.00,NULL,NULL),(100,15,'Kích cỡ','Size M',100,341000.00,NULL,NULL),(101,15,'Kích cỡ','Size L',100,341000.00,NULL,NULL),(102,15,'Kích cỡ','Size XL',100,341000.00,NULL,NULL),(103,15,'Kích cỡ','Size XXL',100,341000.00,NULL,NULL),(104,16,'Kích cỡ','Size M',100,341000.00,NULL,NULL),(105,16,'Kích cỡ','Size L',100,341000.00,NULL,NULL),(106,16,'Kích cỡ','Sile XL',100,341000.00,NULL,NULL),(107,16,'Kích cỡ','Size XXL',100,341000.00,NULL,NULL),(108,16,'Màu sắc','Màu đỏ',100,341000.00,NULL,NULL),(109,16,'Màu sắc','Màu đen',100,341000.00,NULL,NULL),(110,16,'Màu sắc','Màu xanh đậm',100,341000.00,NULL,NULL),(111,16,'Màu sắc','Màu tím than',100,341000.00,NULL,NULL),(112,16,'Màu sắc','Màu xám',100,341000.00,NULL,NULL),(113,16,'Màu sắc','Màu đỏ đô',100,341000.00,NULL,NULL),(114,17,'Kích cỡ','Size M',100,241000.00,NULL,NULL),(115,17,'Kích cỡ','Size L',100,241000.00,NULL,NULL),(116,17,'Kích cỡ','Size XL',100,241000.00,NULL,NULL),(117,17,'Kích cỡ','Size XXL',100,241000.00,NULL,NULL),(118,17,'Màu sắc','Màu đỏ',100,241000.00,NULL,NULL),(119,17,'Màu sắc','Màu đen',100,241000.00,NULL,NULL),(120,17,'Màu sắc','Màu xanh đậm',100,241000.00,NULL,NULL),(121,17,'Màu sắc','Màu tím than',100,241000.00,NULL,NULL),(122,17,'Màu sắc','Màu xám',100,241000.00,NULL,NULL),(123,17,'Màu sắc','Màu đỏ đô',100,241000.00,NULL,NULL),(124,18,'Kích cỡ','Size M',100,669000.00,NULL,NULL),(125,18,'Kích cỡ','Size L',100,669000.00,NULL,NULL),(126,18,'Kích cỡ','Size XL',100,669000.00,NULL,NULL),(127,18,'Kích cỡ','Size XXL',100,669000.00,NULL,NULL),(128,18,'Màu sắc','Màu đỏ',100,669000.00,NULL,NULL),(129,18,'Màu sắc','Màu đen',100,669000.00,NULL,NULL),(130,18,'Màu sắc','Màu xanh đậm',100,669000.00,NULL,NULL),(131,18,'Màu sắc','Màu tím than',100,669000.00,NULL,NULL),(132,18,'Màu sắc','Màu xám',100,669000.00,NULL,NULL),(133,18,'Màu sắc','Màu đỏ đô',100,669000.00,NULL,NULL);
/*!40000 ALTER TABLE `product_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shop` (
  `shopId` int(11) NOT NULL AUTO_INCREMENT,
  `shopEmail` varchar(200) NOT NULL,
  `shopPassword` varchar(64) NOT NULL,
  `shopName` varchar(200) NOT NULL,
  `shopAdress` text NOT NULL,
  `shopPhone` varchar(20) NOT NULL,
  `shopJoinDate` date NOT NULL,
  PRIMARY KEY (`shopId`),
  UNIQUE KEY `shopId_UNIQUE` (`shopId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop`
--

LOCK TABLES `shop` WRITE;
/*!40000 ALTER TABLE `shop` DISABLE KEYS */;
INSERT INTO `shop` VALUES (1,'shop01@gmail.com','123456','Shop 01','Hà Nội','0912312123','0000-00-00');
/*!40000 ALTER TABLE `shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(200) NOT NULL,
  `userPhone` varchar(20) DEFAULT NULL,
  `userPassword` varchar(200) NOT NULL,
  `userName` varchar(200) DEFAULT NULL,
  `userAddress` text,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userId_UNIQUE` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'monnatyz@gmail.com','0898007389','12345678','Monnatysd','Hậu Giang'),(2,'phu@mgmail.com','0898007388','12312378','Phú','Cần Thơ'),(5,'monnatyz@gmail.commm','0898007380','123123123','Thien Phu',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-04 14:59:43
