-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 26 Maj 2013, 21:56
-- Wersja serwera: 5.5.27
-- Wersja PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `kohanablog`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `blog` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tags` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `blog`
--

INSERT INTO `blog` (`id`, `title`, `author`, `blog`, `image`, `tags`, `created`, `updated`, `slug`) VALUES
(1, 'A second day with Symfony2', 'dsyph3r', 'Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.', 'beach.jpg', 'symfony2, php, paradise, symblog', '2013-05-26 00:00:51', '2013-05-26 00:00:51', 'a-day-with-symfony2'),
(2, 'The pool on the roof must have a leak', 'Zero Cool', 'Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Na. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis.', 'pool_leak.jpg', 'pool, leaky, hacked, movie, hacking, symblog', '2011-07-23 06:12:33', '2011-07-23 06:12:33', 'the-pool-on-the-roof-must-have-a-leak'),
(3, 'Misdirection. What the eyes see and the ears hear, the mind believes', 'Gabriel', 'Lorem ipsumvehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.', 'misdirection.jpg', 'misdirection, magic, movie, hacking, symblog', '2013-04-28 19:50:28', '2013-04-28 19:50:28', 'misdirection-what-the-eyes-see-and-the-ears-hear-the-mind-believes'),
(4, 'The grid - A digital frontier', 'Kevin Flynn', 'Lorem commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra.', 'the_grid.jpg', 'grid, daftpunk, movie, symblog', '2013-04-28 19:50:28', '2013-04-28 19:50:28', 'the-grid-a-digital-frontier'),
(6, 'New cool post :)', 'Maxx', 'This is just new testing post :)', '', 'test,blog', '2013-05-25 23:41:55', '2013-05-25 23:41:55', 'n-a');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9474526CDAE07E97` (`blog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=44 ;

--
-- Zrzut danych tabeli `comment`
--

INSERT INTO `comment` (`id`, `blog_id`, `user`, `comment`, `approved`, `created`, `updated`) VALUES
(1, 1, 'Fankhauser', 'Nowy komentarzyk ala Maxxior', 0, '2013-05-26 21:32:41', '2013-05-26 21:32:41'),
(2, 1, 'David', 'To make a long story short. Choosing a framework must not be taken lightly; it is a long-term commitment. Make sure that you make the right selection!', 1, '2013-04-28 19:50:28', '2013-04-28 19:50:28'),
(3, 2, 'Dade', 'Anything else, mom? You want me to mow the lawn? Oops! I forgot, New York, No grass.', 1, '2013-04-28 19:50:28', '2013-04-28 19:50:28'),
(4, 2, 'Kate', 'Are you challenging me? ', 1, '2011-07-23 06:15:20', '2013-04-28 19:50:28'),
(5, 2, 'Dade', 'Name your stakes.', 1, '2011-07-23 06:18:35', '2013-04-28 19:50:28'),
(6, 2, 'Kate', 'If I win, you become my slave.', 1, '2011-07-23 06:22:53', '2013-04-28 19:50:28'),
(7, 2, 'Dade', 'Your SLAVE?', 1, '2011-07-23 06:25:15', '2013-04-28 19:50:28'),
(8, 2, 'Kate', 'You wish! You''ll do shitwork, scan, crack copyrights...', 1, '2011-07-23 06:46:08', '2013-04-28 19:50:28'),
(9, 2, 'Dade', 'And if I win?', 1, '2011-07-23 10:22:46', '2013-04-28 19:50:28'),
(10, 2, 'Kate', 'Make it my first-born!', 1, '2011-07-23 11:08:08', '2013-04-28 19:50:28'),
(11, 2, 'Dade', 'Make it our first-date!', 1, '2011-07-24 18:56:01', '2013-04-28 19:50:28'),
(12, 2, 'Kate', 'I don''t DO dates. But I don''t lose either, so you''re on!', 1, '2011-07-25 22:28:42', '2013-04-28 19:50:28'),
(13, 3, 'Stanley', 'It''s not gonna end like this.', 1, '2013-04-28 19:50:28', '2013-04-28 19:50:28'),
(14, 3, 'Gabriel', 'Oh, come on, Stan. Not everything ends the way you think it should. Besides, audiences love happy endings.', 1, '2013-04-28 19:50:28', '2013-04-28 19:50:28'),
(40, 1, 'Maxx', 'Nowy komentarz w sprawie bloga', 1, '2013-05-05 23:29:55', '2013-05-05 23:29:55'),
(41, 1, 'Maxx', 'Nowy komentarz', 1, '2013-05-09 23:11:37', '2013-05-09 23:11:37'),
(42, 1, 'Maxx', 'Testowy komentarz', 1, '2013-05-10 01:38:59', '2013-05-10 01:38:59'),
(43, 2, 'Maxx', 'W innym poscie', 1, '2013-05-10 23:32:38', '2013-05-10 23:32:38');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Login privileges, granted after account confirmation'),
(2, 'admin', 'Administrative user, has access to everything.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles_users`
--

CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `roles_users`
--

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `logins`, `last_login`) VALUES
(3, 'maxx1991@gmail.com', 'admin', 'ca5b0284c84d293a744aac1ffd91c5cdd0cc96cbd49a2c654efeb5c80c1a060d', 8, 1369595046);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_tokens`
--

CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`),
  KEY `expires` (`expires`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`);

--
-- Ograniczenia dla tabeli `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
