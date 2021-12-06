<?php
  require_once "Consultas.php";
  $consulta = new ConsultasCliente();

    
  $valores=$consulta->conexion->query('
    
    select convert( ((total-cogs)/total)*100 , decimal(4,2) )as porcentaje ,lp.linea_producto,lp.id
    from ventas as v
    join lineaproducto as lp on v.lineaProducto_id = lp.id
    group by v.lineaProducto_id 
      
  ');
  $valores=$valores->fetchAll(PDO::FETCH_ASSOC);

    
  echo json_encode($valores);
?>
