-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 21 2017 г., 21:14
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ft_blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ftblog_category`
--

CREATE TABLE `ftblog_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` blob,
  `image_src_filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_web_filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `ftblog_category`
--

INSERT INTO `ftblog_category` (`id`, `name`, `description`, `image`, `image_src_filename`, `image_web_filename`) VALUES
(1, 'Спорт', 'Всё о спорте', '', '510709_futbolnyiy_stadion_v_hd.jpg', 'ev_0xpSsRI2kxlHKnDZivnhlA9C1p9b9.jpg'),
(2, 'Культура', 'Всё о культуре', '', 'Muzyka-odno-iz-vazhnejshih-napravlenij-kultury-Kitaya.jpg', 'h0tzXkNjywOeVXoAiyYl1o03vtkEbHzC.jpg'),
(3, 'Политика', 'Всё о политике', '', 'c4a7c7c7a700c7054bdc156397c2a0c0.jpg', 'q69VVDxBQTKl1CXQRDCwo4DwvIvjUxhJ.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `ftblog_comments`
--

CREATE TABLE `ftblog_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `ftblog_comments`
--

INSERT INTO `ftblog_comments` (`id`, `user_id`, `post_id`, `created_at`, `content`) VALUES
(1, 6, 1, 1503246049, 'ljlklkjlk'),
(2, 8, 2, 1503250761, 'Коммент про культуру');

-- --------------------------------------------------------

--
-- Структура таблицы `ftblog_migration`
--

CREATE TABLE `ftblog_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ftblog_migration`
--

INSERT INTO `ftblog_migration` (`version`, `apply_time`) VALUES
('m170808_080941_create_tables', 1502778015);

-- --------------------------------------------------------

--
-- Структура таблицы `ftblog_post`
--

CREATE TABLE `ftblog_post` (
  `id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `image` blob,
  `image_src_filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_web_filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `ftblog_post`
--

INSERT INTO `ftblog_post` (`id`, `author_id`, `title`, `content`, `category_id`, `status`, `created_at`, `updated_at`, `image`, `image_src_filename`, `image_web_filename`, `tags`) VALUES
(1, NULL, 'Про футбол', 'Лига Чемпионов 1/2 финала ответные матчи. Первыми играли Бавария - Барселона. В первом матчем выиграв со счетом 3-0 Барселоне нужно было забыть все один выездной гол и вся робота будет сделана. У Баварии были очень малы шансы на проход дальше. В составах команд ничего нового в сравнении с прошлым матчем не было. Как только матч начался, баварцы сразу погнали вперед, создавая острые атаки, и они пришли как раз в ворота Марка Тер-Штегена. С углового гол забил Бенатья, который не совсем удачный матч провел в Испании. 1-0. Болельщики Баварии загорелись надеждой, но они потухли на 15-й минуте. В защите немцы были не очень, пропуская атаки испанцев. Месси на Суареса, Суарес на Неймара. 1-1. И Барса забила такой нужный гол. Но этим она решилась не ограничиваться и  эти замечательная связка забила еще один гол. И все по той же схеме. Неймар  делает дубль. В первом тайме больше голов не забили, хотя робота у вратарей была, они  не скучали. После перерыва Луис Энрике сразу сделал замену, выпустив вместо Суареса Педро, который в чемпионате в минувшие выходные забыл чудесный гол через себя. Второй тайм не особо радовал моментами, то все же Баварии удалось сравнять счет, Левандовски технично обыграв Маскерано, забыл гол с места. Да так, что Тер-Штеген не успел даже среагировать. Теперь, когда счет равный Бавария понимала, что пройти дальше шансы все еще малы, но выиграть пр собственных трибунах им под силу и немцы пошли вперед всей командой. В этот момент Барселона как-то затихла и во втором тайме почти не была видна, хотя мячом она владела. На 74-й минуте у Баварии получилось выйти вперед. С передачи Швайнштайгера забивает гол Мюллер. 3-2. И хотя немцы атаковали до свистка голов больше не было забито. Итак, Барселона  - финалист Лиги Чемпионов. Сегодня она узнает своего соперника из пары Реал - Ювентус. Барса впервые за четыре года выходит в финал. Финал пройдет в Берлине 6 июня.', 1, 1, 1502808945, 1503336269, '', 'bk.jpg', 'NCgxM7LnS4TzFdZ9Rq6XOqI9nHOhJuCr.jpg', 'Лига Чемпионов, Луис Энрике, Суарес'),
(2, NULL, '7 ГЛАВНЫХ ПОСТРОЕК ФЕДОРА ШЕХТЕЛЯ', 'Федор Шехтель — известный мастер русского модерна. Он построил множество зданий, которые стали символом архитектурной эпохи конца XIX — начала ХХ века. Ему принадлежит две сотни проектов в Москве и разных уголках России. Отправляемся на прогулку по зданиям Шехтеля вместе с порталом «Культура.РФ».\r\n\r\nУСАДЬБА ФОН ДЕРВИЗОВ\r\nУсадьба фон Дервизов. Фотография: Дмитрий Кутлаев / фотобанк «Лори»\r\nВ Кирицах Рязанской области Федор Шехтель построил похожую на сказочный замок усадьбу для барона фон Дервиза. Главный дом был увенчан башенками со шпилями и украшен скульптурами. От него к террасе спускались две изящные лестницы. \r\n\r\nВ парке создали тенистые гроты и арочные мостики, расчистили пруды и украсили территорию скульптурами кентавров. Однако владелец усадьбы недолго наслаждался архитектурным творением Шехтеля: через несколько лет он разорился и продал Кирицы. После революции в здании усадьбы находилось сельскохозяйственное училище. Позже здесь разместился санаторий для больных туберкулезом детей, он находится там до сих пор.\r\n\r\nУСАДЬБА ЛОКАЛОВА\r\nУсадьба Локалова. Фотография: Павел Москаленко / фотобанк «Лори»\r\nВторой известной работой Шехтеля в провинциальной России стала усадьба фабриканта Александра Локалова — одного из богатейших людей страны в конце XIX века. Его дом архитектор возвел всего за два года. Он был стилизован под русский терем со шпилем и украшен изразцами, витражами и кокошниками. \r\n\r\nВо дворе дома Шехтель создал зимний сад в форме карстовой пещеры. Потолок из сталактитовых сосулек и ласточкины гнезда на стенах делали его похожим на сказочный грот. В советское время в усадьбе размещался местный музей, затем здание передали детскому дому. \r\n', 2, 1, 1502809092, 1502809092, '', 'kulture.jpg', 'lk2xoeDW0yFi-wUHtMfWsdZFmxX9RYF7.jpg', ''),
(3, NULL, 'Владимир Гройсман прокомментировал скандал с «Южмашем»', 'Как уже писал «Днепр вечерний», сегодня премьер-министр Украины Владимир Гройсман находится с официальным визитом в Днепре.\r\n\r\nНа пресс-конференции в Днепр ОГА Владимир Борисович прокомментировал скандал соотносительно причастности завода «Южмаш» к северокорейской ракетной программе. Об этом ранее заявило издание в The New York Times.\r\n- Заявление о том, что «Южмаш» поставляет ракетные двигатели в Северную Корею - является провокацией против Украины. Это абсолютная чушь: такого нет и быть не может, - сказал Владимир Гройсман.', 3, 1, 1502809267, 1502809267, '', 'IMG_20170815_141434.jpg', 'Sa4jzBlbxulD9SuR_xToSNyRWfH3YEL-.jpg', '');

-- --------------------------------------------------------

--
-- Структура таблицы `ftblog_user`
--

CREATE TABLE `ftblog_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `ftblog_user`
--

INSERT INTO `ftblog_user` (`id`, `username`, `password`, `auth_key`, `token`, `email`) VALUES
(1, 'admin', '$2y$13$khOzzfirusp5yRkrbcvO6eJJtOcIK3PTYc5QweCCqhGFc/l5xEJ3y', 'HvvWTRWH2Rri8uBBdDY75CcgPQTfWykD', '8xPYddZ7QAJg_6ySRFoyVaqCzVeij39k_1502778015', 'optimist_it@mail.ru'),
(2, 'demo', '$2y$13$7NTSh54sWHV4EDioJ.ktiegOfflfiDgr3Um3c6WyRTUzcSutPMRDS', 'VBC6-pt4ZswC83RMF1cJIJLdWQqzcwIA', 'hTztJCY3pLoW5Gxc1WVQ_1t1qAMiFYNo_1502778015', 'optimist_demo@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `ftblog_users`
--

CREATE TABLE `ftblog_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `ftblog_users`
--

INSERT INTO `ftblog_users` (`id`, `username`, `email`) VALUES
(4, 'qwee', 'ivan@mia.ru'),
(6, 'Иван', 'qwe@mail.ru'),
(8, 'Петр Иванов', 'mail@mai.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ftblog_category`
--
ALTER TABLE `ftblog_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `ftblog_comments`
--
ALTER TABLE `ftblog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comment_post` (`post_id`),
  ADD KEY `FK_comment_user` (`user_id`);

--
-- Индексы таблицы `ftblog_migration`
--
ALTER TABLE `ftblog_migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `ftblog_post`
--
ALTER TABLE `ftblog_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `FK_category_post` (`category_id`),
  ADD KEY `FK_author_post` (`author_id`);

--
-- Индексы таблицы `ftblog_user`
--
ALTER TABLE `ftblog_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Индексы таблицы `ftblog_users`
--
ALTER TABLE `ftblog_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ftblog_category`
--
ALTER TABLE `ftblog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `ftblog_comments`
--
ALTER TABLE `ftblog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `ftblog_post`
--
ALTER TABLE `ftblog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `ftblog_user`
--
ALTER TABLE `ftblog_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `ftblog_users`
--
ALTER TABLE `ftblog_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ftblog_comments`
--
ALTER TABLE `ftblog_comments`
  ADD CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `ftblog_post` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_comment_user` FOREIGN KEY (`user_id`) REFERENCES `ftblog_users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ftblog_post`
--
ALTER TABLE `ftblog_post`
  ADD CONSTRAINT `FK_author_post` FOREIGN KEY (`author_id`) REFERENCES `ftblog_user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_category_post` FOREIGN KEY (`category_id`) REFERENCES `ftblog_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
