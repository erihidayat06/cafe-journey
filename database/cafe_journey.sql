-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 06:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe_journey`
--

-- --------------------------------------------------------

--
-- Table structure for table `belis`
--

CREATE TABLE `belis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_pesanan` varchar(255) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `cafe_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `makanan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `minum_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `belis`
--

INSERT INTO `belis` (`id`, `no_pesanan`, `jumlah`, `cafe_id`, `user_id`, `makanan_id`, `minum_id`, `created_at`, `updated_at`) VALUES
(132, 'ERI428D1FB6615', 1, 11, 13, NULL, 1, '2023-12-14 21:16:20', '2023-12-14 21:16:29'),
(133, NULL, 1, 17, 2, NULL, 55, '2023-12-15 01:32:01', '2023-12-15 01:32:01'),
(134, NULL, 1, 17, 2, NULL, 58, '2023-12-15 01:34:28', '2023-12-15 01:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_booking` date NOT NULL,
  `jam_booking` time NOT NULL,
  `opsi` enum('tunggu','sukses','selesai') NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vip_id` bigint(20) UNSIGNED NOT NULL,
  `cafe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_pesanan` varchar(20) NOT NULL,
  `bukti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `tanggal_booking`, `jam_booking`, `opsi`, `user_id`, `vip_id`, `cafe_id`, `created_at`, `updated_at`, `no_pesanan`, `bukti`) VALUES
(12, '2023-06-14', '13:30:00', 'selesai', 2, 3, 11, '2023-06-09 17:03:28', '2023-06-21 19:35:10', 'Eri4848a298', 'post-images/S1mhJyYM5k9TGwVLhSvGUZTZl2Xwapn1T6JeHkhH.jpg'),
(14, '2023-06-19', '16:30:00', 'sukses', 3, 3, 11, '2023-06-09 21:37:39', '2023-06-09 21:40:34', 'Ami721667df', 'post-images/JxXHpMZ5vpTkNUAeaiAZ7yVp68ZQP3tB2ZuQiUNW.gif'),
(15, '2023-08-12', '13:00:00', 'selesai', 3, 3, 11, '2023-06-09 21:51:35', '2023-06-17 01:49:58', 'Ami657265dc', 'post-images/Jpc5BALHMSQI7QRGwrwxzqUtnOcYJYFxP9mkLNMK.gif'),
(18, '2023-06-30', '03:20:00', 'tunggu', 12, 15, 15, '2023-06-18 21:46:47', '2023-06-18 21:46:47', 'byo9337506f', NULL),
(19, '2023-06-25', '16:00:00', 'tunggu', 11, 13, 16, '2023-06-18 22:11:07', '2023-06-18 22:11:07', 'sye5789f3d', NULL),
(21, '2023-06-19', '12:16:00', 'selesai', 5, 3, 11, '2023-06-18 22:16:27', '2023-06-21 19:33:38', 'Ath1903d5db', 'post-images/5OeLbCfqnUipmtcyz06Z7reBKwQNt1Q1UGtzMoS9.jpg'),
(22, '2023-06-20', '19:00:00', 'tunggu', 6, 9, 13, '2023-06-19 02:34:16', '2023-06-19 02:34:16', 'Bel97999594', NULL),
(25, '2023-06-23', '13:30:00', 'selesai', 13, 12, 16, '2023-06-21 07:55:14', '2023-06-21 08:01:52', 'BOOERI9642FB0A6615', 'post-images/c20Qdtd63j4mIz7SBvpHKmKR2WG4IlS4zfGvMAfR.jpg'),
(26, '2023-06-23', '20:20:00', 'selesai', 13, 3, 11, '2023-06-22 00:17:55', '2023-06-22 00:20:19', 'BOOERI518767096615', 'post-images/IPiJ5tixrRUwuqjcWOJJB1HrL9ZTZqC2jEqYby17.png');

-- --------------------------------------------------------

--
-- Table structure for table `cafes`
--

CREATE TABLE `cafes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_cafe` varchar(100) NOT NULL,
  `gambar_logo` varchar(255) DEFAULT NULL,
  `gambar_profil` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `map` varchar(500) DEFAULT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `no_telepon` varchar(35) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domisili` enum('Kota Tegal','Kab Tegal') NOT NULL,
  `kecamatan` enum('margasari','bumijawa','bojong','balapulang','pagerbarang','lebaksiu','jatinegara','kedungbanteng','pangkah','slawi','dukuhwaru','adiwerna','dukuhturi','talang','tarub','kramat','suradadi','warureja','margadana','tegal barat','tegal selatan','tegal timur') NOT NULL,
  `whatsapp` varchar(35) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `no_rekening` varchar(35) DEFAULT NULL,
  `wallet` varchar(255) DEFAULT NULL,
  `no_wallet` varchar(35) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `no_antrian` varchar(255) NOT NULL,
  `konfirmasi` enum('tunggu','konfirmasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cafes`
--

INSERT INTO `cafes` (`id`, `nama_cafe`, `gambar_logo`, `gambar_profil`, `alamat`, `map`, `deskripsi`, `no_telepon`, `user_id`, `created_at`, `updated_at`, `domisili`, `kecamatan`, `whatsapp`, `facebook`, `instagram`, `bank`, `no_rekening`, `wallet`, `no_wallet`, `slug`, `no_antrian`, `konfirmasi`) VALUES
(11, 'Belikopi', 'post-images/nYMrkfjneHSrZwpppxzG8H3IAxQfUtpHn5cu58RJ.png', 'post-images/SUISxIpyDEDya9n5YcjLbWZy9RyvP6TpZpwyHHxU.jpg', 'Jl. AR. Hakim No.120, Randugunting, Kec. Tegal Tim., Kota Tegal, Jawa Tengah 52131', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15844.449641659792!2d109.11706924359753!3d-6.8771336007936545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb92868879a9b%3A0xa519cfdf3f6a3e2c!2sBELIKOPI.%20TEGAL!5e0!3m2!1sid!2sid!4v1686292637830!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '<div>&nbsp;Belikopi merupakan sebuah <strong>merek lokal Indonesia yang menjual beragam minuman varian menu kopi dan nonkopi</strong>. Belikopi juga menyediakan aneka ropang atau roti panggang dengan beragam toping. Coffee shop itu memiliki 74 outlet yang tersebar di seluruh Indonesia.&nbsp;</div>', '087276261526', 2, '2023-06-08 23:29:01', '2023-06-12 21:50:58', 'Kota Tegal', 'tegal timur', '086266166273', NULL, NULL, 'BRI', '28782787816', 'Shopee', '086266166273', 'belikopi-7c345d', '', 'konfirmasi'),
(12, 'Cafe Socrel', 'post-images/3INS8zvJj090OWIHrJ6VJJEK9tAkwnDuPtN3zCFO.jpg', 'post-images/L9zvzqNfLcjFPkBttI6MT41gEMEoALKvFnOGE7X2.jpg', 'Jl. Merpati No.150, Randugunting, Kec. Tegal Sel., Kota Tegal, Jawa Tengah 52131', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1135819259566!2d109.13072491744384!3d-6.876993099999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb9322ad2f23f%3A0xcce18f8c0fb33a8e!2sCafe%20Socrel!5e0!3m2!1sid!2sid!4v1686627181106!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '<div>Socrel Café &amp; Eatery adalah cafe yang beralamat di Jl. Kepodang, Randugunting Kota tegal. Café ini baru dibuka pada akhir bulan Oktober 2022.<br>Socrel Café &amp; Eatery ini memiliki konsep bangunan 3 lantai, tidak hanya itu café ini juga memiliki area rooftop sehingga membuat café ini terlihat semakin instagramable.<br>Berbagai varian menu minuman disajikan mulai dari Tea Based, Espresso Based, Ice Blend, Signature drinks, mocktail, hingga non coffee.<br>Ada juga beberapa pilihan makanan seperti wagyu steak, soup, appetizer, spagheti, salad, Japanese katsu, pizza, hingga sandwiches.</div>', '0853 4000 0321', 4, '2023-06-12 20:21:59', '2023-06-12 21:43:49', 'Kota Tegal', 'tegal selatan', '085340000321', 'https://www.facebook.com/profile.php?id=100089517927028', 'https://www.instagram.com/socrel_cafe/reels/', 'BRI', '0001-01-011822-53-4', 'Shopeepay', '085340000321', 'cafe-socrel-d7e167', '', 'konfirmasi'),
(13, 'S Cafe', 'post-images/r5gkBvOsGHeD4FOefK64Zr0nx2VtVry87FAr8xZw.jpg', 'post-images/RNnlZ0GqTXv9WBXNgQkgZLbmkDuYcUPNPSGH40WP.jpg', 'Jl. Ahmad Yani No.169, Mangkukusuman, Kec. Tegal Tim., Kota Tegal, Jawa Tengah 52121', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.217181961177!2d109.1367822!3d-6.8645569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb79a8003b245%3A0x3a48b7db1f6ad257!2sS%20Cafe!5e0!3m2!1sid!2sid!4v1686399969683!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '<div>S Cafe is a cafe resto that serves a wide selection of drinks and food.. the cafe is quite spacious with indoor and outdoor tables.. the price is still very decent with good taste.</div>', '085229115997', 5, '2023-06-12 20:31:58', '2023-06-12 21:44:37', 'Kota Tegal', 'tegal timur', '085229115997', 'https://web.facebook.com/profile.php?id=100064677413793', 'https://www.instagram.com/scafe.id/', NULL, NULL, 'GoPay', '085229115997', 's-cafe-544969', '', 'konfirmasi'),
(14, 'Bento Kopi Tegal', 'post-images/t8OaPbypV24dhDvEEkKoFvt7mv8146QSX3XFyS4V.jpg', 'post-images/TW1BznrO5ITxbY6bLMSQ8zNc9QTWbWaYGHyFghUK.jpg', 'Jl. Gatot Subroto No.18-116, Debong Kulon, Kec. Tegal Sel., Kota Tegal, Jawa Tengah 52133', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15844.25012247092!2d109.1212151!3d-6.8831131!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb9a6374cdcbb%3A0xa63aedc99e9e5ffd!2sBento%20Kopi%20Tegal!5e0!3m2!1sid!2sid!4v1686456665149!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '<div>Bento Kopi merupakan tempat makan kekinian yang cukup populer dan sudah tidak asing ditelinga, karena sudah memiliki cabang diberbagai kota di Indonesia. Memilki lahan yang cukup luas, nyaman dan fasilitasnya cukup memadai. Menyuguhkan pesona alam sekitar yang menawan, karena tempatnya dibangun di area persawahan. Tentu pengunjung akan disuguhi view hamparan persawahan hijau yang begitu indah dan ada jalur kereta api, sehingga sesekali kamu bisa melihat kereta api yang lewat.<br><br></div><div>Di Bento Kopi ini kamu dapat menikmati kopi atau sekedar bersantai sembari menikmati live musik, selain itu kamu juga dapat bermain games yang dapat dipinjam di kasir. Selain pesona alam yang memanjakan, Bento Kopi menawarkan 3 pilihan area yaitu indoor, semi indoor dan outdoor. Menu yang ditawarkan pun cukup beragam dengan harga yang cukup terjangkau.<br><br></div>', '087665477252', 6, '2023-06-12 20:54:47', '2023-06-12 21:50:52', 'Kota Tegal', 'tegal selatan', '087665477252', NULL, 'https://www.instagram.com/bentokopiindonesia/', 'Mandiri', '018364787429487', 'Dana', '087665477252', 'bento-kopi-tegal-da451c', '', 'konfirmasi'),
(15, 'Yotee Coffee & Eatery', 'post-images/ss8QSYlJBnWvxl9QguWVSuVGI957LFljOue0K97d.jpg', 'post-images/hnPhqzNEdVpCnSaMsc5VBlMeHGO7yWZOhKBHzQyA.jpg', 'Jl. Werkudoro, Pengabean, Slerok, Kec. Tegal Timur, Kota Tegal, Jawa Tengah 52192', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15844.14970203016!2d109.1408409!3d-6.8861207!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb9c9d1ae38df%3A0x7c1dc845b36688e5!2sYotee%20Coffee!5e0!3m2!1sid!2sid!4v1686475509266!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '<div>Yotee Coffee &amp; Eatery adalah café&nbsp; yang berlokasi di Jalan Werkudoro, Pengabean, Slerok, Kota Tegal. Cafe ini baru dibuka sekitar akhir Oktober 2021. Café ini menyajikan konsep Jepang yang sangat kental. Yotee Coffe &amp; Eatery ini juga memiliki bangunan yang didominasi warna putih, sehingga sangat cocok untuk tempat hangout dengan teman atau keluarga, juga bisa dimanfaatkan untuk spot foto kekinian.</div><div>Dengan Suasana yang asyik, nyaman, dan bersih . Tempat yang pas untuk kumpul bareng dengan teman ataupun keluarga, Bahkan meeting sekalipun. Dengan fasilitas yang memadai ada no Smoking area dan , Smoking Area yang membuat pengunjung semakin nyaman.&nbsp;</div><div>Berbagai varian menu minuman disajikan mulai dari susu, teh, kopi hingga mojito. Ada juga beberapa pilihan makanan seperti jajanan, nasi, dan olahan roti.<br><br></div>', '085848304490', 7, '2023-06-12 21:47:32', '2023-06-12 21:51:13', 'Kota Tegal', 'tegal timur', '085340000111', NULL, 'https://www.instagram.com/yoteecoffee/?hl=id', 'BRI', '0001-01-011822-53-7', 'Shopeepay', '085340000111', 'yotee-coffee-&-eatery-612a26', '', 'konfirmasi'),
(16, 'Kopi dari Hati', 'post-images/QP9VrZFDtcGmlMKYbD47FnMwLkFpuzN4yy2PEIiW.jpg', 'post-images/saOm8O63ruGGJdcug6QiguVPlr3sLbjMHRZVvDwh.jpg', 'Jl. Kapten Sudibyo No.129, Randugunting, Kec. Tegal Sel., Kota Tegal, Jawa Tengah 52133', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7922.215389959504!2d109.11841036977535!3d-6.877699100000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb96bcfc09f93%3A0xcdcb54bd307b2b4!2sKopi%20Dari%20Hati%20Tegal!5e0!3m2!1sid!2sid!4v1686481217235!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '<div>KOPI DARI HATI merupakan sebuah Cafe yang berada di Tegal. Cafe ini menyajikan berbagai menu kopi, jajanan &amp; roti yang dibanderol dengan harga yang murah dan bersahabat dengan kantong anda.</div>', '087785572258', 8, '2023-06-12 21:49:57', '2023-06-12 22:00:11', 'Kota Tegal', 'tegal timur', '087785572258', NULL, 'https://www.instagram.com/kopidarihatitegal.official/?igshid=MzRlODBiNWFlZA%3D%3D', NULL, NULL, 'GoPay', '087785572258', 'kopi-dari-hati-8c5c6b', '', 'konfirmasi'),
(17, 'Kalih Coffee Tea and Spaces', 'post-images/m1ztmES8Cdpgq9lHyp4X38BZ1u4YqIIOnPkDeqh1.jpg', 'post-images/1hxVMKDTgmFYGmv2PFRmcDoIygiQskQhIEVSBBsV.jpg', 'Jl. Raya Pacul No.18B, Sibata, Mejasem Bar., Kec. Kramat, Kabupaten Tegal, Jawa Tengah 52181', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.015630407963!2d109.1503639!3d-6.8887307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb9bb9271f517%3A0x7a5c05dcd6929146!2sKalih%20Coffee%20Tea%20and%20Spaces%20Tegal!5e0!3m2!1sid!2sid!4v1686633758071!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '<div>Kalih Coffee Tea and Spaces adalah sebuah kafe yang menawarkan pengalaman yang nyaman dan unik di dalamnya. Dengan tiga ruangan indoor yang nyaman, kafe ini memberikan suasana yang ideal untuk bersantai, bekerja, atau bertemu dengan teman-teman.</div>', '087768662331', 9, '2023-06-12 22:12:27', '2023-06-12 22:26:19', 'Kab Tegal', 'kramat', '087665477254', NULL, 'https://www.instagram.com/kalih.coffee/', 'BNI', '002993881899', 'DANA', '087665477254', 'kalih-coffee-tea-and-spaces-1420a5', '', 'konfirmasi');

