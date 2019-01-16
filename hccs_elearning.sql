-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2019 at 03:01 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(4, '1052', '47_bernz', 'Bernie Santos A. Cabase', 'changeme', '1', '47', '2', '0000-00-00', '0000-00-00');

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
  `ex_answers` text NOT NULL,
  `date_added` date NOT NULL,
  `date_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `ex_name`, `subject_id`, `teacher_id`, `ex_type_id`, `ex_questions`, `ex_answers`, `date_added`, `date_updated`) VALUES
(1, 'Mid-Term Possible Exam', 44, 2, 0, '<tr class="text text-0"><td><h4>All Mixed</h4></td></tr><tr class="ex-m-choices num-1"><td><h5>1. Impairment of knowledge</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Core Freedom" type="radio" name="m-choice-1"><i class="helper"></i>Core Freedom</label></div><div class="radio radio-inline"><label><input value="Fear" type="radio" name="m-choice-1"><i class="helper"></i>Fear</label></div><div class="radio radio-inline"><label><input value="Error" type="radio" name="m-choice-1"><i class="helper"></i>Error</label></div><div class="radio radio-inline"><label><input value="Habits" type="radio" name="m-choice-1"><i class="helper"></i>Habits</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-2"><td><h5>2. Impairment of knowledge</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Habits" type="radio" name="m-choice-2"><i class="helper"></i>Habits</label></div><div class="radio radio-inline"><label><input value="Intention" type="radio" name="m-choice-2"><i class="helper"></i>Intention</label></div><div class="radio radio-inline"><label><input value="Ignorance" type="radio" name="m-choice-2"><i class="helper"></i>Ignorance</label></div><div class="radio radio-inline"><label><input value="Violence" type="radio" name="m-choice-2"><i class="helper"></i>Violence</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-3"><td><h5>3. Impairment of knowledge</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Freedom" type="radio" name="m-choice-3"><i class="helper"></i>Freedom</label></div><div class="radio radio-inline"><label><input value="Fear" type="radio" name="m-choice-3"><i class="helper"></i>Fear</label></div><div class="radio radio-inline"><label><input value="Choice" type="radio" name="m-choice-3"><i class="helper"></i>Choice</label></div><div class="radio radio-inline"><label><input value="Attention" type="radio" name="m-choice-3"><i class="helper"></i>Attention</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-4"><td><h5>4. Impairment of Free Consent</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Passion / Concupiscence" type="radio" name="m-choice-4"><i class="helper"></i>Passion / Concupiscence</label></div><div class="radio radio-inline"><label><input value="Intention" type="radio" name="m-choice-4"><i class="helper"></i>Intention</label></div><div class="radio radio-inline"><label><input value="Moral obligation" type="radio" name="m-choice-4"><i class="helper"></i>Moral obligation</label></div><div class="radio radio-inline"><label><input value="Consequence" type="radio" name="m-choice-4"><i class="helper"></i>Consequence</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-5"><td><h5>5. Impairment of Free Consent</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Intention" type="radio" name="m-choice-5"><i class="helper"></i>Intention</label></div><div class="radio radio-inline"><label><input value="Fundamental Freedom" type="radio" name="m-choice-5"><i class="helper"></i>Fundamental Freedom</label></div><div class="radio radio-inline"><label><input value="Moral obligation" type="radio" name="m-choice-5"><i class="helper"></i>Moral obligation</label></div><div class="radio radio-inline"><label><input value="Fear" type="radio" name="m-choice-5"><i class="helper"></i>Fear</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-6"><td><h5>6. Impairment of Free Consent</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Intention" type="radio" name="m-choice-6"><i class="helper"></i>Intention</label></div><div class="radio radio-inline"><label><input value="Habits" type="radio" name="m-choice-6"><i class="helper"></i>Habits</label></div><div class="radio radio-inline"><label><input value="Circumstances " type="radio" name="m-choice-6"><i class="helper"></i>Circumstances </label></div><div class="radio radio-inline"><label><input value="Fundamental Freedom" type="radio" name="m-choice-6"><i class="helper"></i>Fundamental Freedom</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-7"><td><h5>7. Impairment of Free Consent</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Circumstances " type="radio" name="m-choice-7"><i class="helper"></i>Circumstances </label></div><div class="radio radio-inline"><label><input value="Intention" type="radio" name="m-choice-7"><i class="helper"></i>Intention</label></div><div class="radio radio-inline"><label><input value="Stance " type="radio" name="m-choice-7"><i class="helper"></i>Stance </label></div><div class="radio radio-inline"><label><input value="Violence" type="radio" name="m-choice-7"><i class="helper"></i>Violence</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-8"><td><h5>8. Concepts of Freedom</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Passion " type="radio" name="m-choice-8"><i class="helper"></i>Passion </label></div><div class="radio radio-inline"><label><input value="Core Freedom" type="radio" name="m-choice-8"><i class="helper"></i>Core Freedom</label></div><div class="radio radio-inline"><label><input value="Circumstances " type="radio" name="m-choice-8"><i class="helper"></i>Circumstances </label></div><div class="radio radio-inline"><label><input value="Attention" type="radio" name="m-choice-8"><i class="helper"></i>Attention</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-9"><td><h5>9. Concepts of Freedom</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Attention" type="radio" name="m-choice-9"><i class="helper"></i>Attention</label></div><div class="radio radio-inline"><label><input value="Circumstances " type="radio" name="m-choice-9"><i class="helper"></i>Circumstances </label></div><div class="radio radio-inline"><label><input value="Ignorance" type="radio" name="m-choice-9"><i class="helper"></i>Ignorance</label></div><div class="radio radio-inline"><label><input value="Inner Freedom" type="radio" name="m-choice-9"><i class="helper"></i>Inner Freedom</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-10"><td><h5>10. Concepts of Freedom</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Error" type="radio" name="m-choice-10"><i class="helper"></i>Error</label></div><div class="radio radio-inline"><label><input value="Ignorance" type="radio" name="m-choice-10"><i class="helper"></i>Ignorance</label></div><div class="radio radio-inline"><label><input value="External Freedom" type="radio" name="m-choice-10"><i class="helper"></i>External Freedom</label></div><div class="radio radio-inline"><label><input value="Attention" type="radio" name="m-choice-10"><i class="helper"></i>Attention</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-11"><td><h5>11. Concepts of Freedom</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Fear" type="radio" name="m-choice-11"><i class="helper"></i>Fear</label></div><div class="radio radio-inline"><label><input value="Attention" type="radio" name="m-choice-11"><i class="helper"></i>Attention</label></div><div class="radio radio-inline"><label><input value="Authentic Freedom" type="radio" name="m-choice-11"><i class="helper"></i>Authentic Freedom</label></div><div class="radio radio-inline"><label><input value="Habits" type="radio" name="m-choice-11"><i class="helper"></i>Habits</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-12"><td><h5>12. Concepts of Freedom</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Habits" type="radio" name="m-choice-12"><i class="helper"></i>Habits</label></div><div class="radio radio-inline"><label><input value="Moral Object" type="radio" name="m-choice-12"><i class="helper"></i>Moral Object</label></div><div class="radio radio-inline"><label><input value="Attention" type="radio" name="m-choice-12"><i class="helper"></i>Attention</label></div><div class="radio radio-inline"><label><input value="Freedom of Choice" type="radio" name="m-choice-12"><i class="helper"></i>Freedom of Choice</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-13"><td><h5>13. Concepts of Freedom</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Fundamental Freedom" type="radio" name="m-choice-13"><i class="helper"></i>Fundamental Freedom</label></div><div class="radio radio-inline"><label><input value="Passion" type="radio" name="m-choice-13"><i class="helper"></i>Passion</label></div><div class="radio radio-inline"><label><input value="Attention" type="radio" name="m-choice-13"><i class="helper"></i>Attention</label></div><div class="radio radio-inline"><label><input value="Consequence" type="radio" name="m-choice-13"><i class="helper"></i>Consequence</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-14"><td><h5>14. Concepts of Freedom</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Moral Object" type="radio" name="m-choice-14"><i class="helper"></i>Moral Object</label></div><div class="radio radio-inline"><label><input value="Fundamental Stance" type="radio" name="m-choice-14"><i class="helper"></i>Fundamental Stance</label></div><div class="radio radio-inline"><label><input value="Attention" type="radio" name="m-choice-14"><i class="helper"></i>Attention</label></div><div class="radio radio-inline"><label><input value="Passion" type="radio" name="m-choice-14"><i class="helper"></i>Passion</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-15"><td><h5>15. Determine the morality of the act</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Passion" type="radio" name="m-choice-15"><i class="helper"></i>Passion</label></div><div class="radio radio-inline"><label><input value="Moral Object" type="radio" name="m-choice-15"><i class="helper"></i>Moral Object</label></div><div class="radio radio-inline"><label><input value="Attention" type="radio" name="m-choice-15"><i class="helper"></i>Attention</label></div><div class="radio radio-inline"><label><input value="Fear" type="radio" name="m-choice-15"><i class="helper"></i>Fear</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-16"><td><h5>16. Determine the morality of the act</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Moral Ideas" type="radio" name="m-choice-16"><i class="helper"></i>Moral Ideas</label></div><div class="radio radio-inline"><label><input value="Fear" type="radio" name="m-choice-16"><i class="helper"></i>Fear</label></div><div class="radio radio-inline"><label><input value="Passion" type="radio" name="m-choice-16"><i class="helper"></i>Passion</label></div><div class="radio radio-inline"><label><input value="Circumstances " type="radio" name="m-choice-16"><i class="helper"></i>Circumstances </label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-17"><td><h5>17. Determine the morality of the act</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Error" type="radio" name="m-choice-17"><i class="helper"></i>Error</label></div><div class="radio radio-inline"><label><input value="Moral Ideas" type="radio" name="m-choice-17"><i class="helper"></i>Moral Ideas</label></div><div class="radio radio-inline"><label><input value="Concupiscence " type="radio" name="m-choice-17"><i class="helper"></i>Concupiscence </label></div><div class="radio radio-inline"><label><input value="Intention" type="radio" name="m-choice-17"><i class="helper"></i>Intention</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-18"><td><h5>18. Criteria of Judgement</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Intention" type="radio" name="m-choice-18"><i class="helper"></i>Intention</label></div><div class="radio radio-inline"><label><input value="Moral obligation" type="radio" name="m-choice-18"><i class="helper"></i>Moral obligation</label></div><div class="radio radio-inline"><label><input value="Concupiscence " type="radio" name="m-choice-18"><i class="helper"></i>Concupiscence </label></div><div class="radio radio-inline"><label><input value="Moral Object" type="radio" name="m-choice-18"><i class="helper"></i>Moral Object</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-19"><td><h5>19. Criteria of Judgement</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Moral Ideas" type="radio" name="m-choice-19"><i class="helper"></i>Moral Ideas</label></div><div class="radio radio-inline"><label><input value="Freedom of Choice" type="radio" name="m-choice-19"><i class="helper"></i>Freedom of Choice</label></div><div class="radio radio-inline"><label><input value="Concupiscence " type="radio" name="m-choice-19"><i class="helper"></i>Concupiscence </label></div><div class="radio radio-inline"><label><input value="Moral Object" type="radio" name="m-choice-19"><i class="helper"></i>Moral Object</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-20"><td><h5>20. Criteria of Judgement</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Concupiscence " type="radio" name="m-choice-20"><i class="helper"></i>Concupiscence </label></div><div class="radio radio-inline"><label><input value="Core Freedom" type="radio" name="m-choice-20"><i class="helper"></i>Core Freedom</label></div><div class="radio radio-inline"><label><input value="Consequence" type="radio" name="m-choice-20"><i class="helper"></i>Consequence</label></div><div class="radio radio-inline"><label><input value="Moral Object" type="radio" name="m-choice-20"><i class="helper"></i>Moral Object</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr>', '{"mc_answers":{"mchoice-1":"Error","mchoice-2":"Ignorance","mchoice-3":"Attention","mchoice-4":"Passion / Concupiscence","mchoice-5":"Fear","mchoice-6":"Habits","mchoice-7":"Violence","mchoice-8":"Core Freedom","mchoice-9":"Inner Freedom","mchoice-10":"External Freedom","mchoice-11":"Authentic Freedom","mchoice-12":"Freedom of Choice","mchoice-13":"Fundamental Freedom","mchoice-14":"Fundamental Stance","mchoice-15":"Moral Object","mchoice-16":"Circumstances ","mchoice-17":"Intention","mchoice-18":"Moral obligation","mchoice-19":"Moral Ideas","mchoice-20":"Consequence"},"tf_answers":{},"written_answers":{}}', '2019-01-16', 0);

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
(1, 44, 'January 16', '{"content":"<h4>Impairmentd of knowledge<\\/h4>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Ignorance<\\/li>\\r\\n\\t<li>Error<\\/li>\\r\\n\\t<li>Attention<\\/li>\\r\\n<\\/ol>\\r\\n\\r\\n<h4>Concepts of Freedom<\\/h4>\\r\\n\\r\\n<p>God - ultimate freedom<\\/p>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Core Freedom<\\/li>\\r\\n\\t<li>Inner Freedom - In me, me in me<\\/li>\\r\\n\\t<li>External Freedom<\\/li>\\r\\n\\t<li>Authentic Freedom - allow the right decisions<\\/li>\\r\\n\\t<li>Freedom of Choice<\\/li>\\r\\n\\t<li>Fundamental Freedom - for life<\\/li>\\r\\n\\t<li>Fundamental Stance - principle, example: where we&#39;re heading to; to whom we&#39;re heading for<\\/li>\\r\\n<\\/ol>\\r\\n\\r\\n<h4>Impairment of Free Consent<\\/h4>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Passion \\/ Concupiscence<br \\/>\\r\\n\\tPassion - too much love to something<br \\/>\\r\\n\\tConcupiscence -&nbsp;strong sexual desire<\\/li>\\r\\n\\t<li>Fear<\\/li>\\r\\n\\t<li>Habits<\\/li>\\r\\n\\t<li>Violence<\\/li>\\r\\n<\\/ol>\\r\\n\\r\\n<h4>Determine the morality of the act<\\/h4>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Moral Object - action<\\/li>\\r\\n\\t<li>Circumstances - lessen or aggrevate<\\/li>\\r\\n\\t<li>Intention<\\/li>\\r\\n<\\/ol>\\r\\n\\r\\n<h4>Criteria<\\/h4>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Moral obligation - all aspects<\\/li>\\r\\n\\t<li>Moral Ideas - Prudence, Justice, Temperance, Courage<\\/li>\\r\\n\\t<li>Consequence<\\/li>\\r\\n<\\/ol>\\r\\n"}', '2', '0000-00-00', '0000-00-00'),
(2, 44, 'January 14 - Human Acts', '{"content":"<h4>Human Act<\\/h4>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Human Act - Free will. Act consiously.<\\/li>\\r\\n\\t<li>Act of Man - Act unconsiously<\\/li>\\r\\n<\\/ol>\\r\\n"}', '2', '0000-00-00', '0000-00-00');

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
(47, 0, 0, 'English 2', '2', '2019-01-16', '0000-00-00');

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
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `college_teachers`
--
ALTER TABLE `college_teachers`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `subject_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
