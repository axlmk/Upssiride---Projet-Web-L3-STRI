<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <?php
            include_once('header.php');
        ?>
        <link rel="stylesheet" href="style/admin.css"/>
    </head>
    <body>
        <div class="">
            <form action="admin.php">
                <label for="search_users_button">Search:</label>
                <input type="text" name="" placeholder="Ex: Jean" id="search_fname_users_button">
                <input type="text" name="" placeholder="Ex: Dupond" id="search_lname_users_button">
                <input type="submit" value="Search">
            </form>
            <div class="list_container">
                <div class="user_container">
                    <div class="user_elem">
                            <p id="user_id">#xxxxxxx<!--PHP : faire sortir l'ID utilisateur--></p>
                            <a href="my_account.php">
                            <img value src="Pictures_site/users/4.jpg" alt="user_picture_profile" id="picture_profile">
                            <label for="picture_profile">Jean Dupond</label>
                        </a>
                        <button type="button" name="button">Reset password</button>
                        <button type="button" name="button">Remove user</button>
                    </div>
                    <div class="user_elem">
                            <p id="user_id">#xxxxxxx<!--PHP : faire sortir l'ID utilisateur--></p>
                            <a href="my_account.php">
                            <img value src="Pictures_site/users/4.jpg" alt="user_picture_profile" id="picture_profile">
                            <label for="picture_profile">Jean Dupond</label>
                        </a>
                        <button type="button" name="button">Rester password</button>
                        <button type="button" name="button">Remove user</button>
                    </div>
                </div>
                <div class="">

                </div>
            </div>
        </div>

    </body>
</html>
