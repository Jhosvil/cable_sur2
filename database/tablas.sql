CREATE DATABASE cable_sur;

USE cable_sur;

/*
************* PERSONAS ******************************
*/
CREATE TABLE personas
(
idpersona 	INT 	    AUTO_INCREMENT PRIMARY KEY,
iddistrito	VARCHAR(6)  NOT NULL, -- FK
nombres 	VARCHAR(50) NOT NULL,
apellidos 	VARCHAR(50) NOT NULL,
dni 		CHAR(8)     NOT NULL,
telefono	CHAR(11)    NOT NULL,
email		VARCHAR(50) NULL,

CONSTRAINT fk_iddistrito_per FOREIGN KEY (iddistrito) REFERENCES distritos (iddistrito),
CONSTRAINT uk_usu_idpersona UNIQUE (idpersona)
)ENGINE = INNODB;

/*
************* USUARIOS ******************************
*/
CREATE TABLE usuarios
(
idusuario	INT 		AUTO_INCREMENT PRIMARY KEY,
idpersona	INT 		NOT NULL,	-- FK
nombreusuario	VARCHAR(50) 	NOT NULL,
claveacceso	VARCHAR(100) 	NOT NULL,
rol 		VARCHAR(50)	NOT NULL,
fecharegistro 	DATETIME 	NOT NULL 	DEFAULT NOW(),
fechabaja 	DATETIME 	NULL,
estado 		CHAR(1)		NOT NULL DEFAULT '1', -- 1(Activo) / 0 (inactivo)

CONSTRAINT fk_idpersona_usu FOREIGN KEY (idpersona) REFERENCES personas (idpersona),
CONSTRAINT uk_usu_idpersona UNIQUE (idpersona)
)ENGINE = INNODB;

/*
************* CLIENTES ******************************
*/
CREATE TABLE clientes
(
idcliente 		INT 		AUTO_INCREMENT 		PRIMARY KEY,
idpersona		INT 		NOT NULL, 	-- FK
fecharegistro 		DATE 		NOT NULL DEFAULT NOW(),
estado			INT 		NOT NULL DEFAULT '1' -- 1= activo; 0=inactivo
idusuarioregistro 	INT 		NOT NULL, 	-- FK

CONSTRAINT fk_idpersona_cli FOREIGN KEY (idpersona) REFERENCES personas (idpersona),
CONSTRAINT fk_idusuarioregistro_cli FOREIGN KEY (idusuarioregistro) REFERENCES usuarios (idusuario),
CONSTRAINT uk_cli_idpersona UNIQUE (idpersona)
)ENGINE = INNODB;


/*
************* PLANES ******************************
*/
DROP TABLE planes
(
idplan 		INT 		AUTO_INCREMENT PRIMARY KEY,
nombreplan 	VARCHAR(50) 	NOT NULL,
descripcion 	VARCHAR(100) 	NOT NULL,
precio 		DECIMAL(4,2) 	NOT NULL
)ENGINE = INNODB;


/*
************* USUARIOS ******************************
*/
DROP TABLE contratos
(
idcontrato 	INT 		AUTO_INCREMENT 		PRIMARY KEY,
codigo		INT 		NOT NULL,	
idcliente	INT 		NOT NULL, 	-- FK
idplan 		INT 		NOT NULL,	-- FK
anexo 		INT 		NULL,
fechainicio 	DATE 		NOT NULL,
fechatermino 	DATE 		NULL,
diapago 	DATE 		NULL,

CONSTRAINT fk_idcliente_cont FOREIGN KEY (idcliente) REFERENCES clientes (idcliente),
CONSTRAINT fk_idplan_cont FOREIGN KEY (idplan) REFERENCES planes (idplan)
)ENGINE = INNODB;


/*
************* OPERACIONES ******************************
*/
DROP TABLE operaciones
(
idoperacion 		INT 		AUTO_INCREMENT 		PRIMARY KEY,
idcontrato 		INT 		NOT NULL,	-- FK
idusuariotecnico 	INT 		NOT NULL,	-- FK
tipooperacion 		VARCHAR(50) 	NOT NULL,
fechahora 		DATETIME 	NOT NULL 	DEFAULT NOW(),
materialesretirados 	VARCHAR(200) 	NULL,
materialesusados 	VARCHAR(200) 	NULL,

CONSTRAINT fk_idcontrato_ope FOREIGN KEY (idcontrato) REFERENCES contratos (idcontrato),
CONSTRAINT fk_idusuariotecnico_ope FOREIGN KEY (idusuariotecnico)REFERENCES usuarios (idusuario)
)ENGINE = INNODB;


/*
************* PAGOS ******************************
*/
DROP TABLE pagos
(
idpago 			INT 		AUTO_INCREMENT 		PRIMARY KEY,
idcontrato 		INT 		NOT NULL, 	-- FK
añopago 		SMALLINT 	NOT NULL,
mespago 		TINYINT 	NOT NULL,
netopagar 		DECIMAL(2,2) 	NOT NULL,
fechapago 		DATE 		NOT NULL 	DEFAULT NOW(),
idusuarioregistro 	INT 		NOT NULL, 	-- FK

CONSTRAINT fk_idcontrato_pag FOREIGN KEY (idcontrato) REFERENCES contratos (idcontrato),
CONSTRAINT fk_idusuarioregistro_pag FOREIGN KEY (idusuarioregistro) REFERENCES usuarios (idusuario)
)ENGINE = INNODB;



/*
************* DESCUENTOS ******************************
*/
DROP TABLE descuentos
(
iddescuento 	INT 		AUTO_INCREMENT 		PRIMARY KEY,
concepto 	VARCHAR(100) 	NOT NULL,
monto 		DECIMAL(2,2) 	NOT NULL,
idpago 		INT 		NOT NULL,

CONSTRAINT fk_idpago_desc FOREIGN KEY (idpago) REFERENCES pagos (idpago)
)ENGINE = INNODB;