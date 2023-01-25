-- lista de Cobranza
-- ---------------------------------------------
DELIMITER $$
CREATE PROCEDURE lista_de_cobranza()
BEGIN
SELECT 
	DISTINCT CLI.`idcliente`, CONCAT(PER.`nombres`, ' ', PER.`apellidos`) AS 'cliente',
	CONCAT(CONT.`tipodireccion`,' ', DIR.`direccion`, ' ', CONT.`numerodireccion`) AS 'direccion',
	CONCAT(CONT.`codcintillo`, ' ', CONT.`referencia`) AS 'referencia'
	,PER.`telefono` ,PER.`dni`, CONT.`anexo`,
	-- condicion
	IF (PAG1.`mespago` IS NULL && PAG2.`mespago` IS NULL && PAG3.`mespago` IS NULL && PAG4.`mespago` IS NULL 
		&& PAG5.`mespago` IS NULL && PAG6.`mespago` IS NULL && PAG7.`mespago` IS NULL && PAG8.`mespago` IS NULL 
		&& PAG9.`mespago` IS NULL && PAG10.`mespago` IS NULL && PAG11.`mespago` IS NULL && PAG12.`mespago` IS NULL 
		&& OPE.`tipooperacion` = 'Reconexion' || OPE.`tipooperacion` = 'Instalacion',	
	CONCAT(
	CASE
		 WHEN MONTH(OPE.`fechahora`) = 01 AND YEAR(OPE.`fechahora`) = 2023 THEN 'ENERO' 	-- ENERO
		 WHEN MONTH(OPE.`fechahora`) = 02 AND YEAR(OPE.`fechahora`) = 2023 THEN 'FEBRERO' 	-- FEBRERO
		 WHEN MONTH(OPE.`fechahora`) = 03 AND YEAR(OPE.`fechahora`) = 2023 THEN 'MARZO' 	-- MARZO
		 WHEN MONTH(OPE.`fechahora`) = 04 AND YEAR(OPE.`fechahora`) = 2023 THEN 'ABRIL'	-- ABRIL
		 WHEN MONTH(OPE.`fechahora`) = 05 AND YEAR(OPE.`fechahora`) = 2023 THEN 'MAYO' 	-- MAYO
		 WHEN MONTH(OPE.`fechahora`) = 06 AND YEAR(OPE.`fechahora`) = 2023 THEN 'JUNIO' 	-- JUNIO
		 WHEN MONTH(OPE.`fechahora`) = 07 AND YEAR(OPE.`fechahora`) = 2023 THEN 'JULIO' 	-- JULIO
		 WHEN MONTH(OPE.`fechahora`) = 08 AND YEAR(OPE.`fechahora`) = 2023 THEN 'AGOSTO' 	-- AGOSTO
		 WHEN MONTH(OPE.`fechahora`) = 09 AND YEAR(OPE.`fechahora`) = 2023 THEN 'SETIEMBRE' 	-- SETIEMBRE
		 WHEN MONTH(OPE.`fechahora`) = 10 AND YEAR(OPE.`fechahora`) = 2023 THEN 'OCTUBRE' 	-- OCTUBRE
		 WHEN MONTH(OPE.`fechahora`) = 11 AND YEAR(OPE.`fechahora`) = 2023 THEN 'NOVIEMBRE' 	-- NOVIEMBRE
		 WHEN MONTH(OPE.`fechahora`) = 12 AND YEAR(OPE.`fechahora`) = 2023 THEN 'DICIEMBRE' 	-- DICIEMBRE
	END,'-',
	CASE
	 WHEN MONTH(OPE.`fechahora`) = 01 THEN '31' 	-- ENERO
	 WHEN MONTH(OPE.`fechahora`) = 02 THEN '28' 	-- FEBRERO
	 WHEN MONTH(OPE.`fechahora`) = 03 THEN '31' 	-- MARZO
	 WHEN MONTH(OPE.`fechahora`) = 04 THEN '30'	-- ABRIL
	 WHEN MONTH(OPE.`fechahora`) = 05 THEN '31' 	-- MAYO
	 WHEN MONTH(OPE.`fechahora`) = 06 THEN '30' 	-- JUNIO
	 WHEN MONTH(OPE.`fechahora`) = 07 THEN '31' 	-- JULIO
	 WHEN MONTH(OPE.`fechahora`) = 08 THEN '31' 	-- AGOSTO
	 WHEN MONTH(OPE.`fechahora`) = 09 THEN '30' 	-- SETIEMBRE
	 WHEN MONTH(OPE.`fechahora`) = 10 THEN '31' 	-- OCTUBRE
	 WHEN MONTH(OPE.`fechahora`) = 11 THEN '30' 	-- NOVIEMBRE
	 WHEN MONTH(OPE.`fechahora`) = 12 THEN '31' 	-- DICIEMBRE
	END,'-',
	ROUND((PLAN.`precio` / CASE
	 WHEN MONTH(OPE.`fechahora`) = 01 THEN '31' 	-- ENERO
	 WHEN MONTH(OPE.`fechahora`) = 02 THEN '28' 	-- FEBRERO
	 WHEN MONTH(OPE.`fechahora`) = 03 THEN '31' 	-- MARZO
	 WHEN MONTH(OPE.`fechahora`) = 04 THEN '30'	-- ABRIL
	 WHEN MONTH(OPE.`fechahora`) = 05 THEN '31' 	-- MAYO
	 WHEN MONTH(OPE.`fechahora`) = 06 THEN '30' 	-- JUNIO
	 WHEN MONTH(OPE.`fechahora`) = 07 THEN '31' 	-- JULIO
	 WHEN MONTH(OPE.`fechahora`) = 08 THEN '31' 	-- AGOSTO
	 WHEN MONTH(OPE.`fechahora`) = 09 THEN '30' 	-- SETIEMBRE
	 WHEN MONTH(OPE.`fechahora`) = 10 THEN '31' 	-- OCTUBRE
	 WHEN MONTH(OPE.`fechahora`) = 11 THEN '30' 	-- NOVIEMBRE
	 WHEN MONTH(OPE.`fechahora`) = 12 THEN '31' 	-- DICIEMBRE
	END) *  DAY(OPE.`fechahora`),0)), 'no tiene descuento') AS 'mesDiasDesc',
	
	-- Meses
	-- ----------------------
	PAG1.`mespago` AS 'enero', PAG2.`mespago` AS 'febrero'
	, PAG3.`mespago` AS 'marzo', PAG4.`mespago` AS 'abril', PAG5.`mespago` AS 'mayo'
	, PAG6.`mespago` AS 'junio', PAG7.`mespago` AS 'julio', PAG8.`mespago` AS 'agosto'
	, PAG9.`mespago` AS 'setiembre', PAG10.`mespago` AS 'octubre', PAG11.`mespago` AS 'noviembre'
	, PAG12.`mespago` AS 'diciembre'
