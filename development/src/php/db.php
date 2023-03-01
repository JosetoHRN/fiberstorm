<?php
    $conn = mysqli_connect('PMYSQL156.dns-servicio.com', 'fiberstorm_admin', 'fiberstorm_db_admin_23');
    $database = mysqli_select_db($conn, '9688064_gestion_fs');

    $encodedData = file_get_contents('php://input');
    $decodedData = json_decode($encodedData, true);
?>