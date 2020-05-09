<?php
    function get_sponsors(){
        $bdd = connect_db();
        $query = 'SELECT * FROM sponsors order by idsponsors asc';
        $result = $bdd->query($query);
        return $result;
    }

    function edit_sponsor($id, $name, $description){
        $bdd = connect_db();
        $stmt = $bdd->prepare('UPDATE sponsors SET name=?, description = ? WHERE idsponsors=?');
        $result = $stmt->execute(array($name, $description, $id));
        $stmt->closeCursor();
    }
?>
