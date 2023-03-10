<?php session_start();
if(isset($_SESSION['auth'])){
    header("Location: ../home");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./favicon.ico" />
    <meta name="theme-color" content="#2F3131" />
    <link rel="apple-touch-icon" href="./logo192.png" />
    <link rel="manifest" href="./manifest.json" />
    <meta name="robots" content="nofollow, noindex" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área privada</title>
    <link rel="stylesheet" href="../assets/css/root.css">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
    <div class="loginContainer">
        <form id="loginForm" action="../php/auth/auth.php" method="POST">
        <h2>Acceso privado</h2>
        <div class="input_group">
            <label for="username">Usuario: </label>
            <input type="text" required
            name="username"
            autocomplete="username"
            placeholder="Usuario"
            />
        </div>
        <div class="input_group">
            <label clasfors="password">Contraseña: </label>
            <input type="password" required
            name="password"
            autocomplete="current-password"
            placeholder="Contraseña"
            />
        </div>
        <input type="submit" value="Acceder" />
        <p class="error-message"><?php if(isset($_GET['err'])) echo $_GET['msg']; ?></p>
        </form>
    </div>
</body>
</html>