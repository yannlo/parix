console.log("script 1");

// script annulation / validation commande





// chech code
let checker1 = document.getElementById("checker1");

checker1.addEventListener('click',function(event){
    
    let msg = document.getElementById("msg");
    event.stopPropagation();
    let popup = document.getElementsByClassName('popup')[0];
    let title = document.getElementById("title_part_h2");
    title.innerHTML="";
    popup.style.display= "none";
    msg.innerHTML="";

});



