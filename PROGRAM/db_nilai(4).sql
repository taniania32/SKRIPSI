-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Jul 2018 pada 09.35
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nilai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_menu`
--

CREATE TABLE `tabel_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_menu`
--

INSERT INTO `tabel_menu` (`id`, `nama_menu`, `link`, `icon`, `is_main_menu`) VALUES
(1, 'DATA SISWA', 'siswa', 'fa fa-users', 0),
(2, 'DATA GURU', 'guru', 'fa fa-users', 0),
(8, 'data sekolah', 'sekolah', 'fa fa-building', 0),
(9, 'Data master', '#', 'fa fa-bars', 0),
(10, 'Mata Pelajaran', 'mapel', 'fa fa-book', 9),
(12, 'Ekstrakulikuler', 'ekskul', 'fa fa-th-large', 9),
(13, 'Tahun Akademik', 'tahunakademik', 'fa fa-calendar-o', 9),
(15, 'Rombongan Belajar', 'rombel', 'fa fa-users', 9),
(17, 'Pengguna sistem', 'users', 'fa fa-cubes', 9),
(19, 'Kurikulum', 'kurikulum', 'fa fa-newspaper-o', 9),
(30, 'Fisik Siswa', 'tb_bb', 'fa fa-users', 9),
(32, 'Nilai Pengetahuan', 'nilai_H', 'fa fa-newspaper-o', 53),
(34, 'Nilai Keterampilan', 'nilai_HK', 'fa fa-newspaper-o', 53),
(46, 'Data Deskripsi Nilai', 'n_desk', 'fa fa-newspaper-o', 53),
(47, 'Data Absen', 'n_absen', 'fa fa-newspaper-o', 53),
(48, 'Data Rekapitulasi Nilai', 'n_rekap', 'fa fa-newspaper-o', 53),
(49, 'Data Raport', 'n_raport', 'fa fa-newspaper-o', 53),
(50, 'Laporan Legger', 'laporan', 'fa fa-newspaper-o', 55),
(51, 'Laporan Siswa', 'laporansw', 'fa fa-newspaper-o', 55),
(52, 'Data Raport Siswa', 'n_raportsw', 'fa fa-newspaper-o', 0),
(53, 'Data Nilai', '#', 'fa fa-newspaper-o', 0),
(55, 'Laporan', '#', 'fa fa-clone', 0),
(56, 'Nilai Pengetahuan', 'nilai_H', 'fa fa-newspaper-o', 0),
(57, 'Nilai Keterampilan', 'nilai_HK', 'fa fa-newspaper-o', 0),
(58, 'Data Deskripsi Nilai', 'n_desk', 'fa fa-newspaper-o', 0),
(59, 'Data Rekapitulasi Nilai', 'n_rekap', 'fa fa-newspaper-o', 0),
(60, 'Laporan Legger', 'laporan', 'fa fa-newspaper-o', 0),
(61, 'Laporan Siswa', 'laporansw', 'fa fa-newspaper-o', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_history_kelas`
--

