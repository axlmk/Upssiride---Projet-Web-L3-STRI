<?php
    require_once 'header.php';
    require 'functions/sql_sponsors.php';
    $sponsors = get_sponsors();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Sponsors</title>
        <link rel="stylesheet" href="style/sponsors.css"/>
    </head>
    <body>
        <h1> They support us: </h1>
        <?php foreach ($sponsors as $row): ?>
        <div class="tile">
            <div class="pic_container">
                <span class="helper"></span><img src=<?=$row['pictureprofile']?> alt=<?=$row["name"]?>>
            </div>
            <div class="description">
                <h3><?=$row["name"]?></h3>
                <p><?=$row["description"]?></p>
            </div>
        </div>
        <?php endforeach?>
<!-- 
        <div class="tile">
            <div class="pic_container">
                <span class="helper"></span><img src="Pictures_site/stark.jpg" alt="logo Stark Industries">
            </div>
            <div class="description">
                <h3>Stark Industries</h3>
                <p>Stark Industries is a multinational industrial company and the largest tech conglomerate in the world. Founded in 1940 by Howard Stark,
                     the elder Stark ran the company from its inception up until his death in 1991, after which Obadiah Stane was appointed interim CEO, with Tony Stark officially
                     assuming the position shortly after at the age of twenty one.</p>
            </div>
        </div>
        
        <div class="tile">
            <div class="pic_container">
                <span class="helper"></span><img src="Pictures_site/spacex.png" alt="logo Space X">
            </div>
            <div class="description">
                <input type="text"><br/>
                <textarea></textarea>
            </div>
        </div>
        -->
    </body>
</html>
