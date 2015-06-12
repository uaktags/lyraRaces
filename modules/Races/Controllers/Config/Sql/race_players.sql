--
-- Table structure for table `lyra_race_attributes`
--

CREATE TABLE `<pre>race_players` (
  `race_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  KEY `race_id` (`race_id`,`player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lyra_race_attributes`
--

INSERT INTO `<pre>race_players` (`race_id`, `player_id`) VALUES
(1, 1),
(1, 3),
(1, 4);