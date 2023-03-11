-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 16 Oca 2014, 12:02:52
-- Sunucu sürümü: 5.1.72-cll
-- PHP Sürümü: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `software_vt`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anket`
--

CREATE TABLE IF NOT EXISTS `anket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anket` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `tarih` date NOT NULL,
  `anketor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `anket`
--

INSERT INTO `anket` (`id`, `anket`, `aciklama`, `kategori_id`, `tarih`, `anketor_id`) VALUES
(1, 'ders iÅleyiÅi', 'a kodlu dersin iÅleyiÅi size gÃ¶re nasÄ±l?', 4, '2013-08-18', 2),
(2, 'maÄ±l gÄ±dÄ±yor mu kontrol?', 'as', 3, '2013-08-05', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anketor`
--

CREATE TABLE IF NOT EXISTS `anketor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adi_soyadi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `unvan_id` int(11) NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `anketor`
--

INSERT INTO `anketor` (`id`, `adi_soyadi`, `unvan_id`, `mail`, `sifre`) VALUES
(2, 'Batuhan', 1, 'batuhan@batuhan.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anket_sonuclari`
--

CREATE TABLE IF NOT EXISTS `anket_sonuclari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sik_id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `sik_adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Tablo döküm verisi `anket_sonuclari`
--

INSERT INTO `anket_sonuclari` (`id`, `sik_id`, `uye_id`, `sik_adi`) VALUES
(13, 1, 9, 'iyi'),
(14, 4, 9, 'iyi'),
(15, 7, 9, 'evet');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolum`
--

CREATE TABLE IF NOT EXISTS `bolum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bolum` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `bolum`
--

INSERT INTO `bolum` (`id`, `bolum`) VALUES
(1, 'YazÄ±lÄ±m MÃ¼hendisliÄi'),
(2, 'GÃ¶rsel TasarÄ±m'),
(3, 'Bilgisayar MÃ¼hendisliÄi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ip_kontrol`
--

CREATE TABLE IF NOT EXISTS `ip_kontrol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `anket_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Tablo döküm verisi `ip_kontrol`
--

INSERT INTO `ip_kontrol` (`id`, `ip`, `anket_id`) VALUES
(4, '127.0.0.1', 4),
(5, '127.0.0.1', 7),
(6, '127.0.0.1', 8),
(7, '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Spor'),
(4, 'EÄitim'),
(3, 'Teknoloji');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesaj`
--

CREATE TABLE IF NOT EXISTS `mesaj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `konu` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kimden` int(11) NOT NULL,
  `kime` int(11) NOT NULL,
  `tarih` datetime NOT NULL,
  `okuma` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siklar`
--

CREATE TABLE IF NOT EXISTS `siklar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tip` int(11) NOT NULL,
  `siralama` int(11) NOT NULL,
  `soru_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Tablo döküm verisi `siklar`
--

INSERT INTO `siklar` (`id`, `adi`, `tip`, `siralama`, `soru_id`) VALUES
(1, 'iyi', 1, 1, 1),
(2, 'orta', 1, 2, 1),
(3, 'kÃ¶tÃ¼', 1, 3, 1),
(4, 'iyi', 1, 1, 2),
(5, 'orta', 1, 2, 2),
(6, 'kÃ¶tÃ¼', 1, 3, 2),
(7, 'evet', 1, 1, 3),
(8, 'hayÄ±r', 1, 2, 3),
(9, 'evet', 1, 1, 4),
(10, 'hayÄ±r', 1, 2, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular`
--

CREATE TABLE IF NOT EXISTS `sorular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soru` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `siralama` int(11) NOT NULL,
  `anket_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `sorular`
--

INSERT INTO `sorular` (`id`, `soru`, `siralama`, `anket_id`) VALUES
(1, 'hocanÄ±n ders iÅleyiÅi nasÄ±l?', 1, 1),
(2, 'hocanÄ±n ingilizcesi anlaÅÄ±labilir mi?', 2, 1),
(3, 'hoca sorularÄ±nÄ±zla ilgileniyor mu?', 3, 1),
(4, 'maÄ±l geldÄ± mÄ±', 1, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tipler`
--

CREATE TABLE IF NOT EXISTS `tipler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tip` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Tablo döküm verisi `tipler`
--

INSERT INTO `tipler` (`id`, `tip`) VALUES
(1, 'Tek Secimli (RadioButton)'),
(2, 'Cok Secimli (Cek Kutulari)'),
(9, 'Metin Alani');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `umesaj`
--

CREATE TABLE IF NOT EXISTS `umesaj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `konu` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kimden` int(11) NOT NULL,
  `kime` int(11) NOT NULL,
  `tarih` datetime NOT NULL,
  `okuma` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `unvan`
--

CREATE TABLE IF NOT EXISTS `unvan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unvan` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `unvan`
--

INSERT INTO `unvan` (`id`, `unvan`) VALUES
(1, 'ÃÄrenci'),
(2, 'akademisyen');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyelik`
--

CREATE TABLE IF NOT EXISTS `uyelik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adi_soyadi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `numara` int(11) NOT NULL,
  `bolum_id` int(11) NOT NULL,
  `yas` int(11) NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `onay` int(11) NOT NULL DEFAULT '0',
  `danisman_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Tablo döküm verisi `uyelik`
--

INSERT INTO `uyelik` (`id`, `adi_soyadi`, `numara`, `bolum_id`, `yas`, `mail`, `sifre`, `onay`, `danisman_id`) VALUES
(10, 'gÃ¶khan', 123123, 1, 24, 'g@g.com', 'd3afcf483b1d66fdeb634b2e6952d322', 1, 2),
(9, 'mehmet', 286164, 1, 24, 'm@m.com', '4e39298ce8bb79e5243616f7e09aae28', 1, 2),
(11, 'turgay', 12121212, 1, 25, 't@t.com', 'a7a720c681cd3d900144eb17a25e3701', 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
