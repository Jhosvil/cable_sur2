-- -------------------------------------------------------------------------------
-- 		PAGOS
-- -------------------------------------------------------------------------------
-- Registrar
-- ----------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE registrar_pago
(
IN _idcontrato		INT,
IN _anopago 		SMALLINT(6),
IN _mespago 		TINYINT(4),
IN _netopagar		DECIMAL(6,2),
IN _idusuarioregistro 	INT
)
BEGIN
	INSERT INTO pagos(idcontrato, anopago, mespago, netopagar, idusuarioregistro) 
	VALUES(_idcontrato,_anopago,_mespago, _netopagar, _idusuarioregistro);
END $$

CALL registrar_pago('6','2022', '05', '25', '1'); 


-- listar pagos
-- ------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE listar_pagos()
BEGIN
	SELECT  PAG.`idpago`,PERCLI.`nombres` AS 'nomCli', PERCLI.`apellidos` AS 'apeCli', 
		CONCAT(CONTR.`tipodireccion`,' ', DIR.`direccion`,' ', CONTR.`numerodireccion`)AS 'dirreccionCli',
		PERCLI.`dni` AS 'dniCli', CLIEN.`idcliente`, CONCAT(PAG.`mespago`, ' - ', PAG.`anopago`)AS 'mespago',
		PAG.`netopagar`, PAG.`fechapago`, PERUSU.`nombres` AS 'nomUsu', PERUSU.`apellidos` AS 'apeUsu', CONTR.`diapago`
		
	FROM pagos PAG
	INNER JOIN contratos 	CONTR 	ON CONTR.`idcontrato` 	= PAG.`idcontrato`
	INNER JOIN direcciones 	DIR 	ON DIR.`iddireccion`	= CONTR.`iddireccion`
	INNER JOIN clientes 	CLIEN 	ON CLIEN.`idcliente` 	= CONTR.`idcliente`
	INNER JOIN personas 	PERCLI	ON PERCLI.`idpersona` 	= CLIEN.`idpersona`
	INNER JOIN usuarios 	USU 	ON USU.`idusuario` 	= PAG.`idusuarioregistro`
	INNER JOIN personas 	PERUSU 	ON PERUSU.`idpersona`	= USU.`idpersona`;
END $$
-- filtrar deudores por mes pagados
-- -------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE listar_acreedores
(
IN _mespago TINYINT(4)
)
BEGIN
	SELECT  PAG.`idpago`,PERCLI.`nombres` AS 'nomCli', PERCLI.`apellidos` AS 'apeCli', 
		CONCAT(CONTR.`tipodireccion`,' ', DIR.`direccion`,' ', CONTR.`numerodireccion`)AS 'dirreccionCli',
		PERCLI.`dni` AS 'dniCli', CLIEN.`idcliente`, CONCAT(PAG.`mespago`, ' - ', PAG.`añopago`)AS 'mespago',
		PAG.`netopagar`, PAG.`fechapago`, PERUSU.`nombres` AS 'nomUsu', PERUSU.`apellidos` AS 'apeUsu', CONTR.`diapago`
		
	FROM pagos PAG
	INNER JOIN contratos CONTR 	ON CONTR.`idcontrato` 	= PAG.`idcontrato`
	INNER JOIN direcciones DIR 	ON DIR.`iddireccion`	= CONTR.`iddireccion`
	INNER JOIN clientes CLIEN 	ON CLIEN.`idcliente` 	= CONTR.`idcliente`
	INNER JOIN personas PERCLI	ON PERCLI.`idpersona` 	= CLIEN.`idpersona`
	INNER JOIN usuarios USU 	ON USU.`idusuario` 	= PAG.`idusuarioregistro`
	INNER JOIN personas PERUSU 	ON PERUSU.`idpersona`	= USU.`idpersona`
	WHERE PAG.`mespago` = _mespago;
END $$
CALL listar_acreedores('7');