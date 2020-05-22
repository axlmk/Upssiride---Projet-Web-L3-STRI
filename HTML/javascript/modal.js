function openModal(it){
    document.getElementById("modal_" + it).style.visibility = "visible";
    document.getElementById("modal_" + it).style.opacity = "1";
    document.getElementById("modal_" + it).style.left = "10%";
}

function closeModal(it){
    document.getElementById("modal_" + it).style.left = "-50%";
    document.getElementById("modal_" + it).style.opacity = "0";
    document.getElementById("modal_" + it).style.visible = "hidden";
}
