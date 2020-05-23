<?php
    function get_account_info($id){
        $bdd = connect_db();
        $stmt = $bdd->prepare('SELECT name, firstname,email,description,phone,pictureprofil,music,chatting,smoke,pets FROM account WHERE idaccount=?');
        $stmt->execute(array($id));
        $data = $stmt->fetch();
        $stmt->closeCursor();
        return $data;
    }

    function save_info_account($info,$id){
        $bdd = connect_db();
        $stmt = $bdd->prepare('UPDATE account SET email=?, description = ?, phone = ?, music=?, chatting=?, smoke=?, pets=? WHERE idaccount=?');
        $result = $stmt->execute(array($info['email'],$info['description'],$info['phone'],$info['music'],$info['tchat'],$info['cigarette'],$info['pets'],$id));
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

    function save_pp_vehicle($path, $registration){
        $bdd = connect_db();
        $stmt = $bdd->prepare('UPDATE vehicule SET picture=? WHERE registration=?');
        $result = $stmt->execute(array($path, $registration));
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


    function get_resume_passenger($id){
        $bdd = connect_db();
        $query = 'SELECT name, firstname, pictureprofil, description, idaccount FROM account WHERE idaccount=?';
        $stmt = $bdd->prepare($query);
        $stmt->execute(array($id));
        $result = $stmt->fetch();
        $stmt->closeCursor();
        return $result;
    }

    function get_profile($id){
        $bdd = connect_db();
        $query = 'SELECT * FROM account WHERE idaccount=?';
        $stmt = $bdd->prepare($query);
        $stmt->execute(array($id));
        $result = $stmt->fetch();
        $stmt->closeCursor();
        return $result;
    }


    function get_vehicles($id){
        $bdd = connect_db();
        $query = 'SELECT * FROM vehicule WHERE idaccount=?';
        $stmt = $bdd->prepare($query);
        $stmt->execute(array($id));
        $result = $stmt->fetchAll();
        $stmt->closeCursor();
        return $result;
    }

    function delete_vehicle($registration) {
        $dtb = connect_db();
        $stmt = $dtb->prepare('DELETE FROM vehicule WHERE registration=?');
        $stmt->execute(array($registration));
        $stmt->closeCursor();
    }

    function edit_vehicle($brand, $model, $color, $registration) {
        $dtb = connect_db();
        $stmt = $dtb->prepare('UPDATE vehicule SET brand=?, model=?, color=? WHERE registration=?');
        $stmt->execute(array($brand, $model, $color, $registration));
        $stmt->closeCursor();
    }

    function add_vehicle($id) {
        $dtb = connect_db();
        $ran = rand(0, 999999999);
        $query = "INSERT INTO vehicule VALUES('$ran', 'default', 'default', 'blue', '$id', 'Pictures_site/vehicles/human_placeholder.jpg')";
        $dtb->query($query);
    }

    function get_music_preference($value){
        if (!$value){
            return ;
        }
    }

    function delete_account($id){

    }
?>
