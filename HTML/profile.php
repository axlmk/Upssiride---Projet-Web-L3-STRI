<?php
    require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title> <! -- Nom de la personne --> </title>
        <link rel="stylesheet" href="style/profile.css"/>
    </head>
    <body>

    <div id=profile class="tile">

        <div class=pic>
            <! -- Info à rentrer en php -->
            <a href="#">
                <img src="Pictures_site/test.jpg" alt="profile picture", class="picture_profile">
                <p>Jean-Didier Bulbon De La Villardière</p>
            </a>
        </div>

        <div class=information>
            <hr>
            <h2>Description</h2>
            <!-- <img src="svg/quotes.png" alt="quotes logo">-->
            <p>J'adore manger des carottes tôt le matin. Les balades en forêt sont mon quotidien.
            Bien qu'un peu bouleversé par le confinnement je prend toujours la voiture et propose mes trajets à de potentiels covitureurs.
        Il est évident que l'état nous ment depuis le début de cette crise et je refuse de troquer ma joie de vivre contre de l'enfumage politique.
    Je joue à Mario Kart.</p>
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
                registered since 2020
            </div>
            <div class=little_vertical_line> </div>
            <div class=ridesCompleted>
                0 rides Completed
            </div>
        </div>

    </div>

    </body>
</HTML>
