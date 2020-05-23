<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Index</title>
        <link rel="stylesheet" href="style/index.css"/>
        <?php
            require_once('header.php');
            require_once('scripts/cookies.php');
            if(isset($_COOKIE['from_address'])) {
                remove_cookies();
            }
        ?>
    </head>
    <body>

        <div class="choose_ride">
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'offer_ride')" id="default">Offer a ride</button>
                <button class="tablinks" onclick="openTab(event, 'find_ride')">Find a ride</button>
            </div>

            <div id="offer_ride" class="content">
                <form class="" action="confirm.php" method="post" id="offer_form" name="offer_form">
                    <label>Where are you leaving from?</label>
                    <input type="text" name="source_address" value="" class="input_button" id="offer_from_button" required></br>
                    <label for="source_address">Where are you going?</label>
                    <input type="text" name="destination_address" value="" class="input_button" id="offer_to_button" required></br>
                    <label for=destination_address"">When?</label>
                    <input type="date" name="offer_date" value="" class="input_button" form="offer_form" required></br>
                    <label for="offer_date">At what time?</label>
                    <div class="getTime">
                        <select class="" name="offer_hour" form="offer_form">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>

                        <select class="" name="offer_minute" form="offer_form">
                            <option value="00">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                        </select>

                        <select class="" name="offer_meridien" form="offer_form">
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                        </select>
                    </div></br>

                    <label for="">How many travellers would you bring with you?</label>
                    <select class="" name="offer_n_passengers" form="offer_form">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select></br>
                    <div class="submit_div">
                        <input type="input" name="search" value="Offer" class="submit_button" onclick="submitOfferRide()">
                    </div>
                </form>
            </div>

            <div id="find_ride" class="content">
                <form class="" action="results.php" method="post" id="find_form" name="find_form">
                    <label>Where are you leaving from?</label>
                    <input type="text" name="find_from_address" value="" class="input_button" id="find_from_button" ></br>
                    <label>Where do you want to go?</label>
                    <input type="text" name="find_destination_address" value="" class="input_button" id="find_to_button"></br>
                    <label for="">Which day?</label>
                    <input type="date" name="find_date_ride" value="" class="input_button" form="find_form"></br>
                    <label for="">Around what time?</label>
                    <div class="getTime">
                        <select class="" name="find_hour" form="find_form">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                        </select>

                        <select class="" name="find_minutes" form="find_form">
                            <option value="00">00</option>
                            <option value="00">15</option>
                            <option value="00">30</option>
                            <option value="45">45</option> 
                        </select>

                        <select class="" name="find_time_type" form="find_form">
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                        </select>
                    </div></br>
                    <div class="submit_div">
                        <input type="button" name="search" value="Search" class="submit_button" onClick="submitFindRide()" form="find_form">
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/places.js@1.18.2"></script>
        <script src="javascript/index.js" type="text/javascript"></script>
    </body>
</html>


<?php
    include_once 'footer.php';
?>