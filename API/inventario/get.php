<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../models/inventario.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new Inventario($db);
    $stmt = $items->getInventario();
    $itemCount = $stmt->rowCount();

    echo json_encode($itemCount);
    if($itemCount > 0){
        $itemsInventario = array();
        $itemsInventario["body"] = array();
        $itemsInventario["itemCount"] = $itemCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $item = array(
                "id" => $id,
                "modelo" => $modelo,
                "tipo" => $tipo,
                "importancia" => $importancia,
                "cantidad" => $cantidad,
                "estado" => $estado
            );
            array_push($itemsInventario["body"], $item);
        }
        echo json_encode($itemsInventario);
    }
    else{
        http_response_code(404);
        echo json_encode(array("message" => "No hay registros."));
    }
?>