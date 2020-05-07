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
        <h2>Rides to come</h2>
        <!-- Un trajet -->
<!-- Debut du div-->
<!-- foreach ($result as $row) {
        print $row["id"] . "-" . $row["value"] ."<br/>";
    } -->
        <?php ?>
        <div class="ride">
            <div class=info>
                <!-- Info à rentrer en php -->
                <div class="pic_label">
                    <img src="Pictures_site/calendar.svg" alt="calendar" width="40"/>
                    <label for="" style="">25/05/2020</label>
                </div>

                <div class="end_pic_label">
                    <img src="Pictures_site/clock.svg" alt="clock" width="40"/>
                    <label for="">15h03</label>
                </div>
            </div>

            <div class=rideResume>
                <!-- Info à rentrer en php -->
                <label for="">
                    Toulouse
                </label>
                <img src="Pictures_site/city_sep.svg" alt="city" width="50">
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
              <img src="Pictures_site/checkbox.svg" alt="Option button" class="dropbtn"></img>
              <div class="dropdown-content">
                <a href="#">Remove</a>
                <a href="#">Modify</a>
                <a href="#openModal">Approve passenger</a>

                <!--Boite modale-->
                <div id="openModal" class="modalDialog">

                    <div><a href="#close" title="Close" class="close">X</a>
                        
                        <div id="conteneurPopup">
                            <h2>New request</h2>
                            <!--Une requête-->
                            <div class="aRequest">
                                <div class="pic">
                                    <!--Photo de profil + Nom du mec à insérer-->
                                    <img src="pictures_site/test2.jpg">
                                </div>
                                <div class="name">
                                    <!--Nom du mec-->
                                    <h3> Cyril Decaud</h3>
                                </div>
                                <div class="description">
                                    <!--Description du mec-->
                                    <p>Hello j'adore faire chier les gens avec ma soundbox</p>
                                </div>
                                <div class="choice">
                                    <img src="pictures_site/OK.png" action="" method='post'> <!--PHP pour accpeter la requête-->
                                </div>
                                <div class="choice">
                                    <img src="pictures_site/NOK.png" action="" method='post'> <!--PHP pour refuser la requête-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>    
                        if(document.getElementsByClassName('modalDialog').style.opacity != "0"){
                            document.getElementsByClassName('header').style.opacity = "0";
                        } else {
                            document.getElementsByClassName('header').style.opacity = "0";
                        }
                    </script>

                </div>

              </div>
          </div>
      </div>
<<<<<<< HEAD

        <!-- Un trajet -->
        <div class="ride">
            <div class=info>
                <!-- Info à rentrer en php -->
                <div class="pic_label">
                    <img src="Pictures_site/calendar.svg" alt="calendar" width="40"/>
                    <label for="" style="">25/05/2020</label>
                </div>

                <div class="end_pic_label">
                    <img src="Pictures_site/clock.svg" alt="clock" width="40"/>
                    <label for="">15h03</label>
                </div>
            </div>
=======
<!-- Fin du div -->
        <div class=ride>
              <div class=info>
                  <!-- Info à rentrer en php -->
                  <div class="pic_label">
                      <img src="Pictures_site/calendar.svg" alt="calendar" width="40"/>
                      <label for="" style="">25/05/2020</label>
                  </div>

                  <div class="end_pic_label">
                      <img src="Pictures_site/clock.svg" alt="clock" width="40"/>
                      <label for="">15h03</label>
                  </div>
              </div>
              <div class=rideResume>
                  <!-- Info à rentrer en php -->
                  <label for="">
                      Toulouse
                  </label>
                  <img src="Pictures_site/city_sep.svg" alt="city" width="50">
                  <label for="">
                      Montpellier
                  </label>
              </div>
