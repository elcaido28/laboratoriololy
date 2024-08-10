

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_ingreso` date NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `nombres` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `cedula` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `id_rol` (`id_rol`),
  KEY `id_perfil` (`id_perfil`),
  KEY `id_estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO empleado VALUES("1","2020-03-08","2020-03-09","Admin","Admin","0000000000","000000","0000000000","admin@admin.com","direccion admin","1","1","1");
INSERT INTO empleado VALUES("10","2020-03-09","2020-03-09","José","Pérez","0919191923","2123123","0123123123","jperez@gmail.com","direccion","2","0","1");
INSERT INTO empleado VALUES("11","2020-03-10","2020-03-10","nombre prueba","apellido prueba","0993939393","2502729","0939393993","prueba@correo.com","direccion prueba","2","2","2");





CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(100) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO estado VALUES("1","Activo");
INSERT INTO estado VALUES("2","Inactivo");





CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_perfil` varchar(250) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO perfil VALUES("1","Administrador");
INSERT INTO perfil VALUES("2","Empleado");
INSERT INTO perfil VALUES("5","perfil prueba");





CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(250) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO rol VALUES("1","Administrador");
INSERT INTO rol VALUES("2","Doctor");





CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(250) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_empleado` (`id_empleado`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO usuario VALUES("1","admin","admin","1");
INSERT INTO usuario VALUES("2","admin","123","10");



