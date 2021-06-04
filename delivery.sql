-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 05 2021 г., 00:01
-- Версия сервера: 5.7.29
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `delivery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `del_status`
--

CREATE TABLE `del_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `del_status`
--

INSERT INTO `del_status` (`id`, `status_name`) VALUES
(1, 'в работе'),
(2, 'выполнена');

-- --------------------------------------------------------

--
-- Структура таблицы `del_task`
--

CREATE TABLE `del_task` (
  `id` int(12) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_task` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `del_task`
--

INSERT INTO `del_task` (`id`, `id_user`, `email`, `text_task`, `id_status`) VALUES
(1, 1, 'fader@yahoo.com', 'замена картриджа в принтере №34', 2),
(2, 1, 'kvn@gmail.ru', 'Проработать договор по сделке №4567', 1),
(3, 2, 'alkaline@electro.net', 'Закупить источники бесперебойного питания', 2),
(4, 2, 'bura@bara.mail', 'Организовать совещание по вопросу сделки №779', 1),
(5, 1, 'kurka@gmail.ru', 'перезвонить клиенту по сделке №87698', 2),
(6, 3, 'prosto_masha@yandex.net', 'Договориться об отсрочке платежа по сделке №987098-02', 1),
(7, 2, 'top_hardware@bazara.net', 'Закупить процессор intel i9 для компьютера главного инженера', 1),
(8, 2, 'akkumulator@energy.com', 'Провести переговоры с поставщиками аккумуляторов', 1),
(9, 3, 'vadik555@fire.com', 'Встреча по сделке №5423', 1),
(10, 4, 'yeer@feret.ru', 'Добиться отсрочки платежа по договору поставки компьютерных мышей', 1),
(11, 1, 'dream_team@corporation.net', 'Подготовить накладные на товар по сделке №6754', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `del_user`
--

CREATE TABLE `del_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `del_user`
--

INSERT INTO `del_user` (`id`, `username`) VALUES
(1, 'Курочкин Василий'),
(2, 'Батарейкин Виктор'),
(3, 'Сусликов Вадим'),
(4, 'Иванов Иван');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `del_status`
--
ALTER TABLE `del_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `del_task`
--
ALTER TABLE `del_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_status` (`id_status`);

--
-- Индексы таблицы `del_user`
--
ALTER TABLE `del_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `del_status`
--
ALTER TABLE `del_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `del_task`
--
ALTER TABLE `del_task`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `del_user`
--
ALTER TABLE `del_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `del_task`
--
ALTER TABLE `del_task`
  ADD CONSTRAINT `del_task_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `del_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `del_task_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `del_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
