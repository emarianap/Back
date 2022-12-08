<?php
require ("conexion.php");
require("cors.php");

$data=json_decode(file_get_contents('php://input'),true);

$id_productos = $data['id_productos'];
$producto = $data['producto'];
$Descripcion = $data['Descripcion'];
$conexion = new Conexion();
$query = "INSERT INTO productos (id_productos, producto, Descripcion ) VALUES(:id_productos, :producto, :Descripcion)";
$db = $conexion->getConexion();
$statement = $db->prepare($query);
$statement->bindParam(":id_productos", $id_productos);
$statement->bindParam(":producto", $producto);
$statement->bindParam(":Descripcion", $Descripcion);


$result = $statement->execute();
if ($result) {
    return "Dado de alta correctamente";
}
return "ERROR";
?>