>>>>>>> 787a60d372297170a49ea76e33b110565f632abd

            <div class=rideResume>
                <!-- Info à rentrer en php -->
                <label for="">
                    Toulouse
                </label>
                <img src="Pictures_site/city_sep.svg" alt="city" width="50">
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
              <img src="Pictures_site/checkbox.svg" alt="Option button" class="dropbtn"></img>
              <div class="dropdown-content">
                <a href="#">Remove</a>
                <a href="#">Modify</a>
                <a href="#openModal">Approve passenger</a>

                <!--Boite modale-->
                <div id="openModal" class="modalDialog">

                    <div><a href="#close" title="Close" class="close">X</a>
                        
                        <div id="conteneurPopup">
                            <h2>New request</h2>
                            <!--Une requête-->
                            <div class="aRequest">
                                <div class="pic">
                                    <!--Photo de profil + Nom du mec à insérer-->
                                    <img src="pictures_site/test2.jpg">
                                </div>
                                <div class="name">
                                    <!--Nom du mec-->
                                    <h3> Cyril Decaud</h3>
                                </div>
                                <div class="description">
                                    <!--Description du mec-->
                                    <p>Hello j'adore faire chier les gens avec ma soundbox</p>
                                </div>
                                <div class="choice">
                                    <img src="pictures_site/OK.png"> <!--PHP pour accepter la requête-->
                                </div>
                                <div class="choice">
                                    <img src="pictures_site/NOK.png"> <!--PHP pour refuser la requête-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

              </div>
          </div>
      </div>

        <div class=ride>
              <div class=info>
                  <!-- Info à rentrer en php -->
                  <div class="pic_label">
                      <img src="Pictures_site/calendar.svg" alt="calendar" width="40"/>
                      <label for="" style="">25/05/2020</label>
                  </div>

                  <div class="end_pic_label">
                      <img src="Pictures_site/clock.svg" alt="clock" width="40"/>
                      <label for="">15h03</label>
                  </div>
              </div>

              <div class=rideResume>
                  <!-- Info à rentrer en php -->
                  <label for="">
                      Toulouse
                  </label>
                  <img src="Pictures_site/city_sep.svg" alt="city" width="50">
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
                <img src="Pictures_site/checkbox.svg" alt="Option button" class="dropbtn"></img>
                <div class="dropdown-content">
                  <a href="#">Remove</a>
                  <a href="#">Modify</a>
                  <a href="#openModal">Approve passenger</a>

                <!--Boite modale-->
                <div id="openModal" class="modalDialog">

                    <!--Contenu à modifier en fonction de la réussite du formulaire-->
                    <div>	<a href="#close" title="Close" class="close">X</a>
                        <h2>Your account was successfully created !</h2>
                        <p>An email confirmation was sent to your email adress</p>
                    </div>
                </div>

                </div>
            </div>

        </div>

        <div class=ride>
              <div class=info>
                  <!-- Info à rentrer en php -->
                  <div class="pic_label">
                      <img src="Pictures_site/calendar.svg" alt="calendar" width="40"/>
                      <label for="" style="">25/05/2020</label>
                  </div>

                  <div class="end_pic_label">
                      <img src="Pictures_site/clock.svg" alt="clock" width="40"/>
                      <label for="">15h03</label>
                  </div>
              </div>

              <div class=rideResume>
                  <!-- Info à rentrer en php -->
                  <label for="">
                      Toulouse
                  </label>
                  <img src="Pictures_site/city_sep.svg" alt="city" width="50">
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
                <img src="Pictures_site/checkbox.svg" alt="Option button" class="dropbtn"></img>
                <div class="dropdown-content">
                  <a href="#">Remove</a>
                  <a href="#">Modify</a>
                  <a href="#openModal">Approve passenger</a>

                    <!--Boite modale-->
                    <div id="openModal" class="modalDialog">

                        <!--Contenu à modifier en fonction de la réussite du formulaire-->
                        <div>	<a href="#close" title="Close" class="close">X</a>
                            <h2>New request</h2>
                            <div class="passengerRequest">
                                <div class=pic>
                                    <img src="Pictures_site/test2.jpg" alt="ppDriver">
                                    <p>Nom du mec</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>


        <h2>Rides recently completed</h2>

        <div class=ride>
              <div class=info>
                  <!-- Info à rentrer en php -->
                  <div class="pic_label">
                      <img src="Pictures_site/calendar.svg" alt="calendar" width="40"/>
                      <label for="" style="">25/05/2020</label>
                  </div>

                  <div class="end_pic_label">
                      <img src="Pictures_site/clock.svg" alt="clock" width="40"/>
                      <label for="">15h03</label>
                  </div>
              </div>

              <div class=rideResume>
                  <!-- Info à rentrer en php -->
                  <label for="">
                      Toulouse
                  </label>
                  <img src="Pictures_site/city_sep.svg" alt="city" width="50">
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

    </body>

</HTML>
