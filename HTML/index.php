<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="style/tab_style.css"/>
    </head>
    <body>
        <?php
            include_once('header.php');
        ?>

        <div class="tab">
          <button class="tablinks" onclick="openCity(event, 'offer_ride')" id="default">Offer a ride</button>
          <button class="tablinks" onclick="openCity(event, 'find_ride')">Find a ride</button>
        </div>

        <div id="offer_ride" class="content">
          <form class="" action="index.html" method="post">
              <label>Start address</label>
              <input type="text" name="source_address" value=""></p>
              <label>Arrived address</label>
              <input type="text" name="destination_address" value="">
          </form>
        </div>

        <div id="find_ride" class="content">
            <form class="" action="index.html" method="post">
                <label>Start address</label>
                <input type="text" name="source_address" value=""></p>
                <label>Arrived address</label>
                <input type="text" name="destination_address" value="">
            </form>
        </div>


        <script type="text/javascript">

            document.getElementById("default").click();

            function openCity(evt, tabName) {
                var i;
                var tabcontent;
                var tablinks;

                tabcontent = document.getElementsByClassName("content");
                tabcontent[0].style.display = "none";
                tabcontent[1].style.display = "none";

                tablinks = document.getElementsByClassName("tablinks");
                tablinks[0].className = tablinks[0].className.replace(" active", "");
                tablinks[1].className = tablinks[1].className.replace(" active", "");

                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>
    </body>
</html>
