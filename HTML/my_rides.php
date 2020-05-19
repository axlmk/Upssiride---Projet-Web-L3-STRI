<?php
    require_once 'functions/auth.php';
    require_once 'functions/sql_ride.php';
    require_once 'functions/sql_account.php';
    require_once 'functions/sql_place.php';
    require_once 'header.php';
    require_once 'scripts/cookies.php';
    require_once 'scripts/utils.php';


    if (!is_connected()){
        header("Location: connection.php");
    }

    if(isset($_COOKIE['from_city'])) {
        $from_latlng = explode('_', $_COOKIE['from_coord']);
        $to_latlng = explode('_', $_COOKIE['to_coord']);
        $from_place = array("address" => $_COOKIE['from_address'], "zip" => $_COOKIE['from_zip'], "city" => $_COOKIE['from_city'], "country" => $_COOKIE['from_country'], "lat" => $from_latlng[0], "lng" => $from_latlng[1]);
        $to_place = array("address" => $_COOKIE['to_address'], "zip" => $_COOKIE['to_zip'], "city" => $_COOKIE['to_city'], "country" => $_COOKIE['to_country'], "lat" => $to_latlng[0], "lng" => $to_latlng[1]);
        $time_info = array("date" => $_COOKIE['ride_date'], "timestamp" => convertToFullTime($_COOKIE['ride_hour'], $_COOKIE['ride_minute'], $_COOKIE['ride_meridien']), "hour" => $_COOKIE['ride_hour'], "minute" => $_COOKIE['ride_minute'], "meridien" => $_COOKIE['ride_meridien']);
        setup_ride(array($from_place, $to_place), $time_info, $_COOKIE['ride_n_passengers'], 4);
        remove_cookies();
    }


    $resultrequire = get_my_rides_required($_SESSION['id']);
    $resultride = get_my_rides($_SESSION['id']);
    $resultcompleted = get_my_rides_completed($_SESSION['id']);
    //echo $resultride['idride'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>My rides</title>
        <link rel="stylesheet" href="style/my_rides.css"/>
    </head>
    <body>
    <?php if ($resultrequire!=null): ?>
        <div class="title_div">
            <img src="svg/hourglass.svg"/>
            <h2>Request sent</h2>
        </div>
        
        <?php foreach ($resultrequire as $require): ?>
            <?php 
                $driver_name = get_name_firstname($require['idaccount']);
                $place_departure = get_place($require['idplace_departure']);
                $place_arrived = get_place($require['idplace_arrived']);
                $picture_profile = get_picture_profile($require['idaccount']);
            ?>
            <div class="ride">
                <div class=info>
                
                    <div class="pic_label">
                        <img src="svg/calendar.svg" alt="calendar" width="40"/>
                        <label for="" style=""><?=$require['departuredate']?></label>
                    </div>

        <?php foreach ($resultrequire as $require): ?>
            <?php
                $driver_name = get_name_firstname($require['idaccount']);
                $place_departure = get_place($require['idplace_departure']);
                $place_arrived = get_place($require['idplace_arrived']);
                $picture_profile = get_picture_profile($require['idaccount']);
            ?>
            <div class="ride">
                <div class=info>

                    <div class="pic_label">
                        <img src="svg/calendar.svg" alt="calendar" width="40"/>
                        <label for="" style=""><?=$require['departuredate']?></label>
                    </div>

                    <div class="end_pic_label">
                        <img src="svg/clock.svg" alt="clock" width="40"/>
                        <label for=""><?=$require['departuretime']?></label>
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
                <a href="profile.php?id=<?=$require['idaccount']?>">
                    <div class=pic>
                        <!-- Info à rentrer en php -->
                        <img src=<?=$picture_profile?> alt="ppDriver">
                        <p> <?=$driver_name?> </p>
                    </div>
                </a>

                <div class="dropdown">
                    <img src="svg/checkbox.svg" alt="Option button" class="dropbtn"></img>
                    <div class="dropdown-content">
                        <a href="#">Cancel</a><!-- PHP : Requête d'annulation de participation -->
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
        <div class="title_div">
            <img src="svg/car.svg"/>
            <h2>Rides to come</h2>
        </div>
        <!-- Un trajet -->
