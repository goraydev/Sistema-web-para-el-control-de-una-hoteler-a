DROP TABLE IF EXISTS caja;

CREATE TABLE `caja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_apertura` datetime DEFAULT NULL,
  `fecha_cierre` datetime DEFAULT NULL,
  `monto_apertura` double DEFAULT NULL,
  `monto_cierre` double DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS categoria;

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO categoria VALUES("1","Personal","conference.jpg","2018-02-15 09:14:21"),
("2","Matrimonial","","2018-02-15 10:42:56"),
("3","Doble","","2018-02-18 00:27:43"),
("4","Junior Suite","","2018-02-18 00:28:00"),
("5","Triple","","2018-03-03 11:59:35"),
("6","Suite","","2018-07-05 09:54:36");



DROP TABLE IF EXISTS contacto;

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(12) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS gasto;

CREATE TABLE `gasto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `id_caja` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS habitacion;

CREATE TABLE `habitacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `capacidad` int(11) NOT NULL DEFAULT '1',
  `fecha_creada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO habitacion VALUES("1","101","Con cama de 2 plazas, una TV, Cable, BaÃ±o personal, Ducha caliente","180","2","1","2","2018-02-15 12:20:48"),
("2","102","Con cama de 1 plaza, una TV, Cable, BaÃ±o personal, Ducha caliente","100","1","1","1","2018-06-25 22:23:43"),
("3","103","Con cama de 1 plaza, una TV, Cable, BaÃ±o personal, Ducha caliente","120","3","1","1","2018-06-25 22:34:56"),
("4","104","Con cama de 2 plazas, una TV, Cable, BaÃ±o personal, Ducha caliente","90","2","1","1","2018-06-25 22:36:08"),
("5","105","Con cama doble plaza, internet, baÃ±o privado , tv 42 ","80","1","1","1","2018-06-25 22:36:21"),
("6","106","Con cama de 2 plazas, una TV, Cable, BaÃ±o personal, Ducha caliente","160","4","1","1","2018-06-25 22:36:36"),
("7","107","Con cama de 1 plaza, una TV, Cable, BaÃ±o personal, Ducha caliente","80","1","1","1","2018-06-25 22:36:49"),
("8","108","Con cama de 1 plaza, una TV, Cable, BaÃ±o personal, Ducha caliente","100","3","1","1","2018-06-25 22:37:01"),
("9","109","Con cama de 2 plazas, una TV, Cable, BaÃ±o personal, Ducha caliente","110","2","1","1","2018-06-25 22:37:13"),
("10","201","Con cama de 1 plaza, una TV, Cable, BaÃ±o personal, Ducha caliente","130","1","1","1","2018-06-25 22:37:28"),
("11","202","Con cama de 3 plazas, una TV, Cable, BaÃ±o personal, Ducha caliente","210","5","1","1","2018-06-25 22:37:42"),
("12","203","Con cama de 1 plaza, una TV, Cable, BaÃ±o personal, Ducha caliente","100","1","1","1","2018-06-25 22:38:16"),
("13","204","Con cama de 1 plaza, una TV, Cable, BaÃ±o personal, Ducha caliente","130","3","1","1","2018-06-25 22:38:29");



DROP TABLE IF EXISTS persona;

CREATE TABLE `persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_documento` int(11) DEFAULT NULL,
  `documento` varchar(12) DEFAULT NULL,
  `giro` varchar(255) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `razon_social` varchar(150) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL,
  `tipo` int(11) DEFAULT '1',
  `vip` int(11) NOT NULL DEFAULT '0',
  `contador` int(11) NOT NULL DEFAULT '0',
  `limite` int(11) NOT NULL DEFAULT '7',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO persona VALUES("1","2","71895719","NULL","Nelson Ychpas Sullca","2016-11-15","NULL","Jr Lobato NRO 230","2018-02-15 14:15:23","1","0","0","7"),
("2","1","10204918","","Mauricio Ramos Quines","0000-00-00","Los Portales","NULL","2018-02-15 21:34:48","1","0","0","7"),
("6","2","8090809091","","Juan jimenez Menendez","2016-02-19","","Jr Lobato NRO 230","2018-02-22 14:13:02","1","0","0","7"),
("7","1","7547667377","","Huesped de prueba","","","Calle real nÂº 2345","2018-03-03 12:08:35","1","0","0","7");



DROP TABLE IF EXISTS proceso;

CREATE TABLE `proceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_habitacion` int(11) DEFAULT NULL,
  `id_tarifa` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `precio` double NOT NULL DEFAULT '0',
  `cant_noche` float NOT NULL DEFAULT '1',
  `dinero_dejado` double NOT NULL DEFAULT '0',
  `id_tipo_pago` int(11) DEFAULT NULL,
  `fecha_entrada` datetime DEFAULT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `total` double NOT NULL DEFAULT '0',
  `id_usuario` int(11) DEFAULT NULL,
  `cant_personas` double DEFAULT NULL,
  `id_caja` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `fecha_creada` datetime DEFAULT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `observacion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS proceso_sueldo;

