/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : yonke

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-08-13 12:21:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `almacen`
-- ----------------------------
DROP TABLE IF EXISTS `almacen`;
CREATE TABLE `almacen` (
  `ALM_ID` int(10) NOT NULL AUTO_INCREMENT,
  `ALM_NOMBRE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ALM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of almacen
-- ----------------------------
INSERT INTO `almacen` VALUES ('15', 'Almacen 1');
INSERT INTO `almacen` VALUES ('16', 'Almacen 2');
INSERT INTO `almacen` VALUES ('17', 'ALMACEN3');

-- ----------------------------
-- Table structure for `automoviles`
-- ----------------------------
DROP TABLE IF EXISTS `automoviles`;
CREATE TABLE `automoviles` (
  `AUT_ID` int(50) NOT NULL AUTO_INCREMENT,
  `AUT_MARCA` varchar(255) NOT NULL,
  `AUT_ANO` int(4) NOT NULL,
  `AUT_COLOR` varchar(6) NOT NULL,
  `AUT_YONKE` tinyint(1) NOT NULL,
  `AUT_MODELO` varchar(255) NOT NULL,
  `AUT_FECHA_AG` date DEFAULT NULL,
  `AUT_FOTO` varchar(255) DEFAULT NULL,
  `AUT_FOTO2` varchar(255) DEFAULT NULL,
  `AUT_FOTO3` varchar(255) DEFAULT NULL,
  `AUT_FOTO4` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`AUT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of automoviles
-- ----------------------------

-- ----------------------------
-- Table structure for `campos`
-- ----------------------------
DROP TABLE IF EXISTS `campos`;
CREATE TABLE `campos` (
  `CAM_ID` int(10) NOT NULL AUTO_INCREMENT,
  `CAM_NUMERO` int(10) DEFAULT NULL,
  PRIMARY KEY (`CAM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of campos
-- ----------------------------
INSERT INTO `campos` VALUES ('1', '1');
INSERT INTO `campos` VALUES ('2', '2');
INSERT INTO `campos` VALUES ('3', '3');
INSERT INTO `campos` VALUES ('4', '4');
INSERT INTO `campos` VALUES ('5', '5');
INSERT INTO `campos` VALUES ('6', '6');
INSERT INTO `campos` VALUES ('7', '7');
INSERT INTO `campos` VALUES ('8', '8');
INSERT INTO `campos` VALUES ('9', '9');
INSERT INTO `campos` VALUES ('10', '10');

-- ----------------------------
-- Table structure for `categorias`
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `CAT_ID` int(50) NOT NULL AUTO_INCREMENT,
  `CAT_NOMBRE` varchar(256) NOT NULL,
  PRIMARY KEY (`CAT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES ('1', 'SUSPENSION');
INSERT INTO `categorias` VALUES ('2', 'MECANICO');
INSERT INTO `categorias` VALUES ('3', 'EXTERIOR');
INSERT INTO `categorias` VALUES ('4', 'INTERIOR');

-- ----------------------------
-- Table structure for `colores`
-- ----------------------------
DROP TABLE IF EXISTS `colores`;
CREATE TABLE `colores` (
  `COL_ID` int(10) NOT NULL AUTO_INCREMENT,
  `COL_NOMBRE` varchar(255) DEFAULT NULL,
  `COL_CODIGO` varchar(4) DEFAULT NULL,
  `COL_ASCII` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`COL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of colores
-- ----------------------------
INSERT INTO `colores` VALUES ('1', 'Negro', 'negr', '000000');
INSERT INTO `colores` VALUES ('2', 'Gris', 'gris', '999999');
INSERT INTO `colores` VALUES ('3', 'Gris Obscuro', 'gobs', '797979');
INSERT INTO `colores` VALUES ('4', 'Gris Claro', 'gcla', '898989');
INSERT INTO `colores` VALUES ('5', 'Blanco', 'blan', 'FFFFFF');
INSERT INTO `colores` VALUES ('6', 'Azul Marino', 'amar', '000079');
INSERT INTO `colores` VALUES ('7', 'Azul', 'Azul', '0000FF');
INSERT INTO `colores` VALUES ('8', 'Celeste', 'Cele', '0de3ff');
INSERT INTO `colores` VALUES ('9', 'Morado', 'mora', '6805eb');
INSERT INTO `colores` VALUES ('10', 'Rosa obscuro', 'roob', 'ad03a2');
INSERT INTO `colores` VALUES ('11', 'violeta', 'viol', 'ff00cc');
INSERT INTO `colores` VALUES ('12', 'rosa', 'rosa', 'fa3ad4');
INSERT INTO `colores` VALUES ('13', 'verde obscuro', 'vero', '39c716');
INSERT INTO `colores` VALUES ('14', 'verde', 'verd', '33ff00');
INSERT INTO `colores` VALUES ('15', 'Amarillo', 'amar', 'ffff00');
INSERT INTO `colores` VALUES ('16', 'Naranja', 'Nara', 'ff7700');
INSERT INTO `colores` VALUES ('17', 'Rojo', 'rojo', 'ff0000');
INSERT INTO `colores` VALUES ('18', 'Cafe', 'cafe', '6b4011');
INSERT INTO `colores` VALUES ('20', 'DORADO', 'dora', 'ffbf00');

-- ----------------------------
-- Table structure for `marcas`
-- ----------------------------
DROP TABLE IF EXISTS `marcas`;
CREATE TABLE `marcas` (
  `MAR_ID` int(10) NOT NULL AUTO_INCREMENT,
  `MAR_NOMBRE` varchar(256) NOT NULL,
  `MAR_CLAVE` varchar(4) NOT NULL,
  PRIMARY KEY (`MAR_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of marcas
-- ----------------------------
INSERT INTO `marcas` VALUES ('9', 'MAKO', 'MAKO');
INSERT INTO `marcas` VALUES ('10', 'ALFA ROMERO', 'ALFA');
INSERT INTO `marcas` VALUES ('11', 'AMERICAN', 'AMER');
INSERT INTO `marcas` VALUES ('12', 'AMG', 'AMG');
INSERT INTO `marcas` VALUES ('13', 'ASSEMBLY', 'ASTO');
INSERT INTO `marcas` VALUES ('14', 'ASUNA', 'ASUN');
INSERT INTO `marcas` VALUES ('15', 'AUDI', 'AUDI');
INSERT INTO `marcas` VALUES ('16', 'AUSTIN', 'AUST');
INSERT INTO `marcas` VALUES ('17', 'AVANTI', 'AVAN');
INSERT INTO `marcas` VALUES ('18', 'BENTLEY', 'BENT');
INSERT INTO `marcas` VALUES ('19', 'BERTONE', 'BERT');
INSERT INTO `marcas` VALUES ('20', 'BIG DOG', 'BIGD');
INSERT INTO `marcas` VALUES ('21', 'BMW', 'BMW');
INSERT INTO `marcas` VALUES ('22', 'BUGATTI', 'BUGA');
INSERT INTO `marcas` VALUES ('23', 'BUICK', 'BUIC');
INSERT INTO `marcas` VALUES ('24', 'CADILLAC', 'CADI');
INSERT INTO `marcas` VALUES ('25', 'CHECKER', 'CHEV');
INSERT INTO `marcas` VALUES ('26', 'CHRYSLER', 'CHRY');
INSERT INTO `marcas` VALUES ('27', 'CITROEN', 'CITR');
INSERT INTO `marcas` VALUES ('28', 'CLASSIC', 'CLAS');
INSERT INTO `marcas` VALUES ('29', 'COACH', 'COAC');
INSERT INTO `marcas` VALUES ('30', 'CROSLEY', 'CROS');
INSERT INTO `marcas` VALUES ('31', 'DAEWOO', 'DAEW');
INSERT INTO `marcas` VALUES ('32', 'DAIHATSU', 'DAIH');
INSERT INTO `marcas` VALUES ('33', 'DELOREAN', 'DELO');
INSERT INTO `marcas` VALUES ('34', 'DESOTO', 'DESO');
INSERT INTO `marcas` VALUES ('35', 'DIAMOND', 'DIAM');
INSERT INTO `marcas` VALUES ('36', 'DODGE', 'DODG');
INSERT INTO `marcas` VALUES ('37', 'DUCATI', 'DUCA');
INSERT INTO `marcas` VALUES ('38', 'EDSEL', 'EDSE');
INSERT INTO `marcas` VALUES ('39', 'EAGLE', 'EAGL');
INSERT INTO `marcas` VALUES ('40', 'ELDORADO', 'ELDO');
INSERT INTO `marcas` VALUES ('41', 'EXCALIBUR', 'EXCA');
INSERT INTO `marcas` VALUES ('42', 'FERRARI', 'FERR');
INSERT INTO `marcas` VALUES ('43', 'FIAT', 'FIAT');
INSERT INTO `marcas` VALUES ('44', 'FORD', 'FORD');
INSERT INTO `marcas` VALUES ('45', 'GEM', 'GEM');
INSERT INTO `marcas` VALUES ('46', 'GEO', 'GEO');
INSERT INTO `marcas` VALUES ('47', 'GM', 'GM');
INSERT INTO `marcas` VALUES ('48', 'GMC', 'GMC');
INSERT INTO `marcas` VALUES ('49', 'HILLMAN', 'HILL');
INSERT INTO `marcas` VALUES ('50', 'HINO', 'HINO');
INSERT INTO `marcas` VALUES ('51', 'HMV', 'HMV');
INSERT INTO `marcas` VALUES ('52', 'HONDA', 'HOND');
INSERT INTO `marcas` VALUES ('53', 'HUDSON', 'HUDS');
INSERT INTO `marcas` VALUES ('54', 'HUMMER', 'HUMM');
INSERT INTO `marcas` VALUES ('55', 'HUSQVARNA', 'HUSQ');
INSERT INTO `marcas` VALUES ('56', 'HYUNDAI', 'HYUN');
INSERT INTO `marcas` VALUES ('57', 'INFINITI', 'INFI');
INSERT INTO `marcas` VALUES ('58', 'INNOCENTI', 'INNO');
INSERT INTO `marcas` VALUES ('59', 'INTERNATIONAL', 'INTE');
INSERT INTO `marcas` VALUES ('60', 'ISUZU', 'ISUZ');
INSERT INTO `marcas` VALUES ('61', 'JAGUAR', 'JAGU');
INSERT INTO `marcas` VALUES ('62', 'JENSEN', 'JENS');
INSERT INTO `marcas` VALUES ('63', 'JEEP', 'JEEP');
INSERT INTO `marcas` VALUES ('64', 'KAWASAKI', 'KAWA');
INSERT INTO `marcas` VALUES ('65', 'KIA', 'KIA');
INSERT INTO `marcas` VALUES ('66', 'KTM', 'KTM');
INSERT INTO `marcas` VALUES ('67', 'LA FORZA', 'LAFO');
INSERT INTO `marcas` VALUES ('68', 'LAMBORGHINI', 'LAMB');
INSERT INTO `marcas` VALUES ('69', 'LANCIA', 'LANC');
INSERT INTO `marcas` VALUES ('70', 'LAND ROVER', 'LAND');
INSERT INTO `marcas` VALUES ('71', 'LEXUS', 'LEXU');
INSERT INTO `marcas` VALUES ('72', 'LEYLAND', 'LEYL');
INSERT INTO `marcas` VALUES ('73', 'LINCONLN', 'LINC');
INSERT INTO `marcas` VALUES ('74', 'LOTUS', 'LOTU');
INSERT INTO `marcas` VALUES ('75', 'MASERATI', 'MASE');
INSERT INTO `marcas` VALUES ('76', 'MAYBACH', 'MAYB');
INSERT INTO `marcas` VALUES ('77', 'MAZDA', 'MAZD');
INSERT INTO `marcas` VALUES ('78', 'MCI', 'MCI');
INSERT INTO `marcas` VALUES ('79', 'MERCURY', 'MERC');
INSERT INTO `marcas` VALUES ('80', 'MERKUR', 'MERK');
INSERT INTO `marcas` VALUES ('81', 'MERCEDES', 'MERC');
INSERT INTO `marcas` VALUES ('82', 'MG', 'MG');
INSERT INTO `marcas` VALUES ('83', 'MINICOOPER', 'MINI');
INSERT INTO `marcas` VALUES ('84', 'MITSUBISHI', 'MITS');
INSERT INTO `marcas` VALUES ('85', 'MOTO GUZZI', 'MOTO');
INSERT INTO `marcas` VALUES ('86', 'MORGAN', 'MORG');
INSERT INTO `marcas` VALUES ('87', 'NORTH AMERICAN BUS', 'NORT');
INSERT INTO `marcas` VALUES ('88', 'NASH', 'NASH');
INSERT INTO `marcas` VALUES ('89', 'NISSAN', 'NISS');
INSERT INTO `marcas` VALUES ('90', 'NEW FLYER', 'NEWF');
INSERT INTO `marcas` VALUES ('91', 'NOBLE', 'NOBL');
INSERT INTO `marcas` VALUES ('92', 'OLDSMOBILE', 'OLDS');
INSERT INTO `marcas` VALUES ('93', 'OSHKOSH', 'OSHK');
INSERT INTO `marcas` VALUES ('94', 'PACKARD', 'PACK');
INSERT INTO `marcas` VALUES ('95', 'PANOZ', 'PANO');
INSERT INTO `marcas` VALUES ('96', 'PANTERA', 'PANT');
INSERT INTO `marcas` VALUES ('97', 'PEUGEOT', 'PEUG');
INSERT INTO `marcas` VALUES ('98', 'PIERCE', 'PIER');
INSERT INTO `marcas` VALUES ('99', 'PLYMOUTH', 'PLYM');
INSERT INTO `marcas` VALUES ('100', 'PONTIAC', 'PONT');
INSERT INTO `marcas` VALUES ('101', 'PORSCHE', 'PORS');
INSERT INTO `marcas` VALUES ('102', 'PUMA', 'PUMA');
INSERT INTO `marcas` VALUES ('103', 'RANGE ROVER', 'RANG');
INSERT INTO `marcas` VALUES ('104', 'RAUCH', 'RAUC');
INSERT INTO `marcas` VALUES ('105', 'RENAULT', 'RENA');
INSERT INTO `marcas` VALUES ('106', 'ROADMASTER', 'ROAD');
INSERT INTO `marcas` VALUES ('107', 'ROLLS ROYCE', 'ROLL');
INSERT INTO `marcas` VALUES ('108', 'ROVER', 'ROVE');
INSERT INTO `marcas` VALUES ('109', 'RUF', 'RUF');
INSERT INTO `marcas` VALUES ('110', 'SAAB', 'SAAB');
INSERT INTO `marcas` VALUES ('111', 'SATURN', 'SATU');
INSERT INTO `marcas` VALUES ('112', 'SEAGRAVES', 'SEAG');
INSERT INTO `marcas` VALUES ('113', 'SHELBRY', 'SHEL');
INSERT INTO `marcas` VALUES ('114', 'SMART CARS', 'SMAR');
INSERT INTO `marcas` VALUES ('115', 'STERLING', 'STER');
INSERT INTO `marcas` VALUES ('116', 'STUDEBAKER', 'STUD');
INSERT INTO `marcas` VALUES ('117', 'SUBARU', 'SUBA');
INSERT INTO `marcas` VALUES ('118', 'SUZUKI', 'SUZU');
INSERT INTO `marcas` VALUES ('119', 'TESL', 'TESL');
INSERT INTO `marcas` VALUES ('120', 'TOYOTA', 'TOYO');
INSERT INTO `marcas` VALUES ('121', 'TRABANT', 'TRAB');
INSERT INTO `marcas` VALUES ('122', 'TRIUMPH', 'TRIU');
INSERT INTO `marcas` VALUES ('123', 'TVR', 'TVR');
INSERT INTO `marcas` VALUES ('124', 'UTILITY', 'UTIL');
INSERT INTO `marcas` VALUES ('125', 'UTILITYMASTER', 'UTIM');
INSERT INTO `marcas` VALUES ('126', 'VEXEL', 'VEXE');
INSERT INTO `marcas` VALUES ('127', 'VOLKSWAGEN', 'VOLK');
INSERT INTO `marcas` VALUES ('128', 'VOLVO', 'VOLV');
INSERT INTO `marcas` VALUES ('129', 'WILLY', 'WILL');
INSERT INTO `marcas` VALUES ('130', 'YAMAHA', 'YAMA');
INSERT INTO `marcas` VALUES ('131', 'YUGO', 'YUGO');
INSERT INTO `marcas` VALUES ('133', 'TOYOTA', 'TOYO');

-- ----------------------------
-- Table structure for `modelos`
-- ----------------------------
DROP TABLE IF EXISTS `modelos`;
CREATE TABLE `modelos` (
  `MOD_ID` int(10) NOT NULL AUTO_INCREMENT,
  `MOD_NOMBRE` varchar(255) DEFAULT NULL,
  `MOD_CLAVE` varchar(4) DEFAULT NULL,
  `MAR_CLAVE_FW` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`MOD_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modelos
-- ----------------------------
INSERT INTO `modelos` VALUES ('1', 'Focus', 'focu', 'FORD');
INSERT INTO `modelos` VALUES ('2', 'Tracker', 'trac', null);
INSERT INTO `modelos` VALUES ('3', 'Explorer', 'expl', null);
INSERT INTO `modelos` VALUES ('8', 'stratus', 'stra', null);
INSERT INTO `modelos` VALUES ('9', 'MAKO', 'MAKO', null);
INSERT INTO `modelos` VALUES ('45', 'CAMRI', 'CAMR', 'FORD');

-- ----------------------------
-- Table structure for `partes`
-- ----------------------------
DROP TABLE IF EXISTS `partes`;
CREATE TABLE `partes` (
  `PAR_ID` int(10) NOT NULL AUTO_INCREMENT,
  `PI_ID` int(10) NOT NULL COMMENT 'ENlaza con tabla catalogo',
  `PAR_COLOR` varchar(6) NOT NULL,
  `PAR_SUELTO` tinyint(1) NOT NULL COMMENT 'Si es 1, esta suelto',
  `PAR_PRECIO` varchar(10) NOT NULL,
  `AUT_ID` int(10) NOT NULL DEFAULT '0' COMMENT 'EL ID DEL AUTO AL QUE ESTA PEGADO',
  `PAR_FECHA_AG` date NOT NULL,
  `PAR_FECHA_VE` date NOT NULL,
  `PAR_VENDIDO` tinyint(1) NOT NULL,
  `PAR_DETALLES` text NOT NULL,
  `PAR_MODELO` varchar(255) NOT NULL,
  `PAR_MARCA` varchar(255) NOT NULL,
  `PAR_FOTO` varchar(255) DEFAULT NULL,
  `PAR_FOTO2` varchar(255) DEFAULT NULL,
  `PAR_FOTO3` varchar(255) DEFAULT NULL,
  `PAR_FOTO4` varchar(255) DEFAULT NULL,
  `CAT_ID_FW` int(4) DEFAULT NULL,
  `ALM_ID_FW` int(4) DEFAULT NULL,
  `RAC_ID_FW` int(4) DEFAULT NULL,
  `RAC_CAMPO_FW` int(4) DEFAULT NULL,
  `RAC_PISOS_FW` int(4) DEFAULT NULL,
  `PAR_USUARIO_REG` varchar(255) DEFAULT NULL,
  `PAR_USUARIO_VEN` varchar(255) DEFAULT NULL,
  `PAR_ANO` varchar(4) DEFAULT NULL,
  `PAR_CLIENTE` varchar(255) DEFAULT 'particular',
  PRIMARY KEY (`PAR_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of partes
-- ----------------------------

-- ----------------------------
-- Table structure for `partes_catalogo`
-- ----------------------------
DROP TABLE IF EXISTS `partes_catalogo`;
CREATE TABLE `partes_catalogo` (
  `PI_ID` int(50) NOT NULL AUTO_INCREMENT,
  `PI_NOMBRE` varchar(256) NOT NULL,
  `CAT_ID_FW` int(11) NOT NULL COMMENT 'Enlaza con la tabla categorias (Indicas a que categoria pertenece)',
  PRIMARY KEY (`PI_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=217 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of partes_catalogo
-- ----------------------------
INSERT INTO `partes_catalogo` VALUES ('1', 'Amortiguador del. derecho', '1');
INSERT INTO `partes_catalogo` VALUES ('2', 'Amortiguador del. izquierdo', '1');
INSERT INTO `partes_catalogo` VALUES ('3', 'Amortiguador tras. izquierdo', '1');
INSERT INTO `partes_catalogo` VALUES ('4', 'Amortiguador tras. derecho', '1');
INSERT INTO `partes_catalogo` VALUES ('5', 'Horquilla sup. derecha del.', '1');
INSERT INTO `partes_catalogo` VALUES ('6', 'Horquilla sup. izquierda del.', '1');
INSERT INTO `partes_catalogo` VALUES ('7', 'Horquilla int. derecha del.', '1');
INSERT INTO `partes_catalogo` VALUES ('8', 'Horquilla int. izquierda del.', '1');
INSERT INTO `partes_catalogo` VALUES ('9', 'Horquilla sup. derecha trasera', '1');
INSERT INTO `partes_catalogo` VALUES ('10', 'Horquilla sup. izquierda trasera', '1');
INSERT INTO `partes_catalogo` VALUES ('11', 'Horquilla inf. derecha trasera', '1');
INSERT INTO `partes_catalogo` VALUES ('12', 'Horquilla inf. izquierda trasera', '1');
INSERT INTO `partes_catalogo` VALUES ('13', 'Tirante superior', '1');
INSERT INTO `partes_catalogo` VALUES ('14', 'Tirante inferior', '1');
INSERT INTO `partes_catalogo` VALUES ('15', 'Tirante Centro', '1');
INSERT INTO `partes_catalogo` VALUES ('16', 'Terminal interior derecho', '1');
INSERT INTO `partes_catalogo` VALUES ('17', 'Terminal exterior derecho', '1');
INSERT INTO `partes_catalogo` VALUES ('18', 'Terminar interior izquierda', '1');
INSERT INTO `partes_catalogo` VALUES ('19', 'Terminal exterior izquierda', '1');
INSERT INTO `partes_catalogo` VALUES ('20', 'Espiga Izquierda delantera', '1');
INSERT INTO `partes_catalogo` VALUES ('21', 'Espiga Derecha delantera', '1');
INSERT INTO `partes_catalogo` VALUES ('22', 'Espiga izquierda trasera', '1');
INSERT INTO `partes_catalogo` VALUES ('23', 'Espiga derecha trasera', '1');
INSERT INTO `partes_catalogo` VALUES ('24', 'Eje trasero', '1');
INSERT INTO `partes_catalogo` VALUES ('25', 'Muelle izquierdo', '1');
INSERT INTO `partes_catalogo` VALUES ('26', 'Muelle derecho', '1');
INSERT INTO `partes_catalogo` VALUES ('27', 'Diferencial', '1');
INSERT INTO `partes_catalogo` VALUES ('28', 'Caliper delantero izq', '1');
INSERT INTO `partes_catalogo` VALUES ('29', 'Caliper delantero derecho', '1');
INSERT INTO `partes_catalogo` VALUES ('30', 'Caliper trasero izq.', '1');
INSERT INTO `partes_catalogo` VALUES ('31', 'Caliper trasero derecho', '1');
INSERT INTO `partes_catalogo` VALUES ('32', 'Munon izq.', '1');
INSERT INTO `partes_catalogo` VALUES ('33', 'Munon Derecho', '1');
INSERT INTO `partes_catalogo` VALUES ('34', 'Transfer', '1');
INSERT INTO `partes_catalogo` VALUES ('35', 'Switch de 4x4', '1');
INSERT INTO `partes_catalogo` VALUES ('36', 'Barra Kardahn', '1');
INSERT INTO `partes_catalogo` VALUES ('37', 'Barra 4x4', '1');
INSERT INTO `partes_catalogo` VALUES ('38', 'Barra Kardan aluminio', '1');
INSERT INTO `partes_catalogo` VALUES ('39', 'Discos (4)', '1');
INSERT INTO `partes_catalogo` VALUES ('40', 'Tambores (1)', '1');
INSERT INTO `partes_catalogo` VALUES ('41', 'Cremallera', '1');
INSERT INTO `partes_catalogo` VALUES ('42', 'Lineas de Frenos', '1');
INSERT INTO `partes_catalogo` VALUES ('43', 'Pedal de acelerador electronico', '1');
INSERT INTO `partes_catalogo` VALUES ('44', 'Barra estabilizadora', '1');
INSERT INTO `partes_catalogo` VALUES ('45', 'Sinfin', '1');
INSERT INTO `partes_catalogo` VALUES ('46', 'Coma del motor', '1');
INSERT INTO `partes_catalogo` VALUES ('47', 'Mofle completo', '1');
INSERT INTO `partes_catalogo` VALUES ('48', 'Arnes de luces', '1');
INSERT INTO `partes_catalogo` VALUES ('49', 'Tacones de cabina o bastidor', '1');
INSERT INTO `partes_catalogo` VALUES ('50', 'Asientos de Tela', '4');
INSERT INTO `partes_catalogo` VALUES ('51', 'Asientos de Piel', '4');
INSERT INTO `partes_catalogo` VALUES ('52', 'Alfombra', '4');
INSERT INTO `partes_catalogo` VALUES ('53', 'Techo', '4');
INSERT INTO `partes_catalogo` VALUES ('54', 'Tapiceria de puerta (4)', '4');
INSERT INTO `partes_catalogo` VALUES ('55', 'Tapiceria de tapa', '4');
INSERT INTO `partes_catalogo` VALUES ('56', 'Viseras (2)', '4');
INSERT INTO `partes_catalogo` VALUES ('57', 'Espejo retrovisor', '4');
INSERT INTO `partes_catalogo` VALUES ('58', 'Rejillas de aire (4)', '4');
INSERT INTO `partes_catalogo` VALUES ('59', 'Consola central', '4');
INSERT INTO `partes_catalogo` VALUES ('60', 'Tapiceria de postes', '4');
INSERT INTO `partes_catalogo` VALUES ('61', 'Bocinas', '4');
INSERT INTO `partes_catalogo` VALUES ('62', 'Bateria', '2');
INSERT INTO `partes_catalogo` VALUES ('63', 'Radiador', '2');
INSERT INTO `partes_catalogo` VALUES ('64', 'Condensador', '2');
INSERT INTO `partes_catalogo` VALUES ('65', 'Abanico clima', '2');
INSERT INTO `partes_catalogo` VALUES ('66', 'Motoventilador motor', '2');
INSERT INTO `partes_catalogo` VALUES ('67', 'Motoventiladores', '2');
INSERT INTO `partes_catalogo` VALUES ('68', 'Caja de fusibles', '2');
INSERT INTO `partes_catalogo` VALUES ('69', 'Computadora central', '2');
INSERT INTO `partes_catalogo` VALUES ('70', 'Computadora transmision', '2');
INSERT INTO `partes_catalogo` VALUES ('71', 'Deposito agua radiador', '2');
INSERT INTO `partes_catalogo` VALUES ('72', 'Deposito agua parabrisas', '2');
INSERT INTO `partes_catalogo` VALUES ('73', 'Deposito Hidraulico', '2');
INSERT INTO `partes_catalogo` VALUES ('74', 'Chirriones de transmision', '2');
INSERT INTO `partes_catalogo` VALUES ('75', 'Chirriones de cofre', '2');
INSERT INTO `partes_catalogo` VALUES ('76', 'Chirriones de cajuela', '2');
INSERT INTO `partes_catalogo` VALUES ('77', 'Mangueras de motor', '2');
INSERT INTO `partes_catalogo` VALUES ('78', 'Lineas de gasolina', '2');
INSERT INTO `partes_catalogo` VALUES ('79', 'Deposito liquido frenos', '2');
INSERT INTO `partes_catalogo` VALUES ('80', 'Boster de los frenos', '2');
INSERT INTO `partes_catalogo` VALUES ('81', 'Map sensor', '2');
INSERT INTO `partes_catalogo` VALUES ('82', 'Flauta izquierda inyectores', '2');
INSERT INTO `partes_catalogo` VALUES ('83', 'Flauta derecha de inyectores', '2');
INSERT INTO `partes_catalogo` VALUES ('84', 'Bobinas 8', '2');
INSERT INTO `partes_catalogo` VALUES ('85', 'Bobinas 6', '2');
INSERT INTO `partes_catalogo` VALUES ('86', 'Bobinas 4', '2');
INSERT INTO `partes_catalogo` VALUES ('87', 'Bobina 1', '2');
INSERT INTO `partes_catalogo` VALUES ('88', 'Cajon filtro de aire', '2');
INSERT INTO `partes_catalogo` VALUES ('89', 'Tacon izq.', '2');
INSERT INTO `partes_catalogo` VALUES ('90', 'Tacon der.', '2');
INSERT INTO `partes_catalogo` VALUES ('91', 'Tacon del.', '2');
INSERT INTO `partes_catalogo` VALUES ('92', 'Tacon tras.', '2');
INSERT INTO `partes_catalogo` VALUES ('93', 'Bomba del hidraulico', '2');
INSERT INTO `partes_catalogo` VALUES ('94', 'Compresor del aire', '2');
INSERT INTO `partes_catalogo` VALUES ('95', 'Alternador', '2');
INSERT INTO `partes_catalogo` VALUES ('96', 'Polea tensora', '2');
INSERT INTO `partes_catalogo` VALUES ('97', 'Polea loca', '2');
INSERT INTO `partes_catalogo` VALUES ('98', 'Bomba del agua', '2');
INSERT INTO `partes_catalogo` VALUES ('99', 'Ciguenal', '2');
INSERT INTO `partes_catalogo` VALUES ('100', 'Motor 4', '2');
INSERT INTO `partes_catalogo` VALUES ('101', 'Motor 6', '2');
INSERT INTO `partes_catalogo` VALUES ('102', 'Motor 8', '2');
INSERT INTO `partes_catalogo` VALUES ('103', 'Transmision', '2');
INSERT INTO `partes_catalogo` VALUES ('104', 'Bomba de gasolina', '2');
INSERT INTO `partes_catalogo` VALUES ('105', 'Sensor automatico de multiple admision', '2');
INSERT INTO `partes_catalogo` VALUES ('106', 'Sensor de oxigeno 4', '2');
INSERT INTO `partes_catalogo` VALUES ('107', 'Inyectores', '2');
INSERT INTO `partes_catalogo` VALUES ('108', 'Bases de tacon', '2');
INSERT INTO `partes_catalogo` VALUES ('109', 'Motor de arranque', '2');
INSERT INTO `partes_catalogo` VALUES ('110', 'Base de bateria', '2');
INSERT INTO `partes_catalogo` VALUES ('111', 'Base de fusibles', '2');
INSERT INTO `partes_catalogo` VALUES ('112', 'Maniful', '2');
INSERT INTO `partes_catalogo` VALUES ('113', 'Modulo de cruise control', '2');
INSERT INTO `partes_catalogo` VALUES ('114', 'Sensor de chispa', '2');
INSERT INTO `partes_catalogo` VALUES ('115', 'Sensor de Temperatura', '2');
INSERT INTO `partes_catalogo` VALUES ('116', 'Bomba de aceite', '2');
INSERT INTO `partes_catalogo` VALUES ('117', 'Evaporador 1 aire', '2');
INSERT INTO `partes_catalogo` VALUES ('118', 'Evaporador 2 aires', '2');
INSERT INTO `partes_catalogo` VALUES ('119', 'Motor de aire', '2');
INSERT INTO `partes_catalogo` VALUES ('120', 'Tarjetas de velocidades de A/C', '2');
INSERT INTO `partes_catalogo` VALUES ('121', 'Bolsas de aire', '2');
INSERT INTO `partes_catalogo` VALUES ('122', 'Funda de volante', '2');
INSERT INTO `partes_catalogo` VALUES ('123', 'Switch de llave', '2');
INSERT INTO `partes_catalogo` VALUES ('124', 'Cluster', '2');
INSERT INTO `partes_catalogo` VALUES ('125', 'Estereo', '2');
INSERT INTO `partes_catalogo` VALUES ('126', 'Control de Aire Acondicionado', '2');
INSERT INTO `partes_catalogo` VALUES ('127', 'Palanca de direcciones', '2');
INSERT INTO `partes_catalogo` VALUES ('128', 'Switch de encendido de luces', '2');
INSERT INTO `partes_catalogo` VALUES ('129', 'Controles de cristales', '2');
INSERT INTO `partes_catalogo` VALUES ('130', 'Control de seguros de puerta', '2');
INSERT INTO `partes_catalogo` VALUES ('131', 'Manija interior de puerta', '2');
INSERT INTO `partes_catalogo` VALUES ('132', 'Tablero', '2');
INSERT INTO `partes_catalogo` VALUES ('133', 'Cinturones de seguridad', '2');
INSERT INTO `partes_catalogo` VALUES ('134', 'Bolsas de aire de asientos', '2');
INSERT INTO `partes_catalogo` VALUES ('135', 'Bolsas de aire laterales', '2');
INSERT INTO `partes_catalogo` VALUES ('136', 'Palanca de cambios', '2');
INSERT INTO `partes_catalogo` VALUES ('137', 'Espejo retrovisor', '2');
INSERT INTO `partes_catalogo` VALUES ('138', 'Freno de Mano', '2');
INSERT INTO `partes_catalogo` VALUES ('139', 'Fan Clutch', '2');
INSERT INTO `partes_catalogo` VALUES ('140', 'Aspas de fan clutch', '2');
INSERT INTO `partes_catalogo` VALUES ('141', 'Cofre', '3');
INSERT INTO `partes_catalogo` VALUES ('142', 'Faldon izquierdo', '3');
INSERT INTO `partes_catalogo` VALUES ('143', 'Faldon derecho', '3');
INSERT INTO `partes_catalogo` VALUES ('144', 'Parrilla', '3');
INSERT INTO `partes_catalogo` VALUES ('145', 'Foco derecho', '3');
INSERT INTO `partes_catalogo` VALUES ('146', 'Foco izquierdo', '3');
INSERT INTO `partes_catalogo` VALUES ('147', 'Lodera izquierda', '3');
INSERT INTO `partes_catalogo` VALUES ('148', 'Lodera derecha', '3');
INSERT INTO `partes_catalogo` VALUES ('149', 'Guias', '3');
INSERT INTO `partes_catalogo` VALUES ('150', 'Cuarto izq', '3');
INSERT INTO `partes_catalogo` VALUES ('151', 'Cuarto derecho', '3');
INSERT INTO `partes_catalogo` VALUES ('152', 'Faro de niebla izq', '3');
INSERT INTO `partes_catalogo` VALUES ('153', 'Faro de niebla der', '3');
INSERT INTO `partes_catalogo` VALUES ('154', 'Spoiler', '3');
INSERT INTO `partes_catalogo` VALUES ('155', 'Deflector', '3');
INSERT INTO `partes_catalogo` VALUES ('156', 'Puertas', '3');
INSERT INTO `partes_catalogo` VALUES ('157', 'Espejos', '3');
INSERT INTO `partes_catalogo` VALUES ('158', 'Molduras de arco', '3');
INSERT INTO `partes_catalogo` VALUES ('159', 'Molduras de puertas', '3');
INSERT INTO `partes_catalogo` VALUES ('160', 'Molduras de tapa', '3');
INSERT INTO `partes_catalogo` VALUES ('161', 'Estribos carroceria', '3');
INSERT INTO `partes_catalogo` VALUES ('162', 'Estribos plastico', '3');
INSERT INTO `partes_catalogo` VALUES ('163', 'Estribos exteriores', '3');
INSERT INTO `partes_catalogo` VALUES ('164', 'Manijas de puertas (4)', '3');
INSERT INTO `partes_catalogo` VALUES ('165', 'Manijas de tapa', '3');
INSERT INTO `partes_catalogo` VALUES ('166', 'Vidrios de puertas (4)', '3');
INSERT INTO `partes_catalogo` VALUES ('167', 'Cristal Parabrisas', '3');
INSERT INTO `partes_catalogo` VALUES ('168', 'Cristal Medallon', '3');
INSERT INTO `partes_catalogo` VALUES ('169', 'Calavera izquierda', '3');
INSERT INTO `partes_catalogo` VALUES ('170', 'Calavera derecha', '3');
INSERT INTO `partes_catalogo` VALUES ('171', 'Calavera de tapa', '3');
INSERT INTO `partes_catalogo` VALUES ('172', 'Absorvedor', '3');
INSERT INTO `partes_catalogo` VALUES ('173', 'Refuerzo delantero', '3');
INSERT INTO `partes_catalogo` VALUES ('174', 'Puntas de chasis del (2)', '3');
INSERT INTO `partes_catalogo` VALUES ('175', 'Puntas de chasis tras (2)', '3');
INSERT INTO `partes_catalogo` VALUES ('176', 'Bisel de faro de niebla izq', '3');
INSERT INTO `partes_catalogo` VALUES ('177', 'Bisel de faro de niebla der', '3');
INSERT INTO `partes_catalogo` VALUES ('178', 'Rejilla Central', '3');
INSERT INTO `partes_catalogo` VALUES ('179', 'Tapa de gasolina', '3');
INSERT INTO `partes_catalogo` VALUES ('180', 'Quemacocos', '3');
INSERT INTO `partes_catalogo` VALUES ('181', 'Rines', '3');
INSERT INTO `partes_catalogo` VALUES ('182', 'Copa de Rines', '3');
INSERT INTO `partes_catalogo` VALUES ('183', 'Tapa trasera', '3');
INSERT INTO `partes_catalogo` VALUES ('184', 'Portaplacas der.', '3');
INSERT INTO `partes_catalogo` VALUES ('185', 'Emblemas', '3');
INSERT INTO `partes_catalogo` VALUES ('186', 'Brazos de defensas', '3');
INSERT INTO `partes_catalogo` VALUES ('187', 'Postes', '3');
INSERT INTO `partes_catalogo` VALUES ('188', 'Capacete', '3');
INSERT INTO `partes_catalogo` VALUES ('189', 'Tolua de parabrisas', '3');
INSERT INTO `partes_catalogo` VALUES ('190', 'Bicer de cofre', '3');
INSERT INTO `partes_catalogo` VALUES ('191', 'Bicer de focos', '3');
INSERT INTO `partes_catalogo` VALUES ('192', 'Costados', '3');
INSERT INTO `partes_catalogo` VALUES ('193', 'Cola de pato', '3');
INSERT INTO `partes_catalogo` VALUES ('194', 'Llantas', '3');
INSERT INTO `partes_catalogo` VALUES ('195', 'Aletones', '3');
INSERT INTO `partes_catalogo` VALUES ('196', 'Marco de radiador', '3');
INSERT INTO `partes_catalogo` VALUES ('197', 'Base de focos', '3');
INSERT INTO `partes_catalogo` VALUES ('198', 'Tolva del abanico', '3');
INSERT INTO `partes_catalogo` VALUES ('199', 'Tolva superior marco radiador', '3');
INSERT INTO `partes_catalogo` VALUES ('200', 'Base foco izquierdo', '3');
INSERT INTO `partes_catalogo` VALUES ('201', 'Base foco derecho', '3');
INSERT INTO `partes_catalogo` VALUES ('202', 'Bisagras de puertas (4)', '3');
INSERT INTO `partes_catalogo` VALUES ('203', 'Bisagras de tapa', '3');
INSERT INTO `partes_catalogo` VALUES ('204', 'Bisagras de cofre', '3');
INSERT INTO `partes_catalogo` VALUES ('205', 'Chapa de cajuela', '3');
INSERT INTO `partes_catalogo` VALUES ('206', 'Elevadores (4)', '3');
INSERT INTO `partes_catalogo` VALUES ('207', 'Hule sup. def. trasero', '3');
INSERT INTO `partes_catalogo` VALUES ('208', 'Hules laterales defensas', '3');

-- ----------------------------
-- Table structure for `racks`
-- ----------------------------
DROP TABLE IF EXISTS `racks`;
CREATE TABLE `racks` (
  `RAC_ID` int(10) NOT NULL AUTO_INCREMENT,
  `RAC_NUMERO` int(10) DEFAULT NULL,
  `RAC_CAMPOS` int(10) DEFAULT NULL,
  `RAC_PISOS` int(10) DEFAULT NULL,
  `ALM_ID_FW` int(10) DEFAULT NULL COMMENT 'Relaciona con tabla almacen.',
  PRIMARY KEY (`RAC_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of racks
-- ----------------------------
INSERT INTO `racks` VALUES ('15', '1', '3', '7', '15');
INSERT INTO `racks` VALUES ('16', '2', '4', '7', '15');
INSERT INTO `racks` VALUES ('17', '1', '4', '7', '16');
INSERT INTO `racks` VALUES ('18', '1', '7', '8', '17');

-- ----------------------------
-- Table structure for `tiposdeusuario`
-- ----------------------------
DROP TABLE IF EXISTS `tiposdeusuario`;
CREATE TABLE `tiposdeusuario` (
  `ID_TIPO` tinyint(2) NOT NULL AUTO_INCREMENT,
  `ID_NOMBRE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tiposdeusuario
-- ----------------------------
INSERT INTO `tiposdeusuario` VALUES ('1', 'Administrador');
INSERT INTO `tiposdeusuario` VALUES ('2', 'Usuario Normal');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `idusuario` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(50) DEFAULT '',
  `tipodeusuario` tinyint(1) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------

INSERT INTO `users` VALUES ('40', 'trabajador1', '', '', '2', 'Nombre del Trabajador');
INSERT INTO `users` VALUES ('41', 'edgar', '', '', '1', 'Edgar Marquez');
