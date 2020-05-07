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
        $myPDO = connect_db();
        if ($myPDO==null){
            return false;
        }
        $query = 'SELECT idaccount FROM account WHERE email=? AND password=?';
        $stmt = $myPDO->prepare($query);
        $stmt->execute(array($login, $pass));
        $result = $stmt->fetch();
        $stmt->closeCursor();
        if (count($result)>0){
            return $result['idaccount'];
        }
        
        return 0;
    }

?>

