<?php
    include("../helpers/db.php");
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $remember = isset($_POST["remember"]);
        $password_hash = hash('sha3-512',$password);

        $req = $pdo->query("SELECT * FROM usuarios WHERE username='$username' AND password='$password_hash';");
        $user_data = $req->fetch(PDO::FETCH_ASSOC);
        if($user_data) {
            $user_json = json_encode($user_data);
            echo $user_json;
            echo "<script type=\"text/javascript\">sessionStorage.setItem(\"user_data\", JSON.stringify($user_json)); sessionStorage.setItem(\"loggedIn\", 1);</script>";
            if($remember) {
                //localStorage (7 days)
                echo "<script type=\"text/javascript\">sessionStorage.setItem(\"username\",$username);</script>";
            }else{
                echo "<script type=\"text/javascript\">sessionStorage.removeItem(\"username\");</script>";
            }
            header('location:../index.php');
        } else {
            header('location:../login.php?err=true&info=La%20contraseña%20no%20es%20correcta.');
        }

    }
?>