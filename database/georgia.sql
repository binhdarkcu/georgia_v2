-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2015 at 12:32 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `georgia`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE IF NOT EXISTS `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wp_commentmeta`
--


-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE IF NOT EXISTS `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Mr WordPress', '', 'https://wordpress.org/', '', '2015-04-18 07:36:57', '2015-04-18 07:36:57', 'Hi, this is a comment.\r\nTo delete a comment, just log in and view the post&#039;s comments. There you will have the option to edit or delete them.', 0, 'post-trashed', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_data_members`
--

CREATE TABLE IF NOT EXISTS `wp_data_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_personname` varchar(255) DEFAULT NULL,
  `f_telefoon` varchar(255) DEFAULT NULL,
  `f_fax` varchar(255) DEFAULT NULL,
  `f_email` varchar(100) DEFAULT NULL,
  `f_btw` varchar(255) DEFAULT NULL,
  `f_interest` varchar(255) DEFAULT NULL,
  `f_addresspayment` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wp_data_members`
--


-- --------------------------------------------------------

--
-- Table structure for table `wp_information`
--

CREATE TABLE IF NOT EXISTS `wp_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `b_naam` varchar(255) DEFAULT NULL,
  `b_hoofd` varchar(255) DEFAULT NULL,
  `b_firma` varchar(255) DEFAULT NULL,
  `b_straat` varchar(255) DEFAULT NULL,
  `b_nr` varchar(255) DEFAULT NULL,
  `b_postcode` varchar(255) DEFAULT NULL,
  `b_plaats` int(11) DEFAULT NULL,
  `b_land` varchar(255) DEFAULT NULL,
  `b_telefoon` varchar(255) DEFAULT NULL,
  `b_fax` varchar(20) DEFAULT NULL,
  `b_gsm` varchar(100) DEFAULT NULL,
  `b_email` varchar(100) DEFAULT NULL,
  `b_organisatie` varchar(100) DEFAULT NULL,
  `b_functies` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wp_information`
--


-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE IF NOT EXISTS `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wp_links`
--


-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE IF NOT EXISTS `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=179 ;

