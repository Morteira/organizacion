<?php
require_once "Conexion.php";
class Consultas extends Conexion{

    public function __construct(){
        /*
            CONSTRUCTOR DE LA CLASE CONSULTAS, SIRVE PARA INSTANCIAR (CREAR) UN OBJETO DEL TIPO Consultas
            $objetoConsultas = new Consultas();
        */
        parent::__construct();
        $this->conectar();
    }

    public function consultarDatos( array $campos,  $tabla, array  $condiciones=array(),$orden="",$formato=PDO::FETCH_NUM ){
        $texto=(implode(",", $campos));
        $query="SELECT ".$texto." FROM ".$tabla." ";
        $valores=[];
        if((is_array($condiciones)==TRUE)&&(!(empty($condiciones)))){
            $query.="WHERE ";
            foreach ($condiciones as $indice => $valor) {
                $query.= $indice." = ? AND ";
                array_push($valores,$valor);
            }
            $query = substr($query,0,-4);
        }
        $query.=$orden;
        try {
            $temp=$this->consultar($query,$valores);
            return $temp->fetchAll($formato);
        } catch (\Exception $e) {
            echo $e;
        }

    }
    public function verificarConsultarDatos($campos,$tabla, $condiciones=[],$orden=''){
        $texto=(implode(",", $campos));
        $query="SELECT ".$texto." FROM ".$tabla." ";
        $valores=[];
        if((is_array($condiciones)==TRUE)&&(!(empty($condiciones)))){
            $query.="WHERE ";
            foreach ($condiciones as $indice => $valor) {
                $query.= $indice." =".$valor." AND ";
            }
            $query = substr($query,0,-4);
        }
        $query .= $orden;
        echo "$query";
    }

    public function insertarDatos(array $campos,$tabla){
        $query="INSERT INTO $tabla ";
        $columnas="";
        $interrogaciones="";
        $valores=[];
        foreach ($campos as $indice => $valor) {
            $columnas.= $indice.",";
            $interrogaciones.="?,";
            array_push($valores,$valor);
        }
        $columnas=substr($columnas,0,-1);
        $interrogaciones=substr($interrogaciones,0,-1);
        $query.="(".$columnas.") VALUES (".$interrogaciones.")";
        try {
            $temp=$this->consultar($query,$valores);
            return $temp;
        } catch (\Exception $e) {
            echo $e;
        }
    }
    
    public function eliminarDatos($tabla,array $condiciones){
        $query="DELETE FROM $tabla ";
        $valores=[];
        if((is_array($condiciones)==TRUE)&&(!(empty($condiciones)))){
            $query.="WHERE ";
            foreach ($condiciones as $indice => $valor) {
                $query.= $indice." = ? &&";
                array_push($valores,$valor);
            }
            $query = substr($query,0,-2);
        }
        try {
            $temp=$this->consultar($query,$valores);
            return $temp;
        } catch (\Exception $e) {
            echo $e;
        }
    }

   
    public function modificarDatos(array $campos,$tabla,$condiciones){
        $query=" UPDATE ".$tabla." SET ";
        $interrogaciones="";
        $valores=[];
        $columnas='';
        $condicion="";
        foreach ($campos as $indice => $valor) {
            $columnas.= $indice."= ? ,";
            array_push($valores,$valor);
        }
        $columnas=substr($columnas,0,-1);
        foreach($condiciones as $indice =>$valor){
            $condicion.=$indice ."=? &&";
            array_push($valores,$valor);
        }
        $condicion=substr($condicion,0,-2);
        $query.=" ".$columnas."  WHERE ".$condicion;

        try {
            $temp=$this->consultar($query,$valores);
            return $temp;
        } catch (\Exception $e) {
            echo $e;
        }
    }

   
}

?>
