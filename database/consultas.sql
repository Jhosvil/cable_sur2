/*
******************** PERSONAS ***************************************
*/
INSERT INTO personas(idpersona, nombres, apellidos, dni, telefono, email) 
VALUES ( '4','Vilma', 'Jeri Palomina', '87654321', '987654123', 'vilma@gmail.com');

SELECT * FROM personas

/*
******************** USUARIOS ***************************************
*/
INSERT INTO usuarios(idusuario, idpersona, nombreusuario, claveacceso, rol, fecharegistro, estado) 
VALUES ( '2','2', 'corina12', '123', 'administrador', NOW(), '1');

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