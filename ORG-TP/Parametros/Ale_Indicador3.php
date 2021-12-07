<?php
  require_once "Consultas.php";
  $consulta = new ConsultasCliente();

  $valores=$consulta->conexion->query('
   
    select sum(c.cantidad) as cantidadLP ,lp.linea_producto
    from ventas as c
    join lineaproducto as lp on c.lineaProducto_id = lp.id
    where tiempo > "17:00" and DAYOFWEEK(c.fecha) = 7 OR DAYOFWEEK(c.fecha) = 1
    group by c.lineaProducto_id 
    order by cantidadLP desc
    
 ');
  $valores=$valores->fetchAll(PDO::FETCH_ASSOC);

  
  echo json_encode($valores);
?>
