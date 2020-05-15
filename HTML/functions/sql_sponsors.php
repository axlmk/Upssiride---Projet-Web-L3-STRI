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

    function edit_pp_sponsor($id, $pp) {
        $bdd = connect_db();
        $stmt = $bdd->prepare('UPDATE sponsors SET pictureprofile=? WHERE idsponsors=?');
        $result = $stmt->execute(array($pp, $id));
        $stmt->closeCursor();
    }

    function add_sponsor($name, $description, $pictureprofile){
        $bdd = connect_db();
        echo $name."<br>".$description."<br>".$pictureprofile;
        $query = "INSERT INTO sponsors values(default, ?, ?, ?)";
        $stmt = $bdd->prepare($query);
        $stmt->execute(array($name, $description, $pictureprofile));
    }

    function delete_sponsor($idsponsor){
        $bdd = connect_db();
        $stmt = $bdd->prepare("DELETE FROM sponsors WHERE idsponsors=?");
        $stmt->execute(array($idsponsor));
        $stmt->closeCursor();
    }
?>
