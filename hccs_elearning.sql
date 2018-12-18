-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2018 at 09:37 AM
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
  `student_login_name` varchar(255) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `student_program` varchar(255) NOT NULL,
  `student_subjects` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `college_teachers`
--

CREATE TABLE `college_teachers` (
  `ct_id` int(11) NOT NULL,
  `ct_login_name` varchar(255) NOT NULL,
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

INSERT INTO `college_teachers` (`ct_id`, `ct_login_name`, `ct_password`, `ct_handled_students`, `ct_program`, `ct_courses`, `ct_subjects_lessons`, `ct_date_added`, `ct_date_updated`) VALUES
(1, 'teacher', 'password', '', '', '', NULL, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `subject_id` int(3) NOT NULL,
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
(1, 1, 'Lesson 1', '', 'Bernz', '2018-12-10', '0000-00-00'),
(2, 2, 'Lesson 2', '', 'Bernz', '2018-12-10', '0000-00-00'),
(3, 16, 'Lesson 1', '', 'Bernz', '2018-12-10', '0000-00-00'),
(4, 35, 'Lesson 2', '', 'Bernz', '2018-12-10', '0000-00-00'),
(5, 1, 'some title', '', 'Bernz', '0000-00-00', '0000-00-00'),
(6, 2, 'some title number 2', '', 'Bernz', '0000-00-00', '0000-00-00'),
(7, 2, 'some title number 5', '<p>(Saved reply for the inquiries)&nbsp;</p>\r\n\r\n<p>Kayo nabahalajan.</p>\r\n\r\n<p><img alt=\"\" src=\"/ignite/assets/ckeditor/kcfinder/upload/images/35346961_1859841880743931_624083641739247616_o.jpg\" style=\"width: 200px; height: 100px;\" /></p>\r\n\r\n<p>Thank you for your enquiry and we have tried to answer most common questions as below.&nbsp;</p>\r\n\r\n<p>Please Read first&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Castle View is a PRIVATE GUESTHOUSE that accomodates only ADVANCE confirmed guests, we do NOT accept any DAYTOURS or WALKINS chance guests.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Castle View is located on top of a&nbsp; hill with unmatched views over Davao City and the gulf, we are located in Upper Caliclic, Samal Island and you can find us on Google Maps. We are exactly 8 minutes drive from the Davao to Samal ferry terminal and</p>\r\n\r\n<p>5 minutes drive to the nearest beach which is Paradise Beach Resort.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This exclusive overlooking guesthouse is luxury furnished with a large infinity pool, is perfect for people who just want to chillax and unwind while gazing at the amazing views of Davao City, Gulf and Mount Apo in the day time and the dazzling City lights at night time. This place is perfect for your exclusive staycation!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Castle View has 5 individual apartments and each unit has it own independent personal entrance, kitchen, lounge bathrooms etc only the garden area and pool are shared with other guests.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>RATES:</p>\r\n\r\n<p>?Sea View Studio ?2,500&nbsp;</p>\r\n\r\n<p>strictly good for 2pax (5yrs old below is free)</p>\r\n\r\n<p>click the link to view photos</p>\r\n\r\n<p><a href=\"https://m.facebook.com/story.php?story_fbid=1771731512888302&amp;id=352285628166238\" target=\"_blank\">https://m.facebook.com/story.php?story_fbid=1771731512888302&amp;id=352285628166238</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>?Beach Room Studio ?3,500&nbsp;</p>\r\n\r\n<p>good for 2pax (800 extrahead)&nbsp;</p>\r\n\r\n<p>click the link to view photos;</p>\r\n\r\n<p><a href=\"https://m.facebook.com/story.php?story_fbid=1847200078674778&amp;id=352285628166238\" target=\"_blank\">https://m.facebook.com/story.php?story_fbid=1847200078674778&amp;id=352285628166238</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>? Sunset View Studio ?3,500&nbsp;</p>\r\n\r\n<p>good for 2pax (800 extrahead)&nbsp;</p>\r\n\r\n<p>Click link to view the</p>\r\n\r\n<p>photos;&nbsp;<a href=\"https://m.facebook.com/story.php?story_fbid=1972695556125229&amp;id=352285628166238\" target=\"_blank\">https://m.facebook.com/story.php?story_fbid=1972695556125229&amp;id=352285628166238</a></p>\r\n\r\n<p>video;</p>\r\n\r\n<p><a href=\"https://m.facebook.com/story.php?story_fbid=247358209253493&amp;id=352285628166238\" target=\"_blank\">https://m.facebook.com/story.php?story_fbid=247358209253493&amp;id=352285628166238</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>?Garden View Apartment ?7,000&nbsp;</p>\r\n\r\n<p>good for 4-6pax (800 extra head)</p>\r\n\r\n<p>click the link to view the</p>\r\n\r\n<p>photos;&nbsp;<a href=\"https://m.facebook.com/story.php?story_fbid=1579011022160353&amp;id=352285628166238\" target=\"_blank\">https://m.facebook.com/story.php?story_fbid=1579011022160353&amp;id=352285628166238</a></p>\r\n\r\n<p>video;</p>\r\n\r\n<p><a href=\"https://m.facebook.com/story.php?story_fbid=514928182251014&amp;id=352285628166238\" target=\"_blank\">https://m.facebook.com/story.php?story_fbid=514928182251014&amp;id=352285628166238</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>?City View Apartment ?10,000&nbsp;</p>\r\n\r\n<p>good for 8pax only</p>\r\n\r\n<p>click the link to view</p>\r\n\r\n<p>photos;&nbsp;</p>\r\n\r\n<p><a href=\"https://m.facebook.com/story.php?story_fbid=1576144309113691&amp;id=352285628166238\" target=\"_blank\">https://m.facebook.com/story.php?story_fbid=1576144309113691&amp;id=352285628166238</a></p>\r\n\r\n<p>video;</p>\r\n\r\n<p><a href=\"https://m.facebook.com/story.php?story_fbid=1866091940118925&amp;id=352285628166238\" target=\"_blank\">https://m.facebook.com/story.php?story_fbid=1866091940118925&amp;id=352285628166238</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Each apartment is equipped with a large LED TV Netflix and HD movies built in, water dispenser, rice cooker, fridge freezer, microwave, complete kitchen/cooking utensils like hotplate, spoon, fork, plates, cups, glasses, wine glass, bowls, drinking water, and you can cook.</p>\r\n\r\n<p>WiFi, aircon in all rooms, hot showers, tissue, towels, personal kit.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>?25,000 per night exclusive for all 5 apartment&#39;s STRICTLY good for 15-20 maximum including kids.</p>\r\n\r\n<p>We dont Accept more than 20 people.</p>\r\n\r\n<p>5yrs old below is free.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mode of Payment is Full or 50% advance deposit through BPI Bank or online banking.&nbsp;</p>\r\n\r\n<p>Its a NO RECIEPT, NO RESERVATION Policy. Cancellation fee is 25% and 500 for rebooking.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Checkin time 2pm Checkout time is strictly 11am, Not allowed early checkin and late checkout. We dont have a lobby or reception area in the guesthouse.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>(ABOUT FOOD)&nbsp;</p>\r\n\r\n<p>We do not have any restaurant but we have a small shop selling essential basic items like coffee, rice, charcoal, oil, soft drinks and beers only.&nbsp;</p>\r\n\r\n<p>We do however suggest to bring whatever you need with you as the main grocery in Babak is a 10min drive.&nbsp;</p>\r\n\r\n<p>We do not charge any corkage and encourage guests to&nbsp; bring&nbsp; anything you need.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Their is a local restaurant called Farmers Grill which offers a delivery service, please click the link for their food menu;</p>\r\n\r\n<p><a href=\"https://m.facebook.com/story.php?story_fbid=1847209695340483&amp;id=352285628166238\" target=\"_blank\">https://m.facebook.com/story.php?story_fbid=1847209695340483&amp;id=352285628166238</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>AMENITIES;</p>\r\n\r\n<p>?Free use of the swimming pool pool from 7AM-8PM</p>\r\n\r\n<p>?Free use of the BBQ grill in the garden area</p>\r\n\r\n<p>?Free high speed WiFi throughout the property.&nbsp;</p>\r\n\r\n<p>? Free Parking Area</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>HOW TO GET TO CASTLE VIEW</p>\r\n\r\n<p>From SasaSamalWharf your take a boat</p>\r\n\r\n<p>15minutes to get to Samal Island.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You can use Google Maps to get to Castle View and we suggest to bring your own vehicle if you have, some part of the road are cemented some are not, lowered cars has no problems to go up in the hill. likevios, bb toyota or any small cars and small motorbikes.&nbsp;</p>\r\n\r\n<p>?Or you can take a HABAL-HABAL(motorbike) from the ferry terminal, just tell the driver to take you to Castle View. They charge 50-70 pesos per head.</p>\r\n', 'Bernz', '0000-00-00', '0000-00-00'),
(8, 1, 'The Man Behind Bars 560', '<table class=\"table\" style=\"width: 100%;\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width: 50%;\">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><b><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">Android Bulletin Instructions</span></span></b></span></span></span></span></p>\r\n\r\n<p class=\"normal\">&nbsp;</p>\r\n\r\n<ol>\r\n	<li class=\"normalCxSpMiddle\"><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">The App is not yet connected to internet, it uses local database which is SQLite database. (kay wala na sa oras.Butangan pa na og code para masync ang SQLite sa MySQL server database para magamit online, in the meantime, kini lang sa).</span></span></li>\r\n	<li class=\"normalCxSpMiddle\"><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">For the registration, only the student can register. The Teacher and Admin will be registered manually sa database. After registration, they will be going to the Student&rsquo;s Account home.</span></span></li>\r\n</ol>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></span></p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Note: </b>For Your Defense purpose, At the very First startup sa App after installation, it will automatically generate temporary Admin and Teacher account.</span></span></span></span></span></span></p>\r\n\r\n<p class=\"normal\">&nbsp;</p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Admin username: admin</b></span></span></span></span></span></span></p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><b><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Admin password: 1234</span></span></b></span></span></span></span></p>\r\n\r\n<p class=\"normal\">&nbsp;</p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><b><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Teacher username: teacher</span></span></b></span></span></span></span></p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><b><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Teacher password&rdquo; 1234</span></span></b></span></span></span></span></p>\r\n\r\n<p class=\"normal\">&nbsp;</p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><b><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; So you can Add Announcements in the Admin and teacher&rsquo;s account.</span></span></b></span></span></span></span></p>\r\n\r\n<p class=\"normal\">&nbsp;</p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><b><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You Have to register The Student&rsquo;s account (</span></span></b><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">just press register on the login page<b>)</b></span></span></span></span></span></span></p>\r\n\r\n<p class=\"normal\">&nbsp;</p>\r\n\r\n<p class=\"normal\" style=\"text-indent:36.0pt\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">3. You can add Announcements in the teacher and admin account.</span></span></span></span></span></span></p>\r\n\r\n<p class=\"normal\" style=\"text-indent:36.0pt\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">The Teacher can add only <b>Program announcement.</b></span></span></span></span></span></span></p>\r\n\r\n<p class=\"normal\">&nbsp;</p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><b><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">For the Teacher Account</span></span></b></span></span></span></span></p>\r\n\r\n<p class=\"normal\">&nbsp;</p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><b><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">Note: kung unsa nga department o program&nbsp; na-belong si teacher mao sad an</span></span></b><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">g <b>makita sa student by program or course or department.</b></span></span></span></span></span></span></p>\r\n\r\n<p class=\"normal\" style=\"text-indent:36.0pt\">&nbsp;</p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">The teacher can only add program announcement.</span></span></span></span></span></span></p>\r\n\r\n<p class=\"normal\">&nbsp;</p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">Ang makita lang ni teacher nga program announcement is according sa iyahang department/program nga gihandle, SAME LANG SILAG MAKITA NI STUDENT nga announcement.</span></span></span></span></span></span></p>\r\n\r\n<p class=\"normal\" style=\"text-indent:36.0pt\">&nbsp;</p>\r\n\r\n<p class=\"normal\">&nbsp;</p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><b><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">For the Admin Account</span></span></b></span></span></span></span></p>\r\n\r\n<p class=\"normal\">&nbsp;</p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">Admin can add program and general announcement (just select the spinner)</span></span></span></span></span></span></p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">The delete item in the menu is not yet functioning (it&rsquo;s useless for now)</span></span></span></span></span></span></p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">The admin can see both general and ALL PROGRAM ANNOUNCEMENT INCLUDING ALL COURSES, DEPARTMENTS OR PROGRAMS.</span></span></span></span></span></span></p>\r\n\r\n<p class=\"normal\">&nbsp;</p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><b><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">For the Student account</span></span></b></span></span></span></span></p>\r\n\r\n<p class=\"normal\">&nbsp;</p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">The student can see general announcements and program according to what program or courses they are registered. (kana lang)</span></span></span></span></span></span></p>\r\n\r\n<p class=\"normal\">&nbsp;</p>\r\n\r\n<p class=\"normal\">&nbsp;</p>\r\n\r\n<p class=\"normal\">&nbsp;</p>\r\n\r\n<p class=\"normal\"><span style=\"font-size:11pt\"><span style=\"line-height:115%\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\"><span lang=\"EN\" style=\"font-size:12.0pt\"><span style=\"line-height:115%\">Mao lang na guiz mao lang ang makaya sa time and sa hinay nga laptop hehe&hellip; Good luck sa defense&hellip;&hellip; God Bless...</span></span></span></span></span></span></p>\r\n', 'Bernz', '0000-00-00', '0000-00-00'),
(9, 1, 'This is a sample 1', '<p><b>Android Bulletin Instructions</b></p>\r\n\r\n<ol class=\"baby\">\r\n	<li>The App is not yet connected to internet, it uses local database which is SQLite database. (kay wala na sa oras.Butangan pa na og code para masync ang SQLite sa MySQL server database para magamit online, in the meantime, kini lang sa).</li>\r\n	<li>For the registration, only the student can register. The Teacher and Admin will be registered manually sa database. After registration, they will be going to the Student&rsquo;s Account home.</li>\r\n</ol>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Note:&nbsp;</b>For Your Defense purpose, At the very First startup sa App after installation, it will automatically generate temporary Admin and Teacher account.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &quot;<b>Admin username: admin&#39;</b></p>\r\n\r\n<p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Admin password: 1234</b></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Teacher username: teacher</b></p>\r\n\r\n<p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Teacher password&rdquo; 1234</b></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; So you can Add Announcements in the Admin and teacher&rsquo;s account.</b></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You Have to register The Student&rsquo;s account (</b>just press register on the login page<b>)</b></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>3. You can add Announcements in the teacher and admin account.</p>\r\n\r\n<p>The Teacher can add only&nbsp;<b>Program announcement.</b></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><b>For the Teacher Account</b></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><b>Note: kung unsa nga department o program&nbsp; na-belong si teacher mao sad an</b>g&nbsp;<b>makita sa student by program or course or department.</b></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The teacher can only add program announcement.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ang makita lang ni teacher nga program announcement is according sa iyahang department/program nga gihandle, SAME LANG SILAG MAKITA NI STUDENT nga announcement.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><b>For the Admin Account</b></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Admin can add program and general announcement (just select the spinner)</p>\r\n\r\n<p>The delete item in the menu is not yet functioning (it&rsquo;s useless for now)</p>\r\n\r\n<p>The admin can see both general and ALL PROGRAM ANNOUNCEMENT INCLUDING ALL COURSES, DEPARTMENTS OR PROGRAMS.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><b>For the Student account</b></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The student can see general announcements and program according to what program or courses they are registered. (kana lang)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mao lang na guiz mao lang ang makaya sa time and sa hinay nga laptop hehe&hellip; Good luck sa defense&hellip;&hellip; God Bless...</p>\r\n', 'Bernz', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(3) NOT NULL,
  `course_id` int(3) NOT NULL,
  `number_of_lessons` varchar(255) NOT NULL,
  `subject_title` varchar(255) NOT NULL,
  `create_on` date NOT NULL,
  `update_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `course_id`, `number_of_lessons`, `subject_title`, `create_on`, `update_on`) VALUES
(1, 1, '8', 'IT Elect 12', '0000-00-00', '2018-10-12'),
(2, 2, '9', 'IT Elect 24', '0000-00-00', '2018-10-12'),
(16, 0, '12', 'test123', '2018-03-12', '2018-10-12'),
(35, 0, '', 'testtesdf', '2018-11-12', '0000-00-00');

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
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `college_teachers`
--
ALTER TABLE `college_teachers`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
