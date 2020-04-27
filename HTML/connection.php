<?php
    
    $erreur =null;

    if (isset($_POST['login'], $_POST['pass'])){
        if ($_POST["login"] === "admin" && $_POST["pass"] === "admin"){
            session_start();
            $_SESSION['connected'] = 1;
            $_SESSION['id'] = $_POST['login'];
            header("Location: dashboard.php");
        }
        else {
            $erreur = "Identification failure";
        }
    }

    require_once 'functions/auth.php';
    if (is_connected()){
        header("Location: dashboard.php");
    }

    require_once 'header.php'
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Connection</title>
    </head>
    <body>
        <div class="">
            <form action="connection.php" method="post"> 
                <label for = "cLogin">Login</label><input type="text" name="login" value="">
                <label for = "cPass">Password</label><input type="text" name="pass" value="">
                <input type="submit" name="cSubmit" value="Log in">
            </form>
        </div>
        <div class="">
            <p>You already have an account?</p>
            <form action="registration.php" method="post">
                <input type="submit" name="cSignUp" value="Sign up"> <!-- REPLACE PLACEHOLDER.HTML BY THE PROPER PHP SCRIPT >-->
            </form>
        </div>
    </body>
</html>
