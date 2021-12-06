/////////////////////
// funciones JS 2.0//
/////////////////////
const CARPETA_IMAGENES="/cobranza/KAKUAA/Imagenes/"

function seleccionarFila(id) {
    const COLOR_FILA = "#669ee8";
    $("#datosPanel > tr").each(
        function () {
            this.style = "";
        }
    );
    document.getElementById(id).style.backgroundColor= COLOR_FILA;
    document.getElementById("seleccionado").value=id;
}

/*GENERALES*/
function editar(direccion){
    var sel=document.getElementById('seleccionado').value;
   // alert(sel)
    if((sel=="")||(sel==' ')||(sel==0)){
        popup('Advertencia',"DEBE SELECCIONAR UN ELEMENTO PARA PODER Editarlo");
    }else {
        document.getElementById("formularioMultiuso").action=direccion;
        document.getElementById("formularioMultiuso").submit();
   }
}

/* POPUP'S*/
function popup(simbolo='',mensaje,callback=()=>{}){
    if(document.getElementById("fondo-popup") != null){
        document.body.removeChild(document.getElementById("fondo-popup"));
    }
    var fondo=document.createElement('div');
        fondo.id='fondo-popup'
    var pop=document.createElement('div');
        pop.id="popup";
        pop.className='popup';
    var popImg=document.createElement('div');
        popImg.id="imagenPopup";
        popImg.style='background-image:url("'+seleccionarImagen(simbolo)+'")';//agregar funcion para cargar la imagen seleccionada
    var popMsj=document.createElement('div');
        popMsj.className="mensajePopup";
        popMsj.id="mensajePopup";
        popMsj.innerHTML=mensaje;
        popMsj.readOnly=true;
    var popBoton=document.createElement('input');
        popBoton.type='Button';
        popBoton.id="btPopupAceptar"
        popBoton.className='boton-popup'
        popBoton.value='Aceptar';
        popBoton.addEventListener( 'click', ()=>{
            callback();
            document.body.removeChild(document.getElementById('fondo-popup'));
        });
    fondo.appendChild(pop);
    document.body.appendChild(fondo);
    document.getElementById('popup').appendChild(popImg);
    document.getElementById('popup').appendChild(popMsj);
    document.getElementById('popup').appendChild(popBoton);
}

function  seleccionarImagen(imagen){
    switch (imagen) {
        case 'Error':
            return CARPETA_IMAGENES+'error.png'
            break;
        case 'Advertencia':
            return CARPETA_IMAGENES+'warning.png'
            break;
        default:
            return CARPETA_IMAGENES+'info.png'
    }
}

function popupConfirmacion(simbolo='',mensaje,callbackConfirmar=()=>{},callbackCancelar=()=>{}){
    var fondo=document.createElement('div');
        fondo.id='fondo-popup'
    var pop=document.createElement('div');
        pop.id="popup";
        pop.className='popup';
    var popImg=document.createElement('div');
        popImg.id="imagenPopup";
        popImg.style='background-image:url("'+seleccionarImagen(simbolo)+'")';//agregar funcion para cargar la imagen seleccionada
    var popMsj=document.createElement('div');
        popMsj.className="mensajePopup";
        popMsj.id="mensajePopup";
        popMsj.innerHTML=mensaje;
        popMsj.readOnly=true;
    var popBoton=document.createElement('input');
        popBoton.type='Button';
        popBoton.id="btPopupAceptar"
        popBoton.className='boton-popup'
        popBoton.value='Aceptar';
        popBoton.addEventListener( 'click', ()=>{
            callbackConfirmar();
            document.body.removeChild(document.getElementById('fondo-popup'));
        });
    var popBotonC=document.createElement('input');
        popBotonC.type='Button';
        popBotonC.id="btPopupCancelar"
        popBotonC.className='boton-popup cancelar'
        popBotonC.value='Cancelar';
        popBotonC.addEventListener( 'click', ()=>{
            callbackCancelar();
            document.body.removeChild(document.getElementById('fondo-popup'));
        });
    fondo.appendChild(pop);
    document.body.appendChild(fondo);
    document.getElementById('popup').appendChild(popImg);
    document.getElementById('popup').appendChild(popMsj);
    document.getElementById('popup').appendChild(popBotonC);
    document.getElementById('popup').appendChild(popBoton);
}

