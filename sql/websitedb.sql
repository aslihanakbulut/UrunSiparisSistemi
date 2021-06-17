-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Haz 2021, 13:27:36
-- Sunucu sürümü: 10.4.19-MariaDB
-- PHP Sürümü: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `websitedb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admintbl`
--

CREATE TABLE `admintbl` (
  `adminId` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `admintbl`
--

INSERT INTO `admintbl` (`adminId`, `username`, `password`) VALUES
(1, 'admin', '2345'),
(2, 'admin2', '12345'),
(3, 'adminDeneme', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adrestbl`
--

CREATE TABLE `adrestbl` (
  `AdresId` int(11) NOT NULL,
  `Ulke` varchar(45) NOT NULL,
  `Sehir` varchar(45) NOT NULL,
  `PostaKodu` bigint(20) NOT NULL,
  `Mahalle` varchar(45) NOT NULL,
  `Cadde` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `adrestbl`
--

INSERT INTO `adrestbl` (`AdresId`, `Ulke`, `Sehir`, `PostaKodu`, `Mahalle`, `Cadde`) VALUES
(5, 'Türkiye', 'İzmir', 35363, 'Güneş', 'Akdeniz'),
(6, 'Türkiye', 'Erzurum', 25687, 'Murat', 'Cumhuriyet'),
(9, 'Türkiye', 'İstanbul', 345790, 'Özel', 'İstiklal');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `UrunId` int(11) NOT NULL,
  `UrunAdi` varchar(256) NOT NULL,
  `Fiyat` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`UrunId`, `UrunAdi`, `Fiyat`) VALUES
(1, 'M.Kemal Atatürk Biblo', 35.00),
(2, 'Harry Potter Anahtarlık', 5.00),
(3, 'Telefon Standlı Kalemlik', 12.00),
(4, 'Ayarlı Telefon Standı', 10.00),
(5, 'USB Kablo Koruyucu', 8.00),
(6, 'Aksiyon Kamera Aparatı', 10.00),
(7, 'USB Kablo Tutucu', 5.00),
(8, 'İsme Özel Anahtarlık', 6.00),
(9, 'Apple 1.Nesil Kalem Kutusu', 15.00);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `UyeId` int(11) NOT NULL,
  `KullaniciAdi` varchar(45) NOT NULL,
  `Sifre` varchar(256) NOT NULL,
  `UyeTel` bigint(11) NOT NULL,
  `UyeEposta` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`UyeId`, `KullaniciAdi`, `Sifre`, `UyeTel`, `UyeEposta`) VALUES
(5, 'Kbr05', '87654', 5439876507, 'kbr.a0@gmail.com'),
(6, 'shr', '34567', 5340981245, 'shr_15@gmail.com'),
(9, 'deneme2', 'deneme', 5674328761, 'deneme@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye_adres`
--

CREATE TABLE `uye_adres` (
  `uye_adresId` int(11) NOT NULL,
  `uye_adres_gecisId` int(11) NOT NULL,
  `uye_adres_uyeNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `uye_adres`
--

INSERT INTO `uye_adres` (`uye_adresId`, `uye_adres_gecisId`, `uye_adres_uyeNo`) VALUES
(4, 5, 5),
(5, 6, 6),
(6, 9, 9);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admintbl`
--
ALTER TABLE `admintbl`
  ADD PRIMARY KEY (`adminId`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Tablo için indeksler `adrestbl`
--
ALTER TABLE `adrestbl`
  ADD PRIMARY KEY (`AdresId`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`UrunId`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`UyeId`),
  ADD UNIQUE KEY `KullaniciAdi` (`KullaniciAdi`);

--
-- Tablo için indeksler `uye_adres`
--
ALTER TABLE `uye_adres`
  ADD PRIMARY KEY (`uye_adresId`),
  ADD UNIQUE KEY `uye_adres_gecisId` (`uye_adres_gecisId`),
  ADD UNIQUE KEY `uye_adres_uyeNo` (`uye_adres_uyeNo`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `adrestbl`
--
ALTER TABLE `adrestbl`
  MODIFY `AdresId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `UrunId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `UyeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `uye_adres`
--
ALTER TABLE `uye_adres`
  MODIFY `uye_adresId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
