var selected_id = -1;
var panel_open = false;

var previous_text;
var previous_title;

function openTab(it) {
    var mdfButton = document.getElementsByClassName("modifyButton")[it];
    var calButton = document.getElementsByClassName("cancelButton")[it];
    var savButton = document.getElementsByClassName("saveButton")[it];

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
        var desc_title = document.getElementById('description_title_' + it);
        for (var i = 0; i < it; i++) {
            desc_title = document.getElementById('description_title_' + it);
        }

        var new_title = document.createElement('input');
        new_title.setAttribute('value', desc_title.innerHTML);
        previous_title = desc_title.innerHTML; //save
        desc_title.parentNode.insertBefore(new_title, desc_title);
        desc_title.parentNode.removeChild(desc_title);
        new_title.setAttribute('type', 'text');
        new_title.setAttribute('class', 'input_button');
        new_title.setAttribute('id', 'description_title_' + it);

        // paragraph
        var e = document.getElementById('description_paragraph_' + it);
        previous_text = e.innerHTML; //save
        for (var i = 0; i < it; i++) {
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
        panel_open = false;
    }
}

function cancel(it) {
    if(selected_id == it) {
        var desc_title = document.getElementById('description_title_' + it);
        for (var i = 0; i < it; i++) {
            desc_title = document.getElementById('description_title_' + it);
        }
        var new_title = document.createElement('h3');
        new_title.innerHTML = previous_title;
        desc_title.parentNode.insertBefore(new_title, desc_title);
        desc_title.parentNode.removeChild(desc_title);
        new_title.setAttribute('id', 'description_title_' + it);

        //paragraph
        var e = document.getElementById('description_paragraph_' + it);
        for (var i = 0; i < it; i++) {
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
