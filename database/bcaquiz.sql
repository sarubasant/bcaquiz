-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221125.2e001c186a
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 09:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+05:45";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcaquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'sarubasant@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `question_text` varchar(200) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `option_1` varchar(100) DEFAULT NULL,
  `option_2` varchar(100) DEFAULT NULL,
  `option_3` varchar(100) DEFAULT NULL,
  `option_4` varchar(100) DEFAULT NULL,
  `correct_option` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `quiz_id`, `question_text`, `is_active`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_option`) VALUES
(1, 1, 'Which of the following is generally used for performing tasks like creating the structure of the relations, deleting relation?', '1', 'DML(Data Manipulation Language)', 'Query', 'Relational Schema', 'DDL(Data Definition Language)', 4),
(2, 1, 'What is the full form of DBMS?', '1', 'Data of Binary Management System', 'Database Management System', 'Database Management Service', 'Data Backup Management System', 2),
(3, 1, 'Which of the following provides the ability to query information from the database and insert tuples into, delete tuples from, and modify tuples in the database?', '1', 'DML(Data Manipulation Language)', 'Query', 'Relational Schema', 'DDL(Data Definition Language)', 1),
(5, 1, 'Who created the first DBMS?', '1', 'Edgar Frank Codd', 'Charles Bachman', 'Charles Babbage', 'Sharon B. Codd', 2),
(6, 1, 'Which type of data can be stored in the database?', '1', 'Image oriented data', 'Text, files containing data', 'Data in the form of audio or video', 'All of the above', 4),
(7, 1, 'The given Query can also be replaced with_______:\r\n\r\nSELECT name, course_id  \r\nFROM instructor, teaches  \r\nWHERE instructor_ID= teaches_ID;  ', '1', 'Select name,course_id from teaches,instructor where instructor_id=course_id;', 'Select name, course_id from instructor natural join teaches;', 'Select name, course_id from instructor;', 'Select course_id from instructor join teaches;', 2),
(8, 1, 'What do you mean by one to many relationships?', '1', 'One class may have many teachers', 'One teacher can have many classes', 'Many classes may have many teachers', 'Many teachers may have many classes', 2),
(9, 2, 'Which of these is a standard interface for serial data transmission?', '1', 'ASCII', 'RS232C', '2', 'Centronics', 2),
(10, 2, 'Which type of topology is best suited for large businesses which must carefully control and coordinate the operation of distributed branch outlets?', '1', 'Ring', 'Local area', 'Hierarchical', 'Star', 4),
(11, 2, 'What is the maximum data rate of Ethernet LAN using standard CAT6 cable?', '1', '100 Mbps', '1 Gbps', '10 Gbps', '100 Gbps', 3),
(12, 2, 'What is the purpose of a subnet mask in IP networking?', '1', 'To identify the network portion of an IP address', 'To identify the host portion of an IP address', 'To define the default gateway', 'To identify the MAC address of a device', 1),
(13, 2, 'Which protocol provides reliable, connection-oriented communication in computer networks?', '1', 'TCP', 'UDP', 'IP', 'HTTP', 1),
(14, 2, 'What is the function of a router in a network?', '1', 'To connect devices within the same network', 'To connect multiple networks together', 'To amplify the strength of the network signal', 'To encrypt network traffic', 2),
(15, 2, 'Which device operates at the Data Link Layer of the OSI model?', '1', 'Router', 'Switch', 'Hub', 'Bridge', 2),
(16, 2, 'What is the maximum addressable memory space in a 32-bit system?', '1', '2 GB', '4 GB', '8 GB', '16 GB', 2),
(17, 2, 'Which protocol is used for email communication?', '1', 'SMTP', 'HTTP', 'FTP', 'DNS', 1),
(18, 2, 'What is the purpose of DHCP?', '1', 'To assign IP addresses to devices on a network', 'To provide secure remote access to a network', 'To translate domain names to IP addresses', 'To manage network security', 1),
(19, 2, 'Which network topology requires a central device for communication?', '1', 'Bus', 'Ring', 'Star', 'Mesh', 3),
(20, 2, 'What is the purpose of DNS?', '1', 'To convert IP addresses to domain names', 'To provide secure file transfer over a network', 'To manage network traffic', 'To establish VPN connections', 1),
(21, 2, 'Which protocol is used for secure communication over the Internet?', '1', 'FTP', 'SSH', 'SNMP', 'SMTP', 2),
(22, 2, 'What is the default port number for HTTP?', '1', '20', '80', '110', '443', 2),
(23, 2, 'What is the purpose of ARP?', '1', 'To map IP addresses to MAC addresses', 'To route packets between networks', 'To secure network connections', 'To manage network bandwidth', 1),
(24, 2, 'What is the maximum number of IP addresses that can be assigned to hosts in a /24 subnet?', '1', '16', '64', '128', '256', 4),
(25, 2, 'Which device forwards data packets between different networks based on IP addresses?', '1', 'Switch', 'Router', 'Bridge', 'Hub', 2),
(26, 2, 'What is the purpose of NAT (Network Address Translation)?', '1', 'To translate domain names to IP addresses', 'To encrypt network traffic', 'To provide secure remote access to a network', 'To translate private IP addresses to public IP addresses', 4),
(27, 2, 'Which network topology provides fault tolerance and redundancy?', '1', 'Bus', 'Ring', 'Mesh', 'Star', 3),
(28, 2, 'What is the purpose of a firewall?', '1', 'To connect devices within the same network', 'To filter network traffic based on rules', 'To amplify the strength of the network signal', 'To translate domain names to IP addresses', 2),
(29, 2, 'Which layer of the OSI model is responsible for logical addressing and routing?', '1', 'Physical Layer', 'Data Link Layer', 'Network Layer', 'Transport Layer', 3),
(30, 2, 'What is the maximum length of a MAC address?', '1', '48 bits', '64 bits', '128 bits', '256 bits', 1),
(31, 2, 'What is the purpose of a DNS server?', '1', 'To convert domain names to IP addresses', 'To provide secure file transfer over a network', 'To manage network traffic', 'To establish VPN connections', 1),
(32, 2, 'What is the maximum data rate of USB 3.0?', '1', '480 Mbps', '1 Gbps', '5 Gbps', '10 Gbps', 3),
(33, 2, 'Which network device operates at the Physical Layer of the OSI model?', '1', 'Router', 'Switch', 'Hub', 'Bridge', 3),
(34, 2, 'What is the purpose of ICMP?', '1', 'To provide secure remote access to a network', 'To manage network security', 'To identify the network portion of an IP address', 'To diagnose and report network errors', 4),
(35, 2, 'What is the purpose of a default gateway?', '1', 'To connect devices within the same network', 'To connect multiple networks together', 'To translate domain names to IP addresses', 'To assign IP addresses to devices on a network', 2),
(36, 2, 'Which protocol is used for transferring files between a client and a server?', '1', 'FTP', 'HTTP', 'SMTP', 'POP3', 1),
(37, 2, 'What is the purpose of a VLAN (Virtual Local Area Network)?', '1', 'To connect devices within the same network', 'To connect multiple networks together', 'To segment a network into multiple virtual networks', 'To assign IP addresses to devices on a network', 3),
(38, 2, 'Which network topology requires a dedicated point-to-point connection between each pair of nodes?', '1', 'Bus', 'Ring', 'Mesh', 'Star', 3),
(39, 2, 'What is the purpose of SSL (Secure Sockets Layer)?', '1', 'To convert IP addresses to domain names', 'To provide secure remote access to a network', 'To establish VPN connections', 'To encrypt network traffic', 4),
(40, 2, 'Which layer of the OSI model is responsible for establishing, managing, and terminating sessions between applications?', '1', 'Presentation Layer', 'Application Layer', 'Session Layer', 'Transport Layer', 3),
(41, 2, 'Which protocol is used for secure shell access to remote servers?', '1', 'FTP', 'SSH', 'SMTP', 'DNS', 2),
(42, 2, 'What is the purpose of a MAC address?', '1', 'To identify the network portion of an IP address', 'To identify the host portion of an IP address', 'To identify a network interface card (NIC)', 'To translate domain names to IP addresses', 3),
(43, 2, 'What is the maximum data rate of Wi-Fi 6 (802.11ax)?', '1', '1 Mbps', '100 Mbps', '1 Gbps', '10 Gbps', 4),
(44, 2, 'Which layer of the OSI model is responsible for error detection and recovery?', '1', 'Physical Layer', 'Data Link Layer', 'Network Layer', 'Transport Layer', 4),
(45, 2, 'What is the purpose of a proxy server?', '1', 'To connect devices within the same network', 'To filter network traffic based on rules', 'To amplify the strength of the network signal', 'To establish VPN connections', 2),
(46, 2, 'Which protocol is used for sending and receiving email?', '1', 'SMTP', 'HTTP', 'FTP', 'POP3', 1),
(47, 2, 'What is the purpose of a DHCP server?', '1', 'To translate domain names to IP addresses', 'To assign IP addresses to devices on a network', 'To manage network security', 'To provide secure remote access to a network', 2),
(48, 2, 'What is the maximum number of devices that can be connected to a single USB hub?', '1', '2', '4', '8', '16', 3),
(49, 2, 'Which network device operates at the Transport Layer of the OSI model?', '1', 'Router', 'Switch', 'Hub', 'Firewall', 4),
(50, 2, 'What is the purpose of ICMP echo request and reply messages?', '1', 'To manage network security', 'To identify the host portion of an IP address', 'To translate domain names to IP addresses', 'To check network connectivity and measure round-trip time', 4),
(51, 2, 'Which layer of the OSI model is responsible for converting data into a format that the recipient can understand?', '1', 'Data Link Layer', 'Network Layer', 'Presentation Layer', 'Application Layer', 3),
(52, 2, 'What is the purpose of a modem?', '1', 'To connect devices within the same network', 'To connect multiple networks together', 'To convert digital signals to analog signals and vice versa', 'To translate domain names to IP addresses', 3),
(53, 2, 'Which protocol is used for secure web browsing?', '1', 'FTP', 'HTTP', 'SMTP', 'HTTPS', 4),
(54, 2, 'What is the purpose of a gateway in networking?', '1', 'To connect devices within the same network', 'To connect multiple networks together', 'To manage network traffic', 'To translate domain names to IP addresses', 2),
(55, 2, 'What is the maximum data rate of USB 2.0?', '1', '12 Mbps', '100 Mbps', '1 Gbps', '10 Gbps', 1),
(56, 2, 'Which network topology provides the highest level of redundancy?', '1', 'Bus', 'Ring', 'Mesh', 'Star', 3),
(57, 2, 'What is the purpose of a VPN (Virtual Private Network)?', '1', 'To connect devices within the same network', 'To connect multiple networks together', 'To provide secure remote access to a network', 'To manage network security', 3),
(58, 2, 'Which layer of the OSI model is responsible for data encryption and decryption?', '1', 'Presentation Layer', 'Application Layer', 'Session Layer', 'Transport Layer', 1),
(59, 2, 'What is the maximum length of a IPv4 address?', '1', '32 bits', '48 bits', '64 bits', '128 bits', 1),
(60, 2, 'Which protocol is used for translating domain names to IP addresses?', '1', 'SMTP', 'HTTP', 'DNS', 'FTP', 3),
(61, 1, 'What is DBMS?', '1', 'Database Management System', 'Distributed Management System', 'Digital Business Management System', 'Data Backup and Migration System', 1),
(62, 1, 'Which type of DBMS stores data in tabular form?', '1', 'Hierarchical DBMS', 'Relational DBMS', 'Object-Oriented DBMS', 'Network DBMS', 2),
(63, 1, 'What is a primary key in a database?', '1', 'A foreign key from another table', 'An index for fast data retrieval', 'A unique identifier for a record in a table', 'A backup of the database', 3),
(64, 1, 'What is a foreign key in a database?', '1', 'A key used for encryption', 'A key used for authorization', 'A key used for hashing', 'A reference to a primary key in another table', 4),
(65, 1, 'What is SQL?', '1', 'Structured Query Language', 'Secure Query Language', 'Systematic Query Language', 'Simple Query Language', 1),
(66, 1, 'What is a join in SQL?', '1', 'Combining rows from different tables based on related columns', 'Sorting the rows in a table', 'Removing duplicate rows from a table', 'Filtering rows based on a condition', 1),
(67, 1, 'What is normalization in DBMS?', '1', 'Converting data into a different format', 'A process to eliminate redundancy and dependency in a database', 'Encrypting the data in a database', 'Backing up the database', 2),
(68, 1, 'What is ACID in DBMS?', '1', 'A programming language for database operations', 'A data structure to store database records', 'A set of properties to ensure reliable processing of database transactions', 'An encryption algorithm for securing data', 3),
(69, 1, 'What is a view in DBMS?', '1', 'A physical copy of a table', 'A temporary table used for intermediate calculations', 'A table that stores metadata about other tables', 'A virtual table based on the result of a query', 4),
(70, 1, 'What is indexing in DBMS?', '1', 'Storing data in a tabular format', 'Converting data into a different format', 'Organizing data into tables', 'A data structure that improves the speed of data retrieval', 4),
(71, 1, 'What is a trigger in DBMS?', '1', 'A user-defined function for performing calculations', 'A set of actions that are automatically executed in response to a database event', 'An algorithm for sorting data', 'A mechanism for connecting to a database', 2),
(72, 1, 'What is a deadlock in DBMS?', '1', 'A situation where two or more transactions are waiting indefinitely for each other to release resour', 'A database failure due to hardware issues', 'Corruption of database files', 'A logical inconsistency in the database', 1),
(73, 1, 'What is data integrity in DBMS?', '1', 'The size of the database', 'The speed of data retrieval from the database', 'The accuracy, consistency, and reliability of data stored in a database', 'The backup and recovery mechanisms of the database', 3),
(74, 1, 'What is a stored procedure in DBMS?', '1', 'A table that holds temporary data', 'A mechanism for securing the database from unauthorized access', 'A precompiled collection of SQL statements stored in the database', 'A tool for generating reports from the database', 3),
(75, 1, 'What is a database schema?', '1', 'A collection of database objects, including tables, views, and indexes', 'A data structure that organizes data for efficient storage and retrieval', 'A graphical representation of the database structure', 'A method for encrypting sensitive data in the database', 1),
(76, 1, 'What is data modeling in a database?', '1', 'The process of converting data into a different format', 'The process of creating a conceptual representation of the data in a database', 'The process of indexing data for faster retrieval', 'The process of backing up data', 2),
(77, 1, 'What is concurrency control in a database?', '1', 'A mechanism to manage simultaneous access to the database by multiple users', 'A mechanism to prevent unauthorized access to the database', 'A mechanism to recover from database failures', 'A mechanism to optimize query performance', 1),
(78, 1, 'What is a data warehouse?', '1', 'A centralized repository for storing, managing, and analyzing data', 'A database for transaction processing', 'A distributed database', 'A database for backups', 1),
(79, 6, 'Her thinking leans ____ democracy.', '1', 'with', 'towards', 'for', 'None of these', 2),
(80, 6, 'He got too tired _____ over work.', '1', 'because of', 'because off', 'on', 'for', 1),
(81, 6, '_____ his principles, he has to be very careful.', '1', 'with regard of', 'with regard on', 'with regard to', 'None of these', 3),
(82, 6, 'Building has been built _____ the new plan.', '1', 'accordance to', 'in accordance with', 'for', 'about', 2),
(83, 6, 'He crossed the broken bridge ____ warning.', '1', 'in spite of', 'in spite off', 'on', 'about', 1),
(84, 6, 'The train ____ as fast as the bus.', '1', 'went', 'running', 'moves', 'going', 3),
(85, 6, 'He was seen _____ to the school.', '1', 'went', 'going', 'gone', 'go', 2),
(86, 6, 'She ____ in the sun for 1 hour.', '1', 'sitting', 'has been sitting', 'has been sit', 'has sit', 2),
(87, 6, '____ it help you in your studies ?', '1', 'will', 'was', 'is', 'are', 1),
(88, 6, 'I ____ never seen such a picture before.', '1', 'did', 'was', 'have', 'has', 3),
(89, 6, 'Words of same sound is ?', '1', 'Soundnyms', 'Antonyms', 'Homonyms', 'None of these', 3),
(90, 6, 'Sounding the same but spelt differently ?', '1', 'Symphonious', 'Homophonous', 'Synonyms', 'Saminymous', 2),
(91, 6, 'Choose the correct answer ?', '1', 'My friend has got a new job.', 'My friend has got a new work.', 'My friend is got a new job.', 'My friend did got a new job.', 1),
(92, 6, 'Choose the correct sentence.', '1', 'Do you like a glass of water ?', 'Would you like a glass of water ?', 'Would you like the glass of water ?', 'Do you like the glass of water ?', 2),
(93, 6, 'Antonym of Ad-lib ?', '1', 'Improvise', 'Extemporized', 'Deliberate', 'Spontaneous', 3),
(94, 6, 'Antonym of Imperil ?', '1', 'Safeguard', 'Endanger', 'Hazard', 'Jeopardise', 1),
(95, 6, 'Antonym of Inscrutable ?', '1', 'Baffling', 'Obvious', 'Confuse', 'Reduce', 2),
(96, 6, 'Antonym of Licentious ?', '1', 'Continent', 'Confused talk', 'Clear', 'Close', 1),
(97, 6, 'Meaning of \"Chicken Feed\".', '1', 'A very small money', 'A huge money', 'Food for thought', 'None of these', 1),
(98, 6, 'Meaning of \"Cost an Arm and a Leg\"', '1', 'War hero', 'Very expensive', 'Scene in battle field', 'Very cheap', 2),
(99, 6, 'Synonym of Exhort', '1', 'Weak Plea', 'Beg', 'To urge strongly', 'Borrow', 3),
(100, 6, 'Synonym of Abjure?', '1', 'To give', 'To take back', 'Happy', 'Sorry', 2),
(101, 6, 'Synonym of Abrogate', '1', 'Create', 'Run', 'Fascinate', 'Abolish', 4),
(102, 6, 'Unfortunately, he_______ a lot of money to the bank.', '1', 'Borrowed', 'Owed', 'Deposited', 'Lent', 2),
(103, 6, 'I ______ the apartment all day yesterday.', '1', 'Clear', 'Washed out', 'Cleaned Up', 'None of these', 3),
(104, 6, 'Choose the word spelt correctly.', '1', 'Maxculine', 'Massculine', 'Masculine', 'Macsculine', 3),
(105, 6, 'Choose the word spelt correctly.', '1', 'Begining', 'Beginning', 'Beignning', 'Begininng', 2),
(106, 6, 'I was delighted _____ her answer.', '1', 'On', 'At', 'For', 'In', 2),
(107, 6, 'I have no doubt _____ it.', '1', 'At', 'On', 'Upon', 'About', 4),
(108, 6, 'I assure you _____ your safety.', '1', 'Off', 'Of', 'From', 'With', 2),
(109, 6, 'He competed ______ me for the prize.', '1', 'with', 'off', 'to', 'of', 1),
(110, 6, 'He is ___ difficulties.', '1', 'in', 'on', 'from', 'with', 1),
(111, 6, 'He is true ______ his words.', '1', 'with', 'on', 'to', 'for', 3),
(112, 6, 'The fan is ______ my head.', '1', 'on', 'to', 'with', 'above', 4),
(113, 6, 'You can see the house _____ the trees.', '1', 'to', 'on', 'with', 'among', 4),
(114, 6, 'Do you want to speak _____ me?', '1', 'with', 'to', 'above', 'over', 2),
(115, 6, 'I have not _______ from him so far.', '1', 'hear', 'seen', 'heard', 'listen', 3),
(116, 6, 'We _____ there three days ago.', '1', 'went', 'will go', 'gone', 'go', 1),
(117, 6, '________ he really a thief?', '1', 'are', 'is or was', 'were', 'none of these', 2),
(118, 6, 'They ____ very happy seeing you here.', '1', 'shall', 'will', 'will be', 'were be', 3),
(119, 6, 'We _________ there if you ______ us the address at the right time.', '1', 'Would have reached; tell', 'Would have reached; had told', 'Should reach; had told', 'Have reached; will tell', 2),
(120, 6, 'Old Woman = ', '1', 'Matron', 'Patron', 'Synonym', 'None of these', 1),
(121, 6, 'Choose the correct sentence.', '1', 'The police is coming', 'The police coming', 'The police are coming', 'The police is come', 3),
(122, 6, 'Choose the correct sentence.', '1', 'The house is not enough big', 'The house are not big enough', 'The house are not enough big', 'The house is not big enough', 4),
(123, 4, 'What does HTML stand for?', '1', 'Hyper Text Markup Language', 'Hyperlinks and Text Markup Language', 'Home Tool Markup Language', 'Hyper Text Markdown Language', 1),
(124, 4, 'What is the correct HTML element for inserting a line break?', '1', '&ltbreak&gt', '&ltbr&gt', '&ltlb&gt', '&ltlinebreak&gt', 2),
(125, 4, 'What is the correct HTML element for the largest heading?', '1', '&lth1&gt', '&ltheading&gt', '&lthead&gt', '&lth6&gt', 1),
(126, 4, 'Which HTML element is used to specify a hyperlink?', '1', '&lthref&gt', '&ltlink&gt', '&lta&gt', '&lturl&gt', 3),
(127, 4, 'Which CSS property is used to change the text color of an element?', '1', 'color', 'text-color', 'font-color', 'text-style', 1),
(128, 4, 'Which CSS property is used to add a background color to an element?', '1', 'color', 'background-color', 'background-style', 'bg-color', 2),
(129, 4, 'Which JavaScript keyword is used to declare a variable?', '1', 'int', 'variable', 'var', 'let', 3),
(130, 4, 'What is the correct syntax for referring to an external script called \"script.js\"?', '1', '<script include=\"script.js\">', '<script href=\"script.js\">', '<script name=\"script.js\">', '<script src=\"script.js\">', 4),
(131, 4, 'Which HTML attribute is used to define inline styles?', '1', 'style', 'class', 'id', 'css', 1),
(132, 4, 'What is the purpose of the CSS box-sizing property?', '1', 'To specify the font family of an element', 'To set the width and height of an element', 'To define the layout of an element', 'To include padding and border in the total width and height of an element', 4),
(133, 4, 'Which method is used to send an HTTP request in JavaScript?', '1', 'HTTPSend', 'GETRequest', 'XMLHttpRequest', 'HTTPRequest', 3),
(134, 4, 'Which HTML element is used to define an unordered list?', '1', '&ltlist&gt', '&ltul&gt', '&ltol&gt', '&ltunordered&gt', 2),
(135, 4, 'Which CSS selector selects elements with a specific class?', '1', '.class', '#class', '*class', '!class', 1),
(136, 4, 'Which JavaScript method is used to add an element to the end of an array?', '1', 'insert()', 'add()', 'append()', 'push()', 4),
(137, 4, 'What is the purpose of the <head> element in HTML?', '1', 'To create a section within the document', 'To define the main content of the document', 'To contain metadata and specify document information', 'To define a header for the document', 3),
(138, 4, 'Which CSS property is used to control the spacing between lines of text?', '1', 'text-spacing', 'line-height', 'line-spacing', 'letter-spacing', 2),
(139, 4, 'What is the purpose of the alt attribute in an HTML image tag?', '1', 'To provide alternative text for users who cannot see the image', 'To define the source URL of the image', 'To set the alignment of the image', 'To specify the width and height of the image', 1),
(140, 4, 'Which method is used to remove the last element from an array in JavaScript?', '1', 'splice()', 'remove()', 'delete()', 'pop()', 4),
(141, 4, 'What is the correct way to write a JavaScript comment?', '1', '/* This is a comment */', '<!-- This is a comment -->', '// This is a comment', '# This is a comment', 3),
(142, 4, 'Which HTML element is used to define a table row?', '1', '&lttable-row&gt', '&lttr&gt', '&ltrow&gt', '&lttablerow&gt', 2);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `quiz_id` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`quiz_id`, `subject_name`) VALUES
(1, 'DBMS'),
(2, 'ComputerNetwork'),
(3, 'Fundamental'),
(4, 'WebTechnology'),
(5, 'Math'),
(6, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_attempt`
--

