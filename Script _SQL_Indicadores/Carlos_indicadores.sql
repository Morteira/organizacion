-------------------------------------- indicador 1 --------------------------------------------------------

select count(lineaproducto_id) as cantidad,sum(total) as total, lp.linea_producto
from ventas as v
join lineaproducto lp on v.lineaProducto_id = lp.id
group by lineaproducto_id

--- esto despues se divide entre la suma total de cantidad en Carlos_Indicadores_form.php
--- especificamente el la funcion actualizarTablaIndicador1() que se encuentra en la parte de javascript

-------------------------------------- indicador 2 --------------------------------------------------------
select count(genero_id) as genero, lp.linea_producto, g.genero as nombre
from ventas as v
join genero g  on v.genero_id = g.id
join lineaproducto lp on v.lineaProducto_id = lp.id
where lp.id= "colocar el id de la linea de producto"
group by genero_id;

--- esto despues se divide entre la suma total de cantidad en Carlos_Indicadores_form.php
--- especificamente el la funcion actualizarTablaIndicador2() que se encuentra en la parte de javascript

-------------------------------------- indicador 3 --------------------------------------------------------
select sum(total) as total, lp.linea_producto,v.fecha
from ventas as v
join lineaproducto lp on v.lineaProducto_id = lp.id
where lp.id="colocar el id de linea de producto " and fecha= date_add("colocar la fecha que desea", INTERVAL 1 DAY) 
UNION
select sum(total) as total, lp.linea_producto,v.fecha
from ventas as v
join lineaproducto lp on v.lineaProducto_id = lp.id
where lp.id="colocar el id de linea de producto " and fecha= date_add("colocar la fecha que desea", INTERVAL -1 DAY)

