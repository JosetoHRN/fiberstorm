<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../models/inventario.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new Inventario($db);
    $data = json_decode(file_get_contents("php://input"));
    
    $item->modelo = $data->modelo;
    $item->tipo = $data->tipo;
    $item->importancia = $data->importancia;
    $item->cantidad = $data->cantidad;
    $item->estado = $data->estado;
    
    if($item->createInventario()){
        echo 'Elemento añadido al inventario.';
    } else{
        echo 'No se ha podido añadir este elemento.';
    }
?>