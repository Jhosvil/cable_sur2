CREATE DATABASE demofile;
USE demofile;


CREATE TABLE distritos
(
	iddistrito INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	distrito   VARCHAR(45) NOT NULL,
	CONSTRAINT uk_dist UNIQUE(distrito)
)ENGINE = INNODB;

INSERT INTO distritos (distrito) VALUES 
('Pueblo nuevo'),
('Chincha alta'),
('Grocio prado'),
('Chincha baja'),
('Sunampe');

SELECT * FROM distritos;

CREATE TABLE usuarios 
(
	idusuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	apellidos VARCHAR(30)  NOT NULL,
	iddistrito INT 				NOT NULL,
	nombres   VARCHAR(30)  NOT NULL,
	foto 			VARCHAR(200)	NULL,
	estado 		BIT 					NOT NULL DEFAULT 1,
	CONSTRAINT fk_iddist FOREIGN KEY(iddistrito) REFERENCES distritos (iddistrito)
)ENGINE = INNODB;


INSERT INTO usuarios (iddistrito, apellidos, nombres) VALUES
(1, 'Morales samuel', 'Eduardo'),
(2, 'Gonzales', 'Luis'),
(2, 'Hurtado', 'Martin'),
(2, 'salazar', 'maria'),
(1, 'Magallanes', 'pedro');

SELECT * FROM usuarios;


DELIMITER $$
CREATE PROCEDURE spu_distritos_listar()
BEGIN
	SELECT * FROM distritos;
END $$

DELIMITER $$
CREATE PROCEDURE spu_usuarios_getdata(IN _idusuario INT)
BEGIN
	SELECT * FROM usuarios WHERE idusuario = _idusuario;
END $$


DELIMITER $$
CREATE PROCEDURE spu_usuarios_listar()
BEGIN
	SELECT * FROM usuarios WHERE estado = 1;
END $$

DELIMITER $$
CREATE PROCEDURE spu_usuarios_registrar
(
	IN _iddistrito INT,
	IN _apellidos  VARCHAR(30),
	IN _nombres VARCHAR(30),
	IN _foto 		VARCHAR(200)
)
BEGIN

	INSERT INTO usuarios (iddistrito, apellidos, nombres, foto)
	 VALUES(_iddistrito, _apellidos, _nombres, _foto);
END $$

DELIMITER $$
CREATE PROCEDURE spu_usuarios_eliminar
(
	IN _idusuario INT
)
BEGIN
		UPDATE usuarios SET 
			estado = 0
			WHERE idusuario = _idusuario;
END $$

DELIMITER $$
CREATE PROCEDURE spu_usuarios_modificar
(
	IN _idusuario INT,
	IN _iddistrito INT,
	IN _apellidos  VARCHAR(30),
	IN _nombres VARCHAR(30),
	IN _foto 		VARCHAR(200)
)
BEGIN
	UPDATE usuarios SET 
		iddistrito = _iddistrito,
		apellidos = _apellidos,
		nombres = _nombres,
		foto = _foto
	WHERE idusuario = _idusuario;
END $$

CALL spu_usuarios_listar();
CALL spu_usuarios_modificar(9, 3, 'Unoo', 'jkjjjj', 'rtrhtrhrthtr');