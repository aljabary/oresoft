-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Mar 2018 pada 14.12
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prox`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(255) NOT NULL,
  `title` text NOT NULL,
  `content` longtext NOT NULL,
  `dt` varchar(20) NOT NULL,
  `user` varchar(255) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `view` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `dt`, `user`, `headline`, `keyword`, `photo`, `status`, `view`) VALUES
(1, 'Haloo... Selamat Datang', '<h1 style="text-align: center;">Selamat Datang di Proxtrasoft</h1>\n<p style="text-align: center;">Saatnya menikamti kehebatan website anda dengan proxtrasoft, cepat, ringan, mudah dan banyak dukungan dari Developer Rockburst Digital</p>', '', '1', '', '', '23', 'on', 4),
(2, 'Selamat Datang', '<h1 style="text-align: center;">Selamat Datang di Proxtrasoft</h1>\n<p style="text-align: center;">Saatnya menikamti kehebatan website anda dengan proxtrasoft, cepat, ringan, mudah dan banyak dukungan dari Developer Rockburst Digital</p>', '', '1', '', '', '18', 'on', 1),
(6, 'Tidak ada koneksi Internet', '&amp;lt;div class=&amp;quot;row blog-content&amp;quot;&amp;gt;\n&amp;lt;div class=&amp;quot;col-xs-12&amp;quot;&amp;gt;\n&amp;lt;p&amp;gt;ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum et sem eu eros fringilla bibendum quis non quam. Nunc tempor sodales tempus. &amp;lt;br /&amp;gt;&amp;lt;br /&amp;gt;Integer scelerisque, eros interdum suscipit rhoncus, mauris felis eleifend libero, a adipiscing arcu sapien eu nisi. Proin vehicula lacus non lacus lobortis ultricies. Nulla dui metus, viverra in sodales a, rutrum sed metus. Cras blandit vehicula ligula et fringilla. Suspendisse convallis rutrum arcu nec rutrum. Pellentesque sed felis ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum et sem eu eros fringilla bibendum quis non quam. Nunc tempor sodales tempus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum et sem eu eros fringilla bibendum quis non quam. Nunc tempor sodales tempus.&amp;lt;/p&amp;gt;\n&amp;lt;br /&amp;gt;\n&amp;lt;div class=&amp;quot;well well-lg font-sm text-center&amp;quot;&amp;gt;&amp;quot;Nulla dui metus, viverra in sodales a, rutrum sed metus. Cras blandit vehicula ligula et fringilla.&amp;quot;&amp;lt;/div&amp;gt;\n&amp;lt;br /&amp;gt;\n&amp;lt;p&amp;gt;Integer scelerisque, eros interdum suscipit rhoncus, mauris felis eleifend libero, a adipiscing arcu sapien eu nisi. Proin vehicula lacus non lacus lobortis ultricies. Nulla dui metus, viverra in sodales a, rutrum sed metus. Cras blandit vehicula ligula et fringilla. Suspendisse convallis rutrum arcu nec rutrum. Pellentesque sed felis ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum et sem eu eros fringilla bibendum quis non quam. Nunc tempor sodales tempus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum et sem eu eros fringilla bibendum quis non quam. Nunc tempor sodales tempus.&amp;lt;/p&amp;gt;\n&amp;lt;/div&amp;gt;\n&amp;lt;/div&amp;gt;', '2017-02-12 13:43:30', '1', '', '', '19', 'on', 5),
(7, 'Tidak ada koneksi Internets 2', '<div class="row blog-content">\n<div class="col-xs-12">\n<p>ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum et sem eu eros fringilla bibendum quis non quam. Nunc tempor sodales tempus. <br /><br />Integer scelerisque, eros interdum suscipit rhoncus, mauris felis eleifend libero, a adipiscing arcu sapien eu nisi. Proin vehicula lacus non lacus lobortis ultricies. Nulla dui metus, viverra in sodales a, rutrum sed metus. Cras blandit vehicula ligula et fringilla. Suspendisse convallis rutrum arcu nec rutrum. Pellentesque sed felis ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum et sem eu eros fringilla bibendum quis non quam. Nunc tempor sodales tempus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum et sem eu eros fringilla bibendum quis non quam. Nunc tempor sodales tempus.</p>\n<br />\n<div class="well well-lg font-sm text-center">"Nulla dui metus, viverra in sodales a, rutrum sed metus. Cras blandit vehicula ligula et fringilla."</div>\n<br />\n<p>Integer scelerisque, eros interdum suscipit rhoncus, mauris felis eleifend libero, a adipiscing arcu sapien eu nisi. Proin vehicula lacus non lacus lobortis ultricies. Nulla dui metus, viverra in sodales a, rutrum sed metus. Cras blandit vehicula ligula et fringilla. Suspendisse convallis rutrum arcu nec rutrum. Pellentesque sed felis ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum et sem eu eros fringilla bibendum quis non quam. Nunc tempor sodales tempus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum et sem eu eros fringilla bibendum quis non quam. Nunc tempor sodales tempus.</p>\n</div>\n</div>', '2017-02-12 13:45:02', '1', '', 'kata,kunci', '24', 'on', 36),
(8, 'Proxtrasoft Aman !!!', '<p>Protrasoft dirancang dengan sistem keamanan terintregasi, anda tidak perlu khawatir website anda diretas, Proxtrasoft mengamankan semuanya. Anda juga akan tetap nyaman menggunakan berbagai aplikasi dukungan dari pihak ke tiga tanpa khawatir pencurian data ataupun penyusupan mallware, anda memiliki kendali penuh mengamankan website anda dengan sistem perizinan akses dari setiap aplikasi.</p>\r\n<p>Aplikasi yang akan anda install akan memberi tahukan bahwa mereka memerlukan izin akses ke beberapa sistem website, jika anda percaya dengan pengembang aplikasi tersebut silahkan izinkan dan install jika tidak maka batalkan installasi.</p>', '2017-02-13 06:04:43', '1', 'Website aman dengan Proxtrasoft', 'buat,website,aman', '25', 'on', 13),
(9, 'Tes Artikel baru', '<p>Bebaskan sdiri smfm,a smf as, fdm,aeduad as dasfas fasdkf sa fa,ms fas jksd</p>', '2017-02-20 17:13:16', '1', 'apa apa', '', '26', 'on', 76),
(10, 'Apa kabar semua ?', '<p>Mari biasakan hidup sehat</p>', '2017-02-21 05:59:27', '1', '', '', '20', 'on', 44);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(2) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `keyword` text NOT NULL,
  `parent` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `keyword`, `parent`) VALUES
(1, 'News', 'Baca berita terbaru', '', 2),
(2, 'Olahraga', 'Artikel tentang olahraga', 'baca,artikel,tentang,olah,raga', 0),
(3, 'Bola', 'Olahraga Sepak Bola', 'Olahraga,sepak,bola', 2),
(4, 'Tekno', 'berita teknos', 'berta,tekno', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_article`
--