FROM contratos CONT
LEFT JOIN operaciones OPE 	ON OPE.`idcontrato` 	= CONT.`idcontrato`
INNER JOIN planes  PLAN 	ON PLAN.`idplan` 	= CONT.`idplan`
INNER JOIN clientes CLI 	ON CLI.`idcliente` 	= CONT.`idcliente`
INNER JOIN personas PER 	ON PER.`idpersona` 	= CLI.`idpersona`
INNER JOIN direcciones 	DIR 	ON DIR.`iddireccion` 	= CONT.`iddireccion`
LEFT JOIN  pagos 	PAG 	ON PAG.`idcontrato` 	= CONT.`idcontrato`
LEFT JOIN pagos 	PAG1 	ON PAG1.`mespago` 	= '1' 	AND PAG1.`idcontrato` = CONT.`idcontrato` AND PAG1.`anopago` = '2023'
LEFT JOIN pagos 	PAG2 	ON PAG2.`mespago` 	= '2' 	AND PAG2.`idcontrato` = CONT.`idcontrato` AND PAG2.`anopago` = '2023'
LEFT JOIN pagos 	PAG3 	ON PAG3.`mespago` 	= '3' 	AND PAG3.`idcontrato` = CONT.`idcontrato` AND PAG3.`anopago` = '2023'
LEFT JOIN pagos 	PAG4 	ON PAG4.`mespago` 	= '4' 	AND PAG4.`idcontrato` = CONT.`idcontrato` AND PAG4.`anopago` = '2023'
LEFT JOIN pagos 	PAG5 	ON PAG5.`mespago` 	= '5' 	AND PAG5.`idcontrato` = CONT.`idcontrato` AND PAG5.`anopago` = '2023'
LEFT JOIN pagos 	PAG6 	ON PAG6.`mespago` 	= '6' 	AND PAG6.`idcontrato` = CONT.`idcontrato` AND PAG6.`anopago` = '2023'
LEFT JOIN pagos 	PAG7 	ON PAG7.`mespago` 	= '7' 	AND PAG7.`idcontrato` = CONT.`idcontrato` AND PAG7.`anopago` = '2023'
LEFT JOIN pagos 	PAG8 	ON PAG8.`mespago` 	= '8' 	AND PAG8.`idcontrato` = CONT.`idcontrato` AND PAG8.`anopago` = '2023' 
LEFT JOIN pagos 	PAG9 	ON PAG9.`mespago` 	= '9' 	AND PAG9.`idcontrato` = CONT.`idcontrato` AND PAG9.`anopago` = '2023'
LEFT JOIN pagos 	PAG10 	ON PAG10.`mespago`	= '10'	AND PAG10.`idcontrato` = CONT.`idcontrato` AND PAG10.`anopago` = '2023'
LEFT JOIN pagos 	PAG11 	ON PAG11.`mespago` 	= '11' 	AND PAG11.`idcontrato` = CONT.`idcontrato` AND PAG11.`anopago` = '2023'
LEFT JOIN pagos 	PAG12 	ON PAG12.`mespago` 	= '12'	AND PAG12.`idcontrato` = CONT.`idcontrato` AND PAG12.`anopago` = '2023'
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
SELECT 
	DISTINCT CLI.`idcliente`, CONCAT(PER.`nombres`, ' ', PER.`apellidos`) AS 'cliente',
	CONCAT(CONT.`tipodireccion`,' ', DIR.`direccion`, ' ', CONT.`numerodireccion`) AS 'direccion',
	CONCAT(CONT.`codcintillo`, ' ', CONT.`referencia`) AS 'referencia'
	,PER.`telefono` ,PER.`dni`, CONT.`anexo`,
	-- condicion
	IF (PAG1.`mespago` IS NULL && PAG2.`mespago` IS NULL && PAG3.`mespago` IS NULL && PAG4.`mespago` IS NULL 
		&& PAG5.`mespago` IS NULL && PAG6.`mespago` IS NULL && PAG7.`mespago` IS NULL && PAG8.`mespago` IS NULL 
		&& PAG9.`mespago` IS NULL && PAG10.`mespago` IS NULL && PAG11.`mespago` IS NULL && PAG12.`mespago` IS NULL 
		&& OPE.`tipooperacion` = 'Reconexion' || OPE.`tipooperacion` = 'Instalacion',	
	CONCAT(
	CASE
		 WHEN MONTH(OPE.`fechahora`) = 01 AND YEAR(OPE.`fechahora`) = 2023 THEN 'ENERO' 	-- ENERO
		 WHEN MONTH(OPE.`fechahora`) = 02 AND YEAR(OPE.`fechahora`) = 2023 THEN 'FEBRERO' 	-- FEBRERO
		 WHEN MONTH(OPE.`fechahora`) = 03 AND YEAR(OPE.`fechahora`) = 2023 THEN 'MARZO' 	-- MARZO
		 WHEN MONTH(OPE.`fechahora`) = 04 AND YEAR(OPE.`fechahora`) = 2023 THEN 'ABRIL'	-- ABRIL
		 WHEN MONTH(OPE.`fechahora`) = 05 AND YEAR(OPE.`fechahora`) = 2023 THEN 'MAYO' 	-- MAYO
		 WHEN MONTH(OPE.`fechahora`) = 06 AND YEAR(OPE.`fechahora`) = 2023 THEN 'JUNIO' 	-- JUNIO
		 WHEN MONTH(OPE.`fechahora`) = 07 AND YEAR(OPE.`fechahora`) = 2023 THEN 'JULIO' 	-- JULIO
		 WHEN MONTH(OPE.`fechahora`) = 08 AND YEAR(OPE.`fechahora`) = 2023 THEN 'AGOSTO' 	-- AGOSTO
		 WHEN MONTH(OPE.`fechahora`) = 09 AND YEAR(OPE.`fechahora`) = 2023 THEN 'SETIEMBRE' 	-- SETIEMBRE
		 WHEN MONTH(OPE.`fechahora`) = 10 AND YEAR(OPE.`fechahora`) = 2023 THEN 'OCTUBRE' 	-- OCTUBRE
		 WHEN MONTH(OPE.`fechahora`) = 11 AND YEAR(OPE.`fechahora`) = 2023 THEN 'NOVIEMBRE' 	-- NOVIEMBRE
		 WHEN MONTH(OPE.`fechahora`) = 12 AND YEAR(OPE.`fechahora`) = 2023 THEN 'DICIEMBRE' 	-- DICIEMBRE
	END,'-',
	CASE
	 WHEN MONTH(OPE.`fechahora`) = 01 THEN '31' 	-- ENERO
	 WHEN MONTH(OPE.`fechahora`) = 02 THEN '28' 	-- FEBRERO
	 WHEN MONTH(OPE.`fechahora`) = 03 THEN '31' 	-- MARZO
	 WHEN MONTH(OPE.`fechahora`) = 04 THEN '30'	-- ABRIL
	 WHEN MONTH(OPE.`fechahora`) = 05 THEN '31' 	-- MAYO
	 WHEN MONTH(OPE.`fechahora`) = 06 THEN '30' 	-- JUNIO
	 WHEN MONTH(OPE.`fechahora`) = 07 THEN '31' 	-- JULIO
	 WHEN MONTH(OPE.`fechahora`) = 08 THEN '31' 	-- AGOSTO
	 WHEN MONTH(OPE.`fechahora`) = 09 THEN '30' 	-- SETIEMBRE
	 WHEN MONTH(OPE.`fechahora`) = 10 THEN '31' 	-- OCTUBRE
	 WHEN MONTH(OPE.`fechahora`) = 11 THEN '30' 	-- NOVIEMBRE
	 WHEN MONTH(OPE.`fechahora`) = 12 THEN '31' 	-- DICIEMBRE
	END,'-',
	ROUND((PLAN.`precio` / CASE
	 WHEN MONTH(OPE.`fechahora`) = 01 THEN '31' 	-- ENERO
	 WHEN MONTH(OPE.`fechahora`) = 02 THEN '28' 	-- FEBRERO
	 WHEN MONTH(OPE.`fechahora`) = 03 THEN '31' 	-- MARZO
	 WHEN MONTH(OPE.`fechahora`) = 04 THEN '30'	-- ABRIL
	 WHEN MONTH(OPE.`fechahora`) = 05 THEN '31' 	-- MAYO
	 WHEN MONTH(OPE.`fechahora`) = 06 THEN '30' 	-- JUNIO
	 WHEN MONTH(OPE.`fechahora`) = 07 THEN '31' 	-- JULIO
	 WHEN MONTH(OPE.`fechahora`) = 08 THEN '31' 	-- AGOSTO
	 WHEN MONTH(OPE.`fechahora`) = 09 THEN '30' 	-- SETIEMBRE
	 WHEN MONTH(OPE.`fechahora`) = 10 THEN '31' 	-- OCTUBRE
	 WHEN MONTH(OPE.`fechahora`) = 11 THEN '30' 	-- NOVIEMBRE
	 WHEN MONTH(OPE.`fechahora`) = 12 THEN '31' 	-- DICIEMBRE
	END) *  DAY(OPE.`fechahora`),0)), 'no tiene descuento') AS 'mesDiasDesc',
	
	-- Meses
	-- ----------------------
	PAG1.`mespago` AS 'enero', PAG2.`mespago` AS 'febrero'
	, PAG3.`mespago` AS 'marzo', PAG4.`mespago` AS 'abril', PAG5.`mespago` AS 'mayo'
	, PAG6.`mespago` AS 'junio', PAG7.`mespago` AS 'julio', PAG8.`mespago` AS 'agosto'
	, PAG9.`mespago` AS 'setiembre', PAG10.`mespago` AS 'octubre', PAG11.`mespago` AS 'noviembre'
	, PAG12.`mespago` AS 'diciembre'
