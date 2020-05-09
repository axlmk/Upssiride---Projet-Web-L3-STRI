<?php
    function get_sponsors(){
        $bdd = connect_db();
        $query = 'SELECT * FROM sponsors';
        $result = $bdd->query($query);
        return $result;
    }

    function set_sponsor($id, $title, $desc) {
        $bdd = connect_db();
        $stmt = $bdd->prepare('UPDATE sponsors SET name=?, description = ? WHERE idsponsors=?');
        $result = $stmt->execute(array($title, $desc, $id));
        $stmt->closeCursor();
        return $result;
    }
?>
