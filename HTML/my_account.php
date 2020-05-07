<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php
            include_once('header.php');
        ?>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="style/my_account.css"/>
    </head>
    <body>
        <div class="entire_body">
            <aside class="tile" id="side_settings">
                <div class="image_container">
                    <img src="Pictures_site/test2.jpg" alt="">
                </div>
                <div class="">
                    <button class="tab_button" onClick="openTab(event, 'global_information')" type="button" name="button" id="default_tab">Information</button>
                    <button class="tab_button" onClick="openTab(event, 'password_information')" type="button" name="button">Change password</button>
                    <button class="tab_button" onClick="openTab(event, 'vehicles_information')" type="button" name="button">Vehicles</button>
                </div>
            </aside>

            <div class="tile" id="main_settings">
                <div id="global_information" class="tab_content">
                    <h2>Information</h2>
                    <h3>Michel GARNIER</h3>
                    <form class="form_container" action="placeholder.php" method="post">
                        <div class="label_input">
                            <textarea class="input_button" id="description_field" rows="4">Michou</textarea>
                        </div>
                        <div class="label_input">
                            <label for="emailField">Email address *<br></label>
                            <input class="input_button" type="text" name="emailField" value="wouaw@tropfort.biff">
                        </div>
                        <div class="label_input">
                            <label for="phoneField">Phone number *<br></label>
                            <input class="input_button" type="text" name="phoneField" value="0123456789">
                        </div>
                        <div class="label_input">
                            <label for="addressField">Address *<br></label>
                            <input class="input_button" type="text" name="addressField" value="Avenue Diste">
                        </div>
                        <p></p>
                        <input class="submit_button" type="submit" name="saveSubmit" value="Save">
                    </form>
                    <p>* Required fields<br>
                    ** To change your birthdate, please contact an administrator.</p>
                </div>

                <div id="password_information" class="tab_content">
                    <h2>Change my password</h2>
                    <form class="" action="placeholder.php" method="post">
                        <input class="input_button" id="previous" type="text" name="passwordField" placeholder="Previous password">
                        <input class="input_button" type="text" name="passwordField" placeholder="New password">
                        <input class="input_button" type="text" name="confirmField" placeholder="Confirm password">
                        <input class="submit_button" type="submit" name="confirmSubmit" value="Confirm">
                    </form>
                </div>

                <div id="vehicles_information" class="tab_content">
                    <h2>My vehicles</h2>
                    <div class="vehiclesList">
                        <div class="vehicleElement">
                            <img src="" alt="">
                            <div class="vehicleDescription">
                                <p>Porsche<br>
                                    Panamera Break<br>
                                    Matte Black
                                </p>
                            </div>
                        </div>

                        <div class="vehicleElement">
                            <img src="" alt="">
                            <div class="vehicleDescription">
                                <p>Renault<br>
                                    Trafic<br>
                                    White
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="addButton">
                        <a href="#"><img src="" alt=""></a>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            document.getElementById("default_tab").click();

            function openTab(evt, contentName) {
                var tabContentList = document.getElementsByClassName("tab_content");
                for(const elm of tabContentList) {
                    elm.style.display = "none";
                }

                var tablinks = document.getElementsByClassName("tab_button");
                for(elm of tablinks) {
                    elm.className = elm.className.replace(" active", "");
                }

                document.getElementById(contentName).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>
    </body>
</html>
