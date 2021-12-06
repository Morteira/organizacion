<?php
  require_once "Consultas.php";
  $consulta = new ConsultasCliente();

  $tot=$consulta->consultarDatos(['count(id)'],'ventas',[],'');
  $valores=$consulta->conexion->query('
   
    select convert( (count(v.tipoPago_id)*100)/"'.$tot[0][0].'" , decimal(4,2) )as cantidadTp ,tp.tipo_pago
    from ventas as v
    join tipopago as tp on v.tipoPago_id = tp.id
    group by v.tipoPago_id
    
 ');
  $valores=$valores->fetchAll(PDO::FETCH_ASSOC);

  
  echo json_encode($valores);
?>
