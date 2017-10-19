-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 20 2017 г., 01:02
-- Версия сервера: 5.5.50
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1507316548),
('user', '2', 1507317370),
('content', '3', 1507317413),
('Колян', '4', 1507317413);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Администратор', NULL, NULL, 1507140917, 1507140917),
('banned', 1, 'Заблокированный пользователь', NULL, NULL, 1507140917, 1507140917),
('canAdmin', 2, 'Право входа в админку', NULL, NULL, 1507314946, 1507314946),
('content', 1, 'Контент менеджер', NULL, NULL, 1507140917, 1507140917),
('updateOwnTask', 2, 'Право на редактирование своих Задач', 'isAuthor', NULL, 1507400932, 1507400932),
('updateTask', 2, 'Право на редактирование Задач', NULL, NULL, 1507366491, 1507366491),
('user', 1, 'Пользователь', NULL, NULL, 1507140917, 1507140917),
('Колян', 1, 'Просто Колян', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'canAdmin'),
('content', 'canAdmin'),
('admin', 'content'),
('content', 'updateOwnTask'),
('admin', 'updateTask'),
('updateOwnTask', 'updateTask');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isAuthor', 0x4f3a32363a226170705c61646d696e5c72756c65735c417574686f7252756c65223a333a7b733a343a226e616d65223b733a383a226973417574686f72223b733a393a22637265617465644174223b693a313530373430303933323b733a393a22757064617465644174223b693a313530373430303933323b7d, 1507400932, 1507400932);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1507134194);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sorting` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`, `sorting`) VALUES
(0, 'Проверено', 50),
(1, 'Выполнена', 40),
(2, 'В работе', 30),
(3, 'Опубликована', 20),
(4, 'В разработке', 10),
(5, 'Готова к публикации', 15),
(6, 'Проверяется', 45);

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(4000) NOT NULL,
  `createDate` date DEFAULT NULL,
  `changeDate` date NOT NULL DEFAULT '0000-00-00',
  `endDate` date NOT NULL DEFAULT '0000-00-00',
  `status_id` int(1) NOT NULL,
  `user_id` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `name`, `description`, `createDate`, `changeDate`, `endDate`, `status_id`, `user_id`) VALUES
(1, 'Задача1', 'Воспитывая своего сына двоечника, папа изнашивает в год 2 брючных ремня.', '2017-09-10', '2017-09-26', '2017-09-30', 2, 1),
(2, 'Задача2', 'В лифте кнопка первого этажа находится на высоте 1 м 20 см от пола. Кнопка каждого следующего этажа выше предыдущего на 10 см.', '2017-09-10', '2017-09-26', '2017-09-30', 0, 2),
(3, 'Задача3', 'Если на одну чашу весов посадить Дашу, которая весит 45 кг, и Наташу, которая весит на 8 кг меньше, а на другую насыпать 89 кг разных конфет, то сколько кг конфет придется съесть несчастным девочкам, чтобы чаши весов оказались в равновесии?', '2017-09-10', '2017-09-26', '2017-09-30', 1, 1),
(4, 'Задача4', 'С одного дерева сняли 164 груши, а со второго 5 мальчиков, каждый из которых, сидя на дереве, съел по 27 груш. После этого со второго дерева сняли еще 94 груши.', '2017-09-10', '2017-09-26', '2017-09-30', 3, 4),
(5, 'Задача5', 'В бублике 1 дырка, а в кренделе в два раза больше.', '2017-09-20', '2017-09-20', '2017-09-30', 0, 1),
(6, 'Задача6', 'У бабушки в шкафу спрятана банка с вареньем. В банке 650 г варенья. Внук Коля разведал, где банка, и каждый день съедает по 5 ложек.', '0000-00-00', '0000-00-00', '0000-00-00', 2, 1),
(7, 'Задача7', 'Когда хозяин вышел в сад с ружьем, с одной яблони упало 4 соседа, а с другой на 3 соседа больше.', '2030-09-20', '2030-09-20', '2003-10-20', 3, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `authKey` varchar(255) DEFAULT '0',
  `accessToken` varchar(255) DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `authKey`, `accessToken`, `password`) VALUES
(1, 'admin', 'test100key', '100-token', 'admin'),
(2, 'user', 'test200key', '200-token', 'user'),
(4, 'Колян', 'test300key', '300-token', 'content');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `item_name` (`item_name`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `FK_auth_item_child_auth_item_2` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `FK_auth_assignment_auth_item` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `FK_auth_item_auth_rule` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `FK_auth_item_child_auth_item` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_auth_item_child_auth_item_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
