<?php session_start();
if(isset($_SESSION['auth'])){
    header("Location: ./home");
}else{
    header("Location: ./auth");
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <link rel="icon" href="./favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#2F3131" />
    <link rel="apple-touch-icon" href="./logo192.png" />
    <link rel="manifest" href="./manifest.json" />
    <meta name="robots" content="nofollow, noindex" />
    <title></title>
  </head>
  <body>
    <script type="application/javascript">
        let user = localStorage.getItem("userLoggedIn");
        let token = localStorage.getItem("token_auth0");
        if(!user || !token) {
            window.location.assign('/login');
        }
        else {
            try {
                user = JSON.parse(user);
                if(!!token && (user.rol.includes('AUTHORIZED_'))){
                    location.assign('/privado');
                }
            } catch (error) {
                localStorage.removeItem("user");
                localStorage.removeItem("token");
                window.location.assign('/login');
            }
        }
    </script>
  </body>
</html>