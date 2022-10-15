-- ------------------------------------------------------------------------------------------
--  	CLIENTES
-- ------------------------------------------------------------------------------------------

-- Registrar
-- ------------------------------------------
DELIMITER $$
CREATE PROCEDURE spu_registrar_cliente
(
 IN _idpersona INT,
 IN _idusuarioregistro INT
)
BEGIN
INSERT INTO clientes(idpersona, idusuarioregistro)
VALUES(_idpersona, _idusuarioregistro);
END $$

CALL spu_registrar_cliente("1", "1");

-- Listar
-- ---------------------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE listar_cliente_san_miguel()
BEGIN
SELECT 	clientes.`idcliente`, 
	perC.apellidos AS 'apecliente', perC.nombres AS 'nomcliente', perC.dni,
	perU.apellidos AS 'apeusuario', perU.nombres AS 'nomusuario',
	clientes.`fecharegistro`
	FROM clientes
	INNER JOIN personas perC ON perC.idpersona = clientes.`idpersona`
	INNER JOIN usuarios ON usuarios.`idusuario` = clientes.`idusuarioregistro`
	INNER JOIN personas perU ON perU.idpersona = usuarios.`idpersona`
	WHERE perC.`iddistrito` = '050501' AND clientes.`estado`= '1'; -- San Miguel
END $$

CALL listar_cliente_san_miguel()


DELIMITER $$
CREATE PROCEDURE listar_cliente_morochuco()
BEGIN
SELECT 	clientes.`idcliente`, 
	perC.apellidos AS 'apecliente', perC.nombres AS 'nomcliente', perC.dni,
	perU.apellidos AS 'apeusuario', perU.nombres AS 'nomusuario',
	clientes.`fecharegistro`
	FROM clientes
	INNER JOIN personas perC ON perC.idpersona = clientes.`idpersona`
	INNER JOIN usuarios ON usuarios.`idusuario` = clientes.`idusuarioregistro`
	INNER JOIN personas perU ON perU.idpersona = usuarios.`idpersona`
	WHERE perC.`iddistrito` = '050203' AND clientes.`estado`= '1'; -- distrito Los Morochucos
END $$
-- 050203 los morochucos

-- Desabilitar al cliente activo
-- ----------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE inabilitar_clientes
(
 IN _idcliente INT,
 IN _idusuarioregistro INT
)
BEGIN
	UPDATE clientes SET estado = '0', fechadesabilitado = NOW(), idusuarioregistro = _idusuarioregistro
	WHERE idcliente = _idcliente;
END $$

-- Habilitar a un cliente inactivo
-- ----------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE habilitar_clientes
(
 IN _idcliente INT,
 IN _idusuarioregistro INT
)
BEGIN
	UPDATE clientes SET estado = '1', fechadesabilitado = NULL, idusuarioregistro = _idusuarioregistro
	WHERE idcliente = _idcliente;
END $$

SELECT * FROM clientes	
