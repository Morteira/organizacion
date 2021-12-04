<!DOCTYPE html>
    <style media="screen">
        .titulo-tabla {
            background-color:#f0ffff;
            color: #ff9800;
            padding: 5px;
        }

        .cuerpo-tabla {
            font-size: 230%;
        }

        .campo-tener-cuenta {
            font-size: 130%;
            margin-top: 20px;
            width: 90%;
            margin-bottom: 5px;
        }

        .contenedor-tabla-panel {
            height: 82vh;
            overflow-y: auto;
            width: 100%;
        }

        table#panel-categoria {
            width: 100%;
        }

        .buscador {
            border: none;
        }

        .advertencia1 {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: black;
            background-color: rgba(0,0,0,0.5);
        }

        .advertencia2 {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: black;
            background-color: rgba(0,0,0,0.5);
        }

        .advertencia3 {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: black;
            background-color: rgba(0,0,0,0.5);
        }

        body {
            font-family: 'Ubuntu', sans-serif;
        }

        .advertencia {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: black;
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>

<html lang="en" dir="ltr">
    <head>
        <?php
            session_start();
            include("Parametros/Tablas.php");
            require_once "Parametros/Consultas.php";
            require_once "Parametros/Parametros.php";
            
            $consulta = new ConsultasCliente();
            $panel = new TablaCliente("table table-bordered table-hover table-sm table-striped", "panel");
           
            $campos = [
                ['ID', 'id'],
                ['Genero', 'genero'],
            ];

        ?>
        <meta charset="utf-8">
        <title>Alumnos</title>
        <script src="<?php echo CARPETA_JS ?>funciones.js" charset="utf-8"></script>
        <script src="<?php echo CARPETA_JS ?>jquery-3.5.1.js" charset="utf-8"></script>
        <link rel="stylesheet" href="<?php echo CARPETA_CSS ?>popup.css">
        <link rel="stylesheet" href="../CSS/bootstrap/css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../CSS/main.css">
        <link rel="stylesheet" href="../CSS/botones.css">
    </head>

    <body>

        <center>
            <form id="formularioMultiuso" action="" method="post">
                <input type="hidden" name="seleccionado" id="seleccionado" value="0">
            </form>

            <div class="container-fluid cabecera">
                <h1>Panel de Alumnos</h1>
            </div>
        
           
            <!-- Se imprime el panel con los campos previamente definidos mas arriba y el nombre de la tabla -->
            <div class="container tabla">
                <div class="row">
                    <div class="col-md-12">
                        <?php                              
                         
                            echo $panel->crearPanel($campos,'genero');    
                       
                        ?>
                    </div>
                </div>
            </div>
        </center>  
    </body>

    <!-- Elimina el regitsro seleccionado, enviando el id a Parametros/Eliminador.php --> 
    <script type="text/javascript">
        
      
    </script>

</html>
