<?php
    include_once 'functions/sql_admin.php';
    include_once 'functions/sql_account.php';
    include_once 'header.php';

    if (isset($_POST['delete'])){
        delete_account($_POST['delete']);
    }

    if (isset($_POST['reset'])){
       change_pass($_POST['reset'],md5($_POST['pass']));
    }

    if (isset($_POST['search'])){
        echo "ok";
        if (empty($_POST['name'] && empty($_POST['firstname']))){
            $profiles = get_profiles();
        }
        else {
            $profiles = research_profile($_POST['name'],$_POST['firstname']);
        }
    }
    else {
        $profiles = get_profiles();
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Upssiride | Administrator</title>
        <link rel="stylesheet" href="style/admin.css"/>
    </head>
    <body>
        <div class="">
            <form action="admin.php" method="post">
                <label for="search_users_button">Search:</label>
                <input type="text" name="name" placeholder="Name" id="search_fname_users_button">
                <input type="text" name="firstname" placeholder="Firstname" id="search_lname_users_button">
                <button type="submit" name = "search">Research</button>
            </form>
            <div class="list_container">
                <?php foreach($profiles as $profile): ?>
                <div class="user_container">
                    <div class="user_elem">
                        <div class="userId">
                            <p id="user_id"><?=$profile['idaccount']?><!--PHP : faire sortir l'ID utilisateur--></p>
                        </div>
                        <div class="userPic">
                            <a href="my_account.php">
                            <img value src=<?=$profile['pictureprofil']?> alt="user_picture_profile" id="picture_profile">
                            <label for="picture_profile"><?=$profile['firstname'] . " " . $profile['name']?></label>
                            </a>
                        </div>
                        <div class="input">
                        <form action="admin.php" method="post">
                            <input type="password" name="pass">
                        </div>
                        <div class="submitButton">
                            <button type="submit" value=<?=$profile['idaccount']?> name="reset">Reset password</button>
                        </form>
                        </div>
                        <div class="removeButton">
                        <form action="admin.php" method="post">
                            <button type="submit" value=<?=$profile['idaccount']?> name="delete">Remove user</button>
                        </form>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
                <div class="">

                </div>
            </div>
        </div>
        <br><br><br><br>
    </body>

<?php
    include_once 'footer.php';
?>

</html>