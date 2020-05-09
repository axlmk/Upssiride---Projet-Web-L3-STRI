<?php

    require_once 'functions/auth.php';
    require_once 'functions/check_registration.php';
    require_once 'scripts/registration.php';
    if (is_connected()){
        header("Location: dashboard.php");
    }
    if (isset($_POST['submit'])){
        $gender = $_POST['gender'];
        $name = htmlentities(trim($_POST['name']));
        $firstname = htmlentities(trim($_POST['firstname']));
        $email = htmlentities(trim(strtolower($_POST['email'])));
        $phone = htmlentities(trim($_POST['phone']));
        $birth = htmlentities(trim($_POST['birth']));
        $address = htmlentities(trim($_POST['address']));
        $ZIP = htmlentities(trim($_POST['zip']));
        $city = htmlentities(trim($_POST['city']));
        $country = htmlentities(trim($_POST['country']));
        $pass= htmlentities($_POST['pass']);
        $conf_pass = htmlentities($_POST['confirmPass']);

        //check gender
        if (empty($gender)){
            $err_gender = "Select your gender";
            $valid = 0;
        }

        //check name
        if (empty($name)){
            $err_name = "Enter a name";
            $valid = 0;
        }
        else if (iconv_strlen($name, "UTF-8")>30){
            $err_name = "Name too long";
            $valid = 0;
        }
        //check firstname
        if (empty($firstname)){
            $err_fname = "Enter a first name";
            $valid = 0;
        }
        else if (iconv_strlen($firstname, "UTF-8")>30){
            $err_fname = "First ame too long";
            $valid = 0;
        }

        //email
        $err_email = check_email($email);
        if ($err_email!=null){
            $valid = 0;
        }

        //phone
        if (!empty($phone)){
            if (iconv_strlen($phone, "UTF-8")>20){
            $err_phone = "Number too long";
            $valid = 0;
            }
        }
        //birth
        if (empty($birth)){

            $err_birth = "Enter your birthdate";
            $valid = 0;
        }
        else if (!check_birthdate($birth)){
            //check user's age

            $err_birth = "You must be 18";
            $valid = 0;
        }
        /*
        //adress
        if (empty($address)){
            $err_adress = "Enter your home address";
            $valid = 0;
        }
        else if (iconv_strlen($name, "UTF-8")>50){
            $err_adress = "Adress too long";
            $valid = 0;
        }

        //zip
        if (empty($ZIP)){
            $err_zip = "Enter your ZIP code";
            $valid = 0;
        }
        else if (iconv_strlen($name, "UTF-8")>10){
            $err_zip = "ZIP code too long";
            $valid = 0;
        }
        //city
        if (empty($city)){
            $err_city = "Enter your city";
            $valid = 0;
        }
        else if (iconv_strlen($name, "UTF-8")>49){
            $err_city = "City too long";
            $valid = 0;
        }

        //country
        if (empty($country)){
            $err_country = "Enter your country";
            $valid = 0;
        }
        else if (iconv_strlen($name, "UTF-8")>49){
            $err_country = "Country too long";
            $valid = 0;
        }
        */
        //password
        if (empty($pass)){
            $err_pass = "Enter a password";
            $valid = 0;
        }
        else if (iconv_strlen($name, "UTF-8")>49){
            $err_pass = "Password too long";
            $valid = 0;
        }

        //confirm password
        if (empty($conf_pass) && empty($pass)){
            $err_conf_pass = "Confirm your password";
            $valid = 0;
        }
        else if ($conf_pass != $pass){
            $err_conf_pass = "The passwords are different";
            $valid = 0;
        }

        if (!isset($valid)){
            //hachage du mot de passe
            $pass = md5($pass);
            $result = send_registration($gender,$name, $firstname, $email, $phone, $birth, $adress, $ZIP, $city, $country, $pass);
        }
    }

    require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
        <link rel="stylesheet" href="style/register.css"/>
    </head>
    <body>
        <section>
                    <?php if (isset($result) && $result): ?>
                    <!-- POP UP qui confirme l'inscription -->
                    <p> Your account has been created! You can <a id="login" href="connection.php">log in</a> now!</p>
                    <?php elseif (isset($result) && !$result): ?>
                    <p> Sorry, an error has occured, please retry later</p>
                    <!-- POP UP erreur -->
                    <?php endif ?>
                <form action="register.php" method="post" >
                    <div class="tile">
                        <h2>Information</h2>
                        <hr>
                        <?php if (isset($err_gender)): ?>
                            <span class="error"><?php echo $err_gender; ?></span>
                        <?php endif ?>
                        <div id="gender">
                            <label for="">Gender * </label>
                            <input type="radio" onclick="" name="gender" value="F" checked="checked">F
                            <input type="radio" onclick="" name="gender" value="M">M
                        </div>
                        <?php if (isset($err_name)): ?>
                            <span class="error"><?php echo $err_name; ?></span>
                        <?php endif ?>
                        <input type="text" name="name" value="" placeholder="Name *" class="input_button">
                        <?php if (isset($err_fname)): ?>
                            <span class="error"><?php echo $err_fname; ?></span>
                        <?php endif ?>
                        <input type="text" name="firstname" value="" placeholder="Firstname *" class="input_button">
                        <?php if (isset($err_email)): ?>
                            <span class="error"><?php echo $err_email; ?></span>
                        <?php endif ?>
                        <input type="text" name="email" value="" placeholder="Email adress *" class="input_button">
                        <?php if (isset($err_phone)): ?>
                            <span class="error"><?php echo $err_phone; ?></span>
                        <?php endif ?>
                        <input type="text" name="phone" value="" placeholder="Phone number" class="input_button">
                         <label>Birthdate</label>
                         <?php if (isset($err_birth)): ?>
                             <span class="error"><?php echo $err_birth, $birth ?></span>
                         <?php endif ?>
                         <input type="date" name="birth" value="" class="input_button">
                         <?php if (isset($err_adress)): ?>
                             <span class="error"><?php echo $err_adress ?></span>
                         <?php endif ?>
                    <!--    <input type="text" name="address" value="" placeholder="Address *" class="input_button">
                        <?php if (isset($err_zip)): ?>
                            <span class="error"><?php echo $err_zip ?></span>
                        <?php endif ?>
                        <input type="text" name="zip" value="" placeholder="ZIP *" class="input_button">
                        <?php if (isset($err_city)): ?>
                            <span class="error"><?php echo $err_city ?></span>
                        <?php endif ?>
                        <input type="text" name="city" value="" placeholder="City *" class="input_button">
                        <?php if (isset($err_country)): ?>
                            <span class="error"><?php echo $err_country ?></span>
                        <?php endif ?>
                        <input type="text" name="country" value="" placeholder="Country *" class="input_button"> -->
                    </div>

                    <div class="tile">
                        <h2>Password</h2>
                        <hr>
                        <?php if (isset($err_pass)): ?>
                            <span class="error"><?php echo $err_pass ?></span>
                        <?php endif ?>
                        <input type="password" name="pass" value="" placeholder="Password *" class="input_button">
                        <?php if (isset($err_conf_pass)): ?>
                            <span class="error"><?php echo $err_conf_pass ?></span>
                        <?php endif ?>
                        <input type="password" name="confirmPass" value="" placeholder="Confirm password *" class="input_button">
                        <div class="submit_div">
                            <input type="submit" name="submit" value="Confirm" class="submit_button">
                        </div>
                        <p id="required_field">* Required fields</p>
                    </div>
                </form>
                
        </section>
    </body>
</html>
