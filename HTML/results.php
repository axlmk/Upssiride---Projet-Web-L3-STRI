<?php
    require_once 'functions/auth.php';
    require_once 'functions/sql_account.php';
    require_once 'functions/sql_place.php';
    require_once 'header.php';

    is_connected();

    if(isset($_POST['find_from_country'])){
        if ($_POST['find_from_city']=="undefined"){
            $_POST['find_from_city'] = $_POST['find_from_address'];
            $_POST['find_from_address'] = '';
        }
        if ($_POST['find_to_city']=="undefined"){
            $_POST['find_to_city'] = $_POST['find_to_address'];
            $_POST['find_to_address'] = '';
        }
       // echo $_POST['find_hour']."<br>". $_POST['find_minutes']."<br>".$_POST['find_date_ride']."<br>". $_POST['find_from_city']."<br>". $_POST['find_to_city']."<br>".$_POST['find_time_type']."<br>". $_POST['find_from_zip']."<br>". $_POST['find_to_zip'];
       if (!isset($_SESSION['id'])){
           $id_session = 0;
       }else {
           $id_session = $_SESSION['id'];
       }
       $results = get_search_results($_POST,$id_session);
       // echo $_POST['find_from_country']."<br>".$_POST['find_from_zip']."<br>".$_POST['find_from_city']."<br>".$_POST['find_from_address']."<br>";
       // echo $_POST['find_to_country']."<br>".$_POST['find_to_zip']."<br>".$_POST['find_to_city']."<br>".$_POST['find_to_address']."<br>";
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Results</title>
        <link rel="stylesheet" href="style/results.css"/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin=""/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>
        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
        <style>
            .mapid {
                height: 300px;
                width: 300px;
            }

            .leaflet-routing-container {
                display: none;
            }
        </style>
    </head>
    <body>
        <script src="javascript/results.js" type="text/javascript"></script>
        <h1>Your search</h1>
        <div class=rideSearched>
            <h2>When ?</h2>
            <div class=infoSearched>
              <!-- Info à rentrer en php -->
              <div class="pic_label">
                  <img src="svg/calendar.svg" alt="calendar" width="40"/>
                    <label>
                   <?=$_POST['find_date_ride']?><!--PHP : À récupérer dans le form de recherche-->
                    </label>
              </div>

              <div class="end_pic_label">
                    <img src="svg/clock.svg" alt="clock" width="40"/>
                    <label>
                    <?=$_POST['find_hour'].":".$_POST['find_minutes']." ". $_POST['find_time_type']?><!--PHP : À récupérer dans le form de recherche-->
                    </label>
              </div>
            </div>

            <h2>Where ?</h2>
            <div class=rideResumeSearched>
              <div class="rideResumeContentSearched">
                    <div class="departure">
                        <h3>Departure</h3>
                        <label>
                            <?=$_POST['find_from_city']?><!--PHP : À récupérer dans le form de recherche-->
                        </label>
                    </div>

                    <div class="arrival">
                        <h3>Arrival</h3>
                        <label>
                        <?=$_POST['find_to_city']?><!--PHP : À récupérer dans le form de recherche-->
                        </label>
                    </div>
                </div>
            </div>
            <div id="btnClose">
                <button id="newSearch" ><a href ="index.php">Update filters</a></button>
            </div>
        </div>

        <h1>Results</h1>
        <?php if ($results!=null): ?>
        <?php foreach ($results as $ride): ?>
        <?php
                $place_departure = get_place($ride['idplace_departure']);
                $place_arrived = get_place($ride['idplace_arrived']);
                $driver_profile = get_profile($ride['idaccount']);
                $picture_profile = $driver_profile['pictureprofil'];
                $name_firstname = $driver_profile['firstname'];
                $preferences = get_preferences($ride['idaccount']);
                $accounts = get_all_passengers($ride['idride'], $ride['idaccount']);
                $vehicle = get_vehicles($ride['idaccount']);

        ?>
        <!-- Un trajet -->
        <div class="ride" <?php echo 'id="traj_'.$ride['idride'].'"'?>>
            <div class=info>
                <!-- Info à rentrer en php -->
                <div class="pic_label">
                    <img src="svg/calendar.svg" alt="calendar" width="40"/>
                    <label for="" style=""><?=$ride['departuredate']?></label>
                </div>

                <div class="end_pic_label">
                    <img src="svg/clock.svg" alt="clock" width="40"/>
                    <label for=""><?=$ride['departuretime']?></label>
                </div>
            </div>

            <div class=rideResume>
                <!-- Info à rentrer en php -->
                <label for="">
                     <?=$place_departure?>
                </label>
                <img src="svg/city_sep.svg" alt="city" width="50">
                <label for="">
                    <?=$place_arrived?>
                </label>
            </div>

            <!-- <div class=vertical_line> </div> -->
            <a href="profile.php?id=<?=$ride['idaccount']?>">
                <div class=pic>
                    <!-- Info à rentrer en php -->
                    <img src=<?=$picture_profile?> alt="ppDriver">
                    <p><?=$name_firstname?></p>
                </div>
            </a>

            <div class="dropdown">
              <img src="svg/checkbox.svg" alt="Option button" class="dropbtn"></img>
              <div class="dropdown-content">
                <a <?php echo 'onClick="apply('.$ride['idride'].')"'?>>Apply</a><!--PHP : Requête pour candidater à un trajet-->
                <a <?php echo 'onclick="openModal('.$ride['idride'].')"' ?>>More info</a>
            </div>
          </div>
      </div>

      <!--Boite modale-->
      <div <?php echo 'id="modal_'.$ride['idride'].'"' ?> class="modal"><div class="driverInfo"><!--PHP : Récupérer info du trajet séléctionné-->
                  <h1>Driver</h1>
                  <hr>
                  <div class="pic">
                      <img src="<?=$driver_profile['pictureprofil']?>"></img><!--PHP : Photo du conduecteur-->
                      <h3><?php echo $driver_profile['firstname']." ".$driver_profile['name']?></h3><!--PHP : nom conducteur-->
                  </div>
                  <div class="preferences">
                      <div class="music">
                          <div class="music_icon">
                              <img src="svg/music_ok.svg"></img><!--PHP : Icone préférences musicales du conducteur-->
                          </div>
                          <div class="music_text">
                              <p><?php echo ($preferences['music']) ? "I like to listen to music" : "I don't like to listen to music" ?></p><!--PHP : texte préférences musicales du conducteur-->
                          </div>
                      </div>
                      <div class="talk">
                          <div class="talk_icon">
                              <img src="svg/tchat_ok.svg"></img><!--PHP : Icone préférences de discussions du conducteur-->
                          </div>
                          <div class="talk_text">
                              <p><?php echo ($preferences['chatting']) ? "I like to talk" : "I don't like to talk" ?></p><!--PHP : texte préférences de discussions du conducteur-->
                          </div>
                      </div>
                      <div class="smoke">
                          <div class="smoke_icon">
                              <img src="svg/cigarette_ok.svg"></img><!--PHP : Icone préférences cigarette du conducteur-->
                          </div>
                          <div class="smoke_text">
                              <p><?php echo ($preferences['smoke']) ? "Smoke is allowed" : "Smoke is forbidden" ?></p><!--PHP : texte préférences cigarette du conducteur-->
                          </div>
                      </div>
                      <div class="pets">
                          <div class="pets_icon">
                              <img src="svg/pets_ok.svg"></img><!--PHP : Icone préférences cigarette du conducteur-->
                          </div>
                          <div class="pets_text">
                              <p><?php echo ($preferences['pets']) ? "Smoke are allowed" : "Pets are forbidden" ?></p><!--PHP : texte préférences cigarette du conducteur-->
                          </div>
                      </div>
                  </div>
                  <div class="">
                      <h2>Vehicle</h2>
                  </div>
                  <div class="driverCar">
                      <div class="driverCar_icon">
                          <img src="svg/car.svg" alt="Car"></img>
                      </div>
                      <div class="diverCar_text">
                          <p><?= $vehicle['brand']?></p><!--PHP : Voiture du conducteur-->
                          <p><?= $vehicle['model']?>
                          <p><?= $vehicle['color']?>
                      </div>
                  </div>
              </div>

          <div class="ride_resume">
              <div class="title_summary">
                  <h1>Summary</h1>
                  <hr>
              </div>

              <div class="travel">
                  <div class="travel_resume">
                      <div class="time_info">
                          <p><?php echo $ride['departuredate']?> </p>
                          <p> <?php echo $ride['departuretime']?></p><!--PHP : Heure de départ-->
                      </div>
                      <div class="place_info">
                          <div class="from">
                              <div class="town">
                                  <p><?php echo $ride['city']?></p><!--PHP : Ville de départ-->
                              </div>
                              <?php
                                  if($ride['address'] != "") {
                                    echo "
                                    <div class=\"adress\">
                                    <p>".$ride['address']."</p>
                                    </div>
                                    ";
                                  }
                              ?>

                          </div>
                          <div class="city_sep">
                              <img src="svg/city_sep.svg"></img>
                          </div>
                          <div class="to">
                              <div class="town">
                                  <p><?php echo $ride['12']?></p><!--PHP : Ville d'arrivée-->
                              </div>
                              <?php
                                  if($ride['10'] != "") {
                                    echo "
                                    <div class=\"adress\">
                                    <p>".$ride['10']."</p>
                                    </div>
                                    ";
                                  }
                              ?>
                          </div>
                    </div>
                  </div>

                  <div class="passengers">
                      <div class="passengers_title">
                          <h2>Passengers<h2>
                      </div>
                      <?php if($accounts != null):?>
                          <div class="passengers_team">
                              <?php foreach ($accounts as $account): ?>
                                  <div class="passagers_info" <?php echo 'id="passenger_id_'.$account['idaccount'].'"' ?>>                                                             <!--PHP : Portion à répéter--->
                                    <a href="profile.php?id=<?=$account['idaccount']?>"><img <?php echo 'src="'.$account['pictureprofil'].'"' ?>></img></a>
                                  </div>
                              <?php endforeach?>
                          </div>
                      <?php else: ?>
                          <p>There is no passenger on this ride yet</p>
                      <?php endif ?>
                  </div>
                  <div class="last_conteneur">
                      <div <?php echo 'id="map_'.$ride['idride'].'"' ?> class="mapid"></div>
                      <div class="summary_boutons">
                          <button class="submit_button" <?php echo 'onclick="closeModal('.$ride['idride'].')"' ?>>Close</button>
                          <button class="submit_button" <?php echo 'onClick="apply('.$ride['idride'].')"'?>>Apply</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <?php echo '<script>
      create_map('.$ride['idride'].', '.$ride['lat'].', '.$ride['14'].', '.$ride['lon'].', '.$ride['15'].');
      </script>'
      ?>


    <?php endforeach?>
    <?php endif ?>


        <script type="text/javascript" src="javascript/modal.js"></script>

    </body>

</HTML>


<?php
    include_once 'footer.php';
?>