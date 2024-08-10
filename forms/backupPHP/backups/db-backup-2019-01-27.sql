

CREATE TABLE `cargo` (
  `crg_id` int(11) NOT NULL AUTO_INCREMENT,
  `crg_dscrp` varchar(200) NOT NULL,
  PRIMARY KEY (`crg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO cargo VALUES("1","Gerente");
INSERT INTO cargo VALUES("2","Contador");
INSERT INTO cargo VALUES("3","Secretaria");
INSERT INTO cargo VALUES("4","Conductor");





CREATE TABLE `clientes` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_feching` date NOT NULL,
  `cl_nombres` varchar(250) NOT NULL,
  `cl_apellidos` varchar(250) NOT NULL,
  `cl_cedula` varchar(15) NOT NULL,
  `cl_fecha_nacimiento` date NOT NULL,
  `cl_edad` int(2) NOT NULL,
  `cl_telefono` varchar(15) NOT NULL,
  `cl_correo` varchar(100) NOT NULL,
  `cl_direccion` varchar(300) NOT NULL,
  `epl_id` int(11) NOT NULL,
  `est_id` int(11) NOT NULL,
  PRIMARY KEY (`cl_id`),
  KEY `est__id` (`est_id`),
  KEY `epl_id` (`epl_id`),
  CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`est_id`) REFERENCES `estado` (`est_id`),
  CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`epl_id`) REFERENCES `empleados` (`epl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO clientes VALUES("1","2019-01-20","Nombre 1","Apellido 1","0929292992","2019-01-01","33","0911222621","cliente1@hotmail.com","Direccion del cliente 1","2","1");
INSERT INTO clientes VALUES("2","2019-01-20","Nombre 2","Apellido 2","0928772651","2012-03-21","19","0929292828","cliente2@hotmail.com","Direccion del cliente 2","2","2");
INSERT INTO clientes VALUES("3","2019-01-27","Nombre 5","Apellido 5","0929292822","2019-01-23","34","0928222262","aasd@adasd.com","asdasdasdoas","1","1");
INSERT INTO clientes VALUES("4","2019-01-27","Cliente 3","Apellido 3","0929292822","2019-01-23","34","0928222262","cliente3@adasd.com","direccion del cliente 3","1","1");
INSERT INTO clientes VALUES("5","2019-01-27","Cliente 4","Apellido 4","0929292822","2019-01-23","45","0928222262","cliente4@adasd.com","asdasdasdoas","1","1");





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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO empleados VALUES("1","Alexis E.","Sánchez S.","0999282271","30","falso@gmail.com","0992837821","2019-01-27","Los Esteros Villa 14","1","1");
INSERT INTO empleados VALUES("2","Eveling Estephania","Miranda Salazar","0988873452","27","emiranda@gmail.com","0911222621","2019-01-18","Guasmo Sur","3","1");
INSERT INTO empleados VALUES("3","Jose Alejandro","Almendariz Bohorquez","0929299282","38","jalmendariz@gmail.com","0929292828","2019-01-19","Los Esteros Sl.45","1","2");





CREATE TABLE `estado` (
  `est_id` int(11) NOT NULL AUTO_INCREMENT,
  `est_dscrp` varchar(150) NOT NULL,
  PRIMARY KEY (`est_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO estado VALUES("1","Activo");
INSERT INTO estado VALUES("2","Inactivo");





CREATE TABLE `proveedores` (
  `prov_id` int(11) NOT NULL AUTO_INCREMENT,
  `prov_nombre` varchar(250) NOT NULL,
  `prov_pais` varchar(150) NOT NULL,
  `prov_ciudad` varchar(150) NOT NULL,
  `prov_ruc` varchar(20) NOT NULL,
  `prov_matriz` varchar(150) NOT NULL,
  `prov_sucursal` varchar(150) NOT NULL,
  `prov_actividades` varchar(150) NOT NULL,
  `prov_telefono` varchar(15) NOT NULL,
  `prov_correo` varchar(150) NOT NULL,
  `prov_fax` varchar(150) NOT NULL,
  `prov_direccion` varchar(300) NOT NULL,
  `prov_fechai` date NOT NULL,
  `epl_id` int(11) NOT NULL,
  `est_id` int(11) NOT NULL,
  PRIMARY KEY (`prov_id`),
  KEY `epl_id` (`epl_id`),
  KEY `est_id` (`est_id`),
  CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`epl_id`) REFERENCES `empleados` (`epl_id`),
  CONSTRAINT `proveedores_ibfk_2` FOREIGN KEY (`est_id`) REFERENCES `estado` (`est_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO proveedores VALUES("1","Proveedor 1","Pais 1","Ciudad 1","Ruc 1","Matriz 1","Sucursal 1","Actividad 1","0999999991","correo1@hotmail.com","1100","direccion 1","2019-01-20","2","1");
INSERT INTO proveedores VALUES("2","Proveedor 2","Pais 2","Ciudad 2","Ruc 2","Matriz 2","Sucursal 2","Actividad 2","2222222222","correo2@hotmail.com","2233","direccion 2","2019-01-20","2","1");





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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO usuarios VALUES("1","admin","123","1","1");
INSERT INTO usuarios VALUES("2","eve","123","2","3");



