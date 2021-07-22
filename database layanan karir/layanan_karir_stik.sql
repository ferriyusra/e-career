-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2021 at 06:37 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `layanan_karir_stik`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `judul_berita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_berita` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `kategori_id`, `judul_berita`, `slug`, `isi_berita`, `gambar`, `created_at`, `updated_at`) VALUES
(4, 3, 'pelatihan mikrotik dan android', 'pelatihan-mikrotik-dan-android', '<p>ini merupakan pelatihan mikrotik dan android<br></p>', 'assets/berita/aoX7jScXumWNRjtUi3CmdssBXSeZoXAaY5nlX1Of.jpg', '2021-07-03 10:53:47', '2021-07-04 09:00:48'),
(5, 4, 'test tesss', 'test-tesss', '<p>test<br></p>', 'assets/berita/pST9OSFNtISERikKPrYvakEMZDwgdvK6pq7oph3v.jpg', '2021-07-03 11:33:09', '2021-07-03 11:33:09'),
(6, 3, 'tes seminar satu', 'tes-seminar-satu', '<p>test isi seminar satu<br></p>', 'assets/berita/sJ4OSH0lyqC0k411LbKwvuJqPJnVKOCXZ2jkq1DL.jpg', '2021-07-04 08:08:11', '2021-07-04 08:08:11'),
(8, 4, 'tesssssssss', 'tesssssssss', '<p>ttttttttttttttttttttttt<br></p>', 'assets/berita/c2mpPoIxNRoG7FcBcvptdY7qg6T0CgVafNusSkFF.jpg', '2021-07-04 09:05:59', '2021-07-04 09:05:59'),
(9, 4, 'pelatihan web', 'pelatihan-pelatihan', '<p>isi pelatihan<br></p>', 'assets/berita/iqZFH85ZHM6TTKSALsSeQ81ZKmiHUdacpn5j4plw.jpg', '2021-07-04 09:27:34', '2021-07-04 09:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeri_kegiatan`
--

CREATE TABLE `galeri_kegiatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_kegiatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeri_kegiatan`
--

INSERT INTO `galeri_kegiatan` (`id`, `judul_kegiatan`, `isi_kegiatan`, `gambar`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'kunjungan industri', '<p>ini merupakan kunjungan inudstri pada pt xyz<br></p>', 'assets/galeri-kegiatan/T4qNwjyXekOUOUYkypmiT3309HfF9Tt5zXFnlEdF.jpg', 'kunjungan-industri', '2021-07-03 14:15:58', '2021-07-03 14:15:58'),
(3, 'kegiatan seminar tracer study 2018', '<p>ini merupakan kegiatan seminar workshop tracer study<br></p>', 'assets/galeri-kegiatan/NVI7iUUF0Z2vx6ShtAeGBFuYVltywL3ULcRwYMZ8.jpg', 'kegiatan-seminar-tracer-study-2018', '2021-07-04 03:51:46', '2021-07-04 03:51:46'),
(4, 'pelatihan android', '<p>ini merupakan kegiatan pelatihan android<br></p>', 'assets/galeri-kegiatan/Pv3PlxDBi0qgci6AhRQ6sQYaqr9BxtJByNGa67HD.jpg', 'pelatihan-android', '2021-07-04 04:04:05', '2021-07-04 04:04:05'),
(5, 'kegiatan seminar IT Career Exposure', '<p>kegiatan seminar IT Career di kampus STMIK Jakarta STI&amp;K<br></p>', 'assets/galeri-kegiatan/jL5f9putzoBUrbtGRNPoiUz2XeHGJx8MiXbsBlU8.jpg', 'kegiatan-seminar-it-career-exposure', '2021-07-04 04:04:50', '2021-07-04 04:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id` int(10) UNSIGNED NOT NULL,
  `kategori_berita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id`, `kategori_berita`, `created_at`, `updated_at`) VALUES
(3, 'Seminar', '2021-06-28 11:54:03', '2021-07-04 09:48:27'),
(4, 'Pelatihan', '2021-07-03 10:36:24', '2021-07-04 09:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner_jawaban`
--

CREATE TABLE `kuisioner_jawaban` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kuisioner` int(10) UNSIGNED NOT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuisioner_jawaban`
--

INSERT INTO `kuisioner_jawaban` (`id`, `id_kuisioner`, `jawaban`, `created_at`, `updated_at`) VALUES
(1, 5, 'ya aw', NULL, '2021-07-01 14:38:43'),
(2, 5, 'tidak aw', NULL, '2021-07-01 14:31:24'),
(3, 6, 'biaya sendiri atau keluarga', '2021-07-01 12:58:50', '2021-07-01 12:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perusahaan_id` int(10) UNSIGNED NOT NULL,
  `lokasi_detail_lowongan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_lowongan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi_lowongan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kualifikasi_lowongan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cara_melamar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rentang_gaji_min` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rentang_gaji_max` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendaftaran_mulai` date NOT NULL,
  `pendaftaran_akhir` date NOT NULL,
  `url_lamaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`id`, `perusahaan_id`, `lokasi_detail_lowongan`, `deskripsi_lowongan`, `posisi_lowongan`, `tipe_pekerjaan`, `kualifikasi_lowongan`, `cara_melamar`, `rentang_gaji_min`, `rentang_gaji_max`, `pendaftaran_mulai`, `pendaftaran_akhir`, `url_lamaran`, `slug`, `created_at`, `updated_at`) VALUES
(7, 1, 'yogyakarta', '<p style=\"\" align=\"left\">We are looking for a Full-stack Software Developer for https://paperlust.co/ to build and maintain functional web pages and applications.<br><br>As a Full Stack Software Developer, you must be able to develop a great frontend view with animation with multiple device support (responsive design), and also you must be able to work on the backend often under tight deadlines.<br><br>You must also be highly organized with a strong growth mindset, time-management, multi-tasking, planning, and prioritization skills with a high degree of adaptability and solid problem-solving abilities to create a great product.</p><p style=\"\" align=\"left\"><b>Salary : Negoitable</b><br></p>', 'full stack developer', 'Pekerja Tetap', '<ul><li>Excellent interpersonal, communication, and leadership skills whilst working with a range of people in a strong \"team-based\" environment</li><li>Advanced skills in frontend (HTML, CSS, JavaScript) and backend (PHP)</li><li>Great understanding of framework/ CMS based engine like Laravel and Codelgniter</li><li>Great understanding of object-oriented programming</li><li>Highly put attention to detail with a thorough understanding of design and typography</li><li>Working alongside designers, you will need to have an understanding of basic photoshop skill and UI/ UX</li><li>Familiarity with Version Control (Git)</li><li>Familiarity with databases (MySQL, MongoDB)</li><li>Excellent communication and teamwork skills</li><li>Understand the JavaScript framework Node.js, Vue.js is considered a plus</li><li>Understanding Cloud-Based Infrastructures (Amazon Web Services) considered a plus<br></li></ul>', '<p><span class=\"FYwKg _2Bz3E C6ZIU_0 _6ufcS_0 _2DNlq_0 _29m7__0\">Klik link lamaran dibawah ini untuk informasi pengiriman lowongan.<br></span></p>', '12000000', '15000000', '2021-07-01', '2021-07-03', 'https://www.jobstreet.co.id/en/job-search/laravel-web-developer-jobs/', 'web-developer-1', '2021-07-01 05:40:44', '2021-07-04 13:04:08'),
(8, 1, 'jakarta', '<p>deskripsi<br></p>', 'backend developer', 'Pekerja Tetap', '<p>kualifikasi Lowonga </p>', '<p>cara<br></p>', '5000000', '8000000', '2021-07-04', '2021-07-31', 'tidak ada', 'backend-developer-1', '2021-07-04 04:29:42', '2021-07-04 04:29:42'),
(9, 2, 'jakarta', '<p>Application Developer adalah posisi di Corporate System Specialist yang bertugas mengembangkan aplikasi-aplikasi untuk corporate.<br></p>', 'Junior Application Developer', 'Pekerja Tetap', '<ul><li>Pendidikan D3/S1 IPK minimal 3.00</li></ul><ul><li>Memiliki Analisa dan Logika yang baik</li></ul><ul><li>Mampu bekerja secara tim maupun individu</li></ul><ul><li>Tanggung jawab, jujur, dan teliti</li></ul><ul><li>Menguasai bahasa pemrograman PHP (native, menguasai Framework CodeIgniter, Flutter merupakan nilai tambah), HTML, CSS, JavaScript, JQuery</li></ul><ul><li>Menguasai database MySQL/MariaDB, SQL Server</li></ul><ul><li>Pengalaman membuat aplikasi web minimal 1 tahun</li></ul><ul><li>Nilai plus untuk yang menguasai di bidang API, PostgreSQL, Python, MongoDB<br></li></ul>', '<p>klik tombol dibawah ini untuk informasi lengkap pendaftaran lowongan<br></p>', '4000000', '7000000', '2021-07-04', '2021-07-31', 'https://career.bankmega.com/index.php/welcome/jobdetail/jad', 'junior-application-developer-2', '2021-07-04 05:27:57', '2021-07-04 12:00:52'),
(10, 2, 'bandung', '<p>test<br></p>', 'laravel junior developer', 'Pekerja Tetap', '<p>test<br></p>', 'kirim ke email tidak ada link daftar<br>', '4000000', '6000000', '2021-07-04', '2021-07-31', 'tidak ada', 'laravel-junior-developer-2', '2021-07-04 11:41:43', '2021-07-04 13:38:00'),
(11, 1, 'tangerang', '<p>test<br></p>', 'mobile developer flutter', 'Pekerja Tetap', '<p>testt<br></p>', '<p>estt<br></p>', '5000000', '6500000', '2021-07-04', '2021-07-31', 'tidak ada', 'mobile-developer-flutter-1', '2021-07-04 11:42:55', '2021-07-04 11:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(128, '2014_10_12_000000_create_users_table', 1),
(129, '2014_10_12_100000_create_password_resets_table', 1),
(130, '2019_08_19_000000_create_failed_jobs_table', 1),
(131, '2021_06_26_143239_add_roles_field_to_users_table', 1),
(144, '2021_06_28_165641_create_kategori_berita_table', 4),
(146, '2021_06_28_165712_create_berita_table', 5),
(159, '2021_06_29_191420_create_perusahaan', 6),
(162, '2021_06_29_191903_create_sosmed_perusahaan_table', 7),
(170, '2021_06_29_200554_create_loker_table', 8),
(171, '2021_07_01_140240_create_soal_kuisioner_table', 9),
(172, '2021_07_01_183951_create_kuisioner_jawaban_table', 10),
(173, '2021_07_03_145559_create_tentang_layanan_karir', 11),
(174, '2021_07_03_204343_create_galeri_kegiatan', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tentang_perusahaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama_perusahaan`, `tentang_perusahaan`, `lokasi_perusahaan`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'PT Lumonata', '<p><span class=\"FYwKg _2Bz3E C6ZIU_0 _6ufcS_0 _2DNlq_0 _29m7__0\">Lumonata \r\nis an independent design and development studio based in Kuta, Bali, \r\nIndonesia. Started in 2006 and formally established in 2007, we offer \r\nwide range of services in the field of&nbsp;website design,&nbsp;website \r\ndevelopment,&nbsp;web application,&nbsp;graphic design,&nbsp;identity \r\ndesign&nbsp;and&nbsp;digital marketing. We have worked with clients from around \r\nthe globe and strive on delivering works that help our clients to reach \r\ntheir goal through long terms collaboration. <br></span></p>', 'kuta', 'assets/perusahaan/tXVF1oMi2oH5oCq1WgSKqJ0vnbQy2wYdY7UkjGql.jpg', '2021-06-29 12:16:08', '2021-07-04 05:13:50'),
(2, 'bank mega', 'Di Kawasan Terpadu CT Corp kami sediakan fasilitas One Stop Financial Services atau yang lebih dikenal dengan sebutan \"Financial Supermarket\", dimana terdapat bank umum PT. Bank Mega Tbk., PT. Bank Syariah Mega Indonesia, PT. Mega Capital Indonesia, PT. Asuransi Jiwa MegaLife dan PT. Asuransi Umum Mega (Mega Insurance), dan lainnya.<br><br>Di Bank Mega anda dapat melakukan transaksi perbankan lebih mudah, cepat dan nyaman dengan sistem komputerisasi dan teknologi yang canggih, sehingga jaringan online antar cabang terintegrasi dengan baik. Bagi nasabah utama, kami menyediakan Priority Banking, Mega First dengan priority facilities yang diutamakan untuk kepuasan dengan jaminan keamanan yang tinggi.<br><br>Banking Hall - Kantor Cabang Utama, Jakarta Tendean terletak di lantai 1 Menara Bank Mega. Tersedia pula Safe Deposit Box yang memiliki kapasitas memadai dengan jaminan sistem keamanan yang canggih. Kami sediakan ATM yang beroperasi selama 24 jam sehari dan &amp; hari dalam seminggu untuk kemudahan transaksi perbankan dan juga penarikan tunai.<br><br>Untuk memperluas layanan nasabah, Bank Mega juga memiliki Treasury Room di lantai 16. Dalam mengembangkan Sumber Daya Manusia (SDM) disediakan Training Center di lantai 12 untuk berbagai pelatihan dengan fasilitas yang lengkap dan modern.', 'jakarta', 'assets/perusahaan/0YB0qo6rMokr11xHTsVNxMi4fd4NBawVOays6H1Z.jpg', '2021-07-04 05:13:42', '2021-07-04 05:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `soal_kuisioner`
--

CREATE TABLE `soal_kuisioner` (
  `id` int(10) UNSIGNED NOT NULL,
  `soal_kuisioner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_soal` tinyint(1) NOT NULL,
  `jawaban_lain` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soal_kuisioner`
--

INSERT INTO `soal_kuisioner` (`id`, `soal_kuisioner`, `tipe_soal`, `jawaban_lain`, `created_at`, `updated_at`) VALUES
(5, 'apakah anda telah mendapatkan pekerjaan <= 6 bulan / termasuk bekerja sebelum lulus ?', 1, 1, '2021-07-01 09:42:19', '2021-07-01 12:20:42'),
(6, 'sebutkan sumber dana dalam pembiayaan kuliah anda', 1, 0, '2021-07-01 11:29:48', '2021-07-01 11:32:11'),
(7, 'berapa bulan anda telah mendapatkan pekerjaan setelah atau sebelum lulus ?', 0, 1, '2021-07-01 11:30:16', '2021-07-01 11:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `sosmed_perusahaan`
--

CREATE TABLE `sosmed_perusahaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perusahaan_id` int(10) UNSIGNED NOT NULL,
  `url_sosial_media` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_sosial_media` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tentang_layanankarir`
--

CREATE TABLE `tentang_layanankarir` (
  `id` int(10) UNSIGNED NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tentang_layanankarir`
--

INSERT INTO `tentang_layanankarir` (`id`, `visi`, `misi`, `tujuan`, `created_at`, `updated_at`) VALUES
(1, '<p><b>Menjadi pusat pengembangan karir yang mampu menghasilkan lulusan yang unggul dibidangnya dan dapat mengikuti perkembangan ilmu pengetahuan dan teknologi terhadap dunia kerja di era global.</b><br></p>', '<ol><li>Sebagai mediator antara mahasiswa dan Alumni STMIK JAKARTA STI&amp;K dengan perusahaan/institusi.</li><li>Mengelola penyebaran Informasi lowongan ketenagakerjaan untuk memenuhi kebutuhan mahasiswa dan alumni.</li><li>Menyelenggarakan kegiatan yang berhubungan dengan pengembangan karir dengan memberikan seminar karir yang bertujuan untuk menghasilkan Alumni yang siap kerja dan selalu dicari oleh perusahaan/institusi.</li><li>Meningkatkan keterserapan lulusan STMIK JAKARTA STI&amp;K dalam dunia kerja dengan masa tunggu untuk memperoleh pekerjaan yang relatif pendek.</li><li>Membangun jejaring kerja sama dengan dunia kerja.</li></ol><p><b>Maksud :</b></p><ol><li>Mempersiapkan mahasiswa dalam menghadapi persaingan dunia kerja</li><li>Mengelola dan memberdayakan peluang karir</li><li>Menjalin kerjasama yang berkesinambungan dengan dunia industry</li><li>Melakukan pendampingan kepada mahasiswa/alumni dan dunia kerja dalam perekrutan SDM</li><li>Menyampaikan informasi lowongan pekerjaan bagi mahaiswa dan alumni</li><li>Memenuhi kebutuhan stakeholder untuk publikasi lowongan kerja<br></li></ol>', '<p><b>Sebagai fasilitator dan mediator dalam hal persiapan, penempatan dan pengembangan karier bagi mahasiswa dan alumni STMIK JAKARTA STI&amp;K.<br></b></p>', '2021-07-03 09:47:12', '2021-07-03 10:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`) VALUES
(1, 'admin_layanan_karir', 'admin_layanan_karir@gmail.com', '2021-06-28 06:13:09', '$2y$10$tx3hsVtqTtid6BXrCKE6iOz55SMr1RQJd2gL2pLCQXlf1yiUdgJoe', NULL, '2021-06-28 06:12:37', '2021-06-28 06:13:09', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri_kegiatan`
--
ALTER TABLE `galeri_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuisioner_jawaban`
--
ALTER TABLE `kuisioner_jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kuisioner_jawaban_id_kuisioner_foreign` (`id_kuisioner`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loker_perusahaan_id_foreign` (`perusahaan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal_kuisioner`
--
ALTER TABLE `soal_kuisioner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sosmed_perusahaan`
--
ALTER TABLE `sosmed_perusahaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sosmed_perusahaan_url_sosial_media_unique` (`url_sosial_media`),
  ADD KEY `sosmed_perusahaan_perusahaan_id_foreign` (`perusahaan_id`);

--
-- Indexes for table `tentang_layanankarir`
--
ALTER TABLE `tentang_layanankarir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeri_kegiatan`
--
ALTER TABLE `galeri_kegiatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kuisioner_jawaban`
--
ALTER TABLE `kuisioner_jawaban`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `soal_kuisioner`
--
ALTER TABLE `soal_kuisioner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sosmed_perusahaan`
--
ALTER TABLE `sosmed_perusahaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tentang_layanankarir`
--
ALTER TABLE `tentang_layanankarir`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_berita` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kuisioner_jawaban`
--
ALTER TABLE `kuisioner_jawaban`
  ADD CONSTRAINT `kuisioner_jawaban_id_kuisioner_foreign` FOREIGN KEY (`id_kuisioner`) REFERENCES `soal_kuisioner` (`id`);

--
-- Constraints for table `loker`
--
ALTER TABLE `loker`
  ADD CONSTRAINT `loker_perusahaan_id_foreign` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`);

--
-- Constraints for table `sosmed_perusahaan`
--
ALTER TABLE `sosmed_perusahaan`
  ADD CONSTRAINT `sosmed_perusahaan_perusahaan_id_foreign` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
