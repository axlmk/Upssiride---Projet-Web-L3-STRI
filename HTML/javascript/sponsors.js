var selected_id = -1;
var panel_open = false;

var previous_text;
var previous_title;

function openTab(it) {
    var mdfButton = document.getElementsByClassName("modifyButton")[it-1];
    var calButton = document.getElementsByClassName("cancelButton")[it-1];
    var savButton = document.getElementsByClassName("saveButton")[it-1];

    if(mdfButton.style.display != 'none') {
        if(panel_open == false) {
            mdfButton.style.display = 'none';
            calButton.style.display = 'block';
            savButton.style.display = 'block';
        }
    } else {
        mdfButton.style.display = 'block';
        calButton.style.display = 'none';
        savButton.style.display = 'none';
    }
}

function modify(it) {
    if(panel_open == false) {
        var old_title = document.getElementById('description_title_' + it);
        for (var i = 1; i <= it; i++) {
            old_title = document.getElementById('description_title_' + it);
        }

        var new_title = document.createElement('input');
        new_title.setAttribute('value', old_title.innerHTML);
        previous_title = old_title.innerHTML; //save
        old_title.parentNode.insertBefore(new_title, old_title);
        old_title.parentNode.removeChild(old_title);
        new_title.setAttribute('type', 'text');
        new_title.setAttribute('class', 'input_button');
        new_title.setAttribute('id', 'description_title_' + it);

        // paragraph
        var e = document.getElementById('description_paragraph_' + it);
        previous_text = e.innerHTML; //save
        for (var i = 1; i <= it; i++) {
            e = document.getElementById('description_paragraph_' + it);
        }
        var d = document.createElement('textarea');

        d.innerHTML = e.innerHTML;
        d.id = "description_paragraph_" + it;
        e.parentNode.insertBefore(d, e);
        e.parentNode.removeChild(e);
        panel_open = true;
        selected_id = it;
    }
}

function save(it) {
    // add save features
    if(selected_id == it) {
        var old_title = document.getElementById('description_title_' + it);
        for (var i = 1; i <= it; i++) {
            old_title = document.getElementById('description_title_' + it);
        }
        var new_title = document.createElement('h3');
        new_title.innerHTML = old_title.value;
        old_title.parentNode.insertBefore(new_title, old_title);
        old_title.parentNode.removeChild(old_title);
        new_title.setAttribute('id', 'description_title_' + it);

        //paragraph
        var e = document.getElementById('description_paragraph_' + it);
        for (var i = 1; i <= it; i++) {
            e = document.getElementById('description_paragraph_' + it);
        }
        var d = document.createElement('p');

        d.innerHTML = e.value;
        d.id = "description_paragraph_" + it;
        e.parentNode.insertBefore(d, e);
        e.parentNode.removeChild(e);
        panel_open = false;

        //form creation
        var form = document.createElement("form");
        form.style.display = 'none';
        form.method = "POST";
        form.action = "sponsors.php";
        document.body.appendChild(form);
        var form_title = document.createElement("input")
        form_title.name = "new_title_form";
        form_title.value = new_title.innerHTML;
        var form_desc = document.createElement("input")
        form_desc.name = "new_desc_form";
        form_desc.value = d.innerHTML;
        var form_id = document.createElement("input")
        form_id.name = "new_id_form";
        form_id.value = it;
        form.appendChild(form_title);
        form.appendChild(form_desc);
        form.appendChild(form_id);
        form.submit();
    }
}

function cancel(it) {
    if(selected_id == it) {
        var old_title = document.getElementById('description_title_' + it);
        for (var i = 1; i <= it; i++) {
            old_title = document.getElementById('description_title_' + it);
        }
        var new_title = document.createElement('h3');
        new_title.innerHTML = previous_title;
        old_title.parentNode.insertBefore(new_title, old_title);
        old_title.parentNode.removeChild(old_title);
        new_title.setAttribute('id', 'description_title_' + it);

        //paragraph
        var e = document.getElementById('description_paragraph_' + it);
        for (var i = 1; i <= it; i++) {
            e = document.getElementById('description_paragraph_' + it);
        }
        var d = document.createElement('p');

        d.innerHTML = previous_text;
        d.id = "description_paragraph_" + it;
        e.parentNode.insertBefore(d, e);
        e.parentNode.removeChild(e);

        panel_open = false;
    }
}
