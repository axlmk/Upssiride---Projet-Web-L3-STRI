<?php
    require_once 'functions/auth.php';
    require_once 'header.php';

    if (!is_connected()){
        header("Location: connection.php");
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>My rides</title>
        <link rel="stylesheet" href="style/my_rides.css"/>
    </head>
    <body>

        <div class="title_div">
            <img src="svg/hourglass.svg"/>
            <h2>Request sent</h2>
        </div>

        <div class="ride">
            <div class=info>
                <!-- Info à rentrer en php -->
                <div class="pic_label">
                    <img src="svg/calendar.svg" alt="calendar" width="40"/>
                    <label for="" style="">25/05/2020</label>
                </div>

                <div class="end_pic_label">
                    <img src="svg/clock.svg" alt="clock" width="40"/>
                    <label for="">15h03</label>
                </div>
            </div>

            <div class=rideResume>
                <!-- Info à rentrer en php -->
                <label for="">
                    Toulouse
                </label>
                <img src="svg/city_sep.svg" alt="city" width="50">
                <label for="">
                    Montpellier
                </label>
            </div>

            <!-- <div class=vertical_line> </div> -->
            <a href="profile.php">
                <div class=pic>
                    <!-- Info à rentrer en php -->
                    <img src="Pictures_site/test2.jpg" alt="ppDriver">
                    <p>Marie-Noël Bernes Heuga</p>
                </div>
            </a>

            <div class="dropdown">
                <img src="svg/checkbox.svg" alt="Option button" class="dropbtn"></img>
                <div class="dropdown-content">
                    <a href="#">Cancel</a><!-- PHP : Requête d'annulation de participation -->
                </div>
            </div>
        </div>

        <div class="title_div">
            <img src="svg/car.svg"/>
            <h2>Rides to come</h2>
        </div>
        <!-- Un trajet -->
<!-- Debut du div-->
<!-- foreach ($result as $row) {
        print $row["id"] . "-" . $row["value"] ."<br/>";
    } -->
        <?php ?>
        <!-- Un trajet -->
        <div class="ride">
            <div class=info>
                <!-- Info à rentrer en php -->
                <div class="pic_label">
                    <img src="svg/calendar.svg" alt="calendar" width="40"/>
                    <label for="" style="">25/05/2020</label>
                </div>

                <div class="end_pic_label">
                    <img src="svg/clock.svg" alt="clock" width="40"/>
                    <label for="">15h03</label>
                </div>
            </div>

            <div class=rideResume>
                <!-- Info à rentrer en php -->
                <label for="">
                    Toulouse
                </label>
                <img src="svg/city_sep.svg" alt="city" width="50">
                <label for="">
                    Montpellier
                </label>
            </div>

            <!-- <div class=vertical_line> </div> -->
            <a href="profile.php">
                <div class=pic>
                    <!-- Info à rentrer en php -->
                    <img src="Pictures_site/test2.jpg" alt="ppDriver">
                    <p>Nom du mec</p>
                </div>
            </a>

            <div class="dropdown">
              <img src="svg/checkbox.svg" alt="Option button" class="dropbtn"></img>
              <div class="dropdown-content">
                <a href="#">Remove</a>
                <a href="#">Modify</a>
                <div class="button_container">
                    <a href="#" onclick="openModal()">Approve passenger</a>
                </div>
            </div>
          </div>
      </div>

            <!--Boite modale-->
            <div id="modal">
                <h1>New request</h1>
                <hr>
                    <div class="aRequest"><!--PHP : Récupérer info du trajet séléctionné-->
                        <div class="pic">
                        <a href=""><img src="Pictures_site/test2.jpg"></img></a><!--PHP : Photo du passager-->
                        </div>
                        <div class="namePassenger">
                            <a href=""><h3>Cyril Decaud</h3></a><!--PHP : Nom du passager-->
                        </div>
                        <div class="description">
                            <p>J'adore faire chier les gens avec ma sounboard</p><!--PHP : Description du passager-->
                        </div>
                        <div class="choice">
                            <button action="" method="POST"><img src="svg/validate_checkbox.svg"></img></button><!--PHP : Requête passager accepté-->
                        </div>
                        <div class="choice">
                            <button action="" method="POST"><img src="svg/cancel_checkbox.svg"></img></button><!--PHP : Requête passager refusé-->
                        </div>
                    </div>

                    <div class="aRequest"><!--PHP : Récupérer info du trajet séléctionné-->
                        <div class="pic">
                        <a href=""><img src="Pictures_site/test2.jpg"></img></a><!--PHP : Photo du passager-->
                        </div>
                        <div class="namePassenger">
                            <a href=""><h3>Cyril Decaud</h3></a><!--PHP : Nom du passager-->
                        </div>
                        <div class="description">
                            <p>J'adore faire chier les gens avec ma sounboard</p><!--PHP : Description du passager-->
                        </div>
                        <div class="choice">
                            <button action="" method="POST"><img src="svg/validate_checkbox.svg"></img></button><!--PHP : Requête passager accepté-->
                        </div>
                        <div class="choice">
                            <button action="" method="POST"><img src="svg/cancel_checkbox.svg"></img></button><!--PHP : Requête passager refusé-->
                        </div>
                    </div>
                <div id="btnClose">
                    <button id="close" onclick="closeModal()">Close</button>
                </div>
            </div>

        <div class="title_div">
            <img src="svg/paper.svg"/>
            <h2>Rides recently completed</h2>
        </div>

        <div class=ride>
              <div class=info>
                  <!-- Info à rentrer en php -->
                  <div class="pic_label">
                      <img src="svg/calendar.svg" alt="calendar" width="40"/>
                      <label for="" style="">25/05/2020</label>
                  </div>

                  <div class="end_pic_label">
                      <img src="svg/clock.svg" alt="clock" width="40"/>
                      <label for="">15h03</label>
                  </div>
              </div>

              <div class=rideResume>
                  <!-- Info à rentrer en php -->
                  <label for="">
                      Toulouse
                  </label>
                  <img src="svg/city_sep.svg" alt="city" width="50">
                  <label for="">
                      Montpellier
                  </label>
              </div>

              <!-- <div class=vertical_line> </div> -->

              <a href="profile.php">
                  <div class=pic>
                      <!-- Info à rentrer en php -->
                      <img src="Pictures_site/test2.jpg" alt="ppDriver">
                      <p>Nom du mec</p>
                  </div>
              </a>

        </div>

        <script src="javascript/modal.js" type="text/javascript"></script>

    </body>

</HTML>
