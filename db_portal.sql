-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 01:43 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_portal`
--
CREATE DATABASE IF NOT EXISTS `db_portal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_portal`;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `news_id` int(20) NOT NULL,
  `news_date_published` datetime NOT NULL,
  `news_date_created` datetime NOT NULL,
  `news_date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `news_title` varchar(255) NOT NULL,
  `news_slug` varchar(512) NOT NULL,
  `news_topic` varchar(512) NOT NULL,
  `news_summary` text NOT NULL,
  `news_content` text NOT NULL,
  `news_image_content` varchar(255) NOT NULL,
  `news_image_caption` varchar(512) NOT NULL,
  `news_status` enum('draft','published','deleted','edited') NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_date_published`, `news_date_created`, `news_date_modified`, `news_title`, `news_slug`, `news_topic`, `news_summary`, `news_content`, `news_image_content`, `news_image_caption`, `news_status`) VALUES
(1, '2018-10-16 00:00:00', '2018-10-15 00:00:00', '2018-10-14 23:27:02', 'Ini Dia Pilihan Game MOBA Terbaik Untuk Mengisi Waktu Luangmu!', 'ini-dia-pilihan-game-moba-terbaik-untuk-mengisi-waktu', 'Game,Gadget,Teknologi', 'Game MOBA saat ini memang lagi nge-trend banget, dari anak-anak sampai kelas pekerja sering dijumpai sibuk bermain game Multiplayer Online Battle Arena di smartphone-nya untuk mengisi waktu luang. Jenis game yang merupakan turunan dari genre strategy ini bahkan salah dua judulnya yaitu Arena of Valor dan League of Legends masuk ke dalam e-sports di Asian Games 2018 lalu.', 'Game MOBA saat ini memang lagi nge-trend banget, dari anak-anak sampai kelas pekerja sering dijumpai sibuk bermain game Multiplayer Online Battle Arena di smartphone-nya untuk mengisi waktu luang. Jenis game yang merupakan turunan dari genre strategy ini bahkan salah dua judulnya yaitu Arena of Valor dan League of Legends masuk ke dalam e-sports di Asian Games 2018 lalu.\r\nSelain Arena Of Valor, sebenarnya ada banyak game MOBA lain yang bisa kamu mainkan di smartphone android. Setiap judul punya keunikan masing-masing baik dari segi visual, karakter hero atau gaya permainan itu sendiri. Namun, beberapa game terasa agak berat dan lag ketika dimainkan sehingga tidak semua jenis tipe smartphone android cocok karena membutuhkan spesifikasi yang cukup mumpuni.\r\nKalau kamu ingin bisa memainkan game-game di bawah ini dengan lancar tanpa nge-lag atau berat, disarankan untuk menggunakan smartphone Honor 9i yang punya prosesor Octa-core terbaru dan sistem EMUI 8.0 sehingga dapat berlari cepat dan memungkinkan kamu menjalankan banyak aplikasi di saat yang bersamaan atau bermain game MOBA atau game lain yang berkinerja tinggi.  Honor 9i tersedia dalam dua versi kapasitas RAM yang bisa kamu pilih sesuai kebutuhan yaitu 3GB dan 4GB. Selain itu juga kapasitas baterai 3000 mAh pasti cukup banget buat nemenin main game di waktu luangmu tanpa harus bolak-balik nge-charge.\r\nJadi, game MOBA apa saja yang direkomendasikan untuk diunduh di smartphone Honor 9i kamu?\r\n1. HEROES EVOLVED\r\nDikembangkan oleh NetDragon Websoft dari Tiongkok, game MOBA ini punya lebih dari 50 karakter hero yang bisa kamu coba dan item-item untuk membangun build hero favorit kamu agar semakin kuat performanya. Heroes Evolved juga telah memiliki server di Asia Tenggara dengan jumlah pengunduh lebih dari 10,000,000.\r\n2. ONMYOJI ARENA\r\nGame MOBA satu ini tak kalah unik dan menarik karena menggunakan shikigami atau hantu-hantu dari Jepang sebagai karakter hero-nya. Untuk kamu yang suka banget sama anime atau manga pasti akan langsung jatuh cinta dengan game satu ini, setiap karakternya juga bisa berbicara bahasa Jepang sehingga nuansa ke-Jepang-annya kental sekali padahal aslinya game ini dibuat oleh NetEase Games dari Hong Kong.\r\n3. MOBILE LEGENDS : BANG BANG\r\nKalau yang satu ini sepertinya tidak perlu dijelaskan panjang lebar ya! Meskipun tampilan visualnya tidak seistimewa game MOBA lainnya, Mobile Legends justru menjadi game papan atas yang populer di Indonesia, apalagi dengan hadirnya karakter hero dari negara-negara Asia Tenggara seperti Lapu Lapu dari Filipina dan Gatotkaca dari Indonesia tentu semakin menarik hati pecinta game MOBA.\r\n4. VAINGLORY 5V5', 'image/moba.jpg', 'Game MOBA Pilihan', 'published'),
(2, '2018-10-16 00:00:00', '2018-10-15 00:00:00', '2018-10-14 23:27:02', 'Pesawat Cessna Jatuh di Jerman, 3 Orang Tewas', 'pesawat-cessna-jatuh-di-jerman,-3-orang-tewas', 'News,International,Jerman,Cessa', 'Sebuah pesawat Cessna dilaporkan mengalami kecelakaan dan menabrak kerumunan di sekitar daerah Rhoen, Hesse, Jerman, Minggu (14/10). Dilaporkan tiga orang tewas dalam kecelakaan yang terjadi pukul 15.45 waktu setempat. ', 'Sebuah pesawat Cessna dilaporkan mengalami kecelakaan dan menabrak kerumunan di sekitar daerah Rhoen, Hesse, Jerman, Minggu (14/10). Dilaporkan tiga orang tewas dalam kecelakaan yang terjadi pukul 15.45 waktu setempat. \r\nMelansir Reuters yang mengutip dari Bild, surat kabar setempat, beberapa orang lainnya mengalami luka-ringan. \r\n\r\nBerdasarkan laporan Osthessen News, media lokal setempat, pilot kehilangan kendali pesawat ketika hendak mendarat di Wasserkuppe. Pilot berusaha melakukan take off kembali tetapi pesawat Cessna yang dia kendalikan tidak kunjung menukik.\r\nAkhirnya, pesawat tersebut menabrak sebuah penghalang dan kerumunan orang yang berada di sekitar area pendaratan.', '', '', 'published'),
(3, '2018-10-15 00:00:00', '2018-10-15 01:32:58', '2018-10-14 18:32:58', 'KPK Gelar OTT di Dinas PUPR Kabupaten Bekasi', 'kpk-gelar-ott-di-dinas-pupr-kabupaten-bekasi', 'News,OTT,KPK,Korupsi', 'KPK melakukan operasi tangkap tangan (OTT) di Kabupaten Bekasi, Jawa Barat. Beberapa orang sudah ditangkap dalam peristiwa ini.', 'KPK melakukan operasi tangkap tangan (OTT) di Kabupaten Bekasi, Jawa Barat. Beberapa orang sudah ditangkap dalam peristiwa ini.\nOTT dilakukan KPK pada Minggu (14/10). Kantor Dinas Pekerjaan Umum dan Perumahan Rakyat (PUPR) Kabupaten Bekasi sudah disegel KPK.\nBerdasarkan data yang dihimpun kumparan, OTT tersebut diduga terkait suap fee proyek. Namun, dalam peristiwa ini, ada pejabat PUPR yang tak kooperatif.\nKPK meminta bantuan Polda Jabar untuk menangkap pejabat itu. \"Betul,\" ujar Direskrimum Polda Jabar Kombes Umar S Fana, dikonfirmasi kumparan, membenarkan adanya permintaan bantuan dari KPK, Senin (15/10).\nSayangnya, Umar tak mau merinci siapa pihak yang diburu itu, termasuk bagaimana kasusnya. Umar mempersilakan menanyakan kasus ini langsung ke KPK. \nAkan tetapi, hingga berita ini diturunkan, belum ada keterangan dari KPK. Pimpinan dan Juru bicara KPK Febri Diansyah tak merespons saat dikonfirmasi.', '', '', 'published'),
(4, '2018-10-15 00:00:00', '2018-10-15 01:34:44', '2018-10-14 18:34:44', 'Dramatis. Begitulah jalannya pertandingan saat Timnas Italia menang 1-0 atas Polandia pada partai UEFA Nations League di Silesian Stadium, Senin (15/10/2018) dini hari WIB. Dikatakan demikian karena Gli Azzurri baru mencetak satu-satunya gol via Cristiano', 'dramatis-begitulah-jalannya-pertandingan-saat-timnas-italia-menang-1-0-atas-polandia-pada-partai-uefa-nations-league-di-silesian-stadium-senin-15-10-2018-dini-hari-wib-dikatakan-demikian-karena-gli-azzurri-baru-mencetak-satu-satunya-gol-via-cristiano-biraghi-masa-injury-time-', 'Sepak Bola,Sports,Timnas Italia,Timnas Polandia,UEFA', 'Dramatis. Begitulah jalannya pertandingan saat Timnas Italia menang 1-0 atas Polandia pada partai UEFA Nations League di Silesian Stadium, Senin (15/10/2018) dini hari WIB. Dikatakan demikian karena Gli Azzurri baru mencetak satu-satunya gol via Cristiano Biraghi masa injury time.', 'Dramatis. Begitulah jalannya pertandingan saat Timnas Italia menang 1-0 atas Polandia pada partai UEFA Nations League di Silesian Stadium, Senin (15/10/2018) dini hari WIB. Dikatakan demikian karena Gli Azzurri baru mencetak satu-satunya gol via Cristiano Biraghi masa injury time.\nBerkat lesakan Biraghi, Italia berhak menduduki posisi kedua klasemen sementara Grup 3 Liga A dengan raihan 4 poin dari 3 pertandingan. Mereka tertinggal 2 angka dari sang pemuncak tabel, Portugal, yang baru melakoni 2 partai.', '', '', 'published'),
(5, '2018-10-15 00:00:00', '2018-10-15 01:35:57', '2018-10-14 18:35:57', 'Dramatis. Begitulah jalannya pertandingan saat Timnas Italia menang 1-0 atas Polandia pada partai UEFA Nations League di Silesian Stadium, Senin (15/10/2018) dini hari WIB. Dikatakan demikian karena Gli Azzurri baru mencetak satu-satunya gol via Cristiano', 'dramatis-begitulah-jalannya-pertandingan-saat-timnas-italia-menang-1-0-atas-polandia-pada-partai-uefa-nations-league-di-silesian-stadium-senin-15-10-2018-dini-hari-wib-dikatakan-demikian-karena-gli-azzurri-baru-mencetak-satu-satunya-gol-via-cristiano-biraghi-masa-injury-time-', 'Sepak Bola,Sports,Timnas Italia,Timnas Polandia,UEFA', 'Dramatis. Begitulah jalannya pertandingan saat Timnas Italia menang 1-0 atas Polandia pada partai UEFA Nations League di Silesian Stadium, Senin (15/10/2018) dini hari WIB. Dikatakan demikian karena Gli Azzurri baru mencetak satu-satunya gol via Cristiano Biraghi masa injury time.', 'Dramatis. Begitulah jalannya pertandingan saat Timnas Italia menang 1-0 atas Polandia pada partai UEFA Nations League di Silesian Stadium, Senin (15/10/2018) dini hari WIB. Dikatakan demikian karena Gli Azzurri baru mencetak satu-satunya gol via Cristiano Biraghi masa injury time.\nBerkat lesakan Biraghi, Italia berhak menduduki posisi kedua klasemen sementara Grup 3 Liga A dengan raihan 4 poin dari 3 pertandingan. Mereka tertinggal 2 angka dari sang pemuncak tabel, Portugal, yang baru melakoni 2 partai.', '', '', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `news_topic`
--

DROP TABLE IF EXISTS `news_topic`;
CREATE TABLE `news_topic` (
  `news_id` int(20) NOT NULL,
  `topic_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_topic`
--

INSERT INTO `news_topic` (`news_id`, `topic_id`) VALUES
(3, 8),
(3, 12),
(3, 13),
(3, 14),
(4, 2),
(4, 3),
(4, 15),
(4, 16),
(4, 17),
(5, 2),
(5, 3),
(5, 15),
(5, 16),
(5, 17),
(1, 5),
(1, 6),
(1, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE `topic` (
  `topic_id` int(4) NOT NULL,
  `topic_title` varchar(100) NOT NULL,
  `topic_slug` varchar(200) NOT NULL,
  `topic_count` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_title`, `topic_slug`, `topic_count`) VALUES
(1, 'Otomotif', 'otomotif', 1),
(2, 'Sepak Bola', 'sepak-bola', 4),
(3, 'Sports', 'sports', 4),
(5, 'Teknologi', 'teknologi', 1),
(6, 'Game', 'game', 1),
(7, 'Gadget', 'gadget', 1),
(8, 'News', 'news', 1),
(9, 'International', 'international', 1),
(10, 'Jerman', 'jerman', 1),
(11, 'Cessna', 'cessna', 1),
(12, 'OTT', 'ott', 1),
(13, 'KPK', 'kpk', 1),
(14, 'Korupsi', 'korupsi', 1),
(15, 'Timnas Italia', 'timnas-italia', 2),
(16, 'Timnas Polandia', 'timnas-polandia', 2),
(17, 'UEFA', 'uefa', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_topic`
--
ALTER TABLE `news_topic`
  ADD KEY `newskey` (`news_id`),
  ADD KEY `topickey` (`topic_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
