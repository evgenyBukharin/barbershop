-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 20 2022 г., 19:47
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `barbershop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `barbers`
--

CREATE TABLE `barbers` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expierence` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `barbers`
--

INSERT INTO `barbers` (`id`, `name`, `expierence`) VALUES
(1, 'Кощеев Трофим', '5 месяцев'),
(2, 'Садовский Юрий', '2 года'),
(3, 'Давид Ласский', '1 год 8 месяцев'),
(4, 'Грицаев Роман', '4 года 2 месяца');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `master_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `service`
--

INSERT INTO `service` (`id`, `title`, `description`, `img`) VALUES
(1, 'Взрослая стрижка', 'Стрижка — самая востребованная услуга, ведь достаточно месяца, чтобы волосы отросли и прическа потеряла форму. Если вам нравится контраст между выбритыми висками и затылком, коррекцию необходимо делать раз в 2-3 недели', '/images/adultHairCut.png'),
(2, 'Детская стрижка', 'Развивать чувство стиля никогда не рано. И хотя большинство барбершопов позиционируются как мужские салоны с брутальной атмосферой, в большинстве из них с удовольствием работают и с юными джентельменами, и с малышами.', '/images/34.jpg'),
(3, 'Бритье «ОПАСКОЙ»', 'Опасная бритва — инструмент для настоящих эстетов. Открытое лезвие позволяет добиться идеально гладкой кожи, но по-настоящему опасным оно становится в руках человека без опыта и сноровки.', '/images/all_all_large-t1541770733-r1w1905h726q90zc1.jpg'),
(4, 'Укладка', 'Мы уверены, что с наступлением холодов эта услуга станет еще популярнее среди мужчин. Перепады температур, шапки и теплые свитеры не лучшим образом сказываются на прическе, даже если вы делаете укладку едва ли не на уровне барбера.', '/images/ukladka.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `barbers`
--
ALTER TABLE `barbers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `barbers`
--
ALTER TABLE `barbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
