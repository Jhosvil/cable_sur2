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
IN 	_fechatermino 		DATE,
IN 	_diapago		DATE
)
BEGIN
	INSERT INTO contratos (idcliente, idplan, codcintillo, codsuministro, referencia, tipodireccion,
				iddireccion, numerodireccion, anexo, fechainicio, fechatermino, diapago)
	VALUES(_idcliente, _idplan, _codcintillo, _codsuministro, _referencia, _tipodireccion,
				_iddireccion, _numerodireccion, _anexo, _fechainicio, _fechatermino, _diapago);
END $$
CALL registrar_contratos('1', '1', '123456', '12345678', 
			 'Al costado de peluqueria corinita', 
			 'AV', '2','', '', '', '01/11/2022', '01/11/2022');


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

-- Listar Contratos
-- --------------------------------------------------
DELIMITER $$
CREATE PROCEDURE listar_Contratos()
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
		WHERE CLI.`estado` = '1';
END $$