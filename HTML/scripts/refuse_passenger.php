<?php
    $bdd = connect_db();
    if ($bdd==null){
        return false;
    }
    $query = "DELETE FROM require WHERE idaccount=$id_passenger AND idride=$id_ride";
    $bdd->query($query);
    header("Location: /HTML/my_rides.php");
?>