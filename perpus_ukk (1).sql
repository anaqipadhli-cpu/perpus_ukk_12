-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 20 Apr 2026 pada 08.24
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis data: `perpus_ukk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `user_id`, `alamat`, `no_hp`) VALUES
(1, 4, 'serap', '12345678910'),
(2, 5, 'kampung', '2345'),
(3, 6, 'ubicilembu', '4567'),
(4, 18, 'kampung sawah', '089303949094049'),
(5, 23, 'paragon', '08293829102933'),
(6, 27, 'kampung sawah', '08293829102933');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `user_id`, `judul`, `penulis`, `penerbit`, `tahun`, `stok`) VALUES
(1, 1, 'malin kundang', 'bangsa', 'menteri', 2000, 1),
(2, 1, 'barka', 'hentui', 'bujang', 1999, 3199),
(3, 1, 'gajah batu', 'hentui', 'museum binatang', 2010, 319),
(4, 1, 'takazy', 'kamboja', 'menteri', 2008, 299),
(5, 1, 'tempek', 'gerandong', 'merimas', 2007, 230),
(6, NULL, 'roti', 'bangsa', 'novel', 2000, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `denda`
--

CREATE TABLE `denda` (
  `id` int(11) NOT NULL,
  `peminjaman_id` int(11) DEFAULT NULL,
  `jumlah_denda` int(11) DEFAULT NULL,
  `status` enum('belum_bayar','sudah_bayar') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `denda`
--

INSERT INTO `denda` (`id`, `peminjaman_id`, `jumlah_denda`, `status`) VALUES
(1, 5, 2147483647, ''),
(2, 5, 2147483647, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id` int(11) NOT NULL,
  `peminjaman_id` int(11) DEFAULT NULL,
  `buku_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id`, `peminjaman_id`, `buku_id`, `jumlah`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 1, 1),
