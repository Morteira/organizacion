<?php
 session_start();
?>

<!--AUTOR ALEJANDRO CHAVEZ-->
<!--==================================================-->
<!--Tabla: gral_cliente-->

<!DOCTYPE html>

<?php
    require_once "Parametros/Consultas.php";
    require_once "Parametros/Parametros.php";
    $consulta = new ConsultasCliente();

?>

<link href="../CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../CSS/main.css">
<link rel="stylesheet" href="../CSS/botones.css">
<link rel="stylesheet" href="<?php echo CARPETA_CSS ?>popup.css">
<html lang="es" dir="ltr">

<style media="screen">

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

    #popupContenido1{
        margin-top: auto;
        width: 1000px;
        height:650px;
        border-radius: 2%;
    }

    #botonAdvertencia{
        width: 150px;
    }

</style>

<head>
  <meta charset="utf-8">
  <title>
    Indicador Ale
  </title>
  <link rel="stylesheet" href="<?php echo CARPETA_CSS?>bootstrap/css/bootstrap.css">
  <script src="<?php echo CARPETA_CSS?>bootstrap/js/bootstrap.bundle.js" charset="utf-8"></script>
  <script src="<?php echo CARPETA_JS?>/funciones.js" charset="utf-8"></script>
  <script src="<?php echo CARPETA_JS?>jquery-3.5.1.js" charset="utf-8"></script>
  <link rel="stylesheet" href="../CSS/css_principal.css">
 
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCklXAp6xnGn5kRM57II5CBqSm-xZ-Kdko"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <style media="screen">

        .comentario{
            position: relative;
            margin-top: -207px;
            margin-left: 350px;
        }

        .comentario1{
            position: relative;
            margin-top: -207px;
            margin-left: 750px;
            width: 300px;
            height: 205px;
        }

        textarea {
            resize: none;
        }

        .borde {
          border: 2px solid #aaa ;
          border-radius: 15px;
        }

        h5{
            margin-top: 2px;
            margin-left: 15px
        }

        thead{
            background-color: black;
        }

        th {
            color:white ;
            text-align: center;
            width: 20%;
        }

        td{
            text-align: center;
        }

        .border1{
            border-style: solid;
            border-color: red;
        }

        #eliminar{
            width: 70px;
            height: 30px;
            margin-left: 10px;
            color: crimson;
        }

        #editar{
            width: 70px;
            height: 30px;
            margin-left: 10px;
            color: #FFAB33;
        }

        #add{
            color:#11E194;
            width: 70px;
            height: 30px;
            margin-top: 32px;
        }
        .ok{
            color:#11E194;
           background-color: white;
           border: none;
        }
        .dene{
           color:#ce202c;
           background-color: white;
           border: none;
        }

        #estadooo{
            font-weight: bold;
        }

        #analisis{
            color:#11E194;
            width: 70px;
            height: 30px;
            margin-top: 10px;
            background-color: whitesmoke;
        }

        #popupContenido1{
            margin-top: auto;
            width: 400px;
            height:350px;
        }
        #mayor {
            background-color: white;
           border: none;
           font-weight: bold
        }
        #linea {
            background-color: white;
           border: none;
           font-weight: bold
        }
    </style>
