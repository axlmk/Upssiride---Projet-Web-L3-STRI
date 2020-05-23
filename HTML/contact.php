<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <?php
            require_once('header.php');
        ?>
        <style>
            #tuile {
                display: flex;
                flex-direction: row;
                align-items: center;
            }
            .tile {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-top: 10%;
                padding-bottom: 60px;
                padding-top: 60px;
            }
            h2 {
                margin-top: 0px;
            }
        </style>
    </head>
    <body>
        <div id="tuile">
            <div class="tile">
                <h2>Administrator informations :</h2>
                <span>Email: <a href="mailto:admin@upssiride.fr">admin@upssiride.fr</a></span>
            </div>
        </div>
    </body>
</html>
