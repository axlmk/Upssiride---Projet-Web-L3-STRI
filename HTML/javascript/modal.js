function openModal(){
    document.getElementById("modal").style.visibility = "visible";
    document.getElementById("modal").style.opacity = "1";
    document.getElementById("modal").style.left = "10%";
}

function closeModal(){
    document.getElementById("modal").style.left = "-50%";
    document.getElementById("modal").style.opacity = "0";
    document.getElementById("modal").style.visible = "hidden";
}