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
		PERCLI.`dni` AS 'dniCli', CLIEN.`idcliente`, CONCAT(PAG.`mespago`, ' - ', PAG.`anopago`)AS 'mespago',
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

-- lista de Cobranza
-- ---------------------------------------------
DELIMITER $$
CREATE PROCEDURE lista_de_cobranza()
BEGIN
SELECT 	 DISTINCT CLI.`idcliente`, CONCAT(PER.`nombres`,' ', PER.`apellidos`) AS 'cliente',
	CONCAT(CONT.`tipodireccion`,' ', DIR.`direccion`, ' ', CONT.`numerodireccion`) AS 'direccion',
	CONT.`referencia`,PER.`telefono` ,PER.`dni`, CONT.`anexo`,
	PAG1.`mespago` AS 'enero', PAG2.`mespago` AS 'febrero'
	, PAG3.`mespago` AS 'marzo', PAG4.`mespago` AS 'abril', PAG5.`mespago` AS 'mayo'
	, PAG6.`mespago` AS 'junio', PAG7.`mespago` AS 'julio', PAG8.`mespago` AS 'agosto'
	, PAG9.`mespago` AS 'setiembre', PAG10.`mespago` AS 'octubre', PAG11.`mespago` AS 'noviembre'
	, PAG12.`mespago` AS 'diciembre'
FROM contratos CONT
INNER JOIN clientes CLI 	ON CLI.`idcliente` = CONT.`idcliente`
INNER JOIN personas PER 	ON PER.`idpersona` = CLI.`idpersona`
INNER JOIN direcciones DIR 	ON DIR.`iddireccion` = CONT.`iddireccion`
LEFT JOIN pagos 	PAG1 	ON PAG1.`mespago` = '1' 	AND PAG1.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG2 	ON PAG2.`mespago` = '2' 	AND PAG2.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG3 	ON PAG3.`mespago` = '3' 	AND PAG3.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG4 	ON PAG4.`mespago` = '4' 	AND PAG4.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG5 	ON PAG5.`mespago` = '5' 	AND PAG5.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG6 	ON PAG6.`mespago` = '6' 	AND PAG6.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG7 	ON PAG7.`mespago` = '7' 	AND PAG7.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG8 	ON PAG8.`mespago` = '8' 	AND PAG8.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG9 	ON PAG9.`mespago` = '9' 	AND PAG9.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG10 	ON PAG10.`mespago` = '10'	AND PAG10.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG11 	ON PAG11.`mespago` = '11' 	AND PAG11.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG12 	ON PAG12.`mespago` = '12'	AND PAG12.`idcontrato` = CONT.`idcontrato`
WHERE CLI.`estado` = '1' AND CONT.`fechatermino` IS NULL;
END $$

CALL lista_de_cobranza()


-- /////////////////////////////////////////////////////////////////////////////////////////////
-- Listar cobranza segun usuario que registro
-- -------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE lista_de_cobranza_segun_usuarioregistro(
IN _idusuarioregistro INT
)
BEGIN
SELECT 	 DISTINCT CLI.`idcliente`, CONCAT(PER.`nombres`,' ', PER.`apellidos`) AS 'cliente',
	CONCAT(CONT.`tipodireccion`,' ', DIR.`direccion`, ' ', CONT.`numerodireccion`) AS 'direccion',
	CONT.`referencia`,PER.`telefono` ,PER.`dni`, CONT.`anexo`,
	PAG1.`mespago` AS 'enero', PAG2.`mespago` AS 'febrero'
	, PAG3.`mespago` AS 'marzo', PAG4.`mespago` AS 'abril', PAG5.`mespago` AS 'mayo'
	, PAG6.`mespago` AS 'junio', PAG7.`mespago` AS 'julio', PAG8.`mespago` AS 'agosto'
	, PAG9.`mespago` AS 'setiembre', PAG10.`mespago` AS 'octubre', PAG11.`mespago` AS 'noviembre'
	, PAG12.`mespago` AS 'diciembre'
FROM contratos CONT
INNER JOIN clientes CLI 	ON CLI.`idcliente` = CONT.`idcliente`
INNER JOIN personas PER 	ON PER.`idpersona` = CLI.`idpersona`
INNER JOIN direcciones DIR 	ON DIR.`iddireccion` = CONT.`iddireccion`
LEFT JOIN pagos 	PAG1 	ON PAG1.`mespago` = '1' 	AND PAG1.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG2 	ON PAG2.`mespago` = '2' 	AND PAG2.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG3 	ON PAG3.`mespago` = '3' 	AND PAG3.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG4 	ON PAG4.`mespago` = '4' 	AND PAG4.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG5 	ON PAG5.`mespago` = '5' 	AND PAG5.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG6 	ON PAG6.`mespago` = '6' 	AND PAG6.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG7 	ON PAG7.`mespago` = '7' 	AND PAG7.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG8 	ON PAG8.`mespago` = '8' 	AND PAG8.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG9 	ON PAG9.`mespago` = '9' 	AND PAG9.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG10 	ON PAG10.`mespago` = '10'	AND PAG10.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG11 	ON PAG11.`mespago` = '11' 	AND PAG11.`idcontrato` = CONT.`idcontrato`
LEFT JOIN pagos 	PAG12 	ON PAG12.`mespago` = '12'	AND PAG12.`idcontrato` = CONT.`idcontrato`
WHERE CLI.`estado` = '1'AND CLI.`idusuarioregistro` = _idusuarioregistro AND CONT.`fechatermino` IS NULL;
END $$

