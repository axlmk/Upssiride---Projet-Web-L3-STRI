document.getElementsByClassName('submit_button')[0].disabled = true;

function checkConstraints() {
    var pass_field = document.getElementById('password_button');
    var pass_val = pass_field.value;
    checkEquality();
    if(pass_val.length < 6) {
        document.getElementById('minlen').style.display = 'block'
    } else {
        document.getElementById('minlen').style.display = 'none'
    } if(!/[+@,;:!]/.exec(pass_val)) {
        document.getElementById('special').style.display = 'block'
    } else {
        document.getElementById('special').style.display = 'none'
    } if(!/[A-Z]/.exec(pass_val)) {
        document.getElementById('upper').style.display = 'block'
    } else {
        document.getElementById('upper').style.display = 'none'
    } if(!/[0-9]/.exec(pass_val)) {
        document.getElementById('number').style.display = 'block'
    } else {
        document.getElementById('number').style.display = 'none'
    }
}

function checkEquality() {
    var pass_val = document.getElementById('password_button').value;
    var confirm_val = document.getElementById('password_confirm_button').value;
    if(pass_val.length != 0 && confirm_val.length != 0) {
        if(pass_val === confirm_val) {
            document.getElementById('equal').style.display = 'none'
            document.getElementsByClassName('submit_button')[0].disabled = false;
        } else {
            document.getElementById('equal').style.display = 'block'
            document.getElementsByClassName('submit_button')[0].disabled = true;
        }
    }
}
