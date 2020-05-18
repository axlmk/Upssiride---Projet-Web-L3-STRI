<?php

    include_once 'functions/sql_account.php';
    include_once 'functions/sql_sponsors.php';

    function upload_pp($username, $file, $path, $type) {
        $errors= array();
        $file_name = $file['name']; // get the name of the file
        $file_size = $file['size']; // get the size in bits
        $file_tmp = $file['tmp_name']; // get the temp file name
        $file_type = $file['type']; // get the type MIME type
        $file_ext = get_ext($file['name']); // parse the extension

        $extensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions) === false) { // verify the extension
            $errors[]="extension not allowed, please choose a JPEG or PNG file.".$file_ext.$file_name;
        }

        if($file_size > 2097152){ // verify the size
            $errors[]='file size must be under 2 MB';
        }

        if(empty($errors) == true){ // if there is not error
            move_uploaded_file($file_tmp,$path.$username.'.'.$file_ext);

            if($type == "sponsor") {
                $result = edit_pp_sponsor($username, $path.$username.'.'.$file_ext);
                if(!$result) {
                    $returnPP = "An error has occured, please retry later";
                }
            } else if($type == "new_sponsor") {
                return $path.$username.'.'.$file_ext;
            } else {
                $result = save_pp_account($path.$username.'.'.$file_ext, $_SESSION['id']);
                if ($result) {
                    $returnPP = "Your pp has been changed";
                } else {
                    $returnPP = "An error has occured, please retry later";
                }
            }
        } else {
            print_r($errors);
        }
    }

    function get_ext($name) {
        return strtolower(end(explode('.',$name)));
    }
?>
