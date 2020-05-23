<?php
    require_once 'header.php';
    require_once 'functions/sql_account.php';
    require_once 'functions/check_registration.php';
    require_once 'functions/get_image.php';


    if (!is_connected()){
        header("Location: connection.php");
    }

    //Save user information
    if (isset($_POST['saveSubmit'])){
        //email

        $user_info['email'] = htmlentities(trim($_POST['emailField']));
        $user_info['phone'] = htmlentities(trim($_POST['phoneField']));
        $user_info['description'] = htmlentities(trim($_POST['descriptionField']));
        $user_info['music'] = $_POST['music_v'];
        $user_info['tchat'] = $_POST['tchat_v'];
        $user_info['cigarette'] = $_POST['cigarette_v'];
        $user_info['pets'] = $_POST['pets_v'];
        
        if (strcmp($user_info['email'],get_email($_SESSION['id']))){
            $err_email = check_email($user_info['email']);
            if ($err_email!=null){
                $valid = 0;
            }
        }
        //phone
        if (!empty($user_info['phone'])){
            if (iconv_strlen( $user_info['phone'], "UTF-8")>20){
            $err_phone = "Number too long";
            $valid = 0;
            }
        }
        if (!isset($valid)){
            $saveInfo = save_info_account($user_info, $_SESSION['id']);
            if ($saveInfo){
                $returnMessage = "Your information has been saved";
            }
            else {
                $returnMessage = "An error has occured, please retry later";
            }
        }
    }

    if (isset($_POST['passwordSubmit'])){
        //email
        $pass = htmlentities($_POST['passwordField']);
        $confirmPass = htmlentities($_POST['confirmField']);
        $previousPass = htmlentities($_POST['previousField']);

        //if the field is empty or the password is incorrect
        if (empty($previousPass) || !verify_password($_SESSION['id'],md5($previousPass))){
            $err_previousPass = "Your password is incorrect";
            $valid = 0;
        }
        //if fields are empty
        if (empty($pass) && empty($confirmPass)){
            $err_pass = "Enter a password";
            $valid = 0;
        }
        else if ($pass!=$confirmPass){    //else if new passwords are not de same
            $err_pass = "The passwords are different";
            $valid = 0;
        }

        //if verifications are valid
        if (!isset($valid)){
            $result = save_new_password(md5($pass),$_SESSION['id']);
            if ($result){
                $returnPassword = "Your password has been changed";
            }
            else{
                $returnPassword = "An error has occured, please retry later";
            }
        }

    }

    if(isset($_FILES['new_pp'])) {
        upload_pp(strtolower($_SESSION['id']), $_FILES['new_pp'], "Pictures_site/users/", "user");
    }

    if(isset($_POST['new_brand'])) {
        edit_vehicle($_POST['new_brand'], $_POST['new_model'], $_POST['new_color'], $_POST['new_registration']);
        if(isset($_FILES['new_pp_vehicle'])) {
            upload_pp($_POST['new_registration'], $_FILES['new_pp_vehicle'], "Pictures_site/vehicles/", "vehicle");
        }
    }


    if(isset($_POST['del_vehicle'])) {
        delete_vehicle($_POST['del_vehicle']);
    }

    if(isset($_POST['new_vehicle'])) {
        add_vehicle($_SESSION['id']);
    }

    if (isset($_POST['delete_account'])){
        delete_account($_SESSION['id']);
        header("Location: scripts/logout.php");
    }

    $info = get_account_info($_SESSION['id']);
    $music = $info['music']; 
    $chat = $info['chatting']; 
    $cigarette = $info['smoke'];
    $pets= $info['pets'];
    $vehicles = get_vehicles($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title><?=$info['name']?> <?=$info['firstname']?> | Account</title>
        <link rel="stylesheet" href="style/my_account.css"/>
        <link rel="stylesheet" href="style/my_account_vehicle.css"/>
    </head>
    <body>
        <div class="entire_body">
            <aside class="tile" id="side_settings">
                <div class="image_container">
                    <img src=<?=$info['pictureprofil']?> alt="picture profile">
                    <form action="my_account.php" method="POST" enctype="multipart/form-data" id="file_form">
                         <input type="file" name="new_pp" id="image" oninput="submitFileForm()"/>
                         <label for="image" class="submit_button" id="file_button">Edit</label>
                    </form>
                </div>
                <div class="">
                <?php if (!isset($_POST['passwordSubmit'])): ?>
                    <button class="tab_button" onClick="openTab(event, 'global_information')" type="button" name="button" id="default_tab">Information</button>
                    <button class="tab_button" onClick="openTab(event, 'password_information')" type="button" name="button" >Change password</button>
                <?php else: ?>
                    <button class="tab_button" onClick="openTab(event, 'global_information')" type="button" name="button" >Information</button>
                    <button class="tab_button" onClick="openTab(event, 'password_information')" type="button" name="button" id="default_tab">Change password</button>
                <?php endif ?>
                    <button class="tab_button" onClick="openTab(event, 'vehicles_information')" type="button" name="button">Vehicles</button>
                    <form action="my_account.php" method="post">
                        <button class="delete_button" type="submit" name="delete_account">Delete account</button>
                    </form>
                </div>
            </aside>

            <div class="tile" id="main_settings">
                <div id="global_information" class="tab_content">
                    <?php if (isset($returnMessage)):?>
                        <label><?=$returnMessage?></label>
                    <?php endif ?>
                    <h2>Information</h2>
                    <h3><?=$info['name']?> <?=$info['firstname']?></h3>
                    <form class="form_container" action="my_account.php" method="post">
                        <div class="label_input">
                            <textarea class="input_button" name="descriptionField" id="description_field" rows="4"><?=$info['description']?></textarea>
                        </div>
                        <div class="label_input">
                            <label for="emailField">Email address *<br></label>
                            <input class="input_button" type="text" name="emailField" value=<?=$info['email']?>>
                            <?php if (isset($err_email)): ?>
                                 <span class="error"><?php echo $err_email; ?></span>
                             <?php endif ?>
                        </div>
                        <div class="label_input">
                            <label for="phoneField">Phone number *<br></label>
                            <input class="input_button" type="text" name="phoneField" value=<?=$info['phone']?>>
                            <?php if (isset($err_phone)): ?>
                                <span class="error"><?php echo $err_phone ?></span>
                            <?php endif ?>
                        </div>
                        
                        <div class="radio_input">
                        <label>Preferences<br/></label>
                            <label class="music_val">
                                <input type="radio" name="music_v" value="0" <?php echo (!$music) ?  "checked" : "" ;  ?>/>
                                <img src="svg/music_forbidden.svg" />
                            </label>
                            <label class="music_val">
                                <input type="radio" name="music_v" value="1" <?php echo ($music) ?  "checked" : "" ;  ?>>
                                <img src="svg/music_ok.svg"/>
                            </label>
                        </div>
                        <div class="radio_input">
                            <label class="tchat_val">
                                <input type="radio" name="tchat_v" value="0" <?php echo (!$chat) ?  "checked" : "" ;  ?>/>
                                <img src="svg/tchat_forbidden.svg"/>
                            </label>
                            <label class="tchat_val">
                                <input type="radio" name="tchat_v" value="1" <?php echo ($chat) ?  "checked" : "" ;  ?>>
                                <img src="svg/tchat_ok.svg"/>
                            </label>
                        </div>
                        <div class="radio_input">
                            <label class="cigarette_val">
                                <input type="radio" name="cigarette_v" value="0" <?php echo (!$cigarette) ?  "checked" : "" ;  ?>/>
                                <img src="svg/cigarette_forbidden.svg"/>
                            </label>
                            <label class="cigarette_val">
                                <input type="radio" name="cigarette_v" value="1" <?php echo ($cigarette) ?  "checked" : "" ;  ?>>
                                <img src="svg/cigarette_ok.svg"/>
                            </label>
                        </div>
                        <div class="radio_input">
                            <label class="pets_val">
                                <input type="radio" name="pets_v" value="0" <?php echo (!$pets) ?  "checked" : "" ;  ?>/>
                                <img src="svg/pet_ok.svg"/>
                            </label>
                            <label class="pets_val">
                                <input type="radio" name="pets_v" value="1" <?php echo ($pets) ?  "checked" : "" ;  ?>>
                                <img src="svg/pet_forbidden.svg"/>
                            </label>
                        </div>
                        <input class="submit_button" type="submit" name="saveSubmit" value="Save">
                    </form>
                    <p>* Required fields<br>
                    ** To change your name, firstname or birthdate, please contact an administrator.</p>
                </div>

                <div id="password_information" class="tab_content">
                    <?php if (isset($returnPassword)):?>
                        <label><?=$returnPassword?></label>
                    <?php endif ?>
                    <h2>Change my password</h2>
                    <form class="" action="my_account.php" method="post">
                        <input class="input_button" id="previous" type="text" name="previousField" placeholder="Previous password">
                        <?php if (isset($err_previousPass)): ?>
                                <span class="error"><?php echo $err_previousPass?></span>
                        <?php endif ?>
                        <input class="input_button" type="text" name="passwordField" placeholder="New password">
                        <input class="input_button" type="text" name="confirmField" placeholder="Confirm password">
                        <?php if (isset($err_pass)): ?>
                        <span class="error"><?php echo $err_pass ?></span>
                         <?php endif ?>
                        <input class="submit_button" type="submit" name="passwordSubmit" value="Confirm">

                    </form>
                </div>

                <div id="vehicles_information" class="tab_content">
                    <div class = "global_vehicle_container">
                        <div class="inner_vehicle_info">
                            <h2>My vehicles</h2>

                            <div class="container_vehicle_info">
                            <?php foreach ($vehicles as $row): ?>
                                <div class="vehicle_info">
                                    <div class="pic_container" <?php echo 'id="pp_'.$row['registration'].'"' ?>>
                                        <span class="helper"></span><img src=<?=$row['picture']?> alt=<?=$row["brand"]?>>
                                    </div>
                                    <form action="my_account.php" method="POST" enctype="multipart/form-data" class="file_form" <?php echo 'id="pp_modif_'.$row['registration'].'"' ?>>
                                        <input type="file" name="new_pp_vehicle" class="image" <?php echo 'id="image_'.$row['registration'].'"' ?>/>
                                        <label <?php echo 'for="image_'.$row['registration'].'"' ?> class="pic_container file_button">
                                            <span class="helper"></span><img src=<?=$row['picture']?> alt=<?=$row["brand"]?>>
                                        </label>
                                    </form>
                                    <div class="description">
                                        <label class="label_vehi_info">Brand: </label><h3 <?php echo 'id="brand_'.$row['registration'].'"' ?>><?=$row["brand"]?></h3>
                                        <label class="label_vehi_info">Model: </label><h3 <?php echo 'id="model_'.$row['registration'].'"' ?>><?=$row["model"]?></h3>
                                        <label class="label_vehi_info">Color: </label><h3 <?php echo 'id="color_'.$row['registration'].'"' ?>><?=$row["color"]?></h3>
                                        <label class="label_vehi_info">Registration: </label><h3 <?php echo 'id="registration_'.$row['registration'].'"' ?>><?=$row["registration"]?></h3>
                                    </div>
                                    <div class="dropdown">
                                        <button class="deleteButton" type="button" <?php echo 'id="delete_button_'.$row['registration'].'"' ?> <?php echo 'onClick="openTabVehicle('.$row['registration'].'); deleteMV('.$row['registration'].',\''.$row['picture'].'\')"' ?>>Delete</button>
                                        <button class="modifyButton" type="button" <?php echo 'id="modify_button_'.$row['registration'].'"' ?> <?php echo 'onClick="openTabVehicle('.$row['registration'].'); modify('.$row['registration'].')"' ?>>Edit</button>
                                        <button class="cancelButton" type="button" <?php echo 'id="cancel_button_'.$row['registration'].'"' ?> <?php echo 'onClick="openTabVehicle('.$row['registration'].'); cancel('.$row['registration'].')"' ?>>Cancel</button>
                                        <button class="saveButton" type="submit" <?php echo 'id="save_button_'.$row['registration'].'"' ?> <?php echo 'onClick="openTabVehicle('.$row['registration'].');" form="pp_modif_'.$row['registration'].'"' ?>>Save</button>
                                    </div>
                                </div>
                            <?php endforeach?>
                            </div>
                        </div>

                        <div id="addVehicle">
                            <form action="my_account.php" method="POST">
                                <button type="submit" name="new_vehicle" class="submit_button" value="true">Add vehicle</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="javascript/my_account.js" type="text/javascript"></script>
        <script src="javascript/vehicle.js" type="text/javascript"></script>
    </body>
</html>


<?php
    include_once 'footer.php';
?>