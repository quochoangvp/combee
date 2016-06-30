-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2016 at 06:13 PM
-- Server version: 10.0.25-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.4-7ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `combee`
--
CREATE DATABASE IF NOT EXISTS `combee` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `combee`;

-- --------------------------------------------------------

--
-- Table structure for table `main_admin_menu`
--

DROP TABLE IF EXISTS `main_admin_menu`;
CREATE TABLE `main_admin_menu` (
  `amenu_id` int(11) UNSIGNED NOT NULL,
  `amenu_link` varchar(100) NOT NULL,
  `amenu_text` varchar(100) NOT NULL,
  `amenu_icon` varchar(50) DEFAULT NULL,
  `parent_id` int(11) UNSIGNED NOT NULL,
  `position` smallint(5) UNSIGNED NOT NULL,
  `is_show` enum('y','n') NOT NULL DEFAULT 'y',
  `user_group_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_admin_menu`
--

TRUNCATE TABLE `main_admin_menu`;
--
-- Dumping data for table `main_admin_menu`
--

INSERT INTO `main_admin_menu` (`amenu_id`, `amenu_link`, `amenu_text`, `amenu_icon`, `parent_id`, `position`, `is_show`, `user_group_id`) VALUES
(1, 'dashboard', 'Dashboard', 'icon-dashboard', 0, 1, 'y', ''),
(2, 'article', 'Article', 'icon-book', 0, 2, 'y', ''),
(3, 'article/create', 'Add new', '', 2, 1, 'y', ''),
(4, 'article/all', 'All article', '', 2, 2, 'y', ''),
(5, 'category/all', 'Category', '', 2, 3, 'y', ''),
(6, 'tag/all', 'Tags', '', 2, 4, 'y', ''),
(7, 'user', 'Users', 'icon-user', 0, 2, 'y', ''),
(8, 'user/all', 'All users', NULL, 7, 1, 'y', ''),
(9, 'user/create', 'Add new', NULL, 7, 2, 'y', ''),
(10, 'user/group', 'Groups', NULL, 7, 3, 'y', ''),
(11, 'gallery', 'Gallery', 'icon-camera', 0, 4, 'y', ''),
(12, 'gallery/all', 'All gallery', NULL, 11, 1, 'y', ''),
(13, 'gallery/create', 'Add new', NULL, 11, 2, 'y', ''),
(14, 'setting', 'Setting', 'icon-cog', 0, 7, 'y', ''),
(15, 'widget', 'Widget', NULL, 14, 1, 'y', ''),
(16, 'link', 'Links', 'icon-link', 0, 5, 'y', ''),
(17, 'link/create', 'Add new', NULL, 16, 1, 'y', ''),
(18, 'link/all', 'All links', NULL, 16, 2, 'y', ''),
(19, 'product', 'Product', 'icon-inbox', 0, 6, 'y', ''),
(20, 'product', 'All product', '', 19, 1, 'y', ''),
(21, 'product/catalog', 'Catalogs', '', 19, 2, 'y', ''),
(22, 'product/brand', 'Brands', '', 19, 3, 'y', ''),
(23, 'product/manufacturer', 'Manufacturer', '', 19, 4, 'y', ''),
(24, 'product/supplier', 'Supplier', '', 19, 5, 'y', ''),
(25, 'product/tags', 'Tags', '', 19, 6, 'y', ''),
(26, 'product/combo', 'Product combo', '', 19, 7, 'y', ''),
(27, 'product/attribute', 'Product attribute', '', 19, 8, 'y', '');

-- --------------------------------------------------------

--
-- Table structure for table `main_article`
--

DROP TABLE IF EXISTS `main_article`;
CREATE TABLE `main_article` (
  `article_id` int(11) UNSIGNED NOT NULL,
  `article_title` varchar(500) NOT NULL,
  `article_url` varchar(500) NOT NULL,
  `description` text,
  `user_id` int(11) UNSIGNED NOT NULL,
  `content` longtext NOT NULL,
  `allow_comment` enum('y','n') NOT NULL DEFAULT 'y',
  `status` varchar(20) NOT NULL DEFAULT 'draft',
  `view` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `featured` enum('y','n') NOT NULL DEFAULT 'n',
  `publish_date` datetime DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `summary` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_article`
--

TRUNCATE TABLE `main_article`;
--
-- Dumping data for table `main_article`
--

INSERT INTO `main_article` (`article_id`, `article_title`, `article_url`, `description`, `user_id`, `content`, `allow_comment`, `status`, `view`, `featured`, `publish_date`, `thumbnail`, `summary`, `created_at`, `updated_at`) VALUES
(1, 'An Introduction to Views &amp; Templating in CodeIgniter', 'an-introduction-to-views--templating-in-codeigniter', 'Views are a key ingredient in any MVC application, and CodeIgniter applications aren&#039;t any different.', 1, '&lt;p&gt;Views are a key ingredient in any MVC application, and CodeIgniter applications aren&#039;t any different. Today, we&#039;re going to learn what a view is, and discover how they can be used to create a templating solution for your CodeIgniter projects.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;The first part of this tutorial will educate complete beginners to CodeIgniter on what a view is, and how to use them in a typical application. The second half will discuss the motivations for finding a templating solution, and guide the reader through the necessary steps for creating a simple, yet effective templating library. Interested? Let&#039;s get started!&lt;/p&gt;\r\n&lt;h2 class=&quot;nolinks&quot;&gt;What is a View?&lt;/h2&gt;\r\n&lt;p&gt;&lt;a href=&quot;http://codeigniter.com/user_guide/general/views.html&quot; target=&quot;_blank&quot;&gt;Views&lt;/a&gt; are special files used in CodeIgniter to store the markup outputted by the application, usually consisting of HTML and simple PHP tags.&lt;/p&gt;\r\n&lt;blockquote&gt;\r\n&lt;p&gt;&amp;ldquo;A view is simply a web page, or a page fragment, like a header, footer, sidebar, etc. In fact, views can flexibly be embedded within other views (within other views, etc., etc.) if you need this type of hierarchy.&amp;rdquo;&lt;/p&gt;\r\n&lt;/blockquote&gt;\r\n&lt;p&gt;Views are loaded from within &lt;a href=&quot;http://codeigniter.com/user_guide/general/controllers.html&quot; target=&quot;_blank&quot;&gt;controller&lt;/a&gt; methods, with the content inside the view subsequently displayed in the browser.&lt;/p&gt;\r\n&lt;h2 class=&quot;nolinks&quot;&gt;How to Load a view&lt;/h2&gt;\r\n&lt;p&gt;To load (and display) a view in CodeIgniter, we use the built in &lt;a href=&quot;http://codeigniter.com/user_guide/libraries/loader.html&quot; target=&quot;_blank&quot;&gt;Loader&lt;/a&gt; library.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_826386&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$this&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;-&amp;gt;load-&amp;gt;view(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;hello_world&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, true/false);&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;This single line of code will tell CodeIgniter to look for &lt;code&gt;hello_world.php&lt;/code&gt; in the &lt;code&gt;application/views&lt;/code&gt; folder, and display the contents of the file in the browser.&lt;/p&gt;\r\n&lt;blockquote&gt;\r\n&lt;p&gt;&lt;strong&gt;Note&lt;/strong&gt; that CodeIgniter allows you to exclude the .php suffix, saving a few keystrokes when typing the view&#039;s filename you wish to load.&lt;/p&gt;\r\n&lt;/blockquote&gt;\r\n&lt;p&gt;The second parameter, &lt;code&gt;$data&lt;/code&gt;, is &lt;strong&gt;optional&lt;/strong&gt; and takes an associative array or object. This array/object is used to pass data to the view file, so it can be used or referenced within the view.&lt;/p&gt;\r\n&lt;p&gt;The final &lt;strong&gt;optional&lt;/strong&gt; parameter determines whether the view&#039;s contents is displayed in the browser window, or returned as a string. This parameter defaults to false, displaying the content in the browser. We shall see later in the tutorial how this parameter can be used when creating a templating solution.&lt;/p&gt;', 'y', 'publish', 0, 'n', '2016-06-09 09:09:51', '/assets/uploads/images/SIdSloth2.jpg', 'Views are a key ingredient in any MVC application, and CodeIgniter applications aren&#039;t any different. Today, we&#039;re going to learn what a view is, and discover how they can be used to create a templating solution for your CodeIgniter projects.', '2016-05-30 04:41:57', '2016-06-09 09:30:02'),
(2, 'Creating &amp; Displaying a View', 'creating--displaying-a-view', 'To setup our first view, create a new file called hello_world.php in application/views and write the following simple HTML within', 1, '&lt;p&gt;To setup our first view, create a new file called &lt;code&gt;hello_world.php&lt;/code&gt; in &lt;code&gt;application/views&lt;/code&gt; and write the following simple HTML within:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_54009&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords html&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;01&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;02&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;03&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;04&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;05&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;06&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;07&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;08&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;09&lt;/div&gt;\r\n&lt;div class=&quot;line number10 index9 alt1&quot;&gt;10&lt;/div&gt;\r\n&lt;div class=&quot;line number11 index10 alt2&quot;&gt;11&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;!&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;DOCTYPE&lt;/code&gt; &lt;code class=&quot;html plain&quot;&gt;html&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;html&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;html spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;head&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;html spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;title&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;Hello World!&amp;lt;/&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;title&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;html spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;/&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;head&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&lt;code class=&quot;html spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;body&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;html spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;p&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&lt;code class=&quot;html spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;Hello world!&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;html spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;/&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;p&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number10 index9 alt1&quot;&gt;&lt;code class=&quot;html spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;/&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;body&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number11 index10 alt2&quot;&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;/&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;html&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Now to display this view in the browser it must be loaded within a Controller method, using the aforementioned method.&lt;/p&gt;\r\n&lt;p&gt;So let&#039;s create a new Controller file called &lt;code&gt;hello_world.php&lt;/code&gt; in &lt;code&gt;application/controllers&lt;/code&gt; and place the following code within. From within this controller, we shall load the newly created view.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_485900&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;if&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;( ! defined(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;BASEPATH&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;)) &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;exit&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;No direct script access allowed&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php keyword&quot;&gt;class&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;Hello_world &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;extends&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;CI_Controller {&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;public&lt;/code&gt; &lt;code class=&quot;php keyword&quot;&gt;function&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;index() &lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;{&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$this&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;-&amp;gt;load-&amp;gt;view(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;hello_world&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;}&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;}&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Pointing your browser to &lt;code&gt;http://your-ci-install.com/index.php/&lt;/code&gt; will now result in the HTML in&lt;code&gt;application/views/hello_world.php&lt;/code&gt; being outputted in the browser. You have successfully loaded a view!&lt;/p&gt;', 'y', 'draft', 0, 'y', '2016-06-22 16:22:57', '/assets/uploads/images/blocks/property-img.png', 'To setup our first view, create a new file called hello_world.php in application/views and write the following simple HTML within', '2016-05-30 04:44:37', '2016-06-22 17:00:11'),
(3, 'Loading Multiple Views', 'loading-multiple-views', 'Splitting a view into several files makes your website easier to maintain and reduces the likely hood of	duplicate code.', 1, '&lt;h3 class=&quot;nolinks&quot;&gt;Loading Multiple Views&lt;/h3&gt;\r\n&lt;blockquote&gt;\r\n&lt;p&gt;Splitting a view into several files makes your website easier to maintain and reduces the likely hood of duplicate code.&lt;/p&gt;\r\n&lt;/blockquote&gt;\r\n&lt;p&gt;Displaying a single View is all well and good, but you might want to split the output into several, distinct files, such as &lt;strong&gt;header, content &amp;amp; footer&lt;/strong&gt; views.&lt;/p&gt;\r\n&lt;p&gt;Loading several views is achieved by merely calling the &lt;code&gt;$this-&amp;gt;load-&amp;gt;view()&lt;/code&gt; method multiple times. CodeIgniter then concatenates the content of the views together before displaying in the browser.&lt;/p&gt;\r\n&lt;p&gt;Create a new file called &lt;code&gt;header.php&lt;/code&gt; in &lt;code&gt;application/views&lt;/code&gt; and cut &amp;amp; paste the first few lines from our original&lt;code&gt;hello_world.php&lt;/code&gt; file in.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_437971&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords html&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;!&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;DOCTYPE&lt;/code&gt; &lt;code class=&quot;html plain&quot;&gt;html&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;html&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;html spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;head&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;html spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;title&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;Hello World!&amp;lt;/&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;title&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;html spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;/&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;head&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&lt;code class=&quot;html spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;body&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Similarly, create another file called &lt;code&gt;footer.php&lt;/code&gt; in &lt;code&gt;application/views&lt;/code&gt; and move the last two lines of&lt;code&gt;hello_world.php&lt;/code&gt; in.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_510997&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords html&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;/&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;body&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;/&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;html&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;This leaves the &lt;code&gt;hello_world.php&lt;/code&gt; view file just containing our page content.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_216895&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords html&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;p&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&lt;code class=&quot;html spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;Hello world!&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;lt;/&lt;/code&gt;&lt;code class=&quot;html keyword&quot;&gt;p&lt;/code&gt;&lt;code class=&quot;html plain&quot;&gt;&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Now to display the page again, we have to load all three views (&lt;span class=&quot;skimlinks-unlinked&quot;&gt;header.php&lt;/span&gt;, &lt;span class=&quot;skimlinks-unlinked&quot;&gt;hello_world.php&lt;/span&gt;, &lt;span class=&quot;skimlinks-unlinked&quot;&gt;footer.php&lt;/span&gt;), in order, within our controller.&lt;/p&gt;\r\n&lt;p&gt;Re-open &lt;code&gt;application/controllers/hello_world.php&lt;/code&gt; and add the new &lt;code&gt;$this-&amp;gt;load-&amp;gt;view()&lt;/code&gt; calls above and below the existing one.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_288502&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;01&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;02&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;03&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;04&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;05&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;06&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;07&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;08&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;09&lt;/div&gt;\r\n&lt;div class=&quot;line number10 index9 alt1&quot;&gt;10&lt;/div&gt;\r\n&lt;div class=&quot;line number11 index10 alt2&quot;&gt;11&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;if&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;( ! defined(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;BASEPATH&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;)) &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;exit&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;No direct script access allowed&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php keyword&quot;&gt;class&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;Hello_world &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;extends&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;CI_Controller {&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;public&lt;/code&gt; &lt;code class=&quot;php keyword&quot;&gt;function&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;index() &lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;{&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$this&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;-&amp;gt;load-&amp;gt;view(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;header&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$this&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;-&amp;gt;load-&amp;gt;view(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;hello_world&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$this&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;-&amp;gt;load-&amp;gt;view(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;footer&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number10 index9 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;}&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number11 index10 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;}&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Because the header and footer views are now separate from the &lt;code&gt;hello_world&lt;/code&gt; view, it means that they can be used in conjunction with any other views in the website. This means the code within the header &amp;amp; footer files don&#039;t need to be copied over into any other views in the project that require this code.&lt;/p&gt;\r\n&lt;p&gt;Obviously this is a huge benefit as any changes to the HTML or content in the views, e.g adding a new stylesheet to the header, can be made to only one file, and not every file!&lt;/p&gt;', 'y', 'publish', 0, 'n', '2016-06-22 17:22:42', '/assets/uploads/HaiDongVat.png', 'Splitting a view into several files makes your website easier to maintain and reduces the likely hood of	duplicate code.', '2016-05-30 09:48:03', '2016-06-22 17:00:47'),
(4, 'Using Data From the Controller in the View', 'using-data-from-the-controller-in-the-view', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', 1, '&lt;p&gt;Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.&lt;/p&gt;\r\n&lt;p&gt;To achieve this, we shall pass an associative array, &lt;strong&gt;&lt;code&gt;$data&lt;/code&gt;&lt;/strong&gt; as the second parameter in the &lt;code&gt;$this-&amp;gt;load-&amp;gt;view()&lt;/code&gt; call.&lt;/p&gt;\r\n&lt;p&gt;The &lt;strong&gt;values&lt;/strong&gt; of this array will be accessible within the loaded view as variables, named by their respective&lt;strong&gt;keys&lt;/strong&gt;.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_612634&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;= &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;title&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Hello World!&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;content&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;This is the content&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;posts&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 1&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 2&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 3&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;)&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$this&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;-&amp;gt;load-&amp;gt;view(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;hello_world&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above code will give the variable &lt;strong&gt;$title&lt;/strong&gt; the value &#039;Hello World!&#039; inside the &lt;code&gt;hello_world&lt;/code&gt; view.&lt;/p&gt;\r\n&lt;h3 class=&quot;nolinks&quot;&gt;How to Use Variables in Views&lt;/h3&gt;\r\n&lt;p&gt;Once we have passed our data to the view files, the variables can be used in the usual way.&lt;/p&gt;\r\n&lt;p&gt;Typically, the view file will use the passed data to:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Display a variable&#039;s value&lt;/li&gt;\r\n&lt;li&gt;Loop through arrays or object properties&lt;/li&gt;\r\n&lt;li&gt;Use conditional statements to show, or hide markup&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;I shall run through quick examples of how to do each.&lt;/p&gt;\r\n&lt;p&gt;To display a variable&#039;s content use the simple and familiar, &lt;a href=&quot;http://php.net/manual/en/function.echo.php&quot; target=&quot;_blank&quot;&gt;echo&lt;/a&gt; statement:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_555424&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;h1&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$title&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/h1&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Looping through an array, or object, is a common task in view files, and can be achieved with a &lt;a href=&quot;http://php.net/manual/en/control-structures.foreach.php&quot; target=&quot;_blank&quot;&gt;foreach&lt;/a&gt;loop:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_671756&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;foreach&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$posts&lt;/code&gt; &lt;code class=&quot;php keyword&quot;&gt;as&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;li&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/li&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;/ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Simple conditional statements can be used in view files to slightly alter the output, depending on the data passed.&lt;/p&gt;\r\n&lt;p&gt;In general, you want to keep the use of conditional statements in views to a minimum, as overuse can lead to complicated view files, containing &amp;ldquo;business logic&amp;rdquo;. Splitting the view into different files, and deciding which is to be shown in the controller, is much more preferable.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_354981&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;if&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;( &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$logged_in&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php string&quot;&gt;&#039;Welcome &#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;.&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$user_name&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;else&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;{ ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;Please login&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above example will either show a &quot;Welcome&quot; message, or a request for the user to login, depending on the value of &lt;code&gt;$logged_in&lt;/code&gt; (true/false).&lt;/p&gt;', 'y', 'publish', 0, 'n', '2016-05-30 09:30:00', '/assets/uploads/sid-the-sloth_160031-1920x1080.jpg', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', '2016-05-30 09:50:46', '0000-00-00 00:00:00');
INSERT INTO `main_article` (`article_id`, `article_title`, `article_url`, `description`, `user_id`, `content`, `allow_comment`, `status`, `view`, `featured`, `publish_date`, `thumbnail`, `summary`, `created_at`, `updated_at`) VALUES
(5, 'Using Data From the Controller in the View', 'using-data-from-the-controller-in-the-view', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', 1, '&lt;p&gt;Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.&lt;/p&gt;\r\n&lt;p&gt;To achieve this, we shall pass an associative array, &lt;strong&gt;&lt;code&gt;$data&lt;/code&gt;&lt;/strong&gt; as the second parameter in the &lt;code&gt;$this-&amp;gt;load-&amp;gt;view()&lt;/code&gt; call.&lt;/p&gt;\r\n&lt;p&gt;The &lt;strong&gt;values&lt;/strong&gt; of this array will be accessible within the loaded view as variables, named by their respective&lt;strong&gt;keys&lt;/strong&gt;.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_612634&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;= &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;title&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Hello World!&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;content&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;This is the content&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;posts&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 1&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 2&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 3&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;)&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$this&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;-&amp;gt;load-&amp;gt;view(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;hello_world&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above code will give the variable &lt;strong&gt;$title&lt;/strong&gt; the value &#039;Hello World!&#039; inside the &lt;code&gt;hello_world&lt;/code&gt; view.&lt;/p&gt;\r\n&lt;h3 class=&quot;nolinks&quot;&gt;How to Use Variables in Views&lt;/h3&gt;\r\n&lt;p&gt;Once we have passed our data to the view files, the variables can be used in the usual way.&lt;/p&gt;\r\n&lt;p&gt;Typically, the view file will use the passed data to:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Display a variable&#039;s value&lt;/li&gt;\r\n&lt;li&gt;Loop through arrays or object properties&lt;/li&gt;\r\n&lt;li&gt;Use conditional statements to show, or hide markup&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;I shall run through quick examples of how to do each.&lt;/p&gt;\r\n&lt;p&gt;To display a variable&#039;s content use the simple and familiar, &lt;a href=&quot;http://php.net/manual/en/function.echo.php&quot; target=&quot;_blank&quot;&gt;echo&lt;/a&gt; statement:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_555424&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;h1&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$title&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/h1&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Looping through an array, or object, is a common task in view files, and can be achieved with a &lt;a href=&quot;http://php.net/manual/en/control-structures.foreach.php&quot; target=&quot;_blank&quot;&gt;foreach&lt;/a&gt;loop:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_671756&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;foreach&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$posts&lt;/code&gt; &lt;code class=&quot;php keyword&quot;&gt;as&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;li&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/li&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;/ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Simple conditional statements can be used in view files to slightly alter the output, depending on the data passed.&lt;/p&gt;\r\n&lt;p&gt;In general, you want to keep the use of conditional statements in views to a minimum, as overuse can lead to complicated view files, containing &amp;ldquo;business logic&amp;rdquo;. Splitting the view into different files, and deciding which is to be shown in the controller, is much more preferable.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_354981&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;if&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;( &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$logged_in&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php string&quot;&gt;&#039;Welcome &#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;.&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$user_name&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;else&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;{ ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;Please login&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above example will either show a &quot;Welcome&quot; message, or a request for the user to login, depending on the value of &lt;code&gt;$logged_in&lt;/code&gt; (true/false).&lt;/p&gt;', 'y', 'publish', 0, 'n', '2016-05-30 09:30:00', '/assets/uploads/sid-the-sloth_160031-1920x1080.jpg', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', '2016-05-30 09:50:46', '0000-00-00 00:00:00'),
(6, 'Using Data From the Controller in the View', 'using-data-from-the-controller-in-the-view', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', 1, '&lt;p&gt;Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.&lt;/p&gt;\r\n&lt;p&gt;To achieve this, we shall pass an associative array, &lt;strong&gt;&lt;code&gt;$data&lt;/code&gt;&lt;/strong&gt; as the second parameter in the &lt;code&gt;$this-&amp;gt;load-&amp;gt;view()&lt;/code&gt; call.&lt;/p&gt;\r\n&lt;p&gt;The &lt;strong&gt;values&lt;/strong&gt; of this array will be accessible within the loaded view as variables, named by their respective&lt;strong&gt;keys&lt;/strong&gt;.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_612634&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;= &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;title&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Hello World!&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;content&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;This is the content&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;posts&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 1&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 2&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 3&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;)&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$this&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;-&amp;gt;load-&amp;gt;view(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;hello_world&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above code will give the variable &lt;strong&gt;$title&lt;/strong&gt; the value &#039;Hello World!&#039; inside the &lt;code&gt;hello_world&lt;/code&gt; view.&lt;/p&gt;\r\n&lt;h3 class=&quot;nolinks&quot;&gt;How to Use Variables in Views&lt;/h3&gt;\r\n&lt;p&gt;Once we have passed our data to the view files, the variables can be used in the usual way.&lt;/p&gt;\r\n&lt;p&gt;Typically, the view file will use the passed data to:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Display a variable&#039;s value&lt;/li&gt;\r\n&lt;li&gt;Loop through arrays or object properties&lt;/li&gt;\r\n&lt;li&gt;Use conditional statements to show, or hide markup&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;I shall run through quick examples of how to do each.&lt;/p&gt;\r\n&lt;p&gt;To display a variable&#039;s content use the simple and familiar, &lt;a href=&quot;http://php.net/manual/en/function.echo.php&quot; target=&quot;_blank&quot;&gt;echo&lt;/a&gt; statement:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_555424&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;h1&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$title&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/h1&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Looping through an array, or object, is a common task in view files, and can be achieved with a &lt;a href=&quot;http://php.net/manual/en/control-structures.foreach.php&quot; target=&quot;_blank&quot;&gt;foreach&lt;/a&gt;loop:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_671756&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;foreach&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$posts&lt;/code&gt; &lt;code class=&quot;php keyword&quot;&gt;as&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;li&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/li&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;/ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Simple conditional statements can be used in view files to slightly alter the output, depending on the data passed.&lt;/p&gt;\r\n&lt;p&gt;In general, you want to keep the use of conditional statements in views to a minimum, as overuse can lead to complicated view files, containing &amp;ldquo;business logic&amp;rdquo;. Splitting the view into different files, and deciding which is to be shown in the controller, is much more preferable.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_354981&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;if&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;( &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$logged_in&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php string&quot;&gt;&#039;Welcome &#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;.&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$user_name&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;else&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;{ ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;Please login&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above example will either show a &quot;Welcome&quot; message, or a request for the user to login, depending on the value of &lt;code&gt;$logged_in&lt;/code&gt; (true/false).&lt;/p&gt;', 'y', 'publish', 0, 'n', '2016-05-30 09:30:00', '/assets/uploads/sid-the-sloth_160031-1920x1080.jpg', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', '2016-05-30 09:50:46', '0000-00-00 00:00:00'),
(7, 'Using Data From the Controller in the View', 'using-data-from-the-controller-in-the-view', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', 1, '&lt;p&gt;Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.&lt;/p&gt;\r\n&lt;p&gt;To achieve this, we shall pass an associative array, &lt;strong&gt;&lt;code&gt;$data&lt;/code&gt;&lt;/strong&gt; as the second parameter in the &lt;code&gt;$this-&amp;gt;load-&amp;gt;view()&lt;/code&gt; call.&lt;/p&gt;\r\n&lt;p&gt;The &lt;strong&gt;values&lt;/strong&gt; of this array will be accessible within the loaded view as variables, named by their respective&lt;strong&gt;keys&lt;/strong&gt;.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_612634&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;= &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;title&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Hello World!&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;content&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;This is the content&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;posts&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 1&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 2&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 3&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;)&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$this&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;-&amp;gt;load-&amp;gt;view(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;hello_world&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above code will give the variable &lt;strong&gt;$title&lt;/strong&gt; the value &#039;Hello World!&#039; inside the &lt;code&gt;hello_world&lt;/code&gt; view.&lt;/p&gt;\r\n&lt;h3 class=&quot;nolinks&quot;&gt;How to Use Variables in Views&lt;/h3&gt;\r\n&lt;p&gt;Once we have passed our data to the view files, the variables can be used in the usual way.&lt;/p&gt;\r\n&lt;p&gt;Typically, the view file will use the passed data to:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Display a variable&#039;s value&lt;/li&gt;\r\n&lt;li&gt;Loop through arrays or object properties&lt;/li&gt;\r\n&lt;li&gt;Use conditional statements to show, or hide markup&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;I shall run through quick examples of how to do each.&lt;/p&gt;\r\n&lt;p&gt;To display a variable&#039;s content use the simple and familiar, &lt;a href=&quot;http://php.net/manual/en/function.echo.php&quot; target=&quot;_blank&quot;&gt;echo&lt;/a&gt; statement:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_555424&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;h1&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$title&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/h1&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Looping through an array, or object, is a common task in view files, and can be achieved with a &lt;a href=&quot;http://php.net/manual/en/control-structures.foreach.php&quot; target=&quot;_blank&quot;&gt;foreach&lt;/a&gt;loop:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_671756&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;foreach&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$posts&lt;/code&gt; &lt;code class=&quot;php keyword&quot;&gt;as&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;li&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/li&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;/ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Simple conditional statements can be used in view files to slightly alter the output, depending on the data passed.&lt;/p&gt;\r\n&lt;p&gt;In general, you want to keep the use of conditional statements in views to a minimum, as overuse can lead to complicated view files, containing &amp;ldquo;business logic&amp;rdquo;. Splitting the view into different files, and deciding which is to be shown in the controller, is much more preferable.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_354981&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;if&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;( &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$logged_in&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php string&quot;&gt;&#039;Welcome &#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;.&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$user_name&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;else&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;{ ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;Please login&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above example will either show a &quot;Welcome&quot; message, or a request for the user to login, depending on the value of &lt;code&gt;$logged_in&lt;/code&gt; (true/false).&lt;/p&gt;', 'y', 'publish', 0, 'n', '2016-05-30 09:30:00', '/assets/uploads/sid-the-sloth_160031-1920x1080.jpg', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', '2016-05-30 09:50:46', '0000-00-00 00:00:00');
INSERT INTO `main_article` (`article_id`, `article_title`, `article_url`, `description`, `user_id`, `content`, `allow_comment`, `status`, `view`, `featured`, `publish_date`, `thumbnail`, `summary`, `created_at`, `updated_at`) VALUES
(8, 'Using Data From the Controller in the View', 'using-data-from-the-controller-in-the-view', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', 1, '&lt;p&gt;Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.&lt;/p&gt;\r\n&lt;p&gt;To achieve this, we shall pass an associative array, &lt;strong&gt;&lt;code&gt;$data&lt;/code&gt;&lt;/strong&gt; as the second parameter in the &lt;code&gt;$this-&amp;gt;load-&amp;gt;view()&lt;/code&gt; call.&lt;/p&gt;\r\n&lt;p&gt;The &lt;strong&gt;values&lt;/strong&gt; of this array will be accessible within the loaded view as variables, named by their respective&lt;strong&gt;keys&lt;/strong&gt;.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_612634&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;= &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;title&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Hello World!&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;content&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;This is the content&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;posts&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 1&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 2&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 3&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;)&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$this&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;-&amp;gt;load-&amp;gt;view(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;hello_world&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above code will give the variable &lt;strong&gt;$title&lt;/strong&gt; the value &#039;Hello World!&#039; inside the &lt;code&gt;hello_world&lt;/code&gt; view.&lt;/p&gt;\r\n&lt;h3 class=&quot;nolinks&quot;&gt;How to Use Variables in Views&lt;/h3&gt;\r\n&lt;p&gt;Once we have passed our data to the view files, the variables can be used in the usual way.&lt;/p&gt;\r\n&lt;p&gt;Typically, the view file will use the passed data to:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Display a variable&#039;s value&lt;/li&gt;\r\n&lt;li&gt;Loop through arrays or object properties&lt;/li&gt;\r\n&lt;li&gt;Use conditional statements to show, or hide markup&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;I shall run through quick examples of how to do each.&lt;/p&gt;\r\n&lt;p&gt;To display a variable&#039;s content use the simple and familiar, &lt;a href=&quot;http://php.net/manual/en/function.echo.php&quot; target=&quot;_blank&quot;&gt;echo&lt;/a&gt; statement:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_555424&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;h1&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$title&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/h1&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Looping through an array, or object, is a common task in view files, and can be achieved with a &lt;a href=&quot;http://php.net/manual/en/control-structures.foreach.php&quot; target=&quot;_blank&quot;&gt;foreach&lt;/a&gt;loop:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_671756&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;foreach&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$posts&lt;/code&gt; &lt;code class=&quot;php keyword&quot;&gt;as&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;li&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/li&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;/ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Simple conditional statements can be used in view files to slightly alter the output, depending on the data passed.&lt;/p&gt;\r\n&lt;p&gt;In general, you want to keep the use of conditional statements in views to a minimum, as overuse can lead to complicated view files, containing &amp;ldquo;business logic&amp;rdquo;. Splitting the view into different files, and deciding which is to be shown in the controller, is much more preferable.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_354981&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;if&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;( &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$logged_in&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php string&quot;&gt;&#039;Welcome &#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;.&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$user_name&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;else&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;{ ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;Please login&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above example will either show a &quot;Welcome&quot; message, or a request for the user to login, depending on the value of &lt;code&gt;$logged_in&lt;/code&gt; (true/false).&lt;/p&gt;', 'y', 'publish', 0, 'n', '2016-05-30 09:30:00', '/assets/uploads/sid-the-sloth_160031-1920x1080.jpg', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', '2016-05-30 09:50:46', '0000-00-00 00:00:00'),
(9, 'Using Data From the Controller in the View', 'using-data-from-the-controller-in-the-view', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', 1, '&lt;p&gt;Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.&lt;/p&gt;\r\n&lt;p&gt;To achieve this, we shall pass an associative array, &lt;strong&gt;&lt;code&gt;$data&lt;/code&gt;&lt;/strong&gt; as the second parameter in the &lt;code&gt;$this-&amp;gt;load-&amp;gt;view()&lt;/code&gt; call.&lt;/p&gt;\r\n&lt;p&gt;The &lt;strong&gt;values&lt;/strong&gt; of this array will be accessible within the loaded view as variables, named by their respective&lt;strong&gt;keys&lt;/strong&gt;.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_612634&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;= &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;title&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Hello World!&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;content&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;This is the content&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;posts&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 1&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 2&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 3&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;)&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$this&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;-&amp;gt;load-&amp;gt;view(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;hello_world&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above code will give the variable &lt;strong&gt;$title&lt;/strong&gt; the value &#039;Hello World!&#039; inside the &lt;code&gt;hello_world&lt;/code&gt; view.&lt;/p&gt;\r\n&lt;h3 class=&quot;nolinks&quot;&gt;How to Use Variables in Views&lt;/h3&gt;\r\n&lt;p&gt;Once we have passed our data to the view files, the variables can be used in the usual way.&lt;/p&gt;\r\n&lt;p&gt;Typically, the view file will use the passed data to:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Display a variable&#039;s value&lt;/li&gt;\r\n&lt;li&gt;Loop through arrays or object properties&lt;/li&gt;\r\n&lt;li&gt;Use conditional statements to show, or hide markup&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;I shall run through quick examples of how to do each.&lt;/p&gt;\r\n&lt;p&gt;To display a variable&#039;s content use the simple and familiar, &lt;a href=&quot;http://php.net/manual/en/function.echo.php&quot; target=&quot;_blank&quot;&gt;echo&lt;/a&gt; statement:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_555424&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;h1&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$title&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/h1&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Looping through an array, or object, is a common task in view files, and can be achieved with a &lt;a href=&quot;http://php.net/manual/en/control-structures.foreach.php&quot; target=&quot;_blank&quot;&gt;foreach&lt;/a&gt;loop:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_671756&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;foreach&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$posts&lt;/code&gt; &lt;code class=&quot;php keyword&quot;&gt;as&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;li&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/li&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;/ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Simple conditional statements can be used in view files to slightly alter the output, depending on the data passed.&lt;/p&gt;\r\n&lt;p&gt;In general, you want to keep the use of conditional statements in views to a minimum, as overuse can lead to complicated view files, containing &amp;ldquo;business logic&amp;rdquo;. Splitting the view into different files, and deciding which is to be shown in the controller, is much more preferable.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_354981&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;if&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;( &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$logged_in&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php string&quot;&gt;&#039;Welcome &#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;.&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$user_name&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;else&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;{ ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;Please login&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above example will either show a &quot;Welcome&quot; message, or a request for the user to login, depending on the value of &lt;code&gt;$logged_in&lt;/code&gt; (true/false).&lt;/p&gt;', 'y', 'publish', 0, 'n', '2016-05-30 09:30:00', '/assets/uploads/sid-the-sloth_160031-1920x1080.jpg', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', '2016-05-30 09:50:46', '0000-00-00 00:00:00'),
(10, 'Using Data From the Controller in the View', 'using-data-from-the-controller-in-the-view', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', 1, '&lt;p&gt;Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.&lt;/p&gt;\r\n&lt;p&gt;To achieve this, we shall pass an associative array, &lt;strong&gt;&lt;code&gt;$data&lt;/code&gt;&lt;/strong&gt; as the second parameter in the &lt;code&gt;$this-&amp;gt;load-&amp;gt;view()&lt;/code&gt; call.&lt;/p&gt;\r\n&lt;p&gt;The &lt;strong&gt;values&lt;/strong&gt; of this array will be accessible within the loaded view as variables, named by their respective&lt;strong&gt;keys&lt;/strong&gt;.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_612634&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;= &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;title&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Hello World!&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;content&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;This is the content&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;posts&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 1&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 2&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 3&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;)&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$this&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;-&amp;gt;load-&amp;gt;view(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;hello_world&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above code will give the variable &lt;strong&gt;$title&lt;/strong&gt; the value &#039;Hello World!&#039; inside the &lt;code&gt;hello_world&lt;/code&gt; view.&lt;/p&gt;\r\n&lt;h3 class=&quot;nolinks&quot;&gt;How to Use Variables in Views&lt;/h3&gt;\r\n&lt;p&gt;Once we have passed our data to the view files, the variables can be used in the usual way.&lt;/p&gt;\r\n&lt;p&gt;Typically, the view file will use the passed data to:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Display a variable&#039;s value&lt;/li&gt;\r\n&lt;li&gt;Loop through arrays or object properties&lt;/li&gt;\r\n&lt;li&gt;Use conditional statements to show, or hide markup&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;I shall run through quick examples of how to do each.&lt;/p&gt;\r\n&lt;p&gt;To display a variable&#039;s content use the simple and familiar, &lt;a href=&quot;http://php.net/manual/en/function.echo.php&quot; target=&quot;_blank&quot;&gt;echo&lt;/a&gt; statement:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_555424&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;h1&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$title&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/h1&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Looping through an array, or object, is a common task in view files, and can be achieved with a &lt;a href=&quot;http://php.net/manual/en/control-structures.foreach.php&quot; target=&quot;_blank&quot;&gt;foreach&lt;/a&gt;loop:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_671756&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;foreach&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$posts&lt;/code&gt; &lt;code class=&quot;php keyword&quot;&gt;as&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;li&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/li&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;/ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Simple conditional statements can be used in view files to slightly alter the output, depending on the data passed.&lt;/p&gt;\r\n&lt;p&gt;In general, you want to keep the use of conditional statements in views to a minimum, as overuse can lead to complicated view files, containing &amp;ldquo;business logic&amp;rdquo;. Splitting the view into different files, and deciding which is to be shown in the controller, is much more preferable.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_354981&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;if&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;( &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$logged_in&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php string&quot;&gt;&#039;Welcome &#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;.&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$user_name&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;else&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;{ ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;Please login&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above example will either show a &quot;Welcome&quot; message, or a request for the user to login, depending on the value of &lt;code&gt;$logged_in&lt;/code&gt; (true/false).&lt;/p&gt;', 'y', 'publish', 0, 'n', '2016-05-30 09:30:00', '/assets/uploads/sid-the-sloth_160031-1920x1080.jpg', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', '2016-05-30 09:50:46', '0000-00-00 00:00:00');
INSERT INTO `main_article` (`article_id`, `article_title`, `article_url`, `description`, `user_id`, `content`, `allow_comment`, `status`, `view`, `featured`, `publish_date`, `thumbnail`, `summary`, `created_at`, `updated_at`) VALUES
(11, 'Using Data From the Controller in the View', 'using-data-from-the-controller-in-the-view', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', 1, '&lt;p&gt;Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.&lt;/p&gt;\r\n&lt;p&gt;To achieve this, we shall pass an associative array, &lt;strong&gt;&lt;code&gt;$data&lt;/code&gt;&lt;/strong&gt; as the second parameter in the &lt;code&gt;$this-&amp;gt;load-&amp;gt;view()&lt;/code&gt; call.&lt;/p&gt;\r\n&lt;p&gt;The &lt;strong&gt;values&lt;/strong&gt; of this array will be accessible within the loaded view as variables, named by their respective&lt;strong&gt;keys&lt;/strong&gt;.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_612634&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;= &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;title&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Hello World!&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;content&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;This is the content&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;posts&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 1&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 2&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 3&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;)&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$this&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;-&amp;gt;load-&amp;gt;view(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;hello_world&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above code will give the variable &lt;strong&gt;$title&lt;/strong&gt; the value &#039;Hello World!&#039; inside the &lt;code&gt;hello_world&lt;/code&gt; view.&lt;/p&gt;\r\n&lt;h3 class=&quot;nolinks&quot;&gt;How to Use Variables in Views&lt;/h3&gt;\r\n&lt;p&gt;Once we have passed our data to the view files, the variables can be used in the usual way.&lt;/p&gt;\r\n&lt;p&gt;Typically, the view file will use the passed data to:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Display a variable&#039;s value&lt;/li&gt;\r\n&lt;li&gt;Loop through arrays or object properties&lt;/li&gt;\r\n&lt;li&gt;Use conditional statements to show, or hide markup&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;I shall run through quick examples of how to do each.&lt;/p&gt;\r\n&lt;p&gt;To display a variable&#039;s content use the simple and familiar, &lt;a href=&quot;http://php.net/manual/en/function.echo.php&quot; target=&quot;_blank&quot;&gt;echo&lt;/a&gt; statement:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_555424&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;h1&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$title&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/h1&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Looping through an array, or object, is a common task in view files, and can be achieved with a &lt;a href=&quot;http://php.net/manual/en/control-structures.foreach.php&quot; target=&quot;_blank&quot;&gt;foreach&lt;/a&gt;loop:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_671756&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;foreach&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$posts&lt;/code&gt; &lt;code class=&quot;php keyword&quot;&gt;as&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;li&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/li&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;/ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Simple conditional statements can be used in view files to slightly alter the output, depending on the data passed.&lt;/p&gt;\r\n&lt;p&gt;In general, you want to keep the use of conditional statements in views to a minimum, as overuse can lead to complicated view files, containing &amp;ldquo;business logic&amp;rdquo;. Splitting the view into different files, and deciding which is to be shown in the controller, is much more preferable.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_354981&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;if&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;( &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$logged_in&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php string&quot;&gt;&#039;Welcome &#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;.&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$user_name&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;else&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;{ ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;Please login&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above example will either show a &quot;Welcome&quot; message, or a request for the user to login, depending on the value of &lt;code&gt;$logged_in&lt;/code&gt; (true/false).&lt;/p&gt;', 'y', 'publish', 0, 'n', '2016-05-30 09:30:00', '/assets/uploads/sid-the-sloth_160031-1920x1080.jpg', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', '2016-05-30 09:50:46', '0000-00-00 00:00:00'),
(12, 'Using Data From the Controller in the View', 'using-data-from-the-controller-in-the-view', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', 1, '&lt;p&gt;Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.&lt;/p&gt;\r\n&lt;p&gt;To achieve this, we shall pass an associative array, &lt;strong&gt;&lt;code&gt;$data&lt;/code&gt;&lt;/strong&gt; as the second parameter in the &lt;code&gt;$this-&amp;gt;load-&amp;gt;view()&lt;/code&gt; call.&lt;/p&gt;\r\n&lt;p&gt;The &lt;strong&gt;values&lt;/strong&gt; of this array will be accessible within the loaded view as variables, named by their respective&lt;strong&gt;keys&lt;/strong&gt;.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_612634&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;= &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;title&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Hello World!&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;content&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;This is the content&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;posts&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 1&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 2&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 3&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;)&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$this&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;-&amp;gt;load-&amp;gt;view(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;hello_world&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above code will give the variable &lt;strong&gt;$title&lt;/strong&gt; the value &#039;Hello World!&#039; inside the &lt;code&gt;hello_world&lt;/code&gt; view.&lt;/p&gt;\r\n&lt;h3 class=&quot;nolinks&quot;&gt;How to Use Variables in Views&lt;/h3&gt;\r\n&lt;p&gt;Once we have passed our data to the view files, the variables can be used in the usual way.&lt;/p&gt;\r\n&lt;p&gt;Typically, the view file will use the passed data to:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Display a variable&#039;s value&lt;/li&gt;\r\n&lt;li&gt;Loop through arrays or object properties&lt;/li&gt;\r\n&lt;li&gt;Use conditional statements to show, or hide markup&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;I shall run through quick examples of how to do each.&lt;/p&gt;\r\n&lt;p&gt;To display a variable&#039;s content use the simple and familiar, &lt;a href=&quot;http://php.net/manual/en/function.echo.php&quot; target=&quot;_blank&quot;&gt;echo&lt;/a&gt; statement:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_555424&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;h1&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$title&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/h1&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Looping through an array, or object, is a common task in view files, and can be achieved with a &lt;a href=&quot;http://php.net/manual/en/control-structures.foreach.php&quot; target=&quot;_blank&quot;&gt;foreach&lt;/a&gt;loop:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_671756&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;foreach&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$posts&lt;/code&gt; &lt;code class=&quot;php keyword&quot;&gt;as&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;li&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/li&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;/ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Simple conditional statements can be used in view files to slightly alter the output, depending on the data passed.&lt;/p&gt;\r\n&lt;p&gt;In general, you want to keep the use of conditional statements in views to a minimum, as overuse can lead to complicated view files, containing &amp;ldquo;business logic&amp;rdquo;. Splitting the view into different files, and deciding which is to be shown in the controller, is much more preferable.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_354981&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;if&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;( &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$logged_in&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php string&quot;&gt;&#039;Welcome &#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;.&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$user_name&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;else&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;{ ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;Please login&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above example will either show a &quot;Welcome&quot; message, or a request for the user to login, depending on the value of &lt;code&gt;$logged_in&lt;/code&gt; (true/false).&lt;/p&gt;', 'y', 'publish', 0, 'n', '2016-05-30 09:30:00', '/assets/uploads/sid-the-sloth_160031-1920x1080.jpg', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', '2016-05-30 09:50:46', '0000-00-00 00:00:00'),
(13, 'Using Data From the Controller in the View', 'using-data-from-the-controller-in-the-view', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', 1, '&lt;p&gt;Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.&lt;/p&gt;\r\n&lt;p&gt;To achieve this, we shall pass an associative array, &lt;strong&gt;&lt;code&gt;$data&lt;/code&gt;&lt;/strong&gt; as the second parameter in the &lt;code&gt;$this-&amp;gt;load-&amp;gt;view()&lt;/code&gt; call.&lt;/p&gt;\r\n&lt;p&gt;The &lt;strong&gt;values&lt;/strong&gt; of this array will be accessible within the loaded view as variables, named by their respective&lt;strong&gt;keys&lt;/strong&gt;.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_612634&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;= &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;title&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Hello World!&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;content&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;This is the content&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;,&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;posts&#039;&lt;/code&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;code class=&quot;php plain&quot;&gt;=&amp;gt;&amp;nbsp;&amp;nbsp; &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;array&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 1&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 2&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;Post 3&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;)&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php variable&quot;&gt;$this&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;-&amp;gt;load-&amp;gt;view(&lt;/code&gt;&lt;code class=&quot;php string&quot;&gt;&#039;hello_world&#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;, &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$data&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;);&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above code will give the variable &lt;strong&gt;$title&lt;/strong&gt; the value &#039;Hello World!&#039; inside the &lt;code&gt;hello_world&lt;/code&gt; view.&lt;/p&gt;\r\n&lt;h3 class=&quot;nolinks&quot;&gt;How to Use Variables in Views&lt;/h3&gt;\r\n&lt;p&gt;Once we have passed our data to the view files, the variables can be used in the usual way.&lt;/p&gt;\r\n&lt;p&gt;Typically, the view file will use the passed data to:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Display a variable&#039;s value&lt;/li&gt;\r\n&lt;li&gt;Loop through arrays or object properties&lt;/li&gt;\r\n&lt;li&gt;Use conditional statements to show, or hide markup&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;I shall run through quick examples of how to do each.&lt;/p&gt;\r\n&lt;p&gt;To display a variable&#039;s content use the simple and familiar, &lt;a href=&quot;http://php.net/manual/en/function.echo.php&quot; target=&quot;_blank&quot;&gt;echo&lt;/a&gt; statement:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_555424&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;h1&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$title&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/h1&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Looping through an array, or object, is a common task in view files, and can be achieved with a &lt;a href=&quot;http://php.net/manual/en/control-structures.foreach.php&quot; target=&quot;_blank&quot;&gt;foreach&lt;/a&gt;loop:&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_671756&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;foreach&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;(&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$posts&lt;/code&gt; &lt;code class=&quot;php keyword&quot;&gt;as&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;li&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php variable&quot;&gt;$post&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/li&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;/ul&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Simple conditional statements can be used in view files to slightly alter the output, depending on the data passed.&lt;/p&gt;\r\n&lt;p&gt;In general, you want to keep the use of conditional statements in views to a minimum, as overuse can lead to complicated view files, containing &amp;ldquo;business logic&amp;rdquo;. Splitting the view into different files, and deciding which is to be shown in the controller, is much more preferable.&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div id=&quot;highlighter_354981&quot; class=&quot;syntaxhighlighter noskimlinks noskimwords php&quot;&gt;\r\n&lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\r\n&lt;tbody&gt;\r\n&lt;tr&gt;\r\n&lt;td class=&quot;gutter&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;1&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;2&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;3&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;4&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;5&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;6&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;7&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;8&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;9&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;td class=&quot;code&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;line number1 index0 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;if&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;( &lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$logged_in&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;) { ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number2 index1 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number3 index2 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;&amp;lt;?php &lt;/code&gt;&lt;code class=&quot;php functions&quot;&gt;echo&lt;/code&gt; &lt;code class=&quot;php string&quot;&gt;&#039;Welcome &#039;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;.&lt;/code&gt;&lt;code class=&quot;php variable&quot;&gt;$user_name&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;; ?&amp;gt;&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number4 index3 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number5 index4 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } &lt;/code&gt;&lt;code class=&quot;php keyword&quot;&gt;else&lt;/code&gt; &lt;code class=&quot;php plain&quot;&gt;{ ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number6 index5 alt1&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number7 index6 alt2&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;p&amp;gt;Please login&amp;lt;/p&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;div class=&quot;line number8 index7 alt1&quot;&gt;&lt;code class=&quot;php spaces&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/code&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;line number9 index8 alt2&quot;&gt;&lt;code class=&quot;php plain&quot;&gt;&amp;lt;?php } ?&amp;gt;&lt;/code&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/td&gt;\r\n&lt;/tr&gt;\r\n&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;The above example will either show a &quot;Welcome&quot; message, or a request for the user to login, depending on the value of &lt;code&gt;$logged_in&lt;/code&gt; (true/false).&lt;/p&gt;', 'y', 'publish', 0, 'n', '2016-05-30 09:30:00', '/assets/uploads/sid-the-sloth_160031-1920x1080.jpg', 'Now, we&#039;ll look at passing data from the controllers, so they can be used or outputted inside the view.', '2016-05-30 09:50:46', '0000-00-00 00:00:00'),
(14, '12', '1212', '', 1, '', 'y', 'draft', 0, 'n', '2016-05-30 16:30:44', '', '', '2016-05-30 16:21:58', '0000-00-00 00:00:00'),
(15, '12', '1212', '', 1, '', 'y', 'draft', 0, 'n', '2016-05-30 16:30:44', '', '', '2016-05-30 16:24:23', '0000-00-00 00:00:00'),
(16, '4535353', '4535353', '', 1, '', 'y', 'publish', 0, 'y', '2016-06-22 17:22:09', '/assets/uploads/images/wtwgswtwt.jpg', '', '2016-05-30 16:25:53', '2016-06-22 17:01:28'),
(17, '312455', '312455', '', 1, '', 'y', 'publish', 0, 'n', '2016-05-30 16:30:19', '/assets/uploads/HaiDongVat.png', '', '2016-05-30 16:49:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `main_article_category`
--

DROP TABLE IF EXISTS `main_article_category`;
CREATE TABLE `main_article_category` (
  `acate_id` int(11) NOT NULL,
  `article_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `position` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_article_category`
--

TRUNCATE TABLE `main_article_category`;
--
-- Dumping data for table `main_article_category`
--

INSERT INTO `main_article_category` (`acate_id`, `article_id`, `category_id`, `position`) VALUES
(1, 17, 1, 0),
(2, 17, 5, 0),
(3, 17, 8, 0),
(23, 1, 1, 0),
(24, 1, 3, 0),
(25, 1, 4, 0),
(32, 2, 1, 0),
(33, 2, 5, 0),
(34, 3, 14, 0),
(35, 16, 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `main_article_tag`
--

DROP TABLE IF EXISTS `main_article_tag`;
CREATE TABLE `main_article_tag` (
  `atag_id` int(11) UNSIGNED NOT NULL,
  `article_id` int(11) UNSIGNED NOT NULL,
  `tag_id` int(11) UNSIGNED NOT NULL,
  `position` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_article_tag`
--

TRUNCATE TABLE `main_article_tag`;
--
-- Dumping data for table `main_article_tag`
--

INSERT INTO `main_article_tag` (`atag_id`, `article_id`, `tag_id`, `position`) VALUES
(1, 15, 1, NULL),
(2, 15, 2, NULL),
(3, 15, 3, NULL),
(5, 17, 3, NULL),
(37, 1, 1, NULL),
(38, 1, 2, NULL),
(39, 1, 7, NULL),
(40, 1, 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

DROP TABLE IF EXISTS `main_category`;
CREATE TABLE `main_category` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `category_title` varchar(300) NOT NULL,
  `category_url` varchar(300) NOT NULL,
  `keyword` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `content` text,
  `position` int(11) UNSIGNED DEFAULT NULL,
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_category`
--

TRUNCATE TABLE `main_category`;
--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`category_id`, `category_title`, `category_url`, `keyword`, `description`, `content`, `position`, `parent_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'PHP', 'php', 'php', '', '', NULL, 0, '2016-05-27 10:54:01', '2016-05-27 11:15:02', 'publish'),
(2, 'PHP cơ bản', 'php-co-ban', 'php,php cơ bản', '', '', NULL, 1, '2016-05-27 10:57:22', '2016-05-27 11:16:36', 'publish'),
(3, 'PHP nâng cao', 'php-nang-cao', 'php,php nâng cao', 'PHP nâng cao', '', NULL, 1, '2016-05-27 10:58:51', '2016-05-27 11:33:05', 'publish'),
(4, 'PHP Framework', 'php-framework', '', '', '', NULL, 1, '2016-05-30 16:34:20', '0000-00-00 00:00:00', 'publish'),
(5, 'Javascript', 'javascript', '', '', '', NULL, 0, '2016-05-30 16:34:29', '0000-00-00 00:00:00', 'publish'),
(6, 'JQuery', 'jquery', '', '', '', NULL, 5, '2016-05-30 16:34:36', '0000-00-00 00:00:00', 'publish'),
(7, 'AngularJS', 'angularjs', '', '', '', NULL, 5, '2016-05-30 16:34:44', '0000-00-00 00:00:00', 'publish'),
(8, 'Database', 'database', '', '', '', NULL, 0, '2016-05-30 16:35:45', '0000-00-00 00:00:00', 'publish'),
(9, 'MySQL', 'mysql', '', '', '', NULL, 8, '2016-05-30 16:35:55', '0000-00-00 00:00:00', 'publish'),
(10, 'PouchDB', 'pouchdb', '', '', '', NULL, 8, '2016-05-30 16:36:07', '0000-00-00 00:00:00', 'publish'),
(11, 'MongoDB', 'mongodb', '', '', '', NULL, 8, '2016-05-30 16:36:17', '0000-00-00 00:00:00', 'draft'),
(12, 'SQL Server', 'sql-server', '', '', '', NULL, 8, '2016-05-30 16:36:27', '0000-00-00 00:00:00', 'publish'),
(13, 'Laravel', 'laravel', 'Laravel', '', '', NULL, 4, '2016-05-31 23:13:34', '0000-00-00 00:00:00', 'publish'),
(14, 'HTML', 'html', 'html', 'HTML', '&lt;p&gt;HTML&lt;/p&gt;', NULL, 0, '2016-06-14 23:17:19', '0000-00-00 00:00:00', 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `main_config`
--

DROP TABLE IF EXISTS `main_config`;
CREATE TABLE `main_config` (
  `config_id` int(11) UNSIGNED NOT NULL,
  `config_name` varchar(100) NOT NULL,
  `config_value` text NOT NULL,
  `config_description` text NOT NULL,
  `language_id` int(11) UNSIGNED NOT NULL,
  `domain_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_config`
--

TRUNCATE TABLE `main_config`;
-- --------------------------------------------------------

--
-- Table structure for table `main_domain`
--

DROP TABLE IF EXISTS `main_domain`;
CREATE TABLE `main_domain` (
  `domain_id` int(11) UNSIGNED NOT NULL,
  `domain_name` varchar(60) NOT NULL,
  `domain_alias` varchar(40) NOT NULL,
  `domain_is_active` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_domain`
--

TRUNCATE TABLE `main_domain`;
-- --------------------------------------------------------

--
-- Table structure for table `main_gallery`
--

DROP TABLE IF EXISTS `main_gallery`;
CREATE TABLE `main_gallery` (
  `gallery_id` int(11) UNSIGNED NOT NULL,
  `gallery_title` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `description` text,
  `type` varchar(10) NOT NULL DEFAULT 'default',
  `is_active` enum('y','n') NOT NULL DEFAULT 'n',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_gallery`
--

TRUNCATE TABLE `main_gallery`;
--
-- Dumping data for table `main_gallery`
--

INSERT INTO `main_gallery` (`gallery_id`, `gallery_title`, `thumbnail`, `description`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Gallery 1', '/assets/uploads/145IpS1.jpg', 'Gallery 1', 'default', 'y', '2016-06-15 00:30:11', '2016-06-16 00:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `main_language`
--

DROP TABLE IF EXISTS `main_language`;
CREATE TABLE `main_language` (
  `language_id` int(11) UNSIGNED NOT NULL,
  `language_name` varchar(50) NOT NULL,
  `language_code` varchar(50) NOT NULL,
  `language_iso_code` varchar(5) NOT NULL,
  `language_is_default` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_language`
--

TRUNCATE TABLE `main_language`;
-- --------------------------------------------------------

--
-- Table structure for table `main_link`
--

DROP TABLE IF EXISTS `main_link`;
CREATE TABLE `main_link` (
  `link_id` int(11) UNSIGNED NOT NULL,
  `link_title` varchar(255) NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `position` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `is_show` enum('y','n') NOT NULL DEFAULT 'n',
  `parent_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_link`
--

TRUNCATE TABLE `main_link`;
--
-- Dumping data for table `main_link`
--

INSERT INTO `main_link` (`link_id`, `link_title`, `link_url`, `position`, `is_show`, `parent_id`) VALUES
(1, 'Home', '/', 1, 'y', 0),
(2, 'Contact', '/contact', 5, 'y', 0),
(3, 'About', '/about', 2, 'n', 0),
(4, 'Administrator', '/about/administrator', 3, 'n', 3),
(5, 'Trinh Quoc Hoang', '/about/trinh-quoc-hoang', 4, 'y', 4);

-- --------------------------------------------------------

--
-- Table structure for table `main_media`
--

DROP TABLE IF EXISTS `main_media`;
CREATE TABLE `main_media` (
  `media_id` int(11) UNSIGNED NOT NULL,
  `media_title` varchar(255) NOT NULL,
  `media_url` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `media_link` varchar(255) NOT NULL,
  `description` text,
  `position` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `widget_id` int(11) UNSIGNED DEFAULT NULL,
  `gallery_id` int(11) UNSIGNED DEFAULT NULL,
  `is_active` enum('y','n') NOT NULL DEFAULT 'n',
  `media_config` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_media`
--

TRUNCATE TABLE `main_media`;
--
-- Dumping data for table `main_media`
--

INSERT INTO `main_media` (`media_id`, `media_title`, `media_url`, `thumbnail`, `media_link`, `description`, `position`, `widget_id`, `gallery_id`, `is_active`, `media_config`, `created_at`, `updated_at`) VALUES
(1, 'Demo', '/assets/uploads/rIP4wPf.jpg', '/assets/uploads/rIP4wPf.jpg', '', 'Bla bla bla bla bla bla bla bla bla bla bla bla bla', 0, NULL, 1, 'y', NULL, '2016-06-15 00:00:00', '2016-06-16 00:49:20'),
(2, 'Demo', '/assets/uploads/Untitled-1.jpg', '/assets/uploads/Untitled-1.jpg', '', 'Bla bla bla bla bla bla bla bla bla bla bla bla bla', 0, NULL, 1, 'n', NULL, '2016-06-15 00:00:00', '2016-06-16 00:40:11'),
(3, 'Demo', '/assets/uploads/bicycle-art-hd-wallpaper-desktop-b57.jpg', '/assets/uploads/bicycle-art-hd-wallpaper-desktop-b57.jpg', '', 'Bla bla bla bla bla bla bla bla bla bla bla bla bla', 0, NULL, 1, 'y', NULL, '2016-06-15 00:00:00', '2016-06-16 00:41:03'),
(4, 'Demo', '/assets/uploads/Ice-Age-Continental-Drift-Sid-On-The-Ocean-1920x1200-Wallpaper-ToonsWallpapers.com-.jpg', '/assets/uploads/Ice-Age-Continental-Drift-Sid-On-The-Ocean-1920x1200-Wallpaper-ToonsWallpapers.com-.jpg', '', 'Bla bla bla bla bla bla bla bla bla bla bla bla bla', 0, NULL, 1, 'y', NULL, '2016-06-15 00:00:00', '2016-06-15 00:00:00'),
(5, 'Demo', '/assets/uploads/sid-the-sloth_160031-1920x1080.jpg', '/assets/uploads/sid-the-sloth_160031-1920x1080.jpg', '', 'Bla bla bla bla bla bla bla bla bla bla bla bla bla', 0, NULL, 1, 'y', NULL, '2016-06-15 00:00:00', '2016-06-15 00:00:00'),
(6, 'Demo', '/assets/uploads/Ice-Age-Continental-Drift-Sid-On-The-Ocean-1920x1200-Wallpaper-ToonsWallpapers.com-.jpg', '/assets/uploads/Ice-Age-Continental-Drift-Sid-On-The-Ocean-1920x1200-Wallpaper-ToonsWallpapers.com-.jpg', '', 'Bla bla bla bla bla bla bla bla bla bla bla bla bla', 0, NULL, 1, 'y', NULL, '2016-06-15 00:00:00', '2016-06-15 00:00:00'),
(7, 'Demo', '/assets/uploads/sid-the-sloth_160031-1920x1080.jpg', '/assets/uploads/sid-the-sloth_160031-1920x1080.jpg', '', 'Bla bla bla bla bla bla bla bla bla bla bla bla bla', 0, NULL, 1, 'y', NULL, '2016-06-15 00:00:00', '2016-06-15 00:00:00'),
(8, 'Demo 2', '/assets/uploads/H804cGR.jpg', '/assets/uploads/images/SIdSloth2.jpg', '', '', 1, NULL, 0, 'n', NULL, '2016-06-16 01:06:35', '2016-06-16 01:17:43'),
(9, 'Bla bla bla', '/assets/uploads/145IpS1.jpg', '', '', '', 1, NULL, 1, 'n', NULL, '2016-06-16 01:08:08', '0000-00-00 00:00:00'),
(10, 'Blu blu', '/assets/uploads/1cGTSUZ.jpg', '/assets/uploads/1cGTSUZ.jpg', '', '', 1, NULL, 1, 'n', NULL, '2016-06-16 01:09:20', '0000-00-00 00:00:00'),
(11, 'Bla bla bla 2', '/assets/uploads/AXtx7Dk.jpg', '/assets/uploads/AXtx7Dk.jpg', '', '', 1, NULL, 1, 'n', NULL, '2016-06-16 01:15:28', '0000-00-00 00:00:00'),
(12, 'Ble ble', '/assets/uploads/H804cGR.jpg', '/assets/uploads/H804cGR.jpg', '', '', 1, NULL, 0, 'y', NULL, '2016-06-16 01:17:10', '0000-00-00 00:00:00'),
(13, '12', '/assets/uploads/sT92TlS.jpg', '/assets/uploads/sT92TlS.jpg', 'http://localhost', 'wew', 1, NULL, NULL, 'y', NULL, '2016-06-20 07:27:40', '0000-00-00 00:00:00'),
(14, 'Clean &amp; Creative', '', '/assets/uploads/images/slideshows/ban2.png', 'http://thevectorlab.net/flatlab', '&lt;p&gt;Sed ut perspiciatis unde omnis iste natus error sit&lt;/p&gt;\r\n&lt;p&gt;voluptatem accusantium doloremque laudantium,&lt;/p&gt;\r\n&lt;p&gt;totam rem aperiam, eaque ipsa quae ablic jiener.&lt;/p&gt;', 1, 4, NULL, 'y', '{"slide_subtitle":"A Responsive Frontend Template","slide_btn":"Watch Dashboard"}', '2016-06-20 07:31:07', '2016-06-21 10:39:52'),
(15, 'YAHOOOOO. TWO IN ONE', '', '/assets/uploads/images/slideshows/banner_bg.jpg', 'javascript:;', '&lt;p&gt;Sed ut perspiciatis unde omnis iste natus error sit&lt;/p&gt;\r\n&lt;p&gt;voluptatem accusantium doloremque laudantium,&lt;/p&gt;\r\n&lt;p&gt;totam rem aperiam, eaque ipsa quae ablic jiener.&lt;/p&gt;', 1, 4, NULL, 'y', '{"slide_subtitle":"Admin & Fronend in a single bundle","slide_desc":"","slide_btn":"Purchase Now","caption_lft_start":"\\/assets\\/uploads\\/images\\/slideshows\\/man.png","slide_item_right":"\\/assets\\/uploads\\/images\\/slideshows\\/test_man.png"}', '2016-06-20 07:47:49', '2016-06-21 10:41:50'),
(16, 'Full Responsive', '/assets/uploads/images/slideshows/ban2.png', '/assets/uploads/images/slideshows/red-bg.jpg', 'javascript:;', '', 1, 4, NULL, 'y', '{"image_1":"\\/assets\\/uploads\\/images\\/slideshows\\/imac.png","image_2":"\\/assets\\/uploads\\/images\\/slideshows\\/tab.png","image_3":"\\/assets\\/uploads\\/images\\/slideshows\\/mobile.png","image_4":"\\/assets\\/uploads\\/images\\/slideshows\\/laptop.png","image_5":"\\/assets\\/uploads\\/images\\/slideshows\\/text_imac.png","slide_subtitle":"And Awesome Flat Design"}', '2016-06-20 12:18:03', '2016-06-21 11:46:14'),
(18, 'Responsive design', '', '', '', '&lt;p&gt;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener.&lt;/p&gt;', 1, 5, NULL, 'y', '{"icon":"icon-desktop"}', '2016-06-21 11:20:17', '0000-00-00 00:00:00'),
(19, 'Friendly code', '', '', '', '&lt;p&gt;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener.&lt;/p&gt;', 1, 5, NULL, 'y', '{"icon":"icon-code"}', '2016-06-21 11:21:01', '0000-00-00 00:00:00'),
(20, 'Fully customizable', '', '', '', '&lt;p&gt;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener.&lt;/p&gt;', 1, 5, NULL, 'y', '{"icon":"icon-gears"}', '2016-06-21 11:21:48', '0000-00-00 00:00:00'),
(21, 'Work 1', '/assets/uploads/images/blocks/img1.jpg', '/assets/uploads/images/blocks/img1.jpg', '/media/1', '', 1, 10, NULL, 'y', '{"":""}', '2016-06-23 16:16:25', '0000-00-00 00:00:00'),
(22, 'Work 2', '/assets/uploads/images/blocks/img2.jpg', '/assets/uploads/images/blocks/img2.jpg', '/media/2', '', 1, 10, NULL, 'y', '{"":""}', '2016-06-23 16:16:44', '0000-00-00 00:00:00'),
(23, 'Work 3', '/assets/uploads/images/blocks/img3.jpg', '/assets/uploads/images/blocks/img3.jpg', '/media/3', '', 1, 10, NULL, 'y', '{"":""}', '2016-06-23 16:16:44', '0000-00-00 00:00:00'),
(24, 'Work 4', '/assets/uploads/images/blocks/img4.jpg', '/assets/uploads/images/blocks/img4.jpg', '/media/4', '', 1, 10, NULL, 'y', '{"":""}', '2016-06-23 16:16:44', '0000-00-00 00:00:00'),
(25, 'Work 5', '/assets/uploads/images/blocks/img5.jpg', '/assets/uploads/images/blocks/img5.jpg', '/media/5', '', 1, 10, NULL, 'y', '{"":""}', '2016-06-23 16:16:44', '0000-00-00 00:00:00'),
(26, 'Work 6', '/assets/uploads/images/blocks/img6.jpg', '/assets/uploads/images/blocks/img6.jpg', '/media/6', '', 1, 10, NULL, 'y', '{"":""}', '2016-06-23 16:17:44', '0000-00-00 00:00:00'),
(27, 'Work 7', '/assets/uploads/images/blocks/img7.jpg', '/assets/uploads/images/blocks/img7.jpg', '/media/7', '', 1, 10, NULL, 'y', '{"":""}', '2016-06-23 16:19:44', '0000-00-00 00:00:00'),
(28, 'Partner 1', '', '/assets/uploads/images/logos/logo1.png', 'http://partner1.dev', '', 1, 12, NULL, 'y', '{"":""}', '2016-06-23 16:31:38', '0000-00-00 00:00:00'),
(29, 'Partner 2', '', '/assets/uploads/images/logos/logo5.png', 'http://partner2.dev', '', 1, 12, NULL, 'y', '{"":""}', '2016-06-23 16:31:59', '0000-00-00 00:00:00'),
(30, 'Partner 3', '', '/assets/uploads/images/logos/logo4.png', 'http://partner3.dev', '', 1, 12, NULL, 'y', '{"":""}', '2016-06-23 16:32:14', '0000-00-00 00:00:00'),
(31, 'Partner 4', '', '/assets/uploads/images/logos/logo3.png', 'http://partner4.dev', '', 1, 12, NULL, 'y', '{"":""}', '2016-06-23 16:32:30', '0000-00-00 00:00:00'),
(32, 'Partner 5', '', '/assets/uploads/images/logos/logo2.png', 'http://partner5.dev', '', 1, 12, NULL, 'y', '{"":""}', '2016-06-23 16:32:45', '0000-00-00 00:00:00'),
(33, 'Facebook', '', '', 'http://facebook.com/NKBQ.TV', '', 1, 15, NULL, 'y', '{"icon":"icon-facebook"}', '2016-06-23 17:29:27', '0000-00-00 00:00:00'),
(34, 'Google Plus', '', '', 'https://plus.google.com/+VRapTopHitTV', '', 1, 15, NULL, 'y', '{"icon":"icon-google-plus"}', '2016-06-23 17:30:28', '0000-00-00 00:00:00'),
(35, 'Twitter', '', '', 'https://twitter.com/@quochoangvp', '', 1, 15, NULL, 'y', '{"icon":"icon-twitter"}', '2016-06-23 17:32:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `main_module`
--

DROP TABLE IF EXISTS `main_module`;
CREATE TABLE `main_module` (
  `module_id` int(11) UNSIGNED NOT NULL,
  `module_package` varchar(50) NOT NULL,
  `module_path` varchar(100) NOT NULL,
  `module_version` varchar(20) NOT NULL,
  `module_is_active` enum('y','n') NOT NULL DEFAULT 'n',
  `module_is_readonly` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_module`
--

TRUNCATE TABLE `main_module`;
--
-- Dumping data for table `main_module`
--

INSERT INTO `main_module` (`module_id`, `module_package`, `module_path`, `module_version`, `module_is_active`, `module_is_readonly`) VALUES
(1, 'system.dashboard', 'dashboard', '1.0', 'y', 'y'),
(2, 'system.article', 'article', '1.0', 'y', 'n'),
(3, 'system.product', 'product', '1.0', 'n', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `main_modulemeta`
--

DROP TABLE IF EXISTS `main_modulemeta`;
CREATE TABLE `main_modulemeta` (
  `mdmeta_id` int(11) UNSIGNED NOT NULL,
  `mdmeta_key` varchar(40) NOT NULL,
  `mdmeta_value` longtext NOT NULL,
  `module_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_modulemeta`
--

TRUNCATE TABLE `main_modulemeta`;
-- --------------------------------------------------------

--
-- Table structure for table `main_product`
--

DROP TABLE IF EXISTS `main_product`;
CREATE TABLE `main_product` (
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_thumb` varchar(255) DEFAULT NULL,
  `product_image` text,
  `product_summary` text,
  `product_content` longtext,
  `product_code` varchar(50) DEFAULT NULL,
  `product_barcode` varchar(20) DEFAULT NULL,
  `price` decimal(12,2) NOT NULL,
  `reduction_price` decimal(12,2) DEFAULT NULL,
  `reduction_percent` smallint(3) DEFAULT NULL,
  `reduction_from` date DEFAULT NULL,
  `reduction_to` date DEFAULT NULL,
  `wholesale_price` decimal(12,2) DEFAULT NULL,
  `brand_id` int(11) UNSIGNED NOT NULL,
  `manufacturer_id` int(11) UNSIGNED NOT NULL,
  `supplier_id` int(11) UNSIGNED NOT NULL,
  `is_instock` enum('y','n') NOT NULL DEFAULT 'y',
  `is_new` enum('y','n') NOT NULL DEFAULT 'n',
  `is_hot` enum('y','n') NOT NULL DEFAULT 'n',
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_product`
--

TRUNCATE TABLE `main_product`;
-- --------------------------------------------------------

--
-- Table structure for table `main_product_attribute`
--

DROP TABLE IF EXISTS `main_product_attribute`;
CREATE TABLE `main_product_attribute` (
  `attr_id` int(11) UNSIGNED NOT NULL,
  `attr_name` varchar(100) NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_product_attribute`
--

TRUNCATE TABLE `main_product_attribute`;
--
-- Dumping data for table `main_product_attribute`
--

INSERT INTO `main_product_attribute` (`attr_id`, `attr_name`, `group_id`) VALUES
(1, 'Red', 1),
(2, 'Blue', 1),
(3, 'Yellow', 1),
(4, 'Black', 1),
(5, 'Wood', 2),
(6, 'Leather', 2);

-- --------------------------------------------------------

--
-- Table structure for table `main_product_attribute_group`
--

DROP TABLE IF EXISTS `main_product_attribute_group`;
CREATE TABLE `main_product_attribute_group` (
  `group_id` int(11) UNSIGNED NOT NULL,
  `group_name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_product_attribute_group`
--

TRUNCATE TABLE `main_product_attribute_group`;
--
-- Dumping data for table `main_product_attribute_group`
--

INSERT INTO `main_product_attribute_group` (`group_id`, `group_name`) VALUES
(1, 'Color'),
(2, 'Material'),
(3, 'Size');

-- --------------------------------------------------------

--
-- Table structure for table `main_product_attribute_relation`
--

DROP TABLE IF EXISTS `main_product_attribute_relation`;
CREATE TABLE `main_product_attribute_relation` (
  `parealation_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `attr_id` int(11) UNSIGNED NOT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `wholesale_price` decimal(12,2) DEFAULT NULL,
  `quantity` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_product_attribute_relation`
--

TRUNCATE TABLE `main_product_attribute_relation`;
-- --------------------------------------------------------

--
-- Table structure for table `main_product_brand`
--

DROP TABLE IF EXISTS `main_product_brand`;
CREATE TABLE `main_product_brand` (
  `brand_id` int(11) UNSIGNED NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `brand_logo` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_product_brand`
--

TRUNCATE TABLE `main_product_brand`;
--
-- Dumping data for table `main_product_brand`
--

INSERT INTO `main_product_brand` (`brand_id`, `brand_name`, `brand_logo`, `description`) VALUES
(2, 'Samsung', '/assets/uploads/rIP4wPf.jpg', 'About samsung');

-- --------------------------------------------------------

--
-- Table structure for table `main_product_catalog`
--

DROP TABLE IF EXISTS `main_product_catalog`;
CREATE TABLE `main_product_catalog` (
  `catalog_id` int(11) UNSIGNED NOT NULL,
  `catalog_name` varchar(120) NOT NULL,
  `catalog_url` varchar(120) DEFAULT NULL,
  `catalog_image` varchar(120) DEFAULT NULL,
  `description` text,
  `sort_order` int(11) UNSIGNED DEFAULT NULL,
  `parent_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_product_catalog`
--

TRUNCATE TABLE `main_product_catalog`;
--
-- Dumping data for table `main_product_catalog`
--

INSERT INTO `main_product_catalog` (`catalog_id`, `catalog_name`, `catalog_url`, `catalog_image`, `description`, `sort_order`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'electronics', '/assets/uploads/rIP4wPf.jpg', '&lt;p&gt;Electronics&lt;/p&gt;', 1, 0, '2016-06-30 14:41:53', '0000-00-00 00:00:00'),
(2, 'Mobile', 'mobile', '/assets/uploads/sid-the-sloth_160031-1920x1080.jpg', '&lt;p&gt;Mobile&lt;/p&gt;', 2, 1, '2016-06-30 14:50:41', '0000-00-00 00:00:00'),
(3, 'Cameras &amp; Photo', 'cameras-and-photo', '/assets/uploads/145IpS1.jpg', '&lt;p&gt;&lt;span&gt;Cameras &amp;amp; Photo&lt;/span&gt;&lt;/p&gt;', 3, 1, '2016-06-30 14:51:23', '2016-06-30 15:00:24'),
(5, 'Test', 'test', '/assets/uploads/Untitled-1.jpg', '&lt;p&gt;Test&lt;/p&gt;', NULL, 0, '2016-06-30 16:17:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `main_product_catalog_relation`
--

DROP TABLE IF EXISTS `main_product_catalog_relation`;
CREATE TABLE `main_product_catalog_relation` (
  `pcrelation_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `catalog_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_product_catalog_relation`
--

TRUNCATE TABLE `main_product_catalog_relation`;
-- --------------------------------------------------------

--
-- Table structure for table `main_product_combo`
--

DROP TABLE IF EXISTS `main_product_combo`;
CREATE TABLE `main_product_combo` (
  `combo_id` int(11) UNSIGNED NOT NULL,
  `combo_name` varchar(255) NOT NULL,
  `combo_thumb` varchar(255) DEFAULT NULL,
  `combo_image` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_product_combo`
--

TRUNCATE TABLE `main_product_combo`;
-- --------------------------------------------------------

--
-- Table structure for table `main_product_combo_relation`
--

DROP TABLE IF EXISTS `main_product_combo_relation`;
CREATE TABLE `main_product_combo_relation` (
  `pcorelation_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_quantity` int(11) UNSIGNED NOT NULL,
  `is_main` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_product_combo_relation`
--

TRUNCATE TABLE `main_product_combo_relation`;
-- --------------------------------------------------------

--
-- Table structure for table `main_product_manufacturer`
--

DROP TABLE IF EXISTS `main_product_manufacturer`;
CREATE TABLE `main_product_manufacturer` (
  `manufacturer_id` int(10) UNSIGNED NOT NULL,
  `manufacturer_name` varchar(255) NOT NULL,
  `manufacturer_logo` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_product_manufacturer`
--

TRUNCATE TABLE `main_product_manufacturer`;
--
-- Dumping data for table `main_product_manufacturer`
--

INSERT INTO `main_product_manufacturer` (`manufacturer_id`, `manufacturer_name`, `manufacturer_logo`, `description`) VALUES
(3, 'Sid', '/assets/uploads/sid-the-sloth_160031-1920x1080.jpg', 'Ice Age 3');

-- --------------------------------------------------------

--
-- Table structure for table `main_product_supplier`
--

DROP TABLE IF EXISTS `main_product_supplier`;
CREATE TABLE `main_product_supplier` (
  `supplier_id` int(11) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_address` varchar(500) DEFAULT NULL,
  `supplier_email` varchar(60) DEFAULT NULL,
  `supplier_phone` varchar(20) DEFAULT NULL,
  `supplier_logo` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_product_supplier`
--

TRUNCATE TABLE `main_product_supplier`;
--
-- Dumping data for table `main_product_supplier`
--

INSERT INTO `main_product_supplier` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_email`, `supplier_phone`, `supplier_logo`, `description`) VALUES
(1, 'John Carret', 'USA', 'johncarret@gmail.com', '0987654321', '/assets/uploads/145IpS1.jpg', 'About me');

-- --------------------------------------------------------

--
-- Table structure for table `main_product_tag`
--

DROP TABLE IF EXISTS `main_product_tag`;
CREATE TABLE `main_product_tag` (
  `tag_id` int(11) NOT NULL,
  `tag_title` varchar(100) NOT NULL,
  `tag_url` varchar(100) NOT NULL,
  `is_show` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_product_tag`
--

TRUNCATE TABLE `main_product_tag`;
--
-- Dumping data for table `main_product_tag`
--

INSERT INTO `main_product_tag` (`tag_id`, `tag_title`, `tag_url`, `is_show`) VALUES
(1, 'laptop asus', 'laptop-asus', 'y'),
(2, 'laptop acer', 'laptop-acer', 'n'),
(3, 'laptop hp', 'laptop-hp', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `main_tag`
--

DROP TABLE IF EXISTS `main_tag`;
CREATE TABLE `main_tag` (
  `tag_id` int(11) NOT NULL,
  `tag_title` varchar(100) NOT NULL,
  `tag_url` varchar(100) NOT NULL,
  `is_show` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_tag`
--

TRUNCATE TABLE `main_tag`;
--
-- Dumping data for table `main_tag`
--

INSERT INTO `main_tag` (`tag_id`, `tag_title`, `tag_url`, `is_show`) VALUES
(1, 'PHP basic', 'php-basic', 'y'),
(2, 'PHP advance', 'php-advance', 'n'),
(3, 'Javascript', 'javascript', 'y'),
(4, 'JQuery Ui', 'jquery-ui', 'n'),
(5, 'Đại Ca !@', 'dai-ca-', 'y'),
(6, 'Lập Trình Viên   -!_', 'lap-trinh-vien', 'y'),
(7, 'Học PHP', 'hoc-php', 'y'),
(8, 'Laravel', 'laravel', 'y'),
(9, 'html', 'html', 'y'),
(10, 'Don&#039;t', 'dont', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `main_user`
--

DROP TABLE IF EXISTS `main_user`;
CREATE TABLE `main_user` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(32) NOT NULL,
  `full_name` varchar(30) DEFAULT NULL,
  `avatar` varchar(300) DEFAULT NULL,
  `join_date` datetime NOT NULL,
  `last_active` datetime DEFAULT NULL,
  `token` varchar(32) NOT NULL,
  `bio` text,
  `group_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(2) NOT NULL COMMENT '0:Inactived, 1:Actived, 2:Locked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_user`
--

TRUNCATE TABLE `main_user`;
--
-- Dumping data for table `main_user`
--

INSERT INTO `main_user` (`user_id`, `user_email`, `user_pass`, `full_name`, `avatar`, `join_date`, `last_active`, `token`, `bio`, `group_id`, `status`) VALUES
(1, 'quochoangvp@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Trịnh Quốc Hoàng', '/assets/uploads/sT92TlS.jpg', '2016-05-30 10:15:00', '2016-03-03 14:25:00', '8d6239c01e6e481b961046493ea51ff7', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1),
(2, 'admin@localhost.com', '123456', 'Admin 1', '/assets/uploads/images/6gedge.jpg', '2016-06-06 22:55:25', '2016-06-06 22:55:25', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1),
(3, 'admin@localhost.vm', 'd41d8cd98f00b204e9800998ecf8427e', 'Admin 2', '/assets/uploads/images/SIdSloth2.jpg', '2016-06-06 22:55:58', '2016-06-06 22:55:58', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `main_usergroup`
--

DROP TABLE IF EXISTS `main_usergroup`;
CREATE TABLE `main_usergroup` (
  `group_id` int(11) UNSIGNED NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `permission` text NOT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL COMMENT '0: Inactived, 1: Actived'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_usergroup`
--

TRUNCATE TABLE `main_usergroup`;
--
-- Dumping data for table `main_usergroup`
--

INSERT INTO `main_usergroup` (`group_id`, `group_name`, `permission`, `status`) VALUES
(1, 'Administrator', '{"can_view_admincp":"yes","can_view_usercp":"yes","can_view_homepage":"yes","can_view_post":"yes","can_insert_comment":"yes","can_manage_post":"yes","can_addnew_post":"yes","can_edit_post":"yes","can_remove_post":"yes","can_manage_link":"yes","can_addnew_link":"yes","can_edit_link":"yes","can_remove_link":"yes","can_addnew_category":"yes","can_edit_category":"yes","can_remove_category":"yes","can_addnew_redirect":"yes","can_edit_redirect":"yes","can_remove_redirect":"yes","can_manage_contactus":"yes","can_remove_contactus":"yes","can_addnew_page":"yes","can_edit_page":"yes","can_remove_page":"yes","can_addnew_user":"yes","can_edit_user":"yes","can_remove_user":"yes","can_edit_user_group":"yes","can_addnew_usergroup":"yes","can_edit_usergroup":"yes","can_remove_usergroup":"yes","can_setting_system":"yes","can_manage_plugins":"yes","can_manage_themes":"yes","can_activate_theme":"yes","can_edit_theme":"yes","can_setting_theme":"yes","can_control_theme":"yes","can_import_theme":"yes","can_install_plugin":"yes","can_run_plugin":"yes","can_setting_plugin":"yes","can_uninstall_plugin":"yes","can_activate_plugin":"yes","can_deactivate_plugin":"yes","can_import_plugin":"yes","can_manage_category":"yes","can_manage_user":"yes","can_manage_usergroup":"yes","can_remove_owner_post":"yes","default_new_post_status":"1","show_category_manager":"yes","show_post_manager":"yes","show_comment_manager":"yes","show_page_manager":"yes","show_link_manager":"yes","show_user_manager":"yes","show_usergroup_manager":"yes","show_contact_manager":"yes","show_theme_manager":"yes","show_plugin_manager":"yes","show_setting_manager":"yes","show_all_post":"yes","can_remove_all_post":"yes","can_change_password":"yes","can_change_profile":"yes","can_setting_mail":"yes","can_update_system":"yes","can_clear_cache":"yes","default_free_point_eachday":"0","can_control_plugin":"yes"}', 1),
(2, 'Member', '{"can_view_admincp":"yes","can_view_usercp":"yes","can_view_homepage":"yes","can_view_post":"yes","can_insert_comment":"yes","can_manage_post":"no","can_addnew_post":"yes","can_edit_post":"yes","can_remove_post":"yes","can_manage_link":"no","can_addnew_link":"no","can_edit_link":"no","can_remove_link":"no","can_addnew_category":"no","can_edit_category":"no","can_remove_category":"no","can_addnew_redirect":"no","can_edit_redirect":"no","can_remove_redirect":"no","can_manage_contactus":"no","can_remove_contactus":"no","can_addnew_page":"no","can_edit_page":"no","can_remove_page":"no","can_addnew_user":"no","can_edit_user":"no","can_remove_user":"no","can_edit_user_group":"no","can_addnew_usergroup":"no","can_edit_usergroup":"no","can_remove_usergroup":"no","can_setting_system":"no","can_manage_plugins":"no","can_manage_themes":"no","can_activate_theme":"no","can_import_theme":"no","can_edit_theme":"no","can_setting_theme":"no","can_control_theme":"no","can_install_plugin":"no","can_run_plugin":"yes","can_setting_plugin":"yes","can_uninstall_plugin":"no","can_activate_plugin":"no","can_deactivate_plugin":"no","can_import_plugin":"no","can_manage_category":"no","can_manage_user":"no","can_manage_usergroup":"no","can_login_to_admincp":"yes","can_login_to_usercp":"yes","can_remove_owner_post":"yes","default_new_post_status":"0","show_category_manager":"no","show_post_manager":"no","show_comment_manager":"no","show_page_manager":"no","show_link_manager":"no","show_user_manager":"no","show_usergroup_manager":"no","show_contact_manager":"no","show_theme_manager":"no","show_plugin_manager":"no","show_setting_manager":"no","show_all_post":"no","can_remove_all_post":"no","default_free_point_eachday":"0","can_change_profile":"yes","can_control_plugin":"yes"}', 1),
(3, 'Banned Member', '{"can_view_admincp":"no","can_view_usercp":"no","can_view_homepage":"yes","can_view_post":"yes","can_insert_comment":"no","can_manage_post":"no","can_addnew_post":"no","can_edit_post":"no","can_remove_post":"no","can_manage_link":"no","can_addnew_link":"no","can_edit_link":"no","can_remove_link":"no","can_addnew_category":"no","can_edit_category":"no","can_remove_category":"no","can_addnew_redirect":"no","can_edit_redirect":"no","can_remove_redirect":"no","can_manage_contactus":"no","can_remove_contactus":"no","can_addnew_page":"no","can_edit_page":"no","can_remove_page":"no","can_addnew_user":"no","can_edit_user":"no","can_remove_user":"no","can_edit_user_group":"no","can_addnew_usergroup":"no","can_edit_usergroup":"no","can_remove_usergroup":"no","can_setting_system":"no","can_manage_plugins":"no","can_manage_themes":"no","can_import_theme":"no","can_manage_category":"no","can_manage_user":"no","can_manage_usergroup":"no","can_login_to_admincp":"no","can_login_to_usercp":"no","can_remove_owner_post":"no","default_new_post_status":"0","show_category_manager":"no","show_post_manager":"no","show_comment_manager":"no","show_page_manager":"no","show_link_manager":"no","show_user_manager":"no","show_usergroup_manager":"no","show_contact_manager":"no","show_theme_manager":"no","show_plugin_manager":"no","show_setting_manager":"no","show_all_post":"no","default_free_point_eachday":"0","can_activate_plugin":"no","can_uninstall_plugin":"no","can_deactivate_plugin":"no","can_install_plugin":"no","can_import_plugin":"no","can_change_profile":"yes","can_control_plugin":"yes"}', 1),
(4, 'Plugins & Theme Manager', '{"can_activate_theme":"no","can_edit_theme":"no","can_setting_theme":"no","can_control_theme":"no","can_install_plugin":"no","can_run_plugin":"no","can_setting_plugin":"no","can_uninstall_plugin":"no","can_activate_plugin":"no","can_deactivate_plugin":"no","can_import_plugin":"no","can_manage_link":"no","default_free_point_eachday":"0","can_manage_post":"no","can_addnew_category":"no","can_addnew_redirect":"no","can_manage_contactus":"no","can_addnew_page":"no","can_addnew_user":"no","can_addnew_usergroup":"no","can_edit_usergroup":"no","can_setting_system":"no","can_manage_plugins":"no","can_manage_themes":"no","can_import_theme":"no","can_manage_category":"no","can_manage_user":"no","can_manage_usergroup":"no","show_category_manager":"no","show_post_manager":"no","show_comment_manager":"no","show_page_manager":"no","show_link_manager":"no","show_user_manager":"no","show_usergroup_manager":"no","show_contact_manager":"no","show_theme_manager":"no","show_plugin_manager":"no","show_setting_manager":"no","can_change_profile":"yes","can_control_plugin":"yes"}', 1),
(5, 'Pending Member', '{"can_view_admincp":"no","can_view_usercp":"no","can_view_homepage":"yes","can_view_post":"yes","can_insert_comment":"no","can_manage_post":"no","can_addnew_post":"no","can_edit_post":"no","can_remove_post":"no","can_manage_link":"no","can_addnew_link":"no","can_edit_link":"no","can_remove_link":"no","can_addnew_category":"no","can_edit_category":"no","can_remove_category":"no","can_addnew_redirect":"no","can_edit_redirect":"no","can_remove_redirect":"no","can_manage_contactus":"no","can_remove_contactus":"no","can_addnew_page":"no","can_edit_page":"no","can_remove_page":"no","can_addnew_user":"no","can_edit_user":"no","can_remove_user":"no","can_edit_user_group":"no","can_addnew_usergroup":"no","can_edit_usergroup":"no","can_remove_usergroup":"no","can_setting_system":"no","can_manage_plugins":"no","can_manage_themes":"no","can_activate_theme":"no","can_edit_theme":"no","can_setting_theme":"no","can_control_theme":"no","can_install_plugin":"no","can_run_plugin":"no","can_setting_plugin":"no","can_uninstall_plugin":"no","can_activate_plugin":"no","can_deactivate_plugin":"no","can_import_plugin":"no","can_manage_category":"no","can_manage_user":"no","can_manage_usergroup":"no","can_login_to_admincp":"no","can_login_to_usercp":"no","can_remove_owner_post":"no","default_new_post_status":"0","show_category_manager":"no","show_post_manager":"no","show_comment_manager":"no","show_page_manager":"no","show_link_manager":"no","show_user_manager":"no","show_usergroup_manager":"no","show_contact_manager":"no","show_theme_manager":"no","show_plugin_manager":"no","show_setting_manager":"no","default_free_point_eachday":"0","can_import_theme":"no","can_change_profile":"yes","can_control_plugin":"yes"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `main_widget`
--

DROP TABLE IF EXISTS `main_widget`;
CREATE TABLE `main_widget` (
  `widget_id` int(11) UNSIGNED NOT NULL,
  `widget_name` varchar(100) NOT NULL,
  `widget_title` varchar(100) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `position` int(5) UNSIGNED NOT NULL DEFAULT '1',
  `is_active` enum('y','n') NOT NULL DEFAULT 'n',
  `content` text,
  `position_name` varchar(255) NOT NULL,
  `config` text,
  `layout` varchar(30) NOT NULL,
  `theme` varchar(30) NOT NULL,
  `is_static_content` enum('y','n') NOT NULL DEFAULT 'n',
  `type_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_widget`
--

TRUNCATE TABLE `main_widget`;
-- --------------------------------------------------------

--
-- Table structure for table `main_widgettype`
--

DROP TABLE IF EXISTS `main_widgettype`;
CREATE TABLE `main_widgettype` (
  `type_id` int(11) UNSIGNED NOT NULL,
  `type_name` varchar(60) NOT NULL,
  `type_title` varchar(125) NOT NULL,
  `config` text,
  `is_active` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `main_widgettype`
--

TRUNCATE TABLE `main_widgettype`;
--
-- Dumping data for table `main_widgettype`
--

INSERT INTO `main_widgettype` (`type_id`, `type_name`, `type_title`, `config`, `is_active`) VALUES
(1, 'support', 'Support', NULL, 'y'),
(2, 'nav', 'Navigation', NULL, 'y'),
(3, 'article', 'Article', NULL, 'y'),
(4, 'ultilities', 'Ultilities', NULL, 'y'),
(5, 'product', 'Product', NULL, 'y'),
(6, 'html', 'Html', NULL, 'y'),
(7, 'media', 'Media', NULL, 'y'),
(8, 'menu', 'Menu', NULL, 'y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main_admin_menu`
--
ALTER TABLE `main_admin_menu`
  ADD PRIMARY KEY (`amenu_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `main_article`
--
ALTER TABLE `main_article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `main_article_category`
--
ALTER TABLE `main_article_category`
  ADD PRIMARY KEY (`acate_id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `main_article_tag`
--
ALTER TABLE `main_article_tag`
  ADD PRIMARY KEY (`atag_id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `main_category`
--
ALTER TABLE `main_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `main_config`
--
ALTER TABLE `main_config`
  ADD PRIMARY KEY (`config_id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `domain_id` (`domain_id`);

--
-- Indexes for table `main_domain`
--
ALTER TABLE `main_domain`
  ADD PRIMARY KEY (`domain_id`);

--
-- Indexes for table `main_gallery`
--
ALTER TABLE `main_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `main_language`
--
ALTER TABLE `main_language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `main_link`
--
ALTER TABLE `main_link`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `main_media`
--
ALTER TABLE `main_media`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `widget_id` (`widget_id`),
  ADD KEY `gallary_id` (`gallery_id`);

--
-- Indexes for table `main_module`
--
ALTER TABLE `main_module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `main_modulemeta`
--
ALTER TABLE `main_modulemeta`
  ADD PRIMARY KEY (`mdmeta_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `main_product`
--
ALTER TABLE `main_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `main_product_attribute`
--
ALTER TABLE `main_product_attribute`
  ADD PRIMARY KEY (`attr_id`),
  ADD KEY `attr_id` (`group_id`);

--
-- Indexes for table `main_product_attribute_group`
--
ALTER TABLE `main_product_attribute_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `main_product_attribute_relation`
--
ALTER TABLE `main_product_attribute_relation`
  ADD PRIMARY KEY (`parealation_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `value_id` (`attr_id`);

--
-- Indexes for table `main_product_brand`
--
ALTER TABLE `main_product_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `main_product_catalog`
--
ALTER TABLE `main_product_catalog`
  ADD PRIMARY KEY (`catalog_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `main_product_catalog_relation`
--
ALTER TABLE `main_product_catalog_relation`
  ADD PRIMARY KEY (`pcrelation_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `catalog_id` (`catalog_id`);

--
-- Indexes for table `main_product_combo`
--
ALTER TABLE `main_product_combo`
  ADD PRIMARY KEY (`combo_id`);

--
-- Indexes for table `main_product_combo_relation`
--
ALTER TABLE `main_product_combo_relation`
  ADD PRIMARY KEY (`pcorelation_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `main_product_manufacturer`
--
ALTER TABLE `main_product_manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `main_product_supplier`
--
ALTER TABLE `main_product_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `main_product_tag`
--
ALTER TABLE `main_product_tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `main_tag`
--
ALTER TABLE `main_tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `main_user`
--
ALTER TABLE `main_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `main_usergroup`
--
ALTER TABLE `main_usergroup`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `main_widget`
--
ALTER TABLE `main_widget`
  ADD PRIMARY KEY (`widget_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `main_widgettype`
--
ALTER TABLE `main_widgettype`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main_admin_menu`
--
ALTER TABLE `main_admin_menu`
  MODIFY `amenu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `main_article`
--
ALTER TABLE `main_article`
  MODIFY `article_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `main_article_category`
--
ALTER TABLE `main_article_category`
  MODIFY `acate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `main_article_tag`
--
ALTER TABLE `main_article_tag`
  MODIFY `atag_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `main_category`
--
ALTER TABLE `main_category`
  MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `main_config`
--
ALTER TABLE `main_config`
  MODIFY `config_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `main_domain`
--
ALTER TABLE `main_domain`
  MODIFY `domain_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `main_gallery`
--
ALTER TABLE `main_gallery`
  MODIFY `gallery_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `main_language`
--
ALTER TABLE `main_language`
  MODIFY `language_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `main_link`
--
ALTER TABLE `main_link`
  MODIFY `link_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `main_media`
--
ALTER TABLE `main_media`
  MODIFY `media_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `main_module`
--
ALTER TABLE `main_module`
  MODIFY `module_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `main_modulemeta`
--
ALTER TABLE `main_modulemeta`
  MODIFY `mdmeta_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `main_product`
--
ALTER TABLE `main_product`
  MODIFY `product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `main_product_attribute`
--
ALTER TABLE `main_product_attribute`
  MODIFY `attr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `main_product_attribute_group`
--
ALTER TABLE `main_product_attribute_group`
  MODIFY `group_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `main_product_attribute_relation`
--
ALTER TABLE `main_product_attribute_relation`
  MODIFY `parealation_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `main_product_brand`
--
ALTER TABLE `main_product_brand`
  MODIFY `brand_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `main_product_catalog`
--
ALTER TABLE `main_product_catalog`
  MODIFY `catalog_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `main_product_catalog_relation`
--
ALTER TABLE `main_product_catalog_relation`
  MODIFY `pcrelation_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `main_product_combo`
--
ALTER TABLE `main_product_combo`
  MODIFY `combo_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `main_product_combo_relation`
--
ALTER TABLE `main_product_combo_relation`
  MODIFY `pcorelation_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `main_product_manufacturer`
--
ALTER TABLE `main_product_manufacturer`
  MODIFY `manufacturer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `main_product_supplier`
--
ALTER TABLE `main_product_supplier`
  MODIFY `supplier_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `main_product_tag`
--
ALTER TABLE `main_product_tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `main_tag`
--
ALTER TABLE `main_tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `main_user`
--
ALTER TABLE `main_user`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `main_usergroup`
--
ALTER TABLE `main_usergroup`
  MODIFY `group_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `main_widget`
--
ALTER TABLE `main_widget`
  MODIFY `widget_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `main_widgettype`
--
ALTER TABLE `main_widgettype`
  MODIFY `type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
