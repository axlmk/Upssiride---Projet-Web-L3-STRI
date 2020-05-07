<?php
    require_once 'header.php';
    require 'functions/sql_sponsors.php';
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
              <img src="Pictures_site/checkbox.svg" alt="Option button" class="dropbtn"></img>
              <div class="dropdown-content">
                <a <?php echo 'onClick="modify('.$it.')"' ?>>Modify</a>
              </div>
          </div>
        </div>
        <?php $it = $it + 1?>
    <?php endforeach?>

        <script type="text/javascript">
            var plain_text = true;
            var selected_id = -1;

            function modify(it) {
                if(plain_text == true) {
                    var desc_title = document.getElementById('description_title_' + it);
                    for (var i = 0; i < it; i++) {
                        desc_title = document.getElementById('description_title_' + it);
                    }

                    var new_title = document.createElement('input');
                    new_title.setAttribute('value', desc_title.innerHTML);
                    desc_title.parentNode.insertBefore(new_title, desc_title);
                    desc_title.parentNode.removeChild(desc_title);
                    new_title.setAttribute('type', 'text');
                    new_title.setAttribute('class', 'input_button');
                    new_title.setAttribute('id', 'description_title_' + it);

                    // paragraph
                    var e = document.getElementById('description_paragraph_' + it);
                    for (var i = 0; i < it; i++) {
                        e = document.getElementById('description_paragraph_' + it);
                    }
                    var d = document.createElement('textarea');

                    d.innerHTML = e.innerHTML;
                    d.id = "description_paragraph_" + it;
                    e.parentNode.insertBefore(d, e);
                    e.parentNode.removeChild(e);
                    plain_text = false;
                    selected_id = it;
                } else {
                    if(selected_id == it) {
                        var desc_title = document.getElementById('description_title_' + it);
                        for (var i = 0; i < it; i++) {
                            desc_title = document.getElementById('description_title_' + it);
                        }
                        var new_title = document.createElement('h3');
                        new_title.innerHTML = desc_title.value;
                        desc_title.parentNode.insertBefore(new_title, desc_title);
                        desc_title.parentNode.removeChild(desc_title);
                        new_title.setAttribute('id', 'description_title_' + it);

                        //paragraph
                        var e = document.getElementById('description_paragraph_' + it);
                        for (var i = 0; i < it; i++) {
                            e = document.getElementById('description_paragraph_' + it);
                        }
                        var d = document.createElement('p');

                        d.innerHTML = e.value;
                        d.id = "description_paragraph_" + it;
                        e.parentNode.insertBefore(d, e);
                        e.parentNode.removeChild(e);
                        plain_text = true;
                    }
                }
            }
        </script>
    <!--
        <div class="tile">
            <div class="pic_container">
                <span class="helper"></span><img src="Pictures_site/spacex.png" alt="logo Space X">
            </div>
            <div class="description">
                <input type="text"><br/>
                <textarea></textarea>
            </div>
        </div>
        -->
    </body>
</html>
