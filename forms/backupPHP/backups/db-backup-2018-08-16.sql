

CREATE TABLE `tablas` (
  `id_camp` int(11) NOT NULL AUTO_INCREMENT,
  `dscrp` varchar(34) NOT NULL,
  PRIMARY KEY (`id_camp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `table1` (
  `id_camp1` int(11) NOT NULL AUTO_INCREMENT,
  `campo2` varchar(20) NOT NULL,
  `campo3` varchar(20) NOT NULL,
  PRIMARY KEY (`id_camp1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `tabletas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ta` varchar(44) NOT NULL,
  `ta1` varchar(44) NOT NULL,
  `ta2` varchar(44) NOT NULL,
  `ta3` varchar(44) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `urf` (
  `idr` int(11) NOT NULL AUTO_INCREMENT,
  `hf` int(11) NOT NULL,
  PRIMARY KEY (`idr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