CREATE TABLE `tbl_history_kelas` (
  `id_history` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `NISN` varchar(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_history_kelas`
--

INSERT INTO `tbl_history_kelas` (`id_history`, `id_rombel`, `NISN`, `id_tahun_akademik`) VALUES
(1, 1, 'TI3003239', 1),
(2, 1, 'RM00502', 1),
(3, 1, 'TI102132', 1),
(4, 1, 'TI102133', 1),
(5, 1, 'TIM102134', 1),
(6, 1, 'TIM102135', 1),
(7, 1, 'TI1021395', 1),
(8, 1, '122233949', 1),
(9, 1, '0084812405', 1),
(10, 2, '132143454', 1),
(11, 8, '0078216178', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenjang_sekolah`
--

CREATE TABLE `tbl_jenjang_sekolah` (
  `id_jenjang` int(11) NOT NULL,
  `nama_jenjang` varchar(10) NOT NULL,
  `jumlah_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jenjang_sekolah`
--

INSERT INTO `tbl_jenjang_sekolah` (`id_jenjang`, `nama_jenjang`, `jumlah_kelas`) VALUES
(1, 'SD/ MI', 6),
(2, 'SMP/ MTS', 3),
(3, 'SMA/ SMK', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_level_user`
--

CREATE TABLE `tbl_level_user` (
  `id_level_user` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_level_user`
--

INSERT INTO `tbl_level_user` (`id_level_user`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Walikelas'),
(3, 'Guru'),
(5, 'siswa'),
(6, 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sekolah_info`
--

CREATE TABLE `tbl_sekolah_info` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(30) NOT NULL,
  `id_jenjang_sekolah` int(11) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `telpon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sekolah_info`
--

INSERT INTO `tbl_sekolah_info` (`id_sekolah`, `nama_sekolah`, `id_jenjang_sekolah`, `alamat_sekolah`, `email`, `telpon`) VALUES
(1, 'SDN SUKAPURA 01', 1, 'Jalan Beo No. 15 Komp. Walikota RT/RW: 12/06, Kelurahan Sukapura, Kecamatan Cilincing, Jakarta Utara ', 'sdnsukapura_01@yahoo.com', '0214411729');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tahun_akademik`
--

CREATE TABLE `tbl_tahun_akademik` (
  `id_tahun_akademik` int(4) NOT NULL,
  `tahun_akademik` varchar(10) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL,
  `semester_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tahun_akademik`
--

INSERT INTO `tbl_tahun_akademik` (`id_tahun_akademik`, `tahun_akademik`, `is_aktif`, `semester_aktif`) VALUES
(1, '2016/ 2017', 'n', 1),
(2, '2015/2016', 'n', 0),
(6, '2017/2018', 'y', 0),
(7, '2018/2019', 'n', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_level_user` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `username`, `password`, `id_level_user`, `foto`) VALUES
(8, 'AL REZHA FADILAH PRATAMA', '0084812405', '312f94e1f8eda4595af732445e69d0da', 5, ''),
(15, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', 1, 'download2.jpg'),
(17, 'Suganda', 'suganda', '1b7c5c7d803e2ad50d2ef2a0cbce2958', 3, ''),
(18, 'Dra. Nunuk Tati T, M.Pd', 'nunuk1234', '3785893348c90dffdf4a0ddaf675e91b', 6, ''),
(19, 'Alvian Arif Sulthan', '0078216178', '15b3775ed7a7abc5f83db05cc7514c5d', 5, ''),
(20, 'Sulikah', 'sulikah', '496e09b7304a1c0440b4559b483d038a', 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_rule`
--

CREATE TABLE `tbl_user_rule` (
  `id_rule` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_rule`
--

INSERT INTO `tbl_user_rule` (`id_rule`, `id_menu`, `id_level_user`) VALUES
(3, 1, 1),
(4, 2, 1),
(5, 8, 1),
(6, 14, 2),
(10, 21, 5),
(11, 9, 1),
(12, 10, 1),
(14, 12, 1),
(15, 13, 1),
(17, 17, 1),
(18, 19, 1),
(25, 22, 1),
(26, 23, 5),
(27, 24, 5),
(29, 26, 1),
(30, 26, 5),
(33, 30, 1),
(34, 15, 1),
(40, 27, 1),
(41, 28, 1),
(46, 37, 1),
(47, 32, 1),
(49, 34, 1),
(51, 39, 1),
(52, 40, 1),
(53, 41, 1),
(54, 42, 1),
(55, 43, 1),
(58, 45, 5),
(59, 46, 1),
(60, 47, 1),
(61, 48, 1),
(62, 49, 1),
(63, 50, 1),
(64, 51, 1),
(66, 53, 1),
(67, 55, 1),
(68, 34, 2),
(69, 46, 2),
(70, 47, 2),
(71, 32, 2),
(72, 48, 2),
(73, 49, 2),
(74, 50, 2),
(75, 51, 2),
(77, 56, 3),
(78, 57, 3),
(79, 58, 3),
(80, 59, 3),
(90, 52, 5),
(93, 53, 2),
(94, 55, 2),
(95, 59, 6),
(96, 60, 6),
(97, 61, 3),
(98, 61, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_walikelas`
--

CREATE TABLE `tbl_walikelas` (
  `id_walikelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_walikelas`
--

INSERT INTO `tbl_walikelas` (`id_walikelas`, `id_guru`, `id_tahun_akademik`, `id_rombel`) VALUES
(7, 4, 1, 1),
(8, 3, 1, 2),
(9, 1, 1, 3),
(10, 2, 1, 4),
(11, 2, 7, 1),
(12, 2, 7, 2),
(13, 2, 7, 3),
(14, 2, 7, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_history_kelas`
--

CREATE TABLE `tb_history_kelas` (
  `ID_History` int(11) NOT NULL,
  `ID_Rombel` int(11) DEFAULT NULL,
  `NISN` varchar(10) DEFAULT NULL,
  `id_tahun_akademik` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_history_kelas`
--

INSERT INTO `tb_history_kelas` (`ID_History`, `ID_Rombel`, `NISN`, `id_tahun_akademik`) VALUES
(1, NULL, '0107450262', 1),
(2, 1, '0084812405', 1),
(3, 1, '0109725938', 1),
(4, 1, '0091023097', 1),
(5, 1, '0104907942', 1),
(6, 1, '123456', 1),
(7, 1, '111111111', 1),
(8, 1, '6353', 1),
(9, 1, '52354', 1),
(10, 1, '', 1),
(11, 1, '', 1),
(12, 0, 'fds', 1),
(13, 1, '564545', 1),
(14, 1, '123123', 1),
(15, 1, '123', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_m_ekskul`
--

CREATE TABLE `tb_m_ekskul` (
  `ID_Ekskul` int(11) NOT NULL,
  `Nama_Ekskul` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_m_ekskul`
--

INSERT INTO `tb_m_ekskul` (`ID_Ekskul`, `Nama_Ekskul`) VALUES
(1, 'Marawis'),
(2, 'Pramuka'),
(3, 'Bola Voli'),
(4, 'Menari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_m_guru`
--

CREATE TABLE `tb_m_guru` (
  `NIP` varchar(18) NOT NULL,
  `Nama_Guru` varchar(250) NOT NULL,
  `NRK` varchar(6) NOT NULL,
  `NUPTK` varchar(16) NOT NULL,
  `Tempat_Lahir` varchar(250) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Pangkat` varchar(250) NOT NULL,
  `Golongan` varchar(10) NOT NULL,
  `TMT` date NOT NULL,
  `Status` varchar(250) NOT NULL,
  `TMT_Status` date NOT NULL,
  `Masa_Kerja_TH` int(11) NOT NULL,
  `Masa_Kerja_BL` int(11) NOT NULL,
  `Nama_Instansi` varchar(250) NOT NULL,
  `TH_Lulus` year(4) NOT NULL,
  `Tingkat` varchar(5) NOT NULL,
  `Jurusan` varchar(250) NOT NULL,
  `No_Ijazah` int(100) DEFAULT NULL,
  `ID_Tipe_Guru` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Tugas_Tambahan` varchar(250) DEFAULT NULL,
  `Riwayat_Mutasi` varchar(250) NOT NULL,
  `TMT_Tugas` date NOT NULL,
  `Alamat_Rumah` text NOT NULL,
  `Ket_Guru` varchar(100) DEFAULT NULL,
  `No_HP` varchar(16) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `ID_Rombel` int(11) DEFAULT NULL,
  `ID_Mapel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_m_guru`
--

INSERT INTO `tb_m_guru` (`NIP`, `Nama_Guru`, `NRK`, `NUPTK`, `Tempat_Lahir`, `Tanggal_Lahir`, `Pangkat`, `Golongan`, `TMT`, `Status`, `TMT_Status`, `Masa_Kerja_TH`, `Masa_Kerja_BL`, `Nama_Instansi`, `TH_Lulus`, `Tingkat`, `Jurusan`, `No_Ijazah`, `ID_Tipe_Guru`, `Jumlah`, `Tugas_Tambahan`, `Riwayat_Mutasi`, `TMT_Tugas`, `Alamat_Rumah`, `Ket_Guru`, `No_HP`, `username`, `password`, `ID_Rombel`, `ID_Mapel`) VALUES
('195807141978032004', 'Hj. Yuli Ekowati, M.Pd', '071776', '2739736638300003', 'Surabaya', '1958-07-14', 'Pembina Tk.1', 'IV B', '2012-12-04', 'PNS', '0000-00-00', 3, 6, 'Universitas Indraprasta PGRI', 2011, 'S-2', 'Magister Ilmu Pengetahuan Sosial', 0, 1, 24, '', 'SDN SEMPER BARAT 12 PT', '2016-02-14', 'Komp. Walikota Jl. Merak Blok Q-4/9 Kel. Sukapura ', 'PNS', '087880416685', 'dddd', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL),
('196005101982032008', 'Sulikah, S.Pd', '15881', '0842738640300042', 'Karang Anyar', '1960-10-05', 'Pembina Tk.1', 'IV B', '2014-10-01', 'PNS', '1982-03-01', 34, 10, 'Universitas Singaperbangsa Karawang', 2001, 'S1', 'Pendidikan Luar Sekolah', 0, 1, 24, '', 'SDN KEBON BAWANG 03 PG', '2015-09-10', 'Jl. Murai I Blok G3/19 Rt. 08/06 Komp. Walikota Kel. Sukapura ', '', '081932102211', 'sulikah', '496e09b7304a1c0440b4559b483d038a', 8, ''),
('19630509198403100', 'Suganda, S.Pd', '081058', '1237741641200003', 'Cirebon', '1963-05-09', 'Pembina Tk.1', 'IV B', '2004-01-04', 'PNS', '0000-00-00', 3, 10, 'Universitas Islam ', 2010, 'S1', 'Penjaskes', 0, 2, 30, '', 'SDN RAWA BADAK 07 PG', '1996-09-09', 'Rumah Dinas SDN SUKAPURA 01 Pagi  llll', 'PNS', '081382532436', 'suganda', 'd0ad9bc68858cabb86584a5ce28045d1', 0, 'PJOK'),
('196307071986032008', 'Dra. Nunuk Tati T, M.Pd', '105072', '1039741643300003', 'Kuningan', '1963-07-07', 'Pembina Tk.2', 'IV B', '2018-04-17', 'PNS', '2018-04-30', 5, 2, 'Universitas Muhammadiyah Prof. Dr. Hamka', 2011, 'S-2', 'Magister Admintrasi Pendidikan', 12, 2, 6, 'Kepala Sekolah', 'SDN SUKAPURA 06 PT', '2018-04-17', 'Jl. dds', 'Kepala sekolah', '082311763990', 'nunuk123', 'c8dad13eeff60ab4071741db24a731d2', 0, 'PKN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_m_kd`
--

CREATE TABLE `tb_m_kd` (
  `ID_KD` int(11) NOT NULL,
  `ID_Mapel` varchar(50) NOT NULL,
  `Kode_KD` varchar(10) NOT NULL,
  `Ket_KD` varchar(500) NOT NULL,
  `J_KD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_m_kd`
--

INSERT INTO `tb_m_kd` (`ID_KD`, `ID_Mapel`, `Kode_KD`, `Ket_KD`, `J_KD`) VALUES
(1, 'PKN', '3.1', 'memahami makna hubungan simbol dengan sila-sila Pancasila', 1),
(2, 'PKN', '4.1', '', 2),
(3, 'PKN', '3.2', '', 1),
(4, 'PKN', '3.4', '', 1),
(5, 'PKN', '4.2', '', 2),
(6, 'PKN', '4.4', '', 2),
(7, 'B_INDO', '3.1', '', 1),
(8, 'B_INDO', '3.2', '', 1),
(9, 'B_INDO', '3.3', '', 1),
(10, 'B_INDO', '3.4', '', 1),
(11, 'B_INDO', '3.5', '', 1),
(12, 'B_INDO', '3.6', '', 1),
(13, 'B_INDO', '3.7', '', 1),
(14, 'B_INDO', '3.8', '', 1),
(15, 'B_INDO', '4.1', '', 2),
(16, 'B_INDO', '4.2', '', 2),
(17, 'B_INDO', '4.3', '', 2),
(18, 'B_INDO', '4.4', '', 2),
(19, 'B_INDO', '4.5', '', 2),
(20, 'B_INDO', '4.6', '', 2),
(21, 'B_INDO', '4.7', '', 2),
(22, 'B_INDO', '4.8', '', 2),
(23, 'MTK', '3.1', '', 1),
(24, 'MTK', '3.2', '', 1),
(25, 'MTK', '3.3', '', 1),
(26, 'MTK', '3.8', '', 1),
(27, 'MTK', '3.9', '', 1),
(28, 'MTK', '3.10', '', 1),
(29, 'MTK', '3.12', '', 1),
(30, 'MTK', '4.1', '', 2),
(31, 'MTK', '4.2', '', 2),
(32, 'MTK', '4.3', '', 2),
(33, 'MTK', '4.8', '', 2),
(34, 'MTK', '4.9', '', 2),
(35, 'MTK', '4.10', '', 2),
(36, 'MTK', '4.12', '', 2),
(37, 'IPA', '3.1', '', 1),
(38, 'IPA', '3.5', '', 1),
(39, 'IPA', '3.6', '', 1),
(40, 'IPA', '3.7', '', 1),
(41, 'IPA', '3.8', '', 1),
(42, 'IPA', '4.1', '', 2),
(43, 'IPA', '4.5', '', 2),
(44, 'IPA', '4.6', '', 2),
(45, 'IPA', '4.7', '', 2),
(46, 'IPA', '4.8', '', 2),
(47, 'IPS', '3.1', '', 1),
(48, 'IPS', '3.2', '', 1),
(49, 'IPS', '3.3', '', 1),
(50, 'IPS', '3.4', '', 1),
(51, 'IPS', '4.1', '', 2),
(52, 'IPS', '4.2', '', 2),
(53, 'IPS', '4.3', '', 2),
(54, 'IPS', '4.4', '', 2),
(55, 'SBdP', '3.1', '', 1),
(56, 'SBdP', '3.2', '', 1),
(57, 'SBdP', '3.3', '', 1),
(58, 'SBdP', '3.4', '', 1),
(59, 'SBdP', '4.1', '', 2),
(60, 'SBdP', '4.2', '', 2),
(61, 'SBdP', '4.3', '', 2),
(62, 'SBdP', '4.4', '', 2),
(63, 'AGAMA', '3.1', '', 1),
(64, 'AGAMA', '3.2', '', 1),
(65, 'AGAMA', '3.3', '', 1),
(66, 'AGAMA', '3.5', '', 1),
(67, 'AGAMA', '3.6', '', 1),
(68, 'AGAMA', '3.9', '', 1),
(69, 'AGAMA', '3.10', '', 1),
(70, 'AGAMA', '3.11', '', 1),
(71, 'AGAMA', '3.14', '', 1),
(72, 'AGAMA', '3.16', '', 1),
(73, 'AGAMA', '4.1', '', 2),
(74, 'AGAMA', '4.2', '', 2),
(75, 'AGAMA', '4.3', '', 2),
(76, 'AGAMA', '4.5', '', 2),
(77, 'AGAMA', '4.6', '', 2),
(78, 'AGAMA', '4.9', '', 2),
(79, 'AGAMA', '4.10', '', 2),
(80, 'AGAMA', '4.11', '', 2),
(81, 'AGAMA', '4.14', '', 2),
(82, 'AGAMA', '4.16', '', 2),
(83, 'PJOK', '3.1', '', 1),
(84, 'PJOK', '3.2', '', 1),
(85, 'PJOK', '3.3', '', 1),
(86, 'PJOK', '3.4', '', 1),
(87, 'PJOK', '4.1', '', 2),
(88, 'PJOK', '4.2', '', 2),
(89, 'PJOK', '4.3', '', 2),
(90, 'PJOK', '4.4', '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_m_kelas`
--

CREATE TABLE `tb_m_kelas` (
  `ID_Kelas` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_m_kelas`
--

INSERT INTO `tb_m_kelas` (`ID_Kelas`) VALUES
('I'),
('II'),
('III'),
('IV'),
('V'),
('VI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_m_kkm`
--

CREATE TABLE `tb_m_kkm` (
  `ID_KKM` int(11) NOT NULL,
  `Semester` int(11) NOT NULL,
  `ID_Mapel` varchar(50) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `KKM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_m_kkm`
--

INSERT INTO `tb_m_kkm` (`ID_KKM`, `Semester`, `ID_Mapel`, `id_tahun_akademik`, `KKM`) VALUES
(2, 1, 'AGAMA', 1, 75),
(3, 1, 'PKN', 1, 70),
(4, 1, 'B_INDO', 1, 70),
(5, 1, 'MTK', 1, 70),
(6, 1, 'IPA', 1, 70),
(7, 1, 'IPS', 1, 70),
(8, 1, 'SBdP', 1, 70),
(9, 1, 'PJOK', 1, 75);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_m_kurikulum`
--

CREATE TABLE `tb_m_kurikulum` (
  `ID_Kurikulum` int(11) NOT NULL,
  `Nama_Kurikulum` varchar(250) DEFAULT NULL,
  `Status` varchar(1) DEFAULT NULL,
  `Lampiran` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_m_kurikulum`
--

INSERT INTO `tb_m_kurikulum` (`ID_Kurikulum`, `Nama_Kurikulum`, `Status`, `Lampiran`) VALUES
(39, 'Tahun 2013', 'Y', 'KURIKULUM_TP_2017-2018_Wil__V_CIL_SDN_SUKAPURA_01_PAGI19.doc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_m_mapel`
--

CREATE TABLE `tb_m_mapel` (
  `ID_Mapel` varchar(50) NOT NULL,
  `Nama_Mapel` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_m_mapel`
--

INSERT INTO `tb_m_mapel` (`ID_Mapel`, `Nama_Mapel`) VALUES
('AGAMA', 'Pendidikan Agama'),
('B_INDO', 'Bahasa Indonesia'),
('IPA', 'Ilmu Pengetahuan Alam'),
('IPS', 'Ilmu Pengetahuan Sosial'),
('MTK', 'Matematika'),
('MULOK1', 'MULOK1'),
('MULOK2', 'MULOK2'),
('PJOK', 'Pendidikan Jasmani Olahraga Kesehatan'),
('PKN', 'Pendidikan Pancasila dan Kewarganegaraan'),
('SBdP', 'Seni Budaya dan Prakarya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_m_rombel`
--

CREATE TABLE `tb_m_rombel` (
  `ID_Rombel` int(11) NOT NULL,
  `Nama_Rombel` varchar(10) NOT NULL,
  `ID_Kelas` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_m_rombel`
--

INSERT INTO `tb_m_rombel` (`ID_Rombel`, `Nama_Rombel`, `ID_Kelas`) VALUES
(1, 'I A', 'I'),
(2, 'I B', 'I'),
(4, 'II A', 'II'),
(5, 'II B', 'II'),
(6, 'III A', 'III'),
(7, 'III B', 'III'),
(8, 'IV A', 'IV'),
(9, 'IV B', 'IV'),
(10, 'V A', 'V'),
(11, 'V B', 'V'),
(12, 'VI A', 'VI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_m_siswa`
--

CREATE TABLE `tb_m_siswa` (
  `NISN` varchar(10) NOT NULL,
  `No_Induk` int(4) NOT NULL,
  `Nama` varchar(250) NOT NULL,
  `JK` varchar(1) NOT NULL,
  `Ket` varchar(250) DEFAULT NULL,
  `ID_Rombel` int(3) NOT NULL,
  `ID_Kelas` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_m_siswa`
--

INSERT INTO `tb_m_siswa` (`NISN`, `No_Induk`, `Nama`, `JK`, `Ket`, `ID_Rombel`, `ID_Kelas`) VALUES
('0078216178', 3220, 'Alvian Arif Sulthan', 'L', '', 8, 'I'),
('0084812405', 3489, 'AL REZHA FADILAH PRATAMA', 'L', '', 1, 'I'),
('0091023097', 3491, 'AMELIA PUTRI SEPTIANA', 'L', '', 1, 'I'),
('0104907942', 3492, 'ANGGA ADE PUTRA NABABAN', 'L', '', 1, 'I'),
('0105452594', 3484, 'ACHMAD FARHAN ABDILLAH', 'L', '', 1, 'I'),
('0106676159', 3485, 'ADITYA FEBRIYANTO', 'L', '', 1, 'I'),
('0107450262', 3488, 'AKHMAD RIFAI', 'L', '', 1, 'I'),
('0108827360', 3486, 'AHMAD ISYSABILLIH', 'L', '', 1, 'I'),
('0109725938', 3490, 'ALVIN ARIA ALFARISYALDI', 'L', '', 1, 'I');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_m_tb_bb`
--

CREATE TABLE `tb_m_tb_bb` (
  `ID_TB_BB` int(11) NOT NULL,
  `TB` int(11) DEFAULT NULL,
  `BB` decimal(10,0) DEFAULT NULL,
  `NISN` varchar(10) DEFAULT NULL,
  `Semester` int(11) DEFAULT NULL,
  `Penglihatan` varchar(250) NOT NULL,
  `Pendengaran` varchar(250) NOT NULL,
  `Gigi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_m_tb_bb`
--

INSERT INTO `tb_m_tb_bb` (`ID_TB_BB`, `TB`, `BB`, `NISN`, `Semester`, `Penglihatan`, `Pendengaran`, `Gigi`) VALUES
(8, 150, '45', '0084812405', 1, 'Baik', 'Baik', 'Baik'),
(9, 150, '50', '0106676159', 1, 'Baik', 'Baik', 'Baik'),
(11, 145, '40', '0105452594', 1, 'Baik', 'Baik', 'Baik'),
(12, 140, '35', '0078216178', 1, 'Baik', 'Baik', 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_m_tipe_guru`
--

CREATE TABLE `tb_m_tipe_guru` (
  `ID_Tipe_Guru` int(11) NOT NULL,
  `Nama_Tipe_Guru` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_m_tipe_guru`
--

INSERT INTO `tb_m_tipe_guru` (`ID_Tipe_Guru`, `Nama_Tipe_Guru`) VALUES
(1, 'GK'),
(2, 'GP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_r_absen`
--

CREATE TABLE `tb_r_absen` (
  `Semester` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `ID_Rombel` int(11) NOT NULL,
  `NISN` varchar(10) NOT NULL,
  `S` int(10) NOT NULL,
  `I` int(10) NOT NULL,
  `A` int(10) NOT NULL,
  `ID_Absen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_r_absen`
--

INSERT INTO `tb_r_absen` (`Semester`, `id_tahun_akademik`, `ID_Rombel`, `NISN`, `S`, `I`, `A`, `ID_Absen`) VALUES
(1, 6, 1, '0105452594', 0, 0, 0, 4),
(1, 6, 1, '0084812405', 0, 0, 0, 5),
(1, 6, 1, '0106676159', 0, 0, 0, 6),
(1, 6, 8, '0078216178', 0, 0, 0, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_r_deskripsi`
--

CREATE TABLE `tb_r_deskripsi` (
  `Semester` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `ID_Rombel` int(11) NOT NULL,
  `ID_Mapel` varchar(50) NOT NULL,
  `NISN` varchar(10) NOT NULL,
  `Desk_P` varchar(500) NOT NULL,
  `Desk_K` varchar(500) NOT NULL,
  `ID_Desk` int(11) NOT NULL,
  `N_Sikap1` varchar(100) NOT NULL,
  `N_Sikap2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_r_deskripsi`
--

INSERT INTO `tb_r_deskripsi` (`Semester`, `id_tahun_akademik`, `ID_Rombel`, `ID_Mapel`, `NISN`, `Desk_P`, `Desk_K`, `ID_Desk`, `N_Sikap1`, `N_Sikap2`) VALUES
(1, 6, 1, 'AGAMA', '0105452594', 'Baik', 'Baik', 16, 'B', 'B'),
(1, 6, 1, 'PKN', '0084812405', 'Ananda Rezha SANGAT BAIK  dalam memahami makna hubungan simbol dengan sila-sila Pancasila  BAIK  dalam memahami makna hubungan simbol dengan sila-sila Pancasila ', 'Ananda Rezha SANGAT BAIK  dalam menyajikan  berbagai bentuk keberagaman suku bangsa. sosial. dan budaya di Indonesia yang terikat persatuan dan kesatuan PERLU BIMBINGAN  dalam menjelaskan makna hubungan simbol dengan sila- sila Pancasila sebagai warga masyarakat dalam kehidupan sehari hari.       \r\n', 17, 'B', 'B'),
(1, 6, 1, 'B_INDO', '0084812405', 'Ananda Rezha CUKUP BAIK  dalam mencermati keterhubungan antargagasan yang didapat dari teks lisan. tulis. atau visual PERLU BIMBINGAN  dalam menggali pengetahuan baru yang terdapat pada teks nonfiksi.           \r\n', 'Ananda Rezha BAIK  dalam menyajikan teks petunjuk penggunaan alat dalam bentuk teks tulis dan visual menggunakan kosakata baku dan kalimat efekt PERLU BIMBINGAN  dalam melaporkan hasil wawancara menggunakan kosakata baku dan kalimat efektif dalam bentuk teks tulis.\r\n        \r\n', 18, 'B', 'B'),
(1, 6, 1, 'MTK', '0084812405', 'Ananda Rezha BAIK  dalam menjelaskan pecahan-pecahan senilai dengan gambar dan model konkret PERLU BIMBINGAN  dalam menjelaskan hubungan antar garis (sejajar. berpotongan. berhimpit) menggunakan model konkret.', 'Ananda Rezha SANGAT BAIK  dalam mengidentifikasi hubungan antar garis (sejajar. berpotongan. berhimpit) menggunakan model konkret PERLU BIMBINGAN  dalam mengidentifikasi segibanyak beraturan dan segibanyak tidak beraturan.', 19, 'B', 'B'),
(1, 6, 1, 'IPA', '0084812405', 'Ananda Rezha  BAIK  dalam menjelaskan  pentingnya upaya keseimbangan dan pelestarian sumber daya alam di lingkungannya CUKUP BAIK  dalam mengidentifikasi berbagai sumber energi. perubahan bentuk energi. dan sumber energi alternative (angin. air. matahari. panas bumi. bahan bakar organik. dan nuklir) dalam kehidupan sehari-hari.', 'Ananda Rezha SANGAT BAIK  dalam menyajikan laporan hasil  percobaan tentang sifat-sifat cahaya PERLU BIMBINGAN  dalam menyajikan laporan hasil pengamatan dan penelusuran informasi tentang berbagai perubahan bentuk energi.', 20, 'B', 'B'),
(1, 6, 1, 'IPS', '0084812405', 'Ananda Rezha BAIK  dalam mengidentifikasi karakteristik ruang dan pemanfaatan sumber daya alam untuk kesejahteraan masyarakat dari tingkat kota/kabupaten sampai dengan tingkat provinsi CUKUP BAIK  dalam mengidentifikasi keragaman sosial. ekonomi. budaya. etnis. dan agama di provinsi setempat sebagai identitas bangsa Indonesia serta hubungannya dengan karakteristik ruang.', 'Ananda Rezha CUKUP BAIK  dalam menyajikan hasil identifikasi karakteristik ruang dan pemanfaatan sumber daya alam untuk kesejahteraan masyarakat dari tingkat kota/kabupaten sampai dengan tingkat provinsi CUKUP BAIK  dalam menyajikan hasil identifikasi kegiatan ekonomi dan hubungannya dengan berbagai bidang pekerjaan serta kehidupan sosial. dan budaya di lingkungan sekitar sampai dengan provinsi.', 21, 'B', 'B'),
(1, 6, 1, 'SBdP', '0084812405', 'Ananda Rezha CUKUP BAIK  dalam mengetahui karya seni rupa teknik tempel PERLU BIMBINGAN  dalam mengetahui gambar dan bentuk tiga dimensi.', 'Ananda Rezha SANGAT BAIK  dalam membuat karya kolase. montase. aplikasi. dan mozaik PERLU BIMBINGAN  dalam menggambar dan membentuk tiga dimensi.', 22, 'B', 'B'),
(1, 6, 1, 'AGAMA', '0084812405', 'Ananda Rezha BAIK  dalam memahami Allah itu ada melalui pengamatan terhadap makhluk ciptaan-Nya disekitar rumah dan sekolah CUKUP BAIK  dalam memahami makna Asmau al-Husna: Al-Basir, Al-A''adil dan Al-Azim', 'Ananda Rezha BAIK  dalam melakukan pengamatan terhadap makhluk ciptaan Allah disekitar rumah dan sekolah sebagai upaya mengenal Allah itu ada CUKUP BAIK  dalam membaca Asmau al-Husna: Al-Basir, Al-A''adil dan Al-Azim', 23, 'B', 'B'),
(1, 6, 1, 'PJOK', '0084812405', 'Ananda Rezha BAIK  dalam menerapkan prosedur gerak dasar lokomotor dan nonlokomotor untuk membentuk gerak dasar seni beladiri CUKUP BAIK  dalam memahami variasi gerak dasar lokomotor. nonlokomotor. dan manipulative sesuai dengan konsep tubuh. ruang. usaha. dan keterhubungan dalam permainan bola besar sederhana dan/atau tradisional', 'Ananda Rezha BAIK  dalam mempraktikkan variasi gerak dasar lokomotor. non-lokomotor. dan manipulatif sesuai dengan konsep tubuh. ruang. usaha. dan keterhubungan dalam permainan bola kecil sederhana dan/atau tradisional BAIK  dalam mempraktikkan variasi gerak dasar lokomotor. non-lokomotor. dan manipulatif sesuai dengan konsep tubuh. ruang. usaha. dan keterhubungan dalam permainan bola besar sederhana dan/atau tradisional', 24, 'B', 'B'),
(1, 6, 1, 'AGAMA', '0106676159', 'Baik', 'Baik', 25, 'B', 'B'),
(1, 6, 1, 'B_INDO', '0091023097', 'Ananda Amelia BAIK  dalam mencermati keterhubungan antargagasan yang didapat dari teks lisan. tulis. atau visual CUKUP BAIK  dalam menggali informasi dari seorang tokoh melalui wawancara menggunakan daftar pertanyaan.', 'Ananda Amelia BAIK  dalam menyajikan teks petunjuk penggunaan alat dalam bentuk teks tulis dan visual menggunakan kosakata baku dan kalimat efekt CUKUP BAIK  dalam menata informasi yang didapat dari teks berdasarkan keterhubungan antargagasan ke dalam kerangka tulis.', 26, 'B', 'B'),
(1, 6, 1, 'AGAMA', '0091023097', 'Ananda Amelia SANGAT BAIK  dalam memahami Allah itu ada melalui pengamatan terhadap makhluk ciptaan-Nya disekitar rumah dan sekolah BAIK  dalam memahami kisah keteladanan Nabi Ayyub AS', 'Ananda Amelia SANGAT BAIK  dalam melakukan pengamatan terhadap makhluk ciptaan Allah disekitar rumah dan sekolah sebagai upaya mengenal Allah itu ada BAIK  dalam meceriterakan kisah keteladanan Nabi Ayyub AS', 27, 'B', 'B'),
(1, 6, 1, 'IPA', '0091023097', 'Ananda Amelia BAIK  dalam menjelaskan  pentingnya upaya keseimbangan dan pelestarian sumber daya alam di lingkungannya CUKUP BAIK  dalam mengidentifikasi berbagai sumber energi. perubahan bentuk energi. dan sumber energi alternative (angin. air. matahari. panas bumi. bahan bakar organik. dan nuklir) dalam kehidupan sehari-hari.', 'Ananda Amelia SANGAT BAIK  dalam menyajikan laporan hasil  percobaan tentang sifat-sifat cahaya PERLU BIMBINGAN  dalam menyajikan laporan hasil pengamatan dan penelusuran informasi tentang berbagai perubahan bentuk energi.\r\n\r\n', 28, 'B', 'B'),
(1, 6, 1, 'IPS', '0091023097', 'Ananda Amelia BAIK  dalam mengidentifikasi karakteristik ruang dan pemanfaatan sumber daya alam untuk kesejahteraan masyarakat dari tingkat kota/kabupaten sampai dengan tingkat provinsi CUKUP BAIK  dalam mengidentifikasi keragaman sosial. ekonomi. budaya. etnis. dan agama di provinsi setempat sebagai identitas bangsa Indonesia serta hubungannya dengan karakteristik ruang.', 'Ananda Amelia CUKUP BAIK  dalam menyajikan hasil identifikasi karakteristik ruang dan pemanfaatan sumber daya alam untuk kesejahteraan masyarakat dari tingkat kota/kabupaten sampai dengan tingkat provinsi CUKUP BAIK  dalam menyajikan hasil identifikasi kegiatan ekonomi dan hubungannya dengan berbagai bidang pekerjaan serta kehidupan sosial. dan budaya di lingkungan sekitar sampai dengan provinsi.', 29, 'B', 'B'),
(1, 6, 1, 'SBdP', '0091023097', 'Ananda Amelia CUKUP BAIK  dalam mengetahui karya seni rupa teknik tempel PERLU BIMBINGAN  dalam mengetahui gambar dan bentuk tiga dimensi.', 'Ananda Amelia SANGAT BAIK  dalam membuat karya kolase. montase. aplikasi. dan mozaik PERLU BIMBINGAN  dalam menggambar dan membentuk tiga dimensi.', 30, 'B', 'B'),
(1, 6, 1, 'PJOK', '0091023097', 'Ananda Amelia BAIK  dalam menerapkan prosedur gerak dasar lokomotor dan nonlokomotor untuk membentuk gerak dasar seni beladiri CUKUP BAIK  dalam memahami variasi gerak dasar lokomotor. nonlokomotor. dan manipulative sesuai dengan konsep tubuh. ruang. usaha. dan keterhubungan dalam permainan bola besar sederhana dan/atau tradisional', 'Ananda Amelia BAIK  dalam mempraktikkan variasi gerak dasar lokomotor. non-lokomotor. dan manipulatif sesuai dengan konsep tubuh. ruang. usaha. dan keterhubungan dalam permainan bola kecil sederhana dan/atau tradisional BAIK  dalam mempraktikkan variasi gerak dasar lokomotor. non-lokomotor. dan manipulatif sesuai dengan konsep tubuh. ruang. usaha. dan keterhubungan dalam permainan bola besar sederhana dan/atau tradisional', 31, 'B', 'B'),
(1, 6, 8, 'AGAMA', '0078216178', 'Ananda Sulthan BAIK  dalam memahami Allah itu ada melalui pengamatan terhadap makhluk ciptaan-Nya disekitar rumah dan sekolah CUKUP BAIK  dalam memahami makna Asmau al-Husna: Al-Basir, Al-A''adil dan Al-Azim  \r\n', 'Ananda Sulthan BAIK  dalam melakukan pengamatan terhadap makhluk ciptaan Allah disekitar rumah dan sekolah sebagai upaya mengenal Allah itu ada CUKUP BAIK  dalam membaca Asmau al-Husna: Al-Basir, Al-A''adil dan Al-Azim  \r\n', 32, 'B', 'B'),
(1, 6, 8, 'B_INDO', '0078216178', 'Ananda Sulthan CUKUP BAIK  dalam mencermati keterhubungan antargagasan yang didapat dari teks lisan. tulis. atau visual PERLU BIMBINGAN  dalam menggali pengetahuan baru yang terdapat pada teks nonfiksi.', 'Ananda Sulthan BAIK  dalam menyajikan teks petunjuk penggunaan alat dalam bentuk teks tulis dan visual menggunakan kosakata baku dan kalimat efekt PERLU BIMBINGAN  dalam melaporkan hasil wawancara menggunakan kosakata baku dan kalimat efektif dalam bentuk teks tulis.', 33, 'B', 'B'),
(1, 6, 8, 'IPA', '0078216178', 'Ananda Sulthan BAIK  dalam menjelaskan  pentingnya upaya keseimbangan dan pelestarian sumber daya alam di lingkungannya CUKUP BAIK  dalam mengidentifikasi berbagai sumber energi. perubahan bentuk energi. dan sumber energi alternative (angin. air. matahari. panas bumi. bahan bakar organik. dan nuklir) dalam kehidupan sehari-hari.     ', 'Ananda Sulthan SANGAT BAIK  dalam menyajikan laporan hasil  percobaan tentang sifat-sifat cahaya PERLU BIMBINGAN  dalam menyajikan laporan hasil pengamatan dan penelusuran informasi tentang berbagai perubahan bentuk energi.', 34, 'B', 'B'),
(1, 6, 8, 'IPS', '0078216178', 'Ananda Sulthan BAIK  dalam mengidentifikasi karakteristik ruang dan pemanfaatan sumber daya alam untuk kesejahteraan masyarakat dari tingkat kota/kabupaten sampai dengan tingkat provinsi PERLU BIMBINGAN  dalam mengidentifikasi kerajaan Hindu dan/ atau Buddha dan / atau Islam di lingkungan daerah setempat serta pengaruhnya pada kehidupan masyarakat masa kini .', 'Ananda Sulthan BAIK  dalam menyajikan hasil identifikasi mengenai keragaman sosial. ekonomi. budaya. etnis. dan agama di provinsi setempat sebagai identitas bangsa Indonesia serta hubungannya dengan karakteristik ruang PERLU BIMBINGAN  dalam menyajikan hasil identifikasi kerajaan Hindu dan/ atau Buddha dan / atau Islam di lingkungan daerah setempat serta pengaruhnya pada kehidupan masyarakat masa kini .   ', 35, 'B', 'B'),
(1, 6, 8, 'MTK', '0078216178', 'Ananda Sulthan BAIK  dalam menjelaskan pecahan-pecahan senilai dengan gambar dan model konkret PERLU BIMBINGAN  dalam menjelaskan hubungan antar garis (sejajar. berpotongan. berhimpit) menggunakan model konkret.', 'Ananda Sulthan SANGAT BAIK  dalam mengidentifikasi hubungan antar garis (sejajar. berpotongan. berhimpit) menggunakan model konkret PERLU BIMBINGAN  dalam mengidentifikasi segibanyak beraturan dan segibanyak tidak beraturan.', 36, 'B', 'B'),
(1, 6, 8, 'PJOK', '0078216178', 'Ananda Sulthan BAIK  dalam menerapkan prosedur gerak dasar lokomotor dan nonlokomotor untuk membentuk gerak dasar seni beladiri CUKUP BAIK  dalam memahami variasi gerak dasar lokomotor. nonlokomotor. dan manipulative sesuai dengan konsep tubuh. ruang. usaha. dan keterhubungan dalam permainan bola besar sederhana dan/atau tradisional', 'Ananda Sulthan BAIK  dalam mempraktikkan variasi gerak dasar lokomotor. non-lokomotor. dan manipulatif sesuai dengan konsep tubuh. ruang. usaha. dan keterhubungan dalam permainan bola kecil sederhana dan/atau tradisional BAIK  dalam mempraktikkan variasi gerak dasar lokomotor. non-lokomotor. dan manipulatif sesuai dengan konsep tubuh. ruang. usaha. dan keterhubungan dalam permainan bola besar sederhana dan/atau tradisional', 37, 'B', 'B'),
(1, 6, 8, 'PKN', '0078216178', 'Ananda Sulthan SANGAT BAIK  dalam memahami makna hubungan simbol dengan sila-sila Pancasila  BAIK  dalam memahami makna hubungan simbol dengan sila-sila Pancasila .', 'Ananda Sulthan SANGAT BAIK  dalam menyajikan  berbagai bentuk keberagaman suku bangsa. sosial. dan budaya di Indonesia yang terikat persatuan dan kesatuan PERLU BIMBINGAN  dalam menjelaskan makna hubungan simbol dengan sila- sila Pancasila sebagai warga masyarakat dalam kehidupan sehari hari. ', 38, 'B', 'B'),
(1, 6, 8, 'SBdP', '0078216178', 'Ananda Sulthan CUKUP BAIK  dalam mengetahui karya seni rupa teknik tempel PERLU BIMBINGAN  dalam mengetahui gambar dan bentuk tiga dimensi. ', 'Ananda Sulthan SANGAT BAIK  dalam membuat karya kolase. montase. aplikasi. dan mozaik PERLU BIMBINGAN  dalam menggambar dan membentuk tiga dimensi.    ', 39, 'B', 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_r_harian_k_d`
--

CREATE TABLE `tb_r_harian_k_d` (
  `ID_KD` int(11) NOT NULL,
  `N_1` int(11) NOT NULL,
  `N_2` int(11) NOT NULL,
  `N_3` int(11) NOT NULL,
  `N_4` int(11) NOT NULL,
  `N_N` int(11) NOT NULL,
  `ID_Nilai_H_K_D` int(11) NOT NULL,
  `ID_Nilai_H_K` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_r_harian_k_d`
--

INSERT INTO `tb_r_harian_k_d` (`ID_KD`, `N_1`, `N_2`, `N_3`, `N_4`, `N_N`, `ID_Nilai_H_K_D`, `ID_Nilai_H_K`) VALUES
(73, 90, 90, 90, 90, 90, 45, 11),
(79, 90, 90, 90, 90, 90, 46, 11),
(15, 89, 89, 89, 90, 89, 47, 12),
(16, 90, 90, 90, 90, 90, 48, 12),
(42, 90, 90, 90, 90, 90, 49, 13),
(43, 90, 90, 90, 90, 90, 50, 13),
(51, 98, 80, 90, 80, 87, 51, 14),
(52, 98, 90, 89, 70, 87, 52, 14),
(30, 90, 90, 90, 89, 90, 53, 15),
(35, 80, 80, 80, 80, 80, 54, 15),
(87, 90, 80, 80, 80, 83, 55, 16),
(88, 86, 86, 89, 80, 85, 56, 16),
(2, 90, 90, 90, 90, 90, 57, 17),
(5, 80, 80, 80, 80, 80, 58, 17),
(59, 80, 80, 80, 80, 80, 59, 18),
(60, 90, 80, 90, 89, 87, 60, 18),
(73, 90, 90, 90, 90, 90, 61, 19),
(15, 90, 90, 90, 90, 90, 62, 20),
(42, 90, 90, 90, 90, 90, 63, 21),
(51, 90, 90, 90, 90, 90, 64, 22),
(30, 90, 90, 90, 90, 90, 65, 23),
(87, 90, 90, 90, 90, 90, 66, 24),
(2, 90, 90, 90, 90, 90, 67, 25),
(59, 90, 90, 90, 90, 90, 68, 26),
(15, 80, 80, 90, 80, 83, 70, 28),
(42, 90, 80, 90, 90, 88, 71, 29),
(51, 80, 89, 90, 80, 85, 72, 30),
(30, 80, 90, 80, 90, 85, 73, 31),
(87, 90, 80, 90, 80, 85, 74, 32),
(59, 80, 90, 80, 90, 85, 75, 33),
(73, 80, 80, 90, 90, 85, 76, 34),
(15, 80, 90, 90, 80, 85, 77, 35),
(42, 80, 90, 80, 90, 85, 78, 36),
(51, 90, 80, 80, 90, 85, 80, 38),
(30, 90, 80, 90, 90, 88, 81, 39),
(87, 90, 80, 90, 90, 88, 82, 40),
(2, 80, 80, 80, 80, 80, 83, 41),
(59, 89, 89, 89, 89, 89, 84, 42);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_r_n_harian_k_h`
--

CREATE TABLE `tb_r_n_harian_k_h` (
  `ID_Nilai_H_K` int(11) NOT NULL,
  `NISN` varchar(10) NOT NULL,
  `Semester` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `ID_Mapel` varchar(50) NOT NULL,
  `ID_Rombel` int(11) NOT NULL,
  `KKM` int(11) NOT NULL,
  `S_R` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_r_n_harian_k_h`
--

INSERT INTO `tb_r_n_harian_k_h` (`ID_Nilai_H_K`, `NISN`, `Semester`, `id_tahun_akademik`, `ID_Mapel`, `ID_Rombel`, `KKM`, `S_R`) VALUES
(11, '0084812405', 1, 6, 'AGAMA', 1, 75, 1),
(12, '0084812405', 1, 6, 'B_INDO', 1, 70, 1),
(13, '0084812405', 1, 6, 'IPA', 1, 70, 1),
(14, '0084812405', 1, 6, 'IPS', 1, 70, 1),
(15, '0084812405', 1, 6, 'MTK', 1, 70, 1),
(16, '0084812405', 1, 6, 'PJOK', 1, 75, 1),
(17, '0084812405', 1, 6, 'PKN', 1, 70, 1),
(18, '0084812405', 1, 6, 'SBdP', 1, 70, 1),
(19, '0106676159', 1, 6, 'AGAMA', 1, 75, 0),
(20, '0106676159', 1, 6, 'B_INDO', 1, 70, 0),
(21, '0106676159', 1, 6, 'IPA', 1, 70, 0),
(22, '0106676159', 1, 6, 'IPS', 1, 70, 0),
(23, '0106676159', 1, 6, 'MTK', 1, 70, 0),
(24, '0106676159', 1, 6, 'PJOK', 1, 75, 0),
(25, '0106676159', 1, 6, 'PKN', 1, 70, 0),
(26, '0106676159', 1, 6, 'SBdP', 1, 70, 0),
(28, '0091023097', 1, 6, 'B_INDO', 1, 70, 0),
(29, '0091023097', 1, 6, 'IPA', 1, 70, 0),
(30, '0091023097', 1, 6, 'IPS', 1, 70, 0),
(31, '0091023097', 1, 6, 'MTK', 1, 70, 0),
(32, '0091023097', 1, 6, 'PJOK', 1, 75, 0),
(33, '0091023097', 1, 6, 'SBdP', 1, 70, 0),
(34, '0078216178', 1, 6, 'AGAMA', 8, 75, 1),
(35, '0078216178', 1, 6, 'B_INDO', 8, 70, 1),
(36, '0078216178', 1, 6, 'IPA', 8, 70, 1),
(38, '0078216178', 1, 6, 'IPS', 8, 70, 1),
(39, '0078216178', 1, 6, 'MTK', 8, 70, 1),
(40, '0078216178', 1, 6, 'PJOK', 8, 75, 1),
(41, '0078216178', 1, 6, 'PKN', 8, 70, 1),
(42, '0078216178', 1, 6, 'SBdP', 8, 70, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_r_n_p_d`
--

CREATE TABLE `tb_r_n_p_d` (
  `ID_P_H` int(11) NOT NULL,
  `ID_KD` int(11) NOT NULL,
  `N_1` int(11) NOT NULL,
  `N_2` int(11) NOT NULL,
  `N_3` int(11) NOT NULL,
  `N_4` int(11) NOT NULL,
  `N_N` int(11) NOT NULL,
  `N_UT` int(11) NOT NULL,
  `N_UAS` int(11) NOT NULL,
  `N_R` int(11) NOT NULL,
  `ID_P_H_D` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_r_n_p_d`
--

INSERT INTO `tb_r_n_p_d` (`ID_P_H`, `ID_KD`, `N_1`, `N_2`, `N_3`, `N_4`, `N_N`, `N_UT`, `N_UAS`, `N_R`, `ID_P_H_D`) VALUES
(13, 63, 90, 80, 90, 80, 85, 90, 0, 87, 34),
(13, 69, 90, 90, 90, 90, 90, 0, 90, 90, 35),
(14, 7, 90, 90, 90, 90, 90, 90, 0, 90, 36),
(14, 8, 90, 90, 90, 90, 90, 0, 90, 90, 37),
(15, 37, 80, 80, 80, 80, 80, 75, 0, 78, 38),
(15, 38, 90, 90, 90, 90, 90, 0, 90, 90, 39),
(16, 47, 90, 90, 90, 90, 90, 80, 0, 87, 40),
(16, 48, 85, 85, 86, 87, 86, 0, 90, 87, 41),
(17, 23, 90, 90, 90, 90, 90, 90, 0, 90, 42),
(17, 28, 80, 80, 90, 89, 85, 0, 90, 87, 43),
(18, 83, 90, 90, 90, 90, 90, 90, 0, 90, 44),
(18, 84, 90, 90, 90, 90, 90, 0, 90, 90, 45),
(19, 1, 90, 80, 80, 90, 85, 90, 0, 87, 46),
(19, 3, 90, 90, 90, 90, 90, 0, 89, 90, 47),
(20, 55, 80, 89, 90, 89, 87, 88, 0, 87, 48),
(20, 56, 90, 90, 90, 90, 90, 0, 90, 90, 49),
(21, 63, 90, 90, 90, 90, 90, 90, 0, 90, 50),
(21, 69, 90, 90, 90, 90, 90, 0, 90, 90, 51),
(22, 7, 90, 90, 90, 90, 90, 90, 0, 90, 52),
(22, 8, 90, 90, 90, 90, 90, 0, 90, 90, 53),
(23, 37, 90, 90, 90, 90, 90, 90, 0, 90, 54),
(23, 38, 90, 90, 90, 90, 90, 0, 90, 90, 55),
(24, 47, 90, 90, 90, 90, 90, 90, 0, 90, 56),
(24, 48, 90, 90, 90, 90, 90, 0, 90, 90, 57),
(25, 23, 90, 90, 90, 90, 90, 90, 0, 90, 58),
(25, 28, 90, 90, 90, 90, 90, 0, 90, 90, 59),
(26, 83, 90, 90, 90, 90, 90, 90, 0, 90, 60),
(26, 84, 90, 90, 90, 90, 90, 0, 90, 90, 61),
(27, 83, 90, 90, 90, 90, 90, 90, 0, 90, 62),
(27, 84, 90, 90, 90, 90, 90, 0, 90, 90, 63),
(28, 1, 90, 90, 90, 90, 90, 90, 0, 90, 64),
(28, 3, 90, 90, 90, 90, 90, 0, 90, 90, 65),
(29, 55, 90, 90, 90, 90, 90, 90, 0, 90, 66),
(29, 56, 90, 90, 90, 90, 90, 0, 90, 90, 67),
(30, 63, 90, 90, 90, 90, 90, 90, 0, 90, 68),
(30, 69, 80, 90, 80, 90, 85, 0, 80, 83, 69),
(31, 7, 90, 80, 80, 90, 85, 90, 0, 87, 70),
(31, 8, 80, 90, 80, 90, 85, 0, 80, 83, 71),
(32, 37, 90, 80, 80, 80, 83, 90, 0, 85, 72),
(32, 38, 80, 90, 89, 90, 87, 0, 80, 85, 73),
(33, 47, 90, 80, 80, 80, 83, 89, 0, 85, 74),
(33, 48, 90, 80, 90, 90, 88, 0, 80, 85, 75),
(34, 23, 90, 90, 90, 90, 90, 80, 0, 87, 76),
(34, 28, 90, 80, 90, 90, 88, 0, 90, 88, 77),
(35, 83, 90, 80, 80, 90, 85, 90, 0, 87, 78),
(35, 84, 90, 90, 80, 90, 88, 0, 90, 88, 79),
(37, 55, 89, 90, 90, 90, 90, 80, 0, 87, 82),
(37, 56, 90, 80, 90, 90, 88, 0, 80, 85, 83),
(38, 63, 90, 90, 90, 90, 90, 90, 0, 90, 84),
(38, 69, 80, 90, 90, 90, 88, 0, 80, 85, 85),
(39, 7, 80, 80, 80, 90, 83, 90, 0, 85, 86),
(39, 8, 90, 90, 90, 90, 90, 0, 80, 87, 87),
(40, 37, 90, 80, 80, 90, 85, 90, 0, 87, 88),
(40, 38, 90, 80, 90, 80, 85, 0, 90, 87, 89),
(41, 47, 80, 90, 80, 90, 85, 80, 0, 83, 90),
(41, 48, 90, 90, 80, 90, 88, 0, 90, 88, 91),
(42, 23, 90, 80, 80, 90, 85, 90, 0, 87, 92),
(42, 28, 80, 90, 98, 80, 87, 0, 80, 85, 93),
(43, 83, 90, 80, 80, 90, 85, 90, 0, 87, 94),
(43, 84, 80, 90, 80, 90, 85, 0, 80, 83, 95),
(44, 1, 90, 80, 80, 90, 85, 90, 0, 87, 96),
(44, 3, 80, 90, 80, 90, 85, 0, 90, 87, 97),
(45, 55, 80, 90, 80, 90, 85, 90, 0, 87, 98),
(45, 56, 90, 80, 90, 90, 88, 0, 90, 88, 99);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_r_n_p_h`
--

CREATE TABLE `tb_r_n_p_h` (
  `ID_P_H` int(11) NOT NULL,
  `NISN` varchar(10) NOT NULL,
  `Semester` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `ID_Mapel` varchar(50) NOT NULL,
  `ID_Rombel` int(11) NOT NULL,
  `KKM` int(11) NOT NULL,
  `S_R` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_r_n_p_h`
--

INSERT INTO `tb_r_n_p_h` (`ID_P_H`, `NISN`, `Semester`, `id_tahun_akademik`, `ID_Mapel`, `ID_Rombel`, `KKM`, `S_R`) VALUES
(13, '0084812405', 1, 6, 'AGAMA', 1, 75, 1),
(14, '0084812405', 1, 6, 'B_INDO', 1, 70, 1),
(15, '0084812405', 1, 6, 'IPA', 1, 70, 1),
(16, '0084812405', 1, 6, 'IPS', 1, 70, 1),
(17, '0084812405', 1, 6, 'MTK', 1, 70, 1),
(18, '0084812405', 1, 6, 'PJOK', 1, 75, 1),
(19, '0084812405', 1, 6, 'PKN', 1, 70, 1),
(20, '0084812405', 1, 6, 'SBdP', 1, 70, 1),
(21, '0106676159', 1, 6, 'AGAMA', 1, 75, 0),
(22, '0106676159', 1, 6, 'B_INDO', 1, 70, 0),
(23, '0106676159', 1, 6, 'IPA', 1, 70, 0),
(24, '0106676159', 1, 6, 'IPS', 1, 70, 0),
(25, '0106676159', 1, 6, 'MTK', 1, 70, 0),
(27, '0106676159', 1, 6, 'PJOK', 1, 75, 0),
(28, '0106676159', 1, 6, 'PKN', 1, 70, 0),
(29, '0106676159', 1, 6, 'SBdP', 1, 70, 0),
(30, '0091023097', 1, 6, 'AGAMA', 1, 75, 0),
(31, '0091023097', 1, 6, 'B_INDO', 1, 70, 0),
(32, '0091023097', 1, 6, 'IPA', 1, 70, 0),
(33, '0091023097', 1, 6, 'IPS', 1, 70, 0),
(34, '0091023097', 1, 6, 'MTK', 1, 70, 0),
(35, '0091023097', 1, 6, 'PJOK', 1, 75, 0),
(37, '0091023097', 1, 6, 'SBdP', 1, 70, 0),
(38, '0078216178', 1, 6, 'AGAMA', 8, 75, 1),
(39, '0078216178', 1, 6, 'B_INDO', 8, 70, 1),
(40, '0078216178', 1, 6, 'IPA', 8, 70, 1),
(41, '0078216178', 1, 6, 'IPS', 8, 70, 1),
(42, '0078216178', 1, 6, 'MTK', 8, 70, 1),
(43, '0078216178', 1, 6, 'PJOK', 8, 75, 1),
(44, '0078216178', 1, 6, 'PKN', 8, 70, 1),
(45, '0078216178', 1, 6, 'SBdP', 8, 70, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_r_raport_h`
--

CREATE TABLE `tb_r_raport_h` (
  `ID_Raport` int(11) NOT NULL,
  `S_Spirit` varchar(300) NOT NULL,
  `S_Sosial` varchar(300) NOT NULL,
  `ID_Ekskul` int(11) NOT NULL,
  `Ket_Ekskul` varchar(300) NOT NULL,
  `Saran` varchar(300) NOT NULL,
  `NISN` varchar(10) NOT NULL,
  `J_Prestasi` varchar(250) NOT NULL,
  `K_Prestasi` varchar(250) NOT NULL,
  `Keputusan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_r_raport_h`
--

INSERT INTO `tb_r_raport_h` (`ID_Raport`, `S_Spirit`, `S_Sosial`, `ID_Ekskul`, `Ket_Ekskul`, `Saran`, `NISN`, `J_Prestasi`, `K_Prestasi`, `Keputusan`) VALUES
(4, 'Ananda Rezha mampu berdoa, syukur, ibadah, dan toleransi dengan baik.', ' Ananda Rezha , Jujur,disiplin,Percaya Diri,Santun,bergotong royong,dan bertanggung jawab.', 2, 'B', '', '0084812405', '', '                    ', '                    '),
(5, 'Rajin beribadah', 'Mudah berteman', 2, 'Pramuka B', '                ', '0078216178', '', '                    ', '                    ');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_tbl_user`
--
CREATE TABLE `v_tbl_user` (
`id_user` int(11)
,`nama_lengkap` varchar(50)
,`username` varchar(40)
,`password` varchar(32)
,`id_level_user` int(11)
,`foto` text
,`nama_level` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_tbl_user`
--
DROP TABLE IF EXISTS `v_tbl_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tbl_user`  AS  select `tu`.`id_user` AS `id_user`,`tu`.`nama_lengkap` AS `nama_lengkap`,`tu`.`username` AS `username`,`tu`.`password` AS `password`,`tu`.`id_level_user` AS `id_level_user`,`tu`.`foto` AS `foto`,`tlu`.`nama_level` AS `nama_level` from (`tbl_user` `tu` join `tbl_level_user` `tlu`) where (`tu`.`id_level_user` = `tlu`.`id_level_user`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_history_kelas`
--
ALTER TABLE `tbl_history_kelas`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `tbl_jenjang_sekolah`
--
ALTER TABLE `tbl_jenjang_sekolah`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  ADD PRIMARY KEY (`id_level_user`);

--
-- Indexes for table `tbl_sekolah_info`
--
ALTER TABLE `tbl_sekolah_info`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tbl_tahun_akademik`
--
ALTER TABLE `tbl_tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_user_rule`
--
ALTER TABLE `tbl_user_rule`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indexes for table `tbl_walikelas`
--
ALTER TABLE `tbl_walikelas`
  ADD PRIMARY KEY (`id_walikelas`);

--
-- Indexes for table `tb_history_kelas`
--
ALTER TABLE `tb_history_kelas`
  ADD PRIMARY KEY (`ID_History`);

--
-- Indexes for table `tb_m_ekskul`
--
ALTER TABLE `tb_m_ekskul`
  ADD PRIMARY KEY (`ID_Ekskul`);

--
-- Indexes for table `tb_m_guru`
--
ALTER TABLE `tb_m_guru`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `tb_m_kd`
--
ALTER TABLE `tb_m_kd`
  ADD PRIMARY KEY (`ID_KD`);

--
-- Indexes for table `tb_m_kelas`
--
ALTER TABLE `tb_m_kelas`
  ADD PRIMARY KEY (`ID_Kelas`);

--
-- Indexes for table `tb_m_kkm`
--
ALTER TABLE `tb_m_kkm`
  ADD PRIMARY KEY (`ID_KKM`);

--
-- Indexes for table `tb_m_kurikulum`
--
ALTER TABLE `tb_m_kurikulum`
  ADD PRIMARY KEY (`ID_Kurikulum`);

--
-- Indexes for table `tb_m_mapel`
--
ALTER TABLE `tb_m_mapel`
  ADD PRIMARY KEY (`ID_Mapel`);

--
-- Indexes for table `tb_m_rombel`
--
ALTER TABLE `tb_m_rombel`
  ADD PRIMARY KEY (`ID_Rombel`);

--
-- Indexes for table `tb_m_siswa`
--
ALTER TABLE `tb_m_siswa`
  ADD PRIMARY KEY (`NISN`);

--
-- Indexes for table `tb_m_tb_bb`
--
ALTER TABLE `tb_m_tb_bb`
  ADD PRIMARY KEY (`ID_TB_BB`);

--
-- Indexes for table `tb_m_tipe_guru`
--
ALTER TABLE `tb_m_tipe_guru`
  ADD PRIMARY KEY (`ID_Tipe_Guru`);

--
-- Indexes for table `tb_r_absen`
--
ALTER TABLE `tb_r_absen`
  ADD PRIMARY KEY (`ID_Absen`);

--
-- Indexes for table `tb_r_deskripsi`
--
ALTER TABLE `tb_r_deskripsi`
  ADD PRIMARY KEY (`ID_Desk`);

--
-- Indexes for table `tb_r_harian_k_d`
--
ALTER TABLE `tb_r_harian_k_d`
  ADD PRIMARY KEY (`ID_Nilai_H_K_D`);

--
-- Indexes for table `tb_r_n_harian_k_h`
--
ALTER TABLE `tb_r_n_harian_k_h`
  ADD PRIMARY KEY (`ID_Nilai_H_K`);

--
-- Indexes for table `tb_r_n_p_d`
--
ALTER TABLE `tb_r_n_p_d`
  ADD PRIMARY KEY (`ID_P_H_D`);

--
-- Indexes for table `tb_r_n_p_h`
--
ALTER TABLE `tb_r_n_p_h`
  ADD PRIMARY KEY (`ID_P_H`);

--
-- Indexes for table `tb_r_raport_h`
--
ALTER TABLE `tb_r_raport_h`
  ADD PRIMARY KEY (`ID_Raport`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_menu`
--
ALTER TABLE `tabel_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `tbl_history_kelas`
--
ALTER TABLE `tbl_history_kelas`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_jenjang_sekolah`
--
ALTER TABLE `tbl_jenjang_sekolah`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  MODIFY `id_level_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_tahun_akademik`
--
ALTER TABLE `tbl_tahun_akademik`
  MODIFY `id_tahun_akademik` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_user_rule`
--
ALTER TABLE `tbl_user_rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `tbl_walikelas`
--
ALTER TABLE `tbl_walikelas`
  MODIFY `id_walikelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_history_kelas`
--
ALTER TABLE `tb_history_kelas`
  MODIFY `ID_History` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_m_ekskul`
--
ALTER TABLE `tb_m_ekskul`
  MODIFY `ID_Ekskul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_m_kd`
--
ALTER TABLE `tb_m_kd`
  MODIFY `ID_KD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `tb_m_kkm`
--
ALTER TABLE `tb_m_kkm`
  MODIFY `ID_KKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_m_kurikulum`
--
ALTER TABLE `tb_m_kurikulum`
  MODIFY `ID_Kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tb_m_rombel`
--
ALTER TABLE `tb_m_rombel`
  MODIFY `ID_Rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_m_tb_bb`
--
ALTER TABLE `tb_m_tb_bb`
  MODIFY `ID_TB_BB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_m_tipe_guru`
--
ALTER TABLE `tb_m_tipe_guru`
  MODIFY `ID_Tipe_Guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_r_absen`
--
ALTER TABLE `tb_r_absen`
  MODIFY `ID_Absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_r_deskripsi`
--
ALTER TABLE `tb_r_deskripsi`
  MODIFY `ID_Desk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tb_r_harian_k_d`
--
ALTER TABLE `tb_r_harian_k_d`
  MODIFY `ID_Nilai_H_K_D` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `tb_r_n_harian_k_h`
--
ALTER TABLE `tb_r_n_harian_k_h`
  MODIFY `ID_Nilai_H_K` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tb_r_n_p_d`
--
ALTER TABLE `tb_r_n_p_d`
  MODIFY `ID_P_H_D` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `tb_r_n_p_h`
--
ALTER TABLE `tb_r_n_p_h`
  MODIFY `ID_P_H` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tb_r_raport_h`
--
ALTER TABLE `tb_r_raport_h`
  MODIFY `ID_Raport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