--
-- Triggers `cafes`
--
DELIMITER $$
CREATE TRIGGER `Hapus Semua` BEFORE DELETE ON `cafes` FOR EACH ROW BEGIN

DELETE FROM fotos WHERE cafe_id = OLD.id;
DELETE FROM makanans WHERE cafe_id = OLD.id;
DELETE FROM minums WHERE cafe_id = OLD.id;
DELETE FROM ulasans WHERE cafe_id = OLD.id;
DELETE FROM belis WHERE cafe_id = OLD.id;
DELETE FROM bookings WHERE cafe_id = OLD.id;
DELETE FROM events WHERE cafe_id = OLD.id;
DELETE FROM vips WHERE cafe_id = OLD.id;
UPDATE users SET is_admin = 'bukan_admin' WHERE id = OLD.user_id;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapus jadwal` AFTER DELETE ON `cafes` FOR EACH ROW BEGIN

DELETE FROM jadwals WHERE cafe_id = OLD.id;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `is admin` BEFORE UPDATE ON `cafes` FOR EACH ROW BEGIN


IF NEW.Konfirmasi = 'tunggu' THEN
UPDATE users SET is_admin = 'bukan_admin' WHERE id = OLD.user_id;
ELSEIF NEW.konfirmasi = 'konfirmasi' THEN
UPDATE users SET is_admin = 'admin' WHERE id = OLD.user_id;
END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `jadwal` AFTER INSERT ON `cafes` FOR EACH ROW BEGIN

INSERT INTO jadwals SET cafe_id = NEW.id;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_event` varchar(65) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `cafe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `nama_event`, `gambar`, `deskripsi`, `cafe_id`, `created_at`, `updated_at`) VALUES
(3, 'turnamen mobile legends', 'post-images/FHqsAKPkFL8kflbsFmvRyqbjlbFhQAuzmvhK5Knj.jpg', '<div>turnamen mobile legends</div>', 11, '2023-06-09 23:22:01', '2023-06-09 23:22:01'),
(4, 'Electro Music (FESTIVAL)', 'post-images/VT0F0N9DY6VeWutt6nkkY4ciTAQ1S0bbXke6NCOs.avif', '<div>Electro Music (FESTIVAL)</div>', 11, '2023-06-11 04:26:38', '2023-06-11 04:26:38'),
(5, 'Live Music Night', 'post-images/HJdXg06H021bbXbHEGOEFLEL5sw5g4rYEJR0JDaq.jpg', '<div>Music Night | 18.00 - 21.00&nbsp; Friday - Sunday</div>', 13, '2023-06-12 20:48:21', '2023-06-12 20:48:21'),
(6, 'Live Akustik || Ernama Music Entertainment', 'post-images/WsgnMPHamJlDrJVu21THyW3pTGCcjAzFqSscfuh5.jpg', '<div>Live Akustik Every Friday - Sunday, starts at 18.00 WIB&nbsp;<br>Reservasi : 0852-2911-5997&nbsp;</div>', 13, '2023-06-12 20:52:12', '2023-06-12 20:52:12'),
(8, 'Happy Hours Discount', 'post-images/sVPsPhHgkgCbDIJdGohdUKSNihXQczKve9zW1MBd.jpg', '<div>Get Discount 15% untuk pembelian All Varian Minuman &amp; Pizzza<br>Berlaku di hari Senin - Kamis</div>', 13, '2023-06-12 21:00:47', '2023-06-12 21:00:47'),
(9, 'Beauty Class', 'post-images/E11mSq8qSusTKmiXABWheyBcVc7u3oqCimptetNY.jpg', '<div>Beauty Class Korean Daily Make Up Look</div>', 15, '2023-06-12 21:56:38', '2023-06-12 21:56:38'),
(10, 'SobatBento', 'post-images/hI3q5ih9MZqs8OO2GyVBkmr9b6x7Ylh4P8lUUZTu.jpg', '<div>Mabar gaskuy!</div>', 14, '2023-06-12 21:57:14', '2023-06-12 21:57:14'),
(11, 'Yotee Coffee & Eatery X YOU', 'post-images/8sCpGcRDjaOKheNZNUb6i0ueQBYrCIULOxAEd4A6.jpg', '<div>Could Touch Juicy Tint Bundle Kit</div>', 15, '2023-06-12 22:01:40', '2023-06-12 22:01:40'),
(12, '𝐂𝐎𝐒𝐏𝐋𝐀𝐘 • 𝐂𝐎𝐒𝐖𝐀𝐋𝐊 • 𝐉—𝐒𝐎𝐍𝐆 𝐂𝐎𝐌𝐏𝐄𝐓𝐈𝐓𝐈𝐎𝐍', 'post-images/e2CCFyqflIaCrhc4745pWuSUKXc7ftnVIMnkuhCz.jpg', '<div>𝑴𝒐𝒄𝒉𝒊 𝑬𝒎𝒑𝒊𝒓𝒆 𝒙 𝒀𝒐𝒕𝒆𝒆<br>Road to —— 𝐌𝐎𝐂𝐇𝟏𝐕𝐄𝐑𝐒𝐀𝐑𝐘<br>Minggu, 4 Juni 2023</div>', 15, '2023-06-12 22:02:48', '2023-06-12 22:02:48'),
(13, 'Bundling Everyday', 'post-images/cuwwxpa9m3Sq0YZiFaJWgRYeCytpGOOM1QXHtNdv.jpg', '<div>Bundling Everyday at 10.00 am - 12.00 pm<br>Capucino Hot with Cheese Stick / Choco Stick isi 5 / Bolen isi 2<br>Dengan Harga 27.000</div>', 16, '2023-06-12 22:22:23', '2023-06-12 22:23:14'),
(14, 'Bundling Everyday', 'post-images/qqINZFJgNYJgNMf8ScW7xrZYyPF7iPt2mdjLFzTG.jpg', '<div>Bundling Everyday at 10.00 am - 12.00 pm<br>Capucino Hot with Cheese Stick / Choco Stick isi 5 / Bolen isi 2<br>Dengan Harga 27.000</div>', 16, '2023-06-12 22:23:36', '2023-06-12 22:23:36'),
(15, 'Promo Paket Bundling', 'post-images/gFHfo3KWXfvmbQCte8JE9mJoNHiUy7L1ASl8nlGu.jpg', '<div>Promo Paket Bundling mulai dari Rp. 39.000<br>Dengan isi Brown Sugar Boba Milk dan Beef Steak Toast</div>', 16, '2023-06-12 22:24:52', '2023-06-12 22:24:52'),
(16, 'Bundling Ngopi Pagi - Pagi', 'post-images/AGYWtoOfG6j1q2EKJeddUlJJquAHPMdROMstpDDw.jpg', '<div>Bundling Ngopi Pagi - Pagi dari jam 10.00 - 13.00 WIB<br>Dengan isi Coffee Latte + Bolen Pisang yang dimulai dari harga Rp. 28.000</div>', 16, '2023-06-12 22:26:13', '2023-06-12 22:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fotos`
--

