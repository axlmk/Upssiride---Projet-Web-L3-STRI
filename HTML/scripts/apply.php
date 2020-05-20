<?php
    if (!is_connected()){
        header("Location: connection.php");
    }

    if (isset($_POST['apply'])){
        $bdd = connect_db();
        if ($bdd==null){
            return false;
        }
        $id_ride = $_POST['id_ride'];
        $id_passenger = $_SESSION['id'];
        $query = "INSERT INTO require VALUES($id_passenger,$id_ride,'processing')";
        $bdd->query($query);
        header("Location: /HTML/my_rides.php");
    }
    
    header("Location: /HTML/my_rides.php");
?>