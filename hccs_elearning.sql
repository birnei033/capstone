-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2019 at 03:52 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hccs_elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `college_students`
--

CREATE TABLE `college_students` (
  `student_id` int(11) NOT NULL,
  `school_id` varchar(255) NOT NULL,
  `student_login_name` varchar(255) NOT NULL,
  `student_full_name` varchar(255) NOT NULL,
  `student_password` varchar(255) NOT NULL DEFAULT 'changeme',
  `student_program` varchar(255) NOT NULL,
  `student_subjects` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college_students`
--

INSERT INTO `college_students` (`student_id`, `school_id`, `student_login_name`, `student_full_name`, `student_password`, `student_program`, `student_subjects`, `added_by`, `date_added`, `date_updated`) VALUES
(9, '1055', 'test_1', 'Tonyo toyo4', 'password', '2', '36', '2', '0000-00-00', '2018-12-30'),
(10, '1056', 'bernz', 'Sunshine Dizon', 'changeme', '2', '1', '2', '0000-00-00', '2019-01-01'),
(11, '1056', 'sunshine', 'Sunshine Dizon', 'password', '2', '38', '2', '0000-00-00', '2018-12-30'),
(12, '1056', 'Cloe', 'Tanya Markova', 'password', '1', '1', '2', '0000-00-00', '2019-01-08'),
(14, '1085', 'Bernz', 'Tanya Markova', 'changeme', '1', '40', '1', '0000-00-00', '2018-12-31'),
(22, '143', 'che', 'Cherry Sarino Gomez', 'password', '1', '41', '1', '0000-00-00', '2019-01-08'),
(23, '1056', 'Bernz', 'My name is', 'changeme', '2', '36', '2', '0000-00-00', '0000-00-00'),
(24, '1056', 'Cloe', 'Sunshine Dizon', 'password', '1', '40', '1', '0000-00-00', '2019-01-08'),
(26, '1085', '1_Cloe', 'Tanya Markova', 'changeme', '1', '43', '1', '0000-00-00', '0000-00-00'),
(27, '1056', '43_Cloe', 'Tanya Markova', 'changeme', '1', '43', '1', '0000-00-00', '0000-00-00'),
(28, '1056r', '40_Cloe', 'Tanya Markova', 'changeme', '1', '40', '1', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `college_teachers`
--

CREATE TABLE `college_teachers` (
  `ct_id` int(11) NOT NULL,
  `ct_login_name` varchar(255) NOT NULL,
  `ct_full_name` varchar(255) NOT NULL,
  `ct_password` varchar(255) NOT NULL,
  `ct_handled_students` varchar(255) NOT NULL,
  `ct_program` varchar(255) NOT NULL,
  `ct_courses` varchar(255) NOT NULL,
  `ct_subjects_lessons` varchar(255) DEFAULT NULL,
  `ct_date_added` date NOT NULL,
  `ct_date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college_teachers`
--

INSERT INTO `college_teachers` (`ct_id`, `ct_login_name`, `ct_full_name`, `ct_password`, `ct_handled_students`, `ct_program`, `ct_courses`, `ct_subjects_lessons`, `ct_date_added`, `ct_date_updated`) VALUES
(1, 'teacher', 'Jamill Cabase', 'password', '', '', '', NULL, '0000-00-00', '0000-00-00'),
(2, 'BernZ', 'Bernie Gwapo', 'password', '', '1', '1', '1', '2018-12-28', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `id` int(3) NOT NULL,
  `ex_name` varchar(255) NOT NULL,
  `subject_id` int(3) NOT NULL,
  `teacher_id` int(3) NOT NULL,
  `ex_type_id` int(3) NOT NULL,
  `ex_questions` text NOT NULL,
  `date_added` date NOT NULL,
  `date_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `subject_id` int(3) NOT NULL DEFAULT '0',
  `lesson_title` varchar(255) NOT NULL,
  `lesson_content` text NOT NULL,
  `lesson_author` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `subject_id`, `lesson_title`, `lesson_content`, `lesson_author`, `date_created`, `date_updated`) VALUES