CALL lista_de_cobranza_segun_usuarioregistro('2')


-- ---------------------------------------------------------
-- descuentos

-- --------------------
DELIMITER $$
CREATE PROCEDURE descuentos_realizados()
BEGIN
	SELECT CONCAT(PER.`nombres`, ' ', PER.`apellidos`) AS 'cliente',
		CONCAT(CONT.`tipodireccion`,' ',DIR.`direccion`, ' ', CONT.`numerodireccion`) AS 'direccion',
		CONT.`referencia`, CONT.`anexo`, PER.`telefono`, PER.`dni`,
		CASE
		 WHEN MONTH(CONT.`fechainicio`) = 01 THEN 'ENERO' 	-- ENERO
		 WHEN MONTH(CONT.`fechainicio`) = 02 THEN 'FEBRERO' 	-- FEBRERO
		 WHEN MONTH(CONT.`fechainicio`) = 03 THEN 'MARZO' 	-- MARZO
		 WHEN MONTH(CONT.`fechainicio`) = 04 THEN 'ABRIL'	-- ABRIL
		 WHEN MONTH(CONT.`fechainicio`) = 05 THEN 'MAYO' 	-- MAYO
		 WHEN MONTH(CONT.`fechainicio`) = 06 THEN 'JUNIO' 	-- JUNIO
		 WHEN MONTH(CONT.`fechainicio`) = 07 THEN 'JULIO' 	-- JULIO
		 WHEN MONTH(CONT.`fechainicio`) = 08 THEN 'AGOSTO' 	-- AGOSTO
		 WHEN MONTH(CONT.`fechainicio`) = 09 THEN 'SETIEMBRE' 	-- SETIEMBRE
		 WHEN MONTH(CONT.`fechainicio`) = 10 THEN 'OCTUBRE' 	-- OCTUBRE
		 WHEN MONTH(CONT.`fechainicio`) = 11 THEN 'NOVIEMBRE' 	-- NOVIEMBRE
		 WHEN MONTH(CONT.`fechainicio`) = 12 THEN 'DICIEMBRE' 	-- DICIEMBRE
	END AS 'mesDescontado',
	CASE
	 WHEN MONTH(CONT.`fechainicio`) = 01 THEN '31' 	-- ENERO
	 WHEN MONTH(CONT.`fechainicio`) = 02 THEN '28' 	-- FEBRERO
	 WHEN MONTH(CONT.`fechainicio`) = 03 THEN '31' 	-- MARZO
	 WHEN MONTH(CONT.`fechainicio`) = 04 THEN '30'	-- ABRIL
	 WHEN MONTH(CONT.`fechainicio`) = 05 THEN '31' 	-- MAYO
	 WHEN MONTH(CONT.`fechainicio`) = 06 THEN '30' 	-- JUNIO
	 WHEN MONTH(CONT.`fechainicio`) = 07 THEN '31' 	-- JULIO
	 WHEN MONTH(CONT.`fechainicio`) = 08 THEN '31' 	-- AGOSTO
	 WHEN MONTH(CONT.`fechainicio`) = 09 THEN '30' 	-- SETIEMBRE
	 WHEN MONTH(CONT.`fechainicio`) = 10 THEN '31' 	-- OCTUBRE
	 WHEN MONTH(CONT.`fechainicio`) = 11 THEN '30' 	-- NOVIEMBRE
	 WHEN MONTH(CONT.`fechainicio`) = 12 THEN '31' 	-- DICIEMBRE
	END AS 'totalMes',
	ROUND((PLAN.`precio` / CASE
	 WHEN MONTH(CONT.`fechainicio`) = 01 THEN '31' 	-- ENERO
	 WHEN MONTH(CONT.`fechainicio`) = 02 THEN '28' 	-- FEBRERO
	 WHEN MONTH(CONT.`fechainicio`) = 03 THEN '31' 	-- MARZO
	 WHEN MONTH(CONT.`fechainicio`) = 04 THEN '30'	-- ABRIL
	 WHEN MONTH(CONT.`fechainicio`) = 05 THEN '31' 	-- MAYO
	 WHEN MONTH(CONT.`fechainicio`) = 06 THEN '30' 	-- JUNIO
	 WHEN MONTH(CONT.`fechainicio`) = 07 THEN '31' 	-- JULIO
	 WHEN MONTH(CONT.`fechainicio`) = 08 THEN '31' 	-- AGOSTO
	 WHEN MONTH(CONT.`fechainicio`) = 09 THEN '30' 	-- SETIEMBRE
	 WHEN MONTH(CONT.`fechainicio`) = 10 THEN '31' 	-- OCTUBRE
	 WHEN MONTH(CONT.`fechainicio`) = 11 THEN '30' 	-- NOVIEMBRE
	 WHEN MONTH(CONT.`fechainicio`) = 12 THEN '31' 	-- DICIEMBRE
	END) *  DAY(CONT.`fechainicio`),0) AS 'descuento'
	FROM contratos	CONT
	INNER JOIN direcciones  DIR 	ON DIR.`iddireccion` = CONT.`iddireccion`
	INNER JOIN clientes	CLI 	ON CLI.`idcliente` 	= CONT.`idcontrato`
	INNER JOIN personas 	PER 	ON PER.`idpersona` 	= CLI.`idpersona`
	INNER JOIN planes 	PLAN 	ON PLAN.`idplan` 	= CONT.`idplan`
	LEFT JOIN  pagos 	PAG 	ON PAG.`idcontrato` 	= CONT.`idcontrato`
	WHERE PAG.`mespago` IS  NULL;
END $$