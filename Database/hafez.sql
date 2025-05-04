-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2025 at 12:40 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hafez`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int NOT NULL,
  `student_id` int NOT NULL,
  `study_circle_id` int NOT NULL,
  `date_time` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `student_id`, `study_circle_id`, `date_time`, `status`, `notes`) VALUES
(1, 1, 1, '2025-03-02 22:46:15', 'حاضر', 'أداء جيد'),
(2, 1, 1, '2025-02-27 22:46:15', 'غائب', 'لم يحضر الجلسة'),
(3, 3, 1, '2025-03-01 22:46:15', 'حاضر', 'إتقان ممتاز'),
(4, 3, 1, '2025-02-26 22:46:15', 'حاضر', 'تحسن في التلاوة'),
(5, 4, 1, '2025-02-28 22:46:15', 'غائب', 'تم إبلاغ ولي الأمر'),
(6, 1, 1, '2025-03-02 23:04:02', 'حاضر', NULL),
(7, 3, 1, '2025-03-02 23:04:02', 'حاضر', NULL),
(8, 1, 1, '2025-03-02 23:19:49', 'حاضر', NULL),
(9, 3, 1, '2025-03-02 23:19:49', 'حاضر', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `evaluation_id` int NOT NULL,
  `student_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `surah_name` varchar(50) NOT NULL,
  `from_verse` varchar(50) NOT NULL,
  `to_verse` varchar(50) NOT NULL,
  `score` int NOT NULL,
  `comments` text NOT NULL,
  `evaluation_date` date NOT NULL,
  `evaluation_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`evaluation_id`, `student_id`, `teacher_id`, `surah_name`, `from_verse`, `to_verse`, `score`, `comments`, `evaluation_date`, `evaluation_type`, `notes`) VALUES
(1, 1, 1, 'البقرة', '1', '5', 85, 'أداء جيد مع بعض الأخطاء', '2025-03-02', NULL, NULL),
(2, 1, 1, 'النساء', '10', '15', 90, 'تحسن ملحوظ', '2025-02-23', NULL, NULL),
(3, 1, 1, 'الرحمن', '1', '10', 75, 'يحتاج إلى تحسين في التجويد', '2025-02-16', NULL, NULL),
(4, 1, 1, 'الكهف', '1', '5', 95, 'ممتاز جدًا', '2025-02-09', NULL, NULL),
(5, 3, 1, 'الفاتحة', '1', '7', 98, 'تجويد ممتاز', '2025-03-02', NULL, NULL),
(6, 3, 1, 'الأنفال', '20', '25', 80, 'يحتاج إلى تركيز أكثر', '2025-02-23', NULL, NULL),
(7, 3, 1, 'يس', '1', '10', 88, 'تحسن رائع', '2025-02-16', NULL, NULL),
(8, 3, 1, 'الزمر', '5', '15', 92, 'إتقان جيد', '2025-02-09', NULL, NULL),
(9, 4, 1, 'الملك', '1', '10', 70, 'بحاجة إلى تحسين الحفظ', '2025-03-02', NULL, NULL),
(10, 4, 1, 'الإسراء', '30', '40', 85, 'أداء متقن', '2025-02-23', NULL, NULL),
(11, 4, 1, 'النور', '5', '15', 78, 'يحتاج إلى تحسين في بعض الأحكام', '2025-02-16', NULL, NULL),
(12, 4, 1, 'الواقعة', '1', '10', 95, 'ممتاز جدًا', '2025-02-09', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `family_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` date NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`family_id`, `name`, `email`, `password`, `created_at`, `phone_number`, `user_id`) VALUES
(1, 'Kay Mathis', 'rysyw@mailinator.com', '$2y$10$g66aUNeIvNifbcivI6u/f.uSUQy23zye6kyR4Z5P9Py9lW2LI2EwG', '2025-03-02', '0567676666', 5),
(2, 'سليمان', 'parent@parent.com', '$2y$10$RQH.hSbY1qiJARsL4.4euezrh/EXfdNK.n.rU0trFjFoqkJI4p2Xy', '2025-03-02', '0565656550', 6);

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `leaderboard_id` int NOT NULL,
  `student_id` int NOT NULL,
  `points` int NOT NULL,
  `ranking` varchar(50) NOT NULL,
  `board_type` varchar(50) NOT NULL,
  `period_start_date` date NOT NULL,
  `period_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`leaderboard_id`, `student_id`, `points`, `ranking`, `board_type`, `period_start_date`, `period_end_date`) VALUES
