-- Listar datos personales del cliente por dni
-- -------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE listar_datos_personales_del_cliente
(
	IN _dni INT
)
BEGIN
	SELECT 	CLI.`idcliente`, CONCAT(PER.`apellidos`, ' ', PER.`nombres`) AS 'cliente',
		PER.`dni`, CONCAT(CONT.`tipodireccion`,' ' ,DIR.`direccion`, ' ', CONT.`numerodireccion`) AS 'direccion',
		CONT.`referencia`, CONT.`codcintillo`, CONT.`codsuministro`
	FROM contratos 	CONT
	INNER JOIN direcciones 	DIR ON DIR.`iddireccion` 	= CONT.`iddireccion`
	INNER JOIN clientes 	CLI ON CLI.`idcliente` 	 	= CONT.`idcliente`
	INNER JOIN personas 	PER ON PER.`idpersona` 		= CLI.`idpersona`
	WHERE PER.`dni` = _dni AND CLI.`estado` = '1';
END $$

CALL listar_pagos_cliente_unico(70671234)

-- Listar pagos del cliente por dni
-- -------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE listar_pagos_cliente_unico
(
	IN _dni INT
)
BEGIN
	SELECT 	CONCAT(PER.`apellidos`, ' ', PER.`nombres`) AS 'cliente', 
		CONCAT(PAG.`anopago`,'/' , PAG.`mespago`) AS 'mespago',
		PAG.`fechapago`, PAG.`netopagar`, PAG.`idpago`
	FROM pagos PAG
	INNER JOIN contratos CONT 	ON CONT.`idcontrato` 	= PAG.`idcontrato`
	INNER JOIN clientes CLI 	ON CLI.`idcliente` 	= CONT.`idcliente`
	INNER JOIN personas PER 	ON PER.`idpersona` 	= CLI.`idpersona`
	WHERE PER.`dni` = _dni AND CLI.`estado` = '1'; 
END $$