-- -----------------------------------------------------------------------------
-- 						ESTADISTICA 
-- -----------------------------------------------------------------------------
--
-- Total de clientes
-- ---------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE total_De_clientes()
BEGIN
	SELECT COUNT(idcliente) AS 'totalCliente' FROM clientes WHERE estado = '1';
END $$

CALL total_De_clientes()

-- Total de clientes x distrito
-- -------------------------------------------------------------------------------------
DELIMITER $$
CREATE PROCEDURE total_clientes_x_distrito()
BEGIN
	SELECT DIST.`nombredistrito` AS 'distrito', COUNT(DIST.`nombredistrito`) AS 'total'
	FROM clientes CLI
	INNER JOIN personas PER 	ON PER.`idpersona` = CLI.`idpersona`
	LEFT JOIN distritos DIST 	ON DIST.`iddistrito` = PER.`iddistrito`
	GROUP BY (DIST.`nombredistrito`);
END $$





DELIMITER $$
CREATE PROCEDURE spu_graficos_proveedores_listar()
BEGIN
	SELECT YEAR (fecharegistro) AS 'fecha',COUNT(*) AS 'cantidad' FROM proveedores
	GROUP BY YEAR(fecharegistro);
END $$
SELECT * FROM proveedores	

SELECT * FROM proveedores
