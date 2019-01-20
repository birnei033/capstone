-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2019 at 01:52 PM
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
(1, '1052', '44_bernz', 'Bernie Santos A. Cabase', 'password', '1', '44', '2', '0000-00-00', '2019-01-18'),
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
(9, 'test', 48, 1, 0, '\n        <div id="timer-wrapper" class="text-center mb-4"><div id="timer"><span id="clock-icon"></span><span>Time: </span><span id="time">30</span> minutes</div></div>\n        <style>\n        #clock-icon{\n            background-image: url(http://localhost/ignite/assets/images/alarm-clock.png);\n        }\n  </style>\n        <table class="table ">\n            <tbody id="ex-elems">\n                <tr>\n                    <td class="p-0">\n                        <table class="table table-hover">\n                            <tbody id="ex-elems-m-choice"><tr><td><h4>Charlang</h4></td></tr><tr class="ex-m-choices num-1"><td><h5>1. 1+1=?</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="11" type="radio" name="m-choice-1"><i class="helper"></i>11</label></div><div class="radio radio-inline"><label><input value="5" type="radio" name="m-choice-1"><i class="helper"></i>5</label></div><div class="radio radio-inline"><label><input value="4" type="radio" name="m-choice-1"><i class="helper"></i>4</label></div><div class="radio radio-inline"><label><input value="2" type="radio" name="m-choice-1"><i class="helper"></i>2</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr></tbody>\n                        </table>\n                    </td>\n                </tr>\n                <tr>\n                    <td class="p-0">\n                        <table class="table table-hover">\n                            <tbody id="ex-elems-tf"></tbody>\n                        </table>\n                    </td>\n                </tr>\n                <tr>\n                    <td class="p-0">\n                        <table class="table table-hover">\n                            <tbody id="ex-elems-written"></tbody>\n                        </table>\n                    </td>\n                </tr>\n            </tbody>\n        </table>\n    ', 30, 0, '{"mc_answers":{"mchoice-1":"2"},"tf_answers":{},"written_answers":{}}', '2019-01-18', 0),
(10, 'char', 48, 1, 0, '\n        <div id="timer-wrapper" class="text-center mb-4"><div id="timer"><span id="clock-icon"></span><span>Time: </span><span id="time">15</span> minutes</div></div>\n        <style>\n        #clock-icon{\n            background-image: url(http://localhost/ignite/assets/images/alarm-clock.png);\n        }\n  </style>\n        <table class="table ">\n            <tbody id="ex-elems">\n                <tr>\n                    <td class="p-0">\n                        <table class="table table-hover">\n                            <tbody id="ex-elems-m-choice"><tr><td><h4>Multiple Choice</h4></td></tr><tr class="ex-m-choices num-1"><td><h5>1. Take it Slow.</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Turtle" type="radio" name="m-choice-1"><i class="helper"></i>Turtle</label></div><div class="radio radio-inline"><label><input value="Rabbit" type="radio" name="m-choice-1"><i class="helper"></i>Rabbit</label></div><div class="radio radio-inline"><label><input value="Lizard" type="radio" name="m-choice-1"><i class="helper"></i>Lizard</label></div><div class="radio radio-inline"><label><input value="Mouse" type="radio" name="m-choice-1"><i class="helper"></i>Mouse</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr><tr class="ex-m-choices num-2"><td><h5>2. Input</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="Hard Drive" type="radio" name="m-choice-2"><i class="helper"></i>Hard Drive</label></div><div class="radio radio-inline"><label><input value="Mouse" type="radio" name="m-choice-2"><i class="helper"></i>Mouse</label></div><div class="radio radio-inline"><label><input value="Monitor" type="radio" name="m-choice-2"><i class="helper"></i>Monitor</label></div><div class="radio radio-inline"><label><input value="CPU" type="radio" name="m-choice-2"><i class="helper"></i>CPU</label></div></div></form><div class="col-sm-6"></div></div></div></div></td></tr></tbody>\n                        </table>\n                    </td>\n                </tr>\n                <tr>\n                    <td class="p-0">\n                        <table class="table table-hover">\n                            <tbody id="ex-elems-tf"><tr><td><h4>True or False</h4></td></tr><tr class="ex-tf"><td><h5>1. 1+1=11</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="true" type="radio" name="tf-1"><i class="helper"></i>True</label></div><div class="radio radio-inline"><label><input value="false" type="radio" name="tf-1"><i class="helper"></i>False</label></div></div></form></div></div></div></td></tr><tr class="ex-tf"><td><h5>2. 2+2=4</h5><br><div class=""><div class="col-sm-12"><div class="row"><form><div class="form-radio"><div class="radio radio-inline"><label><input value="true" type="radio" name="tf-2"><i class="helper"></i>True</label></div><div class="radio radio-inline"><label><input value="false" type="radio" name="tf-2"><i class="helper"></i>False</label></div></div></form></div></div></div></td></tr></tbody>\n                        </table>\n                    </td>\n                </tr>\n                <tr>\n                    <td class="p-0">\n                        <table class="table table-hover">\n                            <tbody id="ex-elems-written"><tr><td><h4>Written</h4></td></tr><tr class="ex-written"><td><h5>1. State it and see.</h5><br><div class=""><div class="col-sm-12"><div class="row"><div style="width:100%" class="form-group form-default "><label for="ex-written-question-answer">Your Answer (10) points</label><textarea class="form-control" name="ex-written-question-answer-1" id="ex-written-question-answer"></textarea></div></div></div></div></td></tr><tr class="ex-written"><td><h5>2. Who is your crush? Why she/he?</h5><br><div class=""><div class="col-sm-12"><div class="row"><div style="width:100%" class="form-group form-default "><label for="ex-written-question-answer">Your Answer (10) points</label><textarea class="form-control" name="ex-written-question-answer-2" id="ex-written-question-answer"></textarea></div></div></div></div></td></tr></tbody>\n                        </table>\n                    </td>\n                </tr>\n            </tbody>\n        </table>\n    ', 15, 0, '{"mc_answers":{"mchoice-1":"Turtle","mchoice-2":"Mouse"},"tf_answers":{"tf-1":"false","tf-2":"true"},"written_answers":{"written-1":{"question":"State it and see.","points":"10"},"written-2":{"question":"Who is your crush? Why she/he?","points":"10"}}}', '2019-01-18', 0);

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
(1, 2, 48, 5, 1, 2, 4, 50, '{"cs_answer":{"mc_answers":{"mchoice-1":"2","mchoice-2":"4"},"tf_answers":{"tf-1":"true","tf-2":"true"},"written_answers":null},"correct_answers":{"mc_answers":{"mchoice-1":"2","mchoice-2":"4"},"tf_answers":{"tf-1":"true","tf-2":"true"},"written_answers":{}}}', '2019-01-18'),
(2, 2, 48, 5, 1, 4, 4, 100, '{"cs_answer":{"mc_answers":{"mchoice-1":"2","mchoice-2":"4"},"tf_answers":{"tf-1":"false","tf-2":"false"},"written_answers":null},"correct_answers":{"mc_answers":{"mchoice-1":"2","mchoice-2":"4"},"tf_answers":{"tf-1":"true","tf-2":"true"},"written_answers":{}}}', '2019-01-18'),
(9, 9, 48, 5, 1, 1, 1, 100, '{"cs_answer":{"mc_answers":{"mchoice-1":"2"},"tf_answers":{},"written_answers":null},"correct_answers":{"mc_answers":{"mchoice-1":"2"},"tf_answers":{},"written_answers":{}}}', '2019-01-18'),
(10, 10, 48, 5, 1, 4, 4, 100, '{"cs_answer":{"mc_answers":{"mchoice-1":"Turtle","mchoice-2":"Mouse"},"tf_answers":{"tf-1":"false","tf-2":"true"},"written_answers":{"1":"I just dont know why you ask that stupid none sense question! :(","2":"Why do you ask? Are you interested? Well, I''m not."}},"correct_answers":{"mc_answers":{"mchoice-1":"Turtle","mchoice-2":"Mouse"},"tf_answers":{"tf-1":"false","tf-2":"true"},"written_answers":{"written-1":{"question":"State it and see.","points":"10"},"written-2":{"question":"Who is your crush? Why she\\/he?","points":"10"}}}}', '2019-01-18');

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
(1, 44, 'January 16', '{"content":"<h4>Impairment&nbsp;of knowledge<\\/h4>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Ignorance<\\/li>\\r\\n\\t<li>Error<\\/li>\\r\\n\\t<li>Attention<\\/li>\\r\\n<\\/ol>\\r\\n\\r\\n<h4>Concepts of Freedom<\\/h4>\\r\\n\\r\\n<p>God - ultimate freedom<\\/p>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Core Freedom<\\/li>\\r\\n\\t<li>Inner Freedom - In me, me in me<\\/li>\\r\\n\\t<li>External Freedom<\\/li>\\r\\n\\t<li>Authentic Freedom - allow the right decisions<\\/li>\\r\\n\\t<li>Freedom of Choice<\\/li>\\r\\n\\t<li>Fundamental Freedom - for life<\\/li>\\r\\n\\t<li>Fundamental Stance - principle, example: where we&#39;re heading to; to whom we&#39;re heading for<\\/li>\\r\\n<\\/ol>\\r\\n\\r\\n<h4>Impairment of Free Consent<\\/h4>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Passion \\/ Concupiscence<br \\/>\\r\\n\\tPassion - too much love to something<br \\/>\\r\\n\\tConcupiscence -&nbsp;strong sexual desire - uwag<\\/li>\\r\\n\\t<li>Fear<\\/li>\\r\\n\\t<li>Habits<\\/li>\\r\\n\\t<li>Violence<\\/li>\\r\\n<\\/ol>\\r\\n\\r\\n<h4>Determine the morality of the act<\\/h4>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Moral Object - action<\\/li>\\r\\n\\t<li>Circumstances - lessen or aggrevate<\\/li>\\r\\n\\t<li>Intention<\\/li>\\r\\n<\\/ol>\\r\\n\\r\\n<h4>Criteria<\\/h4>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Moral obligation - all aspects<\\/li>\\r\\n\\t<li>Moral Ideas - Prudence, Justice, Temperance, Courage<\\/li>\\r\\n\\t<li>Consequence<\\/li>\\r\\n<\\/ol>\\r\\n"}', '2', '0000-00-00', '0000-00-00'),
(2, 44, 'January 14 - Human Acts', '{"content":"<h4>Human Act<\\/h4>\\r\\n\\r\\n<ol>\\r\\n\\t<li>Human Act - Free will. Act consiously.<\\/li>\\r\\n\\t<li>Act of Man - Act unconsiously<\\/li>\\r\\n<\\/ol>\\r\\n"}', '2', '0000-00-00', '0000-00-00'),
(3, 48, 'CITY OF THE BEAST BOOK REPORT', '{"content":"<p style=\\"text-align:center\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">CITY&nbsp; OF&nbsp; THE&nbsp; BEAST&nbsp; BOOK&nbsp; REPORT<\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">City&nbsp; of&nbsp; the&nbsp; Beasts<br \\/>\\r\\nCopyright&nbsp; &copy;&nbsp; 2002&nbsp; by&nbsp; Isabel&nbsp; Allende<br \\/>\\r\\nEnglish&nbsp; translation&nbsp; copyright&nbsp; &copy;&nbsp; 2002<br \\/>\\r\\nby&nbsp; HarperCollins&nbsp; Publishers&nbsp; Inc.<br \\/>\\r\\nPrinted&nbsp; in&nbsp; the&nbsp; U.S.A.&nbsp; All&nbsp; rights&nbsp; reserved.<br \\/>\\r\\nwww.harpercollins.com<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Library&nbsp; of&nbsp; Congress&nbsp; Cataloging-in-Publication&nbsp; Data&nbsp; Allende,&nbsp; Isabel.<br \\/>\\r\\nCity&nbsp; of&nbsp; the&nbsp; beasts&nbsp; \\/&nbsp; by&nbsp; Isabel&nbsp; Allende;&nbsp; translated&nbsp; from&nbsp; the&nbsp; Spanish&nbsp; by&nbsp; Margaret&nbsp; Sayers&nbsp; Peden.&nbsp; p.&nbsp; cm.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">ISBN&nbsp; 0-06-050918-X&mdash;ISBN&nbsp; 0-06-050917-1&nbsp; (lib.&nbsp; bdg.)&mdash;ISBN&nbsp; 0-06-051195-8&nbsp; (large&nbsp; print&nbsp; :&nbsp; pbk.)<br \\/>\\r\\nPZ7.A43912&nbsp; Ci&nbsp; 2002&nbsp; 2002022338<\\/span><\\/span><\\/span><br \\/>\\r\\n&nbsp;<\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">Characters<\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">The&nbsp; Cold&nbsp; Family&nbsp; <\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Expedition&nbsp; Members&nbsp; <\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">People&nbsp; of&nbsp; the&nbsp; Mist<\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Alex&nbsp; Cold&nbsp; <\\/span><br \\/>\\r\\n\\t<span style=\\"font-size:12.0pt\\">Can&nbsp; be&nbsp; temperamental,&nbsp; especially&nbsp; about&nbsp; his&nbsp; Mom&#39;s&nbsp; sickness.&nbsp; He&nbsp; is&nbsp; very&nbsp; talented&nbsp; and&nbsp; loves&nbsp; to&nbsp; rock&nbsp; climb&nbsp; with&nbsp; his&nbsp; dad&nbsp; and&nbsp; play&nbsp; the&nbsp; flute.&nbsp; He&nbsp; is&nbsp; very&nbsp; brave,&nbsp; but&nbsp; at&nbsp; the&nbsp; same&nbsp; time&nbsp; he&nbsp; is&nbsp; very&nbsp; picky&nbsp; with&nbsp; things&nbsp; like&nbsp; food&nbsp; and&nbsp; bugs.&nbsp; He&nbsp; doesn&#39;t&nbsp; give&nbsp; up&nbsp; on&nbsp; things&nbsp; easily.&nbsp; His&nbsp; attitude&nbsp; changes&nbsp; from&nbsp; the&nbsp; beginning&nbsp; to&nbsp; the&nbsp; end&nbsp; and&nbsp; after&nbsp; he&nbsp; finds&nbsp; his&nbsp; spirit&nbsp; animal,&nbsp; he&nbsp; becomes&nbsp; more&nbsp; aware&nbsp; of&nbsp; the&nbsp; magic&nbsp; and&nbsp; culture&nbsp; of&nbsp; the&nbsp; Amazon.<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Kate&nbsp;<br \\/>\\r\\n\\tAlex&rsquo;s&nbsp; grandmother.&nbsp; She&nbsp; wants&nbsp; Alex&nbsp; to&nbsp; learn&nbsp; to&nbsp; do&nbsp; things&nbsp; himself&nbsp; and&nbsp; not&nbsp; depend&nbsp; on&nbsp; other&nbsp; people.&nbsp; She&nbsp; has&nbsp; been&nbsp; to&nbsp; many&nbsp; places&nbsp; in&nbsp; the&nbsp; world&nbsp; and&nbsp; is&nbsp; very&nbsp; adventurous.<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">John&nbsp; Cold&nbsp;<br \\/>\\r\\n\\tA&nbsp; doctor&nbsp; and&nbsp; an&nbsp; experienced&nbsp; rock&nbsp; climber.&nbsp; He&nbsp; is&nbsp; very&nbsp; understanding&nbsp; of&nbsp; Alex&#39;s&nbsp; pain&nbsp; and&nbsp; sadness&nbsp; about&nbsp; his&nbsp; mother.&nbsp;<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Cesar&nbsp; Santos<br \\/>\\r\\n\\tThe&nbsp; guide&nbsp; of&nbsp; the&nbsp; hole&nbsp; expedition.&nbsp; He&nbsp; is&nbsp; very&nbsp; tall&nbsp; and&nbsp; alert&nbsp; and&nbsp; is&nbsp; very&nbsp; smart&nbsp; about&nbsp; things&nbsp; like&nbsp; the&nbsp; beast&nbsp; and&nbsp; the&nbsp; Indian&nbsp; people.<\\/span><\\/span><\\/span><\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Ludovic&nbsp; Leblanc<br \\/>\\r\\n\\tVery&nbsp; short,&nbsp; thin&nbsp; and&nbsp; nervous&nbsp; all&nbsp; the&nbsp; time.&nbsp; He&nbsp; is&nbsp; a&nbsp; very&nbsp; famous&nbsp; anthropologist.&nbsp; He&nbsp; was&nbsp; very&nbsp; smart.&nbsp; He&nbsp; didn&rsquo;t&nbsp; like&nbsp; bathing&nbsp; is&nbsp; dirty&nbsp; water&nbsp; and&nbsp; lots&nbsp; of&nbsp; the&nbsp; time&nbsp; he&nbsp; was&nbsp; in&nbsp; a&nbsp; mad&nbsp; mood.&nbsp;<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Mauro&nbsp; Carias&nbsp; (Morkita)<br \\/>\\r\\n\\tHe&nbsp; is&nbsp; chief&nbsp; of&nbsp; the&nbsp; People&nbsp; of&nbsp; the&nbsp; Mist.&nbsp; Was&nbsp; very&nbsp; old&nbsp; with&nbsp; a&nbsp; wood-like&nbsp; face&nbsp; and&nbsp; scored&nbsp; skin&nbsp; like&nbsp; tree-bark.<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Lisa&nbsp; Cold<br \\/>\\r\\n\\tLisa&nbsp; is&nbsp; the&nbsp; mother&nbsp; of&nbsp; Alex,&nbsp; Andrea&nbsp; and&nbsp; Nicole.&nbsp; She&nbsp; has&nbsp; become&nbsp; ill&nbsp; from&nbsp; cancer&nbsp; and&nbsp; can&nbsp; no&nbsp; longer&nbsp; help&nbsp; around&nbsp; the&nbsp; house&nbsp; with&nbsp; the&nbsp; family.&nbsp;<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Andrea&nbsp; Cold<br \\/>\\r\\n\\tAndrea&nbsp; is&nbsp; 12&nbsp; years&nbsp; old,&nbsp; loves&nbsp; to&nbsp; dress&nbsp; up&nbsp; and&nbsp; make&nbsp; up&nbsp; her&nbsp; own&nbsp; magical&nbsp; worlds&nbsp; She&nbsp; imagines&nbsp; magical&nbsp; things&nbsp; every&nbsp; day,&nbsp; and&nbsp; what&nbsp; every&nbsp; other&nbsp; girl&nbsp; her&nbsp; age&nbsp; obsesses&nbsp; about,&nbsp; she&nbsp; doesn&rsquo;t&nbsp; even&nbsp; care&nbsp; about.&nbsp;<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Nicole&nbsp; Cold&nbsp;<br \\/>\\r\\n\\tNicole&nbsp; is&nbsp; the&nbsp; youngest&nbsp; in&nbsp; the&nbsp; family.&nbsp; She&nbsp; collects&nbsp; animals&nbsp; because&nbsp; she&nbsp; feels&nbsp; it&nbsp; will&nbsp; make&nbsp; up&nbsp; for&nbsp; the&nbsp; attention&nbsp; not&nbsp; given&nbsp; to&nbsp; her&nbsp; by&nbsp; her&nbsp; mom.&nbsp; She&nbsp; loves&nbsp; animals&nbsp; and&nbsp; has&nbsp; many&nbsp; real-life&nbsp; animals&nbsp; that&nbsp; she&nbsp; feeds&nbsp; and&nbsp; takes&nbsp; care&nbsp; of.&nbsp;<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Dr.&nbsp; Omayra&nbsp; Torres<br \\/>\\r\\n\\tThe&nbsp; men&nbsp; think&nbsp; she&nbsp; is&nbsp; very&nbsp; pretty.&nbsp; She&nbsp; is&nbsp; on&nbsp; the&nbsp; expedition&nbsp; to&nbsp; give&nbsp; the&nbsp; Indians&nbsp; certain&nbsp; vaccines,&nbsp; serums,&nbsp; and&nbsp; medicines&nbsp; to&nbsp; keep&nbsp; them&nbsp; from&nbsp; getting&nbsp; an&nbsp; American&nbsp; disease.&nbsp; She&nbsp; has&nbsp; long&nbsp; black&nbsp; hair,&nbsp; amber&nbsp; colored&nbsp; skin&nbsp; and&nbsp; green&nbsp; almond&nbsp; eyes.&nbsp; <\\/span><\\/span><\\/span><\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">Analysis&nbsp; and&nbsp; Evaluation<\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">The&nbsp; content&nbsp; was&nbsp; good,&nbsp; it&rsquo;s&nbsp; just&nbsp; that&nbsp; it&nbsp; has&nbsp; a&nbsp; long&nbsp; descriptions&nbsp; that&nbsp; might&nbsp; some&nbsp; get&nbsp; bored.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><em><span style=\\"font-size:12.0pt\\">Author:<\\/span><\\/em><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Isabel&nbsp; Allende&nbsp; was&nbsp; born&nbsp; in&nbsp; Peru&nbsp; and&nbsp; raised&nbsp; in&nbsp; Chile.&nbsp; <\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">She&nbsp; is&nbsp; the&nbsp; acclaimed&nbsp; author&nbsp; of&nbsp; many&nbsp; popular&nbsp; novels,&nbsp; including:<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">The&nbsp; House&nbsp; of&nbsp; the&nbsp; Spirits&nbsp; <\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Eva&nbsp; Luna&nbsp; <\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">The&nbsp; Infinite&nbsp; Plan,&nbsp; <\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Daughter&nbsp; of&nbsp; Fortune,<\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Portrait&nbsp; in&nbsp; Sepia.&nbsp; <\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">CITY&nbsp; OF&nbsp; THE&nbsp; BEASTS&nbsp; is&nbsp; her&nbsp; first&nbsp; novel.<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Allende&nbsp; is&nbsp; a&nbsp; unique&nbsp; and&nbsp; staggering&nbsp; storyteller.&nbsp; Complex,&nbsp; intriguing,&nbsp; ambitious.&nbsp; It&#39;s&nbsp; Allende&#39;s&nbsp; remarkable&nbsp; flair&nbsp; for&nbsp; character&nbsp; that&nbsp; makes&nbsp; it&nbsp; all&nbsp; come&nbsp; alive.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Allende&nbsp; has&nbsp; won&nbsp; many&nbsp; awards&nbsp; like&nbsp; Novel&nbsp; of&nbsp; the&nbsp; Year&nbsp; (Chile,&nbsp; 1983),&nbsp; Panorama&nbsp; Literario&nbsp; (Chile,&nbsp; 1983),&nbsp; Author&nbsp; of&nbsp; the&nbsp; Year&nbsp; (Germany,&nbsp; 1984)&nbsp; and&nbsp; many&nbsp; many&nbsp; more.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><em><span style=\\"font-size:12.0pt\\">Genre:<\\/span><\\/em><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">The&nbsp; genre&nbsp; of&nbsp; this&nbsp; book&nbsp; is&nbsp; Science&nbsp; fiction,&nbsp; mist &nbsp;fantasy&nbsp; and&nbsp; is&nbsp; intended&nbsp; for&nbsp; young&nbsp; and&nbsp; young&nbsp; adult&nbsp; readers.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><em><span style=\\"font-size:12.0pt\\">Title <\\/span><\\/em><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">The&nbsp; title&nbsp; was&nbsp; interesting&nbsp; and&nbsp; mind&nbsp; catching&nbsp; for&nbsp; young&nbsp; readers,&nbsp; specially&nbsp; the&nbsp; newbie&nbsp; reader&nbsp; like&nbsp; me.&nbsp; Triggers&nbsp; the&nbsp; curiosity&nbsp; out&nbsp; of&nbsp; young&nbsp; and&nbsp; young&nbsp; adults.&nbsp; The&nbsp; title&nbsp; itself&nbsp; describes&nbsp; the&nbsp; whole&nbsp; content&nbsp; because&nbsp; has&nbsp; full&nbsp; of&nbsp; mysterious&nbsp; creatures.&nbsp; <\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><em><span style=\\"font-size:12.0pt\\">Introduction<\\/span><\\/em><span style=\\"font-size:12.0pt\\">:<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">It&nbsp; has&nbsp; a&nbsp; good&nbsp; introduction summary&nbsp; and&nbsp; has&nbsp; table&nbsp; of&nbsp; contents.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><em><span style=\\"font-size:12.0pt\\">Cover:<\\/span><\\/em><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">The&nbsp; book&nbsp; cover&nbsp; is&nbsp; interesting&nbsp; with&nbsp; some&nbsp; pictures&nbsp; of&nbsp; some&nbsp; characters&nbsp; and&nbsp; has&nbsp; the&nbsp; picture&nbsp; of&nbsp; the&nbsp; forest&nbsp; where&nbsp; the&nbsp; adventure&nbsp; happens. The summary at the back of the book was interesting. Some says don&rsquo;t judge a book by its cover but I usually did.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><em><span style=\\"font-size:12.0pt\\">Characters:<\\/span><\\/em><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">About&nbsp; the&nbsp; characters,&nbsp; it&nbsp; was&nbsp; just&nbsp; right&nbsp; on&nbsp; what&nbsp; they&nbsp; portray&nbsp; like&nbsp; the&nbsp; main&nbsp; character&nbsp; Alex&nbsp; Cold,&nbsp; Kate&nbsp; and&nbsp; some&nbsp; other&nbsp; characters.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><em><span style=\\"font-size:12.0pt\\">Quote:<\\/span><\\/em><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">&ldquo;And&nbsp; you&nbsp; will&nbsp; be&nbsp; my&nbsp; best&nbsp; friend&mdash;as&nbsp; long&nbsp; as&nbsp; we&nbsp; see&nbsp; each&nbsp; other&nbsp; with&nbsp; our&nbsp; hearts&rdquo;,&nbsp; this&nbsp; is&nbsp; my&nbsp; favorite&nbsp; quote&nbsp; says&nbsp; Alex&nbsp; Cold.&nbsp; For&nbsp; whatever&nbsp; happened,&nbsp; bad&nbsp; or&nbsp; good,&nbsp; best&nbsp; friend&nbsp; remains.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p>&nbsp;<\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">Insight,&nbsp; Suggestions&nbsp; and&nbsp; Recommendations<\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">This&nbsp; book&nbsp; works&nbsp; well&nbsp; except&nbsp; for&nbsp; the&nbsp; long&nbsp; descriptions,&nbsp; has&nbsp; a&nbsp; good&nbsp; story,&nbsp; good&nbsp; moral&nbsp; lessons. I&nbsp; like&nbsp; the&nbsp; adventure&nbsp; on&nbsp; the&nbsp; jungle.&nbsp; This&nbsp; book&nbsp; is&nbsp; worth&nbsp; recommended&nbsp; to&nbsp; those&nbsp; young&nbsp; readers&nbsp; and&nbsp; newbie&nbsp; readers&nbsp; who&nbsp; likes&nbsp; adventure stories.&nbsp; I suggest&nbsp; that&nbsp; read&nbsp; it&nbsp; when&nbsp; you&nbsp; are&nbsp; not&nbsp; tired,&nbsp; read&nbsp; it&nbsp; with&nbsp; a&nbsp; fresh&nbsp; mind.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">By: Bernie Santos A. Cabase &amp; Efren Pojas<\\/span><\\/span><\\/span><\\/p>\\r\\n"}', '1', '0000-00-00', '0000-00-00'),
(4, 48, 'The Man Behind Bars 56', '{"content":"<h4>checking. . . .<\\/h4>\\r\\n"}', '1', '0000-00-00', '0000-00-00'),
(5, 48, 'Making a post display responsive image and add post date', '{"content":"<h4>Click here to add content.<\\/h4>\\r\\n"}', '1', '0000-00-00', '0000-00-00'),
(6, 48, 'City of Beast Book Report II - with image and video intro', '{"content":"<p style=\\"text-align:center\\">&nbsp;<\\/p>\\r\\n\\r\\n<p style=\\"text-align:center\\"><img alt=\\"\\" height=\\"101\\" src=\\"\\/ignite\\/assets\\/ckeditor\\/kcfinder\\/upload\\/images\\/image.png\\" width=\\"101\\" \\/><\\/p>\\r\\n\\r\\n<p style=\\"text-align:center\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">HOLY CROSS COLLEGE OF SASA, INC.<\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:center\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">CITY OF THE BEAST<\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:center\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">By: <\\/span><span style=\\"font-size:15.0pt\\">Isabel Allende<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:center\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:15.0pt\\"><img alt=\\"\\" height=\\"203\\" src=\\"\\/ignite\\/assets\\/ckeditor\\/kcfinder\\/upload\\/images\\/image-20190118224119-2.jpeg\\" width=\\"134\\" \\/><\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:center\\">&nbsp;<\\/p>\\r\\n\\r\\n<p style=\\"text-align:center\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Submitted to:<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:center\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">RENANTE A. DAGUPLO<\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:center\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Instructor<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:center\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Submitted by:<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:center\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">BERNIE SANTOS A. CABASE AND EFREN POJAS<\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:center\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">BSIT<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:center\\"><iframe allow=\\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\\" allowfullscreen=\\"\\" frameborder=\\"0\\" height=\\"542\\" src=\\"https:\\/\\/www.youtube.com\\/embed\\/SSvfUt8tl7Y\\" width=\\"723\\"><\\/iframe><\\/p>\\r\\n\\r\\n<p style=\\"text-align:center\\">&nbsp;<\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">City of the Beasts<\\/span><\\/strong><br \\/>\\r\\n<span style=\\"font-size:12.0pt\\">Copyright &copy; 2002 by Isabel Allende<br \\/>\\r\\nEnglish translation copyright &copy; 2002<br \\/>\\r\\nby HarperCollins Publishers Inc.<br \\/>\\r\\nPrinted in the U.S.A. All rights reserved.<br \\/>\\r\\nwww.harpercollins.com<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Library of Congress Cataloging-in-Publication Data Allende, Isabel.<br \\/>\\r\\nCity of the beasts \\/ by Isabel Allende; translated from the Spanish by Margaret Sayers Peden. p. cm.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">ISBN 0-06-050918-X&mdash;ISBN 0-06-050917-1 (lib. bdg.)&mdash;ISBN 0-06-051195-8 (large print : pbk.)<br \\/>\\r\\nPZ7.A43912 Ci 2002 2002022338<\\/span><\\/span><\\/span><br \\/>\\r\\n&nbsp;<\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">Characters<\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">The Cold Family <\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Expedition Members <\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">People of the Mist<\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Alex_Cold <\\/span><br \\/>\\r\\n\\t<span style=\\"font-size:12.0pt\\">Can be temperamental, especially about his Mom&#39;s sickness. He is very talented and loves to rock climb with his dad and play the flute. He is very brave, but at the same time he is very picky with things like food and bugs. He doesn&#39;t give up on things easily. His attitude changes from the beginning to the end and after he finds his spirit animal, he becomes more aware of the magic and culture of the Amazon.<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Kate<br \\/>\\r\\n\\tAlex&rsquo;s grandmother. She wants Alex to learn to do things himself and not depend on other people. She has been to many places in the world and is very adventurous.<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">John_Cold<br \\/>\\r\\n\\tA doctor and an experienced rock climber. He is very understanding of Alex&#39;s pain and sadness about his mother.<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Cesar_Santos<br \\/>\\r\\n\\tThe guide of the hole expedition. He is very tall and alert and is very smart about things like the beast and the Indian people.<\\/span><\\/span><\\/span><\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p style=\\"text-align:justify\\">&nbsp;<\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Ludovic_Leblanc<br \\/>\\r\\n\\tVery short, thin and nervous all the time. He is a very famous anthropologist. He was very smart. He didn&rsquo;t like bathing is dirty water and lots of the time he was in a mad mood.<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Mauro_Carias_(Morkita)<br \\/>\\r\\n\\tHe is chief of the People of the Mist. Was very old with a wood-like face and scored skin like tree-bark.<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Lisa_Cold<br \\/>\\r\\n\\tLisa is the mother of Alex, Andrea and Nicole. She has become ill from cancer and can no longer help around the house with the family.<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Andrea_Cold<br \\/>\\r\\n\\tAndrea is 12 years old, loves to dress up and make up her own magical worlds She imagines magical things every day, and what every other girl her age obsesses about, she doesn&rsquo;t even care about.<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Nicole Cold<br \\/>\\r\\n\\tNicole is the youngest in the family. She collects animals because she feels it will make up for the attention not given to her by her mom. She loves animals and has many real-life animals that she feeds and takes care of.<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Dr. Omayra Torres<br \\/>\\r\\n\\tThe men think she is very pretty. She is on the expedition to give the Indians certain vaccines, serums, and medicines to keep them from getting an American disease. She has long black hair, amber colored skin and green almond eyes. <\\/span><\\/span><\\/span><\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p style=\\"text-align:justify\\">&nbsp;<\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">Analysis and Evaluation<\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">The content was good, it&rsquo;s just that it has a long descriptions that might some get bored.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><em><span style=\\"font-size:12.0pt\\">Author:<\\/span><\\/em><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Isabel Allende was born in Peru and raised in Chile. <\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">She is the acclaimed author of many popular novels, including:<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">The House of the Spirits <\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Eva Luna <\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">The Infinite Plan, <\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Daughter of Fortune,<\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Portrait in Sepia. <\\/span><\\/span><\\/span><\\/li>\\r\\n\\t<li style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">CITY OF THE BEASTS is her first novel.<\\/span><\\/span><\\/span><br \\/>\\r\\n\\t&nbsp;<\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Allende is a unique and staggering storyteller. Complex, intriguing, ambitious. It&#39;s Allende&#39;s remarkable flair for character that makes it all come alive.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">Allende has won many awards like Novel of the Year (Chile, 1983), Panorama Literario (Chile, 1983), Author of the Year (Germany, 1984) and many many more.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">Genre<\\/span><\\/strong><em><span style=\\"font-size:12.0pt\\">:<\\/span><\\/em><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">The genre of this book is Science fiction, mist fantasy and is intended for young and young adult readers.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\">&nbsp;<\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">Title <\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">The title was interesting and mind catching for young readers, specially the newbie reader like me. Triggers the curiosity out of young and young adults. The title itself describes the whole content because has full of mysterious creatures. <\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">Introduction<\\/span><\\/strong><span style=\\"font-size:12.0pt\\">:<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">It has a good introduction summary and has table of contents.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">Cover<\\/span><\\/strong><em><span style=\\"font-size:12.0pt\\">:<\\/span><\\/em><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">The book cover is interesting with some pictures of some characters and has the picture of the forest where the adventure happens. The summary at the back of the book was interesting. Some says don&rsquo;t judge a book by its cover but I usually did.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">Characters<\\/span><\\/strong><em><span style=\\"font-size:12.0pt\\">:<\\/span><\\/em><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">About the characters, it was just right on what they portray like the main character Alex Cold, Kate and some other characters.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">Quote<\\/span><\\/strong><em><span style=\\"font-size:12.0pt\\">:<\\/span><\\/em><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">&ldquo;And you will be my best friend&mdash;as long as we see each other with our hearts&rdquo;, this is my favorite quote says Alex Cold. For whatever happened, bad or good, best friend remains.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\">&nbsp;<\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\">&nbsp;<\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><strong><span style=\\"font-size:12.0pt\\">Insight, Suggestions and Recommendations<\\/span><\\/strong><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">This book works well except for the long descriptions, has a good story, good moral lessons. I like the adventure on the jungle. This book is worth recommended to those young readers and newbie readers who likes adventure stories. I suggest that read it when you are not tired, read it with a fresh mind.<\\/span><\\/span><\\/span><\\/p>\\r\\n\\r\\n<p style=\\"text-align:justify\\"><span style=\\"font-size:11pt\\"><span style=\\"font-family:Calibri,sans-serif\\"><span style=\\"font-size:12.0pt\\">By: Bernie Santos A. Cabase &amp; Efren Pojas<\\/span><\\/span><\\/span><\\/p>\\r\\n"}', '1', '0000-00-00', '0000-00-00');

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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `finished_exercises`
--
ALTER TABLE `finished_exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
