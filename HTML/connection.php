<?php
    require_once 'functions/auth.php';

    if (isset($_POST['login'], $_POST['pass'])){
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        if (account_auth($login,$pass)){
            session_start();
            $_SESSION['connected'] = 1;
            $_SESSION['id'] = $_POST['login'];
            header("Location: dashboard.php");
        }
        else {
            $erreur_auth = 1;
        }
    }
    
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
        <div id=login>
            <div class="formLogIn">
                <form action="connection.php" method="post"> 
                    <input type="text" name="login" placeholder="Email adress">
                    <input type="password" name="pass" value="" placeholder="Password">
                    <input type="submit" name="cSubmit" value="Log in">
                    <?php if (isset($erreur_auth)):?>
                        <p class="serverResponse"><br/>Identification failure</p>  <!-- CSS A AJOUTER : TEXTE EN ROUGE DE PREFERENCE, modifiez les balises si vous voulez >-->
                    <?php endif ?>
                </form>
            </div>
            <div class="">
                <p>You already have an account?</p>
                <form action="registration.php" method="post">
                    <input type="submit" name="cSignUp" value="Sign up"> <!-- REPLACE PLACEHOLDER.HTML BY THE PROPER PHP SCRIPT >-->
                </form>
            </div>
        </div>
    </body>
</html>
