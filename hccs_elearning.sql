-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2019 at 06:58 AM
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
(9, '1055', 'test_1', 'Tonyo toyo4', 'password', '2', '36', '2', '0000-00-00', '2018-12-30'),
(11, '1056', 'sunshine', 'Sunshine Dizon', 'password', '2', '38', '2', '0000-00-00', '2018-12-30'),
(12, '1056', 'Cloe', 'Tanya Markova', 'password', '1', '1', '2', '0000-00-00', '2019-01-08'),
(14, '1085', 'Bernz', 'Tanya Markova', 'password', '1', '40', '1', '0000-00-00', '2019-01-16'),
(22, '143', 'che', 'Cherry Sarino Gomez', 'password', '1', '41', '1', '0000-00-00', '2019-01-08'),
(24, '1056', 'Cloe', 'Sunshine Dizon', 'password', '1', '41', '1', '0000-00-00', '2019-01-08'),
(26, '1085', '1_Cloe', 'Tanya Markova', 'changeme', '1', '43', '1', '0000-00-00', '0000-00-00'),
(27, '1056', '43_Cloe', 'Tanya Markova', 'changeme', '1', '43', '1', '0000-00-00', '0000-00-00'),
(28, '1056r', '40_Cloe', 'Tanya Markova', 'password', '1', '41', '1', '0000-00-00', '2019-01-16');

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
(6, 'test', 36, 2, 0, '\n            <tr class=\"text text-0\"><td><h4>Ckick here to insert content.</h4></td></tr><tr class=\"ex-m-choices num-1\"><td><h5>1. test</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"df\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>df</label></div><div class=\"radio radio-inline\"><label><input value=\"sdf\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>sdf</label></div><div class=\"radio radio-inline\"><label><input value=\"ee\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>ee</label></div><div class=\"radio radio-inline\"><label><input value=\"sdfs\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>sdfs</label></div></div></form><div class=\"col-sm-6\"></div></div></div></div></td></tr>', '{\"mc_answers\":{\"m-choice-1\":\"ee\"},\"tf_answers\":{},\"written_answers\":{}}', '2019-01-14', 0),
(8, 'test1', 1, 2, 0, '<tr class=\"ex-m-choices num-1\"><td><h5>1. tet</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"3\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>3</label></div><div class=\"radio radio-inline\"><label><input value=\"1\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>1</label></div><div class=\"radio radio-inline\"><label><input value=\"2\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>2</label></div><div class=\"radio radio-inline\"><label><input value=\"4\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>4</label></div></div></form><div class=\"col-sm-6\"></div></div></div></div></td></tr>', '{\"mc_answers\":{\"m-choice-1\":\"1\"},\"tf_answers\":{},\"written_answers\":{}}', '2019-01-14', 0),
(10, 'test45', 1, 2, 0, '<tr class=\"ex-tf\"><td><h5>1. test</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"true\" type=\"radio\" name=\"tf-1\"><i class=\"helper\"></i>True</label></div><div class=\"radio radio-inline\"><label><input value=\"false\" type=\"radio\" name=\"tf-1\"><i class=\"helper\"></i>False</label></div></div></form></div></div></div></td></tr>', '{\"mc_answers\":{},\"tf_answers\":{\"tf-1\":true},\"written_answers\":{}}', '2019-01-14', 0),
(11, 'test4', 41, 1, 0, '<tr class=\"text text-0\"><td><h4>Test 1 - Multiple Choice</h4><p>Choose the right answer.</p></td></tr><tr class=\"ex-m-choices num-1\"><td><h5>1. This is just a test.</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"okey\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>okey</label></div><div class=\"radio radio-inline\"><label><input value=\"wew.\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>wew.</label></div><div class=\"radio radio-inline\"><label><input value=\"what?\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>what?</label></div><div class=\"radio radio-inline\"><label><input value=\"never?\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>never?</label></div></div></form><div class=\"col-sm-6\"></div></div></div></div></td></tr>', '{\"mc_answers\":{\"m-choice-1\":\"okey\"},\"tf_answers\":{},\"written_answers\":{}}', '2019-01-15', 0),
(12, 'test', 41, 1, 0, '<tr class=\"text text-0\"><td><h4>test</h4></td></tr><tr class=\"ex-m-choices num-1\"><td><h5>1. test</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"1\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>1</label></div><div class=\"radio radio-inline\"><label><input value=\"3\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>3</label></div><div class=\"radio radio-inline\"><label><input value=\"2\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>2</label></div><div class=\"radio radio-inline\"><label><input value=\"4\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>4</label></div></div></form><div class=\"col-sm-6\"></div></div></div></div></td></tr>', '{\"mc_answers\":{\"m-choice-1\":\"1\"},\"tf_answers\":{},\"written_answers\":{}}', '2019-01-15', 0),
(13, 'test455', 36, 2, 0, '<tr class=\"text text-0\"><td><h4>Test 1 - M choice</h4></td></tr><tr class=\"ex-m-choices num-1\"><td><h5>1. test</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"answer\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>answer</label></div><div class=\"radio radio-inline\"><label><input value=\"123\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>123</label></div><div class=\"radio radio-inline\"><label><input value=\"123\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>123</label></div><div class=\"radio radio-inline\"><label><input value=\"123\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>123</label></div></div></form><div class=\"col-sm-6\"></div></div></div></div></td></tr><tr class=\"ex-m-choices num-2\"><td><h5>2. test</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"answer\" type=\"radio\" name=\"m-choice-2\"><i class=\"helper\"></i>answer</label></div><div class=\"radio radio-inline\"><label><input value=\"123\" type=\"radio\" name=\"m-choice-2\"><i class=\"helper\"></i>123</label></div><div class=\"radio radio-inline\"><label><input value=\"123\" type=\"radio\" name=\"m-choice-2\"><i class=\"helper\"></i>123</label></div><div class=\"radio radio-inline\"><label><input value=\"123\" type=\"radio\" name=\"m-choice-2\"><i class=\"helper\"></i>123</label></div></div></form><div class=\"col-sm-6\"></div></div></div></div></td></tr><tr class=\"ex-m-choices num-3\"><td><h5>3. test</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"answer\" type=\"radio\" name=\"m-choice-3\"><i class=\"helper\"></i>answer</label></div><div class=\"radio radio-inline\"><label><input value=\"123\" type=\"radio\" name=\"m-choice-3\"><i class=\"helper\"></i>123</label></div><div class=\"radio radio-inline\"><label><input value=\"123\" type=\"radio\" name=\"m-choice-3\"><i class=\"helper\"></i>123</label></div><div class=\"radio radio-inline\"><label><input value=\"123\" type=\"radio\" name=\"m-choice-3\"><i class=\"helper\"></i>123</label></div></div></form><div class=\"col-sm-6\"></div></div></div></div></td></tr><tr class=\"ex-m-choices num-4\"><td><h5>4. test</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"answer\" type=\"radio\" name=\"m-choice-4\"><i class=\"helper\"></i>answer</label></div><div class=\"radio radio-inline\"><label><input value=\"123\" type=\"radio\" name=\"m-choice-4\"><i class=\"helper\"></i>123</label></div><div class=\"radio radio-inline\"><label><input value=\"123\" type=\"radio\" name=\"m-choice-4\"><i class=\"helper\"></i>123</label></div><div class=\"radio radio-inline\"><label><input value=\"123\" type=\"radio\" name=\"m-choice-4\"><i class=\"helper\"></i>123</label></div></div></form><div class=\"col-sm-6\"></div></div></div></div></td></tr><tr class=\"ex-m-choices num-5\"><td><h5>5. test</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"123\" type=\"radio\" name=\"m-choice-5\"><i class=\"helper\"></i>123</label></div><div class=\"radio radio-inline\"><label><input value=\"123\" type=\"radio\" name=\"m-choice-5\"><i class=\"helper\"></i>123</label></div><div class=\"radio radio-inline\"><label><input value=\"answer\" type=\"radio\" name=\"m-choice-5\"><i class=\"helper\"></i>answer</label></div><div class=\"radio radio-inline\"><label><input value=\"123\" type=\"radio\" name=\"m-choice-5\"><i class=\"helper\"></i>123</label></div></div></form><div class=\"col-sm-6\"></div></div></div></div></td></tr><tr class=\"text text-1\"><td><h4>Test 2&nbsp;- True False</h4></td></tr><tr class=\"ex-tf\"><td><h5>1. test</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"true\" type=\"radio\" name=\"tf-1\"><i class=\"helper\"></i>True</label></div><div class=\"radio radio-inline\"><label><input value=\"false\" type=\"radio\" name=\"tf-1\"><i class=\"helper\"></i>False</label></div></div></form></div></div></div></td></tr><tr class=\"ex-tf\"><td><h5>2. test</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"true\" type=\"radio\" name=\"tf-2\"><i class=\"helper\"></i>True</label></div><div class=\"radio radio-inline\"><label><input value=\"false\" type=\"radio\" name=\"tf-2\"><i class=\"helper\"></i>False</label></div></div></form></div></div></div></td></tr><tr class=\"text text-2\"><td><h4>Test 3&nbsp;- written</h4></td></tr><tr class=\"ex-written\"><td><h5>1. test</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><div style=\"width:100%\" class=\"form-group form-default \"><label for=\"ex-written-question-answer\">Your Answer</label><textarea class=\"form-control\" name=\"ex-written-question-answer\" id=\"ex-written-question-answer\"></textarea></div></div></div></div></td></tr><tr class=\"ex-written\"><td><h5>2. test</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><div style=\"width:100%\" class=\"form-group form-default \"><label for=\"ex-written-question-answer\">Your Answer</label><textarea class=\"form-control\" name=\"ex-written-question-answer\" id=\"ex-written-question-answer\"></textarea></div></div></div></div></td></tr>', '{\"mc_answers\":{\"m-choice-1\":\"answer\",\"m-choice-2\":\"answer\",\"m-choice-3\":\"answer\",\"m-choice-4\":\"answer\",\"m-choice-5\":\"answer\"},\"tf_answers\":{\"tf-1\":false,\"tf-2\":true},\"written_answers\":{}}', '2019-01-15', 0),
(14, 'Prelim Examination', 1, 2, 0, '<tr class=\"text text-0\"><td><h4>Those who under my name will be punished by law.</h4></td></tr><tr class=\"ex-m-choices num-1\"><td><h5>1. What is the color of my panty?</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"brown with stain\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>brown with stain</label></div><div class=\"radio radio-inline\"><label><input value=\"red\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>red</label></div><div class=\"radio radio-inline\"><label><input value=\"pink\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>pink</label></div><div class=\"radio radio-inline\"><label><input value=\"blue\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>blue</label></div></div></form><div class=\"col-sm-6\"></div></div></div></div></td></tr><tr class=\"ex-m-choices num-2\"><td><h5>2. Who is my crush in this class?</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"them\" type=\"radio\" name=\"m-choice-2\"><i class=\"helper\"></i>them</label></div><div class=\"radio radio-inline\"><label><input value=\"me\" type=\"radio\" name=\"m-choice-2\"><i class=\"helper\"></i>me</label></div><div class=\"radio radio-inline\"><label><input value=\"You\" type=\"radio\" name=\"m-choice-2\"><i class=\"helper\"></i>You</label></div><div class=\"radio radio-inline\"><label><input value=\"somebody\" type=\"radio\" name=\"m-choice-2\"><i class=\"helper\"></i>somebody</label></div></div></form><div class=\"col-sm-6\"></div></div></div></div></td></tr><tr class=\"ex-m-choices num-3\"><td><h5>3. Am I handsome?</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"you bitch\" type=\"radio\" name=\"m-choice-3\"><i class=\"helper\"></i>you bitch</label></div><div class=\"radio radio-inline\"><label><input value=\"no\" type=\"radio\" name=\"m-choice-3\"><i class=\"helper\"></i>no</label></div><div class=\"radio radio-inline\"><label><input value=\"probably not\" type=\"radio\" name=\"m-choice-3\"><i class=\"helper\"></i>probably not</label></div><div class=\"radio radio-inline\"><label><input value=\"yes\" type=\"radio\" name=\"m-choice-3\"><i class=\"helper\"></i>yes</label></div></div></form><div class=\"col-sm-6\"></div></div></div></div></td></tr><tr class=\"ex-tf\"><td><h5>1. am I handsome?</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"true\" type=\"radio\" name=\"tf-1\"><i class=\"helper\"></i>True</label></div><div class=\"radio radio-inline\"><label><input value=\"false\" type=\"radio\" name=\"tf-1\"><i class=\"helper\"></i>False</label></div></div></form></div></div></div></td></tr><tr class=\"ex-tf\"><td><h5>2. are you mad?</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"true\" type=\"radio\" name=\"tf-2\"><i class=\"helper\"></i>True</label></div><div class=\"radio radio-inline\"><label><input value=\"false\" type=\"radio\" name=\"tf-2\"><i class=\"helper\"></i>False</label></div></div></form></div></div></div></td></tr><tr class=\"ex-tf\"><td><h5>3. Can you make me happy?</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"true\" type=\"radio\" name=\"tf-3\"><i class=\"helper\"></i>True</label></div><div class=\"radio radio-inline\"><label><input value=\"false\" type=\"radio\" name=\"tf-3\"><i class=\"helper\"></i>False</label></div></div></form></div></div></div></td></tr><tr class=\"text text-1\"><td><h4>Written</h4></td></tr><tr class=\"ex-written\"><td><h5>1. How can you make me happy?</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><div style=\"width:100%\" class=\"form-group form-default \"><label for=\"ex-written-question-answer\">Your Answer</label><textarea class=\"form-control\" name=\"ex-written-question-answer-1\" id=\"ex-written-question-answer\"></textarea></div></div></div></div></td></tr><tr class=\"ex-written\"><td><h5>2. How will you make me have crush on you?</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><div style=\"width:100%\" class=\"form-group form-default \"><label for=\"ex-written-question-answer\">Your Answer</label><textarea class=\"form-control\" name=\"ex-written-question-answer-2\" id=\"ex-written-question-answer\"></textarea></div></div></div></div></td></tr><tr class=\"ex-written\"><td><h5>3. How will you take care of me?</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><div style=\"width:100%\" class=\"form-group form-default \"><label for=\"ex-written-question-answer\">Your Answer</label><textarea class=\"form-control\" name=\"ex-written-question-answer-3\" id=\"ex-written-question-answer\"></textarea></div></div></div></div></td></tr>', '{\"mc_answers\":{\"m-choice-1\":\"pink\",\"m-choice-2\":\"You\",\"m-choice-3\":\"yes\"},\"tf_answers\":{\"tf-1\":false,\"tf-2\":true,\"tf-3\":true},\"written_answers\":{}}', '2019-01-15', 0),
(15, 'Prelim Quiz', 41, 1, 0, '<tr class=\"text text-0\"><td><h4>Multiple Choice</h4></td></tr><tr class=\"ex-m-choices num-1\"><td><h5>1. Test1</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"4\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>4</label></div><div class=\"radio radio-inline\"><label><input value=\"2\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>2</label></div><div class=\"radio radio-inline\"><label><input value=\"1\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>1</label></div><div class=\"radio radio-inline\"><label><input value=\"3\" type=\"radio\" name=\"m-choice-1\"><i class=\"helper\"></i>3</label></div></div></form><div class=\"col-sm-6\"></div></div></div></div></td></tr><tr class=\"ex-m-choices num-2\"><td><h5>2. Test2</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"21\" type=\"radio\" name=\"m-choice-2\"><i class=\"helper\"></i>21</label></div><div class=\"radio radio-inline\"><label><input value=\"44\" type=\"radio\" name=\"m-choice-2\"><i class=\"helper\"></i>44</label></div><div class=\"radio radio-inline\"><label><input value=\"33\" type=\"radio\" name=\"m-choice-2\"><i class=\"helper\"></i>33</label></div><div class=\"radio radio-inline\"><label><input value=\"13\" type=\"radio\" name=\"m-choice-2\"><i class=\"helper\"></i>13</label></div></div></form><div class=\"col-sm-6\"></div></div></div></div></td></tr><tr class=\"text text-1\"><td><h2>True or False</h2></td></tr><tr class=\"ex-tf\"><td><h5>1. test1</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"true\" type=\"radio\" name=\"tf-1\"><i class=\"helper\"></i>True</label></div><div class=\"radio radio-inline\"><label><input value=\"false\" type=\"radio\" name=\"tf-1\"><i class=\"helper\"></i>False</label></div></div></form></div></div></div></td></tr><tr class=\"ex-tf\"><td><h5>2. test1</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"true\" type=\"radio\" name=\"tf-2\"><i class=\"helper\"></i>True</label></div><div class=\"radio radio-inline\"><label><input value=\"false\" type=\"radio\" name=\"tf-2\"><i class=\"helper\"></i>False</label></div></div></form></div></div></div></td></tr><tr class=\"ex-tf\"><td><h5>3. test1</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"true\" type=\"radio\" name=\"tf-3\"><i class=\"helper\"></i>True</label></div><div class=\"radio radio-inline\"><label><input value=\"false\" type=\"radio\" name=\"tf-3\"><i class=\"helper\"></i>False</label></div></div></form></div></div></div></td></tr><tr class=\"ex-tf\"><td><h5>4. test1</h5><br><div class=\"\"><div class=\"col-sm-12\"><div class=\"row\"><form><div class=\"form-radio\"><div class=\"radio radio-inline\"><label><input value=\"true\" type=\"radio\" name=\"tf-4\"><i class=\"helper\"></i>True</label></div><div class=\"radio radio-inline\"><label><input value=\"false\" type=\"radio\" name=\"tf-4\"><i class=\"helper\"></i>False</label></div></div></form></div></div></div></td></tr>', '{\"mc_answers\":{\"mchoice-1\":\"1\",\"mchoice-2\":\"13\"},\"tf_answers\":{\"tf-1\":true,\"tf-2\":true,\"tf-3\":true,\"tf-4\":true},\"written_answers\":{}}', '2019-01-15', 0);

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
(4, 15, 41, 24, 1, 4, 6, 66, '{\"cs_answer\":{\"mc_answers\":{\"mchoice-1\":\"1\",\"mchoice-2\":\"13\"},\"tf_answers\":{\"tf-1\":\"false\",\"tf-2\":\"false\",\"tf-3\":\"true\",\"tf-4\":\"true\"},\"written_answers\":null}}', '2019-01-16'),
(5, 15, 41, 24, 1, 4, 6, 66, '{\"cs_answer\":{\"mc_answers\":{\"mchoice-1\":\"1\",\"mchoice-2\":\"13\"},\"tf_answers\":{\"tf-1\":\"false\",\"tf-2\":\"false\",\"tf-3\":\"true\",\"tf-4\":\"true\"},\"written_answers\":null},\"correct_answers\":{\"mc_answers\":{\"mchoice-1\":\"1\",\"mchoice-2\":\"13\"},\"tf_answers\":{\"tf-1\":true,\"tf-2\":true,\"tf-3\":true,\"tf-4\":true},\"written_answers\":{}}}', '2019-01-16'),
(6, 15, 41, 24, 1, 2, 6, 33, '{\"cs_answer\":{\"mc_answers\":{\"mchoice-1\":\"3\",\"mchoice-2\":\"44\"},\"tf_answers\":{\"tf-1\":\"true\",\"tf-3\":\"false\",\"tf-4\":\"true\"},\"written_answers\":null},\"correct_answers\":{\"mc_answers\":{\"mchoice-1\":\"1\",\"mchoice-2\":\"13\"},\"tf_answers\":{\"tf-1\":true,\"tf-2\":true,\"tf-3\":true,\"tf-4\":true},\"written_answers\":{}}}', '2019-01-16'),
(7, 15, 41, 24, 1, 0, 6, 0, '{\"cs_answer\":{\"mc_answers\":{},\"tf_answers\":{},\"written_answers\":null},\"correct_answers\":{\"mc_answers\":{\"mchoice-1\":\"1\",\"mchoice-2\":\"13\"},\"tf_answers\":{\"tf-1\":true,\"tf-2\":true,\"tf-3\":true,\"tf-4\":true},\"written_answers\":{}}}', '2019-01-16'),
(8, 15, 41, 24, 1, 2, 6, 33, '{\"cs_answer\":{\"mc_answers\":{\"mchoice-1\":\"3\",\"mchoice-2\":\"44\"},\"tf_answers\":{\"tf-1\":\"true\",\"tf-3\":\"false\",\"tf-4\":\"true\"},\"written_answers\":null},\"correct_answers\":{\"mc_answers\":{\"mchoice-1\":\"1\",\"mchoice-2\":\"13\"},\"tf_answers\":{\"tf-1\":true,\"tf-2\":true,\"tf-3\":true,\"tf-4\":true},\"written_answers\":{}}}', '2019-01-16'),
(15, 12, 41, 28, 1, 0, 1, 0, '{\"cs_answer\":{\"mc_answers\":{\"mchoice-1\":\"1\"},\"tf_answers\":{},\"written_answers\":null},\"correct_answers\":{\"mc_answers\":{\"m-choice-1\":\"1\"},\"tf_answers\":{},\"written_answers\":{}}}', '2019-01-16'),
(16, 15, 41, 28, 1, 4, 6, 66, '{\"cs_answer\":{\"mc_answers\":{\"mchoice-1\":\"1\",\"mchoice-2\":\"33\"},\"tf_answers\":{\"tf-1\":\"false\",\"tf-2\":\"true\",\"tf-3\":\"true\",\"tf-4\":\"true\"},\"written_answers\":null},\"correct_answers\":{\"mc_answers\":{\"mchoice-1\":\"1\",\"mchoice-2\":\"13\"},\"tf_answers\":{\"tf-1\":true,\"tf-2\":true,\"tf-3\":true,\"tf-4\":true},\"written_answers\":{}}}', '2019-01-16');

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
(10, 41, 'Sana Ikaw na nga', '{\"content\":\"<p style=\\\"text-align: center;\\\"><iframe allow=\\\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\\\" allowfullscreen=\\\"\\\" frameborder=\\\"0\\\" height=\\\"410\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/67g5KHm3ksI\\\" width=\\\"729\\\"><\\/iframe><\\/p>\\r\\n\\r\\n<div style=\\\"background: rgb(238, 238, 238); border: 1px solid rgb(204, 204, 204); padding: 5px 10px; text-align: center;\\\">This video is from youtube to become you one and only video out from your server.<\\/div>\\r\\n\\r\\n<h2 style=\\\"text-align: center;\\\"><span style=\\\"font-family:Comic Sans MS,cursive;\\\">one <span style=\\\"background-color:#2ecc71;\\\">thing <\\/span>is these you can take it all.<\\/span><\\/h2>\\r\\n\"}', '1', '0000-00-00', '2018-12-31'),
(12, 1, 'The Man Behind Bars 56', '{\"content\":\"<p><iframe allow=\\\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\\\" allowfullscreen=\\\"\\\" frameborder=\\\"0\\\" height=\\\"410\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/67g5KHm3ksI\\\" width=\\\"729\\\"><\\/iframe><\\/p>\\r\\n\"}', '2', '0000-00-00', '0000-00-00'),
(13, 38, 'test123', '{\"content\":\"<h1>test only<\\/h1>\\r\\n\"}', '2', '0000-00-00', '2018-12-31'),
(14, 1, 'This is a sample 14', '{\"content\":\"<p>dvdv<\\/p>\\r\\n\"}', '1', '0000-00-00', '0000-00-00'),
(15, 36, 'bablalbabb', '{\"content\":\"<p>ggg<\\/p>\\r\\n\"}', '2', '0000-00-00', '0000-00-00'),
(16, 36, 'Titot', '{\"content\":\"<p><img alt=\\\"\\\" height=\\\"300\\\" src=\\\"\\/ignite\\/assets\\/ckeditor\\/kcfinder\\/upload\\/images\\/123.jpg\\\" width=\\\"275\\\" \\/>vbvbvbghgh<\\/p>\\r\\n\\r\\n<p>ghghghghghgghghghg<\\/p>\\r\\n\\r\\n<p>ghghghghg<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\"}', '2', '2019-03-01', '0000-00-00'),
(17, 1, 'test', '{\"content\":\"<p><img alt=\\\"\\\" height=\\\"260\\\" src=\\\"http:\\/\\/localhost\\/ignite\\/assets\\/ckeditor\\/kcfinder\\/upload\\/images\\/42221068_727957497542907_5953412606034182144_n.jpg\\\" width=\\\"463\\\" \\/><\\/p>\\r\\n\\r\\n<h2>This man is the bes<\\/h2>\\r\\n\\r\\n<p>good for 2 pax only<\\/p>\\r\\n\\r\\n<h2><a href=\\\"http:\\/\\/localhost\\/ignite\\/assets\\/ckeditor\\/kcfinder\\/upload\\/files\\/ASIO4ALL%20v2%20Instruction%20Manual.pdf\\\" target=\\\"_blank\\\">Download this file for reference.<\\/a><\\/h2>\\r\\n\\r\\n<h2>&nbsp;<\\/h2>\\r\\n\\r\\n<h2>FINGER POSITIONS ON GUITAR CHORD<\\/h2>\\r\\n\\r\\n<p><img align=\\\"left\\\" alt=\\\"http:\\/\\/www.i-love-piano.com\\/guitar-lessons\\/image\\/002_1.jpg\\\" height=\\\"313\\\" hspace=\\\"12\\\" src=\\\"http:\\/\\/www.i-love-piano.com\\/guitar-lessons\\/image\\/002_1.jpg\\\" width=\\\"283\\\" \\/><img align=\\\"left\\\" alt=\\\"https:\\/\\/www.dummies.com\\/wp-content\\/uploads\\/162743.image0.jpg\\\" height=\\\"618\\\" hspace=\\\"12\\\" src=\\\"https:\\/\\/www.dummies.com\\/wp-content\\/uploads\\/162743.image0.jpg\\\" width=\\\"678\\\" \\/><\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p><iframe allow=\\\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\\\" allowfullscreen=\\\"\\\" frameborder=\\\"0\\\" height=\\\"410\\\" src=\\\"https:\\/\\/www.youtube.com\\/embed\\/fPbW7JhIZOQ\\\" width=\\\"729\\\"><\\/iframe><\\/p>\\r\\n\"}', '2', '2019-03-01', '0000-00-00'),
(18, 41, 'Scammer Alert!', '{\"content\":\"<div class=\\\"table-responsive\\\">\\r\\n<table style=\\\"width:100%\\\">\\r\\n\\t<tbody>\\r\\n\\t\\t<tr>\\r\\n\\t\\t\\t<td style=\\\"width:46%\\\"><img alt=\\\"\\\" height=\\\"297\\\" src=\\\"\\/ignite\\/assets\\/ckeditor\\/kcfinder\\/upload\\/images\\/44054639_543253842806077_2595966649899155456_n.jpg\\\" width=\\\"457\\\" \\/><img alt=\\\"\\\" height=\\\"625\\\" sizes=\\\"100\\\" src=\\\"\\/ignite\\/assets\\/ckeditor\\/kcfinder\\/upload\\/images\\/44054639_543253842806077_2595966649899155456_n(1).jpg\\\" srcset=\\\"100\\\" width=\\\"960\\\" \\/><\\/td>\\r\\n\\t\\t\\t<td style=\\\"vertical-align:top\\\">\\r\\n\\t\\t\\t<h1><a href=\\\"\\/ignite\\/assets\\/ckeditor\\/kcfinder\\/upload\\/files\\/1987constitution.pdf\\\">Wanted<\\/a><\\/h1>\\r\\n\\r\\n\\t\\t\\t<p>This man just scammed my brother in the game..<\\/p>\\r\\n\\t\\t\\t<\\/td>\\r\\n\\t\\t<\\/tr>\\r\\n\\t<\\/tbody>\\r\\n<\\/table>\\r\\n<\\/div>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\"}', '2', '2019-10-01', '0000-00-00');

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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `finished_exercises`
--
ALTER TABLE `finished_exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
