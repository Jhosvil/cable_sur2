USE cable_sur;

-- ------------------------------------------------------------------------------------------------------------------------------------------------------
-- ------------------- PROCEDIMIENTOS ALMACENADOS -------------------------------------------------------------------------------------------------------
-- ------------------------------------------------------------------------------------------------------------------------------------------------------
-- UBIGEO
-- ------------------------------------------------------
-- Listar Departamentos
-- --------------------------------------------
DELIMITER $$
CREATE PROCEDURE listar_departamentos()
BEGIN
SELECT * FROM departamentos;
END $$

-- Listar Provincias
-- --------------------------------------------
DELIMITER $$
CREATE PROCEDURE listar_provincias
(
IN _iddepartamento VARCHAR(2)
)
BEGIN
SELECT * FROM provincias WHERE iddepartamento = _iddepartamento ORDER BY idprovincia;
END $$

-- Listar Distritos
DELIMITER $$
CREATE PROCEDURE listar_distritos
(
IN _idprovincia VARCHAR(4)
)BEGIN
 SELECT * FROM distritos WHERE idprovincia = _idprovincia ORDER BY iddistrito;
END $$

CALL listar_distritos('0101')
-- ----------------------------------------------------------------------------------------------------------------------------------------------------
--                                    PERSONAS
-- ----------------------------------------------------------------------------------------------------------------------------------------------------
-- Listar
-- --------------------------------
DELIMITER $$
CREATE PROCEDURE listar_personas()
BEGIN
 SELECT personas.`idpersona`, distritos.`nombredistrito`, personas.`nombres`, personas.`apellidos`, 
	personas.`dni`, personas.`telefono`, personas.`email` 
 FROM personas 
 INNER JOIN distritos
 WHERE distritos.`iddistrito` = personas.`iddistrito`
 ORDER BY idpersona DESC;
END$$

CALL listar_personas()


-- Listar un dato
-- ---------------------------------
DELIMITER $$
CREATE PROCEDURE listar_one_dato_persona
(
IN _idpersona INT
)
BEGIN
 SELECT * FROM personas WHERE idpersona = _idpersona;
END $$

CALL listar_one_dato_persona();

-- registrar
-- ---------------------------------------------------
DELIMITER $$
CREATE PROCEDURE registrar_personas
(
	IN 	_iddistrito	VARCHAR(6),
	IN 	_nombres 	VARCHAR(50),
	IN 	_apellidos 	VARCHAR(50),
	IN 	_dni 		CHAR(8),
	IN 	_telefono 	CHAR(11),
	IN 	_email 		VARCHAR(50)
)
BEGIN
	IF _email = '' THEN SET _email = NULL; END IF;

INSERT INTO personas(iddistrito,nombres, apellidos, dni, telefono, email)
	VALUES(_iddistrito,_nombres, _apellidos, _dni, _telefono, _email);
END $$

CALL registrar_personas ("050501","Smith", "Morales Jeri", "12345679", "123456789", "");
SELECT * FROM personas

-- ---------------------------------------------------------------------------------------------
-- modificar personas
-- ----------------------------------
DELIMITER $$
CREATE PROCEDURE modificar_personas
(
IN 	_idpersona 	INT,
IN 	_nombres 	VARCHAR(50),
IN 	_apellidos 	VARCHAR(50),
IN 	_dni 		CHAR(8),
IN 	_telefono 	CHAR(11),
IN 	_email 		VARCHAR(50)
)
BEGIN
UPDATE personas SET
	nombres 	= 	_nombres,
	apellidos 	= 	_apellidos,
	dni 		= 	_dni,
	telefono 	= 	_telefono,
	email 		= 	_email
	
	WHERE idpersona = _idpersona;
END $$

CALL modificar_personas (5,"jhon", "Morales Jeri", "12345679", "123456789", "jhon@gmail.com");


SELECT * FROM usuarios

