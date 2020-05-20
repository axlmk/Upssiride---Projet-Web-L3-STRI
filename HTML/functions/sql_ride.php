<?php
    require_once 'pgsql_connect.php';
    require_once 'scripts/utils.php';
    function check_notification($id){
        $bdd = connect_db();
        if ($bdd==null){
            return false;
        }
        $query = 'SELECT recquire.idaccount FROM recquire,ride,account WHERE account.idaccount=? AND ride.idaccount=? AND recquire.idride=ride.idride';
        $stmt = $bdd->prepare($query);
        $stmt->execute(array($id,$id));
        $result = $stmt->fetchAll();
        $stmt->closeCursor();
        if (count($result)>0){
            return true;
        }
        return false;
    }

    function get_my_rides($id){
        $bdd = connect_db();
        $query = 'SELECT DISTINCT ride.idride, ride.departuredate, ride.departuretime, ride.idplace_departure, ride.idplace_arrived, ride.idaccount
                    FROM ride, participate
                    WHERE (participate.idaccount= ? and participate.idride = ride.idride or ride.idaccount = ? ) and ride.idstate=1
                    ORDER BY ride.departuredate ASC';
        $stmt = $bdd->prepare($query);
        $stmt->execute(array($id,$id));
        $data = $stmt->fetchAll();
        $stmt->closeCursor();
        return $data;
    }

    function get_my_rides_required($id){
        $bdd = connect_db();
        $query = 'SELECT ride.idride, departuredate, departuretime, idplace_departure, idplace_arrived, ride.idaccount
                    FROM ride, require
                    WHERE require.idaccount = ? AND ride.idride=require.idride
                    ORDER BY ride.departuredate ASC';
        $stmt = $bdd->prepare($query);
        $stmt->execute(array($id));
        $data = $stmt->fetchAll();
        $stmt->closeCursor();
        return $data;
    }

    function get_my_rides_completed($id){
        $bdd = connect_db();
        $query = 'SELECT DISTINCT ride.idride, ride.departuredate, ride.departuretime, ride.idplace_departure, ride.idplace_arrived, ride.idaccount
                    FROM ride, participate
                    WHERE (participate.idaccount= ? and participate.idride = ride.idride or ride.idaccount = ?) and ride.idstate = 3
                    ORDER BY ride.departuredate ASC';
        $stmt = $bdd->prepare($query);
        $stmt->execute(array($id,$id));
        $data = $stmt->fetchAll();
        $stmt->closeCursor();
        return $data;
    }

    function get_passengers_request($id_ride){
        $bdd = connect_db();
        if ($bdd==null){
            return false;
        }
        $query = "SELECT idaccount FROM require WHERE idride=$id_ride AND state_request='processing'";
        $stmt = $bdd->query($query);
        $result = $stmt->fetchAll();
        $stmt->closeCursor();
        return $result;
    }

    function accept_passenger($id_ride, $id_passenger){
        $bdd = connect_db();
        if ($bdd==null){
            return false;
        }
        $query = "INSERT INTO participate VALUES($id_passenger,$id_ride)";
        $bdd->query($query);
        $query2 = "DELETE FROM require WHERE idaccount=$id_passenger AND idride=$id_ride";
        $bdd->query($query2);
    }

    function setup_ride($places, $dates, $n_passengers, $id) {
        $res = setup_places($places);
        if($res == null) { return false; }
        $bdd = connect_db();
        if($bdd == null) { return false; }

        $departuredate = $dates["date"];
        $departuretime = $dates["timestamp"];
        $idplace_departure = $res[0];
        $idplace_arrived = $res[1];

        $nMore30 = getDateModified($dates["hour"], $dates["minute"], $dates["meridien"], 30, "+");
        $nMinus30 = getDateModified($dates["hour"], $dates["minute"], $dates["meridien"], 30, "-");
        $stmt = $bdd->prepare('SELECT idride FROM ride WHERE departuredate=? AND departuretime>? AND departuretime<? AND idaccount=?');
        $result = $stmt->execute(array($departuredate, $nMinus30, $nMore30, $id));
        if($stmt->rowCount() > 0) {
            return false;
        }

        $query = "INSERT INTO ride VALUES(default, '$departuredate', '$departuretime', 'rien pour le moment', '$n_passengers', '1', '$idplace_departure', '$idplace_arrived', '$id')";
        $stmt = $bdd->query($query);

        $stmt = $bdd->prepare('SELECT idride FROM ride WHERE departuredate=? AND departuretime=? AND comment=? AND maxpassengersnb=? AND idstate=? AND idplace_departure=? AND idplace_arrived=? AND idaccount=?');
        $result = $stmt->execute(array($departuredate, $departuretime, 'rien pour le moment', $n_passengers, 1, $idplace_departure, $idplace_arrived, $id));
        $idride = $stmt->fetchColumn();

        $query = "INSERT INTO participate VALUES('$id', '$idride')";
        $stmt = $bdd->query($query);

        return $stmt;
    }

    function setup_places($places) {
        $arr = array();
        foreach($places as $place) {
            $res = setup_place($place['address'], $place['zip'], $place['city'], $place['country'], $place['lat'], $place['lng']);
            if($res == -1) {
                return null;
            } else {
                array_push($arr, $res);
            }
        }
        return $arr;
    }

    function setup_place($address, $zip, $city, $country, $lat, $lng) {
        if($address == 'undefined') { $address = '';};
        $bdd = connect_db();
        if ($bdd == null) { return -1; }
        $stmt = $bdd->prepare('SELECT idplace FROM place WHERE address=? AND postcode=? AND city=? AND country=?');
        $stmt->execute(array($address, $zip, $city, $country));

        if($stmt->rowCount() > 0) {
            $result = $stmt->fetchColumn();
            $stmt->closeCursor();
            return $result;
        }


        $query = "INSERT INTO place VALUES(default, '$address', '$zip', '$city', '$country', '$lat', '$lng')";
        $bdd->query($query);

        $stmt = $bdd->prepare('SELECT idplace FROM place WHERE address=? AND postcode=? AND city=? AND country=?');
        $result = $stmt->execute(array($address, $zip, $city, $country));

        $result = $stmt->fetchColumn();
        $stmt->closeCursor();
        return $result;
    }

    function get_search_results($filters){
        $bdd = connect_db();
        $mintime = getDateModified($filters['find_hour'], $filters['find_minutes'], $filters['find_time_type'], 59, "-");
        $maxtime = getDateModified($filters['find_hour'], $filters['find_minutes'], $filters['find_time_type'], 59, "+");
        $query ="SELECT * FROM ride, place AS place1 , place AS place2 
                    WHERE ride.departuredate=? AND ride.departuretime>=$mintime AND ride.departuretime<=$maxtime 
                    AND place1.city=? AND place1.postcode =? AND place1.idplace = ride.idplace_departure
                    AND place2.city=? AND place2.postcode =? AND place2.idplace = ride.idplace_arrived";
        echo "<br/>" .$query."<br/>";
        $stmt = $bdd->prepare($query);
        $stmt->execute(array($filters['find_date_ride'],$filters['find_from_city'],$filters['find_from_zip'],$filters['find_to_city'],$filters['find_to_zip']));
        $results = $stmt->fetchAll();
        echo "nb lignes".count($results);
        $stmt->closeCursor();
        return $results;
    }

    /*
    SELECT * FROM ride, place as place1 , place as place2 
WHERE ride.departuredate='2020/05/15' AND ride.departuretime='01:00:00' 
AND place1.city='Bulls Cross' AND place1.postcode ='EN2 9HE' AND place1.idplace = ride.idplace_departure
AND place2.city='Effiat' AND place2.postcode ='63260' AND place2.idplace = ride.idplace_arrived;

SELECT * FROM ride, place AS place1 , place AS place2 
WHERE ride.departuredate='2020-05-24' AND ride.departuretime>='15:1:00' AND ride.departuretime<='16:59:00'
AND place1.city='Tarbes' AND place1.postcode ='65000' AND place1.idplace = ride.idplace_departure 
AND place2.city='Pau' AND place2.postcode = '64000' AND place2.idplace = ride.idplace_arrived;
*/
?>
