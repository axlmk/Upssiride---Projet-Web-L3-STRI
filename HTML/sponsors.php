<?php
    require_once 'header.php';
    require 'functions/sql_sponsors.php';
    require 'functions/get_image.php';
    if (isset($_POST['new_desc_form']) && isset($_POST['new_title_form']) && isset($_POST['new_id_form'])) {
        edit_sponsor($_POST['new_id_form'], $_POST['new_title_form'], $_POST['new_desc_form']);
    }
    if(isset($_FILES['new_pp'])) {
        upload_pp(rand(0, 999999999), $_FILES['new_pp'], "Pictures_site/sponsors/", "sponsor");
    }
    if(isset($_FILES['new_pp_new_sponsor'])) {
        $path_new = upload_pp(rand(0, 999999999), $_FILES['new_pp_new_sponsor'], "Pictures_site/sponsors/", "new_sponsor");
        add_sponsor($_POST['new_title'], $_POST['new_description'], $path_new);
    }

    if(isset($_POST['deleteSponsor'])) {
        delete_sponsor($_POST['deleteSponsor']);
        unlink($_POST['urlPicture']);
    }
    $sponsors = get_sponsors();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Sponsors</title>
        <link rel="stylesheet" href="style/sponsors.css"/>
    </head>
    <body>
        <h1> They support us: </h1>
        <?php foreach ($sponsors as $row): ?>
        <div class="tile">
            <div class="pic_container" <?php echo 'id="pp_'.$row['idsponsors'].'"' ?>>
                <span class="helper"></span><img src=<?=$row['pictureprofile']?> alt=<?=$row["name"]?>>
            </div>
            <form action="sponsors.php" method="POST" enctype="multipart/form-data" class="file_form" <?php echo 'id="pp_modif_'.$row['idsponsors'].'"' ?>>
                <input type="file" name="new_pp" class="image" <?php echo 'id="image_'.$row['idsponsors'].'"' ?>/>
                <label <?php echo 'for="image_'.$row['idsponsors'].'"' ?> class="pic_container file_button">
                    <span class="helper"></span><img src=<?=$row['pictureprofile']?> alt=<?=$row["name"]?>>
                </label>
            </form>
            <div class="description">
                <h3 <?php echo 'id="description_title_'.$row['idsponsors'].'"' ?>><?=$row["name"]?></h3>
                <p <?php echo 'id="description_paragraph_'.$row['idsponsors'].'"' ?> ><?=$row["description"]?></p>
            </div>
            <?php if ($_SESSION['admin']==1): ?>
            <div class="dropdown">
                <button class="deleteButton" type="button" <?php echo 'id="delete_button_'.$row['idsponsors'].'"' ?> <?php echo 'onClick="openTab('.$row['idsponsors'].'); deleteSp('.$row['idsponsors'].',\''.$row['pictureprofile'].'\')"' ?>>Delete</button>
                <button class="modifyButton" type="button" <?php echo 'id="modify_button_'.$row['idsponsors'].'"' ?> <?php echo 'onClick="openTab('.$row['idsponsors'].'); modify('.$row['idsponsors'].')"' ?>>Edit</button>
                <button class="cancelButton" type="button" <?php echo 'id="cancel_button_'.$row['idsponsors'].'"' ?> <?php echo 'onClick="openTab('.$row['idsponsors'].'); cancel('.$row['idsponsors'].')"' ?>>Cancel</button>
                <button class="saveButton" type="button" <?php echo 'id="save_button_'.$row['idsponsors'].'"' ?> <?php echo 'onClick="openTab('.$row['idsponsors'].'); save('.$row['idsponsors'].')"' ?>>Save</button>
            </div>
            <?php endif ?>
        </div>
        <?php endforeach?>

        <?php if ($_SESSION['admin']==1): ?>
        <!--<div class="tile" id="newSp">-->
            <form action="sponsors.php" method="POST" enctype="multipart/form-data" class="tile" id="newSp">
                <div class="file_form" id="new_picture_new_sponsor">
                    <input type="file" name="new_pp_new_sponsor" class="image" id="new_input"/>
                    <label for="new_input" id="file_button" class="pic_container">
                        <span class="helper"></span><img src="Pictures_site/sponsors/human_placeholder.jpg" alt=placeholder>
                    </label>
                </div>
            <div class="description">
                <input placeholder="Title" type="text" name="new_title" class="input_button" id="">
                <textarea name="new_description" placeholder="Description"></textarea>
            </div>
            <div class="dropdown">
                <button class="addButton" type="submit">Add</button>
                <button class="cancelButton" id="cancelAddNewSponsor" type="button" onClick="hideNewSponsor()">Cancel</button>
            </div>
            </form>
        <!--</div>-->
        <div id="addSponsor">
            <div id="imgAdd" onclick="displayNewSponsor()">
                <img src="svg/add_button.svg"/>
            </div>
        </div>

        <script src="javascript/sponsors.js" type="text/javascript"></script>
        <?php endif ?>
   </body>

</html>
