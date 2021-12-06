<?php
require_once "Parametros.php";
require_once CARPETA_PARAMETROS."Consultas.php";
class ConsultasCliente extends Consultas{
    public function __construct(){
        /*
            CONSTRUCTOR DE LA CLASE CONSULTAS, SIRVE PARA INSTANCIAR (CREAR) UN OBJETO DEL TIPO Consultas
            $objetoConsultas = new Consultas();
        */
        parent::__construct();
    }
}
