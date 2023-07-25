CREATE VIEW V_PRODUCTOS AS 
	SELECT p.*, m.nombre as marca
	FROM productos p
	    INNER JOIN marcas m ON p.idmarcas = m.idmarcas
