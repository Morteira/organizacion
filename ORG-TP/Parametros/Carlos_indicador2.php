<?php
  require_once "Consultas.php";
  $consulta = new ConsultasCliente();

    
  $valores=$consulta->conexion->query('
    
    select count(genero_id) as genero, lp.linea_producto, g.genero as nombre
    from ventas as v
    join genero g  on v.genero_id = g.id
    join lineaproducto lp on v.lineaProducto_id = lp.id
    where lp.id= "'.$_POST['id'].'"
    group by genero_id;
        
  ');
  $valores=$valores->fetchAll(PDO::FETCH_ASSOC);

    
  echo json_encode($valores);
?>
