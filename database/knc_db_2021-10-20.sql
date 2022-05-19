# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.30)
# Database: knc_db
# Generation Time: 2021-10-19 18:30:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table abouts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `abouts`;

CREATE TABLE `abouts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions_vi` text COLLATE utf8mb4_unicode_ci,
  `descriptions_en` text COLLATE utf8mb4_unicode_ci,
  `descriptions_cn` text COLLATE utf8mb4_unicode_ci,
  `hide_show` int(11) DEFAULT '0',
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_vi` text COLLATE utf8mb4_unicode_ci,
  `keywords_en` text COLLATE utf8mb4_unicode_ci,
  `keywords_cn` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_cn` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `abouts` WRITE;
/*!40000 ALTER TABLE `abouts` DISABLE KEYS */;

INSERT INTO `abouts` (`id`, `type`, `view_count`, `created_at`, `updated_at`, `name_vi`, `name_en`, `name_cn`, `video`, `video_code`, `descriptions_vi`, `descriptions_en`, `descriptions_cn`, `hide_show`, `content_vi`, `content_en`, `content_cn`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`, `img`)
VALUES
	(1,'about',0,NULL,'2021-10-06 10:11:23','Về chúng tôi','Who we are','我们是谁','https://www.youtube.com/watch?v=PtzlnxRo0wU','PtzlnxRo0wU',NULL,NULL,NULL,1,'<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker.</p>','<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker.</p>','<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker.</p>','Về chúng tôi','Who we are','我们是谁','Về chúng tôi','Who we are','我们是谁','Về chúng tôi','Who we are','我们是谁','placeholder.png');

/*!40000 ALTER TABLE `abouts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table apply
# ------------------------------------------------------------

DROP TABLE IF EXISTS `apply`;

CREATE TABLE `apply` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stt` int(11) DEFAULT '0',
  `read` int(11) DEFAULT '0',
  `apply` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apply_note` longtext COLLATE utf8mb4_unicode_ci,
  `admin_note` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table authors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `authors`;

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `hide_show` int(11) DEFAULT NULL,
  `name_vi` varchar(191) DEFAULT NULL,
  `name_en` varchar(191) DEFAULT NULL,
  `name_cn` varchar(191) DEFAULT NULL,
  `content_vi` longtext,
  `content_en` longtext,
  `content_cn` longtext,
  `img` varchar(191) DEFAULT NULL,
  `link_group` varchar(191) DEFAULT NULL,
  `link_author` varchar(191) DEFAULT NULL,
  `namebuttonone` varchar(191) DEFAULT NULL,
  `namebuttontwo` varchar(191) DEFAULT NULL,
  `title_vi` varchar(191) DEFAULT NULL,
  `title_en` varchar(191) DEFAULT NULL,
  `title_cn` varchar(191) DEFAULT NULL,
  `keywords_vi` text,
  `keywords_en` text,
  `keywords_cn` text,
  `description_vi` text,
  `description_en` text,
  `description_cn` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;

INSERT INTO `authors` (`id`, `created_at`, `updated_at`, `type`, `view_count`, `hide_show`, `name_vi`, `name_en`, `name_cn`, `content_vi`, `content_en`, `content_cn`, `img`, `link_group`, `link_author`, `namebuttonone`, `namebuttontwo`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`)
VALUES
	(1,'2020-04-10 03:10:22','2021-06-25 16:32:52','author',1,1,'CÔNG TY TNHH TƯ VẤN ĐẦU TƯ XÂY DỰNG QUỐC TẾ KNC VIỆT NAM','CÔNG TY TNHH TƯ VẤN ĐẦU TƯ XÂY DỰNG QUỐC TẾ KNC VIỆT NAM en','CÔNG TY TNHH TƯ VẤN ĐẦU TƯ XÂY DỰNG QUỐC TẾ KNC VIỆT NAM cn',NULL,NULL,NULL,'logo-knc-1628.png',NULL,NULL,NULL,NULL,'Tác giả',NULL,NULL,'Tác giả',NULL,NULL,'Tác giả',NULL,NULL);

/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table bimsimages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bimsimages`;

CREATE TABLE `bimsimages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bimsv_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `imgs` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `bimsimages` WRITE;
/*!40000 ALTER TABLE `bimsimages` DISABLE KEYS */;

INSERT INTO `bimsimages` (`id`, `bimsv_id`, `created_at`, `updated_at`, `name`, `imgs`)
VALUES
	(1,13,'2021-10-02 11:29:13','2021-10-02 11:29:13',NULL,'adobestock-418854634-1113.jpeg'),
	(2,13,'2021-10-02 11:29:13','2021-10-02 11:29:13',NULL,'240599394-3190228734434906-6596467058483834560-n-1113.jpeg'),
	(3,13,'2021-10-02 11:39:32','2021-10-02 11:39:32',NULL,'sot-uop-thit-nuong-han-quoc-290g-1132.jpg');

/*!40000 ALTER TABLE `bimsimages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table bimsvs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bimsvs`;

CREATE TABLE `bimsvs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stt` int(11) DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `svcategory_id` int(11) DEFAULT '0',
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions_vi` longtext COLLATE utf8mb4_unicode_ci,
  `descriptions_en` longtext COLLATE utf8mb4_unicode_ci,
  `descriptions_cn` longtext COLLATE utf8mb4_unicode_ci,
  `is_footer` int(11) DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `is_new` int(11) DEFAULT NULL,
  `hide_show` int(11) DEFAULT NULL,
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_vi` text COLLATE utf8mb4_unicode_ci,
  `keywords_en` text COLLATE utf8mb4_unicode_ci,
  `keywords_cn` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_cn` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `bimsvs` WRITE;
/*!40000 ALTER TABLE `bimsvs` DISABLE KEYS */;

INSERT INTO `bimsvs` (`id`, `stt`, `type`, `svcategory_id`, `view_count`, `created_at`, `updated_at`, `name_vi`, `name_en`, `name_cn`, `url`, `video`, `video_code`, `descriptions_vi`, `descriptions_en`, `descriptions_cn`, `is_footer`, `is_featured`, `is_new`, `hide_show`, `content_vi`, `content_en`, `content_cn`, `slug`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`, `img`, `img1`)
VALUES
	(1,1,'service',1,0,'2020-09-08 15:42:00','2021-10-08 18:27:16','Công nghiệp','Công nghiệp en','Công nghiệp cn',NULL,NULL,NULL,'Tất cả hạng mục nhà xưởng, nhà kho, dây chuyền sản xuất...đều được mô hình BIM từ giai đoạn thiết kế ý tưởng đến giai đoạn thiết kế cơ sở và thiết kế thi công...','Tất cả hạng mục nhà xưởng, nhà kho, dây chuyền sản xuất...đều được mô hình BIM từ giai đoạn thiết kế ý tưởng đến giai đoạn thiết kế cơ sở và thiết kế thi công...en','Tất cả hạng mục nhà xưởng, nhà kho, dây chuyền sản xuất...đều được mô hình BIM từ giai đoạn thiết kế ý tưởng đến giai đoạn thiết kế cơ sở và thiết kế thi công...cn',1,1,NULL,1,'<p>- M&ocirc; h&igrave;nh BIM về nh&agrave; xưởng, khu c&ocirc;ng nghiệp sẽ được thể hiện đầy đủ chi tiết cấu kiện, li&ecirc;n kết, cao độ v&agrave; số lượng. Nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất, lắp đặt, xuất khối lượng để t&iacute;nh to&aacute;n chi ph&iacute; cho to&agrave;n dự &aacute;n.</p>\r\n\r\n<p>- &Aacute;p dụng c&ocirc;ng nghệ tự động h&oacute;a v&agrave;o m&ocirc; h&igrave;nh nhằm tăng hiệu suất dựng h&igrave;nh, tăng độ ch&iacute;nh x&aacute;c, tiết kiệm thời gian v&agrave; chi ph&iacute; cho Kh&aacute;ch h&agrave;ng v&agrave; KNC.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh trực quan sẽ gi&uacute;p giải quyết c&aacute;c vấn đề về đọc bản vẽ 2D m&agrave; trước đ&acirc;y thường mắc phải c&aacute;c lỗi nghi&ecirc;m trọng như ch&ecirc;nh lệch cao độ của cấu kiện giữa c&aacute;c bộ m&ocirc;n.</p>\r\n\r\n<p>- Chi tiết li&ecirc;n kết trong m&ocirc; h&igrave;nh BIM được thể hiện đầy đủ số lượng, ch&iacute;nh x&aacute;c k&iacute;ch thước, vị tr&iacute;, cao độ, vật liệu cấu tạo nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất v&agrave; lắp đặt.</p>\r\n\r\n<p>- Với m&ocirc; h&igrave;nh 3D th&igrave; c&aacute;c vị tr&iacute; như li&ecirc;n kết, mối nối v&agrave; những li&ecirc;n kết phức tạp kh&aacute;c sẽ được quan s&aacute;t r&otilde; r&agrave;ng hơn. Từ đ&oacute; gi&uacute;p cho đơn vị thi c&ocirc;ng c&oacute; thể thấy được ch&iacute;nh x&aacute;c h&igrave;nh dạng, vị tr&iacute; v&agrave; cao độ của cấu kiện.</p>','<p>- M&ocirc; h&igrave;nh BIM về nh&agrave; xưởng, khu c&ocirc;ng nghiệp sẽ được thể hiện đầy đủ chi tiết cấu kiện, li&ecirc;n kết, cao độ v&agrave; số lượng. Nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất, lắp đặt, xuất khối lượng để t&iacute;nh to&aacute;n chi ph&iacute; cho to&agrave;n dự &aacute;n.</p>\r\n\r\n<p>- &Aacute;p dụng c&ocirc;ng nghệ tự động h&oacute;a v&agrave;o m&ocirc; h&igrave;nh nhằm tăng hiệu suất dựng h&igrave;nh, tăng độ ch&iacute;nh x&aacute;c, tiết kiệm thời gian v&agrave; chi ph&iacute; cho Kh&aacute;ch h&agrave;ng v&agrave; KNC.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh trực quan sẽ gi&uacute;p giải quyết c&aacute;c vấn đề về đọc bản vẽ 2D m&agrave; trước đ&acirc;y thường mắc phải c&aacute;c lỗi nghi&ecirc;m trọng như ch&ecirc;nh lệch cao độ của cấu kiện giữa c&aacute;c bộ m&ocirc;n.</p>\r\n\r\n<p>- Chi tiết li&ecirc;n kết trong m&ocirc; h&igrave;nh BIM được thể hiện đầy đủ số lượng, ch&iacute;nh x&aacute;c k&iacute;ch thước, vị tr&iacute;, cao độ, vật liệu cấu tạo nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất v&agrave; lắp đặt.</p>\r\n\r\n<p>- Với m&ocirc; h&igrave;nh 3D th&igrave; c&aacute;c vị tr&iacute; như li&ecirc;n kết, mối nối v&agrave; những li&ecirc;n kết phức tạp kh&aacute;c sẽ được quan s&aacute;t r&otilde; r&agrave;ng hơn. Từ đ&oacute; gi&uacute;p cho đơn vị thi c&ocirc;ng c&oacute; thể thấy được ch&iacute;nh x&aacute;c h&igrave;nh dạng, vị tr&iacute; v&agrave; cao độ của cấu kiện.</p>','<p>- M&ocirc; h&igrave;nh BIM về nh&agrave; xưởng, khu c&ocirc;ng nghiệp sẽ được thể hiện đầy đủ chi tiết cấu kiện, li&ecirc;n kết, cao độ v&agrave; số lượng. Nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất, lắp đặt, xuất khối lượng để t&iacute;nh to&aacute;n chi ph&iacute; cho to&agrave;n dự &aacute;n.</p>\r\n\r\n<p>- &Aacute;p dụng c&ocirc;ng nghệ tự động h&oacute;a v&agrave;o m&ocirc; h&igrave;nh nhằm tăng hiệu suất dựng h&igrave;nh, tăng độ ch&iacute;nh x&aacute;c, tiết kiệm thời gian v&agrave; chi ph&iacute; cho Kh&aacute;ch h&agrave;ng v&agrave; KNC.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh trực quan sẽ gi&uacute;p giải quyết c&aacute;c vấn đề về đọc bản vẽ 2D m&agrave; trước đ&acirc;y thường mắc phải c&aacute;c lỗi nghi&ecirc;m trọng như ch&ecirc;nh lệch cao độ của cấu kiện giữa c&aacute;c bộ m&ocirc;n.</p>\r\n\r\n<p>- Chi tiết li&ecirc;n kết trong m&ocirc; h&igrave;nh BIM được thể hiện đầy đủ số lượng, ch&iacute;nh x&aacute;c k&iacute;ch thước, vị tr&iacute;, cao độ, vật liệu cấu tạo nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất v&agrave; lắp đặt.</p>\r\n\r\n<p>- Với m&ocirc; h&igrave;nh 3D th&igrave; c&aacute;c vị tr&iacute; như li&ecirc;n kết, mối nối v&agrave; những li&ecirc;n kết phức tạp kh&aacute;c sẽ được quan s&aacute;t r&otilde; r&agrave;ng hơn. Từ đ&oacute; gi&uacute;p cho đơn vị thi c&ocirc;ng c&oacute; thể thấy được ch&iacute;nh x&aacute;c h&igrave;nh dạng, vị tr&iacute; v&agrave; cao độ của cấu kiện.</p>','cong-nghiep','Công nghiệp','Công nghiệp en','Công nghiệp cn',NULL,NULL,NULL,NULL,NULL,NULL,'cong-nghiep-0903.png','mo-hinh-bim-cong-nghiep-1535.png'),
	(2,2,'service',1,0,'2020-09-08 15:43:56','2021-10-08 18:27:21','Dân dụng','Dân dụng en','Dân dụng cn',NULL,NULL,NULL,'Nhà cao tầng sẽ được mô hình BIM từ móng, thân, mặt dựng, nội thất, hệ thống cơ điện từ giai đoạn thiết kế ý tưởng đến giai đoạn thiết kế cơ sở và thiết kế thi công...','Nhà cao tầng sẽ được mô hình BIM từ móng, thân, mặt dựng, nội thất, hệ thống cơ điện từ giai đoạn thiết kế ý tưởng đến giai đoạn thiết kế cơ sở và thiết kế thi công...en','Nhà cao tầng sẽ được mô hình BIM từ móng, thân, mặt dựng, nội thất, hệ thống cơ điện từ giai đoạn thiết kế ý tưởng đến giai đoạn thiết kế cơ sở và thiết kế thi công...cn',1,1,NULL,1,'<p>- Đối với c&aacute;c dự &aacute;n d&acirc;n dụng, m&ocirc; h&igrave;nh sẽ được cập nhật trong suốt qu&aacute; tr&igrave;nh thiết kế nhằm xử l&yacute; xung đột hoặc c&oacute; thay đổi từ kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- C&aacute;c xung đột v&agrave; lỗi thiết kế sẽ được ph&aacute;t hiện sớm v&agrave; được sửa chữa ngay trong qu&aacute; tr&igrave;nh dựng h&igrave;nh, phối hợp xử l&yacute; c&ugrave;ng những bộ m&ocirc;n kh&aacute;c. Việc ph&aacute;t hiện xung đột sớm trong giai đoạn thiết kế đ&oacute;ng vai tr&ograve; v&ocirc; c&ugrave;ng quan trọng cho to&agrave;n dự &aacute;n.</p>\r\n\r\n<p>- Khi đ&oacute;, lợi &iacute;ch m&agrave; m&ocirc; h&igrave;nh BIM mang lại sẽ gi&uacute;p cho kh&aacute;ch h&agrave;ng tiết kiệm được nhiều chi ph&iacute; ph&aacute;t sinh, tiết kiệm thời gian, hỗ trợ trong giai đoạn bảo tr&igrave; v&agrave; vận h&agrave;nh.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh sẽ gi&uacute;p cho đơn vị thi c&ocirc;ng ho&agrave;n th&agrave;nh dự &aacute;n một c&aacute;ch ch&iacute;nh x&aacute;c, nhanh ch&oacute;ng v&agrave; hiệu quả, giảm thiểu rủi ro đập đi x&acirc;y lại trong qu&aacute; tr&igrave;nh thi c&ocirc;ng.</p>','<p>- Đối với c&aacute;c dự &aacute;n d&acirc;n dụng, m&ocirc; h&igrave;nh sẽ được cập nhật trong suốt qu&aacute; tr&igrave;nh thiết kế nhằm xử l&yacute; xung đột hoặc c&oacute; thay đổi từ kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- C&aacute;c xung đột v&agrave; lỗi thiết kế sẽ được ph&aacute;t hiện sớm v&agrave; được sửa chữa ngay trong qu&aacute; tr&igrave;nh dựng h&igrave;nh, phối hợp xử l&yacute; c&ugrave;ng những bộ m&ocirc;n kh&aacute;c. Việc ph&aacute;t hiện xung đột sớm trong giai đoạn thiết kế đ&oacute;ng vai tr&ograve; v&ocirc; c&ugrave;ng quan trọng cho to&agrave;n dự &aacute;n.</p>\r\n\r\n<p>- Khi đ&oacute;, lợi &iacute;ch m&agrave; m&ocirc; h&igrave;nh BIM mang lại sẽ gi&uacute;p cho kh&aacute;ch h&agrave;ng tiết kiệm được nhiều chi ph&iacute; ph&aacute;t sinh, tiết kiệm thời gian, hỗ trợ trong giai đoạn bảo tr&igrave; v&agrave; vận h&agrave;nh.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh sẽ gi&uacute;p cho đơn vị thi c&ocirc;ng ho&agrave;n th&agrave;nh dự &aacute;n một c&aacute;ch ch&iacute;nh x&aacute;c, nhanh ch&oacute;ng v&agrave; hiệu quả, giảm thiểu rủi ro đập đi x&acirc;y lại trong qu&aacute; tr&igrave;nh thi c&ocirc;ng.</p>','<p>- Đối với c&aacute;c dự &aacute;n d&acirc;n dụng, m&ocirc; h&igrave;nh sẽ được cập nhật trong suốt qu&aacute; tr&igrave;nh thiết kế nhằm xử l&yacute; xung đột hoặc c&oacute; thay đổi từ kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- C&aacute;c xung đột v&agrave; lỗi thiết kế sẽ được ph&aacute;t hiện sớm v&agrave; được sửa chữa ngay trong qu&aacute; tr&igrave;nh dựng h&igrave;nh, phối hợp xử l&yacute; c&ugrave;ng những bộ m&ocirc;n kh&aacute;c. Việc ph&aacute;t hiện xung đột sớm trong giai đoạn thiết kế đ&oacute;ng vai tr&ograve; v&ocirc; c&ugrave;ng quan trọng cho to&agrave;n dự &aacute;n.</p>\r\n\r\n<p>- Khi đ&oacute;, lợi &iacute;ch m&agrave; m&ocirc; h&igrave;nh BIM mang lại sẽ gi&uacute;p cho kh&aacute;ch h&agrave;ng tiết kiệm được nhiều chi ph&iacute; ph&aacute;t sinh, tiết kiệm thời gian, hỗ trợ trong giai đoạn bảo tr&igrave; v&agrave; vận h&agrave;nh.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh sẽ gi&uacute;p cho đơn vị thi c&ocirc;ng ho&agrave;n th&agrave;nh dự &aacute;n một c&aacute;ch ch&iacute;nh x&aacute;c, nhanh ch&oacute;ng v&agrave; hiệu quả, giảm thiểu rủi ro đập đi x&acirc;y lại trong qu&aacute; tr&igrave;nh thi c&ocirc;ng.</p>','dan-dung','Dân dụng','Dân dụng en','Dân dụng cn','Tên bài viết Dịch vụ 2',NULL,NULL,'Tên bài viết Dịch vụ 2',NULL,NULL,'dan-dung-0909.png','dan-dung-2058.png'),
	(3,1,'service',2,0,'2020-09-08 15:46:49','2021-10-08 18:27:16','Công nghiệp','Công nghiệp en','Công nghiệp cn',NULL,NULL,NULL,'Bản vẽ thể hiện chất lượng hồ sơ của một dự án vì vậy bản vẽ sẽ được phát triển chi tiết theo quy định và tiêu chuẩn của từng quốc gia, khu vực...','Bản vẽ thể hiện chất lượng hồ sơ của một dự án vì vậy bản vẽ sẽ được phát triển chi tiết theo quy định và tiêu chuẩn của từng quốc gia, khu vực...en','Bản vẽ thể hiện chất lượng hồ sơ của một dự án vì vậy bản vẽ sẽ được phát triển chi tiết theo quy định và tiêu chuẩn của từng quốc gia, khu vực...cn',1,1,NULL,1,'<p>- C&aacute;c m&ocirc; h&igrave;nh khu c&ocirc;ng nghiệp hiện đại, c&oacute; thiết kế linh hoạt mang t&iacute;nh ứng dụng cao, được rất nhiều Chủ đầu tư v&agrave; Doanh nghiệp lựa chọn. Trong đ&oacute; việc ph&aacute;t triển bản vẽ l&agrave; một trong những yếu tố g&oacute;p phần kh&ocirc;ng nhỏ quyết định đến chất lượng c&ocirc;ng tr&igrave;nh.</p>\r\n\r\n<p>- C&aacute;c dự &aacute;n c&ocirc;ng nghiệp đ&ograve;i hỏi mức độ chi tiết của bản vẽ rất cao, v&igrave; thế việc ph&aacute;t triển bản vẽ sẽ gi&uacute;p cho dự &aacute;n c&oacute; thể triển khai một c&aacute;ch đầy đủ, chi tiết v&agrave; ch&iacute;nh x&aacute;c.</p>','<p>- C&aacute;c m&ocirc; h&igrave;nh khu c&ocirc;ng nghiệp hiện đại, c&oacute; thiết kế linh hoạt mang t&iacute;nh ứng dụng cao, được rất nhiều Chủ đầu tư v&agrave; Doanh nghiệp lựa chọn. Trong đ&oacute; việc ph&aacute;t triển bản vẽ l&agrave; một trong những yếu tố g&oacute;p phần kh&ocirc;ng nhỏ quyết định đến chất lượng c&ocirc;ng tr&igrave;nh.</p>\r\n\r\n<p>- C&aacute;c dự &aacute;n c&ocirc;ng nghiệp đ&ograve;i hỏi mức độ chi tiết của bản vẽ rất cao, v&igrave; thế việc ph&aacute;t triển bản vẽ sẽ gi&uacute;p cho dự &aacute;n c&oacute; thể triển khai một c&aacute;ch đầy đủ, chi tiết v&agrave; ch&iacute;nh x&aacute;c.</p>','<p>- C&aacute;c m&ocirc; h&igrave;nh khu c&ocirc;ng nghiệp hiện đại, c&oacute; thiết kế linh hoạt mang t&iacute;nh ứng dụng cao, được rất nhiều Chủ đầu tư v&agrave; Doanh nghiệp lựa chọn. Trong đ&oacute; việc ph&aacute;t triển bản vẽ l&agrave; một trong những yếu tố g&oacute;p phần kh&ocirc;ng nhỏ quyết định đến chất lượng c&ocirc;ng tr&igrave;nh.</p>\r\n\r\n<p>- C&aacute;c dự &aacute;n c&ocirc;ng nghiệp đ&ograve;i hỏi mức độ chi tiết của bản vẽ rất cao, v&igrave; thế việc ph&aacute;t triển bản vẽ sẽ gi&uacute;p cho dự &aacute;n c&oacute; thể triển khai một c&aacute;ch đầy đủ, chi tiết v&agrave; ch&iacute;nh x&aacute;c.</p>','phat-trien-ban-ve-cong-nghiep','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp',NULL,NULL,'Công nghiệp',NULL,NULL,'phat-trien-ban-ve-cong-nghiep-1626.png','phat-trien-ban-ve-cong-nghiep-2002.png'),
	(4,2,'service',2,0,'2020-09-08 15:49:56','2021-10-08 18:27:22','Dân dụng','Dân dụng en','Dân dụng cn',NULL,NULL,NULL,'Đối với các dự án yêu cầu cao về mặt trình bày, thể hiện chi tiết, kỹ thuật thì việc phát triển bản vẽ sẽ giúp hồ sơ đạt chất lượng tốt nhất...','Đối với các dự án yêu cầu cao về mặt trình bày, thể hiện chi tiết, kỹ thuật thì việc phát triển bản vẽ sẽ giúp hồ sơ đạt chất lượng tốt nhất...en','Đối với các dự án yêu cầu cao về mặt trình bày, thể hiện chi tiết, kỹ thuật thì việc phát triển bản vẽ sẽ giúp hồ sơ đạt chất lượng tốt nhất...cn',1,1,NULL,1,'<p>- Bản vẽ l&agrave; thứ kh&ocirc;ng thể thiếu cho c&aacute;c dự &aacute;n x&acirc;y dựng ch&iacute;nh v&igrave; thế n&oacute; c&oacute; tầm quan trọng rất lớn. V&igrave; vậy KNC lu&ocirc;n kh&ocirc;ng ngừng nghi&ecirc;n cứu v&agrave; ph&aacute;t triển bản vẽ về mặt tr&igrave;nh b&agrave;y, thể hiện, sắp xếp bố lục hợp l&yacute;, lu&ocirc;n đảm bảo theo ti&ecirc;u chuẩn v&agrave; thực tế thi c&ocirc;ng.</p>\r\n\r\n<p>- Đối với c&aacute;c dự &aacute;n c&agrave;ng lớn th&igrave; mức độ thể hiện chi tiết bản vẽ c&agrave;ng cao, đ&ograve;i hỏi kỹ sư phải thể hiện đầy đủ nội dung, chi tiết, ghi ch&uacute;...Với kinh nghiệm v&agrave; t&iacute;ch lũy từ nhiều dự &aacute;n về d&acirc;n dụng, k&egrave;m theo đ&oacute; l&agrave; đội ngũ kỹ sư năng động, nhiệt huyết, kh&ocirc;ng ngừng ph&aacute;t triển kỹ năng v&igrave; vậy KNC tự tin mang lại cho Kh&aacute;ch h&agrave;ng một sản phẩm chất lượng.</p>','<p>- Bản vẽ l&agrave; thứ kh&ocirc;ng thể thiếu cho c&aacute;c dự &aacute;n x&acirc;y dựng ch&iacute;nh v&igrave; thế n&oacute; c&oacute; tầm quan trọng rất lớn. V&igrave; vậy KNC lu&ocirc;n kh&ocirc;ng ngừng nghi&ecirc;n cứu v&agrave; ph&aacute;t triển bản vẽ về mặt tr&igrave;nh b&agrave;y, thể hiện, sắp xếp bố lục hợp l&yacute;, lu&ocirc;n đảm bảo theo ti&ecirc;u chuẩn v&agrave; thực tế thi c&ocirc;ng.</p>\r\n\r\n<p>- Đối với c&aacute;c dự &aacute;n c&agrave;ng lớn th&igrave; mức độ thể hiện chi tiết bản vẽ c&agrave;ng cao, đ&ograve;i hỏi kỹ sư phải thể hiện đầy đủ nội dung, chi tiết, ghi ch&uacute;...Với kinh nghiệm v&agrave; t&iacute;ch lũy từ nhiều dự &aacute;n về d&acirc;n dụng, k&egrave;m theo đ&oacute; l&agrave; đội ngũ kỹ sư năng động, nhiệt huyết, kh&ocirc;ng ngừng ph&aacute;t triển kỹ năng v&igrave; vậy KNC tự tin mang lại cho Kh&aacute;ch h&agrave;ng một sản phẩm chất lượng.</p>','<p>- Bản vẽ l&agrave; thứ kh&ocirc;ng thể thiếu cho c&aacute;c dự &aacute;n x&acirc;y dựng ch&iacute;nh v&igrave; thế n&oacute; c&oacute; tầm quan trọng rất lớn. V&igrave; vậy KNC lu&ocirc;n kh&ocirc;ng ngừng nghi&ecirc;n cứu v&agrave; ph&aacute;t triển bản vẽ về mặt tr&igrave;nh b&agrave;y, thể hiện, sắp xếp bố lục hợp l&yacute;, lu&ocirc;n đảm bảo theo ti&ecirc;u chuẩn v&agrave; thực tế thi c&ocirc;ng.</p>\r\n\r\n<p>- Đối với c&aacute;c dự &aacute;n c&agrave;ng lớn th&igrave; mức độ thể hiện chi tiết bản vẽ c&agrave;ng cao, đ&ograve;i hỏi kỹ sư phải thể hiện đầy đủ nội dung, chi tiết, ghi ch&uacute;...Với kinh nghiệm v&agrave; t&iacute;ch lũy từ nhiều dự &aacute;n về d&acirc;n dụng, k&egrave;m theo đ&oacute; l&agrave; đội ngũ kỹ sư năng động, nhiệt huyết, kh&ocirc;ng ngừng ph&aacute;t triển kỹ năng v&igrave; vậy KNC tự tin mang lại cho Kh&aacute;ch h&agrave;ng một sản phẩm chất lượng.</p>','phat-trien-ban-ve-dan-dung','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','dan-dung-1633.png','phat-trien-ban-ve-dan-dung-2050.png'),
	(5,1,'service',3,0,'2020-09-08 15:53:01','2021-10-08 18:27:17','Công nghiệp','Công nghiệp en','Công nghiệp cn',NULL,NULL,NULL,'Khối lượng nhà công nghiệp sẽ được tổng hợp và xuất tự động dựa trên các cấu kiện và thông tin đã xây dựng trong mô hình...','Khối lượng nhà công nghiệp sẽ được tổng hợp và xuất tự động dựa trên các cấu kiện và thông tin đã xây dựng trong mô hình...en','Khối lượng nhà công nghiệp sẽ được tổng hợp và xuất tự động dựa trên các cấu kiện và thông tin đã xây dựng trong mô hình...cn',1,1,NULL,1,'<p>- Khối lượng của một c&ocirc;ng tr&igrave;nh l&agrave; một vấn đề quan trọng của mỗi dự &aacute;n, khối lượng khi xuất ra sẽ t&iacute;nh to&aacute;n chi ph&iacute; cho to&agrave;n c&ocirc;ng tr&igrave;nh khi đ&oacute; sẽ gi&uacute;p Kh&aacute;ch h&agrave;ng t&iacute;nh to&aacute;n mức chi ph&iacute; ph&ugrave; hợp.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh Bim nh&agrave; c&ocirc;ng nghiệp sẽ được tổng hợp v&agrave; tr&iacute;ch xuất khối lượng tự động, gi&uacute;p tiết kiệm thời gian b&oacute;c t&aacute;ch v&agrave; t&iacute;nh to&aacute;n từng hạng mục.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh c&oacute; thể tr&iacute;ch xuất ch&iacute;nh x&aacute;c vật tư phục vụ thi c&ocirc;ng như thể t&iacute;ch b&ecirc; t&ocirc;ng, khối lượng th&eacute;p, diện t&iacute;ch v&aacute;n khu&ocirc;n...từ đ&oacute; gi&uacute;p cho bộ phận dự to&aacute;n nhanh ch&oacute;ng r&aacute;p gi&aacute; v&agrave; đưa ra định mức dự to&aacute;n ph&ugrave; hợp cho từng dự &aacute;n.</p>\r\n\r\n<p>- Đặc biệt đối với c&aacute;c c&ocirc;ng tr&igrave;nh c&oacute; li&ecirc;n kết phức tạp, nhiều chi tiết việc tự động xuất khối lượng từ m&ocirc; h&igrave;nh BIM sẽ gi&uacute;p giảm đ&aacute;ng kể thời gian v&agrave; c&ocirc;ng sức của c&aacute;c kỹ sư dự to&aacute;n.</p>\r\n\r\n<p>- Để thực hiện việc b&oacute;c t&aacute;ch khối lượng chi tiết th&igrave; KNC sẽ tạo lập m&ocirc; h&igrave;nh ho&agrave;n chỉnh, đầy đủ c&aacute;c th&agrave;nh phần, ph&acirc;n bổ theo khu vực, hạng mục một c&aacute;ch hợp l&yacute; từ đ&oacute; sẽ tổng hợp v&agrave; tr&iacute;ch xuất đầy đủ khối lượng.</p>','<p>- Khối lượng của một c&ocirc;ng tr&igrave;nh l&agrave; một vấn đề quan trọng của mỗi dự &aacute;n, khối lượng khi xuất ra sẽ t&iacute;nh to&aacute;n chi ph&iacute; cho to&agrave;n c&ocirc;ng tr&igrave;nh khi đ&oacute; sẽ gi&uacute;p Kh&aacute;ch h&agrave;ng t&iacute;nh to&aacute;n mức chi ph&iacute; ph&ugrave; hợp.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh Bim nh&agrave; c&ocirc;ng nghiệp sẽ được tổng hợp v&agrave; tr&iacute;ch xuất khối lượng tự động, gi&uacute;p tiết kiệm thời gian b&oacute;c t&aacute;ch v&agrave; t&iacute;nh to&aacute;n từng hạng mục.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh c&oacute; thể tr&iacute;ch xuất ch&iacute;nh x&aacute;c vật tư phục vụ thi c&ocirc;ng như thể t&iacute;ch b&ecirc; t&ocirc;ng, khối lượng th&eacute;p, diện t&iacute;ch v&aacute;n khu&ocirc;n...từ đ&oacute; gi&uacute;p cho bộ phận dự to&aacute;n nhanh ch&oacute;ng r&aacute;p gi&aacute; v&agrave; đưa ra định mức dự to&aacute;n ph&ugrave; hợp cho từng dự &aacute;n.</p>\r\n\r\n<p>- Đặc biệt đối với c&aacute;c c&ocirc;ng tr&igrave;nh c&oacute; li&ecirc;n kết phức tạp, nhiều chi tiết việc tự động xuất khối lượng từ m&ocirc; h&igrave;nh BIM sẽ gi&uacute;p giảm đ&aacute;ng kể thời gian v&agrave; c&ocirc;ng sức của c&aacute;c kỹ sư dự to&aacute;n.</p>\r\n\r\n<p>- Để thực hiện việc b&oacute;c t&aacute;ch khối lượng chi tiết th&igrave; KNC sẽ tạo lập m&ocirc; h&igrave;nh ho&agrave;n chỉnh, đầy đủ c&aacute;c th&agrave;nh phần, ph&acirc;n bổ theo khu vực, hạng mục một c&aacute;ch hợp l&yacute; từ đ&oacute; sẽ tổng hợp v&agrave; tr&iacute;ch xuất đầy đủ khối lượng.</p>','<p>- Khối lượng của một c&ocirc;ng tr&igrave;nh l&agrave; một vấn đề quan trọng của mỗi dự &aacute;n, khối lượng khi xuất ra sẽ t&iacute;nh to&aacute;n chi ph&iacute; cho to&agrave;n c&ocirc;ng tr&igrave;nh khi đ&oacute; sẽ gi&uacute;p Kh&aacute;ch h&agrave;ng t&iacute;nh to&aacute;n mức chi ph&iacute; ph&ugrave; hợp.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh Bim nh&agrave; c&ocirc;ng nghiệp sẽ được tổng hợp v&agrave; tr&iacute;ch xuất khối lượng tự động, gi&uacute;p tiết kiệm thời gian b&oacute;c t&aacute;ch v&agrave; t&iacute;nh to&aacute;n từng hạng mục.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh c&oacute; thể tr&iacute;ch xuất ch&iacute;nh x&aacute;c vật tư phục vụ thi c&ocirc;ng như thể t&iacute;ch b&ecirc; t&ocirc;ng, khối lượng th&eacute;p, diện t&iacute;ch v&aacute;n khu&ocirc;n...từ đ&oacute; gi&uacute;p cho bộ phận dự to&aacute;n nhanh ch&oacute;ng r&aacute;p gi&aacute; v&agrave; đưa ra định mức dự to&aacute;n ph&ugrave; hợp cho từng dự &aacute;n.</p>\r\n\r\n<p>- Đặc biệt đối với c&aacute;c c&ocirc;ng tr&igrave;nh c&oacute; li&ecirc;n kết phức tạp, nhiều chi tiết việc tự động xuất khối lượng từ m&ocirc; h&igrave;nh BIM sẽ gi&uacute;p giảm đ&aacute;ng kể thời gian v&agrave; c&ocirc;ng sức của c&aacute;c kỹ sư dự to&aacute;n.</p>\r\n\r\n<p>- Để thực hiện việc b&oacute;c t&aacute;ch khối lượng chi tiết th&igrave; KNC sẽ tạo lập m&ocirc; h&igrave;nh ho&agrave;n chỉnh, đầy đủ c&aacute;c th&agrave;nh phần, ph&acirc;n bổ theo khu vực, hạng mục một c&aacute;ch hợp l&yacute; từ đ&oacute; sẽ tổng hợp v&agrave; tr&iacute;ch xuất đầy đủ khối lượng.</p>','xua-khoi-luong-tu-mo-hinh-bim-cong-nghiep','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp','Công nghiệp en','Công nghiệp cn','cong-nghiep-1639.png','xuat-khoi-luong-tu-mo-hinh-bim-cong-nghiep-2001.png'),
	(6,2,'service',3,0,'2020-09-08 15:55:43','2021-10-08 18:27:22','Dân dụng','Dân dụng en','Dân dụng cn',NULL,NULL,NULL,'Khối lượng xuất từ mô hình sẽ được tổng hợp và chuyển cho bộ phận dự toán ráp giá và tính toán chi phí cho toàn dự án...','Khối lượng xuất từ mô hình sẽ được tổng hợp và chuyển cho bộ phận dự toán ráp giá và tính toán chi phí cho toàn dự án...en','Khối lượng xuất từ mô hình sẽ được tổng hợp và chuyển cho bộ phận dự toán ráp giá và tính toán chi phí cho toàn dự án...cn',1,1,NULL,1,'<p>- Khối lượng từ m&ocirc; h&igrave;nh BIM của c&aacute;c dự &aacute;n d&acirc;n dụng được hỗ trợ t&iacute;nh to&aacute;n tự động v&igrave; thế sẽ hạn chế sai s&oacute;t trong qu&aacute; tr&igrave;nh xuất khối lượng.</p>\r\n\r\n<p>- Việc x&aacute;c định ch&iacute;nh x&aacute;c khối lượng kh&ocirc;ng chỉ gi&uacute;p dễ d&agrave;ng trong việc ước lượng v&agrave; quản l&yacute; chi ph&iacute; m&agrave; c&ograve;n gi&uacute;p hạn chế những khối lượng ph&aacute;t sinh ngo&agrave;i &yacute; muốn trong qu&aacute; tr&igrave;nh thi c&ocirc;ng.</p>\r\n\r\n<p>- Khối lượng từ m&ocirc; h&igrave;nh sẽ được tổng hợp v&agrave; tự động t&iacute;nh to&aacute;n để xuất b&aacute;o c&aacute;o.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh c&oacute; thể tr&iacute;ch xuất ch&iacute;nh x&aacute;c vật tư phục vụ thi c&ocirc;ng như thể t&iacute;ch b&ecirc; t&ocirc;ng, khối lượng th&eacute;p, diện t&iacute;ch v&aacute;n khu&ocirc;n từ đ&oacute; gi&uacute;p cho bộ phận dự to&aacute;n nhanh ch&oacute;ng r&aacute;p gi&aacute; v&agrave; đưa ra định mức dự to&aacute;n ph&ugrave; hợp cho từng dự &aacute;n.</p>\r\n\r\n<p>- C&aacute;c dự &aacute;n d&acirc;n dụng sẽ được KNC dựng h&igrave;nh đầy đủ v&agrave; chi tiết c&aacute;c th&agrave;nh phần theo từng hạng mục, giai đoạn để thuận tiện cho việc tr&iacute;ch xuất khối lượng nhanh v&agrave; ch&iacute;nh x&aacute;c nhất.</p>','<p>- Khối lượng từ m&ocirc; h&igrave;nh BIM của c&aacute;c dự &aacute;n d&acirc;n dụng được hỗ trợ t&iacute;nh to&aacute;n tự động v&igrave; thế sẽ hạn chế sai s&oacute;t trong qu&aacute; tr&igrave;nh xuất khối lượng.</p>\r\n\r\n<p>- Việc x&aacute;c định ch&iacute;nh x&aacute;c khối lượng kh&ocirc;ng chỉ gi&uacute;p dễ d&agrave;ng trong việc ước lượng v&agrave; quản l&yacute; chi ph&iacute; m&agrave; c&ograve;n gi&uacute;p hạn chế những khối lượng ph&aacute;t sinh ngo&agrave;i &yacute; muốn trong qu&aacute; tr&igrave;nh thi c&ocirc;ng.</p>\r\n\r\n<p>- Khối lượng từ m&ocirc; h&igrave;nh sẽ được tổng hợp v&agrave; tự động t&iacute;nh to&aacute;n để xuất b&aacute;o c&aacute;o.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh c&oacute; thể tr&iacute;ch xuất ch&iacute;nh x&aacute;c vật tư phục vụ thi c&ocirc;ng như thể t&iacute;ch b&ecirc; t&ocirc;ng, khối lượng th&eacute;p, diện t&iacute;ch v&aacute;n khu&ocirc;n từ đ&oacute; gi&uacute;p cho bộ phận dự to&aacute;n nhanh ch&oacute;ng r&aacute;p gi&aacute; v&agrave; đưa ra định mức dự to&aacute;n ph&ugrave; hợp cho từng dự &aacute;n.</p>\r\n\r\n<p>- C&aacute;c dự &aacute;n d&acirc;n dụng sẽ được KNC dựng h&igrave;nh đầy đủ v&agrave; chi tiết c&aacute;c th&agrave;nh phần theo từng hạng mục, giai đoạn để thuận tiện cho việc tr&iacute;ch xuất khối lượng nhanh v&agrave; ch&iacute;nh x&aacute;c nhất.</p>','<p>- Khối lượng từ m&ocirc; h&igrave;nh BIM của c&aacute;c dự &aacute;n d&acirc;n dụng được hỗ trợ t&iacute;nh to&aacute;n tự động v&igrave; thế sẽ hạn chế sai s&oacute;t trong qu&aacute; tr&igrave;nh xuất khối lượng.</p>\r\n\r\n<p>- Việc x&aacute;c định ch&iacute;nh x&aacute;c khối lượng kh&ocirc;ng chỉ gi&uacute;p dễ d&agrave;ng trong việc ước lượng v&agrave; quản l&yacute; chi ph&iacute; m&agrave; c&ograve;n gi&uacute;p hạn chế những khối lượng ph&aacute;t sinh ngo&agrave;i &yacute; muốn trong qu&aacute; tr&igrave;nh thi c&ocirc;ng.</p>\r\n\r\n<p>- Khối lượng từ m&ocirc; h&igrave;nh sẽ được tổng hợp v&agrave; tự động t&iacute;nh to&aacute;n để xuất b&aacute;o c&aacute;o.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh c&oacute; thể tr&iacute;ch xuất ch&iacute;nh x&aacute;c vật tư phục vụ thi c&ocirc;ng như thể t&iacute;ch b&ecirc; t&ocirc;ng, khối lượng th&eacute;p, diện t&iacute;ch v&aacute;n khu&ocirc;n từ đ&oacute; gi&uacute;p cho bộ phận dự to&aacute;n nhanh ch&oacute;ng r&aacute;p gi&aacute; v&agrave; đưa ra định mức dự to&aacute;n ph&ugrave; hợp cho từng dự &aacute;n.</p>\r\n\r\n<p>- C&aacute;c dự &aacute;n d&acirc;n dụng sẽ được KNC dựng h&igrave;nh đầy đủ v&agrave; chi tiết c&aacute;c th&agrave;nh phần theo từng hạng mục, giai đoạn để thuận tiện cho việc tr&iacute;ch xuất khối lượng nhanh v&agrave; ch&iacute;nh x&aacute;c nhất.</p>','xua-khoi-luong-tu-mo-hinh-bim-dan-dung','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','dan-dung-1625.png','xuat-khoi-luong-tu-mo-hinh-bim-dan-dung-2055.png'),
	(7,1,'service',4,0,'2021-06-25 16:12:00','2021-10-08 18:27:17','Công nghiệp','Công nghiệp en','Công nghiệp cn',NULL,NULL,'','<p>Phối cảnh 3D dự &aacute;n sẽ được xuất ra từ m&ocirc; h&igrave;nh BIM v&agrave; render nhanh ch&oacute;ng, xuất x&aacute;c, h&igrave;nh ảnh kết xuất chất lượng v&agrave; chi tiết...</p>','<p>Phối cảnh 3D dự &aacute;n sẽ được xuất ra từ m&ocirc; h&igrave;nh BIM v&agrave; render nhanh ch&oacute;ng, xuất x&aacute;c, h&igrave;nh ảnh kết xuất chất lượng v&agrave; chi tiết...en</p>','<p>Phối cảnh 3D dự &aacute;n sẽ được xuất ra từ m&ocirc; h&igrave;nh BIM v&agrave; render nhanh ch&oacute;ng, xuất x&aacute;c, h&igrave;nh ảnh kết xuất chất lượng v&agrave; chi tiết...cn</p>',1,1,NULL,1,'<p>- Phối cảnh kiến tr&uacute;c của khu c&ocirc;ng nghiệp ch&uacute; trọng nhiều v&agrave;o c&aacute;c hạng mục, hạ tầng, cảnh quan từ đ&oacute; lựa chọn m&agrave;u sắc, vật liệu ph&ugrave; hợp với thực tế từng hạng mục.</p>\r\n\r\n<p>- Giao th&ocirc;ng đ&oacute;ng g&oacute;p một phần kh&ocirc;ng nhỏ trong khu c&ocirc;ng nghiệp v&igrave; vậy giao th&ocirc;ng phải được t&iacute;nh to&aacute;n kỹ lưỡng trước khi sắp xếp vị tr&iacute; c&aacute;c hạng mục để thuận tiện việc vận chuyển, xe quay đầu kh&ocirc;ng bị vướng mắc.</p>\r\n\r\n<p>- Thiết kế sẽ đ&oacute;ng vai tr&ograve; v&ocirc; c&ugrave;ng quan trọng trong việc triển khai v&agrave; thi c&ocirc;ng nh&agrave; xưởng, k&egrave;m theo đ&oacute; phối cảnh sẽ thể hiện r&otilde; điểm mạnh về khu c&ocirc;ng nghiệp gi&uacute;p thu h&uacute;t c&aacute;c nh&agrave; đầu tư tham gia v&agrave;o dự &aacute;n.</p>\r\n\r\n<p>- KNC sẽ c&ugrave;ng đồng h&agrave;nh với Kh&aacute;ch h&agrave;ng trong suốt qu&aacute; tr&igrave;nh tư vấn, thiết kế, thi c&ocirc;ng đến khi ho&agrave;n thiện b&agrave;n giao vận h&agrave;nh.</p>','<p>- Phối cảnh kiến tr&uacute;c của khu c&ocirc;ng nghiệp ch&uacute; trọng nhiều v&agrave;o c&aacute;c hạng mục, hạ tầng, cảnh quan từ đ&oacute; lựa chọn m&agrave;u sắc, vật liệu ph&ugrave; hợp với thực tế từng hạng mục.</p>\r\n\r\n<p>- Giao th&ocirc;ng đ&oacute;ng g&oacute;p một phần kh&ocirc;ng nhỏ trong khu c&ocirc;ng nghiệp v&igrave; vậy giao th&ocirc;ng phải được t&iacute;nh to&aacute;n kỹ lưỡng trước khi sắp xếp vị tr&iacute; c&aacute;c hạng mục để thuận tiện việc vận chuyển, xe quay đầu kh&ocirc;ng bị vướng mắc.</p>\r\n\r\n<p>- Thiết kế sẽ đ&oacute;ng vai tr&ograve; v&ocirc; c&ugrave;ng quan trọng trong việc triển khai v&agrave; thi c&ocirc;ng nh&agrave; xưởng, k&egrave;m theo đ&oacute; phối cảnh sẽ thể hiện r&otilde; điểm mạnh về khu c&ocirc;ng nghiệp gi&uacute;p thu h&uacute;t c&aacute;c nh&agrave; đầu tư tham gia v&agrave;o dự &aacute;n.</p>\r\n\r\n<p>- KNC sẽ c&ugrave;ng đồng h&agrave;nh với Kh&aacute;ch h&agrave;ng trong suốt qu&aacute; tr&igrave;nh tư vấn, thiết kế, thi c&ocirc;ng đến khi ho&agrave;n thiện b&agrave;n giao vận h&agrave;nh.</p>','<p>- Phối cảnh kiến tr&uacute;c của khu c&ocirc;ng nghiệp ch&uacute; trọng nhiều v&agrave;o c&aacute;c hạng mục, hạ tầng, cảnh quan từ đ&oacute; lựa chọn m&agrave;u sắc, vật liệu ph&ugrave; hợp với thực tế từng hạng mục.</p>\r\n\r\n<p>- Giao th&ocirc;ng đ&oacute;ng g&oacute;p một phần kh&ocirc;ng nhỏ trong khu c&ocirc;ng nghiệp v&igrave; vậy giao th&ocirc;ng phải được t&iacute;nh to&aacute;n kỹ lưỡng trước khi sắp xếp vị tr&iacute; c&aacute;c hạng mục để thuận tiện việc vận chuyển, xe quay đầu kh&ocirc;ng bị vướng mắc.</p>\r\n\r\n<p>- Thiết kế sẽ đ&oacute;ng vai tr&ograve; v&ocirc; c&ugrave;ng quan trọng trong việc triển khai v&agrave; thi c&ocirc;ng nh&agrave; xưởng, k&egrave;m theo đ&oacute; phối cảnh sẽ thể hiện r&otilde; điểm mạnh về khu c&ocirc;ng nghiệp gi&uacute;p thu h&uacute;t c&aacute;c nh&agrave; đầu tư tham gia v&agrave;o dự &aacute;n.</p>\r\n\r\n<p>- KNC sẽ c&ugrave;ng đồng h&agrave;nh với Kh&aacute;ch h&agrave;ng trong suốt qu&aacute; tr&igrave;nh tư vấn, thiết kế, thi c&ocirc;ng đến khi ho&agrave;n thiện b&agrave;n giao vận h&agrave;nh.</p>','phoi-canh-kien-truc-cong-nghiep','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp','Công nghiệp en','Công nghiệp cn','cong-nghiep-1600.png','phoi-canh-kien-truc-cong-nghiep-2045.png'),
	(8,2,'service',4,0,'2021-06-25 16:13:48','2021-10-08 18:26:58','Dân dụng','Dân dụng en','Dân dụng cn',NULL,NULL,'','<p>Bản vẽ concept sẽ được thực hiện bằng m&ocirc; h&igrave;nh BIM 3D</p>','<p>Bản vẽ concept sẽ được thực hiện bằng m&ocirc; h&igrave;nh BIM 3D en</p>','<p>Bản vẽ concept sẽ được thực hiện bằng m&ocirc; h&igrave;nh BIM 3D cn</p>',1,1,NULL,1,'<p>- Phối cảnh kiến tr&uacute;c được xem l&agrave; bước đi đầu ti&ecirc;n trong việc ho&agrave;n thiện dự &aacute;n theo y&ecirc;u cầu từ Kh&aacute;ch h&agrave;ng. Bởi v&igrave; việc l&ecirc;n &yacute; tưởng sẽ đ&ograve;i hỏi người kiến tr&uacute;c sư phải cực kỳ nhạy b&eacute;n, đưa ra nhiều phong c&aacute;ch thiết kế ph&ugrave; hợp với y&ecirc;u cầu của Kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Đối với c&aacute;c dự &aacute;n biệt thự, kh&aacute;ch sạn, nh&agrave; cao tầng th&igrave; phối cảnh kiến tr&uacute;c sẽ mang lại cho Chủ Đầu Tư v&agrave; Kh&aacute;ch h&agrave;ng thấy được h&igrave;nh ảnh thực tế của dự &aacute;n, c&ocirc;ng năng sử dụng, cảnh quan đ&ocirc; thị...từ đ&oacute; sẽ đưa ra những phương &aacute;n v&agrave; sự lựa chọn ph&ugrave; hợp.</p>\r\n\r\n<p>- Xu hướng thiết kế ng&agrave;y c&agrave;ng hiện đại v&agrave; tạo đ&agrave; ph&aacute;t triển cho tương lai đ&ograve;i hỏi c&aacute;c kiến tr&uacute;c sư kh&ocirc;ng ngừng học hỏi, n&acirc;ng cao th&ecirc;m nhiều kỹ năng, phục vụ cho mọi dự &aacute;n.</p>\r\n\r\n<p>- &nbsp; Ch&iacute;nh v&igrave; c&aacute;c nhu cầu như tr&ecirc;n, c&aacute;c kiến tr&uacute;c sư của KNC với nhiều kinh nghiệm thực tế c&oacute; thể đ&aacute;p ứng mọi nhu cầu sử dụng v&agrave; mong muốn của Kh&aacute;ch h&agrave;ng.</p>','<p>- Phối cảnh kiến tr&uacute;c được xem l&agrave; bước đi đầu ti&ecirc;n trong việc ho&agrave;n thiện dự &aacute;n theo y&ecirc;u cầu từ Kh&aacute;ch h&agrave;ng. Bởi v&igrave; việc l&ecirc;n &yacute; tưởng sẽ đ&ograve;i hỏi người kiến tr&uacute;c sư phải cực kỳ nhạy b&eacute;n, đưa ra nhiều phong c&aacute;ch thiết kế ph&ugrave; hợp với y&ecirc;u cầu của Kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Đối với c&aacute;c dự &aacute;n biệt thự, kh&aacute;ch sạn, nh&agrave; cao tầng th&igrave; phối cảnh kiến tr&uacute;c sẽ mang lại cho Chủ Đầu Tư v&agrave; Kh&aacute;ch h&agrave;ng thấy được h&igrave;nh ảnh thực tế của dự &aacute;n, c&ocirc;ng năng sử dụng, cảnh quan đ&ocirc; thị...từ đ&oacute; sẽ đưa ra những phương &aacute;n v&agrave; sự lựa chọn ph&ugrave; hợp.</p>\r\n\r\n<p>- Xu hướng thiết kế ng&agrave;y c&agrave;ng hiện đại v&agrave; tạo đ&agrave; ph&aacute;t triển cho tương lai đ&ograve;i hỏi c&aacute;c kiến tr&uacute;c sư kh&ocirc;ng ngừng học hỏi, n&acirc;ng cao th&ecirc;m nhiều kỹ năng, phục vụ cho mọi dự &aacute;n.</p>\r\n\r\n<p>- &nbsp;&nbsp;Ch&iacute;nh v&igrave; c&aacute;c nhu cầu như tr&ecirc;n, c&aacute;c kiến tr&uacute;c sư của KNC với nhiều kinh nghiệm thực tế c&oacute; thể đ&aacute;p ứng mọi nhu cầu sử dụng v&agrave; mong muốn của Kh&aacute;ch h&agrave;ng.</p>','<p>- Phối cảnh kiến tr&uacute;c được xem l&agrave; bước đi đầu ti&ecirc;n trong việc ho&agrave;n thiện dự &aacute;n theo y&ecirc;u cầu từ Kh&aacute;ch h&agrave;ng. Bởi v&igrave; việc l&ecirc;n &yacute; tưởng sẽ đ&ograve;i hỏi người kiến tr&uacute;c sư phải cực kỳ nhạy b&eacute;n, đưa ra nhiều phong c&aacute;ch thiết kế ph&ugrave; hợp với y&ecirc;u cầu của Kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Đối với c&aacute;c dự &aacute;n biệt thự, kh&aacute;ch sạn, nh&agrave; cao tầng th&igrave; phối cảnh kiến tr&uacute;c sẽ mang lại cho Chủ Đầu Tư v&agrave; Kh&aacute;ch h&agrave;ng thấy được h&igrave;nh ảnh thực tế của dự &aacute;n, c&ocirc;ng năng sử dụng, cảnh quan đ&ocirc; thị...từ đ&oacute; sẽ đưa ra những phương &aacute;n v&agrave; sự lựa chọn ph&ugrave; hợp.</p>\r\n\r\n<p>- Xu hướng thiết kế ng&agrave;y c&agrave;ng hiện đại v&agrave; tạo đ&agrave; ph&aacute;t triển cho tương lai đ&ograve;i hỏi c&aacute;c kiến tr&uacute;c sư kh&ocirc;ng ngừng học hỏi, n&acirc;ng cao th&ecirc;m nhiều kỹ năng, phục vụ cho mọi dự &aacute;n.</p>\r\n\r\n<p>- &nbsp;&nbsp;Ch&iacute;nh v&igrave; c&aacute;c nhu cầu như tr&ecirc;n, c&aacute;c kiến tr&uacute;c sư của KNC với nhiều kinh nghiệm thực tế c&oacute; thể đ&aacute;p ứng mọi nhu cầu sử dụng v&agrave; mong muốn của Kh&aacute;ch h&agrave;ng.</p>','phoi-canh-kien-truc-dan-dung','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','dan-dung-1648.png','phoi-canh-kien-truc-dan-dung-2036.png'),
	(9,1,'service',5,0,'2021-06-25 16:15:27','2021-10-08 18:27:18','Công nghiệp','Công nghiệp en','Công nghiệp cn',NULL,NULL,NULL,'Bản vẽ sẽ được chuyển hóa từ quy định và tiêu chuẩn của đất nước này sang tiêu chuẩn của đất nước khác phục vụ cho việc xin phép xây dựng...','Bản vẽ sẽ được chuyển hóa từ quy định và tiêu chuẩn của đất nước này sang tiêu chuẩn của đất nước khác phục vụ cho việc xin phép xây dựng...en','Bản vẽ sẽ được chuyển hóa từ quy định và tiêu chuẩn của đất nước này sang tiêu chuẩn của đất nước khác phục vụ cho việc xin phép xây dựng...cn',1,1,NULL,1,'<p>- Với nhu cầu ng&agrave;y c&agrave;ng lớn của Kh&aacute;ch h&agrave;ng, chuyển h&oacute;a bản vẽ ra đời nhằm mục đ&iacute;ch gi&uacute;p cho Kh&aacute;ch h&agrave;ng c&oacute; thể chuyển đổi nhanh bản vẽ từ quy định cũ sang quy định mới, từ ti&ecirc;u chuẩn thiết kế của khu vực n&agrave;y sang ti&ecirc;u chuẩn thiết kế của khu vực kh&aacute;c.</p>\r\n\r\n<p>- Với c&aacute;c dự &aacute;n c&ocirc;ng nghiệp bản vẽ sẽ được khảo s&aacute;t, đ&aacute;nh gi&aacute; v&agrave; đưa ra phương &aacute;n điều chỉnh. Thời gian ho&agrave;n th&agrave;nh sẽ được t&iacute;nh to&aacute;n hợp l&yacute; nhằm gi&uacute;p cho Kh&aacute;ch h&agrave;ng nhận được sản phẩm chất lượng trong thời gian sớm nhất.</p>\r\n\r\n<p>- Qu&aacute; tr&igrave;nh chuyển đổi phụ thuộc v&agrave;o quy m&ocirc; của dự &aacute;n, quy định của từng quốc gia. Khi đ&oacute; Kh&aacute;ch h&agrave;ng sẽ được KNC hỗ trợ chuyển đổi một c&aacute;ch nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c nhất.</p>','<p>- Với nhu cầu ng&agrave;y c&agrave;ng lớn của Kh&aacute;ch h&agrave;ng, chuyển h&oacute;a bản vẽ ra đời nhằm mục đ&iacute;ch gi&uacute;p cho Kh&aacute;ch h&agrave;ng c&oacute; thể chuyển đổi nhanh bản vẽ từ quy định cũ sang quy định mới, từ ti&ecirc;u chuẩn thiết kế của khu vực n&agrave;y sang ti&ecirc;u chuẩn thiết kế của khu vực kh&aacute;c.</p>\r\n\r\n<p>- Với c&aacute;c dự &aacute;n c&ocirc;ng nghiệp bản vẽ sẽ được khảo s&aacute;t, đ&aacute;nh gi&aacute; v&agrave; đưa ra phương &aacute;n điều chỉnh. Thời gian ho&agrave;n th&agrave;nh sẽ được t&iacute;nh to&aacute;n hợp l&yacute; nhằm gi&uacute;p cho Kh&aacute;ch h&agrave;ng nhận được sản phẩm chất lượng trong thời gian sớm nhất.</p>\r\n\r\n<p>- Qu&aacute; tr&igrave;nh chuyển đổi phụ thuộc v&agrave;o quy m&ocirc; của dự &aacute;n, quy định của từng quốc gia. Khi đ&oacute; Kh&aacute;ch h&agrave;ng sẽ được KNC hỗ trợ chuyển đổi một c&aacute;ch nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c nhất.</p>','<p>- Với nhu cầu ng&agrave;y c&agrave;ng lớn của Kh&aacute;ch h&agrave;ng, chuyển h&oacute;a bản vẽ ra đời nhằm mục đ&iacute;ch gi&uacute;p cho Kh&aacute;ch h&agrave;ng c&oacute; thể chuyển đổi nhanh bản vẽ từ quy định cũ sang quy định mới, từ ti&ecirc;u chuẩn thiết kế của khu vực n&agrave;y sang ti&ecirc;u chuẩn thiết kế của khu vực kh&aacute;c.</p>\r\n\r\n<p>- Với c&aacute;c dự &aacute;n c&ocirc;ng nghiệp bản vẽ sẽ được khảo s&aacute;t, đ&aacute;nh gi&aacute; v&agrave; đưa ra phương &aacute;n điều chỉnh. Thời gian ho&agrave;n th&agrave;nh sẽ được t&iacute;nh to&aacute;n hợp l&yacute; nhằm gi&uacute;p cho Kh&aacute;ch h&agrave;ng nhận được sản phẩm chất lượng trong thời gian sớm nhất.</p>\r\n\r\n<p>- Qu&aacute; tr&igrave;nh chuyển đổi phụ thuộc v&agrave;o quy m&ocirc; của dự &aacute;n, quy định của từng quốc gia. Khi đ&oacute; Kh&aacute;ch h&agrave;ng sẽ được KNC hỗ trợ chuyển đổi một c&aacute;ch nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c nhất.</p>','chuyen-hoa-ban-ve-cong-nghiep','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp','Công nghiệp en','Công nghiệp cn','dan-dung-1627.png','chuyen-hoa-ban-ve-cong-nghiep-2015.png'),
	(10,2,'service',5,0,'2021-06-25 16:17:05','2021-10-08 18:27:14','Dân dụng','Dân dụng en','Dân dụng cn',NULL,NULL,NULL,'Bản vẽ sẽ được chuyển hóa từ quy định và tiêu chuẩn của đất nước này sang tiêu chuẩn của đất nước khác phục vụ cho việc xin phép xây dựng...','Bản vẽ sẽ được chuyển hóa từ quy định và tiêu chuẩn của đất nước này sang tiêu chuẩn của đất nước khác phục vụ cho việc xin phép xây dựng...en','Bản vẽ sẽ được chuyển hóa từ quy định và tiêu chuẩn của đất nước này sang tiêu chuẩn của đất nước khác phục vụ cho việc xin phép xây dựng...cn',1,1,NULL,1,'<p>- Với nhu cầu ng&agrave;y c&agrave;ng lớn của Kh&aacute;ch h&agrave;ng, chuyển h&oacute;a bản vẽ ra đời nhằm mục đ&iacute;ch gi&uacute;p cho Kh&aacute;ch h&agrave;ng c&oacute; thể chuyển đổi nhanh bản vẽ từ quy định cũ sang quy định mới, từ ti&ecirc;u chuẩn thiết kế của khu vực n&agrave;y sang ti&ecirc;u chuẩn thiết kế của khu vực kh&aacute;c.</p>\r\n\r\n<p>- Với c&aacute;c dự &aacute;n d&acirc;n dụng bản vẽ sẽ được khảo s&aacute;t, đ&aacute;nh gi&aacute; v&agrave; đưa ra phương &aacute;n điều chỉnh. Thời gian ho&agrave;n th&agrave;nh sẽ được t&iacute;nh to&aacute;n hợp l&yacute; nhằm gi&uacute;p cho Kh&aacute;ch h&agrave;ng nhận được sản phẩm chất lượng trong thời gian sớm nhất.</p>\r\n\r\n<p>- C&aacute;c vướng mắc về qu&aacute; tr&igrave;nh chuyển đổi sẽ được KNC cập nhật v&agrave; điều chỉnh li&ecirc;n tục với mục ti&ecirc;u x&acirc;y dựng cơ sở dữ liệu về quy định để chuyển đổi ph&ugrave; hợp cho từng khu vực.</p>\r\n\r\n<p>- Qu&aacute; tr&igrave;nh chuyển đổi phụ thuộc v&agrave;o diện t&iacute;ch, quy m&ocirc; của dự &aacute;n, quy định của từng quốc gia. Sau khi nắm được quy định của từng khu vực, Kh&aacute;ch h&agrave;ng sẽ được KNC hỗ trợ chuyển đổi một c&aacute;ch nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c nhất.</p>','<p>- Với nhu cầu ng&agrave;y c&agrave;ng lớn của Kh&aacute;ch h&agrave;ng, chuyển h&oacute;a bản vẽ ra đời nhằm mục đ&iacute;ch gi&uacute;p cho Kh&aacute;ch h&agrave;ng c&oacute; thể chuyển đổi nhanh bản vẽ từ quy định cũ sang quy định mới, từ ti&ecirc;u chuẩn thiết kế của khu vực n&agrave;y sang ti&ecirc;u chuẩn thiết kế của khu vực kh&aacute;c.</p>\r\n\r\n<p>- Với c&aacute;c dự &aacute;n d&acirc;n dụng bản vẽ sẽ được khảo s&aacute;t, đ&aacute;nh gi&aacute; v&agrave; đưa ra phương &aacute;n điều chỉnh. Thời gian ho&agrave;n th&agrave;nh sẽ được t&iacute;nh to&aacute;n hợp l&yacute; nhằm gi&uacute;p cho Kh&aacute;ch h&agrave;ng nhận được sản phẩm chất lượng trong thời gian sớm nhất.</p>\r\n\r\n<p>- C&aacute;c vướng mắc về qu&aacute; tr&igrave;nh chuyển đổi sẽ được KNC cập nhật v&agrave; điều chỉnh li&ecirc;n tục với mục ti&ecirc;u x&acirc;y dựng cơ sở dữ liệu về quy định để chuyển đổi ph&ugrave; hợp cho từng khu vực.</p>\r\n\r\n<p>- Qu&aacute; tr&igrave;nh chuyển đổi phụ thuộc v&agrave;o diện t&iacute;ch, quy m&ocirc; của dự &aacute;n, quy định của từng quốc gia. Sau khi nắm được quy định của từng khu vực, Kh&aacute;ch h&agrave;ng sẽ được KNC hỗ trợ chuyển đổi một c&aacute;ch nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c nhất.</p>','<p>- Với nhu cầu ng&agrave;y c&agrave;ng lớn của Kh&aacute;ch h&agrave;ng, chuyển h&oacute;a bản vẽ ra đời nhằm mục đ&iacute;ch gi&uacute;p cho Kh&aacute;ch h&agrave;ng c&oacute; thể chuyển đổi nhanh bản vẽ từ quy định cũ sang quy định mới, từ ti&ecirc;u chuẩn thiết kế của khu vực n&agrave;y sang ti&ecirc;u chuẩn thiết kế của khu vực kh&aacute;c.</p>\r\n\r\n<p>- Với c&aacute;c dự &aacute;n d&acirc;n dụng bản vẽ sẽ được khảo s&aacute;t, đ&aacute;nh gi&aacute; v&agrave; đưa ra phương &aacute;n điều chỉnh. Thời gian ho&agrave;n th&agrave;nh sẽ được t&iacute;nh to&aacute;n hợp l&yacute; nhằm gi&uacute;p cho Kh&aacute;ch h&agrave;ng nhận được sản phẩm chất lượng trong thời gian sớm nhất.</p>\r\n\r\n<p>- C&aacute;c vướng mắc về qu&aacute; tr&igrave;nh chuyển đổi sẽ được KNC cập nhật v&agrave; điều chỉnh li&ecirc;n tục với mục ti&ecirc;u x&acirc;y dựng cơ sở dữ liệu về quy định để chuyển đổi ph&ugrave; hợp cho từng khu vực.</p>\r\n\r\n<p>- Qu&aacute; tr&igrave;nh chuyển đổi phụ thuộc v&agrave;o diện t&iacute;ch, quy m&ocirc; của dự &aacute;n, quy định của từng quốc gia. Sau khi nắm được quy định của từng khu vực, Kh&aacute;ch h&agrave;ng sẽ được KNC hỗ trợ chuyển đổi một c&aacute;ch nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c nhất.</p>','chuyen-hoa-ban-ve-dan-dung','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','cong-nghiep-1605.png','chuyen-hoa-ban-ve-dan-dung-2051.png'),
	(11,1,'service',6,0,'2021-06-25 16:18:31','2021-10-08 18:26:47','Công nghiệp','Công nghiệp en','Công nghiệp cn',NULL,'https://www.youtube.com/watch?v=PtzlnxRo0wU','PtzlnxRo0wU','<p>Video giới thiệu dự &aacute;n nh&agrave; xưởng, khu c&ocirc;ng nghiệp với quy m&ocirc; lớn, chi tiết c&aacute;c hạng mục, gi&uacute;p Kh&aacute;ch h&agrave;ng thấy được trực quan về tổng thể của dự &aacute;n...</p>','<p>Video giới thiệu dự &aacute;n nh&agrave; xưởng, khu c&ocirc;ng nghiệp với quy m&ocirc; lớn, chi tiết c&aacute;c hạng mục, gi&uacute;p Kh&aacute;ch h&agrave;ng thấy được trực quan về tổng thể của dự &aacute;n...en</p>','<p>Video giới thiệu dự &aacute;n nh&agrave; xưởng, khu c&ocirc;ng nghiệp với quy m&ocirc; lớn, chi tiết c&aacute;c hạng mục, gi&uacute;p Kh&aacute;ch h&agrave;ng thấy được trực quan về tổng thể của dự &aacute;n...cn</p>',1,1,NULL,1,'<p>- Phim 3D giới thiệu dự &aacute;n c&ocirc;ng nghiệp nhằm gi&uacute;p cho Chủ Đầu Tư cũng như Kh&aacute;ch h&agrave;ng c&oacute; thể thấy được tổng quan dự &aacute;n, hạ tầng kỹ thuật v&agrave; c&aacute;c hạng mục l&acirc;n cận thực tế. Từ đ&oacute; hỗ trợ cho c&ocirc;ng việc kinh doanh của Chủ Đầu Tư, tạo dựng thương hiệu cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Sản phẩm sẽ l&agrave;m nổi bật điểm mạnh dự &aacute;n từ quy m&ocirc;, cảnh quan, kh&ocirc;ng gian l&agrave;m việc gi&uacute;p n&acirc;ng tầm gi&aacute; trị dự &aacute;n l&ecirc;n gấp nhiều lần.</p>\r\n\r\n<p>- Với đội ngũ nh&acirc;n vi&ecirc;n chuy&ecirc;n nghiệp v&agrave; d&agrave;y dặn kinh nghiệm về dựng h&igrave;nh, l&agrave;m phim. KNC tin chắc rằng sẽ tạo được dự &aacute;n thực tế v&agrave; chuy&ecirc;n nghiệp nhất.</p>','<p>- Phim 3D giới thiệu dự &aacute;n c&ocirc;ng nghiệp nhằm gi&uacute;p cho Chủ Đầu Tư cũng như Kh&aacute;ch h&agrave;ng c&oacute; thể thấy được tổng quan dự &aacute;n, hạ tầng kỹ thuật v&agrave; c&aacute;c hạng mục l&acirc;n cận thực tế. Từ đ&oacute; hỗ trợ cho c&ocirc;ng việc kinh doanh của Chủ Đầu Tư, tạo dựng thương hiệu cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Sản phẩm sẽ l&agrave;m nổi bật điểm mạnh dự &aacute;n từ quy m&ocirc;, cảnh quan, kh&ocirc;ng gian l&agrave;m việc gi&uacute;p n&acirc;ng tầm gi&aacute; trị dự &aacute;n l&ecirc;n gấp nhiều lần.</p>\r\n\r\n<p>- Với đội ngũ nh&acirc;n vi&ecirc;n chuy&ecirc;n nghiệp v&agrave; d&agrave;y dặn kinh nghiệm về dựng h&igrave;nh, l&agrave;m phim. KNC tin chắc rằng sẽ tạo được dự &aacute;n thực tế v&agrave; chuy&ecirc;n nghiệp nhất.</p>','<p>- Phim 3D giới thiệu dự &aacute;n c&ocirc;ng nghiệp nhằm gi&uacute;p cho Chủ Đầu Tư cũng như Kh&aacute;ch h&agrave;ng c&oacute; thể thấy được tổng quan dự &aacute;n, hạ tầng kỹ thuật v&agrave; c&aacute;c hạng mục l&acirc;n cận thực tế. Từ đ&oacute; hỗ trợ cho c&ocirc;ng việc kinh doanh của Chủ Đầu Tư, tạo dựng thương hiệu cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Sản phẩm sẽ l&agrave;m nổi bật điểm mạnh dự &aacute;n từ quy m&ocirc;, cảnh quan, kh&ocirc;ng gian l&agrave;m việc gi&uacute;p n&acirc;ng tầm gi&aacute; trị dự &aacute;n l&ecirc;n gấp nhiều lần.</p>\r\n\r\n<p>- Với đội ngũ nh&acirc;n vi&ecirc;n chuy&ecirc;n nghiệp v&agrave; d&agrave;y dặn kinh nghiệm về dựng h&igrave;nh, l&agrave;m phim. KNC tin chắc rằng sẽ tạo được dự &aacute;n thực tế v&agrave; chuy&ecirc;n nghiệp nhất.</p>','phim-3d-cong-nghiep','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp','Công nghiệp en','Công nghiệp cn','cong-nghiep-1631.png','placeholder.png'),
	(12,2,'service',6,0,'2021-06-25 16:20:01','2021-10-08 18:27:14','Dân dụng','Dân dụng en','Dân dụng cn',NULL,'https://www.youtube.com/watch?v=PtzlnxRo0wU','PtzlnxRo0wU','Video các dự án nhà cao tầng, khách sạn, biệt thự với những phong cách khác nhau sẽ giúp Khách hàng dễ dàng hình dung và lựa chọn phương án phù hợp nhất...','Video các dự án nhà cao tầng, khách sạn, biệt thự với những phong cách khác nhau sẽ giúp Khách hàng dễ dàng hình dung và lựa chọn phương án phù hợp nhất...en','Video các dự án nhà cao tầng, khách sạn, biệt thự với những phong cách khác nhau sẽ giúp Khách hàng dễ dàng hình dung và lựa chọn phương án phù hợp nhất...cn',1,1,NULL,1,'<p>- Phim 3D ch&iacute;nh l&agrave; c&aacute;ch hiệu quả để truyền b&aacute; th&ocirc;ng điệp của dự &aacute;n, gi&uacute;p kh&aacute;ch h&agrave;ng c&oacute; thể cảm nhận r&otilde; n&eacute;t, ch&acirc;n thực về kh&ocirc;ng gian sống v&agrave; l&agrave;m việc của c&aacute;c t&ograve;a nh&agrave;, biệt thự...</p>\r\n\r\n<p>- Gi&uacute;p Kh&aacute;ch h&agrave;ng thấy được c&aacute;c &yacute; tưởng thiết kế ngay từ đầu một c&aacute;ch thực tế v&agrave; sống động, từ đ&oacute; sẽ đưa ra quyết định chọn phương &aacute;n nhanh v&agrave; ph&ugrave; hợp nhất.</p>\r\n\r\n<p>- Tiết kiệm chi ph&iacute; cho c&aacute;c phải ph&aacute;p tiếp thị truyền th&ocirc;ng, gi&uacute;p Kh&aacute;ch h&agrave;ng dễ d&agrave;ng trong việc lựa chọn phương &aacute;n đầu tư hợp l&yacute;.&nbsp;</p>\r\n\r\n<p>- Từ những nhu cầu rất cần thiết như tr&ecirc;n, KNC đ&atilde; đ&aacute;p ứng tốt về mọi mặt từ kh&acirc;u &nbsp;thiết kế, dựng h&igrave;nh, l&agrave;m phim, chuyển động một c&aacute;ch linh hoạt. Sản phẩm đầu ra sẽ l&agrave;m thỏa m&atilde;n theo &yacute; tưởng của Kh&aacute;ch h&agrave;ng.</p>','<p>- Phim 3D ch&iacute;nh l&agrave; c&aacute;ch hiệu quả để truyền b&aacute; th&ocirc;ng điệp của dự &aacute;n, gi&uacute;p kh&aacute;ch h&agrave;ng c&oacute; thể cảm nhận r&otilde; n&eacute;t, ch&acirc;n thực về kh&ocirc;ng gian sống v&agrave; l&agrave;m việc của c&aacute;c t&ograve;a nh&agrave;, biệt thự...</p>\r\n\r\n<p>- Gi&uacute;p Kh&aacute;ch h&agrave;ng thấy được c&aacute;c &yacute; tưởng thiết kế ngay từ đầu một c&aacute;ch thực tế v&agrave; sống động, từ đ&oacute; sẽ đưa ra quyết định chọn phương &aacute;n nhanh v&agrave; ph&ugrave; hợp nhất.</p>\r\n\r\n<p>- Tiết kiệm chi ph&iacute; cho c&aacute;c phải ph&aacute;p tiếp thị truyền th&ocirc;ng, gi&uacute;p Kh&aacute;ch h&agrave;ng dễ d&agrave;ng trong việc lựa chọn phương &aacute;n đầu tư hợp l&yacute;.&nbsp;</p>\r\n\r\n<p>- Từ những nhu cầu rất cần thiết như tr&ecirc;n, KNC đ&atilde; đ&aacute;p ứng tốt về mọi mặt từ kh&acirc;u &nbsp;thiết kế, dựng h&igrave;nh, l&agrave;m phim, chuyển động một c&aacute;ch linh hoạt. Sản phẩm đầu ra sẽ l&agrave;m thỏa m&atilde;n theo &yacute; tưởng của Kh&aacute;ch h&agrave;ng.</p>','<p>- Phim 3D ch&iacute;nh l&agrave; c&aacute;ch hiệu quả để truyền b&aacute; th&ocirc;ng điệp của dự &aacute;n, gi&uacute;p kh&aacute;ch h&agrave;ng c&oacute; thể cảm nhận r&otilde; n&eacute;t, ch&acirc;n thực về kh&ocirc;ng gian sống v&agrave; l&agrave;m việc của c&aacute;c t&ograve;a nh&agrave;, biệt thự...</p>\r\n\r\n<p>- Gi&uacute;p Kh&aacute;ch h&agrave;ng thấy được c&aacute;c &yacute; tưởng thiết kế ngay từ đầu một c&aacute;ch thực tế v&agrave; sống động, từ đ&oacute; sẽ đưa ra quyết định chọn phương &aacute;n nhanh v&agrave; ph&ugrave; hợp nhất.</p>\r\n\r\n<p>- Tiết kiệm chi ph&iacute; cho c&aacute;c phải ph&aacute;p tiếp thị truyền th&ocirc;ng, gi&uacute;p Kh&aacute;ch h&agrave;ng dễ d&agrave;ng trong việc lựa chọn phương &aacute;n đầu tư hợp l&yacute;.&nbsp;</p>\r\n\r\n<p>- Từ những nhu cầu rất cần thiết như tr&ecirc;n, KNC đ&atilde; đ&aacute;p ứng tốt về mọi mặt từ kh&acirc;u &nbsp;thiết kế, dựng h&igrave;nh, l&agrave;m phim, chuyển động một c&aacute;ch linh hoạt. Sản phẩm đầu ra sẽ l&agrave;m thỏa m&atilde;n theo &yacute; tưởng của Kh&aacute;ch h&agrave;ng.</p>','phim-3d-dan-dung','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','dan-dung-1601.png','placeholder.png'),
	(13,1,'bimsv',NULL,0,'2021-10-02 11:29:13','2021-10-09 11:20:27','Dịch vụ BIM mới','Dịch vụ BIM mới en','Dịch vụ BIM mới cn',NULL,NULL,'','<p>M&ocirc; tả</p>',NULL,NULL,NULL,NULL,NULL,1,'<p>Nội dung</p>',NULL,NULL,'dich-vu-bim-moi','Dịch vụ BIM mới','Dịch vụ BIM mới en','Dịch vụ BIM mới cn','Dịch vụ BIM mới','Dịch vụ BIM mới en','Dịch vụ BIM mới cn','Dịch vụ BIM mới','Dịch vụ BIM mới en','Dịch vụ BIM mới cn','adobestock-242588052-1113.jpeg','placeholder.png');

/*!40000 ALTER TABLE `bimsvs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table careerposts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `careerposts`;

CREATE TABLE `careerposts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stt` int(11) DEFAULT NULL,
  `hide_show` int(11) DEFAULT NULL,
  `is_new` int(11) DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions_vi` longtext COLLATE utf8mb4_unicode_ci,
  `descriptions_en` longtext COLLATE utf8mb4_unicode_ci,
  `descriptions_cn` longtext COLLATE utf8mb4_unicode_ci,
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_vi` text COLLATE utf8mb4_unicode_ci,
  `keywords_en` text COLLATE utf8mb4_unicode_ci,
  `keywords_cn` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_cn` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `careerposts` WRITE;
/*!40000 ALTER TABLE `careerposts` DISABLE KEYS */;

INSERT INTO `careerposts` (`id`, `type`, `stt`, `hide_show`, `is_new`, `is_featured`, `view_count`, `created_at`, `updated_at`, `name_vi`, `name_en`, `name_cn`, `descriptions_vi`, `descriptions_en`, `descriptions_cn`, `content_vi`, `content_en`, `content_cn`, `slug`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`, `img`)
VALUES
	(1,'career',1,1,NULL,1,0,'2020-09-08 15:59:00','2021-06-28 10:33:09','Hệ thống đãi ngộ','Hệ thống đãi ngộ en','Hệ thống đãi ngộ cn',NULL,NULL,NULL,'<ul>\r\n	<li>Lương: Lương sản xuất kinh doanh (12 th&aacute;ng);</li>\r\n	<li>Thưởng lương th&aacute;ng thứ 13;</li>\r\n	<li>Phụ cấp: gồm hỗ trợ đi lại, cước điện thoại di động, ki&ecirc;m nhiệm;</li>\r\n	<li>Chế độ đặc biệt đối với c&aacute;n bộ l&agrave;m việc c&ocirc;ng tr&igrave;nh xa: bao gồm hỗ trợ ăn, ở, nghỉ ph&eacute;p định kỳ, cước điện thoại di động, ki&ecirc;m nhiệm;</li>\r\n	<li>Thưởng theo hiệu quả kinh doanh v&agrave; theo th&agrave;nh t&iacute;ch thực hiện dự &aacute;n/c&ocirc;ng việc;</li>\r\n	<li>Kh&aacute;m sức khỏe định kỳ, chế độ nghỉ m&aacute;t h&agrave;ng năm, qu&agrave; tặng lễ tết sinh nhật, ốm đau..</li>\r\n	<li>Ph&uacute;c lợi x&atilde; hội: Bảo hiểm x&atilde; hội / y tế /thất nghiệp&hellip;</li>\r\n</ul>','<ul>\r\n	<li>Lương: Lương sản xuất kinh doanh (12 th&aacute;ng);</li>\r\n	<li>Thưởng lương th&aacute;ng thứ 13;</li>\r\n	<li>Phụ cấp: gồm hỗ trợ đi lại, cước điện thoại di động, ki&ecirc;m nhiệm;</li>\r\n	<li>Chế độ đặc biệt đối với c&aacute;n bộ l&agrave;m việc c&ocirc;ng tr&igrave;nh xa: bao gồm hỗ trợ ăn, ở, nghỉ ph&eacute;p định kỳ, cước điện thoại di động, ki&ecirc;m nhiệm;</li>\r\n	<li>Thưởng theo hiệu quả kinh doanh v&agrave; theo th&agrave;nh t&iacute;ch thực hiện dự &aacute;n/c&ocirc;ng việc;</li>\r\n	<li>Kh&aacute;m sức khỏe định kỳ, chế độ nghỉ m&aacute;t h&agrave;ng năm, qu&agrave; tặng lễ tết sinh nhật, ốm đau..</li>\r\n	<li>Ph&uacute;c lợi x&atilde; hội: Bảo hiểm x&atilde; hội / y tế /thất nghiệp&hellip;en</li>\r\n</ul>','<ul>\r\n	<li>Lương: Lương sản xuất kinh doanh (12 th&aacute;ng);</li>\r\n	<li>Thưởng lương th&aacute;ng thứ 13;</li>\r\n	<li>Phụ cấp: gồm hỗ trợ đi lại, cước điện thoại di động, ki&ecirc;m nhiệm;</li>\r\n	<li>Chế độ đặc biệt đối với c&aacute;n bộ l&agrave;m việc c&ocirc;ng tr&igrave;nh xa: bao gồm hỗ trợ ăn, ở, nghỉ ph&eacute;p định kỳ, cước điện thoại di động, ki&ecirc;m nhiệm;</li>\r\n	<li>Thưởng theo hiệu quả kinh doanh v&agrave; theo th&agrave;nh t&iacute;ch thực hiện dự &aacute;n/c&ocirc;ng việc;</li>\r\n	<li>Kh&aacute;m sức khỏe định kỳ, chế độ nghỉ m&aacute;t h&agrave;ng năm, qu&agrave; tặng lễ tết sinh nhật, ốm đau..</li>\r\n	<li>Ph&uacute;c lợi x&atilde; hội: Bảo hiểm x&atilde; hội / y tế /thất nghiệp&hellip;cn</li>\r\n</ul>','he-thong-dai-ngo','Hệ thống đãi ngộ','Hệ thống đãi ngộ en','Hệ thống đãi ngộ cn','Hệ thống đãi ngộ','Hệ thống đãi ngộ en','Hệ thống đãi ngộ cn','Hệ thống đãi ngộ','Hệ thống đãi ngộ en','Hệ thống đãi ngộ cn','recruitment.jpg'),
	(2,'career',2,1,NULL,NULL,0,'2020-09-08 15:59:00','2021-06-28 10:42:43','Chương trình đào tạo','Chương trình đào tạo en','Chương trình đào tạo cn',NULL,NULL,NULL,'<ul>\r\n	<li>Đạo tạo cho kỹ sư mới ra trường ph&ugrave; hợp với năng lực v&agrave; hướng ph&aacute;t triển c&aacute; nh&acirc;n.</li>\r\n	<li>Bồi dưỡng đội ngũ l&atilde;nh đạo kế cận</li>\r\n	<li>Đ&agrave;o tạo lại theo từng chuy&ecirc;n m&ocirc;n gắn với quy định về thời gian lu&acirc;n chuyển c&ocirc;ng t&aacute;c giữa c&aacute;c vị tr&iacute; l&agrave;m việc.</li>\r\n</ul>','<ul>\r\n	<li>Đạo tạo cho kỹ sư mới ra trường ph&ugrave; hợp với năng lực v&agrave; hướng ph&aacute;t triển c&aacute; nh&acirc;n.</li>\r\n	<li>Bồi dưỡng đội ngũ l&atilde;nh đạo kế cận</li>\r\n	<li>Đ&agrave;o tạo lại theo từng chuy&ecirc;n m&ocirc;n gắn với quy định về thời gian lu&acirc;n chuyển c&ocirc;ng t&aacute;c giữa c&aacute;c vị tr&iacute; l&agrave;m việc. en</li>\r\n</ul>','<ul>\r\n	<li>Đạo tạo cho kỹ sư mới ra trường ph&ugrave; hợp với năng lực v&agrave; hướng ph&aacute;t triển c&aacute; nh&acirc;n.</li>\r\n	<li>Bồi dưỡng đội ngũ l&atilde;nh đạo kế cận</li>\r\n	<li>Đ&agrave;o tạo lại theo từng chuy&ecirc;n m&ocirc;n gắn với quy định về thời gian lu&acirc;n chuyển c&ocirc;ng t&aacute;c giữa c&aacute;c vị tr&iacute; l&agrave;m việc. cn</li>\r\n</ul>','chuong-trinh-dao-tao','Chương trình đào tạo','Chương trình đào tạo en','Chương trình đào tạo cn','Chương trình đào tạo','Chương trình đào tạo en','Chương trình đào tạo cn','Chương trình đào tạo','Chương trình đào tạo en','Chương trình đào tạo cn','recruitment.jpg'),
	(3,'career',3,1,NULL,NULL,0,'2020-09-08 15:59:00','2021-06-28 10:44:15','Tiêu chí đánh giá','Tiêu chí đánh giá en','Tiêu chí đánh giá cn',NULL,NULL,NULL,'<ul>\r\n	<li>Tương xứng với kết quả c&ocirc;ng việc, gi&aacute; trị đ&oacute;ng g&oacute;p cho KNC</li>\r\n	<li>Cạnh tranh theo thị trường;</li>\r\n	<li>Khuyến kh&iacute;ch tăng kết quả v&agrave; chất lượng c&ocirc;ng việc</li>\r\n	<li>C&ocirc;ng bằng v&agrave; minh bạch.</li>\r\n</ul>','<ul>\r\n	<li>Tương xứng với kết quả c&ocirc;ng việc, gi&aacute; trị đ&oacute;ng g&oacute;p cho KNC</li>\r\n	<li>Cạnh tranh theo thị trường;</li>\r\n	<li>Khuyến kh&iacute;ch tăng kết quả v&agrave; chất lượng c&ocirc;ng việc</li>\r\n	<li>C&ocirc;ng bằng v&agrave; minh bạch. en</li>\r\n</ul>','<ul>\r\n	<li>Tương xứng với kết quả c&ocirc;ng việc, gi&aacute; trị đ&oacute;ng g&oacute;p cho KNC</li>\r\n	<li>Cạnh tranh theo thị trường;</li>\r\n	<li>Khuyến kh&iacute;ch tăng kết quả v&agrave; chất lượng c&ocirc;ng việc</li>\r\n	<li>C&ocirc;ng bằng v&agrave; minh bạch. cn</li>\r\n</ul>','tieu-chi-danh-gia','Tiêu chí đánh giá','Tiêu chí đánh giá en','Tiêu chí đánh giá cn','Tiêu chí đánh giá','Tiêu chí đánh giá en','Tiêu chí đánh giá cn','Tiêu chí đánh giá','Tiêu chí đánh giá en','Tiêu chí đánh giá cn','recruitment.jpg'),
	(4,'career',4,0,NULL,NULL,0,'2020-09-08 15:59:00','2021-06-28 10:47:33','Chính sách tuyển dụng khác','Chính sách tuyển dụng khác en','Chính sách tuyển dụng khác cn',NULL,NULL,NULL,NULL,NULL,NULL,'chinh-sach-tuyen-dung-khac','Chính sách tuyển dụng khác','Chính sách tuyển dụng khác en','Chính sách tuyển dụng khác cn','Chính sách tuyển dụng khác','Chính sách tuyển dụng khác en','Chính sách tuyển dụng khác cn','Chính sách tuyển dụng khác','Chính sách tuyển dụng khác en','Chính sách tuyển dụng khác cn','recruitment.jpg');

/*!40000 ALTER TABLE `careerposts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table careers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `careers`;

CREATE TABLE `careers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hide_show` int(11) DEFAULT '0',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions_vi` text COLLATE utf8mb4_unicode_ci,
  `descriptions_en` text COLLATE utf8mb4_unicode_ci,
  `descriptions_cn` text COLLATE utf8mb4_unicode_ci,
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_vi` text COLLATE utf8mb4_unicode_ci,
  `keywords_en` text COLLATE utf8mb4_unicode_ci,
  `keywords_cn` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_cn` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_index` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `careers` WRITE;
/*!40000 ALTER TABLE `careers` DISABLE KEYS */;

INSERT INTO `careers` (`id`, `type`, `view_count`, `created_at`, `updated_at`, `hide_show`, `slug`, `name_vi`, `name_en`, `name_cn`, `descriptions_vi`, `descriptions_en`, `descriptions_cn`, `content_vi`, `content_en`, `content_cn`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`, `img`, `img_index`)
VALUES
	(1,'career',16,'2020-04-10 02:20:29','2021-06-28 10:15:39',1,'gioi-thieu.html','KNC TUYỂN DỤNG','KNC TUYỂN DỤNG EN','KNC TUYỂN DỤNG CN','KNC xây dựng môi trường làm việc chuyên nghiệp, minh bạch chế độ phúc lợi, đãi ngộ nhân tài. Nếu bạn sẵn sàng, chào mừng bạn đến với KNC ! Chúng tôi cần bạn!','KNC xây dựng môi trường làm việc chuyên nghiệp, minh bạch chế độ phúc lợi, đãi ngộ nhân tài. Nếu bạn sẵn sàng, chào mừng bạn đến với KNC ! Chúng tôi cần bạn! en','KNC xây dựng môi trường làm việc chuyên nghiệp, minh bạch chế độ phúc lợi, đãi ngộ nhân tài. Nếu bạn sẵn sàng, chào mừng bạn đến với KNC ! Chúng tôi cần bạn! cn','<p style=\"text-align:center\"><strong>CH&Iacute;NH S&Aacute;CH CHO NGƯỜI LAO ĐỘNG</strong><br />\r\nKNC rất ch&uacute; trọng đến ch&iacute;nh s&aacute;ch đ&atilde;i ngộ, quan t&acirc;m đến đời sống của c&aacute;n bộ nh&acirc;n vi&ecirc;n với phương ch&acirc;m tạo cho c&aacute;n bộ nh&acirc;n vi&ecirc;n c&oacute; một cuộc sống &ldquo;đầy đủ về vật chất v&agrave; phong ph&uacute; về tinh thần&rdquo;.</p>','<p style=\"text-align:center\"><strong>CH&Iacute;NH S&Aacute;CH CHO NGƯỜI LAO ĐỘNG</strong><br />\r\nKNC rất ch&uacute; trọng đến ch&iacute;nh s&aacute;ch đ&atilde;i ngộ, quan t&acirc;m đến đời sống của c&aacute;n bộ nh&acirc;n vi&ecirc;n với phương ch&acirc;m tạo cho c&aacute;n bộ nh&acirc;n vi&ecirc;n c&oacute; một cuộc sống &ldquo;đầy đủ về vật chất v&agrave; phong ph&uacute; về tinh thần&rdquo;. en</p>','<p style=\"text-align:center\"><strong>CH&Iacute;NH S&Aacute;CH CHO NGƯỜI LAO ĐỘNG</strong><br />\r\nKNC rất ch&uacute; trọng đến ch&iacute;nh s&aacute;ch đ&atilde;i ngộ, quan t&acirc;m đến đời sống của c&aacute;n bộ nh&acirc;n vi&ecirc;n với phương ch&acirc;m tạo cho c&aacute;n bộ nh&acirc;n vi&ecirc;n c&oacute; một cuộc sống &ldquo;đầy đủ về vật chất v&agrave; phong ph&uacute; về tinh thần&rdquo;. cn</p>','KNC TUYỂN DỤNG','KNC TUYỂN DỤNG EN','KNC TUYỂN DỤNG CN','KNC TUYỂN DỤNG','KNC TUYỂN DỤNG EN','KNC TUYỂN DỤNG CN','KNC TUYỂN DỤNG','KNC TUYỂN DỤNG EN','KNC TUYỂN DỤNG CN','office-1030.png','background-menu-0331.jpg');

/*!40000 ALTER TABLE `careers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stt` int(11) DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hide_show` int(11) DEFAULT '0',
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;

INSERT INTO `companies` (`id`, `stt`, `type`, `created_at`, `updated_at`, `hide_show`, `name_vi`, `name_en`, `name_cn`, `data`)
VALUES
	(1,1,'company','2021-09-07 10:24:44','2021-09-07 10:43:25',1,'Dự án hoàn thành','Succesful Projects','成功的项目','4500'),
	(2,2,'company','2021-09-07 10:32:37','2021-09-07 10:43:29',1,'Khách hàng hài lòng','Happy Clients','快乐的客户','700'),
	(3,3,'company','2021-09-07 10:35:05','2021-09-07 10:43:33',1,'Dự án từ BIM','BIM Experts','BIM专家','200'),
	(4,4,'company','2021-09-07 10:36:20','2021-09-07 10:43:38',1,'Năm kinh nghiệm','Years in Business','多年经验','15');

/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contactforms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contactforms`;

CREATE TABLE `contactforms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stt` int(11) DEFAULT '0',
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read` int(11) DEFAULT '0',
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `contactcontent` longtext COLLATE utf8mb4_unicode_ci,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table contacts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hide_show` int(11) DEFAULT '0',
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions_vi` text COLLATE utf8mb4_unicode_ci,
  `descriptions_en` text COLLATE utf8mb4_unicode_ci,
  `descriptions_cn` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_vi` text COLLATE utf8mb4_unicode_ci,
  `keywords_en` text COLLATE utf8mb4_unicode_ci,
  `keywords_cn` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_cn` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;

INSERT INTO `contacts` (`id`, `type`, `view_count`, `created_at`, `updated_at`, `hide_show`, `name_vi`, `name_en`, `name_cn`, `descriptions_vi`, `descriptions_en`, `descriptions_cn`, `slug`, `content_vi`, `content_en`, `content_cn`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`, `img`)
VALUES
	(1,'contact',14,'2019-11-25 09:14:53','2021-06-30 03:51:31',1,'Liên hệ','Contact Us','Liên hệ cn',NULL,NULL,NULL,NULL,'<p><strong>C&Ocirc;NG TY TNHH TƯ VẤN ĐẦU TƯ X&Acirc;Y DỰNG QUỐC TẾ KNC VIỆT NAM</strong><br />\r\n<strong>Văn Ph&ograve;ng:</strong> 99 Đường 3158B Phạm Th&ecirc;́ Hi&ecirc;̉n, Phường 7, Quận 8, TP. H&ocirc;̀ Chí Minh<br />\r\n<strong>Điện thoại:</strong> 0909849688<br />\r\n<strong>Email:</strong> info@kncdesign.com&nbsp;-&nbsp;Website: www.kncdesign.com</p>','<p><strong>C&Ocirc;NG TY TNHH TƯ VẤN ĐẦU TƯ X&Acirc;Y DỰNG QUỐC TẾ KNC VIỆT NAM</strong><br />\r\n<strong>Văn Ph&ograve;ng:</strong> 99 Đường 3158B Phạm Th&ecirc;́ Hi&ecirc;̉n, Phường 7, Quận 8, TP. H&ocirc;̀ Chí Minh<br />\r\n<strong>Điện thoại:</strong> 0909849688<br />\r\n<strong>Email:</strong> info@kncdesign.com&nbsp;-&nbsp;Website: www.kncdesign.com en</p>','<p><strong>C&Ocirc;NG TY TNHH TƯ VẤN ĐẦU TƯ X&Acirc;Y DỰNG QUỐC TẾ KNC VIỆT NAM</strong><br />\r\n<strong>Văn Ph&ograve;ng:</strong> 99 Đường 3158B Phạm Th&ecirc;́ Hi&ecirc;̉n, Phường 7, Quận 8, TP. H&ocirc;̀ Chí Minh<br />\r\n<strong>Điện thoại:</strong> 0909849688<br />\r\n<strong>Email:</strong> info@kncdesign.com&nbsp;-&nbsp;Website: www.kncdesign.com cn</p>','Liên hệ','Contact Us','Liên hệ cn','Liên hệ','Contact Us','Liên hệ cn','Liên hệ','Contact Us','Liên hệ cn','maps-0331.png');

/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table counters
# ------------------------------------------------------------

DROP TABLE IF EXISTS `counters`;

CREATE TABLE `counters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL,
  `ip` varchar(16) NOT NULL DEFAULT '0.0.0.0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `counters` WRITE;
/*!40000 ALTER TABLE `counters` DISABLE KEYS */;

INSERT INTO `counters` (`id`, `time`, `ip`)
VALUES
	(1,'2021-06-29 04:14:34','::1'),
	(2,'2021-06-29 04:23:10','::1'),
	(3,'2021-06-29 11:58:58','::1'),
	(4,'2021-06-29 14:03:44','::1'),
	(5,'2021-06-29 14:06:15','::1'),
	(6,'2021-06-29 14:08:55','::1'),
	(7,'2021-06-29 14:22:13','::1'),
	(8,'2021-06-29 14:31:53','::1'),
	(9,'2021-06-29 14:36:18','::1'),
	(10,'2021-06-29 15:47:45','::1'),
	(11,'2021-06-29 15:53:26','::1'),
	(12,'2021-06-29 16:04:46','::1'),
	(13,'2021-06-29 16:08:03','::1'),
	(14,'2021-06-29 17:31:52','::1'),
	(15,'2021-07-01 08:51:34','::1'),
	(16,'2021-07-01 10:51:09','::1'),
	(17,'2021-07-02 01:50:03','::1'),
	(18,'2021-07-03 00:43:15','::1'),
	(19,'2021-07-03 01:36:37','::1'),
	(20,'2021-07-03 01:43:40','::1'),
	(21,'2021-07-03 02:14:04','::1'),
	(22,'2021-07-03 02:30:42','::1'),
	(23,'2021-07-04 01:52:16','::1'),
	(24,'2021-07-17 09:29:25','::1'),
	(25,'2021-07-17 09:34:49','::1'),
	(26,'2021-07-17 09:37:06','::1'),
	(27,'2021-07-17 09:39:50','::1'),
	(28,'2021-07-17 09:43:09','::1'),
	(29,'2021-07-17 09:45:23','::1'),
	(30,'2021-07-17 09:48:05','::1'),
	(31,'2021-07-17 09:53:14','::1'),
	(32,'2021-07-17 09:55:46','::1'),
	(33,'2021-07-17 09:59:08','::1'),
	(34,'2021-07-17 10:02:17','::1'),
	(35,'2021-07-17 10:06:03','::1'),
	(36,'2021-07-17 10:09:24','::1'),
	(37,'2021-07-17 10:13:30','::1'),
	(38,'2021-07-17 10:16:54','::1'),
	(39,'2021-07-17 10:20:36','::1'),
	(40,'2021-07-17 10:23:13','::1'),
	(41,'2021-07-17 10:42:37','::1'),
	(42,'2021-07-17 10:47:05','::1'),
	(43,'2021-07-17 10:52:16','::1'),
	(44,'2021-07-17 10:57:13','::1'),
	(45,'2021-07-17 11:07:59','::1'),
	(46,'2021-07-17 11:25:08','::1'),
	(47,'2021-07-17 11:29:59','::1'),
	(48,'2021-07-17 11:33:29','::1'),
	(49,'2021-07-17 11:36:23','::1'),
	(50,'2021-07-17 11:43:09','::1'),
	(51,'2021-07-17 11:53:03','::1'),
	(52,'2021-07-17 16:56:21','::1'),
	(53,'2021-07-20 15:30:45','::1'),
	(54,'2021-07-20 15:36:10','::1'),
	(55,'2021-07-20 15:41:10','::1'),
	(56,'2021-07-20 15:47:34','::1'),
	(57,'2021-07-20 15:53:10','::1'),
	(58,'2021-07-20 15:58:03','::1'),
	(59,'2021-07-20 16:00:25','::1'),
	(60,'2021-07-20 16:00:41','::1'),
	(61,'2021-07-20 16:01:46','::1'),
	(62,'2021-07-20 16:12:36','::1'),
	(63,'2021-07-20 16:12:53','::1'),
	(64,'2021-07-20 16:20:07','::1'),
	(65,'2021-07-20 16:23:18','::1'),
	(66,'2021-07-20 16:44:16','::1'),
	(67,'2021-07-20 17:04:45','::1'),
	(68,'2021-07-20 17:28:16','::1'),
	(69,'2021-07-20 17:34:01','::1'),
	(70,'2021-07-24 01:15:39','::1'),
	(71,'2021-07-28 11:03:41','::1'),
	(72,'2021-07-29 10:50:59','::1'),
	(73,'2021-07-29 10:54:55','::1'),
	(74,'2021-07-29 11:01:07','::1'),
	(75,'2021-07-29 16:22:33','::1'),
	(76,'2021-08-03 15:47:08','::1'),
	(77,'2021-08-03 16:22:58','::1'),
	(78,'2021-08-04 09:51:13','::1'),
	(79,'2021-08-04 09:53:46','::1'),
	(80,'2021-08-04 09:57:40','::1'),
	(81,'2021-08-11 15:28:19','::1'),
	(82,'2021-09-03 15:34:15','127.0.0.1'),
	(83,'2021-09-05 10:30:15','::1'),
	(84,'2021-09-05 10:33:29','::1'),
	(85,'2021-09-05 10:37:09','::1'),
	(86,'2021-09-05 10:40:07','::1'),
	(87,'2021-09-05 10:42:26','::1'),
	(88,'2021-09-05 16:26:08','::1'),
	(89,'2021-09-05 16:30:24','::1'),
	(90,'2021-09-05 16:32:33','::1'),
	(91,'2021-09-05 16:35:05','::1'),
	(92,'2021-09-05 16:38:35','::1'),
	(93,'2021-09-05 16:41:06','::1'),
	(94,'2021-09-05 16:43:44','::1'),
	(95,'2021-09-05 16:48:15','::1'),
	(96,'2021-09-05 16:56:27','::1'),
	(97,'2021-09-06 09:38:48','::1'),
	(98,'2021-09-06 09:41:48','::1'),
	(99,'2021-09-06 11:31:04','::1'),
	(100,'2021-09-06 16:44:28','::1'),
	(101,'2021-09-06 17:16:53','::1'),
	(102,'2021-09-06 17:20:26','::1'),
	(103,'2021-09-06 17:33:28','::1'),
	(104,'2021-09-07 09:36:23','::1'),
	(105,'2021-09-07 10:46:30','::1'),
	(106,'2021-09-07 10:50:42','::1'),
	(107,'2021-10-02 08:49:25','::1'),
	(108,'2021-10-02 09:04:36','::1'),
	(109,'2021-10-02 09:08:22','::1'),
	(110,'2021-10-02 09:12:25','::1'),
	(111,'2021-10-02 09:16:08','::1'),
	(112,'2021-10-02 09:19:14','::1'),
	(113,'2021-10-02 09:49:21','::1'),
	(114,'2021-10-02 09:52:36','::1'),
	(115,'2021-10-02 09:56:48','::1'),
	(116,'2021-10-03 11:32:43','::1'),
	(117,'2021-10-03 11:36:15','::1'),
	(118,'2021-10-03 11:39:46','::1'),
	(119,'2021-10-03 15:53:58','::1'),
	(120,'2021-10-03 17:02:56','::1'),
	(121,'2021-10-03 17:09:32','::1'),
	(122,'2021-10-03 17:15:10','::1'),
	(123,'2021-10-04 10:15:08','::1'),
	(124,'2021-10-04 10:31:13','::1'),
	(125,'2021-10-04 18:32:22','::1'),
	(126,'2021-10-05 10:55:52','::1'),
	(127,'2021-10-06 00:33:47','::1'),
	(128,'2021-10-06 10:02:09','::1'),
	(129,'2021-10-07 02:27:37','::1'),
	(130,'2021-10-07 11:58:01','::1'),
	(131,'2021-10-08 18:27:25','::1'),
	(132,'2021-10-08 18:31:12','::1'),
	(133,'2021-10-09 10:30:00','::1'),
	(134,'2021-10-09 11:28:02','::1'),
	(135,'2021-10-09 11:37:19','::1'),
	(136,'2021-10-09 11:40:01','::1'),
	(137,'2021-10-09 11:44:56','::1'),
	(138,'2021-10-09 15:42:08','::1'),
	(139,'2021-10-11 16:33:57','::1');

/*!40000 ALTER TABLE `counters` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table expertiseposts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `expertiseposts`;

CREATE TABLE `expertiseposts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` int(11) DEFAULT '0',
  `is_new` int(11) DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stt` int(11) DEFAULT NULL,
  `descriptions_vi` longtext COLLATE utf8mb4_unicode_ci,
  `descriptions_en` longtext COLLATE utf8mb4_unicode_ci,
  `descriptions_cn` longtext COLLATE utf8mb4_unicode_ci,
  `hide_show` int(11) DEFAULT NULL,
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_vi` text COLLATE utf8mb4_unicode_ci,
  `keywords_en` text COLLATE utf8mb4_unicode_ci,
  `keywords_cn` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_cn` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `expertiseposts` WRITE;
/*!40000 ALTER TABLE `expertiseposts` DISABLE KEYS */;

INSERT INTO `expertiseposts` (`id`, `type`, `is_featured`, `is_new`, `view_count`, `created_at`, `updated_at`, `name_vi`, `name_en`, `name_cn`, `stt`, `descriptions_vi`, `descriptions_en`, `descriptions_cn`, `hide_show`, `content_vi`, `content_en`, `content_cn`, `slug`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`, `img`)
VALUES
	(1,'expertisepost',0,NULL,0,'2020-09-08 15:59:00','2021-07-17 16:53:59','APARTMENT','APARTMENT','APARTMENT',4,NULL,NULL,NULL,1,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'apartment-1601.png'),
	(2,'expertisepost',NULL,NULL,0,'2020-09-16 23:52:30','2021-10-05 16:21:27','GREEN BUILDING','GREEN BUILDING','GREEN BUILDING',2,NULL,NULL,NULL,1,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'green-building-1624.png'),
	(3,'expertisepost',NULL,NULL,0,'2020-09-19 01:04:27','2021-10-05 16:19:57','GREEN INDUSTRIAL','GREEN INDUSTRIAL','GREEN INDUSTRIAL',1,NULL,NULL,NULL,1,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'green-industrial-1629.png'),
	(4,'expertisepost',0,NULL,0,'2021-06-27 16:20:38','2021-07-17 16:54:01','OFFICE','OFFICE','OFFICE',5,NULL,NULL,NULL,1,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'office-1638.png'),
	(5,'expertisepost',0,NULL,0,'2021-06-27 16:26:23','2021-07-17 16:54:09','EDUCATION','EDUCATION','EDUCATION',6,NULL,NULL,NULL,1,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'education-1623.png'),
	(6,'expertisepost',0,NULL,0,'2021-06-27 16:31:35','2021-07-17 16:54:13','RESORT - HOTEL','RESORT - HOTEL','RESORT - HOTEL',7,NULL,NULL,NULL,1,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'resort-hotel-1635.png'),
	(7,'expertisepost',0,NULL,0,'2021-06-27 17:16:26','2021-07-17 16:54:21','HEALTHCARE','HEALTHCARE','HEALTHCARE',8,NULL,NULL,NULL,1,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'healthcare-1726.png'),
	(8,'expertisepost',0,NULL,0,'2021-06-27 17:29:09','2021-07-17 16:54:23','URBAN AREA','URBAN AREA','URBAN AREA',9,NULL,NULL,NULL,1,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'urban-area-1709.png'),
	(9,'expertisepost',0,NULL,0,'2021-07-17 16:51:57','2021-07-17 16:53:41','INFRASTRUCTURE','INFRASTRUCTURE','INFRASTRUCTURE',3,NULL,NULL,NULL,1,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'infrastructure-1610.png');

/*!40000 ALTER TABLE `expertiseposts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table expertises
# ------------------------------------------------------------

DROP TABLE IF EXISTS `expertises`;

CREATE TABLE `expertises` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions_vi` text COLLATE utf8mb4_unicode_ci,
  `descriptions_en` text COLLATE utf8mb4_unicode_ci,
  `descriptions_cn` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hide_show` int(11) DEFAULT '0',
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_vi` text COLLATE utf8mb4_unicode_ci,
  `keywords_en` text COLLATE utf8mb4_unicode_ci,
  `keywords_cn` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_cn` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `expertises` WRITE;
/*!40000 ALTER TABLE `expertises` DISABLE KEYS */;

INSERT INTO `expertises` (`id`, `type`, `view_count`, `created_at`, `updated_at`, `name_vi`, `name_en`, `name_cn`, `descriptions_vi`, `descriptions_en`, `descriptions_cn`, `slug`, `hide_show`, `content_vi`, `content_en`, `content_cn`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`, `img`, `slogan_vi`, `slogan_en`, `slogan_cn`, `img1`)
VALUES
	(1,'expertise',20,'2020-04-10 02:20:29','2021-07-24 01:10:15','INDUSTRIAL','INDUSTRIAL','INDUSTRIAL',NULL,NULL,NULL,'gioi-thieu.html',1,'<p>- KNC đ&atilde; dứng dụng c&ocirc;ng nghệ v&agrave;o qu&aacute; tr&igrave;nh thiết kế, triển khai v&agrave; vận h&agrave;nh theo quy tr&igrave;nh nhằm mục đ&iacute;ch tiết kiệm thời gian, xử l&yacute; triệt để va chạm giữa c&aacute;c bộ m&ocirc;n, hạn chế tối đa xung đột, tr&aacute;nh l&atilde;ng ph&iacute; cho Kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Việc &aacute;p dụng c&ocirc;ng nghệ BIM từ rất sớm v&agrave;o dự &aacute;n đ&atilde; mang lại gi&aacute; trị to lớn cho Kh&aacute;ch h&agrave;ng cũng như ch&iacute;nh KNC, gi&uacute;p Kh&aacute;ch h&agrave;ng tiết kiệm thời gian v&agrave; chi ph&iacute; đầu tư.</p>\r\n\r\n<p>- Với thế mạnh về c&aacute;c dự &aacute;n đ&atilde; thực hiện, KNC tự tin tạo n&ecirc;n những c&ocirc;ng tr&igrave;nh vững chắc v&agrave; an to&agrave;n cho Kh&aacute;ch h&agrave;ng.</p>','<p>- KNC đ&atilde; dứng dụng c&ocirc;ng nghệ v&agrave;o qu&aacute; tr&igrave;nh thiết kế, triển khai v&agrave; vận h&agrave;nh theo quy tr&igrave;nh nhằm mục đ&iacute;ch tiết kiệm thời gian, xử l&yacute; triệt để va chạm giữa c&aacute;c bộ m&ocirc;n, hạn chế tối đa xung đột, tr&aacute;nh l&atilde;ng ph&iacute; cho Kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Việc &aacute;p dụng c&ocirc;ng nghệ BIM từ rất sớm v&agrave;o dự &aacute;n đ&atilde; mang lại gi&aacute; trị to lớn cho Kh&aacute;ch h&agrave;ng cũng như ch&iacute;nh KNC, gi&uacute;p Kh&aacute;ch h&agrave;ng tiết kiệm thời gian v&agrave; chi ph&iacute; đầu tư.</p>\r\n\r\n<p>- Với thế mạnh về c&aacute;c dự &aacute;n đ&atilde; thực hiện, KNC tự tin tạo n&ecirc;n những c&ocirc;ng tr&igrave;nh vững chắc v&agrave; an to&agrave;n cho Kh&aacute;ch h&agrave;ng.</p>','<p>- KNC đ&atilde; dứng dụng c&ocirc;ng nghệ v&agrave;o qu&aacute; tr&igrave;nh thiết kế, triển khai v&agrave; vận h&agrave;nh theo quy tr&igrave;nh nhằm mục đ&iacute;ch tiết kiệm thời gian, xử l&yacute; triệt để va chạm giữa c&aacute;c bộ m&ocirc;n, hạn chế tối đa xung đột, tr&aacute;nh l&atilde;ng ph&iacute; cho Kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Việc &aacute;p dụng c&ocirc;ng nghệ BIM từ rất sớm v&agrave;o dự &aacute;n đ&atilde; mang lại gi&aacute; trị to lớn cho Kh&aacute;ch h&agrave;ng cũng như ch&iacute;nh KNC, gi&uacute;p Kh&aacute;ch h&agrave;ng tiết kiệm thời gian v&agrave; chi ph&iacute; đầu tư.</p>\r\n\r\n<p>- Với thế mạnh về c&aacute;c dự &aacute;n đ&atilde; thực hiện, KNC tự tin tạo n&ecirc;n những c&ocirc;ng tr&igrave;nh vững chắc v&agrave; an to&agrave;n cho Kh&aacute;ch h&agrave;ng.</p>','Chuyên môn','Expertise','专门技术','Chuyên môn','Expertise','专门技术','Chuyên môn','Expertise','专门技术','healthcare-1026.png','Giải pháp thiết kế thông minh','Giải pháp thiết kế thông minh en','Giải pháp thiết kế thông minh','anh-bia-chuyen-mon-1046.jpg');

/*!40000 ALTER TABLE `expertises` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table expertisesimages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `expertisesimages`;

CREATE TABLE `expertisesimages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `expertise_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `imgs` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `expertisesimages` WRITE;
/*!40000 ALTER TABLE `expertisesimages` DISABLE KEYS */;

INSERT INTO `expertisesimages` (`id`, `expertise_id`, `created_at`, `updated_at`, `name`, `imgs`)
VALUES
	(1,3,'2021-10-05 16:19:58','2021-10-05 16:19:58',NULL,'243941193-593696205311853-9122365908580667352-n-1658.jpeg'),
	(2,3,'2021-10-05 16:20:34','2021-10-05 16:20:34',NULL,'adobestock-418854634-1634.jpeg'),
	(3,3,'2021-10-05 16:20:35','2021-10-05 16:20:35',NULL,'adobestock-242588052-1635.jpeg'),
	(4,2,'2021-10-05 16:21:27','2021-10-05 16:21:27',NULL,'243941193-593696205311853-9122365908580667352-n-1627.jpeg'),
	(5,2,'2021-10-05 16:21:27','2021-10-05 16:21:27',NULL,'adobestock-418854634-1627.jpeg'),
	(6,2,'2021-10-05 16:21:27','2021-10-05 16:21:27',NULL,'adobestock-242588052-1627.jpeg');

/*!40000 ALTER TABLE `expertisesimages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table footers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `footers`;

CREATE TABLE `footers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hide_show` int(11) DEFAULT '0',
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `footers` WRITE;
/*!40000 ALTER TABLE `footers` DISABLE KEYS */;

INSERT INTO `footers` (`id`, `type`, `created_at`, `updated_at`, `hide_show`, `content_vi`, `content_en`, `content_cn`)
VALUES
	(1,'footer','2020-02-25 10:36:47','2021-10-08 11:25:54',1,'<p><strong>C&Ocirc;NG TY TNHH TƯ VẤN ĐẦU TƯ X&Acirc;Y DỰNG QUỐC TẾ KNC VIỆT NAM</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Văn Ph&ograve;ng:</strong> 99 Đường 3158B Phạm Th&ecirc;́ Hi&ecirc;̉n, Phường 7, Quận 8, TP. H&ocirc;̀ Chí Minh</li>\r\n	<li><strong>Điện thoại:</strong> 0909849688</li>\r\n	<li><strong>Email:</strong> info@kncdesign.com&nbsp;-&nbsp;Website: www.kncdesign.com</li>\r\n</ul>','<p><strong>C&Ocirc;NG TY TNHH TƯ VẤN ĐẦU TƯ X&Acirc;Y DỰNG QUỐC TẾ KNC VIỆT NAM</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Văn Ph&ograve;ng:</strong> 99 Đường 3158B Phạm Th&ecirc;́ Hi&ecirc;̉n, Phường 7, Quận 8, TP. H&ocirc;̀ Chí Minh<br />\r\n	<strong>Điện thoại:</strong> 0909849688<br />\r\n	<strong>Email:</strong> info@kncdesign.com&nbsp;-&nbsp;Website: www.kncdesign.com en</li>\r\n</ul>','<p><strong>C&Ocirc;NG TY TNHH TƯ VẤN ĐẦU TƯ X&Acirc;Y DỰNG QUỐC TẾ KNC VIỆT NAM</strong><br />\r\n<strong>Văn Ph&ograve;ng:</strong> 99 Đường 3158B Phạm Th&ecirc;́ Hi&ecirc;̉n, Phường 7, Quận 8, TP. H&ocirc;̀ Chí Minh<br />\r\n<strong>Điện thoại:</strong> 0909849688<br />\r\n<strong>Email:</strong> info@kncdesign.com&nbsp;-&nbsp;Website: www.kncdesign.com cn</p>');

/*!40000 ALTER TABLE `footers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table networks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `networks`;

CREATE TABLE `networks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions_vi` text COLLATE utf8mb4_unicode_ci,
  `descriptions_en` text COLLATE utf8mb4_unicode_ci,
  `descriptions_cn` text COLLATE utf8mb4_unicode_ci,
  `hide_show` int(11) DEFAULT '0',
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_vi` text COLLATE utf8mb4_unicode_ci,
  `keywords_en` text COLLATE utf8mb4_unicode_ci,
  `keywords_cn` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_cn` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `networks` WRITE;
/*!40000 ALTER TABLE `networks` DISABLE KEYS */;

INSERT INTO `networks` (`id`, `type`, `view_count`, `created_at`, `updated_at`, `name_vi`, `name_en`, `name_cn`, `descriptions_vi`, `descriptions_en`, `descriptions_cn`, `hide_show`, `content_vi`, `content_en`, `content_cn`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`, `img`)
VALUES
	(1,'network',17,'2020-04-10 02:20:29','2021-10-09 11:46:05','Khu vực','Network','区域','<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"605\" src=\"/public/uploads/images/maps.png\" width=\"1200\" /></p>','<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"605\" src=\"/public/uploads/images/maps.png\" width=\"1200\" /></p>','<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"605\" src=\"/public/uploads/images/maps.png\" width=\"1200\" /></p>',NULL,'<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"549\" src=\"/public/uploads/images/location.png\" width=\"1076\" /></p>\r\n\r\n<p><strong>Where we are</strong></p>','<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"549\" src=\"/public/uploads/images/location.png\" width=\"1076\" /></p>\r\n\r\n<p><strong>Where we are</strong></p>','<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" height=\"549\" src=\"/public/uploads/images/location.png\" width=\"1076\" /></p>\r\n\r\n<p><strong>Where we are</strong></p>','Khu vực','Network','区域','Khu vực','Network','区域','Khu vực','Network','区域','map-1657.png');

/*!40000 ALTER TABLE `networks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table newcategories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `newcategories`;

CREATE TABLE `newcategories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stt` int(11) DEFAULT NULL,
  `descriptions_vi` text COLLATE utf8mb4_unicode_ci,
  `descriptions_en` text COLLATE utf8mb4_unicode_ci,
  `hide_show` int(11) DEFAULT NULL,
  `show_nav` int(11) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_vi` text COLLATE utf8mb4_unicode_ci,
  `keywords_en` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table nwcategories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nwcategories`;

CREATE TABLE `nwcategories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stt` int(11) DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions_vi` text COLLATE utf8mb4_unicode_ci,
  `descriptions_en` text COLLATE utf8mb4_unicode_ci,
  `descriptions_cn` text COLLATE utf8mb4_unicode_ci,
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  `hide_show` int(11) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_vi` text COLLATE utf8mb4_unicode_ci,
  `keywords_en` text COLLATE utf8mb4_unicode_ci,
  `keywords_cn` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_cn` text COLLATE utf8mb4_unicode_ci,
  `is_featured` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `nwcategories` WRITE;
/*!40000 ALTER TABLE `nwcategories` DISABLE KEYS */;

INSERT INTO `nwcategories` (`id`, `stt`, `img`, `type`, `view_count`, `created_at`, `updated_at`, `name_vi`, `name_en`, `name_cn`, `phone`, `descriptions_vi`, `descriptions_en`, `descriptions_cn`, `content_vi`, `content_en`, `content_cn`, `hide_show`, `slug`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`, `is_featured`)
VALUES
	(1,1,'where-asia-0121.png','nwcategory',0,'2021-06-28 01:11:22','2021-06-28 01:25:46','Asia','Asia','Asia','+84 79 8888 186',NULL,NULL,NULL,NULL,NULL,NULL,1,'nguoi-lien-he-1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2,2,'where-aus-0129.png','nwcategory',0,'2021-06-28 01:26:35','2021-06-28 01:27:40','Australia','Australia','Australia','+84 79 8888 186',NULL,NULL,NULL,NULL,NULL,NULL,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(3,3,'where-middle-east-0118.png','nwcategory',0,'2021-06-28 01:28:18','2021-06-28 01:28:18','Middle East','Middle East','Middle East','+84 79 8888 186',NULL,NULL,NULL,NULL,NULL,NULL,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(4,4,'where-nz-0124.png','nwcategory',0,'2021-06-28 01:29:14','2021-06-28 01:29:25','New Zealand','New Zealand','New Zealand','+84 79 8888 186',NULL,NULL,NULL,NULL,NULL,NULL,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(5,5,'where-us-canada-0112.png','nwcategory',0,'2021-06-28 01:30:12','2021-06-28 01:30:12','Canada and USA','Canada and USA','Canada and USA','+84 79 8888 186',NULL,NULL,NULL,NULL,NULL,NULL,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(6,6,'where-uk-europe-0158.png','nwcategory',0,'2021-06-28 01:30:58','2021-06-28 01:31:05','UK and Europe','UK and Europe','UK and Europe','+84 79 8888 186',NULL,NULL,NULL,NULL,NULL,NULL,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(7,1,'placeholder.png','nwcategory',0,'2021-10-06 11:06:03','2021-10-06 11:06:03','Nhóm quản lý','Management Team','管理组',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(8,1,'placeholder.png','nwcategory',0,'2021-10-06 11:06:40','2021-10-06 11:06:40','Nhóm quản lý','Management Team','管理组',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `nwcategories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nwposts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nwposts`;

CREATE TABLE `nwposts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stt` int(11) DEFAULT NULL,
  `nwcategory_id` int(11) DEFAULT NULL,
  `hide_show` int(11) DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions_vi` longtext COLLATE utf8mb4_unicode_ci,
  `descriptions_en` longtext COLLATE utf8mb4_unicode_ci,
  `descriptions_cn` longtext COLLATE utf8mb4_unicode_ci,
  `is_featured` int(11) DEFAULT NULL,
  `is_new` int(11) DEFAULT NULL,
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_vi` text COLLATE utf8mb4_unicode_ci,
  `keywords_en` text COLLATE utf8mb4_unicode_ci,
  `keywords_cn` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_cn` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `nwposts` WRITE;
/*!40000 ALTER TABLE `nwposts` DISABLE KEYS */;

INSERT INTO `nwposts` (`id`, `type`, `stt`, `nwcategory_id`, `hide_show`, `view_count`, `created_at`, `updated_at`, `name_vi`, `name_en`, `name_cn`, `email`, `phone`, `whatsapp`, `descriptions_vi`, `descriptions_en`, `descriptions_cn`, `is_featured`, `is_new`, `content_vi`, `content_en`, `content_cn`, `slug`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`, `img`)
VALUES
	(1,'nwpost',1,1,1,0,'2021-06-28 01:37:13','2021-06-28 01:37:13','Người liên hệ 1','Người liên hệ 1 en','Người liên hệ 1 cn','info@kncdesign.com','+79 8888 186','+79 8888 186',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'nguoi-lien-he-1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'img-avatar3-0113.png'),
	(2,'post',2,1,1,0,'2021-06-28 09:35:04','2021-06-28 09:35:23','Người liên hệ 2','Người liên hệ 2 en','Người liên hệ 2 cn','info@kncdesign.com','+84 79 8888 186','+84 79 8888 186',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'img-avatar2-0923.png'),
	(3,'nwpost',3,1,1,0,'2021-06-28 09:36:25','2021-06-28 09:36:25','Người liên hệ 3','Người liên hệ 3 en','Người liên hệ 3 cn','info@kncdesign.com','+84 79 8888 186','+84 79 8888 186',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'img-avatar1-0925.png'),
	(4,'nwpost',4,1,1,0,'2021-06-28 09:37:30','2021-06-28 09:37:30','Người liên hệ 4','Người liên hệ 4 en','Người liên hệ 4 cn','info@kncdesign.com','+84 79 8888 186','+84 79 8888 186',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'img-avatar4-0930.png'),
	(5,'post',1,2,1,0,'2021-06-28 09:39:13','2021-06-28 09:41:17','Người liên hệ 5','Người liên hệ 5 en','Người liên hệ 5 cn','info@kncdesign.com','+84 79 8888 186','+84 79 8888 186',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'img-avatar6-0913.png'),
	(6,'nwpost',2,2,1,0,'2021-06-28 09:42:16','2021-06-28 09:42:16','Người liên hệ 6','Người liên hệ 6 en','Người liên hệ 6 cn','info@kncdesign.com','+84 79 8888 186','+84 79 8888 186',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'img-avatar4-0916.png'),
	(7,'nwpost',3,2,1,0,'2021-06-28 09:43:28','2021-06-28 09:43:28','Người liên hệ 7','Người liên hệ 7 en','Người liên hệ 7 cn','info@kncdesign.com','+84 79 8888 186','+84 79 8888 186',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'img-avatar1-0928.png'),
	(8,'nwpost',4,2,1,0,'2021-06-28 09:44:11','2021-06-28 09:44:11','Người liên hệ 8','Người liên hệ 8 en','Người liên hệ 8 cn','info@kncdesign.com','+84 79 8888 186','+84 79 8888 186',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'img-avatar2-0911.png');

/*!40000 ALTER TABLE `nwposts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table onlines
# ------------------------------------------------------------

DROP TABLE IF EXISTS `onlines`;

CREATE TABLE `onlines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `onlines` WRITE;
/*!40000 ALTER TABLE `onlines` DISABLE KEYS */;

INSERT INTO `onlines` (`id`, `session_id`, `created_at`, `updated_at`)
VALUES
	(521,'4523ffaI2ItbbPMkT1O6XVbZhBWJ5yWF9VuBM8zu','2021-10-11 16:33:57','2021-10-11 16:33:57');

/*!40000 ALTER TABLE `onlines` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table peoplecategories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `peoplecategories`;

CREATE TABLE `peoplecategories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stt` int(11) DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions_vi` text COLLATE utf8mb4_unicode_ci,
  `descriptions_en` text COLLATE utf8mb4_unicode_ci,
  `descriptions_cn` text COLLATE utf8mb4_unicode_ci,
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  `hide_show` int(11) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_vi` text COLLATE utf8mb4_unicode_ci,
  `keywords_en` text COLLATE utf8mb4_unicode_ci,
  `keywords_cn` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_cn` text COLLATE utf8mb4_unicode_ci,
  `is_featured` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `peoplecategories` WRITE;
/*!40000 ALTER TABLE `peoplecategories` DISABLE KEYS */;

INSERT INTO `peoplecategories` (`id`, `stt`, `img`, `type`, `view_count`, `created_at`, `updated_at`, `name_vi`, `name_en`, `name_cn`, `phone`, `descriptions_vi`, `descriptions_en`, `descriptions_cn`, `content_vi`, `content_en`, `content_cn`, `hide_show`, `slug`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`, `is_featured`)
VALUES
	(1,1,'placeholder.png','peoplecategory',0,'2021-10-06 11:10:21','2021-10-06 11:10:21','Nhóm quản lý','Management Team','管理组',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2,2,'placeholder.png','peoplecategory',0,'2021-10-06 11:13:27','2021-10-06 11:13:33','Quản lý kỹ thuật','Engineering Manager','技术管理',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(3,3,'placeholder.png','peoplecategory',0,'2021-10-06 11:13:55','2021-10-06 17:30:53','Nhóm hỗ trợ','Support Team','协助组',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `peoplecategories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `newcategory_id` int(11) DEFAULT NULL,
  `stt` int(11) DEFAULT NULL,
  `hide_show` int(11) DEFAULT NULL,
  `is_new` int(11) DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions_vi` longtext COLLATE utf8mb4_unicode_ci,
  `descriptions_en` longtext COLLATE utf8mb4_unicode_ci,
  `descriptions_cn` longtext COLLATE utf8mb4_unicode_ci,
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_vi` text COLLATE utf8mb4_unicode_ci,
  `keywords_en` text COLLATE utf8mb4_unicode_ci,
  `keywords_cn` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_cn` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `type`, `newcategory_id`, `stt`, `hide_show`, `is_new`, `is_featured`, `view_count`, `created_at`, `updated_at`, `name_vi`, `name_en`, `name_cn`, `descriptions_vi`, `descriptions_en`, `descriptions_cn`, `content_vi`, `content_en`, `content_cn`, `slug`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`, `img`)
VALUES
	(1,'post',NULL,1,1,NULL,NULL,1,'2020-04-29 19:19:40','2021-10-08 11:22:19','Lorem Ipsum là gì?','Lorem Ipsum là gì? en','Lorem Ipsum là gì? cn',NULL,NULL,NULL,'<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker.</p>','<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker. en</p>','<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker. cn</p>','lorem-ipsum-la-gi','Lorem Ipsum là gì?','Lorem Ipsum là gì? en','Lorem Ipsum là gì? cn','Lorem Ipsum là gì?','Lorem Ipsum là gì? en','Lorem Ipsum là gì? cn','Lorem Ipsum là gì?','Lorem Ipsum là gì? en','Lorem Ipsum là gì? cn','resort-hotel-0920.png'),
	(2,'post',NULL,2,1,NULL,NULL,0,'2020-07-24 20:11:47','2021-06-28 10:02:33','Nó đến từ đâu?','Nó đến từ đâu? en','Nó đến từ đâu? cn',NULL,NULL,NULL,NULL,NULL,NULL,'no-den-tu-dau','Nó đến từ đâu?','Nó đến từ đâu? en','Nó đến từ đâu? cn','Nó đến từ đâu?','Nó đến từ đâu? en','Nó đến từ đâu? cn','Nó đến từ đâu?','Nó đến từ đâu? en','Nó đến từ đâu? cn','office-1011.png'),
	(3,'post',NULL,3,1,NULL,NULL,0,'2020-07-24 20:12:44','2021-06-28 10:03:25','Tại sao lại sử dụng nó?','Tại sao lại sử dụng nó? en','Tại sao lại sử dụng nó? cn',NULL,NULL,NULL,NULL,NULL,NULL,'tai-sao-lai-su-dung-no','Tại sao lại sử dụng nó?','Tại sao lại sử dụng nó? en','Tại sao lại sử dụng nó? cn','Tại sao lại sử dụng nó?','Tại sao lại sử dụng nó? en','Tại sao lại sử dụng nó? cn','Tại sao lại sử dụng nó?','Tại sao lại sử dụng nó? en','Tại sao lại sử dụng nó? cn','healthcare-1025.png'),
	(4,'post',NULL,4,1,NULL,NULL,0,'2020-11-28 09:29:51','2021-06-28 10:04:51','Làm thế nào để có nó?','Làm thế nào để có nó? en','Làm thế nào để có nó? cn',NULL,'Làm thế nào để có nó? en',NULL,NULL,NULL,NULL,'lam-the-nao-de-co-no','Làm thế nào để có nó?','Làm thế nào để có nó? en','Làm thế nào để có nó? cn','Làm thế nào để có nó?','Làm thế nào để có nó? en','Làm thế nào để có nó? cn','Làm thế nào để có nó?','Làm thế nào để có nó? en','Làm thế nào để có nó? cn','green-building-1051.png');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table recruitments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `recruitments`;

CREATE TABLE `recruitments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stt` int(11) DEFAULT NULL,
  `hide_show` int(11) DEFAULT NULL,
  `is_new` int(11) DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date_expired` timestamp NULL DEFAULT NULL,
  `descriptions_vi` longtext COLLATE utf8mb4_unicode_ci,
  `descriptions_en` longtext COLLATE utf8mb4_unicode_ci,
  `descriptions_cn` longtext COLLATE utf8mb4_unicode_ci,
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_vi` text COLLATE utf8mb4_unicode_ci,
  `keywords_en` text COLLATE utf8mb4_unicode_ci,
  `keywords_cn` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_cn` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `recruitments` WRITE;
/*!40000 ALTER TABLE `recruitments` DISABLE KEYS */;

INSERT INTO `recruitments` (`id`, `type`, `stt`, `hide_show`, `is_new`, `is_featured`, `view_count`, `created_at`, `updated_at`, `name_vi`, `name_en`, `name_cn`, `quantity`, `date_expired`, `descriptions_vi`, `descriptions_en`, `descriptions_cn`, `content_vi`, `content_en`, `content_cn`, `slug`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`, `img`)
VALUES
	(1,'recruitment',1,1,NULL,NULL,0,'2020-09-08 15:59:00','2021-06-29 03:10:30','Tin tuyển dụng 1','Tin tuyển dụng 1 en','Tin tuyển dụng 1 cn',6,'2021-07-10 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,'tin-tuyen-dung-1','Tin tuyển dụng 1','Tin tuyển dụng 1 en','Tin tuyển dụng 1 cn','Tin tuyển dụng 1','Tin tuyển dụng 1 en','Tin tuyển dụng 1 cn','Tin tuyển dụng 1','Tin tuyển dụng 1 en','Tin tuyển dụng 1 cn','recruitment.jpg'),
	(2,'recruitment',2,1,NULL,NULL,0,'2020-09-08 15:59:00','2021-06-29 03:14:00','Tin tuyển dụng 2','Tin tuyển dụng 2 en','Tin tuyển dụng 2 cn',8,'2021-07-06 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,'tin-tuyen-dung-2','Tin tuyển dụng 2','Tin tuyển dụng 2 en','Tin tuyển dụng 2 cn','Tin tuyển dụng 2','Tin tuyển dụng 2 en','Tin tuyển dụng 2 cn','Tin tuyển dụng 2','Tin tuyển dụng 2 en','Tin tuyển dụng 2 cn','recruitment.jpg'),
	(3,'recruitment',3,1,NULL,NULL,0,'2020-09-08 15:59:00','2021-06-29 03:14:00','Tin tuyển dụng 3','Tin tuyển dụng 3 en','Tin tuyển dụng 3 cn',2,'2021-06-30 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,'tin-tuyen-dung-3','Tin tuyển dụng 3','Tin tuyển dụng 3 en','Tin tuyển dụng 3 cn','Tin tuyển dụng 3','Tin tuyển dụng 3 en','Tin tuyển dụng 3 cn','Tin tuyển dụng 3','Tin tuyển dụng 3 en','Tin tuyển dụng 3 cn','recruitment.jpg'),
	(4,'recruitment',4,1,NULL,NULL,0,'2021-06-28 17:54:48','2021-06-29 03:14:02','Tin tuyển dụng 4','Tin tuyển dụng 4 en','Tin tuyển dụng 4 cn',1,'2021-07-01 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,'tin-tuyen-dung-4','Tin tuyển dụng 4','Tin tuyển dụng 4 en','Tin tuyển dụng 4 cn','Tin tuyển dụng 4','Tin tuyển dụng 4 en','Tin tuyển dụng 4 cn','Tin tuyển dụng 4','Tin tuyển dụng 4 en','Tin tuyển dụng 4 cn','recruitment-0334.jpeg');

/*!40000 ALTER TABLE `recruitments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table servis
# ------------------------------------------------------------

DROP TABLE IF EXISTS `servis`;

CREATE TABLE `servis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stt` int(11) DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `svcategory_id` int(11) DEFAULT '0',
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions_vi` longtext COLLATE utf8mb4_unicode_ci,
  `descriptions_en` longtext COLLATE utf8mb4_unicode_ci,
  `descriptions_cn` longtext COLLATE utf8mb4_unicode_ci,
  `is_featured` int(11) DEFAULT NULL,
  `is_new` int(11) DEFAULT NULL,
  `hide_show` int(11) DEFAULT NULL,
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  `content1_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content1_en` longtext COLLATE utf8mb4_unicode_ci,
  `content1_cn` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_vi` text COLLATE utf8mb4_unicode_ci,
  `keywords_en` text COLLATE utf8mb4_unicode_ci,
  `keywords_cn` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_cn` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `servis` WRITE;
/*!40000 ALTER TABLE `servis` DISABLE KEYS */;

INSERT INTO `servis` (`id`, `stt`, `type`, `svcategory_id`, `view_count`, `created_at`, `updated_at`, `name_vi`, `name_en`, `name_cn`, `video`, `video_code`, `descriptions_vi`, `descriptions_en`, `descriptions_cn`, `is_featured`, `is_new`, `hide_show`, `content_vi`, `content_en`, `content_cn`, `content1_vi`, `content1_en`, `content1_cn`, `slug`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`, `img`, `img1`)
VALUES
	(1,1,'service',1,0,'2020-09-08 15:42:00','2021-10-02 17:01:05','Công nghiệp','Công nghiệp en','Công nghiệp cn',NULL,'','<p>Tất cả hạng mục nh&agrave; xưởng, nh&agrave; kho, d&acirc;y chuyền sản xuất...đều được m&ocirc; h&igrave;nh BIM từ giai đoạn thiết kế &yacute; tưởng đến giai đoạn thiết kế cơ sở v&agrave; thiết kế thi c&ocirc;ng...</p>','<p>Tất cả hạng mục nh&agrave; xưởng, nh&agrave; kho, d&acirc;y chuyền sản xuất...đều được m&ocirc; h&igrave;nh BIM từ giai đoạn thiết kế &yacute; tưởng đến giai đoạn thiết kế cơ sở v&agrave; thiết kế thi c&ocirc;ng...en</p>','<p>Tất cả hạng mục nh&agrave; xưởng, nh&agrave; kho, d&acirc;y chuyền sản xuất...đều được m&ocirc; h&igrave;nh BIM từ giai đoạn thiết kế &yacute; tưởng đến giai đoạn thiết kế cơ sở v&agrave; thiết kế thi c&ocirc;ng...cn</p>',1,NULL,1,'<p style=\"text-align:justify\">- M&ocirc; h&igrave;nh BIM về nh&agrave; xưởng, khu c&ocirc;ng nghiệp sẽ được thể hiện đầy đủ chi tiết cấu kiện, li&ecirc;n kết, cao độ v&agrave; số lượng. Nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất, lắp đặt, xuất khối lượng để t&iacute;nh to&aacute;n chi ph&iacute; cho to&agrave;n dự &aacute;n.</p>\r\n\r\n<p style=\"text-align:justify\">- &Aacute;p dụng c&ocirc;ng nghệ tự động h&oacute;a v&agrave;o m&ocirc; h&igrave;nh nhằm tăng hiệu suất dựng h&igrave;nh, tăng độ ch&iacute;nh x&aacute;c, tiết kiệm thời gian v&agrave; chi ph&iacute; cho Kh&aacute;ch h&agrave;ng v&agrave; KNC.</p>\r\n\r\n<p style=\"text-align:justify\">- M&ocirc; h&igrave;nh trực quan sẽ gi&uacute;p giải quyết c&aacute;c vấn đề về đọc bản vẽ 2D m&agrave; trước đ&acirc;y thường mắc phải c&aacute;c lỗi nghi&ecirc;m trọng như ch&ecirc;nh lệch cao độ của cấu kiện giữa c&aacute;c bộ m&ocirc;n.</p>\r\n\r\n<p style=\"text-align:justify\">- Chi tiết li&ecirc;n kết trong m&ocirc; h&igrave;nh BIM được thể hiện đầy đủ số lượng, ch&iacute;nh x&aacute;c k&iacute;ch thước, vị tr&iacute;, cao độ, vật liệu cấu tạo nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất v&agrave; lắp đặt.</p>\r\n\r\n<p style=\"text-align:justify\">- Với m&ocirc; h&igrave;nh 3D th&igrave; c&aacute;c vị tr&iacute; như li&ecirc;n kết, mối nối v&agrave; những li&ecirc;n kết phức tạp kh&aacute;c sẽ được quan s&aacute;t r&otilde; r&agrave;ng hơn. Từ đ&oacute; gi&uacute;p cho đơn vị thi c&ocirc;ng c&oacute; thể thấy được ch&iacute;nh x&aacute;c h&igrave;nh dạng, vị tr&iacute; v&agrave; cao độ của cấu kiện.</p>','<p>- M&ocirc; h&igrave;nh BIM về nh&agrave; xưởng, khu c&ocirc;ng nghiệp sẽ được thể hiện đầy đủ chi tiết cấu kiện, li&ecirc;n kết, cao độ v&agrave; số lượng. Nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất, lắp đặt, xuất khối lượng để t&iacute;nh to&aacute;n chi ph&iacute; cho to&agrave;n dự &aacute;n.</p>\r\n\r\n<p>- &Aacute;p dụng c&ocirc;ng nghệ tự động h&oacute;a v&agrave;o m&ocirc; h&igrave;nh nhằm tăng hiệu suất dựng h&igrave;nh, tăng độ ch&iacute;nh x&aacute;c, tiết kiệm thời gian v&agrave; chi ph&iacute; cho Kh&aacute;ch h&agrave;ng v&agrave; KNC.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh trực quan sẽ gi&uacute;p giải quyết c&aacute;c vấn đề về đọc bản vẽ 2D m&agrave; trước đ&acirc;y thường mắc phải c&aacute;c lỗi nghi&ecirc;m trọng như ch&ecirc;nh lệch cao độ của cấu kiện giữa c&aacute;c bộ m&ocirc;n.</p>\r\n\r\n<p>- Chi tiết li&ecirc;n kết trong m&ocirc; h&igrave;nh BIM được thể hiện đầy đủ số lượng, ch&iacute;nh x&aacute;c k&iacute;ch thước, vị tr&iacute;, cao độ, vật liệu cấu tạo nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất v&agrave; lắp đặt.</p>\r\n\r\n<p>- Với m&ocirc; h&igrave;nh 3D th&igrave; c&aacute;c vị tr&iacute; như li&ecirc;n kết, mối nối v&agrave; những li&ecirc;n kết phức tạp kh&aacute;c sẽ được quan s&aacute;t r&otilde; r&agrave;ng hơn. Từ đ&oacute; gi&uacute;p cho đơn vị thi c&ocirc;ng c&oacute; thể thấy được ch&iacute;nh x&aacute;c h&igrave;nh dạng, vị tr&iacute; v&agrave; cao độ của cấu kiện.</p>','<p>- M&ocirc; h&igrave;nh BIM về nh&agrave; xưởng, khu c&ocirc;ng nghiệp sẽ được thể hiện đầy đủ chi tiết cấu kiện, li&ecirc;n kết, cao độ v&agrave; số lượng. Nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất, lắp đặt, xuất khối lượng để t&iacute;nh to&aacute;n chi ph&iacute; cho to&agrave;n dự &aacute;n.</p>\r\n\r\n<p>- &Aacute;p dụng c&ocirc;ng nghệ tự động h&oacute;a v&agrave;o m&ocirc; h&igrave;nh nhằm tăng hiệu suất dựng h&igrave;nh, tăng độ ch&iacute;nh x&aacute;c, tiết kiệm thời gian v&agrave; chi ph&iacute; cho Kh&aacute;ch h&agrave;ng v&agrave; KNC.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh trực quan sẽ gi&uacute;p giải quyết c&aacute;c vấn đề về đọc bản vẽ 2D m&agrave; trước đ&acirc;y thường mắc phải c&aacute;c lỗi nghi&ecirc;m trọng như ch&ecirc;nh lệch cao độ của cấu kiện giữa c&aacute;c bộ m&ocirc;n.</p>\r\n\r\n<p>- Chi tiết li&ecirc;n kết trong m&ocirc; h&igrave;nh BIM được thể hiện đầy đủ số lượng, ch&iacute;nh x&aacute;c k&iacute;ch thước, vị tr&iacute;, cao độ, vật liệu cấu tạo nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất v&agrave; lắp đặt.</p>\r\n\r\n<p>- Với m&ocirc; h&igrave;nh 3D th&igrave; c&aacute;c vị tr&iacute; như li&ecirc;n kết, mối nối v&agrave; những li&ecirc;n kết phức tạp kh&aacute;c sẽ được quan s&aacute;t r&otilde; r&agrave;ng hơn. Từ đ&oacute; gi&uacute;p cho đơn vị thi c&ocirc;ng c&oacute; thể thấy được ch&iacute;nh x&aacute;c h&igrave;nh dạng, vị tr&iacute; v&agrave; cao độ của cấu kiện.</p>','<p style=\"text-align:justify\">- M&ocirc; h&igrave;nh BIM về nh&agrave; xưởng, khu c&ocirc;ng nghiệp sẽ được thể hiện đầy đủ chi tiết cấu kiện, li&ecirc;n kết, cao độ v&agrave; số lượng. Nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất, lắp đặt, xuất khối lượng để t&iacute;nh to&aacute;n chi ph&iacute; cho to&agrave;n dự &aacute;n.</p>\r\n\r\n<p style=\"text-align:justify\">- &Aacute;p dụng c&ocirc;ng nghệ tự động h&oacute;a v&agrave;o m&ocirc; h&igrave;nh nhằm tăng hiệu suất dựng h&igrave;nh, tăng độ ch&iacute;nh x&aacute;c, tiết kiệm thời gian v&agrave; chi ph&iacute; cho Kh&aacute;ch h&agrave;ng v&agrave; KNC.</p>\r\n\r\n<p style=\"text-align:justify\">- M&ocirc; h&igrave;nh trực quan sẽ gi&uacute;p giải quyết c&aacute;c vấn đề về đọc bản vẽ 2D m&agrave; trước đ&acirc;y thường mắc phải c&aacute;c lỗi nghi&ecirc;m trọng như ch&ecirc;nh lệch cao độ của cấu kiện giữa c&aacute;c bộ m&ocirc;n.</p>\r\n\r\n<p style=\"text-align:justify\">- Chi tiết li&ecirc;n kết trong m&ocirc; h&igrave;nh BIM được thể hiện đầy đủ số lượng, ch&iacute;nh x&aacute;c k&iacute;ch thước, vị tr&iacute;, cao độ, vật liệu cấu tạo nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất v&agrave; lắp đặt.</p>\r\n\r\n<p style=\"text-align:justify\">- Với m&ocirc; h&igrave;nh 3D th&igrave; c&aacute;c vị tr&iacute; như li&ecirc;n kết, mối nối v&agrave; những li&ecirc;n kết phức tạp kh&aacute;c sẽ được quan s&aacute;t r&otilde; r&agrave;ng hơn. Từ đ&oacute; gi&uacute;p cho đơn vị thi c&ocirc;ng c&oacute; thể thấy được ch&iacute;nh x&aacute;c h&igrave;nh dạng, vị tr&iacute; v&agrave; cao độ của cấu kiện.</p>','<p>- M&ocirc; h&igrave;nh BIM về nh&agrave; xưởng, khu c&ocirc;ng nghiệp sẽ được thể hiện đầy đủ chi tiết cấu kiện, li&ecirc;n kết, cao độ v&agrave; số lượng. Nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất, lắp đặt, xuất khối lượng để t&iacute;nh to&aacute;n chi ph&iacute; cho to&agrave;n dự &aacute;n.</p>\r\n\r\n<p>- &Aacute;p dụng c&ocirc;ng nghệ tự động h&oacute;a v&agrave;o m&ocirc; h&igrave;nh nhằm tăng hiệu suất dựng h&igrave;nh, tăng độ ch&iacute;nh x&aacute;c, tiết kiệm thời gian v&agrave; chi ph&iacute; cho Kh&aacute;ch h&agrave;ng v&agrave; KNC.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh trực quan sẽ gi&uacute;p giải quyết c&aacute;c vấn đề về đọc bản vẽ 2D m&agrave; trước đ&acirc;y thường mắc phải c&aacute;c lỗi nghi&ecirc;m trọng như ch&ecirc;nh lệch cao độ của cấu kiện giữa c&aacute;c bộ m&ocirc;n.</p>\r\n\r\n<p>- Chi tiết li&ecirc;n kết trong m&ocirc; h&igrave;nh BIM được thể hiện đầy đủ số lượng, ch&iacute;nh x&aacute;c k&iacute;ch thước, vị tr&iacute;, cao độ, vật liệu cấu tạo nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất v&agrave; lắp đặt.</p>\r\n\r\n<p>- Với m&ocirc; h&igrave;nh 3D th&igrave; c&aacute;c vị tr&iacute; như li&ecirc;n kết, mối nối v&agrave; những li&ecirc;n kết phức tạp kh&aacute;c sẽ được quan s&aacute;t r&otilde; r&agrave;ng hơn. Từ đ&oacute; gi&uacute;p cho đơn vị thi c&ocirc;ng c&oacute; thể thấy được ch&iacute;nh x&aacute;c h&igrave;nh dạng, vị tr&iacute; v&agrave; cao độ của cấu kiện.</p>','<p>- M&ocirc; h&igrave;nh BIM về nh&agrave; xưởng, khu c&ocirc;ng nghiệp sẽ được thể hiện đầy đủ chi tiết cấu kiện, li&ecirc;n kết, cao độ v&agrave; số lượng. Nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất, lắp đặt, xuất khối lượng để t&iacute;nh to&aacute;n chi ph&iacute; cho to&agrave;n dự &aacute;n.</p>\r\n\r\n<p>- &Aacute;p dụng c&ocirc;ng nghệ tự động h&oacute;a v&agrave;o m&ocirc; h&igrave;nh nhằm tăng hiệu suất dựng h&igrave;nh, tăng độ ch&iacute;nh x&aacute;c, tiết kiệm thời gian v&agrave; chi ph&iacute; cho Kh&aacute;ch h&agrave;ng v&agrave; KNC.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh trực quan sẽ gi&uacute;p giải quyết c&aacute;c vấn đề về đọc bản vẽ 2D m&agrave; trước đ&acirc;y thường mắc phải c&aacute;c lỗi nghi&ecirc;m trọng như ch&ecirc;nh lệch cao độ của cấu kiện giữa c&aacute;c bộ m&ocirc;n.</p>\r\n\r\n<p>- Chi tiết li&ecirc;n kết trong m&ocirc; h&igrave;nh BIM được thể hiện đầy đủ số lượng, ch&iacute;nh x&aacute;c k&iacute;ch thước, vị tr&iacute;, cao độ, vật liệu cấu tạo nhằm phục vụ cho c&ocirc;ng t&aacute;c sản xuất v&agrave; lắp đặt.</p>\r\n\r\n<p>- Với m&ocirc; h&igrave;nh 3D th&igrave; c&aacute;c vị tr&iacute; như li&ecirc;n kết, mối nối v&agrave; những li&ecirc;n kết phức tạp kh&aacute;c sẽ được quan s&aacute;t r&otilde; r&agrave;ng hơn. Từ đ&oacute; gi&uacute;p cho đơn vị thi c&ocirc;ng c&oacute; thể thấy được ch&iacute;nh x&aacute;c h&igrave;nh dạng, vị tr&iacute; v&agrave; cao độ của cấu kiện.</p>','cong-nghiep','Công nghiệp','Công nghiệp en','Công nghiệp cn',NULL,NULL,NULL,NULL,NULL,NULL,'cong-nghiep-0903.png','mo-hinh-bim-cong-nghiep-1535.png'),
	(2,2,'service',1,0,'2020-09-08 15:43:56','2021-06-25 16:00:52','Dân dụng','Dân dụng en','Dân dụng cn',NULL,NULL,'Nhà cao tầng sẽ được mô hình BIM từ móng, thân, mặt dựng, nội thất, hệ thống cơ điện từ giai đoạn thiết kế ý tưởng đến giai đoạn thiết kế cơ sở và thiết kế thi công...','Nhà cao tầng sẽ được mô hình BIM từ móng, thân, mặt dựng, nội thất, hệ thống cơ điện từ giai đoạn thiết kế ý tưởng đến giai đoạn thiết kế cơ sở và thiết kế thi công...en','Nhà cao tầng sẽ được mô hình BIM từ móng, thân, mặt dựng, nội thất, hệ thống cơ điện từ giai đoạn thiết kế ý tưởng đến giai đoạn thiết kế cơ sở và thiết kế thi công...cn',1,NULL,1,'<p>- Đối với c&aacute;c dự &aacute;n d&acirc;n dụng, m&ocirc; h&igrave;nh sẽ được cập nhật trong suốt qu&aacute; tr&igrave;nh thiết kế nhằm xử l&yacute; xung đột hoặc c&oacute; thay đổi từ kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- C&aacute;c xung đột v&agrave; lỗi thiết kế sẽ được ph&aacute;t hiện sớm v&agrave; được sửa chữa ngay trong qu&aacute; tr&igrave;nh dựng h&igrave;nh, phối hợp xử l&yacute; c&ugrave;ng những bộ m&ocirc;n kh&aacute;c. Việc ph&aacute;t hiện xung đột sớm trong giai đoạn thiết kế đ&oacute;ng vai tr&ograve; v&ocirc; c&ugrave;ng quan trọng cho to&agrave;n dự &aacute;n.</p>\r\n\r\n<p>- Khi đ&oacute;, lợi &iacute;ch m&agrave; m&ocirc; h&igrave;nh BIM mang lại sẽ gi&uacute;p cho kh&aacute;ch h&agrave;ng tiết kiệm được nhiều chi ph&iacute; ph&aacute;t sinh, tiết kiệm thời gian, hỗ trợ trong giai đoạn bảo tr&igrave; v&agrave; vận h&agrave;nh.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh sẽ gi&uacute;p cho đơn vị thi c&ocirc;ng ho&agrave;n th&agrave;nh dự &aacute;n một c&aacute;ch ch&iacute;nh x&aacute;c, nhanh ch&oacute;ng v&agrave; hiệu quả, giảm thiểu rủi ro đập đi x&acirc;y lại trong qu&aacute; tr&igrave;nh thi c&ocirc;ng.</p>','<p>- Đối với c&aacute;c dự &aacute;n d&acirc;n dụng, m&ocirc; h&igrave;nh sẽ được cập nhật trong suốt qu&aacute; tr&igrave;nh thiết kế nhằm xử l&yacute; xung đột hoặc c&oacute; thay đổi từ kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- C&aacute;c xung đột v&agrave; lỗi thiết kế sẽ được ph&aacute;t hiện sớm v&agrave; được sửa chữa ngay trong qu&aacute; tr&igrave;nh dựng h&igrave;nh, phối hợp xử l&yacute; c&ugrave;ng những bộ m&ocirc;n kh&aacute;c. Việc ph&aacute;t hiện xung đột sớm trong giai đoạn thiết kế đ&oacute;ng vai tr&ograve; v&ocirc; c&ugrave;ng quan trọng cho to&agrave;n dự &aacute;n.</p>\r\n\r\n<p>- Khi đ&oacute;, lợi &iacute;ch m&agrave; m&ocirc; h&igrave;nh BIM mang lại sẽ gi&uacute;p cho kh&aacute;ch h&agrave;ng tiết kiệm được nhiều chi ph&iacute; ph&aacute;t sinh, tiết kiệm thời gian, hỗ trợ trong giai đoạn bảo tr&igrave; v&agrave; vận h&agrave;nh.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh sẽ gi&uacute;p cho đơn vị thi c&ocirc;ng ho&agrave;n th&agrave;nh dự &aacute;n một c&aacute;ch ch&iacute;nh x&aacute;c, nhanh ch&oacute;ng v&agrave; hiệu quả, giảm thiểu rủi ro đập đi x&acirc;y lại trong qu&aacute; tr&igrave;nh thi c&ocirc;ng.</p>','<p>- Đối với c&aacute;c dự &aacute;n d&acirc;n dụng, m&ocirc; h&igrave;nh sẽ được cập nhật trong suốt qu&aacute; tr&igrave;nh thiết kế nhằm xử l&yacute; xung đột hoặc c&oacute; thay đổi từ kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- C&aacute;c xung đột v&agrave; lỗi thiết kế sẽ được ph&aacute;t hiện sớm v&agrave; được sửa chữa ngay trong qu&aacute; tr&igrave;nh dựng h&igrave;nh, phối hợp xử l&yacute; c&ugrave;ng những bộ m&ocirc;n kh&aacute;c. Việc ph&aacute;t hiện xung đột sớm trong giai đoạn thiết kế đ&oacute;ng vai tr&ograve; v&ocirc; c&ugrave;ng quan trọng cho to&agrave;n dự &aacute;n.</p>\r\n\r\n<p>- Khi đ&oacute;, lợi &iacute;ch m&agrave; m&ocirc; h&igrave;nh BIM mang lại sẽ gi&uacute;p cho kh&aacute;ch h&agrave;ng tiết kiệm được nhiều chi ph&iacute; ph&aacute;t sinh, tiết kiệm thời gian, hỗ trợ trong giai đoạn bảo tr&igrave; v&agrave; vận h&agrave;nh.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh sẽ gi&uacute;p cho đơn vị thi c&ocirc;ng ho&agrave;n th&agrave;nh dự &aacute;n một c&aacute;ch ch&iacute;nh x&aacute;c, nhanh ch&oacute;ng v&agrave; hiệu quả, giảm thiểu rủi ro đập đi x&acirc;y lại trong qu&aacute; tr&igrave;nh thi c&ocirc;ng.</p>',NULL,NULL,NULL,'dan-dung','Dân dụng','Dân dụng en','Dân dụng cn','Tên bài viết Dịch vụ 2',NULL,NULL,'Tên bài viết Dịch vụ 2',NULL,NULL,'dan-dung-0909.png','dan-dung-2058.png'),
	(3,1,'service',2,0,'2020-09-08 15:46:49','2021-06-27 20:54:02','Công nghiệp','Công nghiệp en','Công nghiệp cn',NULL,NULL,'Bản vẽ thể hiện chất lượng hồ sơ của một dự án vì vậy bản vẽ sẽ được phát triển chi tiết theo quy định và tiêu chuẩn của từng quốc gia, khu vực...','Bản vẽ thể hiện chất lượng hồ sơ của một dự án vì vậy bản vẽ sẽ được phát triển chi tiết theo quy định và tiêu chuẩn của từng quốc gia, khu vực...en','Bản vẽ thể hiện chất lượng hồ sơ của một dự án vì vậy bản vẽ sẽ được phát triển chi tiết theo quy định và tiêu chuẩn của từng quốc gia, khu vực...cn',1,NULL,1,'<p>- C&aacute;c m&ocirc; h&igrave;nh khu c&ocirc;ng nghiệp hiện đại, c&oacute; thiết kế linh hoạt mang t&iacute;nh ứng dụng cao, được rất nhiều Chủ đầu tư v&agrave; Doanh nghiệp lựa chọn. Trong đ&oacute; việc ph&aacute;t triển bản vẽ l&agrave; một trong những yếu tố g&oacute;p phần kh&ocirc;ng nhỏ quyết định đến chất lượng c&ocirc;ng tr&igrave;nh.</p>\r\n\r\n<p>- C&aacute;c dự &aacute;n c&ocirc;ng nghiệp đ&ograve;i hỏi mức độ chi tiết của bản vẽ rất cao, v&igrave; thế việc ph&aacute;t triển bản vẽ sẽ gi&uacute;p cho dự &aacute;n c&oacute; thể triển khai một c&aacute;ch đầy đủ, chi tiết v&agrave; ch&iacute;nh x&aacute;c.</p>','<p>- C&aacute;c m&ocirc; h&igrave;nh khu c&ocirc;ng nghiệp hiện đại, c&oacute; thiết kế linh hoạt mang t&iacute;nh ứng dụng cao, được rất nhiều Chủ đầu tư v&agrave; Doanh nghiệp lựa chọn. Trong đ&oacute; việc ph&aacute;t triển bản vẽ l&agrave; một trong những yếu tố g&oacute;p phần kh&ocirc;ng nhỏ quyết định đến chất lượng c&ocirc;ng tr&igrave;nh.</p>\r\n\r\n<p>- C&aacute;c dự &aacute;n c&ocirc;ng nghiệp đ&ograve;i hỏi mức độ chi tiết của bản vẽ rất cao, v&igrave; thế việc ph&aacute;t triển bản vẽ sẽ gi&uacute;p cho dự &aacute;n c&oacute; thể triển khai một c&aacute;ch đầy đủ, chi tiết v&agrave; ch&iacute;nh x&aacute;c.</p>','<p>- C&aacute;c m&ocirc; h&igrave;nh khu c&ocirc;ng nghiệp hiện đại, c&oacute; thiết kế linh hoạt mang t&iacute;nh ứng dụng cao, được rất nhiều Chủ đầu tư v&agrave; Doanh nghiệp lựa chọn. Trong đ&oacute; việc ph&aacute;t triển bản vẽ l&agrave; một trong những yếu tố g&oacute;p phần kh&ocirc;ng nhỏ quyết định đến chất lượng c&ocirc;ng tr&igrave;nh.</p>\r\n\r\n<p>- C&aacute;c dự &aacute;n c&ocirc;ng nghiệp đ&ograve;i hỏi mức độ chi tiết của bản vẽ rất cao, v&igrave; thế việc ph&aacute;t triển bản vẽ sẽ gi&uacute;p cho dự &aacute;n c&oacute; thể triển khai một c&aacute;ch đầy đủ, chi tiết v&agrave; ch&iacute;nh x&aacute;c.</p>',NULL,NULL,NULL,'phat-trien-ban-ve-cong-nghiep','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp',NULL,NULL,'Công nghiệp',NULL,NULL,'phat-trien-ban-ve-cong-nghiep-1626.png','phat-trien-ban-ve-cong-nghiep-2002.png'),
	(4,2,'service',2,0,'2020-09-08 15:49:56','2021-06-27 20:54:50','Dân dụng','Dân dụng en','Dân dụng cn',NULL,NULL,'Đối với các dự án yêu cầu cao về mặt trình bày, thể hiện chi tiết, kỹ thuật thì việc phát triển bản vẽ sẽ giúp hồ sơ đạt chất lượng tốt nhất...','Đối với các dự án yêu cầu cao về mặt trình bày, thể hiện chi tiết, kỹ thuật thì việc phát triển bản vẽ sẽ giúp hồ sơ đạt chất lượng tốt nhất...en','Đối với các dự án yêu cầu cao về mặt trình bày, thể hiện chi tiết, kỹ thuật thì việc phát triển bản vẽ sẽ giúp hồ sơ đạt chất lượng tốt nhất...cn',1,NULL,1,'<p>- Bản vẽ l&agrave; thứ kh&ocirc;ng thể thiếu cho c&aacute;c dự &aacute;n x&acirc;y dựng ch&iacute;nh v&igrave; thế n&oacute; c&oacute; tầm quan trọng rất lớn. V&igrave; vậy KNC lu&ocirc;n kh&ocirc;ng ngừng nghi&ecirc;n cứu v&agrave; ph&aacute;t triển bản vẽ về mặt tr&igrave;nh b&agrave;y, thể hiện, sắp xếp bố lục hợp l&yacute;, lu&ocirc;n đảm bảo theo ti&ecirc;u chuẩn v&agrave; thực tế thi c&ocirc;ng.</p>\r\n\r\n<p>- Đối với c&aacute;c dự &aacute;n c&agrave;ng lớn th&igrave; mức độ thể hiện chi tiết bản vẽ c&agrave;ng cao, đ&ograve;i hỏi kỹ sư phải thể hiện đầy đủ nội dung, chi tiết, ghi ch&uacute;...Với kinh nghiệm v&agrave; t&iacute;ch lũy từ nhiều dự &aacute;n về d&acirc;n dụng, k&egrave;m theo đ&oacute; l&agrave; đội ngũ kỹ sư năng động, nhiệt huyết, kh&ocirc;ng ngừng ph&aacute;t triển kỹ năng v&igrave; vậy KNC tự tin mang lại cho Kh&aacute;ch h&agrave;ng một sản phẩm chất lượng.</p>','<p>- Bản vẽ l&agrave; thứ kh&ocirc;ng thể thiếu cho c&aacute;c dự &aacute;n x&acirc;y dựng ch&iacute;nh v&igrave; thế n&oacute; c&oacute; tầm quan trọng rất lớn. V&igrave; vậy KNC lu&ocirc;n kh&ocirc;ng ngừng nghi&ecirc;n cứu v&agrave; ph&aacute;t triển bản vẽ về mặt tr&igrave;nh b&agrave;y, thể hiện, sắp xếp bố lục hợp l&yacute;, lu&ocirc;n đảm bảo theo ti&ecirc;u chuẩn v&agrave; thực tế thi c&ocirc;ng.</p>\r\n\r\n<p>- Đối với c&aacute;c dự &aacute;n c&agrave;ng lớn th&igrave; mức độ thể hiện chi tiết bản vẽ c&agrave;ng cao, đ&ograve;i hỏi kỹ sư phải thể hiện đầy đủ nội dung, chi tiết, ghi ch&uacute;...Với kinh nghiệm v&agrave; t&iacute;ch lũy từ nhiều dự &aacute;n về d&acirc;n dụng, k&egrave;m theo đ&oacute; l&agrave; đội ngũ kỹ sư năng động, nhiệt huyết, kh&ocirc;ng ngừng ph&aacute;t triển kỹ năng v&igrave; vậy KNC tự tin mang lại cho Kh&aacute;ch h&agrave;ng một sản phẩm chất lượng.</p>','<p>- Bản vẽ l&agrave; thứ kh&ocirc;ng thể thiếu cho c&aacute;c dự &aacute;n x&acirc;y dựng ch&iacute;nh v&igrave; thế n&oacute; c&oacute; tầm quan trọng rất lớn. V&igrave; vậy KNC lu&ocirc;n kh&ocirc;ng ngừng nghi&ecirc;n cứu v&agrave; ph&aacute;t triển bản vẽ về mặt tr&igrave;nh b&agrave;y, thể hiện, sắp xếp bố lục hợp l&yacute;, lu&ocirc;n đảm bảo theo ti&ecirc;u chuẩn v&agrave; thực tế thi c&ocirc;ng.</p>\r\n\r\n<p>- Đối với c&aacute;c dự &aacute;n c&agrave;ng lớn th&igrave; mức độ thể hiện chi tiết bản vẽ c&agrave;ng cao, đ&ograve;i hỏi kỹ sư phải thể hiện đầy đủ nội dung, chi tiết, ghi ch&uacute;...Với kinh nghiệm v&agrave; t&iacute;ch lũy từ nhiều dự &aacute;n về d&acirc;n dụng, k&egrave;m theo đ&oacute; l&agrave; đội ngũ kỹ sư năng động, nhiệt huyết, kh&ocirc;ng ngừng ph&aacute;t triển kỹ năng v&igrave; vậy KNC tự tin mang lại cho Kh&aacute;ch h&agrave;ng một sản phẩm chất lượng.</p>',NULL,NULL,NULL,'phat-trien-ban-ve-dan-dung','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','dan-dung-1633.png','phat-trien-ban-ve-dan-dung-2050.png'),
	(5,1,'service',3,0,'2020-09-08 15:53:01','2021-06-27 20:56:01','Công nghiệp','Công nghiệp en','Công nghiệp cn',NULL,NULL,'Khối lượng nhà công nghiệp sẽ được tổng hợp và xuất tự động dựa trên các cấu kiện và thông tin đã xây dựng trong mô hình...','Khối lượng nhà công nghiệp sẽ được tổng hợp và xuất tự động dựa trên các cấu kiện và thông tin đã xây dựng trong mô hình...en','Khối lượng nhà công nghiệp sẽ được tổng hợp và xuất tự động dựa trên các cấu kiện và thông tin đã xây dựng trong mô hình...cn',1,NULL,1,'<p>- Khối lượng của một c&ocirc;ng tr&igrave;nh l&agrave; một vấn đề quan trọng của mỗi dự &aacute;n, khối lượng khi xuất ra sẽ t&iacute;nh to&aacute;n chi ph&iacute; cho to&agrave;n c&ocirc;ng tr&igrave;nh khi đ&oacute; sẽ gi&uacute;p Kh&aacute;ch h&agrave;ng t&iacute;nh to&aacute;n mức chi ph&iacute; ph&ugrave; hợp.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh Bim nh&agrave; c&ocirc;ng nghiệp sẽ được tổng hợp v&agrave; tr&iacute;ch xuất khối lượng tự động, gi&uacute;p tiết kiệm thời gian b&oacute;c t&aacute;ch v&agrave; t&iacute;nh to&aacute;n từng hạng mục.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh c&oacute; thể tr&iacute;ch xuất ch&iacute;nh x&aacute;c vật tư phục vụ thi c&ocirc;ng như thể t&iacute;ch b&ecirc; t&ocirc;ng, khối lượng th&eacute;p, diện t&iacute;ch v&aacute;n khu&ocirc;n...từ đ&oacute; gi&uacute;p cho bộ phận dự to&aacute;n nhanh ch&oacute;ng r&aacute;p gi&aacute; v&agrave; đưa ra định mức dự to&aacute;n ph&ugrave; hợp cho từng dự &aacute;n.</p>\r\n\r\n<p>- Đặc biệt đối với c&aacute;c c&ocirc;ng tr&igrave;nh c&oacute; li&ecirc;n kết phức tạp, nhiều chi tiết việc tự động xuất khối lượng từ m&ocirc; h&igrave;nh BIM sẽ gi&uacute;p giảm đ&aacute;ng kể thời gian v&agrave; c&ocirc;ng sức của c&aacute;c kỹ sư dự to&aacute;n.</p>\r\n\r\n<p>- Để thực hiện việc b&oacute;c t&aacute;ch khối lượng chi tiết th&igrave; KNC sẽ tạo lập m&ocirc; h&igrave;nh ho&agrave;n chỉnh, đầy đủ c&aacute;c th&agrave;nh phần, ph&acirc;n bổ theo khu vực, hạng mục một c&aacute;ch hợp l&yacute; từ đ&oacute; sẽ tổng hợp v&agrave; tr&iacute;ch xuất đầy đủ khối lượng.</p>','<p>- Khối lượng của một c&ocirc;ng tr&igrave;nh l&agrave; một vấn đề quan trọng của mỗi dự &aacute;n, khối lượng khi xuất ra sẽ t&iacute;nh to&aacute;n chi ph&iacute; cho to&agrave;n c&ocirc;ng tr&igrave;nh khi đ&oacute; sẽ gi&uacute;p Kh&aacute;ch h&agrave;ng t&iacute;nh to&aacute;n mức chi ph&iacute; ph&ugrave; hợp.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh Bim nh&agrave; c&ocirc;ng nghiệp sẽ được tổng hợp v&agrave; tr&iacute;ch xuất khối lượng tự động, gi&uacute;p tiết kiệm thời gian b&oacute;c t&aacute;ch v&agrave; t&iacute;nh to&aacute;n từng hạng mục.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh c&oacute; thể tr&iacute;ch xuất ch&iacute;nh x&aacute;c vật tư phục vụ thi c&ocirc;ng như thể t&iacute;ch b&ecirc; t&ocirc;ng, khối lượng th&eacute;p, diện t&iacute;ch v&aacute;n khu&ocirc;n...từ đ&oacute; gi&uacute;p cho bộ phận dự to&aacute;n nhanh ch&oacute;ng r&aacute;p gi&aacute; v&agrave; đưa ra định mức dự to&aacute;n ph&ugrave; hợp cho từng dự &aacute;n.</p>\r\n\r\n<p>- Đặc biệt đối với c&aacute;c c&ocirc;ng tr&igrave;nh c&oacute; li&ecirc;n kết phức tạp, nhiều chi tiết việc tự động xuất khối lượng từ m&ocirc; h&igrave;nh BIM sẽ gi&uacute;p giảm đ&aacute;ng kể thời gian v&agrave; c&ocirc;ng sức của c&aacute;c kỹ sư dự to&aacute;n.</p>\r\n\r\n<p>- Để thực hiện việc b&oacute;c t&aacute;ch khối lượng chi tiết th&igrave; KNC sẽ tạo lập m&ocirc; h&igrave;nh ho&agrave;n chỉnh, đầy đủ c&aacute;c th&agrave;nh phần, ph&acirc;n bổ theo khu vực, hạng mục một c&aacute;ch hợp l&yacute; từ đ&oacute; sẽ tổng hợp v&agrave; tr&iacute;ch xuất đầy đủ khối lượng.</p>','<p>- Khối lượng của một c&ocirc;ng tr&igrave;nh l&agrave; một vấn đề quan trọng của mỗi dự &aacute;n, khối lượng khi xuất ra sẽ t&iacute;nh to&aacute;n chi ph&iacute; cho to&agrave;n c&ocirc;ng tr&igrave;nh khi đ&oacute; sẽ gi&uacute;p Kh&aacute;ch h&agrave;ng t&iacute;nh to&aacute;n mức chi ph&iacute; ph&ugrave; hợp.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh Bim nh&agrave; c&ocirc;ng nghiệp sẽ được tổng hợp v&agrave; tr&iacute;ch xuất khối lượng tự động, gi&uacute;p tiết kiệm thời gian b&oacute;c t&aacute;ch v&agrave; t&iacute;nh to&aacute;n từng hạng mục.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh c&oacute; thể tr&iacute;ch xuất ch&iacute;nh x&aacute;c vật tư phục vụ thi c&ocirc;ng như thể t&iacute;ch b&ecirc; t&ocirc;ng, khối lượng th&eacute;p, diện t&iacute;ch v&aacute;n khu&ocirc;n...từ đ&oacute; gi&uacute;p cho bộ phận dự to&aacute;n nhanh ch&oacute;ng r&aacute;p gi&aacute; v&agrave; đưa ra định mức dự to&aacute;n ph&ugrave; hợp cho từng dự &aacute;n.</p>\r\n\r\n<p>- Đặc biệt đối với c&aacute;c c&ocirc;ng tr&igrave;nh c&oacute; li&ecirc;n kết phức tạp, nhiều chi tiết việc tự động xuất khối lượng từ m&ocirc; h&igrave;nh BIM sẽ gi&uacute;p giảm đ&aacute;ng kể thời gian v&agrave; c&ocirc;ng sức của c&aacute;c kỹ sư dự to&aacute;n.</p>\r\n\r\n<p>- Để thực hiện việc b&oacute;c t&aacute;ch khối lượng chi tiết th&igrave; KNC sẽ tạo lập m&ocirc; h&igrave;nh ho&agrave;n chỉnh, đầy đủ c&aacute;c th&agrave;nh phần, ph&acirc;n bổ theo khu vực, hạng mục một c&aacute;ch hợp l&yacute; từ đ&oacute; sẽ tổng hợp v&agrave; tr&iacute;ch xuất đầy đủ khối lượng.</p>',NULL,NULL,NULL,'xua-khoi-luong-tu-mo-hinh-bim-cong-nghiep','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp','Công nghiệp en','Công nghiệp cn','cong-nghiep-1639.png','xuat-khoi-luong-tu-mo-hinh-bim-cong-nghiep-2001.png'),
	(6,2,'service',3,0,'2020-09-08 15:55:43','2021-06-27 20:56:55','Dân dụng','Dân dụng en','Dân dụng cn',NULL,NULL,'Khối lượng xuất từ mô hình sẽ được tổng hợp và chuyển cho bộ phận dự toán ráp giá và tính toán chi phí cho toàn dự án...','Khối lượng xuất từ mô hình sẽ được tổng hợp và chuyển cho bộ phận dự toán ráp giá và tính toán chi phí cho toàn dự án...en','Khối lượng xuất từ mô hình sẽ được tổng hợp và chuyển cho bộ phận dự toán ráp giá và tính toán chi phí cho toàn dự án...cn',1,NULL,1,'<p>- Khối lượng từ m&ocirc; h&igrave;nh BIM của c&aacute;c dự &aacute;n d&acirc;n dụng được hỗ trợ t&iacute;nh to&aacute;n tự động v&igrave; thế sẽ hạn chế sai s&oacute;t trong qu&aacute; tr&igrave;nh xuất khối lượng.</p>\r\n\r\n<p>- Việc x&aacute;c định ch&iacute;nh x&aacute;c khối lượng kh&ocirc;ng chỉ gi&uacute;p dễ d&agrave;ng trong việc ước lượng v&agrave; quản l&yacute; chi ph&iacute; m&agrave; c&ograve;n gi&uacute;p hạn chế những khối lượng ph&aacute;t sinh ngo&agrave;i &yacute; muốn trong qu&aacute; tr&igrave;nh thi c&ocirc;ng.</p>\r\n\r\n<p>- Khối lượng từ m&ocirc; h&igrave;nh sẽ được tổng hợp v&agrave; tự động t&iacute;nh to&aacute;n để xuất b&aacute;o c&aacute;o.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh c&oacute; thể tr&iacute;ch xuất ch&iacute;nh x&aacute;c vật tư phục vụ thi c&ocirc;ng như thể t&iacute;ch b&ecirc; t&ocirc;ng, khối lượng th&eacute;p, diện t&iacute;ch v&aacute;n khu&ocirc;n từ đ&oacute; gi&uacute;p cho bộ phận dự to&aacute;n nhanh ch&oacute;ng r&aacute;p gi&aacute; v&agrave; đưa ra định mức dự to&aacute;n ph&ugrave; hợp cho từng dự &aacute;n.</p>\r\n\r\n<p>- C&aacute;c dự &aacute;n d&acirc;n dụng sẽ được KNC dựng h&igrave;nh đầy đủ v&agrave; chi tiết c&aacute;c th&agrave;nh phần theo từng hạng mục, giai đoạn để thuận tiện cho việc tr&iacute;ch xuất khối lượng nhanh v&agrave; ch&iacute;nh x&aacute;c nhất.</p>','<p>- Khối lượng từ m&ocirc; h&igrave;nh BIM của c&aacute;c dự &aacute;n d&acirc;n dụng được hỗ trợ t&iacute;nh to&aacute;n tự động v&igrave; thế sẽ hạn chế sai s&oacute;t trong qu&aacute; tr&igrave;nh xuất khối lượng.</p>\r\n\r\n<p>- Việc x&aacute;c định ch&iacute;nh x&aacute;c khối lượng kh&ocirc;ng chỉ gi&uacute;p dễ d&agrave;ng trong việc ước lượng v&agrave; quản l&yacute; chi ph&iacute; m&agrave; c&ograve;n gi&uacute;p hạn chế những khối lượng ph&aacute;t sinh ngo&agrave;i &yacute; muốn trong qu&aacute; tr&igrave;nh thi c&ocirc;ng.</p>\r\n\r\n<p>- Khối lượng từ m&ocirc; h&igrave;nh sẽ được tổng hợp v&agrave; tự động t&iacute;nh to&aacute;n để xuất b&aacute;o c&aacute;o.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh c&oacute; thể tr&iacute;ch xuất ch&iacute;nh x&aacute;c vật tư phục vụ thi c&ocirc;ng như thể t&iacute;ch b&ecirc; t&ocirc;ng, khối lượng th&eacute;p, diện t&iacute;ch v&aacute;n khu&ocirc;n từ đ&oacute; gi&uacute;p cho bộ phận dự to&aacute;n nhanh ch&oacute;ng r&aacute;p gi&aacute; v&agrave; đưa ra định mức dự to&aacute;n ph&ugrave; hợp cho từng dự &aacute;n.</p>\r\n\r\n<p>- C&aacute;c dự &aacute;n d&acirc;n dụng sẽ được KNC dựng h&igrave;nh đầy đủ v&agrave; chi tiết c&aacute;c th&agrave;nh phần theo từng hạng mục, giai đoạn để thuận tiện cho việc tr&iacute;ch xuất khối lượng nhanh v&agrave; ch&iacute;nh x&aacute;c nhất.</p>','<p>- Khối lượng từ m&ocirc; h&igrave;nh BIM của c&aacute;c dự &aacute;n d&acirc;n dụng được hỗ trợ t&iacute;nh to&aacute;n tự động v&igrave; thế sẽ hạn chế sai s&oacute;t trong qu&aacute; tr&igrave;nh xuất khối lượng.</p>\r\n\r\n<p>- Việc x&aacute;c định ch&iacute;nh x&aacute;c khối lượng kh&ocirc;ng chỉ gi&uacute;p dễ d&agrave;ng trong việc ước lượng v&agrave; quản l&yacute; chi ph&iacute; m&agrave; c&ograve;n gi&uacute;p hạn chế những khối lượng ph&aacute;t sinh ngo&agrave;i &yacute; muốn trong qu&aacute; tr&igrave;nh thi c&ocirc;ng.</p>\r\n\r\n<p>- Khối lượng từ m&ocirc; h&igrave;nh sẽ được tổng hợp v&agrave; tự động t&iacute;nh to&aacute;n để xuất b&aacute;o c&aacute;o.</p>\r\n\r\n<p>- M&ocirc; h&igrave;nh c&oacute; thể tr&iacute;ch xuất ch&iacute;nh x&aacute;c vật tư phục vụ thi c&ocirc;ng như thể t&iacute;ch b&ecirc; t&ocirc;ng, khối lượng th&eacute;p, diện t&iacute;ch v&aacute;n khu&ocirc;n từ đ&oacute; gi&uacute;p cho bộ phận dự to&aacute;n nhanh ch&oacute;ng r&aacute;p gi&aacute; v&agrave; đưa ra định mức dự to&aacute;n ph&ugrave; hợp cho từng dự &aacute;n.</p>\r\n\r\n<p>- C&aacute;c dự &aacute;n d&acirc;n dụng sẽ được KNC dựng h&igrave;nh đầy đủ v&agrave; chi tiết c&aacute;c th&agrave;nh phần theo từng hạng mục, giai đoạn để thuận tiện cho việc tr&iacute;ch xuất khối lượng nhanh v&agrave; ch&iacute;nh x&aacute;c nhất.</p>',NULL,NULL,NULL,'xua-khoi-luong-tu-mo-hinh-bim-dan-dung','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','dan-dung-1625.png','xuat-khoi-luong-tu-mo-hinh-bim-dan-dung-2055.png'),
	(7,1,'service',4,0,'2021-06-25 16:12:00','2021-07-29 11:02:46','Công nghiệp','Công nghiệp en','Công nghiệp cn',NULL,'','<p>Phối cảnh 3D dự &aacute;n sẽ được xuất ra từ m&ocirc; h&igrave;nh BIM v&agrave; render nhanh ch&oacute;ng, xuất x&aacute;c, h&igrave;nh ảnh kết xuất chất lượng v&agrave; chi tiết...</p>','<p>Phối cảnh 3D dự &aacute;n sẽ được xuất ra từ m&ocirc; h&igrave;nh BIM v&agrave; render nhanh ch&oacute;ng, xuất x&aacute;c, h&igrave;nh ảnh kết xuất chất lượng v&agrave; chi tiết...en</p>','<p>Phối cảnh 3D dự &aacute;n sẽ được xuất ra từ m&ocirc; h&igrave;nh BIM v&agrave; render nhanh ch&oacute;ng, xuất x&aacute;c, h&igrave;nh ảnh kết xuất chất lượng v&agrave; chi tiết...cn</p>',1,NULL,1,'<p>- Phối cảnh kiến tr&uacute;c của khu c&ocirc;ng nghiệp ch&uacute; trọng nhiều v&agrave;o c&aacute;c hạng mục, hạ tầng, cảnh quan từ đ&oacute; lựa chọn m&agrave;u sắc, vật liệu ph&ugrave; hợp với thực tế từng hạng mục.</p>\r\n\r\n<p>- Giao th&ocirc;ng đ&oacute;ng g&oacute;p một phần kh&ocirc;ng nhỏ trong khu c&ocirc;ng nghiệp v&igrave; vậy giao th&ocirc;ng phải được t&iacute;nh to&aacute;n kỹ lưỡng trước khi sắp xếp vị tr&iacute; c&aacute;c hạng mục để thuận tiện việc vận chuyển, xe quay đầu kh&ocirc;ng bị vướng mắc.</p>\r\n\r\n<p>- Thiết kế sẽ đ&oacute;ng vai tr&ograve; v&ocirc; c&ugrave;ng quan trọng trong việc triển khai v&agrave; thi c&ocirc;ng nh&agrave; xưởng, k&egrave;m theo đ&oacute; phối cảnh sẽ thể hiện r&otilde; điểm mạnh về khu c&ocirc;ng nghiệp gi&uacute;p thu h&uacute;t c&aacute;c nh&agrave; đầu tư tham gia v&agrave;o dự &aacute;n.</p>\r\n\r\n<p>- KNC sẽ c&ugrave;ng đồng h&agrave;nh với Kh&aacute;ch h&agrave;ng trong suốt qu&aacute; tr&igrave;nh tư vấn, thiết kế, thi c&ocirc;ng đến khi ho&agrave;n thiện b&agrave;n giao vận h&agrave;nh.</p>','<p>- Phối cảnh kiến tr&uacute;c của khu c&ocirc;ng nghiệp ch&uacute; trọng nhiều v&agrave;o c&aacute;c hạng mục, hạ tầng, cảnh quan từ đ&oacute; lựa chọn m&agrave;u sắc, vật liệu ph&ugrave; hợp với thực tế từng hạng mục.</p>\r\n\r\n<p>- Giao th&ocirc;ng đ&oacute;ng g&oacute;p một phần kh&ocirc;ng nhỏ trong khu c&ocirc;ng nghiệp v&igrave; vậy giao th&ocirc;ng phải được t&iacute;nh to&aacute;n kỹ lưỡng trước khi sắp xếp vị tr&iacute; c&aacute;c hạng mục để thuận tiện việc vận chuyển, xe quay đầu kh&ocirc;ng bị vướng mắc.</p>\r\n\r\n<p>- Thiết kế sẽ đ&oacute;ng vai tr&ograve; v&ocirc; c&ugrave;ng quan trọng trong việc triển khai v&agrave; thi c&ocirc;ng nh&agrave; xưởng, k&egrave;m theo đ&oacute; phối cảnh sẽ thể hiện r&otilde; điểm mạnh về khu c&ocirc;ng nghiệp gi&uacute;p thu h&uacute;t c&aacute;c nh&agrave; đầu tư tham gia v&agrave;o dự &aacute;n.</p>\r\n\r\n<p>- KNC sẽ c&ugrave;ng đồng h&agrave;nh với Kh&aacute;ch h&agrave;ng trong suốt qu&aacute; tr&igrave;nh tư vấn, thiết kế, thi c&ocirc;ng đến khi ho&agrave;n thiện b&agrave;n giao vận h&agrave;nh.</p>','<p>- Phối cảnh kiến tr&uacute;c của khu c&ocirc;ng nghiệp ch&uacute; trọng nhiều v&agrave;o c&aacute;c hạng mục, hạ tầng, cảnh quan từ đ&oacute; lựa chọn m&agrave;u sắc, vật liệu ph&ugrave; hợp với thực tế từng hạng mục.</p>\r\n\r\n<p>- Giao th&ocirc;ng đ&oacute;ng g&oacute;p một phần kh&ocirc;ng nhỏ trong khu c&ocirc;ng nghiệp v&igrave; vậy giao th&ocirc;ng phải được t&iacute;nh to&aacute;n kỹ lưỡng trước khi sắp xếp vị tr&iacute; c&aacute;c hạng mục để thuận tiện việc vận chuyển, xe quay đầu kh&ocirc;ng bị vướng mắc.</p>\r\n\r\n<p>- Thiết kế sẽ đ&oacute;ng vai tr&ograve; v&ocirc; c&ugrave;ng quan trọng trong việc triển khai v&agrave; thi c&ocirc;ng nh&agrave; xưởng, k&egrave;m theo đ&oacute; phối cảnh sẽ thể hiện r&otilde; điểm mạnh về khu c&ocirc;ng nghiệp gi&uacute;p thu h&uacute;t c&aacute;c nh&agrave; đầu tư tham gia v&agrave;o dự &aacute;n.</p>\r\n\r\n<p>- KNC sẽ c&ugrave;ng đồng h&agrave;nh với Kh&aacute;ch h&agrave;ng trong suốt qu&aacute; tr&igrave;nh tư vấn, thiết kế, thi c&ocirc;ng đến khi ho&agrave;n thiện b&agrave;n giao vận h&agrave;nh.</p>',NULL,NULL,NULL,'phoi-canh-kien-truc-cong-nghiep','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp','Công nghiệp en','Công nghiệp cn','cong-nghiep-1600.png','phoi-canh-kien-truc-cong-nghiep-2045.png'),
	(8,2,'service',4,0,'2021-06-25 16:13:48','2021-07-29 11:01:32','Dân dụng','Dân dụng en','Dân dụng cn',NULL,'','<p>Bản vẽ concept sẽ được thực hiện bằng m&ocirc; h&igrave;nh BIM 3D</p>','<p>Bản vẽ concept sẽ được thực hiện bằng m&ocirc; h&igrave;nh BIM 3D en</p>','<p>Bản vẽ concept sẽ được thực hiện bằng m&ocirc; h&igrave;nh BIM 3D cn</p>',1,NULL,1,'<p>- Phối cảnh kiến tr&uacute;c được xem l&agrave; bước đi đầu ti&ecirc;n trong việc ho&agrave;n thiện dự &aacute;n theo y&ecirc;u cầu từ Kh&aacute;ch h&agrave;ng. Bởi v&igrave; việc l&ecirc;n &yacute; tưởng sẽ đ&ograve;i hỏi người kiến tr&uacute;c sư phải cực kỳ nhạy b&eacute;n, đưa ra nhiều phong c&aacute;ch thiết kế ph&ugrave; hợp với y&ecirc;u cầu của Kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Đối với c&aacute;c dự &aacute;n biệt thự, kh&aacute;ch sạn, nh&agrave; cao tầng th&igrave; phối cảnh kiến tr&uacute;c sẽ mang lại cho Chủ Đầu Tư v&agrave; Kh&aacute;ch h&agrave;ng thấy được h&igrave;nh ảnh thực tế của dự &aacute;n, c&ocirc;ng năng sử dụng, cảnh quan đ&ocirc; thị...từ đ&oacute; sẽ đưa ra những phương &aacute;n v&agrave; sự lựa chọn ph&ugrave; hợp.</p>\r\n\r\n<p>- Xu hướng thiết kế ng&agrave;y c&agrave;ng hiện đại v&agrave; tạo đ&agrave; ph&aacute;t triển cho tương lai đ&ograve;i hỏi c&aacute;c kiến tr&uacute;c sư kh&ocirc;ng ngừng học hỏi, n&acirc;ng cao th&ecirc;m nhiều kỹ năng, phục vụ cho mọi dự &aacute;n.</p>\r\n\r\n<p>- &nbsp; Ch&iacute;nh v&igrave; c&aacute;c nhu cầu như tr&ecirc;n, c&aacute;c kiến tr&uacute;c sư của KNC với nhiều kinh nghiệm thực tế c&oacute; thể đ&aacute;p ứng mọi nhu cầu sử dụng v&agrave; mong muốn của Kh&aacute;ch h&agrave;ng.</p>','<p>- Phối cảnh kiến tr&uacute;c được xem l&agrave; bước đi đầu ti&ecirc;n trong việc ho&agrave;n thiện dự &aacute;n theo y&ecirc;u cầu từ Kh&aacute;ch h&agrave;ng. Bởi v&igrave; việc l&ecirc;n &yacute; tưởng sẽ đ&ograve;i hỏi người kiến tr&uacute;c sư phải cực kỳ nhạy b&eacute;n, đưa ra nhiều phong c&aacute;ch thiết kế ph&ugrave; hợp với y&ecirc;u cầu của Kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Đối với c&aacute;c dự &aacute;n biệt thự, kh&aacute;ch sạn, nh&agrave; cao tầng th&igrave; phối cảnh kiến tr&uacute;c sẽ mang lại cho Chủ Đầu Tư v&agrave; Kh&aacute;ch h&agrave;ng thấy được h&igrave;nh ảnh thực tế của dự &aacute;n, c&ocirc;ng năng sử dụng, cảnh quan đ&ocirc; thị...từ đ&oacute; sẽ đưa ra những phương &aacute;n v&agrave; sự lựa chọn ph&ugrave; hợp.</p>\r\n\r\n<p>- Xu hướng thiết kế ng&agrave;y c&agrave;ng hiện đại v&agrave; tạo đ&agrave; ph&aacute;t triển cho tương lai đ&ograve;i hỏi c&aacute;c kiến tr&uacute;c sư kh&ocirc;ng ngừng học hỏi, n&acirc;ng cao th&ecirc;m nhiều kỹ năng, phục vụ cho mọi dự &aacute;n.</p>\r\n\r\n<p>- &nbsp;&nbsp;Ch&iacute;nh v&igrave; c&aacute;c nhu cầu như tr&ecirc;n, c&aacute;c kiến tr&uacute;c sư của KNC với nhiều kinh nghiệm thực tế c&oacute; thể đ&aacute;p ứng mọi nhu cầu sử dụng v&agrave; mong muốn của Kh&aacute;ch h&agrave;ng.</p>','<p>- Phối cảnh kiến tr&uacute;c được xem l&agrave; bước đi đầu ti&ecirc;n trong việc ho&agrave;n thiện dự &aacute;n theo y&ecirc;u cầu từ Kh&aacute;ch h&agrave;ng. Bởi v&igrave; việc l&ecirc;n &yacute; tưởng sẽ đ&ograve;i hỏi người kiến tr&uacute;c sư phải cực kỳ nhạy b&eacute;n, đưa ra nhiều phong c&aacute;ch thiết kế ph&ugrave; hợp với y&ecirc;u cầu của Kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Đối với c&aacute;c dự &aacute;n biệt thự, kh&aacute;ch sạn, nh&agrave; cao tầng th&igrave; phối cảnh kiến tr&uacute;c sẽ mang lại cho Chủ Đầu Tư v&agrave; Kh&aacute;ch h&agrave;ng thấy được h&igrave;nh ảnh thực tế của dự &aacute;n, c&ocirc;ng năng sử dụng, cảnh quan đ&ocirc; thị...từ đ&oacute; sẽ đưa ra những phương &aacute;n v&agrave; sự lựa chọn ph&ugrave; hợp.</p>\r\n\r\n<p>- Xu hướng thiết kế ng&agrave;y c&agrave;ng hiện đại v&agrave; tạo đ&agrave; ph&aacute;t triển cho tương lai đ&ograve;i hỏi c&aacute;c kiến tr&uacute;c sư kh&ocirc;ng ngừng học hỏi, n&acirc;ng cao th&ecirc;m nhiều kỹ năng, phục vụ cho mọi dự &aacute;n.</p>\r\n\r\n<p>- &nbsp;&nbsp;Ch&iacute;nh v&igrave; c&aacute;c nhu cầu như tr&ecirc;n, c&aacute;c kiến tr&uacute;c sư của KNC với nhiều kinh nghiệm thực tế c&oacute; thể đ&aacute;p ứng mọi nhu cầu sử dụng v&agrave; mong muốn của Kh&aacute;ch h&agrave;ng.</p>',NULL,NULL,NULL,'phoi-canh-kien-truc-dan-dung','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','dan-dung-1648.png','phoi-canh-kien-truc-dan-dung-2036.png'),
	(9,1,'service',5,0,'2021-06-25 16:15:27','2021-06-27 20:59:15','Công nghiệp','Công nghiệp en','Công nghiệp cn',NULL,NULL,'Bản vẽ sẽ được chuyển hóa từ quy định và tiêu chuẩn của đất nước này sang tiêu chuẩn của đất nước khác phục vụ cho việc xin phép xây dựng...','Bản vẽ sẽ được chuyển hóa từ quy định và tiêu chuẩn của đất nước này sang tiêu chuẩn của đất nước khác phục vụ cho việc xin phép xây dựng...en','Bản vẽ sẽ được chuyển hóa từ quy định và tiêu chuẩn của đất nước này sang tiêu chuẩn của đất nước khác phục vụ cho việc xin phép xây dựng...cn',1,NULL,1,'<p>- Với nhu cầu ng&agrave;y c&agrave;ng lớn của Kh&aacute;ch h&agrave;ng, chuyển h&oacute;a bản vẽ ra đời nhằm mục đ&iacute;ch gi&uacute;p cho Kh&aacute;ch h&agrave;ng c&oacute; thể chuyển đổi nhanh bản vẽ từ quy định cũ sang quy định mới, từ ti&ecirc;u chuẩn thiết kế của khu vực n&agrave;y sang ti&ecirc;u chuẩn thiết kế của khu vực kh&aacute;c.</p>\r\n\r\n<p>- Với c&aacute;c dự &aacute;n c&ocirc;ng nghiệp bản vẽ sẽ được khảo s&aacute;t, đ&aacute;nh gi&aacute; v&agrave; đưa ra phương &aacute;n điều chỉnh. Thời gian ho&agrave;n th&agrave;nh sẽ được t&iacute;nh to&aacute;n hợp l&yacute; nhằm gi&uacute;p cho Kh&aacute;ch h&agrave;ng nhận được sản phẩm chất lượng trong thời gian sớm nhất.</p>\r\n\r\n<p>- Qu&aacute; tr&igrave;nh chuyển đổi phụ thuộc v&agrave;o quy m&ocirc; của dự &aacute;n, quy định của từng quốc gia. Khi đ&oacute; Kh&aacute;ch h&agrave;ng sẽ được KNC hỗ trợ chuyển đổi một c&aacute;ch nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c nhất.</p>','<p>- Với nhu cầu ng&agrave;y c&agrave;ng lớn của Kh&aacute;ch h&agrave;ng, chuyển h&oacute;a bản vẽ ra đời nhằm mục đ&iacute;ch gi&uacute;p cho Kh&aacute;ch h&agrave;ng c&oacute; thể chuyển đổi nhanh bản vẽ từ quy định cũ sang quy định mới, từ ti&ecirc;u chuẩn thiết kế của khu vực n&agrave;y sang ti&ecirc;u chuẩn thiết kế của khu vực kh&aacute;c.</p>\r\n\r\n<p>- Với c&aacute;c dự &aacute;n c&ocirc;ng nghiệp bản vẽ sẽ được khảo s&aacute;t, đ&aacute;nh gi&aacute; v&agrave; đưa ra phương &aacute;n điều chỉnh. Thời gian ho&agrave;n th&agrave;nh sẽ được t&iacute;nh to&aacute;n hợp l&yacute; nhằm gi&uacute;p cho Kh&aacute;ch h&agrave;ng nhận được sản phẩm chất lượng trong thời gian sớm nhất.</p>\r\n\r\n<p>- Qu&aacute; tr&igrave;nh chuyển đổi phụ thuộc v&agrave;o quy m&ocirc; của dự &aacute;n, quy định của từng quốc gia. Khi đ&oacute; Kh&aacute;ch h&agrave;ng sẽ được KNC hỗ trợ chuyển đổi một c&aacute;ch nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c nhất.</p>','<p>- Với nhu cầu ng&agrave;y c&agrave;ng lớn của Kh&aacute;ch h&agrave;ng, chuyển h&oacute;a bản vẽ ra đời nhằm mục đ&iacute;ch gi&uacute;p cho Kh&aacute;ch h&agrave;ng c&oacute; thể chuyển đổi nhanh bản vẽ từ quy định cũ sang quy định mới, từ ti&ecirc;u chuẩn thiết kế của khu vực n&agrave;y sang ti&ecirc;u chuẩn thiết kế của khu vực kh&aacute;c.</p>\r\n\r\n<p>- Với c&aacute;c dự &aacute;n c&ocirc;ng nghiệp bản vẽ sẽ được khảo s&aacute;t, đ&aacute;nh gi&aacute; v&agrave; đưa ra phương &aacute;n điều chỉnh. Thời gian ho&agrave;n th&agrave;nh sẽ được t&iacute;nh to&aacute;n hợp l&yacute; nhằm gi&uacute;p cho Kh&aacute;ch h&agrave;ng nhận được sản phẩm chất lượng trong thời gian sớm nhất.</p>\r\n\r\n<p>- Qu&aacute; tr&igrave;nh chuyển đổi phụ thuộc v&agrave;o quy m&ocirc; của dự &aacute;n, quy định của từng quốc gia. Khi đ&oacute; Kh&aacute;ch h&agrave;ng sẽ được KNC hỗ trợ chuyển đổi một c&aacute;ch nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c nhất.</p>',NULL,NULL,NULL,'chuyen-hoa-ban-ve-cong-nghiep','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp','Công nghiệp en','Công nghiệp cn','dan-dung-1627.png','chuyen-hoa-ban-ve-cong-nghiep-2015.png'),
	(10,2,'service',5,0,'2021-06-25 16:17:05','2021-06-27 20:59:51','Dân dụng','Dân dụng en','Dân dụng cn',NULL,NULL,'Bản vẽ sẽ được chuyển hóa từ quy định và tiêu chuẩn của đất nước này sang tiêu chuẩn của đất nước khác phục vụ cho việc xin phép xây dựng...','Bản vẽ sẽ được chuyển hóa từ quy định và tiêu chuẩn của đất nước này sang tiêu chuẩn của đất nước khác phục vụ cho việc xin phép xây dựng...en','Bản vẽ sẽ được chuyển hóa từ quy định và tiêu chuẩn của đất nước này sang tiêu chuẩn của đất nước khác phục vụ cho việc xin phép xây dựng...cn',1,NULL,1,'<p>- Với nhu cầu ng&agrave;y c&agrave;ng lớn của Kh&aacute;ch h&agrave;ng, chuyển h&oacute;a bản vẽ ra đời nhằm mục đ&iacute;ch gi&uacute;p cho Kh&aacute;ch h&agrave;ng c&oacute; thể chuyển đổi nhanh bản vẽ từ quy định cũ sang quy định mới, từ ti&ecirc;u chuẩn thiết kế của khu vực n&agrave;y sang ti&ecirc;u chuẩn thiết kế của khu vực kh&aacute;c.</p>\r\n\r\n<p>- Với c&aacute;c dự &aacute;n d&acirc;n dụng bản vẽ sẽ được khảo s&aacute;t, đ&aacute;nh gi&aacute; v&agrave; đưa ra phương &aacute;n điều chỉnh. Thời gian ho&agrave;n th&agrave;nh sẽ được t&iacute;nh to&aacute;n hợp l&yacute; nhằm gi&uacute;p cho Kh&aacute;ch h&agrave;ng nhận được sản phẩm chất lượng trong thời gian sớm nhất.</p>\r\n\r\n<p>- C&aacute;c vướng mắc về qu&aacute; tr&igrave;nh chuyển đổi sẽ được KNC cập nhật v&agrave; điều chỉnh li&ecirc;n tục với mục ti&ecirc;u x&acirc;y dựng cơ sở dữ liệu về quy định để chuyển đổi ph&ugrave; hợp cho từng khu vực.</p>\r\n\r\n<p>- Qu&aacute; tr&igrave;nh chuyển đổi phụ thuộc v&agrave;o diện t&iacute;ch, quy m&ocirc; của dự &aacute;n, quy định của từng quốc gia. Sau khi nắm được quy định của từng khu vực, Kh&aacute;ch h&agrave;ng sẽ được KNC hỗ trợ chuyển đổi một c&aacute;ch nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c nhất.</p>','<p>- Với nhu cầu ng&agrave;y c&agrave;ng lớn của Kh&aacute;ch h&agrave;ng, chuyển h&oacute;a bản vẽ ra đời nhằm mục đ&iacute;ch gi&uacute;p cho Kh&aacute;ch h&agrave;ng c&oacute; thể chuyển đổi nhanh bản vẽ từ quy định cũ sang quy định mới, từ ti&ecirc;u chuẩn thiết kế của khu vực n&agrave;y sang ti&ecirc;u chuẩn thiết kế của khu vực kh&aacute;c.</p>\r\n\r\n<p>- Với c&aacute;c dự &aacute;n d&acirc;n dụng bản vẽ sẽ được khảo s&aacute;t, đ&aacute;nh gi&aacute; v&agrave; đưa ra phương &aacute;n điều chỉnh. Thời gian ho&agrave;n th&agrave;nh sẽ được t&iacute;nh to&aacute;n hợp l&yacute; nhằm gi&uacute;p cho Kh&aacute;ch h&agrave;ng nhận được sản phẩm chất lượng trong thời gian sớm nhất.</p>\r\n\r\n<p>- C&aacute;c vướng mắc về qu&aacute; tr&igrave;nh chuyển đổi sẽ được KNC cập nhật v&agrave; điều chỉnh li&ecirc;n tục với mục ti&ecirc;u x&acirc;y dựng cơ sở dữ liệu về quy định để chuyển đổi ph&ugrave; hợp cho từng khu vực.</p>\r\n\r\n<p>- Qu&aacute; tr&igrave;nh chuyển đổi phụ thuộc v&agrave;o diện t&iacute;ch, quy m&ocirc; của dự &aacute;n, quy định của từng quốc gia. Sau khi nắm được quy định của từng khu vực, Kh&aacute;ch h&agrave;ng sẽ được KNC hỗ trợ chuyển đổi một c&aacute;ch nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c nhất.</p>','<p>- Với nhu cầu ng&agrave;y c&agrave;ng lớn của Kh&aacute;ch h&agrave;ng, chuyển h&oacute;a bản vẽ ra đời nhằm mục đ&iacute;ch gi&uacute;p cho Kh&aacute;ch h&agrave;ng c&oacute; thể chuyển đổi nhanh bản vẽ từ quy định cũ sang quy định mới, từ ti&ecirc;u chuẩn thiết kế của khu vực n&agrave;y sang ti&ecirc;u chuẩn thiết kế của khu vực kh&aacute;c.</p>\r\n\r\n<p>- Với c&aacute;c dự &aacute;n d&acirc;n dụng bản vẽ sẽ được khảo s&aacute;t, đ&aacute;nh gi&aacute; v&agrave; đưa ra phương &aacute;n điều chỉnh. Thời gian ho&agrave;n th&agrave;nh sẽ được t&iacute;nh to&aacute;n hợp l&yacute; nhằm gi&uacute;p cho Kh&aacute;ch h&agrave;ng nhận được sản phẩm chất lượng trong thời gian sớm nhất.</p>\r\n\r\n<p>- C&aacute;c vướng mắc về qu&aacute; tr&igrave;nh chuyển đổi sẽ được KNC cập nhật v&agrave; điều chỉnh li&ecirc;n tục với mục ti&ecirc;u x&acirc;y dựng cơ sở dữ liệu về quy định để chuyển đổi ph&ugrave; hợp cho từng khu vực.</p>\r\n\r\n<p>- Qu&aacute; tr&igrave;nh chuyển đổi phụ thuộc v&agrave;o diện t&iacute;ch, quy m&ocirc; của dự &aacute;n, quy định của từng quốc gia. Sau khi nắm được quy định của từng khu vực, Kh&aacute;ch h&agrave;ng sẽ được KNC hỗ trợ chuyển đổi một c&aacute;ch nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c nhất.</p>',NULL,NULL,NULL,'chuyen-hoa-ban-ve-dan-dung','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','cong-nghiep-1605.png','chuyen-hoa-ban-ve-dan-dung-2051.png'),
	(11,1,'service',6,0,'2021-06-25 16:18:31','2021-07-29 11:01:03','Công nghiệp','Công nghiệp en','Công nghiệp cn','https://www.youtube.com/watch?v=PtzlnxRo0wU','PtzlnxRo0wU','<p>Video giới thiệu dự &aacute;n nh&agrave; xưởng, khu c&ocirc;ng nghiệp với quy m&ocirc; lớn, chi tiết c&aacute;c hạng mục, gi&uacute;p Kh&aacute;ch h&agrave;ng thấy được trực quan về tổng thể của dự &aacute;n...</p>','<p>Video giới thiệu dự &aacute;n nh&agrave; xưởng, khu c&ocirc;ng nghiệp với quy m&ocirc; lớn, chi tiết c&aacute;c hạng mục, gi&uacute;p Kh&aacute;ch h&agrave;ng thấy được trực quan về tổng thể của dự &aacute;n...en</p>','<p>Video giới thiệu dự &aacute;n nh&agrave; xưởng, khu c&ocirc;ng nghiệp với quy m&ocirc; lớn, chi tiết c&aacute;c hạng mục, gi&uacute;p Kh&aacute;ch h&agrave;ng thấy được trực quan về tổng thể của dự &aacute;n...cn</p>',1,NULL,1,'<p>- Phim 3D giới thiệu dự &aacute;n c&ocirc;ng nghiệp nhằm gi&uacute;p cho Chủ Đầu Tư cũng như Kh&aacute;ch h&agrave;ng c&oacute; thể thấy được tổng quan dự &aacute;n, hạ tầng kỹ thuật v&agrave; c&aacute;c hạng mục l&acirc;n cận thực tế. Từ đ&oacute; hỗ trợ cho c&ocirc;ng việc kinh doanh của Chủ Đầu Tư, tạo dựng thương hiệu cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Sản phẩm sẽ l&agrave;m nổi bật điểm mạnh dự &aacute;n từ quy m&ocirc;, cảnh quan, kh&ocirc;ng gian l&agrave;m việc gi&uacute;p n&acirc;ng tầm gi&aacute; trị dự &aacute;n l&ecirc;n gấp nhiều lần.</p>\r\n\r\n<p>- Với đội ngũ nh&acirc;n vi&ecirc;n chuy&ecirc;n nghiệp v&agrave; d&agrave;y dặn kinh nghiệm về dựng h&igrave;nh, l&agrave;m phim. KNC tin chắc rằng sẽ tạo được dự &aacute;n thực tế v&agrave; chuy&ecirc;n nghiệp nhất.</p>','<p>- Phim 3D giới thiệu dự &aacute;n c&ocirc;ng nghiệp nhằm gi&uacute;p cho Chủ Đầu Tư cũng như Kh&aacute;ch h&agrave;ng c&oacute; thể thấy được tổng quan dự &aacute;n, hạ tầng kỹ thuật v&agrave; c&aacute;c hạng mục l&acirc;n cận thực tế. Từ đ&oacute; hỗ trợ cho c&ocirc;ng việc kinh doanh của Chủ Đầu Tư, tạo dựng thương hiệu cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Sản phẩm sẽ l&agrave;m nổi bật điểm mạnh dự &aacute;n từ quy m&ocirc;, cảnh quan, kh&ocirc;ng gian l&agrave;m việc gi&uacute;p n&acirc;ng tầm gi&aacute; trị dự &aacute;n l&ecirc;n gấp nhiều lần.</p>\r\n\r\n<p>- Với đội ngũ nh&acirc;n vi&ecirc;n chuy&ecirc;n nghiệp v&agrave; d&agrave;y dặn kinh nghiệm về dựng h&igrave;nh, l&agrave;m phim. KNC tin chắc rằng sẽ tạo được dự &aacute;n thực tế v&agrave; chuy&ecirc;n nghiệp nhất.</p>','<p>- Phim 3D giới thiệu dự &aacute;n c&ocirc;ng nghiệp nhằm gi&uacute;p cho Chủ Đầu Tư cũng như Kh&aacute;ch h&agrave;ng c&oacute; thể thấy được tổng quan dự &aacute;n, hạ tầng kỹ thuật v&agrave; c&aacute;c hạng mục l&acirc;n cận thực tế. Từ đ&oacute; hỗ trợ cho c&ocirc;ng việc kinh doanh của Chủ Đầu Tư, tạo dựng thương hiệu cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- Sản phẩm sẽ l&agrave;m nổi bật điểm mạnh dự &aacute;n từ quy m&ocirc;, cảnh quan, kh&ocirc;ng gian l&agrave;m việc gi&uacute;p n&acirc;ng tầm gi&aacute; trị dự &aacute;n l&ecirc;n gấp nhiều lần.</p>\r\n\r\n<p>- Với đội ngũ nh&acirc;n vi&ecirc;n chuy&ecirc;n nghiệp v&agrave; d&agrave;y dặn kinh nghiệm về dựng h&igrave;nh, l&agrave;m phim. KNC tin chắc rằng sẽ tạo được dự &aacute;n thực tế v&agrave; chuy&ecirc;n nghiệp nhất.</p>',NULL,NULL,NULL,'phim-3d-cong-nghiep','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp','Công nghiệp en','Công nghiệp cn','Công nghiệp','Công nghiệp en','Công nghiệp cn','cong-nghiep-1631.png','placeholder.png'),
	(12,2,'service',6,0,'2021-06-25 16:20:01','2021-06-28 00:39:29','Dân dụng','Dân dụng en','Dân dụng cn','https://www.youtube.com/watch?v=PtzlnxRo0wU','PtzlnxRo0wU','Video các dự án nhà cao tầng, khách sạn, biệt thự với những phong cách khác nhau sẽ giúp Khách hàng dễ dàng hình dung và lựa chọn phương án phù hợp nhất...','Video các dự án nhà cao tầng, khách sạn, biệt thự với những phong cách khác nhau sẽ giúp Khách hàng dễ dàng hình dung và lựa chọn phương án phù hợp nhất...en','Video các dự án nhà cao tầng, khách sạn, biệt thự với những phong cách khác nhau sẽ giúp Khách hàng dễ dàng hình dung và lựa chọn phương án phù hợp nhất...cn',1,NULL,1,'<p>- Phim 3D ch&iacute;nh l&agrave; c&aacute;ch hiệu quả để truyền b&aacute; th&ocirc;ng điệp của dự &aacute;n, gi&uacute;p kh&aacute;ch h&agrave;ng c&oacute; thể cảm nhận r&otilde; n&eacute;t, ch&acirc;n thực về kh&ocirc;ng gian sống v&agrave; l&agrave;m việc của c&aacute;c t&ograve;a nh&agrave;, biệt thự...</p>\r\n\r\n<p>- Gi&uacute;p Kh&aacute;ch h&agrave;ng thấy được c&aacute;c &yacute; tưởng thiết kế ngay từ đầu một c&aacute;ch thực tế v&agrave; sống động, từ đ&oacute; sẽ đưa ra quyết định chọn phương &aacute;n nhanh v&agrave; ph&ugrave; hợp nhất.</p>\r\n\r\n<p>- Tiết kiệm chi ph&iacute; cho c&aacute;c phải ph&aacute;p tiếp thị truyền th&ocirc;ng, gi&uacute;p Kh&aacute;ch h&agrave;ng dễ d&agrave;ng trong việc lựa chọn phương &aacute;n đầu tư hợp l&yacute;.&nbsp;</p>\r\n\r\n<p>- Từ những nhu cầu rất cần thiết như tr&ecirc;n, KNC đ&atilde; đ&aacute;p ứng tốt về mọi mặt từ kh&acirc;u &nbsp;thiết kế, dựng h&igrave;nh, l&agrave;m phim, chuyển động một c&aacute;ch linh hoạt. Sản phẩm đầu ra sẽ l&agrave;m thỏa m&atilde;n theo &yacute; tưởng của Kh&aacute;ch h&agrave;ng.</p>','<p>- Phim 3D ch&iacute;nh l&agrave; c&aacute;ch hiệu quả để truyền b&aacute; th&ocirc;ng điệp của dự &aacute;n, gi&uacute;p kh&aacute;ch h&agrave;ng c&oacute; thể cảm nhận r&otilde; n&eacute;t, ch&acirc;n thực về kh&ocirc;ng gian sống v&agrave; l&agrave;m việc của c&aacute;c t&ograve;a nh&agrave;, biệt thự...</p>\r\n\r\n<p>- Gi&uacute;p Kh&aacute;ch h&agrave;ng thấy được c&aacute;c &yacute; tưởng thiết kế ngay từ đầu một c&aacute;ch thực tế v&agrave; sống động, từ đ&oacute; sẽ đưa ra quyết định chọn phương &aacute;n nhanh v&agrave; ph&ugrave; hợp nhất.</p>\r\n\r\n<p>- Tiết kiệm chi ph&iacute; cho c&aacute;c phải ph&aacute;p tiếp thị truyền th&ocirc;ng, gi&uacute;p Kh&aacute;ch h&agrave;ng dễ d&agrave;ng trong việc lựa chọn phương &aacute;n đầu tư hợp l&yacute;.&nbsp;</p>\r\n\r\n<p>- Từ những nhu cầu rất cần thiết như tr&ecirc;n, KNC đ&atilde; đ&aacute;p ứng tốt về mọi mặt từ kh&acirc;u &nbsp;thiết kế, dựng h&igrave;nh, l&agrave;m phim, chuyển động một c&aacute;ch linh hoạt. Sản phẩm đầu ra sẽ l&agrave;m thỏa m&atilde;n theo &yacute; tưởng của Kh&aacute;ch h&agrave;ng.</p>','<p>- Phim 3D ch&iacute;nh l&agrave; c&aacute;ch hiệu quả để truyền b&aacute; th&ocirc;ng điệp của dự &aacute;n, gi&uacute;p kh&aacute;ch h&agrave;ng c&oacute; thể cảm nhận r&otilde; n&eacute;t, ch&acirc;n thực về kh&ocirc;ng gian sống v&agrave; l&agrave;m việc của c&aacute;c t&ograve;a nh&agrave;, biệt thự...</p>\r\n\r\n<p>- Gi&uacute;p Kh&aacute;ch h&agrave;ng thấy được c&aacute;c &yacute; tưởng thiết kế ngay từ đầu một c&aacute;ch thực tế v&agrave; sống động, từ đ&oacute; sẽ đưa ra quyết định chọn phương &aacute;n nhanh v&agrave; ph&ugrave; hợp nhất.</p>\r\n\r\n<p>- Tiết kiệm chi ph&iacute; cho c&aacute;c phải ph&aacute;p tiếp thị truyền th&ocirc;ng, gi&uacute;p Kh&aacute;ch h&agrave;ng dễ d&agrave;ng trong việc lựa chọn phương &aacute;n đầu tư hợp l&yacute;.&nbsp;</p>\r\n\r\n<p>- Từ những nhu cầu rất cần thiết như tr&ecirc;n, KNC đ&atilde; đ&aacute;p ứng tốt về mọi mặt từ kh&acirc;u &nbsp;thiết kế, dựng h&igrave;nh, l&agrave;m phim, chuyển động một c&aacute;ch linh hoạt. Sản phẩm đầu ra sẽ l&agrave;m thỏa m&atilde;n theo &yacute; tưởng của Kh&aacute;ch h&agrave;ng.</p>',NULL,NULL,NULL,'phim-3d-dan-dung','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','Dân dụng','Dân dụng en','Dân dụng cn','dan-dung-1601.png','placeholder.png');

/*!40000 ALTER TABLE `servis` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nameindex_vi` varchar(191) NOT NULL DEFAULT '',
  `nameindex_en` varchar(191) NOT NULL,
  `nameindex_cn` varchar(191) NOT NULL,
  `title_vi` varchar(191) NOT NULL DEFAULT '',
  `title_en` varchar(191) NOT NULL,
  `title_cn` varchar(191) DEFAULT NULL,
  `keywords_vi` text NOT NULL,
  `keywords_en` text NOT NULL,
  `keywords_cn` text,
  `description_vi` text NOT NULL,
  `description_en` text NOT NULL,
  `description_cn` text,
  `logoindex` varchar(191) DEFAULT NULL,
  `header` varchar(191) DEFAULT NULL,
  `img` varchar(191) DEFAULT NULL,
  `faviconindex` varchar(191) DEFAULT NULL,
  `faviconadmin` varchar(191) DEFAULT '',
  `copyright_vi` varchar(191) DEFAULT NULL,
  `copyright_en` varchar(191) DEFAULT NULL,
  `copyright_cn` varchar(191) DEFAULT NULL,
  `facebook` varchar(191) DEFAULT NULL,
  `twitter` varchar(191) DEFAULT NULL,
  `youtube` varchar(191) DEFAULT NULL,
  `whatsapp` varchar(191) DEFAULT NULL,
  `viber` varchar(191) DEFAULT NULL,
  `codehead` mediumtext,
  `codebody` mediumtext,
  `idanalytics` varchar(191) DEFAULT NULL,
  `googlesiteverification` varchar(191) DEFAULT NULL,
  `latitude` varchar(191) DEFAULT NULL,
  `longitude` varchar(191) DEFAULT NULL,
  `titleadmin` varchar(191) DEFAULT NULL,
  `logoadmin` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `website` varchar(191) DEFAULT NULL,
  `uidfacebookadmin` varchar(191) DEFAULT NULL,
  `appidfb` varchar(191) DEFAULT NULL,
  `lang` varchar(191) NOT NULL,
  `locale` varchar(191) NOT NULL,
  `author` varchar(191) NOT NULL,
  `robots` varchar(191) NOT NULL,
  `maps` longtext,
  `address_vi` text,
  `address_en` text,
  `address_cn` text,
  `hotline_1` varchar(191) DEFAULT NULL,
  `hotline_2` varchar(191) DEFAULT NULL,
  `hotline_3` varchar(191) DEFAULT NULL,
  `href_1` varchar(191) DEFAULT NULL,
  `href_2` varchar(191) DEFAULT NULL,
  `href_3` varchar(191) DEFAULT NULL,
  `maps_1` longtext,
  `web` varchar(191) DEFAULT NULL,
  `img_cus` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `type`, `created_at`, `updated_at`, `nameindex_vi`, `nameindex_en`, `nameindex_cn`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`, `logoindex`, `header`, `img`, `faviconindex`, `faviconadmin`, `copyright_vi`, `copyright_en`, `copyright_cn`, `facebook`, `twitter`, `youtube`, `whatsapp`, `viber`, `codehead`, `codebody`, `idanalytics`, `googlesiteverification`, `latitude`, `longitude`, `titleadmin`, `logoadmin`, `email`, `website`, `uidfacebookadmin`, `appidfb`, `lang`, `locale`, `author`, `robots`, `maps`, `address_vi`, `address_en`, `address_cn`, `hotline_1`, `hotline_2`, `hotline_3`, `href_1`, `href_2`, `href_3`, `maps_1`, `web`, `img_cus`)
VALUES
	(1,'setting','2019-11-11 19:22:30','2021-10-02 09:44:53','CÔNG TY TNHH TƯ VẤN ĐẦU TƯ XÂY DỰNG QUỐC TẾ KNC VIỆT NAM','CÔNG TY TNHH TƯ VẤN ĐẦU TƯ XÂY DỰNG QUỐC TẾ KNC VIỆT NAM en','CÔNG TY TNHH TƯ VẤN ĐẦU TƯ XÂY DỰNG QUỐC TẾ KNC VIỆT NAM cn','CÔNG TY TNHH TƯ VẤN ĐẦU TƯ XÂY DỰNG QUỐC TẾ KNC VIỆT NAM','CÔNG TY TNHH TƯ VẤN ĐẦU TƯ XÂY DỰNG QUỐC TẾ KNC VIỆT NAM en','CÔNG TY TNHH TƯ VẤN ĐẦU TƯ XÂY DỰNG QUỐC TẾ KNC VIỆT NAM cn','CÔNG TY TNHH TƯ VẤN ĐẦU TƯ XÂY DỰNG QUỐC TẾ KNC VIỆT NAM','CÔNG TY TNHH TƯ VẤN ĐẦU TƯ XÂY DỰNG QUỐC TẾ KNC VIỆT NAM en','CÔNG TY TNHH TƯ VẤN ĐẦU TƯ XÂY DỰNG QUỐC TẾ KNC VIỆT NAM cn','CÔNG TY TNHH TƯ VẤN ĐẦU TƯ XÂY DỰNG QUỐC TẾ KNC VIỆT NAM','CÔNG TY TNHH TƯ VẤN ĐẦU TƯ XÂY DỰNG QUỐC TẾ KNC VIỆT NAM en','CÔNG TY TNHH TƯ VẤN ĐẦU TƯ XÂY DỰNG QUỐC TẾ KNC VIỆT NAM cn','logo-knc-1507.jpg','logo-1st-vnlar.gif','maps.png','favicon-knc-1726.jpg','favicon-knc-1727.jpg','kncdesign.com','kncdesign.com','knc cn','https://www.facebook.com','https://twitter.com','https://youtube.com','https://api.whatsapp.com/send?phone=+798888186','https://msng.link/o/?84909135090=vi',NULL,NULL,NULL,NULL,NULL,NULL,'Administrator - Trang quản trị website','logo-vnlarvn.png','tritrinh.nina@gmail.com','https://kncdesign.com/',NULL,NULL,'vi','vi_VN','knc','noodp,noindex,nofollow',NULL,NULL,'CÔNG TY TNHH TƯ VẤN ĐẦU TƯ XÂY DỰNG QUỐC TẾ KNC VIỆT NAM en','CÔNG TY TNHH TƯ VẤN ĐẦU TƯ XÂY DỰNG QUỐC TẾ KNC VIỆT NAM cn','0909 135 090',NULL,NULL,'tel:0909135090',NULL,NULL,NULL,'kncdesign.com','khach-hang-cua-chung-toi.jpg');

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sliders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sliders`;

CREATE TABLE `sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stt` int(11) DEFAULT '0',
  `is_featured` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hide_show` int(11) DEFAULT '0',
  `peoplecategory_id` int(11) DEFAULT '0',
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  `descriptions_vi` text COLLATE utf8mb4_unicode_ci,
  `descriptions_en` text COLLATE utf8mb4_unicode_ci,
  `descriptions_cn` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;

INSERT INTO `sliders` (`id`, `type`, `stt`, `is_featured`, `created_at`, `updated_at`, `hide_show`, `peoplecategory_id`, `title_vi`, `title_en`, `title_cn`, `position_vi`, `position_en`, `position_cn`, `content_vi`, `content_en`, `content_cn`, `descriptions_vi`, `descriptions_en`, `descriptions_cn`, `slug`, `url`, `img`, `icon`)
VALUES
	(5,'slider',1,NULL,'2020-03-07 16:44:15','2021-06-29 16:51:53',1,0,'KNC vi','KNC en','KNC cn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'adobestock-242588052-1653.jpeg',NULL),
	(30,'other',1,0,'2020-04-07 04:22:15','2021-06-29 14:53:31',1,0,'Đã thông báo Bộ Công Thương',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'bo-cong-thuong.png',NULL),
	(35,'social',3,0,'2020-04-07 06:05:08','2020-10-20 09:05:58',1,0,'Twitter',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'bo-cong-thuong.png','<i class=\"ti ti-twitter\"></i>'),
	(36,'social',1,0,'2020-04-07 06:16:37','2021-06-29 14:53:20',1,0,'Facebook',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'placeholder.png','<i class=\"ti ti-facebook\"></i>'),
	(37,'social',2,0,'2020-04-07 06:25:16','2020-10-20 09:06:06',1,0,'Google +',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'placeholder.png','<i class=\"ti ti-google\"></i>'),
	(38,'social',4,0,'2020-04-07 06:30:36','2020-09-08 16:29:56',1,0,'Youtube',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'placeholder.png','<i class=\"ti ti-youtube\"></i>'),
	(89,'people',1,NULL,'2020-09-03 15:11:04','2021-10-11 16:48:15',1,2,'Tên nhân sự 3','Tên nhân sự 3 en','Tên nhân sự 3 cn','Project Manager','Project Manager','Project Manager',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'img-avatar3-1625.png',NULL),
	(90,'people',1,NULL,'2020-09-03 15:22:06','2021-10-11 16:50:26',1,1,'Tên nhân sự 2','Tên nhân sự 2 en','Tên nhân sự 2 cn','Project Supervisor','Project Supervisor','Project Supervisor',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'img-avatar3-1654.png',NULL),
	(93,'people',1,NULL,'2020-09-03 15:27:45','2021-10-11 16:46:41',1,1,'Tên nhân sự 1','Tên nhân sự 1 en','Tên nhân sự 1 cn','Account Manager','Account Manager','Account Manager','<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker.</p>','<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker.</p>','<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker.</p>',NULL,NULL,NULL,NULL,NULL,'img-avatar3-1616.png',NULL),
	(94,'refelink',2,1,'2020-09-17 16:39:18','2020-10-20 09:04:07',1,0,'Về chúng tôi','About us',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày','Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày en',NULL,NULL,'https://tmccrane.com/','placeholder.png','<i class=\"fa fa-trash\"></i>'),
	(95,'refelink',1,1,'2020-09-19 01:31:17','2020-09-19 01:31:41',1,0,'Cơ cấu tổ chức','Cơ cấu tổ chức en',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày','Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày en',NULL,NULL,NULL,'placeholder.png','<i class=\"fa fa-qrcode \"></i>'),
	(96,'refelink',1,1,'2020-09-19 01:33:01','2020-09-19 01:34:10',1,0,'Định hướng phát triển','Định hướng phát triển en',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày','Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày en',NULL,NULL,NULL,'placeholder.png','<i class=\"fa fa-language\"></i>'),
	(97,'refelink',1,1,'2020-09-19 01:35:14','2020-09-19 01:35:57',1,0,'Công ty thành viên','Công ty thành viên en',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày','Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày en',NULL,NULL,NULL,'placeholder.png','<i class=\"fa fa-info-circle\"></i>'),
	(98,'gallery',1,NULL,'2021-06-22 03:05:42','2021-06-29 17:11:21',1,0,'Tên dự án 3','Tên dự án 3 en','Tên dự án 3 cn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'img-lights-0342.jpg',NULL),
	(99,'gallery',1,NULL,'2021-06-25 02:22:44','2021-06-29 17:11:02',1,0,'Tên dự án 2','Tên dự án 2 en','Tên dự án 2 cn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'adobestock-242588052-0244.jpeg',NULL),
	(100,'gallery',1,NULL,'2021-06-25 16:21:49','2021-06-29 17:08:47',1,0,'Tên dự án 1','Tên dự án 1 en','Tên dự án 1 cn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'adobestock-418854634-1648.jpeg',NULL),
	(101,'slider',1,NULL,'2021-06-29 17:07:51','2021-06-29 17:07:51',1,0,'KNC','KNC en','KNC cn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'adobestock-418854634-1751.jpeg',NULL),
	(102,'expertises',1,NULL,'2021-07-24 00:49:42','2021-07-24 00:49:42',1,0,'Chuyên môn','Chuyên môn en','Chuyên môn cn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'anh-bia-chuyen-mon-0042.jpg',NULL),
	(103,'expertises',1,NULL,'2021-07-24 00:52:31','2021-07-24 00:52:31',1,0,'Chuyên môn 2','Chuyên môn 2 en','Chuyên môn 2 cn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'adobestock-242588052-0031.jpeg',NULL),
	(104,'expertises',1,NULL,'2021-07-24 00:52:53','2021-07-24 00:52:53',1,0,'Chuyên môn 3','Chuyên môn 3 en','Chuyên môn 3 cn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'adobestock-418854634-0053.jpeg',NULL);

/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table svcategories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `svcategories`;

CREATE TABLE `svcategories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stt` int(11) DEFAULT NULL,
  `descriptions_vi` text COLLATE utf8mb4_unicode_ci,
  `descriptions_en` text COLLATE utf8mb4_unicode_ci,
  `descriptions_cn` text COLLATE utf8mb4_unicode_ci,
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  `hide_show` int(11) DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_vi` text COLLATE utf8mb4_unicode_ci,
  `keywords_en` text COLLATE utf8mb4_unicode_ci,
  `keywords_cn` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_cn` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `svcategories` WRITE;
/*!40000 ALTER TABLE `svcategories` DISABLE KEYS */;

INSERT INTO `svcategories` (`id`, `type`, `view_count`, `created_at`, `updated_at`, `name_vi`, `name_en`, `name_cn`, `img`, `stt`, `descriptions_vi`, `descriptions_en`, `descriptions_cn`, `content_vi`, `content_en`, `content_cn`, `hide_show`, `is_featured`, `slug`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`)
VALUES
	(1,'svcategory',0,'2021-06-23 09:11:38','2021-06-23 10:24:10','Mô hình BIM','Mô hình BIM en','Mô hình BIM cn','placeholder.png',1,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'mo-hinh-bim','Mô hình BIM','Mô hình BIM en','Mô hình BIM cn','Mô hình BIM','Mô hình BIM en','Mô hình BIM cn','Mô hình BIM','Mô hình BIM en','Mô hình BIM cn'),
	(2,'svcategory',0,'2021-06-23 09:21:49','2021-06-25 15:57:13','Phát triển bản vẽ','Phát triển bản vẽ en','Phát triển bản vẽ cn','placeholder.png',2,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'phat-trien-ban-ve','Phát triển bản vẽ','Phát triển bản vẽ en','Phát triển bản vẽ cn','Phát triển bản vẽ','Phát triển bản vẽ en','Phát triển bản vẽ cn','Phát triển bản vẽ','Phát triển bản vẽ en','Phát triển bản vẽ cn'),
	(3,'svcategory',0,'2021-06-25 15:57:37','2021-06-25 16:12:20','Xuất khối lượng từ mô hình BIM','Xuất khối lượng từ mô hình BIM en','Xuất khối lượng từ mô hình BIM cn','placeholder.png',3,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'xuat-khoi-luong-tu-mo-hinh-bim','Xuất khối lượng từ mô hình BIM','Xuất khối lượng từ mô hình BIM en','Xuất khối lượng từ mô hình BIM cn','Xuất khối lượng từ mô hình BIM','Xuất khối lượng từ mô hình BIM en','Xuất khối lượng từ mô hình BIM cn','Xuất khối lượng từ mô hình BIM','Xuất khối lượng từ mô hình BIM en','Xuất khối lượng từ mô hình BIM cn'),
	(4,'svcategory',0,'2021-06-25 15:58:08','2021-06-25 16:12:21','Phối cảnh kiến trúc','Phối cảnh kiến trúc en','Phối cảnh kiến trúc cn','placeholder.png',4,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'phoi-canh-kien-truc','Phối cảnh kiến trúc','Phối cảnh kiến trúc en','Phối cảnh kiến trúc cn','Phối cảnh kiến trúc','Phối cảnh kiến trúc en','Phối cảnh kiến trúc cn','Phối cảnh kiến trúc','Phối cảnh kiến trúc en','Phối cảnh kiến trúc cn'),
	(5,'svcategory',0,'2021-06-25 15:58:41','2021-06-25 16:12:22','Chuyển hóa bản vẽ','Chuyển hóa bản vẽ en','Chuyển hóa bản vẽ cn','placeholder.png',5,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'chuyen-hoa-ban-ve','Chuyển hóa bản vẽ','Chuyển hóa bản vẽ en','Chuyển hóa bản vẽ cn','Chuyển hóa bản vẽ','Chuyển hóa bản vẽ en','Chuyển hóa bản vẽ cn','Chuyển hóa bản vẽ','Chuyển hóa bản vẽ en','Chuyển hóa bản vẽ cn'),
	(6,'svcategory',0,'2021-06-25 15:59:08','2021-06-25 16:12:23','Phim 3D','Phim 3D en','Phim 3D cn','placeholder.png',6,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'phim-3d','Phim 3D','Phim 3D en','Phim 3D cn','Phim 3D','Phim 3D en','Phim 3D cn','Phim 3D','Phim 3D en','Phim 3D cn');

/*!40000 ALTER TABLE `svcategories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stt` int(11) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `role_id` int(11) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `super_user` tinyint(1) DEFAULT '0',
  `manage_supers` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `stt`, `email`, `content`, `status`, `img`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `permissions`, `role_id`, `last_login`, `last_login_ip`, `super_user`, `manage_supers`)
VALUES
	(1,'Trí Trịnh',1,'tritrinh.nina@gmail.com','<p>Supper Administrator</p>',1,'avatar-admin-1522.png','2020-05-20 18:05:09','$2y$10$H.q42uGqL3xRBsAWKEJ4Xe/2PbIN5V3LUhtO61DdnMkLq7XoLnFEi','qY9vEdH88Gn4WGblITSed9UolzPXh6sl1z3zaimISQR1wOtXn0VWI7qZmrJm','2019-09-26 15:48:13','2021-06-29 15:30:22',NULL,NULL,'2021-06-19 09:34:52','::1',0,0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table videoindexs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `videoindexs`;

CREATE TABLE `videoindexs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions_vi` text COLLATE utf8mb4_unicode_ci,
  `descriptions_en` text COLLATE utf8mb4_unicode_ci,
  `descriptions_cn` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hide_show` int(11) DEFAULT '0',
  `content_vi` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_cn` longtext COLLATE utf8mb4_unicode_ci,
  `title_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords_vi` text COLLATE utf8mb4_unicode_ci,
  `keywords_en` text COLLATE utf8mb4_unicode_ci,
  `keywords_cn` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_cn` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan_cn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `videoindexs` WRITE;
/*!40000 ALTER TABLE `videoindexs` DISABLE KEYS */;

INSERT INTO `videoindexs` (`id`, `type`, `view_count`, `created_at`, `updated_at`, `name_vi`, `name_en`, `name_cn`, `descriptions_vi`, `descriptions_en`, `descriptions_cn`, `slug`, `hide_show`, `content_vi`, `content_en`, `content_cn`, `title_vi`, `title_en`, `title_cn`, `keywords_vi`, `keywords_en`, `keywords_cn`, `description_vi`, `description_en`, `description_cn`, `img`, `slogan_vi`, `slogan_en`, `slogan_cn`, `img1`, `video`)
VALUES
	(1,'video',20,'2020-04-10 02:20:29','2021-09-03 15:35:49',NULL,NULL,NULL,'<p>KNC l&agrave; c&ocirc;ng ty h&agrave;ng đầu về ứng dụng BIM v&agrave;o thiết kế c&ocirc;ng tr&igrave;nh d&acirc;n dụng v&agrave; c&ocirc;ng nghiệp. Mục ti&ecirc;u của ch&uacute;ng t&ocirc;i l&agrave; đem đến cho kh&aacute;ch h&agrave;ng c&aacute;c sản phẩm thiết kế đồng bộ, ch&iacute;nh x&aacute;c tuyệt đối, r&uacute;t ngắn thời gian triển khai dự &aacute;n v&agrave; ph&aacute;t sinh chi ph&iacute; cho đầu tư x&acirc;y dựng.</p>','<p>KNC l&agrave; c&ocirc;ng ty h&agrave;ng đầu về ứng dụng BIM v&agrave;o thiết kế c&ocirc;ng tr&igrave;nh d&acirc;n dụng v&agrave; c&ocirc;ng nghiệp. Mục ti&ecirc;u của ch&uacute;ng t&ocirc;i l&agrave; đem đến cho kh&aacute;ch h&agrave;ng c&aacute;c sản phẩm thiết kế đồng bộ, ch&iacute;nh x&aacute;c tuyệt đối, r&uacute;t ngắn thời gian triển khai dự &aacute;n v&agrave; ph&aacute;t sinh chi ph&iacute; cho đầu tư x&acirc;y dựng en</p>','<p>KNC l&agrave; c&ocirc;ng ty h&agrave;ng đầu về ứng dụng BIM v&agrave;o thiết kế c&ocirc;ng tr&igrave;nh d&acirc;n dụng v&agrave; c&ocirc;ng nghiệp. Mục ti&ecirc;u của ch&uacute;ng t&ocirc;i l&agrave; đem đến cho kh&aacute;ch h&agrave;ng c&aacute;c sản phẩm thiết kế đồng bộ, ch&iacute;nh x&aacute;c tuyệt đối, r&uacute;t ngắn thời gian triển khai dự &aacute;n v&agrave; ph&aacute;t sinh chi ph&iacute; cho đầu tư x&acirc;y dựng cn</p>','gioi-thieu.html',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'hinh1.jpg',NULL,NULL,NULL,'anh-bia-chuyen-mon-1146.jpg','keyboard-video-0103.mp4');

/*!40000 ALTER TABLE `videoindexs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table videos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `videos`;

CREATE TABLE `videos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_vi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stt` int(11) DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `hide_show` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
