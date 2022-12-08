<?php
    require_once('conexion.php');
    require_once('controller.php');

     $methodHTP =$_SERVER['REQUEST_METHOD'];


    switch($methodHTP){
        case 'GET':
        if(empty ($_GET)){
                $ctl= new Controller();
                $data = $ctl->GetProducts();
                echo json_encode([$data]);
            }
            else{
                $data=$_GET;
                $ctl= new Controller();
                $data = $ctl->GetProducts();
                echo json_encode([$data]);
            }
            break;
        case 'POST':
            $data = json_decode(file_get_contents('php://input'),true);
            $ctl = new Controller();
            $result = $ctl->addProducts($data);
           echo json_encode(["data" =>$result]);
            break;
        
    }
?>