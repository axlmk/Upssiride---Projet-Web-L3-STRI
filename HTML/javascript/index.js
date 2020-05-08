document.getElementById("default").click();

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
