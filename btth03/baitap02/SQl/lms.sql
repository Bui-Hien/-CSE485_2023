-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 13, 2023 lúc 09:30 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lms`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Course1', 'Description1', '2023-01-01', '2023-01-01'),
(2, 'Course2', 'Description2', '2023-01-02', '2023-01-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_user`
--

DROP TABLE IF EXISTS `course_user`;
CREATE TABLE IF NOT EXISTS `course_user` (
  `course_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`course_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `course_user`
--

INSERT INTO `course_user` (`course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-01-01', '2023-01-01'),
(2, 2, '2023-01-02', '2023-01-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int NOT NULL,
  `course_id` int DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `lessons`
--

INSERT INTO `lessons` (`id`, `course_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lesson1', 'Description1', '2023-01-01', '2023-01-01'),
(2, 1, 'Lesson2', 'Description2', '2023-01-02', '2023-01-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `materials`
--

DROP TABLE IF EXISTS `materials`;
CREATE TABLE IF NOT EXISTS `materials` (
  `id` int NOT NULL,
  `lesson_id` int DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lesson_id` (`lesson_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `materials`
--

INSERT INTO `materials` (`id`, `lesson_id`, `title`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'Material1', '/path/to/material1', '2023-01-01', '2023-01-01'),
(2, 1, 'Material2', '/path/to/material2', '2023-01-02', '2023-01-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int NOT NULL,
  `question_id` int DEFAULT NULL,
  `options` text,
  `is_correct` tinyint(1) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `options`
--

INSERT INTO `options` (`id`, `question_id`, `options`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 1, 'Option1', 1, '2023-01-01', '2023-01-01'),
(2, 1, 'Option2', 0, '2023-01-02', '2023-01-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int NOT NULL,
  `quiz_id` int DEFAULT NULL,
  `question` text,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quiz_id` (`quiz_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question`, `created_at`, `updated_at`) VALUES
(1, 1, 'Question1', '2023-01-01', '2023-01-01'),
(2, 1, 'Question2', '2023-01-02', '2023-01-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quizzes`
--

DROP TABLE IF EXISTS `quizzes`;
CREATE TABLE IF NOT EXISTS `quizzes` (
  `id` int NOT NULL,
  `lesson_id` int DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lesson_id` (`lesson_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `quizzes`
--

INSERT INTO `quizzes` (`id`, `lesson_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Quiz1', '2023-01-01', '2023-01-01'),
(2, 2, 'Quiz2', '2023-01-02', '2023-01-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'User1', 'user1@example.com', 'password1', '2023-01-01', '2023-01-01'),
(2, 'User2', 'user2@example.com', 'password2', '2023-01-02', '2023-01-02'),
(3, 'User3', 'user3@example.com', 'password3', '2023-01-03', '2023-01-03'),
(4, 'User4', 'user4@example.com', 'password4', '2023-01-04', '2023-01-04'),
(5, 'User5', 'user5@example.com', 'password5', '2023-01-05', '2023-01-05'),
(6, 'User6', 'user6@example.com', 'password6', '2023-01-06', '2023-01-06'),
(7, 'User7', 'user7@example.com', 'password7', '2023-01-07', '2023-01-07'),
(8, 'User8', 'user8@example.com', 'password8', '2023-01-08', '2023-01-08'),
(9, 'User9', 'user9@example.com', 'password9', '2023-01-09', '2023-01-09'),
(10, 'User10', 'user10@example.com', 'password10', '2023-01-10', '2023-01-10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