CREATE TABLE `fotos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `cafe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fotos`
--

INSERT INTO `fotos` (`id`, `gambar`, `cafe_id`, `created_at`, `updated_at`) VALUES
(4, 'post-images/8KNkpN1m8VbpisgY5inZOxyeHPmDOKG1gG9iZ2ZS.jpg', 12, '2023-06-12 20:39:17', '2023-06-12 20:39:17'),
(5, 'post-images/lVoeTI0lkE6ufJ2iJH3bHKTrQoRInNtpNQEX5zcH.jpg', 12, '2023-06-12 20:39:33', '2023-06-12 20:39:33'),
(6, 'post-images/saOCE3JuuI5GNHeTIuX0GcKyn62G7MvvucaZQlC9.jpg', 12, '2023-06-12 20:39:51', '2023-06-12 20:39:51'),
(7, 'post-images/ubsxRTBUTdK6I8guvjETNdp3tuf7Pd57lN6mzvtp.jpg', 12, '2023-06-12 20:40:13', '2023-06-12 20:40:13'),
(8, 'post-images/7ysqXALhoK0y7zsQshk5KQJf6jewM4iS15QvsAdv.jpg', 12, '2023-06-12 20:40:32', '2023-06-12 20:40:32'),
(9, 'post-images/zueH4dgIr2v3eJY95vHjmOjrcRljObS1odqEhMBP.jpg', 12, '2023-06-12 20:42:43', '2023-06-12 20:42:43'),
(10, 'post-images/NTNLh39Ymx7NhVq9uw1RiD0NShNtDNZXA7uymjgH.jpg', 13, '2023-06-12 20:42:52', '2023-06-12 20:42:52'),
(11, 'post-images/1KEAHGqtzwvo4nUASRqP5jUR5bVY5RbbQn0SW48f.jpg', 13, '2023-06-12 20:43:10', '2023-06-12 20:43:10'),
(12, 'post-images/zno9TdbCM4kxsTaxs5Djv4rgIjwZ2yxSmbL323pH.jpg', 13, '2023-06-12 20:43:23', '2023-06-12 20:43:23'),
(13, 'post-images/TAQEFzN23BR4U07FNmCKnWDshs8wrze737cASUaw.jpg', 13, '2023-06-12 20:43:37', '2023-06-12 20:43:37'),
(14, 'post-images/n1xRtvACIKtRW5jUZJbaaahUP1MaVtZt071SA7Dc.jpg', 13, '2023-06-12 20:44:45', '2023-06-12 20:44:45'),
(15, 'post-images/9o11DUoyt30l0NYJgIK9Brv8zKGndpKnvZsrAfp8.jpg', 13, '2023-06-12 20:44:56', '2023-06-12 20:44:56'),
(16, 'post-images/njlGjcaLbseK3aeVgMTmRe1BrDeIZ4tH8cb9BUjV.jpg', 13, '2023-06-12 20:45:44', '2023-06-12 20:45:44'),
(17, 'post-images/ITEijhFAqgikRHH5xkaOQezD2O9zUaRkKeW4aYGj.jpg', 12, '2023-06-12 20:46:12', '2023-06-12 20:46:12'),
(18, 'post-images/0qg9pz0v9ZkeerwfEbTZzgrQVJhERsZG52TYUy0W.jpg', 12, '2023-06-12 20:46:24', '2023-06-12 20:46:24'),
(19, 'post-images/Ppymydu8Ma14PbuDwewMEpPtCY3QMjPJtaFnuZYH.jpg', 14, '2023-06-12 21:05:59', '2023-06-12 21:05:59'),
(20, 'post-images/Muf6hZoWj3DsSL4XYEKniL2QsETNqHaytOZAT3TE.jpg', 14, '2023-06-12 21:06:18', '2023-06-12 21:06:18'),
(21, 'post-images/TSFpv8IPtsusQPqGkarhaLJ0JhLrCmEkYSZSwK7Y.jpg', 14, '2023-06-12 21:07:07', '2023-06-12 21:07:07'),
(22, 'post-images/XKArutaNePVEsrmhldmtBPsvvNsXONyjgHwHG5qv.jpg', 14, '2023-06-12 21:07:25', '2023-06-12 21:07:25'),
(23, 'post-images/dCj2ISgjlQHnD4tb4NIacb7twTy2Tj8KhN3QmWtM.jpg', 14, '2023-06-12 21:07:42', '2023-06-12 21:07:42'),
(24, 'post-images/q9pjf9Q41ifK1ymaZOSqKemfxazbQYnnPljmWuai.jpg', 14, '2023-06-12 21:08:32', '2023-06-12 21:08:32'),
(25, 'post-images/KixuU6vubJbvVlvEnx66ClzhmArXrY3T2H4JFOZZ.jpg', 14, '2023-06-12 21:08:47', '2023-06-12 21:08:47'),
(26, 'post-images/JpEXpuWQTAK7YI9v7KDw3RsT9a4XbN8IlkzN6K3r.jpg', 14, '2023-06-12 21:09:02', '2023-06-12 21:09:02'),
(27, 'post-images/pS1mBXcAWWx0Djins3YHzaMqEbljv5UPLZl5PNpc.jpg', 11, '2023-06-12 21:51:39', '2023-06-12 21:51:39'),
(28, 'post-images/RsXMEm0okAzqiY7eshDP8sNmBAh8OdKrFsVHNJHT.jpg', 15, '2023-06-12 21:51:40', '2023-06-12 21:51:40'),
(29, 'post-images/emUlOmgDMb3W5JjJ714XN1A222hbyR4gu8miEHO4.jpg', 11, '2023-06-12 21:51:47', '2023-06-12 21:51:47'),
(30, 'post-images/8pzmKj5AxGGTwP8NMoswsyTr23a25eyuB12dn4Ol.jpg', 11, '2023-06-12 21:51:56', '2023-06-12 21:51:56'),
(31, 'post-images/VEjSRvXQj2hHRqWGjLMItgbpuMBm2rAOBsi1aIU3.jpg', 15, '2023-06-12 21:51:59', '2023-06-12 21:51:59'),
(33, 'post-images/WQXlBUUmMvLRq6NRJ2LMYo0rXSb58jC7ZV68VxJE.jpg', 15, '2023-06-12 21:52:20', '2023-06-12 21:52:20'),
(35, 'post-images/J37biqiMSaBFLcxuJjeIa8jx5rJLQazGeL7v0ItV.jpg', 15, '2023-06-12 21:53:07', '2023-06-12 21:53:07'),
(36, 'post-images/SRgd5k7w2SZRt95ypAm8plXgzNTl5NzommowgOj4.jpg', 15, '2023-06-12 21:53:34', '2023-06-12 21:53:34'),
(37, 'post-images/LBmx4uA4y5u0upwhxaMlgzJsr2TUgALYeSnTm4Fs.jpg', 15, '2023-06-12 21:54:01', '2023-06-12 21:54:01'),
(38, 'post-images/kzY3ZhBYQF4B5VIlsGjnbHKrwmNdpGUTn095SX98.jpg', 11, '2023-06-12 21:54:07', '2023-06-12 21:54:07'),
(39, 'post-images/lqsvb4jYr3ItCVjPItgDKuRadYOb1MvMu6YyFhMh.jpg', 11, '2023-06-12 21:54:19', '2023-06-12 21:54:19'),
(40, 'post-images/RSBM8Z8PJCy14mIRcStXyYqCSDcEZyb6gGTjiJUL.jpg', 11, '2023-06-12 21:54:32', '2023-06-12 21:54:32'),
(41, 'post-images/nSMMEmv7WVqzjuXU5MBri1i2WrdCA9Jh3rxhEGV3.jpg', 15, '2023-06-12 21:54:43', '2023-06-12 21:54:43'),
(42, 'post-images/VEyAHZgT5JXMvC8sfebY27he9rxD4bncB2wpI1Aj.jpg', 11, '2023-06-12 21:54:43', '2023-06-12 21:54:43'),
(43, 'post-images/DXn5KH4t6ZQm3vnLchS41lS38VrcUX3MBUDz8Ygu.jpg', 11, '2023-06-12 21:54:53', '2023-06-12 21:54:53'),
(44, 'post-images/0ynC1Epe5wuJpMzK5ID8IpCrq71BvvOQwxJvOsjt.jpg', 15, '2023-06-12 21:55:05', '2023-06-12 21:55:05'),
(45, 'post-images/pK1kYtcBD81yEuNqnq1xSsfsCNBtddaefoxcnUQL.jpg', 15, '2023-06-12 21:55:25', '2023-06-12 21:55:25'),
(46, 'post-images/yyQRbT5mcQsV99d2eeo1FmYeGqFXx9PfzXMCwJ1Z.jpg', 16, '2023-06-12 22:16:52', '2023-06-12 22:16:52'),
(47, 'post-images/cKMQYy5mL7cLHO43d7A2dkbtYsD2Zz34RQjszhH9.jpg', 16, '2023-06-12 22:17:03', '2023-06-12 22:17:03'),
(48, 'post-images/T4mrT7BLjkqz597VyThzC9hR4z61LZEYPv4umF2N.jpg', 16, '2023-06-12 22:17:14', '2023-06-12 22:17:14'),
(49, 'post-images/Mw2UM5s3R74lRf8meAEBrXujz04UfPucmcCLKMWi.jpg', 16, '2023-06-12 22:17:23', '2023-06-12 22:17:23'),
(50, 'post-images/xIgaPmCMI3sSEDTJXNRT3IuJzoYcFrJ5B5k13jR6.jpg', 16, '2023-06-12 22:17:35', '2023-06-12 22:17:35'),
(51, 'post-images/z6fXqpaLaC3jjRhocvsPNbGawlWWdxwUa27801sC.jpg', 16, '2023-06-12 22:17:50', '2023-06-12 22:17:50'),
(52, 'post-images/i7lHN0Lnk2a2uPpIv6RS64qmft78PiJroD8FVb5F.jpg', 16, '2023-06-12 22:18:01', '2023-06-12 22:18:01'),
(53, 'post-images/pPNaKEOzM7xxLPTopxOPyrfVYAksE2mBKuzYee1p.jpg', 17, '2023-06-12 22:46:20', '2023-06-12 22:46:20'),
(54, 'post-images/kNWy7WuB8GithZ9s040MC0dZMBI5NkoHK5MiVKaV.jpg', 17, '2023-06-12 22:46:27', '2023-06-12 22:46:27'),
(55, 'post-images/pnhKdfi6hGmQtfVorHX0e22Ym5Wzn8TNuf36Fn16.jpg', 17, '2023-06-12 22:46:36', '2023-06-12 22:46:36'),
(56, 'post-images/ALk37IyNPHidQqHqkGGaNeMPzfmtrypnj9iReef3.jpg', 17, '2023-06-12 22:46:58', '2023-06-12 22:46:58'),
(59, 'post-images/lAdqTEkhGbfiWQFhPFy2tDjBsOP3XBdTGifPZImz.jpg', 17, '2023-06-12 22:47:28', '2023-06-12 22:47:28'),
(60, 'post-images/fvPmYZxp89qS4icm5xqZgL9i4LArZUaERY2Zij2h.jpg', 17, '2023-06-12 22:47:40', '2023-06-12 22:47:40'),
(61, 'post-images/HVQhxcmjw6Eit3lHJ4SiFIz1eM9zUIRLTUYoYcwd.jpg', 17, '2023-06-12 22:47:52', '2023-06-12 22:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `senin_buka` time DEFAULT NULL,
  `senin_tutup` time DEFAULT NULL,
  `selasa_buka` time DEFAULT NULL,
  `selasa_tutup` time DEFAULT NULL,
  `rabu_buka` time DEFAULT NULL,
  `rabu_tutup` time DEFAULT NULL,
  `kemis_buka` time DEFAULT NULL,
  `kemis_tutup` time DEFAULT NULL,
  `jumat_buka` time DEFAULT NULL,
  `jumat_tutup` time DEFAULT NULL,
  `sabtu_buka` time DEFAULT NULL,
  `sabtu_tutup` time DEFAULT NULL,
  `minggu_buka` time DEFAULT NULL,
  `minggu_tutup` time DEFAULT NULL,
  `opsi` enum('buka','tutup') NOT NULL,
  `cafe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `senin_buka`, `senin_tutup`, `selasa_buka`, `selasa_tutup`, `rabu_buka`, `rabu_tutup`, `kemis_buka`, `kemis_tutup`, `jumat_buka`, `jumat_tutup`, `sabtu_buka`, `sabtu_tutup`, `minggu_buka`, `minggu_tutup`, `opsi`, `cafe_id`, `created_at`, `updated_at`) VALUES
