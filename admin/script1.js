function refresh() {
    // console.log("debut refresh");

    var xhr = new XMLHttpRequest();
    var content = document.getElementById("content");
    xhr.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){

            // console.log(this.response);
            var reponse = this.response;
            content.innerHTML = reponse.msg;

        }else if(this.readyState== 4){
    
        }
    };

    xhr.open("POST", "../php_acces/refresh_element.php", true);
    xhr.responseType = "json";
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();



}




let checker1 = document.getElementById("checker1");

checker1.addEventListener('click',function(event){
    
    let msg = document.getElementById("msg");
    event.stopPropagation();
    let popup = document.getElementsByClassName('popup')[0];
    popup.style.display= "none";
    msg.innerHTML="";
    var id_val = document.getElementById("id_value");
    var action = document.getElementById("action");
    id_val.value= "0";
    action.value= "0";

});


function confirme_action(id ,action_val){
    var msg = document.getElementById("msg");
    var popup = document.getElementsByClassName("popup")[0];
    var id_val = document.getElementById("id_value");
    var action = document.getElementById("action");

    if(action_val == 0){
        msg.innerHTML ="Voulez-vous annulés cette commande <br/> Attention cette action est irreversible";

        id_val.value= id;
        action.value= "annuler";
        popup.style.display="table";
    }
    if(action_val == 1){
        msg.innerHTML ="Voulez-vous confirmer cette commande <br/> Attention cette action est irreversible";
        id_val.value= id;
        action.value= "terminer";
        popup.style.display="table";
    }



}




refresh();

setInterval(refresh, 10000);