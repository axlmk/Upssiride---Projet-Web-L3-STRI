<?php

    function accept_pass($id_passenger, $id_ride) {
        $bdd = connect_db();
        if ($bdd==null){
            return false;
        }
        $query = "INSERT INTO participate VALUES('$id_passenger','$id_ride')";
        $bdd->query($query);
        $query2 = "DELETE FROM require WHERE idaccount=$id_passenger AND idride=$id_ride";
        $bdd->query($query2);
    }

    function decline_pass($id_passenger, $id_ride) {
        $bdd = connect_db();
        if ($bdd==null){
            return false;
        }
        $query = "INSERT INTO participate VALUES('$id_passenger','$id_ride')";
        $bdd->query($query);
        $query2 = "DELETE FROM require WHERE idaccount='$id_passenger' AND idride='$id_ride'";
        $bdd->query($query2);
    }
?>
