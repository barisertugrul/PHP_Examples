-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 29 Nis 2021, 09:51:44
-- Sunucu sürümü: 8.0.18
-- PHP Sürümü: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `okul`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ders`
--

CREATE TABLE `ders` (
  `DersId` int(11) NOT NULL,
  `OgrNo` int(11) NOT NULL,
  `DersAdi` varchar(25) NOT NULL,
  `DersNotu` int(11) NOT NULL,
  `DersOgretmeni` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayit`
--

CREATE TABLE `kayit` (
  `OgrNo` int(11) NOT NULL,
  `Adi` varchar(25) NOT NULL,
  `Soyadi` varchar(25) NOT NULL,
  `DogumYeri` varchar(25) NOT NULL,
  `DogumTarihi` date NOT NULL,
  `Sinifi` varchar(10) NOT NULL,
  `Foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kayit`
--

INSERT INTO `kayit` (`OgrNo`, `Adi`, `Soyadi`, `DogumYeri`, `DogumTarihi`, `Sinifi`, `Foto`) VALUES
(1, 'Ali', 'Veli', 'Kırklareli', '2000-01-01', '6A', '1673788.jpg'),
(2, 'Ayşe', 'Meşe', 'Rize', '2002-03-20', '7A', '1689594.jpg'),
(3, 'Davut', 'Palamut', 'Harput', '2014-05-20', '7A', '1885631.jpg'),
(4, 'Gülşen', 'Palamut', 'Harput', '2007-05-20', '8A', '1878862.jpg'),
(5, 'Hülya', 'Palamut', 'Harput', '2014-05-20', '5A', '1906379.jpg'),
(6, 'Bedirhan', 'Özkuzu', 'Niğde', '2021-03-20', '8A', '1673784.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rehberlik`
--

CREATE TABLE `rehberlik` (
  `RehberlikId` int(11) NOT NULL,
  `OgrNo` int(11) NOT NULL,
  `GelisTarihi` date NOT NULL,
  `RehberOgretmen` varchar(25) NOT NULL,
  `Sorun` varchar(100) NOT NULL,
  `Cozum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `rehberlik`
--

INSERT INTO `rehberlik` (`RehberlikId`, `OgrNo`, `GelisTarihi`, `RehberOgretmen`, `Sorun`, `Cozum`) VALUES
(1, 1, '2021-03-20', 'Rehber Efendi', 'Arkadaşlık ilişkileri', 'Drama çalışması'),
(2, 1, '2021-03-27', 'Rehber Efendi', 'Ders Çalışma', 'Verimli ders çalışma ilkeleri bilgilendirmesi'),
(3, 2, '2021-02-14', 'Rehber Hanım', 'Aile içi şiddet', 'Aile incelemesi'),
(4, 3, '2021-04-27', 'Rehber Hanım', 'Ekonomik sıkıntılar', 'Sivil toplum örgütlerinden destek'),
(5, 3, '2021-04-29', 'Abc Defg', 'Ders başarısızlığı', 'Verimli ders çalışma yöntemleri bilgilendirmesi');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ders`
--
ALTER TABLE `ders`
  ADD PRIMARY KEY (`DersId`);

--
-- Tablo için indeksler `kayit`
--
ALTER TABLE `kayit`
  ADD PRIMARY KEY (`OgrNo`);

--
-- Tablo için indeksler `rehberlik`
--
ALTER TABLE `rehberlik`
  ADD PRIMARY KEY (`RehberlikId`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ders`
--
ALTER TABLE `ders`
  MODIFY `DersId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kayit`
--
ALTER TABLE `kayit`
  MODIFY `OgrNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `rehberlik`
--
ALTER TABLE `rehberlik`
  MODIFY `RehberlikId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