(6, 6, 1, 1),
(7, 7, 1, 1),
(8, 8, 2, 1),
(9, 9, 3, 1),
(10, 10, 4, 1),
(11, 11, 2, 1),
(12, 12, 3, 1),
(13, 13, 4, 1),
(14, 14, 1, 1),
(15, 15, 2, 1),
(16, 16, 3, 1),
(17, 17, 4, 1),
(18, 18, 1, 1),
(19, 19, 3, 1),
(20, 20, 4, 1),
(21, 21, 5, 1),
(22, 22, 4, 1),
(23, 23, 3, 1),
(24, 24, 2, 1),
(25, 25, 1, 1),
(26, 26, 2, 1),
(27, 27, 3, 1),
(28, 28, 1, 1),
(29, 29, 4, 1),
(30, 30, 5, 1),
(31, 31, 1, 1),
(32, 32, 2, 1),
(33, 33, 3, 1),
(34, 34, 4, 1),
(35, 35, 5, 1),
(36, 36, 1, 1),
(37, 37, 2, 1),
(38, 38, 5, 1),
(39, 39, 4, 1),
(40, 40, 1, 1),
(41, 41, 2, 1),
(42, 42, 3, 1),
(43, 43, 4, 1),
(44, 44, 1, 1),
(45, 45, 3, 1),
(46, 46, 4, 1),
(47, 47, 5, 1),
(48, 48, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` enum('dipinjam','dikembalikan','menunggu_konfirmasi') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `user_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES
(1, 8, '2026-04-12', '2026-04-12', 'dikembalikan'),
(2, 8, '2026-04-12', '2026-04-12', 'dikembalikan'),
(3, 8, '2026-04-12', '2026-04-12', 'dikembalikan'),
(4, 8, '2026-04-12', '2026-04-10', 'dipinjam'),
(5, 12, '2026-04-13', '0000-00-00', 'dikembalikan'),
(6, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(7, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(8, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(9, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(10, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(11, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(12, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(13, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(14, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(15, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(16, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(17, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(18, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(19, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(20, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(21, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(22, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(23, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(24, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(25, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(26, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(27, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(28, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(29, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(30, 12, '2026-04-15', '2026-04-22', 'dikembalikan'),
(31, 12, '2026-04-16', '2026-04-23', 'dikembalikan'),
(32, 12, '2026-04-16', '2026-04-23', 'dikembalikan'),
(33, 12, '2026-04-16', '2026-04-23', 'dikembalikan'),
(34, 12, '2026-04-16', '2026-04-23', 'dikembalikan'),
(35, 12, '2026-04-16', '2026-04-23', 'dikembalikan'),
(36, 12, '2026-04-16', '2026-04-23', 'dikembalikan'),
(37, 12, '2026-04-16', '2026-04-23', 'dikembalikan'),
(38, 12, '2026-04-16', '2026-04-23', 'dikembalikan'),
(39, 12, '2026-04-16', '2026-04-23', 'dikembalikan'),
(40, 12, '2026-04-16', '2026-04-23', 'dikembalikan'),
(41, 12, '2026-04-16', '2026-04-23', 'dikembalikan'),
(42, 12, '2026-04-16', '2026-04-23', 'dikembalikan'),
(43, 12, '2026-04-16', '2026-04-23', 'dikembalikan'),
(44, 12, '2026-04-17', '2026-04-24', 'dipinjam'),
(45, 12, '2026-04-17', '2026-04-24', 'dipinjam'),
(46, 12, '2026-04-17', '2026-04-24', 'dipinjam'),
(47, 12, '2026-04-17', '2026-04-24', 'dipinjam'),
(48, 12, '2026-04-20', '2026-04-27', 'dipinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `peminjaman_id` int(11) DEFAULT NULL,
  `tanggal_kembali_real` date DEFAULT NULL,
  `status` enum('menunggu','dikonfirmasi') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `peminjaman_id`, `tanggal_kembali_real`, `status`) VALUES
(1, 1, '2026-04-12', 'dikonfirmasi'),
(2, 2, '2026-04-12', 'dikonfirmasi'),
(3, 3, '2026-04-12', 'dikonfirmasi'),
(4, 5, '2026-04-13', 'dikonfirmasi'),
(5, 6, '2026-04-15', 'dikonfirmasi'),
(6, 7, '2026-04-15', 'dikonfirmasi'),
(7, 8, '2026-04-15', 'dikonfirmasi'),
(8, 9, '2026-04-15', 'dikonfirmasi'),
(9, 10, '2026-04-15', 'dikonfirmasi'),
(10, 11, '2026-04-15', 'dikonfirmasi'),
(11, 12, '2026-04-15', 'dikonfirmasi'),
(12, 13, '2026-04-15', 'dikonfirmasi'),
(13, 14, '2026-04-15', 'dikonfirmasi'),
(14, 15, '2026-04-15', 'dikonfirmasi'),
(15, 16, '2026-04-15', 'dikonfirmasi'),
(16, 17, '2026-04-15', 'dikonfirmasi'),
(17, 18, '2026-04-15', 'dikonfirmasi'),
(18, 19, '2026-04-15', 'dikonfirmasi'),
(19, 20, '2026-04-15', 'dikonfirmasi'),
(20, 25, '2026-04-15', 'dikonfirmasi'),
(21, 24, '2026-04-15', 'dikonfirmasi'),
(22, 23, '2026-04-15', 'dikonfirmasi'),
(23, 22, '2026-04-15', 'dikonfirmasi'),
(24, 21, '2026-04-15', 'dikonfirmasi'),
(25, 30, '2026-04-15', 'dikonfirmasi'),
(26, 29, '2026-04-15', 'dikonfirmasi'),
(27, 28, '2026-04-15', 'dikonfirmasi'),
(28, 27, '2026-04-15', 'dikonfirmasi'),
(29, 26, '2026-04-15', 'dikonfirmasi'),
(30, 31, '2026-04-16', 'dikonfirmasi'),
(31, 32, '2026-04-16', 'dikonfirmasi'),
(32, 33, '2026-04-16', 'dikonfirmasi'),
(33, 35, '2026-04-16', 'dikonfirmasi'),
(34, 34, '2026-04-16', 'dikonfirmasi'),
(35, 36, '2026-04-16', 'dikonfirmasi'),
(36, 39, '2026-04-16', 'dikonfirmasi'),
(37, 37, '2026-04-16', 'dikonfirmasi'),
(38, 38, '2026-04-16', 'dikonfirmasi'),
(39, 40, '2026-04-17', 'dikonfirmasi'),
(40, 41, '2026-04-17', 'dikonfirmasi'),
(41, 42, '2026-04-17', 'dikonfirmasi'),
(42, 43, '2026-04-17', 'dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `anggota_id` int(11) DEFAULT NULL,
  `buku_id` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` enum('Dipinjam','Dikembalikan') DEFAULT 'Dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Admin Perpus', 'admin@gmail.com', '$2y$10$qzs7XN1uSgxGaPVHPwxpEOAQecQROUPWGLKk2zv5g25GdFtgXZWq6', 'admin', '2026-04-12 08:36:31'),
(2, 'asep', 'asep@gmail.com', '$2y$10$LBuMjI9s5UEthkDDD942e.nxfsUhVUkK56H9Qd3EFvtK1WE3Kn92q', 'user', '2026-04-12 08:37:15'),
(3, 'fadli', 'ffadli@gmail.com', '$2y$10$XCbv4eGnZgk1wwM/wtCc9./VR3G1PZu1Ej6MLQhY4ZSvuVN2/84Iy', 'user', '2026-04-12 08:57:45'),
(4, 'rudi', 'rudi@gmail.com', '$2y$10$5GmHt3jL16epNLYNYON.COMDb8EmC0HV5xtoaxt89YlkRR2CDw/P.', 'user', '2026-04-12 09:03:00'),
(5, 'yanto', 'yanto@gmail.com', '$2y$10$Z3zib4hUWI82ju17jd2HEuEVyW53KLqwNC.P9exbP8qmyRyosVzti', 'user', '2026-04-12 09:04:47'),
(6, 'hiban', 'hiban@gmail.com', '$2y$10$Z7tBY2b0qZECP5l/69iNUODIhg6e2Y4bOevdSMFr3gFbxku3akYiO', 'user', '2026-04-12 09:31:29'),
(7, 'yanto', 'yanto@gmail.com', '$2y$10$4d2RTMManAexZU2A1jrTT.Bi.Qv/bxBCxJ1f3l92VO6G7aBZHKNeO', 'user', '2026-04-12 09:36:30'),
(8, 'yantogaming', 'yantoo@gmail.com', '$2y$10$XThv7DOxZjqOUvWMqDi3ZecRAGzz4qwRZZFHJat8GjI.exG80vyiS', 'user', '2026-04-12 09:37:26'),
(9, 'yanto', 'yanto@gmail.com', '$2y$10$rslF.xYeU4U0ClMCyoOHHukr67.znASlmXgD5smy9O0O8Zf1RuzJO', 'user', '2026-04-13 05:14:33'),
(10, 'ketel', 'ketel@gmail.com', '$2y$10$9LNJyL9ELl8xAXB0yqC59uAWM7zit6jVzVPR6WvMi3.qhMVnUGS22', 'user', '2026-04-13 05:15:46'),
(11, 'ketel', 'ketel@gmail.com', '$2y$10$.DWhZKFvpsnb6QMUYDoHWeBSxXaxgAUZrp600lkcTJHTTQwSgySx6', 'user', '2026-04-13 05:17:53'),
(12, 'fadhli', 'fadhli@gmail.com', '$2y$10$IQ5wQewKuj/7DC4v2lFfmulKfV4q.uc2AtGIrYm0bw5ucgeRRHbae', 'user', '2026-04-13 05:18:57'),
(14, 'fadhli', 'fadhli@gmail.com', '$2y$10$RjbuvyTJi9wx5Z6h89d38e9VS9GQ6o2gIRKIrzX2eHILrDxWJierO', 'user', '2026-04-13 06:18:04'),
(15, 'yanto', 'yanto@gmail.com', '$2y$10$LjisQ/MQUgBnBVEVP72Iz.dJ7gzjEQwkBeD4MJ.u4jfTd3idgE/0K', 'user', '2026-04-15 04:30:19'),
(16, 'fadhli', 'fadhli@gmail.com', '$2y$10$HPQ6WZ45S/Pzli65nfFHRueJ4mNpZgLT0FwapXTIq7NUdO0cD.Lkq', 'user', '2026-04-15 05:13:57'),
(17, 'fadhli', 'fadhli@gmail.com', '$2y$10$RiZO2Xjk3.DlIB3l6OAlHOVEzjPAq/rwHqmsOiO5f2GHustobbnxq', 'user', '2026-04-15 05:53:04'),
(18, 'merimas', 'merimas@gmail.com', '$2y$10$Y70IBezxewfax4wf.yjWA.bh8hB25ceBrw.Y9n.KEF6.VAgKDRRXK', 'user', '2026-04-15 06:48:18'),
(19, 'merimas', 'merimas@gmail.com', '$2y$10$BGazsPMSuAFLn2GvhXUooeMqbUSCqlK0jgnshvSaI8hhJ2POHXuaW', 'user', '2026-04-15 06:49:01'),
(20, 'fadhli', 'fadhli@gmail.com', '$2y$10$pVIjN7okiV1R5uqPUWk/Q.lVztnhQ1VX4DAB3LZzruHCp/Pox42Py', 'user', '2026-04-15 07:05:47'),
(21, 'ketel', 'ketel@gmail.com', '$2y$10$F1JcjnAoUrM69eYeDqBFoucF7KKe85QUCYLuMqZu0TUeJ3PC94rPq', 'user', '2026-04-15 08:41:23'),
(22, 'fadhli', 'fadhli@gmail.com', '$2y$10$qCr4XxogY9c1Su1YJLxrGOSyarMkbRJYxGUUtcVg/GLPX69.4nPwa', 'user', '2026-04-16 01:06:16'),
(23, 'kayang', 'kayang@gmail.com', '$2y$10$Qko2KLbCawESPmb2queMf.uV6bx5BsCxpu7WJO1Ei80TmPCPx0TQ2', 'user', '2026-04-16 01:20:56'),
(24, 'fadhli', 'fadhli@gmail.com', '$2y$10$Z8viZVtscC82NTwDdsLTBeKbhzkPdf9Mg8Xj7YUWjGTkycS1fRXGm', 'user', '2026-04-16 01:58:58'),
(25, 'fadhli', 'fadhli@gmail.com', '$2y$10$1uxFSspYThLIy50B1I7aLeud0BaJvFbVNy.wAPM7uN.DE/vHXU1Zq', 'user', '2026-04-16 02:20:13'),
(26, 'fadhli', 'fadhli@gmail.com', '$2y$10$Tx42WwmqL8lKRWqNJQqOdu6YJwkTNZkIM84995PZWPPPNlEcpNula', 'user', '2026-04-16 03:07:27'),
(27, 'rusdi', 'fadhli@gmail.com', '$2y$10$uuHHq6trhg1ATSNR7PCKDeduGZuowzCjvlvTxrt28ce6QAO7FIJwK', 'user', '2026-04-16 03:16:18');

--
-- Indeks untuk tabel yang dibuang
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_buku_user` (`user_id`);

--
-- Indeks untuk tabel `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_id` (`peminjaman_id`);

--
-- Indeks untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_id` (`peminjaman_id`),
  ADD KEY `buku_id` (`buku_id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_id` (`peminjaman_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_id` (`anggota_id`),
  ADD KEY `buku_id` (`buku_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `denda`
--
ALTER TABLE `denda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_buku_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `denda`
--
ALTER TABLE `denda`
  ADD CONSTRAINT `denda_ibfk_1` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_ibfk_1` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`),
  ADD CONSTRAINT `detail_peminjaman_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
