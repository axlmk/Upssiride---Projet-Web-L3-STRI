<?php
    
    function get_profiles(){
        $bdd = connect_db();
        $data = $bdd->query("SELECT * FROM account ORDER BY idaccount ASC");
        return $data->fetchAll();
    }
    
    function change_pass($id,$pass){
        $bdd = connect_db();
        $query = "UPDATE account SET password=? WHERE idaccount=?";
        $stmt = $bdd->prepare($query);
        $stmt->execute(array($pass,$id));
        $stmt->closeCursor();
    }

    function research_profile($name, $firstname){
        if (empty($name)){
            $query = "SELECT * FROM account WHERE firstname=$firstname ORDER BY idaccount ASC";
        }
        else if (empty($firstname)){
            $query = "SELECT * FROM account WHERE name=$name ORDER BY idaccount ASC";
        }
        else {
            $query = "SELECT * FROM account WHERE firstname=$firstname AND name=$name ORDER BY idaccount ASC";
        }
        echo $query;
        $bdd = connect_db();
        $stmt = $bdd->prepare($query);
        $data = $stmt->execute();

        if ($data){
            return $bdd->fetchAll();
        }
        echo "null";
        return null;
    }

?>