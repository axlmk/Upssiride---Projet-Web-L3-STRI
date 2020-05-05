<?php
    require_once 'functions/auth.php';

    if (isset($_POST['login'], $_POST['pass'])){
        $login = $_POST['login'];
        $pass = md5($_POST['pass']);
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
        <link rel="stylesheet" href="style/login.css"/>

    </head>
    <body>
        <div id=login_connection class="tile">
            <form action="connection.php" method="post" class="login_form">
                <h2>LOG IN</h2>
                <div class="pic_input">
                    <img src="Pictures_site/human_placeholder.svg" alt="calendar" width="40"/>
                    <input type="text" name="login" placeholder="Email adress" class="input_button">
                </div>
                <div class="pic_input">
                    <img src="Pictures_site/lock.svg" alt="calendar" width="40"/>
                    <input type="password" name="pass" value="" placeholder="Password" class="input_button">
                </div>
                <input type="submit" name="cSubmit" value="Login" class="submit_button">
                <?php if (isset($erreur_auth)):?>
                    <p class="serverResponse"><br/>Identification failure</p>  <!-- CSS A AJOUTER : TEXTE EN ROUGE DE PREFERENCE, modifiez les balises si vous voulez >-->
                <?php endif ?>
            </form>
            <div class="sign_up_tile">
                <p>You don't have an account?</br>Let's register!</p>
                <form action="registration.php" method="post">
                    <input type="submit" name="cSignUp" value="Sign up" class="submit_button"> <!-- REPLACE PLACEHOLDER.HTML BY THE PROPER PHP SCRIPT >-->
                </form>
            </div>
        </div>
    </body>
</html>
