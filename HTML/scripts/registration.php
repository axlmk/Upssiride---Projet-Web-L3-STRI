<?php
    function send_registration($gender,$name, $firstname, $email, $phone, $birth, $adress, $ZIP, $city, $country, $pass){
        $myPDO = connect_db();
        if ($myPDO==null){
            return false;
        }
        //$birth = date('Y-m-d', strtotime($birth));
        $date = date("Y-m-d");
        $stmt = $myPDO->prepare('INSERT INTO account VALUES(default,:uname,:firstname,:gender,:upassword,:photo,:email,:phone,:birth,0,:udate,:udescription)');
        $stmt->bindValue(':uname', $name);
        $stmt->bindValue(':firstname', $firstname);
        $stmt->bindValue(':gender', $gender);
        $stmt->bindValue(':upassword', $pass);
        $stmt->bindValue(':photo', "Pictures_site/users/human_placeholder.jpg");
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':phone', $phone);
        $stmt->bindValue(':birth', $birth);
        $stmt->bindValue(':udate', $date);
        $stmt->bindValue(':udescription', "Aucune description");
        $insert = $stmt->execute();
        $stmt->closeCursor();

        if ($insert){
            return true;
        }
        else {
            return false;
        }
    }
?>
