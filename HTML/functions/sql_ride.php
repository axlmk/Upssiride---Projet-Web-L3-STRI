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
        $query = 'SELECT * FROM ride WHERE email=?';
        $bdd->prepare($query);
        
    }

    function get_my_rides_completed($id){
        
    }

