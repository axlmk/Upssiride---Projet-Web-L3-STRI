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

    function save_pp_account($path, $id){
        $bdd = connect_db();
        $stmt = $bdd->prepare('UPDATE account SET pictureprofil=? WHERE idaccount=?');
        $result = $stmt->execute(array($path, $id));
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

    function save_new_password($pass,$id){
        $bdd = connect_db();
        $stmt = $bdd->prepare('UPDATE account SET password = ? WHERE idaccount=?');
        $result = $stmt->execute(array($pass,$id));
        $stmt->closeCursor();
        if ($result){
            return true;
        }
        return false;
    }

    function verify_password($id, $pass){
        $bdd = connect_db();
        if ($bdd==null){
            return false;
        }
        $query = 'SELECT count(*) FROM account WHERE idaccount=? AND password=?';
        $stmt = $bdd->prepare($query);
        $stmt->execute(array($id, $pass));
        $result = $stmt->fetchColumn();
        $stmt->closeCursor();
        if ($result>0){
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
