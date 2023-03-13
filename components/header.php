<?php session_start();
if(isset($_SESSION['auth'])){
    $user = $_SESSION['auth'];
}else{
    header("Location: ../auth");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiberstorm gestión</title>
    <link rel="stylesheet" href="../assets/css/root.css">
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <nav class="main-nav">
		<p>Bienvenido, <span></span>.</p>
		<script>
			const auth = JSON.parse(<?php echo json_encode($user); ?>);
			document.querySelector('.main-nav > p > span').innerHTML = auth['username'];
		</script>
        <?php 
        if(isset($zona)) {
            echo '<div class="header_title">
                <h3>'.$zona.'</h3>
                <a href="./" class="change_area">(cambiar área)</a>
            </div>';
        }
        ?>
        <a href="../auth/logout.php" class="secondary-light">Cerrar sesión</a>
    </nav>