CREATE TABLE `proceso_sueldo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sueldo` int(11) DEFAULT NULL,
  `monto` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `tipo` int(11) NOT NULL DEFAULT '1',
  `id_caja` int(11) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS proceso_venta;

CREATE TABLE `proceso_venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) DEFAULT NULL,
  `id_operacion` int(11) DEFAULT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `tipo_operacion` int(11) NOT NULL DEFAULT '1',
  `fecha_creada` datetime DEFAULT NULL,
  `id_caja` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS producto;

CREATE TABLE `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `presentacion` varchar(255) DEFAULT NULL,
  `precio_compra` double DEFAULT NULL,
  `precio_venta` double DEFAULT NULL,
  `stock` double NOT NULL DEFAULT '0',
  `id_proveedor` int(11) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO producto VALUES("1","PRO-0001","Vino Especial","Especial","NULL","NULL","0","25","10","0","2018-02-16 12:02:49"),
("3","PRO-0003","Gaseosa Inka Kola","Inka Kola","Personal medio litro","","0","3","10","0","2018-02-16 20:59:18"),
("4","PRO-0004","Gaseosa Coca Cola","Coca Cola","Mediano de 1 litro","","5","6","10","0","2018-02-16 21:00:04"),
("7","PRO-0007","Galleta Ritz","Soda","NULL","","0","1","20","0","2018-02-16 21:01:34"),
("11","PRO-0011","Shampoo H&S","H&S","Sachets","","0","2","0","0","2018-02-16 21:05:24"),
("13","PRO-0013","Galleta","NULL","NULL","NULL","0","12","0","0","2018-07-25 11:28:15"),
("14","PRO-0014","Gaseosa Inka Kola ","Inka Kola","litro","Botella","5.5","6","10","0","2018-08-17 12:53:12");



DROP TABLE IF EXISTS reservations;

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `documento` varchar(12) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `paid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS rooms;

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` text,
  `capacity` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS sueldo;

CREATE TABLE `sueldo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `dia_pago` int(11) NOT NULL DEFAULT '1',
  `fecha_comienzo` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS tarifa;

CREATE TABLE `tarifa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tarifa VALUES("1","24 Horas"),
("2","Por Horas"),
("3","Feriados");



DROP TABLE IF EXISTS tarifa_habitacion;

CREATE TABLE `tarifa_habitacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tarifa` int(11) DEFAULT NULL,
  `id_habitacion` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO tarifa_habitacion VALUES("2","1","1","100"),
("3","2","1","40"),
("4","1","2","120"),
("5","1","3","120"),
("6","1","4","160"),
("7","3","4","200"),
("8","1","5","140"),
("9","2","5","50"),
("10","1","10","180"),
("11","2","10","30");



DROP TABLE IF EXISTS tipo_comprobante;

CREATE TABLE `tipo_comprobante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tipo_comprobante VALUES("1","TICKET","1"),
("2","BOLETA","1"),
("3","FACTURA","1");



DROP TABLE IF EXISTS tipo_documento;

CREATE TABLE `tipo_documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tipo_documento VALUES("1","DNI","2018-02-15 08:23:24"),
("2","PASAPORTE","2018-02-15 09:24:24"),
("3","RUC","2018-02-15 09:24:25");



DROP TABLE IF EXISTS tipo_pago;

CREATE TABLE `tipo_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tipo_pago VALUES("1","EFECTIVO","2018-02-15 09:25:24"),
("2","CRÉDITO","2018-02-15 09:25:24");



DROP TABLE IF EXISTS tmp;

CREATE TABLE `tmp` (
  `id_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad_tmp` int(11) DEFAULT NULL,
  `precio_tmp` double DEFAULT NULL,
  `sessionn_id` varchar(255) DEFAULT NULL,
  `tipo_operacion` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_tmp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS user;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `pago` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("1","Administrador","admin","admin","admin@gmail.com","e3f83ed23d18a34fc770626571753fabf1c54b5e","","1","1","2016-12-13 09:08:03","1"),
("2","nleson","ychpas","ynelson","nelson","c30b550285ef9aeafa4994903557e073b6f4cebb","","1","0","2016-12-28 16:07:20","1"),
("3","Counter","1","counter1","counter1@gmail.com","2896dce59cd9f09a23e83217bfbb9b3d2d9fa35d","","1","0","2018-02-19 05:23:44","1"),
("4","usuario","de prueba","prueba","prueba@gmail.com","ab0ef57f283c0839c6352e673ecef0977e3176a0","","1","1","2018-08-08 17:30:16","0");



DROP TABLE IF EXISTS venta;

CREATE TABLE `venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_comprobante` int(11) DEFAULT NULL,
  `nro_comprobante` varchar(25) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_tipo_pago` int(11) DEFAULT NULL,
  `tipo_operacion` int(11) NOT NULL DEFAULT '1',
  `total` double DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_caja` int(11) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




