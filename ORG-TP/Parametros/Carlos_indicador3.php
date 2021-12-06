<?php
  require_once "Consultas.php";
  $consulta = new ConsultasCliente();

    
  $valores=$consulta->conexion->query('
    select sum(total) as total, lp.linea_producto,v.fecha
    from ventas as v
    join lineaproducto lp on v.lineaProducto_id = lp.id
    where lp.id="'.$_POST['id'].'" and fecha= date_add("'.$_POST['fecha'].'", INTERVAL 1 DAY) 
    UNION
    select sum(total) as total, lp.linea_producto,v.fecha
    from ventas as v
    join lineaproducto lp on v.lineaProducto_id = lp.id
    where lp.id="'.$_POST['id'].'" and fecha= date_add("'.$_POST['fecha'].'", INTERVAL -1 DAY)
        
  ');
  $valores=$valores->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($valores);
?>
