-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 12:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `security`
--

-- --------------------------------------------------------

--
-- Table structure for table `bcategories`
--

CREATE TABLE `bcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `serial_number` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `block_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `block_name`, `title`, `subtitle`, `description`, `image`, `icon`, `page_id`, `created_at`, `updated_at`) VALUES
(2, 'test', 'What Sets Our Web Development Apart', 'Smart Solutions Built for Performance and Growth', '<p>\r\n<h3 data-start=\"469\" data-end=\"500\"></h3></p><p data-start=\"225\" data-end=\"467\">We focus on building websites that not only look great but also function seamlessly across all devices. Our development process ensures high performance, clean code, and user-focused design — giving your business the digital edge it deserves.</p>', 'assets/admin/uploads/block/thumb/1748860875682398561.jpg', NULL, 3, '2025-06-02 09:41:15', '2025-06-02 09:41:15'),
(3, 'test', 'What’s Included in Our SEO Services', 'Comprehensive Solutions to Boost Your Search Rankings', '<p>\r\nOur SEO services cover every critical aspect needed to improve your website’s visibility and performance in search engines. We start with a thorough analysis of your current standings and competition, then implement customized on-page optimizations, technical fixes, local SEO enhancements, and authoritative link-building strategies. By combining these elements, we ensure your website not only ranks higher but also attracts the right audience — increasing traffic, engagement, and conversions over the long term.</p>', 'assets/admin/uploads/block/thumb/17488625461879581339.png', NULL, 4, '2025-06-02 10:09:06', '2025-06-02 10:09:06'),
(4, 'test', 'Smart Email Marketing That Works', 'Built to Engage, Designed to Convert', '<p>\r\n<h3 data-start=\"527\" data-end=\"558\"></h3></p><p data-start=\"214\" data-end=\"525\">Our email marketing solutions are designed with strategy, creativity, and performance in mind. We help you craft messages that not only reach inboxes but also inspire action. From personalized content to automation and analytics, we bring you a complete package to grow your business through the power of email.</p>', 'assets/admin/uploads/block/thumb/17488638671394476591.webp', NULL, 6, '2025-06-02 10:31:07', '2025-06-02 10:31:07'),
(5, 'test', 'What’s Included in Our Digital Marketing Services', 'Integrated Solutions for Every Business Type', '<p>&nbsp;We provide a full suite of digital marketing services designed to help your business thrive in today’s fast-paced digital landscape. Whether you\'re a startup looking to establish a strong online presence or an established brand aiming to expand your reach, our solutions are tailored to meet your goals. From crafting engaging social media campaigns and targeted advertising to content creation, search engine visibility, and in-depth performance analytics — we offer everything you need to attract, convert, and retain customers across all major digital platforms. With us, your brand doesn’t just get noticed — it gets results.</p>', 'assets/admin/uploads/block/thumb/17488642521285395892.png', NULL, 5, '2025-06-02 10:37:32', '2025-06-02 10:37:32'),
(6, 'test', 'Direct Messaging That Delivers Results', 'Engage Your Audience Instantly with SMS', '<p>\r\n<h3 data-start=\"641\" data-end=\"672\"></h3></p><p data-start=\"221\" data-end=\"639\">Our SMS marketing services are designed to help your business connect with customers in the most immediate and effective way. Whether you’re launching a new product, sending reminders, or running limited-time promotions, we ensure your message gets delivered and read — fast. With real-time delivery, personalization, and detailed tracking, SMS is a smart, affordable tool to keep your audience engaged and responsive.</p>', 'assets/admin/uploads/block/thumb/1748865539752863798.jpg', NULL, 8, '2025-06-02 10:58:59', '2025-06-02 10:58:59'),
(7, 'test', 'What’s Included in Our WhatsApp Marketing Services', 'Everything You Need to Run Smart & Compliant Campaigns', '<p>&nbsp;Our WhatsApp Marketing solutions are designed to keep your customers engaged, informed, and coming back for more. We combine creativity, automation, and compliance to help you run impactful campaigns that build strong customer relationships and drive repeat business.</p>', 'assets/admin/uploads/block/thumb/1748865846847721653.png', NULL, 7, '2025-06-02 11:04:06', '2025-06-02 11:04:06'),
(8, 'test', 'What We Do', 'Delivering End-to-End Digital Solutions That Drive Success', '<p>\r\n<h3 data-start=\"619\" data-end=\"657\"></h3></p><p data-start=\"210\" data-end=\"617\">At our core, we specialize in helping businesses grow through smart, scalable, and impactful digital services. From crafting modern websites to executing targeted marketing campaigns, our solutions are designed to connect you with your audience, boost engagement, and accelerate results. We blend creativity, strategy, and technology to deliver everything your business needs to thrive in the digital space.</p>', 'assets/admin/uploads/block/thumb/1748947399207726318.webp', NULL, 2, '2025-06-03 09:43:19', '2025-06-03 09:43:19'),
(9, 'test', 'd', NULL, NULL, NULL, NULL, 9, '2025-07-06 22:55:12', '2025-07-06 22:55:12'),
(10, 'test', 'Title', 'Subtitle', '<p>Description</p>', 'assets/admin/uploads/block/thumb/1751860586928925508.png', 'assets/admin/uploads/block/icons/17518605861320308888.png', 9, '2025-07-06 22:56:26', '2025-07-06 22:56:26'),
(11, 'test', 'Title 2', 'Subtitne 2', '<p>Description</p>', 'assets/admin/uploads/block/thumb/1751860812294972733.png', 'assets/admin/uploads/block/icons/1751860812485094227.png', 9, '2025-07-06 23:00:12', '2025-07-06 23:00:12'),
(12, 'test', 'Title', 'Subtitle', NULL, 'assets/admin/uploads/block/thumb/1751861051872450595.png', 'assets/admin/uploads/block/icons/1751861051783515277.png', 9, '2025-07-06 23:04:11', '2025-07-06 23:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `block_features`
--

CREATE TABLE `block_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `block_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `order_no` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `block_features`
--

INSERT INTO `block_features` (`id`, `block_id`, `title`, `order_no`, `created_at`, `updated_at`) VALUES
(13, 2, 'Responsive Design', 0, '2025-06-02 09:41:48', '2025-06-02 09:41:48'),
(14, 2, 'Custom Development', 0, '2025-06-02 09:41:48', '2025-06-02 09:41:48'),
(15, 2, 'SEO-Friendly Structure', 0, '2025-06-02 09:41:48', '2025-06-02 09:41:48'),
(16, 2, 'Fast Loading Speed', 0, '2025-06-02 09:41:48', '2025-06-02 09:41:48'),
(21, 3, 'On-Page SEO', 0, '2025-06-02 10:09:53', '2025-06-02 10:09:53'),
(22, 3, 'Technical SEO', 0, '2025-06-02 10:09:53', '2025-06-02 10:09:53'),
(23, 3, 'Local SEO', 0, '2025-06-02 10:09:53', '2025-06-02 10:09:53'),
(24, 3, 'Link Building', 0, '2025-06-02 10:09:53', '2025-06-02 10:09:53'),
(25, 4, '', 0, '2025-06-02 10:31:07', '2025-06-02 10:31:07'),
(26, 4, '', 0, '2025-06-02 10:31:07', '2025-06-02 10:31:07'),
(27, 4, '', 0, '2025-06-02 10:31:07', '2025-06-02 10:31:07'),
(28, 4, '', 0, '2025-06-02 10:31:07', '2025-06-02 10:31:07'),
(33, 5, 'Social Media Marketing', 0, '2025-06-02 10:38:11', '2025-06-02 10:38:11'),
(34, 5, 'Search Engine Marketing (SEM)', 0, '2025-06-02 10:38:11', '2025-06-02 10:38:11'),
(35, 5, 'Content Marketing', 0, '2025-06-02 10:38:11', '2025-06-02 10:38:11'),
(36, 5, 'Analytics & Reporting', 0, '2025-06-02 10:38:11', '2025-06-02 10:38:11'),
(45, 7, 'Bulk Messaging', 0, '2025-06-02 11:11:17', '2025-06-02 11:11:17'),
(46, 7, 'Automated Replies', 0, '2025-06-02 11:11:17', '2025-06-02 11:11:17'),
(47, 7, 'Interactive Campaigns', 0, '2025-06-02 11:11:17', '2025-06-02 11:11:17'),
(48, 7, 'List Management & Segmentation', 0, '2025-06-02 11:11:17', '2025-06-02 11:11:17'),
(49, 6, 'Bulk SMS Campaigns', 0, '2025-06-03 07:05:34', '2025-06-03 07:05:34'),
(50, 6, 'Scheduled Messaging', 0, '2025-06-03 07:05:34', '2025-06-03 07:05:34'),
(51, 6, 'Personalized Texts', 0, '2025-06-03 07:05:34', '2025-06-03 07:05:34'),
(52, 6, 'Delivery Reports & Analytics', 0, '2025-06-03 07:05:34', '2025-06-03 07:05:34'),
(65, 8, 'Web Development', 0, '2025-06-03 09:45:08', '2025-06-03 09:45:08'),
(66, 8, 'Digital Marketing', 0, '2025-06-03 09:45:08', '2025-06-03 09:45:08'),
(67, 8, 'Email Marketing', 0, '2025-06-03 09:45:08', '2025-06-03 09:45:08'),
(68, 8, 'WhatsApp Marketing', 0, '2025-06-03 09:45:08', '2025-06-03 09:45:08'),
(70, 10, 'Feature TItle', 0, '2025-07-06 22:59:38', '2025-07-06 22:59:38'),
(71, 11, '', 0, '2025-07-06 23:00:12', '2025-07-06 23:00:12'),
(74, 12, 'Feature TItle2', 1, '2025-07-06 23:05:20', '2025-07-06 23:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bcategory_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.translation-loader..en', 'a:0:{}', 2065160076),
('spatie.translation-loader.(and :count more error).en', 'a:0:{}', 2067162650),
('spatie.translation-loader.(and :count more errors).en', 'a:0:{}', 2067162584),
('spatie.translation-loader.*.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.#.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.about us.en', 'a:0:{}', 2064293963),
('spatie.translation-loader.Action.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Actions.en', 'a:0:{}', 2064293975),
('spatie.translation-loader.Active.en', 'a:0:{}', 2064295524),
('spatie.translation-loader.Add Enquiry.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Add FAQ.en', 'a:0:{}', 2064295947),
('spatie.translation-loader.Add Gallery Category.en', 'a:0:{}', 2067168098),
('spatie.translation-loader.Add Hero Section.en', 'a:0:{}', 2067228284),
('spatie.translation-loader.Add New Client.en', 'a:0:{}', 2064292465),
('spatie.translation-loader.Add New Enquiry.en', 'a:0:{}', 2065160076),
('spatie.translation-loader.Add New Gallery.en', 'a:0:{}', 2064304984),
('spatie.translation-loader.Add New Services.en', 'a:0:{}', 2064319457),
('spatie.translation-loader.Add New Slide.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Add New Template File.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Add New Testimonial.en', 'a:0:{}', 2064293975),
('spatie.translation-loader.Add New User .en', 'a:0:{}', 2067165402),
('spatie.translation-loader.Add New User.en', 'a:0:{}', 2067165437),
('spatie.translation-loader.Add Package.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Add Page.en', 'a:0:{}', 2064293963),
('spatie.translation-loader.Add Partner.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Add Section.en', 'a:0:{}', 2064305458),
('spatie.translation-loader.Add Service Category.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Add Service.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Add Slide.en', 'a:0:{}', 2066980521),
('spatie.translation-loader.Add Slider.en', 'a:0:{}', 2066981257),
('spatie.translation-loader.add.en', 'a:0:{}', 2067228714),
('spatie.translation-loader.Address.en', 'a:0:{}', 2064317115),
('spatie.translation-loader.Admin.en', 'a:0:{}', 2067165437),
('spatie.translation-loader.All Enquiries.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.All Gallery Categories.en', 'a:0:{}', 2067168088),
('spatie.translation-loader.All Packages.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.All Pages.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.All Partners.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.All Service Category.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.All Services.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.All Users.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Answer .en', 'a:0:{}', 2067226427),
('spatie.translation-loader.Answer.en', 'a:0:{}', 2064295998),
('spatie.translation-loader.Approved Users.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Approved.en', 'a:0:{}', 2067165437),
('spatie.translation-loader.auth.en', 'a:0:{}', 2065161426),
('spatie.translation-loader.Back.en', 'a:0:{}', 2064292465),
('spatie.translation-loader.Block Edit.en', 'a:0:{}', 2064297917),
('spatie.translation-loader.Blocked Users.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Blocked.en', 'a:0:{}', 2067165437),
('spatie.translation-loader.Blog.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Blogs.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Breadcrumb.en', 'a:0:{}', 2064317115),
('spatie.translation-loader.Bulk Delete.en', 'a:0:{}', 2064304982),
('spatie.translation-loader.Button Link.en', 'a:0:{}', 2067224136),
('spatie.translation-loader.Button Text.en', 'a:0:{}', 2067224136),
('spatie.translation-loader.Button Title.en', 'a:0:{}', 2069309688),
('spatie.translation-loader.Button URL.en', 'a:0:{}', 2069309688),
('spatie.translation-loader.Call To Action Add.en', 'a:0:{}', 2067224136),
('spatie.translation-loader.Call To Action List.en', 'a:0:{}', 2064297824),
('spatie.translation-loader.CallToAction Edit.en', 'a:0:{}', 2067224162),
('spatie.translation-loader.Categories.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Category.en', 'a:0:{}', 2064304982),
('spatie.translation-loader.Change Password.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Choose Image.en', 'a:0:{}', 2064304984),
('spatie.translation-loader.Choose New Icon.en', 'a:0:{}', 2064297917),
('spatie.translation-loader.Choose New Image.en', 'a:0:{}', 2064292465),
('spatie.translation-loader.Client List.en', 'a:0:{}', 2064292490),
('spatie.translation-loader.Client Section.en', 'a:0:{}', 2064292465),
('spatie.translation-loader.Client.en', 'a:0:{}', 2064292490),
('spatie.translation-loader.Dashboard.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Delete.en', 'a:0:{}', 2064292490),
('spatie.translation-loader.Description.en', 'a:0:{}', 2064297917),
('spatie.translation-loader.Designation.en', 'a:0:{}', 2064295524),
('spatie.translation-loader.Digital Marketing.en', 'a:0:{}', 2064293963),
('spatie.translation-loader.Document Required Add.en', 'a:0:{}', 2067227234),
('spatie.translation-loader.Document Required Edit.en', 'a:0:{}', 2067227391),
('spatie.translation-loader.Document Required List.en', 'a:0:{}', 2067226846),
('spatie.translation-loader.Download.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Edit Client.en', 'a:0:{}', 2064293004),
('spatie.translation-loader.Edit Enquiry.en', 'a:0:{}', 2065160082),
('spatie.translation-loader.Edit Gallery Category.en', 'a:0:{}', 2067170226),
('spatie.translation-loader.Edit Gallery.en', 'a:0:{}', 2067181648),
('spatie.translation-loader.Edit Hero Section.en', 'a:0:{}', 2067228579),
('spatie.translation-loader.Edit Profile.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Edit Slider.en', 'a:0:{}', 2067162940),
('spatie.translation-loader.Edit Testimonial.en', 'a:0:{}', 2064298040),
('spatie.translation-loader.Edit User.en', 'a:0:{}', 2067167765),
('spatie.translation-loader.Edit.en', 'a:0:{}', 2064292490),
('spatie.translation-loader.Element Add.en', 'a:0:{}', 2067219600),
('spatie.translation-loader.Element Edit.en', 'a:0:{}', 2067220270),
('spatie.translation-loader.Email Marketing.en', 'a:0:{}', 2064293963),
('spatie.translation-loader.Email.en', 'a:0:{}', 2064297894),
('spatie.translation-loader.Enquiries.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Enquiry Message.en', 'a:0:{}', 2065160082),
('spatie.translation-loader.Enquiry.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Enter Email.en', 'a:0:{}', 2065160082),
('spatie.translation-loader.Enter Enquiry Message.en', 'a:0:{}', 2065160082),
('spatie.translation-loader.Enter Name.en', 'a:0:{}', 2065160082),
('spatie.translation-loader.Enter Phone Number.en', 'a:0:{}', 2065160082),
('spatie.translation-loader.Enter Remarks.en', 'a:0:{}', 2065160082),
('spatie.translation-loader.Enter Subject.en', 'a:0:{}', 2065160082),
('spatie.translation-loader.FAQ Add.en', 'a:0:{}', 2064295998),
('spatie.translation-loader.FAQ Edit.en', 'a:0:{}', 2067226427),
('spatie.translation-loader.FAQs.en', 'a:0:{}', 2064295947),
('spatie.translation-loader.Favicon.en', 'a:0:{}', 2064317115),
('spatie.translation-loader.Feature Image Add.en', 'a:0:{}', 2067228718),
('spatie.translation-loader.Feature Items List.en', 'a:0:{}', 2067228676),
('spatie.translation-loader.Features.en', 'a:0:{}', 2064297917),
('spatie.translation-loader.Feedback.en', 'a:0:{}', 2064295524),
('spatie.translation-loader.Follow-up Date.en', 'a:0:{}', 2065160082),
('spatie.translation-loader.Followup Type.en', 'a:0:{}', 2065160076),
('spatie.translation-loader.Footer Logo.en', 'a:0:{}', 2064317115),
('spatie.translation-loader.Forgot your password?.en', 'a:0:{}', 2064297894),
('spatie.translation-loader.Galleries.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Gallery Category List.en', 'a:0:{}', 2067167909),
('spatie.translation-loader.Gallery Category.en', 'a:0:{}', 2067167909),
('spatie.translation-loader.Gallery List:.en', 'a:0:{}', 2064304982),
('spatie.translation-loader.Gallery.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Hero Section List.en', 'a:0:{}', 2067227861),
('spatie.translation-loader.Home Page.en', 'a:0:{}', 2064293963),
('spatie.translation-loader.Home.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Icon.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Id.en', 'a:0:{}', 2064293975),
('spatie.translation-loader.Image.en', 'a:0:{}', 2064292465),
('spatie.translation-loader.Inactive.en', 'a:0:{}', 2064295524),
('spatie.translation-loader.Introduction Section Add.en', 'a:0:{}', 2067221170),
('spatie.translation-loader.Introduction Section Edit.en', 'a:0:{}', 2067221326),
('spatie.translation-loader.Introduction Sections List.en', 'a:0:{}', 2067221128),
('spatie.translation-loader.Job.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Jobs.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Link.en', 'a:0:{}', 2064292465),
('spatie.translation-loader.List of Pages.en', 'a:0:{}', 2064293963),
('spatie.translation-loader.List.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Log in.en', 'a:0:{}', 2064297894),
('spatie.translation-loader.Logo.en', 'a:0:{}', 2064317115),
('spatie.translation-loader.Logout.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.message.en', 'a:0:{}', 2065161426),
('spatie.translation-loader.Name.en', 'a:0:{}', 2064292465),
('spatie.translation-loader.Not Found.en', 'a:0:{}', 2064292282),
('spatie.translation-loader.Order No.en', 'a:0:{}', 2064304982),
('spatie.translation-loader.Order Number.en', 'a:0:{}', 2064295998),
('spatie.translation-loader.Order.en', 'a:0:{}', 2064292465),
('spatie.translation-loader.Package.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Page Expired.en', 'a:0:{}', 2064336315),
('spatie.translation-loader.Pages.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.pagination.en', 'a:0:{}', 2065161426),
('spatie.translation-loader.Partner.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Password.en', 'a:0:{}', 2064297894),
('spatie.translation-loader.passwords.en', 'a:0:{}', 2065161426),
('spatie.translation-loader.Pending Users.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Pending.en', 'a:0:{}', 2067165437),
('spatie.translation-loader.Phone 2.en', 'a:0:{}', 2064317115),
('spatie.translation-loader.Phone No.en', 'a:0:{}', 2065160076),
('spatie.translation-loader.Phone Number.en', 'a:0:{}', 2065160082),
('spatie.translation-loader.Phone.en', 'a:0:{}', 2064317115),
('spatie.translation-loader.Profile.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Publish.en', 'a:0:{}', 2064292465),
('spatie.translation-loader.Question .en', 'a:0:{}', 2064295998),
('spatie.translation-loader.Question.en', 'a:0:{}', 2064295947),
('spatie.translation-loader.Register.en', 'a:0:{}', 2064297894),
('spatie.translation-loader.Remarks.en', 'a:0:{}', 2065160082),
('spatie.translation-loader.Remember me.en', 'a:0:{}', 2064297894),
('spatie.translation-loader.Save.en', 'a:0:{}', 2064292465),
('spatie.translation-loader.Section Add.en', 'a:0:{}', 2064305465),
('spatie.translation-loader.Section Title Add.en', 'a:0:{}', 2064306068),
('spatie.translation-loader.Section Title Edit.en', 'a:0:{}', 2067218475),
('spatie.translation-loader.Section Title List.en', 'a:0:{}', 2064305456),
('spatie.translation-loader.Select Follow-up Date.en', 'a:0:{}', 2065160082),
('spatie.translation-loader.Select User Type.en', 'a:0:{}', 2067165437),
('spatie.translation-loader.SEO.en', 'a:0:{}', 2064293963),
('spatie.translation-loader.Service Category.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Service.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Settings.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Slide list.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Slider List.en', 'a:0:{}', 2066980521),
('spatie.translation-loader.Slider.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Slug.en', 'a:0:{}', 2064293963),
('spatie.translation-loader.SMS Marketing.en', 'a:0:{}', 2064293963),
('spatie.translation-loader.Social Links.en', 'a:0:{}', 2064317115),
('spatie.translation-loader.Status.en', 'a:0:{}', 2064292465),
('spatie.translation-loader.Sub Title.en', 'a:0:{}', 2066981257),
('spatie.translation-loader.Subject.en', 'a:0:{}', 2065160082),
('spatie.translation-loader.Submit.en', 'a:0:{}', 2067226427),
('spatie.translation-loader.SubTitle.en', 'a:0:{}', 2067228718),
('spatie.translation-loader.Tempelate Files.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Template File.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Template Files.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Testimonial Add.en', 'a:0:{}', 2064295523),
('spatie.translation-loader.Testimonials List.en', 'a:0:{}', 2064293975),
('spatie.translation-loader.Title.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Trash.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.Type.en', 'a:0:{}', 2064293963),
('spatie.translation-loader.Unpublish.en', 'a:0:{}', 2064292465),
('spatie.translation-loader.Update User.en', 'a:0:{}', 2067167765),
('spatie.translation-loader.Update.en', 'a:0:{}', 2064293004),
('spatie.translation-loader.Upload 1400x850 (Pixel) Size image for best quality.en', 'a:0:{}', 2069309688),
('spatie.translation-loader.Upload 1920X900 (Pixel) Size image for best quality.en', 'a:0:{}', 2067162940),
('spatie.translation-loader.Upload 1920X900 (Pixel) Size image or Squre size image for best quality.en', 'a:0:{}', 2066981257),
('spatie.translation-loader.Upload 1920X910 (Pixel) Size image for best quality.en', 'a:0:{}', 2067163010),
('spatie.translation-loader.Upload 1920X910 (Pixel) Size image or Squre size image for best quality.en', 'a:0:{}', 2067162579),
('spatie.translation-loader.Upload 2202x886 (Pixel) Size image for best quality.en', 'a:0:{}', 2064317115),
('spatie.translation-loader.Upload 325x325 (Pixel) Size image or Squre size image for best quality.en', 'a:0:{}', 2064317115),
('spatie.translation-loader.Upload 400x400 (Pixel) Size image for best quality.en', 'a:0:{}', 2067167224),
('spatie.translation-loader.Upload 400X400 (Pixel) Size image or Squre size image for best quality.en', 'a:0:{}', 2067167844),
('spatie.translation-loader.Upload 680x320 (Pixel) Size image for best quality.en', 'a:0:{}', 2064317115),
('spatie.translation-loader.Upload 70X70 (Pixel) Size image for best quality.en', 'a:0:{}', 2064293004),
('spatie.translation-loader.Upload 70X70 (Pixel) Size image or Squre size image for best quality.en', 'a:0:{}', 2064292465),
('spatie.translation-loader.Upload 730X455 (Pixel) Size image for best quality.en', 'a:0:{}', 2064304984),
('spatie.translation-loader.Upload Image.en', 'a:0:{}', 2067165437),
('spatie.translation-loader.User List.en', 'a:0:{}', 2067165402),
('spatie.translation-loader.User.en', 'a:0:{}', 2067165437),
('spatie.translation-loader.Users.en', 'a:0:{}', 2064292281),
('spatie.translation-loader.validation.en', 'a:0:{}', 2064301198),
('spatie.translation-loader.Video Link.en', 'a:0:{}', 2064304984),
('spatie.translation-loader.Web Development.en', 'a:0:{}', 2064293963),
('spatie.translation-loader.Welcome back,.en', 'a:0:{}', 2064303744),
('spatie.translation-loader.Whatsapp Marketing.en', 'a:0:{}', 2064293963),
('spatie.translation-loader.WhatsApp.en', 'a:0:{}', 2064317115);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `call_to_actions`
--

CREATE TABLE `call_to_actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `button_text` varchar(255) NOT NULL,
  `button_link` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `call_to_actions`
--

INSERT INTO `call_to_actions` (`id`, `page_id`, `title`, `subtitle`, `button_text`, `button_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 'a', 's', 'a', 'https://as.com', 'active', '2025-07-06 23:55:55', '2025-07-06 23:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `status`, `name`, `image`, `link`, `serial_number`, `created_at`, `updated_at`) VALUES
(2, 1, 'The International School', '17489318931266355603.png', '#', 1, '2025-06-03 05:24:53', '2025-06-03 05:24:53'),
(3, 1, 'Boss Hugo Boss', '17489319501340719593.png', '#', 1, '2025-06-03 05:25:50', '2025-06-03 05:25:50'),
(4, 1, 'Zain', '1748931977305365950.png', '#', 1, '2025-06-03 05:26:17', '2025-06-03 05:26:17'),
(5, 1, 'STC', '1748932001808055644.png', '#', 1, '2025-06-03 05:26:41', '2025-06-03 05:26:41'),
(6, 1, 'D', '1748932087684691320.png', '#', 1, '2025-06-03 05:28:07', '2025-06-03 05:28:07'),
(7, 1, 'Dikanz', '1748932120458598795.png', '#', 1, '2025-06-03 05:28:40', '2025-06-03 05:28:40'),
(8, 1, 'Mobily', '1748932147176878538.png', '#', 1, '2025-06-03 05:29:07', '2025-06-03 05:29:07'),
(9, 1, 'SM', '1748932173298755904.png', '#', 1, '2025-06-03 05:29:33', '2025-06-03 05:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `document_requireds`
--

CREATE TABLE `document_requireds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `order_no` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elements`
--

CREATE TABLE `elements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `element_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `elements`
--

INSERT INTO `elements` (`id`, `element_name`, `title`, `subtitle`, `description`, `image`, `icon`, `page_id`, `created_at`, `updated_at`) VALUES
(1, 'test', 'Title', 'Subtitle', '<p>Description</p>', 'assets/admin/uploads/element/thumb/1751860316450081585.png', 'assets/admin/uploads/element/icons/17518603161036720294.png', 9, '2025-07-06 22:47:04', '2025-07-06 22:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `element_features`
--

CREATE TABLE `element_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `element_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `order_no` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `enquiry_message` text NOT NULL,
  `status` enum('pending','follow-up','completed') NOT NULL DEFAULT 'pending',
  `followup_date` varchar(255) DEFAULT NULL,
  `followup_type` enum('call','whatsapp','message','email','info-required','docs-required') DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `phone_no`, `subject`, `enquiry_message`, `status`, `followup_date`, `followup_type`, `remarks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Camille Mcbride', 'peva@mailinator.com', '+1 (731) 809-9345', 'Web Design', 'Qui voluptas aute ve', 'pending', NULL, NULL, NULL, '2025-06-02 09:46:14', '2025-06-02 09:46:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_comments`
--

CREATE TABLE `enquiry_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enquiry_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `question` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `answer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_no` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `page_id`, `question`, `answer`, `order_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '\"Will my website be mobile-friendly?\"', '\"Absolutely! All our websites are fully responsive and optimized to look great and function smoothly on smartphones, tablets, and desktops.\"', 1, 'active', '2025-06-02 10:03:16', '2025-06-02 10:03:16'),
(2, 3, '\"How long does it take to build a website?\"', '\"The timeline varies depending on the project\\u2019s complexity, but typically, a standard website takes 4 to 8 weeks from planning to launch.\"', 2, 'active', '2025-06-02 10:03:31', '2025-06-02 10:03:31'),
(3, 3, '\"Can I update the website content myself?\"', '\"Yes, we provide easy-to-use content management systems (CMS) so you can update your website content without needing technical skills.\"', 3, 'active', '2025-06-02 10:03:59', '2025-06-02 10:03:59'),
(4, 3, '\"Do you offer website maintenance after launch?\"', '\"Yes, we offer ongoing support and maintenance packages to ensure your website stays secure, updated, and running at its best.\"', 4, 'active', '2025-06-02 10:04:28', '2025-06-02 10:04:28'),
(5, 4, '\"How long does it take to build a website?\"', '\"Answer:\\r\\nThe timeline depends on the complexity of the website. A basic business website usually takes 7\\u201310 days, while larger or custom websites may take 2\\u20134 weeks. We always discuss deadlines clearly before starting.\"', 1, 'active', '2025-06-03 04:53:19', '2025-06-03 04:53:19'),
(6, 4, '\"Will my website be mobile-friendly?\"', '\"Absolutely! Every website we build is fully responsive, meaning it looks great and works smoothly on all devices \\u2014 mobile, tablet, and desktop.\"', 1, 'active', '2025-06-03 04:53:37', '2025-06-03 04:53:37'),
(7, 4, '\"Do you offer website maintenance after delivery?\\r\\nAnswer:\"', '\"Yes, we offer optional maintenance packages to keep your website updated, secure, and running smoothly. This includes content updates, bug fixes, and backups.\"', 1, 'active', '2025-06-03 04:54:08', '2025-06-03 04:54:08'),
(8, 4, '\"Will my website be mobile-friendly?\"', '\"Absolutely! Every website we build is fully responsive, meaning it looks great and works smoothly on all devices \\u2014 mobile, tablet, and desktop.\"', 1, 'active', '2025-06-03 04:54:29', '2025-06-03 04:54:29'),
(9, 5, '\"Do you provide SEO services with the website?\"', '\"I primarily use WordPress for its flexibility and ease of use, but I can also build custom websites using HTML, CSS, PHP, or Laravel \\u2014 depending on your project needs.\"', 1, 'active', '2025-06-03 04:59:40', '2025-06-03 04:59:40'),
(10, 5, '\"Do you provide SEO services with the website?\"', '\"Yes, basic on-page SEO (like meta tags, image optimization, and clean URL structure) is included. Advanced SEO services are available upon request.\"', 1, 'active', '2025-06-03 04:59:57', '2025-06-03 04:59:57'),
(11, 5, '\"What if I want changes after the website is completed?\"', '\"I offer free minor revisions after project delivery (within a limited timeframe). Major changes or redesigns can be handled as part of a separate update or maintenance package.\"', 1, 'active', '2025-06-03 05:00:12', '2025-06-03 05:00:12'),
(12, 5, '\"What payment methods do you accept?\"', '\"I accept payments via bank transfer, JazzCash, Easypaisa, and PayPal (for international clients). Full or milestone-based payments can be discussed before starting the project.\"', 1, 'active', '2025-06-03 05:00:28', '2025-06-03 05:00:28'),
(13, 6, '\"Can you redesign my existing website?\"', '\"Absolutely. Whether you need a complete redesign or just a refresh of your current layout, I can update your website to make it modern, fast, and user-friendly.\"', 1, 'active', '2025-06-03 05:10:37', '2025-06-03 05:10:37'),
(14, 6, '\"Is the website secure?\"', '\"Yes, security is a priority. I use best practices like SSL setup, secure admin access, and anti-spam tools to make sure your site is protected from common threats.\"', 1, 'active', '2025-06-03 05:10:49', '2025-06-03 05:10:49'),
(15, 6, '\"Will my website be optimized for speed?\"', '\"Definitely. I optimize all websites for fast loading by compressing images, minimizing code, and using caching tools so your users enjoy a smooth experience.\"', 1, 'active', '2025-06-03 05:11:01', '2025-06-03 05:11:01'),
(16, 6, '\"Is the website secure?\"', '\"Definitely. I optimize all websites for fast loading by compressing images, minimizing code, and using caching tools so your users enjoy a smooth experience.\\r\\n\\r\\n1\"', 1, 'active', '2025-06-03 05:11:19', '2025-06-03 05:11:19'),
(17, 7, '\"Do you provide support after the website is completed?\"', '\"Absolutely! I can easily integrate tools like WhatsApp chat, Google Maps, social media feeds, contact forms, and more \\u2014 based on your business needs.\\r\\n\\r\\n\\u2753 3. Will my website show up on Go\"', 1, 'active', '2025-06-03 06:33:36', '2025-06-03 06:33:36'),
(18, 7, '\"What if I don\\u2019t have content or images yet?\\r\\nAnswer:\"', '\"No problem! I can guide you on what content is needed or even provide placeholder text and royalty-free images until you\'re ready with your final content.\"', 1, 'active', '2025-06-03 06:33:56', '2025-06-03 06:33:56'),
(19, 7, '\"Will my website show up on Google?\"', '\"Yes. I follow SEO best practices to help your website get indexed by Google. I also offer advanced SEO services if you want to rank higher in search results.\"', 1, 'active', '2025-06-03 06:34:14', '2025-06-03 06:34:14'),
(20, 7, '\"Will my website show up on Google?\"', '\"Yes. I follow SEO best practices to help your website get indexed by Google. I also offer advanced SEO services if you want to rank higher in search results.\"', 1, 'active', '2025-06-03 06:34:40', '2025-06-03 06:34:40'),
(21, 8, '\"Do you offer custom features like booking forms, login systems, or dashboards?\"', '\"Absolutely. Whether it\\u2019s a booking system, member login, admin panel, or any custom functionality \\u2014 I can develop it according to your needs.\"', 1, 'active', '2025-06-03 06:39:34', '2025-06-03 06:39:34'),
(22, 8, '\"How do you communicate during the project?\"', '\"I usually stay in touch via WhatsApp, email, or Zoom \\u2014 depending on your preference. You\\u2019ll get regular updates and can give feedback anytime during the project.\"', 1, 'active', '2025-06-03 06:39:47', '2025-06-03 06:39:47'),
(23, 8, '\". What if I need help understanding how to use my website?\"', '\"No worries! I provide basic training and video tutorials (if needed) so you can easily manage your website \\u2014 no technical skills required.\"', 1, 'active', '2025-06-03 06:39:59', '2025-06-03 06:39:59'),
(24, 8, '\"Can you build an e-commerce website with payment integration?\"', '\"Absolutely. Whether it\\u2019s a booking system, member login, admin panel, or any custom functionality \\u2014 I can develop it according to your needs.\"', 1, 'active', '2025-06-03 06:40:23', '2025-06-03 06:40:23'),
(25, 9, '\"s\"', '\"s\"', 1, 'active', '2025-07-07 00:33:23', '2025-07-07 00:33:23'),
(26, 9, '\"sdss\"', '\"ss\"', 0, 'active', '2025-07-07 00:40:07', '2025-07-07 00:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `order_no` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feature_images`
--

CREATE TABLE `feature_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `order_no` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gcategories`
--

CREATE TABLE `gcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `serial_number` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gcategories`
--

INSERT INTO `gcategories` (`id`, `name`, `status`, `serial_number`, `created_at`, `updated_at`) VALUES
(3, 'Gallery Category', 1, 1, '2025-07-06 12:06:25', '2025-07-06 12:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('hero','section_title','intro_section','features','why_us_img','feature_img','faq','why_choose_us','testimonials','documents_required','procedure','cta') NOT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hero_sections`
--

CREATE TABLE `hero_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_sections`
--

INSERT INTO `hero_sections` (`id`, `page_id`, `title`, `subtitle`, `description`, `background_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, '\"s\"', NULL, NULL, NULL, 'inactive', '2025-07-07 01:04:54', '2025-07-07 01:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `introduction_sections`
--

CREATE TABLE `introduction_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `introduction_sections`
--

INSERT INTO `introduction_sections` (`id`, `page_id`, `title`, `subtitle`, `description`, `images`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 's', NULL, NULL, NULL, NULL, 'active', '2025-07-06 23:06:16', '2025-07-06 23:06:16'),
(2, 9, 'Title', 'SubTitle', 'Descirption', 'uploads/introduction_section/1751861421_686b48ad1d253.png', 'uploads/introduction_section/1751861421_686b48ad1d772.png', 'active', '2025-07-06 23:10:21', '2025-07-06 23:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `jcategories`
--

CREATE TABLE `jcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `serial_number` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jcategory_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `vacancy` int(11) DEFAULT NULL,
  `deadline` varchar(255) DEFAULT NULL,
  `employment_status` varchar(255) DEFAULT NULL,
  `job_location` text DEFAULT NULL,
  `salary` text DEFAULT NULL,
  `other_benefits` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `job_responsibility` text DEFAULT NULL,
  `education_requirement` text DEFAULT NULL,
  `job_context` text DEFAULT NULL,
  `experience_requirement` text DEFAULT NULL,
  `additional_requirement` text DEFAULT NULL,
  `meta_tags` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `serial_number` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language_lines`
--

CREATE TABLE `language_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2021_01_01_123620_create_bcategories_table', 1),
(5, '2021_01_01_123640_create_blogs_table', 1),
(6, '2021_06_02_102013_create_gcategories_table', 1),
(7, '2021_06_02_102316_create_galleries_table', 1),
(8, '2021_06_03_153757_create_jcategories_table', 1),
(9, '2021_06_03_154131_create_job_applications_table', 1),
(10, '2024_11_01_121944_create_partners_table', 1),
(11, '2024_11_04_115441_create_service_categories_table', 1),
(12, '2024_11_04_115723_create_services_table', 1),
(13, '2024_11_04_124533_create_enquiries_table', 1),
(14, '2024_11_04_134132_create_service_features_table', 1),
(15, '2024_11_08_113706_create_settings_table', 1),
(16, '2024_11_08_124807_create_service_sections_table', 1),
(17, '2024_11_08_142847_create_enquiry_comments_table', 1),
(18, '2024_11_09_113547_create_notifications_table', 1),
(19, '2024_11_13_114327_add_deleted_at_field_to_enquiries', 1),
(20, '2025_03_21_214247_create_groups_table', 1),
(21, '2025_03_21_214302_create_pages_table', 1),
(22, '2025_03_22_081253_create_procedures_table', 1),
(23, '2025_03_22_090836_create_call_to_actions_table', 1),
(24, '2025_03_22_091429_create_section_titles_table', 1),
(25, '2025_03_22_091441_create_introduction_sections_table', 1),
(26, '2025_03_22_091454_create_hero_sections_table', 1),
(27, '2025_03_22_145147_create_features_table', 1),
(28, '2025_03_23_190503_create_faqs_table', 1),
(29, '2025_03_23_201031_create_testimonials_table', 1),
(30, '2025_03_24_055736_create_why_choose_us_table', 1),
(31, '2025_03_24_061928_create_document_requireds_table', 1),
(32, '2025_03_24_070129_create_why_us_images_table', 1),
(33, '2025_03_24_070149_create_feature_images_table', 1),
(34, '2025_04_19_101332_create_language_lines_table', 1),
(35, '2025_04_29_084808_create_page_sections_table', 1),
(36, '2025_05_22_073001_create_packages_table', 1),
(37, '2025_05_22_075808_create_package_details_table', 1),
(38, '2025_05_29_010703_create_sliders_table', 1),
(39, '2025_05_29_014813_create_clients_table', 1),
(40, '2025_05_29_095338_create_elements_table', 1),
(41, '2025_05_29_095628_create_element_features', 1),
(42, '2025_05_29_104803_create_blocks_table', 1),
(43, '2025_05_29_112205_create_tempelate_files_table', 1),
(44, '2025_05_30_075559_create_block_features_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `discount_percentage` decimal(5,2) DEFAULT NULL,
  `discounted_amount` decimal(10,2) DEFAULT NULL,
  `currency_symbol` varchar(255) NOT NULL DEFAULT '$',
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `publish` enum('draft','published') NOT NULL DEFAULT 'draft',
  `order_no` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_category_id`, `title`, `subtitle`, `icon`, `amount`, `discount_percentage`, `discounted_amount`, `currency_symbol`, `status`, `publish`, `order_no`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Basic Package', 'Basic plan for Web Development', 'icon-basic-web-development', 100.00, 10.00, 90.00, 'AED', 'active', 'published', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(2, 1, 'Premium Package', 'Premium plan for Web Development', 'icon-premium-web-development', 150.00, 15.00, 127.50, 'AED', 'active', 'published', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(3, 1, 'Professional Package', 'Professional plan for Web Development', 'icon-professional-web-development', 200.00, 20.00, 160.00, 'AED', 'active', 'published', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(4, 2, 'Basic Package', 'Basic plan for Digital Marketing', 'icon-basic-digital-marketing', 100.00, 10.00, 90.00, 'AED', 'active', 'published', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(5, 2, 'Premium Package', 'Premium plan for Digital Marketing', 'icon-premium-digital-marketing', 150.00, 15.00, 127.50, 'AED', 'active', 'published', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(6, 2, 'Professional Package', 'Professional plan for Digital Marketing', 'icon-professional-digital-marketing', 200.00, 20.00, 160.00, 'AED', 'active', 'published', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(7, 3, 'Basic Package', 'Basic plan for SEO', 'icon-basic-seo', 100.00, 10.00, 90.00, 'AED', 'active', 'published', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(8, 3, 'Premium Package', 'Premium plan for SEO', 'icon-premium-seo', 150.00, 15.00, 127.50, 'AED', 'active', 'published', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(9, 3, 'Professional Package', 'Professional plan for SEO', 'icon-professional-seo', 200.00, 20.00, 160.00, 'AED', 'active', 'published', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(10, 4, 'Basic Package', 'Basic plan for Whatsapp Marketing', 'icon-basic-whatsapp-marketing', 100.00, 10.00, 90.00, 'AED', 'active', 'published', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(11, 4, 'Premium Package', 'Premium plan for Whatsapp Marketing', 'icon-premium-whatsapp-marketing', 150.00, 15.00, 127.50, 'AED', 'active', 'published', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(12, 4, 'Professional Package', 'Professional plan for Whatsapp Marketing', 'icon-professional-whatsapp-marketing', 200.00, 20.00, 160.00, 'AED', 'active', 'published', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(13, 5, 'Basic Package', 'Basic plan for Email Marketing', 'icon-basic-email-marketing', 100.00, 10.00, 90.00, 'AED', 'active', 'published', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(14, 5, 'Premium Package', 'Premium plan for Email Marketing', 'icon-premium-email-marketing', 150.00, 15.00, 127.50, 'AED', 'active', 'published', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(15, 5, 'Professional Package', 'Professional plan for Email Marketing', 'icon-professional-email-marketing', 200.00, 20.00, 160.00, 'AED', 'active', 'published', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(16, 6, 'Basic Package', 'Basic plan for SMS Marketing', 'icon-basic-sms-marketing', 100.00, 10.00, 90.00, 'AED', 'active', 'published', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(17, 6, 'Premium Package', 'Premium plan for SMS Marketing', 'icon-premium-sms-marketing', 150.00, 15.00, 127.50, 'AED', 'active', 'published', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(18, 6, 'Professional Package', 'Professional plan for SMS Marketing', 'icon-professional-sms-marketing', 200.00, 20.00, 160.00, 'AED', 'active', 'published', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `package_categories`
--

CREATE TABLE `package_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `order_no` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_categories`
--

INSERT INTO `package_categories` (`id`, `name`, `slug`, `title`, `sub_title`, `description`, `order_no`, `icon`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Web Development', 'web-development', 'Professional Web Development', 'Building scalable, responsive websites', 'We deliver custom, high-performance websites tailored to your business goals.', 1, 'fa-globe', 'web-development.jpg', 'active', NULL, '2025-06-03 14:27:28', '2025-06-03 14:27:28'),
(2, 'Digital Marketing', 'digital-marketing', 'Expert Digital Marketing', 'Grow your brand with smart strategies', 'We help you reach your target audience with effective online marketing solutions.', 2, 'fa-bullhorn', 'digital-marketing.jpg', 'active', NULL, '2025-06-03 14:27:28', '2025-06-03 14:27:28'),
(3, 'SEO', 'seo', 'SEO Optimization Services', 'Improve rankings and visibility', 'Our SEO experts ensure your website ranks high on search engines and drives traffic.', 3, 'fa-search', 'seo.jpg', 'active', NULL, '2025-06-03 14:27:28', '2025-06-03 14:27:28'),
(4, 'Whatsapp Marketing', 'whatsapp-marketing', 'WhatsApp Marketing Solutions', 'Direct messaging that connects', 'Engage customers through personalized and efficient WhatsApp campaigns.', 4, 'fa-whatsapp', 'whatsapp-marketing.jpg', 'active', NULL, '2025-06-03 14:27:28', '2025-06-03 14:27:28'),
(5, 'Email Marketing', 'email-marketing', 'Email Marketing Campaigns', 'Reach inboxes with impact', 'Boost engagement and conversions through targeted email campaigns.', 5, 'fa-envelope', 'email-marketing.jpg', 'active', NULL, '2025-06-03 14:27:28', '2025-06-03 14:27:28'),
(6, 'SMS Marketing', 'sms-marketing', 'SMS Marketing Services', 'Instant reach to your audience', 'Send promotional messages and alerts instantly through reliable SMS campaigns.', 6, 'fa-comment-alt', 'sms-marketing.jpg', 'active', NULL, '2025-06-03 14:27:28', '2025-06-03 14:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `package_details`
--

CREATE TABLE `package_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` enum('included','excluded') NOT NULL DEFAULT 'included',
  `order_no` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_details`
--

INSERT INTO `package_details` (`id`, `package_id`, `title`, `status`, `order_no`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Responsive Design', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(2, 1, '1 Page Site', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(3, 1, 'Basic Contact Form', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(4, 1, 'Hosting Setup', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(5, 1, 'E-Commerce Integration', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(6, 1, 'Custom Animations', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(7, 1, 'Blog Setup', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(8, 1, 'Admin Panel', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(9, 2, 'Multi-Page Site', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(10, 2, 'Custom Design', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(11, 2, 'CMS Integration', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(12, 2, 'Contact Form', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(13, 2, 'Advanced SEO', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(14, 2, 'Live Chat', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(15, 2, 'Blog Setup', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(16, 2, 'Admin Panel', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(17, 3, 'E-Commerce', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(18, 3, 'SEO Optimization', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(19, 3, 'Blog Setup', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(20, 3, 'Admin Dashboard', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(21, 3, 'Mobile App Integration', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(22, 3, '3rd Party API Integration', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(23, 3, 'Live Chat', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(24, 3, 'Analytics Reports', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(25, 4, 'Social Media Audit', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(26, 4, 'Content Calendar', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(27, 4, '2 Posts/Week', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(28, 4, 'Basic Analytics', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(29, 4, 'Paid Ads', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(30, 4, 'Email Campaigns', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(31, 4, 'Video Marketing', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(32, 4, 'Influencer Marketing', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(33, 5, 'SEO Audit', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(34, 5, 'Content Strategy', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(35, 5, '4 Posts/Week', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(36, 5, 'Email Campaigns', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(37, 5, 'Video Production', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(38, 5, 'Influencer Marketing', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(39, 5, 'Ad Management', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(40, 5, 'Funnel Optimization', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(41, 6, 'Full Funnel Setup', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(42, 6, 'Advanced Analytics', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(43, 6, 'Ad Campaigns', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(44, 6, 'Email + SMS Marketing', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(45, 6, 'Webinar Funnels', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(46, 6, 'App Marketing', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(47, 6, 'Lead Scoring', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(48, 6, 'Behavioral Automation', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(49, 7, 'Keyword Research', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(50, 7, 'Meta Tags', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(51, 7, 'Robots.txt', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(52, 7, 'Sitemap Submission', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(53, 7, 'Backlink Building', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(54, 7, 'Competitor Analysis', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(55, 7, 'Content Writing', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(56, 7, 'Technical SEO', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(57, 8, 'On-Page Optimization', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(58, 8, 'Google My Business', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(59, 8, 'Schema Markup', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(60, 8, 'Technical Audit', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(61, 8, 'Content Strategy', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(62, 8, 'Advanced Backlinks', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(63, 8, 'Blog Writing', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(64, 8, 'Speed Optimization', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(65, 9, 'Full SEO Strategy', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(66, 9, 'Content Writing', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(67, 9, 'Link Building', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(68, 9, 'Monthly Reports', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(69, 9, 'PPC Integration', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(70, 9, 'App Store SEO', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(71, 9, 'Video SEO', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(72, 9, 'Voice Search Optimization', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(73, 10, '1000 Messages', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(74, 10, 'Basic Template', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(75, 10, 'Support Chatbot', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(76, 10, '1 Campaign', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(77, 10, 'Custom Reporting', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(78, 10, 'Segmentation', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(79, 10, 'Media Messages', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(80, 10, 'Scheduling', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(81, 11, '5000 Messages', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(82, 11, 'Custom Templates', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(83, 11, 'Campaign Scheduler', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(84, 11, 'Analytics', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(85, 11, 'Integration API', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(86, 11, 'Segmentation', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(87, 11, 'Personalization', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(88, 11, 'Advanced Support', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(89, 12, '10000 Messages', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(90, 12, 'Media Support', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(91, 12, 'Automation', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(92, 12, 'Full Analytics', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(93, 12, 'CRM Integration', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(94, 12, 'Priority Support', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(95, 12, 'Geo Targeting', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(96, 12, 'Voice Messages', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(97, 13, '1000 Emails', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(98, 13, 'Newsletter Template', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(99, 13, 'Open Rate Tracking', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(100, 13, 'Unsubscribe Link', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(101, 13, 'A/B Testing', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(102, 13, 'Drip Campaigns', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(103, 13, 'Segmented Lists', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(104, 13, 'Automation', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(105, 14, '5000 Emails', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(106, 14, 'Custom Template', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(107, 14, 'Drip Campaigns', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(108, 14, 'A/B Testing', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(109, 14, 'CRM Integration', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(110, 14, 'Behavioral Emails', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(111, 14, 'Retargeting', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(112, 14, 'Priority Support', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(113, 15, '10000 Emails', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(114, 15, 'Full Automation', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(115, 15, 'Advanced A/B Testing', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(116, 15, 'Multi-Step Campaigns', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(117, 15, 'AI Personalization', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(118, 15, 'Transactional Emails', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(119, 15, 'Dynamic Content', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(120, 15, 'API Access', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(121, 16, '500 SMS', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(122, 16, 'Single Message Campaign', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(123, 16, 'Basic Scheduler', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(124, 16, 'Reports', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(125, 16, 'Unicode Support', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(126, 16, 'Multilingual SMS', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(127, 16, 'API Access', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(128, 16, 'Voice SMS', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(129, 17, '2000 SMS', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(130, 17, 'Group Messaging', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(131, 17, 'Advanced Scheduler', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(132, 17, 'Delivery Reports', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(133, 17, 'Custom Sender ID', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(134, 17, 'Templates', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(135, 17, 'Automated SMS', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(136, 17, 'Integration', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(137, 18, '5000 SMS', 'included', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(138, 18, 'Full Automation', 'included', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(139, 18, 'Campaign Analytics', 'included', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(140, 18, 'User Segmentation', 'included', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(141, 18, '2-Way Messaging', 'excluded', 1, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(142, 18, 'Event-Based SMS', 'excluded', 2, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(143, 18, 'Geo-Targeting', 'excluded', 3, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00'),
(144, 18, 'Voice SMS', 'excluded', 4, NULL, '2025-06-03 13:00:00', '2025-06-03 13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_sub_title` varchar(255) DEFAULT NULL,
  `hero_description` text DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'published',
  `type` enum('website','marketing','seo','whatsapp-Marketing') NOT NULL,
  `route_name` varchar(255) DEFAULT NULL,
  `page_link_for` enum('header','footer','services','none') NOT NULL,
  `order_no` int(11) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `hero_title`, `hero_sub_title`, `hero_description`, `slug`, `image`, `icon`, `hero_image`, `status`, `type`, `route_name`, `page_link_for`, `order_no`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Home Page', 'We offer professional web development services to grow your business online.', 'Build Your Website', 'Custom & Responsive Web Development', 'Get a website that looks great and works perfectly on all devices.', 'home-page', NULL, NULL, NULL, 'draft', 'website', 'frontend.page.web-development', 'services', 1, 'Web Development Services', 'Professional web development services tailored to your business needs.', 'web development, website, responsive design', '2025-06-02 03:28:14', '2025-06-02 10:44:54', NULL),
(2, 'about us', 'Driving Digital Growth with Smart Marketing & Development Solutions', 'Who We Are', 'Driving Digital Growth with Smart Marketing & Development Solutions', 'We are a passionate team of marketers, developers, and strategists committed to helping businesses grow in the digital age. From impactful websites to result-driven marketing campaigns, we bring innovation, precision, and dedication to every project we handle.', 'about-us', NULL, 'assets/admin/img/17489463011573232563.png', 'assets/admin/img/1748946301bannerjpeg.jpeg', 'draft', 'website', 'frontend.page.web-development', 'services', 1, 'Web Development Services', 'Professional web development services tailored to your business needs.', 'web development, website, responsive design', '2025-06-02 03:28:14', '2025-06-03 09:25:01', NULL),
(3, 'Web Development', 'Whether you\'re launching a startup or upgrading your online presence, our web development solutions are designed to meet your business goals. We create responsive, fast, and user-friendly websites tailored to your brand and audience.', 'Build Powerful, Scalable & Custom Websites', 'From Concept to Code — We Bring Your Ideas to Life', 'Whether you\'re launching a startup or upgrading your online presence, our web development solutions are designed to meet your business goals. We create responsive, fast, and user-friendly websites tailored to your brand and audience.', 'web-development', NULL, 'assets/admin/img/1748860351828577743.png', 'assets/admin/img/1748860351iswebdevelopmentgoodcareeravif.avif', 'published', 'website', 'frontend.page.web-development', 'services', 1, 'Web Development Services', 'Professional web development services tailored to your business needs.', 'web development, website, responsive design', '2025-06-02 03:28:14', '2025-06-02 10:14:45', NULL),
(4, 'SEO', 'Our expert SEO services are designed to help your website rank higher, attract qualified traffic, and convert visitors into loyal customers. From on-page optimization to technical audits and local SEO, we’ve got you covered.', 'Boost Your Visibility with Powerful SEO Solutions', 'Get Found on Google & Grow Organically', 'Our expert SEO services are designed to help your website rank higher, attract qualified traffic, and convert visitors into loyal customers. From on-page optimization to technical audits and local SEO, we’ve got you covered.', 'seo', NULL, 'assets/admin/img/1748860806559180065.png', 'assets/admin/img/17488608064png.png', 'published', 'seo', 'frontend.page.seo', 'services', 2, 'SEO Services', 'Boost your website’s traffic with our SEO strategies.', 'seo, search engine optimization, rank', '2025-06-02 03:28:14', '2025-06-02 09:40:06', NULL),
(5, 'Digital Marketing', 'We create powerful digital marketing strategies that deliver real results — more visibility, higher engagement, and increased conversions. From social media to paid ads, we help your brand grow across every digital channel.', 'Drive Results with Smart Digital Marketing', 'Connect, Engage & Grow Your Brand Online', 'We create powerful digital marketing strategies that deliver real results — more visibility, higher engagement, and increased conversions. From social media to paid ads, we help your brand grow across every digital channel.', 'digital-marketing', NULL, 'assets/admin/img/1748863669998327146.png', 'assets/admin/img/174886366912png.png', 'published', 'marketing', 'frontend.page.marketing', 'services', 3, 'Marketing Services', 'Comprehensive digital marketing solutions to grow your business.', 'marketing, digital marketing, social media', '2025-06-02 03:28:14', '2025-06-02 10:27:49', NULL),
(6, 'Email Marketing', 'Connect with your audience through strategic, personalized email campaigns that drive engagement, increase sales, and grow your brand.', 'Boost Your Business with Targeted Email Marketing', 'Reach the Right Audience, At the Right Time', 'Unlock the power of personalized email campaigns designed to engage your customers, increase conversions, and build lasting relationships. Our email marketing strategies help you deliver the right message that drives real results.', 'email-marketing', NULL, 'assets/admin/img/1748863519322013579.png', 'assets/admin/img/1748863519incmastersarticlesimage22webp.webp', 'published', 'marketing', 'frontend.page.marketing', 'services', 3, 'Marketing Services', 'Comprehensive digital marketing solutions to grow your business.', 'marketing, digital marketing, social media', '2025-06-02 03:28:14', '2025-06-02 10:25:19', NULL),
(7, 'Whatsapp Marketing', 'WhatsApp is more than just messaging — it’s a powerful marketing tool. We help you engage customers, send updates, promote products, and build trust through direct, personalized communication.', 'Connect Directly with Your Customers through WhatsApp Marketing', 'Real-Time Communication That Drives Results', 'WhatsApp is more than just messaging — it’s a powerful marketing tool. We help you engage customers, send updates, promote products, and build trust through direct, personalized communication.', 'whatsapp-marketing', NULL, 'assets/admin/img/17488651881610862053.png', 'assets/admin/img/174886518820png.png', 'published', 'marketing', 'frontend.page.marketing', 'services', 3, 'Marketing Services', 'Comprehensive digital marketing solutions to grow your business.', 'marketing, digital marketing, social media', '2025-06-02 03:28:14', '2025-06-02 10:53:08', NULL),
(8, 'SMS Marketing', 'Cut through the noise and reach your audience instantly with SMS marketing. We help you send timely, personalized messages that grab attention, promote offers, and drive action — all through the power of text messaging.', 'Instant Reach with SMS Marketing', 'Connect with Your Customers in Real-Time', 'Cut through the noise and reach your audience instantly with SMS marketing. We help you send timely, personalized messages that grab attention, promote offers, and drive action — all through the power of text messaging.', 'sms-marketing', NULL, 'assets/admin/img/1748865241587942004.png', 'assets/admin/img/1748865241mailcommunicationconnectionmessagemailingcontactsphonegloballettersconceptscaledjpg.jpg', 'published', 'marketing', 'frontend.page.marketing', 'services', 3, 'Marketing Services', 'Comprehensive digital marketing solutions to grow your business.', 'marketing, digital marketing, social media', '2025-06-02 03:28:14', '2025-06-02 10:54:01', NULL),
(9, 'Slug', NULL, NULL, NULL, NULL, 'slug', NULL, NULL, 'sets/admin/img/1751822073497499234.jpg', 'draft', 'website', NULL, 'header', 1, NULL, NULL, NULL, '2025-07-06 12:14:33', '2025-07-06 12:14:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_sections`
--

CREATE TABLE `page_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` enum('R-2-L','L-2-R') NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_sections`
--

INSERT INTO `page_sections` (`id`, `page_id`, `title`, `subtitle`, `description`, `image`, `type`, `order_no`, `created_at`, `updated_at`) VALUES
(3, 3, 'Professional Web Development Services', 'Custom-Built Websites That Drive Success', '<p data-start=\"240\" data-end=\"672\">Your website is more than just a digital presence — it’s a vital tool for engaging your audience, building trust, and generating business. At our core, we focus on crafting custom websites that combine clean code, modern design, and seamless functionality. Whether you\'re launching a new business, expanding your brand, or upgrading an outdated website, we provide end-to-end web development solutions tailored to your unique needs.</p>', 'assets/admin/uploads/PageSection/thumb/17488615932077123227.png', 'R-2-L', '1', '2025-06-02 09:50:15', '2025-06-02 09:56:58'),
(4, 4, 'SEO That Drives Real Business Growth', 'Strategic Optimization for Maximum Visibility', '<p>&nbsp;SEO is more than just keywords — it’s about building a strong online presence that puts your brand in front of the right people. We use proven strategies, the latest tools, and in-depth research to ensure your business climbs the ranks on Google and stays there.</p>', 'assets/admin/uploads/PageSection/thumb/17488621361755129610.png', 'L-2-R', '1', '2025-06-02 10:02:16', '2025-06-02 10:02:16'),
(5, 4, 'Complete SEO Services for Long-Term Success', 'Holistic Solutions Tailored to Your Goals', '<p>&nbsp;From improving your website structure to optimizing content and building authority, we handle every aspect of SEO. Whether you\'re targeting local customers or a global audience, we create a strategy tailored to your unique business needs.</p>', 'assets/admin/uploads/PageSection/thumb/17488622361872416443.png', 'R-2-L', '1', '2025-06-02 10:03:56', '2025-06-02 10:03:56'),
(6, 6, 'Effective Email Marketing Solutions', 'Engage, Convert, and Grow with Every Campaign', '<p data-start=\"233\" data-end=\"629\">Email marketing remains one of the most powerful tools for direct communication and customer engagement. Our tailored email marketing services help you stay connected with your audience, promote your products or services, and drive consistent results. From campaign design and content creation to segmentation and automation, we ensure every email delivers value and supports your business goals.</p>', 'assets/admin/uploads/PageSection/thumb/1748863606937077904.jpg', 'R-2-L', '1', '2025-06-02 10:26:46', '2025-06-02 10:26:46'),
(7, 5, 'All-in-One Digital Marketing Services', 'Everything You Need to Succeed Online', '<p>&nbsp;Digital marketing isn’t just about being seen — it’s about being seen by the <em data-start=\"710\" data-end=\"717\">right</em> people at the <em data-start=\"732\" data-end=\"739\">right</em> time. We combine creativity, data, and the latest tools to craft custom strategies tailored to your business goals. Whether you want to build brand awareness, generate leads, or drive sales, we’ve got you covered.</p>', 'assets/admin/uploads/PageSection/thumb/17488639701629348352.png', 'L-2-R', '1', '2025-06-02 10:32:50', '2025-06-02 10:32:50'),
(8, 5, 'Multi-Channel Strategies for Maximum Impact', 'Reach Your Audience Wherever They Are', '<p>&nbsp;We utilize a wide range of digital channels to promote your brand effectively. From targeted social media campaigns to search engine marketing, we ensure every click brings value. Our approach focuses on building relationships with your audience that convert into loyal customers.</p>', 'assets/admin/uploads/PageSection/thumb/17488640871337284647.png', 'R-2-L', '1', '2025-06-02 10:34:47', '2025-06-02 10:34:47'),
(9, 8, 'Powerful SMS Marketing for Fast, Direct Communication', 'Reach More People. Get Faster Responses.', '<p data-start=\"237\" data-end=\"727\">SMS marketing is one of the most effective ways to communicate directly with your customers. With high open rates and immediate delivery, it’s the perfect channel to promote offers, send alerts, or keep your audience engaged. Our SMS marketing services help you deliver clear, impactful messages that drive real-time results — whether you\'re targeting a small group or thousands of contacts. From bulk messaging to personalized campaigns, we handle everything with precision and compliance.</p>', 'assets/admin/uploads/PageSection/thumb/174886537352173033.jpg', 'R-2-L', '1', '2025-06-02 10:56:13', '2025-06-02 10:56:13'),
(10, 7, 'WhatsApp Marketing Built for Engagement', 'Tap Into the Power of Instant Messaging', '<p>&nbsp;With over 2 billion active users, WhatsApp is where your customers already are. Our WhatsApp Marketing strategies help you cut through the noise with highly targeted messages that spark conversations and drive conversions. Whether it’s for promotions, reminders, customer service, or updates — we help you stay connected and stay ahead.</p>', 'assets/admin/uploads/PageSection/thumb/1748865405772050239.png', 'L-2-R', '1', '2025-06-02 10:56:45', '2025-06-02 10:56:45'),
(11, 7, 'Personalized Campaigns that Get Delivered and Read', 'Reach Customers in the Most Direct Way Possible', '<p>&nbsp;Unlike emails or ads that might get ignored, WhatsApp messages have a 98% open rate. We create customized, consent-based campaigns that deliver real value — from flash sales and announcements to loyalty offers and feedback collection. All messages are professional, timely, and aligned with your brand tone.</p>', 'assets/admin/uploads/PageSection/thumb/1748865643305912802.png', 'R-2-L', '1', '2025-06-02 11:00:43', '2025-06-02 11:00:43'),
(12, 2, 'About TSMS.ae', 'The Tech Soft Media Company', '<p style=\"-webkit-font-smoothing: antialiased; padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: none; vertical-align: baseline; font-size: 17px; line-height: 28px; color: rgb(106, 106, 142); font-family: &quot;Open Sans&quot;, sans-serif; text-align: center; background-color: rgb(255, 248, 242);\">At&nbsp;<span class=\"text-radius text-light text-animation bg-b\" style=\"-webkit-font-smoothing: antialiased; padding: 0px 3px; margin: 0px; outline: none; vertical-align: baseline; --bs-text-opacity: 1; color: transparent; border-radius: 3px; font-weight: bold; background-clip: text; -webkit-text-fill-color: transparent; animation: 6s linear 0s infinite normal none running hue; background-image: linear-gradient(to right, rgb(103, 58, 183) 0%, rgb(233, 30, 99) 36%, rgb(233, 30, 99) 65%, rgb(103, 58, 183) 100%);\">TSMS.ae</span>, we are dedicated to empowering businesses with cutting-edge digital solutions. As a leading provider of&nbsp;<span class=\"text-radius text-light text-animation bg-b\" style=\"-webkit-font-smoothing: antialiased; padding: 0px 3px; margin: 0px; outline: none; vertical-align: baseline; --bs-text-opacity: 1; color: transparent; border-radius: 3px; font-weight: bold; background-clip: text; -webkit-text-fill-color: transparent; animation: 6s linear 0s infinite normal none running hue; background-image: linear-gradient(to right, rgb(103, 58, 183) 0%, rgb(233, 30, 99) 36%, rgb(233, 30, 99) 65%, rgb(103, 58, 183) 100%);\">Web Development, Digital Marketing, Email Marketing, WhatsApp Marketing,</span>&nbsp;and&nbsp;<span class=\"text-radius text-light text-animation bg-b\" style=\"-webkit-font-smoothing: antialiased; padding: 0px 3px; margin: 0px; outline: none; vertical-align: baseline; --bs-text-opacity: 1; color: transparent; border-radius: 3px; font-weight: bold; background-clip: text; -webkit-text-fill-color: transparent; animation: 6s linear 0s infinite normal none running hue; background-image: linear-gradient(to right, rgb(103, 58, 183) 0%, rgb(233, 30, 99) 36%, rgb(233, 30, 99) 65%, rgb(103, 58, 183) 100%);\">SMS Marketing</span>, we help brands grow, engage, and convert. With a passion for innovation and a commitment to excellence, our team delivers tailored strategies that drive real results. Whether you need a high-performance website, a powerful digital presence, or effective communication tools, TSMS.ae is your trusted partner in digital success.</p>', 'assets/admin/uploads/PageSection/thumb/17489464781684484067.webp', 'R-2-L', '1', '2025-06-03 09:27:58', '2025-06-03 09:27:58'),
(13, 2, 'Empowering Brands Through Innovation and Strategy', 'Our Mission', '<p data-start=\"99\" data-end=\"527\">Our mission is to empower businesses with innovative digital solutions that drive growth, engagement, and success. We aim to simplify the digital journey for our clients by delivering high-quality web development and marketing services tailored to their unique goals. Through creativity, technology, and a customer-first approach, we strive to build lasting partnerships and help brands thrive in an ever-evolving digital world.</p>', 'assets/admin/uploads/PageSection/thumb/1748946772179962819.jpg', 'L-2-R', '2', '2025-06-03 09:32:52', '2025-06-03 09:32:52'),
(14, 2, 'Shaping the Future of Digital Excellence', 'Our Vision', '<p data-start=\"131\" data-end=\"581\">Our vision is to be a leading force in the digital industry by setting new standards in web development and digital marketing. We aim to create meaningful digital experiences that not only meet today’s needs but also anticipate tomorrow’s opportunities. By staying ahead of trends and embracing innovation, we envision a future where every business—no matter its size—can succeed online with the right tools, strategies, and support.</p>', 'assets/admin/uploads/PageSection/thumb/1748946918653621797.jpg', 'R-2-L', '3', '2025-06-03 09:35:18', '2025-06-03 09:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('published','draft') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `procedures`
--

CREATE TABLE `procedures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `order_no` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section_titles`
--

CREATE TABLE `section_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('testimonial','faq','feature','procedure','why_choose_us','document','feature_image','hero_section','intro_section','why_us_image','call_to_action','residency-visa') NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_titles`
--

INSERT INTO `section_titles` (`id`, `page_id`, `type`, `title`, `subtitle`, `description`, `status`, `created_at`, `updated_at`) VALUES
(4, 3, 'testimonial', 'What Our Clients Say', 'Real Feedback. Real Results.', 'We take pride in the success of our clients. Here’s what they have to say about our web development services — from startups to growing businesses, we’ve helped them build a strong digital foundation.', 'active', '2025-06-02 09:35:46', '2025-06-02 09:35:46'),
(5, 3, 'why_us_image', 'Your Vision, Our Expertise', 'Why Choose Us for Web Development', 'We don’t just build websites — we craft digital experiences that connect, engage, and convert. With a focus on quality, performance, and user experience, we ensure every website we develop aligns with your brand and drives results.', 'active', '2025-06-02 09:36:19', '2025-06-02 09:57:33'),
(6, 3, 'faq', 'Frequently Asked Questions', 'Have Questions? We’ve Got Answers.', 'Find quick answers to common queries about our web development services. If you don’t see your question here, feel free to reach out — we’re always here to help.', 'active', '2025-06-02 09:37:06', '2025-06-02 09:37:06'),
(7, 4, 'faq', 'FAQ', 'Frequently Asked Questions & Client Feedback', 'Learn more about our SEO services and hear what our satisfied clients have to say.', 'active', '2025-06-02 09:41:23', '2025-06-02 09:41:23'),
(8, 4, 'testimonial', 'What Our Clients Say', 'Real Stories from Real Businesses We\'ve Helped Succeed', 'We take pride in delivering results that matter. Here’s what our clients have to say about working with us—from improved rankings to increased sales and stronger online presence.', 'active', '2025-06-02 09:42:32', '2025-06-02 09:42:32'),
(9, 4, 'why_us_image', 'Why Choose Us', 'Why Trust Us With Your SEO?', 'We don’t just rank websites — we build lasting online visibility and credibility for your brand.', 'active', '2025-06-02 09:43:21', '2025-06-02 09:43:21'),
(10, 6, 'why_us_image', 'Why Choose Us for Email Marketing', 'Strategic Campaigns That Deliver Real Results', 'We combine creativity, data, and technology to build impactful email campaigns that speak directly to your audience', 'active', '2025-06-02 10:28:37', '2025-06-02 10:28:37'),
(11, 6, 'faq', 'Frequently Asked Questions', 'Everything You Need to Know About Our Email Marketing Services', 'We combine creativity, data, and technology to build impactful email campaigns that speak directly to your audience', 'active', '2025-06-02 10:28:58', '2025-06-02 10:28:58'),
(12, 6, 'testimonial', 'What Our Clients Say', 'Trusted by Businesses That Want Results', 'We’ve helped businesses of all sizes grow through smart and effective email marketing. Here’s what some of our satisfied clients have to say about working with us.', 'active', '2025-06-02 10:29:30', '2025-06-02 10:29:30'),
(13, 5, 'testimonial', 'What Clients Are Saying', 'Trusted by Businesses That Value Growth', 'Our results speak for themselves — but our clients say it best. Here’s what businesses like yours experienced by working with us.', 'active', '2025-06-02 10:29:31', '2025-06-02 10:29:31'),
(14, 5, 'faq', 'Frequently Asked Questions', 'Answers to Common Questions About Our Digital Marketing Services', 'Have questions about how digital marketing works or what to expect? We\'ve answered the most common queries to help you understand our process, timelines, and how we can help grow your business online.', 'active', '2025-06-02 10:30:20', '2025-06-02 10:30:20'),
(15, 5, 'why_us_image', 'Why Choose Us', 'Digital Marketing That Delivers Real Growth', 'We focus on strategy, performance, and results — helping brands grow in a digital-first world.', 'active', '2025-06-02 10:30:53', '2025-06-02 10:30:53'),
(16, 7, 'testimonial', 'What Our Clients Say', 'Trusted by Brands That Value Direct Customer Engagement', 'We’ve helped businesses grow faster and communicate better with WhatsApp. Here’s what they have to say — plus answers to common questions.', 'active', '2025-06-02 10:53:57', '2025-06-02 10:53:57'),
(17, 7, 'faq', 'FAQ\'S', 'Frequently Asked Questions', 'Get the Info You Need About WhatsApp Marketing', 'active', '2025-06-02 10:54:32', '2025-06-02 10:54:32'),
(18, 7, 'why_us_image', 'Why Choose Us', 'Your Partner for Smart, Compliant WhatsApp Marketing', 'We don’t just send messages — we craft strategies that drive clicks, conversations, and conversions.', 'active', '2025-06-02 10:55:12', '2025-06-02 10:55:12'),
(19, 8, 'why_us_image', 'Why Choose Our SMS Marketing Services', 'Fast, Reliable, and Impactful Messaging', 'We deliver SMS marketing solutions that are designed to reach your audience instantly and effectively. Our expertise ensures your messages are personalized, timely, and compliant — helping you boost engagement and achieve your marketing goals.', 'active', '2025-06-02 10:59:50', '2025-06-02 10:59:50'),
(20, 8, 'faq', 'Frequently Asked Questions', 'Answers to Your SMS Marketing Queries', 'Got questions about how SMS marketing works or how it can benefit your business? We’ve compiled answers to the most common questions to help you understand our services better.', 'active', '2025-06-02 11:00:55', '2025-06-02 11:00:55'),
(21, 8, 'testimonial', 'What Our Clients Say', 'Success Stories from Our SMS Marketing Clients', 'Hear directly from businesses that have transformed their customer engagement with our effective SMS marketing campaigns.', 'active', '2025-06-02 11:02:02', '2025-06-02 11:02:02'),
(22, 2, 'why_us_image', 'What Our Clients Say', 'Success Stories from Our SMS Marketing Clients', 'Hear directly from businesses that have transformed their customer engagement with our effective SMS marketing campaigns.', 'active', '2025-06-03 09:21:15', '2025-06-03 09:21:15'),
(23, 2, 'faq', 'What Our Clients Say', 'Success Stories from Our SMS Marketing Clients', 'Hear directly from businesses that have transformed their customer engagement with our effective SMS marketing campaigns.', 'active', '2025-06-03 09:21:37', '2025-06-03 09:21:37'),
(24, 2, 'testimonial', 'What Our Clients Say', 'Success Stories from Our SMS Marketing Clients', 'Hear directly from businesses that have transformed their customer engagement with our effective SMS marketing campaigns.', 'active', '2025-06-03 09:23:48', '2025-06-03 09:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `status` enum('publish','draft') NOT NULL,
  `banner_title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `banner_subtitle` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `other_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('publish','draft') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_features`
--

CREATE TABLE `service_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_sections`
--

CREATE TABLE `service_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `subtitle` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` enum('rtl','ltr') NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0L5gzBbGhELP6DAaWbvHGcqbwVZIgNVlLOeRab6U', NULL, '66.249.92.130', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.7103.113 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidk9CYnk5eWo0TmY4cXBRbGIwc2tVYm11ZkVPZVNlV1hKaUxrTTJCdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749795084),
('0MFIB1v68TYvqZe5XhLiR2vZzEsbYrI3oNZWUSGL', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOVgyRG1Cc2FhWkI3VVJqZm1kRnJ1Z2pnRXIwOU80dHlUeVJ2MGg3dSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749800971),
('5S5iGmAKHSRlUuwpKiD7sOtGnEzMOgeXed6sSTsW', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGZ5akl0TjR4OUpwanlHa2ZZSU45U010SDJZV2ZhVHpjb3YzY2V5QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749793387),
('9yiDY5iXa6EboEIDxrV88qn4nZv1p0FZ1jupxwqw', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWRvN3lwOFcwZUltaVNNeWhQSWV4cUZQRGxBaDJzVVpFZ2tJY0JDaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749800622),
('AdA61Ce6281xvy5XNzpCpe9FF5AD07rjDRmGxZu8', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUXFRUEw3NGlsOERPanNsSU01YThwenRhNm9FcTJDVE1ZNzlCNlhVTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749797992),
('aib51y3az0o5rYorRQIOmdegseqe4mJCQdlw5ah4', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicDgxSndNNmhIZnJYbHloWE5vZHBoZUhiOEJOblU3bFJaeDY4b0RZOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749793077),
('C9TbIaPN380u5MOE3CJI23ZLBNsD9N2UVQmhuo0O', NULL, '2a03:2880:f806:1b::', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2d6UWtrRE84dFROakYwWGNSTW1zNTh6Uk5ibGlSN2JzR0NlbDhsTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749799953),
('chVLuAsCJFRBHqJHdt3PIHSD35NVXKu6dxHtvIbp', 1, '119.160.215.123', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:139.0) Gecko/20100101 Firefox/139.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYzB5NlB0M0JDOGJtblpkM2trRDhBM3JtZXhtOHF0VmpaelBIT2hudSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vdHNtcy5hZS9wcmljaW5ncyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1749800256),
('DD9ktndVC0HtJ9AJBhkqHnQ98od4MUe3fUcSR5wp', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSTRnelNSbmZUQjRPQlhMSXRmcXE0cGVvMDZjY3FpZWZWaG9vZXR2cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749796095),
('DOnzx86PXptNlinPYSjVUxfTHouao3aMg6Stq3vl', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXBST3ZvcnQxeUZ4czBGdWp6T2ZSeHgzUk56ZHNrYUw0VUpGbnpZdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749795524),
('f70yrJkiTgr1jOfUNg3lgAu5M9WQOa8DjSTSnOvo', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVnBYQ255c09pMUdpd0RaaThCTjhSVGNUSGltNnVsT2FLMEw2MmU5aCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749796701),
('GWOvxp2AfnyYiR4lKPDHXD3AL0mpgeIwWlIsAMAg', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZFU2U1JDZ2hSSkFZVDZva3pHc0lVSmgzQ3NCMzZUQmdTZ3RuQkZDSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749800317),
('H2MdyI0rVFMiSxvDNCZII3TnnuuItll1abYHQUoS', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR3lWbXBNQVU0VFRxdWF4RzR6Qk5DS1QwSThxWXlDTktRV3cwR3FjcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749794889),
('JCF1fs45sl9Y4kSpUYIFJJWjvj6SSgFc4UGCrzjl', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiajdObkFrQnBlQjl2UDdtWHNGVzE3SFZrZk9HbkVMeVp5M292SzcxViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749794283),
('JytHUlemLRHrvGJoc7MqqYm19zuKkTgxeqMOscEy', NULL, '192.81.218.225', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRjZobnNUMEgxZTR2MnQ1OExRVGl1N2FYRFdjQlRyRFo2b2tNNGwwZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vd3d3LnRzbXMuYWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1749797319),
('kRC7NrJV0BUyO6tj61RxIi0Dx3UOQ3WjGNda8g5r', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOEJjOEF4OENsRzhBNTVGN0t4Snhtd2p3WWVPdUhRYUlRYXlNNk8xSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749799416),
('LmHk75RpZ6mWJxB9fRiOmaYnxyute38JgcJP9Svt', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0h1ZE15MjFJUmRLdlpZcjFIUFFOOVlGQVNYNXJ6bmRFNUI2NVpIQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749795794),
('mZInCjErVWh7zOA5f0Yf3KQWnqsmg3ZXxI9aFw2N', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRW9vRFIwRzVSWnB1T0ZLQ2dUNUlWUnZieGdOMFVkU21rMmZsM3VlMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749794585),
('QCfqZZMJJN5ApRcyGhcgk78JtVy3M8k5WH09R5AY', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSzliZ051WDdSbGxROXh5Vm1Cb1hscEJ6UkxNNlRIdjhyeFlhSGxmeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749799717),
('R9ptamriX9DIONJ7Flyj0KxbTGKqNyUKCYdOcuR1', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieUFVd2E1aGVCYkNaNVZhV2FaN1V0RmNCelBKaGpHOVVXVDhoT2FFYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749798214),
('s2II4HMazIuBsozoFGNK4xxxqEo01vpTyLysU4Dk', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSldUNFdXbkpNeFI3N2NBdFZtUVpTZXpwS0F1WldTMVFoc09LaDFUYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749792782),
('T6MCNb94DgBAF9Js4Igtl1HFiFIyTJ2953JJ8lFx', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiREEzaGdpMDJwN1J5VFJ6T0g5OFVoekZ3UXI2YmVJN2xXamlQRU1iQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749797607),
('TspoS4EUXC9Ukxhp7Xql86jfkk472Pokcxdxp865', NULL, '192.81.218.225', 'Go-http-client/1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFk1bmNsdzVHVnZiWUhMTVYwajkwdUw3RnVmZzhHYjZGWjdwY3NXMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749797319),
('uaPapGam3jFM9AZWGhAVNhjRKY7bee8TJFpPbTpp', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiemg0cHh3S1IxM0k3MXlyd0tqUE4wMXZvMzkwS2dPQnRyMnZNV2tuNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749800020),
('uTOSinCdujQ8vMcvoNpqHhLbCamQxUygOipfpBIa', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTU13aWZCN0V1d3o3d0ZUU0JZZjk4SVRBV2NuUWg1Q1BYOFR2ZE91RCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749797002),
('Vu059TE7R19YRggQnnxGlPnbnEZcuSKpNTxiX1TA', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRThKRUU2MVBXZElVd05wZm1Fem8xQmZ1MHprYXB3Mkd0NGZ1bkJ2SiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749798510),
('VyC9A7fbVb7tGJWi32Nl8fbGUVsqjyVzWuolBhse', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkJLTGJ1c256MUo5eEFFNm91c0pHNXkzMEhsbkxDOUp5VHp2TmpNZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749793993),
('XJVqdrcli5HOn5vzoWc11d51vuw9coOiaaKNkjB8', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWdqa2ozeVR3WU1hamxoZjJGYnU4RXpvRU1NS0Z1QURTdWNkcFh4ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749795194),
('yCasacK1vUYo821mjUo4v0RmOVZLE1rtlzbgBtPL', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUnp3aVA2UDM4VGxPM1RubFRXaE4yZml5VVFmdXlxeEFJNTU3WThDSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749796397),
('ymgrHAME9AITzz3UocYR45YK4tT0SFA5lWeDPWXF', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOURIcUJFY0wxSkMzN0habVVmRUNvSzJTOGh4bjNqOFVac2Rka0xYZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749797304),
('zh6QOqQoHK5KoyiDT5jWkSZPvbfj1257MuZfWfnX', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSlJIenNvZWsxQTVEMDlpZE5YU0hWbVlHUm90RmhjM2NqQ1FiZmt5cSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749793693),
('ZL44KAjS3NMPACvge63CD3EBMOKDL5CHkS0mOBFW', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkF3ckY0MjBid1JFNW04MjhabXR6ekV4ZTBRQ2dnZEZFdWhTbEY3WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749799113),
('zQMciv0OvqiPpVoTYNonqXF4C4to5Zux6ijCQ8Oh', NULL, '206.189.89.152', 'Panopta v1.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0VjVjRDa0lFTml0SjdQR05OeUVkbjdpSFprTmxscUJVNHZTanZyaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU6Imh0dHBzOi8vdHNtcy5hZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749798812);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `home_beadcrum_img` varchar(255) DEFAULT NULL,
  `footer_logo` varchar(255) DEFAULT NULL,
  `fav_icon` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `phone_no_2` varchar(255) DEFAULT NULL,
  `whatsapp_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `fb_link` varchar(255) DEFAULT NULL,
  `insta_link` varchar(255) DEFAULT NULL,
  `yt_link` varchar(255) DEFAULT NULL,
  `tiktok_link` varchar(255) DEFAULT NULL,
  `whatsapp_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `home_beadcrum_img`, `footer_logo`, `fav_icon`, `phone_no`, `phone_no_2`, `whatsapp_no`, `email`, `address`, `fb_link`, `insta_link`, `yt_link`, `tiktok_link`, `whatsapp_link`, `created_at`, `updated_at`) VALUES
(1, 'assets/admin/uploads/setting/logo/17539490241109715164.png', 'uploads/home_breadcrumb.jpg', 'assets/admin/uploads/setting/footer_logo/17539490241344585040.webp', 'assets/admin/uploads/setting/fav_icon/1748864379160912472.png', '+971547067807', NULL, '+971547067807', 'admin@tsms.ae', 'Dubai, United Arab Emirates', 'https://facebook.com/example', 'https://instagram.com/example', 'https://youtube.com/example', 'https://tiktok.com/@example', 'https://wa.me/+971547067807', '2025-06-02 03:28:15', '2025-07-31 03:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `image` text NOT NULL,
  `serial_no` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `button_title` varchar(255) DEFAULT NULL,
  `button_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `image`, `serial_no`, `status`, `button_title`, `button_url`, `created_at`, `updated_at`) VALUES
(4, 'World Peace Movement', 'With unwavering Devotion & Commitment our 5 Year Plan aims to Unveil a presentation showcasing the Transformative Power of Peace, a Message Resonating Universally without Prejudice or Bias.', '17528342931359696916.jpg', 1, 1, NULL, NULL, '2025-06-26 09:14:09', '2025-07-18 05:24:53'),
(5, '313 Heroes of Badr Project', '313 Heroes of Badr Project . Wisdom House was recently purchased to serve as an educational and community centre. It will be the Heart & Soul of Knowledge, a Place where dreams are nurtured, and talents are ignited.', '17521400401644868330.jpg', 2, 1, NULL, NULL, '2025-06-26 09:15:48', '2025-07-17 06:19:29'),
(6, 'Transitioning into the Metaverse', 'Our Vision is utilising the Technology of today to Spread the Message of Peace in an Effective and Engaging Manner, further Accelerating the Message of Peace and Purpose of Life.', '17521400291431150209.jpg', 4, 1, NULL, NULL, '2025-06-26 09:16:16', '2025-07-17 06:19:21'),
(7, 'Pakistan Zawiayh Visionary Project', 'Contribute towards the Pakistan Zawiyah Expansion that Practically implements the Teachings of the Prophet ﷺ by Serving Countless needs Towards Allāh’s Creation', '1752140035445331747.jpg', 3, 1, NULL, NULL, '2025-06-26 09:16:53', '2025-07-18 02:33:57'),
(9, 'Hijrah Tour', 'Hijrah (Makkah 2 Madina)', '17528446571835054381.jpg', 1, 1, 'Register', 'https://mhow.org/hijrah', '2025-07-18 08:17:37', '2025-07-18 08:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `tempelate_files`
--

CREATE TABLE `tempelate_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `long_description` text DEFAULT NULL,
  `icon` varchar(255) NOT NULL,
  `tempelate_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tempelate_files`
--

INSERT INTO `tempelate_files` (`id`, `title`, `subtitle`, `long_description`, `icon`, `tempelate_file`, `created_at`, `updated_at`) VALUES
(1, 'UAE', 'Contains NOC templates for Etisalat and DU along with the instructions.', 'Contains NOC templates for Etisalat and DU along with the instructions.', 'tempelate_icons/mO3AYYaRvTDoMFKXWUUcMKtvQX6H1v1261Xk914K.png', 'tempelate_zips/R64e8ekt8YyzRgRaKSaCE6zRJBOP5CFXEpdAX0Zo.zip', '2025-06-03 05:14:04', '2025-06-03 05:14:04'),
(2, 'KSA', 'Contains a generic NOC and mobily NOC with instructions and samples.', 'Contains a generic NOC and mobily NOC with instructions and samples.', 'tempelate_icons/ncGRptoLaMCPgmgyPbcnoXwADGRGIwhRtO9nJblT.png', 'tempelate_zips/aYWpTwLlKE4Lb6FwWezpANsfWr4k9Hr8mpqFBfJn.zip', '2025-06-03 05:14:53', '2025-06-03 05:14:53'),
(3, 'Oman', 'Contains NOC template for Ooredoo separately and a combined one for Oman Tel and Ooredoo.', 'Contains NOC template for Ooredoo separately and a combined one for Oman Tel and Ooredoo.', 'tempelate_icons/pNgxi5GnT5yu4pByVNurs6ODbkkv7ZpiJt4nPEmk.png', 'tempelate_zips/7ge7jjJEzrhrwcSNS0nfImsci9I0iT7tZGatTbcq.zip', '2025-06-03 05:15:28', '2025-06-03 05:15:28'),
(4, 'Kuwait', 'Contains NOC templates for Ooredoo, Wataniya and Zain operators separately.Contains NOC templates for Ooredoo, Wataniya and Zain operators separately.', 'Contains NOC templates for Ooredoo, Wataniya and Zain operators separately.Contains NOC templates for Ooredoo, Wataniya and Zain operators separately.', 'tempelate_icons/4r7jOFLNeGsGwKZrxJabvBE3C4bvLrpHOotDI20V.png', 'tempelate_zips/ZfdFsyUu0rnw0GoDEGdnHQAwJ88jZ4vAva6kt5eY.zip', '2025-06-03 05:16:22', '2025-06-03 05:16:22'),
(5, 'Qatar', 'Contains a generic NOC template for all the operators in Qatar.', 'Contains a generic NOC template for all the operators in Qatar.', 'tempelate_icons/oRPXmHfduFvb9W4UzgCHoBSmasyfDdjlLTFysPFz.png', 'tempelate_zips/2h7KkJYYied52J2O50X9qPfurgosLAmQmUkrJnXR.zip', '2025-06-03 05:16:50', '2025-06-03 05:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `order_no` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `page_id`, `name`, `feedback`, `designation`, `order_no`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 3, 'Sarah Khan', '“The team delivered exactly what we envisioned — a sleek, fast, and easy-to-navigate website that boosted our online presence. Highly recommended!”', 'Startup Founder', 1, 'active', 'assets/admin/uploads/testimonial/1748862588.jpg', '2025-06-02 10:09:48', '2025-06-02 10:10:03'),
(2, 3, 'Ayesha', '\"Working with the best team it was a seamless experience. He delivered a sleek and professional website that perfectly matched our company\'s vision. His attention to detail and timely delivery impressed us all. Highly recommended for web development!\"', 'Project Manager', 1, 'inactive', 'assets/admin/uploads/testimonial/1748866335.png', '2025-06-02 11:12:15', '2025-06-03 07:07:53'),
(3, 3, 'Farhan Ali', '\"Working with the best team it was a seamless experience, responsive design. His work ethic is impressive, and he always kept us updated throughout the development process. Very reliable and easy to communicate with.\"', 'IT Manager', 1, 'active', 'assets/admin/uploads/testimonial/1748866421.png', '2025-06-02 11:13:41', '2025-06-03 07:08:18'),
(4, 3, 'Ali  Hamza', '\"Working with the best team it was a seamless experience, responsive design. His work ethic is impressive, and he always kept us updated throughout the development process. Very reliable and easy to communicate with.\"', 'IT Manager', 1, 'active', 'assets/admin/uploads/testimonial/1748866424.png', '2025-06-02 11:13:44', '2025-06-03 07:08:43'),
(5, 4, 'Imran Javed', '\"Working with the best team it was a seamless experience. He handled every challenge with confidence and delivered a website that’s both beautiful and fast. A great asset for any tech project!\"', 'enior Developer', 1, 'active', 'assets/admin/uploads/testimonial/1748929743.png', '2025-06-03 04:49:03', '2025-06-03 07:09:12'),
(6, 4, 'Usman Tariq', '\"\"Working with the best team it was a seamless experiencet website and nailed it! It’s clean, user-friendly, and represents our brand exactly how we wanted. Would absolutely recommend him for startups and small businesses.\"', 'Usman Tariq', 1, 'active', 'assets/admin/uploads/testimonial/1748929795.png', '2025-06-03 04:49:55', '2025-06-03 07:09:34'),
(7, 4, 'Hira Sheikh', '\"it built our startup’s first website and nailed it! It’s clean, user-friendly, and represents our brand exactly how we wanted. Would absolutely recommend him for startups and small businesses.\"', 'Head of Marketing', 1, 'active', 'assets/admin/uploads/testimonial/1748929843.png', '2025-06-03 04:50:43', '2025-06-03 07:09:46'),
(8, 4, 'Maria Anwar', '\"we understood our business needs right from the beginning. He designed a website that’s not only visually appealing but also aligned with our target audience. I truly appreciated his professionalism and quick delivery.\"', 'Business Consultant', 1, 'active', 'assets/admin/uploads/testimonial/1748929928.png', '2025-06-03 04:52:08', '2025-06-03 07:09:57'),
(9, 5, 'Zainab Kamal', '\"it was amazing to work with. He built a stunning website for my event planning business that truly reflects my style and services. The site is fast, easy to use, and has already brought in new clients!\"', 'Event Planner', 1, 'active', 'assets/admin/uploads/testimonial/1748930147.png', '2025-06-03 04:55:47', '2025-06-03 07:10:22'),
(10, 5, 'Mahnoor Rehman', '\"I needed a stylish blog that matched my personality and content — i delivered exactly what I had in mind. He was patient with my feedback and super quick with updates. Totally love my new site!\"', 'Blogger & Influencer', 1, 'active', 'assets/admin/uploads/testimonial/1748930196.png', '2025-06-03 04:56:36', '2025-06-03 07:10:37'),
(11, 5, 'Huma Saleem', '\"Working with smooth and professional experience. He created a clean, modern site for our digital agency, and he handled everything from layout to SEO basics. Highly recommended!\"', 'Digital Strategist', 1, 'active', 'assets/admin/uploads/testimonial/1748930241.png', '2025-06-03 04:57:21', '2025-06-03 07:10:55'),
(12, 5, 'Areeba Khalid', '\"As a fashion business owner, visual appeal was everything for me — and  understood that. He crafted a beautiful, functional website for my boutique that really elevated my brand.\"', 'CEO', 1, 'active', 'assets/admin/uploads/testimonial/1748930285.png', '2025-06-03 04:58:05', '2025-06-03 07:11:07'),
(13, 6, 'Hamza Nadeem', '\"Working with the best team it was a seamless experience He understood our vision and turned it into a responsive, well-designed website. Looking forward to working with him again.\"', 'Creative Director', 1, 'active', 'assets/admin/uploads/testimonial/1748930845.png', '2025-06-03 05:07:25', '2025-06-03 07:11:34'),
(14, 6, 'Salman Farooq', '\"We needed a fast-loading and SEO-friendly site for our SaaS product —  nailed it. He’s responsive, quick, and knows exactly what he\'s doing. Highly recommended for startups!\"', 'Founder', 1, 'active', 'assets/admin/uploads/testimonial/1748930873.png', '2025-06-03 05:07:53', '2025-06-03 07:11:44'),
(15, 6, 'Danish Shah', '\"i built our entire online store from scratch, and it’s working perfectly. From design to cart functionality, everything was delivered professionally. Great communication too!\"', 'E-commerce Consultant', 1, 'active', 'assets/admin/uploads/testimonial/1748930925.png', '2025-06-03 05:08:45', '2025-06-03 07:11:57'),
(16, 6, 'Usama Qazi', '\"I was impressed with understanding of both design and functionality. He delivered a modern website that complements our marketing services. Smooth experience from start to finish.\"', 'Digital Marketer', 1, 'active', 'assets/admin/uploads/testimonial/1748930968.png', '2025-06-03 05:09:28', '2025-06-03 07:12:12'),
(17, 7, 'Laiba Rizwan', '\"i turned my messy ideas into a clean, beautiful website that matches my brand perfectly. He was so patient and professional throughout. Highly recommended for any creative!\"', 'Content Creator', 1, 'active', 'assets/admin/uploads/testimonial/1748935776.png', '2025-06-03 06:29:36', '2025-06-03 07:12:46'),
(18, 7, 'Rabia Zafar', '\"Working with that was a stress-free experience. He delivered exactly what I wanted, stayed in touch, and was always quick to respond. Loved the final result!\"', 'Marketing Consultant', 1, 'active', 'assets/admin/uploads/testimonial/1748935845.png', '2025-06-03 06:30:45', '2025-06-03 07:12:59'),
(19, 7, 'Ahsan Rauf', '\"What impressed me most was attention to detail. He didn\'t just code — he suggested ideas that improved the whole user experience. Very professional and skilled.\"', 'Project Manager', 1, 'active', 'assets/admin/uploads/testimonial/1748935893.png', '2025-06-03 06:31:33', '2025-06-03 07:13:11'),
(20, 7, 'Bilal Ahmed', '\"it is sharp, creative, and very efficient. He built a custom website for our app launch, and the user feedback has been amazing. Will definitely work with him again.\"', 'App Developer', 1, 'active', 'assets/admin/uploads/testimonial/1748935942.png', '2025-06-03 06:32:22', '2025-06-03 07:13:21'),
(21, 8, 'Sana Malik', '\"i built a beautiful portfolio site that showcases my photography in the best way. It’s modern, fast, and easy for my clients to use. Couldn’t be happier!\"', 'Photographe', 1, 'active', 'assets/admin/uploads/testimonial/1748936207.png', '2025-06-03 06:36:47', '2025-06-03 07:13:42'),
(22, 8, 'Hira Imtiaz', '\"My experience  it was amazing! He truly listened to my needs and delivered a website that feels personal, professional, and functional. Highly appreciated!\"', 'Online Coach', 1, 'active', 'assets/admin/uploads/testimonial/1748936235.png', '2025-06-03 06:37:15', '2025-06-03 07:15:38'),
(23, 8, 'Taha Yousuf', 'i developed our e-commerce site with perfect attention to detail. His work was timely and professional, and the site performs great even under heavy traffic.\"', 'Entrepreneur', 1, 'active', 'assets/admin/uploads/testimonial/1748936289.png', '2025-06-03 06:38:09', '2025-06-03 07:14:03'),
(24, 8, 'Imran Baig', '\"What I liked most about working with compony  it was his communication and problem-solving skills. He handled every revision with patience and delivered top-quality work.\"', 'Freelancer', 1, 'active', 'assets/admin/uploads/testimonial/1748936314.png', '2025-06-03 06:38:34', '2025-06-03 07:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `icon` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `whatsapp_no` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` enum('approved','pending','blocked') NOT NULL DEFAULT 'pending',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `icon`, `phone_no`, `whatsapp_no`, `address`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$12$rfqffQjpc59b8T2RbIZRMOpV2JTT0s4Qga2vUjiioy7wZ2ioPgazC', 'admin', 'icon', '+923758365729', '+923758365729', 'Gujranwala', 'approved', 'vDO67dzkTEpX5zbE9t7hGLilqCp5jWxqw7bEmKI4NbyMUmOPBa9Fx7pG8AKH', '2025-06-02 03:28:15', '2025-06-02 03:28:15'),
(2, 'User', 'user@user.com', NULL, '$2y$12$3Ih5ZFtYM3J1M5vUzfhHLeVOmlmfWQqQcgj0UxVGsjtXZE1F0KrAS', 'user', 'icon', '+923758365729', '+923758365729', 'Gujranwala', 'approved', NULL, '2025-06-02 03:28:15', '2025-07-06 08:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_us`
--

CREATE TABLE `why_choose_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `order_no` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `why_us_images`
--

CREATE TABLE `why_us_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `order_no` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_us_images`
--

INSERT INTO `why_us_images` (`id`, `page_id`, `image`, `title`, `subtitle`, `description`, `order_no`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 'assets/admin/uploads/why_us_image/1748861476_683d8224ba678.png', 'Proven Results', 'Skilled Professionals with Proven Experience', 'Our SEO strategies are backed by data, experience, and measurable success.', 1, 'active', '2025-06-02 09:51:16', '2025-06-02 09:51:16'),
(3, 4, 'assets/admin/uploads/why_us_image/1748861594_683d829a0eac4.png', 'Customized Approach', 'Tailored Strategies That Fit Your Business', 'We don’t do cookie-cutter solutions. Every SEO and marketing plan is built around your goals, industry, and audience.', 1, 'active', '2025-06-02 09:53:14', '2025-06-02 09:53:14'),
(4, 4, 'assets/admin/uploads/why_us_image/1748861738_683d832a0cbc0.png', 'Clear Communication', 'Transparent Processes & Regular Updates', 'You’ll always know what we’re doing, how it’s working, and what’s next — with no hidden tactics or jargon.', 1, 'active', '2025-06-02 09:55:38', '2025-06-02 09:55:38'),
(5, 4, 'assets/admin/uploads/why_us_image/1748861909_683d83d5eaab1.png', 'Full-Service Support', 'From Planning to Execution — We’ve Got You Covered', 'Whether you need strategy, content, optimization, or analysis, we provide end-to-end digital support for your growth.', 1, 'active', '2025-06-02 09:58:29', '2025-06-02 09:58:29'),
(6, 3, 'assets/admin/uploads/why_us_image/1748861976_683d84184bdeb.png', 'Experienced Development Team', 'hg', 'Our skilled developers bring years of hands-on experience in building websites that are secure, scalable, and performance-driven.', 1, 'active', '2025-06-02 09:59:36', '2025-06-02 09:59:36'),
(7, 3, 'assets/admin/uploads/why_us_image/1748862013_683d843dc8d7e.png', 'Custom Solutions for Every Business', 'hui', 'We don’t believe in one-size-fits-all. Every website we build is tailored to match your brand, audience, and business goals.', 2, 'active', '2025-06-02 10:00:13', '2025-06-02 10:00:13'),
(8, 3, 'assets/admin/uploads/why_us_image/1748862072_683d8478ca292.png', 'Mobile & SEO Optimized', 'h', 'We create responsive websites that look great on all devices and are structured to perform well in search engines from day one.', 3, 'active', '2025-06-02 10:01:12', '2025-06-02 10:01:12'),
(9, 3, 'assets/admin/uploads/why_us_image/1748862099_683d849339894.png', 'Ongoing Support & Maintenance', 'h', 'Our job doesn’t end after launch. We offer reliable support and maintenance to keep your website running smoothly and up-to-date.', 4, 'active', '2025-06-02 10:01:39', '2025-06-02 10:01:39'),
(10, 6, 'assets/admin/uploads/why_us_image/1748864125_683d8c7d2818d.png', 'Targeted Campaigns', 'fe', 'We craft email campaigns that reach the right audience at the right time, increasing engagement and conversions.', 1, 'active', '2025-06-02 10:35:25', '2025-06-02 10:35:25'),
(11, 6, 'assets/admin/uploads/why_us_image/1748864149_683d8c9576697.png', 'Personalized Content', 'fe', 'Our emails are tailored to speak directly to your customers, boosting open rates and building stronger relationships.', 2, 'active', '2025-06-02 10:35:49', '2025-06-02 10:35:49'),
(12, 6, 'assets/admin/uploads/why_us_image/1748864424_683d8da826147.png', 'Data-Driven Results', 'fe', 'We track and analyze every campaign to continuously improve performance and deliver measurable ROI.', 3, 'active', '2025-06-02 10:40:24', '2025-06-02 10:40:24'),
(13, 5, 'assets/admin/uploads/why_us_image/1748864449_683d8dc10dbcf.png', 'Proven Experience', 'A Track Record of Successful Campaigns', 'Years of running high-performance marketing for startups, SMEs, and global brands.', 1, 'active', '2025-06-02 10:40:49', '2025-06-02 10:40:49'),
(14, 6, 'assets/admin/uploads/why_us_image/1748864501_683d8df57c142.png', 'Advanced Automation', 'fe', 'Save time and maximize impact with automated workflows that respond to user behavior and preferences.', 4, 'active', '2025-06-02 10:41:41', '2025-06-02 10:41:41'),
(15, 5, 'assets/admin/uploads/why_us_image/1748864550_683d8e265e40a.png', 'Personalized Strategy', 'Marketing That Fits Your Business', 'We build strategies based on your unique goals, not one-size-fits-all templates.', 1, 'active', '2025-06-02 10:42:30', '2025-06-02 10:42:30'),
(16, 5, 'assets/admin/uploads/why_us_image/1748864638_683d8e7e302f2.png', 'Transparent Reporting', 'Know Exactly What’s Working', 'Clear, detailed reports that show real performance — no hidden metrics or vague data.', 1, 'active', '2025-06-02 10:43:58', '2025-06-02 10:43:58'),
(17, 5, 'assets/admin/uploads/why_us_image/1748864695_683d8eb71c41a.png', 'Full-Service Support', 'From Planning to Execution', 'End-to-end service that covers everything from strategy to campaign management.', 1, 'active', '2025-06-02 10:44:55', '2025-06-02 10:44:55'),
(18, 8, 'assets/admin/uploads/why_us_image/1748865793_683d9301119ba.png', 'High Open Rates', 'fe', 'SMS messages boast some of the highest open rates among marketing channels, maximizing your campaign’s impact.', 1, 'active', '2025-06-02 11:03:13', '2025-06-02 11:03:13'),
(19, 8, 'assets/admin/uploads/why_us_image/1748865829_683d93255ba82.png', 'Instant Message Delivery', 'fe', 'Your messages reach customers immediately, ensuring timely communication and faster responses.', 2, 'active', '2025-06-02 11:03:49', '2025-06-02 11:03:49'),
(20, 8, 'assets/admin/uploads/why_us_image/1748865870_683d934e21eef.png', 'Personalized Campaigns', 'fe', 'We tailor your messages to fit your audience’s preferences and behaviors, making your communication more effective.', 3, 'active', '2025-06-02 11:04:30', '2025-06-02 11:04:30'),
(21, 8, 'assets/admin/uploads/why_us_image/1748865914_683d937a80220.png', 'Comprehensive Analytics', 'fe', 'Track delivery, engagement, and performance metrics to continuously optimize your SMS marketing strategy.', 4, 'active', '2025-06-02 11:05:14', '2025-06-02 11:05:14'),
(22, 7, 'assets/admin/uploads/why_us_image/1748865950_683d939ed3735.png', 'Official Business API Setup', 'Get Started the Right Way', 'We help you go live on WhatsApp with official access and full compliance.', 1, 'active', '2025-06-02 11:05:50', '2025-06-02 11:05:50'),
(23, 7, 'assets/admin/uploads/why_us_image/1748866035_683d93f3cc99f.png', 'Personalized Campaign Strategy', 'Targeted Messaging That Works', 'Campaigns designed for your audience, goals, and brand tone.', 1, 'active', '2025-06-02 11:07:15', '2025-06-02 11:07:15'),
(24, 7, 'assets/admin/uploads/why_us_image/1748866136_683d945877b1a.png', 'Automation & Efficiency', 'Save Time, Increase Impact', 'Smart replies, scheduled sends, and chatbot flows to streamline communication.', 1, 'active', '2025-06-02 11:08:56', '2025-06-02 11:08:56'),
(25, 7, 'assets/admin/uploads/why_us_image/1748866207_683d949feec2f.png', 'Detailed Reporting', 'Measure Success with Clarity', 'Get insights on delivery rates, opens, clicks, and responses.', 1, 'active', '2025-06-02 11:10:07', '2025-06-02 11:10:07'),
(26, 9, 'assets/admin/uploads/why_us_image/1751863045_686b4f0561566.jpg', 'Title', 'Subtitle', 'Description', 1, 'active', '2025-07-06 23:37:25', '2025-07-06 23:37:25'),
(27, 9, 'assets/admin/uploads/why_us_image/1751863126_686b4f56c6eb7.jpg', 'Title 2', 'Subtitle', 'Descirption', 1, 'active', '2025-07-06 23:38:46', '2025-07-06 23:38:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bcategories`
--
ALTER TABLE `bcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blocks_page_id_foreign` (`page_id`);

--
-- Indexes for table `block_features`
--
ALTER TABLE `block_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `block_features_block_id_foreign` (`block_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `call_to_actions`
--
ALTER TABLE `call_to_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_requireds`
--
ALTER TABLE `document_requireds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elements_page_id_foreign` (`page_id`);

--
-- Indexes for table `element_features`
--
ALTER TABLE `element_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `element_features_element_id_foreign` (`element_id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry_comments`
--
ALTER TABLE `enquiry_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enquiry_comments_enquiry_id_foreign` (`enquiry_id`),
  ADD KEY `enquiry_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_images`
--
ALTER TABLE `feature_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gcategories`
--
ALTER TABLE `gcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indexes for table `hero_sections`
--
ALTER TABLE `hero_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `introduction_sections`
--
ALTER TABLE `introduction_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jcategories`
--
ALTER TABLE `jcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_lines`
--
ALTER TABLE `language_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_lines_group_index` (`group`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_package_category_id_foreign` (`package_category_id`);

--
-- Indexes for table `package_categories`
--
ALTER TABLE `package_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `package_details`
--
ALTER TABLE `package_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_details_package_id_foreign` (`package_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD KEY `pages_type_index` (`type`),
  ADD KEY `pages_status_index` (`status`),
  ADD KEY `pages_route_name_index` (`route_name`);

--
-- Indexes for table `page_sections`
--
ALTER TABLE `page_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_sections_page_id_foreign` (`page_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `procedures`
--
ALTER TABLE `procedures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_titles`
--
ALTER TABLE `section_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_service_category_id_foreign` (`service_category_id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_features`
--
ALTER TABLE `service_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_features_service_id_foreign` (`service_id`);

--
-- Indexes for table `service_sections`
--
ALTER TABLE `service_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_sections_service_id_foreign` (`service_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempelate_files`
--
ALTER TABLE `tempelate_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_us_images`
--
ALTER TABLE `why_us_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bcategories`
--
ALTER TABLE `bcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `block_features`
--
ALTER TABLE `block_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `call_to_actions`
--
ALTER TABLE `call_to_actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `document_requireds`
--
ALTER TABLE `document_requireds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `elements`
--
ALTER TABLE `elements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `element_features`
--
ALTER TABLE `element_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enquiry_comments`
--
ALTER TABLE `enquiry_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature_images`
--
ALTER TABLE `feature_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gcategories`
--
ALTER TABLE `gcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hero_sections`
--
ALTER TABLE `hero_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `introduction_sections`
--
ALTER TABLE `introduction_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jcategories`
--
ALTER TABLE `jcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language_lines`
--
ALTER TABLE `language_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `package_categories`
--
ALTER TABLE `package_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `package_details`
--
ALTER TABLE `package_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `page_sections`
--
ALTER TABLE `page_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `procedures`
--
ALTER TABLE `procedures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `section_titles`
--
ALTER TABLE `section_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_features`
--
ALTER TABLE `service_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_sections`
--
ALTER TABLE `service_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tempelate_files`
--
ALTER TABLE `tempelate_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `why_us_images`
--
ALTER TABLE `why_us_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blocks`
--
ALTER TABLE `blocks`
  ADD CONSTRAINT `blocks_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `block_features`
--
ALTER TABLE `block_features`
  ADD CONSTRAINT `block_features_block_id_foreign` FOREIGN KEY (`block_id`) REFERENCES `blocks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `elements`
--
ALTER TABLE `elements`
  ADD CONSTRAINT `elements_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `element_features`
--
ALTER TABLE `element_features`
  ADD CONSTRAINT `element_features_element_id_foreign` FOREIGN KEY (`element_id`) REFERENCES `elements` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enquiry_comments`
--
ALTER TABLE `enquiry_comments`
  ADD CONSTRAINT `enquiry_comments_enquiry_id_foreign` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiries` (`id`),
  ADD CONSTRAINT `enquiry_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_package_category_id_foreign` FOREIGN KEY (`package_category_id`) REFERENCES `package_categories` (`id`);

--
-- Constraints for table `package_details`
--
ALTER TABLE `package_details`
  ADD CONSTRAINT `package_details_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page_sections`
--
ALTER TABLE `page_sections`
  ADD CONSTRAINT `page_sections_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_service_category_id_foreign` FOREIGN KEY (`service_category_id`) REFERENCES `service_categories` (`id`);

--
-- Constraints for table `service_features`
--
ALTER TABLE `service_features`
  ADD CONSTRAINT `service_features_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `service_sections`
--
ALTER TABLE `service_sections`
  ADD CONSTRAINT `service_sections_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
