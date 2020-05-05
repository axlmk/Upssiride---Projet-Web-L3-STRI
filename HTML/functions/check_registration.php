<?php

    function check_email_format($email) { 
        return (!preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) ? false : true; 
    }

    function check_email_already_exist($email){
        try {
            $myPDO = new PDO('pgsql:host=192.168.1.62;dbname=upssiride', 'adm-vincent', '22cyril');
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
        $query = 'SELECT * FROM account WHERE email=?';
        $stmt = $myPDO->prepare($query);
        $stmt->execute(array($email));
        $result = $stmt->fetchAll();
        if (count($result)>0){
            $stmt->closeCursor();
            return true;
        }
        $stmt->closeCursor();
        return false;
    }

    function check_date($date){
        return preg_match("/^(\d{1,2}\/){2}\d{4}$/", $date);
           
    }
    
    function check_identical_password($pass1, $pass2){
        return $pass1 == $pass2;
    }

    function age($date) { 
        $am = explode('/', $date);
        $an = explode('/', date('d/m/Y'));
 
        if(($am[1] < $an[1]) || (($am[1] == $an[1]) && ($am[0] <= $an[0])))
        return $an[2] - $am[2];
    
        return $an[2] - $am[2] - 1;
   }

    function check_birthdate($date){
        $age = age($date);
        if ($age>=18){
            return true;
        }
        return false;
    }
    #ajouter verification sécurité du mot de passe
?>