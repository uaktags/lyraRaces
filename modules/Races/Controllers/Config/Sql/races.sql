--
-- Table structure for table `lyra_races`
--

CREATE TABLE `<pre>races` (
  `race_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  PRIMARY KEY (`race_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lyra_races`
--

INSERT INTO `<pre>races` (`race_id`, `title`) VALUES
(1, 'Human'),
(2, 'Undead'),
(3, 'Orc'),
(4, 'Elf');
