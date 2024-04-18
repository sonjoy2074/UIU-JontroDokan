-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 09:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jontrodokan`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `bolg_title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `project_details` varchar(255) NOT NULL,
  `components` varchar(255) NOT NULL,
  `publish_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_items`
--

CREATE TABLE `lab_items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `unit_history` int(11) NOT NULL,
  `available_units` int(255) NOT NULL,
  `item_image` text DEFAULT NULL,
  `tag` varchar(255) NOT NULL,
  `item_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_items`
--

INSERT INTO `lab_items` (`item_id`, `item_name`, `unit_history`, `available_units`, `item_image`, `tag`, `item_details`) VALUES
(58, 'Breadboard', 20, 20, '830breadboard-.jpg', 'breadboard, board', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollic'),
(59, 'raspberry case', 20, 20, 'RaspberryPi4AcrylicCasewithFan.jpg', 'raspberry, case', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollic'),
(60, 'finger print sensor', 50, 50, 'FingerPrintSensor(R307).jpg', 'sensor, finger print', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollic'),
(61, 'smoke sensor', 40, 40, 'Smoke-Sensor-(MQ-6).jpg', 'sensor, smoke', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollic');

-- --------------------------------------------------------

--
-- Table structure for table `lab_item_order`
--

CREATE TABLE `lab_item_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lab_item_id` int(11) NOT NULL,
  `item_amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `issue_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_item_order`
--

INSERT INTO `lab_item_order` (`order_id`, `user_id`, `lab_item_id`, `item_amount`, `status`, `issue_date`) VALUES
(36, 33, 58, 3, 4, '03-05-23'),
(37, 33, 60, 1, 4, '03-05-23'),
(38, 31, 59, 4, 4, '03-05-23'),
(39, 31, 59, 4, 0, '03-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `seller_id` varchar(255) NOT NULL,
  `cus_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) DEFAULT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_author` int(11) DEFAULT NULL,
  `post_date` text DEFAULT NULL,
  `post_image` text DEFAULT NULL,
  `post_content` varchar(10000) DEFAULT NULL,
  `post_tags` varchar(255) DEFAULT NULL,
  `post_comment_count` int(11) DEFAULT NULL,
  `post_status` varchar(255) DEFAULT 'draft',
  `is_featured` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `is_featured`) VALUES
