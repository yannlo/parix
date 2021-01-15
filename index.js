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
    
    let msg = document.getElementById("msg");
    event.stopPropagation();
    let popup = document.getElementsByClassName('popup')[0];
    popup.style.display= "none";
    msg.innerHTML="";

});

let checker2 = document.getElementById("checker2");

checker2.addEventListener('click',function(event){
    
    let msg = document.getElementById("msg");
    event.stopPropagation();
    let popup = document.getElementsByClassName('popup')[1];
    popup.style.display= "none";
    msg.innerHTML="";

});

// formulaire traitement
let forme = document.getElementById("reservation");

forme.addEventListener("submit",function(event){

    event.preventDefault();


    var data = new FormData(this);

    let popup = document.getElementsByClassName('popup')[0];
    let msg = document.getElementById("msg");
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.response);

            var res = this.response;
            popup.style.display= "table";
            msg.innerHTML =res.msg;


        }else if(this.readyState== 4){
            console.log(this);
            popup.style.display= "table";
            msg.innerHTML = "une erreur est survenu...";

        }
    };

    xhr.open("POST", "php_acces/script.php", true);
    xhr.responseType ="json";
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(data);

    return false;

});




// commande gestion


let link = document.getElementById("commandeLink");

link.addEventListener("click", function(event){
    event.preventDefault();

    
    let popup = document.getElementsByClassName('popup')[1]; // modifier avant verification final 
    popup.style.display= "table";

});
