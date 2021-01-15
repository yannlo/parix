console.log("ok");

let checked = document.getElementById('check');
checked.addEventListener('click',function(event){
    event.stopPropagation();
    let navbar= document.getElementsByClassName('navBar')[0];
    let icon = document.getElementById('icon');
    if(icon.className == "fas fa-bars"){
        icon.className = "fas fa-times";
        navbar.style.background="  rgb(59, 59, 59)";
        navbar.style.transition="all 0.3s";
    }else{
        icon.className = "fas fa-bars";
        navbar.style.background="  rgba(59, 59, 59, 0.94)";

    }
});


// popup  action

let checker1 = document.getElementById("checker1");

checker1.addEventListener('click',function(event){
    event.stopPropagation();
    let popup = document.getElementsByClassName('popup')[0];
    popup.style.display= "none";

});