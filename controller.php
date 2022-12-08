<?php
    class Controller{
        public function GetProducts(){
            try{
                $list=array();
                $conexion= new conexion();
                $db=$conexion->getConexion();
                $query ="SELECT * FROM productos";
                $statement = $db -> prepare($query);
                $statement ->execute();


                while($row =$statement->fetch()){
                    $list[]=array(  
                        "id_productos" => $row['id_productos'],
                        "producto" => $row['producto'],
                        "Descripcion" => $row['Descripcion']
                    );
                }
                return $list;
            }
            catch(PDOException $e)
            {
                echo("error");
            }
        }

        public function addProducts($data)
        {
                    try{
                    $id_productos = $data['id_productos'];
                    $producto = $data['producto'];
                    $descripcion = $data['Descripcion'];
                    $conexion = new Conexion();
                    $db = $conexion->getConexion();
                    $query = "INSERT INTO productos (id_productos, producto, Descripcion) VALUES (:name,:id_productos,:productos,:Descripcion)";
                    $statement = $db->prepare($query);
                    $statement->bindParam(":id_productos", $id_productos);
                    $statement->bindParam(":producto", $producto);
                    $statement->bindParam(":Descripcion", $descripcion);
                    $result = $statement->execute();
                    if($result){
                       return "successfully";
                    }
                     return "error!";
              
                   } 
                   catch (PDOException $e) {
                    echo "¡Error!: " . $e->getMessage() . "<br/>";
                 }
    
    
    
            
        }

    }
?>