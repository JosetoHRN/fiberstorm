<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../Database.php';
$database = new Database();
$conn = $database->getConnection();

// Extract values from JSON object
$data = json_decode(file_get_contents("php://input"));
$id = $data->id;
$importancia = $data->importancia;
$cantidad = $data->cantidad;
$estado = $data->estado;

// Prepare SQL statement
$sql = "UPDATE inventario SET importancia='$importancia', cantidad='$cantidad', estado='$estado' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  // Return success message
  $response = array('status' => 'ok', 'message' => 'Producto actualizado con éxito.');
  echo json_encode($response);
} else {
  // Return error message
  $response = array('status' => 'error', 'message' => 'Error updating record: ' . $conn->error);
  echo json_encode($response);
}

// Close connection
$conn->close();
?>