(9, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'buka', 9, NULL, NULL),
(11, '07:30:00', '16:30:00', '07:30:00', '16:30:00', '07:30:00', '16:30:00', '07:30:00', '16:30:00', '07:30:00', '16:30:00', '07:30:00', '15:00:00', NULL, NULL, 'buka', 11, NULL, '2023-06-14 01:42:16'),
(12, '10:00:00', '23:30:00', '10:00:00', '23:30:00', '10:00:00', '23:30:00', '10:00:00', '23:30:00', '10:00:00', '23:30:00', '10:00:00', '23:30:00', '10:00:00', '23:30:00', 'buka', 12, NULL, '2023-06-12 21:39:33'),
(13, '11:00:00', '22:00:00', '11:00:00', '22:00:00', '11:00:00', '22:00:00', '11:00:00', '22:00:00', '07:00:00', '22:00:00', '07:00:00', '22:00:00', '07:00:00', '22:00:00', 'buka', 13, NULL, '2023-06-12 21:41:13'),
(14, '09:00:00', '22:00:00', '09:00:00', '22:00:00', '09:00:00', '22:00:00', '09:00:00', '22:00:00', '09:00:00', '22:00:00', '09:00:00', '22:00:00', '09:00:00', '22:00:00', 'buka', 14, NULL, '2023-06-12 21:51:54'),
(15, '10:00:00', '22:00:00', '10:00:00', '22:00:00', '10:00:00', '22:00:00', '10:00:00', '22:00:00', '10:00:00', '22:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', 'buka', 15, NULL, '2023-06-12 22:40:22'),
(16, '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', 'buka', 16, NULL, '2023-06-12 22:02:05'),
(17, '08:00:00', '23:00:00', '08:00:00', '23:00:00', '08:00:00', '23:00:00', '08:00:00', '23:00:00', '08:00:00', '23:00:00', '08:00:00', '23:00:00', '08:00:00', '23:00:00', 'buka', 17, NULL, '2023-06-12 22:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `makanans`
--

CREATE TABLE `makanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_makanan` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `cafe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `makanans`
--

INSERT INTO `makanans` (`id`, `nama_makanan`, `gambar`, `deskripsi`, `harga`, `cafe_id`, `created_at`, `updated_at`) VALUES
(4, 'Rompang original', 'post-images/TBTxhM9qEu4cnmOBCkZPmSuOoU6Uppmb9gxy645K.gif', '<div>Roti Mampang</div>', 7000, 11, '2023-06-09 03:28:34', '2023-06-09 03:34:11'),
(6, 'Ropang Oreo', 'post-images/IsX3PjMb51FasTv2nwuDvZdi6dIuu5fHbhcig8nH.gif', '<div>Ropang Oreo</div>', 10000, 11, '2023-06-10 07:36:35', '2023-06-10 07:38:28'),
(7, 'Ropang Ham & Cheese', 'post-images/WgzH01aRWzHN8HGvdcu15HgZZuYfQqJobkfOn9YH.gif', '<div>Ropang Ham &amp; Cheese</div>', 10000, 11, '2023-06-10 07:47:19', '2023-06-10 07:47:19'),
(8, 'Ropang Chik & Cheese', 'post-images/JOZIDM2aEsi2QL0L6NWlTxBEN16LRXxdVcDZX8KX.gif', '<div>Ropang Chik &amp; Cheese</div>', 11000, 11, '2023-06-10 07:47:47', '2023-06-10 07:47:47'),
(9, 'Ropang Boba', 'post-images/TmmV0dV6ijtQJrhE2CYHEqwNggJK6EgpsUosGJbs.gif', '<div>Ropang Boba</div>', 11000, 11, '2023-06-10 07:48:13', '2023-06-10 07:48:13'),
(10, 'Bulgogi Pizza', 'post-images/Jy1n3mHJPle6MaZ0UQNcknkXuy8GBQZIUYkU756j.jpg', '<div>Buat kamu yang pengin ngemil sore wajib banget nih cobain salah satu menu Korean Delightnya yaitu BULGOGI PIZZA. Crispy pizza dengan topping slice beef, kimchi dan keju mozarella. cocok buat nemenin sore kamu.&nbsp;</div>', 48000, 13, '2023-06-12 21:16:28', '2023-06-12 21:16:28'),
(11, 'Chicken Katsu Teriyaki', 'post-images/pC1M6JK03ZrDi76bmeeHOGLkE1RfFRyARCkzupea.jpg', '<div>Ayam dengan baluran tepung panir dan dituang saos teriyaki ala jepang</div>', 26000, 12, '2023-06-12 21:16:59', '2023-06-12 21:16:59'),
(12, 'Chicken Maryland', 'post-images/kCTiWWffgqKvawQTYTl1veKNqfy6DQZjhgiED7hK.jpg', '<div>Chickennya juicy tapi tetap crunchy diluarnya, udah gitu diatasnya terdapat keju yang melted dan dilengkapi french fries nya juga.&nbsp;</div>', 56000, 13, '2023-06-12 21:17:09', '2023-06-12 21:17:09'),
(13, 'Truffle Wagyu Fried Rice', 'post-images/TOCC44XoQZ0T1UdH42GZrNSOdhcFf0a3zZxtdg1r.jpg', '<div>Wagyunya juicy banget dipadukan dengan truffle jadi tambah istimewa&nbsp;</div>', 80000, 13, '2023-06-12 21:17:57', '2023-06-12 21:17:57'),
(14, 'Churros Bites', 'post-images/92Oa7xIwfKg325ojIiJ0u3IzVy0wt6QVEOofGcdW.jpg', '<div>Desert favorit ini tersedia 2 varian ,original dengan taburan gula halus, dan cinnamon dengan taburan cinnamon sugar springkle. Selain itu kamu juga bisa cocol dulu tuh dengan melted choco sauce atau salted butter caramel dijamin makin mantap deh rasanya.&nbsp;</div>', 29000, 13, '2023-06-12 21:19:05', '2023-06-12 21:19:05'),
(15, 'Chicken Katsu Mozarella', 'post-images/cRL7eSR4u1zz43KZxaHuraws3367VIcu3SPHVttx.jpg', '<div>Ayam dengan baluran tepung banir dengan keju diatasnya</div>', 26000, 12, '2023-06-12 21:19:26', '2023-06-12 21:19:26'),
(16, 'KIMCHI MONSTER FRIES', 'post-images/8k8Esft7VoCbIXTtNnSx0IhJYswVfHR9QP1uXU1F.jpg', '<div>Kentang goreng dengan topping perpaduan mozarella dan cheddar cheese yang gurih, dan yang gak ketinggalan nih ada kimchi yang asem pedas juga dengan aroma smoked beef yg lezat.&nbsp;</div>', 45000, 13, '2023-06-12 21:20:40', '2023-06-12 21:20:40'),
(17, 'Chicken Karage', 'post-images/Yf4DIUbjdY0xrhklHNts42XQD0LBQoSBrmKHDAz5.jpg', '<div>Ayam goreng yang telah diberi sedikit adonan dan diasinkan</div>', 25000, 12, '2023-06-12 21:21:08', '2023-06-12 21:21:08'),
(18, 'Chicken Stik with salad', 'post-images/DTqwn1fhiAkKqRpxIwhjtotHIc6wPLtJn1st0w1x.jpg', '<div>Chicken stik dengan salad&nbsp;</div>', 27000, 12, '2023-06-12 21:22:38', '2023-06-12 21:22:38'),
(19, 'Toasted Spicy Sweet', 'post-images/CNKn8SHksYgRSKJu9uZfHnrTG6SAKInXEYEbrdCh.jpg', '<div>Roti bakar dengan topping yang manis dan dipadukan dengan saos sambal</div>', 18000, 12, '2023-06-12 21:25:01', '2023-06-12 21:25:01'),
(20, 'Banana Crispy', 'post-images/AydjiGHVmUjWYt7GRtwvX2xLuoVlKZ122PL9oa2g.jpg', '<div>Pisang goreng pake tepung roti, enak.</div>', 13000, 14, '2023-06-12 21:28:24', '2023-06-12 21:28:24'),
(21, 'Mendoan', 'post-images/eutq0oF8286u6tyzTZaRK731tWTFvQcShYRyViBj.jpg', '<div>Tempe mendoan, kalian tau lah.</div>', 10000, 14, '2023-06-12 21:29:06', '2023-06-12 21:29:06'),
(22, 'Chicken Ricebowl Sambal Matah', 'post-images/U7boSmkPzO3wjDdcl9qYfe3ewGj23h6haPoSYST8.jpg', '<div>Nasi ayam pake sambel matah di mangkok, makasih.</div>', 14000, 14, '2023-06-12 21:30:44', '2023-06-12 21:30:44'),
(23, 'Chicken Katsu Blackpaper', 'post-images/Xlfps23IcPXjTI3YV7KRXdve1P7PvQRtsyVoNXoZ.jpg', '<div>Ayam katsu sama nasi serta sayuran. Enak loh!</div>', 14000, 14, '2023-06-12 21:31:56', '2023-06-12 21:31:56'),
(24, 'Chicken Noodle', 'post-images/SvJJEsB66O5NF0fb1No8ToNyE0TQgfm5r2x48k5o.jpg', '<div>Mie sama ayam, tapi bukan mie ayam.</div>', 14000, 14, '2023-06-12 21:32:46', '2023-06-12 21:32:46'),
(25, 'Noodle Egg', 'post-images/Y2iT7Wl1zmnfWx5QomaZLjtEXyzymRFhTDBcrk21.jpg', '<div>Mie sama telor ceplok.</div>', 10000, 14, '2023-06-12 21:33:19', '2023-06-12 21:34:25'),
(26, 'Ayam Geprek', 'post-images/z624GfJ9aNTcqr6utA7gqAKK7385xzEQ66rvIv5w.jpg', '<div>Chicken smackdown.</div>', 16000, 14, '2023-06-12 21:33:58', '2023-06-12 21:34:13'),
(27, 'Ayam Rica', 'post-images/1yxSTHJiqUQxPXLiBsKfWOvDTnCu5PKJ66YQRBWp.jpg', '<div>Ayam rica-rica sama nasi. Pesen ini aja sih.</div>', 16000, 14, '2023-06-12 21:35:58', '2023-06-12 21:35:58'),
(28, 'Ayam Pandan', 'post-images/Jd8Hrf5UaQyhcpA2qK6SKlZWCkHI9wiG6lv8gffL.jpg', '<div>Menu baru. Cobain!</div>', 16000, 14, '2023-06-12 21:36:39', '2023-06-12 21:36:39'),
(29, 'Chicken Ricebowl Blackpaper', 'post-images/ZPrHHxrhrXOSFMSP55EOiNSfkHngENO4EThJqnoB.jpg', '<div>Enak. Ini aja guys pesennya!</div>', 14000, 14, '2023-06-12 21:37:11', '2023-06-12 21:37:11'),
(30, 'Chicken Wings', 'post-images/z9snoyvBebIgeSl9XEa7bBg7gJZFk83clK4hNJfU.jpg', '<div>Dengan lumuran bumbu nikmat dengan rasa pedas dan manis turut berperan dalam kelezatan setiap gigitan.&nbsp;</div>', 20000, 16, '2023-06-12 22:10:47', '2023-06-12 22:10:47'),
(31, 'Dimsum', 'post-images/JU4AESiOievZwxEHbwSWUkGMVy8kuJAsSeFSUgDi.jpg', '<div>Makanan kecil fenomenal ini yang menjadi favorit semua orang karena rasanya yang lezat dan bikin nagih. Kini, sudah hadir loh di kopi dari hati tegal terdiri dari berbagai varian isi yaitu ayam, cumi, udang, kepiting, jamur, dan smoke beef dengan harga yang affordable cocok banget untuk teman nongkrong kalian.&nbsp;</div>', 21000, 16, '2023-06-12 22:11:17', '2023-06-12 22:11:17'),
(32, 'Classic Churros', 'post-images/9pgNrAHExhGQjIVfZeNcWzrHfRTLBWs7CAeEJrX1.jpg', '<div>Mereka memiliki luar yang relatif renyah dan lembut di dalam. Gula kayu manis mengkristal dari panas adonan goreng dan menciptakan eksterior manis dan renyah yang adiktif. rasa seperti donat kenyal, lebih padat, dan sedikit renyah.&nbsp;</div>', 22000, 16, '2023-06-12 22:11:56', '2023-06-12 22:11:56'),
(33, 'FrenchFries', 'post-images/vaBtqtprZjhsI06IWDLXrWgwCwCWMWSCptb2X5Ns.jpg', '<div>Kentang goreng yang cocok untuk cemilan bagi kamu yang suka nongkrong</div>', 18000, 16, '2023-06-12 22:14:00', '2023-06-12 22:14:00'),
(34, 'Ayam sambel terasi', 'post-images/DMRl9fAL7oM5JekudKaVGLIjkEzdBel9z57bpK7P.jpg', '<div>Untuk rasa mending langsung cobain aja deh.<br><br></div>', 25000, 16, '2023-06-12 22:14:35', '2023-06-12 22:32:14'),
(35, 'Gyu Enoki Don', 'post-images/6Esd1uLHodVjJvfI8tG3xnQNG7tOggPCtSLUVSHP.jpg', '<div>stir fried sliced beef, enoki mushroom, marinated spinach, poached egg, yakiniku sauce</div>', 37000, 15, '2023-06-12 22:19:47', '2023-06-12 22:19:47'),
(36, 'Oyakodon', 'post-images/2ozL1nHeiHmgo6K9uI5YqLxfkpITsNiIvwOmzez9.jpg', '<div>Boneless shicken leg, egg, japanese rice, teriyaki sauce, katsuobushi</div>', 37000, 15, '2023-06-12 22:21:00', '2023-06-12 22:21:00'),
(37, 'Karage Tori Popcorn', 'post-images/FfD7hEh1crzFlaocyCPq3spSc8FJqj3tYMmr3evo.jpg', '<div>Boneless chicken leg, tempura batter, bulgogi mayo</div>', 30000, 15, '2023-06-12 22:22:05', '2023-06-12 22:22:05'),
(38, 'Furikake Potato Ball', 'post-images/HZEpPT6DgqhsfpUtlyk33EZ0IhiFjIk9UulGYN9c.jpg', '<div>Furikake seasoning, potato noisette, bulgogi mayo</div>', 25000, 15, '2023-06-12 22:23:16', '2023-06-12 22:23:16'),
(39, 'Sando Rama', 'post-images/SyFacxca6d0LodcHk38pl4wRKWsIheGdqhJVBIII.jpg', '<div>White bread, Chicken Katsu, tontakatsu radish slaw, japanes mayo</div>', 29000, 15, '2023-06-12 22:24:21', '2023-06-12 22:24:21'),
(40, 'Itaewon Bulgogi Sando', 'post-images/gtsV8DBubp0bElaf3yBe5hbSCIlR6HY9VRPQm9Bp.jpg', '<div>White Bread, sliced beef, radish salad, bulgogi mayo, yakiniku sauce</div>', 29000, 15, '2023-06-12 22:25:34', '2023-06-12 22:25:34'),
(41, 'Chicken Yakiniku Set', 'post-images/mnCjBjBjH0yBGlI7TNOZxTJ2C4ZNcG99v8CWHv4K.jpg', '<div>Chicken katsu, japanase rice, radish slaw, marinated spinach, dashibroth, yakiniku sauce</div>', 39000, 15, '2023-06-12 22:26:52', '2023-06-12 22:27:09'),
(42, 'Chicken Teriyaki Set', 'post-images/kOjgyAiFA1rBIOdecCNyKquLOA0yBlAFUKTnU7Qh.jpg', '<div>Chicken katsu, japanase rice, radish slaw, marinated spinach, dashibroth, teriyaki sauce</div>', 39000, 15, '2023-06-12 22:28:12', '2023-06-12 22:28:12'),
(43, 'Osaka Summer Okonomiyaki', 'post-images/XaC6JrPW6PEi2DWm4o9Uyb9d7xgIRrVZV7I1k0rF.jpg', '<div>Okonomiyaki, Crabstick, katsuoboshi tonkatsu, mayonaise</div>', 27000, 15, '2023-06-12 22:30:01', '2023-06-12 22:30:01'),
(44, 'Banana Mitsu Fritter', 'post-images/b3cj8GVwtsvB2gBnBJ6e6bm5j6BlMX5GqducvkaP.jpg', '<div>Banana fritter, Honey, Ice cream, crumble</div>', 27000, 15, '2023-06-12 22:30:52', '2023-06-12 22:30:52'),
(45, 'Fujiyama Pannacota', 'post-images/OSi3HZDPeqYZqxyhxV0OoeO82IXJ66ia0fdj9QIv.jpg', '<div>Tropical fruit can, crumble, strawberry mint leaves</div>', 25000, 15, '2023-06-12 22:32:41', '2023-06-12 22:32:41'),
(46, 'Aglio Olio', 'post-images/Vu4JwqmIssxDdsB0DpoakYUXwmJX013s7oQPKxxv.jpg', '<div>Sphagetti.</div>', 27000, 17, '2023-06-12 22:36:53', '2023-06-12 22:36:53'),
(47, 'Bolognese', 'post-images/Kc9cMLYPIFLjdXCjZGB6uvWPXV7U1XFsEZZKzr3m.jpg', '<div>Sphagetti Saus Bolognese</div>', 25000, 17, '2023-06-12 22:37:58', '2023-06-12 22:37:58'),
(48, 'Cheezy Potato Wedges', 'post-images/55xexl4ZlMvcvRYNzQBFVMqTHl83SfXrPXyH3NWj.jpg', '<div>Kentang dengan lumuran keju.</div>', 19000, 17, '2023-06-12 22:38:42', '2023-06-12 22:38:42'),
(49, 'Creamy Carbonara', 'post-images/k8NbxlFKYonLnjpS7yjCLHzIS9VeKuvdHKLydZsO.jpg', '<div>Sphagetti</div>', 29000, 17, '2023-06-12 22:39:25', '2023-06-12 22:39:25'),
(50, 'French Fries', 'post-images/UnYWHS0uRlY06qENv4tg4YSooI5YlIH5sQnF6ZhS.jpg', '<div>Kentang goreng</div>', 15000, 17, '2023-06-12 22:39:56', '2023-06-12 22:39:56'),
(51, 'Fruitiva Dessert Ice', 'post-images/aPTuqKMACoUAJbcFzA3WV8L8cJfLKKdrQ29SwyBi.jpg', '<div>Es buah</div>', 25000, 17, '2023-06-12 22:40:53', '2023-06-12 22:40:53'),
(52, 'Kalih Street Chicken', 'post-images/ZmVKlW6nJklsLz2Q0a1X8moJX21O4ZteU1yCpqKg.jpg', '<div>Ayam slice.</div>', 15000, 17, '2023-06-12 22:42:49', '2023-06-12 22:42:49'),
(53, 'Nasgor Kebuli Ayam', 'post-images/KrQSzKThNhJEHMIkcdY0P8jRXPtwXL1NgKtxYKIV.jpg', '<div>nasi goreng</div>', 30000, 17, '2023-06-12 22:44:27', '2023-06-12 22:45:26'),
(54, 'Paris Cordon Bleu Kalih', 'post-images/N1rYHo0bzS7f5s2T285iMF9KRVEIKMfqGhm1EjWG.jpg', '<div>Steak</div>', 40000, 17, '2023-06-12 22:45:14', '2023-06-12 22:45:14'),
(55, 'The Og Tofu Aci', 'post-images/nYgCwYzpIEVVWpKi9k5ht1UdsmylcpKp5sR5tZYe.jpg', '<div>Tahu aci aja</div>', 15000, 17, '2023-06-12 22:46:02', '2023-06-12 22:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_02_032833_create_cafe_table', 1),
(7, '2023_04_03_013448_create_menus_table', 1),
(8, '2023_04_03_141700_create_vips_table', 1),
(9, '2023_04_03_142343_add_cafe_id_to_vips_table', 1),
(10, '2023_04_25_124356_add_nomor_to_user_table', 1),
(11, '2023_04_25_233158_add_username_to_user_table', 1),
(12, '2023_04_26_034525_create_minumans_table', 1),
(13, '2023_05_21_104807_add_domisili_to_cafes_table', 1),
(14, '2023_05_24_071532_create_makanans_table', 1),
(15, '2023_05_27_102001_add_fasilitas_to_vips_table', 1),
(16, '2023_05_27_133905_add_harga_vips_table', 1),
(17, '2023_05_29_235617_create_jadwal_table', 1),
(18, '2023_06_01_101302_create_booking_table', 1),
(19, '2023_06_02_020146_add_no_pesanan_to_bookings_table', 1),
(20, '2023_06_03_145751_cerate_belis_table', 1),
(21, '2023_06_04_095213_create_ulasan_table', 1),
(22, '2023_06_06_151431_add_pembayaran_to_cafes_table', 1),
(23, '2023_06_07_075912_create_fotos_table', 1),
(24, '2023_06_10_004538_create_ivens_table', 2),
(25, '2023_06_23_133710_add_konfirmasi_to_cafe_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `minums`
--

CREATE TABLE `minums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_minuman` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `cafe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `minums`
--

INSERT INTO `minums` (`id`, `nama_minuman`, `gambar`, `deskripsi`, `harga`, `cafe_id`, `created_at`, `updated_at`) VALUES
(1, 'kopi susu gula aren', 'post-images/SkCz22C53dFOaXAkhSFbNTwvK02nbnI0E4RNGfAr.jpg', '<div>ada gula arennya</div>', 10000, 11, '2023-06-08 23:54:41', '2023-06-09 03:48:08'),
(3, 'Kopi Hitam', 'post-images/iRm0BRwItQUI2jBXvBva4bwLhpxMR1N9kGGdGEyA.gif', '<div>Kopi Hitam</div>', 7000, 11, '2023-06-09 20:59:21', '2023-06-09 20:59:21'),
(4, 'Kopi Susu Bandung', 'post-images/juI4KIR2dqpdhEBieftPlMllv3U8rK6JzdZbyeHN.gif', '<div>Kopi Susu Bandung</div>', 10000, 11, '2023-06-09 21:09:43', '2023-06-09 21:09:43'),
(5, 'Kopi Chocolate', 'post-images/zTlhj7E7zcgh7tes0LUW6vqkhBU4AEKoYumqZ98U.gif', '<div>Kopi Chocolate&nbsp;</div>', 10000, 11, '2023-06-09 21:12:10', '2023-06-09 21:12:10'),
(8, 'Kopi Avocado', 'post-images/vsPIRQjCHxkPZtdxJtQMxMyZGbWSJyzcyjDjtFeq.gif', '<div>Pake Alpukat</div>', 10000, 11, '2023-06-10 07:02:53', '2023-06-10 07:02:53'),
(9, 'Matcha', 'post-images/szz6H7Fud2g7afgxxcLo7oVxGYQaSDt5Vr0nVshl.gif', '<div>Matcha</div>', 10000, 11, '2023-06-10 07:03:45', '2023-06-10 07:03:45'),
(10, 'Caramel Susu', 'post-images/1aw9MQhC7vDfgMGrL8cXTTxrEOtMP0j6q2xJhQZX.gif', '<div>Caramel Susu</div>', 10000, 11, '2023-06-10 07:04:50', '2023-06-10 07:04:50'),
(11, 'Cheese Milk Tea', 'post-images/clcIHevcqOejx1ssnowWTtU20XYWCYlFCYelQfd8.gif', '<div>Cheese Milk Tea</div>', 10000, 11, '2023-06-10 07:05:31', '2023-06-10 07:05:31'),
(12, 'Avocado', 'post-images/pA4RMq9hWKriKIn66ISumA6s9PO1ySMoeJ9KHWvU.gif', '<div>Avocado</div>', 10000, 11, '2023-06-10 07:06:03', '2023-06-10 07:06:03'),
(16, 'Ocean PinaColada', 'post-images/SNu834ga6K5FWhjrhy89MPBQVqFwMmZ4QjGN1hSB.jpg', '<div>Butuh yang segar manis dan fresh untuk mengembalikan semangat kamu hari ini⁉️ Wajib banget cobain Ocean Pina Colada, minuman dengan bahan utama buah nanas ini cocok banget untuk nyegerin mood kamu!.&nbsp;</div>', 30000, 13, '2023-06-12 21:03:46', '2023-06-12 21:03:46'),
(17, 'Sunset Pina Colada', 'post-images/1VIMMc7vR8XX7AX83tMzx3Znlx13CMkiWiR8KnHK.jpg', '<div>Basicly nya sih buah nanas yang di mix dengan buah strawberry.&nbsp;</div>', 30000, 13, '2023-06-12 21:05:08', '2023-06-12 21:05:08'),
(18, 'Jasmine Greentea Hot', 'post-images/vlCFvO7kbkE5rEaQLT4Q8XYM7bWL8kYH75L5Pcao.jpg', '<div>Teh beraroma bunga dari tanaman melati</div>', 20000, 12, '2023-06-12 21:05:45', '2023-06-12 21:09:13'),
(19, 'Strawberry Nitro Coffee', 'post-images/y9g7jQEZ0NRQ3xDVsukvezrjKiBoOltzIo2GUyhY.jpg', '<div>Tampilannya unik seperti soda, meski sebenernya adalah coffee mix strawberry yang bakal bikin kamu terkaget kaget saking enaaak nya, rasanya lebih dingin, lembut dan creamy gitu karena diproses dengan tambahan nitro.&nbsp;</div>', 33000, 13, '2023-06-12 21:06:39', '2023-06-12 21:06:39'),
(20, 'Avocado Presso', 'post-images/w9OpZhs4hVltybfTTwbqypwk2rXBOn5fdV6Vh99N.jpg', '<div>Perpaduan rasa manis, pahit, lembut dari alpukat dan espresso.&nbsp;</div>', 32000, 13, '2023-06-12 21:08:35', '2023-06-12 21:08:35'),
(21, 'Capucino Hot', 'post-images/x0shSko8r34hvWidVcQFGJavauSLhqCJ7NywHRYN.jpg', '<div>Secangkir kopi cappuccino dengan perbandingan espresso, steamed milk dan busa yang sama</div>', 25000, 12, '2023-06-12 21:08:52', '2023-06-12 21:08:52'),
(22, 'Java Orange Coffee', 'post-images/Bl5abSmUDULJaJUbMo5HYgezQ7Sw473eKU6gAqXc.jpg', '<div>Taste kopinya tetep ada dan orangenya berasa segeer banget. Bisa bikin fresh sekaligus penghilang ngantuk&nbsp;</div>', 20000, 13, '2023-06-12 21:09:56', '2023-06-12 21:09:56'),
(23, 'Chocolate Mint', 'post-images/hAnqipqrHgFYfshtbOmlGrj9Kc0ilWrWK0FFcmSH.jpg', '<div>Perpaduan antara coklat dan mint yang bisa membuat harimu fresh</div>', 25000, 13, '2023-06-12 21:11:32', '2023-06-12 21:11:32'),
(24, 'Rainbow Mocktail', 'post-images/xzEFgSjUrHUV3G04c3a7FsIwnBiYtrAQR8VDFq4Q.jpg', '<div>Perpaduan berbagai sirup dan pepsi yang menyegarkan</div>', 20000, 12, '2023-06-12 21:13:20', '2023-06-12 21:13:20'),
(25, 'Creamy Pinacolada', 'post-images/T0dsJ95lhtN4kD15uDqe1SMJqgf75LhlzUZRzqCV.jpg', '<div>Sensasi segar buah nanas dengan creamer.&nbsp;</div>', 30000, 13, '2023-06-12 21:14:35', '2023-06-12 21:14:35'),
(26, 'Strawberry Milk', 'post-images/jCrxOOagZ85hkGlHKsYAKkG1P3nClMmbydn4BwBe.jpg', '<div>Jadi nih guys strawberry milk, susu strawberry. Kalo kalian suka strawberry, gas!</div>', 15000, 14, '2023-06-12 21:15:25', '2023-06-12 21:15:43'),
(27, 'Regal Milk', 'post-images/zWhGvIpxMzq6C6iFU3wyU8HVld7NHi1az1rJfNAz.jpg', '<div>Regalnya cuy.</div>', 15000, 14, '2023-06-12 21:16:21', '2023-06-12 21:16:21'),
(28, 'Chocolate Original', 'post-images/cUlJLcOWx2IvwS7qZzHPXfWDvco155IfmwbtaOwg.jpg', '<div>Coklatnya asli, no palsu palsu.</div>', 15000, 14, '2023-06-12 21:17:29', '2023-06-12 21:17:29'),
(29, 'Vanilla Milk', 'post-images/QgJetj5h9NwgxWZwX7TGUdozJjOmF5Myv6Sc7DrZ.jpg', '<div>Ini vanilla dipakein susu.</div>', 15000, 14, '2023-06-12 21:19:06', '2023-06-12 21:19:06'),
(30, 'Coffee Milk', 'post-images/AvHkZpJtRZSG6gNlU1SFeV2zzMDjKZ64nq1DFcAa.jpg', '<div>Kopi Susu guys.</div>', 10000, 14, '2023-06-12 21:19:52', '2023-06-12 21:19:52'),
(31, 'Strawberry Squash', 'post-images/Lp61k6W4noId9RV0ZlYKXVtJfJ7U7MtvuWf0dv1I.jpg', '<div>Strawberry pake soda. Alias soda gembira.</div>', 14000, 14, '2023-06-12 21:20:47', '2023-06-12 21:20:47'),
(32, 'Malacca Coffee', 'post-images/thD2ZSXtsliEo5s8Hi1EZ0DoCnnm6d4GLwrfuFv1.jpg', '<div>Rasa kopinya strong berpadu dengan gula aren yang manis.&nbsp;</div>', 23000, 13, '2023-06-12 21:22:12', '2023-06-12 21:22:12'),
(33, 'Taro Milk', 'post-images/w2EwyaLuhtw2YNfBuFj8wUYfDBaJi51GDaVbqapt.jpg', '<div>Taro taro apa yang taro?</div>', 15000, 14, '2023-06-12 21:22:30', '2023-06-12 21:22:30'),
(34, 'Café Romance', 'post-images/QPxDKh0WtVu8rjtf6YTUTVAkpTyR5bVlU8mX6nj3.jpg', '<div>Nggak cuma tampilan aja nih yang oke, rasanya juga manis dan segeer banget. Perpaduan yang perfect dari Rose Milk dan Coffee.&nbsp;</div>', 20000, 13, '2023-06-12 21:23:11', '2023-06-12 21:23:11'),
(35, 'Lychee Tea', 'post-images/4swT0nUr35Cjlb2xu4LC3SEYIQfob1sLjpo7pZlo.jpg', '<div>Perpaduan leci dan teh yang seger dan dingin.<br><br></div>', 30000, 13, '2023-06-12 21:23:56', '2023-06-12 21:23:56'),
(36, 'Ice Tea', 'post-images/mnB7YfT41DvbB71H1AxUTiDT50gYki1myxzSlzYt.jpg', '<div>Es teh versi 5000.</div>', 5000, 14, '2023-06-12 21:25:03', '2023-06-12 21:25:03'),
(37, 'Red Velvet', 'post-images/4wlckORRaZW1EAzyETGLl9avWoZ8Yx3I4sU3Xdu3.jpg', '<div>Happiness!</div>', 15000, 14, '2023-06-12 21:26:03', '2023-06-12 21:26:03'),
(38, 'Pandan Milk', 'post-images/9W0sJf1KvNbea4iucFNRSafPYMESoZc33lRofABG.jpg', '<div>Susu pandan cuy.</div>', 15000, 14, '2023-06-12 21:27:13', '2023-06-12 21:27:13'),
(39, 'Fluffy Latte', 'post-images/RP2z4V53Z7FcuZFJaAP5xV6dRFZjyJkbDtmpn8pv.jpg', '<div>Apasih fluffy latte itu? fluffy latte es kopi susu dengan tambahan es cream vanilla.&nbsp;</div>', 22000, 16, '2023-06-12 22:03:13', '2023-06-12 22:03:13'),
(40, 'Orange Juice', 'post-images/K95BiSpxgQhmXNN9zfKdrFnIlpY8iPBMA7RcsyMr.jpg', '<div>Nikmati kesegaran fresh juice di kopi dari hati tegal.&nbsp;</div>', 20000, 16, '2023-06-12 22:03:48', '2023-06-12 22:38:11'),
(41, 'Spilt Shoot', 'post-images/v1VE6Yee8fM2ZijVzURJgtlGtZv5SflIIcbPWJGk.jpg', '<div>Espresso + Capuccino/Caffe late</div>', 35000, 15, '2023-06-12 22:04:17', '2023-06-12 22:04:17'),
(42, 'Smoothies', 'post-images/M15rWG3bhxVboI0n8PhUsbmAbXcEdg1cxibhig1Z.jpg', '<div>Kenalin nih smoothies series dari kami tersedia varian rasa mango, strawberry, banana. Smoothies ini memiliki karakter rasa yang asam, manis, dan segar pastinya cocok banget buat pelepas dahaga saat nongkrong di cuaca yang terik ini.&nbsp;</div>', 25000, 16, '2023-06-12 22:04:22', '2023-06-12 22:37:08'),
(43, 'Popcorn Latte', 'post-images/7YkJa6yEZHxbzmfF43Do7k0xN9gFiKd8k3blOX7S.jpg', '<div>Our signature Es kopi susu, creamy, sweet popcorn</div>', 30000, 15, '2023-06-12 22:05:29', '2023-06-12 22:05:29'),
(44, 'Cotton Candy Latte', 'post-images/Tx0IXlFbiYvqoBjaIBCim3ppNLq456w3egnH1AoC.jpg', '<div>Es kopi susu, taste like ur favorit 90\'s candy</div>', 30000, 15, '2023-06-12 22:06:42', '2023-06-12 22:06:42'),
(45, 'CHOCO SERIES', 'post-images/zUltNuBCzFDLKGH4TdLnZd5qxbNqYxJ6ahTJFyka.jpg', '<div>Buat kalian yg gak suka coffee, choco series bisa jadi pilihan kalian buat temen nongkrongmu banyak varian rasanya ada strawberry, vanilla, hazelnut,avocado dan mint.&nbsp;</div>', 22000, 16, '2023-06-12 22:06:50', '2023-06-12 22:35:32'),
(46, 'Erza Scarlet', 'post-images/VPHrKeM9Itcta996wYFDymXPccvTDrpQ29J3kiC8.jpg', '<div>Coldbrew coffee, rose, lemon juice</div>', 30000, 15, '2023-06-12 22:08:10', '2023-06-12 22:08:10'),
(47, 'Sweet Matcha', 'post-images/JAd2w9nIWQRsSu9nNA3O2DYKOEuiAuBUs5dGptlX.jpg', '<div>Minuman ini pada dasarnya dibuat dari matcha yang dipadukan dengan strawberry. Memiliki karakter rasa yang manis dan menyegarkan&nbsp;</div>', 31000, 16, '2023-06-12 22:08:51', '2023-06-12 22:08:51'),
(48, 'Doflamingo', 'post-images/99i2IQFUBunNIkNqaiCuKpuPEEfZ8WEiY9lYed3Y.jpg', '<div>Guava mix, pineapple juice with liquid cream</div>', 30000, 15, '2023-06-12 22:09:16', '2023-06-12 22:09:16'),
(49, 'Charcoal Iced', 'post-images/zX5f3mI0II7wqHiPZsK1Wura43DuBkRleLaS78xf.jpg', '<div>Charcoal, fresh milk, coconut flakes</div>', 32000, 15, '2023-06-12 22:12:37', '2023-06-12 22:12:37'),
(50, 'Greentea Iced', 'post-images/Aishp6uVKDFLINE7NJDXuGnVA9Ybvc3rRVxJBXTN.jpg', '<div>Greentea, fresh milk, pocy greentea</div>', 32000, 15, '2023-06-12 22:13:20', '2023-06-12 22:13:20'),
(51, 'Roronoa Zoro', 'post-images/62As8Y5NnScHtMJn9tmhpxlNt7LxlymHNb6IZBg0.jpg', '<div>Palm sugar, klepon, Whippedcream, &amp; Coconut Dried</div>', 35000, 15, '2023-06-12 22:14:25', '2023-06-12 22:14:25'),
(52, 'Chamomile Tea', 'post-images/lErSq1kAdUErKviUAY9t8i8yxHuLp9tcVmsvyx2U.jpg', '<div>teh dengan ekstrak bunga chamomile (Matricaria recuita) yang berasal dari Eropa</div>', 20000, 15, '2023-06-12 22:16:11', '2023-06-12 22:16:11'),
(53, 'Bluepea Tea', 'post-images/h54l9rAyiSdnZ5QYkvSgukUCSuFkJaSNOJJtQ0Q1.jpg', '<div>Teh ini terbuat dari bunga butterfly pea&nbsp;atau dikenal di Tanah Air dengan sebutan bunga telang</div>', 20000, 15, '2023-06-12 22:17:45', '2023-06-12 22:17:45'),
(54, 'Rose Tea', 'post-images/ojM1G60Zo4QZIbM1VDc0PyDmrl597Hs1N292KxjT.jpg', '<div>Minuman herbal aromatik yang terbuat dari kelopak dan kuncup bunga mawar</div>', 20000, 15, '2023-06-12 22:18:33', '2023-06-12 22:18:33'),
(55, 'Espresso Lychee', 'post-images/oVJWCmRTYHpPAYyphygzxq7J1QNQbXSilYZEPkJt.jpg', '<div>Perpaduan kopi buah leci.</div>', 22000, 17, '2023-06-12 22:27:18', '2023-06-12 22:27:18'),
(56, 'Espresso Orange Rose', 'post-images/ofv5Gz8YUS0TWEfD3xjBSzEAWiWjyzEGFfaAmWPe.jpg', '<div>Perpaduan kopi dan jeruk.</div>', 22000, 17, '2023-06-12 22:28:29', '2023-06-12 22:28:29'),
(57, 'Greentea Vanila Cookies and Cream', 'post-images/9wdyCMbzBwJLv9LQ2kZhXHbqvnivuTmWf1UiGK0r.jpg', '<div>Perpaduan green tea, vanila, oreo dan es krim.</div>', 24000, 17, '2023-06-12 22:30:10', '2023-06-12 22:30:10'),
(58, 'Cappuchino', 'post-images/yR0MFtBVASKbxRH9HQZAX6jxF43lPSF1qJn7gQOg.jpg', '<div>Ya cappuchino.</div>', 19000, 17, '2023-06-12 22:30:41', '2023-06-12 22:30:41'),
(59, 'Hello Sunshine', 'post-images/FUSSJOwwvGoVUd6nqicdRMgUFjNvDkgfOq5jnkHh.jpg', '<div>Orange squash.</div>', 24000, 17, '2023-06-12 22:31:37', '2023-06-12 22:31:37'),
(60, 'Kalih Palm Sugar', 'post-images/5QD842gGPvGtzza0bBQcVfDj1EkcQiNeQOFElVLx.jpg', '<div>Kalih Palm Sugar enak.</div>', 19000, 17, '2023-06-12 22:33:02', '2023-06-12 22:33:02'),
(61, 'Pink Berry Rosepresso', 'post-images/j2r2aQIKHT0uH0hty5gK6flDBQF3MAZ8bBLQ6cWz.jpg', '<div>Perpaduan espresso dan strawberry.</div>', 24000, 17, '2023-06-12 22:35:01', '2023-06-12 22:35:01'),
(62, 'You Lookz Pretty', 'post-images/ZcYEzYOirR23qraP8J4oAiuGrZuRCyUVUlCY53kv.jpg', '<div>Strawberry Squash.</div>', 24000, 17, '2023-06-12 22:36:16', '2023-06-12 22:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ulasans`
--

CREATE TABLE `ulasans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` enum('1','2','3','4','5') NOT NULL,
  `ulasan` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cafe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ulasans`
--

INSERT INTO `ulasans` (`id`, `rating`, `ulasan`, `user_id`, `cafe_id`, `created_at`, `updated_at`) VALUES
(7, '3', 'Apaan Nih', 2, 9, '2023-06-09 03:08:23', '2023-06-09 03:08:23'),
(8, '5', 'cafe nya nyaman', 3, 11, '2023-06-09 21:30:32', '2023-06-09 21:30:32'),
(9, '5', 'Tempatnya nyaman dan luas', 2, 14, '2023-06-13 09:16:19', '2023-06-13 09:16:19'),
(10, '5', 'tempatnya nyaman, makanan dan minumannya juga sangat beragam dan enak.', 6, 17, '2023-06-18 20:25:53', '2023-06-18 20:25:53'),
(11, '4', 'Cafenya nyaman, makanan dan minumannya juga lumayan enak', 10, 17, '2023-06-18 20:26:36', '2023-06-18 20:26:36'),
(12, '5', 'Kopinya enak', 6, 16, '2023-06-18 20:27:58', '2023-06-18 20:27:58'),
(13, '4', 'tempatnya nyaman, makanannya lumayan enak', 12, 14, '2023-06-18 21:38:04', '2023-06-18 21:38:04'),
(14, '5', 'Tempatnya bagus dan nyaman', 13, 16, '2023-06-21 08:02:59', '2023-06-21 08:02:59'),
(15, '4', 'Menunya enak', 13, 11, '2023-06-22 00:20:57', '2023-06-22 00:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_telepon` varchar(35) NOT NULL,
  `is_admin` enum('admin','bukan_admin','admin_web') NOT NULL DEFAULT 'bukan_admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `no_telepon`, `is_admin`) VALUES
(1, 'Tani', 'tiani@gmail.com', NULL, '$2y$10$S9prZ0h597AFOem9uPh8ROzkF4mwyjre0NnLguRDS7GHYOV2qM9tq', NULL, '2023-06-08 21:04:19', '2023-06-08 21:04:19', '081234567890', 'bukan_admin'),
(2, 'Eri hidayat', 'erihidayat549@gmail.com', NULL, '$2y$10$pfzePFx2jNNEW8B8sP/tCOtXV1EiQjNk.ST6//dEJ.6Kwf1Zxzp2W', 'nY2sfFP8eJmjVSZXaWc9BgaIoJvgMTSWhBCyoGZtUu0GwROrnS2ToIvO6Jps', '2023-06-08 23:21:18', '2023-06-19 01:55:35', '085647715796', 'admin'),
(3, 'Aminatun Khoiriyyah', 'apk@gmail.com', NULL, '$2y$10$Ht5b10CWdVmtHFItkRzHF.I1Hjhh9A0WoGHwwhmnAL6Gl.rVd/OgS', NULL, '2023-06-09 21:28:43', '2023-06-09 21:28:43', '082223125118', 'bukan_admin'),
(4, 'Aminatun Khoiriyyah', 'amntnkhrryh@gmail.com', NULL, '$2y$10$m/2MEbnpm.yfyhwZ05Ix8OMQ20ja7lyhA8.94ohoEVxo68uZnEUE2', NULL, '2023-06-12 20:11:41', '2023-06-12 20:11:41', '082223125118', 'admin'),
(5, 'Athariq Byan', 'byan@gmail.com', NULL, '$2y$10$9eP50FMA.evNWDmZwv4CK.IH7LTvwwxb0fIzJaa7xBG6KfhryLDsK', 'KorGwqNYyyODPJEKP38OybTjHZ1oyp4BJApLWnh9vUdEC6H2CYg1urHkfDnZ', '2023-06-12 20:16:35', '2023-06-12 20:16:35', '087848359784', 'admin'),
(6, 'Bells', 'haha@gmail.com', NULL, '$2y$10$Y19WvN6xPmn.hB7Vi3DbCOTiFxnMigDOF3mCDqgXptHNVNLXwnTuG', NULL, '2023-06-12 20:51:38', '2023-06-12 20:51:38', '087352262732', 'admin'),
(7, 'amiaja', 'aku.user@gmail.com', NULL, '$2y$10$ZwuWprHUQiFA.xVfTXJwOe4W9GAteYb40aea4.QoAmUuxsNkBXWvC', NULL, '2023-06-12 21:45:36', '2023-06-12 21:45:36', '082223125118', 'admin'),
(8, 'Eri Hidayat', 'eri@gmail.com', NULL, '$2y$10$sAsYlEyNdG8IjeazoFUTe.IuDGcmNnZ4DhB7/QzML2uSsQfZsCSFy', 'CZEDxkKiKSeludjwLpCs8c8WR02Tt3ZORriZnYWw90TLJLOtIK1DQAtu7A67', '2023-06-12 21:48:02', '2023-06-12 21:48:02', '085647715796', 'admin'),
(9, 'Bebels', 'kiciw@gmail.com', NULL, '$2y$10$CYB41NvhJjWdcZG9zGhcK.4ZttCE1RXgJKg8tFUWyjlZRbK.NuHZq', NULL, '2023-06-12 22:03:55', '2023-06-12 22:03:55', '087653533255', 'admin'),
(10, 'reiju', 'ai@gmail.com', NULL, '$2y$10$xmvd8tMYh72B19DhzFuCqOEujIWhhxREfuCD1cOoV0UNJI.zTMinK', NULL, '2023-06-18 20:23:54', '2023-06-18 20:23:54', '082222222222', 'bukan_admin'),
(11, 'syeeta', 'syeeta@gmail.com', NULL, '$2y$10$TTjcyeD79pURbNOzmer1pelr/WL5fX.fKoYNvv2LQtZFLT6CqwSh6', NULL, '2023-06-18 21:30:35', '2023-06-18 22:21:19', '085566778899', 'admin'),
(12, 'byonce', 'is@gmail.com', NULL, '$2y$10$y3Q7CUWEr3CzPinWK.0Lq.RAIj9z85lFZgXGvK7tBFuaR1L.f2If.', NULL, '2023-06-18 21:37:03', '2023-06-18 21:41:38', '089999999999', 'bukan_admin'),
(13, 'Eri hidaya', 'erihidayat17@gmail.com', NULL, '$2y$10$kmrXAtJl.OkULI0nl1vo.O4PCZxE4E4uv2extzCmH76AB3BuDsMfK', 't52hwqeugsaynlf9ITX1ArsIsZVkvGKCKfTzSHZOdgLuQeoK4mOjP6mjtinn', '2023-06-21 07:49:19', '2023-06-21 07:49:19', '08567626615', 'bukan_admin'),
(14, 'erihidayat', 'erihidayat@gmail.com', NULL, '$2y$10$WU5C14DUb.oP/LXUul1JTO2ul//E9yd/K3QHoUenKNSEYMAIg8T.u', NULL, '2023-06-22 00:13:50', '2023-06-22 00:13:50', '08634782365', 'bukan_admin'),
(15, 'Eri hidayat', 'eri12@gmail.com', NULL, '$2y$10$b3ymYPL6d5HcMiQoH5gkmO7HQjOsu7E.HZTI67h9oaN0YaAxVfTt2', NULL, '2023-06-22 00:28:46', '2023-06-22 00:28:46', '087345376', 'bukan_admin'),
(16, 'wimas', 'wimas@yahoo.com', NULL, '$2y$10$.gJ64OZ0OO.VoJtv6MpoPuNwVqqQj0IqshaKjkcMkDGuwSXESu8DW', NULL, '2023-06-22 00:30:13', '2023-06-22 00:30:13', '08347567', 'bukan_admin'),
(17, 'Admin Cafe Journey', 'erihidayat18@gmail.com', NULL, '$2y$10$Z3Nu25rM.JWOjke1W023n.CJRfcTFNn.fbjsHbop1a/9PJgQYcVIS', NULL, '2023-06-24 05:08:39', '2023-06-24 05:08:39', '085647715796', 'admin_web');

-- --------------------------------------------------------

--
-- Table structure for table `vips`
--

CREATE TABLE `vips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tempat` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cafe_id` bigint(20) UNSIGNED NOT NULL,
  `fasilitas` set('ac','proyektor','tv','papan tulis','meja','kursi') NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vips`
--

INSERT INTO `vips` (`id`, `nama_tempat`, `gambar`, `deskripsi`, `kapasitas`, `created_at`, `updated_at`, `cafe_id`, `fasilitas`, `harga`) VALUES
(1, 'kelas 1', 'post-images/CQBW55czf71hbaGu37CD1zgb52PeiRxEOUgqU60Q.jpg', '<div>&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore quos assumenda, at necessitatibus quo molestias doloremque recusandae non odit nostrum repellat provident dolor magni! Explicabo dignissimos totam commodi ex odio.</div>', 10, NULL, '2023-05-29 08:35:19', 1, '', 50000),
(2, 'Kelas 2', 'post-images/4UojgqwymcW0laUUODhovKpAKoJ36rfcxCHPz2NB.jpg', '<div>bagus</div>', 8, '2023-05-27 06:35:08', '2023-05-31 19:19:01', 1, '', 20000),
(3, 'Kelas 1', 'post-images/6xB13kp6Dom0YBs3PhVOaoJcg6NIknACu13t3mzo.jpg', '<div>Tempat paling nyaman di cafe belikopi</div>', 8, '2023-06-09 04:11:08', '2023-06-09 04:11:08', 11, 'ac,meja,kursi', 50000),
(4, 'The Teras 1', 'post-images/1PRxq8blQCpxognPC32vLceGag2sdouDz0tUBslV.jpg', '<div>Tempat yang cocok bagi kamu yang pengin nongkrong bareng teman atau pacar</div>', 6, '2023-06-12 21:28:09', '2023-06-12 21:28:09', 13, 'meja,kursi', 100000),
(5, 'Ruang Indoor', 'post-images/cI0DIZ0Z32kU1FtcfT2wWewqq9Xa410if8VMVgJV.jpg', '<div>Ruangan di dalam dengan nuansa nyaman&nbsp;</div>', 10, '2023-06-12 21:28:45', '2023-06-12 21:33:13', 12, 'ac,meja,kursi', 180000),
(6, 'Super Cozy Indoor Area', 'post-images/K70PaZKppCuCGhCDqvHGkmE0xGtecVPWVXNMUlmo.jpg', '<div>Tempat yang cocok bagi kalian yang mau makan besar bareng keluarga</div>', 10, '2023-06-12 21:30:01', '2023-06-12 21:30:01', 13, 'ac,meja,kursi', 150000),
(7, 'Ruang Semi Indoor', 'post-images/uzcioE2qZbmAUiGQNeXcregJm62ouC6D7FAp5H1Y.jpg', '<div>Bentuk bangunannya dibuat terbuka dengan menggunakan atap. Terasa sejuk dengan angin yang sepoi sepoi</div>', 10, '2023-06-12 21:31:11', '2023-06-12 21:32:44', 12, 'meja,kursi', 160000),
(8, 'Ruang Outdoor', 'post-images/72ddXohthwbnMoism0oMXp7UZTUxFhfyqmQ5MfU1.jpg', '<div>Ruangan diluar tanpa atap</div>', 15, '2023-06-12 21:32:22', '2023-06-12 21:32:22', 12, 'meja,kursi', 150000),
(9, 'The Teras 2', 'post-images/lXWlUMxYHPP1p2D2J8on62BRc6CEkxgcMHzR0Bjk.jpg', '<div>Tempat yang cocok bagi kamu yang mau nongkrong maupun makan besar</div>', 6, '2023-06-12 21:32:24', '2023-06-12 21:32:24', 13, 'ac,meja,kursi', 150000),
(10, 'Indoor', 'post-images/ZkEBGdHiCP0RA24p04UZ5wRm7UKEPOKG767lkDRm.jpg', '<div>memiliki desain khas Bento Kopi yakni desain minimalis yang didominasi dengan kaca pada dindingnya, terdapat banyak tempat duduk dan meja yang ditata rapi.</div>', 20, '2023-06-12 21:46:21', '2023-06-12 21:46:21', 14, 'ac,meja', 200000),
(11, 'Semi Indoor', 'post-images/EqPoS7LPpcZDMFAhbI7n3S333d4kbfvtrb1NIM4m.jpg', '<div>Bentuk bangunannya dibuat terbuka menggunakan atap dan sejuk.</div>', 20, '2023-06-12 21:56:34', '2023-06-12 21:56:34', 14, 'meja', 170000),
(12, 'Tempat A', 'post-images/2wgHwRh62tx6IWoCDfwhPPOX9buUcrjH2rrKA5KD.jpg', '<div>Bisa untuk rapat kantor, makan besar dengan keluarga atau teman</div>', 8, '2023-06-12 22:16:35', '2023-06-12 22:16:35', 16, 'ac,proyektor,meja,kursi', 200000),
(13, 'Tempat B', 'post-images/MuBfSiuL7Yut4o32seVns6Ov7Y24Hg6ZuZ6U8XMZ.jpg', '<div>Cocok buat kamu yang butuh ketenangan</div>', 4, '2023-06-12 22:19:04', '2023-06-12 22:19:04', 16, 'ac,meja,kursi', 250000),
(14, 'Smooking Room', 'post-images/Y9aXOKdaTwFE06J6Js8vQo4LVtqVeBqp8y7jXtVn.jpg', '<div>Ruangan khusus merokok</div>', 7, '2023-06-12 22:35:04', '2023-06-12 22:35:04', 15, 'meja,kursi', 230000),
(15, 'Indoor Room', 'post-images/h374rxO1RzRVm85kW3qn8goKHNBYSMU8qem8XDQz.jpg', '<div>Ruangan yang nyaman&nbsp;</div>', 10, '2023-06-12 22:36:24', '2023-06-12 22:36:24', 15, 'ac,meja,kursi', 250000),
(16, 'Tempat Outdor', 'post-images/5WjpTnBZjkT482OSuGdWnbmVnZ9csTof4hqv9gCW.jpg', '<div>Tempatnya Nyaman</div>', 9, '2023-06-22 00:38:03', '2023-06-22 00:38:03', 19, 'ac,proyektor,tv,meja,kursi', 1500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `belis`
--
ALTER TABLE `belis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cafes`
--
ALTER TABLE `cafes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makanans`
--
ALTER TABLE `makanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minums`
--
ALTER TABLE `minums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ulasans`
--
ALTER TABLE `ulasans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vips`
--
ALTER TABLE `vips`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `belis`
--
ALTER TABLE `belis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cafes`
--
ALTER TABLE `cafes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `makanans`
--
ALTER TABLE `makanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `minums`
--
ALTER TABLE `minums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ulasans`
--
ALTER TABLE `ulasans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vips`
--
ALTER TABLE `vips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
