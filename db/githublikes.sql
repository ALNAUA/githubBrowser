-- phpMyAdmin SQL Dump
-- version 4.2.8.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 22 2014 г., 11:56
-- Версия сервера: 5.5.38-MariaDB
-- Версия PHP: 5.5.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `github`
--

-- --------------------------------------------------------

--
-- Структура таблицы `githublikes`
--

CREATE TABLE `githublikes` (
`id` int(11) NOT NULL COMMENT 'Primary key',
  `to_id` varchar(255) NOT NULL COMMENT 'To User Name or Repo Owner / Repo Name',
  `type` varchar(1) NOT NULL COMMENT 'User or Repo'
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='Contains Likes from GitHub Brower';

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `githublikes`
--
ALTER TABLE `githublikes`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `from_id` (`to_id`,`type`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `githublikes`
--
ALTER TABLE `githublikes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
