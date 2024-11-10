-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Okt 2020 pada 08.06
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_kesehatan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'cready', 'cready2000', 'Cready Celgie Gildbrandsen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Tensimeter'),
(2, 'Termometer'),
(3, 'Nebulizer'),
(4, 'Timbangan'),
(5, 'Alat Bantu Jalan'),
(6, 'Alat Bantu Dengar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Surabaya', 10000),
(2, 'Sidoarjo', 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'creadycelgie03@gmail.com', 'cready2000', 'Cready Celgie Gildbrandsen', '082230013246', 'Jl. Medokan Asri Utara V/12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(1, 1, 'Tensimeter Digital Omron HEM-7156', 650000, 2, 'tensimeter1.jpg', 'Omron HEM-7156 Merupakan produk tensimeter digital terbaru dari Omron. Akurasi adalah salah satu syarat terpenting dalam pengukuran tekanan darah. Dengan IntelliWrap â„¢ 360 Â°, OMRON HEM-7156 memudahkan Anda mendapatkan pembacaan yang akurat dengan mudah di rumah. Dapatkan akurasi yang sama dengan hasil pembacaan yang Anda lakukan di dokter.'),
(2, 1, 'Tensimeter Digital Yuwell YE660B', 345000, 2, 'tensimeter2.jpg', 'Tensimeter Yuwell YE 660B merupakan tensitemeter digital yang mengukur tekanan darah dan detak jantung pada lengan atas. Tensimeter Yuwell YE 660B dilengkapi dengan fitur-fitur yang menarik salah satunya dengan teknologi intellisense yang memberikan jaminan pengukuran tekanan darah yang akurat,cepat dan nyaman. Pengganti tensi HG di RS.'),
(3, 1, 'Tensimeter Digital Yuwell YE660E', 325000, 2, 'tensimeter3.jpg', 'Yuwell YE660E merupakan tensimeter digital yang dipasang pada lengan bagian atas, Tensimeter ini sudah dilengkapi dengan fitur teknologi intellisense yang memberikan jaminan pengukuran tekanan darah yang akurat, cepat dan nyaman.'),
(4, 1, 'Tensimeter Digital Beurer BM-55 / BM55', 935000, 2, 'tensimeter4.jpg', 'Beurer BM 55 merupakan monitor tekanan darah lengan atas yang menampilkan indikator istirahat yang dipatenkan dengan tambahan layar yang besar putih menyala dan tombol sensor sentuh menonjol memberikan keamanan dan kualitas optimal dengan setiap pengukuran tekanan darah. Berkat antarmuka PC dan kabel USB, pengukuran dapat ditransfer dengan mudah dan nyaman ke PC dan dikelola menggunakan perangkat lunak \"beurer HealthManager\" secara gratis.'),
(5, 1, 'Tensimeter Digital Beurer BM28', 588500, 2, 'tensimeter5.jpg', 'Beurer BM28 merupakan monitor tekanan darah memiliki manset universal yang juga cocok untuk lingkar lengan atas yg lebih besar hinnga 42 cm. Kontrol posisi manset terintegrasi memberi Anda kepastian tambahan tentang keakuratan nilai tekanan darah yang di ukur selama setiap pengukuran.'),
(6, 2, 'Termometer Onemed ThermoONE Alpha 1', 45000, 1, 'termometer1.jpg', 'ThermoONE Alpha 1 merupakan Thermometer Digital (bebas mercury) merk OneMed EKONOMIS, yang mudah digunakan, dan mempunyai akurasi tinggi, Layar LCD lebar, mudah dibaca, waktu pengukuran 60 detik. Ada alarm pada akhir pengukuran suhu dan memori pengukuran terakhir. Mati otomatis sesaat setelah tidak digunakan.'),
(7, 2, 'Termometer Omron MC-245', 58000, 1, 'termometer2.jpg', 'Termometer Digital Omron MC-245 merupakan alat pengukur suhu tubuh dengan layar LCD untuk menampilkan hasil pengukuran yang menawarkan akurasi, keamanan dan kecepatan dalam pengukuran temperatur.'),
(8, 2, 'Termometer Instan Beurer - FT 65', 514000, 1, 'termometer3.jpg', 'Termometer Instan Beurer - FT 65 selain mengukur suhu telinga dan dahi, termometer ini juga dapat mengukur suhu permukaan. Dilengkapi layar LCD yang besar untuk membaca hasil pengukuran, dan terdapat alarm visual untuk temperatur tinggi'),
(9, 2, 'Termometer Digital Kangzhu KD3311', 19000, 1, 'termometer4.jpg', 'Termometer Digital Kangzhu KD3311 / KD-3311 merupakan alat pengukur suhu tubuh dengan layar LCD untuk menampilkan hasil pengukuran yang menawarkan akurasi, keamanan dan kecepatan dalam pengukuran temperatur.'),
(10, 2, 'Termometer Dot Bayi Beurer JFT 20', 180000, 1, 'termometer5.jpg', 'Beurer JFT 20 merupakan termometer Dot memberikan pengukuran Pengukuran suhu lembut di dalam mulut, Ideal untuk bayi dan balita, dengan desain yang praktis dan higienis.'),
(11, 3, 'Masker CPR Pocket + Tube Resusitator', 74000, 1, 'nebulizer1.jpg', 'Masker CPR Pocket Resuscitator - Alat Resusitasi Mini CPR dirancang untuk bantu pernafasan dari mulut ke mulut. Katup satu arah dan arah diafragma, memungkinkan tidak ada aliran balik dari udara atau kontaminan dari pasien ke penyelamat.'),
(12, 3, 'Nebulizer ABN CN-09 - Compressor', 410000, 1, 'nebulizer2.jpg', 'Nebulizer ABN CN-09 - Compressor Nebulizer memiliki bentuk yang compat dan mudah di gunakan untuk semua usia dari anak-anak sampai dengan lansia. cocok juga digunakan di rumah. Dengan model yang ringkas secara efektif dapat memberikan terapi aerosol yang nyaman untuk pengguna. Nebulizer ini mampu menghasilkan partikel berukuran antara 0,5 sd 5 micron'),
(13, 3, 'Oxycan 500cc Oksigen Portable', 60000, 2, 'nebulizer3.jpg', 'OXYCAN - Oksigen Portable 500 cc lengkap dengan tutup sebagai masker oksigen yang mudah digunakan dan praktis dibawa kemana saja.'),
(14, 3, 'Nebulizer Family Dr TD-7001', 595000, 2, 'nebulizer4.jpg', 'Nebulizer Family Dr TD-7001 merupakan nebulizer ultrasonik dengan Teknologi Micro Electro Mesh System (MEMS) yang dapat meminimalisasi obat terbuang dalam nebulasi. Nebulizer Family Dr TD-7001 berukuran ringkas dan memiliki desain ergonomis sehingga nyaman untuk dipegang dan mudah untuk dibawa bepergian.'),
(15, 3, 'Nebulizer Omron NE-C101', 452000, 2, 'nebulizer5.jpg', 'Nebulizer Omron NE-C101 merupakan alat yang digunakan untuk terapi gangguan pernapasan. Dengan waktu terapi yang lebih efisien, membuat nebulizer Omron NE-C101 pilihan yang tepat untuk terapi pernapasan dirumah. Perawatan yang cepat sekaligus dapat diandalkan untuk Anda dan orang yang Anda cintai.'),
(16, 4, 'Timbangan Digital Beurer GS 340 XXL', 1360000, 2, 'timbangan1.jpg', 'Beurer GS 340 XXL merupakan Timbangan digital yang ramping dan elegan berwarna putih cemerlang. Terbuat dari kaca ekstra lebar ini merupakan aksesoris kamar mandi yang sempurna'),
(17, 4, 'Timbangan Badan Manual Beurer MS 01', 504000, 3, 'timbangan2.jpg', 'Beurer MS01 merupakan timbangan badan manual dengan desain klasik yang cocok untuk kamar mandi Anda. Timbangan ini memiliki tampilan dengan analog yang mudah dibaca serta permukaannya yang non-slip'),
(18, 4, 'Timbangan Digital GEA EB9350', 140000, 2, 'timbangan3.jpg', 'Timbangan Digital GEA - EB9350 merupakan timbangan digital dengan presisi tinggi dan di-desain dengan elegan dan bentuk yang slim, namun memiliki ketahanan sampai dengan 150 Kg.'),
(19, 4, 'Timbangan Digital GEA - EB9063', 140000, 2, 'timbangan4.jpg', 'Timbangan Digital GEA - EB9063 merupakan timbangan digital dengan presisi tinggi dan di-desain dengan elegan dan bentuk yang slim, namun memiliki ketahanan sampai dengan 150 Kg.'),
(20, 4, 'Timbangan Analog Laica PS2022 ', 290000, 3, 'timbangan5.jpg', 'Laica PS2022 merupakan timbangan analog dengan desain yang praktis dan akurat'),
(21, 5, 'Kursi Roda GEA FS 908 LJ', 2100000, 14, 'alatbantujalan1.jpg', 'Kursi Roda GEA FS908 LJ merupakan kursi roda dengan bahan alumunium yang mudah digunakan. Dilengkapi dengan rem belakang sehingga pendorong dapat mudah mengatur jalannya kursi roda. Dengan lebar tempat duduk kurang lebih 46cm kursi roda ini mampu menopang berat hingga 100kg.'),
(22, 5, 'Kursi Roda GEA FS955 L', 2580000, 16, 'alatbantujalan2.jpg', 'Kursi Roda GEA FS955 merupakan kursi roda alumunium dengan kerangka yang dapat disesuaikan, artinya ketinggian tempat duduk dapat rendahkan atau di tinggikan. Dengan bahan kerangka alumunium sehingga dapat dibawa kemana-mana serta mudah untuk dilipat. Dengan sandaran tangan yang dapat diangkat keatas memungkinkan pengguna untuk bergerak kesamping untuk masuk atau keluar dari kursi roda.'),
(23, 5, 'Kursi Roda Avico Apollo', 1750000, 11, 'alatbantujalan3.jpg', 'Kursi Roda Avico Apollo merupakan kursi roda terbuat dari bahan alumunium berkualitas serta desain yang praktis dan ringan sehingga nyaman untuk digunakan, Dilengkapi dengan sandaran tangan dan dudukan yang lebih luas untuk memberikan kenyamanan bagi pengguna.'),
(24, 5, 'Kursi Roda Avico Garuda E (Standard)', 924000, 17, 'alatbantujalan4.jpg', 'Avico Garuda E (Standard) merupakan kursi roda berkualitas dengan desain yang praktis dan ekonomis, terbuat dari material besi cocok untuk penggunaan pribadi, klinik atau rumah sakit. Dapat dilipat dengan mudah serta bisa di masukan kedalam bagasi mobil.'),
(25, 5, 'Kursi Roda GEA FS802-35', 1100000, 15, 'alatbantujalan5.jpg', 'Kursi Roda GEA FS802-35 merupakan kursi roda yang praktis dan ekonomis di gunakan untuk alat bantu jalan pada saat bepergian, dengan bahan yang berkualitas dan kokoh serta dilengkapi dengan sandaran tangan dan kaki sehingga nyaman untuk digunakan.'),
(26, 6, 'Alat Bantu Dengar Beurer HA 20', 420000, 1, 'alatbantudengar1.jpg', 'Beurer Alat Bantu Dengar HA20 - Tanpa Kabel digunakan untuk orang yang menderita kemampuan pendengaran terbatas sangat cocok memakai alat ini. Dapat secara individual disesuaikan dengan saluran telinga. Dapat memperkuat volume semua suara didalam dan di luar ruangan.'),
(27, 6, 'Alat Bantu Dengar Beurer HA 50', 462000, 1, 'alatbantudengar2.jpg', 'Beurer Alat Bantu Dengar HA 50 - Tanpa Kabel yang merupakan penguat pendengaran ini sangat ergonomis dan hampir tidak kelihatan dibelakang telinga. Membantu orang dengan kemampuan pendengaran terbatas. Volume suara dapat diperkuat baik didalam dan diluar ruangan.'),
(28, 6, 'Alat Bantu Dengar SR-SA101', 149000, 1, 'alatbantudengar3.jpg', 'Hearing Aid SR-SA101 merupakan alat bantu pendengaran yang akan membantu Anda untuk dapat melakukan aktivitas sehari hari dengan memberikan suara yang jernih. Alat bantu dengar ini memiliki penguatan bunyi 50dB dengan kebisingan input 30 dB. ABD ini dilengkapi dengan pengaturan volume sehingga anda dapat mengatur besar kecil suara. Baterai : Renata PR48');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