FROM contratos CONT
LEFT JOIN operaciones OPE 	ON OPE.`idcontrato` 	= CONT.`idcontrato`
INNER JOIN planes  PLAN 	ON PLAN.`idplan` 	= CONT.`idplan`
INNER JOIN clientes CLI 	ON CLI.`idcliente` 	= CONT.`idcliente`
INNER JOIN personas PER 	ON PER.`idpersona` 	= CLI.`idpersona`
INNER JOIN direcciones 	DIR 	ON DIR.`iddireccion` 	= CONT.`iddireccion`
LEFT JOIN  pagos 	PAG 	ON PAG.`idcontrato` 	= CONT.`idcontrato`
LEFT JOIN pagos 	PAG1 	ON PAG1.`mespago` 	= '1' 	AND PAG1.`idcontrato` = CONT.`idcontrato` AND PAG1.`anopago` = '2023'
LEFT JOIN pagos 	PAG2 	ON PAG2.`mespago` 	= '2' 	AND PAG2.`idcontrato` = CONT.`idcontrato` AND PAG2.`anopago` = '2023'
LEFT JOIN pagos 	PAG3 	ON PAG3.`mespago` 	= '3' 	AND PAG3.`idcontrato` = CONT.`idcontrato` AND PAG3.`anopago` = '2023' 
LEFT JOIN pagos 	PAG4 	ON PAG4.`mespago` 	= '4' 	AND PAG4.`idcontrato` = CONT.`idcontrato`AND PAG4.`anopago` = '2023'
LEFT JOIN pagos 	PAG5 	ON PAG5.`mespago` 	= '5' 	AND PAG5.`idcontrato` = CONT.`idcontrato` AND PAG5.`anopago` = '2023'
LEFT JOIN pagos 	PAG6 	ON PAG6.`mespago` 	= '6' 	AND PAG6.`idcontrato` = CONT.`idcontrato` AND PAG6.`anopago` = '2023'
LEFT JOIN pagos 	PAG7 	ON PAG7.`mespago` 	= '7' 	AND PAG7.`idcontrato` = CONT.`idcontrato` AND PAG7.`anopago` = '2023'
LEFT JOIN pagos 	PAG8 	ON PAG8.`mespago` 	= '8' 	AND PAG8.`idcontrato` = CONT.`idcontrato` AND PAG8.`anopago` = '2023'
LEFT JOIN pagos 	PAG9 	ON PAG9.`mespago` 	= '9' 	AND PAG9.`idcontrato` = CONT.`idcontrato` AND PAG9.`anopago` = '2023'
LEFT JOIN pagos 	PAG10 	ON PAG10.`mespago`	= '10'	AND PAG10.`idcontrato` = CONT.`idcontrato` AND PAG10.`anopago` = '2023'
LEFT JOIN pagos 	PAG11 	ON PAG11.`mespago` 	= '11' 	AND PAG11.`idcontrato` = CONT.`idcontrato` AND PAG11.`anopago` = '2023'
LEFT JOIN pagos 	PAG12 	ON PAG12.`mespago` 	= '12'	AND PAG12.`idcontrato` = CONT.`idcontrato` AND PAG12.`anopago` = '2023'
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