(26, 1, 'Touch Screen Cable Tracer', 34, '03-05-23', 'pexels-andrew-neel-3178744.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rhoncus purus ultrices vitae. In egestas at risus at gravida. Cras velit mi, aliquet vitae finibus sed, aliquet id nulla. Curabitur a dui leo. Mauris gravida tortor enim, non pharetra ipsum aliquam in. Fusce nulla lectus, pretium ac quam nec, aliquet iaculis risus. Fusce maximus velit sed nulla suscipit, eget ornare lectus sodales. Phasellus eu tellus faucibus, facilisis mauris eu, tristique ex.\r\n\r\nUt vel urna iaculis, dapibus purus ac, pulvinar est. Sed fermentum bibendum mollis. Cras commodo volutpat auctor. Nullam sit amet gravida sapien. Donec ullamcorper viverra arcu, id porta justo dignissim vitae. Cras pellentesque imperdiet elit, id venenatis nulla semper congue. Cras ex purus, elementum et porttitor et, viverra id leo. Aenean porta augue mollis ligula sollicitudin semper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis mauris turpis, tincidunt a urna in, ultrices pellentesque quam. Vivamus viverra nec velit nec pellentesque. Phasellus laoreet et eros fringilla porttitor.\r\n\r\nSed sodales mi id lacus volutpat, at auctor est placerat. Aliquam maximus pulvinar feugiat. Aliquam sit amet felis dignissim, lobortis orci ac, finibus justo. Cras enim nibh, gravida blandit cursus ut, volutpat quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean quis leo pellentesque, porttitor mi vel, sagittis nisi. Integer commodo, quam eu elementum tempus, justo lacus vehicula eros, ut mollis purus ante vitae odio. Etiam vel ante blandit, tempor eros ac, sodales nisl.\r\n\r\nAenean non justo eu magna lobortis laoreet. Nulla porta mi sed neque tempor, nec dictum nulla fermentum. Aliquam sed convallis nisl. Nulla facilisi. Curabitur placerat porttitor lacus, id varius ante accumsan', 'touch, screen, cable, tracer', 0, 'publish', NULL),
(27, 2, 'A Cindys alarm clock recording weather station', 34, '03-05-23', 'pexels-canva-studio-3194523.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rhoncus purus ultrices vitae. In egestas at risus at gravida. Cras velit mi, aliquet vitae finibus sed, aliquet id nulla. Curabitur a dui leo. Mauris gravida tortor enim, non pharetra ipsum aliquam in. Fusce nulla lectus, pretium ac quam nec, aliquet iaculis risus. Fusce maximus velit sed nulla suscipit, eget ornare lectus sodales. Phasellus eu tellus faucibus, facilisis mauris eu, tristique ex.\r\n\r\nUt vel urna iaculis, dapibus purus ac, pulvinar est. Sed fermentum bibendum mollis. Cras commodo volutpat auctor. Nullam sit amet gravida sapien. Donec ullamcorper viverra arcu, id porta justo dignissim vitae. Cras pellentesque imperdiet elit, id venenatis nulla semper congue. Cras ex purus, elementum et porttitor et, viverra id leo. Aenean porta augue mollis ligula sollicitudin semper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis mauris turpis, tincidunt a urna in, ultrices pellentesque quam. Vivamus viverra nec velit nec pellentesque. Phasellus laoreet et eros fringilla porttitor.\r\n\r\nSed sodales mi id lacus volutpat, at auctor est placerat. Aliquam maximus pulvinar feugiat. Aliquam sit amet felis dignissim, lobortis orci ac, finibus justo. Cras enim nibh, gravida blandit cursus ut, volutpat quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean quis leo pellentesque, porttitor mi vel, sagittis nisi. Integer commodo, quam eu elementum tempus, justo lacus vehicula eros, ut mollis purus ante vitae odio. Etiam vel ante blandit, tempor eros ac, sodales nisl.\r\n\r\nAenean non justo eu magna lobortis laoreet. Nulla porta mi sed neque tempor, nec dictum nulla fermentum. Aliquam sed convallis nisl. Nulla facilisi. Curabitur placerat porttitor lacus, id varius ante accumsan', 'cindy, clock, recording', 1, 'publish', NULL),
(28, 8, 'Christmas Greetings - XXL Chatbot', 34, '03-05-23', 'pexels-ivan-samkov-4240498.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rhoncus purus ultrices vitae. In egestas at risus at gravida. Cras velit mi, aliquet vitae finibus sed, aliquet id nulla. Curabitur a dui leo. Mauris gravida tortor enim, non pharetra ipsum aliquam in. Fusce nulla lectus, pretium ac quam nec, aliquet iaculis risus. Fusce maximus velit sed nulla suscipit, eget ornare lectus sodales. Phasellus eu tellus faucibus, facilisis mauris eu, tristique ex.\r\n\r\nUt vel urna iaculis, dapibus purus ac, pulvinar est. Sed fermentum bibendum mollis. Cras commodo volutpat auctor. Nullam sit amet gravida sapien. Donec ullamcorper viverra arcu, id porta justo dignissim vitae. Cras pellentesque imperdiet elit, id venenatis nulla semper congue. Cras ex purus, elementum et porttitor et, viverra id leo. Aenean porta augue mollis ligula sollicitudin semper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis mauris turpis, tincidunt a urna in, ultrices pellentesque quam. Vivamus viverra nec velit nec pellentesque. Phasellus laoreet et eros fringilla porttitor.\r\n\r\nSed sodales mi id lacus volutpat, at auctor est placerat. Aliquam maximus pulvinar feugiat. Aliquam sit amet felis dignissim, lobortis orci ac, finibus justo. Cras enim nibh, gravida blandit cursus ut, volutpat quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean quis leo pellentesque, porttitor mi vel, sagittis nisi. Integer commodo, quam eu elementum tempus, justo lacus vehicula eros, ut mollis purus ante vitae odio. Etiam vel ante blandit, tempor eros ac, sodales nisl.\r\n\r\nAenean non justo eu magna lobortis laoreet. Nulla porta mi sed neque tempor, nec dictum nulla fermentum. Aliquam sed convallis nisl. Nulla facilisi. Curabitur placerat porttitor lacus, id varius ante accumsan', 'greetings, chatbot', 0, 'publish', NULL),
(29, 5, 'ut. Nam vitae consequat quam. Aliquam metus nunc, suscipit eget posuere ut, euismod eu mi. Quisque at dui rutrum, gravida dui sed, venenatis est', 31, '03-05-23', 'pexels-ivan-samkov-4240606.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rhoncus purus ultrices vitae. In egestas at risus at gravida. Cras velit mi, aliquet vitae finibus sed, aliquet id nulla. Curabitur a dui leo. Mauris gravida tortor enim, non pharetra ipsum aliquam in. Fusce nulla lectus, pretium ac quam nec, aliquet iaculis risus. Fusce maximus velit sed nulla suscipit, eget ornare lectus sodales. Phasellus eu tellus faucibus, facilisis mauris eu, tristique ex.\r\n\r\nUt vel urna iaculis, dapibus purus ac, pulvinar est. Sed fermentum bibendum mollis. Cras commodo volutpat auctor. Nullam sit amet gravida sapien. Donec ullamcorper viverra arcu, id porta justo dignissim vitae. Cras pellentesque imperdiet elit, id venenatis nulla semper congue. Cras ex purus, elementum et porttitor et, viverra id leo. Aenean porta augue mollis ligula sollicitudin semper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis mauris turpis, tincidunt a urna in, ultrices pellentesque quam. Vivamus viverra nec velit nec pellentesque. Phasellus laoreet et eros fringilla porttitor.\r\n\r\nSed sodales mi id lacus volutpat, at auctor est placerat. Aliquam maximus pulvinar feugiat. Aliquam sit amet felis dignissim, lobortis orci ac, finibus justo. Cras enim nibh, gravida blandit cursus ut, volutpat quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean quis leo pellentesque, porttitor mi vel, sagittis nisi. Integer commodo, quam eu elementum tempus, justo lacus vehicula eros, ut mollis purus ante vitae odio. Etiam vel ante blandit, tempor eros ac, sodales nisl.\r\n\r\nAenean non justo eu magna lobortis laoreet. Nulla porta mi sed neque tempor, nec dictum nulla fermentum. Aliquam sed convallis nisl. Nulla facilisi. Curabitur placerat porttitor lacus, id varius ante accumsan ut. Nam vitae consequat quam. Aliquam metus nunc, suscipit eget posuere ut, euismod eu mi. Quisque at dui rutrum, gravida dui sed, venenatis est. Maecenas condimentum ac odio quis porttitor. Duis varius libero sit amet eros lobortis, quis blandit eros mollis. Pellentesque a congue eros. ', 'lorem, posts', 3, 'publish', 1),
(30, 1, 'Toy Truckhvhj', 31, '03-05-23', 'pexels-miguel-á-padriñán-1591056.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rhoncus purus ultrices vitae. In egestas at risus at gravida. Cras velit mi, aliquet vitae finibus sed, aliquet id nulla. Curabitur a dui leo. Mauris gravida tortor enim, non pharetra ipsum aliquam in. Fusce nulla lectus, pretium ac quam nec, aliquet iaculis risus. Fusce maximus velit sed nulla suscipit, eget ornare lectus sodales. Phasellus eu tellus faucibus, facilisis mauris eu, tristique ex.\r\n\r\nUt vel urna iaculis, dapibus purus ac, pulvinar est. Sed fermentum bibendum mollis. Cras commodo volutpat auctor. Nullam sit amet gravida sapien. Donec ullamcorper viverra arcu, id porta justo dignissim vitae. Cras pellentesque imperdiet elit, id venenatis nulla semper congue. Cras ex purus, elementum et porttitor et, viverra id leo. Aenean porta augue mollis ligula sollicitudin semper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis mauris turpis, tincidunt a urna in, ultrices pellentesque quam. Vivamus viverra nec velit nec pellentesque. Phasellus laoreet et eros fringilla porttitor.\r\n\r\nSed sodales mi id lacus volutpat, at auctor est placerat. Aliquam maximus pulvinar feugiat. Aliquam sit amet felis dignissim, lobortis orci ac, finibus justo. Cras enim nibh, gravida blandit cursus ut, volutpat quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean quis leo pellentesque, porttitor mi vel, sagittis nisi. Integer commodo, quam eu elementum tempus, justo lacus vehicula eros, ut mollis purus ante vitae odio. Etiam vel ante blandit, tempor eros ac, sodales nisl.\r\n\r\nAenean non justo eu magna lobortis laoreet. Nulla porta mi sed neque tempor, nec dictum nulla fermentum. Aliquam sed convallis nisl. Nulla facilisi. Curabitur placerat porttitor lacus, id varius ante accumsan ut. Nam vitae consequat quam. Aliquam metus nunc, suscipit eget posuere ut, euismod eu mi. Quisque at dui rutrum, gravida dui sed, venenatis est. Maecenas condimentum ac odio quis porttitor. Duis varius libero sit amet eros lobortis, quis blandit eros mollis. Pellentesque a congue eros. ', 'toy, truck, mega', 1, 'publish', NULL),
(31, 1, 'another post', 31, '03-05-23', 'pexels-pixabay-267569.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rhoncus purus ultrices vitae. In egestas at risus at gravida. Cras velit mi, aliquet vitae finibus sed, aliquet id nulla. Curabitur a dui leo. Mauris gravida tortor enim, non pharetra ipsum aliquam in. Fusce nulla lectus, pretium ac quam nec, aliquet iaculis risus. Fusce maximus velit sed nulla suscipit, eget ornare lectus sodales. Phasellus eu tellus faucibus, facilisis mauris eu, tristique ex.\r\n\r\nUt vel urna iaculis, dapibus purus ac, pulvinar est. Sed fermentum bibendum mollis. Cras commodo volutpat auctor. Nullam sit amet gravida sapien. Donec ullamcorper viverra arcu, id porta justo dignissim vitae. Cras pellentesque imperdiet elit, id venenatis nulla semper congue. Cras ex purus, elementum et porttitor et, viverra id leo. Aenean porta augue mollis ligula sollicitudin semper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis mauris turpis, tincidunt a urna in, ultrices pellentesque quam. Vivamus viverra nec velit nec pellentesque. Phasellus laoreet et eros fringilla porttitor.\r\n\r\nSed sodales mi id lacus volutpat, at auctor est placerat. Aliquam maximus pulvinar feugiat. Aliquam sit amet felis dignissim, lobortis orci ac, finibus justo. Cras enim nibh, gravida blandit cursus ut, volutpat quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean quis leo pellentesque, porttitor mi vel, sagittis nisi. Integer commodo, quam eu elementum tempus, justo lacus vehicula eros, ut mollis purus ante vitae odio. Etiam vel ante blandit, tempor eros ac, sodales nisl.\r\n\r\nAenean non justo eu magna lobortis laoreet. Nulla porta mi sed neque tempor, nec dictum nulla fermentum. Aliquam sed convallis nisl. Nulla facilisi. Curabitur placerat porttitor lacus, id varius ante accumsan ut. Nam vitae consequat quam. Aliquam metus nunc, suscipit eget posuere ut, euismod eu mi. Quisque at dui rutrum, gravida dui sed, venenatis est. Maecenas condimentum ac odio quis porttitor. Duis varius libero sit amet eros lobortis, quis blandit eros mollis. Pellentesque a congue eros. ', 'post, niggy, shopnil', 0, 'publish', 1),
(32, 2, 'post tile here another another', 33, '03-05-23', 'pexels-plann-4549414.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rhoncus purus ultrices vitae. In egestas at risus at gravida. Cras velit mi, aliquet vitae finibus sed, aliquet id nulla. Curabitur a dui leo. Mauris gravida tortor enim, non pharetra ipsum aliquam in. Fusce nulla lectus, pretium ac quam nec, aliquet iaculis risus. Fusce maximus velit sed nulla suscipit, eget ornare lectus sodales. Phasellus eu tellus faucibus, facilisis mauris eu, tristique ex.\r\n\r\nUt vel urna iaculis, dapibus purus ac, pulvinar est. Sed fermentum bibendum mollis. Cras commodo volutpat auctor. Nullam sit amet gravida sapien. Donec ullamcorper viverra arcu, id porta justo dignissim vitae. Cras pellentesque imperdiet elit, id venenatis nulla semper congue. Cras ex purus, elementum et porttitor et, viverra id leo. Aenean porta augue mollis ligula sollicitudin semper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis mauris turpis, tincidunt a urna in, ultrices pellentesque quam. Vivamus viverra nec velit nec pellentesque. Phasellus laoreet et eros fringilla porttitor.\r\n\r\nSed sodales mi id lacus volutpat, at auctor est placerat. Aliquam maximus pulvinar feugiat. Aliquam sit amet felis dignissim, lobortis orci ac, finibus justo. Cras enim nibh, gravida blandit cursus ut, volutpat quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean quis leo pellentesque, porttitor mi vel, sagittis nisi. Integer commodo, quam eu elementum tempus, justo lacus vehicula eros, ut mollis purus ante vitae odio. Etiam vel ante blandit, tempor eros ac, sodales nisl.\r\n\r\nAenean non justo eu magna lobortis laoreet. Nulla porta mi sed neque tempor, nec dictum nulla fermentum. Aliquam sed convallis nisl. Nulla facilisi. Curabitur placerat porttitor lacus, id varius ante accumsan ut. Nam vitae consequat quam. Aliquam metus nunc, suscipit eget posuere ut, euismod eu mi. Quisque at dui rutrum, gravida dui sed, venenatis est. Maecenas condimentum ac odio quis porttitor. Duis varius libero sit amet eros lobortis, quis blandit eros mollis. Pellentesque a congue eros. ', 'another', 0, 'rejected', NULL),
(33, 5, 'hello ndkjanskjdnaskjdkasdnsakndansknmnk', 0, '03-05-23', 'pexels-tirachard-kumtanom-733856.jpg', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rhoncus purus ultrices vitae. In egestas at risus at gravida. Cras velit mi, aliquet vitae finibus sed, aliquet id nulla. Curabitur a dui leo. Mauris gravida tortor enim, non pharetra ipsum aliquam in. Fusce nulla lectus, pretium ac quam nec, aliquet iaculis risus. Fusce maximus velit sed nulla suscipit, eget ornare lectus sodales. Phasellus eu tellus faucibus, facilisis mauris eu, tristique ex.\r\n\r\nUt vel urna iaculis, dapibus purus ac, pulvinar est. Sed fermentum bibendum mollis. Cras commodo volutpat auctor. Nullam sit amet gravida sapien. Donec ullamcorper viverra arcu, id porta justo dignissim vitae. Cras pellentesque imperdiet elit, id venenatis nulla semper congue. Cras ex purus, elementum et porttitor et, viverra id leo. Aenean porta augue mollis ligula sollicitudin semper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis mauris turpis, tincidunt a urna in, ultrices pellentesque quam. Vivamus viverra nec velit nec pellentesque. Phasellus laoreet et eros fringilla porttitor.\r\n\r\nSed sodales mi id lacus volutpat, at auctor est placerat. Aliquam maximus pulvinar feugiat. Aliquam sit amet felis dignissim, lobortis orci ac, finibus justo. Cras enim nibh, gravida blandit cursus ut, volutpat quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean quis leo pellentesque, porttitor mi vel, sagittis nisi. Integer commodo, quam eu elementum tempus, justo lacus vehicula eros, ut mollis purus ante vitae odio. Etiam vel ante blandit, tempor eros ac, sodales nisl.\r\n\r\nAenean non justo eu magna lobortis laoreet. Nulla porta mi sed neque tempor, nec dictum nulla fermentum. Aliquam sed convallis nisl. Nulla facilisi. Curabitur placerat porttitor lacus, id varius ante accumsan ut. Nam vitae consequat quam. Aliquam metus nunc, suscipit eget posuere ut, euismod eu mi. Quisque at dui rutrum, grav', 'no, admin, my post', 1, 'publish', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`cat_id`, `cat_title`) VALUES
(1, 'arduino uno'),
(2, 'esp8266'),
(5, 'robotics'),
(8, 'raspberry pie');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL,
  `post_id` int(3) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`id`, `post_id`, `user_id`, `content`) VALUES
