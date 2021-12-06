
<!DOCTYPE html>

    <?php
        include("Parametros/Tablas.php");
        require_once "Parametros/Consultas.php";
        require_once "Parametros/Parametros.php";  
        $consulta = new ConsultasCliente();
        $panel = new TablaCliente("table table-bordered table-hover table-sm table-striped", "panel");  
        $campos = [
            ['ID', 'id'],
            ['Linea Producto', 'linea_producto'],
        ];
        $campos1 = [
            ['ID', 'id'],
            ['Tipo Cliente', 'tipo_cliente'],
        ];
        $campos2 = [
            ['ID', 'id'],
            ['Ciudad', 'ciudad'],
        ];

        $campos3 = [
            ['ID', 'id'],
            ['Genero', 'genero'],
        ];
        $campos4 = [
            ['ID', 'id'],
            ['Sucursal', 'sucursal'],
        ];
        $campos5 = [
            ['ID', 'id'],
            ['Tipo Pago', 'tipo_pago'],
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
                    
                        <li><a href="#logo">Home</a></li>
                        <li><a href="#producto">Linea Producto</a></li>
                        <li><a href="#ciudad">Ciudad</a></li>
                        <li><a href="#sucursal">Sucursal</a></li>
                        <li><a href="#pago">Tipo Pago</a></li>
                        <li><a href="#cliente">Tipo Cliente</a></li>
                        <li><a href="#genero"></i>Genero</a></li>
                        <li><a href="./ventas.php"></i>Ventas</a></li>
                        <li><a href="./Ale_Indicadores_form.php"></i>Ale</a></li>
                        <li><a href="./Ana_Indicadores_form.php"></i>Ana</a></li>
                        <li><a href="./Carlos_Indicadores_form.php"></i>Carlos</a></li>
                    </ul>
                </nav>
            </header>

        </section>    
        <section id="producto" class="content">
            <h2><b>Linea de Productos</b></h2>
            <div class="container tabla">
                <div class="row">
                    <div class="col-md-12">
                        <?php                                
                            echo $panel->crearPanel($campos,'lineaproducto');    
                        ?>
                    </div>
                </div>
            </div>
        </section>   
        
        <section id="ciudad" class="content">
            <h2><b>Ciudad</b></h2>
            <div class="container tabla">
                <div class="row">
                    <div class="col-md-12">
                        <?php                              
                         
                            echo $panel->crearPanel($campos2,'ciudad');    
                       
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="sucursal" class="content">
            <h2><b>Sucursal</b></h2>
            <div class="container tabla">
                <div class="row">
                    <div class="col-md-12">
                        <?php                              
                         
                            echo $panel->crearPanel($campos4,'sucursal');    
                       
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="pago" class="content">
            <h2><b>Tipo Pago</b></h2>
            <div class="container tabla">
                <div class="row">
                    <div class="col-md-12">
                        <?php                              
                         
                            echo $panel->crearPanel($campos5,'tipopago');    
                       
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="cliente" class="content">
            <h2><b>Tipo Cliente</b></h2>
            <div class="container tabla">
                <div class="row">
                    <div class="col-md-12">
                        <?php                              
                         
                            echo $panel->crearPanel($campos1,'tipocliente');    
                       
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="genero" class="content">
            <h2><b>Genero</b></h2>
            <div class="container tabla">
                <div class="row">
                    <div class="col-md-12">
                        <?php                              
                         
                            echo $panel->crearPanel($campos3,'genero');    
                       
                        ?>
                    </div>
                </div>
            </div>
        </section>

       

    </body>
</html>