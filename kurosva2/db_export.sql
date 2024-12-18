-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2024 at 10:41 PM
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
-- Database: `laptops`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--
CREATE TABLE `favorite_products_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `favorite_products_users` (`id`, `user_id`, `product_id`) VALUES
(1, 11, 1);

CREATE TABLE `products` (
  `id` int(11) NOT NULL COMMENT 'Първичен ключ',
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--


INSERT INTO `products` (`id`, `name`, `image`, `artist`, `price`, ) VALUES
(1, 'Unreal Unearth CD', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-nbsjoTD76rlKRpMlXa_vxOGtPUj55glxiQ&s', 'Hozier', '13.98'),
(2, 'The Land Is Inhospitable And So Are We CD', 'https://f4.bcbits.com/img/a2771200531_10.jpg', 'Mitski', '14.98'),
(3, 'Brand New Eyes CD', 'https://m.media-amazon.com/images/I/81m0BptHZ4L._UF894,1000_QL80_.jpg', 'Paramore', '24.09'),
(4, 'Wasteland, baby! Vinyl', 'https://happyvalleyshop.com/cdn/shop/files/hozier2lp_480x.jpg?v=1716261944', 'Hozier', '43.23'),
(5, 'Collide with the Sky CD', 'https://m.media-amazon.com/images/I/71ajNuf3VlL._UF894,1000_QL80_.jpg', 'Pierce the Veil', '14.99'),
(6, 'Three Cheers For Sweet Revenge Vinyl', 'https://store.warnermusic.ca/cdn/shop/files/wmcstore2023_product_template_9e6bb086-6556-4d16-84a4-d754b02e7599.jpg?v=1703159291&width=720', 'My Chemical Romance', '29.99'),
(7, 'From Under The Cork Tree CD', 'https://www.ciela.com/media/catalog/product/cache/9a7ceae8a5abbd0253425b80f9ef99a5/f/a/fall_out_boy_-_from_under_the_cork_tree_-_cd_-_602498800140_-_.jpg', 'Fall Out Boy','14.99'),
(8, 'Black hole and revelations CD', 'https://upload.wikimedia.org/wikipedia/en/c/c5/BlackHolesCover.jpg', 'Muse', '10.69');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Simeon', 'simeon@abv.bg', '$argon2i$v=19$m=65536,t=4,p=1$TjdJTEJOM2l3UnBQOHptNw$jnD/1BsVbs+Ipp+qKch48NvkTyZujJ5cSVVliYAdC4Y'),
(2, 'Ivan', 'ivan@abv.bg', '$argon2i$v=19$m=65536,t=4,p=1$UkQ5c203YXc4YXJKYUNLMg$P8foauny24tsxCkjHvLlsh0gpT1aMaM7qwRAz5SAlPY');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Първичен ключ', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
