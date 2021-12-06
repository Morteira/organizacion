<?php
require_once "Consultas.php";
class Tablas{
    private $consulta;
    private $clase;
    private $id;

    public function __construct( $clase,  $id=""){
        $this->consulta= new Consultas();
        $this->id=$id;
        $this->clase=$clase;
    }

    public function crearPanel(array $campos,$tablaConsultar,array $condiciones=[],$orden=''){

        $tabla="<table id='".$this->id."' class='".$this->clase."' cellspacing='0' >";
        $tabla.=$this->crearCabecera($campos);
        $tabla.=$this->crearCuerpoTabla($campos,$tablaConsultar,$condiciones,$orden);
        $tabla.="</table>";
        return $tabla;
    }

    private function crearCabecera(array $titulos){
        $tabla="<thead><tr >";
        foreach ($titulos as $key => $value) {
            if(count($value)>2){
                $tabla.="<th class='titulo-tabla' style='width:".$value[1]."'>".$value[0]."</th>";
            }else{
                $tabla.="<th class='titulo-tabla' >".$value[0]."</th>";
            }
        }
        $tabla.="</tr>";
        $tabla.="</thead>";

        return $tabla;
    }

    private function crearCuerpoTabla(array $campos,$tablaBD,array $condiciones=[],$orden=""){

        $tabla = "<tbody id='datosPanel'>";
        $camposT=[];
        array_push($camposT,'id');
        foreach ($campos as $indice => $valor) {
            array_push($camposT,$valor[1]);
        }
        $res = ($this->consulta->consultarDatos($camposT,$tablaBD,$condiciones,$orden));

        foreach ($res as $fila => $registro) {
            $tabla.="<tr  class='datos-tabla' onclick='seleccionarFila($registro[0])' id='$registro[0]' >";
            array_shift($registro);
            foreach ($registro as $indice => $valor) {
                if((is_numeric($valor)) && ($valor[0]!='0')){
                    $tabla.="<td style='text-align:left'>".$valor."</td>";
                }else{
                    $tabla.="<td >".$valor."</td>";
                }
            }
            $tabla.="</tr>";
        }
        $tabla.="</tr>";
        return $tabla."";
    }


}


?>
