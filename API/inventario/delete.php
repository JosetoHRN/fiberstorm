<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../Database.php';
$database = new Database();
$conn = $database->getConnection();

// Retrieve data from request URL parameters
if(isset($_GET['id'])){
  $id = $_GET['id'];

  // Prepare SQL statement
  $sql = "DELETE FROM inventario WHERE id=$id;";
  
  if ($conn->query($sql) === TRUE) {
    // Return success message
    $response = array('status' => 'ok', 'message' => 'Producto eliminado con éxito.');
    echo json_encode($response);
  } else {
    // Return error message
    $response = array('status' => 'error', 'message' => 'Error deleting record: ' . $conn->error);
    echo json_encode($response);
  }  
}

// Close connection
$conn->close();
?>