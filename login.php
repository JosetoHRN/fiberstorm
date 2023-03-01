<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>FIBERSTORM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">

  <link rel="stylesheet" href="./css/login.css" />
  <meta name="theme-color" content="#fafafa" />
  <script>
    const username = sessionStorage.getItem("username");
    if(username) document.getElementById('username').value=username;
  </script>
</head>
<body>
  <div class="loginContainer">
    <form action="./scripts/processLogin.php" method="post" id="loginForm">
      <h2>Área privada</h2>
      <div class="input_group">
        <label for="username">Usuario</label>
        <input type="text" name="username" id="username" autocomplete="username"  placeholder="Usuario" required />
      </div>
      <div class="input_group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" autocomplete="current-password" placeholder="Contraseña" required />
      </div>
      <div class="remember">
        <input type="checkbox" name="remember" id="remember" />
        <label for="remember">Recordar este usuario</label>
      </div>
      <p class="error-message">
        <?php if(isset($_GET["err"])) echo $_GET["info"];?>
      </p>
      <input type="submit" name="submit" value="Acceder" />
    </form>
  </div>
</body>
</html>
