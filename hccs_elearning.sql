-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2019 at 06:55 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

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
(1, '1052', '44_bernz', 'Bernie Santos A. Cabase', 'password', '1', '44', '2', '0000-00-00', '2019-01-16'),
(2, '1052', '45_bernz', 'Bernie Santos A. Cabase', 'changeme', '1', '45', '2', '0000-00-00', '0000-00-00'),
(3, '1052', '46_bernz', 'Bernie Santos A. Cabase', 'changeme', '1', '46', '2', '0000-00-00', '0000-00-00'),
(4, '1052', '47_bernz', 'Bernie Santos A. Cabase', 'changeme', '1', '47', '2', '0000-00-00', '0000-00-00'),
(5, '1052', '48_bernz', 'Bernie Santos A. Cabase', 'password', '2', '48', '1', '0000-00-00', '2019-01-18');

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
  `ex_time` int(11) NOT NULL DEFAULT '0',
  `ex_schedule` int(11) NOT NULL DEFAULT '0',
  `ex_answers` text NOT NULL,
  `date_added` date NOT NULL,
  `date_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `ex_name`, `subject_id`, `teacher_id`, `ex_type_id`, `ex_questions`, `ex_time`, `ex_schedule`, `ex_answers`, `date_added`, `date_updated`) VALUES
(9, 'test', 48, 1, 0, '\n        <div id=\"timer-wrapper\" class=\"text-center mb-4\"><div id=\"timer\"><span id=\"clock-icon\"></span><span>Time: </span><span id=\"time\">30</span> minutes</div></div>\n        <style>\n        #clock-icon{\n            background-image: url(http://localhost/ignite/assets/images/alarm-clock.png);\n        }\n  </style>\n        <table class=\"table \">\n            <tbody id=\"ex-elems\">\n                <tr>\n                    <td class=\"p-0\">\n                        <table class=\"table table-hover\">\n                            <tbody id=\"ex-elems-m-choice\"><tr><td><h4>Charlang</h4></td></tr><tr class=\"ex-m-choices num-1\"><td><h5>1. 1+1=?</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"11\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>11</label></div><div class=\"radio radio-inline\"><label><input value=\"5\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>5</label></div><div class=\"radio radio-inline\"><label><input value=\"4\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>4</label></div><div class=\"radio radio-inline\"><label><input value=\"2\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>2</label></div></div></form><div class=\"col-sm-6\"></div></div></div></div></td></tr></tbody>\n                        </table>\n                    </td>\n                </tr>\n                <tr>\n                    <td class=\"p-0\">\n                        <table class=\"table table-hover\">\n                            <tbody id=\"ex-elems-tf\"></tbody>\n                        </table>\n                    </td>\n                </tr>\n                <tr>\n                    <td class=\"p-0\">\n                        <table class=\"table table-hover\">\n                            <tbody id=\"ex-elems-written\"></tbody>\n                        </table>\n                    </td>\n                </tr>\n            </tbody>\n        </table>\n    ', 30, 0, '{\"mc_answers\":{\"mchoice-1\":\"2\"},\"tf_answers\":{},\"written_answers\":{}}', '2019-01-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `finished_exercises`
--

CREATE TABLE `finished_exercises` (
  `id` int(11) NOT NULL,
  `ex_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `cs_id` int(11) NOT NULL,
  `ct_id` int(11) NOT NULL,
  `ex_score` int(11) NOT NULL,
  `ex_total_item` int(3) NOT NULL,
  `ex_score_percent` int(3) NOT NULL,
  `ex_cs_answers` text NOT NULL,
  `date_exercise_taken` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finished_exercises`
--

INSERT INTO `finished_exercises` (`id`, `ex_id`, `subject_id`, `cs_id`, `ct_id`, `ex_score`, `ex_total_item`, `ex_score_percent`, `ex_cs_answers`, `date_exercise_taken`) VALUES
(1, 2, 48, 5, 1, 2, 4, 50, '{\"cs_answer\":{\"mc_answers\":{\"mchoice-1\":\"2\",\"mchoice-2\":\"4\"},\"tf_answers\":{\"tf-1\":\"true\",\"tf-2\":\"true\"},\"written_answers\":null},\"correct_answers\":{\"mc_answers\":{\"mchoice-1\":\"2\",\"mchoice-2\":\"4\"},\"tf_answers\":{\"tf-1\":\"true\",\"tf-2\":\"true\"},\"written_answers\":{}}}', '2019-01-18'),
(2, 2, 48, 5, 1, 4, 4, 100, '{\"cs_answer\":{\"mc_answers\":{\"mchoice-1\":\"2\",\"mchoice-2\":\"4\"},\"tf_answers\":{\"tf-1\":\"false\",\"tf-2\":\"false\"},\"written_answers\":null},\"correct_answers\":{\"mc_answers\":{\"mchoice-1\":\"2\",\"mchoice-2\":\"4\"},\"tf_answers\":{\"tf-1\":\"true\",\"tf-2\":\"true\"},\"written_answers\":{}}}', '2019-01-18');

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
(1, 44, 'January 16', '{\"content\":\"<h4>Impairment&nbsp;of knowledge<\\/h4>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Ignorance<\\/li>\\r\\n\\t<li>Error<\\/li>\\r\\n\\t<li>Attention<\\/li>\\r\\n<\\/ol>\\r\\n\\r\\n<h4>Concepts of Freedom<\\/h4>\\r\\n\\r\\n<p>God - ultimate freedom<\\/p>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Core Freedom<\\/li>\\r\\n\\t<li>Inner Freedom - In me, me in me<\\/li>\\r\\n\\t<li>External Freedom<\\/li>\\r\\n\\t<li>Authentic Freedom - allow the right decisions<\\/li>\\r\\n\\t<li>Freedom of Choice<\\/li>\\r\\n\\t<li>Fundamental Freedom - for life<\\/li>\\r\\n\\t<li>Fundamental Stance - principle, example: where we&#39;re heading to; to whom we&#39;re heading for<\\/li>\\r\\n<\\/ol>\\r\\n\\r\\n<h4>Impairment of Free Consent<\\/h4>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Passion \\/ Concupiscence<br \\/>\\r\\n\\tPassion - too much love to something<br \\/>\\r\\n\\tConcupiscence -&nbsp;strong sexual desire - uwag<\\/li>\\r\\n\\t<li>Fear<\\/li>\\r\\n\\t<li>Habits<\\/li>\\r\\n\\t<li>Violence<\\/li>\\r\\n<\\/ol>\\r\\n\\r\\n<h4>Determine the morality of the act<\\/h4>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Moral Object - action<\\/li>\\r\\n\\t<li>Circumstances - lessen or aggrevate<\\/li>\\r\\n\\t<li>Intention<\\/li>\\r\\n<\\/ol>\\r\\n\\r\\n<h4>Criteria<\\/h4>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Moral obligation - all aspects<\\/li>\\r\\n\\t<li>Moral Ideas - Prudence, Justice, Temperance, Courage<\\/li>\\r\\n\\t<li>Consequence<\\/li>\\r\\n<\\/ol>\\r\\n\"}', '2', '0000-00-00', '0000-00-00'),
(2, 44, 'January 14 - Human Acts', '{\"content\":\"<h4>Human Act<\\/h4>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Human Act - Free will. Act consiously.<\\/li>\\r\\n\\t<li>Act of Man - Act unconsiously<\\/li>\\r\\n<\\/ol>\\r\\n\"}', '2', '0000-00-00', '0000-00-00');

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
(44, 0, 0, 'ReEd 4', '2', '2019-01-16', '0000-00-00'),
(45, 0, 0, 'ReEd 6', '2', '2019-01-16', '0000-00-00'),
(46, 0, 0, 'NS 1', '2', '2019-01-16', '0000-00-00'),
(47, 0, 0, 'English 2', '2', '2019-01-16', '0000-00-00'),
(48, 0, 0, 'test', '1', '2019-01-18', '0000-00-00');

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
-- Indexes for table `finished_exercises`
--
ALTER TABLE `finished_exercises`
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
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `college_teachers`
--
ALTER TABLE `college_teachers`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `finished_exercises`
--
ALTER TABLE `finished_exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
