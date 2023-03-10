-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 05 Oca 2023, 13:06:52
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `otopark`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arac`
--

CREATE TABLE `arac` (
  `id` int(11) NOT NULL,
  `plaka` varchar(50) NOT NULL,
  `giris` int(11) NOT NULL,
  `cikis` int(11) NOT NULL,
  `eleman_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `guncel_fiyat`
--

CREATE TABLE `guncel_fiyat` (
  `id` int(11) NOT NULL,
  `fiyat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `guncel_fiyat`
--

INSERT INTO `guncel_fiyat` (`id`, `fiyat`) VALUES
(1, 50);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kasa`
--

CREATE TABLE `kasa` (
  `id` int(11) NOT NULL,
  `tarih` varchar(100) NOT NULL,
  `miktar` int(11) NOT NULL,
  `eleman_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `kullanici` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `sifre` varchar(150) NOT NULL,
  `yetki` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `kullanici`, `mail`, `sifre`, `yetki`) VALUES
(1, 'user1', 'user1@4m1a.com', '0192023a7bbd73250516f069df18b500', 'Admin'),
(2, 'user2', 'user2@4m1a.com', '0192023a7bbd73250516f069df18b500', 'Patron'),
(3, 'user3', 'user3@4m1a.com', '0192023a7bbd73250516f069df18b500', 'Eleman');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `arac`
--
ALTER TABLE `arac`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `guncel_fiyat`
--
ALTER TABLE `guncel_fiyat`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kasa`
--
ALTER TABLE `kasa`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `arac`
--
ALTER TABLE `arac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `guncel_fiyat`
--
ALTER TABLE `guncel_fiyat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kasa`
--
ALTER TABLE `kasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