<!-- Debut du div-->
    <?php if ($resultride!=null): ?>
        <?php foreach ($resultride as $ride): ?>
            <?php
                    $driver_name = get_name_firstname($ride['idaccount']);
                    $departure = get_place($ride['idplace_departure']);
                    $arrived = get_place($ride['idplace_arrived']);
                    $picture_profile = get_picture_profile($ride['idaccount']);
            ?>
            <!-- Un trajet -->
            <div class="ride">
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
                        <?=$departure?>
                    </label>
                    <img src="svg/city_sep.svg" alt="city" width="50">
                    <label for="">
                        <?=$arrived?>
                    </label>
                </div>

                <!-- <div class=vertical_line> </div> -->
                <a href="profile.php?id=<?=$ride['idaccount']?>">
                    <div class=pic>
                        <!-- Info à rentrer en php -->
                        <img src="<?=$picture_profile?>" alt="ppDriver">
                        <p><?=$driver_name?></p>
                    </div>
                </a>

                <div class="dropdown">
                    <img src="svg/checkbox.svg" alt="Option button" class="dropbtn"></img>
                    <div class="dropdown-content">
                        <a href="#">Remove</a>
                        <?php if ($_SESSION['id']==$ride['idaccount']): ?> <!-- Si l'utilisateur est conducteur -->
                            <a href="#">Modify</a>
                            <div class="button_container">
                                <a href="#" onclick="openModal()">Approve passenger</a>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <?php if ($_SESSION['id']==$ride['idaccount']): ?>
            <?php $resume = get_passengers_request($ride['idride']); ?>
                <!--Boite modale-->
                <div id="modal">
                    <h1>New request</h1>
                    <hr>
                    <?php foreach($resume as $passenger): ?>
                        <?php
                            //$passenger_name = get_name_firstname($passenger['idaccount']);
                            //$pdd = get_picture_profile($passenger['idaccount']);
                            $passenger_resume = get_resume_passenger($passenger['idaccount']);
                        ?>
                        <div class="aRequest"><!--PHP : Récupérer info du trajet séléctionné-->
                            <div class="pic">
                            <a href="profile.php?id=<?=$passenger['idaccount']?>"><img src=<?=$passenger_resume['pictureprofil']?>></img></a><!--PHP : Photo du passager-->
                            </div>
                            <div class="namePassenger">
                                <a href="profile.php?id=<?=$passenger['idaccount']?>"><h3><?=$passenger_resume['firstname'] . " " . $passenger_resume['name'] ?></h3></a><!--PHP : Nom du passager-->
                            </div>
                            <div class="description">
                                <p><?=$passenger_resume['description']?></p><!--PHP : Description du passager-->
                            </div>
                            <div class="choice">
                                <button action="" method="POST"><img src="svg/validate_checkbox.svg"></img></button><!--PHP : Requête passager accepté-->
                            </div>
                            <div class="choice">
                                <button action="" method="POST"><img src="svg/cancel_checkbox.svg"></img></button><!--PHP : Requête passager refusé-->
                            </div>
                        </div>
                    <?php endforeach ?>
                    <div id="btnClose">
                        <button id="close" onclick="closeModal()">Close</button>
                    </div>
                </div>
            <?php endif ?>

        <?php endforeach?>
    <?php else: ?>
        <p>Any ride to come! <p>
    <?php endif ?>
        <div class="title_div">
            <img src="svg/paper.svg"/>
            <h2>Rides recently completed</h2>
        </div>
    <?php if ($resultcompleted!=null): ?>
        <?php foreach ($resultcompleted as $completed): ?>
            <?php
                $driver_name = get_name_firstname($completed['idaccount']);
                $place_departure = get_place($completed['idplace_departure']);
                $place_arrived = get_place($completed['idplace_arrived']);
                $picture_profile = get_picture_profile($completed['idaccount']);
            ?>
            <div class=ride>
                <div class=info>
                    <!-- Info à rentrer en php -->
                    <div class="pic_label">
                        <img src="svg/calendar.svg" alt="calendar" width="40"/>
                        <label for="" style=""><?=$completed['departuredate']?></label>
                    </div>

                    <div class="end_pic_label">
                        <img src="svg/clock.svg" alt="clock" width="40"/>
                        <label for=""><?=$completed['departuretime']?></label>
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

                <a href="profile.php?id=<?=$completed['idaccount']?>">
                    <div class=pic>
                        <!-- Info à rentrer en php -->
                        <img src=<?=$picture_profile?> alt="ppDriver">
                        <p><?=$driver_name?></p>
                    </div>
                </a>
            </div>
        <?php endforeach?>
    <?php endif?>
        <script src="javascript/modal.js" type="text/javascript"></script>

    </body>

</HTML>