(11, 29, 34, 'nice post'),
(12, 29, 33, 'thanks to the author'),
(13, 27, 33, 'joined discussion'),
(14, 33, 31, 'hbmhbm'),
(15, 30, 31, 'jdkjasdkjas'),
(16, 29, 31, 'shdasdnas');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price_type` varchar(255) DEFAULT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `Time_stamp` int(30) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `price_type`, `Description`, `Time_stamp`, `Category`, `user_id`) VALUES
(25, 'board', '120', '830breadboard-.jpg', 'Fixed price', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rho', 1683092500, 'Micro processor/Micro controler', 31),
(26, 'sensor', '200', 'Smoke-Sensor-(MQ-6).jpg', 'Negotiable', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rho', 1683092545, 'Sensor', 31),
(27, 'finger print sensor', '300', 'FingerPrintSensor(R307).jpg', 'Fixed price', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rho', 1683092580, 'Sensor', 31),
(28, 'respberyy pie', '3000', 'RaspberryPi4AcrylicCasewithFan.jpg', 'Fixed price', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rho', 1683093218, 'Micro processor/Micro controler', 33),
(29, 'Arduino Mega', '2000', 'Arduino-Mega-Price-in-BD_1.jpg', 'Fixed price', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rho', 1683093268, 'Micro processor/Micro controler', 33),
(30, 'Giant Bread Board', '230', 'Breadboard-Giant.jpg', 'Fixed price', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rho', 1683093401, '3: breadboard', 33),
(31, 'Temp Sensor', '321', 'DS18B20DigitalTemperatureSensor01.jpg', 'Negotiable', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rho', 1683093507, 'Sensor', 34),
(32, 'Power Adapter', '450', 'PowerAdapter12V_1.jpg', 'Fixed price', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rho', 1683093534, 'Micro processor/Micro controler', 34),
(33, 'Electric Door lock', '400', 'Digital-Door-Lock-System.jpg', 'Fixed price', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rho', 1683093563, 'Micro processor/Micro controler', 34),
(34, 'Matrix keypad', '210', 'Matrix-Key-Pad-(4-X-4).jpg', 'Fixed price', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollicitudin mauris iaculis rhoncus bibendum. Vivamus et metus placerat, dignissim neque eu, porttitor orci. Suspendisse suscipit molestie nisl, sed consequat eros vulputate vitae. Curabitur sit amet pulvinar dolor. Proin elementum nisi vel mi hendrerit sollicitudin. Praesent molestie magna urna, at aliquam nunc mollis a. Curabitur quis ligula ipsum. Quisque gravida nisi a libero auctor pharetra. Ut ut ultricies est, vel consectetur arcu. Aliquam erat volutpat. Maecenas nec rhoncus ex.\r\n\r\nNam fermentum odio non consectetur sodales. In sit amet sem dapibus, porttitor lectus sit amet, hendrerit eros. Maecenas lectus eros, bibendum quis gravida at, pharetra ac arcu. Proin pellentesque mollis pellentesque. Curabitur dictum vehicula est, vel rho', 1683093595, '3: keypad', 34);

-- --------------------------------------------------------

--
-- Table structure for table `recycling`
--

CREATE TABLE `recycling` (
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_name` varchar(255) DEFAULT NULL,
  `p_image` text DEFAULT NULL,
  `p_type` varchar(255) DEFAULT NULL,
  `p_date` text DEFAULT NULL,
  `product_amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `p_details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recycling`
--

INSERT INTO `recycling` (`p_id`, `user_id`, `p_name`, `p_image`, `p_type`, `p_date`, `product_amount`, `status`, `p_details`) VALUES
(7, 33, 'arduino mega', 'Arduino-Mega-Price-in-BD_1.jpg', 'Micro Controller', '03-05-23', 0, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent solli'),
(8, 33, 'arduino nano', 'Arduino-Nano-Price-in-BD.jpg', 'Micro Controller', '03-05-23', 1, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent solli'),
(9, 33, '12V motor', 'DC-12V-Solenoid-Electric-Door-Lock.jpg', 'Motor', '03-05-23', 5, 0, 'orem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollic'),
(10, 34, 'Digital Door lock', 'Digital-Door-Lock-System.jpg', 'Others', '03-05-23', 1, 0, 'orem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur est nunc, eleifend vel lectus nec, luctus venenatis risus. Maecenas tortor dolor, volutpat et risus nec, suscipit mollis odio. Vestibulum et odio non tortor cursus eleifend. Praesent sollic'),
(11, 33, 'Temparature Sensor', 'DS18B20DigitalTemperatureSensor01.jpg', 'Sensor', '03-05-23', 5, 0, 'djansdijnaidnasidnaijsndasndjnasdjasndja');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `gender`) VALUES
(0, 'admin', 'admin', 'admin@admin.com', 'admin', 'admin', 'male'),
(31, 'Shayan', 'Shopnil', 'sshopnil203027@bscse.uiu.ac.bd', '$2y$10$youknowinknowblahblaH.ydKcKl8WWuieMZlJF/K/slM8zW4k6Xi', '01591147772', 'male'),
(33, 'Shadat ', 'Islam', 'shadat@gmail.com', '$2y$10$youknowinknowblahblaH.ydKcKl8WWuieMZlJF/K/slM8zW4k6Xi', '01591147771', 'male'),
(34, 'Sonjoy ', 'Dey', 'sdey@gmail.com', '$2y$10$youknowinknowblahblaH.ydKcKl8WWuieMZlJF/K/slM8zW4k6Xi', '01591147771', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lab_items`
--
ALTER TABLE `lab_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `lab_item_order`
--
ALTER TABLE `lab_item_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id_c` (`user_id`),
  ADD KEY `lab_item_c` (`lab_item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fk_categories` (`post_category_id`),
  ADD KEY `fk_authors` (`post_author`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users` (`user_id`),
  ADD KEY `fk_posts` (`post_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recycling`
--
ALTER TABLE `recycling`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lab_items`
--
ALTER TABLE `lab_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `lab_item_order`
--
ALTER TABLE `lab_item_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `recycling`
--
ALTER TABLE `recycling`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lab_item_order`
--
ALTER TABLE `lab_item_order`
  ADD CONSTRAINT `lab_item_c` FOREIGN KEY (`lab_item_id`) REFERENCES `lab_items` (`item_id`),
  ADD CONSTRAINT `user_id_c` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_authors` FOREIGN KEY (`post_author`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_categories` FOREIGN KEY (`post_category_id`) REFERENCES `post_categories` (`cat_id`);

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `fk_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `recycling`
--
ALTER TABLE `recycling`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
