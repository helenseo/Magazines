SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `magazine_id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL,
  `stat` varchar(20) NOT NULL DEFAULT 'draft',
  PRIMARY KEY (`id`),
  KEY `fk_article_magazine` (`magazine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `article` (`id`, `magazine_id`, `title`, `body`, `published_at`, `updated_at`, `created_at`, `stat`) VALUES
(1, 1, 'Winter Book Club Preview', 'Church-key photo booth esse yr aute. Fingerstache ennui nihil, food truck Neutra magna sint biodiesel McSweeney''s. PBR in dolore sriracha Terry Richardson small batch, locavore post-ironic shabby chic try-hard. Semiotics tousled esse disrupt jean shorts. Banjo sapiente Portland, twee PBR&B quis odio chia PBR sunt Terry Richardson. Est flexitarian cillum street art four loko. Wolf laboris disrupt, laborum nihil id Etsy veniam +1 Williamsburg try-hard whatever DIY.\r\n\r\nQui wolf duis, kale chips roof party lomo fanny pack Odd Future accusamus tempor artisan small batch voluptate direct trade. Anim aliquip occupy raw denim qui. Blog enim Truffaut, minim velit et put a bird on it. Helvetica sunt biodiesel, tofu Pitchfork wayfarers letterpress meh beard ennui labore. Mustache freegan beard keffiyeh. Ut irure paleo Banksy Brooklyn. Gastropub post-ironic cred do typewriter semiotics tattooed yr shabby chic, fixie culpa kogi umami accusamus.', '2013-12-12 19:09:27', '2013-12-12 19:09:27', '2013-12-12 19:09:27', 'published'),
(2, 1, '3 Questions To Ask Yourself', 'Pitchfork cliche qui Helvetica, narwhal delectus Odd Future. Whatever Godard nostrud ethnic fap. Veniam asymmetrical forage sustainable ethical, labore brunch Helvetica pickled nostrud bitters. Brunch beard vegan, lo-fi selvage bicycle rights viral master cleanse banjo ea adipisicing. Labore bicycle rights assumenda, pug deserunt consequat fugiat dreamcatcher proident skateboard nisi tattooed. Incididunt literally duis, tattooed in Williamsburg craft beer raw denim magna +1 pariatur odio wayfarers leggings blog. Fugiat cillum keytar Odd Future, sapiente Cosby sweater consectetur dolor.\r\n\r\nHoodie selfies cred minim, craft beer Shoreditch pickled literally sartorial laborum flannel twee Echo Park whatever. Trust fund jean shorts exercitation ullamco vegan mumblecore, cliche laboris. Vegan craft beer nesciunt Marfa semiotics. Asymmetrical direct trade delectus aute actually, culpa +1 cliche Etsy whatever. Letterpress Tumblr iPhone, skateboard fugiat butcher swag semiotics pariatur duis mustache mlkshk kitsch Echo Park aesthetic. Master cleanse keytar flannel freegan, sriracha forage duis slow-carb synth mollit Austin. Hella brunch you probably haven''t heard of them laborum kogi.', '2013-12-12 19:10:31', '2013-12-12 19:10:31', '2013-12-12 19:10:31', 'active'),
(3, 2, 'Is Phil the Worst Drummer Ever?', 'Pitchfork cillum biodiesel Tumblr, anim tousled McSweeney''s non. PBR post-ironic photo booth, ennui et butcher disrupt ullamco seitan hashtag minim mustache. Mixtape pug pork belly you probably haven''t heard of them church-key, +1 ennui Pinterest keytar nostrud accusamus Carles officia aliquip literally. Vice excepteur DIY, chillwave velit roof party reprehenderit labore odio actually occaecat Neutra. Adipisicing Banksy fixie, est ea fap incididunt fashion axe lomo vero. Disrupt gluten-free aliqua master cleanse, McSweeney''s Wes Anderson quis. Meggings roof party pop-up Terry Richardson elit odio exercitation.\r\n\r\nSustainable hashtag chillwave, art party do tempor mustache slow-carb lomo 3 wolf moon skateboard raw denim labore. Retro swag ex, hashtag selfies before they sold out tofu DIY slow-carb lo-fi dreamcatcher esse. Next level laborum duis Godard wayfarers cray. Accusamus letterpress ethnic, cray chillwave gentrify consequat you probably haven''t heard of them lomo. Tumblr cray artisan street art, seitan swag XOXO shabby chic accusamus freegan gluten-free fingerstache sed fashion axe. Placeat literally asymmetrical leggings shabby chic est, plaid pour-over velit. American Apparel esse retro, paleo swag literally incididunt pop-up cillum.\r\n\r\nMeh. He''s OK.', '2013-12-13 17:46:23', '2013-12-13 17:59:16', '2013-12-13 17:46:23', 'published');

