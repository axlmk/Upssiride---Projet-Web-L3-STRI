<?php
    require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>My rides</title>
    </head>
    <body>
        <h2>Rides to come</h2>
        <hr>

        <! -- Un trajet -->
        <div class=ride>
            <a href ="#">
                <div class=info>
                    <! -- Info à rentrer en php -->
                    <p>28/04/2020</p>
                    <p>15h30</p>
                </div>
            </a>

            <a href="#">
                <div class=rideResume>
                    <! -- Info à rentrer en php -->
                    <p>Toulouse - - - Montpellier</p>
                    <p>Durée approximative du trajet : 2h00</p>
                </div>
            </a>

            <div class=vertical_line> </div>

            <div class=pic>
                <! -- Info à rentrer en php -->
                <a href="#">
                    <img src="Pictures_site/test.jpg" alt="ppDriver">
                    <p>Nom du mec</p>
                </a>
            </div>

            <div class="options">
                <! -- option button -->
                <div id="optButton" onclick="popMenu()">
                    <img src="Pictures_site/bttn_opt.png" alt="Option button"></img>
                </div>
                <div id="menu_opt">
                    <ul>
                        <! -- Requète SQL dans php -->
                        <! -- Si on est passager -->
                        <li>Cancel</li>
                        <! -- Si on est conducteur -->
                        <li>Remove</li>
                        <li>Modify</li>
                        <li><a href="#">Participation request</a>
                    </ul>
                </div>

            </div>

        </div>


        <h2>Rides recently completed</h2>
        <hr>

        <! -- Un trajet -->
        <div class=ride>
            <a href ="#">
                <div class=info>
                    <! -- Info à rentrer en php -->
                    <p>28/04/2020</p>
                    <p>15h30</p>
                </div>
            </a>

            <a href="#">
                <div class=rideResume>
                    <! -- Info à rentrer en php -->
                    <p>Toulouse - - - Montpellier</p>
                    <p>Durée approximative du trajet : 2h00</p>
                </div>
            </a>

            <div class=vertical_line> </div>

            <div class=pic>
                <! -- Info à rentrer en php -->
                <a href="#">
                    <img src="Pictures_site/test.jpg" alt="ppDriver">
                    <p>Nom du mec</p>
                </a>
            </div>

        </div>
        


        <! -- script popping menu -->
        <script>
            function popMenu() {
                document.getElementById("menu_opt").style.display = 'block';
            }
        </script>

    </body>

</HTML>