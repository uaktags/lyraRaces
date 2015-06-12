--
-- Table structure for table `lyra_race_attributes`
--

CREATE TABLE `<pre>race_attributes` (
  `race_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lyra_race_attributes`
--

INSERT INTO `<pre>race_attributes` (`race_id`, `attribute_id`, `value`) VALUES
(1, 1, '10'),
(1, 2, '10'),
(1, 3, '5'),
(1, 4, '5'),
(1, 5, '10'),
(2, 1, '10'),
(2, 2, '10'),
(2, 3, '20'),
(2, 4, '0'),
(2, 5, '0'),
(3, 1, '10'),
(3, 2, '5'),
(3, 3, '0'),
(3, 4, '5'),
(3, 5, '20'),
(4, 1, '5'),
(4, 2, '5'),
(4, 3, '10'),
(4, 4, '10'),
(4, 5, '10');