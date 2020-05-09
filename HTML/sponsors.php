<?php
    require_once 'header.php';
    require 'functions/sql_sponsors.php';
    $sponsors = get_sponsors();
    if (isset($_POST['new_desc_form']) && isset($_POST['new_title_form']) && isset($_POST['new_id_form'])) {
        echo $_POST['new_desc_form'].'\n'.$_POST['new_title_form'].'\n'.($_POST['new_id_form']+1);
        set_sponsor($_POST['new_id_form'] + 1, $_POST['new_title_form'], $_POST['new_desc_form']);
    } else {
        echo "npqsdfuiqslkjdfqsd";
    }
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
        <?php $it=0?>
        <?php foreach ($sponsors as $row): ?>
        <div class="tile">
            <div class="pic_container">
                <span class="helper"></span><img src=<?=$row['pictureprofile']?> alt=<?=$row["name"]?>>
            </div>
            <div class="description">
                <h3 <?php echo 'id="description_title_'.$it.'"' ?>><?=$row["name"]?></h3>
                <p <?php echo 'id="description_paragraph_'.$it.'"' ?> ><?=$row["description"]?></p>
            </div>
            <div class="dropdown">
                <button class="modifyButton" type="button" <?php echo 'onClick="openTab('.$it.'); modify('.$it.')"' ?>>Edit</button>
                <button class="cancelButton" type="button" <?php echo 'onClick="openTab('.$it.'); cancel('.$it.')"' ?>>Cancel</button>
                <button class="saveButton" type="button" <?php echo 'onClick="openTab('.$it.'); save('.$it.')"' ?>>Save</button>
            </div>
        </div>
            <?php $it = $it + 1?>
        <?php endforeach?>

        <script src="javascript/sponsors.js" type="text/javascript"></script>
    </body>
</html>
