<?php

    function accept_pass($id_passenger, $id_ride) {
        $bdd = connect_db();
        if ($bdd==null){
            return -1;
        }
        $query2 = "DELETE FROM require WHERE idaccount=$id_passenger AND idride=$id_ride";
        $stmt = $bdd->query($query2);
        if($stmt->rowCount() > 0) {
            $query = "INSERT INTO participate VALUES('$id_passenger','$id_ride')";
            $bdd->query($query);
            return 1;
        } else {
            return 0;
        }
    }

    function decline_pass($id_passenger, $id_ride) {
        $bdd = connect_db();
        if ($bdd==null){
            return -1;
        }
        $query2 = "DELETE FROM require WHERE idaccount=$id_passenger AND idride=$id_ride";
        $stmt = $bdd->query($query2);
    }

    function cancel_ride($id_passenger, $id_ride) {
        $bdd = connect_db();
        if ($bdd == null){
            return false;
        }
        $query = "DELETE FROM require WHERE idaccount=$id_passenger AND idride=$id_ride";
        $bdd->query($query);
    }

    function remove_from_ride($id_passenger, $id_ride) {
        $bdd = connect_db();
        if ($bdd == null){
            return false;
        }
        $query = "DELETE FROM participate WHERE idaccount=$id_passenger AND idride=$id_ride";
        $bdd->query($query);
    }
?>
