<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>FIBERSTORM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">

  <link rel="stylesheet" href="./css/main.css">
  <meta name="theme-color" content="#fafafa">
  <script type="text/javascript">
    const logged = sessionStorage.getItem('loggedIn');
    console.log('logged :>> ', logged);
    if(!logged) window.location.assign('./login.php');
  </script>
</head>
<body>
    <header>
        <p>Hola, </p>
        <p id="logout">Cerrar sesión</p>
    </header>
    <script src="./js/main.js"></script>
</body>
</html>
