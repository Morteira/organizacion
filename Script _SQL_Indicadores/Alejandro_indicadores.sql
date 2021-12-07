-------------------------------------- indicador 1 --------------------------------------------------------
select convert( ((total-cogs)/total)*100 , decimal(4,2) )as porcentaje ,lp.linea_producto,lp.id
from ventas as v
join lineaproducto as lp on v.lineaProducto_id = lp.id
group by v.lineaProducto_id 

-------------------------------------- indicador 2 --------------------------------------------------------
SET @venta := (SELECT COUNT(id) FROM ventas);
select convert( (count(v.tipoPago_id)*100)/@venta  , decimal(4,2) )as cantidadTp ,tp.tipo_pago, tipo_cliente
from ventas as v
join tipocliente as tc on v.tipoCliente_id = tc.id
join tipopago as tp on v.tipoPago_id = tp.id
group by v.tipoPago_id,v.tipoCliente_id
order by v.tipoCliente_id,cantidadTP desc

-- el primer resultado de cada tipo cliente son la forma preferidos por cada tipo de cliente

-------------------------------------- indicador 3 --------------------------------------------------------
select sum(c.cantidad) as cantidadLP ,lp.linea_producto
from ventas as c
join lineaproducto as lp on c.lineaProducto_id = lp.id
where tiempo > "17:00" and DAYOFWEEK(c.fecha) = 7 OR DAYOFWEEK(c.fecha) = 1
group by c.lineaProducto_id 
order by cantidadLP desc

