-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 25 2018 г., 13:34
-- Версия сервера: 5.7.21-0ubuntu0.16.04.1
-- Версия PHP: 7.0.28-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `statistica`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contry`
--

CREATE TABLE `contry` (
  `id_contry` int(2) NOT NULL,
  `name_contry` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contry`
--

INSERT INTO `contry` (`id_contry`, `name_contry`) VALUES
(1, 'Роиссия'),
(2, 'Германия'),
(3, 'США'),
(5, 'Испания');

-- --------------------------------------------------------

--
-- Структура таблицы `fio`
--

CREATE TABLE `fio` (
  `id_fio` int(2) NOT NULL,
  `fio_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `fio`
--

INSERT INTO `fio` (`id_fio`, `fio_name`) VALUES
(1, 'Нигматулин'),
(2, 'Карьгин'),
(3, 'Морозов'),
(4, 'Достоевский'),
(8, 'Шиндлер'),
(10, 'Анатолевасерман');

-- --------------------------------------------------------

--
-- Структура таблицы `guest`
--

CREATE TABLE `guest` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `massage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `guest`
--

INSERT INTO `guest` (`id`, `name`, `email`, `massage`) VALUES
(1, 'Дмитрий', 'dmitry-dmitry@gmail.com', '.проверка проверка проверка'),
(2, 'Дмитрий', 'dmitry-dmitry@gmail.com', '.проверка проверка проверка'),
(3, 'Николай', 'nikolay-petrovich@rambler.ru', 'ффпффыафыаа вафыаф фыафыафыафыа'),
(4, 'Петр', 'nikolay-petrovich@rambler.ru', 'ффпффыафыаа вафыаф фыафыафыафыа'),
(5, 'Pavel', 'petrovich@rambler.ru', 'ффпффыафыаа вафыаф фыафыафыафыа'),
(6, 'Дукалис', 'petrovich@rambler.ru', 'Добавляем'),
(7, 'Шевкунов', 'petrovich@rambler.ru', 'Добавляем'),
(8, 'Кирилица', 'kirilica@rambler.ru', 'без @ и точки ввести не получится'),
(9, 'Гриша', 'fffff@sff.ff', 'раз два полтора'),
(10, 'ываыааыафа', 'aaooaa@mail.ru', 'аыфаыфаыа'),
(11, 'Шельма', 'aaooaa@mail.ru', 'аыфаыфаыа'),
(12, 'Вандам', 'aaooaa@mail.ru', 'аыфаыфаыа'),
(13, 'Hhhh', 'dmiy@fff.ggg', 'Ccgh'),
(14, 'dfgsdf', 'wboray@yandex.ru', 'Риррр'),
(15, 'dfgsdf', 'wboray@yandex.ru', 'Риррр');

-- --------------------------------------------------------

--
-- Структура таблицы `medal`
--

CREATE TABLE `medal` (
  `id_medal` int(1) NOT NULL,
  `medal_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `medal`
--

INSERT INTO `medal` (`id_medal`, `medal_name`) VALUES
(1, 'Золотые'),
(2, 'Серебрянные'),
(3, 'Бронзовые');

-- --------------------------------------------------------

--
-- Структура таблицы `sport`
--

CREATE TABLE `sport` (
  `id_sport` int(2) NOT NULL,
  `sport_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sport`
--

INSERT INTO `sport` (`id_sport`, `sport_name`) VALUES
(1, 'биатлон'),
(2, 'теннис'),
(3, 'фигурное катание'),
(4, 'бег');

-- --------------------------------------------------------

--
-- Структура таблицы `svazi`
--

CREATE TABLE `svazi` (
  `id_svazi` int(2) NOT NULL,
  `svazi_contry` int(2) NOT NULL,
  `svazi_fio` text NOT NULL,
  `svazi_sport` int(2) NOT NULL,
  `zoloto_medal` int(2) DEFAULT NULL,
  `serebro_medal` int(2) DEFAULT NULL,
  `bronza_medal` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `svazi`
--

INSERT INTO `svazi` (`id_svazi`, `svazi_contry`, `svazi_fio`, `svazi_sport`, `zoloto_medal`, `serebro_medal`, `bronza_medal`) VALUES
(40, 1, '1 2 4 3', 1, 1, NULL, NULL),
(41, 1, '2 3', 2, 1, NULL, NULL),
(42, 2, '2 4', 1, 1, NULL, NULL),
(43, 2, '1', 4, NULL, 2, NULL),
(45, 1, '4', 3, NULL, NULL, 3),
(46, 2, '1', 1, 1, NULL, NULL),
(48, 1, '2', 2, NULL, 2, NULL),
(49, 2, '1', 2, NULL, NULL, 3),
(50, 2, '4', 2, NULL, NULL, 3),
(52, 1, '1', 1, 1, NULL, NULL),
(55, 3, '2', 3, NULL, 2, NULL),
(58, 1, '4', 1, 1, NULL, NULL),
(59, 1, '3', 1, 1, NULL, NULL),
(61, 1, '1 2 3 4 8', 3, NULL, NULL, 3),
(63, 3, '1 8', 3, 1, NULL, NULL),
(65, 3, '8', 4, NULL, NULL, 3),
(66, 3, '2', 1, NULL, NULL, 3),
(67, 1, '3 1', 1, 1, NULL, NULL),
(68, 2, '2', 1, 2, NULL, NULL),
(69, 3, '', 1, NULL, 2, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contry`
--
ALTER TABLE `contry`
  ADD PRIMARY KEY (`id_contry`);

--
-- Индексы таблицы `fio`
--
ALTER TABLE `fio`
  ADD PRIMARY KEY (`id_fio`);

--
-- Индексы таблицы `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `medal`
--
ALTER TABLE `medal`
  ADD PRIMARY KEY (`id_medal`);

--
-- Индексы таблицы `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id_sport`);

--
-- Индексы таблицы `svazi`
--
ALTER TABLE `svazi`
  ADD PRIMARY KEY (`id_svazi`),
  ADD KEY `svazi_contry` (`svazi_contry`,`svazi_sport`,`zoloto_medal`),
  ADD KEY `svazi_sport` (`svazi_sport`),
  ADD KEY `serebro_medal` (`serebro_medal`,`bronza_medal`),
  ADD KEY `zoloto_medal` (`zoloto_medal`),
  ADD KEY `bronza_medal` (`bronza_medal`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contry`
--
ALTER TABLE `contry`
  MODIFY `id_contry` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `fio`
--
ALTER TABLE `fio`
  MODIFY `id_fio` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `medal`
--
ALTER TABLE `medal`
  MODIFY `id_medal` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `sport`
--
ALTER TABLE `sport`
  MODIFY `id_sport` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `svazi`
--
ALTER TABLE `svazi`
  MODIFY `id_svazi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `svazi`
--
ALTER TABLE `svazi`
  ADD CONSTRAINT `svazi_ibfk_2` FOREIGN KEY (`svazi_sport`) REFERENCES `sport` (`id_sport`),
  ADD CONSTRAINT `svazi_ibfk_4` FOREIGN KEY (`svazi_contry`) REFERENCES `contry` (`id_contry`),
  ADD CONSTRAINT `svazi_ibfk_5` FOREIGN KEY (`zoloto_medal`) REFERENCES `medal` (`id_medal`),
  ADD CONSTRAINT `svazi_ibfk_6` FOREIGN KEY (`serebro_medal`) REFERENCES `medal` (`id_medal`),
  ADD CONSTRAINT `svazi_ibfk_7` FOREIGN KEY (`bronza_medal`) REFERENCES `medal` (`id_medal`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
