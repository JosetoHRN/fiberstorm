<?php
    class Inventario{
        // Connection
        private $conn;
        // Table
        private $db_table = "inventario";
        // Columns
        public $id;
        public $modelo;
        public $tipo;
        public $importancia;
        public $cantidad;
        public $estado;
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getInventario(){
            $sqlQuery = "SELECT
                id, 
                modelo, 
                tipo, 
                importancia, 
                cantidad, 
                estado
                FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // CREATE
        public function createInventario(){
            $sqlQuery = "INSERT INTO ". $this->db_table ." SET
            modelo = :modelo, 
            tipo = :tipo, 
            importancia = :importancia, 
            cantidad = :cantidad, 
            estado = :estado";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->modelo=htmlspecialchars(strip_tags($this->modelo));
            $this->tipo=htmlspecialchars(strip_tags($this->tipo));
            $this->importancia=htmlspecialchars(strip_tags($this->importancia));
            $this->cantidad=htmlspecialchars(strip_tags($this->cantidad));
            $this->estado=htmlspecialchars(strip_tags($this->estado));
        
            // bind data
            $stmt->bindParam(":modelo", $this->modelo);
            $stmt->bindParam(":tipo", $this->tipo);
            $stmt->bindParam(":importancia", $this->importancia);
            $stmt->bindParam(":cantidad", $this->cantidad);
            $stmt->bindParam(":estado", $this->estado);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // READ single
        public function getSingleInventario(){
            $sqlQuery = "SELECT
                id, 
                modelo, 
                tipo, 
                importancia, 
                cantidad, 
                estado
                FROM ". $this->db_table ." WHERE id = ? LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->modelo = $dataRow['modelo'];
            $this->tipo = $dataRow['tipo'];
            $this->importancia = $dataRow['importancia'];
            $this->cantidad = $dataRow['cantidad'];
            $this->estado = $dataRow['estado'];
        }        
        // UPDATE
        public function updateInventario(){
            $sqlQuery = "UPDATE ". $this->db_table ." SET
                modelo = :modelo, 
                tipo = :tipo, 
                importancia = :importancia, 
                cantidad = :cantidad, 
                estado = :estado
            WHERE id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->modelo=htmlspecialchars(strip_tags($this->modelo));
            $this->tipo=htmlspecialchars(strip_tags($this->tipo));
            $this->importancia=htmlspecialchars(strip_tags($this->importancia));
            $this->cantidad=htmlspecialchars(strip_tags($this->cantidad));
            $this->estado=htmlspecialchars(strip_tags($this->estado));
            $this->id=htmlspecialchars(strip_tags($this->id));

        
            // bind data
            $stmt->bindParam(":modelo", $this->modelo);
            $stmt->bindParam(":tipo", $this->tipo);
            $stmt->bindParam(":importancia", $this->importancia);
            $stmt->bindParam(":cantidad", $this->cantidad);
            $stmt->bindParam(":estado", $this->estado);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteInventario(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>