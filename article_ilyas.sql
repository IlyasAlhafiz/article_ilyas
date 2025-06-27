-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2025 at 10:47 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `article_ilyas`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` bigint UNSIGNED NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` bigint UNSIGNED NOT NULL,
  `id_penulis` bigint UNSIGNED NOT NULL,
  `tentang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `gambar`, `judul`, `slug`, `konten`, `id_kategori`, `id_penulis`, `tentang`, `created_at`, `updated_at`) VALUES
(4, '5745Tehnik Pencahayaan Alami.jpg', 'Teknik Pencahayaan Alami untuk Foto Outdoor', 'teknik-pencahayaan-alami-untuk-foto-outdoor', 'Fotografi outdoor sangat bergantung pada pencahayaan alami, terutama dari sinar matahari. Cahaya alami memiliki karakter yang berbeda tergantung waktu pengambilan gambar. Misalnya, pada golden hour—yaitu satu jam setelah matahari terbit dan satu jam sebelum matahari terbenam—cahaya cenderung lebih lembut dan keemasan, menciptakan nuansa yang dramatis dan hangat pada hasil foto. Sementara itu, pada midday light atau cahaya tengah hari, pencahayaan menjadi keras dan dapat menimbulkan bayangan tajam. Untuk mengatasi hal ini, fotografer dapat menggunakan reflektor untuk memantulkan cahaya ke subjek atau mencari tempat teduh untuk mendapatkan pencahayaan yang lebih merata. Selain itu, penggunaan teknik backlight, di mana sumber cahaya berada di belakang subjek, dapat menghasilkan siluet yang artistik. Dalam memotret pemandangan alam atau potret manusia, memahami arah dan kualitas cahaya sangat krusial. Artikel ini juga membahas tentang penggunaan white balance untuk menyesuaikan temperatur warna, serta bagaimana mengatur eksposur secara manual agar tidak overexposed.', 4, 3, 'Panduan praktis untuk fotografer pemula dalam memanfaatkan cahaya alami.', '2025-04-29 17:50:07', '2025-06-01 05:36:07'),
(6, '3263Tips Video cinematic hp.jpg', 'Tips Membuat Video Cinematic dengan Kamera HP', 'tips-membuat-video-cinematic-dengan-kamera-hp', 'Seiring perkembangan teknologi, kamera pada smartphone kini memiliki kualitas yang luar biasa, bahkan bisa mendekati kualitas kamera profesional. Untuk menghasilkan video cinematic dengan kamera HP, ada beberapa hal penting yang harus diperhatikan. Pertama adalah **stabilitas**, karena video yang goyang akan mengurangi kesan profesional. Gunakan tripod atau gimbal untuk hasil lebih halus. Kedua, **pencahayaan**. Meskipun kamera HP bisa bekerja di kondisi low-light, hasilnya akan lebih maksimal jika pencahayaan cukup. Gunakan lampu tambahan atau manfaatkan cahaya alami secara efektif. Ketiga, **pengaturan manual**. Beberapa aplikasi kamera seperti Filmic Pro atau Open Camera memungkinkan kontrol ISO, shutter speed, dan white balance secara manual, yang sangat penting untuk efek sinematik. Keempat, **komposisi** dan **warna**. Gunakan teknik framing seperti rule of thirds dan tone warna yang konsisten. Proses color grading saat editing juga penting agar video memiliki kesan emosional. Terakhir, jangan lupa untuk memperhatikan aspek **suara**, karena audio berkualitas rendah akan sangat mengganggu. Gunakan mic eksternal jika memungkinkan, dan rekam audio dalam format terpisah untuk hasil optimal.', 6, 1, 'Tips praktis membuat video cinematic menggunakan kamera ponsel.', '2025-05-07 05:11:14', '2025-06-01 05:36:17'),
(7, '7783Memahami Rule Of Third.jpg', 'Memahami Komposisi Rule of Thirds dalam Fotografi', 'memahami-komposisi-rule-of-thirds-dalam-fotografi', 'Rule of Thirds adalah prinsip dasar dalam komposisi fotografi yang sangat populer dan mudah dipahami oleh fotografer pemula maupun profesional. Prinsip ini melibatkan pembagian bidang gambar menjadi sembilan bagian yang sama besar dengan dua garis horizontal dan dua garis vertikal. Titik pertemuan garis-garis tersebut disebut titik kuat, tempat yang ideal untuk meletakkan subjek utama. Teknik ini memberikan keseimbangan visual dan menjadikan gambar lebih menarik secara estetika. Misalnya, dalam fotografi potret, mata subjek sering kali diletakkan pada salah satu titik kuat. Dalam fotografi landscape, cakrawala bisa ditempatkan pada sepertiga atas atau bawah frame untuk menciptakan harmoni. Selain itu, rule of thirds juga mendorong fotografer untuk berpikir lebih kreatif dalam menyusun elemen visual. Meskipun aturan ini efektif, penting juga untuk tahu kapan harus melanggarnya. Terkadang, simetri atau komposisi sentral justru memberikan efek yang lebih kuat, tergantung pada konteks dan pesan yang ingin disampaikan. Dalam artikel ini juga dibahas beberapa contoh visual dan latihan praktis agar pembaca dapat memahami dan menerapkan rule of thirds dalam berbagai situasi pemotretan.', 4, 1, 'Penjelasan konsep komposisi Rule of Thirds dalam dunia fotografi.', '2025-05-07 05:11:43', '2025-06-01 05:36:36'),
(14, '1662Tehnik Slow Motion.jpg', 'Teknik Slow Motion untuk Video Dokumenter', 'teknik-slow-motion-untuk-video-dokumenter', 'Slow motion adalah salah satu teknik yang sering digunakan dalam videografi dokumenter untuk memperkuat emosi atau menekankan momen tertentu. Teknik ini dilakukan dengan merekam video pada frame rate yang tinggi, seperti 60fps, 120fps, atau bahkan lebih tinggi, kemudian diputar kembali dengan kecepatan normal. Hasilnya adalah gerakan yang lebih lambat dari aslinya, memungkinkan penonton menangkap detail yang biasanya terlewat. Dalam dokumenter, slow motion sering digunakan untuk memperlihatkan ekspresi wajah, gerakan tubuh, atau momen alam seperti tetesan air atau hembusan angin. Teknik ini membutuhkan peralatan yang mendukung high frame rate, serta pencahayaan yang cukup karena pada frame rate tinggi, sensor membutuhkan lebih banyak cahaya. Dalam proses editing, software seperti Adobe Premiere Pro atau Final Cut Pro digunakan untuk mengatur kecepatan playback, menambahkan efek transisi, dan menyempurnakan warna agar hasilnya cinematic. Namun perlu diperhatikan bahwa penggunaan slow motion harus proporsional dan sesuai konteks. Jika digunakan secara berlebihan, justru bisa mengurangi kekuatan narasi. Oleh karena itu, penting bagi videografer untuk memahami kapan dan bagaimana slow motion digunakan secara efektif.', 6, 3, 'Penggunaan slow motion dalam videografi dokumenter.', '2025-05-25 06:40:33', '2025-05-25 06:40:33'),
(15, '7021Foto Landscape dengan Adobe.jpg', 'Editing Foto Landscape dengan Adobe Lightroom', 'editing-foto-landscape-dengan-adobe-lightroom', 'Adobe Lightroom adalah salah satu software editing foto yang paling banyak digunakan oleh fotografer profesional, terutama dalam genre landscape. Software ini menyediakan berbagai alat canggih untuk memperbaiki pencahayaan, warna, ketajaman, dan komposisi foto. Dalam fotografi landscape, tantangan utama adalah menangkap keindahan alam dengan cara yang dramatis namun tetap natural. Artikel ini membahas langkah-langkah penting dalam mengedit foto landscape. Pertama, gunakan fitur *Basic* untuk mengatur exposure, contrast, highlights, dan shadows. Gunakan *Clarity* dan *Dehaze* untuk mempertegas elemen seperti awan dan kabut. Kedua, manfaatkan *Tone Curve* untuk mengontrol kontras secara lebih detail, serta *HSL/Color* untuk mengatur rona dan saturasi warna tertentu, misalnya membuat langit lebih biru atau daun lebih hijau. Ketiga, gunakan *Graduated Filter* atau *Radial Filter* untuk mengedit bagian tertentu dari gambar, seperti membuat langit lebih gelap dan tajam tanpa mempengaruhi tanah. Terakhir, *Sharpening* dan *Noise Reduction* penting untuk memastikan gambar tetap tajam namun bebas dari noise. Artikel ini juga memberikan beberapa preset yang dapat diunduh dan digunakan sebagai titik awal.', 4, 3, 'Panduan edit foto landscape menggunakan Adobe Lightroom.', '2025-05-25 06:41:15', '2025-05-25 06:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `deskripsi_kategori`, `slug`, `gambar_kategori`, `created_at`, `updated_at`) VALUES
(4, 'Fotografi', 'Ini adalah halaman kategori fotografi', 'fotografi', '2631120 Epic Links That Will Cement The Fundamentals Of Photography In Your Mind.jpeg', '2025-04-29 17:49:40', '2025-05-22 08:45:25'),
(6, 'VideoGrafi', 'Ini adalah halaman kategori videografi', 'videografi', '3185Best video production companies in London 2021.jpg', '2025-05-07 05:58:57', '2025-05-22 23:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` bigint UNSIGNED NOT NULL,
  `id_artikel` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `isi_komentar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `id_artikel`, `id_user`, `isi_komentar`, `created_at`, `updated_at`) VALUES
(4, 4, 2, 'artikel yang bagus', '2025-04-29 17:50:15', '2025-04-29 18:11:16'),
(5, 6, 2, 'Bagaimana Caranya', '2025-05-07 05:38:09', '2025-05-25 06:46:03'),
(6, 7, 2, 'hi', '2025-05-07 06:50:11', '2025-05-07 06:50:11'),
(7, 4, 2, 'mantap', '2025-05-07 18:33:45', '2025-05-07 18:33:45'),
(14, 6, 2, 'Bagus Sekali Artikelnya', '2025-05-22 19:53:39', '2025-05-25 06:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_04_18_012640_create_kategori_table', 1),
(6, '2025_04_25_145552_create_penulis_table', 1),
(7, '2025_04_25_145608_create_artikel_table', 1),
(8, '2025_04_25_150028_create_komentar_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_profil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id`, `nama`, `slug`, `email`, `foto_profil`, `created_at`, `updated_at`) VALUES
(1, 'Ilyas', 'ilyas', 'ilyas2@gmail.com', '8065foto profil 1.jpg', '2025-04-29 06:25:28', '2025-06-01 05:35:50'),
(3, 'Jason', 'Jason', 'Jason1@gmail.com', '7990foto profil 2.jpg', '2025-05-13 23:45:30', '2025-05-25 06:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$ma41VG5DaC7/lKiAOIu.g.bZj8uK5YS/k9HmxO2wd/uJovMPplMgy', 1, NULL, '2025-04-29 06:24:30', '2025-04-29 06:24:30'),
(2, 'ilyas', 'ilyas2@gmail.com', NULL, '$2y$10$8rtwZrt4z9gYmI6LQbPGGOtzG1c918ivM5W2eod4ia8bSl8vY55LO', 0, NULL, '2025-04-29 08:56:35', '2025-04-29 08:56:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikel_id_kategori_foreign` (`id_kategori`),
  ADD KEY `artikel_id_penulis_foreign` (`id_penulis`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentar_id_artikel_foreign` (`id_artikel`),
  ADD KEY `komentar_id_user_foreign` (`id_user`);

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
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penulis_email_unique` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artikel_id_penulis_foreign` FOREIGN KEY (`id_penulis`) REFERENCES `penulis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_id_artikel_foreign` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentar_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
