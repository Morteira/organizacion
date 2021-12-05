<?php

class Conexion {
    const HOST = "mysql:host=localhost;port=3306;dbname=organizaciontp";
    const USER = "root";
    const PASS = "12345";
    //const HOST = "mysql:host=127.0.0.1,port=3306;dbname=informaticatp";

       
    public $conexion;

    public function __construct(){

    }
    
    public function conectar(){
        try {
            $this->conexion= new PDO(self::HOST,self::USER,self::PASS);
        } catch (PDOException $e) {
            print "ERROR EN CONEXION ->".$e->getMessage()."</br>";
            die();
        }finally{
            //echo "conectado";
        }
    }
   
    public function consultar($query,$datos){
        $temp=$this->conexion->prepare($query);
    
        try {
            $res = $temp->execute($datos);
        } catch (PDOException $e) {
            print("error ");
            throw new PDOExceptions("Error Processing Request", 1);

        }finally{
            if($res==TRUE){
                return $temp;
            }else{
                return $res;
            }
        }
    }
}
