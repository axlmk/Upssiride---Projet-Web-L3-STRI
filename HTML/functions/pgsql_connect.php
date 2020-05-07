<?php 
    function connect_db(){
        try {
            $myPDO = new PDO('pgsql:host=192.168.1.62;dbname=upssiride', 'adm-vincent', '22cyril');
        }catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
        return $myPDO;
    }
?>