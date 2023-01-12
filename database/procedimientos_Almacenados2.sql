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


-- Listar clientes inactivos
-- -----------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE listar_clientes_inactivos()
BEGIN
SELECT 	clientes.`idcliente`,
	perC.apellidos AS 'apecliente', perC.nombres AS 'nomcliente', perC.dni,
	perU.apellidos AS 'apeusuario', perU.nombres AS 'nomusuario',
	clientes.`fecharegistro`
	FROM clientes
	INNER JOIN personas perC ON perC.idpersona = clientes.`idpersona`
	INNER JOIN usuarios ON usuarios.`idusuario` = clientes.`idusuarioregistro`
	INNER JOIN personas perU ON perU.idpersona = usuarios.`idpersona`
	WHERE clientes.`estado`= '0'; 
END $$

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

-- -------------------------------------------------------------------------------------------------------------------------------
--                            DIRECCIONES
-- -------------------------------------------------------------------------------------------------------------------------------
-- Registrar
-- -------------
DELIMITER $$
CREATE PROCEDURE spu_registrar_direcciones
(
 IN _direccion VARCHAR(50)
)
BEGIN
INSERT INTO direcciones(direccion)
VALUES(_direccion);
END $$

-- Listar
-- -------------------------
DELIMITER $$
CREATE PROCEDURE spu_listar_direcciones()
BEGIN
SELECT * FROM direcciones WHERE estado = '1';
END $$

-- Eliminar
-- -------------------------
DELIMITER $$
CREATE PROCEDURE spu_eliminar_direccion
(
  IN _iddireccion INT
)
BEGIN
	UPDATE direcciones SET estado = '0' WHERE iddireccion = _iddireccion;
END $$

-- -------------------------------------------------------------------------------------------------------------------------------
--                            PLANES
-- -------------------------------------------------------------------------------------------------------------------------------
-- Registrar
-- --------------------------
DELIMITER $$
CREATE PROCEDURE Registrar_planes
(
IN _nombreplan VARCHAR(50),
IN _descripcion VARCHAR(100),
IN _precio DECIMAL(6,2)
)
BEGIN
INSERT INTO planes (nombreplan, descripcion, precio)
VALUES (_nombreplan, _descripcion, _precio);
END $$

-- Listar planes activos 
-- ----------------------------
DELIMITER $$
CREATE PROCEDURE  listar_planes_activos ()
BEGIN
	SELECT * FROM planes WHERE estado = '1' ; 
END $$

-- listar planes inactivos
-- ----------------------------
DELIMITER $$
CREATE PROCEDURE listar_planes_inactivos ()
BEGIN
	SELECT * FROM planes WHERE estado = '0';
END $$

-- eliminar plan 
-- ----------------------------
DELIMITER $$
CREATE PROCEDURE eliminar_planes
(
IN _idplan INT 
)
BEGIN
	UPDATE planes SET estado = '0' WHERE idplan = _idplan;
END $$

-- habilitar planes
DELIMITER $$
CREATE PROCEDURE habilitar_planes
(
IN _idplan INT 
)
BEGIN
	UPDATE planes SET estado = '1' WHERE idplan = _idplan;
END $$


-- listar un plan
-- -------------------------
DELIMITER $$
CREATE PROCEDURE listar_un_plan
(
IN _idplan INT
)
BEGIN
	SELECT * FROM planes WHERE idplan = _idplan;
END

-- modificar plan 
-- ---------------------------

DELIMITER $$
CREATE PROCEDURE modificar_plan
(
IN _idplan	INT,
IN _nombreplan	VARCHAR(50),
IN _descripcion	VARCHAR(50),
IN _precio	DECIMAL(6,2)
)
BEGIN
UPDATE planes SET
	nombreplan	= _nombreplan,
	descripcion 	= _descripcion,
	precio 		= _precio
	WHERE idplan 	= _idplan;
END

