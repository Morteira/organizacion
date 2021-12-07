<?php
  require_once "Consultas.php";
  $consulta = new ConsultasCliente();

  $tot=$consulta->consultarDatos(['count(id)'],'ventas',[],'');
  $valores=$consulta->conexion->query('
      select convert( (count(v.tipoPago_id)*100)/"'.$tot[0][0].'"  , decimal(4,2) )as cantidadTp ,tp.tipo_pago, tipo_cliente
      from ventas as v
      join tipocliente as tc on v.tipoCliente_id = tc.id
      join tipopago as tp on v.tipoPago_id = tp.id
      group by v.tipoPago_id,v.tipoCliente_id
      order by v.tipoCliente_id,cantidadTP desc
    
    
 ');
  $valores=$valores->fetchAll(PDO::FETCH_ASSOC);

  
  echo json_encode($valores);
?>