/*FUNCIONES AJAX*/
/**
 * Funcion que elimina registros de la BD verificando la existencia del registro en otras tablas relacionadas
 * @param  int id          Identificador de registro
 * @param  string tabla    Nombre de tabla a eliminar
 * @return Object          Promesa
 */
function eliminarDatos(id, tabla,respuesta='') {

    if(id=='' || id==0){
        popup('Error','Debe seleccionar un elemento para eliminarlo');
    }else if(respuesta=='Si'){
        $.post('Parametros/eliminador.php', {cod: id, tabla: tabla})
            .then((test)=>{console.log(test);popup('','Eliminado Correctamente',()=>{window.location=window.location;})})
            .catch((res)=>{popup('Error','Ha ocurrido un error al eliminar el elemento');console.error(res);})
    }else {
        popupConfirmacion('Advertencia','Desea eliminar el elemento seleccionado?',()=>{eliminarDatos(id,tabla,'Si')})
    }
}

function cargarCampos(campos,valores){
    //campos=campos[0];
    //valores=valores[0];
    let input='';
    for (var i = 0; i < campos.length; i++) {
        input=document.getElementById(campos[i]);
        if(input.tagName=='INPUT' || input.tagName=='TEXTAREA'){
            if(input.type=='date'){
                //cargarFechas
            }else{
                input.value=valores[i];
            }
        }else if(input.tagName=="SELECT"){
            for (var opcion of input.childNodes) {
                if(opcion.tagName=='OPTION'){
                    opcion.removeAttribute('selected');
                    if((opcion.value==valores[i]) || ((opcion.value).toUpperCase()==(valores[i]).toUpperCase())){
                        opcion.setAttribute('selected','selected');
                    }
                }
            }
        }
    }
}

function obtenerDatos(campos,tabla,condiciones){
    return $.post('Parametros/buscador.php', {tabla:tabla,campo:campos,condiciones:condiciones});
}
function formatoNumero(n) {
    // formatear numero a 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
}


function formatoMoneda(input, blur) {
    // añade $ al valor, valida el lado decimal
    // y pone el cursor de nuevo en la posición correcta.

    // obtener el valor del input
    var input_val = input.val();

    // no validar un input vacio
    if (input_val === "") { return; }
    // tamaño original
    var original_len = input_val.length;
    // posicion original del cursor
    var caret_pos = input.prop("selectionStart");
    // comprobar si hay decimales
    if (input_val.indexOf(",") >= 0) {

        // obtener la posición del primer decimal
        // esto evita que los múltiples decimales de
        // siendo introducido
        var decimal_pos = input_val.indexOf(",");

        // dividir el número por el punto decimal
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // añadir comas a la izquierda del número
        left_side = formatoNumero(left_side);

        // validar el lado derecho
        right_side = formatoNumero(right_side);

        // En el blur se asegura de que hay 2 números después del decimal
        if (blur === "blur") {
            right_side += "00";
        }

        // Limitar a solo 2 decimales
        right_side = right_side.substring(0, 2);

        // unir el número por .
        input_val = left_side + "," + right_side;

    } else {
        // no se ha introducido ningún decimal
        // añadir comas al número
        // eliminar todos los no dígitos
        input_val = formatoNumero(input_val);
        input_val = input_val;

        // formato final
        if (blur === "blur") {
            input_val += ",00";
        }
    }

    // enviar el string actualizado al input
    input.val(input_val);

    // poner el cursor de nuevo en la posición correcta
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
}

function formatearNumero(numero){
    return new Intl.NumberFormat('es-PY', {style: 'decimal'}).format(numero);
}




/**************************
    FUNCIONES ADICIONALES *
 **************************/

 function MostrarDatos(id, campos, tabla, camposTitulo) {
     if(id=='' || id==0){
         popup('Error','Debe seleccionar un elemento para mostrar');
     }else{
         let condiciones ={'id': id};
         $.post('Parametros/buscador.php', {tabla: tabla, campo:campos, condiciones:condiciones}, function(data){
             popup('',data,()=>{window.location=window.location;});
         });

     }
 }