(10, 40, 'Sana Ikaw na nga', '{\"content\":\"<p style=\\\"text-align: center;\\\"><iframe allow=\\\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\\\" allowfullscreen=\\\"\\\" frameborder=\\\"0\\\" height=\\\"410\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/67g5KHm3ksI\\\" width=\\\"729\\\"><\\/iframe><\\/p>\\r\\n\\r\\n<div style=\\\"background: rgb(238, 238, 238); border: 1px solid rgb(204, 204, 204); padding: 5px 10px; text-align: center;\\\">This video is from youtube to become you one and only video out from your server.<\\/div>\\r\\n\\r\\n<h2 style=\\\"text-align: center;\\\"><span style=\\\"font-family:Comic Sans MS,cursive;\\\">one <span style=\\\"background-color:#2ecc71;\\\">thing <\\/span>is these you can take it all.<\\/span><\\/h2>\\r\\n\"}', '1', '0000-00-00', '2018-12-31'),
(12, 1, 'The Man Behind Bars 56', '{\"content\":\"<p><iframe allow=\\\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\\\" allowfullscreen=\\\"\\\" frameborder=\\\"0\\\" height=\\\"410\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/67g5KHm3ksI\\\" width=\\\"729\\\"><\\/iframe><\\/p>\\r\\n\"}', '2', '0000-00-00', '0000-00-00'),
(13, 38, 'test123', '{\"content\":\"<h1>test only<\\/h1>\\r\\n\"}', '2', '0000-00-00', '2018-12-31'),
(14, 1, 'This is a sample 14', '{\"content\":\"<p>dvdv<\\/p>\\r\\n\"}', '1', '0000-00-00', '0000-00-00'),
(15, 36, 'bablalbabb', '{\"content\":\"<p>ggg<\\/p>\\r\\n\"}', '2', '0000-00-00', '0000-00-00'),
(16, 36, 'Titot', '{\"content\":\"<p><img alt=\\\"\\\" height=\\\"300\\\" src=\\\"\\/ignite\\/assets\\/ckeditor\\/kcfinder\\/upload\\/images\\/123.jpg\\\" width=\\\"275\\\" \\/>vbvbvbghgh<\\/p>\\r\\n\\r\\n<p>ghghghghghgghghghg<\\/p>\\r\\n\\r\\n<p>ghghghghg<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\"}', '2', '2019-03-01', '0000-00-00'),
(17, 1, 'test', '{\"content\":\"<p><img alt=\\\"\\\" height=\\\"260\\\" src=\\\"http:\\/\\/localhost\\/ignite\\/assets\\/ckeditor\\/kcfinder\\/upload\\/images\\/42221068_727957497542907_5953412606034182144_n.jpg\\\" width=\\\"463\\\" \\/><\\/p>\\r\\n\\r\\n<h2>This man is the bes<\\/h2>\\r\\n\\r\\n<p>good for 2 pax only<\\/p>\\r\\n\\r\\n<h2><a href=\\\"http:\\/\\/localhost\\/ignite\\/assets\\/ckeditor\\/kcfinder\\/upload\\/files\\/ASIO4ALL%20v2%20Instruction%20Manual.pdf\\\" target=\\\"_blank\\\">Download this file for reference.<\\/a><\\/h2>\\r\\n\\r\\n<h2>&nbsp;<\\/h2>\\r\\n\\r\\n<h2>FINGER POSITIONS ON GUITAR CHORD<\\/h2>\\r\\n\\r\\n<p><img align=\\\"left\\\" alt=\\\"http:\\/\\/www.i-love-piano.com\\/guitar-lessons\\/image\\/002_1.jpg\\\" height=\\\"313\\\" hspace=\\\"12\\\" src=\\\"http:\\/\\/www.i-love-piano.com\\/guitar-lessons\\/image\\/002_1.jpg\\\" width=\\\"283\\\" \\/><img align=\\\"left\\\" alt=\\\"https:\\/\\/www.dummies.com\\/wp-content\\/uploads\\/162743.image0.jpg\\\" height=\\\"618\\\" hspace=\\\"12\\\" src=\\\"https:\\/\\/www.dummies.com\\/wp-content\\/uploads\\/162743.image0.jpg\\\" width=\\\"678\\\" \\/><\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p><iframe allow=\\\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\\\" allowfullscreen=\\\"\\\" frameborder=\\\"0\\\" height=\\\"410\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/fPbW7JhIZOQ\\\" width=\\\"729\\\"><\\/iframe><\\/p>\\r\\n\"}', '2', '2019-03-01', '0000-00-00'),
(18, 38, 'Scammer Alert!', '{\"content\":\"<div class=\\\"table-responsive\\\">\\r\\n<table style=\\\"width:100%\\\">\\r\\n\\t<tbody>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<td style=\\\"width:46%\\\"><img alt=\\\"\\\" height=\\\"297\\\" src=\\\"\\/ignite\\/assets\\/ckeditor\\/kcfinder\\/upload\\/images\\/44054639_543253842806077_2595966649899155456_n.jpg\\\" width=\\\"457\\\" \\/><img alt=\\\"\\\" height=\\\"625\\\" sizes=\\\"100\\\" src=\\\"\\/ignite\\/assets\\/ckeditor\\/kcfinder\\/upload\\/images\\/44054639_543253842806077_2595966649899155456_n(1).jpg\\\" srcset=\\\"100\\\" width=\\\"960\\\" \\/><\\/td>\\r\\n\\t\\t\\t<td style=\\\"vertical-align:top\\\">\\r\\n\\t\\t\\t<h1>Wanted<\\/h1>\\r\\n\\r\\n\\t\\t\\t<p>This man just scammed my brother in the game..<\\/p>\\r\\n\\t\\t\\t<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\"}', '2', '2019-03-01', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(11) NOT NULL,
  `program_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_title`) VALUES
(1, 'BSIT'),
(2, 'BSED');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(3) NOT NULL,
  `course_id` int(3) NOT NULL,
  `number_of_lessons` int(3) NOT NULL DEFAULT '0',
  `subject_title` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `create_on` date NOT NULL,
  `update_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `course_id`, `number_of_lessons`, `subject_title`, `added_by`, `create_on`, `update_on`) VALUES
(1, 1, 8, 'IT Elect 12', '2', '0000-00-00', '2018-10-12'),
(36, 0, 0, 'it elect 104', '2', '0000-00-00', '0000-00-00'),
(38, 0, 0, 'testrt54', '2', '2018-12-28', '0000-00-00'),
(40, 0, 0, 'IT ELEC 4', '1', '2018-12-31', '0000-00-00'),
(41, 0, 0, 'IT elec 3', '1', '2018-12-31', '2018-12-31'),
(43, 0, 0, 'IT 5', '1', '2018-12-31', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college_students`
--
ALTER TABLE `college_students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `college_teachers`
--
ALTER TABLE `college_teachers`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `college_students`
--
ALTER TABLE `college_students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `college_teachers`
--
ALTER TABLE `college_teachers`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
