<?php
    class conexion{
        public static function getConexion(){
            $server="localhost";
            $db = "puestecitos";
            $user="root";
            $password="";
            $con="";


            try{
                $con=new PDO("mysql:host=$server;dbname=$db",$user,$password);
                //echo "Se concecto de manera correcrat la conexion";
            }
            catch(PDOException $exp){
                echo ("no se logro conectar correctamente");
            } 
            return $con;
        }

    }
?>