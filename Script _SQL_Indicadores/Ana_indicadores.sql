-------------------------------------- indicador 1 --------------------------------------------------------
select avg(clasificacion) as clasificacion,ciudad as nombre
from ventas v join  ciudad c on v.ciudad_id = c.id
group by ciudad_id;

-------------------------------------- indicador 2 --------------------------------------------------------


-- el primer resultado de cada tipo cliente son la forma preferidos por cada tipo de cliente

-------------------------------------- indicador 3 --------------------------------------------------------
select count(v.lineaProducto_id) as cantidadLP, lp.linea_producto, g.genero as nombre
from ventas as v
join genero g  on v.genero_id = g.id
join lineaproducto lp on v.lineaProducto_id = lp.id
where lp.id= "ingresar el id de la linea"
group by genero_id
order by cantidadLP desc;
