<?php

    include_once 'functions/sql_account.php';

    function upload_pp($username, $file) {
        $errors= array();
        $file_name = $file['name']; // get the name of the file
        $file_size =$file['size']; // get the size in bits
        $file_tmp =$file['tmp_name']; // get the temp file name
        $file_type=$file['type']; // get the type MIME type
        $file_ext=strtolower(end(explode('.',$file['name']))); // parse the extension

        $extensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions) === false) { // verify the extension
            $errors[]="extension not allowed, please choose a JPEG or PNG file.".$file_ext.$file_name;
        }

        if($file_size > 2097152){ // verify the size
            $errors[]='file size must be under 2 MB';
        }

        if(empty($errors) == true){ // if there is not error
            move_uploaded_file($file_tmp,"/shares/home_file-share/servers/web/web/HTML/Pictures_site/users/".$username.'.'.$file_ext);

            $result = save_pp_account("Pictures_site/users/".$username.'.'.$file_ext, $_SESSION['id']);
            if ($result) {
                $returnPP = "Your pp has been changed";
            } else {
                $returnPP = "An error has occured, please retry later";
            }
        } else {
            print_r($errors); //coucou
        }
    }
?>
