<?php
    try {
        $pdo = new PDO(
            'mysql:host=localhost;dbname=fiberstorm_gestion',
            'fiberstorm_admin',
            'fiberstorm_db_admin_23'
        );
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>