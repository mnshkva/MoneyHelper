-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июн 14 2020 г., 22:44
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `card`
--

INSERT INTO `card` (`id`, `money`, `user_id`) VALUES
(1, 520, 1),
(2, 3750, 1),
(5, 0, 2),
(6, 0, 2),
(7, 120, 1),
(8, 50, 1),
(9, 520, 1),
(10, 100, 1),
(11, 0, 1),
(12, 100, 1),
(13, 50, 7),
(14, 0, 7),
(15, 0, 7),
(16, 0, 8),
(17, 0, 8),
(18, 0, 8),
(19, 0, 9),
(20, 0, 9),
(21, 0, 9),
(22, 1000, 10),
(23, 0, 10),
(24, 0, 10),
(25, 0, 10),
(26, 0, 10),
(27, 0, 1),
(28, 0, 1),
(29, 0, 1),
(30, 500, 11),
(31, 0, 11),
(32, 0, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `negativebalance`
--

CREATE TABLE `negativebalance` (
  `id` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_` datetime NOT NULL,
  `id_card` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `negativebalance`
--

INSERT INTO `negativebalance` (`id`, `money`, `category`, `date_`, `id_card`) VALUES
(2, 100, 'Услуги', '2020-06-12 18:26:26', 1),
(4, 0, 'Ошибка', '2020-06-12 18:27:25', 1),
(5, 100, 'Услуги', '2020-06-12 18:28:27', 9),
(6, 50, 'Развлечения', '2020-06-13 17:01:26', 10),
(7, 0, 'Здоровье', '2020-06-13 17:36:20', 1),
(8, 100, 'Здоровье', '2020-06-13 22:14:22', 1),
(9, 1000, 'Питание', '2020-06-14 13:32:09', 2),
(10, 50, 'Здоровье', '2020-06-14 13:33:40', 8),
(11, 1000, 'Автомобиль', '2020-06-14 14:31:18', 1),
(12, 50, 'Здоровье', '2020-06-14 17:47:51', 15),
(13, 1000, 'Здоровье', '2020-06-14 18:08:06', 22),
(14, 1000, 'Здоровье', '2020-06-14 18:08:14', 22),
(15, 1000, 'Одежда', '2020-06-14 18:08:21', 22),
(16, 1000, 'Автомобиль', '2020-06-14 18:08:33', 22),
(17, 0, 'Ошибка', '2020-06-14 19:20:47', 30),
(18, 0, 'Ошибка', '2020-06-14 19:20:54', 30);

-- --------------------------------------------------------

--
-- Структура таблицы `positivebalance`
--

CREATE TABLE `positivebalance` (
  `id` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `date_` datetime NOT NULL,
  `id_card` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `positivebalance`
--

INSERT INTO `positivebalance` (`id`, `money`, `date_`, `id_card`) VALUES
(1, 50, '2020-06-12 17:12:27', 1),
(2, 500, '2020-06-12 18:28:42', 9),
(3, 50, '2020-06-13 16:08:31', 1),
(4, 50, '2020-06-13 16:08:41', 1),
(5, 50, '2020-06-13 16:08:53', 1),
(6, 50, '2020-06-13 16:21:38', 2),
(7, 50, '2020-06-13 16:29:28', 10),
(8, 50, '2020-06-13 16:32:05', 1),
(9, 20, '2020-06-13 16:33:07', 9),
(10, 40, '2020-06-13 17:01:03', 1),
(11, 50, '2020-06-13 17:04:10', 1),
(12, 50, '2020-06-13 17:08:50', 10),
(13, 50, '2020-06-13 17:09:02', 10),
(14, 50, '2020-06-13 17:11:04', 1),
(15, 50, '2020-06-13 22:15:10', 1),
(16, 50, '2020-06-13 22:15:45', 1),
(17, 20, '2020-06-13 22:17:20', 7),
(18, 50, '2020-06-14 08:58:45', 1),
(19, 5, '2020-06-14 12:06:54', 1),
(20, 5, '2020-06-14 12:07:11', 1),
(21, 5, '2020-06-14 12:08:17', 1),
(22, 5, '2020-06-14 12:08:26', 1),
(23, 50, '2020-06-14 12:08:30', 1),
(24, 45, '2020-06-14 12:08:36', 1),
(25, 100, '2020-06-14 12:08:46', 1),
(26, 50, '2020-06-14 12:10:05', 1),
(27, 100, '2020-06-14 12:10:12', 1),
(28, 200, '2020-06-14 12:10:15', 1),
(29, 0, '2020-06-14 12:10:20', 1),
(30, 10, '2020-06-14 12:10:23', 1),
(31, 50, '2020-06-14 13:33:15', 8),
(32, 50, '2020-06-14 14:31:00', 1),
(33, 100, '2020-06-14 14:31:06', 12),
(34, 50, '2020-06-14 17:47:39', 13),
(35, 50, '2020-06-14 17:47:46', 15),
(36, 5000, '2020-06-14 18:08:01', 22),
(37, 12, '2020-06-14 19:21:01', 30),
(38, 453, '2020-06-14 19:21:13', 30),
(39, 12, '2020-06-14 19:21:19', 30),
(40, 23, '2020-06-14 19:21:27', 30);

-- --------------------------------------------------------

--
-- Структура таблицы `transfer`
--

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `id_recipient` int(11) NOT NULL,
  `date_` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `transfer`
--

INSERT INTO `transfer` (`id`, `money`, `id_sender`, `id_recipient`, `date_`) VALUES
(1, 50, 2, 8, '2020-06-12 19:28:55');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin2', 'admin2'),
(5, 'admin3', 'admin3'),
(6, 'admin4', 'admin4'),
(7, 'admin5', 'admin5'),
(8, 'admin6', 'admin6'),
(9, 'admin7', 'admin7'),
(10, 'admin8', 'admin8'),
(11, 'admin10', 'admin10');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `negativebalance`
--
ALTER TABLE `negativebalance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_card` (`id_card`);

--
-- Индексы таблицы `positivebalance`
--
ALTER TABLE `positivebalance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_card` (`id_card`);

--
-- Индексы таблицы `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sender` (`id_sender`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `negativebalance`
--
ALTER TABLE `negativebalance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `positivebalance`
--
ALTER TABLE `positivebalance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `negativebalance`
--
ALTER TABLE `negativebalance`
  ADD CONSTRAINT `negativebalance_ibfk_1` FOREIGN KEY (`id_card`) REFERENCES `card` (`id`);

--
-- Ограничения внешнего ключа таблицы `positivebalance`
--
ALTER TABLE `positivebalance`
  ADD CONSTRAINT `positivebalance_ibfk_1` FOREIGN KEY (`id_card`) REFERENCES `card` (`id`);

--
-- Ограничения внешнего ключа таблицы `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `transfer_ibfk_1` FOREIGN KEY (`id_sender`) REFERENCES `card` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
