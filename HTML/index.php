<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Index</title>
        <link rel="stylesheet" href="style/index.css"/>
    </head>
    <body>
        <?php
            include_once('header.php');
        ?>

        <div class="choose_ride">
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'offer_ride')" id="default">Offer a ride</button>
                <button class="tablinks" onclick="openTab(event, 'find_ride')">Find a ride</button>
            </div>

            <div id="offer_ride" class="content">
                <form class="" action="index.php" method="post">
                    <label>Where are you leaving from?</label>
                    <input type="text" name="source_address" value="" class="input_button" id="offer_from_button"></br>
                    <label>Where are you going?</label>
                    <input type="text" name="destination_address" value="" class="input_button" id="offer_to_button"></br>
                    <label for="">When?</label>
                    <input type="date" name="date_ride" value="" class="input_button"></br>
                    <label for="">At what time?</label>
                    <div class="getTime">
                        <select class="" name="">
                            <option value="">0</option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                            <option value="">6</option>
                            <option value="">7</option>
                            <option value="">8</option>
                            <option value="">9</option>
                            <option value="">10</option>
                            <option value="">11</option>
                        </select>

                        <select class="" name="">
                            <option value="">00</option>
                            <option value="">15</option>
                            <option value="">30</option>
                            <option value="">45</option>
                        </select>

                        <select class="" name="">
                            <option value="">AM</option>
                            <option value="">PM</option>
                        </select>
                    </div></br>

                    <label for="">How many travellers would you bring with you?</label>
                    <select class="" name="">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                    </select></br>
                    <div class="submit_div">
                        <input type="submit" name="search" value="Offer" class="submit_button" onclick=openModal()>
                    </div>
                </form>
            </div>

            <div id="find_ride" class="content">
                <form class="" action="results.php" method="post" id="find_form">
                    <label>Where are you leaving from?</label>
                    <input type="text" name="find_from_address" value="" class="input_button" id="find_from_button"></br>
                    <label>Where do you want to go?</label>
                    <input type="text" name="find_destination_address" value="" class="input_button" id="find_to_button"></br>
                    <label for="">Which day?</label>
                    <input type="date" name="find_date_ride" value="" class="input_button"></br>
                    <label for="">Around what time?</label>
                    <div class="getTime">
                        <select class="" name="find_hour">
                            <option value="">0</option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                            <option value="">6</option>
                            <option value="">7</option>
                            <option value="">8</option>
                            <option value="">9</option>
                            <option value="">10</option>
                            <option value="">11</option>
                        </select>

                        <select class="" name="find_minutes">
                            <option value="">00</option>
                            <option value="">15</option>
                            <option value="">30</option>
                            <option value="">45</option>
                        </select>

                        <select class="" name="find_time_type">
                            <option value="">AM</option>
                            <option value="">PM</option>
                        </select>
                    </div></br>
                    <div class="submit_div">
                        <input type="button" name="search" value="Search" class="submit_button" onClick="submitFindRide()">
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/places.js@1.18.2"></script>
        <script src="javascript/index.js" type="text/javascript"></script>
    </body>
</html>
