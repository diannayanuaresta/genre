-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2021 pada 09.25
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genre`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `date_created`, `is_active`) VALUES
(30, 'restadianna', 'restadianna@gmail.com', '$2y$10$PeO88/.c2ql8bNvepRBPIOotgdhkILGkEoW3zeKA6F2Ddo7qk8OpW', '2021-08-31 09:29:52', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_judul` varchar(128) NOT NULL,
  `blog_img` varchar(128) NOT NULL,
  `blog_catatan` varchar(2000) NOT NULL,
  `blog_tanggal` date NOT NULL,
  `blog_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `blog_penulis` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_judul`, `blog_img`, `blog_catatan`, `blog_tanggal`, `blog_update`, `blog_penulis`) VALUES
(3, 'GenRe Sumbang Dana Sosial untuk Masyarakat sekitar Kabupaten Tegal', '841d6166a543558a0f369a2708cb443c.PNG', 'Menurut Hasto, duta GenRE adalah remaja yang luar biasa, yang kelak akan tumbuh menjadi generasi berkualitas, &quot;Karena untuk kita bisa menuju Indonesia yang maju, tentu masyarakatnya harus berkualitas.&quot;\r\n\r\nLebih lanjut, GenRE berisikan calon-calon pasangan usia subur yang akan membentuk keluarga. Dengan bekal yang mereka dapat selama menjadi GenRE, diharapkan dapat membentuk keluarga yang sejahtera, damai, dan tentram.\r\n\r\nSebab, menurut Hasto Wardoyo, tanpa ada keluarga yang tenteram, mustahil bisa melahirkan anak-anak yang unggul dan berkualitas.\r\n\r\n&quot;Saya yakin ketika besok pasangan suami istri itu pernah menjadi duta GenRE dan pernah berkecimpung di Genre, keluarganya menjadi keluarga yang tenteram dan bahagia,&quot; katanya.', '2021-08-15', '2021-08-24 03:27:18', 'Rino Agnung'),
(4, 'GenRe itu Indah', '80769a2fc6694eafb7a22900d16cf7ba.png', 'Badan Kependudukan dan Keluarga Berencana Nasional (BKKBN) menggelar kegiatan Apresiasi Duta Generasi Berencana (GenRe) dan Jambore Ajang Kreativitas Remaja (ADU JAK GenRE) tingkat nasional 2019 di Hotel Ciputra, Jakarta Barat pada Senin malam, 16 Desember 2019.\r\n\r\nKepala BKKBN dr Hasto Wardoyo Sp.OG(K) yang dijuluki sebagai Ayah GenRE mengaku sangat berbahagia bisa bertemu dengan Duta GenRE dan remaja dari 34 provinsi di Indonesia.', '0000-00-00', '2021-08-24 03:27:37', 'Someone else'),
(6, '21 25 Keren', '36d161781a577b842ea2c28189bca299.PNG', '21 25 adalah anjuran untuk pernikahan di usia 21 untuk wanita dan 25 untuk wanita. Prgram ini bertujuan untuk mendewasakan usia pernikahan di Indonesia. Untuk mengurangi angka pernikahan dini di Indonesia perlu dicanangkan progrm ini lebih ketat dan agar bisa membudaya di Indonesia untu meningkatkan kesejahteraan masyarakat Indonesia', '2021-08-27', '2021-08-28 03:19:04', 'Dianna Yanuaresta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_admin`
--

CREATE TABLE `chat_admin` (
  `chat_admin_id` int(11) NOT NULL,
  `chat_user_id` int(64) NOT NULL,
  `chat_admin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `chat_admin`
--

INSERT INTO `chat_admin` (`chat_admin_id`, `chat_user_id`, `chat_admin`) VALUES
(2, 2, 'Minimal 160 cm yaa kak..'),
(4, 1, 'Ditunggu gabung ke forum kak..'),
(6, 7, 'Kemungkinan besok kali yaa.. cepetan daftar hehehe:v');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_user`
--

CREATE TABLE `chat_user` (
  `chat_user_id` int(11) NOT NULL,
  `chat_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `chat_user`
--

INSERT INTO `chat_user` (`chat_user_id`, `chat_user`) VALUES
(2, 'Min Tanya dong.. Pengin jadi Duta harus Tinggi gak yaa?'),
(7, 'Min.. tanya dong, Pemilihan Duta GenRe kapan?? pen ikut nih keburu tua:v');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_token`
--

CREATE TABLE `data_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `duta_genre`
--

CREATE TABLE `duta_genre` (
  `duta_id` int(11) NOT NULL,
  `duta_putra_nama` varchar(64) NOT NULL,
  `duta_putri_nama` varchar(64) NOT NULL,
  `duta_putra_img` varchar(128) NOT NULL,
  `duta_putri_img` varchar(128) NOT NULL,
  `duta_tahun` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `duta_genre`
--

INSERT INTO `duta_genre` (`duta_id`, `duta_putra_nama`, `duta_putri_nama`, `duta_putra_img`, `duta_putri_img`, `duta_tahun`) VALUES
(5, 'Daffa Dhiya Ulhaq', 'Rintan Purnama Ayu', '95498b671cd347971597bb7354a7bcee.jpg', '1847d94d00c5c159ed0d2e5e577f8115.jpg', 2021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `galeri_id` int(11) NOT NULL,
  `galeri_img` varchar(128) NOT NULL,
  `galeri_catatan` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`galeri_id`, `galeri_img`, `galeri_catatan`) VALUES
(2, '873081180828493276e7e6291c74c7a2.PNG', 'GenRe Mania'),
(3, 'bbcbcafd42588a6591210ff38f051631.PNG', 'GenRekan Slawi'),
(4, 'ed512ae1266c36da532d3604f169682e.PNG', 'GenRe Meet Online'),
(5, 'c894ee445dc8a9c880826d09954c0e23.png', 'GenRe Reorganisasi'),
(6, '232145872d3eb3bbaa1f4fc3d8e8e093.png', 'Coba Genre'),
(7, '1b24af1ea58c3ffc02207e5028458a55.png', 'Genre Coba 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pik_genre`
--

CREATE TABLE `pik_genre` (
  `id` int(11) NOT NULL,
  `pik_desa` int(32) NOT NULL,
  `pik_sekolah` int(32) NOT NULL,
  `pik_note` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pik_genre`
--

INSERT INTO `pik_genre` (`id`, `pik_desa`, `pik_sekolah`, `pik_note`) VALUES
(1, 95, 50, 'Pusat Informasi dan Konseling Remaja merupakan suatu wadah untuk mengedukasi para generasi muda untuk lebih mempersiapkan kematangan persiapan untuk meraih masa depan. Selain itu, PIK Remaja merupakan suatu media yang saling mengajarkan dan berbagi dari anak, untuk anak dan oleh anak yang manja');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indeks untuk tabel `chat_admin`
--
ALTER TABLE `chat_admin`
  ADD PRIMARY KEY (`chat_admin_id`);

--
-- Indeks untuk tabel `chat_user`
--
ALTER TABLE `chat_user`
  ADD PRIMARY KEY (`chat_user_id`);

--
-- Indeks untuk tabel `data_token`
--
ALTER TABLE `data_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `duta_genre`
--
ALTER TABLE `duta_genre`
  ADD PRIMARY KEY (`duta_id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`galeri_id`);

--
-- Indeks untuk tabel `pik_genre`
--
ALTER TABLE `pik_genre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `chat_admin`
--
ALTER TABLE `chat_admin`
  MODIFY `chat_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `chat_user`
--
ALTER TABLE `chat_user`
  MODIFY `chat_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_token`
--
ALTER TABLE `data_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `duta_genre`
--
ALTER TABLE `duta_genre`
  MODIFY `duta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `galeri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pik_genre`
--
ALTER TABLE `pik_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
