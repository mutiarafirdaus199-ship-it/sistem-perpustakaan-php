-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2024 pada 07.48
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `jurusan_anggota` varchar(20) NOT NULL,
  `notelp_anggota` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `jurusan_anggota`, `notelp_anggota`) VALUES
(8, 'mutia', 'IT', '08912211');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `penulis_buku` varchar(50) NOT NULL,
  `penerbit_buku` varchar(50) NOT NULL,
  `tahun_penerbit` char(4) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penulis_buku`, `penerbit_buku`, `tahun_penerbit`, `stok`) VALUES
(4, 'Korean History', 'lee min', 'daftarbukuin', '2023', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjam`
--

CREATE TABLE `peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjam`
--

INSERT INTO `peminjam` (`id_peminjam`, `tanggal_pinjam`, `tanggal_kembali`, `id_buku`, `id_anggota`, `id_petugas`) VALUES
(3, '2024-07-19', '2024-07-29', 4, 8, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `denda` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `jabatan_petugas` varchar(50) NOT NULL,
  `notelp_petugas` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `jabatan_petugas`, `notelp_petugas`) VALUES
(3, 'Hari', 'Admin', '0918231');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(50) NOT NULL,
  `lokasi_rak` varchar(50) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_peminjam`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`),
  ADD KEY `id_buku` (`id_buku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  ADD CONSTRAINT `peminjam_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`),
  ADD CONSTRAINT `peminjam_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `peminjam_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`),
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `pengembalian_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);

--
-- Ketidakleluasaan untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD CONSTRAINT `rak_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
