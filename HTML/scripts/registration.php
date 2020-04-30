<?php
    require_once '/functions/auth.php';

    if (isset($_POST['submit'])){
        $name = htmlentities(trim($_POST['name']));
        $firstname = htmlentities(trim($_POST['firstname']));
        $email = htmlentities(trim($_POST['email']));
        $phone = htmlentities(trim($_POST['phone']));
        $birth = htmlentities(trim($_POST['birth']));
        $adress = htmlentities(trim($_POST['adress']));
        $ZIP = htmlentities(trim($_POST['zip']));
        $city = htmlentities(trim($_POST['city']));

        $pass= htmlentities($_POST['pass']);
        $conf_pass = htmlentities($_POST['confirmPass']);
    }   
?>