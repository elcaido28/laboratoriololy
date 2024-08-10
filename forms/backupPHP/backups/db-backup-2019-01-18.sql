

CREATE TABLE `cargo` (
  `crg_id` int(11) NOT NULL AUTO_INCREMENT,
  `crg_dscrp` varchar(200) NOT NULL,
  PRIMARY KEY (`crg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO cargo VALUES("1","Gerente");
INSERT INTO cargo VALUES("2","Contador");
INSERT INTO cargo VALUES("3","Secretaria");





CREATE TABLE `empleados` (
  `epl_id` int(11) NOT NULL AUTO_INCREMENT,
  `epl_nombres` varchar(250) NOT NULL,
  `epl_apellidos` varchar(250) NOT NULL,
  `epl_cedula` varchar(15) NOT NULL,
  `epl_edad` int(2) NOT NULL,
  `epl_correo` varchar(200) NOT NULL,
  `epl_telefono` varchar(15) NOT NULL,
  `epl_feching` date NOT NULL,
  `epl_direccion` varchar(350) NOT NULL,
  `crg_id` int(11) NOT NULL,
  `est_id` int(11) NOT NULL,
  PRIMARY KEY (`epl_id`),
  KEY `crg_id` (`crg_id`),
  KEY `est_id` (`est_id`),
  CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`crg_id`) REFERENCES `cargo` (`crg_id`),
  CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`est_id`) REFERENCES `estado` (`est_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO empleados VALUES("1","Alexis E.","Sánchez S.","0999282271","30","falso@gmail.com","0992837821","2019-01-18","Los Esteros Villa 14","1","1");
INSERT INTO empleados VALUES("2","Eveling Estephania","Miranda Salazar","0988873452","27","emiranda@gmail.com","0911222621","2019-01-18","Guasmo Sur","3","1");





CREATE TABLE `estado` (
  `est_id` int(11) NOT NULL AUTO_INCREMENT,
  `est_dscrp` varchar(150) NOT NULL,
  PRIMARY KEY (`est_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO estado VALUES("1","Activo");
INSERT INTO estado VALUES("2","Inactivo");





CREATE TABLE `tipo_perfil` (
  `tp_id` int(11) NOT NULL AUTO_INCREMENT,
  `tp_dscrp` varchar(200) NOT NULL,
  PRIMARY KEY (`tp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tipo_perfil VALUES("1","Administrador");
INSERT INTO tipo_perfil VALUES("2","Gerente");
INSERT INTO tipo_perfil VALUES("3","Usuario");





CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_usuario` varchar(30) NOT NULL,
  `usu_clave` varchar(30) NOT NULL,
  `epl_id` int(11) NOT NULL,
  `tp_id` int(11) NOT NULL,
  PRIMARY KEY (`usu_id`),
  KEY `epl_id` (`epl_id`,`tp_id`),
  KEY `tp_id` (`tp_id`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`epl_id`) REFERENCES `empleados` (`epl_id`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`tp_id`) REFERENCES `tipo_perfil` (`tp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO usuarios VALUES("1","admin","123","1","1");