CREATE TABLE `quiz_attempt` (
  `attempt_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `attempted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_attempt`
--

INSERT INTO `quiz_attempt` (`attempt_id`, `user_id`, `quiz_id`, `score`, `attempted_at`) VALUES
(33, 1, 1, 4, '2023-06-06 15:37:12'),
(34, 1, 1, 5, '2023-06-06 15:53:16'),
(35, 1, 1, 4, '2023-06-06 16:29:48'),
(36, 1, 1, 1, '2023-06-06 16:31:54'),
(37, 1, 1, 3, '2023-06-06 16:32:36'),
(38, 1, 1, 4, '2023-06-06 16:35:18'),
(39, 1, 1, 1, '2023-06-06 16:36:51'),
(40, 1, 2, 2, '2023-06-06 16:37:10'),
(41, 1, 2, 0, '2023-06-06 16:47:05'),
(42, 1, 1, 4, '2023-06-06 17:49:26'),
(43, 1, 1, 1, '2023-06-06 17:57:30'),
(44, 1, 6, 1, '2023-06-06 18:27:17'),
(45, 1, 6, 3, '2023-06-06 18:49:27'),
(47, 1, 4, 1, '2023-06-06 19:14:12'),
(48, 1, 4, 4, '2023-06-06 19:24:06'),
(50, 1, 1, 0, '2023-06-06 19:31:04'),
(51, 35, 2, 4, '2023-06-06 20:46:08'),
(52, 35, 2, 4, '2023-06-06 20:49:03'),
(53, 35, 1, 0, '2023-06-06 20:53:51'),
(54, 35, 1, 4, '2023-06-07 08:09:23'),
(55, NULL, NULL, 0, '2023-06-07 08:11:11'),
(56, 35, 1, 5, '2023-06-07 08:12:22'),
(57, NULL, NULL, 0, '2023-06-07 08:12:32'),
(58, 35, 2, 0, '2023-06-07 08:15:08'),
(59, 35, 4, 5, '2023-06-07 08:33:52'),
(60, 35, 4, 3, '2023-06-07 08:45:53'),
(61, 35, 1, 4, '2023-06-07 14:32:31'),
(62, 35, 2, 0, '2023-06-07 14:39:36'),
(63, 2, 6, 4, '2023-06-07 15:02:10'),
(64, 2, 2, 5, '2023-06-07 15:06:35'),
(65, NULL, NULL, 0, '2023-06-07 18:31:57'),
(66, 2, 1, 5, '2023-06-07 20:51:17'),
(67, 2, 2, 3, '2023-06-07 20:53:28'),
(68, 2, 1, 0, '2023-06-07 21:21:15'),
(69, 11, 6, 5, '2023-06-07 22:06:41'),
(70, 36, 1, 5, '2023-06-07 22:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(60) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `email`, `password`, `gender`, `created_at`) VALUES
(1, 'Basanta Saru', 'sarubasant@gmail.com', '12345', 'male', '2023-06-04 07:24:36'),
(2, 'Janak Pandey', 'janakpandey199@gmail.com', '12345', 'male', '2023-06-04 07:30:48'),
(11, 'Monika Midhun', 'monika@gmail.com', '12345', 'female', '2023-06-04 08:08:14'),
(34, 'john doe', 'johndoe@lcc.com', '12345', 'male', '2023-06-04 12:24:38'),
(35, 'Puja Lama', 'pujalama@gmail.com', '11111', 'female', '2023-06-04 12:27:09'),
(36, 'Binod Pandey', 'pandeybinod@gmail.com', '12345', 'male', '2023-06-04 12:33:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_attempt`
--
ALTER TABLE `quiz_attempt`
  ADD PRIMARY KEY (`attempt_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `quiz_id` (`quiz_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quiz_attempt`
--
ALTER TABLE `quiz_attempt`
  MODIFY `attempt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`);

--
-- Constraints for table `quiz_attempt`
--
ALTER TABLE `quiz_attempt`
  ADD CONSTRAINT `quiz_attempt_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `quiz_attempt_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