</head>
<body>
    <header>
        <section>
         
            <label for="toggle-1" class="toggle-menu"><ul><li></li> <li></li> <li></li></ul></label>
            <input type="checkbox" id="toggle-1">

            <nav>
                <ul>
                    <li><a href="#logo">Home</a></li>
                    <li><a href="./ventas.php"></i>Ventas</a></li>
                    <li><a href="./Ana_Indicadores_form.php"></i>Ana</a></li>
                     <li><a href="./Carlos_Indicadores_form.php"></i>Carlos</a></li>
  
                </ul>
            </nav>
    </header>
    <center>

        <div class="container-fluid">
            <h1>Alejandro Indicadores</h1>
        </div>

    </center>
    <div class="container" >
        <div class="row"  style="margin-left: 2px;">

            <div class="col-md-4">
                <div class="table-responsive">
                    <p>
                        <b>Indicador N°1: </b>
                        Margen de Beneficio por cada linea de producto
                    </p>
                    <table  class="table table-bordered table-hover table-sm table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Linea Producto</th>
                                <th scope="col">% ganancia</th>
                            </tr>
                        </thead>
                        <tbody id='indicador1' style="overflow-y:auto">
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-4">
                <div class="table-responsive">
                    <p>
                        <b>Indicador N°3:</b>  
                        Línea de producto más vendida los fin de semana
                    </p>
                    <table  class="table table-bordered table-hover table-sm table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Linea Producto</th>
                                <th scope="col">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody id='indicador3' style="overflow-y:auto">
                        </tbody>
                    </table>

                    <p>
                        La linea de producto mas vendida los fin de semana es:
                        <input type="text" name="linea" id="linea" value="" disabled>
                    </p>
                    
                </div>
            </div>

            <div class="col-md-3">
                <div class="table-responsive">
                    <p>
                        <b>Indicador N°2:</b>
                        Método de Pago Preferido por tipo de cliente
                    </p>
                    <table  class="table table-bordered table-hover table-sm table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Tipo pago</th>
                                <th scope="col">Porcentaje</th>
                            </tr>
                        </thead>
                        <tbody id='indicador2' style="overflow-y:auto">
                        </tbody>
                    </table>
                    </center>
                    <p>
                        El tipo de pago preferido por los clientes es:
                        <input type="text" name="mayor" id="mayor" value="" disabled>
                    </p>
                </div>
            </div>
           
        </div>
       
    </div>
</body>

    <script type="text/javascript">
        window.onload = inicializaaar;
       
        function inicializaaar() {
           indicador1()
           indicador2()
           indicador3()
        }

        async function indicador1(){
            let ind1 = JSON.parse(await $.post("./Parametros/Ale_indicador1.php"));
            console.log(ind1)
            actualizarTablaIndicador1(ind1)
        }

        async function indicador2(){
            let ind2 = JSON.parse(await $.post("./Parametros/Ale_indicador2.php"));
            console.log(ind2)
            actualizarTablaIndicador2(ind2)
        }

        async function indicador3(){
            let ind3 = JSON.parse(await $.post("./Parametros/Ale_indicador3.php"));
            console.log(ind3)
            actualizarTablaIndicador3(ind3)
        }

        function actualizarTablaIndicador1(ind1){
            $("#indicador1").empty()
            for (var dato of ind1) {
                document.getElementById("indicador1").innerHTML += "<tr><td>" + dato.linea_producto+ "</td> <td>" 
                + dato.porcentaje+"</td></td>";
            }
        }

        function actualizarTablaIndicador2(ind2){
            $("#indicador2").empty()
            pos = 0
            mayor = ind2[0].cantidadTp
            indice = pos
            pos++
            for (var dato of ind2) {
                document.getElementById("indicador2").innerHTML += "<tr><td>" + dato.tipo_pago+ "</td> <td>" 
                + dato.cantidadTp+"</td></td>";
                if (mayor < dato.cantidadTp) {
                    indice = pos
                }
                pos++
            }

            document.getElementById("mayor").value = ind2[indice].tipo_pago
        }

        function actualizarTablaIndicador3(ind3){
            $("#indicador3").empty()
            pos = 0
            mayor = ind3[0].cantidadLP
            indice = pos
            pos++
            for (var dato of ind3) {
                document.getElementById("indicador3").innerHTML += "<tr><td>" + dato.linea_producto+ "</td> <td>" 
                + dato.cantidadLP+"</td></td>";
                if (mayor < dato.cantidadTp) {
                    indice = pos
                }
                pos++
            }
            document.getElementById("linea").value = ind3[indice].linea_producto
        }
      

    </script>
</html>