<?php
    function get_place($idplace){
        $bdd = connect_db();
        $query = 'SELECT city FROM place WHERE idplace=?';
        $stmt = $bdd->prepare($query);
        $stmt->execute(array($idplace));
        $result = $stmt->fetch();
        $stmt->closeCursor();
        return $result['city'];
    }
?>