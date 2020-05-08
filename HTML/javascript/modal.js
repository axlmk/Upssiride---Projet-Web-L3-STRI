function openModal(){
    document.getElementById("modal").style.visibility = "visible";
    document.getElementById("modal").style.opacity = "1";
    document.getElementById("modal").style.top = "15%";
}

function closeModal(){
    document.getElementById("modal").style.top = "10%";
    document.getElementById("modal").style.opacity = "0";
    document.getElementById("modal").style.visible = "hidden";
}