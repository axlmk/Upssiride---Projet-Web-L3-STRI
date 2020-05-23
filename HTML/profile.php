<?php
    require_once 'header.php';
    require_once 'functions/sql_account.php';
    if (isset($_GET['id'])){
        $profile = get_profile($_GET['id']);
        $nb_rides = count(get_my_rides_completed($_GET['id']));
        if (!$profile){
            header("Location: my_account.php");
        }
    }
    else {
        header("Location: my_account.php");
    }

    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title> <?=$profile['name'] . " " . $profile['firstname'] ?> | Profile</title>
        <link rel="stylesheet" href="style/profile.css"/>
    </head>
    <body>

    <div id=profile class="tile">

        <div class=pic>
            <! -- Info à rentrer en php -->
            <a href="#">
                <img src=<?=$profile['pictureprofil']?> alt="profile picture", class="picture_profile">
                <p><?=$profile['firstname'] . " " . $profile['name'] ?></p>
            </a>
        </div>

        <div class=information>
            <hr>
            <h2>Description</h2>
            <!-- <img src="svg/quotes.png" alt="quotes logo">-->
            <p> <?=$profile['description'] ?></p>
        </div>

        <div class="preferences">
            <div class="pic_label">
                <img src="svg/music.svg" alt="music">
                <label>I love to listen to music</label>
            </div>
            <div class=pic_label>
                <img src="svg/tchat.svg" alt="talk">
                <label>I don't like to talk</label>
            </div>
            <div class=pic_label>
                <img src="svg/cigarette.svg" alt="cigarette">
                <label>I don't smoke</label>
            </div>
        </div>

        <! -- A compléter en PHP -- >
        <div class=stats>
            <div class=registered>
                registered since <?=date('F Y',strtotime($profile['registrationdate']))?>
            </div>
            <div class=little_vertical_line> </div>
            <div class=ridesCompleted>
                <?=$nb_rides?> rides Completed
            </div>
        </div>

    </div>

    </body>
</HTML>


<?php
    include_once 'footer.php';
?>