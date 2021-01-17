console.log("ok");
var tab=[];
var prix_val=[];

// nav bar annimation

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

// formulaire reservation
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

    xhr.open("POST", "php_acces/script_reservation.php", true);
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



// commande select plat


function color(id){
        // Visual selection

        let elt = document.getElementById(id);
        if(elt.className == "menu_elt operated"){

            elt.className="menu_elt operated activated_operator";

        }else{
            elt.className="menu_elt operated";
        }
}


function trans_action(val,table=tab){

    // selection

    let boole = false;
    let index=0;
    for(var i=0; i<table.length; i++) {
        if(val == table[i][0]) {
            boole=true;
            index = i;
        }
    }
    if(boole){
        table.splice(index, 1);
    }else{
        table.push([val, 1])
    }

    // console.log(prix_val);
    

    // console.log(JSON.stringify(table));
    data = JSON.stringify(table);


    

    // traitement 

    

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            // console.log(this.response);

            var res = this.response;

            let varex = document.getElementById("cont_menu");
            let varix = document.getElementById("result");
            let total = 0;


            varex.innerHTML = res.retour;
            prix_val = res.prix;


            for(var i=0; i<table.length; i++) {

                // console.log(table[i][1]);
                // console.log(total);
                // console.log(res.prix[i]);

                    total += table[i][1] * parseInt(res.prix[i]);

            }

            varix.innerHTML = total;

            // console.log(prix_val);

        }else if(this.readyState== 4){
            // console.log(this);  

            Alert("une erreur est survenu...") ;

        }
    };

    xhr.open("POST", "php_acces/script_commande.php", true);
    xhr.responseType ="json";
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("var="+data);


}

console.log(prix_val);
// multiplication prix

function multiplication (val,quant,table=tab ,prix_valeur = prix_val){

    let varix = document.getElementById("result");
    let quant_elt = document.getElementById(quant);

    let total = 0;
    // console.log(table);

    // console.log(prix_valeur);

    for(var i=0; i<table.length; i++) {
        if(val == table[i][0]) {
            // console.log(quant_elt.value);
            table[i][1] = quant_elt.value;
            total += parseInt(prix_valeur[i]) * table[i][1];
        }else{
            total += parseInt(prix_valeur[i]) * table[i][1];
        }

    }


    varix.innerHTML = total;



}


// comande adress part


let indexor = document.getElementsByClassName("fact_menu2")[1];
    indexor.style.display = "none";


    let previous = document.getElementById("previous");

    previous.addEventListener('click',function(event){
        event.stopPropagation();
        event.preventDefault();

        let indexor = document.getElementsByClassName("fact_menu2")[0];
        let indexor1 = document.getElementsByClassName("fact_menu2")[1];
        let title = document.getElementById("title_ver2");
        let prev = document.getElementById("prev");
        let nex = document.getElementById("nex");

        
        prev.style="color:#949494; border: 3px solid #949494;"
        nex.style="color:#ff6633; border: 3px solid #ff6633;"
        title.innerHTML="Menu";
        indexor.style.display = "block";
        indexor1.style.display = "none";



    });

    let next = document.getElementById("next");

    next.addEventListener('click',function(event){
        event.stopPropagation();
        event.preventDefault();

        let indexor = document.getElementsByClassName("fact_menu2")[0];
        let indexor1 = document.getElementsByClassName("fact_menu2")[1];
        let title = document.getElementById("title_ver2");
        let prev = document.getElementById("prev");
        let nex = document.getElementById("nex");

        
        nex.style="color:#949494; border: 3px solid #949494;"
        prev.style="color:#ff6633; border: 3px solid #ff6633;"

        title.innerHTML="Addresse et Paiement";
        indexor.style.display = "none";
        indexor1.style.display = "block";



    });


    // envoie formulaire commande
    


    let form2 = document.getElementById("adresse_paiement");

    form2.addEventListener("submit",function(event){
    
        event.preventDefault();
    
    
        var data = new FormData(this);
    
        console.log(data);

        // let popup = document.getElementsByClassName('popup')[0];
        // let msg = document.getElementById("msg");
        // var xhr = new XMLHttpRequest();
    
        // xhr.onreadystatechange = function(){
        //     if(this.readyState == 4 && this.status == 200){
        //         console.log(this.response);
    
        //         var res = this.response;
        //         popup.style.display= "table";
        //         msg.innerHTML =res.msg;
    
    
        //     }else if(this.readyState== 4){
        //         console.log(this);
        //         popup.style.display= "table";
        //         msg.innerHTML = "une erreur est survenu...";
    
        //     }
        // };
    
        // xhr.open("POST", "php_acces/script_reservation.php", true);
        // xhr.responseType ="json";
        // // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // xhr.send(data);
    
        return false;
    
    });
    
