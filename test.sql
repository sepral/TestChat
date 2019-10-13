-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 13 2019 г., 22:12
-- Версия сервера: 10.4.6-MariaDB
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dialog`
--

CREATE TABLE `dialog` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `dialog`
--

INSERT INTO `dialog` (`id`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `time` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `text`, `time`) VALUES
(1, 'libero volutpat sed cras ornare arcu dui vivamus arcu ', '2019-10-10 16:30:53.000000'),
(2, 'turpis tincidunt id aliquet risus feugiat in ante ', '2019-10-10 16:30:53.000000'),
(3, 'velit laoreet id donec ultrices tincidunt arcu non ', '2019-10-10 16:30:53.000000'),
(4, 'vitae tempus quam pellentesque nec nam aliquam sem et ', '2019-10-10 16:30:53.000000'),
(5, 'cras adipiscing enim eu turpis egestas pretium aenean \r\n', '2019-10-10 16:30:53.000000'),
(6, 'venenatis lectus magna fringilla urna porttitor \r\n', '2019-10-10 16:30:53.000000'),
(7, 'consectetur purus ut faucibus pulvinar elementum integer enim neque volutpat', '2019-10-10 16:36:06.324327'),
(8, 'tincidunt vitae semper quis lectus nulla at volutpat diam ut', '2019-10-10 16:36:17.013189'),
(9, 'sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit', '2019-10-10 16:36:27.364727');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `location` varchar(20) CHARACTER SET utf8 NOT NULL,
  `image` varchar(225) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `location`, `image`) VALUES
(1, 'Кошак', 'Москва', 'img/cat1.png'),
(2, 'Пушок', 'Санкт-Петербург', 'img/cat2.png'),
(3, 'Снежок', 'Нижний Новгород', 'img/cat3.png'),
(4, 'Кошара', 'Владивосток', 'img/cat4.png');

-- --------------------------------------------------------

--
-- Структура таблицы `user_dialog`
--

CREATE TABLE `user_dialog` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_dialog` int(10) UNSIGNED NOT NULL,
  `id_message` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `user_dialog`
--

INSERT INTO `user_dialog` (`id`, `id_user`, `id_dialog`, `id_message`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 2),
(3, 1, 2, 3),
(4, 3, 2, 4),
(5, 1, 3, 5),
(6, 4, 3, 6),
(7, 1, 1, 7),
(8, 1, 2, 8),
(9, 1, 3, 9);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dialog`
--
ALTER TABLE `dialog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_dialog`
--
ALTER TABLE `user_dialog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dialog` (`id_dialog`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_message` (`id_message`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dialog`
--
ALTER TABLE `dialog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user_dialog`
--
ALTER TABLE `user_dialog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `user_dialog`
--
ALTER TABLE `user_dialog`
  ADD CONSTRAINT `user_dialog_ibfk_1` FOREIGN KEY (`id_dialog`) REFERENCES `dialog` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_dialog_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_dialog_ibfk_3` FOREIGN KEY (`id_message`) REFERENCES `messages` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
