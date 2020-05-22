function accept(it, id_ride) {
    var form = document.createElement("form");
    form.style.display = 'none';
    form.method = "POST";
    form.action = "my_rides.php";
    document.body.appendChild(form);
    var form_title = document.createElement("input");
    form_title.name = "id_passenger";
    form_title.value = it;
    var accept_or_not = document.createElement("input");
    accept_or_not.name = "accepted";
    accept_or_not.value = true;
    var myride = document.createElement("input");
    myride.name = "id_ride_ac";
    myride.value = id_ride;
    form.appendChild(myride);
    form.appendChild(form_title);
    form.appendChild(accept_or_not);
    form.submit();

}
