<?php
    require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
    </head>
    <body>
        <section>
            <div id='formUp'>
                <form class="" action="placeholder.html" method="post" >
                    <h2>Information</h2>
                    <hr>
                    <div>
                        <label for="">Gender * </label>
                        <input type="radio" onclick="" name="value">F
                        <input type="radio" onclick="" name="value">M
                    </div>
                    <input type="text" name="name" value="" placeholder="Name *"></br>
                    <input type="text" name="firstname" value="" placeholder="Firstname *"></br>
                    <input type="text" name="email" value="" placeholder="Email adress *"></br>
                    <input type="text" name="phone" value="" placeholder="Phone number"></br>
                    <input type="text" name="birth" value="" placeholder="Date of birth *"></br>
                    <input type="text" name="address" value="" placeholder="Adress *"></br>
                    <input type="text" name="zip" value="" placeholder="ZIP *"><input type="text" name="city" value="" placeholder="City *"></br>

                    <h2>Password</h2>
                    <hr>
                    <label for = "rPass"></label><input type="password" name="pass" value="" placeholder="Password *"></br>
                    <label for = "rConfirmPass"></label><input type="password" name="confirmPass" value="" placeholder="Confirm password *"></br>
                    <input type="submit" name="submit" value="Confirm">
                    <p>* Required fields</p>
                </form>
            </div>
        </section>
    </body>
</html>
