<?php
    require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title> <! -- Nom de la personne --> </title>
    </head>
    <body>

    <div id=profile>

        <div class=pic>
            <! -- Info à rentrer en php -->
            <a href="#">
                <img src="Pictures_site/test.jpg" alt="profile picture">
                <p>Nom du mec</p>
            </a>
        </div>

        <div class=information>
            <hr>
            <h2>Description</h2>
            <!-- <img src="Pictures_site/quotes.png" alt="quotes logo">-->
            <h3>blablaablablablablabalabl</h3>
        </div>
        <br>
        <br>

        <div class=preferences>
            <div class=music>
                <img src="Pictures_site/music.png" alt="music">
                    <! -- A modif en fonction des préférences -->
                I love to listen to music
                <br>
            </div>
            <div class=talk>
                <img src="Pictures_site/talk.png" alt="talk">
                    <! -- A modif en fonction des préférences -->
                I don't like to talk
                <br>
            </div>
            <div class=cigarette>
                <img src="Pictures_site/cigarette.png" alt="cigarette">
                    <! -- A modif en fonction des préférences -->
                I don't smoke
                <br>
            </div>
        </div>
        <br>
        <br>

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