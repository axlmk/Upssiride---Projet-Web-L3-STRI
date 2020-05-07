<?php 
    function get_sponsors(){
        $bdd = connect_db();
        $query = 'SELECT * FROM sponsors';
        $result = $bdd->query($query);
        return $result;
    }
?>