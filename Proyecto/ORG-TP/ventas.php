
<!DOCTYPE html>

    <?php
        include("Parametros/Tablas.php");
        require_once "Parametros/Consultas.php";
        require_once "Parametros/Parametros.php";  
        $consulta = new ConsultasCliente();
        $panel = new TablaCliente("table table-bordered table-hover table-sm table-striped", "panel");  
        $campos = [
            ['N° Factura', 'nro_factura'],
            ['Sucursal', '(select sucursal from sucursal where id = sucursal_id)'],
            ['Ciudad', '(select ciudad from ciudad where id = ciudad_id)'],
            ['Tipo Cliente', '(select tipo_cliente from tipocliente where id = tipocliente_id)'],
            ['Genero', '(select genero from genero where id = genero_id)'],
            ['Linea Producto', '(select linea_producto from lineaproducto where id = lineaproducto_id)'],
            ['Precio Unitario', 'precio_unitario'],
            ['Cantidad', 'cantidad'], 
            ['Impuesto 5%', 'impuesto_5'],
            ['Total', 'total'],
            ['Fecha', 'fecha'],
            ['Hora', 'tiempo'],
            ['Tipo Pago', '(select tipo_pago from tipopago where id = tipoPago_id)'],
            ['Cogs', 'cogs'],
            ['% margen bruto', 'por_margen_bruto'],
            ['Ingreso Bruto', 'ingreso_burto'],
            
        ];
       
    ?>
    <script src="<?php echo CARPETA_JS ?>funciones.js" charset="utf-8"></script>
    <script src="<?php echo CARPETA_JS ?>jquery-3.5.1.js" charset="utf-8"></script>
    <link href="../CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/botones.css">
    <link rel="stylesheet" href="../CSS/css_principal.css">
    <link rel="stylesheet" href="<?php echo CARPETA_CSS ?>popup.css">
    <html lang="es" dir="ltr">
    <body>
        
        <header>
            <section>
         
                <label for="toggle-1" class="toggle-menu"><ul><li></li> <li></li> <li></li></ul></label>
                <input type="checkbox" id="toggle-1">

                <nav>
                    <ul>
                    
                        <li><a href="./inde.php">Home</a></li>
                        <li><a href="./Ale_Indicadores_form.php"></i>Ale</a></li>
                        <li><a href="./Ana_Indicadores_form.php"></i>Ana</a></li>
                        <li><a href="./Carlos_Indicadores_form.php"></i>Carlos</a></li>
                    </ul>
                </nav>
            </header>

        </section>   
             
        <?php                                
            echo $panel->crearPanel($campos,'ventas');    
        ?>

    </body>
</html>