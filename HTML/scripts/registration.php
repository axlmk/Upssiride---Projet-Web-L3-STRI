<?php
    function send_registration($gender,$name, $firstname, $email, $phone, $birth, $adress, $ZIP, $city, $country, $pass){
        try {
            $myPDO = new PDO('pgsql:host=192.168.1.62;dbname=upssiride', 'adm-vincent', '22cyril');
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
        //$birth = date('Y-m-d', strtotime($birth));
        $date = date("Y-m-d");
        $stmt = $myPDO->prepare('INSERT INTO account VALUES(default,:uname,:firstname,:gender,:upassword,:photo,:email,:phone,:birth,0,:udate,:udescription)');
        $stmt->bindValue(':uname', $name);
        $stmt->bindValue(':firstname', $firstname);
        $stmt->bindValue(':gender', $gender);
        $stmt->bindValue(':upassword', $pass);
        $stmt->bindValue(':photo', "/");
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':phone', $phone);
        $stmt->bindValue(':birth', $birth);
        $stmt->bindValue(':udate', $date);
        $stmt->bindValue(':udescription', "Aucune description");
        $insert = $stmt->execute();
        $stmt->closeCursor();

        if ($insert){
            echo "OK";
        }
        else {
            echo "pas OK";
        }
    }
?>