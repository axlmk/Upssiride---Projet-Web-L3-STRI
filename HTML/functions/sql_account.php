<?php 
    function get_account_info($id){
        $bdd = connect_db();
        $stmt = $bdd->prepare('SELECT name, firstname,email,description,phone,pictureprofil FROM account WHERE idaccount=?');
        $stmt->execute(array($id));
        $data = $stmt->fetch();
        $stmt->closeCursor();
        return $data;
    }

    function save_info_account($info,$id){
        $bdd = connect_db();
        $stmt = $bdd->prepare('UPDATE account SET email=?, description = ?, phone = ? WHERE idaccount=?');
        $result = $stmt->execute(array($info['email'],$info['description'],$info['phone'],$id));
        $stmt->closeCursor();
        if ($result){
            return true;
        }
        return false;
    }

    function get_email($id){
        $bdd = connect_db();
        $stmt = $bdd->prepare('SELECT email FROM account WHERE idaccount=?');
        $stmt->execute(array($id));
        $data = $stmt->fetch();
        $stmt->closeCursor();
        return $data['email'];
    }

    function save_new_password($info,$id){
        $bdd = connect_db();
        $stmt = $bdd->prepare('UPDATE account SET password = ? WHERE idaccount=?');
        $result = $stmt->execute(array($info['passwordField'],$id));
        $stmt->closeCursor();
        if ($result){
            return true;
        }
        return false;
    }

    function verify_password($id, $pass){
        echo "<br/>".$id."<br/>";
        $bdd = connect_db();
        if ($bdd==null){
            return false;
        }
        $query = 'SELECT * FROM account WHERE idaccount=? AND password=?';
        $stmt = $bdd->prepare($query);
        $stmt->execute(array($id, $pass));
        $result = $stmt->fetch();
        $stmt->closeCursor();
        if (count($result)>0){
            echo "true";
            return true;
        }
        return false;
    }

    function get_name_firstname($id){
        $bdd = connect_db();
        $query = 'SELECT name,firstname FROM account WHERE idaccount=?';
        $stmt = $bdd->prepare($query);
        $stmt->execute(array($id));
        $result = $stmt->fetch();
        $stmt->closeCursor();
        return $result['firstname'] . " ". $result['name'];
    }

    function get_picture_profile($id){
        $bdd = connect_db();
        $query = 'SELECT pictureprofil FROM account WHERE idaccount=?';
        $stmt = $bdd->prepare($query);
        $stmt->execute(array($id));
        $result = $stmt->fetch();
        $stmt->closeCursor();
        return $result['pictureprofil'];
    }
?>