document.getElementById("default_tab").click();

function openTab(evt, contentName) {
    var tabContentList = document.getElementsByClassName("tab_content");
    for(const elm of tabContentList) {
        elm.style.display = "none";
    }

    var tablinks = document.getElementsByClassName("tab_button");
    for(elm of tablinks) {
        elm.className = elm.className.replace(" active", "");
    }

    document.getElementById(contentName).style.display = "block";
    evt.currentTarget.className += " active";
}

function submitFileForm() {
    document.getElementById("file_form").submit();
}
