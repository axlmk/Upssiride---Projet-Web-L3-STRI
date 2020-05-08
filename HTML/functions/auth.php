<?php

    require_once 'functions/pgsql_connect.php';
    
    function is_connected (): bool {
        if (session_status()===PHP_SESSION_NONE){
            session_start();
        }
        return !empty($_SESSION['connected']);
    }

    //Permet de s'authentifier dans la base de données, retourne l'id du compte ou 0 en cas d'échec
    function account_auth($login, $pass){
        $bdd = connect_db();
        if ($bdd==null){
            return false;
        }
        $query = 'SELECT idaccount FROM account WHERE email=? AND password=?';
        $stmt = $bdd->prepare($query);
        $stmt->execute(array($login, $pass));
        $result = $stmt->fetch();
        $stmt->closeCursor();
        if (count($result)>0){
            return $result['idaccount'];
        }
        
        return 0;
    }

    function is_admin($id){
        $bdd = connect_db();
        if ($bdd==null){
            return false;
        }
        $query = 'SELECT idaccount FROM account WHERE idaccount=? and admin=1';
        $stmt = $bdd->prepare($query);
        $stmt->execute(array($id));
        $result = $stmt->fetch();
        $stmt->closeCursor();
        if (count($result)>0){
            return true;
        }
        
        return false;
    }
    
?>

