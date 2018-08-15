
ALTER TABLE `voyage_mst_activity` ADD `id_voyage_activity_group` INT NOT NULL AFTER `category`;
ALTER TABLE `voyage_mst_activity` ADD INDEX( `id_voyage_activity_group`);

CREATE TABLE IF NOT EXISTS `schedule_actual` (
  `id_schedule_actual` bigint(20) NOT NULL,
  `VesselTugId` int(11) NOT NULL,
  `VesselBargeId` int(11) DEFAULT NULL,
  `id_voyage_activity_group` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `schedule_number` int(11) DEFAULT NULL,
  `sch_month` int(2) NOT NULL,
  `sch_year` int(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_plan`
--

CREATE TABLE IF NOT EXISTS `schedule_plan` (
  `id_schedule_plan` bigint(20) NOT NULL,
  `VesselTugId` int(11) NOT NULL,
  `VesselBargeId` int(11) DEFAULT NULL,
  `id_voyage_activity_group` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `schedule_number` int(11) DEFAULT NULL,
  `sch_month` int(2) NOT NULL,
  `sch_year` int(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(45) NOT NULL,
  `ip_user_updated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schedule_actual`
--
ALTER TABLE `schedule_actual`
  ADD PRIMARY KEY (`id_schedule_actual`);

--
-- Indexes for table `schedule_plan`
--
ALTER TABLE `schedule_plan`
  ADD PRIMARY KEY (`id_schedule_plan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schedule_actual`
--
ALTER TABLE `schedule_actual`
  MODIFY `id_schedule_actual` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schedule_plan`
--
ALTER TABLE `schedule_plan`
  MODIFY `id_schedule_plan` bigint(20) NOT NULL AUTO_INCREMENT;
  


  
  

CREATE TABLE IF NOT EXISTS `voyage_mst_activity_group` (
  `id_voyage_activity_group` int(11) NOT NULL,
  `voyage_activity_group_short` varchar(64) NOT NULL,
  `voyage_activity_group` varchar(20) NOT NULL,
  `voyage_activity_group_desc` varchar(200) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voyage_mst_activity_group`
--

INSERT INTO `voyage_mst_activity_group` (`id_voyage_activity_group`, `voyage_activity_group_short`, `voyage_activity_group`, `voyage_activity_group_desc`, `color`) VALUES
(1, 'Wd', 'Waiting Discharge', '', '#0000ff'),
(2, 'Wl', 'Waiting Loading', '', '#0000cc'),
(3, 'Sb', 'Sailing Ballast', '', '#000034'),
(4, 'Dc', 'Discharge', '', '#00ff00'),
(5, 'UN', 'Unavailable', '', '#ff0000'),
(6, 'L', 'Loading', '', '#00ff33'),
(7, 'SB', 'Sailing Ballast', '', '#00ff66'),
(8, 'SL', 'Sailing Loaded', '', '#00ff99'),
(9, 'Uz', 'Unutilized', '', '#ff0033'),
(10, 'Wb', 'Waiting Bunker', '', '#f7f7f7'),
(11, 'W', 'Waiting', '', '#d3d3d3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `voyage_mst_activity_group`
--
ALTER TABLE `voyage_mst_activity_group`
  ADD PRIMARY KEY (`id_voyage_activity_group`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `voyage_mst_activity_group`
--
ALTER TABLE `voyage_mst_activity_group`
  MODIFY `id_voyage_activity_group` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;