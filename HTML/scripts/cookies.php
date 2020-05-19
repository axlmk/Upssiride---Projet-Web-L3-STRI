<?php
    function remove_cookies() {
        unset($_COOKIE['from_address']);
        setcookie('from_address', '', time() - 3600);
        unset($_COOKIE['from_zip']);
        setcookie('from_zip', '', time() - 3600);
        unset($_COOKIE['from_city']);
        setcookie('from_city', '', time() - 3600);
        unset($_COOKIE['from_country']);
        setcookie('from_country', '', time() - 3600);
        unset($_COOKIE['to_address']);
        setcookie('to_address', '', time() - 3600);
        unset($_COOKIE['to_zip']);
        setcookie('to_zip', '', time() - 3600);
        unset($_COOKIE['to_city']);
        setcookie('to_city', '', time() - 3600);
        unset($_COOKIE['to_country']);
        setcookie('to_country', '', time() - 3600);
        unset($_COOKIE['ride_date']);
        setcookie('ride_date', '', time() - 3600);
        unset($_COOKIE['ride_hour']);
        setcookie('ride_hour', '', time() - 3600);
        unset($_COOKIE['ride_minute']);
        setcookie('ride_minute', '', time() - 3600);
        unset($_COOKIE['ride_meridien']);
        setcookie('ride_meridien', '', time() - 3600);
        unset($_COOKIE['from_address']);
        setcookie('from_address', '', time() - 3600);
        unset($_COOKIE['ride_n_passengers']);
        setcookie('ride_n_passengers', '', time() - 3600);
        unset($_COOKIE['from_coord']);
        setcookie('ride_n_passengers', '', time() - 3600);
        unset($_COOKIE['to_coord']);
        setcookie('ride_n_passengers', '', time() - 3600);
    }
?>
