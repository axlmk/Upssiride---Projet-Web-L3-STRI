document.getElementById("default").click();
setup_city();

var find_from_var;
var find_to_var;
var offer_from_var;
var offer_to_var;

var find_from_var_info;
var find_to_var_info;

function setup_city() {

    var apiKeysOptions = {
        appId: 'plDTSXKSBU1L',
        apiKey: '32b04d693d26a353c189ec5fa220433c',
        container: null
    };

    const confOptions = {
        language: 'en',
        countries: ['fr', 'gb'],
        aroundLatLngViaIP: false
    };

    apiKeysOptions.container = document.querySelector('#offer_from_button');
    offer_from_var = places(apiKeysOptions).configure(confOptions);
    apiKeysOptions.container = document.querySelector('#offer_to_button');
    offer_to_var = places(apiKeysOptions).configure(confOptions);
    apiKeysOptions.container = document.querySelector('#find_from_button');
    find_from_var = places(apiKeysOptions).configure(confOptions);
    apiKeysOptions.container = document.querySelector('#find_to_button');
    find_to_var = places(apiKeysOptions).configure(confOptions);
}

find_from_var.on('change', function(e) {
    find_from_var_info = e.suggestion.highlight;
});

find_to_var.on('change', function(f) {
    find_to_var_info = f.suggestion.highlight;
});

function openTab(evt, tabName) {
    var i;
    var tabcontent;
    var tablinks;

    tabcontent = document.getElementsByClassName("content");
    tabcontent[0].style.display = "none";
    tabcontent[1].style.display = "none";

    tablinks = document.getElementsByClassName("tablinks");
    tablinks[0].className = tablinks[0].className.replace(" active", "");
    tablinks[1].className = tablinks[1].className.replace(" active", "");

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function submitFindRide() {
    var form = document.getElementById('find_form');
    var find_from_city = document.createElement("input");
    var find_from_zip = document.createElement("input");
    var find_from_country = document.createElement("input");
    var find_from_address = document.createElement("input");
    var find_to_city = document.createElement("input");
    var find_to_zip = document.createElement("input");
    var find_to_country = document.createElement("input");
    var find_to_address = document.createElement("input");

    find_from_city.name = "find_from_city";
    find_from_city.value = find_from_var_info.city;
    find_from_zip.name = "find_from_zip";
    find_from_zip.value = find_from_var_info.postcode;
    find_from_country.name = "find_from_country";
    find_from_country.value = find_from_var_info.country;
    find_from_address.name = "find_from_address";
    find_from_address.value = find_from_var_info.name;

    find_to_city.name = "find_to_city";
    find_to_city.value = find_to_var_info.city;
    find_to_zip.name = "find_to_zip";
    find_to_zip.value = find_to_var_info.postcode;
    find_to_country.name = "find_to_country";
    find_to_country.value = find_to_var_info.country;
    find_to_address.name = "find_to_address";
    find_to_address.value = find_to_var_info.name;

    form.appendChild(find_from_city);
    form.appendChild(find_from_zip);
    form.appendChild(find_from_country);
    form.appendChild(find_from_address);
    form.appendChild(find_to_city);
    form.appendChild(find_to_zip);
    form.appendChild(find_to_country);
    form.appendChild(find_to_address);
    form.submit();
}
