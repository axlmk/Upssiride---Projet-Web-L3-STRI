<?php
    function is_connected (): bool {
        if (session_status()===PHP_SESSION_NONE){
            session_start();
        }
        return !empty($_SESSION['connected']);
    }

    function account_auth($login, $pass): bool{
        try {
            $myPDO = new PDO('pgsql:host=192.168.1.62;dbname=upssiride', 'adm-vincent', '22cyril');
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
        $query = 'SELECT * FROM account WHERE email=? AND password=?';
        $stmt = $myPDO->prepare($query);
        $stmt->execute(array($login, $pass));
        $result = $stmt->fetchAll();
        if (count($result)>0){
            $stmt->closeCursor();
            return true;
        }
        $stmt->closeCursor();
        return false;
    }
?>

