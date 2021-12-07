<?php
  require_once "Consultas.php";
  $consulta = new ConsultasCliente();

  $tot=$consulta->consultarDatos(['sum(total)'],'ventas',[],'');
  $valores=$consulta->conexion->query('
 
    SELECT
       ciudad as nombre, total,
       CONCAT( round( ( (total/"'.$tot[0][0].'" ) * 100 ) ,2) ,'%')  AS porcentaje
      FROM ventas v
      join ciudad c on v.ciudad_id = c.id
      join tipocliente tc on v.tipoCliente_id = tc.id
      group by  v.ciudad_id, v.tipoCliente_id
    
 ');
  $valores=$valores->fetchAll(PDO::FETCH_ASSOC);

  
  echo json_encode($valores);
?>