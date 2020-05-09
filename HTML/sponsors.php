<?php
    require_once 'header.php';
    require 'functions/sql_sponsors.php';
    if (isset($_POST['new_desc_form']) && isset($_POST['new_title_form']) && isset($_POST['new_id_form'])) {
        edit_sponsor($_POST['new_id_form'], $_POST['new_title_form'], $_POST['new_desc_form']);
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
            <div class="pic_container">
                <span class="helper"></span><img src=<?=$row['pictureprofile']?> alt=<?=$row["name"]?>>
            </div>
            <div class="description">
                <h3 <?php echo 'id="description_title_'.$row['idsponsors'].'"' ?>><?=$row["name"]?></h3>
                <p <?php echo 'id="description_paragraph_'.$row['idsponsors'].'"' ?> ><?=$row["description"]?></p>
            </div>
            <div class="dropdown">
                <button class="modifyButton" type="button" <?php echo 'onClick="openTab('.$row['idsponsors'].'); modify('.$row['idsponsors'].')"' ?>>Edit</button>
                <button class="cancelButton" type="button" <?php echo 'onClick="openTab('.$row['idsponsors'].'); cancel('.$row['idsponsors'].')"' ?>>Cancel</button>
                <button class="saveButton" type="button" <?php echo 'onClick="openTab('.$row['idsponsors'].'); save('.$row['idsponsors'].')"' ?>>Save</button>
            </div>
        </div>
        <?php endforeach?>

        <script src="javascript/sponsors.js" type="text/javascript"></script>
    </body>
</html>
