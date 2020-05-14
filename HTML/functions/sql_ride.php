<?php 
    //require 'auth.php';
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
                    WHERE participate.idaccount= ? and participate.idride = ride.idride or ride.idaccount = ?
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
        $query = 'SELECT ride.idride, ride.departuredate, ride.departuretime, ride.idplace_departure, ride.idplace_arrived, ride.idaccount 
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
?>