-- -----------------------------------------------------------------------------------
--                    		CONTRATOS 
-- -----------------------------------------------------------------------------------
-- Registrar un Contrato
-- ---------------------------------------
DELIMITER $$
CREATE PROCEDURE registrar_contratos
(
IN 	_idcliente 		INT,
IN 	_idplan 		INT,
IN 	_codcintillo 		INT,
IN 	_codsuministro 		CHAR(8),
IN 	_referencia 		VARCHAR(100),
IN 	_tipodireccion		VARCHAR(50),
IN 	_iddireccion		INT,
IN 	_numerodireccion	INT,
IN 	_anexo 			INT,
IN 	_fechainicio 		DATE,
IN 	_diapago		INT
)
BEGIN
	INSERT INTO contratos (idcliente, idplan, codcintillo, codsuministro, referencia, tipodireccion,
				iddireccion, numerodireccion, anexo, fechainicio, diapago)
	VALUES(_idcliente, _idplan, _codcintillo, _codsuministro, _referencia, _tipodireccion,
				_iddireccion, _numerodireccion, _anexo, _fechainicio, _diapago);
END $$
CALL registrar_contratos('1', '1', '123456', '12345678', 
			 'Al costado de peluqueria', 
			 'AV', '2','', '', '', '01/11/2022', '01/11/2022');
INSERT INTO contratos(idcliente, idplan, codcintillo, codsuministro, referencia, tipodireccion,
				iddireccion, numerodireccion, anexo, fechatermino, fechainicio, diapago)
	VALUES('1', '1', '123456', '12345678', 'Al costado de peluqueria', 'AV', 
		'2','200', '0', '2022-11-08', '2022-11-08', '30');

-- Listar un Contrato
-- --------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE listar_un_contrato
(
IN _idcontrato INT
)
BEGIN
	SELECT  DIST.`nombredistrito` AS 'distritoCli',
		PERCLI.`apellidos` AS 'apellidoCli', PERCLI.`nombres` AS 'nombreCli', PERCLI.`dni` AS 'dniCli', 
		PERCLI.`telefono` AS 'telefonoCli', PERCLI.`email` AS 'emailCli', USU.`rol` AS 'rolUsu',
		PERUSU.`nombres` AS 'nombresUsu', PERUSU.`apellidos` AS 'apellidoUsu', PERUSU.`dni` AS 'dniUsu',
		PERUSU.`telefono` AS 'telefonoUsu', PERUSU.`email` AS 'emailUsu',
		CONCAT(CONTR.`tipodireccion`,' ',DIR.`direccion`,' N° ',CONTR.`numerodireccion`)AS 'direccliente',
		PLAN.`nombreplan`, PLAN.`descripcion`, PLAN.`precio`,  
		CONTR.`codcintillo`, CONTR.`referencia`, CONTR.`anexo`, CONTR.`fechainicio`, CONTR.`fechatermino`, CONTR.`diapago`

	FROM contratos CONTR
	INNER JOIN clientes 	CLI 	ON 	CLI.`idcliente`   	= 	CONTR.`idcliente`
	INNER JOIN personas	PERCLI  ON 	PERCLI.`idpersona` 	=  	CLI.`idpersona`
	INNER JOIN planes 	PLAN 	ON 	PLAN.`idplan` 	 	= 	CONTR.`idplan`
	INNER JOIN direcciones 	DIR 	ON 	DIR.`iddireccion` 	= 	CONTR.`iddireccion`
	INNER JOIN usuarios 	USU	ON 	USU.`idusuario` 	= 	CLI.`idusuarioregistro`
	INNER JOIN personas 	PERUSU 	ON 	PERUSU.idpersona 	= 	USU.`idpersona`
	INNER JOIN distritos 	DIST	ON 	DIST.`iddistrito`  	= 	PERCLI.`iddistrito`
	WHERE CLI.`estado` = '1'    AND  CONTR.`idcontrato` = _idcontrato;

END $$

-- Listar Contratos Vigentes
-- --------------------------------------------------
DELIMITER $$
CREATE PROCEDURE listar_Contratos()
BEGIN
	SELECT  	CONTR.`idcontrato`, DIST.`nombredistrito` AS 'distritoCli',
			PERCLI.`apellidos` AS 'apellidoCli', PERCLI.`nombres` AS 'nombreCli', PERCLI.`dni` AS 'dniCli', 
			PERCLI.`telefono` AS 'telefonoCli', PERCLI.`email` AS 'emailCli', USU.`rol` AS 'rolUsu',
			PERUSU.`nombres` AS 'nombresUsu', PERUSU.`apellidos` AS 'apellidoUsu', PERUSU.`dni` AS 'dniUsu',
			PERUSU.`telefono` AS 'telefonoUsu', PERUSU.`email` AS 'emailUsu',
			CONCAT(CONTR.`tipodireccion`,' ',DIR.`direccion`,' N° ',CONTR.`numerodireccion`)AS 'direccliente',
			PLAN.`nombreplan`, PLAN.`descripcion`, PLAN.`precio`,  
			CONTR.`codcintillo`, CONTR.`referencia`, CONTR.`anexo`, CONTR.`fechainicio`, CONTR.`fechatermino`, CONTR.`diapago`

		FROM contratos CONTR
		INNER JOIN clientes 	CLI 	ON 	CLI.`idcliente`   	= 	CONTR.`idcliente`
		INNER JOIN personas	PERCLI  ON 	PERCLI.`idpersona` 	=  	CLI.`idpersona`
		INNER JOIN planes 	PLAN 	ON 	PLAN.`idplan` 	 	= 	CONTR.`idplan`
		INNER JOIN direcciones 	DIR 	ON 	DIR.`iddireccion` 	= 	CONTR.`iddireccion`
		INNER JOIN usuarios 	USU	ON 	USU.`idusuario` 	= 	CLI.`idusuarioregistro`
		INNER JOIN personas 	PERUSU 	ON 	PERUSU.idpersona 	= 	USU.`idpersona`
		INNER JOIN distritos 	DIST	ON 	DIST.`iddistrito`  	= 	PERCLI.`iddistrito`
		WHERE CLI.`estado` = '1' AND  CONTR.`fechatermino` IS NULL;