(1, 1, 250, 'الثالث', 'شهري', '2024-05-01', '2024-05-31'),
(2, 3, 320, 'الأول', 'شهري', '2024-05-01', '2024-05-31'),
(3, 4, 280, 'الثاني', 'شهري', '2024-05-01', '2024-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int NOT NULL,
  `student_id` int DEFAULT NULL,
  `family_id` int NOT NULL,
  `type` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `student_id`, `family_id`, `type`, `message`, `is_read`, `created_at`) VALUES
(6, 1, 1, 'تحديث الحفظ', 'تم تحديث مستوى الحفظ للطالب.', 1, '2025-03-02'),
(7, 3, 1, 'إشعار جديد', 'لديك إشعار جديد من المعلم.', 1, '2025-03-02'),
(8, 3, 1, 'تنبيه مهم', 'يرجى مراجعة تقارير التقييم.', 1, '2025-03-02'),
(9, 4, 1, 'تقدم الحفظ', 'تمت إضافة جزء جديد إلى سجل الحفظ.', 1, '2025-03-02'),
(11, 1, 2, 'تحديث الحضور', 'تم تسجيل حالة الحضور للطالب', 1, '2025-03-02'),
(12, 3, 2, 'تحديث الحضور', 'تم تسجيل حالة الحضور للطالب', 1, '2025-03-02'),
(13, NULL, 2, 'تقرير جديد', 'تم إرسال تقرير جديد بخصوص ابنك.', 0, '2025-03-03'),
(14, NULL, 2, 'تقرير جديد', 'تم إرسال تقرير جديد بخصوص ابنك.', 0, '2025-03-03'),
(15, NULL, 1, 'تقرير جديد', 'تم إرسال تقرير جديد بخصوص ابنك.', 0, '2025-03-03'),
(16, NULL, 2, 'تقرير جديد', 'تم إرسال تقرير جديد بخصوص ابنك.', 0, '2025-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int NOT NULL,
  `subscription_id` int NOT NULL,
  `amount` int NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `family_id` int NOT NULL,
  `report_type` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `created_at` date NOT NULL,
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `teacher_id`, `family_id`, `report_type`, `content`, `created_at`, `is_read`) VALUES
(3, 1, 2, 'تفوق ملحوظ', 'Quidem cum excepteur', '2025-03-03', 0),
(5, 1, 1, 'التقدم الأكاديمي', 'Hic dicta illo anim', '2025-03-03', 0),
(6, 1, 2, 'التقدم الأكاديمي', 'zvdf', '2025-03-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int NOT NULL,
  `family_id` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` date NOT NULL,
  `memorization_level` int NOT NULL,
  `points` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `family_id`, `email`, `password`, `created_at`, `memorization_level`, `points`, `user_id`, `name`) VALUES
(1, 2, 'jufuwawef@mailinator.com', '$2y$10$qH3N261Hp7H07k39n7iNLOJT9trVQWHayyqxVznPB7fbKhmGY6G.S', '2025-03-02', 8, 0, 11, 'ابراهيم'),
(3, 2, 'xotafamo@mailinator.com', '$2y$10$3lgvsoxK5m2FCHpP.yvLNuFiwVdh5OwTGYAUnXNvewE/wEN2/mQTO', '2025-03-02', 17, 0, 13, 'انس'),
(4, 2, 'kypilefo@mailinator.com', '$2y$10$TNkwMabrOIfmbgLyI/b9XupzA8jKVy.pUj9/I4OKj9o3CUOnOwcky', '2025-03-02', 5, 0, 14, 'بندر');

-- --------------------------------------------------------

--
-- Table structure for table `study_circle`
--

CREATE TABLE `study_circle` (
  `study_circle_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `capacity` int NOT NULL,
  `schedule` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text NOT NULL,
  `teacher_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `study_circle`
--

INSERT INTO `study_circle` (`study_circle_id`, `name`, `capacity`, `schedule`, `description`, `teacher_id`) VALUES
(1, 'حلقــة التميــز', 20, 'مستوى متقدم', 'حلقة لحفظ ومراجعة القرآن الكريم', 1),
(2, 'حلقة الجمعه', 25, 'كل يوم جمعه الساعه 2 ظهرا', 'مراجعه', 1);

-- --------------------------------------------------------

--
-- Table structure for table `study_circle_student`
--

CREATE TABLE `study_circle_student` (
  `id` int NOT NULL,
  `study_circle_id` int NOT NULL,
  `student_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `study_circle_student`
--

INSERT INTO `study_circle_student` (`id`, `study_circle_id`, `student_id`, `created_at`) VALUES
(1, 1, 1, '2025-03-02 22:38:15'),
(2, 1, 3, '2025-03-02 22:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscription_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `amount` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `last_renewal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` date NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `name`, `email`, `password`, `created_at`, `user_id`) VALUES
(1, 'محمد القحطاني', 'teacher1@teacher.com', '$2y$10$RQH.hSbY1qiJARsL4.4euezrh/EXfdNK.n.rU0trFjFoqkJI4p2Xy', '2025-03-02', 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('teacher','student','family') NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `user_type`, `created_at`) VALUES
(1, 'teacher@teacher.com', '$2y$10$DvPh3gg6pzeM7J.djTQqaO1jI418aauZDWTZHyzUJBmzCwO9vTuOS', 'family', '2025-03-02'),
(5, 'rysyw@mailinator.com', '$2y$10$DvPh3gg6pzeM7J.djTQqaO1jI418aauZDWTZHyzUJBmzCwO9vTuOS', 'family', '2025-03-02'),
(6, 'parent@parent.com', '$2y$10$DvPh3gg6pzeM7J.djTQqaO1jI418aauZDWTZHyzUJBmzCwO9vTuOS', 'family', '2025-03-02'),
(11, 'student@student.com', '$2y$10$DvPh3gg6pzeM7J.djTQqaO1jI418aauZDWTZHyzUJBmzCwO9vTuOS', 'student', '2025-03-02'),
(13, 'xotafamo@mailinator.com', '$2y$10$DvPh3gg6pzeM7J.djTQqaO1jI418aauZDWTZHyzUJBmzCwO9vTuOS', 'student', '2025-03-02'),
(14, 'kypilefo@mailinator.com', '$2y$10$DvPh3gg6pzeM7J.djTQqaO1jI418aauZDWTZHyzUJBmzCwO9vTuOS', 'student', '2025-03-02'),
(15, 'teacher1@teacher.com', '$2y$10$DvPh3gg6pzeM7J.djTQqaO1jI418aauZDWTZHyzUJBmzCwO9vTuOS', 'teacher', '2025-03-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `study_circle_id` (`study_circle_id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`evaluation_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`family_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`leaderboard_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `family_id` (`family_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `subscription_id` (`subscription_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `family_id` (`family_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `family_id` (`family_id`);

--
-- Indexes for table `study_circle`
--
ALTER TABLE `study_circle`
  ADD PRIMARY KEY (`study_circle_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `study_circle_student`
--
ALTER TABLE `study_circle_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `study_circle_id` (`study_circle_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `evaluation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
  MODIFY `family_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `leaderboard_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `study_circle`
--
ALTER TABLE `study_circle`
  MODIFY `study_circle_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `study_circle_student`
--
ALTER TABLE `study_circle_student`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscription_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`study_circle_id`) REFERENCES `study_circle` (`study_circle_id`) ON DELETE CASCADE;

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluation_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE;

--
-- Constraints for table `family`
--
ALTER TABLE `family`
  ADD CONSTRAINT `fk_family_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD CONSTRAINT `leaderboard_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`family_id`) REFERENCES `family` (`family_id`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`subscription_id`) ON DELETE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`family_id`) REFERENCES `family` (`family_id`) ON DELETE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`family_id`) REFERENCES `family` (`family_id`) ON DELETE CASCADE;

--
-- Constraints for table `study_circle`
--
ALTER TABLE `study_circle`
  ADD CONSTRAINT `study_circle_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE;

--
-- Constraints for table `study_circle_student`
--
ALTER TABLE `study_circle_student`
  ADD CONSTRAINT `study_circle_student_ibfk_1` FOREIGN KEY (`study_circle_id`) REFERENCES `study_circle` (`study_circle_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `study_circle_student_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_teacher_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
