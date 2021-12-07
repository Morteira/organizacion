<?php
  require_once "Consultas.php";
  $consulta = new ConsultasCliente();

    
  $valores=$consulta->conexion->query('
    
    select avg(clasificacion) as clasificacion,ciudad as nombre
    from ventas v join  ciudad c on v.ciudad_id = c.id
    group by ciudad_id
        
  ');
  $valores=$valores->fetchAll(PDO::FETCH_ASSOC);

    
  echo json_encode($valores);
?>