CREATE TABLE `category_article` (
  `category` varchar(255) NOT NULL,
  `article` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `category_article`
--

INSERT INTO `category_article` (`category`, `article`) VALUES
('', '7'),
('', '6'),
('3', '7'),
('1', '7'),
('3', '6'),
('2', '10'),
('3', '10'),
('1', '2'),
('1', '8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(255) NOT NULL,
  `user` int(255) NOT NULL,
  `content` text NOT NULL,
  `status` int(1) NOT NULL,
  `obj` int(25) NOT NULL,
  `otype` varchar(15) NOT NULL,
  `dt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`comment_id`, `user`, `content`, `status`, `obj`, `otype`, `dt`) VALUES
(1, 1, 'tes', 0, 9, 'article', '2017-09-24 07:49:23'),
(4, 3, 'te tes teas', 0, 9, 'article', '2017-09-24 08:47:27'),
(5, 1, 'kita coba', 0, 9, 'article', '2017-09-24 15:04:54'),
(6, 1, 'bagus', 0, 9, 'article', '2017-09-24 15:07:51'),
(7, 4, 'Baguslah', 0, 9, 'article', '2017-09-29 08:16:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE `media` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `source` text NOT NULL,
  `dt` varchar(20) NOT NULL,
  `tp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `media`
--

INSERT INTO `media` (`id`, `title`, `source`, `dt`, `tp`) VALUES
(1, '', 'http://localhost/proxtrasoft/media_pref/video/148705545502-14Facebook_9.MP4', '2017-02-14 07:57:35', 'video'),
(13, '', 'http://localhost/proxtrasoft/media_pref/photo/148705784602-14anis_.jpg', '2017-02-14 08:37:26', 'photo'),
(18, 'Syariah 212', 'http://localhost/proxtrasoft/media_pref/photo/148707664502-14channel-212_.jpeg', '2017-02-14 13:50:45', 'photo'),
(19, 'bendera', 'http://localhost/proxtrasoft/media_pref/photo/148707678302-14cyber-army_.jpg', '2017-02-14 13:53:03', 'photo'),
(20, 'terkejut', 'http://localhost/proxtrasoft/media_pref/photo/148707685602-14blog-1259_.jpg', '2017-02-14 13:54:16', 'photo'),
(21, 'new file', 'http://localhost/proxtrasoft/media_pref/file/148709683402-14frame.html', '2017-02-14 19:27:14', 'document'),
(22, 'file html', 'http://localhost/proxtrasoft/media_pref/file/148713911602-15saved_resource.html', '2017-02-15 07:11:56', 'document'),
(23, 'Indra Sjafri', 'http://localhost/proxtrasoft/media_pref/photo/148714532702-15is_.jpg', '2017-02-15 08:55:27', 'photo'),
(24, 'App Store', 'http://localhost/proxtrasoft/media_pref/photo/148714544802-15Appstore_.jpg', '2017-02-15 08:57:28', 'photo'),
(25, 'Demo', 'http://localhost/proxtrasoft/media_pref/photo/148714559102-15fpi_.jpg', '2017-02-15 08:59:51', 'photo'),
(26, 'Rumah upin ipin', 'http://localhost/proxtrasoft/media_pref/photo/148714563002-15ipin1_.jpg', '2017-02-15 09:00:30', 'photo'),
(27, 'Setan', 'http://localhost/proxtrasoft/media_pref/video/148714613802-15Facebook_2.MP4', '2017-02-15 09:08:58', 'video'),
(28, 'ruqyah', 'http://localhost/proxtrasoft/media_pref/video/148714620202-15ruqyah-musik.MP4', '2017-02-15 09:10:02', 'video'),
(29, 'Kuntil anak', 'http://localhost/proxtrasoft/media_pref/video/148714633702-15Facebook_2.MP4', '2017-02-15 09:12:17', 'video'),
(30, 'Kuntil anak', 'http://localhost/proxtrasoft/media_pref/video/148714639102-15Facebook_2.MP4', '2017-02-15 09:13:11', 'video'),
(31, 'Essien', 'http://localhost/proxtrasoft/media_pref/photo/150553400509-163-1_.jpg', '2017-09-16 05:53:25', 'photo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(25) NOT NULL,
  `tp` varchar(25) NOT NULL,
  `status` varchar(5) NOT NULL,
  `messenger_id` varchar(225) NOT NULL,
  `email` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `message`
--

INSERT INTO `message` (`id`, `user`, `title`, `content`, `date`, `tp`, `status`, `messenger_id`, `email`) VALUES
(27, 'aimun@mail.com', 'Aimun | bsiadas dsad', 'aras dsakdjajs fkashfkahfkjasfd', '2017-09-17 09:45:03', 'contact', 'on', '8', 'aimun@mail.com'),
(28, '1', 'Sukro | OKELAH', 'tes saja ini pesang', '2017-09-17 10:08:04', 'contact', 'on', '8', 'sukro@mail.com'),
(29, 'sokon@mail.com', 'Sokon | bisa jadi', 'aras dsakdjajs fkashfkahfkjasfd', '2017-09-17 10:09:47', 'contact', 'on', '9', 'sokon@mail.com'),
(30, 'patuha@mail.com', 'Patuha | sama saja', 'aras dsakdjajs fkashfkahfkjasfd', '2017-09-17 10:11:05', 'contact', 'on', '10', 'patuha@mail.com'),
(31, 'fano@mail.com', 'Fano | pesan dari fano', 'aras dsakdjajs fkashfkahfkjasfd', '2017-09-17 10:34:44', 'contact', 'on', '11', 'fano@mail.com'),
(42, '1', '', 'tersas', '2017-09-17 14:22:08', 'contact', 'on', '', ''),
(43, '1', '', 'blasas', '2017-09-17 14:22:46', 'contact', 'on', '8', ''),
(44, '1', '', 'iya ?', '2017-09-17 14:51:40', 'contact', 'on', '11', ''),
(45, '1', '', 'iya ?', '2017-09-17 14:52:11', 'contact', 'on', '11', ''),
(46, '1', '', 'coba lagi', '2017-09-17 14:58:35', 'contact', 'on', '11', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `messenger`
--

CREATE TABLE `messenger` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `messenger`
--

INSERT INTO `messenger` (`id`, `user`) VALUES
(8, 'aimun@mail.com'),
(9, 'sokon@mail.com'),
(10, 'patuha@mail.com'),
(11, 'fano@mail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `messenger_group`
--

CREATE TABLE `messenger_group` (
  `messenger_id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `messenger_group`
--

INSERT INTO `messenger_group` (`messenger_id`, `user`) VALUES
('8', 'aimun@mail.com'),
('9', '1'),
('9', 'sokon@mail.com'),
('10', '1'),
('10', 'patuha@mail.com'),
('11', '1'),
('11', 'fano@mail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `messenger_user`
--

CREATE TABLE `messenger_user` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `messenger` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `messenger_user`
--

INSERT INTO `messenger_user` (`id`, `user`, `status`, `messenger`, `message`) VALUES
(17, '1', '0', '8', '27'),
(18, 'aimun@mail.com', '0', '8', '27'),
(19, '1', '0', '8', '28'),
(20, 'aimun@mail.com', '0', '8', '28'),
(21, '1', '0', '9', '29'),
(22, 'sokon@mail.com', '1', '9', '29'),
(23, '1', '0', '10', '30'),
(24, 'patuha@mail.com', '1', '10', '30'),
(25, '1', '0', '11', '31'),
(26, 'fano@mail.com', '0', '11', '31'),
(27, '1', '1', '8', '43'),
(28, 'aimun@mail.com', '1', '8', '43'),
(29, '1', '0', '11', '44'),
(30, 'fano@mail.com', '0', '11', '44'),
(32, 'fano@mail.com', '0', '11', '45'),
(33, 'fano@mail.com', '1', '11', '46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(255) NOT NULL,
  `fromuser` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `title` varchar(25) NOT NULL,
  `content` varchar(65) NOT NULL,
  `urlresult` text NOT NULL,
  `status` int(1) NOT NULL,
  `dt` varchar(20) NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `notification`
--

INSERT INTO `notification` (`notification_id`, `fromuser`, `user_id`, `title`, `content`, `urlresult`, `status`, `dt`, `icon`) VALUES
(2, '1', '1', 'Ibnu Nugraha mengomentari', 'Ibnu Nugraha mengomentari Artikel anda \\"Tes Artikel baru\\"', 'http://localhost/proxtrasoft/read/9/Tes-Artikel-baru', 0, '2017-09-24 15:07:51', 'http://localhost/proxtrasoft/media_pref/photo/148707685602-14blog-1259thumb_75.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `page`
--

CREATE TABLE `page` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `view` int(11) NOT NULL,
  `dt` varchar(20) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `page`
--

INSERT INTO `page` (`id`, `name`, `type`, `view`, `dt`, `category`, `status`, `keyword`, `description`, `user`, `content`, `slug`, `parent`) VALUES
(2, 'News', 'dinamic', 2147483647, '2017-02-19 07:35:41', '1', 'on', '', '', '1', '<h1>H1 Header</h1>\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh.</p>\n<h2>H2 Header</h2>\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh.</p>\n<h3>H3 Header</h3>', 'news', 0),
(3, 'Sport', 'dinamic', 0, '2017-02-19 07:41:25', '2', 'on', 'Halaman,Olahraga,Bola', 'Halaman Olah raga', '1', '<p>tes aja</p>', 'sport', 0),
(4, 'Tekno', 'dinamic', 22, '2017-02-19 07:41:45', '1', 'on', '', '', '1', '', 'tekno', 3),
(6, 'Barux', 'static', 5, '2017-02-21 06:13:23', '1', 'on', '', '', '1', '<p>tes aja</p>', 'baru', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission`
--

CREATE TABLE `permission` (
  `plugins` varchar(255) NOT NULL,
  `permission` varchar(50) NOT NULL,
  `val` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `permission`
--

INSERT INTO `permission` (`plugins`, `permission`, `val`) VALUES
('LiteCat', 'CATEGORY', 'true'),
('BlogBooster', 'ARTICLE', 'true'),
('BlogBooster', 'CATEGORY.READ', 'true'),
('LiteMedia', 'MEDIA', 'true'),
('LiteTheme', 'ARTICLE.READ', 'true'),
('LiteTheme', 'CATEGORY.READ', 'true'),
('LitePageManager', 'PAGE', 'true'),
('LitePageManager', 'CATEGORY.READ', 'true'),
('LiteTheme', 'PAGE', 'true'),
('LiteAnalityc', 'ANALITYC', 'true'),
('LiteTheme', 'MESSAGE', 'true'),
('LiteMessage', 'MESSAGE', 'true'),
('LiteMessage', 'USER.READ', 'true'),
('LiteTheme', 'COMMENT', 'true'),
('LiteTheme', 'USER', 'true'),
('LiteTheme', 'ADMINISTRATOR', 'true'),
('LiteTheme', 'NOTIFICATION', 'true'),
('LiteNotif', 'NOTIFICATION', 'true'),
('LiteNotif', 'USER.READ', 'true'),
('User_Management', 'USER', 'true');

-- --------------------------------------------------------

--
-- Struktur dari tabel `plugins`
--

CREATE TABLE `plugins` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `p_type` varchar(120) NOT NULL,
  `base_class` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `version` varchar(6) NOT NULL,
  `signature` text NOT NULL,
  `key_product` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `plugins`
--

INSERT INTO `plugins` (`id`, `name`, `p_type`, `base_class`, `status`, `version`, `signature`, `key_product`) VALUES
(1, 'Blog Booster', 'tools', 'BlogBooster', 1, '1.0.0', '', ''),
(2, 'LiteCat', 'tools', 'LiteCat', 1, '1.0.0', 'DTkFZQduVTdSeFo1UDAAKQdjUmYHeF1kBWECelAzATwHLANiVzc=', ''),
(3, 'Lite Media', 'tools', 'LiteMedia', 1, '1.0.0', '', ''),
(4, 'Lite Theme', 'theme', 'LiteTheme', 1, '1.0.0', '', ''),
(5, 'Lite Page Manager', 'tools', 'LitePageManager', 1, '1.0.0', '', ''),
(6, 'Lite Analitycs', 'tools', 'LiteAnalityc', 1, '1.0.0', '', ''),
(8, 'Lite Message', 'tools', 'LiteMessage', 1, '1.0.0', 'VWFUNFI7VDYFLwtkVDVWfwNmUmcNcgoyUToBeVYzBzgELwFlUjk=', ''),
(9, 'Lite Notif', 'tools', 'LiteNotif', 1, '1.0.0', 'ATUDYwduAGJRe18wA2hTegBmVWEAfwozVz1QKABjAzsBKlMwBW0=', ''),
(10, 'User Management', 'tools', 'User_Management', 1, '1.1.0', 'BjJSMlM6BmRWfABuAGIHLls/VmwEe1pjUzZSKgJkBT4HLAJnBGg=', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `plugins_hook`
--

CREATE TABLE `plugins_hook` (
  `id` int(255) NOT NULL,
  `base_class` varchar(200) NOT NULL,
  `template` varchar(200) NOT NULL,
  `hook` varchar(120) NOT NULL,
  `ix` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `plugins_hook`
--

INSERT INTO `plugins_hook` (`id`, `base_class`, `template`, `hook`, `ix`) VALUES
(1, 'BlogBooster', 'Editor', 'backend_12', 1),
(2, 'BlogBooster', 'Admin_Menu', 'Admin_Menu', 0),
(3, 'LiteCat', 'Admin_Menu', 'Admin_Menu', 0),
(4, 'LiteCat', 'Editor', 'backend_12', 1),
(5, 'LiteCat', 'meta_css', 'Header_Meta', 0),
(6, 'BlogBooster', 'meta_css', 'Header_Meta', 0),
(7, 'BlogBooster', 'meta_css', 'Footer_Script', 0),
(8, 'LiteCat', 'meta_css', 'Blog_Booster', 0),
(9, 'LiteMedia', 'menu', 'Admin_menu', 0),
(10, 'LiteMedia', 'galery', 'backend_12', 0),
(11, 'LiteMedia', 'script', 'Footer_Script', 0),
(12, 'LiteMedia', 'style', 'Header_Meta', 0),
(13, 'LiteTheme', 'setting', 'backend_12', 0),
(14, 'LitePageManager', 'Editor', 'backend_12', 0),
(15, 'LitePageManager', 'menu', 'Admin_Menu', 0),
(16, 'LitePageManager', 'script', 'Header_Meta', 0),
(17, 'LitePageManager', 'script', 'Footer_Script', 0),
(18, 'LiteAnalityc', 'vchart', 'backend_12', 0),
(20, 'LiteAnalityc', 'menu', 'Admin_Menu', 0),
(21, 'LiteAnalityc', 'analityc', 'backend_12', 0),
(24, 'LiteMessage', 'inbox', 'backend_12', 0),
(27, 'LiteMessage', 'menuicon', 'Admin_Headericon', 0),
(28, 'LiteTheme', 'Admin_Menu', 'Admin_Menu', 0),
(29, 'LiteNotif', 'notiflist', 'backend_6a', 0),
(32, 'LiteNotif', 'menuicon', 'Admin_Headericon', 0),
(33, 'User_Management', 'user_list', 'backend_12', 0),
(34, 'User_Management', 'user_add', 'backend_12', 0),
(37, 'User_Management', 'Admin_Menu', 'Admin_Menu', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pxsession`
--

CREATE TABLE `pxsession` (
  `id` bigint(255) NOT NULL,
  `device` varchar(255) NOT NULL,
  `date` varchar(20) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pxsession`
--

INSERT INTO `pxsession` (`id`, `device`, `date`, `user`) VALUES
(1, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-02-23 07:51:25', ''),
(2, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-02-23 07:51:25', ''),
(3, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-02-23 07:51:31', ''),
(4, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-02-23 07:51:32', ''),
(5, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-02-23 07:52:30', ''),
(6, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-02-23 07:52:30', ''),
(7, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-02-23 07:54:35', ''),
(8, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-02-23 07:56:03', ''),
(9, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-02-23 07:56:04', ''),
(10, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-02-23 08:01:13', ''),
(11, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-02-23 08:01:13', ''),
(12, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-02-23 08:01:17', ''),
(13, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-02-23 08:01:18', ''),
(14, 'iPhone13B143MobileiOS9_1Safari9.0', '2017-02-23 09:18:33', ''),
(15, 'iPhone13B143MobileiOS9_1Safari9.0', '2017-02-23 10:30:23', ''),
(16, 'iPhone13B143MobileiOS9_1Safari9.0', '2017-02-23 10:30:32', ''),
(17, 'iPhone13B143MobileiOS9_1Safari9.0', '2017-02-23 10:31:09', ''),
(18, 'iPhone13B143MobileiOS9_1Safari9.0', '2017-02-23 10:32:21', ''),
(19, 'iPhone13B143MobileiOS9_1Safari9.0', '2017-02-23 10:32:54', ''),
(20, 'iPhone13B143MobileiOS9_1Safari9.0', '2017-02-23 10:44:01', ''),
(21, 'Desktopwindows8Google Chrome50.0.2632.0', '2017-02-23 10:44:49', ''),
(22, 'Desktopwindows8Google Chrome50.0.2632.0', '2017-02-23 10:44:59', ''),
(23, 'Desktopwindows8Mozilla Firefox10.0.2', '2017-02-23 10:45:43', ''),
(24, 'Desktopwindows8Mozilla Firefox10.0.2', '2017-02-23 10:46:08', ''),
(25, 'Desktopwindows8Mozilla Firefox10.0.2', '2017-02-23 10:48:40', ''),
(26, 'Desktopwindows8Mozilla Firefox10.0.2', '2017-02-23 10:48:45', ''),
(27, 'Desktopwindows8Mozilla Firefox10.0.2', '2017-02-23 10:49:42', ''),
(28, 'Desktopwindows8Mozilla Firefox10.0.2', '2017-02-23 10:51:02', ''),
(29, 'Desktopwindows8Mozilla Firefox10.0.2', '2017-02-23 10:53:22', ''),
(30, 'Desktopwindows8Mozilla Firefox10.0.2', '2017-02-23 10:53:47', ''),
(31, 'Desktopwindows8Mozilla Firefox10.0.2', '2017-02-23 10:54:53', ''),
(32, 'Desktopwindows8Mozilla Firefox10.0.2', '2017-02-23 10:55:41', ''),
(33, 'Desktopwindows8Mozilla Firefox10.0.2', '2017-02-23 10:55:49', ''),
(34, 'Desktopwindows8Mozilla Firefox10.0.2', '2017-02-23 10:58:56', ''),
(35, 'iPhone13B143MobileiOS9_1Safari9.0', '2017-02-23 11:03:26', ''),
(36, 'NexusMobileAndroidOS6.0Chrome48.0.2564.23', '2017-02-24 07:15:07', ''),
(37, 'iPad13B143TabletiOS9_1Safari9.0', '2017-02-24 11:57:16', ''),
(38, 'iPad13B143TabletiOS9_1Safari9.0', '2017-02-24 13:49:55', ''),
(39, 'iPad13B143TabletiOS9_1Safari9.0', '2017-02-24 16:00:28', ''),
(40, 'iPad13B143TabletiOS9_1Safari9.0', '2017-02-24 18:05:07', ''),
(41, 'NexusMobileAndroidOS6.0Chrome48.0.2564.23', '2017-02-25 05:14:24', ''),
(42, 'NexusMobileAndroidOS6.0Chrome48.0.2564.23', '2017-02-25 06:34:39', ''),
(43, 'SamsungMobileAndroidOS5.0Chrome48.0.2564.23', '2017-03-04 08:47:34', ''),
(44, 'Desktopwindows8Google Chrome50.0.2632.0', '2017-03-19 09:35:13', ''),
(45, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-03-29 17:21:26', ''),
(46, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-03-30 11:02:10', ''),
(47, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-03-31 10:57:42', ''),
(48, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-04-01 11:29:03', '1'),
(49, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-04-03 09:20:40', '1'),
(50, 'Desktopwindows8Google Chrome56.0.2924.87', '2017-04-03 13:41:00', '1'),
(51, 'Desktopwindows8Google Chrome57.0.2987.133', '2017-04-23 13:14:29', ''),
(52, 'Desktopwindows8Google Chrome57.0.2987.133', '2017-04-24 06:48:24', ''),
(53, 'Desktopwindows8Google Chrome57.0.2987.133', '2017-04-24 06:48:25', ''),
(54, 'Desktopwindows8Google Chrome57.0.2987.133', '2017-04-24 06:48:26', ''),
(55, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-14 10:49:05', ''),
(56, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-14 12:18:27', '1'),
(57, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-14 13:50:54', '1'),
(58, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-16 05:36:33', ''),
(59, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-16 06:36:35', '1'),
(60, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-16 10:11:42', '1'),
(61, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-16 11:18:23', '1'),
(62, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-17 06:42:40', '1'),
(63, 'Desktopwindows8Google Chrome50.0.2632.0', '2017-09-17 07:10:19', ''),
(64, 'Desktopwindows8Google Chrome50.0.2632.0', '2017-09-17 09:41:10', ''),
(65, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-17 10:08:00', '1'),
(66, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-21 08:33:21', ''),
(67, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-21 12:23:47', '1'),
(68, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-21 15:36:08', '1'),
(69, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-23 05:55:28', '1'),
(70, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-24 04:40:52', '1'),
(71, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-24 05:45:16', '1'),
(72, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-24 06:45:27', '1'),
(73, 'Desktopwindows8Google Chrome50.0.2632.0', '2017-09-24 07:14:58', ''),
(74, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-24 07:48:45', '1'),
(75, 'Desktopwindows8Google Chrome50.0.2632.0', '2017-09-24 08:38:47', ''),
(76, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-24 09:17:06', '1'),
(77, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-24 14:18:14', '1'),
(78, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-29 08:11:38', ''),
(79, 'Desktopwindows8Google Chrome50.0.2632.0', '2017-09-29 08:15:35', ''),
(80, 'Desktopwindows8Google Chrome50.0.2632.0', '2017-09-29 10:58:05', ''),
(81, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-29 11:25:04', '1'),
(82, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-09-30 05:53:28', ''),
(83, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-10-01 05:50:46', '1'),
(84, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-10-01 09:38:23', '1'),
(85, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-10-01 16:27:44', ''),
(86, 'Desktopwindows8Google Chrome60.0.3112.113', '2017-10-07 05:20:29', ''),
(87, 'Desktopwindows8Google Chrome62.0.3202.94', '2017-11-19 06:55:42', ''),
(88, 'Desktopwindows8Google Chrome63.0.3239.84', '2017-12-25 06:41:22', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `plugins` varchar(255) NOT NULL,
  `xclass` varchar(255) NOT NULL,
  `param` varchar(255) NOT NULL,
  `val` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`plugins`, `xclass`, `param`, `val`) VALUES
('LiteTheme', 'color', 'header', 'green'),
('LiteTheme', 'color', 'button', 'green'),
('LiteTheme', 'color', 'footer', 'blue'),
('LiteTheme', 'color', 'label', 'twitter'),
('LiteTheme', 'color', 'linknav', 'blue'),
('LiteTheme', 'social', 'facebook', ''),
('LiteTheme', 'social', 'twitter', ''),
('LiteTheme', 'social', 'googlplus', ''),
('LiteTheme', 'logo', '_h', '45'),
('LiteTheme', 'logo', '_m', '-5'),
('LiteTheme', 'logo', '_w', '45'),
('LiteMessage', 'syncron', 'ajax', 'false'),
('LiteTheme', 'comment', 'mod', 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `site`
--

CREATE TABLE `site` (
  `name` varchar(120) NOT NULL,
  `logo` text NOT NULL,
  `icon` text NOT NULL,
  `about` longtext NOT NULL,
  `contact` longtext NOT NULL,
  `lang` varchar(6) NOT NULL,
  `headline` varchar(250) NOT NULL,
  `theme` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `site`
--

INSERT INTO `site` (`name`, `logo`, `icon`, `about`, `contact`, `lang`, `headline`, `theme`) VALUES
('Proxtrasoft', 'http://localhost/proxtrasoft/media_pref/photo/logo.png', 'http://localhost/proxtrasoft/media_pref/photo/logo.png', '', '', 'id-id', 'Website Express', 'LiteTheme');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `name` varchar(255) NOT NULL,
  `article` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`name`, `article`) VALUES
('', '6'),
('satu', '7'),
('dua', '7'),
('tida', '7'),
('satu', '2'),
('satu', '9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `admin` int(11) NOT NULL,
  `password` text NOT NULL,
  `photo` text NOT NULL,
  `dt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `admin`, `password`, `photo`, `dt`) VALUES
(1, 'Ibnu Nugraha', 'nugrahaberbakti@gmail.com', 3, 'VGsFYVFgUGAKaghj', 'http://localhost/proxtrasoft/media_pref/photo/logo.png', ''),
(3, 'Miko', 'miko@mail.com', 0, '', 'http://localhost/proxtrasoft/media_pref/photo/logo.png', '20'),
(4, 'Tono', 'tono@gmail.com', 0, '', 'http://localhost/proxtrasoft/media_pref/photo/logo.png', '2017-09-29 08:16:00'),
(14, 'Jono', 'jono@mail.com', 0, 'UW4GYlVkBTULawph', 'http://localhost/proxtrasoft/media_pref/photo/logo.png', '2017-10-08 12:25:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_group`
--

CREATE TABLE `user_group` (
  `group_id` int(255) NOT NULL,
  `name` varchar(120) NOT NULL,
  `dt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_group`
--

INSERT INTO `user_group` (`group_id`, `name`, `dt`) VALUES
(1, 'Master', '2017-11-19'),
(2, 'Administrator', '2017-11-19'),
(3, 'Editor', '2017-11-19'),
(4, 'Standart User', '2017-11-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_group_member`
--

CREATE TABLE `user_group_member` (
  `user_id` varchar(255) NOT NULL,
  `group_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_group_permission`
--

CREATE TABLE `user_group_permission` (
  `group_id` int(255) NOT NULL,
  `plugins` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor`
--

CREATE TABLE `visitor` (
  `id` bigint(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `device` varchar(100) NOT NULL,
  `devicetype` varchar(20) NOT NULL,
  `devicename` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `osv` varchar(20) NOT NULL,
  `devicev` varchar(20) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `browserv` varchar(20) NOT NULL,
  `page` varchar(255) NOT NULL,
  `pagetype` varchar(25) NOT NULL,
  `pxsession` varchar(255) NOT NULL,
  `counter` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `visitor`
--

INSERT INTO `visitor` (`id`, `date`, `device`, `devicetype`, `devicename`, `os`, `osv`, `devicev`, `browser`, `browserv`, `page`, `pagetype`, `pxsession`, `counter`) VALUES
(2, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Home', '13', 45),
(4, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'NotFound1', '13', 5),
(5, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'NotFound', '13', 24),
(6, '2017-02-23', 'iPhone', 'Mobile', 'iPhone', 'iOS', '9_1', '13B143', 'Safari', '9.0', '', 'Home', '14', 1),
(7, '2017-02-23', 'iPhone', 'Mobile', 'iPhone', 'iOS', '9_1', '13B143', 'Safari', '9.0', '', 'Home', '15', 1),
(8, '2017-02-23', 'iPhone', 'Mobile', 'iPhone', 'iOS', '9_1', '13B143', 'Safari', '9.0', '', 'Home', '16', 1),
(9, '2017-02-23', 'iPhone', 'Mobile', 'iPhone', 'iOS', '9_1', '13B143', 'Safari', '9.0', '', 'Home', '17', 1),
(10, '2017-02-23', 'iPhone', 'Mobile', 'iPhone', 'iOS', '9_1', '13B143', 'Safari', '9.0', '', 'Home', '18', 1),
(11, '2017-02-23', 'iPhone', 'Mobile', 'iPhone', 'iOS', '9_1', '13B143', 'Safari', '9.0', '', 'Home', '19', 1),
(12, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Page', '13', 99),
(13, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '2', 'Page', '13', 7),
(14, '2017-02-23', 'iPhone', 'Mobile', 'iPhone', 'iOS', '9_1', '13B143', 'Safari', '9.0', '4', 'Page', '20', 1),
(15, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '50.0.2632.0', '4', 'Page', '21', 1),
(16, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '50.0.2632.0', '4', 'Page', '22', 1),
(17, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Mozilla Firefox', '10.0.2', '4', 'Page', '23', 1),
(18, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Mozilla Firefox', '10.0.2', '4', 'Page', '24', 1),
(19, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Mozilla Firefox', '10.0.2', '4', 'Page', '25', 1),
(20, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Mozilla Firefox', '10.0.2', '4', 'Page', '26', 1),
(21, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Mozilla Firefox', '10.0.2', '4', 'Page', '27', 1),
(22, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Mozilla Firefox', '10.0.2', '4', 'Page', '28', 1),
(23, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Mozilla Firefox', '10.0.2', '4', 'Page', '29', 1),
(24, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Mozilla Firefox', '10.0.2', '4', 'Page', '30', 1),
(25, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Mozilla Firefox', '10.0.2', '4', 'Page', '31', 1),
(26, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Mozilla Firefox', '10.0.2', '4', 'Page', '32', 1),
(27, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Mozilla Firefox', '10.0.2', '4', 'Page', '33', 1),
(28, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Mozilla Firefox', '10.0.2', '4', 'Page', '34', 3),
(29, '2017-02-23', 'iPhone', 'Mobile', 'iPhone', 'iOS', '9_1', '13B143', 'Safari', '9.0', '2', 'Page', '35', 3),
(30, '2017-02-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '8', 'Article', '13', 2),
(31, '2017-02-24', 'Nexus', 'Mobile', 'Nexus', 'AndroidOS', '6.0', '', 'Chrome', '48.0.2564.23', '2', 'Page', '36', 3),
(32, '2017-02-24', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Home', '13', 2),
(33, '2017-02-24', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Page', '13', 1),
(34, '2017-02-24', 'iPad', 'Tablet', 'iPad', 'iOS', '9_1', '13B143', 'Safari', '9.0', '2', 'Page', '37', 1),
(35, '2017-02-24', 'iPad', 'Tablet', 'iPad', 'iOS', '9_1', '13B143', 'Safari', '9.0', '', 'Home', '38', 2),
(36, '2017-02-24', 'iPad', 'Tablet', 'iPad', 'iOS', '9_1', '13B143', 'Safari', '9.0', '8', 'Article', '38', 1),
(37, '2017-02-24', 'iPad', 'Tablet', 'iPad', 'iOS', '9_1', '13B143', 'Safari', '9.0', '10', 'Article', '38', 1),
(38, '2017-02-24', 'iPad', 'Tablet', 'iPad', 'iOS', '9_1', '13B143', 'Safari', '9.0', '', 'NotFound', '39', 1),
(39, '2017-02-24', 'iPad', 'Tablet', 'iPad', 'iOS', '9_1', '13B143', 'Safari', '9.0', '10', 'Article', '39', 1),
(40, '2017-02-24', 'iPad', 'Tablet', 'iPad', 'iOS', '9_1', '13B143', 'Safari', '9.0', '2', 'NotFound', '39', 1),
(41, '2017-02-24', 'iPad', 'Tablet', 'iPad', 'iOS', '9_1', '13B143', 'Safari', '9.0', '2', 'Category', '39', 1),
(42, '2017-02-24', 'iPad', 'Tablet', 'iPad', 'iOS', '9_1', '13B143', 'Safari', '9.0', '2', 'Category', '40', 3),
(43, '2017-02-25', 'Nexus', 'Mobile', 'Nexus', 'AndroidOS', '6.0', '', 'Chrome', '48.0.2564.23', '2', 'Category', '41', 2),
(44, '2017-02-25', 'Nexus', 'Mobile', 'Nexus', 'AndroidOS', '6.0', '', 'Chrome', '48.0.2564.23', '', 'Home', '42', 2),
(45, '2017-02-25', 'Nexus', 'Mobile', 'Nexus', 'AndroidOS', '6.0', '', 'Chrome', '48.0.2564.23', '8', 'Article', '42', 1),
(46, '2017-02-25', 'Nexus', 'Mobile', 'Nexus', 'AndroidOS', '6.0', '', 'Chrome', '48.0.2564.23', '10', 'Article', '42', 1),
(47, '2017-02-25', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Page', '13', 4),
(48, '2017-02-25', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Home', '13', 3),
(49, '2017-02-25', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Contact', '13', 35),
(50, '2017-02-28', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Home', '13', 1),
(51, '2017-03-03', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Home', '13', 4),
(52, '2017-03-03', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '7', 'Article', '13', 2),
(53, '2017-03-04', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Home', '13', 11),
(54, '2017-03-04', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '10', 'Article', '13', 3),
(55, '2017-03-04', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '2', 'Page', '13', 1),
(56, '2017-03-04', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Page', '13', 2),
(57, '2017-03-04', 'iPad', 'Tablet', 'iPad', 'iOS', '9_1', '13B143', 'Safari', '9.0', '6', 'Page', '13', 1),
(58, '2017-03-04', 'Samsung', 'Mobile', 'Samsung', 'AndroidOS', '5.0', '', 'Chrome', '48.0.2564.23', '', 'Home', '43', 1),
(59, '2017-03-04', 'Samsung', 'Mobile', 'Samsung', 'AndroidOS', '5.0', '', 'Chrome', '48.0.2564.23', '10', 'Article', '43', 1),
(60, '2017-03-06', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Page', '13', 4),
(61, '2017-03-06', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Home', '13', 1),
(62, '2017-03-06', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '10', 'Article', '13', 1),
(63, '2017-03-06', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '8', 'Article', '13', 1),
(64, '2017-03-06', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '6', 'Article', '13', 1),
(65, '2017-03-11', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Home', '13', 1),
(66, '2017-03-11', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '10', 'Article', '13', 1),
(67, '2017-03-11', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '9', 'Article', '13', 1),
(68, '2017-03-11', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '2', 'Page', '13', 1),
(69, '2017-03-13', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Home', '13', 1),
(70, '2017-03-13', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '2', 'Page', '13', 1),
(71, '2017-03-13', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '10', 'Article', '13', 1),
(72, '2017-03-13', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '8', 'Article', '13', 1),
(73, '2017-03-15', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Home', '13', 3),
(74, '2017-03-15', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '10', 'Article', '13', 1),
(75, '2017-03-15', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '2', 'Page', '13', 1),
(76, '2017-03-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Page', '13', 3),
(77, '2017-03-17', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Home', '13', 2),
(78, '2017-03-17', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '10', 'Article', '13', 1),
(79, '2017-03-17', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '6', 'Page', '13', 1),
(80, '2017-03-17', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '4', 'Page', '13', 1),
(81, '2017-03-17', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '2', 'Page', '13', 1),
(82, '2017-03-17', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Page', '13', 2),
(83, '2017-03-18', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Page', '13', 3),
(84, '2017-03-19', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '50.0.2632.0', '', 'Home', '44', 1),
(85, '2017-03-19', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '50.0.2632.0', '', 'Page', '44', 1),
(86, '2017-03-19', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '50.0.2632.0', '', 'Contact', '44', 7),
(87, '2017-03-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Home', '13', 5),
(88, '2017-03-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '2', 'Page', '13', 1),
(89, '2017-03-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Page', '13', 3),
(90, '2017-03-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '10', 'Article', '13', 1),
(91, '2017-03-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '9', 'Article', '13', 1),
(92, '2017-03-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Tag', '13', 1),
(93, '2017-03-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '7', 'Article', '13', 1),
(94, '2017-03-29', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Home', '45', 2),
(95, '2017-03-30', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Home', '46', 1),
(96, '2017-03-31', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Home', '47', 1),
(97, '2017-03-31', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Page', '47', 1),
(98, '2017-04-01', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Page', '48', 1),
(99, '2017-04-03', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Page', '49', 1),
(100, '2017-04-03', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '56.0.2924.87', '', 'Page', '50', 1),
(101, '2017-04-22', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '57.0.2987.133', '', 'Home', '11', 1),
(102, '2017-04-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '57.0.2987.133', '', 'Home', '13', 6),
(103, '2017-04-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '57.0.2987.133', '', 'Home', '51', 13),
(104, '2017-04-24', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '57.0.2987.133', '', 'Home', '52', 1),
(105, '2017-04-24', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '57.0.2987.133', '', 'Home', '53', 1),
(106, '2017-04-24', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '57.0.2987.133', '', 'Home', '54', 6),
(107, '2017-04-29', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '57.0.2987.133', '', 'Home', '20', 2),
(108, '2017-04-29', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '57.0.2987.133', '', 'Page', '20', 1),
(109, '2017-09-14', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Home', '55', 2),
(110, '2017-09-14', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Page', '56', 2),
(111, '2017-09-14', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Home', '56', 2),
(112, '2017-09-14', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '10', 'Article', '56', 13),
(113, '2017-09-14', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '10', 'Article', '57', 6),
(114, '2017-09-14', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Home', '57', 2),
(115, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '10', 'Article', '58', 3),
(116, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Home', '58', 1),
(117, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '2', 'Page', '58', 2),
(118, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '1', 'Category', '58', 1),
(119, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '8', 'Article', '58', 1),
(120, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '1', 'Article', '58', 1),
(121, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '6', 'Article', '58', 1),
(122, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Tag', '58', 3),
(123, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Page', '58', 1),
(124, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '7', 'Article', '58', 1),
(125, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '6', 'Page', '58', 1),
(126, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '4', 'Page', '58', 1),
(127, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Page', '59', 3),
(128, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '4', 'Page', '60', 3),
(129, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '6', 'Page', '60', 2),
(130, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '2', 'Page', '60', 2),
(131, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '8', 'Article', '60', 1),
(132, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Home', '60', 3),
(133, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '9', 'Article', '60', 2),
(134, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '10', 'Article', '60', 2),
(135, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '6', 'Article', '60', 2),
(136, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Contact', '60', 1),
(137, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Page', '60', 1),
(138, '2017-09-16', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Contact', '61', 3),
(139, '2017-09-17', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Contact', '62', 39),
(140, '2017-09-17', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Home', '62', 1),
(141, '2017-09-17', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '50.0.2632.0', '', 'Contact', '63', 4),
(142, '2017-09-17', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '50.0.2632.0', '', 'Contact', '64', 14),
(143, '2017-09-17', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Contact', '65', 2),
(144, '2017-09-17', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Page', '65', 1),
(145, '2017-09-21', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Home', '66', 1),
(146, '2017-09-21', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Page', '67', 5),
(147, '2017-09-21', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Home', '67', 3),
(148, '2017-09-21', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '10', 'Article', '67', 6),
(149, '2017-09-21', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '2', 'Page', '67', 1),
(150, '2017-09-21', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Page', '68', 3),
(151, '2017-09-23', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Page', '69', 3),
(152, '2017-09-24', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Page', '70', 3),
(153, '2017-09-24', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '9', 'Article', '71', 3),
(154, '2017-09-24', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '9', 'Article', '72', 12),
(155, '2017-09-24', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '50.0.2632.0', '9', 'Article', '73', 2),
(156, '2017-09-24', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '9', 'Article', '74', 3),
(157, '2017-09-24', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '50.0.2632.0', '9', 'Article', '75', 5),
(158, '2017-09-24', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '9', 'Article', '76', 26),
(159, '2017-09-24', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Home', '76', 1),
(160, '2017-09-24', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '9', 'Article', '77', 6),
(161, '2017-09-29', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Home', '78', 1),
(162, '2017-09-29', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '10', 'Article', '78', 1),
(163, '2017-09-29', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '9', 'Article', '78', 2),
(164, '2017-09-29', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '50.0.2632.0', '9', 'Article', '79', 6),
(165, '2017-09-29', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '50.0.2632.0', '9', 'Article', '80', 1),
(166, '2017-09-29', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '9', 'Article', '81', 3),
(167, '2017-09-29', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Home', '81', 1),
(168, '2017-09-30', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Home', '82', 1),
(169, '2017-10-01', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '9', 'Article', '83', 1),
(170, '2017-10-01', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Page', '83', 6),
(171, '2017-10-01', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Page', '84', 2),
(172, '2017-10-01', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Home', '85', 3),
(173, '2017-10-01', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '1', 'Article', '85', 1),
(174, '2017-10-01', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Page', '85', 2),
(175, '2017-10-01', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '2', 'Page', '85', 3),
(176, '2017-10-01', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '3', 'Category', '85', 1),
(177, '2017-10-01', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '1', 'Category', '85', 1),
(178, '2017-10-01', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '2', 'Category', '85', 1),
(179, '2017-10-01', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '6', 'Article', '85', 1),
(180, '2017-10-01', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '7', 'Article', '85', 1),
(181, '2017-10-07', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '60.0.3112.113', '', 'Home', '86', 2),
(182, '2017-11-19', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '62.0.3202.94', '', 'Home', '87', 1),
(183, '2017-12-25', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '63.0.3239.84', '', 'Home', '88', 2),
(184, '2017-12-25', '', 'Desktop', '', 'windows', '8', '', 'Google Chrome', '63.0.3239.84', '', 'Page', '88', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messenger`
--
ALTER TABLE `messenger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messenger_user`
--
ALTER TABLE `messenger_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plugins_hook`
--
ALTER TABLE `plugins_hook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pxsession`
--
ALTER TABLE `pxsession`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `messenger`
--
ALTER TABLE `messenger`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `messenger_user`
--
ALTER TABLE `messenger_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `plugins_hook`
--
ALTER TABLE `plugins_hook`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `pxsession`
--
ALTER TABLE `pxsession`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `group_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
