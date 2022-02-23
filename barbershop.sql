-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 23 2022 г., 15:44
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
  `expierence` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barber_login` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `barbers`
--

INSERT INTO `barbers` (`id`, `name`, `expierence`, `barber_login`) VALUES
(3, 'Давид Ласский', '1 год 8 месяцев', 'david.lasskiy'),
(4, 'Грицаев Роман', '4 года 2 месяца', 'gricaev.roman');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `master_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `confirmed` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `master_id`, `service_id`, `date`, `time`, `user_id`, `confirmed`) VALUES
(24, 3, 4, '28-02-22', '12:00', 3, 'true'),
(25, 4, 3, '25-02-22', '13:00', 3, 'true'),
(30, 4, 3, '26-02-22', '15:00', 14, 'false'),
(31, 3, 4, '27-02-22', '13:00', 14, 'false'),
(32, 4, 3, '25-02-22', '13:00', 15, 'true');

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

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `login`, `password`, `email`, `role`) VALUES
(3, 'test', 'test', 'test', '$2y$10$CkYsGp3YZJAYQjR5CzJKweqemp6WZgnlDWbrFFpM4WpxRhj2xCj1e', 'test', 'user'),
(6, 'Давид', 'Ласский', 'david.lasskiy', '$2y$10$OwijYmEpcIgUJ1Wav.K5We0nUeRGoEDbIWVajWrkF.8DWF0EmIA46', 'david.lasskiy@gmail.com', 'barber'),
(7, 'Роман', 'Грицаев', 'gricaev.roman', '$2y$10$/1zdLvKt.q5uoPljG5coMujBpqf.L84Sb3aCxe5Ayryt1J5yfgdyO', 'gricaev.roman@gmail.com', 'barber'),
(8, 'Федор', 'Васильев', 'f', '$2y$10$ji68FatTgEf3.T5TF1qjW.sJ0KiVqSUhXiV1CSrHvqoeOSYWvPDjm', 'f', 'user'),
(9, 'admin', 'admin', 'admin', '$2y$10$nWwvcQM.Aair/V6GLv8yAOevxEDxdsz8RcHzc8TzziQofxfCRl.xC', 'admin', 'admin'),
(14, 't', 't', 't', '$2y$10$4AyFdCVuaPawN5vTBB3WyOaCXTyCdoCo89xHUUgbuK.g0pOvAu/Ku', 't', 'user'),
(15, 'tes', 'tes', 'tes', '$2y$10$xSwTCgxRd53vR20OCGy67OJgFjOg1Bfh06maAXxpTBAQPfHqZIdeO', 'tes', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `barbers`
--
ALTER TABLE `barbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`barber_login`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_id` (`master_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `barbers`
--
ALTER TABLE `barbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `barbers`
--
ALTER TABLE `barbers`
  ADD CONSTRAINT `barbers_ibfk_1` FOREIGN KEY (`barber_login`) REFERENCES `users` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`master_id`) REFERENCES `barbers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
