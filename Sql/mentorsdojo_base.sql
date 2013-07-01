-- Adminer 3.3.4 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `member_details`;
CREATE TABLE `member_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_id` int(11) NOT NULL,
  `startup` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about_startup` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `schedule` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `member_expertise`;
CREATE TABLE `member_expertise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expertise` varchar(254) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `member_expertise` (`id`, `expertise`, `active`) VALUES
(1,	'Business Development',	1),
(2,	'Creative',	1),
(3,	'Finance',	1),
(4,	'Human Resources',	1),
(5,	'Management',	1),
(6,	'Sales and Marketing',	1),
(7,	'Software Development ',	1);

DROP TABLE IF EXISTS `member_img`;
CREATE TABLE `member_img` (
  `img_url` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `member_profiles`;
CREATE TABLE `member_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `about` text NOT NULL,
  `expertise` text NOT NULL,
  `industries` text NOT NULL,
  `linkedin` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `startup_name` text NOT NULL,
  `about_startup` text NOT NULL,
  `need_help` text,
  `providing` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFUALT CHARSET=latin1;

DROP TABLE IF EXISTS `member_settings`;
CREATE TABLE `member_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_id` int(11) NOT NULL,
  `show_email` int(1) NOT NULL,
  `notify` int(1) NOT NULL,
  `premium` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- INSERT INTO `member_settings` (`id`, `mem_id`, `show_email`, `notify`, `premium`) VALUES

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` text NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` text NOT NULL,
  `user_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `members` (`id`, `fullname`, `username`, `password`, `email`, `user_type`) VALUES
(7,	'Jose Palala',	'josepalala',	'33906635423c23ea2d64ab769454f6f4',	'deterium73@gmail.com',	1),

DROP TABLE IF EXISTS `mesa_members`;
CREATE TABLE `mesa_members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `location` varchar(30) DEFAULT NULL,
  `signature` text,
  `email_setting` tinyint(1) NOT NULL DEFAULT '1',
  `newsletter` tinyint(1) NOT NULL DEFAULT '1',
  `auto_notify` tinyint(1) NOT NULL DEFAULT '0',
  `show_avatars` tinyint(1) NOT NULL DEFAULT '1',
  `num_posts` int(10) unsigned NOT NULL DEFAULT '0',
  `last_message_sent` int(10) unsigned DEFAULT NULL,
  `registered` int(10) unsigned NOT NULL DEFAULT '0',
  `registration_ip` varchar(39) NOT NULL DEFAULT '0.0.0.0',
  `activate_string` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mesa_users_username_idx` (`userid`),
  KEY `mesa_users_registered_idx` (`registered`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `mesa_messages`;
CREATE TABLE `mesa_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fromEmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `toEmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `sent` tinyint(1) NOT NULL DEFAULT '0',
  `received` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `lastdateread` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `mesa_messagestatus`;
CREATE TABLE `mesa_messagestatus` (
  `statusId` int(11) NOT NULL,
  `statuscode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`statusId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `mesa_messagestatus` (`statusId`, `statuscode`, `description`) VALUES
(0,	'DELETED',	'Deleted Message'),
(1,	'PRIVATE',	'Private Message'),
(2,	'PUBLIC',	'Public Message(Displayed on Profile Page)');

DROP TABLE IF EXISTS `mesa_posts`;
CREATE TABLE `mesa_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `post` text COLLATE utf8_unicode_ci,
  `replies` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `mesa_replies`;
CREATE TABLE `mesa_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `reply` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `to` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `sent` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `messages` (`id`, `from`, `to`, `message`, `date`, `sent`) VALUES
(116,	'glennsantos',	'imjohnlouie',	'Tapos na ba yan?',	'2012-06-05 21:12:14',	1),

 

DROP TABLE IF EXISTS `tbl_forums`;
CREATE TABLE `tbl_forums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` int(11) NOT NULL,
  `numtopics` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tbl_posts`;
CREATE TABLE `tbl_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topicid` int(11) NOT NULL,
  `topic` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `numedits` int(3) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `tbl_requests`;
CREATE TABLE `tbl_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_id` int(11) NOT NULL,
  `mentor_memid` int(11) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  `decision` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_team_tasks`;
CREATE TABLE `tbl_team_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `finished` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `tbl_topics`;
CREATE TABLE `tbl_topics` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `memberid` int(11) NOT NULL,
  `numposts` int(11) NOT NULL,
  `lastposter` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2013-07-02 07:12:13
