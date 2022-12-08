<?php

require("./conexion.php");

    $data = json_decode(file_get_contents('php://input'), true);  
       $id_productos= $data['id_productos'];
       $conexion = new Conexion();
       $db = $conexion->getConexion();
       $query = "DELETE FROM puestecitos WHERE id_productos=:id_productos";
       $statement = $db->prepare($query);
       $statement->bindParam(':id_productos', $id_productos);
       $result = $statement->execute();
       if($result){
         return "removed";
       }
       return "error!";
?>