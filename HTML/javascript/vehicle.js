var selected_id = -1;
var panel_open = false;

var previous_brand_str;
var previous_model_str;
var previous_color_str;
var previous_registration_str;

function openTabVehicle(it) {
    var mdfButton = document.getElementById("modify_button_" + it);
    var calButton = document.getElementById("cancel_button_" + it);
    var savButton = document.getElementById("save_button_" + it);
    var delButton = document.getElementById("delete_button_" + it);
    var picture = document.getElementById('pp_' + it);
    var picture_modif = document.getElementById('pp_modif_' + it);

    if(mdfButton.style.display != 'none') {
        if(panel_open == false) {
            mdfButton.style.display = 'none';
            picture_modif.style.display = 'flex';
            delButton.style.display = 'block';
            calButton.style.display = 'block';
            savButton.style.display = 'block';
            picture.style.display = 'none';
        }
    } else {
        picture_modif.style.display = 'none';
        mdfButton.style.display = 'block';
        delButton.style.display = 'none';
        calButton.style.display = 'none';
        savButton.style.display = 'none';
        picture.style.display = 'block';
    }
}

function modify(it) {
    if(panel_open == false) {
        var old_brand = document.getElementById('brand_'+ it);
        var old_model = document.getElementById('model_'+ it);
        var old_color = document.getElementById('color_'+ it);
        var old_registration = document.getElementById('registration_'+ it);

        var new_brand = document.createElement('input');
        new_brand.setAttribute('value', old_brand.innerHTML);
        new_brand.setAttribute('type', 'text');
        new_brand.setAttribute('class', 'input_button');
        new_brand.setAttribute('id', 'brand_inp_' + it);
        new_brand.setAttribute('form', 'pp_modif_' + it);
        new_brand.setAttribute('name', 'new_brand');
        previous_brand_str = old_brand.innerHTML;

        old_brand.parentNode.insertBefore(new_brand, old_brand);
        old_brand.parentNode.removeChild(old_brand);


        var new_model = document.createElement('input');
        new_model.setAttribute('value', old_model.innerHTML);
        new_model.setAttribute('type', 'text');
        new_model.setAttribute('class', 'input_button');
        new_model.setAttribute('id', 'model_inp_' + it);
        new_model.setAttribute('form', 'pp_modif_' + it);
        new_model.setAttribute('name', 'new_model');
        previous_model_str = old_model.innerHTML;

        old_model.parentNode.insertBefore(new_model, old_model);
        old_model.parentNode.removeChild(old_model);


        var new_color = document.createElement('input');
        new_color.setAttribute('value', old_color.innerHTML);
        new_color.setAttribute('type', 'text');
        new_color.setAttribute('class', 'input_button');
        new_color.setAttribute('id', 'color_inp_' + it);
        new_color.setAttribute('form', 'pp_modif_' + it);
        new_color.setAttribute('name', 'new_color');
        previous_color_str = old_color.innerHTML;

        old_color.parentNode.insertBefore(new_color, old_color);
        old_color.parentNode.removeChild(old_color);


        var new_registration = document.createElement('input');
        new_registration.setAttribute('value', old_registration.innerHTML);
        new_registration.setAttribute('type', 'text');
        new_registration.setAttribute('class', 'input_button');
        new_registration.setAttribute('id', 'registration_inp_' + it);
        new_registration.setAttribute('form', 'pp_modif_' + it);
        new_registration.setAttribute('name', 'new_registration');
        previous_registration_str = old_registration.innerHTML;

        old_registration.parentNode.insertBefore(new_registration, old_registration);
        old_registration.parentNode.removeChild(old_registration);


        panel_open = true;
        selected_id = it;
    }
}

function cancel(it) {
    if(selected_id == it) {
        var old_brand = document.getElementById('brand_inp_'+ it);
        var old_model = document.getElementById('model_inp_'+ it);
        var old_color = document.getElementById('color_inp_'+ it);
        var old_registration = document.getElementById('registration_inp_'+ it);

        var new_brand = document.createElement('h3');
        new_brand.innerHTML = previous_brand_str;
        new_brand.setAttribute('id', 'brand_' + it);
        old_brand.parentNode.insertBefore(new_brand, old_brand);
        old_brand.parentNode.removeChild(old_brand);

        var new_model = document.createElement('h3');
        new_model.innerHTML = previous_model_str;
        new_model.setAttribute('id', 'model_' + it);
        old_model.parentNode.insertBefore(new_model, old_model);
        old_model.parentNode.removeChild(old_model);

        var new_color = document.createElement('h3');
        new_color.innerHTML = previous_color_str;
        new_color.setAttribute('id', 'color_' + it);
        old_color.parentNode.insertBefore(new_color, old_color);
        old_color.parentNode.removeChild(old_color);

        var new_registration = document.createElement('h3');
        new_registration.innerHTML = previous_registration_str;
        new_registration.setAttribute('id', 'registration_' + it);
        old_registration.parentNode.insertBefore(new_registration, old_registration);
        old_registration.parentNode.removeChild(old_registration);

        panel_open = false;
    }
}


function deleteMV(it) {
    var id_to_del = document.createElement('input');
    id_to_del.setAttribute('name', 'del_vehicle');
    id_to_del.setAttribute('value', it);
    var form = document.getElementById('pp_modif_' + it);
    form.appendChild(id_to_del);
    form.submit();
}
