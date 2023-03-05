<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Database.php';
$database = new Database();
$conn = $database->getConnection();

// Check if ID parameter is present in URL
if (isset($_GET["id"])) {
    // Retrieve a single record from the database using the ID parameter
    $id = $_GET["id"];
    $sql = "SELECT * FROM inventario WHERE id = $id;";
    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {
        // Output data of each row as JSON
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "0 results";
    }
} else {
    // Retrieve all records from the database
    $sql = "SELECT * FROM inventario;";
    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {
        // Output data of each row as JSON
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    } else {
        echo "0 results";
    }
  }
  
  // Close connection
  $conn->close();
  ?>