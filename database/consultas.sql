/*
******************** PERSONAS ***************************************
*/
INSERT INTO personas(idpersona, iddistrito, nombres, apellidos, dni, telefono, email) 
VALUES ( '1','050501','Smith', 'Morales Jeri', '87654321', '987654123', 'smith@gmail.com');

SELECT * FROM personas


/*
******************** USUARIOS ***************************************
*/
INSERT INTO usuarios(idpersona, nombreusuario, claveacceso, rol, fecharegistro, estado) 
VALUES ('1', 'smith12', '$2Y$10$BvMvL.Us6KO8ww.ne.Kcme5XNvjXG6GUXWCEjLQR5AkF9tDGRsxPm', 'administrador', NOW(), '1');

UPDATE usuarios SET claveacceso = '$2y$10$vcwRR0pC4J2OPBe3iTx7gefe4WAOuqevDCDblvDRWsc7/EiXSUIHq'
SELECT * FROM usuarios;

/*
* ****************** DIRECCIONES ***********************************
*/
INSERT INTO direcciones(tipodireccion,direccion)VALUES('comunidad', 'Capillapampa');
SELECT * FROM direcciones 

/*
*******************CLIENTES *****************************************
*/
INSERT INTO clientes(idcliente, idpersona, direccion, referencia, fecharegistro, idusuarioregistro)
VALUES ('2','3', 'san miguel', 'costado del grass neymar y messi', NOW(), '1');

SELECT * FROM clientes

/*
******************* PLANES *****************************************
*/
INSERT INTO planes(idplan, nombreplan, descripcion, precio)
VALUES ('3', 'nivel 3', 'validos para 3 tv', '35',);

USE cable_sur
SELECT * FROM planes


/*
****************** CONTRATOS ****************************************
*/
INSERT INTO contratos (idcontrato, codigo, idcliente, idplan, anexo, fechainicio, fechatermino, diapago)
VALUES ('2', '0002', '1', '2', '0', NOW(), '2022-9-30', '2022-10-01');

SELECT * FROM contratos