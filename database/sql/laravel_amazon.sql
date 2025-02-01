INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `mobile`, `mobile_verified_at`, `national_code`, `password`, `avatar`, `activation`, `is_admin`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-01-26 17:29:50', NULL, NULL, NULL, '$2y$12$7rGY7e.hWewO3Eoz0O71Veel38uECJfD9QD0SDa3V3UyX3IByOmDi', NULL, 0, 0, 'jcRwj4jlfy', '2025-01-26 17:29:50', '2025-01-26 17:29:50', NULL);

INSERT INTO `product_categories` (`id`, `parent_id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, NULL, 'ورزشی', 'ورزشی', 1, '2025-01-27 10:38:32', '2025-01-27 10:38:32', NULL),
(11, 10, 'استقلال', 'استقلال', 1, '2025-01-27 10:38:44', '2025-01-27 10:38:44', NULL),
(12, 10, 'پرسپولیس', 'پرسپولیس', 1, '2025-01-27 10:41:37', '2025-01-27 10:41:37', NULL),
(13, NULL, 'اقتصادی', 'اقتصادی', 1, '2025-01-27 10:55:02', '2025-01-27 10:55:02', NULL),
(14, 13, 'دلار', 'دلار', 0, '2025-01-27 10:55:19', '2025-01-27 10:55:19', NULL),
(15, 13, 'افزایش دلار 2', 'افزایش-دلار-2', 1, '2025-01-27 10:59:44', '2025-01-28 13:52:02', NULL),
(16, 13, 'یورو', 'یورو', 1, '2025-01-28 12:37:35', '2025-01-28 13:49:27', NULL),
(17, 13, 'ریال', 'ریال', 0, '2025-01-28 12:37:49', '2025-01-28 13:49:23', NULL);

INSERT INTO `brands` (`id`, `persian_name`, `english_name`, `slug`, `logo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'ایسوس', 'asus', NULL, '/upload/2025/1/28/1738082529.jpg', '2025-01-28 16:42:09', '2025-01-28 16:58:42', '2025-01-28 16:58:42'),
(7, 'dsf', 'dsf', NULL, '/upload/2025/1/28/1738083264.jpg', '2025-01-28 16:54:24', '2025-01-28 16:58:40', '2025-01-28 16:58:40'),
(8, 'fs', 'dfs', 'fs', '/upload/2025/1/28/1738083343.png', '2025-01-28 16:55:43', '2025-01-28 16:58:38', '2025-01-28 16:58:38'),
(9, 'fa', 'fa', 'fa', '/upload/2025/1/28/1738083384.jpg', '2025-01-28 16:56:24', '2025-01-28 16:58:37', '2025-01-28 16:58:37'),
(10, 'fa', 'da', 'fa-2', '/upload/2025/1/28/1738083392.png', '2025-01-28 16:56:32', '2025-01-28 16:58:34', '2025-01-28 16:58:34'),
(11, 'fa', 'fa', 'fa-3', '/upload/2025/1/28/1738083432.png', '2025-01-28 16:57:12', '2025-01-28 16:58:12', '2025-01-28 16:58:12'),
(12, 'اپل', 'apple', 'اپل', '/upload/2025/1/29/1738142122.jpg', '2025-01-28 17:04:41', '2025-01-29 09:15:22', NULL),
(13, 'ایسوس', 'asus', 'ایسوس', '/upload/2025/1/29/1738142658.jpg', '2025-01-29 09:24:18', '2025-01-29 09:24:18', NULL);

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'این چه سوالی است', 'عالی است', 1, NULL, '2025-01-29 22:47:04', '2025-01-29 22:47:04'),
(2, '<p>این یک سوال متداول جالب است</p>', '<p>این پاسخ سوال متداول جالب است</p>', 1, '2025-01-29 22:38:40', '2025-01-29 22:47:33', NULL);

INSERT INTO `menus` (`id`, `parent_id`, `name`, `url`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'ورزشی', '#', 0, NULL, NULL, NULL),
(2, NULL, 'تکنولوژی', '#', 0, NULL, '2025-01-31 17:00:06', NULL),
(3, 2, 'استقلال', 'https://varzesh3.com', 1, '2025-01-31 16:44:51', '2025-01-31 17:00:06', NULL);


INSERT INTO `pages` (`id`, `title`, `slug`, `body`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'صفحه ساز', 'صفحه-ساز', 'بدنه', NULL, '2025-01-30 14:11:08', '2025-01-30 14:11:08'),
(2, 'پیچ ساز2', 'پیچ-ساز2', '<p>محتوی پیج2</p>', '2025-01-30 13:45:54', '2025-01-30 14:10:12', NULL);

INSERT INTO `posts` (`id`, `title`, `body`, `view`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'پست خبری امروز', '<p>بدنه پست خبری امروز</p>', 0, '2025-01-29 15:00:25', '2025-01-29 15:07:57', NULL);


INSERT INTO `products` (`id`, `brand_id`, `product_category_id`, `name`, `description`, `slug`, `image`, `tags`, `price`, `sold_number`, `marketable_number`, `weight`, `length`, `width`, `height`, `marketable`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12, 14, 'iphone 16', NULL, NULL, NULL, 'ss', 700, 12, 21, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL);


INSERT INTO `comments` (`id`, `parent_id`, `user_id`, `commentable_id`, `commentable_type`, `body`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 1, 1, 'App\\Models\\Content\\Post', 'متن کامنت پست', 2, NULL, '2025-01-30 21:20:45', NULL),
(2, 1, 1, 1, 'App\\Models\\Content\\Post', 'نظرررر', 2, NULL, '2025-01-30 21:20:51', NULL),
(3, 1, 1, 1, 'App\\Models\\Content\\Post', 'این نطر فیک است', 2, NULL, '2025-01-30 21:20:52', NULL),
(5, NULL, 1, 1, 'App\\Models\\Market\\Product', 'عالی بود', 2, NULL, '2025-01-30 21:46:56', NULL),
(6, 5, 1, 1, 'App\\Models\\Market\\Product', 'پرته', 2, NULL, '2025-01-30 21:48:24', NULL);
