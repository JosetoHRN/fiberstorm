<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../Database.php';
$database = new Database();
$conn = $database->getConnection();

// Extract values from JSON object
$data = json_decode(file_get_contents("php://input"));
$modelo = $data->modelo;
$tipo = $data->tipo;
$importancia = $data->importancia;
$cantidad = $data->cantidad;
$estado = $data->estado;

// Prepare SQL statement
$sql = "INSERT INTO inventario (modelo, tipo, importancia, cantidad, estado) VALUES ('$modelo', '$tipo', '$importancia', '$cantidad', '$estado');";

if ($conn->query($sql) === TRUE) {
    // Return success message
    $response = array('status' => 'ok', 'message' => 'Producto creado con éxito.');
    echo json_encode($response);
} else {
    // Return error message
    $response = array('status' => 'error', 'message' => 'Error adding record: ' . $conn->error);
    echo json_encode($response);
}

// Close connection
$conn->close();
?>