CREATE TABLE IF NOT EXISTS `article_comment` (
  `article_id` int(11) unsigned NOT NULL,
  `comment_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`article_id`,`comment_id`),
  KEY `fk_ac_comment` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `article_comment` (`article_id`, `comment_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4);

CREATE TABLE IF NOT EXISTS `article_image` (
  `article_id` int(11) unsigned NOT NULL,
  `image_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`article_id`,`image_id`),
  KEY `fk_ai_image` (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `article_image` (`article_id`, `image_id`) VALUES
(1, 2),
(2, 5),
(3, 8);

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url` tinytext,
  `comment` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL,
  `stat` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `comment` (`id`, `name`, `email`, `url`, `comment`, `updated_at`, `created_at`, `stat`) VALUES
(1, 'Phil', 'philsown@gmail.com', 'http://www.phillipharrington.com/', 'Wolf art party lo-fi before they sold out eiusmod, wayfarers craft beer artisan. Gentrify occupy small batch 90''s Helvetica, keffiyeh consectetur fap enim. Four loko food truck mixtape trust fund, Wes Anderson craft beer Tonx aliqua Vice nostrud nihil VHS tote bag lomo. Officia farm-to-table 3 wolf moon, occupy kale chips fanny pack swag Bushwick asymmetrical drinking vinegar. Yr est Intelligentsia assumenda gastropub. Sint ethnic Blue Bottle do fixie, put a bird on it church-key ea mustache ugh you probably haven''t heard of them raw denim mollit chillwave bicycle rights. Art party selvage keffiyeh, Carles culpa dolor banjo occupy pug vinyl.', '2013-12-13 00:08:52', '2013-12-13 00:08:52', 'active'),
(2, 'Fred', 'fred@philsown.org', '', 'Sapiente officia flexitarian Cosby sweater biodiesel, single-origin coffee sed laborum. Pug eu cray American Apparel ea fap dolore. Echo Park do dolore fugiat food truck, four loko ullamco flexitarian organic tempor nesciunt Vice. Banksy banjo polaroid accusamus magna. Gastropub fixie letterpress, sint Neutra umami trust fund. Odio drinking vinegar eiusmod put a bird on it, eu Brooklyn Marfa locavore Odd Future. Tonx mlkshk proident vero.', '2013-12-13 00:08:52', '2013-12-13 00:08:52', 'active'),
(3, 'Dr. Julian', 'bashir@ds9.com', '', 'Sartorial quis placeat, occaecat Godard Thundercats odio id. Lomo Odd Future dolore esse, mlkshk Austin brunch gentrify banjo Pitchfork. Shoreditch distillery cliche, umami laboris culpa ullamco. Roof party banh mi paleo, tote bag qui four loko pickled skateboard irure velit single-origin coffee. Portland voluptate nihil chillwave id, retro laboris American Apparel. Labore flannel aesthetic food truck. Irure swag drinking vinegar single-origin coffee fashion axe, Etsy nesciunt iPhone XOXO Echo Park.', '2013-12-13 01:37:53', '2013-12-13 01:37:41', 'pending'),
(4, 'Jadzia Dax', 'dax@trill.com', '', 'Dolore VHS McSweeney''s, Odd Future ea mustache qui artisan Echo Park sint hella. Cupidatat exercitation dolor aesthetic DIY. Cred hashtag High Life sint. Ullamco commodo sapiente organic Austin drinking vinegar. Bushwick mollit Blue Bottle gentrify occupy id. Cupidatat Thundercats craft beer Pitchfork umami food truck pickled meh 3 wolf moon polaroid aesthetic labore. Post-ironic Odd Future art party hoodie fugiat typewriter, adipisicing non id laboris.', '2013-12-13 01:38:34', '2013-12-13 01:38:22', 'pending'),
(5, 'Phil', 'philsown@gmail.com', '', 'Nulla accusamus Tonx, kale chips salvia et butcher farm-to-table XOXO eu. Wolf bespoke disrupt et actually excepteur, beard reprehenderit. Laborum Brooklyn tempor keffiyeh officia before they sold out. Scenester retro before they sold out, ugh aliquip jean shorts Tumblr literally delectus mollit deserunt gluten-free bitters fingerstache. Jean shorts trust fund qui single-origin coffee mustache wolf. Freegan Bushwick vegan delectus kale chips, occupy mumblecore paleo deserunt polaroid. Ad meh semiotics ethnic, drinking vinegar Etsy est.', '2013-12-13 01:40:02', '2013-12-13 01:39:50', 'pending'),
(6, 'Phil', 'philsown@gmail.com', '', 'This is a lovely sunset!', '2013-12-13 17:26:51', '2013-12-13 17:26:39', 'pending');

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

INSERT INTO `image` (`id`, `filename`, `updated_at`, `created_at`) VALUES
(1, 'sunset-1.jpg', '2013-12-13 02:03:03', '2013-12-13 02:03:03'),
(2, 'sunset-2.jpg', '2013-12-13 02:03:03', '2013-12-13 02:03:03'),
(3, 'sunflowers-1.jpg', '2013-12-13 02:03:30', '2013-12-13 02:03:30'),
(4, 'sunflowers-2.jpg', '2013-12-13 02:03:30', '2013-12-13 02:03:30'),
(5, 'sailboat-1.jpg', '2013-12-13 02:05:26', '2013-12-13 02:05:26'),
(6, 'sailboat-2.jpg', '2013-12-13 02:05:26', '2013-12-13 02:05:26'),
(8, 'phil-1.jpg', '2013-12-13 17:56:32', '2013-12-13 17:56:32'),
(9, 'drums-1.jpg', '2013-12-13 17:59:59', '2013-12-13 17:59:59');

CREATE TABLE IF NOT EXISTS `image_comment` (
  `image_id` int(11) unsigned NOT NULL,
  `comment_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`image_id`,`comment_id`),
  KEY `fk_ic_comment` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `image_comment` (`image_id`, `comment_id`) VALUES
(1, 6);

CREATE TABLE IF NOT EXISTS `magazine` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL,
  `stat` varchar(20) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `magazine` (`id`, `name`, `updated_at`, `created_at`, `stat`) VALUES
(1, 'O Mag', '2013-12-12 18:34:47', '2013-12-12 18:34:47', 'active'),
(2, 'Modern Drummer', '2013-12-12 18:34:47', '2013-12-12 18:34:47', 'active');

CREATE TABLE IF NOT EXISTS `magazine_image` (
  `magazine_id` int(11) unsigned NOT NULL,
  `image_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`magazine_id`,`image_id`),
  KEY `fk_mi_image` (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `magazine_image` (`magazine_id`, `image_id`) VALUES
(1, 1),
(2, 9);


ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_magazine` FOREIGN KEY (`magazine_id`) REFERENCES `magazine` (`id`);

ALTER TABLE `article_comment`
  ADD CONSTRAINT `fk_ac_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ac_comment` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`) ON DELETE CASCADE;

ALTER TABLE `article_image`
  ADD CONSTRAINT `fk_ai_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ai_image` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE;

ALTER TABLE `image_comment`
  ADD CONSTRAINT `fk_ic_comment` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ic_image` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE;

ALTER TABLE `magazine_image`
  ADD CONSTRAINT `fk_mi_image` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_mi_magazine` FOREIGN KEY (`magazine_id`) REFERENCES `magazine` (`id`) ON DELETE CASCADE;
