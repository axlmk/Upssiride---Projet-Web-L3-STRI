function addNodeToForm(form, var_name) {
    eval('var ' + var_name + ' = document.createElement("input");');
    eval(var_name + '.name = "' + var_name + '";');
    eval(var_name + '.value = "' + var_val + '";');
    eval(form + '.appendChild(' + var_name + ');');
}

function sendConfirmation() {
    var form = document.createElement("form");
    console.log(document.getElementsByTagName('p')[0].value);
}
