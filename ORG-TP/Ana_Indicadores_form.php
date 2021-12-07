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
    Indicador Ana
  </title>
  <link rel="stylesheet" href="<?php echo CARPETA_CSS?>bootstrap/css/bootstrap.css">
  <script src="<?php echo CARPETA_CSS?>bootstrap/js/bootstrap.bundle.js" charset="utf-8"></script>
  <script src="<?php echo CARPETA_JS?>/funciones.js" charset="utf-8"></script>
  <script src="<?php echo CARPETA_JS?>jquery-3.5.1.js" charset="utf-8"></script>
  <link rel="stylesheet" href="../CSS/css_principal.css">
 
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCklXAp6xnGn5kRM57II5CBqSm-xZ-Kdko"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <style media="screen">

      
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

        
        #popupContenido1{
            margin-top: auto;
            width: 400px;
            height:350px;
        }
        #genero {
            background-color: white;
           border: none;
           font-weight: bold
        }
        #linea {
            background-color: white;
           border: none;
           font-weight: bold
        }

        #button{
            height: 30px;
            width: 80px;
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
                    <li><a href="./inde.php">Home</a></li>
                    <li><a href="./ventas.php"></i>Ventas</a></li>
                    <li><a href="./Ale_Indicadores_form.php"></i>Ale</a></li>
                     <li><a href="./Carlos_Indicadores_form.php"></i>Carlos</a></li>
  
                </ul>
            </nav>
    </header>
    <center>

        <div class="container-fluid">
            <h1>Ana Indicadores</h1>
        </div>

    </center>
    <div class="container" >
        <div class="row"  style="margin-left: 2px;">

            <div class="col-md-6">
                <div class="table-responsive">
                    <p>
                        <b>Indicador N°2:</b>
                        Porcentaje  total  de monto de compra por miembro, por ciudad
                    </p>
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="lp" id='lp' value="" list="listaLP" onblur="obtenerCodigo('lp','listaLP','lp_id')" placeholder="seleccione una linea de producto"> <br>
                        <input class="form-control" type="hidden" name="lp_id" id='lp_id' value="" >
                        <datalist id="listaLP" >
                            <?php
                                $con=$consulta->consultarDatos(['linea_producto','id'], 'lineaproducto');
                                foreach($con as $recor){
                                    echo "<option value='".$recor[0]."'>".$recor[1]."</option>";
                                }
                            ?>
                        </datalist>
                    </div>
                    <table  class="table table-bordered table-hover table-sm table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Linea Producto</th>
                                <th scope="col">Genero</th>
                                <th scope="col">Porcentaje</th>
                            </tr>
                        </thead>
                        <tbody id='indicador2' style="overflow-y:auto">
                        </tbody>
                    </table>
                    </center>
                    
                </div>
            </div>

            <div class="col-md-6">
                <div class="table-responsive">
                    <p>
                        <b>Indicador N°3:</b>  
                        Categoría de producto se vende en mayor cantidad por sexo
                    </p>
                    

                    <div class="col-md-6" >
                        <input class="form-control" type="text" name="lp1" id='lp1' value="" list="listaLP1" onblur="obtenerCodigo('lp1','listaLP1','lp_id1')" placeholder="seleccione una linea de producto"> <br>
                        <input class="form-control" type="hidden" name="lp_id1" id='lp_id1' value="" >
                        <datalist id="listaLP1" >
                            <?php
                                $con=$consulta->consultarDatos(['linea_producto','id'], 'lineaproducto');
                                foreach($con as $recor){
                                    echo "<option value='".$recor[0]."'>".$recor[1]."</option>";
                                }
                            ?>
                        </datalist>
                    </div><br>

                    <div class="col-md-2" style="margin-top: -88px; margin-left: 390px;">
                        <input type="button" id="button" value="buscar" onclick="indicador3()"></button>
                    </div><br>
                    
                    <div class="col-md-10">
                        <table  class="table table-bordered table-hover table-sm table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Linea Producto</th>
                                    <th scope="col">Sexo</th>
                                    <th scope="col">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody id='indicador3' style="overflow-y:auto">
                            </tbody>
                        </table>
                    </div>
                    <!-- <p>
                        El tipo de pago preferido por los clientes es:
                        <input type="text" name="linea" id="linea" value="" disabled>
                    </p> --> 
                </div>
            </div>

            <div class="col-md-5">
                <div class="table-responsive">
                    <p>
                        <b>Indicador N°1: </b>
                        Nivel de Experiencia de satisfacción del cliente por ciudad
                    </p>
                    <table  class="table table-bordered table-hover table-sm table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Ciudad</th>
                                <th scope="col">clasificacion</th>
                               
                            </tr>
                        </thead>
                        <tbody id='indicador1' style="overflow-y:auto">
                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>

       
    </div>
</body>

    <script type="text/javascript">
        window.onload = inicializaaar;
       
        function inicializaaar() {
           indicador1()
           
        }

        function obtenerCodigo(id,lista,destino){
            var res='';
            var dep=document.getElementById(id).value
            for(var temp of document.getElementById(lista).childNodes){
                if(typeof temp != 'undefined'){
                    if(temp.value == dep){
                        res=temp.innerHTML;
                        document.getElementById(destino).value=res
                        console.log(res)
                    }
                }
            }

           
            indicador2(res)
            
            
        }

        async function indicador1(){
            let ind1 = JSON.parse(await $.post("./Parametros/Ana_indicador1.php"));
            console.log(ind1)
            actualizarTablaIndicador1(ind1)
        }

        async function indicador2(res){
            console.log(res)
            let ind2 = JSON.parse(await $.post("./Parametros/Ana_indicador2.php",{id :res }));
            console.log(ind2)
            //actualizarTablaIndicador2(ind2)
        }

        async function indicador3(){
            const lp = document.getElementById('lp_id1').value 

            if (lp != '' ) {
                let ind3 = JSON.parse(await $.post("./Parametros/Ana_indicador3.php",{id :lp}));
                console.log(ind3)
                actualizarTablaIndicador3(ind3)
            }else{
                alert("debe selecionar una linea ")
            }
            
        }

        function actualizarTablaIndicador1(ind1){
            $("#indicador1").empty()
           
            for (var dato of ind1) {
                document.getElementById("indicador1").innerHTML += "<tr><td>" + dato.nombre+ "</td> <td>" +dato.clasificacion+"</td></td>";
            }
           
        }

        function actualizarTablaIndicador2(ind2){
            $("#indicador2").empty()
            pos = 0
            mayor = ind2[0].cantidadLP
            indice = pos
            tot1 = 0 
            for (var dato of ind2) {
               tot1 = parseInt(tot1) + parseInt(dato.cantidadLP)
            }
      
            for (var dato of ind2) {
                document.getElementById("indicador2").innerHTML += "<tr><td>" + dato.linea_producto+ "</td> <td>" 
                + dato.nombre+ "</td> <td>"+ dato.cantidadLP+"</td></td>";
                if (mayor < dato.cantidadLP) {
                    indice = pos
                }
                pos++
            }
            document.getElementById("genero").value = ind2[indice].nombre
        }

        function decimal(cant,tot3){
            var numero = (cant*100)/tot3
            var conDecimal = numero.toFixed(2);
            return conDecimal
        }

        function actualizarTablaIndicador3(ind3){
            $("#indicador3").empty()
   
            for (var dato of ind3) {
                document.getElementById("indicador3").innerHTML += "<tr><td>" + dato.linea_producto+ "</td> <td>" 
                + dato.nombre+"</td><td>" + dato.cantidadLP+"</td></td>";
               
            }
        }
      

    </script>
</html>