END $$

-- Listar Contratos No Vigentes
-- --------------------------------------------------
DELIMITER $$
CREATE PROCEDURE listar_Contratos_Incativos()
BEGIN
	SELECT  	CONTR.`idcontrato`, DIST.`nombredistrito` AS 'distritoCli',
			PERCLI.`apellidos` AS 'apellidoCli', PERCLI.`nombres` AS 'nombreCli', PERCLI.`dni` AS 'dniCli', 
			PERCLI.`telefono` AS 'telefonoCli', PERCLI.`email` AS 'emailCli', USU.`rol` AS 'rolUsu',
			PERUSU.`nombres` AS 'nombresUsu', PERUSU.`apellidos` AS 'apellidoUsu', PERUSU.`dni` AS 'dniUsu',
			PERUSU.`telefono` AS 'telefonoUsu', PERUSU.`email` AS 'emailUsu',
			CONCAT(CONTR.`tipodireccion`,' ',DIR.`direccion`,' N° ',CONTR.`numerodireccion`)AS 'direccliente',
			PLAN.`nombreplan`, PLAN.`descripcion`, PLAN.`precio`,  
			CONTR.`codcintillo`, CONTR.`referencia`, CONTR.`anexo`, CONTR.`fechainicio`, CONTR.`fechatermino`, CONTR.`diapago`

		FROM contratos CONTR
		INNER JOIN clientes 	CLI 	ON 	CLI.`idcliente`   	= 	CONTR.`idcliente`
		INNER JOIN personas	PERCLI  ON 	PERCLI.`idpersona` 	=  	CLI.`idpersona`
		INNER JOIN planes 	PLAN 	ON 	PLAN.`idplan` 	 	= 	CONTR.`idplan`
		INNER JOIN direcciones 	DIR 	ON 	DIR.`iddireccion` 	= 	CONTR.`iddireccion`
		INNER JOIN usuarios 	USU	ON 	USU.`idusuario` 	= 	CLI.`idusuarioregistro`
		INNER JOIN personas 	PERUSU 	ON 	PERUSU.idpersona 	= 	USU.`idpersona`
		INNER JOIN distritos 	DIST	ON 	DIST.`iddistrito`  	= 	PERCLI.`iddistrito`
		WHERE CLI.`estado` = '1' AND  CONTR.`fechatermino` IS NOT NULL;
END $$


-- Culminar Contrato
-- ------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE culminar_contrato
(
IN _idcontrato INT
)
BEGIN
UPDATE contratos SET fechatermino = NOW() WHERE idcontrato = _idcontrato;
END $$


-- -------------------------------------------------------------------------------------------------------------------------------------------------
-- 					OPERACIONES
-- -------------------------------------------------------------------------------------------------------------------------------------------------
-- Registrar
-- -----------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE registrar_operaciones
(
IN _idcontrato 	    	INT,
IN _idusuariotecnico 	INT,
IN _tipooperacion	VARCHAR(50),
IN _fechahora		DATE,
IN _materialesretirados VARCHAR(500),
IN _materialesusados	VARCHAR(500)

)BEGIN
INSERT INTO operaciones(idcontrato, idusuariotecnico, tipooperacion, fechahora, materialesretirados, materialesusados)
VALUES 	(_idcontrato, _idusuariotecnico, _tipooperacion, _fechahora, _materialesretirados, _materialesusados);
END $$

-- Listar
-- ------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE listar_operaciones()
BEGIN
SELECT 	operaciones.`idoperacion`, operaciones.`idcontrato`, CONCAT(personas.`nombres`, ' ', personas.`apellidos`)AS 'tecnico', usuarios.`rol`,
	operaciones.`tipooperacion`, operaciones.`fechahora`, operaciones.`materialesretirados`,
	operaciones.`materialesusados`	
FROM operaciones
INNER JOIN  usuarios 	ON  usuarios.`idusuario` = operaciones.`idusuariotecnico`
INNER JOIN  personas 	ON  personas.`idpersona` = usuarios.`idpersona`;
END $$

CALL listar_operaciones()