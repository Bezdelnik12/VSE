-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 05 2021 г., 18:04
-- Версия сервера: 10.4.12-MariaDB
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kurs`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'О скрипте'),
(2, 'Разное');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `create_date` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `body` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `parents_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `create_date`, `body`, `post_id`, `parents_id`) VALUES
(1, 1, 1638716456, 'Тестовый комментарий 1', 3, 0),
(2, 1, 1638716456, 'Тестовый комментарий 2', 3, 0),
(3, 1, 1638716456, 'Тестовый комментарий 3', 3, 0),
(4, 1, 1638716456, 'Тестовый комментарий 4', 3, 0),
(5, 1, 1638716456, 'Тестовый комментарий 5', 3, 0),
(6, 1, 1638716456, 'Тестовый комментарий 6', 3, 0),
(7, 1, 1638716456, 'Тестовый комментарий 7', 3, 0),
(8, 1, 1638716456, 'Тестовый комментарий 8', 3, 0),
(9, 1, 1638716456, 'Тестовый комментарий 9', 3, 0),
(10, 1, 1638716456, 'Тестовый комментарий 10', 3, 0),
(11, 1, 1638716456, 'Тестовый комментарий 11', 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parents_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `link`, `parents_id`) VALUES
(1, 'Главная', '/', 0),
(2, 'Правила сайта', '/page1', 0),
(3, 'О нас', '/page2', 0),
(4, 'Контакты', '/page2', 3),
(5, 'ВКонтакте', 'https://vk.com/bezdelnik08', 3),
(6, 'Новости', '/', 0),
(7, 'О скрипте', '/category1', 6),
(8, 'Разное', '/category2', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `body`) VALUES
(1, 'Общие правила на сайте', '<p><strong style=\"margin: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 15.12px; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: #353535; background-color: #ffffff;\">Общие правила поведения на сайте:</strong><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">Начнем с того, что на сайте общаются сотни людей, разных религий и взглядов, и все они являются полноправными посетителями нашего сайта, поэтому если мы хотим чтобы это сообщество людей функционировало нам и необходимы правила. Мы настоятельно рекомендуем прочитать настоящие правила, это займет у вас всего минут пять, но сбережет нам и вам время и поможет сделать сайт более интересным и организованным.</span><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">Начнем с того, что на нашем сайте нужно вести себя уважительно ко всем посетителям сайта. Не надо оскорблений по отношению к участникам, это всегда лишнее. Если есть претензии - обращайтесь к Админам или Модераторам (воспользуйтесь личными сообщениями). Оскорбление других посетителей считается у нас одним из самых тяжких нарушений и строго наказывается администрацией.&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 15.12px; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: #353535; background-color: #ffffff;\">У нас строго запрещен расизм, религиозные и политические высказывания.</strong><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">&nbsp;Заранее благодарим вас за понимание и за желание сделать наш сайт более вежливым и дружелюбным.</span><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><strong style=\"margin: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 15.12px; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: #353535; background-color: #ffffff;\">На сайте строго запрещено:</strong><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">- сообщения, не относящиеся к содержанию статьи или к контексту обсуждения</span><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">- оскорбление и угрозы в адрес посетителей сайта</span><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">- в комментариях запрещаются выражения, содержащие ненормативную лексику, унижающие человеческое достоинство, разжигающие межнациональную рознь</span><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">- спам, а также реклама любых товаров и услуг, иных ресурсов, СМИ или событий, не относящихся к контексту обсуждения статьи</span><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">Давайте будем уважать друг друга и сайт, на который Вы и другие читатели приходят пообщаться и высказать свои мысли. Администрация сайта оставляет за собой право удалять комментарии или часть комментариев, если они не соответствуют данным требованиям.</span><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">При нарушении правил вам может быть дано&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 15.12px; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: #353535; background-color: #ffffff;\">предупреждение</strong><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">. В некоторых случаях может быть дан бан&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 15.12px; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: #353535; background-color: #ffffff;\">без предупреждений</strong><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">. По вопросам снятия бана писать администратору.</span><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><strong style=\"margin: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 15.12px; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: #353535; background-color: #ffffff;\">Оскорбление</strong><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">&nbsp;администраторов или модераторов также караются&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 15.12px; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: #353535; background-color: #ffffff;\">баном</strong><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">&nbsp;- уважайте чужой труд.</span></p>'),
(2, 'Контакты', '<p>Служба технической поддержки: <a href=\"mailto:support@vse.ru\">support@vse.ru</a></p>\r\n<p>Вконтакте: <a href=\"https://vk.com/bezdelnik08\" target=\"_blank\">https://vk.com/bezdelnik08</a></p>\r\n<p><script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A900af870c7f584d8ca3a5368116f92c33e07f30711b4b6869bcbbb7a249e8ba5&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true\"></script></p>');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `body` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autor_id` int(11) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `create_date`, `body`, `autor_id`, `desc`, `images`, `categories_id`) VALUES
(1, 'Осуществление технической поддержки скрипта', 1638715657, '<p><strong style=\"margin: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 15.12px; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: #353535; background-color: #ffffff;\">Техническая поддержка скрипта</strong><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">&nbsp;осуществляется&nbsp;</span><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\"> по E-Mail (support@vse.ru). По мере поступления возникших у вас вопросов мы стараемся ответить на все ваши вопросы. Гарантированная техническая поддержка предоставляется всем пользователям.</span></p>\r\n<p><strong style=\"margin: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 15.12px; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: #353535; background-color: #ffffff;\">Услуги по технической поддержке скрипта включают в себя:</strong><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">1. Приоритетное получение ответа на вопросы, которые задают пользователи впервые столкнувшиеся со скриптом и естественно не знающие всех нюансов работы скрипта. В компетенции службы поддержки находится только помощь только по непосредственным сбоям самого скрипта, в случае если причиной некорректной работы скрипта явился ваш шаблон, не соответствующий требованиям скрипта, то в поддержке вам может быть отказано.</span><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">2. Также вы получаете возможность одноразовой установки скрипта вам на сервер, включая настройку его до полной работоспособности с учетом текущих настроек сервера (иногда нужно верно отключить поддержку ЧПУ, включение специальных директив для Русского Апача, для верной загрузки картинок и прочее...).</span><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">3. Вы получаете консультационную поддержку по работе со структурой скрипта, например у вас есть желание добавить небольшие изменения в скрипт для более удобной работы для вас, вы сможете сэкономить время на поиске нужного куска кода просто спросив у нас. Вам будет предоставлена консультация где это копать и как вообще лучше реализовать поставленную задачу. (Внимание мы не пишем за вас дополнительные модули, а только помогаем вам лучше разобраться со структурой скрипта, поэтому всегда задавайте вопросы по существу, вопросы типа: \"как мне сделать такую фишку\" могут быть проигнорированы службой поддержки).</span><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">4. Еще одна из часто возникающих проблем это некорректное обновление скрипта, например во время обновления произошел сбой сервера, часть новых данных была внесена в базу и настройки, часть нет, в итоге вы получаете нерабочий скрипт, со всеми вытекающими последствиями. В данном случае для вас будет проведена ручная коррекция поврежденной структуры базы данных.</span><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">В случае если вы не являетесь подписчиком дополнительной службы поддержки, ваши вопросы могут быть проигнорированы и оставлены без ответа.</span><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><br style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\" /><strong style=\"margin: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 15.12px; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: #353535; background-color: #ffffff;\">С уважением,</strong></p>\r\n<p><strong style=\"margin: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 15.12px; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: #353535; background-color: #ffffff;\">VSE</strong></p>', 1, '<p><strong style=\"margin: 0px; padding: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 15.12px; line-height: inherit; font-family: Arial, Helvetica, sans-serif; vertical-align: baseline; color: #353535; background-color: #ffffff;\">Техническая поддержка скрипта</strong><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">&nbsp;осуществляется </span><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">&nbsp;по E-Mail (support@vse.ru). По мере поступления возникших у вас вопросов мы стараемся ответить на все ваши вопросы. Гарантированная техническая поддержка предоставляется всем пользователям.</span></p>', NULL, 1),
(2, 'Добро пожаловать', 1638715762, '<p><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">Добро пожаловать на демонстрационную страницу движка VSE Engine. VSE Engine - это многопользовательский новостной движок, обладающий большими функциональными возможностями.</span></p>\r\n<p><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">Движок предназначен, в первую очередь, для создания новостных блогов и сайтов с большим информационным контекстом. Однако, он имеет большое количество настроек, которые позволяют использовать его практически для любых целей. Движок может быть интегрирован практически в любой существующий дизайн, и не имеет никаких ограничений по созданию шаблонов для него. Еще одной ключевой особенностью VSE Engine является низкая нагрузка на системные ресурсы. Даже при очень большой аудитории сайта нагрузка на сервер будет минимальной, и вы не будете испытывать каких-либо проблем с отображением информации. Движок оптимизирован под поисковые системы.</span></p>', 1, '<p><span style=\"color: #353535; font-family: Arial, Helvetica, sans-serif; font-size: 15.12px; background-color: #ffffff;\">Добро пожаловать на демонстрационную страницу движка VSE Engine. VSE Engine - это многопользовательский новостной движок, обладающий большими функциональными возможностями.</span></p>', NULL, 1),
(3, 'Тестовая новость', 1638716291, '<p>Тестовая новость</p>', 1, '<p>Тестовая новость</p>', NULL, 2),
(4, 'Тестовая новость 2', 1638716291, '<p>Тестовая новость</p>', 1, '<p>Тестовая новость</p>', NULL, 2),
(5, 'Тестовая новость 3', 1638716291, '<p>Тестовая новость</p>', 1, '<p>Тестовая новость</p>', NULL, 2),
(6, 'Тестовая новость 4', 1638716291, '<p>Тестовая новость</p>', 1, '<p>Тестовая новость</p>', NULL, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_group` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `user_group`, `nickname`) VALUES
(1, 'admin', '$2y$13$vHVzd.g56xrBQpYXUmricOIqkoOHjAsFPxejWjBjlucoMkeWfqdqK', 'admin@vse.ru', 1, 'Администратор');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comments_users` (`user_id`),
  ADD KEY `FK_comments_posts` (`post_id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_posts_users` (`autor_id`),
  ADD KEY `FK_posts_categories` (`categories_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_comments_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `FK_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_posts_categories` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `FK_posts_users` FOREIGN KEY (`autor_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