--
-- Dumping data for table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2', 'yes'),
(2, 'home', 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2', 'yes'),
(3, 'blogname', 'Georgia website', 'yes'),
(4, 'blogdescription', 'Just another WordPress site', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'binhdarkcu@gmail.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%postname%/', 'yes'),
(29, 'gzipcompression', '0', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:5:{i:0;s:51:"acf-field-date-time-picker/acf-date_time_picker.php";i:1;s:29:"acf-range-field/acf-range.php";i:2;s:29:"acf-repeater/acf-repeater.php";i:3;s:30:"advanced-custom-fields/acf.php";i:4;s:37:"tinymce-advanced/tinymce-advanced.php";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'advanced_edit', '0', 'yes'),
(37, 'comment_max_links', '2', 'yes'),
(38, 'gmt_offset', '0', 'yes'),
(39, 'default_email_category', '1', 'yes'),
(40, 'recently_edited', '', 'no'),
(41, 'template', 'georgia', 'yes'),
(42, 'stylesheet', 'georgia', 'yes'),
(43, 'comment_whitelist', '1', 'yes'),
(44, 'blacklist_keys', '', 'no'),
(45, 'comment_registration', '0', 'yes'),
(46, 'html_type', 'text/html', 'yes'),
(47, 'use_trackback', '0', 'yes'),
(48, 'default_role', 'subscriber', 'yes'),
(49, 'db_version', '30133', 'yes'),
(50, 'uploads_use_yearmonth_folders', '1', 'yes'),
(51, 'upload_path', '', 'yes'),
(52, 'blog_public', '1', 'yes'),
(53, 'default_link_category', '2', 'yes'),
(54, 'show_on_front', 'posts', 'yes'),
(55, 'tag_base', '', 'yes'),
(56, 'show_avatars', '1', 'yes'),
(57, 'avatar_rating', 'G', 'yes'),
(58, 'upload_url_path', '', 'yes'),
(59, 'thumbnail_size_w', '150', 'yes'),
(60, 'thumbnail_size_h', '150', 'yes'),
(61, 'thumbnail_crop', '1', 'yes'),
(62, 'medium_size_w', '300', 'yes'),
(63, 'medium_size_h', '300', 'yes'),
(64, 'avatar_default', 'mystery', 'yes'),
(65, 'large_size_w', '1024', 'yes'),
(66, 'large_size_h', '1024', 'yes'),
(67, 'image_default_link_type', 'file', 'yes'),
(68, 'image_default_size', '', 'yes'),
(69, 'image_default_align', '', 'yes'),
(70, 'close_comments_for_old_posts', '0', 'yes'),
(71, 'close_comments_days_old', '14', 'yes'),
(72, 'thread_comments', '1', 'yes'),
(73, 'thread_comments_depth', '5', 'yes'),
(74, 'page_comments', '0', 'yes'),
(75, 'comments_per_page', '50', 'yes'),
(76, 'default_comments_page', 'newest', 'yes'),
(77, 'comment_order', 'asc', 'yes'),
(78, 'sticky_posts', 'a:0:{}', 'yes'),
(79, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(80, 'widget_text', 'a:0:{}', 'yes'),
(81, 'widget_rss', 'a:0:{}', 'yes'),
(82, 'uninstall_plugins', 'a:0:{}', 'no'),
(83, 'timezone_string', '', 'yes'),
(84, 'page_for_posts', '0', 'yes'),
(85, 'page_on_front', '0', 'yes'),
(86, 'default_post_format', '0', 'yes'),
(87, 'link_manager_enabled', '0', 'yes'),
(88, 'initial_db_version', '30133', 'yes'),
(89, 'wp_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:62:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:9:"add_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes'),
(90, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(91, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(92, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(93, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(94, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(95, 'sidebars_widgets', 'a:3:{s:19:"wp_inactive_widgets";a:0:{}s:18:"orphaned_widgets_1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:13:"array_version";i:3;}', 'yes'),
(96, 'cron', 'a:5:{i:1429988580;a:1:{s:20:"wp_maybe_auto_update";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1429990644;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1430033878;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1430036138;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(98, '_transient_random_seed', 'd7e3105409f92059c6e7b4113927c73a', 'yes'),
(99, '_site_transient_update_core', 'O:8:"stdClass":4:{s:7:"updates";a:2:{i:0;O:8:"stdClass":10:{s:8:"response";s:7:"upgrade";s:8:"download";s:56:"http://downloads.wordpress.org/release/wordpress-4.2.zip";s:6:"locale";s:5:"en_US";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:56:"http://downloads.wordpress.org/release/wordpress-4.2.zip";s:10:"no_content";s:67:"http://downloads.wordpress.org/release/wordpress-4.2-no-content.zip";s:11:"new_bundled";s:68:"http://downloads.wordpress.org/release/wordpress-4.2-new-bundled.zip";s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:3:"4.2";s:7:"version";s:3:"4.2";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"4.1";s:15:"partial_version";s:0:"";}i:1;O:8:"stdClass":10:{s:8:"response";s:7:"upgrade";s:8:"download";s:56:"http://downloads.wordpress.org/release/wordpress-4.2.zip";s:6:"locale";s:5:"en_US";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:56:"http://downloads.wordpress.org/release/wordpress-4.2.zip";s:10:"no_content";s:67:"http://downloads.wordpress.org/release/wordpress-4.2-no-content.zip";s:11:"new_bundled";s:68:"http://downloads.wordpress.org/release/wordpress-4.2-new-bundled.zip";s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:0:"";s:7:"version";s:0:"";s:11:"php_version";s:3:"4.3";s:13:"mysql_version";s:5:"4.1.2";s:11:"new_bundled";s:3:"4.1";s:15:"partial_version";s:0:"";}}s:12:"last_checked";i:1429948193;s:15:"version_checked";s:5:"4.1.1";s:12:"translations";a:0:{}}', 'yes'),
(172, '_site_transient_timeout_theme_roots', '1429949996', 'yes'),
(173, '_site_transient_theme_roots', 'a:4:{s:7:"georgia";s:7:"/themes";s:13:"twentyfifteen";s:7:"/themes";s:14:"twentyfourteen";s:7:"/themes";s:14:"twentythirteen";s:7:"/themes";}', 'yes'),
(107, 'can_compress_scripts', '1', 'yes'),
(175, '_transient_timeout_plugin_slugs', '1430046158', 'no'),
(176, '_transient_plugin_slugs', 'a:7:{i:0;s:30:"advanced-custom-fields/acf.php";i:1;s:51:"acf-field-date-time-picker/acf-date_time_picker.php";i:2;s:29:"acf-range-field/acf-range.php";i:3;s:29:"acf-repeater/acf-repeater.php";i:4;s:19:"akismet/akismet.php";i:5;s:9:"hello.php";i:6;s:37:"tinymce-advanced/tinymce-advanced.php";}', 'no'),
(177, '_transient_timeout_dash_4077549d03da2e451c8b5f002294ff51', '1430002958', 'no'),
(178, '_transient_dash_4077549d03da2e451c8b5f002294ff51', '<div class="rss-widget"><p><strong>RSS Error</strong>: WP HTTP Error: 0: php_network_getaddresses: getaddrinfo failed: No such host is known. </p></div><div class="rss-widget"><p><strong>RSS Error</strong>: WP HTTP Error: 0: php_network_getaddresses: getaddrinfo failed: No such host is known. </p></div><div class="rss-widget"><ul></ul></div>', 'no'),
(127, 'current_theme', 'Georgia', 'yes'),
(128, 'theme_mods_georgia', 'a:1:{i:0;b:0;}', 'yes'),
(129, 'theme_switched', '', 'yes'),
(132, 'recently_activated', 'a:0:{}', 'yes'),
(133, 'acf_version', '4.3.9', 'yes'),
(138, 'category_children', 'a:0:{}', 'yes'),
(142, 'rewrite_rules', 'a:67:{s:47:"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:42:"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:35:"category/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:17:"category/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:20:"(.?.+?)(/[0-9]+)?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:27:"[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:20:"([^/]+)/trackback/?$";s:31:"index.php?name=$matches[1]&tb=1";s:40:"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:35:"([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:28:"([^/]+)/page/?([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&paged=$matches[2]";s:35:"([^/]+)/comment-page-([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&cpage=$matches[2]";s:20:"([^/]+)(/[0-9]+)?/?$";s:43:"index.php?name=$matches[1]&page=$matches[2]";s:16:"[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:26:"[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:46:"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";}', 'yes'),
(143, 'tadv_settings', 'a:6:{s:9:"toolbar_1";s:117:"bold,italic,blockquote,bullist,numlist,alignleft,aligncenter,alignright,link,unlink,table,fullscreen,undo,redo,wp_adv";s:9:"toolbar_2";s:121:"formatselect,alignjustify,strikethrough,outdent,indent,pastetext,removeformat,charmap,wp_more,emoticons,forecolor,wp_help";s:9:"toolbar_3";s:0:"";s:9:"toolbar_4";s:0:"";s:7:"options";s:15:"advlist,menubar";s:7:"plugins";s:107:"anchor,code,insertdatetime,nonbreaking,print,searchreplace,table,visualblocks,visualchars,emoticons,advlist";}', 'yes'),
(144, 'tadv_admin_settings', 'a:2:{s:7:"options";s:8:"no_autop";s:16:"disabled_plugins";s:0:"";}', 'yes'),
(145, 'tadv_version', '4000', 'yes'),
(167, 'auto_updater.lock', '1429945447', 'no'),
(171, '_site_transient_update_plugins', 'O:8:"stdClass":4:{s:12:"last_checked";i:1429948194;s:8:"response";a:2:{s:30:"advanced-custom-fields/acf.php";O:8:"stdClass":6:{s:2:"id";s:5:"21367";s:4:"slug";s:22:"advanced-custom-fields";s:6:"plugin";s:30:"advanced-custom-fields/acf.php";s:11:"new_version";s:5:"4.4.1";s:3:"url";s:53:"https://wordpress.org/plugins/advanced-custom-fields/";s:7:"package";s:65:"https://downloads.wordpress.org/plugin/advanced-custom-fields.zip";}s:19:"akismet/akismet.php";O:8:"stdClass":6:{s:2:"id";s:2:"15";s:4:"slug";s:7:"akismet";s:6:"plugin";s:19:"akismet/akismet.php";s:11:"new_version";s:5:"3.1.1";s:3:"url";s:38:"https://wordpress.org/plugins/akismet/";s:7:"package";s:56:"https://downloads.wordpress.org/plugin/akismet.3.1.1.zip";}}s:12:"translations";a:0:{}s:9:"no_update";a:4:{s:51:"acf-field-date-time-picker/acf-date_time_picker.php";O:8:"stdClass":6:{s:2:"id";s:5:"39864";s:4:"slug";s:26:"acf-field-date-time-picker";s:6:"plugin";s:51:"acf-field-date-time-picker/acf-date_time_picker.php";s:11:"new_version";s:8:"2.0.18.1";s:3:"url";s:57:"https://wordpress.org/plugins/acf-field-date-time-picker/";s:7:"package";s:78:"https://downloads.wordpress.org/plugin/acf-field-date-time-picker.2.0.18.1.zip";}s:29:"acf-range-field/acf-range.php";O:8:"stdClass":6:{s:2:"id";s:5:"46552";s:4:"slug";s:15:"acf-range-field";s:6:"plugin";s:29:"acf-range-field/acf-range.php";s:11:"new_version";s:5:"1.1.4";s:3:"url";s:46:"https://wordpress.org/plugins/acf-range-field/";s:7:"package";s:64:"https://downloads.wordpress.org/plugin/acf-range-field.1.1.4.zip";}s:9:"hello.php";O:8:"stdClass":6:{s:2:"id";s:4:"3564";s:4:"slug";s:11:"hello-dolly";s:6:"plugin";s:9:"hello.php";s:11:"new_version";s:3:"1.6";s:3:"url";s:42:"https://wordpress.org/plugins/hello-dolly/";s:7:"package";s:58:"https://downloads.wordpress.org/plugin/hello-dolly.1.6.zip";}s:37:"tinymce-advanced/tinymce-advanced.php";O:8:"stdClass":6:{s:2:"id";s:3:"731";s:4:"slug";s:16:"tinymce-advanced";s:6:"plugin";s:37:"tinymce-advanced/tinymce-advanced.php";s:11:"new_version";s:5:"4.1.9";s:3:"url";s:47:"https://wordpress.org/plugins/tinymce-advanced/";s:7:"package";s:65:"https://downloads.wordpress.org/plugin/tinymce-advanced.4.1.9.zip";}}}', 'yes'),
(170, '_site_transient_update_themes', 'O:8:"stdClass":4:{s:12:"last_checked";i:1429948197;s:7:"checked";a:4:{s:7:"georgia";s:3:"1.1";s:13:"twentyfifteen";s:3:"1.0";s:14:"twentyfourteen";s:3:"1.3";s:14:"twentythirteen";s:3:"1.4";}s:8:"response";a:3:{s:13:"twentyfifteen";a:4:{s:5:"theme";s:13:"twentyfifteen";s:11:"new_version";s:3:"1.1";s:3:"url";s:43:"https://wordpress.org/themes/twentyfifteen/";s:7:"package";s:59:"https://downloads.wordpress.org/theme/twentyfifteen.1.1.zip";}s:14:"twentyfourteen";a:4:{s:5:"theme";s:14:"twentyfourteen";s:11:"new_version";s:3:"1.4";s:3:"url";s:44:"https://wordpress.org/themes/twentyfourteen/";s:7:"package";s:60:"https://downloads.wordpress.org/theme/twentyfourteen.1.4.zip";}s:14:"twentythirteen";a:4:{s:5:"theme";s:14:"twentythirteen";s:11:"new_version";s:3:"1.5";s:3:"url";s:44:"https://wordpress.org/themes/twentythirteen/";s:7:"package";s:60:"https://downloads.wordpress.org/theme/twentythirteen.1.5.zip";}}s:12:"translations";a:0:{}}', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE IF NOT EXISTS `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=209 ;

--
-- Dumping data for table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 1, '_wp_trash_meta_status', 'publish'),
(3, 1, '_wp_trash_meta_time', '1429344937'),
(4, 1, '_wp_trash_meta_comments_status', 'a:1:{i:1;s:1:"1";}'),
(5, 5, '_edit_last', '1'),
(6, 5, '_edit_lock', '1429978017:1'),
(10, 7, 'field_5532135948f79', 'a:12:{s:3:"key";s:19:"field_5532135948f79";s:5:"label";s:5:"Place";s:4:"name";s:5:"place";s:4:"type";s:10:"google_map";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:10:"center_lat";s:0:"";s:10:"center_lng";s:0:"";s:4:"zoom";s:0:"";s:6:"height";s:0:"";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:4:"null";s:8:"operator";s:2:"==";s:5:"value";s:0:"";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:0;}'),
(9, 7, '_edit_last', '1'),
(175, 7, 'rule', 'a:5:{s:5:"param";s:9:"post_type";s:8:"operator";s:2:"==";s:5:"value";s:4:"post";s:8:"order_no";i:0;s:8:"group_no";i:0;}'),
(12, 7, 'position', 'acf_after_title'),
(13, 7, 'layout', 'no_box'),
(14, 7, 'hide_on_screen', ''),
(15, 7, '_edit_lock', '1429349126:1'),
(18, 7, 'field_55321420312d0', 'a:11:{s:3:"key";s:19:"field_55321420312d0";s:5:"label";s:8:"DateTime";s:4:"name";s:8:"datetime";s:4:"type";s:11:"date_picker";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:11:"date_format";s:6:"ddmmyy";s:14:"display_format";s:8:"dd MM yy";s:9:"first_day";s:1:"1";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:2:{s:5:"field";s:4:"null";s:8:"operator";s:2:"==";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:1;}'),
(21, 7, 'field_553214aecc770', 'a:13:{s:3:"key";s:19:"field_553214aecc770";s:5:"label";s:7:"Shedule";s:4:"name";s:7:"shedule";s:4:"type";s:8:"repeater";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:10:"sub_fields";a:3:{i:0;a:16:{s:3:"key";s:19:"field_55321ac89a735";s:5:"label";s:5:"Start";s:4:"name";s:5:"start";s:4:"type";s:16:"date_time_picker";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:12:"column_width";s:2:"25";s:9:"show_date";s:5:"false";s:11:"date_format";s:5:"m/d/y";s:11:"time_format";s:7:"h:mm tt";s:16:"show_week_number";s:5:"false";s:6:"picker";s:6:"slider";s:17:"save_as_timestamp";s:4:"true";s:16:"get_as_timestamp";s:5:"false";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:4:"null";s:8:"operator";s:2:"==";s:5:"value";s:0:"";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:0;}i:1;a:16:{s:3:"key";s:19:"field_55321add9a736";s:5:"label";s:6:"Finish";s:4:"name";s:6:"finish";s:4:"type";s:16:"date_time_picker";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:12:"column_width";s:2:"25";s:9:"show_date";s:5:"false";s:11:"date_format";s:5:"m/d/y";s:11:"time_format";s:7:"h:mm tt";s:16:"show_week_number";s:5:"false";s:6:"picker";s:6:"slider";s:17:"save_as_timestamp";s:4:"true";s:16:"get_as_timestamp";s:5:"false";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:4:"null";s:8:"operator";s:2:"==";s:5:"value";s:0:"";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:1;}i:2;a:15:{s:3:"key";s:19:"field_55321f477e57d";s:5:"label";s:6:"Action";s:4:"name";s:6:"action";s:4:"type";s:4:"text";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:12:"column_width";s:2:"50";s:13:"default_value";s:0:"";s:11:"placeholder";s:0:"";s:7:"prepend";s:0:"";s:6:"append";s:0:"";s:10:"formatting";s:4:"html";s:9:"maxlength";s:0:"";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:4:"null";s:8:"operator";s:2:"==";s:5:"value";s:0:"";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:2;}}s:7:"row_min";s:0:"";s:9:"row_limit";s:0:"";s:6:"layout";s:5:"table";s:12:"button_label";s:7:"Add Row";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:4:"null";s:8:"operator";s:2:"==";s:5:"value";s:0:"";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:3;}'),
(23, 7, 'field_55321566e6d14', 'a:18:{s:3:"key";s:19:"field_55321566e6d14";s:5:"label";s:4:"Cost";s:4:"name";s:4:"cost";s:4:"type";s:5:"range";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:11:"slider_type";s:7:"default";s:5:"title";s:1:"$";s:7:"prepend";s:0:"";s:6:"append";s:0:"";s:8:"separate";s:1:"-";s:15:"default_value_1";s:1:"0";s:15:"default_value_2";s:4:"1000";s:3:"min";s:1:"0";s:3:"max";s:4:"1000";s:4:"step";s:1:"1";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:4:"null";s:8:"operator";s:2:"==";s:5:"value";s:0:"";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:4;}'),
(28, 8, 'place', 'a:3:{s:7:"address";s:53:"Námestie slobody 2902/6, 811 06 Bratislava, Slovakia";s:3:"lat";s:17:"48.15291696385019";s:3:"lng";s:18:"17.112407684326172";}'),
(29, 8, '_place', 'field_5532135948f79'),
(30, 8, 'datetime', '11042015'),
(31, 8, '_datetime', 'field_55321420312d0'),
(32, 8, 'time', ''),
(33, 8, '_time', 'field_553214aecc770'),
(34, 8, 'cost', '37'),
(35, 8, '_cost', 'field_55321566e6d14'),
(36, 5, 'place', 'a:3:{s:7:"address";s:53:"Námestie slobody 2902/6, 811 06 Bratislava, Slovakia";s:3:"lat";s:17:"48.15291696385019";s:3:"lng";s:18:"17.112407684326172";}'),
(37, 5, '_place', 'field_5532135948f79'),
(38, 5, 'datetime', '11042015'),
(39, 5, '_datetime', 'field_55321420312d0'),
(40, 5, 'time', '5:am - 6:pm'),
(41, 5, '_time', 'field_55321f5675652'),
(42, 5, 'cost', '33'),
(43, 5, '_cost', 'field_55321566e6d14'),
(177, 16, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1000;s:6:"height";i:668;s:4:"file";s:35:"2015/04/eventica-dummy-image-23.jpg";s:5:"sizes";a:2:{s:9:"thumbnail";a:4:{s:4:"file";s:35:"eventica-dummy-image-23-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:35:"eventica-dummy-image-23-300x200.jpg";s:5:"width";i:300;s:6:"height";i:200;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:11:{s:8:"aperture";i:0;s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";i:0;s:9:"copyright";s:0:"";s:12:"focal_length";i:0;s:3:"iso";i:0;s:13:"shutter_speed";i:0;s:5:"title";s:0:"";s:11:"orientation";i:0;}}'),
(49, 9, 'place', 'a:3:{s:7:"address";s:53:"Námestie slobody 2902/6, 811 06 Bratislava, Slovakia";s:3:"lat";s:17:"48.15291696385019";s:3:"lng";s:18:"17.112407684326172";}'),
(50, 9, '_place', 'field_5532135948f79'),
(51, 9, 'datetime', '11042015'),
(52, 9, '_datetime', 'field_55321420312d0'),
(53, 9, 'time_0_start', '1429340400'),
(54, 9, '_time_0_start', 'field_55321ac89a735'),
(55, 9, 'time_0_finish', '1429372800'),
(56, 9, '_time_0_finish', 'field_55321add9a736'),
(57, 9, 'time', '1'),
(58, 9, '_time', 'field_553214aecc770'),
(59, 9, 'cost', '37'),
(60, 9, '_cost', 'field_55321566e6d14'),
(61, 5, 'time_0_start', '1429340400'),
(62, 5, '_time_0_start', 'field_55321ac89a735'),
(63, 5, 'time_0_finish', '1429372800'),
(64, 5, '_time_0_finish', 'field_55321add9a736'),
(121, 5, 'shedule_0_start', '1429336800'),
(67, 10, 'place', 'a:3:{s:7:"address";s:53:"Námestie slobody 2902/6, 811 06 Bratislava, Slovakia";s:3:"lat";s:17:"48.15291696385019";s:3:"lng";s:18:"17.112407684326172";}'),
(68, 10, '_place', 'field_5532135948f79'),
(69, 10, 'datetime', '11042015'),
(70, 10, '_datetime', 'field_55321420312d0'),
(71, 10, 'time_0_start', '1429340400'),
(72, 10, '_time_0_start', 'field_55321ac89a735'),
(73, 10, 'time_0_finish', '1429372800'),
(74, 10, '_time_0_finish', 'field_55321add9a736'),
(75, 10, 'time', '1'),
(76, 10, '_time', 'field_553214aecc770'),
(77, 10, 'cost', '37'),
(78, 10, '_cost', 'field_55321566e6d14'),
(176, 16, '_wp_attached_file', '2015/04/eventica-dummy-image-23.jpg'),
(81, 11, 'place', 'a:3:{s:7:"address";s:53:"Námestie slobody 2902/6, 811 06 Bratislava, Slovakia";s:3:"lat";s:17:"48.15291696385019";s:3:"lng";s:18:"17.112407684326172";}'),
(82, 11, '_place', 'field_5532135948f79'),
(83, 11, 'datetime', '11042015'),
(84, 11, '_datetime', 'field_55321420312d0'),
(85, 11, 'time_0_start', '1429340400'),
(86, 11, '_time_0_start', 'field_55321ac89a735'),
(87, 11, 'time_0_finish', '1429372800'),
(88, 11, '_time_0_finish', 'field_55321add9a736'),
(89, 11, 'time', '1'),
(90, 11, '_time', 'field_553214aecc770'),
(91, 11, 'cost', '33'),
(92, 11, '_cost', 'field_55321566e6d14'),
(94, 7, 'field_55321f5675652', 'a:14:{s:3:"key";s:19:"field_55321f5675652";s:5:"label";s:4:"Time";s:4:"name";s:4:"time";s:4:"type";s:4:"text";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:13:"default_value";s:0:"";s:11:"placeholder";s:0:"";s:7:"prepend";s:0:"";s:6:"append";s:0:"";s:10:"formatting";s:4:"html";s:9:"maxlength";s:0:"";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:4:"null";s:8:"operator";s:2:"==";s:5:"value";s:0:"";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:2;}'),
(99, 13, 'place', 'a:3:{s:7:"address";s:53:"Námestie slobody 2902/6, 811 06 Bratislava, Slovakia";s:3:"lat";s:17:"48.15291696385019";s:3:"lng";s:18:"17.112407684326172";}'),
(100, 13, '_place', 'field_5532135948f79'),
(101, 13, 'datetime', '11042015'),
(102, 13, '_datetime', 'field_55321420312d0'),
(103, 13, 'time', ''),
(104, 13, '_time', 'field_55321f5675652'),
(105, 13, 'shedule_0_start', '1429336800'),
(106, 13, '_shedule_0_start', 'field_55321ac89a735'),
(107, 13, 'shedule_0_finish', '1429376400'),
(108, 13, '_shedule_0_finish', 'field_55321add9a736'),
(109, 13, 'shedule_0_action', 'Opening'),
(110, 13, '_shedule_0_action', 'field_55321f477e57d'),
(111, 13, 'shedule_1_start', ''),
(112, 13, '_shedule_1_start', 'field_55321ac89a735'),
(113, 13, 'shedule_1_finish', ''),
(114, 13, '_shedule_1_finish', 'field_55321add9a736'),
(115, 13, 'shedule_1_action', ''),
(116, 13, '_shedule_1_action', 'field_55321f477e57d'),
(117, 13, 'shedule', '2'),
(118, 13, '_shedule', 'field_553214aecc770'),
(119, 13, 'cost', '33'),
(120, 13, '_cost', 'field_55321566e6d14'),
(122, 5, '_shedule_0_start', 'field_55321ac89a735'),
(123, 5, 'shedule_0_finish', '1429376400'),
(124, 5, '_shedule_0_finish', 'field_55321add9a736'),
(125, 5, 'shedule_0_action', 'Opening'),
(126, 5, '_shedule_0_action', 'field_55321f477e57d'),
(158, 15, 'place', 'a:3:{s:7:"address";s:53:"Námestie slobody 2902/6, 811 06 Bratislava, Slovakia";s:3:"lat";s:17:"48.15291696385019";s:3:"lng";s:18:"17.112407684326172";}'),
(133, 5, 'shedule', '1'),
(134, 5, '_shedule', 'field_553214aecc770'),
(137, 14, 'place', 'a:3:{s:7:"address";s:53:"Námestie slobody 2902/6, 811 06 Bratislava, Slovakia";s:3:"lat";s:17:"48.15291696385019";s:3:"lng";s:18:"17.112407684326172";}'),
(138, 14, '_place', 'field_5532135948f79'),
(139, 14, 'datetime', '11042015'),
(140, 14, '_datetime', 'field_55321420312d0'),
(141, 14, 'time', ''),
(142, 14, '_time', 'field_55321f5675652'),
(143, 14, 'shedule_0_start', '1429336800'),
(144, 14, '_shedule_0_start', 'field_55321ac89a735'),
(145, 14, 'shedule_0_finish', '1429376400'),
(146, 14, '_shedule_0_finish', 'field_55321add9a736'),
(147, 14, 'shedule_0_action', 'Opening'),
(148, 14, '_shedule_0_action', 'field_55321f477e57d'),
(149, 14, 'shedule', '1'),
(150, 14, '_shedule', 'field_553214aecc770'),
(151, 14, 'cost', '33'),
(152, 14, '_cost', 'field_55321566e6d14'),
(159, 15, '_place', 'field_5532135948f79'),
(160, 15, 'datetime', '11042015'),
(161, 15, '_datetime', 'field_55321420312d0'),
(162, 15, 'time', '5:am - 6:pm'),
(163, 15, '_time', 'field_55321f5675652'),
(164, 15, 'shedule_0_start', '1429336800'),
(165, 15, '_shedule_0_start', 'field_55321ac89a735'),
(166, 15, 'shedule_0_finish', '1429376400'),
(167, 15, '_shedule_0_finish', 'field_55321add9a736'),
(168, 15, 'shedule_0_action', 'Opening'),
(169, 15, '_shedule_0_action', 'field_55321f477e57d'),
(170, 15, 'shedule', '1'),
(171, 15, '_shedule', 'field_553214aecc770'),
(172, 15, 'cost', '33'),
(173, 15, '_cost', 'field_55321566e6d14'),
(178, 5, '_thumbnail_id', '16'),
(197, 2, '_wp_trash_meta_status', 'publish'),
(181, 17, 'place', 'a:3:{s:7:"address";s:53:"Námestie slobody 2902/6, 811 06 Bratislava, Slovakia";s:3:"lat";s:17:"48.15291696385019";s:3:"lng";s:18:"17.112407684326172";}'),
(182, 17, '_place', 'field_5532135948f79'),
(183, 17, 'datetime', '11042015'),
(184, 17, '_datetime', 'field_55321420312d0'),
(185, 17, 'time', '5:am - 6:pm'),
(186, 17, '_time', 'field_55321f5675652'),
(187, 17, 'shedule_0_start', '1429336800'),
(188, 17, '_shedule_0_start', 'field_55321ac89a735'),
(189, 17, 'shedule_0_finish', '1429376400'),
(190, 17, '_shedule_0_finish', 'field_55321add9a736'),
(191, 17, 'shedule_0_action', 'Opening'),
(192, 17, '_shedule_0_action', 'field_55321f477e57d'),
(193, 17, 'shedule', '1'),
(194, 17, '_shedule', 'field_553214aecc770'),
(195, 17, 'cost', '33'),
(196, 17, '_cost', 'field_55321566e6d14'),
(198, 2, '_wp_trash_meta_time', '1429959763'),
(199, 20, '_edit_last', '1'),
(200, 20, '_edit_lock', '1429963008:1'),
(201, 22, '_edit_last', '1'),
(202, 22, '_edit_lock', '1429965956:1'),
(203, 24, '_edit_last', '1'),
(204, 24, '_edit_lock', '1429966242:1'),
(205, 26, '_edit_last', '1'),
(206, 26, '_edit_lock', '1429976020:1'),
(207, 28, '_edit_last', '1'),
(208, 28, '_edit_lock', '1429979373:1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE IF NOT EXISTS `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(20) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2015-04-18 07:36:57', '2015-04-18 07:36:57', 'Welcome to WordPress. This is your first post. Edit or delete it, then start blogging!', 'Hello world!', '', 'trash', 'open', 'open', '', 'hello-world', '', '', '2015-04-18 08:15:37', '2015-04-18 08:15:37', '', 0, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/?p=1', 0, 'post', '', 1),
(2, 1, '2015-04-18 07:36:57', '2015-04-18 07:36:57', 'This is an example page. It''s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\r\n\r\n<blockquote>Hi there! I''m a bike messenger by day, aspiring actor by night, and this is my blog. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin'' caught in the rain.)</blockquote>\r\n\r\n...or something like this:\r\n\r\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\r\n\r\nAs a new WordPress user, you should go to <a href="http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'trash', 'open', 'open', '', 'sample-page', '', '', '2015-04-25 11:02:43', '2015-04-25 11:02:43', '', 0, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/?page_id=2', 0, 'page', '', 0),
(19, 1, '2015-04-25 11:02:43', '2015-04-25 11:02:43', 'This is an example page. It''s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\r\n\r\n<blockquote>Hi there! I''m a bike messenger by day, aspiring actor by night, and this is my blog. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin'' caught in the rain.)</blockquote>\r\n\r\n...or something like this:\r\n\r\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\r\n\r\nAs a new WordPress user, you should go to <a href="http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'inherit', 'open', 'open', '', '2-revision-v1', '', '', '2015-04-25 11:02:43', '2015-04-25 11:02:43', '', 2, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/2-revision-v1/', 0, 'revision', '', 0),
(4, 1, '2015-04-18 08:15:37', '2015-04-18 08:15:37', 'Welcome to WordPress. This is your first post. Edit or delete it, then start blogging!', 'Hello world!', '', 'inherit', 'open', 'open', '', '1-revision-v1', '', '', '2015-04-18 08:15:37', '2015-04-18 08:15:37', '', 1, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/?p=4', 0, 'revision', '', 0),
(5, 1, '2015-04-18 08:17:42', '2015-04-18 08:17:42', '<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>\r\n<p>It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>\r\n<p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>', 'WORDCAMP BRATISLAVA', '', 'publish', 'open', 'open', '', 'wordcamp-bratislava', '', '', '2015-04-18 09:29:14', '2015-04-18 09:29:14', '', 0, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/?p=5', 0, 'post', '', 0),
(6, 1, '2015-04-18 08:17:42', '2015-04-18 08:17:42', '', 'WORDCAMP BRATISLAVA', '', 'inherit', 'open', 'open', '', '5-revision-v1', '', '', '2015-04-18 08:17:42', '2015-04-18 08:17:42', '', 5, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/?p=6', 0, 'revision', '', 0),
(7, 1, '2015-04-18 08:18:46', '2015-04-18 08:18:46', '', 'Events Control', '', 'publish', 'closed', 'closed', '', 'acf_events-control', '', '', '2015-04-18 09:27:48', '2015-04-18 09:27:48', '', 0, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/?post_type=acf&#038;p=7', 0, 'acf', '', 0),
(8, 1, '2015-04-18 08:33:26', '2015-04-18 08:33:26', '', 'WORDCAMP BRATISLAVA', '', 'inherit', 'open', 'open', '', '5-revision-v1', '', '', '2015-04-18 08:33:26', '2015-04-18 08:33:26', '', 5, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/?p=8', 0, 'revision', '', 0),
(9, 1, '2015-04-18 08:52:52', '2015-04-18 08:52:52', '', 'WORDCAMP BRATISLAVA', '', 'inherit', 'open', 'open', '', '5-revision-v1', '', '', '2015-04-18 08:52:52', '2015-04-18 08:52:52', '', 5, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/?p=9', 0, 'revision', '', 0),
(10, 1, '2015-04-18 08:54:19', '2015-04-18 08:54:19', '<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p><p>It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p><p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>', 'WORDCAMP BRATISLAVA', '', 'inherit', 'open', 'open', '', '5-revision-v1', '', '', '2015-04-18 08:54:19', '2015-04-18 08:54:19', '', 5, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/?p=10', 0, 'revision', '', 0),
(11, 1, '2015-04-18 08:55:11', '2015-04-18 08:55:11', '<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p><p>It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p><p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>', 'WORDCAMP BRATISLAVA', '', 'inherit', 'open', 'open', '', '5-revision-v1', '', '', '2015-04-18 08:55:11', '2015-04-18 08:55:11', '', 5, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/?p=11', 0, 'revision', '', 0),
(18, 1, '2015-04-25 11:02:36', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2015-04-25 11:02:36', '0000-00-00 00:00:00', '', 0, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/?p=18', 0, 'post', '', 0),
(13, 1, '2015-04-18 09:11:52', '2015-04-18 09:11:52', '<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>\r\n<p>It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>\r\n<p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>', 'WORDCAMP BRATISLAVA', '', 'inherit', 'open', 'open', '', '5-revision-v1', '', '', '2015-04-18 09:11:52', '2015-04-18 09:11:52', '', 5, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/5-revision-v1/', 0, 'revision', '', 0),
(14, 1, '2015-04-18 09:12:07', '2015-04-18 09:12:07', '<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>\r\n<p>It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>\r\n<p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>', 'WORDCAMP BRATISLAVA', '', 'inherit', 'open', 'open', '', '5-revision-v1', '', '', '2015-04-18 09:12:07', '2015-04-18 09:12:07', '', 5, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/5-revision-v1/', 0, 'revision', '', 0),
(15, 1, '2015-04-18 09:21:32', '2015-04-18 09:21:32', '<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>\r\n<p>It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>\r\n<p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>', 'WORDCAMP BRATISLAVA', '', 'inherit', 'open', 'open', '', '5-revision-v1', '', '', '2015-04-18 09:21:32', '2015-04-18 09:21:32', '', 5, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/5-revision-v1/', 0, 'revision', '', 0),
(16, 1, '2015-04-18 09:29:07', '2015-04-18 09:29:07', '', 'eventica-dummy-image-23', '', 'inherit', 'open', 'open', '', 'eventica-dummy-image-23', '', '', '2015-04-18 09:29:07', '2015-04-18 09:29:07', '', 5, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/wp-content/uploads/2015/04/eventica-dummy-image-23.jpg', 0, 'attachment', 'image/jpeg', 0),
(17, 1, '2015-04-18 09:29:14', '2015-04-18 09:29:14', '<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>\r\n<p>It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>\r\n<p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>', 'WORDCAMP BRATISLAVA', '', 'inherit', 'open', 'open', '', '5-revision-v1', '', '', '2015-04-18 09:29:14', '2015-04-18 09:29:14', '', 5, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/5-revision-v1/', 0, 'revision', '', 0),
(20, 1, '2015-04-25 11:02:52', '2015-04-25 11:02:52', '', 'events', '', 'publish', 'open', 'open', '', 'events', '', '', '2015-04-25 11:02:52', '2015-04-25 11:02:52', '', 0, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/?page_id=20', 0, 'page', '', 0),
(21, 1, '2015-04-25 11:02:52', '2015-04-25 11:02:52', '', 'events', '', 'inherit', 'open', 'open', '', '20-revision-v1', '', '', '2015-04-25 11:02:52', '2015-04-25 11:02:52', '', 20, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/20-revision-v1/', 0, 'revision', '', 0),
(22, 1, '2015-04-25 11:59:20', '2015-04-25 11:59:20', '', 'events calendar', '', 'publish', 'open', 'open', '', 'events-calendar', '', '', '2015-04-25 11:59:20', '2015-04-25 11:59:20', '', 0, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/?page_id=22', 0, 'page', '', 0),
(23, 1, '2015-04-25 11:59:20', '2015-04-25 11:59:20', '', 'events calendar', '', 'inherit', 'open', 'open', '', '22-revision-v1', '', '', '2015-04-25 11:59:20', '2015-04-25 11:59:20', '', 22, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/22-revision-v1/', 0, 'revision', '', 0),
(24, 1, '2015-04-25 12:48:25', '2015-04-25 12:48:25', '', 'about', '', 'publish', 'open', 'open', '', 'about', '', '', '2015-04-25 12:48:25', '2015-04-25 12:48:25', '', 0, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/?page_id=24', 0, 'page', '', 0),
(25, 1, '2015-04-25 12:48:25', '2015-04-25 12:48:25', '', 'about', '', 'inherit', 'open', 'open', '', '24-revision-v1', '', '', '2015-04-25 12:48:25', '2015-04-25 12:48:25', '', 24, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/24-revision-v1/', 0, 'revision', '', 0),
(26, 1, '2015-04-25 15:32:26', '2015-04-25 15:32:26', '', 'location', '', 'publish', 'open', 'open', '', 'location', '', '', '2015-04-25 15:32:26', '2015-04-25 15:32:26', '', 0, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/?page_id=26', 0, 'page', '', 0),
(27, 1, '2015-04-25 15:32:26', '2015-04-25 15:32:26', '', 'location', '', 'inherit', 'open', 'open', '', '26-revision-v1', '', '', '2015-04-25 15:32:26', '2015-04-25 15:32:26', '', 26, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/26-revision-v1/', 0, 'revision', '', 0),
(28, 1, '2015-04-25 16:09:26', '2015-04-25 16:09:26', '', 'contact', '', 'publish', 'open', 'open', '', 'contact', '', '', '2015-04-25 16:09:26', '2015-04-25 16:09:26', '', 0, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/?page_id=28', 0, 'page', '', 0),
(29, 1, '2015-04-25 16:09:26', '2015-04-25 16:09:26', '', 'contact', '', 'inherit', 'open', 'open', '', '28-revision-v1', '', '', '2015-04-25 16:09:26', '2015-04-25 16:09:26', '', 28, 'http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/28-revision-v1/', 0, 'revision', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_private`
--

CREATE TABLE IF NOT EXISTS `wp_private` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_naam` varchar(255) DEFAULT NULL,
  `p_voornaam` varchar(255) DEFAULT NULL,
  `p_geboortedatum` varchar(255) DEFAULT NULL,
  `p_geboorteplaats` text,
  `p_straat` varchar(255) DEFAULT NULL,
  `p_nr` varchar(255) DEFAULT NULL,
  `p_postcode` varchar(255) DEFAULT NULL,
  `p_plaats` int(11) DEFAULT NULL,
  `p_land` varchar(255) DEFAULT NULL,
  `p_telefoon` varchar(255) DEFAULT NULL,
  `p_fax` varchar(20) DEFAULT NULL,
  `p_gsm` varchar(100) DEFAULT NULL,
  `p_email` varchar(100) DEFAULT NULL,
  `p_likedin` varchar(100) DEFAULT NULL,
  `p_picture` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wp_private`
--


-- --------------------------------------------------------

--
-- Table structure for table `wp_reference`
--

CREATE TABLE IF NOT EXISTS `wp_reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `r_naam` varchar(255) DEFAULT NULL,
  `r_voornaam` varchar(255) DEFAULT NULL,
  `b_telefoon` varchar(255) DEFAULT NULL,
  `r_email` varchar(100) DEFAULT NULL,
  `r_naam_2` varchar(255) DEFAULT NULL,
  `r_voornaam_2` varchar(255) DEFAULT NULL,
  `r_telefoon_2` varchar(255) DEFAULT NULL,
  `r_email_2` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wp_reference`
--


-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE IF NOT EXISTS `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0),
(2, 'WordCamp', 'wordcamp', 0),
(3, 'LYON', 'lyon', 0),
(4, 'COLOGNE', 'cologne', 0),
(5, 'wordpress', 'wordpress', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE IF NOT EXISTS `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(5, 1, 0),
(5, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1),
(2, 2, 'category', '', 0, 0),
(3, 3, 'category', '', 0, 0),
(4, 4, 'category', '', 0, 0),
(5, 5, 'post_tag', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE IF NOT EXISTS `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(10, 1, 'wp_capabilities', 'a:1:{s:13:"administrator";b:1;}'),
(11, 1, 'wp_user_level', '10'),
(12, 1, 'dismissed_wp_pointers', 'wp360_locks,wp390_widgets,wp410_dfw'),
(13, 1, 'show_welcome_panel', '1'),
(14, 1, 'session_tokens', 'a:2:{s:64:"06c028e7975dfafc598b287cb3f7dafb9fe69f782ee6af3089f940524aaa472f";a:4:{s:10:"expiration";i:1430132555;s:2:"ip";s:3:"::1";s:2:"ua";s:108:"Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36";s:5:"login";i:1429959755;}s:64:"3db7b4e8d8a3b76ce681f1044ffc455c2966e0255d1d072eb72408fd9b8bdc08";a:4:{s:10:"expiration";i:1430148730;s:2:"ip";s:3:"::1";s:2:"ua";s:108:"Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36";s:5:"login";i:1429975930;}}'),
(15, 1, 'wp_dashboard_quick_press_last_post_id', '18'),
(16, 1, 'wp_user-settings', 'editor=tinymce&libraryContent=browse'),
(17, 1, 'wp_user-settings-time', '1429349350');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE IF NOT EXISTS `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$BRUoiUaGQIDgLwzE8Om4PnO2geFoDq.', 'admin', 'binhdarkcu@gmail.com', '', '2015-04-18 07:36:56', '', 0, 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
