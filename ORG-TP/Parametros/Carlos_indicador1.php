<?php
  require_once "Consultas.php";
  $consulta = new ConsultasCliente();

    
  $valores=$consulta->conexion->query('
  select count(lineaproducto_id) as cantidad,sum(total) as total, lp.linea_producto
    from ventas as v
    join lineaproducto lp on v.lineaProducto_id = lp.id
    group by lineaproducto_id;   
  ');
  $valores=$valores->fetchAll(PDO::FETCH_ASSOC);

    
  echo json_encode($valores);
?>