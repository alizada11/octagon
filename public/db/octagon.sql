-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2025 at 12:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `octagon`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(5) UNSIGNED NOT NULL,
  `language` varchar(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `language`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'en', 'About Us?', 'At Octagon, we represent the essence of excellence and innovation. We include two leading companies under our umbrella: Viar Design and Art Direction, and Shams Home Services. We strive to provide integrated solutions that combine artistic creativity and professional service, meeting the aspirations of companies and individuals across the region, and enhancing our customers\' experience with a touch of excellence and professionalism.\r\n', 'uploads/about/1747603059_dd8479efde5c9ac364d5.png', '2025-05-18 21:17:39', '2025-05-24 23:45:05'),
(2, 'ar', 'من نحن؟', 'نحن فى أكتاجون نمثل جوهر التميز والابتكار, حيث تنضوى تحت مظلتنا شركتان رائدتان: فيار للتصميم والاخراج الفنى, وشموس للخدمات المنزلية, نسعى الى تقديم حلول متكاملة تجمع بين الابداع الفنى والاحترافية فى الخدمة, تلبى تطلعات الشركة والافراد عبر المنطقة, ونعزز تجربة عملائنا بلمسة من التميز والاحتراف\r\n\r\n', 'uploads/about/1747603059_dd8479efde5c9ac364d5.png', '2025-05-18 21:17:39', '2025-05-24 23:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `country_id`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 1, 'Romal Group', 'Kabu, Afghanistan', '+9339435187', '2025-05-23 22:30:01', '2025-05-23 23:22:51'),
(2, 2, 'Rohullah', 'Albania, street 9', '+9685484545', '2025-05-23 23:22:39', '2025-05-23 23:22:39'),
(4, 1, 'glance group', 'glance group', '+69332654', '2025-05-23 23:27:48', '2025-05-23 23:27:48'),
(5, 70, 'Romal Group Iran', 'Tehran', '+93394351', '2025-05-24 23:49:43', '2025-05-24 23:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `id_first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_second_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_date_of_birth` date DEFAULT NULL,
  `id_third_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_expire_date` date DEFAULT NULL,
  `id_sur_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cr_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cr_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cr_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cr_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cr_gsm` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cr_po_box` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cr_postal_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cr_fax` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cr_establishment_date` date DEFAULT NULL,
  `cr_legal_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cr_expiry_date` date DEFAULT NULL,
  `cr_head_quarter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cr_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_cr_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_head_quarter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_occi_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_expire_date` date DEFAULT NULL,
  `cc_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ta_governorate` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ta_complex_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ta_state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ta_plot_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ta_area` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ta_building_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ta_street_name_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ta_flat_shop_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ta_way_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ta_type_of_activity` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ta_rent_contract_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ta_expire_date` date DEFAULT NULL,
  `ta_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_cr_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_governorate` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_rent_contract_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_poa_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_area` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_license_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_license_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_license_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_expire_date` date DEFAULT NULL,
  `lc_activities_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_activities_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tcc_cr_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tcc_tax_card_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tcc_tin` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tcc_expire_date` date DEFAULT NULL,
  `tcc_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vc_cr_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vc_vat_certificate_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vc_vatin` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vc_expire_date` date DEFAULT NULL,
  `vc_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `created_at`, `id_first_name`, `id_number`, `id_second_name`, `id_date_of_birth`, `id_third_name`, `id_expire_date`, `id_sur_name`, `id_address`, `id_document`, `cr_name_en`, `cr_name_ar`, `cr_number`, `cr_email`, `cr_gsm`, `cr_po_box`, `cr_postal_code`, `cr_fax`, `cr_establishment_date`, `cr_legal_type`, `cr_expiry_date`, `cr_head_quarter`, `cr_document`, `cc_cr_number`, `cc_head_quarter`, `cc_occi_number`, `cc_expire_date`, `cc_document`, `ta_governorate`, `ta_complex_no`, `ta_state`, `ta_plot_no`, `ta_area`, `ta_building_no`, `ta_street_name_no`, `ta_flat_shop_no`, `ta_way_no`, `ta_type_of_activity`, `ta_rent_contract_no`, `ta_expire_date`, `ta_document`, `lc_cr_number`, `lc_governorate`, `lc_rent_contract_no`, `lc_state`, `lc_poa_code`, `lc_area`, `lc_license_type`, `lc_license_name`, `lc_license_number`, `lc_expire_date`, `lc_activities_code`, `lc_activities_description`, `lc_document`, `tcc_cr_number`, `tcc_tax_card_number`, `tcc_tin`, `tcc_expire_date`, `tcc_document`, `vc_cr_number`, `vc_vat_certificate_number`, `vc_vatin`, `vc_expire_date`, `vc_document`, `pid`, `updated_at`) VALUES
(1, '2025-06-10 20:49:32', 'Kylie', '9493443', 'Calhoun', '1976-03-10', 'Patrick Gaines', '1971-01-12', 'Bowen', 'Autem in doloremque ea mollit voluptates est sed consequatur nostrud deleniti consequat Debitis as', '1749588572_1290828df64672cbe2b5.png', 'Hanna Carroll', 'Brody Maloneaaa', '697', 'bucury@mailinator.com', '21312', 'P.O. Box 36686', '123123', '12471138453', '1984-02-26', 'Aute voluptatibus nisssss', '2019-05-04', 'Sit in anim tempore', '1749588572_8b15ef87386fe75a5626.png', '293', 'Corrupti nihil labore est laborum sit deserunt et tempora asperiores et laborum Aliquip non est eiusmod', '312', '1999-10-17', '1749588572_c3916089baa6fc857a48.png', 'Qui nobis doloribus eaque eius amet illum qui id elit sint perspiciatis minim laboris ad voluptatem ', 'Iure mollit corporis vel dolorum est ipsum qui vel', 'Laudantium enim perferendis neque sed incidunt voluptates', 'Dicta illo id libero harum sed voluptate ut earum ', 'Dolor qui ut animi ut enim', 'A exercitationem id ad ut mollitia ducimus digniss', 'Cheyenne Hodge', '123123', '123123', 'Sapiente id ut labore voluptas autem omnis fugiat aut eu enim et pariatur Nulla nulla', '123123', '1977-03-14', '1749588572_488cbff19cc915e52f49.png', '978', 'Voluptatem delectus est et magna in non eius omnis harum aperiam', 'Consectetur iste pariatur Sed quis et debitis tene', 'Itaque quia quidem ad dolores', '123123', 'Eos id atque voluptatem ea ut obcaecati dolor sunt debitis ab modi sed nemo est', 'Voluptas qui id rerum excepteur explicabo Omnis voluptatem maiores eius est esse cum architecto dist', 'Stewart Moreno', '904', '1995-12-09', '123123', 'Corrupti quaerat eius hic inventore dicta aut facere ipsam aut quis', '1749588572_1a052cefbb6273635d55.png', '103', '467', '12312', '1983-01-02', '1749588572_b32be3b824314ce51d8a.png', '681', '646', 'Iste culpa sed molestiae qui ad voluptatem incidid', '1975-10-08', '1749588572_c448cf2fb6debbf6fa25.png', 13, '2025-06-11 10:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `type` enum('email','phone','address','working_hours') NOT NULL,
  `title` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `language` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `icon`, `type`, `title`, `value`, `language`, `created_at`, `updated_at`) VALUES
(1, 'fas fa-envelope', 'email', 'البريد الإلكتروني', 'info@octagon.om', 'ar', '2025-05-18 23:08:44', '2025-05-18 23:15:20'),
(2, 'fas fa-phone', 'phone', 'رقم الهاتف', '46546848', 'ar', '2025-05-18 23:09:29', '2025-05-18 23:09:29'),
(3, ' fas fa-location-dot', 'address', 'العنوان', 'عمان', 'ar', '2025-05-18 23:10:10', '2025-05-18 23:10:10'),
(4, 'fas fa-clock', 'working_hours', 'أوقات العمل', 'يومياً من الساعة 9ص - 10م', 'ar', '2025-05-18 23:10:45', '2025-05-18 23:10:45'),
(5, 'fas fa-clock', 'working_hours', 'Working hours', 'Daily from 9 am to 10 pm', 'en', '2025-05-18 23:11:55', '2025-05-18 23:11:55'),
(6, 'fas fa-location-dot', 'address', 'Address', 'Oman', 'en', '2025-05-18 23:12:55', '2025-05-18 23:12:55'),
(7, 'fas fa-phone', 'phone', 'Phone number', '46546', 'en', '2025-05-18 23:13:43', '2025-05-25 00:47:44'),
(8, 'fas fa-envelope', 'email', 'E-mail', 'info@octagon.om', 'en', '2025-05-18 23:14:23', '2025-05-22 15:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_name_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name_ar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name_en`, `country_name_ar`) VALUES
(1, 'Afghanistan', 'أفغانستان'),
(2, 'Albania', 'ألبانيا'),
(3, 'Algeria', 'الجزائر'),
(4, 'Andorra', 'أندورا'),
(5, 'Angola', 'أنغولا'),
(6, 'Antigua and Barbuda', 'أنتيغوا وبربودا'),
(7, 'Argentina', 'الأرجنتين'),
(8, 'Armenia', 'أرمينيا'),
(9, 'Australia', 'أستراليا'),
(10, 'Austria', 'النمسا'),
(11, 'Azerbaijan', 'أذربيجان'),
(12, 'Bahamas', 'الباهاما'),
(13, 'Bahrain', 'البحرين'),
(14, 'Bangladesh', 'بنغلاديش'),
(15, 'Barbados', 'بربادوس'),
(16, 'Belarus', 'بيلاروس'),
(17, 'Belgium', 'بلجيكا'),
(18, 'Belize', 'بليز'),
(19, 'Benin', 'بنين'),
(20, 'Bhutan', 'بوتان'),
(21, 'Bolivia', 'بوليفيا'),
(22, 'Bosnia and Herzegovina', 'البوسنة والهرسك'),
(23, 'Botswana', 'بوتسوانا'),
(24, 'Brazil', 'البرازيل'),
(25, 'Brunei', 'بروناي'),
(26, 'Bulgaria', 'بلغاريا'),
(27, 'Burkina Faso', 'بوركينا فاسو'),
(28, 'Burundi', 'بوروندي'),
(29, 'Cabo Verde', 'الرأس الأخضر'),
(30, 'Cambodia', 'كمبوديا'),
(31, 'Cameroon', 'الكاميرون'),
(32, 'Canada', 'كندا'),
(33, 'Central African Republic', 'جمهورية أفريقيا الوسطى'),
(34, 'Chad', 'تشاد'),
(35, 'Chile', 'تشيلي'),
(36, 'China', 'الصين'),
(37, 'Colombia', 'كولومبيا'),
(38, 'Comoros', 'جزر القمر'),
(39, 'Congo, Democratic Republic of the', 'جمهورية الكونغو الديمقراطية'),
(40, 'Congo, Republic of the', 'جمهورية الكونغو'),
(41, 'Costa Rica', 'كوستاريكا'),
(42, 'Croatia', 'كرواتيا'),
(43, 'Cuba', 'كوبا'),
(44, 'Cyprus', 'قبرص'),
(45, 'Czech Republic', 'جمهورية التشيك'),
(46, 'Denmark', 'الدانمارك'),
(47, 'Djibouti', 'جيبوتي'),
(48, 'Dominica', 'دومينيكا'),
(49, 'Dominican Republic', 'جمهورية الدومينيكان'),
(50, 'Ecuador', 'الإكوادور'),
(51, 'Egypt', 'مصر'),
(52, 'El Salvador', 'السلفادور'),
(53, 'Equatorial Guinea', 'غينيا الاستوائية'),
(54, 'Eritrea', 'إريتريا'),
(55, 'Estonia', 'إستونيا'),
(56, 'Eswatini', 'إسواتيني'),
(57, 'Ethiopia', 'إثيوبيا'),
(58, 'Fiji', 'فيجي'),
(59, 'Finland', 'فنلندا'),
(60, 'France', 'فرنسا'),
(61, 'Gabon', 'الغابون'),
(62, 'Gambia', 'غامبيا'),
(63, 'Georgia', 'جورجيا'),
(64, 'Germany', 'ألمانيا'),
(65, 'Ghana', 'غانا'),
(66, 'Greece', 'اليونان'),
(67, 'Grenada', 'غرينادا'),
(68, 'Guatemala', 'غواتيمالا'),
(69, 'Guinea', 'غينيا'),
(70, 'Guinea-Bissau', 'غينيا بيساو'),
(71, 'Guyana', 'غيانا'),
(72, 'Haiti', 'هايتي'),
(73, 'Honduras', 'هندوراس'),
(74, 'Hungary', 'المجر'),
(75, 'Iceland', 'آيسلندا'),
(76, 'India', 'الهند'),
(77, 'Indonesia', 'إندونيسيا'),
(78, 'Iran', 'إيران'),
(79, 'Iraq', 'العراق'),
(80, 'Ireland', 'أيرلندا'),
(81, 'Israel', 'إسرائيل'),
(82, 'Italy', 'إيطاليا'),
(83, 'Jamaica', 'جامايكا'),
(84, 'Japan', 'اليابان'),
(85, 'Jordan', 'الأردن'),
(86, 'Kazakhstan', 'كازاخستان'),
(87, 'Kenya', 'كينيا'),
(88, 'Kiribati', 'كيريباتي'),
(89, 'Korea, North', 'كوريا الشمالية'),
(90, 'Korea, South', 'كوريا الجنوبية'),
(91, 'Kosovo', 'كوسوفو'),
(92, 'Kuwait', 'الكويت'),
(93, 'Kyrgyzstan', 'قيرغيزستان'),
(94, 'Laos', 'لاوس'),
(95, 'Latvia', 'لاتفيا'),
(96, 'Lebanon', 'لبنان'),
(97, 'Lesotho', 'ليسوتو'),
(98, 'Liberia', 'ليبيريا'),
(99, 'Libya', 'ليبيا'),
(100, 'Liechtenstein', 'ليختنشتاين'),
(101, 'Lithuania', 'ليتوانيا'),
(102, 'Luxembourg', 'لوكسمبورغ'),
(103, 'Madagascar', 'مدغشقر'),
(104, 'Malawi', 'مالاوي'),
(105, 'Malaysia', 'ماليزيا'),
(106, 'Maldives', 'المالديف'),
(107, 'Mali', 'مالي'),
(108, 'Malta', 'مالطا'),
(109, 'Marshall Islands', 'جزر مارشال'),
(110, 'Mauritania', 'موريتانيا'),
(111, 'Mauritius', 'موريشيوس'),
(112, 'Mexico', 'المكسيك'),
(113, 'Micronesia', 'ميكرونيزيا'),
(114, 'Moldova', 'مولدوفا'),
(115, 'Monaco', 'موناكو'),
(116, 'Mongolia', 'منغوليا'),
(117, 'Montenegro', 'الجبل الأسود'),
(118, 'Morocco', 'المغرب'),
(119, 'Mozambique', 'موزمبيق'),
(120, 'Myanmar', 'ميانمار'),
(121, 'Namibia', 'ناميبيا'),
(122, 'Nauru', 'ناورو'),
(123, 'Nepal', 'نيبال'),
(124, 'Netherlands', 'هولندا'),
(125, 'New Zealand', 'نيوزيلندا'),
(126, 'Nicaragua', 'نيكاراغوا'),
(127, 'Niger', 'النيجر'),
(128, 'Nigeria', 'نيجيريا'),
(129, 'North Macedonia', 'مقدونيا الشمالية'),
(130, 'Norway', 'النرويج'),
(131, 'Oman', 'عُمان'),
(132, 'Pakistan', 'باكستان'),
(133, 'Palau', 'بالاو'),
(134, 'Palestine', 'فلسطين'),
(135, 'Panama', 'بنما'),
(136, 'Papua New Guinea', 'بابوا غينيا الجديدة'),
(137, 'Paraguay', 'باراغواي'),
(138, 'Peru', 'بيرو'),
(139, 'Philippines', 'الفلبين'),
(140, 'Poland', 'بولندا'),
(141, 'Portugal', 'البرتغال'),
(142, 'Qatar', 'قطر'),
(143, 'Romania', 'رومانيا'),
(144, 'Russia', 'روسيا'),
(145, 'Rwanda', 'رواندا'),
(146, 'Saint Kitts and Nevis', 'سانت كيتس ونيفيس'),
(147, 'Saint Lucia', 'سانت لوسيا'),
(148, 'Saint Vincent and the Grenadines', 'سانت فنسنت والغرينادين'),
(149, 'Samoa', 'ساموا'),
(150, 'San Marino', 'سان مارينو'),
(151, 'Sao Tome and Principe', 'ساو تومي وبرينسيب'),
(152, 'Saudi Arabia', 'السعودية'),
(153, 'Senegal', 'السنغال'),
(154, 'Serbia', 'صربيا'),
(155, 'Seychelles', 'سيشل'),
(156, 'Sierra Leone', 'سيراليون'),
(157, 'Singapore', 'سنغافورة'),
(158, 'Slovakia', 'سلوفاكيا'),
(159, 'Slovenia', 'سلوفينيا'),
(160, 'Solomon Islands', 'جزر سليمان'),
(161, 'Somalia', 'الصومال'),
(162, 'South Africa', 'جنوب أفريقيا'),
(163, 'South Sudan', 'جنوب السودان'),
(164, 'Spain', 'إسبانيا'),
(165, 'Sri Lanka', 'سريلانكا'),
(166, 'Sudan', 'السودان'),
(167, 'Suriname', 'سورينام'),
(168, 'Sweden', 'السويد'),
(169, 'Switzerland', 'سويسرا'),
(170, 'Syria', 'سوريا'),
(171, 'Taiwan', 'تايوان'),
(172, 'Tajikistan', 'طاجيكستان'),
(173, 'Tanzania', 'تنزانيا'),
(174, 'Thailand', 'تايلاند'),
(175, 'Timor-Leste', 'تيمور الشرقية'),
(176, 'Togo', 'توغو'),
(177, 'Tonga', 'تونغا'),
(178, 'Trinidad and Tobago', 'ترينيداد وتوباغو'),
(179, 'Tunisia', 'تونس'),
(180, 'Turkey', 'تركيا'),
(181, 'Turkmenistan', 'تركمانستان'),
(182, 'Tuvalu', 'توفالو'),
(183, 'Uganda', 'أوغندا'),
(184, 'Ukraine', 'أوكرانيا'),
(185, 'United Arab Emirates', 'الإمارات'),
(186, 'United Kingdom', 'المملكة المتحدة'),
(187, 'United States', 'الولايات المتحدة'),
(188, 'Uruguay', 'أوروغواي'),
(189, 'Uzbekistan', 'أوزبكستان'),
(190, 'Vanuatu', 'فانواتو'),
(191, 'Vatican City', 'الفاتيكان'),
(192, 'Venezuela', 'فنزويلا'),
(193, 'Vietnam', 'فيتنام'),
(194, 'Yemen', 'اليمن'),
(195, 'Zambia', 'زامبيا'),
(196, 'Zimbabwe', 'زيمبابوي');

-- --------------------------------------------------------

--
-- Table structure for table `employer_requests`
--

CREATE TABLE `employer_requests` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `service_category` varchar(255) NOT NULL,
  `status` enum('pending','reviewed','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer_requests`
--

INSERT INTO `employer_requests` (`id`, `employer_id`, `service_category`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 'Providing integrated home support', 'rejected', '2025-05-25 19:50:38', '2025-05-26 05:49:00'),
(3, 3, 'Design and Art Direction', 'pending', '2025-05-30 02:46:02', '2025-05-30 02:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE `goal` (
  `id` int(11) NOT NULL,
  `language` varchar(5) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `subheading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goal`
--

INSERT INTO `goal` (`id`, `language`, `heading`, `subheading`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'ar', 'هدفنا', 'تكامل الخدمات بين ڤيار وشموس', 'في أوكتاجــون، نؤمن بأن التكامـــل بين ڤيـــار وشمـــوس هو المفتـــاح لتقديـــم حلـــول متكامـــلة وشاملــة تلبي مختلف احتياجات عملائـــــنا ڤيار تبـرز في تقديـم التصاميــــم ألإبداعية والإخراج الفنـي المتـــقن للمؤسسات، مضيفة بعداً فنيا يعكس الهوية الفريــدة لكـــل عميـــــل شموس تتخصص في تلبية الاحتياجات المنزلية واللوجستية بكفـــاءة وموثوقــــية، مما يضمـــن دعــم الأسر والشركـــات بأعـــلى المعــــايير هذا التكـامل يخلق تجربـة سلسة ومتكاملة تـحت مظلـة أو كتاجــــون حيث نهتـم بكل التفاصيل لنحقق لعملائنـا تجربة متميـزة تجمــع بين الاحترافية والاهتمام المتفاني\r\n\r\n', '1747605289_3f777180f2271d4f6ab2.png', '2025-05-18 21:52:00', '2025-05-18 21:54:49'),
(2, 'en', 'Our Goal', 'Integration of services between Viar and Shams', 'At Octagon, we believe that the integration between Viar and Shamous is key to providing integrated and comprehensive solutions that meet the diverse needs of our clients. Viaar excels in providing creative designs and meticulous artistic direction for institutions, adding an artistic dimension that reflects each clients unique identity. Shamous specializes in meeting household and logistical needs with efficiency and reliability, ensuring the highest standards of support for families and businesses. This integration creates a seamless and integrated experience under the Octagon umbrella, where we pay attention to every detail to provide our clients with a distinctive experience that combines professionalism and dedicated attention.\r\n', '1747605447_57a2898e0c97ef38eeef.png', '2025-05-18 21:52:00', '2025-05-18 21:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_educations`
--

CREATE TABLE `jobseeker_educations` (
  `id` int(11) NOT NULL,
  `jobseeker_id` int(11) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `field_of_study` varchar(255) NOT NULL,
  `start_year` year(4) NOT NULL,
  `end_year` year(4) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobseeker_educations`
--

INSERT INTO `jobseeker_educations` (`id`, `jobseeker_id`, `degree`, `institution`, `field_of_study`, `start_year`, `end_year`, `description`, `created_at`, `updated_at`) VALUES
(2, 2, 'Deploma', 'Kaubl Univversity', 'Computer science', 2013, 2016, NULL, '2025-05-20 17:28:15', '2025-05-26 03:00:31'),
(4, 2, 'Master', 'Qom University of Technology', 'Software Enginering', 2020, 2022, NULL, '2025-05-26 03:02:56', '2025-05-26 03:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_experiences`
--

CREATE TABLE `jobseeker_experiences` (
  `id` int(11) NOT NULL,
  `jobseeker_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobseeker_experiences`
--

INSERT INTO `jobseeker_experiences` (`id`, `jobseeker_id`, `company_name`, `job_title`, `start_date`, `end_date`, `description`, `created_at`, `updated_at`) VALUES
(2, 2, 'iText', 'Web developer', '2005-01-12', '2025-05-20', 'description', '2025-05-20 17:31:49', '2025-05-20 17:40:47'),
(3, 2, 'Afghan Glance', 'Web Developer', '2020-01-18', '2025-06-02', 'Web developer should be as many as responsible', '2025-05-26 03:05:06', '2025-05-26 03:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_languages`
--

CREATE TABLE `jobseeker_languages` (
  `id` int(11) NOT NULL,
  `jobseeker_id` int(11) NOT NULL,
  `language` varchar(100) NOT NULL,
  `proficiency` enum('Basic','Intermediate','Fluent','Native') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobseeker_languages`
--

INSERT INTO `jobseeker_languages` (`id`, `jobseeker_id`, `language`, `proficiency`, `created_at`, `updated_at`) VALUES
(1, 2, 'English', 'Fluent', '2025-05-20 18:20:33', '2025-05-20 18:20:33'),
(2, 2, 'Arabic', 'Native', '2025-05-20 18:20:42', '2025-05-20 18:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_passports`
--

CREATE TABLE `jobseeker_passports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `number` varchar(100) NOT NULL,
  `date_of_issue` date NOT NULL,
  `place_of_issue` varchar(150) NOT NULL,
  `date_of_expiry` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobseeker_passports`
--

INSERT INTO `jobseeker_passports` (`id`, `user_id`, `number`, `date_of_issue`, `place_of_issue`, `date_of_expiry`, `created_at`, `updated_at`) VALUES
(1, 2, '314888', '2025-05-23', 'Kabul Afghanistan', '2025-05-23', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_profiles`
--

CREATE TABLE `jobseeker_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `place_of_birth` varchar(255) DEFAULT NULL,
  `living_town` varchar(255) DEFAULT NULL,
  `no_of_children` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `complexion` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country_code` varchar(11) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `available_for_work` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '[]',
  `photo` varchar(255) DEFAULT NULL,
  `cv_file` varchar(255) DEFAULT NULL,
  `id_cart_number` varchar(255) DEFAULT NULL,
  `id_cart_front` varchar(255) DEFAULT NULL,
  `id_cart_back` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobseeker_profiles`
--

INSERT INTO `jobseeker_profiles` (`id`, `user_id`, `full_name`, `dob`, `gender`, `religion`, `place_of_birth`, `living_town`, `no_of_children`, `weight`, `height`, `complexion`, `role`, `marital_status`, `nationality`, `address`, `country_code`, `phone`, `available_for_work`, `photo`, `cv_file`, `id_cart_number`, `id_cart_front`, `id_cart_back`, `created_at`, `updated_at`) VALUES
(1, 2, 'Ali Sazish', '1993-12-22', 'male', 'Islam', 'Esfahan', 'Pakistan', 1, 85, 185, 'olive', NULL, 'married', 'Azerbaijani', 'Kabul, Afghanistan', '+91', '+9339435187', '[]', '1748215191_b2268b1527f4fe67d3f3.jpg', '1747772636_9f092d2ec63a4f31b1de.jpg', NULL, NULL, NULL, '2025-05-20 20:23:56', '2025-06-11 18:11:12'),
(4, 3, 'jawad mohammad', '2025-12-31', 'male', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 'married', 'Omani', 'Kabul', NULL, '+937742545', '[]', '1748190959_fca6113d38183603c42b.jpg', '1748137297_a2e09e066997ef4a89ba.pdf', '43000', '1750115605_f5b68733dee707b9b076.jpg', '1750115605_6bc18cbbe312407dee54.jpg', '2025-05-25 01:41:37', '2025-06-17 03:13:25'),
(7, 10, 'admin', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL, NULL, NULL, NULL, NULL, '2025-05-27 23:01:14', '2025-05-27 23:01:14'),
(8, 11, 'employer', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[]', NULL, NULL, NULL, NULL, NULL, '2025-05-27 23:01:55', '2025-05-27 23:01:55'),
(9, 12, 'Jawad Alizada', '2025-06-06', 'male', 'Islam', 'Canada', '', 0, 0, 0, 'medium', NULL, 'married', 'Omani', 'Candada', '+55', '772474366', '[\"Painting\",\"House Keeping\",\"Elderly Care\"]', '1750115175_adfaf60f9488956dcbf0.jpg', NULL, '21000', NULL, '1750115188_2ca1a0361be50223f903.jpg', '2025-06-06 13:11:19', '2025-06-17 03:10:28'),
(10, 13, 'jawad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"Painting\",\"House Keeping\",\"Elderly Care\"]', NULL, NULL, NULL, NULL, NULL, '2025-06-10 20:11:02', '2025-06-10 20:11:02'),
(11, 14, 'jawad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"Painting\",\"House Keeping\",\"Elderly Care\"]', NULL, NULL, NULL, NULL, NULL, '2025-06-10 20:23:02', '2025-06-10 20:23:02'),
(12, 15, 'jawad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"Painting\",\"House Keeping\",\"Elderly Care\"]', NULL, NULL, NULL, NULL, NULL, '2025-06-11 11:37:33', '2025-06-11 11:37:33'),
(16, 19, 'jawad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"Cooking\",\"Painting\",\"Elderly Care\"]', NULL, NULL, NULL, NULL, NULL, '2025-06-17 00:22:19', '2025-06-17 00:22:19'),
(17, 20, 'mohammad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"Painting\",\"House Keeping\",\"Elderly Care\"]', NULL, NULL, NULL, NULL, NULL, '2025-06-17 01:07:11', '2025-06-17 01:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_skills`
--

CREATE TABLE `jobseeker_skills` (
  `id` int(11) NOT NULL,
  `jobseeker_id` int(11) NOT NULL,
  `skill_name` varchar(100) NOT NULL,
  `level` enum('Beginner','Intermediate','Advanced') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobseeker_skills`
--

INSERT INTO `jobseeker_skills` (`id`, `jobseeker_id`, `skill_name`, `level`, `created_at`, `updated_at`) VALUES
(1, 2, 'Cooking', 'Intermediate', '2025-05-20 18:24:49', '2025-05-20 18:31:28'),
(3, 2, 'baby care', 'Advanced', '2025-05-20 18:32:10', '2025-05-20 18:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `agency_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `submitted_date` datetime DEFAULT current_timestamp(),
  `status` enum('pending','reviewed','rejected','approved') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `category`, `agency_id`, `user_id`, `submitted_date`, `status`) VALUES
(5, 'Hiring professional domestic workers', 1, 2, '2025-05-24 23:41:13', 'approved'),
(6, 'Hiring professional domestic workers', 4, 2, '2025-05-24 23:42:31', 'approved'),
(8, 'Hiring professional domestic workers	', 1, 2, '2025-05-25 17:45:28', 'approved'),
(20, 'Design and Art Direction', 1, 2, '2025-05-30 06:29:15', 'pending'),
(21, 'Design and Art Direction', 4, 2, '2025-05-30 06:43:45', 'pending'),
(22, 'Experience in cooking and cleaning', 1, 2, '2025-05-30 06:44:49', 'pending'),
(23, 'Design and Art Direction', 1, 2, '2025-05-30 06:57:00', 'pending'),
(24, 'Hiring professional domestic workers', 1, 2, '2025-05-30 07:09:53', 'pending'),
(25, 'Design and Art Direction', 1, 2, '2025-05-30 07:11:54', 'pending'),
(26, 'Design and Art Direction', 1, 2, '2025-05-30 15:13:12', 'pending'),
(27, 'Design and Art Direction', 2, 2, '2025-05-30 15:32:45', 'pending'),
(28, 'Design and Art Direction', 2, 2, '2025-05-30 15:58:28', 'pending'),
(29, 'Design and Art Direction', 2, 2, '2025-05-30 16:11:42', 'pending'),
(30, 'Design and Art Direction', 1, 2, '2025-05-30 16:14:30', 'pending'),
(31, 'Design and Art Direction', 4, 2, '2025-05-30 16:18:17', 'pending'),
(32, 'Design and Art Direction', 4, 2, '2025-05-30 16:20:39', 'pending'),
(33, 'Design and Art Direction', 2, 2, '2025-05-30 16:24:11', 'pending'),
(34, 'Experience in cooking and cleaning', 4, 2, '2025-05-30 16:31:59', 'pending'),
(35, 'Experience in cooking and cleaning', 2, 2, '2025-05-30 16:35:29', 'pending'),
(36, 'Design and Art Direction', 1, 2, '2025-05-30 16:36:55', 'pending'),
(37, 'Special care services for the elderly', 1, 2, '2025-05-30 16:59:19', 'pending'),
(38, 'Experience in cooking and cleaning', 1, 2, '2025-05-30 17:03:57', 'pending'),
(39, 'Design and Art Direction', 2, 2, '2025-05-30 21:13:37', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-05-12-132811', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1747057631, 1),
(2, '2025-05-18-161452', 'App\\Database\\Migrations\\CreateSliderTable', 'default', 'App', 1747585235, 2),
(3, '2025-05-18-205811', 'App\\Database\\Migrations\\AboutUs', 'default', 'App', 1747602243, 3),
(4, '2025-05-18-213454', 'App\\Database\\Migrations\\CreateGoalTable', 'default', 'App', 1747604153, 4),
(5, '2025-05-18-220511', 'App\\Database\\Migrations\\CreateVisionTable', 'default', 'App', 1747606292, 5),
(6, '2025-05-18-222402', 'App\\Database\\Migrations\\CreateValuesTable', 'default', 'App', 1747607383, 6),
(7, '2025-05-18-225250', 'App\\Database\\Migrations\\CreateContactDetails', 'default', 'App', 1747609561, 7),
(9, '2025-05-18-234347', 'App\\Database\\Migrations\\CreateViraServicesTable', 'default', 'App', 1747612476, 9),
(10, '2025-05-18-234239', 'App\\Database\\Migrations\\CreateViraSecionsTable', 'default', 'App', 1747613885, 10),
(11, '2025-05-19-121443', 'App\\Database\\Migrations\\CreateShumusHero', 'default', 'App', 1747656940, 11),
(12, '2025-05-19-121503', 'App\\Database\\Migrations\\CreateShumusAbout', 'default', 'App', 1747656940, 11),
(13, '2025-05-19-121523', 'App\\Database\\Migrations\\CreateShumusServices', 'default', 'App', 1747656940, 11),
(14, '2025-05-19-164305', 'App\\Database\\Migrations\\CreateJobseekerProfilesTable', 'default', 'App', 1747683902, 12),
(15, '2025-05-19-194828', 'App\\Database\\Migrations\\CreateJobseekerEducationsTable', 'default', 'App', 1747684391, 13),
(16, '2025-05-19-194920', 'App\\Database\\Migrations\\CreateJobseekerExperiencesTable', 'default', 'App', 1747684391, 13),
(19, '2025-05-19-195001', 'App\\Database\\Migrations\\CreateJobseekerLanguagesTable', 'default', 'App', 1747928821, 14),
(20, '2025-05-20-175616', 'App\\Database\\Migrations\\CreateJobseekerSkillsTable', 'default', 'App', 1747928842, 15),
(22, '2025-05-22-154055', 'App\\Database\\Migrations\\CreatePassportsTable', 'default', 'App', 1747928942, 16),
(23, '2025-05-23-232916', 'App\\Database\\Migrations\\CreateJobApplications', 'default', 'App', 1748180837, 17),
(24, '2025-05-25-134640', 'App\\Database\\Migrations\\CreateEmployerRequests', 'default', 'App', 1748180837, 17),
(25, '2025-05-26-150742', 'App\\Database\\Migrations\\CreateSettingsTable', 'default', 'App', 1748272103, 18),
(28, '2025-06-16-195552', 'App\\Database\\Migrations\\AddAvailableForWorkToJobseekerProfiles', 'default', 'App', 1750105211, 19);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'footer', 'footer_logo', '1748279874_fd24e8f838b827e91982.png', '2025-05-26 21:17:54', '2025-05-26 21:17:54'),
(2, 'footer', 'facebook', '#', '2025-05-26 21:17:54', '2025-05-27 01:20:33'),
(3, 'footer', 'twitter', '#', '2025-05-26 21:17:54', '2025-05-27 01:20:33'),
(4, 'footer', 'youtube', '#', '2025-05-26 21:17:54', '2025-05-27 01:20:33'),
(5, 'footer', 'footer_link_1_text', 'Main.footer_viar_link', '2025-05-26 21:17:54', '2025-05-27 01:20:33'),
(6, 'footer', 'footer_link_1_url', '/viar', '2025-05-26 21:17:54', '2025-05-27 01:20:33'),
(7, 'footer', 'footer_link_2_text', 'Main.footer_shams_link', '2025-05-26 21:17:54', '2025-05-27 01:20:33'),
(8, 'footer', 'footer_link_2_url', '/shumus', '2025-05-26 21:17:54', '2025-05-27 01:20:33'),
(9, 'footer', 'copyright_en', '© 2025 Octagon. All rights reserved.', '2025-05-26 21:17:54', '2025-05-27 01:20:33'),
(10, 'footer', 'copyright_ar', '© 2025 أوكتاجون. جميع الحقوق محفوظة.', '2025-05-26 21:17:54', '2025-05-27 01:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `shumus_about`
--

CREATE TABLE `shumus_about` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `language` varchar(2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shumus_about`
--

INSERT INTO `shumus_about` (`id`, `heading`, `description`, `image`, `language`, `created_at`, `updated_at`) VALUES
(1, 'نبذة عن شموس', 'شموس توفـر خدمات العمالة المنزليـة المتميـزة في سلطنـة عمـان ودول الخليـج، ملبـيـة احتـيـاجـات الأسر التـي تبـحث عن دعـم موثـوق داخـل المنـزل. نولـي اهتـماما خاصـا بـرعايـة كبار السـن، مـع التـزامنـا التـام بـالخصـوصيـة والسـريــة فـي جميــع تعاملاتنا، لضمان راحة العملاء وطمأنينتهم\r\n\r\n', 'uploads/shumus/about/1747663683_70d158e9465b15df1960.png', 'ar', '2025-05-19 14:08:03', '2025-05-19 15:00:54'),
(2, 'About Shumus', 'Shumus provides distinguished domestic labor services in the Sultanate of Oman and the Gulf countries, meeting the needs of families seeking reliable support within the home. We pay special attention to elderly care, while remaining fully committed to privacy and confidentiality in all our dealings, to ensure customer comfort and peace of mind.\r\n\r\n', 'uploads/shumus/about/1747664602_752f495650f360eb3f25.png', 'en', '2025-05-19 14:23:22', '2025-05-19 15:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `shumus_hero`
--

CREATE TABLE `shumus_hero` (
  `id` int(11) NOT NULL,
  `heading1` varchar(255) NOT NULL,
  `heading2` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `language` varchar(2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shumus_hero`
--

INSERT INTO `shumus_hero` (`id`, `heading1`, `heading2`, `image`, `language`, `created_at`, `updated_at`) VALUES
(1, 'Shumus', 'For home services', 'uploads/shumus/1747660847_2dfdba993787e586ada4.png', 'en', '2025-05-19 16:49:46', '2025-05-19 13:21:01'),
(2, 'شموس', 'للخدمات المنزلية', 'uploads/shumus/hero/1747663291_33415c05c4356a897e16.png', 'ar', '2025-05-19 14:01:31', '2025-05-19 14:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `shumus_services`
--

CREATE TABLE `shumus_services` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `language` varchar(2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shumus_services`
--

INSERT INTO `shumus_services` (`id`, `icon`, `title`, `language`, `created_at`, `updated_at`) VALUES
(3, 'uploads/shumus/1747661861_97917daeefb05702b14e.png', 'Hiring professional domestic workers', 'en', '2025-05-19 13:37:41', '2025-05-19 13:37:41'),
(4, 'uploads/shumus/1747661882_0907f96ff278e5fe2897.png', 'Experience in cooking and cleaning', 'en', '2025-05-19 13:38:02', '2025-05-19 13:38:02'),
(5, 'uploads/shumus/1747661896_7216888ffd1efbd45034.png', 'Special care services for the elderly', 'en', '2025-05-19 13:38:16', '2025-05-19 13:38:16'),
(6, 'uploads/shumus/1747661913_21e8978db0f559aa99b4.png', 'Special services for families', 'en', '2025-05-19 13:38:33', '2025-05-19 13:38:33'),
(7, 'uploads/shumus/1747661924_66592bcf789a6539b1c7.png', 'Providing integrated home support', 'en', '2025-05-19 13:38:44', '2025-05-19 13:38:44'),
(8, 'uploads/shumus/1747661967_e73d9ddbade4e01d28cb.png', 'Childcare services', 'en', '2025-05-19 13:39:27', '2025-05-19 13:39:27'),
(10, 'uploads/shumus/1747666568_3af029fe4e73d3e9abfa.png', 'توظيف عمالــــة منزلية محترفة', 'ar', '2025-05-19 14:56:08', '2025-05-19 14:56:08'),
(11, 'uploads/shumus/1747666587_2b3aa919fad953b0eaf5.png', 'خبرة في الطهي والتنظـــــــــــــيف', 'ar', '2025-05-19 14:56:27', '2025-05-19 14:56:27'),
(12, 'uploads/shumus/1747666619_79c7ef1c85c1c8d5e2ab.png', 'خدمـــــــات رعــــاية خاصة لكبار السن', 'ar', '2025-05-19 14:56:59', '2025-05-19 14:56:59'),
(13, 'uploads/shumus/1747666644_fee45348801952189dc1.png', 'خدمات مخصصة للعــــائـــــــــــــــلات', 'ar', '2025-05-19 14:57:24', '2025-05-19 14:57:24'),
(14, 'uploads/shumus/1747666657_330c11ee0e42d3343647.png', 'توفـــــــــير الدعــــم المنزلي المتكامل', 'ar', '2025-05-19 14:57:37', '2025-05-19 14:57:37'),
(15, 'uploads/shumus/1747666674_debd139725c8fc4cf819.png', 'خدمات رعاية الأطفــــــــــــــال', 'ar', '2025-05-19 14:57:54', '2025-05-19 14:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `button_text` varchar(100) NOT NULL,
  `button_link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `language` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `button_text`, `button_link`, `image`, `language`, `created_at`, `updated_at`) VALUES
(1, 'فيـــــار', 'للتصميم والاخراج الفنى', 'إقرأ المزيد', '/viar', '1747600633_39f54adacab4ee2a16b3.jpg', 'ar', NULL, NULL),
(2, 'Vira', 'Design and artistic direction', 'Read more', '/viar', '1747601623_12f39f68f2c40ea579cd.jpg', 'en', NULL, NULL),
(3, 'Shumus', 'Design and artistic direction', 'Read more', '/shumus', '1747601623_12f39f68f2c40ea579cd.jpg', 'en', NULL, NULL),
(4, 'شمـــــــــوس', 'للتصميم والاخراج الفنى', 'إقرأ المزيد', '/shumus', '1747600633_39f54adacab4ee2a16b3.jpg', 'ar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','employer','jobseeker') DEFAULT 'jobseeker',
  `account_type` varchar(64) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `account_type`, `reset_token`, `reset_expires`, `created_at`, `updated_at`) VALUES
(1, 'admin@mail.com', '$2y$10$ZwhntdvRBxrqpgY3SLRxUeZNiaz/7SH.GiiLkKw3bz/QPWJfHU3LK', 'admin', NULL, 'f6eff7bec945141187d32f13e5dbb0ab5f99498f16ec8cc72113881daa078f1c', '2025-05-25 01:05:30', '2025-05-12 13:51:09', '2025-05-25 00:05:30'),
(2, 'jawadalizada1@gmail.com', '$2y$10$HxxyRi9lGn/VNQNBHhkKqu3h2hX1UtjpJNhiwL7DE0qWXj5feBw7a', 'jobseeker', NULL, NULL, NULL, '2025-05-19 15:18:50', '2025-05-26 04:19:40'),
(3, 'employer@mail.com', '$2y$10$BZbttAHfj.k00BCSeLeOMuBRSoeGxvV5v3hoWIQrGGJ7TSYI9eTlW', 'employer', NULL, NULL, NULL, '2025-05-19 15:19:38', '2025-05-26 04:01:09'),
(10, 'admin@octagon.om', '$2y$10$Xz/AGLDlxmtBpyyhITrGj.Sypplr9BNsVUHAq94uoPW/i0EM4SSJ.', 'admin', NULL, NULL, NULL, '2025-05-27 23:01:14', '2025-05-27 23:01:14'),
(11, 'employer@octagon.om', '$2y$10$hDa0RKg2vlBsh7P46ICxbe/2yE.2Fo8O71zObbrJwXd6QVsfhM57K', 'employer', NULL, NULL, NULL, '2025-05-27 23:01:55', '2025-05-27 23:01:55'),
(12, 'jobseeker@mail.com', '$2y$10$sG0x.yVrFi5dNuHLSCmgKOtTkuwp.Tg8bMrN9ETEsp39QeQ./0zsK', 'jobseeker', NULL, NULL, NULL, '2025-06-06 13:11:19', '2025-06-06 13:11:19'),
(13, 'alizada11@gmail.com', '$2y$10$ecC1UQa6QZfb5oNiO9y2uuQENO6iAxkuftyJcblTrYAEmeuaWNjbu', 'employer', 'company', NULL, NULL, '2025-06-10 20:11:02', '2025-06-10 20:11:02'),
(14, 'jawad11@gmail.com', '$2y$10$BCZsZb5acuEiyTUDDQP9ve7pDIfdo7jJvZZC6u9l6RPQcGKjTqESK', 'employer', 'personal', NULL, NULL, '2025-06-10 20:23:02', '2025-06-10 20:23:02'),
(15, 'ja@mail.com', '$2y$10$0.bwlXG0Hqtkmqkh9A1Yi.Wz/CKwdaRA889SmM7TDTNkyRTrvyYxm', 'employer', 'company', NULL, NULL, '2025-06-11 11:37:33', '2025-06-11 11:37:33'),
(19, 'jaw@mail.com', '$2y$10$SSce08b3ghlyjRGTx6HgYOjNwCE8gJI.9ANjx74zfQxxuKnq0K6Wi', 'jobseeker', 'personal', NULL, NULL, '2025-06-17 00:22:19', '2025-06-17 00:22:19'),
(20, 'moh@mail.com', '$2y$10$xnEfu4tf5S84tuT8HzDuF.BXqlO8m/spgK6yJnOQ53mzM4B8GweDm', 'jobseeker', 'personal', NULL, NULL, '2025-06-17 01:07:11', '2025-06-17 01:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `values`
--

CREATE TABLE `values` (
  `id` int(11) NOT NULL,
  `language` varchar(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `values`
--

INSERT INTO `values` (`id`, `language`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ar', 'الابتكار', 'نبتــكر باستــمرار لنقدم حلولا متطـــورة تعكـس روح التجديد وتلبي تطلعات المستقبل\r\n\r\n', '2025-05-18 22:37:37', '2025-05-18 22:37:37'),
(2, 'ar', 'الاحترافية', 'نلتــــزم بأعلى المعاييـــر العالميــة في كل خطـــــوة لضمان تقديم تجربة استثنائية\r\n\r\n', '2025-05-18 22:38:00', '2025-05-18 22:38:45'),
(3, 'ar', 'الجودة', 'نسعـى للتميــز في كـل تفاصيــل خدماتــنـــا، مقدميـــن قيــمة لا تضاهى لعملائنا\r\n\r\n', '2025-05-18 22:38:19', '2025-05-18 22:38:19'),
(4, 'ar', 'التعاون', 'نعمـل بروح الفريـق، مؤمنين بـأن الشراكـة الفعالـة هي مفتاح النجاح في خدمة عملائنا\r\n\r\n', '2025-05-18 22:38:38', '2025-05-18 22:38:38'),
(5, 'en', 'Innovation', 'We continually innovate to provide advanced solutions that reflect the spirit of renewal and meet future aspirations.', '2025-05-18 22:39:53', '2025-05-18 22:39:53'),
(6, 'en', 'Professionalism', 'We adhere to the highest international standards at every step to ensure an exceptional experience.', '2025-05-18 22:40:35', '2025-05-18 22:40:35'),
(7, 'en', 'Quality', 'We strive for excellence in every detail of our services, providing unparalleled value to our clients.', '2025-05-18 22:41:13', '2025-05-18 22:41:13'),
(8, 'en', 'cooperation', 'We work as a team, believing that effective partnership is the key to success in serving our clients.\r\n', '2025-05-18 22:41:57', '2025-05-18 22:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `viar_sections`
--

CREATE TABLE `viar_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL,
  `heading1` varchar(255) DEFAULT NULL,
  `heading2` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `language` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viar_sections`
--

INSERT INTO `viar_sections` (`id`, `type`, `heading1`, `heading2`, `section`, `description`, `image`, `language`, `created_at`, `updated_at`) VALUES
(1, 'hero', 'Viar', 'Design and artistic direction', 'hero', NULL, 'uploads/viar/1747616332_4f6dedc199bf3c45e455.png', 'en', '2025-05-19 00:35:58', '2025-05-19 00:58:52'),
(2, 'about', 'About Viar', NULL, 'about', 'At Viar, we believe that design is a powerful, vibrant visual language that reflects the identity of the content and leaves a deep impact on the target audience. We specialize in creating distinctive designs that include books, magazines, documents, posters, and portfolios, where quality blends with innovation to provide works that carry an exceptional imprint and an unforgettable visual experience.\r\n\r\n', 'uploads/viar/1747616661_cae7ce15d0cfd80a90f5.webp', 'en', '2025-05-19 00:35:59', '2025-05-19 01:04:21'),
(3, 'hero', 'فیار', 'للتصميم والاخراج الفنى', NULL, NULL, 'uploads/viar/1747616398_c25f129e6c166b028d80.png', 'ar', '2025-05-19 00:59:58', '2025-05-19 00:59:58'),
(4, 'about', 'نبذة عن فيار', '', 'about', 'في ڤيـار، نـؤمـن بـأن التصميـم هـو لغـة بـصـريـة قـويـة تنبض بالحياة، تعكس هوية المحتوى وتترك أثراً عميقا في الجمهور المستــهدف، نتــخصـص فـي إبـداع تـصاميـم متـميـزة تــشمـل الكتــب، المجلات، الوثــائــــق، البـــوستـــرات والبــــورتفوليــــــــــو حيث تمتــزج الجودة مع الابــتكار لتقديـــم أعمال تـحمل بصمة استثنائية وتجربة بصرية لا تنسى\r\n\r\n\r\n', 'uploads/viar/1747616441_fc7a414a2807d4145cf2.webp', 'ar', '2025-05-19 01:00:41', '2025-05-19 01:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `viar_services`
--

CREATE TABLE `viar_services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `bullets` text NOT NULL,
  `language` varchar(5) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viar_services`
--

INSERT INTO `viar_services` (`id`, `title`, `bullets`, `language`, `created_at`, `updated_at`) VALUES
(1, 'التدقيق اللغوي وإدخال البيانات', '[\"\\u0643\\u062a\\u0627\\u0628\\u0629 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649\",\"\\u0625\\u062f\\u062e\\u0627\\u0644 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a \\u0628\\u062f\\u0642\\u0629 \\u0648\\u062a\\u0646\\u0638\\u064a\\u0645\",\"\\u062a\\u062f\\u0642\\u064a\\u0642 \\u0627\\u0644\\u0646\\u0635\\u0648\\u0635 \\u0644\\u0636\\u0645\\u0627\\u0646 \\u0627\\u0644\\u062f\\u0642\\u0629 \\u0648\\u0627\\u0644\\u0627\\u062d\\u062a\\u0631\\u0627\\u0641\\u064a\\u0629\"]', 'ar', '2025-05-18 23:57:51', '2025-05-18 23:57:51'),
(2, 'التصميم والإخراج الفني', '[\"\\u062a\\u0635\\u0645\\u064a\\u0645 \\u0627\\u0644\\u0643\\u062a\\u0628 \\u0648\\u0627\\u0644\\u0645\\u062c\\u0644\\u0627\\u062a\",\"\\u0625\\u062e\\u0631\\u0627\\u062c \\u0627\\u0644\\u0648\\u062b\\u0627\\u0626\\u0642 \\u0627\\u0644\\u0639\\u0644\\u0645\\u064a\\u0629 \\u0648\\u0627\\u0644\\u0641\\u0643\\u0631\\u064a\\u0629\"]', 'ar', '2025-05-19 01:20:16', '2025-05-19 01:20:16'),
(3, 'الرسم الرقــــــــمى', '[\"\\u062a\\u0635\\u0645\\u064a\\u0645 \\u0627\\u0644\\u0627\\u0646\\u0641\\u0648\\u062c\\u0631\\u0627\\u0641\\u064a\\u0643 \\u0648\\u0627\\u0644\\u0641\\u0627\\u064a\\u0646 \\u0622\\u0631\\u062a\",\"\\u062a\\u0635\\u0645\\u064a\\u0645 \\u0627\\u0644\\u0634\\u0639\\u0627\\u0631\\u0627\\u062a \\u0648\\u0627\\u0644\\u0628\\u0648\\u0633\\u062a\\u0631\\u0627\\u062a\"]', 'ar', '2025-05-19 01:23:59', '2025-05-19 01:23:59'),
(4, 'الترجمة الاحتـــرافــية', '[\"\\u062a\\u0631\\u062c\\u0645\\u0629 \\u0627\\u0644\\u0646\\u0635\\u0648\\u0635 \\u0628\\u062f\\u0642\\u0629 \\u0644\\u063a\\u0648\\u064a\\u0629 \\u0648\\u062b\\u0642\\u0627\\u0641\\u0629 \\u0639\\u0627\\u0644\\u064a\\u0629\"]', 'ar', '2025-05-19 01:24:46', '2025-05-19 01:24:46'),
(5, 'Proofreading and data entry', '[\"Content writing\",\"Enter data accurately and organized\",\"Proofread texts to ensure accuracy and professionalism\"]', 'en', '2025-05-19 01:39:02', '2025-05-19 01:39:02'),
(6, 'Design and Art Direction', '[\"Book and magazine design\",\"Producing scientific and intellectual documents\"]', 'en', '2025-05-19 01:40:49', '2025-05-19 01:40:49'),
(7, 'Digital drawing', '[\"Infographic and fine art design\",\"Logo and poster design\"]', 'en', '2025-05-19 01:41:54', '2025-05-19 01:41:54'),
(8, 'Professional translation', '[\"Translate texts with linguistic accuracy and high culture\"]', 'en', '2025-05-19 01:42:45', '2025-05-19 01:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `vision`
--

CREATE TABLE `vision` (
  `id` int(10) UNSIGNED NOT NULL,
  `language` varchar(5) NOT NULL DEFAULT 'en',
  `heading` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vision`
--

INSERT INTO `vision` (`id`, `language`, `heading`, `sub_heading`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'ar', 'رؤيتنا', 'رؤية قيادية نحو الابتكار والتميز', 'في أوكتـاجـون، نفتـخـر بتـميز شركتينا ڤيار وشموس اللتـيـن تـضـعـان بــصــمــاتـهـمــا الفريــدة فـي مجــالات الإبـداع الفـنـي والخدمـــات المنـــزلية. بفضــل تكاملهما نساهم في تحقيـق احتــياجــات المجتــمع باحترافيــة عاليــة. نواصل رحلتــنا نــحو الابتــكار والتــطور المستــمر، ملتــزمين بتــقديم حلول ترتـقي بتجربــة عملائــنا منــا بأن النجاح وتلبــي تطلعاتــهــم، إيــمانــا الحقيقي ينبع من تقديم قيمة تفوق التوقعات\r\n\r\n', '1747606341_a7f7fcfe77dea71e804b.png', '2025-05-18 22:12:21', '2025-05-24 23:46:21'),
(2, 'en', 'Our Vision', 'A leadership vision towards innovation and excellence', 'At Octagon, we pride ourselves on the excellence of our two companies, Viar and Shams, which leave their unique mark in the fields of artistic creativity and home services. Thanks to their integration, we contribute to meeting the needs of society with high professionalism. We continue our journey towards innovation and continuous development, committed to providing solutions that enhance our customers\' experience from us, that success and meeting their aspirations stem from our true belief that it stems from delivering value that exceeds expectations.\r\n\r\n', '1747606341_a7f7fcfe77dea71e804b.png', '2025-05-18 22:12:21', '2025-05-18 22:13:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_requests`
--
ALTER TABLE `employer_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goal`
--
ALTER TABLE `goal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker_educations`
--
ALTER TABLE `jobseeker_educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker_experiences`
--
ALTER TABLE `jobseeker_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker_languages`
--
ALTER TABLE `jobseeker_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker_passports`
--
ALTER TABLE `jobseeker_passports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker_profiles`
--
ALTER TABLE `jobseeker_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobseeker_profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobseeker_skills`
--
ALTER TABLE `jobseeker_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shumus_about`
--
ALTER TABLE `shumus_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shumus_hero`
--
ALTER TABLE `shumus_hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shumus_services`
--
ALTER TABLE `shumus_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `values`
--
ALTER TABLE `values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viar_sections`
--
ALTER TABLE `viar_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viar_services`
--
ALTER TABLE `viar_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vision`
--
ALTER TABLE `vision`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `employer_requests`
--
ALTER TABLE `employer_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `goal`
--
ALTER TABLE `goal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobseeker_educations`
--
ALTER TABLE `jobseeker_educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobseeker_experiences`
--
ALTER TABLE `jobseeker_experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobseeker_languages`
--
ALTER TABLE `jobseeker_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobseeker_passports`
--
ALTER TABLE `jobseeker_passports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobseeker_profiles`
--
ALTER TABLE `jobseeker_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jobseeker_skills`
--
ALTER TABLE `jobseeker_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shumus_about`
--
ALTER TABLE `shumus_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shumus_hero`
--
ALTER TABLE `shumus_hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shumus_services`
--
ALTER TABLE `shumus_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `values`
--
ALTER TABLE `values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `viar_sections`
--
ALTER TABLE `viar_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `viar_services`
--
ALTER TABLE `viar_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vision`
--
ALTER TABLE `vision`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agencies`
--
ALTER TABLE `agencies`
  ADD CONSTRAINT `agencies_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobseeker_profiles`
--
ALTER TABLE `jobseeker_profiles`
  ADD CONSTRAINT `jobseeker_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