-- ---------------------------------------------------------------------------------------------
-- USUARIOS ------------------------------------------------------------------------------------
-- ---------------------------------------------------------------------------------------------
-- Login
DELIMITER $$
CREATE PROCEDURE spu_usuarios_login
(
  IN _nombreusuario VARCHAR(50)
)
BEGIN
SELECT 	usuarios.`idusuario`, personas.`apellidos`, personas.`nombres`, personas.`dni`,
	personas.`email`, personas.`telefono`, usuarios.`nombreusuario`,
	usuarios.`rol`, usuarios.`fecharegistro`, usuarios.`claveacceso`, usuarios.`fechabaja`
FROM usuarios
INNER JOIN personas
ON personas.idpersona = usuarios.idpersona
WHERE nombreusuario = _nombreusuario AND estado = 1;
END $$

CALL spu_usuarios_login("corina12");


-- Registrar Usuarios
-- ----------------------------------------
DELIMITER $$
CREATE PROCEDURE registrar_usuarios
(
	IN 	_idpersona 	INT,
	IN 	_nombreusuario 	VARCHAR(50),
	IN 	_claveacceso 	VARCHAR(100),
	IN 	_rol 	        VARCHAR(50)
)
BEGIN
INSERT INTO usuarios(idpersona, nombreusuario, claveacceso, rol)
	VALUES(_idpersona, _nombreusuario, _claveacceso, _rol);

END $$
CALL registrar_usuarios('1', 'smith12', '$2Y$10$GW8sr/KicRQ0hQODwUVmZ.v852FhfE01vNeANc5LzMUH6QeR4JztG', 'Administrador')

UPDATE usuarios SET claveacceso = '$2y$10$BvMvL.Us6KO8ww.ne.Kcme5XNvjXG6GUXWCEjLQR5AkF9tDGRsxPm';

SELECT * FROM usuarios

-- listar usuarios activos
-- ---------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE listar_usuarios_activos()
BEGIN
 SELECT usuarios.`idusuario`, usuarios.`nombreusuario`, usuarios.`claveacceso`,
	usuarios.`rol`, usuarios.`fecharegistro`, personas.`nombres`, personas.`apellidos`,
	personas.`dni`, personas.`telefono`, personas.`email`
  FROM usuarios
 INNER JOIN personas
 ON usuarios.`idpersona` = personas.`idpersona` 
 AND usuarios.`estado` = '1';
END $$

CALL listar_usuarios_activos

-- listar one usuario
-- ------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE listar_one_usuario
(
  IN _idusuario INT
)
BEGIN
SELECT * FROM usuarios WHERE idusuario = _idusuario AND estado = '1';
END $$

CALL listar_one_usuario ('1')

-- Modificar Usuario
-- -------------------------------------------
DELIMITER $$ 
CREATE PROCEDURE modificarUsuario
(
 IN _idusuario INT,
 IN _rol	VARCHAR(50)
)
BEGIN
 UPDATE usuarios SET rol = _rol WHERE idusuario = _idusuario;
END$$

CALL modificarUsuario ('1', 'Cobrador')


-- listar usuarios inactivos
DELIMITER $$
CREATE PROCEDURE listar_usuarios_inactivos()
BEGIN
 SELECT usuarios.`idusuario`, usuarios.`nombreusuario`, usuarios.`claveacceso`,
	usuarios.`rol`, usuarios.`fecharegistro`, usuarios.`fechabaja`, personas.`nombres`, personas.`apellidos`,
	personas.`dni`, personas.`telefono`, personas.`email`
  FROM usuarios
 INNER JOIN personas
 ON usuarios.`idpersona` = personas.`idpersona` 
 AND usuarios.`estado` = '0';
END $$

CALL listar_usuarios_inactivos


-- inabilitar un usuario
DELIMITER $$
CREATE PROCEDURE inabilitar_usuarios
(
 IN _idusuario INT
)
BEGIN
	UPDATE usuarios SET estado = '0', fechabaja = NOW()
	WHERE idusuario = _idusuario;
END $$

CALL habilitar_usuarios(2)
SELECT * FROM usuarios

-- habilitar un usuario
DELIMITER $$
CREATE PROCEDURE habilitar_usuarios
(
 IN _idusuario INT
)
BEGIN
	UPDATE usuarios SET estado = '1', fechabaja = NULL
	WHERE idusuario = _idusuario;
END $$