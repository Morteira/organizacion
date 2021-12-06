<?php
require_once "Parametros.php";
require_once CARPETA_PARAMETROS."/Tablas.php";
class TablaCliente extends Tablas{
    public function __construct($clase,$id){
        /*
            CONSTRUCTOR DE LA CLASE CONSULTAS, SIRVE PARA INSTANCIAR (CREAR) UN OBJETO DEL TIPO Consultas
            $objetoConsultas = new Consultas();
        */
        parent::__construct($clase,$id);
    }
}
